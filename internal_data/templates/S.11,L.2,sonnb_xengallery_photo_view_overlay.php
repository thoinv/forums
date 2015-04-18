<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$this->addRequiredExternal('css', 'sonnb_xengallery_photo_view_overlay');
$__output .= '

';
$this->addRequiredExternal('js', 'js/sonnb/XenGallery/gallery.mobile.js');
$__output .= '
';
$this->addRequiredExternal('js', 'js/sonnb/XenGallery/gallery.js');
$__output .= '
';
$this->addRequiredExternal('js', 'js/sonnb/XenGallery/jquery.phototag.min.js');
$__output .= '
';
$this->addRequiredExternal('js', 'js/sonnb/XenGallery/jquery.mobile-1.3.2.min.js');
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

<a class="originalLink" title="' . 'Open regular page' . '" href="' . XenForo_Template_Helper_Core::link('gallery/photos', $content, array(
'regular' => '1'
)) . '"></a>
<a class="close OverlayCloser"></a>
<div class="goWrapper">
	<div class="goMedia" >
		<div class="goActions">
			<span class="title">' . XenForo_Template_Helper_Core::callHelper('wordTrim', array(
'0' => $content['title'],
'1' => '50'
)) . '</span>
			<ul>
				<li><a href="' . XenForo_Template_Helper_Core::link('gallery/photos/share', $content, array()) . '" class="action share" title="' . 'Share this photo with your friends.' . '">' . 'Share' . '</a></li>
				<li><a target="_blank" href="' . XenForo_Template_Helper_Core::link('gallery/photos/download', $content, array()) . '"><i></i><span>' . 'Download' . '</span></a></li>
				';
if ($content['canEdit'])
{
$__output .= '
					<li>
						<ul class="Popup edit">
					 		<a rel="Menu">' . 'Sửa' . '</a>
					 		<ul class="Menu JsOnly" id="XenGalleryOverlayEdit">
								<li><a class="OverlayTrigger" href="' . XenForo_Template_Helper_Core::link('gallery/photos/privacy', $content, array()) . '" data-cacheOverlay="false"><i></i><span>' . 'Privacy' . '</span></a></li>
								';
if (!$xenOptions['sonnb_XG_disableLocation'])
{
$__output .= '
									<li><a class="OverlayTrigger" href="' . XenForo_Template_Helper_Core::link('gallery/photos/location', $content, array()) . '" data-cacheOverlay="false" data-overlayOptions="{&quot;fixed&quot;:false}"><i></i><span>' . 'Location' . '</span></a></li>
								';
}
$__output .= '
								<li><a class="OverlayTrigger" href="' . XenForo_Template_Helper_Core::link('gallery/photos/move', $content, array()) . '"><i></i><span>' . 'Move Photo' . '</span></a></li>
								<li><a class="OverlayTrigger" href="' . XenForo_Template_Helper_Core::link('gallery/photos/rotate', $content, array()) . '"><i></i><span>' . 'Rotate This Photo' . '</span></a></li>
								';
if (!$xenOptions['sonnbXG_disableCollection'] && $content['canPromote'])
{
$__output .= '
									<li><a href="' . XenForo_Template_Helper_Core::link('gallery/photos/collection-edit', $content, array()) . '" class="OverlayTrigger" data-cacheOverlay="false"><span>' . (($content['collection_id']) ? ('Change Collection') : ('Add To A Collection')) . '</span></a></li>
								';
}
$__output .= '
								';
if ($album['canEdit'])
{
$__output .= '<li><a class="OverlayTrigger" href="' . XenForo_Template_Helper_Core::link('gallery/photos/make-cover', $content, array()) . '"><i></i><span>' . 'Make Album Cover' . '</span></a></li>';
}
$__output .= '
								';
if ($content['canChangeOwner'])
{
$__output .= '
								    <li><a class="OverlayTrigger" href="' . XenForo_Template_Helper_Core::link('gallery/photos/owner', $content, array()) . '"><i></i><span>' . 'Change Photo\'s Owner' . '</span></a></li>
								';
}
$__output .= '
								';
if ($content['canDelete'])
{
$__output .= '
									<li><a href="' . XenForo_Template_Helper_Core::link('gallery/photos/delete', $content, array()) . '" class="OverlayTrigger"><span>' . 'Xóa' . '</span></a></li>
								';
}
$__output .= '
							</ul>
						</ul>
					</li>
				';
}
$__output .= '
				';
$__compilerVar24 = '';
$__compilerVar24 .= '
									';
if (!$xenOptions['sonnbXG_disableOriginal'] && $content['canDownloadFull'])
{
$__compilerVar24 .= '
										<li><a target="_blank" href="' . htmlspecialchars($content['originalUrl'], ENT_QUOTES, 'UTF-8') . '"><span>' . 'View Original Photo' . '</span></a></li>
										<li><a target="_blank" href="' . XenForo_Template_Helper_Core::link('gallery/photos/download', $content, array(
'fullsize' => '1'
)) . '"><span>' . 'Download Original' . '</span></a></li>
									';
}
$__compilerVar24 .= '
									';
if ($visitor['user_id'])
{
$__compilerVar24 .= '
										<li><a class="OverlayTrigger" href="' . XenForo_Template_Helper_Core::link('gallery/photos/set-cover', $content, array()) . '"><i></i><span>' . 'Set My Gallery\'s Cover' . '</span></a></li>
										<li><a class="OverlayTrigger" href="' . XenForo_Template_Helper_Core::link('gallery/photos/make-avatar', $content, array()) . '"><i></i><span>' . 'Set As My Avatar' . '</span></a></li>
									';
}
$__compilerVar24 .= '
								';
if (trim($__compilerVar24) !== '')
{
$__output .= '
					<li>
						<ul class="Popup more">
							<a rel="Menu">' . 'More' . '</a>
							<ul class="Menu JsOnly" id="XenGalleryOverlayMore">
								' . $__compilerVar24 . '
							</ul>
						</ul>
					</li>
				';
}
unset($__compilerVar24);
$__output .= '
			</ul>
		</div>
		<div class="goMediaHolder ' . (($relatedContents) ? ('hasRelated') : ('')) . '" id="photoTag-canvas_' . htmlspecialchars($content['content_id'], ENT_QUOTES, 'UTF-8') . '">
			<div class="goMediaContainer" id="photoTag-wrap_' . htmlspecialchars($content['content_id'], ENT_QUOTES, 'UTF-8') . '">
				<img title="' . XenForo_Template_Helper_Core::callHelper('wordTrim', array(
'0' => $content['description'],
'1' => '100'
)) . '" alt="' . XenForo_Template_Helper_Core::callHelper('wordTrim', array(
'0' => $content['description'],
'1' => '100'
)) . '"
					class="photo lazy ' . (($content['canEdit']) ? ('canTag') : ('')) . '" data-lazy="' . htmlspecialchars($content['thumbnailUrl'], ENT_QUOTES, 'UTF-8') . '" data-src="' . htmlspecialchars($content['contentUrl'], ENT_QUOTES, 'UTF-8') . '"
					data-width="' . htmlspecialchars($content['large_width'], ENT_QUOTES, 'UTF-8') . '" data-height="' . htmlspecialchars($content['large_height'], ENT_QUOTES, 'UTF-8') . '"
					data-tagrequesturl="' . XenForo_Template_Helper_Core::link('canonical:gallery/photos/tags', $content, array()) . '"
					data-tagdeleteurl="' . (($content['canEdit']) ? (XenForo_Template_Helper_Core::link('canonical:gallery/tags/delete', false, array())) : ('')) . '"
					data-tagaddurl="' . (($content['canEdit']) ? (XenForo_Template_Helper_Core::link('canonical:gallery/photos/tag', $content, array())) : ('')) . '"
					data-token="' . htmlspecialchars($visitor['csrf_token_page'], ENT_QUOTES, 'UTF-8') . '"
					data-savephrase="' . 'Lưu' . '" data-imagewrapper=".goMedia"
					data-cancelphrase="' . 'Hủy bỏ' . '" />
			</div>
			<a class="prevPhoto ' . (($prevContent) ? ('hasPhoto') : ('')) . '" href="' . (($prevContent) ? (htmlspecialchars($prevContent['url'], ENT_QUOTES, 'UTF-8')) : ('javascript:void(0);')) . '"><i></i></a>
			<a class="nextPhoto ' . (($nextContent) ? ('hasPhoto') : ('')) . '" href="' . (($nextContent) ? (htmlspecialchars($nextContent['url'], ENT_QUOTES, 'UTF-8')) : ('javascript:void(0);')) . '"><i></i></a>
			<div class="photoTag-cpanel" id="photoTag-cpanel_' . htmlspecialchars($content['content_id'], ENT_QUOTES, 'UTF-8') . '">
				' . 'Click on the photo to start tagging.' . ' <a href="javascript:void(0);">' . 'Done Tagging' . '</a>
			</div>
			';
if (XenForo_Template_Helper_Core::callHelper('strlen', array(
'0' => $content['description']
)))
{
$__output .= '
				<span class="caption full" id="caption-content-overlay-' . htmlspecialchars($content['content_id'], ENT_QUOTES, 'UTF-8') . '">' . $content['description'] . '</span>
			';
}
$__output .= '
			<div class="pwPhotoActions">
				<a rel="nofollow" href="' . XenForo_Template_Helper_Core::link('gallery/photos/share', $content, array()) . '" class="action share" title="' . 'Share this photo with your friends.' . '">
					<i></i>
				</a>
				';
if ($content['canLike'])
{
$__output .= '
					<a rel="nofollow" href="' . XenForo_Template_Helper_Core::link('gallery/photos/like', $content, array()) . '" class="action like ' . (($content['like_date']) ? ('active') : ('')) . '"
						title="' . (($content['like_date']) ? ('Unlike this photo') : ('Like this photo')) . '">
						<i></i>
					</a>
				';
}
$__output .= '
				<a rel="nofollow" href="' . XenForo_Template_Helper_Core::link('gallery/photos', $content, array()) . '#commentPhoto' . htmlspecialchars($content['content_id'], ENT_QUOTES, 'UTF-8') . '" class="action comment" title="' . 'Leave a comment' . '">
					<i></i>
				</a>
				';
if ($content['canEdit'])
{
$__output .= '
					<a rel="nofollow" href="javascript:void(0);" class="action tag addTag" title="' . 'Tag This Photo' . '">
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
	</div>
	<div class="goCommentWrapper">
		<div class="goCommentContainer">
			';
$this->addRequiredExternal('css', 'message_simple');
$__output .= '
			';
$this->addRequiredExternal('css', 'bb_code');
$__output .= '
			
			';
$this->addRequiredExternal('js', 'js/xenforo/comments_simple.js');
$__output .= '

			<div class="commentWrapper">
				';
if ($content['isDeleted'])
{
$__output .= '
					<p class="importantMessage">' . 'This photo has been deleted.' . '</p>
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
				<div id="content-overlay-' . htmlspecialchars($content['content_id'], ENT_QUOTES, 'UTF-8') . '" class="messageSimple ' . (($content['isDeleted']) ? ('deleted') : ('')) . ' ' . (($content['is_admin'] OR $content['is_moderator']) ? ('staff') : ('')) . ' ' . (($content['isIgnored']) ? ('ignored') : ('')) . '" data-author="' . htmlspecialchars($content['username'], ENT_QUOTES, 'UTF-8') . '">

					' . XenForo_Template_Helper_Core::callHelper('avatarhtml', array($content,false,array(
'user' => '$content',
'size' => 's'
),'')) . '
					
					<div class="messageInfo">
						
						';
$__compilerVar25 = '';
$__compilerVar25 .= '
									';
$__compilerVar26 = '';
$__compilerVar26 .= '
										';
if ($content['warning_message'])
{
$__compilerVar26 .= '
											<li class="warningNotice"><span class="icon Tooltip" title="' . 'Warning' . '" data-tipclass="iconTip flipped"></span>' . htmlspecialchars($content['warning_message'], ENT_QUOTES, 'UTF-8') . '</li>
										';
}
$__compilerVar26 .= '
										';
if ($content['isIgnored'])
{
$__compilerVar26 .= '
											<li>' . 'You are ignoring content by this member.' . ' <a href="javascript:" class="jsOnly DisplayIgnoredContent">' . 'Show Ignored Content' . '</a></li>
										';
}
$__compilerVar26 .= '
									';
$__compilerVar25 .= $this->callTemplateHook('message_simple_notices', $__compilerVar26, array(
'message' => $content
));
unset($__compilerVar26);
$__compilerVar25 .= '
								';
if (trim($__compilerVar25) !== '')
{
$__output .= '
							<ul class="messageNotices">
								' . $__compilerVar25 . '
							</ul>
						';
}
unset($__compilerVar25);
$__output .= '

						<div class="messageContent">
							<a href="' . ((XenForo_Template_Helper_Core::styleProperty('sonnbXG_showUserPage')) ? (XenForo_Template_Helper_Core::link('gallery/authors', $content, array())) : (XenForo_Template_Helper_Core::link('members', $content, array()))) . '" class="' . ((!XenForo_Template_Helper_Core::styleProperty('sonnbXG_showUserPage')) ? ('username') : ('')) . ' poster">' . htmlspecialchars($content['username'], ENT_QUOTES, 'UTF-8') . '</a>
							<a href="' . XenForo_Template_Helper_Core::link('gallery/photos', $content, array()) . '" title="' . 'Permalink' . '" class="item muted permalink">' . XenForo_Template_Helper_Core::callHelper('datetimehtml', array($content['content_date'],array(
'time' => '$content.content_date'
))) . '</a>
							<article>
								<blockquote class="ugc baseHtml">' . $content['descriptionHtml'] . '</blockquote>
							</article>
						</div>
					</div>
					';
$__compilerVar27 = '';
$__compilerVar27 .= '
								';
if (!$xenOptions['sonnb_XG_disableLocation'] && $content['content_location'])
{
$__compilerVar27 .= '
									<div class="photoLocation">' . 'Taken at' . ' <a target="_blank" href="' . XenForo_Template_Helper_Core::link('gallery/locations', array(
'location_url' => $content['content_location']
), array()) . '">' . htmlspecialchars($content['content_location'], ENT_QUOTES, 'UTF-8') . '</a></div>
								';
}
$__compilerVar27 .= '
								';
if ($content['tagUsers'])
{
$__compilerVar27 .= '<div class="photoTag-list">' . XenForo_Template_Helper_Core::callHelper('sonnb_xengallery_tag', array(
'0' => $content['tagUsers'],
'1' => XenForo_Template_Helper_Core::link('gallery/photos/tags', $content, array(), false)
)) . '</div>';
}
$__compilerVar27 .= '
								';
if (!$xenOptions['sonnb_XG_disableCamera'] && $content['photo_exif']['Model'])
{
$__compilerVar27 .= '
									<div class="exifData">' . 'Using <a href="' . XenForo_Template_Helper_Core::link('gallery/cameras', array(
'camera_url' => $content['photo_exif']['Model']
), array()) . '" >' . htmlspecialchars($content['photo_exif']['Model'], ENT_QUOTES, 'UTF-8') . '</a>' . '</div>
								';
}
$__compilerVar27 .= '
							';
if (trim($__compilerVar27) !== '')
{
$__output .= '
						<div class="locationContainer photoExtra">
							' . $__compilerVar27 . '
						</div>
					';
}
unset($__compilerVar27);
$__output .= '
					
					<div id="fieldList-content-overlay-' . htmlspecialchars($content['content_id'], ENT_QUOTES, 'UTF-8') . '" class="fieldListContainer">
						';
if ($fields)
{
$__output .= '
							';
foreach ($fields AS $field)
{
$__output .= '
								';
$__compilerVar28 = '';
$__compilerVar29 = '';
$__compilerVar29 .= '
			';
if (is_array($field['fieldValueHtml']))
{
$__compilerVar29 .= '
				<ul>
				';
foreach ($field['fieldValueHtml'] AS $_fieldValueHtml)
{
$__compilerVar29 .= '
					<li>' . $_fieldValueHtml . '</li>
				';
}
$__compilerVar29 .= '
				</ul>
			';
}
else
{
$__compilerVar29 .= '
				' . $field['fieldValueHtml'] . '
			';
}
$__compilerVar29 .= '
		';
if (trim($__compilerVar29) !== '')
{
$__compilerVar28 .= '
	<dl class="ctrlUnit">
		<dt class="muted">' . htmlspecialchars($field['title'], ENT_QUOTES, 'UTF-8') . ':</dt> 
		<dd>' . $__compilerVar29 . '</dd>
	</dl>
';
}
unset($__compilerVar29);
$__output .= $__compilerVar28;
unset($__compilerVar28);
$__output .= '
							';
}
$__output .= '
						';
}
$__output .= '
					</div>
					<div class="messageMeta">
						<div class="privateControls">
							';
$__compilerVar30 = '';
$__compilerVar30 .= '
								';
if ($content['canEdit'])
{
$__compilerVar30 .= '
									<a href="' . XenForo_Template_Helper_Core::link('gallery/photos/edit', $content, array()) . '" class="item control edit NoOverlay OverlayTrigger" data-cacheOverlay="false" data-overlayOptions="{&quot;fixed&quot;:false}"><span></span>' . 'Sửa' . '</a>
								';
}
$__compilerVar30 .= '
								';
if ($content['canDelete'])
{
$__compilerVar30 .= '
									<a href="' . XenForo_Template_Helper_Core::link('gallery/photos/delete', $content, array()) . '" class="item OverlayTrigger control delete"><span></span>' . 'Xóa' . '</a>
								';
}
$__compilerVar30 .= '
								';
if ($content['canReport'])
{
$__compilerVar30 .= '
									<a href="' . XenForo_Template_Helper_Core::link('gallery/photos/report', $content, array()) . '" class="OverlayTrigger item control report" data-cacheOverlay="false"><span></span>' . 'Báo cáo' . '</a>
								';
}
$__compilerVar30 .= '
							';
$__output .= $this->callTemplateHook('photo_private_controls', $__compilerVar30, array(
'photo' => $content
));
unset($__compilerVar30);
$__output .= '
						</div>	
						';
$__compilerVar31 = '';
$__compilerVar31 .= '
								';
$__compilerVar32 = '';
$__compilerVar32 .= '
									';
if ($content['canWatch'])
{
$__compilerVar32 .= '
										<a href="' . XenForo_Template_Helper_Core::link('gallery/photos/watch', $content, array()) . '" class="WatchLink item control ' . (($content['watch_date']) ? ('unwatch') : ('watch')) . '"><span></span><span class="WatchLabel">' . (($content['watch_date']) ? ('Unwatch') : ('Watch')) . '</span></a>
									';
}
$__compilerVar32 .= '
									';
if ($content['canLike'])
{
$__compilerVar32 .= '
										<a href="' . XenForo_Template_Helper_Core::link('gallery/photos/like', $content, array()) . '" class="LikeLink item control ' . (($content['like_date']) ? ('unlike') : ('like')) . '" data-container="#likes-wp-' . htmlspecialchars($content['content_id'], ENT_QUOTES, 'UTF-8') . '"><span></span><span class="LikeLabel">' . (($content['like_date']) ? ('Không thích nữa') : ('Thích')) . '</span></a>
									';
}
$__compilerVar32 .= '
									';
if ($content['canComment'])
{
$__compilerVar32 .= '
										<a href="' . XenForo_Template_Helper_Core::link('gallery/photos/comment', $content, array()) . '" data-commentArea="#commentPhoto' . htmlspecialchars($content['content_id'], ENT_QUOTES, 'UTF-8') . '"
											data-postParams="' . htmlspecialchars(XenForo_Template_Helper_Core::callHelper('json', array(
'0' => array(
'after' => $lastShownCommentDate
)
)), ENT_QUOTES, 'UTF-8', true) . '"
											class="XenGalleryCommentPoster item control postComment" ><span></span>' . 'Bình luận' . '</a>
									';
}
$__compilerVar32 .= '
								';
$__compilerVar31 .= $this->callTemplateHook('photo_public_controls', $__compilerVar32, array(
'photo' => $content
));
unset($__compilerVar32);
$__compilerVar31 .= '
							';
if (trim($__compilerVar31) !== '')
{
$__output .= '
							<div class="publicControls">
							' . $__compilerVar31 . '
							</div>
						';
}
unset($__compilerVar31);
$__output .= '
					</div>
					';
if (!$xenOptions['sonnb_XG_disableCamera'] && $content['photo_exif'])
{
$__output .= '
					<div class="photoExif">
						';
$__compilerVar33 = '';
$__compilerVar33 .= '
										';
if ($content['photo_exif']['ExposureTime'])
{
$__compilerVar33 .= '<span class="exif-detail" id="exif-exposure">' . htmlspecialchars($content['photo_exif']['ExposureTime'], ENT_QUOTES, 'UTF-8') . '</span>';
}
$__compilerVar33 .= '
										';
if ($content['photo_exif']['FNumber'])
{
$__compilerVar33 .= '<span class="exif-detail" id="exif-aperture">' . $content['photo_exif']['FNumber'] . '</span>';
}
$__compilerVar33 .= '
										';
if ($content['photo_exif']['FocalLength'])
{
$__compilerVar33 .= '<span class="exif-detail" id="exif-focal-length">' . htmlspecialchars($content['photo_exif']['FocalLength'], ENT_QUOTES, 'UTF-8') . '</span>';
}
$__compilerVar33 .= '
									';
if (trim($__compilerVar33) !== '')
{
$__output .= '
							<span class="muted">' . 'Settings' . ':</span>
							<span class="muted" id="exif-detail-container">
								<a class="OverlayTrigger" data-overlayOptions="{&quot;fixed&quot;:false}" href="' . XenForo_Template_Helper_Core::link('gallery/photos/meta', $content, array()) . '">
									' . $__compilerVar33 . '
								</a>
							</span>
						';
}
else
{
$__output .= '
							<div class="viewExifLink">
								<a class="OverlayTrigger" data-overlayOptions="{&quot;fixed&quot;:false}" href="' . XenForo_Template_Helper_Core::link('gallery/photos/meta', $content, array()) . '">' . 'View EXIF Information' . '</a>
							</div>
						';
}
unset($__compilerVar33);
$__output .= '
					</div>
					';
}
$__output .= '
					';
$__compilerVar34 = '';
$__compilerVar34 .= '
							';
if ($content['contentStreams'] || ($content['canEdit'] && !$content['contentStreams']))
{
$__compilerVar34 .= '
							<div class="streamList">
								<ul>
									';
if ($content['contentStreams'])
{
$__compilerVar34 .= '
									';
foreach ($content['contentStreams'] AS $stream)
{
$__compilerVar34 .= '
										';
$__compilerVar35 = '';
$__compilerVar35 .= '<li id="stream__' . htmlspecialchars($stream, ENT_QUOTES, 'UTF-8') . '">
	<span class="streamItem">
		<a href="' . XenForo_Template_Helper_Core::link('gallery/streams', array(
'stream_name' => $stream
), array()) . '">' . htmlspecialchars($stream, ENT_QUOTES, 'UTF-8') . '</a>
		';
if ($content['canEdit'])
{
$__compilerVar35 .= '
			<a class="delete" title="' . 'Xóa' . '" href="' . XenForo_Template_Helper_Core::link('gallery/photos/stream-delete', $content, array(
'stream_name' => $stream
)) . '">[x]</a>
		';
}
$__compilerVar35 .= '
	</span>
</li>';
$__compilerVar34 .= $__compilerVar35;
unset($__compilerVar35);
$__compilerVar34 .= '
									';
}
$__compilerVar34 .= '
									';
}
$__compilerVar34 .= '
								</ul>
							</div>	
							';
}
$__compilerVar34 .= '	
							
							';
if ($content['canEdit'])
{
$__compilerVar34 .= '
								<form class="xenForm" method="POST" action="' . XenForo_Template_Helper_Core::link('gallery/photos/stream-add', $content, array()) . '">
									<input id="addStream" data-acUrl="' . XenForo_Template_Helper_Core::link('gallery/streams/find', '', array(
'_xfResponseType' => 'json'
)) . '" 
										class="textCtrl AutoComplete" type="text" name="stream_name" value="" placeholder="" autocomplete="off" />
									<p class="explain muted">' . 'Separate each stream with a comma: my family, my car, etc.' . '</p>									
									<input type="submit" value="' . 'Add Streams' . '" name="submit" class="primary button" />
									<input type="hidden" value="' . htmlspecialchars($visitor['csrf_token_page'], ENT_QUOTES, 'UTF-8') . '" name="_xfToken">
								</form>
								<a class="editToggle" href="javascript:void(0);">' . 'Add Streams' . '</a>
							';
}
$__compilerVar34 .= '
						';
if (trim($__compilerVar34) !== '')
{
$__output .= '
					<div class="streaming streamingEditor">
						<h4 class="streamingHeader">' . 'Streams' . ': </h4>
						' . $__compilerVar34 . '
					</div>
					';
}
unset($__compilerVar34);
$__output .= '
					<ol class="messageResponse">	
						<li id="likes-wp-' . htmlspecialchars($content['content_id'], ENT_QUOTES, 'UTF-8') . '">
							';
if ($content['likes'])
{
$__output .= '
								';
$__compilerVar36 = '';
$__compilerVar36 .= XenForo_Template_Helper_Core::link('gallery/photos/likes', $content, array());
$__compilerVar37 = '';
if ($content['likes'])
{
$__compilerVar37 .= '
	';
$this->addRequiredExternal('css', 'likes_summary');
$__compilerVar37 .= '
	<div class="likesSummary secondaryContent">
		<span class="LikeText">
			' . XenForo_Template_Helper_Core::callHelper('likeshtml', array($content['likes'],$__compilerVar36,$content['like_date'],$content['likeUsers'])) . '
		</span>
	</div>
';
}
$__output .= $__compilerVar37;
unset($__compilerVar36, $__compilerVar37);
$__output .= '
							';
}
$__output .= '
						</li>

						';
if ($content['comments'])
{
$__output .= '
							';
if ($content['comment_count'] > $commentOnLoad)
{
$__output .= '
								';
$__compilerVar38 = '';
$__compilerVar38 .= '<li class="commentMore secondaryContent">
	<a href="' . XenForo_Template_Helper_Core::link('gallery/photos/comments', $content, array()) . '"
		class="XenGalleryCommentLoader"
		data-loadParams="' . htmlspecialchars(XenForo_Template_Helper_Core::callHelper('json', array(
'0' => array(
'before' => $firstShownCommentDate
)
)), ENT_QUOTES, 'UTF-8', true) . '">' . 'View previous comments' . '...</a>
	<span class="muted">' . '' . htmlspecialchars($commentShownCount, ENT_QUOTES, 'UTF-8') . ' of ' . htmlspecialchars($content['comment_count'], ENT_QUOTES, 'UTF-8') . '' . '</span>
</li>';
$__output .= $__compilerVar38;
unset($__compilerVar38);
$__output .= '
							';
}
$__output .= '

							';
foreach ($content['comments'] AS $comment)
{
$__output .= '
								';
$__compilerVar39 = '';
$__compilerVar39 .= '<li id="comment_' . htmlspecialchars($comment['comment_id'], ENT_QUOTES, 'UTF-8') . '" class="comment secondaryContent ' . (($comment['isIgnored']) ? ('ignored') : ('')) . '" itemscope="itemscope" itemtype="http://schema.org/Comment" itemprop="comment">
	
	<meta itemprop="commentTime" content="' . XenForo_Template_Helper_Core::datetime($comment['comment_date'], '') . '">	
	<meta itemprop="creator" content="' . htmlspecialchars($comment['username'], ENT_QUOTES, 'UTF-8') . '">
	' . XenForo_Template_Helper_Core::callHelper('avatarhtml', array($comment,(true),array(
'user' => '$comment',
'size' => 's',
'img' => 'true'
),'')) . '

	<div class="commentInfo">
		';
$__compilerVar40 = '';
$__compilerVar40 .= '
					';
if ($comment['isDeleted'])
{
$__compilerVar40 .= '
						<li class="deletedNotice"><span class="icon Tooltip" title="' . 'Bị xóa' . '" data-tipclass="iconTip flipped"></span>' . 'This message has been removed from public view.' . '</li>
					';
}
else if ($comment['isModerated'])
{
$__compilerVar40 .= '
						<li class="moderatedNotice"><span class="icon Tooltip" title="' . 'Awaiting moderation' . '" data-tipclass="iconTip flipped"></span>' . 'This message is awaiting moderator approval, and is invisible to normal visitors.' . '</li>
					';
}
$__compilerVar40 .= '
					';
if ($comment['isIgnored'])
{
$__compilerVar40 .= '
						<li>' . 'You are ignoring content by this member.' . ' <a href="javascript:" class="jsOnly DisplayIgnoredContent">' . 'Show Ignored Content' . '</a></li>
					';
}
$__compilerVar40 .= '
				';
if (trim($__compilerVar40) !== '')
{
$__compilerVar39 .= '
			<ul class="messageNotices">
				' . $__compilerVar40 . '
			</ul>
		';
}
unset($__compilerVar40);
$__compilerVar39 .= '
		<div class="commentContent">
			<a href="' . ((XenForo_Template_Helper_Core::styleProperty('sonnbXG_showUserPage')) ? (XenForo_Template_Helper_Core::link('gallery/authors', $comment, array())) : (XenForo_Template_Helper_Core::link('members', $comment, array()))) . '" class="' . ((!XenForo_Template_Helper_Core::styleProperty('sonnbXG_showUserPage')) ? ('username') : ('')) . ' poster">' . htmlspecialchars($comment['username'], ENT_QUOTES, 'UTF-8') . '</a>
			<article><blockquote itemprop="commentText">' . $comment['message'] . '</blockquote></article>
		</div>
		<div class="messageMeta">
			<div class="privateControls">
				';
if ($comment['canInlineMod'])
{
$__compilerVar39 .= '
					<input type="checkbox" value="' . htmlspecialchars($comment['comment_id'], ENT_QUOTES, 'UTF-8') . '" class="InlineModCheck item" id="inlineModCheck-comment-' . htmlspecialchars($comment['comment_id'], ENT_QUOTES, 'UTF-8') . '" data-target="#comment_' . htmlspecialchars($comment['comment_id'], ENT_QUOTES, 'UTF-8') . '" title="' . 'Select comment id: ' . htmlspecialchars($comment['comment_id'], ENT_QUOTES, 'UTF-8') . '' . '" name="sxgcomments" />
				';
}
$__compilerVar39 .= '
				<a href="' . XenForo_Template_Helper_Core::link('gallery/comments', $comment, array()) . '" title="' . 'Permalink' . '" class="item muted">' . XenForo_Template_Helper_Core::callHelper('datetimehtml', array($comment['comment_date'],array(
'time' => '$comment.comment_date'
))) . '</a>
				';
if ($comment['canEdit'])
{
$__compilerVar39 .= '
					<a href="' . XenForo_Template_Helper_Core::link('gallery/comments/edit', $comment, array()) . '" class="item control edit"><span></span>' . 'Sửa' . '</a>
				';
}
$__compilerVar39 .= '
				';
if ($comment['canDelete'])
{
$__compilerVar39 .= '
					<a href="' . XenForo_Template_Helper_Core::link('gallery/comments/delete', $comment, array()) . '" class="item control delete"><span></span>' . 'Xóa' . '</a>
				';
}
$__compilerVar39 .= '
				
				';
if ($comment['canWarn'])
{
$__compilerVar39 .= '
					<a href="' . XenForo_Template_Helper_Core::link('members/warn', $comment, array(
'content_type' => 'sonnb_xengallery_comment',
'content_id' => $comment['comment_id']
)) . '" class="item control warn"><span></span>' . 'Cảnh cáo' . '</a>
				';
}
else if ($comment['warning_id'] && $canViewWarnings)
{
$__compilerVar39 .= '
					<a href="' . XenForo_Template_Helper_Core::link('warnings', $comment, array()) . '" class="OverlayTrigger item control viewWarning"><span></span>' . 'View Warning' . '</a>
				';
}
$__compilerVar39 .= '
				';
if ($comment['canReport'])
{
$__compilerVar39 .= '
					<a href="' . XenForo_Template_Helper_Core::link('gallery/comments/report', $comment, array()) . '" class="OverlayTrigger item control report" data-cacheOverlay="false"><span></span>' . 'Báo cáo' . '</a>
				';
}
$__compilerVar39 .= '
			</div>
			
			';
$__compilerVar41 = '';
$__compilerVar41 .= '
					';
if ($comment['canLike'])
{
$__compilerVar41 .= '
						<a href="' . XenForo_Template_Helper_Core::link('gallery/comments/like', $comment, array()) . '" class="LikeLink item control ' . (($comment['like_date']) ? ('unlike') : ('like')) . '" data-container="#likes-comment-' . htmlspecialchars($comment['comment_id'], ENT_QUOTES, 'UTF-8') . '"><span></span><span class="LikeLabel">' . (($comment['like_date']) ? ('Không thích nữa') : ('Thích')) . '</span></a>
					';
}
$__compilerVar41 .= '
					';
if ($comment['canComment'])
{
$__compilerVar41 .= '
						<a href="' . XenForo_Template_Helper_Core::link('gallery/comments/comment', $comment, array()) . '" class="CommentPoster item control postComment" data-commentArea="#commentSubmit-' . htmlspecialchars($comment['comment_id'], ENT_QUOTES, 'UTF-8') . '"><span></span>' . 'Bình luận' . '</a>
					';
}
$__compilerVar41 .= '
				';
if (trim($__compilerVar41) !== '')
{
$__compilerVar39 .= '
				<div class="publicControls">
				' . $__compilerVar41 . '
				</div>
			';
}
unset($__compilerVar41);
$__compilerVar39 .= '
		</div>
		<div id="likes-comment-' . htmlspecialchars($comment['comment_id'], ENT_QUOTES, 'UTF-8') . '">
			';
if ($comment['likes'])
{
$__compilerVar39 .= '
				';
$__compilerVar42 = '';
$__compilerVar42 .= XenForo_Template_Helper_Core::link('gallery/comments/likes', $comment, array());
$__compilerVar43 = '';
if ($comment['likes'])
{
$__compilerVar43 .= '
	';
$this->addRequiredExternal('css', 'likes_summary');
$__compilerVar43 .= '
	<div class="likesSummary secondaryContent">
		<span class="LikeText">
			' . XenForo_Template_Helper_Core::callHelper('likeshtml', array($comment['likes'],$__compilerVar42,$comment['like_date'],$comment['likeUsers'])) . '
		</span>
	</div>
';
}
$__compilerVar39 .= $__compilerVar43;
unset($__compilerVar42, $__compilerVar43);
$__compilerVar39 .= '
			';
}
$__compilerVar39 .= '
		</div>
	</div>
</li>';
$__output .= $__compilerVar39;
unset($__compilerVar39);
$__output .= '
							';
}
$__output .= '

						';
}
$__output .= '

						';
if ($content['canComment'])
{
$__output .= '
							<li id="commentPhoto' . htmlspecialchars($content['content_id'], ENT_QUOTES, 'UTF-8') . '" class="comment secondaryContent">
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
$__output .= '

					</ol>
				</div>
			</div>
		</div>
	</div>
</div>
<div style="display:none">
	';
$__compilerVar44 = '';
$__compilerVar44 .= '1';
$__compilerVar45 = '';
$__compilerVar45 .= 'shareContainerOverlay';
$__compilerVar46 = '';
if (!$__compilerVar44)
{
$__compilerVar46 .= '
	';
$__extraData['title'] = '';
$__extraData['title'] .= 'Share this photo with your friends.';
$__compilerVar46 .= '
	';
$__extraData['h1'] = '';
$__extraData['h1'] .= 'Share this photo with your friends.';
$__compilerVar46 .= '
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
$__compilerVar46 .= '

	';
$__extraData['navigation'] = array();
$__extraData['navigation'] = XenForo_Template_Helper_Core::appendBreadCrumbs($__extraData['navigation'], $breadCrumbs);
$__compilerVar46 .= '
';
}
$__compilerVar46 .= '

';
$this->addRequiredExternal('css', 'sonnb_xengallery_photo_share');
$__compilerVar46 .= '
<div class="' . (($__compilerVar45) ? (htmlspecialchars($__compilerVar45, ENT_QUOTES, 'UTF-8')) : ('shareContainer')) . ' section">
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
							<a class="share-action google" title="' . 'Share on ' . 'Google+' . '' . '" href="' . htmlspecialchars($requestPaths['requestUri'], ENT_QUOTES, 'UTF-8') . '#" data-url="' . XenForo_Template_Helper_Core::link('full:gallery/photos', $content, array()) . '" data-thumbnail="' . XenForo_Template_Helper_Core::callHelper('fullurl', array(
'0' => $content['contentUrl'],
'1' => '1'
)) . '">
								<span class="share-icon google"></span>
								<span class="service-name">Google+</span>
							</a>
						</li>
						<li class="share-service">
							<a class="share-action facebook" title="' . 'Share on ' . 'Facebook' . '' . '" href="' . htmlspecialchars($requestPaths['requestUri'], ENT_QUOTES, 'UTF-8') . '#" data-url="' . XenForo_Template_Helper_Core::link('full:gallery/photos', $content, array()) . '" data-thumbnail="' . XenForo_Template_Helper_Core::callHelper('fullurl', array(
'0' => $content['contentUrl'],
'1' => '1'
)) . '">
								<span class="share-icon facebook"></span>
								<span class="service-name">Facebook</span>
							</a>
						</li>
						<li class="share-service">
							<a class="share-action twitter" title="' . 'Share on ' . 'Twitter' . '' . '" href="' . htmlspecialchars($requestPaths['requestUri'], ENT_QUOTES, 'UTF-8') . '#" data-url="' . XenForo_Template_Helper_Core::link('full:gallery/photos', $content, array()) . '" data-thumbnail="' . XenForo_Template_Helper_Core::callHelper('fullurl', array(
'0' => $content['contentUrl'],
'1' => '1'
)) . '">
								<span class="share-icon twitter"></span>
								<span class="service-name">Twitter</span>
							</a>
						</li>
						<li class="share-service">
							<a class="share-action tumblr" title="' . 'Share on ' . 'Tumblr' . '' . '" href="' . htmlspecialchars($requestPaths['requestUri'], ENT_QUOTES, 'UTF-8') . '#" data-url="' . XenForo_Template_Helper_Core::link('full:gallery/photos', $content, array()) . '" data-thumbnail="' . XenForo_Template_Helper_Core::callHelper('fullurl', array(
'0' => $content['contentUrl'],
'1' => '1'
)) . '">
								<span class="share-icon tumblr"></span>
								<span class="service-name">Tumblr</span>
							</a>
						</li>
						<li class="share-service">
							<a class="share-action pinterest" title="' . 'Share on ' . 'Pinterest' . '' . '" href="' . htmlspecialchars($requestPaths['requestUri'], ENT_QUOTES, 'UTF-8') . '#" data-url="' . XenForo_Template_Helper_Core::link('full:gallery/photos', $content, array()) . '" data-thumbnail="' . XenForo_Template_Helper_Core::callHelper('fullurl', array(
'0' => $content['contentUrl'],
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
					<p class="muted">' . 'Here\'s a link to this photo. Just copy and paste!' . '</p>
					<p>
						<input type="text" class="textCtrl" value="' . XenForo_Template_Helper_Core::link('full:gallery/photos', $content, array()) . '">
					</p>
					<p class="muted">' . 'Here is direct link of this photo' . '</p>
					<p>
						<input type="text" class="textCtrl" value="' . XenForo_Template_Helper_Core::callHelper('fullurl', array(
'0' => $content['contentUrl'],
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
						<textarea class="textCtrl html Elastic">' . '<a href="' . XenForo_Template_Helper_Core::link('full:gallery/photos', $content, array()) . '" title="' . htmlspecialchars($content['title'], ENT_QUOTES, 'UTF-8') . ' by ' . htmlspecialchars($content['username'], ENT_QUOTES, 'UTF-8') . ', on ' . htmlspecialchars($xenOptions['boardTitle'], ENT_QUOTES, 'UTF-8') . '"><img src="' . XenForo_Template_Helper_Core::callHelper('fullurl', array(
'0' => $content['contentUrl'],
'1' => '1'
)) . '" alt="' . htmlspecialchars($content['title'], ENT_QUOTES, 'UTF-8') . '" /></a>' . '</textarea>
					</p>
					<p class="muted">' . 'Copy and paste the code below (' . 'BBCode' . ')' . ':</p>
					<p>
						<textarea class="textCtrl bbcode Elastic">' . '[URL=' . XenForo_Template_Helper_Core::link('full:gallery/photos', $content, array()) . '][IMG]' . XenForo_Template_Helper_Core::callHelper('fullurl', array(
'0' => $content['contentUrl'],
'1' => '1'
)) . '[/IMG][/URL]
[URL=' . XenForo_Template_Helper_Core::link('full:gallery/photos', $content, array()) . ']' . htmlspecialchars($content['title'], ENT_QUOTES, 'UTF-8') . '[/URL] by [URL=' . XenForo_Template_Helper_Core::link('full:gallery/authors', $content, array()) . ']' . htmlspecialchars($content['username'], ENT_QUOTES, 'UTF-8') . '[/URL] on ' . htmlspecialchars($xenOptions['boardTitle'], ENT_QUOTES, 'UTF-8') . '' . '</textarea>
					</p>
				</div>
			</li>
		</ul>
		<div class="clearfix"></div>
	</div>
</div>';
$__output .= $__compilerVar46;
unset($__compilerVar44, $__compilerVar45, $__compilerVar46);
$__output .= '
</div>';
