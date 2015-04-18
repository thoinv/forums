<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
if ($tags)
{
$__output .= '
	';
$this->addRequiredExternal('css', 'tinhte_xentag');
$__output .= '

	<ul class="Tinhte_XenTag_TagCloud trending">
		';
foreach ($tags AS $tag)
{
$__output .= '
			<li class="Tinhte_XenTag_TagCloudTag Tinhte_XenTag_TagCloud_Level' . htmlspecialchars($tag['cloudLevel'], ENT_QUOTES, 'UTF-8') . '">
				<a href="' . XenForo_Template_Helper_Core::link('tags', $tag, array()) . '"
					' . (($tag['tag_title']) ? ('title="' . htmlspecialchars($tag['tag_title'], ENT_QUOTES, 'UTF-8') . '" class="Tooltip"') : ('')) . '>
					' . htmlspecialchars($tag['tag_text'], ENT_QUOTES, 'UTF-8') . '
				</a>
			</li>
		';
}
$__output .= '
	</ul>
';
}
