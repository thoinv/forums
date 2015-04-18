/**
 * @author andrew
 */

/** @param {jQuery} $ jQuery Object */
!function($, window, document, _undefined)
{
    /**
     * Loads and displays the next batch of carousel feed items from the server.
     *
     * @param jQuery Link to click in order to initiate loading
     */
    XenForo.CarouselAddItemLoader = function($link) { this.__construct($link); };
    XenForo.CarouselAddItemLoader.prototype =
    {
        __construct: function($link)
        {
            this.$link = $link.click($.context(this, 'load'));

            this.xhr = null;
        },

    /**
         * Loads up the next x news feed items from the server
         *
         * @param Event e
         * @return boolean false
         */
        load: function(e)
        {
            e.preventDefault();
            e.target.blur();

            if (this.xhr === null && this.$link.attr('href'))
            {
                this.xhr = XenForo.ajax(
                    this.$link.attr('href'),
                    { counter: parseInt(this.$link.attr('data-counter')) },
                    $.context(this, 'display')
                );
                this.counter = parseInt( this.$link.attr('data-counter')) + 1;
                this.$link.attr('data-counter', this.counter);

            }

            return false;
        },

        /**
         * Handles the AJAX response from load() and displays any returned news feed items.
         *
         * @param object JSON data from AJAX
         * @param string textStatus
         */
        display: function(ajaxData, textStatus)
        {
            this.xhr = null;

            if (XenForo.hasResponseError(ajaxData))
            {
                return false;
            }

            this.$link.data('lastItem', ajaxData.lastItem);

            if (XenForo.hasTemplateHtml(ajaxData))
            {
                var $html = $(ajaxData.templateHtml);

                if ($html.length)
                {
                    $html.find('.event:first').addClass('forceBorder');
                    $html.xfInsert('insertBefore', this.$link.closest('.CarouselEnd'), 'xfSlideDown', XenForo.speed.slow);
                }
            }
            /* Recount the items in the form. */
            var itemCount = 1;
            $('input.order').each(function() {
                $(this).val( itemCount );
                itemCount++;
            });
        }
    };

    // *********************************************************************

    /**
         * Hides an individual news feed item
         *
         * @param jQuery Link to click in order to hide a news feed item
         */
    XenForo.CarouselAddItemLoaderDelete = function($link) { this.__construct($link); };
    XenForo.CarouselAddItemLoaderDelete.prototype =
    {
        __construct: function($link)
        {
            this.$link = $link.click($.context(this, 'requestHide'));
        },

        /**
         * Sends an AJAX request to the server, requesting that a news feed item be hidden
         *
         * @param Event e
         *
         * @return boolean false
         */
        requestHide: function(e)
        {
            e.preventDefault();

            // hide immediately, assume success
            $(this.$link.closest('.CarouselItem')).xfRemove();

            XenForo.ajax(
                this.$link.attr('href'),
                { item_id: this.$link.data('itemId') },
                $.context(this, 'hide')
            );
            /* TODO: Should implement a recount when an item is removed.  */
        },

        /**
         * Receives the AJAX response from requestHide() and does the actual hiding.
         *
         * @param object JSON data from AJAX
         * @param string textStatus
         */
        hide: function(ajaxData, textStatus)
        {
            if (XenForo.hasResponseError(ajaxData))
            {
                return false;
            }

            // nothing else to do now.
        }
    };

    // *********************************************************************

    XenForo.register('a.CarouselAddItemLoader', 'XenForo.CarouselAddItemLoader');
    XenForo.register('a.CarouselAddItemLoaderDelete', 'XenForo.CarouselAddItemLoaderDelete');
}
(jQuery, this, document);