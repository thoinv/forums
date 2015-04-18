<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$this->addRequiredExternal('css', 'sonnb_xengallery_album_list_item');
$__output .= '

<div class="itemGallery" itemscope="itemscope" itemtype="http://schema.org/ImageObject">
	';
if ($album['cover'])
{
$__output .= '
		';
$imageHeight = '';
if ($album['cover']['medium_width'] < XenForo_Template_Helper_Core::styleProperty('sonnb_xengallery_itemwidth'))
{
$imageHeight .= htmlspecialchars($album['cover']['medium_height'], ENT_QUOTES, 'UTF-8');
}
else
{
$imageHeight .= ($album['cover']['medium_height'] * (XenForo_Template_Helper_Core::styleProperty('sonnb_xengallery_itemwidth') / $album['cover']['medium_width']));
}
$__output .= '
		';
$imageHeightReal = '';
if (($imageHeight - 110) < 0)
{
$imageHeightReal .= '110';
}
else
{
$imageHeightReal .= htmlspecialchars($imageHeight, ENT_QUOTES, 'UTF-8');
}
$__output .= '
	';
}
else
{
$__output .= '
		';
$imageHeight = '';
$imageHeight .= '110';
$__output .= '
		';
$imageHeightReal = '';
$imageHeightReal .= '110';
$__output .= '
	';
}
$__output .= '
	<div class="img" data-height="' . htmlspecialchars($album['cover']['medium_height'], ENT_QUOTES, 'UTF-8') . '" data-width="' . htmlspecialchars($album['cover']['medium_width'], ENT_QUOTES, 'UTF-8') . '"> 
		<a class="" href="' . XenForo_Template_Helper_Core::link('gallery/albums', $album, array()) . '" style="width:220px; height: ' . htmlspecialchars($imageHeightReal, ENT_QUOTES, 'UTF-8') . 'px; max-height: ' . htmlspecialchars($imageHeightReal, ENT_QUOTES, 'UTF-8') . 'px;" >
			<img class="lazy" alt="' . htmlspecialchars($album['title'], ENT_QUOTES, 'UTF-8') . '" title="' . htmlspecialchars($album['title'], ENT_QUOTES, 'UTF-8') . '" data-src="' . (($album['cover']['thumbnailUrl']) ? (htmlspecialchars($album['cover']['thumbnailUrl'], ENT_QUOTES, 'UTF-8')) : (XenForo_Template_Helper_Core::styleProperty('sonnbXG_albumEmpty'))) . '" />
			<noscript><img alt="' . htmlspecialchars($album['title'], ENT_QUOTES, 'UTF-8') . '" title="' . htmlspecialchars($album['title'], ENT_QUOTES, 'UTF-8') . '" src="' . (($album['cover']['thumbnailUrl']) ? (htmlspecialchars($album['cover']['thumbnailUrl'], ENT_QUOTES, 'UTF-8')) : (XenForo_Template_Helper_Core::styleProperty('sonnbXG_albumEmpty'))) . '" /></noscript>
		</a>
	</div>

	<meta itemprop="thumbnailUrl" content="' . (($album['cover']['thumbnailUrl']) ? (htmlspecialchars($album['cover']['thumbnailUrl'], ENT_QUOTES, 'UTF-8')) : (XenForo_Template_Helper_Core::styleProperty('sonnbXG_albumEmpty'))) . '">
	<meta itemprop="contentURL" content="' . XenForo_Template_Helper_Core::link('full:gallery/albums', $album, array()) . '">
	<meta itemprop="caption" content="' . htmlspecialchars($album['title'], ENT_QUOTES, 'UTF-8') . '">
	<meta itemprop="publisher" content="' . XenForo_Template_Helper_Core::link('full:members', $album, array()) . '">
	<meta itemprop="datePublished" content="' . XenForo_Template_Helper_Core::datetime($album['album_date'], '') . '">

	<div class="infoAlbum clearfix">
		<div class="titleAlbum">
			<h3 style="text-align: left;">
				<a href="' . XenForo_Template_Helper_Core::link('gallery/albums', $album, array()) . '">' . htmlspecialchars($album['title'], ENT_QUOTES, 'UTF-8') . '</a>
			</h3>
		</div>
		<div class="dateInfo">
			';
if ($album['photo_count'])
{
$__output .= htmlspecialchars($album['photo_count'], ENT_QUOTES, 'UTF-8') . ' ' . 'photos';
}
if ($album['video_count'])
{
$__output .= (($album['photo_count']) ? (' - ') : ('')) . htmlspecialchars($album['video_count'], ENT_QUOTES, 'UTF-8') . ' ' . 'videos';
}
$__output .= '
		</div>
		<div class="userInfo">
			<a title="' . htmlspecialchars($album['username'], ENT_QUOTES, 'UTF-8') . '" href="' . ((XenForo_Template_Helper_Core::styleProperty('sonnbXG_showUserPage')) ? (XenForo_Template_Helper_Core::link('gallery/authors', $album, array())) : (XenForo_Template_Helper_Core::link('members', $album, array()))) . '" class="' . ((!XenForo_Template_Helper_Core::styleProperty('sonnbXG_showUserPage')) ? ('username') : ('')) . '">' . htmlspecialchars($album['username'], ENT_QUOTES, 'UTF-8') . '</a>
			
		</div>
		<div class="dateInfo">
			' . XenForo_Template_Helper_Core::callHelper('datetimehtml', array($album['album_updated_date'],array(
'time' => htmlspecialchars($album['album_updated_date'], ENT_QUOTES, 'UTF-8')
))) . '
		</div>
		';
if ($album['isDeleted'])
{
$__output .= '
			<h3 class="deleteNotice">' . 'This album has been deleted.' . '</h3>
		';
}
$__output .= '
		';
if ($album['isModerated'])
{
$__output .= '
			<h3 class="deleteNotice">' . 'Awaiting Approval' . '</h3>
		';
}
$__output .= '
	</div>
	<ul class="toolAlbum clearfix">
		<li class="likeAlbum">
			<a data-container="#likeCount_' . htmlspecialchars($album['album_id'], ENT_QUOTES, 'UTF-8') . '" class="control ' . (($album['canLike']) ? ('like') : ('')) . ' ' . (($album['like_date']) ? ('active') : ('')) . '" title="' . (($album['canLike'] && $album['like_date']) ? ('Unlike this album') : ('Like this album')) . '" 
				href="' . (($album['canLike']) ? (XenForo_Template_Helper_Core::link('gallery/albums/like', $album, array())) : ('javascript:void(0);')) . '"><i></i><span id="likeCount_' . htmlspecialchars($album['album_id'], ENT_QUOTES, 'UTF-8') . '">' . htmlspecialchars($album['likes'], ENT_QUOTES, 'UTF-8') . '</span></a>
		</li>
		<li class="commentAlbum">
			<a title="' . 'Leave a comment' . '" class="CommentLink control comment ' . (($album['canComment']) ? ('canComment') : ('')) . ' ' . (($album['comment_count']) ? ('hasComment') : ('')) . '" href="' . (($album['canComment']) ? (XenForo_Template_Helper_Core::link('gallery/albums', $album, array()) . '#commentAlbum') : ('javascript:void(0);')) . '"><i></i>' . htmlspecialchars($album['comment_count'], ENT_QUOTES, 'UTF-8') . '</a>
		</li>
		<li class="viewAlbum">
			<a><i></i>' . htmlspecialchars($album['view_count'], ENT_QUOTES, 'UTF-8') . '</a>
		</li>
	</ul>
</div>';
