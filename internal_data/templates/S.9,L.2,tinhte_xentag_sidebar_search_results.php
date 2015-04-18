<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$this->addRequiredExternal('css', 'tinhte_xentag');
$__output .= '

';
if ($search['tinhte_xentag_tags'])
{
$__output .= '
	<div class="section Tinhte_XenTag_TagResults avatarList">
		<div class="secondaryContent">
			<h3>' . 'Matched Tags' . '</h3>
			<ul>
				';
foreach ($search['tinhte_xentag_tags'] AS $tag)
{
$__output .= '
						<li class="Tinhte_XenTag_TagResult">
							<span class="muted Tinhte_XenTag_TagResult_ContentCount userTitle">' . XenForo_Template_Helper_Core::numberFormat($tag['content_count'], '0') . '</span>
							<a href="' . XenForo_Template_Helper_Core::link('tags', $tag, array()) . '" class="username NoOverlay">' . htmlspecialchars($tag['tag_text'], ENT_QUOTES, 'UTF-8') . '</a>
							<div class="userTitle">' . htmlspecialchars($tag['tag_description'], ENT_QUOTES, 'UTF-8') . '</div>
						</li>
				';
}
$__output .= '
			</ul>
		</div>
	</div>
';
}
