
$(document).ready(function(){
			
	$(".minorin_smilie").live('click', function(e){
		e.preventDefault();
		e.stopPropagation();
		var $box = getCurrentMessageBox();
		$box.insertAroundCaret(" " + $(this).children("img").attr("alt") + " ", "");
		return false;
	});
	
	$("#minorin_smilies").hover(function(){
		if($(".minorin_smilie > img").length > 0)
			return;
			
		$(".minorin_smilie").each(function(){
			if($(this).hasClass('mceSmilieSprite')){
				var img = $("<img />");
				img.attr("src", "styles/default/xenforo/clear.png");
				img.attr("alt", $(this).attr("data-alt"));
				img.attr("title", $(this).attr("data-title"));
				img.attr("class", $(this).attr("class").replace("minorin_smilie", ""));
				$(this).append(img);
			} else {
				var img = $("<img />");
				img.attr("src", $(this).attr("data-src"));
				img.attr("alt", $(this).attr("data-alt"));
				img.attr("title", $(this).attr("data-title"));
				$(this).append(img);
			}
		});     
		$(this).unbind('hover');
	});
	
	$(".minorin_bbcode").live('click', function(e){
		e.preventDefault();
		e.stopPropagation();
		var $box = getCurrentMessageBox();
		var bbcode = $(this).attr("data-code");
		var position = bbcode.length;
		var ins = getCaretLength($box.get(0)) > 0;
		$box.insertAroundCaret(bbcode.substring(0, bbcode.indexOf('][')+1), bbcode.substring(bbcode.indexOf('][')+1, bbcode.length));
		if(bbcode.indexOf('=][') != -1){
			position = bbcode.indexOf('=][')+1;
		} else {            
			position = bbcode.indexOf('][')+1;
		}
		
		if(!ins)
			setCaretPosition($box.get(0), getCaretPosition($box.get(0)) - (bbcode.length - position));
		else        
			setCaretPosition($box.get(0), getCaretPosition($box.get(0)) + bbcode.length - position);
		return false;        
	});
	
	$("textarea").live('focus', function(){
		$(this).minorinSetup(false);
	});
	
	if(typeof window.tinyMCE == "undefined" || !window.tinyMCE){        
		
		if($("#QuickReply > div:first > textarea").minorinSetup(true).length == 0)
			$("#ctrl_message").minorinSetup(true)
			
		$(".xenForm .ctrlUnit .minorin_toolbar").css({marginLeft: "30px"});
	}
			

});

function getCurrentMessageBox(){
	if($(".InlineMessageEditor:visible").length == 0){
		return $(".minorin_toolbar + textarea:visible").filter(function(){ return $(this).parents(".InlineMessageEditor").length == 0  }) // textarea[name='message']:visible, textarea[name='signature']:visible
	} else {
		return $(".InlineMessageEditor textarea[name='message']:visible");
	}
};

jQuery.fn.extend({
	minorinSetup: function(force){
		return this.each(function(){      
			if((force || $(this).parent().hasClass('bbCodeEditorContainer') || $(this).parent().siblings("#minorin_toolbar_container").length == 1) && $(this).siblings(".minorin_toolbar").length == 0 && $(this).siblings("span.mceEditor").length == 0){
				$(this).parent().prepend($("#minorin_toolbar_container:first > .minorin_toolbar").clone(true));
				$(".minorin_Popup").filter(function(){ return $(this).parents("#minorin_toolbar_container").length == 0  }).addClass('Popup');               
				XenForo.register('.Popup', 'XenForo.PopupMenu', 'XenForoActivatePopups');
				XenForo.activate(document);
			}
		});
	}
});


// http://stackoverflow.com/questions/946534/insert-text-into-textarea-with-jquery, modified slightly
jQuery.fn.extend({
	insertAroundCaret: function(myValue, myValue2){
		return this.each(function(i) {
			if(document.selection) {
				this.focus();
				sel = document.selection.createRange();
				sel.text = myValue + sel.text + myValue2;
				this.focus();
			} else if(this.selectionStart || this.selectionStart == '0') {
				var startPos = this.selectionStart;
				var endPos = this.selectionEnd;
				var scrollTop = this.scrollTop;
				this.value = this.value.substring(0, startPos)+myValue+this.value.substring(startPos, endPos)+myValue2+this.value.substring(endPos,this.value.length);
				this.focus();
				this.selectionStart = startPos + myValue.length + myValue2.length + (endPos-startPos);
				this.selectionEnd = startPos + myValue.length + myValue2.length + (endPos-startPos);
				this.scrollTop = scrollTop;
			} else {
				this.value += myValue + myValue2;
				this.focus();
			}
		})
	}
});

// http://blog.vishalon.net/index.php/javascript-getting-and-setting-caret-position-in-textarea/
function getCaretPosition (ctrl) {
	var CaretPos = 0;    // IE Support
	if(document.selection){
		ctrl.focus ();
		var Sel = document.selection.createRange ();
		Sel.moveStart ('character', -ctrl.value.length);
		CaretPos = Sel.text.length;
	}
	// Firefox support
	else if(ctrl.selectionStart || ctrl.selectionStart == '0')
		CaretPos = ctrl.selectionStart;
	return (CaretPos);
}
function getCaretLength (ctrl) {
	var CaretPos = 0;
	if(document.selection){
		ctrl.focus ();
		var Sel = document.selection.createRange ();
		//Sel.moveStart ('character', -ctrl.value.length);
		CaretPos = Sel.text.length;
	}
	else if(ctrl.selectionEnd || ctrl.selectionEnd == '0')
		CaretPos = ctrl.selectionEnd-ctrl.selectionStart;
	return (CaretPos);
}
function setCaretPosition(ctrl, pos){
	if(ctrl.setSelectionRange){
		ctrl.focus();
		ctrl.setSelectionRange(pos,pos);
	}
	else if(ctrl.createTextRange){
		var range = ctrl.createTextRange();
		range.collapse(true);
		range.moveEnd('character', pos);
		range.moveStart('character', pos);
		range.select();
	}
}
