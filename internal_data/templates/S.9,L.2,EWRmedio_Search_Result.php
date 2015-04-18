<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__output .= '<li id="media-' . htmlspecialchars($media['media_id'], ENT_QUOTES, 'UTF-8') . '" class="searchResult media primaryContent" data-author="' . htmlspecialchars($media['username'], ENT_QUOTES, 'UTF-8') . '">

	<div class="listBlock posterAvatar">' . XenForo_Template_Helper_Core::callHelper('avatarhtml', array($media,(true),array(
'user' => '$media',
'size' => 's',
'img' => 'true'
),'')) . '</div>

	<div class="listBlock main">
		<div class="mediaThumb" style="float: left; padding-right: 5px;">
			<a href="' . XenForo_Template_Helper_Core::link('media', $media, array()) . '">
				<img src="' . XenForo_Template_Helper_Core::callHelper('medio', array(
'0' => $media
)) . '" border="0" alt="' . htmlspecialchars($media['media_title'], ENT_QUOTES, 'UTF-8') . '" class="avatarCropper" style="height: 48px; width: 84px;" />
			</a>
		</div>

		<div class="titleText">
			<h3 class="title">' . htmlspecialchars($i, ENT_QUOTES, 'UTF-8') . ' <a href="' . XenForo_Template_Helper_Core::link('media', $media, array()) . '">' . XenForo_Template_Helper_Core::callHelper('highlight', array(
'0' => $media['media_title'],
'1' => $search['search_query'],
'2' => 'highlight'
)) . '</a></h3>
		</div>

		<div class="meta">
			' . 'Media by' . ': ' . XenForo_Template_Helper_Core::callHelper('usernamehtml', array($media,'',false,array())) . ',
			' . XenForo_Template_Helper_Core::callHelper('datetimehtml', array($media['media_date'],array(
'time' => htmlspecialchars($media['media_date'], ENT_QUOTES, 'UTF-8')
))) . '
			' . 'in category' . ': <a href="' . XenForo_Template_Helper_Core::link('media/category', $media, array()) . '">' . htmlspecialchars($media['category_name'], ENT_QUOTES, 'UTF-8') . '</a>
		</div>

		<blockquote class="snippet"><a href="' . XenForo_Template_Helper_Core::link('media', $media, array()) . '">' . XenForo_Template_Helper_Core::callHelper('snippet', array(
'0' => $media['media_description'],
'1' => '120',
'2' => array(
'term' => $search['search_query'],
'emClass' => 'highlight',
'stripQuote' => '1'
)
)) . '</a></blockquote>

	</div>
</li>';
