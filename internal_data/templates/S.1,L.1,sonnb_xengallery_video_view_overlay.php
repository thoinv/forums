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

<a class="originalLink" title="' . 'Open regular page' . '" href="' . XenForo_Template_Helper_Core::link('gallery/videos', $content, array(
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
				<li><a href="' . XenForo_Template_Helper_Core::link('gallery/videos/share', $content, array()) . '" class="action share" title="' . 'Share this video with your friends' . '">' . 'Share' . '</a></li>
				<li><a href="' . XenForo_Template_Helper_Core::link('gallery/videos/playlist', $content, array()) . '" class="OverlayTrigger" title="' . 'Add to my playlists' . '" data-cacheOverlay="false">' . 'Add to my playlists' . '</a></li>
				';
if ($content['canEdit'])
{
$__output .= '
					<li>
						<ul class="goPopup Popup edit">
					 		<a rel="Menu">' . 'Edit' . '</a>
					 		<ul class="Menu1 JsOnly" id="XenGalleryOverlayEdit">
								<li><a class="item control people quickEdit" data-quickForm="formTagVideoOverlay" data-reset="true" href="' . XenForo_Template_Helper_Core::link('gallery/videos/tag', $content, array()) . '" data-cacheOverlay="false"><i></i><span>' . 'Tag this video' . '</span></a></li>
								<li><a class="OverlayTrigger" href="' . XenForo_Template_Helper_Core::link('gallery/videos/privacy', $content, array()) . '" data-cacheOverlay="false"><i></i><span>' . 'Privacy' . '</span></a></li>
								';
if (!$xenOptions['sonnb_XG_disableLocation'])
{
$__output .= '
									<li><a class="OverlayTrigger" href="' . XenForo_Template_Helper_Core::link('gallery/videos/location', $content, array()) . '" data-cacheOverlay="false" data-overlayOptions="{&quot;fixed&quot;:false}"><i></i><span>' . 'Location' . '</span></a></li>
								';
}
$__output .= '
								<li><a class="OverlayTrigger" href="' . XenForo_Template_Helper_Core::link('gallery/videos/move', $content, array()) . '"><i></i><span>' . 'Move this video' . '</span></a></li>
								<li><a class="OverlayTrigger" href="' . XenForo_Template_Helper_Core::link('gallery/videos/thumbnail', $content, array()) . '"><i></i><span>' . (($content['medium_height']) ? ('Update video thumbnail') : ('Add video thumbnail')) . '</span></a></li>
								';
if ($content['canChangeOwner'])
{
$__output .= '
								    <li><a class="OverlayTrigger" href="' . XenForo_Template_Helper_Core::link('gallery/videos/owner', $content, array()) . '"><i></i><span>' . 'Change Video\'s Owner' . '</span></a></li>
								';
}
$__output .= '
								';
if ($content['canDelete'])
{
$__output .= '
									<li><a href="' . XenForo_Template_Helper_Core::link('gallery/videos/delete', $content, array()) . '" class="OverlayTrigger"><span>' . 'Delete' . '</span></a></li>
								';
}
$__output .= '
							</ul>
						</ul>
					</li>
				';
}
$__output .= '
			</ul>
		</div>
		<div class="goMediaHolder video ' . (($relatedContents) ? ('hasRelated') : ('')) . '">
			<div class="goMediaContainer">
				<div class="videoHolder" data-width="500" data-height="300">
					';
if ($content['video_key'])
{
$__output .= '
						' . $content['embed'] . '
					';
}
$__output .= '
				</div>
			</div>
			<a class="prevPhoto ' . (($prevContent) ? ('hasPhoto') : ('')) . '" href="' . (($prevContent) ? (htmlspecialchars($prevContent['url'], ENT_QUOTES, 'UTF-8')) : ('javascript:void(0);')) . '"><i></i></a>
			<a class="nextPhoto ' . (($nextContent) ? ('hasPhoto') : ('')) . '" href="' . (($nextContent) ? (htmlspecialchars($nextContent['url'], ENT_QUOTES, 'UTF-8')) : ('javascript:void(0);')) . '"><i></i></a>
			<div class="pwPhotoActions video">
				<a rel="nofollow" href="' . XenForo_Template_Helper_Core::link('gallery/videos/share', $content, array()) . '" class="action share" title="' . 'Share this video with your friends' . '">
					<i></i>
				</a>
				';
if ($content['canLike'])
{
$__output .= '
					<a rel="nofollow" href="' . XenForo_Template_Helper_Core::link('gallery/videos/like', $content, array()) . '" class="action like ' . (($content['like_date']) ? ('active') : ('')) . '"
						title="' . (($content['like_date']) ? ('Unlike this video') : ('Like this video')) . '">
						<i></i>
					</a>
				';
}
$__output .= '
				<a rel="nofollow" href="' . XenForo_Template_Helper_Core::link('gallery/videos', $content, array()) . '#commentPhoto" class="action comment" title="' . 'Leave a comment' . '">
					<i></i>
				</a>
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
				<div id="content-overlay-' . htmlspecialchars($content['content_id'], ENT_QUOTES, 'UTF-8') . '" class="messageSimple ' . (($content['isDeleted']) ? ('deleted') : ('')) . ' ' . (($content['is_admin'] OR $content['is_moderator']) ? ('staff') : ('')) . ' ' . (($content['isIgnored']) ? ('ignored') : ('')) . '" data-author="' . htmlspecialchars($content['username'], ENT_QUOTES, 'UTF-8') . '">

					' . XenForo_Template_Helper_Core::callHelper('avatarhtml', array($content,false,array(
'user' => '$content',
'size' => 's'
),'')) . '
					
					<div class="messageInfo">
						
						';
$__compilerVar1 = '';
$__compilerVar1 .= '
									';
$__compilerVar2 = '';
$__compilerVar2 .= '
										';
if ($content['warning_message'])
{
$__compilerVar2 .= '
											<li class="warningNotice"><span class="icon Tooltip" title="' . 'Warning' . '" data-tipclass="iconTip flipped"></span>' . htmlspecialchars($content['warning_message'], ENT_QUOTES, 'UTF-8') . '</li>
										';
}
$__compilerVar2 .= '
										';
if ($content['isIgnored'])
{
$__compilerVar2 .= '
											<li>' . 'You are ignoring content by this member.' . ' <a href="javascript:" class="jsOnly DisplayIgnoredContent">' . 'Show Ignored Content' . '</a></li>
										';
}
$__compilerVar2 .= '
									';
$__compilerVar1 .= $this->callTemplateHook('message_simple_notices', $__compilerVar2, array(
'message' => $content
));
unset($__compilerVar2);
$__compilerVar1 .= '
								';
if (trim($__compilerVar1) !== '')
{
$__output .= '
							<ul class="messageNotices">
								' . $__compilerVar1 . '
							</ul>
						';
}
unset($__compilerVar1);
$__output .= '

						<div class="messageContent">
							<a href="' . ((XenForo_Template_Helper_Core::styleProperty('sonnbXG_showUserPage')) ? (XenForo_Template_Helper_Core::link('gallery/authors', $content, array())) : (XenForo_Template_Helper_Core::link('members', $content, array()))) . '" class="' . ((!XenForo_Template_Helper_Core::styleProperty('sonnbXG_showUserPage')) ? ('username') : ('')) . ' poster">' . htmlspecialchars($content['username'], ENT_QUOTES, 'UTF-8') . '</a>
							<a href="' . XenForo_Template_Helper_Core::link('gallery/videos', $content, array()) . '" title="' . 'Permalink' . '" class="item muted permalink">' . XenForo_Template_Helper_Core::callHelper('datetimehtml', array($content['content_date'],array(
'time' => '$content.content_date'
))) . '</a>
							<article>
								<blockquote class="ugc baseHtml">
									' . $content['descriptionHtml'] . '
								</blockquote>
							</article>
						</div>
					</div>
					';
$__compilerVar3 = '';
$__compilerVar3 .= '
								';
if (!$xenOptions['sonnb_XG_disableLocation'] && $content['content_location'])
{
$__compilerVar3 .= '
									<div class="photoLocation">' . 'Captured at' . ' <a target="_blank" href="' . XenForo_Template_Helper_Core::link('gallery/locations', array(
'location_url' => $content['content_location']
), array()) . '">' . htmlspecialchars($content['content_location'], ENT_QUOTES, 'UTF-8') . '</a></div>
								';
}
$__compilerVar3 .= '
								';
if ($content['tagUsers'])
{
$__compilerVar3 .= '
									' . XenForo_Template_Helper_Core::callHelper('sonnb_xengallery_tag', array(
'0' => $content['tagUsers'],
'1' => XenForo_Template_Helper_Core::link('gallery/videos/tags', $content, array(), false)
)) . '
								';
}
$__compilerVar3 .= '
							';
if (trim($__compilerVar3) !== '')
{
$__output .= '
						<div class="locationContainer photoExtra">
							' . $__compilerVar3 . '
						</div>
					';
}
unset($__compilerVar3);
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
$__compilerVar4 = '';
$__compilerVar5 = '';
$__compilerVar5 .= '
			';
if (is_array($field['fieldValueHtml']))
{
$__compilerVar5 .= '
				<ul>
				';
foreach ($field['fieldValueHtml'] AS $_fieldValueHtml)
{
$__compilerVar5 .= '
					<li>' . $_fieldValueHtml . '</li>
				';
}
$__compilerVar5 .= '
				</ul>
			';
}
else
{
$__compilerVar5 .= '
				' . $field['fieldValueHtml'] . '
			';
}
$__compilerVar5 .= '
		';
if (trim($__compilerVar5) !== '')
{
$__compilerVar4 .= '
	<dl class="ctrlUnit">
		<dt class="muted">' . htmlspecialchars($field['title'], ENT_QUOTES, 'UTF-8') . ':</dt> 
		<dd>' . $__compilerVar5 . '</dd>
	</dl>
';
}
unset($__compilerVar5);
$__output .= $__compilerVar4;
unset($__compilerVar4);
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
$__compilerVar6 = '';
$__compilerVar6 .= '
								';
if ($content['canEdit'])
{
$__compilerVar6 .= '
									<a href="' . XenForo_Template_Helper_Core::link('gallery/videos/edit', $content, array()) . '" class="item control edit NoOverlay OverlayTrigger" data-cacheOverlay="false" data-overlayOptions="{&quot;fixed&quot;:false}"><span></span>' . 'Edit' . '</a>
								';
}
$__compilerVar6 .= '
								';
if ($content['canDelete'])
{
$__compilerVar6 .= '
									<a href="' . XenForo_Template_Helper_Core::link('gallery/videos/delete', $content, array()) . '" class="item OverlayTrigger control delete"><span></span>' . 'Delete' . '</a>
								';
}
$__compilerVar6 .= '
								';
if ($content['canReport'])
{
$__compilerVar6 .= '
									<a href="' . XenForo_Template_Helper_Core::link('gallery/videos/report', $content, array()) . '" class="OverlayTrigger item control report" data-cacheOverlay="false"><span></span>' . 'Report' . '</a>
								';
}
$__compilerVar6 .= '
							';
$__output .= $this->callTemplateHook('content_private_controls', $__compilerVar6, array(
'video' => $content
));
unset($__compilerVar6);
$__output .= '
						</div>	
						';
$__compilerVar7 = '';
$__compilerVar7 .= '
								';
$__compilerVar8 = '';
$__compilerVar8 .= '
									';
if ($content['canWatch'])
{
$__compilerVar8 .= '
										<a href="' . XenForo_Template_Helper_Core::link('gallery/videos/watch', $content, array()) . '" class="WatchLink item control ' . (($content['watch_date']) ? ('unwatch') : ('watch')) . '"><span></span><span class="WatchLabel">' . (($content['watch_date']) ? ('Unwatch') : ('Watch')) . '</span></a>
									';
}
$__compilerVar8 .= '
									';
if ($content['canLike'])
{
$__compilerVar8 .= '
										<a href="' . XenForo_Template_Helper_Core::link('gallery/videos/like', $content, array()) . '" class="LikeLink item control ' . (($content['like_date']) ? ('unlike') : ('like')) . '" data-container="#likes-wp-' . htmlspecialchars($content['content_id'], ENT_QUOTES, 'UTF-8') . '"><span></span><span class="LikeLabel">' . (($content['like_date']) ? ('Unlike') : ('Like')) . '</span></a>
									';
}
$__compilerVar8 .= '
									';
if ($content['canComment'])
{
$__compilerVar8 .= '
										<a href="' . XenForo_Template_Helper_Core::link('gallery/videos/comment', $content, array()) . '" data-commentArea="#commentVideo' . htmlspecialchars($content['content_id'], ENT_QUOTES, 'UTF-8') . '"
											data-postParams="' . htmlspecialchars(XenForo_Template_Helper_Core::callHelper('json', array(
'0' => array(
'after' => $lastShownCommentDate
)
)), ENT_QUOTES, 'UTF-8', true) . '"
											class="XenGalleryCommentPoster item control postComment" ><span></span>' . 'Comment' . '</a>
									';
}
$__compilerVar8 .= '
								';
$__compilerVar7 .= $this->callTemplateHook('content_public_controls', $__compilerVar8, array(
'video' => $content
));
unset($__compilerVar8);
$__compilerVar7 .= '
							';
if (trim($__compilerVar7) !== '')
{
$__output .= '
							<div class="publicControls">
							' . $__compilerVar7 . '
							</div>
						';
}
unset($__compilerVar7);
$__output .= '
					</div>
					';
$__compilerVar9 = '';
$__compilerVar9 .= '
							';
if ($content['contentStreams'] || ($content['canEdit'] && !$content['contentStreams']))
{
$__compilerVar9 .= '
							<div class="streamList">
								<ul>
									';
if ($content['contentStreams'])
{
$__compilerVar9 .= '
									';
foreach ($content['contentStreams'] AS $stream)
{
$__compilerVar9 .= '
										';
$__compilerVar10 = '';
$__compilerVar10 .= '<li id="stream__' . htmlspecialchars($stream, ENT_QUOTES, 'UTF-8') . '">
	<span class="streamItem">
		<a href="' . XenForo_Template_Helper_Core::link('gallery/streams', array(
'stream_name' => $stream
), array()) . '">' . htmlspecialchars($stream, ENT_QUOTES, 'UTF-8') . '</a>
		';
if ($content['canEdit'])
{
$__compilerVar10 .= '
			<a class="delete" title="' . 'Delete' . '" href="' . XenForo_Template_Helper_Core::link('gallery/videos/stream-delete', $content, array(
'stream_name' => $stream
)) . '">[x]</a>
		';
}
$__compilerVar10 .= '
	</span>
</li>';
$__compilerVar9 .= $__compilerVar10;
unset($__compilerVar10);
$__compilerVar9 .= '
									';
}
$__compilerVar9 .= '
									';
}
$__compilerVar9 .= '
								</ul>
							</div>	
							';
}
$__compilerVar9 .= '	
							
							';
if ($content['canEdit'])
{
$__compilerVar9 .= '
								<form class="xenForm" method="POST" action="' . XenForo_Template_Helper_Core::link('gallery/videos/stream-add', $content, array()) . '">
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
$__compilerVar9 .= '
						';
if (trim($__compilerVar9) !== '')
{
$__output .= '
					<div class="streaming streamingEditor">
						<h4 class="streamingHeader">' . 'Streams' . ': </h4>
						' . $__compilerVar9 . '
					</div>
					';
}
unset($__compilerVar9);
$__output .= '
					<ol class="messageResponse">	
						<li id="likes-wp-' . htmlspecialchars($content['content_id'], ENT_QUOTES, 'UTF-8') . '">
							';
if ($content['likes'])
{
$__output .= '
								';
$__compilerVar11 = '';
$__compilerVar11 .= XenForo_Template_Helper_Core::link('gallery/videos/likes', $content, array());
$__compilerVar12 = '';
if ($content['likes'])
{
$__compilerVar12 .= '
	';
$this->addRequiredExternal('css', 'likes_summary');
$__compilerVar12 .= '
	<div class="likesSummary secondaryContent">
		<span class="LikeText">
			' . XenForo_Template_Helper_Core::callHelper('likeshtml', array($content['likes'],$__compilerVar11,$content['like_date'],$content['likeUsers'])) . '
		</span>
	</div>
';
}
$__output .= $__compilerVar12;
unset($__compilerVar11, $__compilerVar12);
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
$__compilerVar13 = '';
$__compilerVar13 .= '<li class="commentMore secondaryContent">
	<a href="' . XenForo_Template_Helper_Core::link('gallery/videos/comments', $content, array()) . '"
		class="XenGalleryCommentLoader"
		data-loadParams="' . htmlspecialchars(XenForo_Template_Helper_Core::callHelper('json', array(
'0' => array(
'before' => $firstShownCommentDate
)
)), ENT_QUOTES, 'UTF-8', true) . '">' . 'View previous comments' . '...</a>
	<span class="muted">' . '' . htmlspecialchars($commentShownCount, ENT_QUOTES, 'UTF-8') . ' of ' . htmlspecialchars($content['comment_count'], ENT_QUOTES, 'UTF-8') . '' . '</span>
</li>';
$__output .= $__compilerVar13;
unset($__compilerVar13);
$__output .= '
							';
}
$__output .= '

							';
foreach ($content['comments'] AS $comment)
{
$__output .= '
								';
$__compilerVar14 = '';
$__compilerVar14 .= '<li id="comment_' . htmlspecialchars($comment['comment_id'], ENT_QUOTES, 'UTF-8') . '" class="comment secondaryContent ' . (($comment['isIgnored']) ? ('ignored') : ('')) . '" itemscope="itemscope" itemtype="http://schema.org/Comment" itemprop="comment">
	
	<meta itemprop="commentTime" content="' . XenForo_Template_Helper_Core::datetime($comment['comment_date'], '') . '">	
	<meta itemprop="creator" content="' . htmlspecialchars($comment['username'], ENT_QUOTES, 'UTF-8') . '">
	' . XenForo_Template_Helper_Core::callHelper('avatarhtml', array($comment,(true),array(
'user' => '$comment',
'size' => 's',
'img' => 'true'
),'')) . '

	<div class="commentInfo">
		';
$__compilerVar15 = '';
$__compilerVar15 .= '
					';
if ($comment['isDeleted'])
{
$__compilerVar15 .= '
						<li class="deletedNotice"><span class="icon Tooltip" title="' . 'Deleted' . '" data-tipclass="iconTip flipped"></span>' . 'This message has been removed from public view.' . '</li>
					';
}
else if ($comment['isModerated'])
{
$__compilerVar15 .= '
						<li class="moderatedNotice"><span class="icon Tooltip" title="' . 'Awaiting moderation' . '" data-tipclass="iconTip flipped"></span>' . 'This message is awaiting moderator approval, and is invisible to normal visitors.' . '</li>
					';
}
$__compilerVar15 .= '
					';
if ($comment['isIgnored'])
{
$__compilerVar15 .= '
						<li>' . 'You are ignoring content by this member.' . ' <a href="javascript:" class="jsOnly DisplayIgnoredContent">' . 'Show Ignored Content' . '</a></li>
					';
}
$__compilerVar15 .= '
				';
if (trim($__compilerVar15) !== '')
{
$__compilerVar14 .= '
			<ul class="messageNotices">
				' . $__compilerVar15 . '
			</ul>
		';
}
unset($__compilerVar15);
$__compilerVar14 .= '
		<div class="commentContent">
			<a href="' . ((XenForo_Template_Helper_Core::styleProperty('sonnbXG_showUserPage')) ? (XenForo_Template_Helper_Core::link('gallery/authors', $comment, array())) : (XenForo_Template_Helper_Core::link('members', $comment, array()))) . '" class="' . ((!XenForo_Template_Helper_Core::styleProperty('sonnbXG_showUserPage')) ? ('username') : ('')) . ' poster">' . htmlspecialchars($comment['username'], ENT_QUOTES, 'UTF-8') . '</a>
			<article><blockquote itemprop="commentText">' . $comment['message'] . '</blockquote></article>
		</div>
		<div class="messageMeta">
			<div class="privateControls">
				';
if ($comment['canInlineMod'])
{
$__compilerVar14 .= '
					<input type="checkbox" value="' . htmlspecialchars($comment['comment_id'], ENT_QUOTES, 'UTF-8') . '" class="InlineModCheck item" id="inlineModCheck-comment-' . htmlspecialchars($comment['comment_id'], ENT_QUOTES, 'UTF-8') . '" data-target="#comment_' . htmlspecialchars($comment['comment_id'], ENT_QUOTES, 'UTF-8') . '" title="' . 'Select comment id: ' . htmlspecialchars($comment['comment_id'], ENT_QUOTES, 'UTF-8') . '' . '" name="sxgcomments" />
				';
}
$__compilerVar14 .= '
				<a href="' . XenForo_Template_Helper_Core::link('gallery/comments', $comment, array()) . '" title="' . 'Permalink' . '" class="item muted">' . XenForo_Template_Helper_Core::callHelper('datetimehtml', array($comment['comment_date'],array(
'time' => '$comment.comment_date'
))) . '</a>
				';
if ($comment['canEdit'])
{
$__compilerVar14 .= '
					<a href="' . XenForo_Template_Helper_Core::link('gallery/comments/edit', $comment, array()) . '" class="item control edit"><span></span>' . 'Edit' . '</a>
				';
}
$__compilerVar14 .= '
				';
if ($comment['canDelete'])
{
$__compilerVar14 .= '
					<a href="' . XenForo_Template_Helper_Core::link('gallery/comments/delete', $comment, array()) . '" class="item control delete"><span></span>' . 'Delete' . '</a>
				';
}
$__compilerVar14 .= '
				
				';
if ($comment['canWarn'])
{
$__compilerVar14 .= '
					<a href="' . XenForo_Template_Helper_Core::link('members/warn', $comment, array(
'content_type' => 'sonnb_xengallery_comment',
'content_id' => $comment['comment_id']
)) . '" class="item control warn"><span></span>' . 'Warn' . '</a>
				';
}
else if ($comment['warning_id'] && $canViewWarnings)
{
$__compilerVar14 .= '
					<a href="' . XenForo_Template_Helper_Core::link('warnings', $comment, array()) . '" class="OverlayTrigger item control viewWarning"><span></span>' . 'View Warning' . '</a>
				';
}
$__compilerVar14 .= '
				';
if ($comment['canReport'])
{
$__compilerVar14 .= '
					<a href="' . XenForo_Template_Helper_Core::link('gallery/comments/report', $comment, array()) . '" class="OverlayTrigger item control report" data-cacheOverlay="false"><span></span>' . 'Report' . '</a>
				';
}
$__compilerVar14 .= '
			</div>
			
			';
$__compilerVar16 = '';
$__compilerVar16 .= '
					';
if ($comment['canLike'])
{
$__compilerVar16 .= '
						<a href="' . XenForo_Template_Helper_Core::link('gallery/comments/like', $comment, array()) . '" class="LikeLink item control ' . (($comment['like_date']) ? ('unlike') : ('like')) . '" data-container="#likes-comment-' . htmlspecialchars($comment['comment_id'], ENT_QUOTES, 'UTF-8') . '"><span></span><span class="LikeLabel">' . (($comment['like_date']) ? ('Unlike') : ('Like')) . '</span></a>
					';
}
$__compilerVar16 .= '
					';
if ($comment['canComment'])
{
$__compilerVar16 .= '
						<a href="' . XenForo_Template_Helper_Core::link('gallery/comments/comment', $comment, array()) . '" class="CommentPoster item control postComment" data-commentArea="#commentSubmit-' . htmlspecialchars($comment['comment_id'], ENT_QUOTES, 'UTF-8') . '"><span></span>' . 'Comment' . '</a>
					';
}
$__compilerVar16 .= '
				';
if (trim($__compilerVar16) !== '')
{
$__compilerVar14 .= '
				<div class="publicControls">
				' . $__compilerVar16 . '
				</div>
			';
}
unset($__compilerVar16);
$__compilerVar14 .= '
		</div>
		<div id="likes-comment-' . htmlspecialchars($comment['comment_id'], ENT_QUOTES, 'UTF-8') . '">
			';
if ($comment['likes'])
{
$__compilerVar14 .= '
				';
$__compilerVar17 = '';
$__compilerVar17 .= XenForo_Template_Helper_Core::link('gallery/comments/likes', $comment, array());
$__compilerVar18 = '';
if ($comment['likes'])
{
$__compilerVar18 .= '
	';
$this->addRequiredExternal('css', 'likes_summary');
$__compilerVar18 .= '
	<div class="likesSummary secondaryContent">
		<span class="LikeText">
			' . XenForo_Template_Helper_Core::callHelper('likeshtml', array($comment['likes'],$__compilerVar17,$comment['like_date'],$comment['likeUsers'])) . '
		</span>
	</div>
';
}
$__compilerVar14 .= $__compilerVar18;
unset($__compilerVar17, $__compilerVar18);
$__compilerVar14 .= '
			';
}
$__compilerVar14 .= '
		</div>
	</div>
</li>';
$__output .= $__compilerVar14;
unset($__compilerVar14);
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
							<li id="commentVideo' . htmlspecialchars($content['content_id'], ENT_QUOTES, 'UTF-8') . '" class="comment secondaryContent">
								' . XenForo_Template_Helper_Core::callHelper('avatarhtml', array($visitor,(true),array(
'user' => '$visitor',
'size' => 's',
'img' => 'true'
),'')) . '
								<div class="elements">
									<textarea name="message" rows="2" class="textCtrl Elastic UserTagger"></textarea>
									<div class="submit"><input type="submit" class="button primary" value="' . 'Post Comment' . '" /></div>
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
$__compilerVar19 = '';
$__compilerVar19 .= '1';
$__compilerVar20 = '';
$__compilerVar20 .= 'shareContainerOverlay';
$__compilerVar21 = '';
if (!$__compilerVar19)
{
$__compilerVar21 .= '
	';
$__extraData['title'] = '';
$__extraData['title'] .= 'Share this video with your friends';
$__compilerVar21 .= '
	';
$__extraData['h1'] = '';
$__extraData['h1'] .= 'Share this video with your friends';
$__compilerVar21 .= '
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
$__compilerVar21 .= '

	';
$__extraData['navigation'] = array();
$__extraData['navigation'] = XenForo_Template_Helper_Core::appendBreadCrumbs($__extraData['navigation'], $breadCrumbs);
$__compilerVar21 .= '
';
}
$__compilerVar21 .= '

';
$this->addRequiredExternal('css', 'sonnb_xengallery_photo_share');
$__compilerVar21 .= '
<div class="' . (($__compilerVar20) ? (htmlspecialchars($__compilerVar20, ENT_QUOTES, 'UTF-8')) : ('shareContainer')) . ' section">
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
$__output .= $__compilerVar21;
unset($__compilerVar19, $__compilerVar20, $__compilerVar21);
$__output .= '
</div>
';
$__compilerVar22 = '';
$__compilerVar22 .= 'quickEditForm';
$__compilerVar23 = '';
$__compilerVar23 .= 'formTagVideoOverlay';
$__compilerVar24 = '';
$__compilerVar24 .= '<form action="' . XenForo_Template_Helper_Core::link('gallery/videos/tag', $content, array()) . '" method="post"
	class="xenForm ' . (($__compilerVar22) ? (htmlspecialchars($__compilerVar22, ENT_QUOTES, 'UTF-8')) : ('AutoValidator')) . ' formOverlay" ' . (($__compilerVar23) ? ('id="' . htmlspecialchars($__compilerVar23, ENT_QUOTES, 'UTF-8') . '"') : ('')) . ' 
	data-redirect="on">
	
	<dl class="ctrlUnit surplusLabel fullWidth">
		<dt><label for="ctrl_with">' . 'Tag People' . ':</label></dt>
		<dd>
			<input type="text" name="content_people" class="textCtrl AutoComplete" id="ctrl_with" autofocus="true"
				placeholder="' . 'Who was there with you?' . '..." value="' . (($content['content_people']) ? (htmlspecialchars($content['content_people'], ENT_QUOTES, 'UTF-8')) : ('')) . '"/>
			<p class="explain">' . 'Separate names with a comma.' . '</p>
		</dd>
	</dl>
	
	<dl class="ctrlUnit submitUnit">
		<dt></dt>
		<dd>
			<input type="submit" value="' . 'Save' . '" accesskey="s" class="button primary" />
			<input type="reset" value="' . 'Cancel' . '" accesskey="d" class="button primary closer" />
		</dd>
	</dl>

	<input type="hidden" name="_xfToken" value="' . htmlspecialchars($visitor['csrf_token_page'], ENT_QUOTES, 'UTF-8') . '" />
</form>';
$__output .= $__compilerVar24;
unset($__compilerVar22, $__compilerVar23, $__compilerVar24);
