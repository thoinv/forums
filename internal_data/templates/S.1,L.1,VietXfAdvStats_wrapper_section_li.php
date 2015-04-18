<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
if ($section['rendered'])
{
$__output .= '
	<li id="' . htmlspecialchars($section['section_id'], ENT_QUOTES, 'UTF-8') . '" class="VietXfAdvStats_BlockContent ' . htmlspecialchars($liClass, ENT_QUOTES, 'UTF-8') . '">
		' . $section['rendered'] . '
	</li>
';
}
else
{
$__output .= '
	<li id="' . htmlspecialchars($section['section_id'], ENT_QUOTES, 'UTF-8') . '" class="VietXfAdvStats_BlockContent ' . htmlspecialchars($liClass, ENT_QUOTES, 'UTF-8') . '" data-loadUrl="' . htmlspecialchars($section['section_link'], ENT_QUOTES, 'UTF-8') . '">
		' . 'Loading' . '...
		<noscript><a href="' . htmlspecialchars($section['section_link'], ENT_QUOTES, 'UTF-8') . '\'}">' . 'View' . '</a></noscript>
	</li>
';
}
