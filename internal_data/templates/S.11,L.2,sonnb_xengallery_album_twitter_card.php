<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
if ($album['photos'])
{
$__output .= '
	';
$__extraData['head']['twitterCard'] = '';
$__extraData['head']['twitterCard'] .= '
		<meta name="twitter:card" content="gallery">
		<meta name="twitter:title" content="' . XenForo_Template_Helper_Core::callHelper('striphtml', array(
'0' => $album['title']
)) . '">
		<meta name="twitter:description" content="' . XenForo_Template_Helper_Core::callHelper('striphtml', array(
'0' => XenForo_Template_Helper_Core::callHelper('wordTrim', array(
'0' => $album['description'],
'1' => '200'
))
)) . '">
		';
foreach ($album['photos'] AS $key => $__photo)
{
$__extraData['head']['twitterCard'] .= '
			<meta name="twitter:image' . htmlspecialchars($key, ENT_QUOTES, 'UTF-8') . ':src" content="' . XenForo_Template_Helper_Core::callHelper('fullurl', array(
'0' => (($__photo['photoUrl']) ? ($__photo['photoUrl']) : ($__photo['thumbnailUrl'])),
'1' => 'true'
)) . '">
		';
}
$__extraData['head']['twitterCard'] .= '
	';
$__output .= '
';
}
