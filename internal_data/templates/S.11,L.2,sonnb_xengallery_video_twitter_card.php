<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__extraData['head']['twitterCard'] = '';
$__extraData['head']['twitterCard'] .= '
	<meta name="twitter:card" content="player">
	<meta name="twitter:title" content="' . (($content['title']) ? (htmlspecialchars($content['title'], ENT_QUOTES, 'UTF-8')) : (htmlspecialchars($album['title'], ENT_QUOTES, 'UTF-8'))) . '">
	<meta name="twitter:description" content="' . (($content['description']) ? (htmlspecialchars($content['description'], ENT_QUOTES, 'UTF-8')) : (htmlspecialchars($album['description'], ENT_QUOTES, 'UTF-8'))) . '">
	<meta name="twitter:player" content="' . XenForo_Template_Helper_Core::link('full:gallery/videos/player', $content, array()) . '">
	<meta name="twitter:player:width" content="' . htmlspecialchars($content['medium_width'], ENT_QUOTES, 'UTF-8') . '">
	<meta name="twitter:player:height" content="' . htmlspecialchars($content['medium_height'], ENT_QUOTES, 'UTF-8') . '">
	<meta name="twitter:image" content="' . XenForo_Template_Helper_Core::callHelper('fullurl', array(
'0' => $content['thumbnailUrl'],
'1' => 'true'
)) . '">
';
