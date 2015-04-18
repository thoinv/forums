/**
 * Product: sonnb - Live Threads
 * Version: 1.1.14
 * Date: 25th January 2015
 * Author: sonnb
 * Website: www.sonnb.com
 * License: You might not copy or redistribute this addon.
 * Any action to public or redistribute must be authorized from author
 */

!function(e,t,n,r){XenForo.sonnb_LiveThread_Instance=null;XenForo.sonnb_LiveThread_Listener=function(e){this.__construct(e)};XenForo.sonnb_LiveThread_Listener.prototype={__construct:function(t){this.$element=t;this.config=e.extend(true,{intervalInSeconds:300,ajaxTimeoutInSeconds:5,postUrl:"",isLastPage:0,pagination:0,debug:true},t.data("config"));this.debugMode=parseInt(this.config.debug)>0;this.interval=parseInt(this.config.intervalInSeconds)*1e3;this.ajaxTimeout=parseInt(this.config.ajaxTimeoutInSeconds)*1e3;if(this.config.postUrl){this.log("Live Thread: Started");this.activeInstance()}this.loaderXhr=null;XenForo.sonnb_LiveThread_Instance=this},loadNewPosts:function(t){var n=e(".QuickReplyLive"),r=this.ajaxTimeout;if(this.loaderXhr||n.data("isReplying")){return false}var i={timestamp:this.$element.data("timestamp"),update_hash:this.config.updateHash};this.loaderXhr=XenForo.ajax(this.config.postUrl,i,e.context(this,"processNewPosts"),{timeout:r,error:e.context(this,"loadPostsError"),type:"POST"})},processNewPosts:function(n,r){var s=this;this.loaderXhr=null;if(n._redirectTarget){t.location=n._redirectTarget}if(XenForo.hasResponseError(n)){e("#AjaxProgress").hide();return false}if(n.posts&&n.posts.length){if(this.config.pagination==true&&this.config.isLastPage==false&&n.notice){e("#messageList").find("li.newMessagesNotice").remove();e("#messageList").append(n.notice).addClass("__XenForoActivator");var o=e("<a />").css({cursor:"pointer","font-weight":"normal"}).html(n.notice);XenForo.stackAlert(o,5e3,null)}else{var u="",a="appendTo",f=n.reserveOrder;if(f){a="prependTo"}new XenForo.ExtLoader(n,function(){for(i=0;i<n.posts.length;i++){e(n.posts[i]).xfInsert(a,e("ol#messageList"),"xfSlideDown",XenForo.speed.normal,function(){if(u==""&&s.inViewPort(e(this))==false){u=e(this).find(".datePermalink").attr("href");if(u&&n.notice){var r=u.split("#"),i=e(n.notice);r=t.location.href+"#"+r[1];e("a",i).attr("href",r);var o=e("<a />").css({cursor:"pointer","font-weight":"normal"}).html(i);XenForo.stackAlert(o,1e4,null)}}})}});this.$element.data("timestamp",n.timestamp);e('input[name="last_date"]',e("form.QuickReplyLive")).val(n.timestamp)}return true}else if(XenForo.hasResponseError(n)){return false}},loadPostsError:function(t,n,r){this.loaderXhr=null;if(n=="timeout"){this.log("Live Thread: Connection Timeout");this.deactivateInstance();this.activeInstance()}else if(t.status==403){this.log("Live Thread: Access Denied");this.deactivateInstance()}else{try{var i=e.parseJSON(t.responseText);if(i===null){throw new Exception("NULL JSON response!")}}catch(s){XenForo.handleServerError(t,n,r)}}},activeInstance:function(t){if(this.active){return}this.active=setInterval(e.context(this,"loadNewPosts"),this.interval);this.log("Live Thread: Active Instance Interval =",this.interval)},deactivateInstance:function(){t.clearInterval(this.active);this.active=false;this.log("Live Thread: Deactived")},log:function(){if(this.debugMode&&typeof console.log!=="undefined"){console.log.apply(console,arguments)}},inViewPort:function(n){var r=e(t);var i={top:r.scrollTop(),left:r.scrollLeft()};i.right=i.left+r.width();i.bottom=i.top+r.height();var s=n.offset();if(s){s.right=s.left+n.outerWidth();s.bottom=s.top+n.outerHeight();return!(i.right<s.left||i.left>s.right||i.bottom<s.top||i.top>s.bottom)}return false}};XenForo.sonnb_LiveThread_Reply=function(r){if(e("#messageList").length==0){return console.error("Quick Reply not possible for %o, no #messageList found.",r)}var s=XenForo.MultiSubmitFix(r);this.scrollAndFocus=function(){e(n).scrollTop(r.offset().top);if(typeof t.tinyMCE!=="undefined"){t.tinyMCE.editors["ctrl_message_html"].focus()}else{var i=XenForo.getEditorInForm(r);if(!i){return false}if(i.$editor){i.focus(true)}else{i.focus();e(".QuickReplyLive").find("textarea:first").get(0).focus()}}return this};r.data("QuickReply",this).bind({AutoValidationBeforeSubmit:function(t){if(e(t.clickedSubmitButton).is('input[name="more_options"]')){t.preventDefault();t.returnValue=true}r.data("isReplying",1)},AutoValidationComplete:function(n){if(n.ajaxData._redirectTarget){t.location=n.ajaxData._redirectTarget}e('input[name="last_position"]',r).val(n.ajaxData.lastPosition);e('input[name="last_date"]',r).val(n.ajaxData.lastDate);e("form.InlineModForm").data("timestamp",n.ajaxData.lastDate);if(s){s()}r.find("input:submit").blur();var o="appendTo",u=n.ajaxData.reserveOrder;if(u){o="prependTo"}if(n.ajaxData.posts&&n.ajaxData.posts.length){new XenForo.ExtLoader(n.ajaxData,function(){for(i=0;i<n.ajaxData.posts.length;i++){e(n.ajaxData.posts[i]).xfInsert(o,e("ol#messageList"),"xfSlideDown")}})}var a=e(".QuickReplyLive").find("textarea");a.val("");if(typeof t.tinyMCE!=="undefined"){t.tinyMCE.editors["ctrl_message_html"].setContent("");if(typeof t.sessionStorage!=="undefined"){t.sessionStorage.quickReplyText=null}}else{var f=a.data("XenForo.BbCodeWysiwygEditor");if(f){f.resetEditor()}}r.trigger("QuickReplyComplete");e(".AttachmentEditor").find(".AttachmentList.New li:not(#AttachedFileTemplate)").xfRemove();r.data("isReplying",0);return false}})};XenForo.sonnb_LiveThread_QuickReplyTrigger=function(n){n.click(function(r){var i=e(".QuickReplyLive"),s=null;i.data("QuickReply").scrollAndFocus();if(!s){s=XenForo.ajax(n.data("posturl")||n.attr("href"),"",function(e,n){if(XenForo.hasResponseError(e)){return false}delete s;var r=XenForo.getEditorInForm(i);if(!r){return false}if(typeof tinyMCE!=="undefined"){if(r.execCommand){if(tinyMCE.isIE){r.execCommand("mceInsertContent",false,e.quoteHtml)}else{r.execCommand("insertHtml",false,e.quoteHtml)}if(t.sessionStorage){t.sessionStorage.quickReplyText=e.quoteHtml}if(tinyMCE.isWebKit){r.selection.select(r.dom.select("body")[0].lastChild);r.selection.collapse(false)}}else{if(t.sessionStorage){t.sessionStorage.quickReplyText=e.quote}}}else{if(r.$editor){r.insertHtml(e.quoteHtml);if(r.$editor.data("xenForoElastic")){r.$editor.data("xenForoElastic")()}}else if(typeof r.val!=="undefined"){r.val(r.val()+e.quote)}}})}return false})};XenForo.sonnb_LiveThread_Loader=function(e){this.__construct(e)};XenForo.sonnb_LiveThread_Loader.prototype={__construct:function(t){this.$link=t;t.click(e.context(this,"click"))},click:function(t){var n=this.$link.data("loadparams");if(typeof n!="object"){n={}}t.preventDefault();XenForo.ajax(this.$link.attr("href"),n,e.context(this,"loadSuccess"),{timeout:5e3,error:e.context(this,"loadError"),type:"POST"})},loadSuccess:function(n){if(n._redirectTarget){t.location=n._redirectTarget}var r,i=this.$link.data("replace"),s=[],o,u;if(XenForo.hasResponseError(n)){return false}if(i){r=e(i)}else{r=this.$link.parent()}var a="insertAfter",f=n.reserveOrder;if(f){a="insertBefore"}if(n.posts&&n.posts.length){new XenForo.ExtLoader(n,function(){for(u=0;u<n.posts.length;u++){e(n.posts[u]).xfInsert(a,r,"xfSlideDown")}});var l={};l.before=n.firstPostDate;this.$link.data("loadparams",l);if(n.oldPostsRemaining<1){r.xfHide()}}else{r.xfRemove()}},loadError:function(t,n,r){if(n=="timeout"){this.log("Live Thread: Loader Timeout")}else if(t.status==403){this.log("Live Thread: Loader Access Denied")}else{try{var i=e.parseJSON(t.responseText);if(i===null){throw new Exception("NULL JSON response!")}}catch(s){XenForo.handleServerError(t,n,r)}}},log:function(){if(typeof console.log!=="undefined"){console.log.apply(console,arguments)}}};XenForo.register("form.InlineModForm","XenForo.sonnb_LiveThread_Listener");XenForo.register("a.LivePostLoader","XenForo.sonnb_LiveThread_Loader");XenForo.register("form.QuickReplyLive","XenForo.sonnb_LiveThread_Reply");XenForo.register("a.ReplyQuoteLive","XenForo.sonnb_LiveThread_QuickReplyTrigger")}(jQuery,this,document)