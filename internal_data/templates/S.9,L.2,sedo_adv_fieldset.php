<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
if ($options['cssIE'])
{
$__output .= '
	';
$this->addRequiredExternal('css', 'sedo_adv_fieldset_ie');
$__output .= '
';
}
else
{
$__output .= '
	';
$this->addRequiredExternal('css', 'sedo_adv_fieldset');
$__output .= '
';
}
$__output .= '

';
if ($options['browser'] == ('ie67'))
{
$__output .= '
	

	<div class="advbbcodebar_fieldset ' . htmlspecialchars($options['blockAlign'], ENT_QUOTES, 'UTF-8') . ' ' . (($options['responsiveMode']) ? ('responsive') : ('')) . '" style="width:' . htmlspecialchars($options['width'], ENT_QUOTES, 'UTF-8') . htmlspecialchars($options['widthType'], ENT_QUOTES, 'UTF-8') . ';">
		<fieldset>
			<legend><span class="advbbcodebar_fieldsetfix">' . (($options['title']) ? ($options['title']) : ('Fieldset')) . '</span></legend>
			' . $content . '
		</fieldset>
	</div>
';
}
else if ($options['browser'] == ('ie'))
{
$__output .= '
	';
if ($xenOptions['AdvBBcodeBar_debug_devmode'])
{
$__output .= '
		';
$this->addRequiredExternal('js', 'js/sedo/advtoolbar/src/advbar_allinone.src.js');
$__output .= '	
	';
}
else
{
$__output .= '
		';
$this->addRequiredExternal('js', 'js/sedo/advtoolbar/advbar_allinone.js');
$__output .= '
	';
}
$__output .= '

	

	<div class="advbbcodebar_fieldset ' . htmlspecialchars($options['blockAlign'], ENT_QUOTES, 'UTF-8') . ' AdvFieldsetTrigger ' . (($options['responsiveMode']) ? ('responsive') : ('')) . '" style="width:' . htmlspecialchars($options['width'], ENT_QUOTES, 'UTF-8') . htmlspecialchars($options['widthType'], ENT_QUOTES, 'UTF-8') . ';">
		<fieldset>
			<legend style="white-space:normal;"><div style="white-space:normal;width:' . (($options['widthType'] == ('px')) ? (htmlspecialchars($options['width'], ENT_QUOTES, 'UTF-8') . htmlspecialchars($options['widthType'], ENT_QUOTES, 'UTF-8')) : ('100%')) . '">' . (($options['title']) ? ($options['title']) : ('Fieldset')) . '</div></legend>
			' . $content . '
		</fieldset>
	</div>
';
}
else
{
$__output .= '
	

	<div class="advbbcodebar_fieldset ' . htmlspecialchars($options['blockAlign'], ENT_QUOTES, 'UTF-8') . ' ' . (($options['responsiveMode']) ? ('responsive') : ('')) . '" style="width:' . htmlspecialchars($options['width'], ENT_QUOTES, 'UTF-8') . htmlspecialchars($options['widthType'], ENT_QUOTES, 'UTF-8') . ';">
		<fieldset>
			<legend>' . (($options['title']) ? ($options['title']) : ('Fieldset')) . '</legend>
			' . $content . '
		</fieldset>
	</div>
';
}
