/**
 * Product: sonnb - Live Threads
 * Version: 1.1.14
 * Date: 25th January 2015
 * Author: sonnb
 * Website: www.sonnb.com
 * License: You might not copy or redistribute this addon.
 * Any action to public or redistribute must be authorized from author
 */

!function($, window, document, _undefined)
{
    XenForo.sonnb_LiveThread_Instance = null;

    XenForo.sonnb_LiveThread_Listener = function($element)
    {
        this.__construct($element);
    };

    XenForo.sonnb_LiveThread_Listener.prototype =
    {
        __construct: function($element)
        {
            this.$element = $element;

            this.config = $.extend(true, {
                intervalInSeconds: 300,
                ajaxTimeoutInSeconds: 5,
                postUrl: '',
                isLastPage: 0,
                pagination: 0,
                debug: true
            }, $element.data('config'));

            this.debugMode = parseInt(this.config.debug) > 0;
            this.interval = parseInt(this.config.intervalInSeconds) * 1000;
            this.ajaxTimeout = parseInt(this.config.ajaxTimeoutInSeconds) * 1000;

            if (this.config.postUrl)
            {
                this.log('Live Thread: Started');
                this.activeInstance();
            }

            this.loaderXhr = null;

            XenForo.sonnb_LiveThread_Instance = this;
        },

        loadNewPosts: function(e)
        {
            var $form = $('.QuickReplyLive'),
                ajaxTimeout = this.ajaxTimeout;

            if (this.loaderXhr || $form.data('isReplying'))
            {
                return false;
            }

            var ajaxData = {
                timestamp: this.$element.data("timestamp"),
                update_hash: this.config.updateHash
            };

            this.loaderXhr = XenForo.ajax(
                this.config.postUrl,
                ajaxData,
                $.context(this, "processNewPosts"),
                {
                    timeout: ajaxTimeout,
                    error: $.context(this, "loadPostsError"),
                    type: 'POST'
                }
            );
        },

        processNewPosts: function(ajaxData, textStatus)
        {
            var $this = this;
            this.loaderXhr = null;

            if (ajaxData._redirectTarget)
            {
                window.location = ajaxData._redirectTarget;
            }

            if (XenForo.hasResponseError(ajaxData))
            {
                $('#AjaxProgress').hide();
                return false;
            }

            if (ajaxData.posts && ajaxData.posts.length)
            {
                if (this.config.pagination == true && this.config.isLastPage == false && ajaxData.notice)
                {
                    $('#messageList').find('li.newMessagesNotice').remove();
                    $('#messageList').append(ajaxData.notice).addClass('__XenForoActivator');

                    var $message = $('<a />').css({cursor: 'pointer', 'font-weight': 'normal'}).html(ajaxData.notice)
                    XenForo.stackAlert($message, 5000, null);
                }
                else
                {
                    var firstLink = '',
                        insertMethod = 'appendTo',
                        reserveOrder = ajaxData.reserveOrder;

                    if (reserveOrder)
                    {
                        insertMethod = 'prependTo';
                    }

                    for (i = 0; i < ajaxData.posts.length; i++)
                    {
                        $(ajaxData.posts[i]).xfInsert(insertMethod, $('ol#messageList'), 'xfSlideDown', XenForo.speed.normal, function(){
                            if (firstLink == '' && $this.inViewPort($(this)) == false)
                            {
                                firstLink = $(this).find('.datePermalink').attr('href');
                                if (firstLink && ajaxData.notice)
                                {
                                    var hash = firstLink.split('#'),
                                        $notice = $(ajaxData.notice);

                                    hash = window.location.href+'#'+hash[1];
                                    $('a', $notice).attr('href', hash);

                                    var $message = $('<a />').css({cursor: 'pointer', 'font-weight': 'normal'}).html($notice);
                                    XenForo.stackAlert($message, 10000, null);
                                }

                            }
                        });
                    }

                    this.$element.data("timestamp", ajaxData.timestamp);
                    $('input[name="last_date"]', $("form.QuickReplyLive")).val(ajaxData.timestamp);
                }

                return true;
            }
            else if (XenForo.hasResponseError(ajaxData))
            {
                return false;
            }
        },

        loadPostsError: function (xhr, responseText, errorThrown)
        {
            this.loaderXhr = null;

            if (responseText == 'timeout')
            {
                this.log('Live Thread: Connection Timeout');
                this.deactivateInstance();
                this.activeInstance();
            }
            else if (xhr.status == 403)
            {
                this.log('Live Thread: Access Denied');
                this.deactivateInstance();
            }
            else
            {
                try
                {
                    var json = $.parseJSON(xhr.responseText);
                    if (json === null)
                    {
                        throw new Exception('NULL JSON response!');
                    }
                }
                catch (e)
                {
                    XenForo.handleServerError(xhr, responseText, errorThrown);
                }
            }
        },

        activeInstance: function (instance)
        {
            if (this.active)
            {
                return;
            }

            this.active = setInterval($.context(this, "loadNewPosts"), this.interval);
            this.log('Live Thread: Active Instance Interval =', this.interval);
        },

        deactivateInstance: function ()
        {
            window.clearInterval(this.active);
            this.active = false;
            this.log('Live Thread: Deactived');
        },

        log: function ()
        {
            if (this.debugMode && typeof console.log !== 'undefined') {
                console.log.apply(console, arguments);
            }
        },

        inViewPort: function($element)
        {
            //Reference: http://upshots.org/javascript/jquery-test-if-element-is-in-viewport-visible-on-screen
            var win = $(window);

            var viewport = {
                top : win.scrollTop(),
                left : win.scrollLeft()
            };
            viewport.right = viewport.left + win.width();
            viewport.bottom = viewport.top + win.height();

            var bounds = $element.offset();

            if (bounds)
            {
                bounds.right = bounds.left + $element.outerWidth();
                bounds.bottom = bounds.top + $element.outerHeight();

                return (!(viewport.right < bounds.left || viewport.left > bounds.right || viewport.bottom < bounds.top || viewport.top > bounds.bottom));
            }

            return false;
        }
    }

    XenForo.sonnb_LiveThread_Reply = function($form)
    {
        if ($('#messageList').length == 0)
        {
            return console.error('Quick Reply not possible for %o, no #messageList found.', $form);
        }

        var submitEnableCallback = XenForo.MultiSubmitFix($form);

        /**
         * Scrolls QuickReply into view and focuses the editor
         */
        this.scrollAndFocus = function()
        {
            $(document).scrollTop($form.offset().top);

            if (typeof window.tinyMCE !== 'undefined')
            {
                window.tinyMCE.editors['ctrl_message_html'].focus();
            }
            else
            {
                var ed = XenForo.getEditorInForm($form);
                if (!ed)
                {
                    return false;
                }

                if (ed.$editor)
                {
                    ed.focus(true);
                }
                else
                {
                    ed.focus();
                    $('.QuickReplyLive').find('textarea:first').get(0).focus();
                }
            }

            return this;
        };

        $form.data('QuickReply', this).bind(
            {
                AutoValidationBeforeSubmit: function(e)
                {
                    if ($(e.clickedSubmitButton).is('input[name="more_options"]'))
                    {
                        e.preventDefault();
                        e.returnValue = true;
                    }

                    $form.data('isReplying', 1);
                },

                AutoValidationComplete: function(e)
                {
                    if (e.ajaxData._redirectTarget)
                    {
                        window.location = e.ajaxData._redirectTarget;
                    }

                    $('input[name="last_position"]', $form).val(e.ajaxData.lastPosition);
                    $('input[name="last_date"]', $form).val(e.ajaxData.lastDate);
                    $('form.InlineModForm').data("timestamp", e.ajaxData.lastDate);

                    if (submitEnableCallback)
                    {
                        submitEnableCallback();
                    }

                    $form.find('input:submit').blur();
                    var insertMethod = 'appendTo',
                        reserveOrder = e.ajaxData.reserveOrder;

                    if (reserveOrder)
                    {
                        insertMethod = 'prependTo';
                    }

                    if (e.ajaxData.posts && e.ajaxData.posts.length)
                    {
                        for (i = 0; i < e.ajaxData.posts.length; i++)
                        {
                            $(e.ajaxData.posts[i]).xfInsert(insertMethod, $('ol#messageList'), 'xfSlideDown');
                        }
                    }

                    var $textarea = $('.QuickReplyLive').find('textarea');
                    $textarea.val('');

                    if (typeof window.tinyMCE !== 'undefined')
                    {
                        window.tinyMCE.editors['ctrl_message_html'].setContent('');

                        if (typeof window.sessionStorage !== 'undefined')
                        {
                            window.sessionStorage.quickReplyText = null;
                        }
                    }
                    else
                    {
                        var ed = $textarea.data('XenForo.BbCodeWysiwygEditor');
                        if (ed)
                        {
                            ed.resetEditor();
                        }
                    }

                    $form.trigger('QuickReplyComplete');

                    $('.AttachmentEditor').find('.AttachmentList.New li:not(#AttachedFileTemplate)').xfRemove();

                    $form.data('isReplying', 0);

                    return false;
                }
            });
    };

    XenForo.sonnb_LiveThread_QuickReplyTrigger = function($trigger)
    {
        $trigger.click(function(e)
        {
            var $form = $('.QuickReplyLive'),
                xhr = null;

            $form.data('QuickReply').scrollAndFocus();

            if (!xhr)
            {
                xhr = XenForo.ajax
                (
                    $trigger.data('posturl') || $trigger.attr('href'),
                    '',
                    function(ajaxData, textStatus)
                    {
                        if (XenForo.hasResponseError(ajaxData))
                        {
                            return false;
                        }

                        delete(xhr);

                        var ed = XenForo.getEditorInForm($form);
                        if (!ed)
                        {
                            return false;
                        }

                        if (typeof tinyMCE !== 'undefined')
                        {
                            if (ed.execCommand)
                            {
                                if (tinyMCE.isIE)
                                {
                                    ed.execCommand('mceInsertContent', false, ajaxData.quoteHtml);
                                }
                                else
                                {
                                    ed.execCommand('insertHtml', false, ajaxData.quoteHtml);
                                }

                                if (window.sessionStorage)
                                {
                                    window.sessionStorage.quickReplyText = ajaxData.quoteHtml;
                                }

                                if (tinyMCE.isWebKit)
                                {
                                    ed.selection.select(ed.dom.select('body')[0].lastChild);
                                    ed.selection.collapse(false);
                                }
                            }
                            else
                            {
                                if (window.sessionStorage)
                                {
                                    window.sessionStorage.quickReplyText = ajaxData.quote;
                                }
                            }
                        }
                        else
                        {
                            if (ed.$editor)
                            {
                                ed.insertHtml(ajaxData.quoteHtml);

                                if (ed.$editor.data('xenForoElastic'))
                                {
                                    ed.$editor.data('xenForoElastic')();
                                }
                            }
                            else if (typeof ed.val !== 'undefined')
                            {
                                ed.val(ed.val() + ajaxData.quote);
                            }
                        }
                    }
                );
            }

            return false;
        });
    };

    XenForo.sonnb_LiveThread_Loader = function($element) {
        this.__construct($element);
    };

    XenForo.sonnb_LiveThread_Loader.prototype =
    {
        __construct: function($link)
        {
            this.$link = $link;

            $link.click($.context(this, 'click'));
        },

        click: function(e)
        {
            var params = this.$link.data('loadparams');

            if (typeof params != 'object')
            {
                params = {};
            }

            e.preventDefault();

            XenForo.ajax(
                this.$link.attr('href'),
                params,
                $.context(this, 'loadSuccess'),
                {
                    timeout: 5000,
                    error: $.context(this, "loadError"),
                    type: 'POST'
                }
            );
        },

        loadSuccess: function(ajaxData)
        {
            if (ajaxData._redirectTarget)
            {
                window.location = ajaxData._redirectTarget;
            }

            var $replace,
                replaceSelector = this.$link.data('replace'),
                els = [], $els, i;

            if (XenForo.hasResponseError(ajaxData))
            {
                return false;
            }

            if (replaceSelector)
            {
                $replace = $(replaceSelector);
            }
            else
            {
                $replace = this.$link.parent();
            }

            var insertMethod = 'insertAfter',
                reserveOrder = ajaxData.reserveOrder;

            if (reserveOrder)
            {
                insertMethod = 'insertBefore';
            }

            if (ajaxData.posts && ajaxData.posts.length)
            {
                for (i = 0; i < ajaxData.posts.length; i++)
                {
                    $(ajaxData.posts[i]).xfInsert(insertMethod, $replace, 'xfSlideDown');
                }

                var params = {};
                params.before = ajaxData.firstPostDate;
                this.$link.data('loadparams', params);

                if (ajaxData.oldPostsRemaining < 1)
                {
                    $replace.xfHide();
                }
            }
            else
            {
                $replace.xfRemove();
            }
        },

        loadError: function (xhr, responseText, errorThrown)
        {
            if (responseText == 'timeout')
            {
                this.log('Live Thread: Loader Timeout');
            }
            else if (xhr.status == 403)
            {
                this.log('Live Thread: Loader Access Denied');
            }
            else
            {
                try
                {
                    var json = $.parseJSON(xhr.responseText);
                    if (json === null)
                    {
                        throw new Exception('NULL JSON response!');
                    }
                }
                catch (e)
                {
                    XenForo.handleServerError(xhr, responseText, errorThrown);
                }
            }
        },

        log: function ()
        {
            if (typeof console.log !== 'undefined')
            {
                console.log.apply(console, arguments);
            }
        }
    };

    XenForo.register("form.InlineModForm", "XenForo.sonnb_LiveThread_Listener");
    XenForo.register("a.LivePostLoader", "XenForo.sonnb_LiveThread_Loader");
    XenForo.register("form.QuickReplyLive", "XenForo.sonnb_LiveThread_Reply");
    XenForo.register('a.ReplyQuoteLive', 'XenForo.sonnb_LiveThread_QuickReplyTrigger');

}
    (jQuery, this, document);