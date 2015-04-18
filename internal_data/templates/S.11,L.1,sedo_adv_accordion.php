<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$this->addRequiredExternal('css', 'sedo_adv_accordion');
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

';
if ($options['slides'])
{
$__output .= '
	<dl id="' . htmlspecialchars($options['uniqid'], ENT_QUOTES, 'UTF-8') . '" 
		class="adv_accordion ' . htmlspecialchars($options['blockAlign'], ENT_QUOTES, 'UTF-8') . ' ' . (($options['responsiveMode']) ? ('responsive') : ('')) . '"
		data-easing="' . htmlspecialchars($xenOptions['AdvBBcodeBar_accordion_slides_easing_effect'], ENT_QUOTES, 'UTF-8') . '"
		data-duration="' . htmlspecialchars($xenOptions['AdvBBcodeBar_accordion_slides_easing_duration'], ENT_QUOTES, 'UTF-8') . '"
		style="display:block;width:' . htmlspecialchars($options['width'], ENT_QUOTES, 'UTF-8') . htmlspecialchars($options['widthType'], ENT_QUOTES, 'UTF-8') . ';"
	>
		';
$i = 0;
$total = count($options['slides']);
foreach ($options['slides'] AS $slide)
{
$i++;
$__output .= '
			';
$slideClass = '';
if ($i == 1)
{
$slideClass .= 'first';
}
else if ($i == $total)
{
$slideClass .= 'last';
}
else
{
$slideClass .= 'between';
}
$__output .= '
			<dt 	class="' . htmlspecialchars($slideClass, ENT_QUOTES, 'UTF-8') . ' ' . (($slide['class_open']) ? (htmlspecialchars($slide['class_open'], ENT_QUOTES, 'UTF-8')) : ('')) . '" 
				style="text-align:' . htmlspecialchars($slide['align'], ENT_QUOTES, 'UTF-8') . ';">
				' . (($slide['title']) ? ($slide['title']) : ('Slide ' . htmlspecialchars($i, ENT_QUOTES, 'UTF-8'))) . '
			</dt>
			<dd 	class="' . htmlspecialchars($slideClass, ENT_QUOTES, 'UTF-8') . ' ' . (($slide['open']) ? (htmlspecialchars($slide['open'], ENT_QUOTES, 'UTF-8')) : ('')) . ' ' . (($slide['class_open']) ? (htmlspecialchars($slide['class_open'], ENT_QUOTES, 'UTF-8')) : ('')) . '"
				' . (($slide['height']) ? ('style="height:' . htmlspecialchars($slide['height'], ENT_QUOTES, 'UTF-8') . 'px;overflow-x:hidden;overflow-y:auto;"') : ('')) . '>' . $slide['content'] . '
			</dd>	
		';
}
$__output .= '
	</dl>
';
}
else
{
$__output .= '
	no slide
';
}
