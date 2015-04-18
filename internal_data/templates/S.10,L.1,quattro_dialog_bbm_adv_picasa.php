<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$this->addRequiredExternal('css', 'quattro_dialog');
$__output .= '
';
$this->addRequiredExternal('css', 'quattro_dialog_bbm_adv_picasa');
$__output .= '
';
$this->addRequiredExternal('js', 'js/sedo/advtoolbar/tinyquattro/picasa.js');
$__output .= '

<div class="mceTitle FastReload" data-height="100">' . 'Picasa Sideshow Insertion Panel' . '</div>

<div id="adv_picasa">
	<dl class="xenmce_inline adv_picasa">
		<dt>' . 'Picasa url:' . '</dt>
		<dd><input 	id="adv_picasa_source"
				name="source"
				type="text"
				class="mce-textbox MceReset MceLink mceFocus"
				value="' . htmlspecialchars($selection['text'], ENT_QUOTES, 'UTF-8') . '"
			/>
		</dd>	
	</dl>
	<dl class="xenmce_inline adv_picasa">
		<dt>' . 'Width:' . '</dt>
		<dd><input 	id="adv_picasa_width"
				name="width"
				type="text"
				style="width:50px"
				class="mce-textbox"
				value="' . 'Auto' . '"
			/>
		</dd>
		<dt></dt>
		<dd><input 	id="adv_picasa_width_type"
				name="widthType"
				type="text"
				class="mce-textbox disable"
				style="width:20px;margin-right:10px"
				readonly="true"
				value="px" 
			/>
		</dd>

		<dt>' . 'Height:' . '</dt>
		<dd><input 	id="adv_picasa_height"
				name="height"
				type="text"
				style="width:50px"
				class="mce-textbox"
				value="' . 'Auto' . '"
			/>
		</dd>
		<dt></dt>
		<dd><input 	id="adv_picasa_height_type"
				name="heightType"
				type="text"
				class="mce-textbox disable"
				style="width:20px;margin-right:10px"
				readonly="true"
				value="px" 
			/>
		</dd>

		<dt>' . 'Interval:' . '</dt>
		<dd><input 	id="adv_picasa_interval"
				name="interval"
				type="text"
				style="width:50px"
				class="mce-textbox"
				value="' . 'Auto' . '"
			/>
		</dd>
		<dt></dt>
		<dd><input 	id="adv_picasa_interval_type"
				name="intervalType"
				type="text"
				class="mce-textbox disable"
				style="width:80px;"
				readonly="true"
				value="' . 'second(s)' . '" 
			/>
		</dd>
	</dl>
</div>';
