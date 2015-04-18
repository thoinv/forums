<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$this->addRequiredExternal('css', 'quattro_dialog');
$__output .= '
';
$this->addRequiredExternal('css', 'quattro_dialog_bbm_adv_fieldset');
$__output .= '
';
$this->addRequiredExternal('js', 'js/sedo/advtoolbar/tinyquattro/fieldset.js');
$__output .= '

<div class="mceTitle FastReload">' . 'Fieldset Insertion Panel' . '</div>

<div id="adv_fieldset">
	<dl class="xenmce_inline">
		<dt>' . 'Title:' . '</dt>
		<dd><input 	id="adv_fieldset_title"
				name="title"
				type="text"
				size="35"
				class="mce-textbox mceFocus"
				value="' . 'Auto' . '"
			/>
		</dd>	

		<dt>' . 'Width:' . '</dt>
		<dd><input 	id="adv_fieldset_width"
				name="width"
				type="text"
				style="width:50px"
				class="mce-textbox"
				value="' . 'Auto' . '"
			/>
		</dd>

		<dt></dt>
		<dd><input 	id="adv_fieldset_width_type"
				name="widthType"
				type="text"
				class="mce-textbox"
				style="width:20px"
				readonly="true"
				value="%" 
			/>
		</dd>
	</dl>

	<ul id="adv_fieldset_blockalign">
		<li class="active"><div data-align="left">' . 'Left align' . '</div></li>
		<li><div data-align="center">' . 'Center align' . '</div></li>
		<li><div data-align="right">' . 'Right align' . '</div></li>
	</ul>
	<input id="adv_fieldset_blockalign_input" name="blockalign" type="hidden" value="BlockLeft" />

	<dl id="article_text">
		<dt></dt>
		<dd><textarea	id="adv_fieldset_text"
				name="text"
				type="text"
				data-message="' . 'Type your text here' . '"	
				class="mce-textbox MceReset MceSelec mceFocus"
			>' . (($selection['bbCode']) ? (htmlspecialchars($selection['bbCode'], ENT_QUOTES, 'UTF-8')) : ('Type your text here')) . '</textarea>
		</dd>
	</dl>
</div>';
