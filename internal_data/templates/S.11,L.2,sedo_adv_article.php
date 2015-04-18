<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
if ($options['badIE'])
{
$__output .= '
	';
$this->addRequiredExternal('css', 'sedo_adv_article_ie');
$__output .= '
';
}
else
{
$__output .= '
	';
$this->addRequiredExternal('css', 'sedo_adv_article');
$__output .= '
';
}
$__output .= '

<div class="advbbcodebar_article ' . (($options['responsiveMode']) ? ('responsive') : ('')) . '">
	<fieldset>
		<legend>' . 'Article:' . '</legend>
		' . $content . '
	</fieldset>
	';
if ($options['hasSource'])
{
$__output .= '
		';
if ($options['url'])
{
$__output .= '
			<div class="adv_source">' . (($options['sourceText']) ? ('Source:' . ' ') : ('')) . '<a class="externalLink" rel="nofollow"  target="_blank" href="' . htmlspecialchars($options['url'], ENT_QUOTES, 'UTF-8') . '">' . $options['source'] . '</a></div>
		';
}
else
{
$__output .= '
			<div class="adv_source">' . (($options['sourceText']) ? ('Source:' . ' ') : ('')) . $options['source'] . '</div>
		';
}
$__output .= '
	';
}
$__output .= '
</div>';
