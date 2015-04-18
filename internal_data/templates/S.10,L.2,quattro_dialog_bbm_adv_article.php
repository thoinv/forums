<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$this->addRequiredExternal('css', 'quattro_dialog');
$__output .= '
';
$this->addRequiredExternal('css', 'quattro_dialog_bbm_adv_article');
$__output .= '
';
$this->addRequiredExternal('js', 'js/sedo/advtoolbar/tinyquattro/article.js');
$__output .= '

<div class="mceTitle FastReload">' . 'Article Insertion Panel' . '</div>

<div id="adv_article">
	<dl id="adv_article_text">
		<dt></dt>
		<dd><textarea	id="adv_article_textarea"
				name="text"
				type="text"
				data-message="' . 'Type your article here' . '"
				class="mce-textbox MceReset MceSelec mceFocus MceEditor"
			>' . (($selection['bbCode']) ? (htmlspecialchars($selection['bbCode'], ENT_QUOTES, 'UTF-8')) : ('Type your article here')) . '</textarea>
		</dd>
	</dl>
	<dl id="adv_article_src" class="xenmce_inline">
		<dt></dt>
		<dd><input 	id="adv_article_src_input"
				name="source"
				type="text"
				class="mce-textbox"
				value="' . 'Source' . '"
			/>
		</dd>
		<dt id="adv_article_option">' . '(Optional)' . '</dt>
		<dd></dd>
	</dl>
	
	<input id="adv_article_src_phrase" name="source_phrase" type="hidden" value="' . 'Source' . '" />
</div>
';
