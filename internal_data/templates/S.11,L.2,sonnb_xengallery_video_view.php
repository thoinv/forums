<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__extraData['title'] = '';
$__extraData['title'] .= 'Video "' . htmlspecialchars($content['title'], ENT_QUOTES, 'UTF-8') . '" in the album "' . htmlspecialchars($album['title'], ENT_QUOTES, 'UTF-8') . '" by ' . htmlspecialchars($content['username'], ENT_QUOTES, 'UTF-8') . '' . XenForo_Template_Helper_Core::callHelper('pagenumber', array(
'0' => $page
));
$__output .= '
';
$__extraData['h1'] = '';
$__output .= '

';
$__extraData['head']['openGraph'] = '';
$__extraData['head']['openGraph'] .= '
	';
if ($xenOptions['facebookAppId'] OR $xenOptions['facebookAdmins'])
{
$__extraData['head']['openGraph'] .= '
		';
$__compilerVar47 = '';
$__compilerVar47 .= XenForo_Template_Helper_Core::link('canonical:gallery/videos', $content, array());
$__compilerVar48 = '';
$__compilerVar48 .= XenForo_Template_Helper_Core::callHelper('striphtml', array(
'0' => 'Video "' . $content['title'] . '" in the album "' . $album['title'] . '" by ' . $content['username'] . ''
));
$__compilerVar49 = '';
$__compilerVar49 .= '
				<meta property="og:image" content="' . XenForo_Template_Helper_Core::callHelper('fullurl', array(
'0' => $content['contentUrl'],
'1' => 'true'
)) . '" />
				<meta property="og:description" content="' . XenForo_Template_Helper_Core::callHelper('striphtml', array(
'0' => (($content['description']) ? ($content['description']) : ($album['description']))
)) . '" />
			';
$__compilerVar50 = '';
if ($xenOptions['facebookAppId'] OR $xenOptions['facebookAdmins'])
{
$__compilerVar50 .= '
	<meta property="og:site_name" content="' . htmlspecialchars($xenOptions['boardTitle'], ENT_QUOTES, 'UTF-8') . '" />
	';
if ($avatar)
{
$__compilerVar50 .= '<meta property="og:image" content="' . htmlspecialchars($avatar, ENT_QUOTES, 'UTF-8') . '" />';
}
$__compilerVar50 .= '
	<meta property="og:image" content="';
$__compilerVar51 = '';
$__compilerVar51 .= XenForo_Template_Helper_Core::callHelper('fullurl', array(
'0' => XenForo_Template_Helper_Core::styleProperty('ogLogoPath'),
'1' => '1'
));
$__compilerVar50 .= $this->callTemplateCallback('OpenGraphImage_Callback', 'getImage', $__compilerVar51, array());
unset($__compilerVar51);
$__compilerVar50 .= '" />
	<meta property="og:type" content="' . (($ogType) ? (htmlspecialchars($ogType, ENT_QUOTES, 'UTF-8')) : ('article')) . '" />
	<meta property="og:url" content="' . $__compilerVar47 . '" />
	<meta property="og:title" content="' . $__compilerVar48 . '" />
	';
if ($description)
{
$__compilerVar50 .= '<meta property="og:description" content="' . $description . '" />';
}
$__compilerVar50 .= '
	' . $__compilerVar49 . '
	';
if ($xenOptions['facebookAppId'])
{
$__compilerVar50 .= '<meta property="fb:app_id" content="' . htmlspecialchars($xenOptions['facebookAppId'], ENT_QUOTES, 'UTF-8') . '" />';
}
$__compilerVar50 .= '
	';
if ($xenOptions['facebookAdmins'])
{
$__compilerVar50 .= '<meta property="fb:admins" content="' . XenForo_Template_Helper_Core::callHelper('implode', array(
'0' => $xenOptions['facebookAdmins'],
'1' => ','
)) . '" />';
}
$__compilerVar50 .= '
';
}
$__extraData['head']['openGraph'] .= $__compilerVar50;
unset($__compilerVar47, $__compilerVar48, $__compilerVar49, $__compilerVar50);
$__extraData['head']['openGraph'] .= '
	';
}
else
{
$__extraData['head']['openGraph'] .= '
		<meta property="og:image" content="' . XenForo_Template_Helper_Core::callHelper('fullurl', array(
'0' => $content['contentUrl'],
'1' => 'true'
)) . '" />
		<meta property="og:type" content="article" />
		<meta property="og:url" content="' . XenForo_Template_Helper_Core::link('canonical:gallery/videos', $content, array()) . '" />
		<meta property="og:title" content="' . XenForo_Template_Helper_Core::callHelper('striphtml', array(
'0' => 'Video "' . $content['title'] . '" in the album "' . $album['title'] . '" by ' . $content['username'] . ''
)) . '" />
		<meta property="og:description" content="' . XenForo_Template_Helper_Core::callHelper('striphtml', array(
'0' => (($content['description']) ? ($content['description']) : ($album['description']))
)) . '" />
	';
}
$__extraData['head']['openGraph'] .= '
';
$__output .= '

';
$__extraData['head']['canonical'] = '';
$__extraData['head']['canonical'] .= '
	<link rel="canonical" href="' . XenForo_Template_Helper_Core::link('canonical:gallery/videos', $content, array(
'page' => $page
)) . '" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
	<meta name="apple-mobile-web-app-capable" content="yes" />
';
$__output .= '

';
$__extraData['navigation'] = array();
$__extraData['navigation'] = XenForo_Template_Helper_Core::appendBreadCrumbs($__extraData['navigation'], $breadCrumbs);
$__output .= '

';
$this->addRequiredExternal('css', 'sonnb_xengallery_photo_view');
$__output .= '

';
$this->addRequiredExternal('js', 'js/sonnb/XenGallery/gallery.mobile.js');
$__output .= '
';
$this->addRequiredExternal('js', 'js/sonnb/XenGallery/gallery.js');
$__output .= '
';
$this->addRequiredExternal('js', 'js/sonnb/XenGallery/gallery.overlay.js');
$__output .= '

';
if ($includeTaggerJs AND $content['canComment'])
{
$__output .= '
    ';
$this->addRequiredExternal('js', 'js/sonnb/XenGallery/gallery.usertagger.js');
$__output .= '
';
}
$__output .= '

';
if ($content['canPromote'] || $content['canEdit'])
{
$__output .= '
	';
$promoteButton = '';
$promoteButton .= '
		';
if (!$xenOptions['sonnbXG_disableCollection'] && $content['canPromote'])
{
$promoteButton .= '
			<a href="' . XenForo_Template_Helper_Core::link('gallery/videos/collection-edit', $content, array()) . '" class="callToAction OverlayTrigger" data-cacheOverlay="false"><span>' . (($content['collection_id']) ? ('Change Collection') : ('Add To A Collection')) . '</span></a>
		';
}
$promoteButton .= '
		';
if ($content['canEdit'])
{
$promoteButton .= '
			<a href="' . XenForo_Template_Helper_Core::link('gallery/videos/edit', $content, array()) . '" class="callToAction OverlayTrigger" data-cacheOverlay="false" data-overlayOptions="{&quot;fixed&quot;:false}"><span>' . 'Sửa' . '</span></a>
		';
}
$promoteButton .= '
	';
$__output .= '
	';
$__extraData['topctrl'] = '';
$__extraData['topctrl'] .= $promoteButton;
$__output .= '
';
}
$__output .= '

';
if ($content['title'] AND $content['title'] != $content['content_id'])
{
$__output .= '
<div class="titleBar"> 
	<h1 itemprop="name">' . htmlspecialchars($content['title'], ENT_QUOTES, 'UTF-8') . '</h1>
</div>
';
}
$__output .= '

';
if ($content['isDeleted'])
{
$__output .= '
	<p class="importantMessage">' . 'This video has been deleted.' . '</p>
';
}
$__output .= '
';
if ($content['isModerated'])
{
$__output .= '
	<p class="importantMessage">' . 'Awaiting moderation before being displayed publicly.' . '</p>
';
}
$__output .= '

<div class="pvContentWrapper" itemscope="itemscope" itemtype="http://schema.org/ImageObject">

	<meta itemprop="caption" content="' . htmlspecialchars($content['description'], ENT_QUOTES, 'UTF-8') . '">
	<meta itemprop="publisher" content="' . htmlspecialchars($content['username'], ENT_QUOTES, 'UTF-8') . '">
	<meta itemprop="description" content="' . htmlspecialchars($content['description'], ENT_QUOTES, 'UTF-8') . '">
	<meta itemprop="representativeOfPage" content="true">
	';
if (!$content['video_key'])
{
$__output .= '
		<meta itemprop="contentSize" content="' . htmlspecialchars($content['file_size'], ENT_QUOTES, 'UTF-8') . '">
		<meta itemprop="encodingFormat" content="' . htmlspecialchars($content['extension'], ENT_QUOTES, 'UTF-8') . '">
		<meta itemprop="height" content="' . htmlspecialchars($content['height'], ENT_QUOTES, 'UTF-8') . '">
		<meta itemprop="width" content="' . htmlspecialchars($content['width'], ENT_QUOTES, 'UTF-8') . '">
	';
}
$__output .= '
	<meta itemprop="uploadDate" content="' . XenForo_Template_Helper_Core::datetime($content['content_date'], '') . '">
	<meta itemprop="datePublished" content="' . XenForo_Template_Helper_Core::datetime($content['content_date'], '') . '">

	<div class="pvContentInner clearfix">
		<div class="photoWrapper">
			<div class="pwPhoto video" style="min-height: 0px; line-height: normal;">
				<a class="prevPhoto ' . (($prevContent) ? ('hasPhoto') : ('')) . '" href="' . (($prevContent) ? (htmlspecialchars($prevContent['url'], ENT_QUOTES, 'UTF-8')) : (htmlspecialchars($requestPaths['requestUri'], ENT_QUOTES, 'UTF-8') . '#')) . '"><i></i></a>
				
				';
if ($content['video_key'])
{
$__output .= '
					' . $content['embed'] . '
				';
}
$__output .= '
				
				<a class="nextPhoto ' . (($nextContent) ? ('hasPhoto') : ('')) . '" href="' . (($nextContent) ? (htmlspecialchars($nextContent['url'], ENT_QUOTES, 'UTF-8')) : (htmlspecialchars($requestPaths['requestUri'], ENT_QUOTES, 'UTF-8') . '#')) . '"><i></i></a>
			</div>
			<div class="pwPhotoActions video">
				';
if (XenForo_Template_Helper_Core::styleProperty('sonnbXG_enableOverlay'))
{
$__output .= '
					<a data-target="div.pvContentWrapper" rel="nofollow" href="' . XenForo_Template_Helper_Core::link('gallery/videos', $content, array()) . '" class="action fullscreen" title="' . 'Enter fullscreen mode' . '">
						<i></i>
					</a>
				';
}
$__output .= '
				<a rel="nofollow" href="' . XenForo_Template_Helper_Core::link('gallery/videos/share', $content, array()) . '" class="action share" title="' . 'Share this video with your friends' . '">
					<i></i>
				</a>
				';
if ($content['canLike'])
{
$__output .= '
					<a rel="nofollow" href="' . XenForo_Template_Helper_Core::link('gallery/videos/like', $content, array()) . '" class="action like ' . (($content['like_date']) ? ('active') : ('')) . '" title="' . (($content['like_date']) ? ('Unlike this video') : ('Like this video')) . '">
						<i></i>
					</a>
				';
}
$__output .= '
				';
if ($content['canComment'])
{
$__output .= '
					<a rel="nofollow" href="' . XenForo_Template_Helper_Core::link('gallery/videos/comment', $content, array()) . '" class="action comment" title="' . 'Leave a comment' . '">
						<i></i>
					</a>
				';
}
$__output .= '
			</div>
		</div>
		';
if ($relatedContents)
{
$__output .= '
			<h4>' . 'In This Album' . '</h4>
			<div class="relatedPhotos">
				<a class="prev browse left"><span></span></a>
				<div class="scrollable" id="scrollable">
					<div class="items">
						';
foreach ($relatedContents AS $related)
{
$__output .= '
							<a ' . (($related['content_id'] == $content['content_id']) ? ('class="active"') : ('')) . ' title="' . htmlspecialchars($related['title'], ENT_QUOTES, 'UTF-8') . '" href="' . htmlspecialchars($related['url'], ENT_QUOTES, 'UTF-8') . '"><img alt="' . htmlspecialchars($related['title'], ENT_QUOTES, 'UTF-8') . '" src="' . (($related['thumbnailSmall']) ? (htmlspecialchars($related['thumbnailSmall'], ENT_QUOTES, 'UTF-8')) : (htmlspecialchars($related['thumbnailUrl'], ENT_QUOTES, 'UTF-8'))) . '" /></a>
						';
}
$__output .= '
					</div>
				</div>
				<a class="next browse right"><span></span></a>
			</div>
		';
}
$__output .= '
		';
if ($myPlaylist)
{
$__output .= '
			<h4>' . 'In Your Playlist: ' . '<a href="' . XenForo_Template_Helper_Core::link('gallery/my-playlists', $myPlaylist, array()) . '">' . htmlspecialchars($myPlaylist['title'], ENT_QUOTES, 'UTF-8') . '</a>' . '' . '</h4>
			<div class="relatedPhotos">
				<a class="prev browse left"><span></span></a>
				<div class="scrollable" id="scrollableMyPlaylist">
					<div class="items">
						';
foreach ($myPlaylistItems AS $myPlaylistItem)
{
$__output .= '
							<a ' . (($myPlaylistItem['content_id'] == $content['content_id']) ? ('class="active"') : ('')) . ' title="' . htmlspecialchars($content['title'], ENT_QUOTES, 'UTF-8') . '" href="' . htmlspecialchars($myPlaylistItem['url'], ENT_QUOTES, 'UTF-8') . '"><img alt="' . htmlspecialchars($content['title'], ENT_QUOTES, 'UTF-8') . '" src="' . (($myPlaylistItem['thumbnailSmall']) ? (htmlspecialchars($myPlaylistItem['thumbnailSmall'], ENT_QUOTES, 'UTF-8')) : (htmlspecialchars($myPlaylistItem['thumbnailUrl'], ENT_QUOTES, 'UTF-8'))) . '" /></a>
						';
}
$__output .= '
					</div>
				</div>
				<a class="next browse right"><span></span></a>
			</div>
		';
}
$__output .= '
		<div class="commentWrapper">
			<div class="cwHeader">
				<div class="cwhControls">
				</div>
			</div>
			<div class="commentContainer">
				';
$this->addRequiredExternal('js', 'js/xenforo/comments_simple.js');
$__output .= '

				';
$__compilerVar52 = '';
$__compilerVar52 .= 'content-' . htmlspecialchars($content['content_id'], ENT_QUOTES, 'UTF-8');
$__compilerVar53 = '';
$__compilerVar53 .= '
						<div class="locationContainer muted">
							';
if (!$xenOptions['sonnb_XG_disableLocation'] && $content['content_location'])
{
$__compilerVar53 .= '
								<span class="photoLocation">' . 'Captured at' . ' <a itemprop="contentLocation" target="_blank" href="' . XenForo_Template_Helper_Core::link('gallery/locations', array(
'location_url' => $content['content_location']
), array()) . '">' . htmlspecialchars($content['content_location'], ENT_QUOTES, 'UTF-8') . '</a></span>
							';
}
$__compilerVar53 .= '
							';
if ($content['tagUsers'])
{
$__compilerVar53 .= '
								' . XenForo_Template_Helper_Core::callHelper('sonnb_xengallery_tag', array(
'0' => $content['tagUsers'],
'1' => XenForo_Template_Helper_Core::link('gallery/videos/tags', $content, array(), false)
)) . '
							';
}
$__compilerVar53 .= '

							<div id="fieldList-content-' . htmlspecialchars($content['content_id'], ENT_QUOTES, 'UTF-8') . '" class="fieldListContainer">
								';
if ($fields)
{
$__compilerVar53 .= '
									';
foreach ($fields AS $field)
{
$__compilerVar53 .= '
										';
$__compilerVar54 = '';
$__compilerVar55 = '';
$__compilerVar55 .= '
			';
if (is_array($field['fieldValueHtml']))
{
$__compilerVar55 .= '
				<ul>
				';
foreach ($field['fieldValueHtml'] AS $_fieldValueHtml)
{
$__compilerVar55 .= '
					<li>' . $_fieldValueHtml . '</li>
				';
}
$__compilerVar55 .= '
				</ul>
			';
}
else
{
$__compilerVar55 .= '
				' . $field['fieldValueHtml'] . '
			';
}
$__compilerVar55 .= '
		';
if (trim($__compilerVar55) !== '')
{
$__compilerVar54 .= '
	<dl class="ctrlUnit">
		<dt class="muted">' . htmlspecialchars($field['title'], ENT_QUOTES, 'UTF-8') . ':</dt> 
		<dd>' . $__compilerVar55 . '</dd>
	</dl>
';
}
unset($__compilerVar55);
$__compilerVar53 .= $__compilerVar54;
unset($__compilerVar54);
$__compilerVar53 .= '
									';
}
$__compilerVar53 .= '
								';
}
$__compilerVar53 .= '
							</div>
						</div>
					';
$__compilerVar56 = '';
$__compilerVar56 .= '

						<div class="messageMeta">
								<div class="privateControls">
									<a itemprop="contentURL" href="' . XenForo_Template_Helper_Core::link('gallery/videos', $content, array()) . '" title="' . 'Permalink' . '" class="item muted">' . XenForo_Template_Helper_Core::callHelper('datetimehtml', array($content['content_date'],array(
'time' => '$content.content_date'
))) . '</a>
									';
$__compilerVar57 = '';
$__compilerVar57 .= '
										';
if ($content['canEdit'])
{
$__compilerVar57 .= '
											<a href="' . XenForo_Template_Helper_Core::link('gallery/videos/edit', $content, array()) . '" class="item control edit NoOverlay OverlayTrigger" data-cacheOverlay="false" data-overlayOptions="{&quot;fixed&quot;:false}"><span></span>' . 'Sửa' . '</a>
										';
}
$__compilerVar57 .= '
										';
if ($content['canDelete'])
{
$__compilerVar57 .= '
											<a href="' . XenForo_Template_Helper_Core::link('gallery/videos/delete', $content, array()) . '" class="item OverlayTrigger control delete"><span></span>' . 'Xóa' . '</a>
										';
}
$__compilerVar57 .= '
										';
if ($content['canReport'])
{
$__compilerVar57 .= '
											<a href="' . XenForo_Template_Helper_Core::link('gallery/videos/report', $content, array()) . '" class="OverlayTrigger item control report" data-cacheOverlay="false"><span></span>' . 'Báo cáo' . '</a>
										';
}
$__compilerVar57 .= '
									';
$__compilerVar56 .= $this->callTemplateHook('video_private_controls', $__compilerVar57, array(
'video' => $content
));
unset($__compilerVar57);
$__compilerVar56 .= '
								</div>
								
								';
$__compilerVar58 = '';
$__compilerVar58 .= '
										';
$__compilerVar59 = '';
$__compilerVar59 .= '
										';
if ($content['canWatch'])
{
$__compilerVar59 .= '
											<a href="' . XenForo_Template_Helper_Core::link('gallery/videos/watch', $content, array()) . '" class="WatchLink item control ' . (($content['watch_date']) ? ('unwatch') : ('watch')) . '"><span></span><span class="WatchLabel">' . (($content['watch_date']) ? ('Unwatch') : ('Watch')) . '</span></a>
										';
}
$__compilerVar59 .= '
										';
if ($content['canLike'])
{
$__compilerVar59 .= '
											<a href="' . XenForo_Template_Helper_Core::link('gallery/videos/like', $content, array()) . '" class="LikeLink item control ' . (($content['like_date']) ? ('unlike') : ('like')) . '" data-container="#likes-wp-' . htmlspecialchars($content['content_id'], ENT_QUOTES, 'UTF-8') . '"><span></span><span class="LikeLabel">' . (($content['like_date']) ? ('Không thích nữa') : ('Thích')) . '</span></a>
										';
}
$__compilerVar59 .= '
										';
if ($content['canComment'])
{
$__compilerVar59 .= '
											<a href="' . XenForo_Template_Helper_Core::link('gallery/videos/comment', $content, array()) . '" data-commentArea="#commentVideo' . htmlspecialchars($content['content_id'], ENT_QUOTES, 'UTF-8') . '"
												data-postParams="' . htmlspecialchars(XenForo_Template_Helper_Core::callHelper('json', array(
'0' => array(
'after' => $lastShownCommentDate
)
)), ENT_QUOTES, 'UTF-8', true) . '"
												class="XenGalleryCommentPoster item control postComment" ><span></span>' . 'Bình luận' . '</a>
										';
}
$__compilerVar59 .= '
										';
$__compilerVar58 .= $this->callTemplateHook('video_public_controls', $__compilerVar59, array(
'video' => $content
));
unset($__compilerVar59);
$__compilerVar58 .= '
									';
if (trim($__compilerVar58) !== '')
{
$__compilerVar56 .= '
									<div class="publicControls">
									' . $__compilerVar58 . '
									</div>
								';
}
unset($__compilerVar58);
$__compilerVar56 .= '
						</div>

						<form action="' . XenForo_Template_Helper_Core::link('gallery/inline-mod-comment/switch', false, array()) . '" method="post"
							class="InlineModForm"
							data-cookieName="sxgcomments"
							data-overlayId="InlineModOverlayComment"
							data-controls="#InlineModControlsComment"
							data-imodOptions="#ModerationSelectComment">
							
							<ol class="messageResponse" itemscope="itemscope" itemtype="http://schema.org/UserComments">
								';
if ($content['likes'])
{
$__compilerVar56 .= '
									<meta itemprop="interactionCount" content="UserLikes:' . htmlspecialchars($content['likes'], ENT_QUOTES, 'UTF-8') . '"/>
								';
}
$__compilerVar56 .= '		
								<li id="likes-wp-' . htmlspecialchars($content['content_id'], ENT_QUOTES, 'UTF-8') . '">
									';
if ($content['likes'])
{
$__compilerVar56 .= '
										';
$__compilerVar60 = '';
$__compilerVar60 .= XenForo_Template_Helper_Core::link('gallery/videos/likes', $content, array());
$__compilerVar61 = '';
if ($content['likes'])
{
$__compilerVar61 .= '
	';
$this->addRequiredExternal('css', 'likes_summary');
$__compilerVar61 .= '
	<div class="likesSummary secondaryContent">
		<span class="LikeText">
			' . XenForo_Template_Helper_Core::callHelper('likeshtml', array($content['likes'],$__compilerVar60,$content['like_date'],$content['likeUsers'])) . '
		</span>
	</div>
';
}
$__compilerVar56 .= $__compilerVar61;
unset($__compilerVar60, $__compilerVar61);
$__compilerVar56 .= '
									';
}
$__compilerVar56 .= '
								</li>

								';
if ($content['comments'])
{
$__compilerVar56 .= '
									<meta itemprop="interactionCount" content="UserComments:' . htmlspecialchars($content['comment_count'], ENT_QUOTES, 'UTF-8') . '"/>
									';
if ($content['comment_count'] > $commentOnLoad)
{
$__compilerVar56 .= '
										';
$__compilerVar62 = '';
$__compilerVar62 .= '<li class="commentMore secondaryContent">
	<a href="' . XenForo_Template_Helper_Core::link('gallery/videos/comments', $content, array()) . '"
		class="XenGalleryCommentLoader"
		data-loadParams="' . htmlspecialchars(XenForo_Template_Helper_Core::callHelper('json', array(
'0' => array(
'before' => $firstShownCommentDate
)
)), ENT_QUOTES, 'UTF-8', true) . '">' . 'View previous comments' . '...</a>
	<span class="muted">' . '' . htmlspecialchars($commentShownCount, ENT_QUOTES, 'UTF-8') . ' of ' . htmlspecialchars($content['comment_count'], ENT_QUOTES, 'UTF-8') . '' . '</span>
</li>';
$__compilerVar56 .= $__compilerVar62;
unset($__compilerVar62);
$__compilerVar56 .= '
									';
}
$__compilerVar56 .= '

									';
foreach ($content['comments'] AS $comment)
{
$__compilerVar56 .= '
										';
$__compilerVar63 = '';
$__compilerVar63 .= '<li id="comment_' . htmlspecialchars($comment['comment_id'], ENT_QUOTES, 'UTF-8') . '" class="comment secondaryContent ' . (($comment['isIgnored']) ? ('ignored') : ('')) . '" itemscope="itemscope" itemtype="http://schema.org/Comment" itemprop="comment">
	
	<meta itemprop="commentTime" content="' . XenForo_Template_Helper_Core::datetime($comment['comment_date'], '') . '">	
	<meta itemprop="creator" content="' . htmlspecialchars($comment['username'], ENT_QUOTES, 'UTF-8') . '">
	' . XenForo_Template_Helper_Core::callHelper('avatarhtml', array($comment,(true),array(
'user' => '$comment',
'size' => 's',
'img' => 'true'
),'')) . '

	<div class="commentInfo">
		';
$__compilerVar64 = '';
$__compilerVar64 .= '
					';
if ($comment['isDeleted'])
{
$__compilerVar64 .= '
						<li class="deletedNotice"><span class="icon Tooltip" title="' . 'Bị xóa' . '" data-tipclass="iconTip flipped"></span>' . 'This message has been removed from public view.' . '</li>
					';
}
else if ($comment['isModerated'])
{
$__compilerVar64 .= '
						<li class="moderatedNotice"><span class="icon Tooltip" title="' . 'Awaiting moderation' . '" data-tipclass="iconTip flipped"></span>' . 'This message is awaiting moderator approval, and is invisible to normal visitors.' . '</li>
					';
}
$__compilerVar64 .= '
					';
if ($comment['isIgnored'])
{
$__compilerVar64 .= '
						<li>' . 'You are ignoring content by this member.' . ' <a href="javascript:" class="jsOnly DisplayIgnoredContent">' . 'Show Ignored Content' . '</a></li>
					';
}
$__compilerVar64 .= '
				';
if (trim($__compilerVar64) !== '')
{
$__compilerVar63 .= '
			<ul class="messageNotices">
				' . $__compilerVar64 . '
			</ul>
		';
}
unset($__compilerVar64);
$__compilerVar63 .= '
		<div class="commentContent">
			<a href="' . ((XenForo_Template_Helper_Core::styleProperty('sonnbXG_showUserPage')) ? (XenForo_Template_Helper_Core::link('gallery/authors', $comment, array())) : (XenForo_Template_Helper_Core::link('members', $comment, array()))) . '" class="' . ((!XenForo_Template_Helper_Core::styleProperty('sonnbXG_showUserPage')) ? ('username') : ('')) . ' poster">' . htmlspecialchars($comment['username'], ENT_QUOTES, 'UTF-8') . '</a>
			<article><blockquote itemprop="commentText">' . $comment['message'] . '</blockquote></article>
		</div>
		<div class="messageMeta">
			<div class="privateControls">
				';
if ($comment['canInlineMod'])
{
$__compilerVar63 .= '
					<input type="checkbox" value="' . htmlspecialchars($comment['comment_id'], ENT_QUOTES, 'UTF-8') . '" class="InlineModCheck item" id="inlineModCheck-comment-' . htmlspecialchars($comment['comment_id'], ENT_QUOTES, 'UTF-8') . '" data-target="#comment_' . htmlspecialchars($comment['comment_id'], ENT_QUOTES, 'UTF-8') . '" title="' . 'Select comment id: ' . htmlspecialchars($comment['comment_id'], ENT_QUOTES, 'UTF-8') . '' . '" name="sxgcomments" />
				';
}
$__compilerVar63 .= '
				<a href="' . XenForo_Template_Helper_Core::link('gallery/comments', $comment, array()) . '" title="' . 'Permalink' . '" class="item muted">' . XenForo_Template_Helper_Core::callHelper('datetimehtml', array($comment['comment_date'],array(
'time' => '$comment.comment_date'
))) . '</a>
				';
if ($comment['canEdit'])
{
$__compilerVar63 .= '
					<a href="' . XenForo_Template_Helper_Core::link('gallery/comments/edit', $comment, array()) . '" class="item control edit"><span></span>' . 'Sửa' . '</a>
				';
}
$__compilerVar63 .= '
				';
if ($comment['canDelete'])
{
$__compilerVar63 .= '
					<a href="' . XenForo_Template_Helper_Core::link('gallery/comments/delete', $comment, array()) . '" class="item control delete"><span></span>' . 'Xóa' . '</a>
				';
}
$__compilerVar63 .= '
				
				';
if ($comment['canWarn'])
{
$__compilerVar63 .= '
					<a href="' . XenForo_Template_Helper_Core::link('members/warn', $comment, array(
'content_type' => 'sonnb_xengallery_comment',
'content_id' => $comment['comment_id']
)) . '" class="item control warn"><span></span>' . 'Cảnh cáo' . '</a>
				';
}
else if ($comment['warning_id'] && $canViewWarnings)
{
$__compilerVar63 .= '
					<a href="' . XenForo_Template_Helper_Core::link('warnings', $comment, array()) . '" class="OverlayTrigger item control viewWarning"><span></span>' . 'View Warning' . '</a>
				';
}
$__compilerVar63 .= '
				';
if ($comment['canReport'])
{
$__compilerVar63 .= '
					<a href="' . XenForo_Template_Helper_Core::link('gallery/comments/report', $comment, array()) . '" class="OverlayTrigger item control report" data-cacheOverlay="false"><span></span>' . 'Báo cáo' . '</a>
				';
}
$__compilerVar63 .= '
			</div>
			
			';
$__compilerVar65 = '';
$__compilerVar65 .= '
					';
if ($comment['canLike'])
{
$__compilerVar65 .= '
						<a href="' . XenForo_Template_Helper_Core::link('gallery/comments/like', $comment, array()) . '" class="LikeLink item control ' . (($comment['like_date']) ? ('unlike') : ('like')) . '" data-container="#likes-comment-' . htmlspecialchars($comment['comment_id'], ENT_QUOTES, 'UTF-8') . '"><span></span><span class="LikeLabel">' . (($comment['like_date']) ? ('Không thích nữa') : ('Thích')) . '</span></a>
					';
}
$__compilerVar65 .= '
					';
if ($comment['canComment'])
{
$__compilerVar65 .= '
						<a href="' . XenForo_Template_Helper_Core::link('gallery/comments/comment', $comment, array()) . '" class="CommentPoster item control postComment" data-commentArea="#commentSubmit-' . htmlspecialchars($comment['comment_id'], ENT_QUOTES, 'UTF-8') . '"><span></span>' . 'Bình luận' . '</a>
					';
}
$__compilerVar65 .= '
				';
if (trim($__compilerVar65) !== '')
{
$__compilerVar63 .= '
				<div class="publicControls">
				' . $__compilerVar65 . '
				</div>
			';
}
unset($__compilerVar65);
$__compilerVar63 .= '
		</div>
		<div id="likes-comment-' . htmlspecialchars($comment['comment_id'], ENT_QUOTES, 'UTF-8') . '">
			';
if ($comment['likes'])
{
$__compilerVar63 .= '
				';
$__compilerVar66 = '';
$__compilerVar66 .= XenForo_Template_Helper_Core::link('gallery/comments/likes', $comment, array());
$__compilerVar67 = '';
if ($comment['likes'])
{
$__compilerVar67 .= '
	';
$this->addRequiredExternal('css', 'likes_summary');
$__compilerVar67 .= '
	<div class="likesSummary secondaryContent">
		<span class="LikeText">
			' . XenForo_Template_Helper_Core::callHelper('likeshtml', array($comment['likes'],$__compilerVar66,$comment['like_date'],$comment['likeUsers'])) . '
		</span>
	</div>
';
}
$__compilerVar63 .= $__compilerVar67;
unset($__compilerVar66, $__compilerVar67);
$__compilerVar63 .= '
			';
}
$__compilerVar63 .= '
		</div>
	</div>
</li>';
$__compilerVar56 .= $__compilerVar63;
unset($__compilerVar63);
$__compilerVar56 .= '
									';
}
$__compilerVar56 .= '

								';
}
$__compilerVar56 .= '

								';
if ($content['canComment'])
{
$__compilerVar56 .= '
									<li id="commentVideo' . htmlspecialchars($content['content_id'], ENT_QUOTES, 'UTF-8') . '" class="comment secondaryContent">
										' . XenForo_Template_Helper_Core::callHelper('avatarhtml', array($visitor,(true),array(
'user' => '$visitor',
'size' => 's',
'img' => 'true'
),'')) . '
										<div class="elements">
											<textarea name="message" rows="2" class="textCtrl Elastic UserTagger"></textarea>
											<div class="submit"><input type="submit" class="button primary" value="' . 'Đăng bình luận' . '" /></div>
										</div>
									</li>
								';
}
$__compilerVar56 .= '

							</ol>
							';
if ($inlineModOptions)
{
$__compilerVar56 .= '
								';
$__compilerVar68 = '';
$__compilerVar69 = '';
$__compilerVar69 .= 'InlineModControlsComment';
$__compilerVar70 = '';
$__compilerVar70 .= 'ModerationSelectComment';
$__compilerVar71 = '';
$__compilerVar71 .= 'Comment Moderation';
$__compilerVar72 = '';
$__compilerVar72 .= '
		';
if ($inlineModOptions['delete'])
{
$__compilerVar72 .= '<option value="delete">' . 'Delete Comments' . '...</option>';
}
$__compilerVar72 .= '
		';
if ($inlineModOptions['undelete'])
{
$__compilerVar72 .= '<option value="undelete">' . 'Undelete Comments' . '</option>';
}
$__compilerVar72 .= '
		';
if ($inlineModOptions['approve'])
{
$__compilerVar72 .= '<option value="approve">' . 'Approve Comments' . '</option>';
}
$__compilerVar72 .= '
		';
if ($inlineModOptions['unapprove'])
{
$__compilerVar72 .= '<option value="unapprove">' . 'Unapprove Comments' . '</option>';
}
$__compilerVar72 .= '
		<option value="deselect">' . 'Deselect Comments' . '</option>
	';
$__compilerVar73 = '';
$__compilerVar73 .= 'Select / Deselect all loaded comments.';
$__compilerVar74 = '';
$__compilerVar74 .= 'Select comments';
$__compilerVar75 = '';
$this->addRequiredExternal('css', 'sonnb_xengallery_inline_mod_controls');
$__compilerVar75 .= '
';
$this->addRequiredExternal('js', 'js/sonnb/XenGallery/gallery.inlinemod.js');
$__compilerVar75 .= '

<span id="' . (($__compilerVar69) ? (htmlspecialchars($__compilerVar69, ENT_QUOTES, 'UTF-8')) : ('InlineModControls')) . '" class="InlineModControls">
	<span class="selectionControl secondaryContent">
		<label for="ModerationCheck">
			' . 'Chọn tất cả' . ' <input type="checkbox" id="ModerationCheck" title="' . htmlspecialchars($__compilerVar73, ENT_QUOTES, 'UTF-8') . '" />
		</label>

		<input type="button" class="button ClickNext" value="&darr;" title="' . 'Chuyển xuống' . '" />
		<input type="button" class="button ClickPrev" value="&uarr;" title="' . 'Chuyển lên trên' . '" />
		<a class="SelectionCount">' . htmlspecialchars($__compilerVar74, ENT_QUOTES, 'UTF-8') . ': <em class="InlineModCheckedTotal">0</em></a>
	</span>

	<span class="actionControl sectionFooter">
		<span class="commonActions">
			';
if ($inlineModOptions['delete'])
{
$__compilerVar75 .= '<input type="submit" class="button" value="' . 'Xóa' . '..." name="delete" />';
}
$__compilerVar75 .= '
			';
if ($inlineModOptions['approve'])
{
$__compilerVar75 .= '<input type="submit" class="button" value="' . 'Duyệt bài' . '" name="approve" />';
}
$__compilerVar75 .= '
		</span>

		<span class="otherActions">
			<select name="a" id="' . (($__compilerVar70) ? (htmlspecialchars($__compilerVar70, ENT_QUOTES, 'UTF-8')) : ('ModerationSelect')) . '" class="textCtrl ModerationSelect">
				<option value="">' . 'Hành động khác' . '...</option>
				<optgroup label="' . 'Hành động Quản lý' . '">
					' . $__compilerVar72 . '
				</optgroup>
				<option value="closeOverlay">' . 'Đóng lớp phủ này' . '</option>
			</select>

			<input type="submit" class="button primary" value="' . 'Tới' . '" />
			<input type="reset" class="button OverlayCloser overylayOnly" value="X" title="' . 'Cancel and close these controls' . '" />
		</span>
	</span>
</span>';
$__compilerVar68 .= $__compilerVar75;
unset($__compilerVar69, $__compilerVar70, $__compilerVar71, $__compilerVar72, $__compilerVar73, $__compilerVar74, $__compilerVar75);
$__compilerVar56 .= $__compilerVar68;
unset($__compilerVar68);
$__compilerVar56 .= '
							';
}
$__compilerVar56 .= '
							
							<input type="hidden" name="_xfToken" value="' . htmlspecialchars($visitor['csrf_token_page'], ENT_QUOTES, 'UTF-8') . '" />
						</form>
						
					';
$__compilerVar76 = '';
$this->addRequiredExternal('css', 'message_simple');
$__compilerVar76 .= '
';
$this->addRequiredExternal('css', 'bb_code');
$__compilerVar76 .= '

<div class="commentWrapper">
	<div id="' . htmlspecialchars($__compilerVar52, ENT_QUOTES, 'UTF-8') . '" class="messageSimple ' . (($content['isDeleted']) ? ('deleted') : ('')) . ' ' . (($content['is_admin'] OR $content['is_moderator']) ? ('staff') : ('')) . ' ' . (($content['isIgnored']) ? ('ignored') : ('')) . '" data-author="' . htmlspecialchars($content['username'], ENT_QUOTES, 'UTF-8') . '">

		' . XenForo_Template_Helper_Core::callHelper('avatarhtml', array($content,false,array(
'user' => '$message',
'size' => 's'
),'')) . '
		
		<div class="messageInfo">
			
			';
$__compilerVar77 = '';
$__compilerVar77 .= '
						';
$__compilerVar78 = '';
$__compilerVar78 .= '
							';
if ($content['warning_message'])
{
$__compilerVar78 .= '
								<li class="warningNotice"><span class="icon Tooltip" title="' . 'Warning' . '" data-tipclass="iconTip flipped"></span>' . htmlspecialchars($content['warning_message'], ENT_QUOTES, 'UTF-8') . '</li>
							';
}
$__compilerVar78 .= '
							';
if ($content['isIgnored'])
{
$__compilerVar78 .= '
								<li>' . 'You are ignoring content by this member.' . ' <a href="javascript:" class="jsOnly DisplayIgnoredContent">' . 'Show Ignored Content' . '</a></li>
							';
}
$__compilerVar78 .= '
						';
$__compilerVar77 .= $this->callTemplateHook('message_simple_notices', $__compilerVar78, array(
'message' => $content
));
unset($__compilerVar78);
$__compilerVar77 .= '
					';
if (trim($__compilerVar77) !== '')
{
$__compilerVar76 .= '
				<ul class="messageNotices">
					' . $__compilerVar77 . '
				</ul>
			';
}
unset($__compilerVar77);
$__compilerVar76 .= '

			<div class="messageContent">
				<a href="' . ((XenForo_Template_Helper_Core::styleProperty('sonnbXG_showUserPage')) ? (XenForo_Template_Helper_Core::link('gallery/authors', $content, array())) : (XenForo_Template_Helper_Core::link('members', $content, array()))) . '" class="' . ((!XenForo_Template_Helper_Core::styleProperty('sonnbXG_showUserPage')) ? ('username') : ('')) . ' poster">' . htmlspecialchars($content['username'], ENT_QUOTES, 'UTF-8') . '</a>
				<article><blockquote class="ugc baseHtml">' . $content['descriptionHtml'] . '</blockquote></article>
				' . $__compilerVar53 . '
			</div>

			' . $__compilerVar56 . '
		</div>
	</div>
</div>';
$__output .= $__compilerVar76;
unset($__compilerVar52, $__compilerVar53, $__compilerVar56, $__compilerVar76);
$__output .= '
				<div class="commentControls">
					';
if ($content['canEdit'])
{
$__output .= '
					<h4>' . 'Privacy' . '</h4>
					<div class="albumInfo">
						<div class="albumPrivacy">
							<span class="muted">' . htmlspecialchars($content['allow_view_html'], ENT_QUOTES, 'UTF-8') . '</span> <a class="OverlayTrigger" href="' . XenForo_Template_Helper_Core::link('gallery/videos/privacy', $content, array()) . '">' . 'Sửa' . '</a>
						</div>
					</div>
					';
}
$__output .= '
					
					';
$__compilerVar79 = '';
$__compilerVar79 .= '
							';
if ($content['contentStreams'] || ($content['canEdit'] && !$content['contentStreams']))
{
$__compilerVar79 .= '
							<div class="streamList">
								<ul>
									';
if ($content['contentStreams'])
{
$__compilerVar79 .= '
									';
foreach ($content['contentStreams'] AS $stream)
{
$__compilerVar79 .= '
										';
$__compilerVar80 = '';
$__compilerVar80 .= '<li id="stream__' . htmlspecialchars($stream, ENT_QUOTES, 'UTF-8') . '">
	<span class="streamItem">
		<a href="' . XenForo_Template_Helper_Core::link('gallery/streams', array(
'stream_name' => $stream
), array()) . '">' . htmlspecialchars($stream, ENT_QUOTES, 'UTF-8') . '</a>
		';
if ($content['canEdit'])
{
$__compilerVar80 .= '
			<a class="delete" title="' . 'Xóa' . '" href="' . XenForo_Template_Helper_Core::link('gallery/videos/stream-delete', $content, array(
'stream_name' => $stream
)) . '">[x]</a>
		';
}
$__compilerVar80 .= '
	</span>
</li>';
$__compilerVar79 .= $__compilerVar80;
unset($__compilerVar80);
$__compilerVar79 .= '
									';
}
$__compilerVar79 .= '
									';
}
$__compilerVar79 .= '
								</ul>
							</div>	
							';
}
$__compilerVar79 .= '				
							';
if ($content['canEdit'])
{
$__compilerVar79 .= '
							<form class="xenForm" method="POST" action="' . XenForo_Template_Helper_Core::link('gallery/videos/stream-add', $content, array()) . '">
								<input id="addStream" data-acUrl="' . XenForo_Template_Helper_Core::link('gallery/streams/find', '', array(
'_xfResponseType' => 'json'
)) . '" class="textCtrl AutoComplete" type="text" name="stream_name" value="" placeholder="" autocomplete="off" />
								<p class="explain muted">' . 'Separate each stream with a comma: my family, my car, etc.' . '</p>									
								<input type="submit" value="' . 'Add Streams' . '" name="submit" class="primary button" />
								<input type="hidden" value="' . htmlspecialchars($visitor['csrf_token_page'], ENT_QUOTES, 'UTF-8') . '" name="_xfToken">
							</form>
							';
}
$__compilerVar79 .= '
						';
if (trim($__compilerVar79) !== '')
{
$__output .= '
					<h4 class="streamingHeader">' . 'Streams' . ' ';
if ($content['canEdit'])
{
$__output .= '<a class="editToggle" href="' . htmlspecialchars($requestPaths['requestUri'], ENT_QUOTES, 'UTF-8') . '#">' . 'Add Streams' . '</a>';
}
$__output .= '</h4>
					<div class="streaming streamingEditor">
						' . $__compilerVar79 . '
					</div>
					';
}
unset($__compilerVar79);
$__output .= '
					';
$__compilerVar81 = '';
$__compilerVar81 .= '
								';
if ($content['canEdit'])
{
$__compilerVar81 .= '
									<div class="iconActionLinks">
											<a class="OverlayTrigger" href="' . XenForo_Template_Helper_Core::link('gallery/videos/playlist', $content, array()) . '" data-cacheOverlay="false"><i></i><span>' . 'Add to my playlists' . '</span></a>
											<a class="item control people quickEdit" data-quickForm="formTagVideo" data-reset="true" href="' . XenForo_Template_Helper_Core::link('gallery/videos/tag', $content, array()) . '" data-cacheOverlay="false"><i></i><span>' . 'Tag this video' . '</span></a>
											';
if (!$xenOptions['sonnb_XG_disableLocation'])
{
$__compilerVar81 .= '
												<a class="item control location OverlayTrigger" href="' . XenForo_Template_Helper_Core::link('gallery/videos/location', $content, array()) . '" data-cacheOverlay="false" data-overlayOptions="{&quot;fixed&quot;:false}"><i></i><span>' . 'Edit Location' . '</span></a>
											';
}
$__compilerVar81 .= '
											<a class="OverlayTrigger" href="' . XenForo_Template_Helper_Core::link('gallery/videos/move', $content, array()) . '"><i></i><span>' . 'Move this video' . '</span></a>
											<a class="OverlayTrigger" href="' . XenForo_Template_Helper_Core::link('gallery/videos/thumbnail', $content, array()) . '"><i></i><span>' . (($content['medium_height']) ? ('Update video thumbnail') : ('Add video thumbnail')) . '</span></a>
									</div>
								';
}
$__compilerVar81 .= '
								';
if ($content['canChangeOwner'])
{
$__compilerVar81 .= '<a class="OverlayTrigger" href="' . XenForo_Template_Helper_Core::link('gallery/videos/owner', $content, array()) . '"><i></i><span>' . 'Change Video\'s Owner' . '</span></a>';
}
$__compilerVar81 .= '
								';
if ($content['canDelete'])
{
$__compilerVar81 .= '<a class="OverlayTrigger" href="' . XenForo_Template_Helper_Core::link('gallery/videos/delete', $content, array()) . '"><i></i><span>' . 'Delete this video' . '</span></a>';
}
$__compilerVar81 .= '
							';
if (trim($__compilerVar81) !== '')
{
$__output .= '
						<h4>' . 'Actions' . '</h4>
						<div class="photoControls">
							' . $__compilerVar81 . '
						</div>
					';
}
unset($__compilerVar81);
$__output .= '
				</div>
			</div>
		</div>
	</div>
</div>

<div style="display:none">
	';
$__compilerVar82 = '';
$__compilerVar82 .= '1';
$__compilerVar83 = '';
if (!$__compilerVar82)
{
$__compilerVar83 .= '
	';
$__extraData['title'] = '';
$__extraData['title'] .= 'Share this video with your friends';
$__compilerVar83 .= '
	';
$__extraData['h1'] = '';
$__extraData['h1'] .= 'Share this video with your friends';
$__compilerVar83 .= '
	';
$__extraData['pageDescription'] = array();
$__extraData['pageDescription']['content'] = '';
if ($content['description'])
{
$__extraData['pageDescription']['content'] .= htmlspecialchars($content['description'], ENT_QUOTES, 'UTF-8');
}
else
{
$__extraData['pageDescription']['content'] .= htmlspecialchars($album['description'], ENT_QUOTES, 'UTF-8');
}
$__compilerVar83 .= '

	';
$__extraData['navigation'] = array();
$__extraData['navigation'] = XenForo_Template_Helper_Core::appendBreadCrumbs($__extraData['navigation'], $breadCrumbs);
$__compilerVar83 .= '
';
}
$__compilerVar83 .= '

';
$this->addRequiredExternal('css', 'sonnb_xengallery_photo_share');
$__compilerVar83 .= '
<div class="' . (($class) ? (htmlspecialchars($class, ENT_QUOTES, 'UTF-8')) : ('shareContainer')) . ' section">
	<div class="shareContent">
		<ul class="shareList">
			<li class="share-options">
				<div class="share-options-header">
					<span class="caret"></span>
					' . 'Share this via' . '...
				</div>
				<div class="share-options-inner">
					<ul class="share-services">
						<li class="share-service">
							<a class="share-action google" title="' . 'Share on ' . 'Google+' . '' . '" href="' . htmlspecialchars($requestPaths['requestUri'], ENT_QUOTES, 'UTF-8') . '#" data-url="' . XenForo_Template_Helper_Core::link('full:gallery/videos', $content, array()) . '" data-thumbnail="' . XenForo_Template_Helper_Core::callHelper('fullurl', array(
'0' => $content['thumbnailUrl'],
'1' => '1'
)) . '">
								<span class="share-icon google"></span>
								<span class="service-name">Google+</span>
							</a>
						</li>
						<li class="share-service">
							<a class="share-action facebook" title="' . 'Share on ' . 'Facebook' . '' . '" href="' . htmlspecialchars($requestPaths['requestUri'], ENT_QUOTES, 'UTF-8') . '#" data-url="' . XenForo_Template_Helper_Core::link('full:gallery/videos', $content, array()) . '" data-thumbnail="' . XenForo_Template_Helper_Core::callHelper('fullurl', array(
'0' => $content['thumbnailUrl'],
'1' => '1'
)) . '">
								<span class="share-icon facebook"></span>
								<span class="service-name">Facebook</span>
							</a>
						</li>
						<li class="share-service">
							<a class="share-action twitter" title="' . 'Share on ' . 'Twitter' . '' . '" href="' . htmlspecialchars($requestPaths['requestUri'], ENT_QUOTES, 'UTF-8') . '#" data-url="' . XenForo_Template_Helper_Core::link('full:gallery/videos', $content, array()) . '" data-thumbnail="' . XenForo_Template_Helper_Core::callHelper('fullurl', array(
'0' => $content['thumbnailUrl'],
'1' => '1'
)) . '">
								<span class="share-icon twitter"></span>
								<span class="service-name">Twitter</span>
							</a>
						</li>
						<li class="share-service">
							<a class="share-action tumblr" title="' . 'Share on ' . 'Tumblr' . '' . '" href="' . htmlspecialchars($requestPaths['requestUri'], ENT_QUOTES, 'UTF-8') . '#" data-url="' . XenForo_Template_Helper_Core::link('full:gallery/videos', $content, array()) . '" data-thumbnail="' . XenForo_Template_Helper_Core::callHelper('fullurl', array(
'0' => $content['thumbnailUrl'],
'1' => '1'
)) . '">
								<span class="share-icon tumblr"></span>
								<span class="service-name">Tumblr</span>
							</a>
						</li>
						<li class="share-service">
							<a class="share-action pinterest" title="' . 'Share on ' . 'Pinterest' . '' . '" href="' . htmlspecialchars($requestPaths['requestUri'], ENT_QUOTES, 'UTF-8') . '#" data-url="' . XenForo_Template_Helper_Core::link('full:gallery/videos', $content, array()) . '" data-thumbnail="' . XenForo_Template_Helper_Core::callHelper('fullurl', array(
'0' => $content['thumbnailUrl'],
'1' => '1'
)) . '">
								<span class="share-icon pinterest"></span>
								<span class="service-name">Pinterest</span>
							</a>
						</li>
					</ul>

				</div>
			</li>
			<li class="share-options share-options-open">
				<div class="share-options-header">
					<span>' . 'Grab the link' . '</span>
				</div>
				<div class="share-options-inner">
					<p class="muted">' . 'Here\'s a link to this video. Just copy and paste!' . '</p>
					<p>
						<input type="text" class="textCtrl" value="' . XenForo_Template_Helper_Core::link('full:gallery/videos', $content, array()) . '">
					</p>
					<p class="muted">' . 'Here is direct link of this video' . '</p>
					<p>
						<input type="text" class="textCtrl" value="' . XenForo_Template_Helper_Core::callHelper('fullurl', array(
'0' => $content['thumbnailUrl'],
'1' => '1'
)) . '">
					</p>
				</div>
			</li>
			<li class="share-options">
				<div class="share-options-header">
					<span>' . 'Grab the HTML/BBCode' . '</span>
				</div>
				<div class="share-options-inner">
					<p class="muted">' . 'Copy and paste the code below (' . 'HTML' . ')' . ':</p>
					<p>
						<textarea class="textCtrl html Elastic">' . '<a href="' . XenForo_Template_Helper_Core::link('full:gallery/videos', $content, array()) . '" title="' . htmlspecialchars($content['title'], ENT_QUOTES, 'UTF-8') . ' by ' . htmlspecialchars($content['username'], ENT_QUOTES, 'UTF-8') . ', on ' . htmlspecialchars($xenOptions['boardTitle'], ENT_QUOTES, 'UTF-8') . '"><img src="' . XenForo_Template_Helper_Core::callHelper('fullurl', array(
'0' => $content['thumbnailUrl'],
'1' => '1'
)) . '" alt="' . htmlspecialchars($content['title'], ENT_QUOTES, 'UTF-8') . '" /></a>' . '</textarea>
					</p>
					<p class="muted">' . 'Copy and paste the code below (' . 'BBCode' . ')' . ':</p>
					<p>
						<textarea class="textCtrl bbcode Elastic">' . '[URL=' . XenForo_Template_Helper_Core::link('full:gallery/videos', $content, array()) . '][IMG]' . XenForo_Template_Helper_Core::callHelper('fullurl', array(
'0' => $content['thumbnailUrl'],
'1' => '1'
)) . '[/IMG][/URL]
[URL=' . XenForo_Template_Helper_Core::link('full:gallery/videos', $content, array()) . ']' . htmlspecialchars($content['title'], ENT_QUOTES, 'UTF-8') . '[/URL] by [URL=' . XenForo_Template_Helper_Core::link('full:gallery/authors', $contentvideo, array()) . ']' . htmlspecialchars($content['username'], ENT_QUOTES, 'UTF-8') . '[/URL] on ' . htmlspecialchars($xenOptions['boardTitle'], ENT_QUOTES, 'UTF-8') . '' . '</textarea>
					</p>
				</div>
			</li>
		</ul>
		<div class="clearfix"></div>
	</div>
</div>';
$__output .= $__compilerVar83;
unset($__compilerVar82, $__compilerVar83);
$__output .= '
</div>
';
$__compilerVar84 = '';
$__compilerVar84 .= 'quickEditForm';
$__compilerVar85 = '';
$__compilerVar85 .= 'formTagVideo';
$__compilerVar86 = '';
$__compilerVar86 .= '<form action="' . XenForo_Template_Helper_Core::link('gallery/videos/tag', $content, array()) . '" method="post"
	class="xenForm ' . (($__compilerVar84) ? (htmlspecialchars($__compilerVar84, ENT_QUOTES, 'UTF-8')) : ('AutoValidator')) . ' formOverlay" ' . (($__compilerVar85) ? ('id="' . htmlspecialchars($__compilerVar85, ENT_QUOTES, 'UTF-8') . '"') : ('')) . ' 
	data-redirect="on">
	
	<dl class="ctrlUnit surplusLabel fullWidth">
		<dt><label for="ctrl_with">' . 'Tag People' . ':</label></dt>
		<dd>
			<input type="text" name="content_people" class="textCtrl AutoComplete" id="ctrl_with" autofocus="true"
				placeholder="' . 'Who was there with you?' . '..." value="' . (($content['content_people']) ? (htmlspecialchars($content['content_people'], ENT_QUOTES, 'UTF-8')) : ('')) . '"/>
			<p class="explain">' . 'Dãn cách tên bằng dấu phẩy(,).' . '</p>
		</dd>
	</dl>
	
	<dl class="ctrlUnit submitUnit">
		<dt></dt>
		<dd>
			<input type="submit" value="' . 'Lưu' . '" accesskey="s" class="button primary" />
			<input type="reset" value="' . 'Hủy bỏ' . '" accesskey="d" class="button primary closer" />
		</dd>
	</dl>

	<input type="hidden" name="_xfToken" value="' . htmlspecialchars($visitor['csrf_token_page'], ENT_QUOTES, 'UTF-8') . '" />
</form>';
$__output .= $__compilerVar86;
unset($__compilerVar84, $__compilerVar85, $__compilerVar86);
$__output .= '
';
$__compilerVar87 = '';
if ($triggerFullscreen && XenForo_Template_Helper_Core::styleProperty('sonnbXG_triggerFullscreen') && XenForo_Template_Helper_Core::styleProperty('sonnbXG_enableOverlay'))
{
$__compilerVar87 .= '
	<script type="text/javascript">
		!function($, window, document, _undefined)
		{
			$(document).ready(function()
			{
				//console.log(XenForo.XenGalleryOverlayToggle.prototype.show);
				//XenForo.XenGalleryOverlayToggle.prototype.show();
				var $overlay = new XenForo.XenGalleryOverlayToggle($(\'.action.fullscreen\'));
				//$overlay.$toggle.click();
				$overlay.show();
				//$(\'.action.fullscreen\').trigger(\'click\');
			});
		}(jQuery, this, document);
	</script>
';
}
$__output .= $__compilerVar87;
unset($__compilerVar87);
$__output .= '
';
$__compilerVar88 = '';
$__compilerVar88 .= XenForo_Template_Helper_Core::link('canonical:gallery/videos', $content, array());
$__compilerVar89 = '';
$__compilerVar90 = '';
$__compilerVar90 .= '
			';
$__compilerVar91 = '';
$__compilerVar91 .= '
			';
if ($xenOptions['tweet']['enabled'])
{
$__compilerVar91 .= '
				<div class="tweet shareControl">
					<a href="https://twitter.com/share" class="twitter-share-button"
						data-count="horizontal"
						data-lang="' . XenForo_Template_Helper_Core::callHelper('twitterLang', array(
'0' => $visitorLanguage['language_code']
)) . '"
						data-url="' . htmlspecialchars($__compilerVar88, ENT_QUOTES, 'UTF-8') . '"
						' . (($thread['title']) ? ('data-text="' . XenForo_Template_Helper_Core::callHelper('threadPrefix', array(
'0' => $thread,
'1' => 'escaped'
)) . htmlspecialchars($thread['title'], ENT_QUOTES, 'UTF-8') . '"') : ('')) . '
						' . (($xenOptions['tweet']['via']) ? ('data-via="' . htmlspecialchars($xenOptions['tweet']['via'], ENT_QUOTES, 'UTF-8') . '"') : ('')) . '
						' . (($xenOptions['tweet']['related']) ? ('data-related="' . htmlspecialchars($xenOptions['tweet']['related'], ENT_QUOTES, 'UTF-8') . '"') : ('')) . '>' . 'Tweet' . '</a>
				</div>
			';
}
$__compilerVar91 .= '
			';
if ($xenOptions['plusone'])
{
$__compilerVar91 .= '
				<div class="plusone shareControl">
					<div class="g-plusone" data-size="medium" data-count="true" data-href="' . htmlspecialchars($__compilerVar88, ENT_QUOTES, 'UTF-8') . '"></div>
				</div>
			';
}
$__compilerVar91 .= '
			';
if ($xenOptions['facebookLike'])
{
$__compilerVar91 .= '
				<div class="facebookLike shareControl">
					';
$__extraData['facebookSdk'] = '';
$__extraData['facebookSdk'] .= '1';
$__compilerVar91 .= '
					<fb:like href="' . htmlspecialchars($__compilerVar88, ENT_QUOTES, 'UTF-8') . '" show_faces="true" width="400" action="' . htmlspecialchars($xenOptions['facebookLikeAction'], ENT_QUOTES, 'UTF-8') . '" font="trebuchet ms" colorscheme="' . XenForo_Template_Helper_Core::styleProperty('fbColorScheme') . '"></fb:like>
				</div>
			';
}
$__compilerVar91 .= '
			';
$__compilerVar90 .= $this->callTemplateHook('share_page_options', $__compilerVar91, array());
unset($__compilerVar91);
$__compilerVar90 .= '
		';
if (trim($__compilerVar90) !== '')
{
$__compilerVar89 .= '
	';
$this->addRequiredExternal('css', 'share_page');
$__compilerVar89 .= '

	<div class="sharePage">
		<h3 class="textHeading larger">' . 'Chia sẻ trang này' . '</h3>
		' . $__compilerVar90 . '
	</div>
';
}
unset($__compilerVar90);
$__output .= $__compilerVar89;
unset($__compilerVar88, $__compilerVar89);
$__output .= '
';
$__compilerVar92 = '';
$__output .= $this->callTemplateHook('sonnb_cr_information', $__compilerVar92, array());
unset($__compilerVar92);
