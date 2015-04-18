<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$this->addRequiredExternal('css', 'quattro_dialog');
$__output .= '
';
$this->addRequiredExternal('css', 'quattro_dialog_bbm_adv_encadre');
$__output .= '
';
$this->addRequiredExternal('js', 'js/sedo/advtoolbar/tinyquattro/encadre.js');
$__output .= '

<div class="mceTitle FastReload">' . 'Text Box Insertion Panel' . '</div>

<div id="adv_encadre">
	<dl class="xenmce_inline">
		<dt>' . 'Title:' . '</dt>
		<dd><input 	id="adv_encadre_title"
				name="title"
				type="text"
				size="35"
				class="mce-textbox mceFocus"
				value="' . 'Auto' . '"
			/>
		</dd>	

		<dt>' . 'Width:' . '</dt>
		<dd><input 	id="adv_encadre_width"
				name="width"
				type="text"
				style="width:50px"
				class="mce-textbox"
				value="' . 'Auto' . '"
			/>
		</dd>

		<dt></dt>
		<dd><input 	id="adv_encadre_width_type"
				name="widthType"
				type="text"
				class="mce-textbox"
				style="width:20px"
				readonly="true"
				value="%" 
			/>
		</dd>
	</dl>

	<ul id="adv_encadre_selectlist">
		<li>
			<ul id="adv_encadre_skins">
				<li class="active"><div data-skin="skin1">' . 'Skin 1' . '</div></li>
				<li><div data-skin="skin2">' . 'Skin 2' . '</div></li>
			</ul>
			<input id="adv_encadre_skin_input" name="skin" type="hidden" value="skin1" />
		</li>
		<li>
			<ul id="adv_encadre_float">
				<li><div data-float="fleft">' . 'Float left' . '</div></li>
				<li class="active"><div data-float="fright">' . 'Float right' . '</div></li>
			</ul>
			<input id="adv_encadre_float_input" name="float" type="hidden" value="fright" />
		</li>
	</ul>

	<dl id="adv_encadre_text">
		<dt></dt>
		<dd><textarea	id="adv_encadre_textarea"
				name="text"
				type="text"
				data-message="' . 'Type your text here' . '"	
				class="mce-textbox MceReset MceSelec mceFocus"
			>' . (($selection['bbCode']) ? (htmlspecialchars($selection['bbCode'], ENT_QUOTES, 'UTF-8')) : ('Type your text here')) . '</textarea>

			<p class="info">' . 'Information:' . ' <span>' . 'This text box is a float element, so to display correctly it must be inserted before the main text block' . '</span></p>
		</dd>
	</dl>
</div>';
