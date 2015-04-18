<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__output .= '<li id="xengallery-content-' . htmlspecialchars($content['content_id'], ENT_QUOTES, 'UTF-8') . '" class="searchResult sonnb_xengallery_photo primaryContent' . (($content['isIgnored']) ? (' ignored') : ('')) . '" data-author="' . htmlspecialchars($content['username'], ENT_QUOTES, 'UTF-8') . '">

	<div class="listBlock posterAvatar">' . XenForo_Template_Helper_Core::callHelper('avatarhtml', array($content,(true),array(
'user' => '$content',
'size' => 's',
'img' => 'true'
),'')) . '</div>

	<div class="listBlock main">
		<div class="titleText">
			<span class="contentType">' . 'Photo' . '</span>
			<h3 class="title"><a href="' . XenForo_Template_Helper_Core::link('gallery/photos', $content, array()) . '">' . XenForo_Template_Helper_Core::callHelper('highlight', array(
'0' => $album['title'],
'1' => $search['search_query'],
'2' => 'highlight'
)) . '</a></h3>
		</div>

		<blockquote class="snippet">
			<a href="' . XenForo_Template_Helper_Core::link('gallery/photos', $content, array()) . '">' . XenForo_Template_Helper_Core::callHelper('snippet', array(
'0' => $content['description'],
'1' => '200',
'2' => array(
'term' => $search['search_query'],
'emClass' => 'highlight',
'stripQuotes' => '1'
)
)) . '</a>
			<br /><br />
			<a href="' . XenForo_Template_Helper_Core::link('gallery/photos', $content, array()) . '" class="attachedImages">
				<img src="' . htmlspecialchars($content['thumbnailSmall'], ENT_QUOTES, 'UTF-8') . '" style="max-height: 64px;" alt="" />
			</a>
		</blockquote>

		<div class="meta">
			' . XenForo_Template_Helper_Core::callHelper('usernamehtml', array($content,'',false,array())) . ',
			' . XenForo_Template_Helper_Core::callHelper('datetimehtml', array($content['content_date'],array(
'time' => '$content.content_date'
))) . ',
			' . XenForo_Template_Helper_Core::numberFormat($content['comment_count'], '0') . ' ' . 'Bình luận' . '
		</div>
	</div>

</li>';
