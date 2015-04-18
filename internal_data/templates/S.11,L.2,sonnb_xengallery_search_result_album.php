<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__output .= '<li id="xengallery-album-' . htmlspecialchars($album['album_id'], ENT_QUOTES, 'UTF-8') . '" class="searchResult sonnb_xengallery_album primaryContent' . (($album['isIgnored']) ? (' ignored') : ('')) . '" data-author="' . htmlspecialchars($album['username'], ENT_QUOTES, 'UTF-8') . '">

	<div class="listBlock posterAvatar">' . XenForo_Template_Helper_Core::callHelper('avatarhtml', array($album,(true),array(
'user' => '$album',
'size' => 's',
'img' => 'true'
),'')) . '</div>

	<div class="listBlock main">
		<div class="titleText">
			<span class="contentType">' . 'Album' . '</span>
			<h3 class="title"><a href="' . XenForo_Template_Helper_Core::link('gallery/albums', $album, array()) . '">' . XenForo_Template_Helper_Core::callHelper('highlight', array(
'0' => $album['title'],
'1' => $search['search_query'],
'2' => 'highlight'
)) . '</a></h3>
		</div>

		<blockquote class="snippet">
			<a href="' . XenForo_Template_Helper_Core::link('gallery/albums', $album, array()) . '">' . XenForo_Template_Helper_Core::callHelper('snippet', array(
'0' => $album['description'],
'1' => '200',
'2' => array(
'term' => $search['search_query'],
'emClass' => 'highlight',
'stripQuotes' => '1'
)
)) . '</a>
			';
if ($album['photos'])
{
$__output .= '
				<br /><br />
				';
foreach ($album['photos'] AS $content)
{
$__output .= '
					<a href="' . XenForo_Template_Helper_Core::link('gallery/photos', $content, array()) . '" class="attachedImages">
						<img src="' . htmlspecialchars($content['thumbnailSmall'], ENT_QUOTES, 'UTF-8') . '" style="max-height: 64px;" alt="" />
					</a>
				';
}
$__output .= '
			';
}
$__output .= '
		</blockquote>

		<div class="meta">
			' . XenForo_Template_Helper_Core::callHelper('usernamehtml', array($album,'',false,array())) . ',
			' . XenForo_Template_Helper_Core::callHelper('datetimehtml', array($album['album_date'],array(
'time' => '$album.album_date'
))) . ',
			' . XenForo_Template_Helper_Core::numberFormat($album['comment_count'], '0') . ' ' . 'Bình luận' . '
		</div>
	</div>

</li>';
