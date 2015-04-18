<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$this->addRequiredExternal('css', 'sedo_adv_latex');
$__output .= '

<div class="adv_latex_container ' . htmlspecialchars($options['blockAlign'], ENT_QUOTES, 'UTF-8') . ' ' . (($options['responsiveMode']) ? ('responsive') : ('')) . '" style="width:' . htmlspecialchars($options['width'], ENT_QUOTES, 'UTF-8') . htmlspecialchars($options['widthType'], ENT_QUOTES, 'UTF-8') . ';">
	';
if ($options['title'])
{
$__output .= '
		<span class="adv_latex_title">' . $options['title'] . '</span>
	';
}
$__output .= '
	<div class="adv_latex" style="height:' . htmlspecialchars($height, ENT_QUOTES, 'UTF-8') . ';max-height:' . htmlspecialchars($xenOptions['AdvBBcodeBar_latex_maxheight'], ENT_QUOTES, 'UTF-8') . 'px;">
		<img src="' . htmlspecialchars($xenOptions['AdvBBcodeBar_latex_link'], ENT_QUOTES, 'UTF-8') . '?' . (($xenOptions['AdvBBcodeBar_latex_initcmd']) ? (htmlspecialchars($xenOptions['AdvBBcodeBar_latex_initcmd'], ENT_QUOTES, 'UTF-8') . '%20') : ('')) . $content . '" />
	</div>
</div>';
