<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__extraData['head']['twitterCard'] = '';
$__extraData['head']['twitterCard'] .= '
	<meta name="twitter:card" content="photo">
	<meta name="twitter:title" content="' . (($content['description']) ? (htmlspecialchars($content['description'], ENT_QUOTES, 'UTF-8')) : (htmlspecialchars($album['title'], ENT_QUOTES, 'UTF-8'))) . '">
	<meta name="twitter:image" content="' . XenForo_Template_Helper_Core::callHelper('fullurl', array(
'0' => $content['contentUrl'],
'1' => 'true'
)) . '">
	<meta name="twitter:image:width" content="' . htmlspecialchars($content['large_width'], ENT_QUOTES, 'UTF-8') . '">
	<meta name="twitter:image:height" content="' . htmlspecialchars($content['large_height'], ENT_QUOTES, 'UTF-8') . '">
';
