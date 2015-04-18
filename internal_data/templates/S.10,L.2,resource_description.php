<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__extraData['title'] = '';
$__extraData['title'] .= XenForo_Template_Helper_Core::callHelper('resourcePrefix', array(
'0' => $resource,
'1' => 'escaped'
)) . htmlspecialchars($resource['title'], ENT_QUOTES, 'UTF-8');
$__output .= '

';
$__extraData['head']['canonical'] = '';
$__extraData['head']['canonical'] .= '
	<link rel="canonical" href="' . XenForo_Template_Helper_Core::link('canonical:resources', $resource, array()) . '" />';
$__output .= '

<div class="updateContainer section">
	<ol>
		';
$__compilerVar26 = '';
$__compilerVar26 .= (($isLimited) ? ('1') : (''));
$__compilerVar27 = '';
$__compilerVar27 .= '
				';
$__compilerVar28 = 'above_info';
$__compilerVar29 = 'aboveInfo';
$__compilerVar30 = '';
if ($category['fieldCache'][$__compilerVar28])
{
$__compilerVar30 .= '
	';
$__compilerVar31 = '';
$__compilerVar31 .= '
			';
foreach ($category['fieldCache'][$__compilerVar28] AS $fieldId)
{
$__compilerVar31 .= '
				';
$__compilerVar32 = '';
$__compilerVar32 .= XenForo_Template_Helper_Core::callHelper('resourceFieldValue', array(
'0' => $resource,
'1' => $fieldId,
'2' => $resource['customFields'][$fieldId]
));
if (trim($__compilerVar32) !== '')
{
$__compilerVar31 .= '
					<dl class="customResourceField' . htmlspecialchars($fieldId, ENT_QUOTES, 'UTF-8') . '">
						<dt>' . XenForo_Template_Helper_Core::callHelper('resourceFieldTitle', array(
'0' => $fieldId
)) . ':</dt>
						<dd>' . $__compilerVar32 . '</dd>
					</dl>
				';
}
unset($__compilerVar32);
$__compilerVar31 .= '
			';
}
$__compilerVar31 .= '
		';
if (trim($__compilerVar31) !== '')
{
$__compilerVar30 .= '
		<div class="customResourceFields ' . htmlspecialchars($__compilerVar29, ENT_QUOTES, 'UTF-8') . '">
		' . $__compilerVar31 . '
		</div>
	';
}
unset($__compilerVar31);
$__compilerVar30 .= '
';
}
$__compilerVar27 .= $__compilerVar30;
unset($__compilerVar28, $__compilerVar29, $__compilerVar30);
$__compilerVar27 .= '
			';
$__compilerVar33 = '';
$__compilerVar33 .= '
				';
$__compilerVar34 = 'below_info';
$__compilerVar35 = 'belowInfo';
$__compilerVar36 = '';
if ($category['fieldCache'][$__compilerVar34])
{
$__compilerVar36 .= '
	';
$__compilerVar37 = '';
$__compilerVar37 .= '
			';
foreach ($category['fieldCache'][$__compilerVar34] AS $fieldId)
{
$__compilerVar37 .= '
				';
$__compilerVar38 = '';
$__compilerVar38 .= XenForo_Template_Helper_Core::callHelper('resourceFieldValue', array(
'0' => $resource,
'1' => $fieldId,
'2' => $resource['customFields'][$fieldId]
));
if (trim($__compilerVar38) !== '')
{
$__compilerVar37 .= '
					<dl class="customResourceField' . htmlspecialchars($fieldId, ENT_QUOTES, 'UTF-8') . '">
						<dt>' . XenForo_Template_Helper_Core::callHelper('resourceFieldTitle', array(
'0' => $fieldId
)) . ':</dt>
						<dd>' . $__compilerVar38 . '</dd>
					</dl>
				';
}
unset($__compilerVar38);
$__compilerVar37 .= '
			';
}
$__compilerVar37 .= '
		';
if (trim($__compilerVar37) !== '')
{
$__compilerVar36 .= '
		<div class="customResourceFields ' . htmlspecialchars($__compilerVar35, ENT_QUOTES, 'UTF-8') . '">
		' . $__compilerVar37 . '
		</div>
	';
}
unset($__compilerVar37);
$__compilerVar36 .= '
';
}
$__compilerVar33 .= $__compilerVar36;
unset($__compilerVar34, $__compilerVar35, $__compilerVar36);
$__compilerVar33 .= '
			';
$__compilerVar39 = '';
$this->addRequiredExternal('css', 'message_simple');
$__compilerVar39 .= '
';
$this->addRequiredExternal('css', 'bb_code');
$__compilerVar39 .= '
';
$this->addRequiredExternal('css', 'resource_view_header');
$__compilerVar39 .= '
';
$this->addRequiredExternal('css', 'resource_update');
$__compilerVar39 .= '

<li class="primaryContent messageSimple resourceUpdate" id="update-' . htmlspecialchars($update['resource_update_id'], ENT_QUOTES, 'UTF-8') . '" data-author="' . htmlspecialchars($resource['username'], ENT_QUOTES, 'UTF-8') . '">

	';
if ($update['title'] AND !$update['isDescriptionUpdate'] AND !$hideUpdateTitle)
{
$__compilerVar39 .= '
		<h2 class="textHeading">
			<a href="' . XenForo_Template_Helper_Core::link('resources/update', $resource, array(
'update' => $update['resource_update_id']
)) . '">' . htmlspecialchars($update['title'], ENT_QUOTES, 'UTF-8') . '</a>
		</h2>
	';
}
$__compilerVar39 .= '

	' . XenForo_Template_Helper_Core::callHelper('avatarhtml', array($resource,(1),array(
'user' => '$resource',
'img' => '1'
),'')) . '

	';
$__compilerVar40 = '';
$__compilerVar40 .= '
			';
if ($update['warning_message'])
{
$__compilerVar40 .= '
				<li class="warningNotice"><span class="icon Tooltip" title="' . 'Warning' . '" data-tipclass="iconTip flipped"></span>' . htmlspecialchars($update['warning_message'], ENT_QUOTES, 'UTF-8') . '</li>
			';
}
$__compilerVar40 .= '
			';
if ($update['message_state'] == ('deleted'))
{
$__compilerVar40 .= '
				<li class="deletedNotice">
					<span class="icon"></span>
					' . 'This update has been deleted.' . '
					';
if ($update['delete_user_id'])
{
$__compilerVar40 .= '
						' . 'Bị xóa bởi ' . XenForo_Template_Helper_Core::callHelper('username', array(
'0' => array(
'user_id' => $update['delete_user_id'],
'username' => $update['delete_username']
)
)) . '' . ', ' . XenForo_Template_Helper_Core::callHelper('datetimehtml', array($update['delete_date'],array(
'time' => htmlspecialchars($update['delete_date'], ENT_QUOTES, 'UTF-8')
)));
if ($update['delete_reason'])
{
$__compilerVar40 .= ', ' . 'Lý do' . ': ' . htmlspecialchars($update['delete_reason'], ENT_QUOTES, 'UTF-8');
}
$__compilerVar40 .= '.
					';
}
$__compilerVar40 .= '
				</li>
			';
}
$__compilerVar40 .= '
			';
if ($update['message_state'] == ('moderated'))
{
$__compilerVar40 .= '
				<li class="moderatedNotice">
					<span class="icon"></span>
					' . 'This update is currently awaiting approval.' . '
				</li>
			';
}
$__compilerVar40 .= '
		';
if (trim($__compilerVar40) !== '')
{
$__compilerVar39 .= '
		';
$this->addRequiredExternal('css', 'message_notices');
$__compilerVar39 .= '
		<ul class="messageNotices">
		' . $__compilerVar40 . '
		</ul>
	';
}
unset($__compilerVar40);
$__compilerVar39 .= '

	' . $extraUpdateHtml . '

	<article><blockquote class="ugc baseHtml messageText">
		' . $__compilerVar27 . '
		' . $update['messageHtml'] . '
		' . $__compilerVar33 . '
	</blockquote></article>

	';
if ($update['attachments'] AND !$update['isMessageTrimmed'])
{
$__compilerVar39 .= '
		<div class="imageCollection">
			<h3 class="textHeading">' . 'Images' . '</h3>
			<ol>
				';
foreach ($update['attachments'] AS $attachment)
{
$__compilerVar39 .= '
					';
if ($attachment['thumbnailUrl'])
{
$__compilerVar39 .= '
					<li><a href="' . XenForo_Template_Helper_Core::link('attachments', $attachment, array()) . '" target="_blank" class="' . (($canViewImages) ? ('LbTrigger') : ('')) . ' ' . ((!$attachment['thumbnailUrl']) ? ('noThumb') : ('')) . '"
						data-href="' . XenForo_Template_Helper_Core::link('misc/lightbox', false, array()) . '"><img
						src="' . htmlspecialchars($attachment['thumbnailUrl'], ENT_QUOTES, 'UTF-8') . '" alt="' . htmlspecialchars($attachment['filename'], ENT_QUOTES, 'UTF-8') . '"
						class="LbImage"
						data-src="' . XenForo_Template_Helper_Core::link('attachments', $attachment, array(
'embedded' => '1'
)) . '" /></a></li>
					';
}
$__compilerVar39 .= '
				';
}
$__compilerVar39 .= '
			</ol>
		</div>
	';
}
$__compilerVar39 .= '

	';
if ($__compilerVar26)
{
$__compilerVar39 .= '
		<div class="resourceAlerts secondaryContent" style="text-align: center">
			' . 'You do not have permission to view the full content of this resource.' . '
			';
if (!$visitor['user_id'])
{
$__compilerVar39 .= '
				<div style="margin-top: .5em">
					<label for="LoginControl"><a href="' . XenForo_Template_Helper_Core::link('login', false, array()) . '" class="inner">' . (($xenOptions['registrationSetup']['enabled']) ? ('Đăng ký!') : ('Đăng nhập')) . '</a></label>
				</div>
			';
}
$__compilerVar39 .= '
		</div>
	';
}
$__compilerVar39 .= '

	<div class="messageMeta">
		<span class="privateControls">
			';
if (!$update['isDescriptionUpdate'])
{
$__compilerVar39 .= '
				<span class="item muted">
					' . XenForo_Template_Helper_Core::callHelper('usernamehtml', array($resource,'',false,array(
'class' => 'author'
))) . ',
					<a href="' . XenForo_Template_Helper_Core::link('resources/update', $resource, array(
'update' => $update['resource_update_id']
)) . '" class="datePermalink">' . XenForo_Template_Helper_Core::callHelper('datetimehtml', array($update['post_date'],array(
'time' => '$update.post_date'
))) . '</a>
				</span>
			';
}
$__compilerVar39 .= '
			';
$__compilerVar41 = '';
$__compilerVar41 .= '
			';
if ($update['canEdit'])
{
$__compilerVar41 .= '
				';
if ($update['isDescriptionUpdate'])
{
$__compilerVar41 .= '
					<a href="' . XenForo_Template_Helper_Core::link('resources/edit', $resource, array()) . '"
						class="item control edit"><span></span>' . 'Sửa' . '</a>
				';
}
else
{
$__compilerVar41 .= '
					';
$this->addRequiredExternal('js', 'js/xenforo/discussion.js');
$__compilerVar41 .= '
					<a href="' . XenForo_Template_Helper_Core::link('resources/edit-update', $resource, array(
'resource_update_id' => $update['resource_update_id']
)) . '"
						class="item control edit OverlayTrigger"
						data-href="' . XenForo_Template_Helper_Core::link('resources/edit-update', $resource, array(
'resource_update_id' => $update['resource_update_id'],
'inline' => '1'
)) . '"
						data-overlayoptions="{&quot;fixed&quot;:false}"
						data-messageselector="#update-' . htmlspecialchars($update['resource_update_id'], ENT_QUOTES, 'UTF-8') . '"><span></span>' . 'Sửa' . '</a>
				';
}
$__compilerVar41 .= '
			';
}
$__compilerVar41 .= '
			';
if ($update['canDelete'])
{
$__compilerVar41 .= '
				<a href="' . XenForo_Template_Helper_Core::link('resources/delete-update', $resource, array(
'resource_update_id' => $update['resource_update_id']
)) . '"
					class="item control delete OverlayTrigger">' . 'Xóa' . '</a>
			';
}
$__compilerVar41 .= '
			';
if ($update['canWarn'])
{
$__compilerVar41 .= '
				<a href="' . XenForo_Template_Helper_Core::link('members/warn', $resource, array(
'content_type' => 'resource_update',
'content_id' => $update['resource_update_id']
)) . '" class="item control warn"><span></span>' . 'Cảnh cáo' . '</a>
			';
}
else if ($update['warning_id'] AND $canViewWarnings)
{
$__compilerVar41 .= '
				<a href="' . XenForo_Template_Helper_Core::link('warnings', $update, array()) . '" class="OverlayTrigger item control viewWarning"><span></span>' . 'View Warning' . '</a>
			';
}
$__compilerVar41 .= '
			';
if ($update['canReport'])
{
$__compilerVar41 .= '
				<a href="' . XenForo_Template_Helper_Core::link('resources/report-update', $resource, array(
'resource_update_id' => $update['resource_update_id']
)) . '" class="OverlayTrigger item control report" data-cacheOverlay="false"><span></span>' . 'Báo cáo' . '</a>
			';
}
$__compilerVar41 .= '
			';
if ($resource['canCleanSpam'])
{
$__compilerVar41 .= '<a href="' . XenForo_Template_Helper_Core::link('spam-cleaner', $resource, array()) . '" class="item control deleteSpam OverlayTrigger"><span></span>' . 'Spam' . '</a>';
}
$__compilerVar41 .= '
			';
$__compilerVar39 .= $this->callTemplateHook('resource_update_private_controls', $__compilerVar41, array(
'update' => $update
));
unset($__compilerVar41);
$__compilerVar39 .= '
		</span>
		';
$__compilerVar42 = '';
$__compilerVar42 .= '
				';
$__compilerVar43 = '';
$__compilerVar43 .= '
					';
if ($update['isMessageTrimmed'] and !$__compilerVar26)
{
$__compilerVar43 .= '
						<a href="' . XenForo_Template_Helper_Core::link('resources/update', $resource, array(
'resource_update_id' => $update['resource_update_id']
)) . '"
							class="item control readMore Loader"
							data-target="#update-' . htmlspecialchars($update['resource_update_id'], ENT_QUOTES, 'UTF-8') . '"
							data-method="replaceAll"><span></span>... ' . 'Read More' . '</a>
					';
}
$__compilerVar43 .= '
					';
if ($update['canLike'])
{
$__compilerVar43 .= '
						<a href="' . XenForo_Template_Helper_Core::link('resources/like-update', $resource, array(
'resource_update_id' => $update['resource_update_id']
)) . '"
							class="item control LikeLink ' . (($update['like_date']) ? ('unlike') : ('like')) . '"
							data-container="#likes-update-' . htmlspecialchars($update['resource_update_id'], ENT_QUOTES, 'UTF-8') . '"><span></span><span class="LikeLabel">' . (($update['like_date']) ? ('Không thích nữa') : ('Thích')) . '</span></a>
					';
}
$__compilerVar43 .= '
				';
$__compilerVar42 .= $this->callTemplateHook('resource_update_public_controls', $__compilerVar43, array(
'update' => $update
));
unset($__compilerVar43);
$__compilerVar42 .= '
				';
if (trim($__compilerVar42) !== '')
{
$__compilerVar39 .= '
			<span class="publicControls">
				' . $__compilerVar42 . '
			</span>
		';
}
unset($__compilerVar42);
$__compilerVar39 .= '
	</div>

	<div id="likes-update-' . htmlspecialchars($update['resource_update_id'], ENT_QUOTES, 'UTF-8') . '">';
if ($update['likes'])
{
$__compilerVar44 = '';
$__compilerVar44 .= XenForo_Template_Helper_Core::link('resources/update-likes', $resource, array(
'resource_update_id' => $update['resource_update_id']
));
$__compilerVar45 = '';
if ($update['likes'])
{
$__compilerVar45 .= '
	';
$this->addRequiredExternal('css', 'likes_summary');
$__compilerVar45 .= '
	<div class="likesSummary secondaryContent">
		<span class="LikeText">
			' . XenForo_Template_Helper_Core::callHelper('likeshtml', array($update['likes'],$__compilerVar44,$update['like_date'],$update['likeUsers'])) . '
		</span>
	</div>
';
}
$__compilerVar39 .= $__compilerVar45;
unset($__compilerVar44, $__compilerVar45);
}
$__compilerVar39 .= '</div>
</li>';
$__output .= $__compilerVar39;
unset($__compilerVar26, $__compilerVar27, $__compilerVar33, $__compilerVar39);
$__output .= '
	</ol>
</div>

';
if ($resource['canRateIfDownloaded'])
{
$__output .= '
	<div class="rateBlock">
		' . 'Rate This Resource' . ':
		';
$__compilerVar46 = '';
$__compilerVar46 .= XenForo_Template_Helper_Core::link('resources/rate', $resource, array());
$__compilerVar47 = '';
$this->addRequiredExternal('css', 'rating');
$__compilerVar47 .= '

';
if ($__compilerVar46)
{
$__compilerVar47 .= '
	';
$this->addRequiredExternal('js', 'js/xenforo/rating.js');
$__compilerVar47 .= '

	<form action="' . htmlspecialchars($__compilerVar46, ENT_QUOTES, 'UTF-8') . '" method="post" class="rating RatingWidget" ' . (($microdata) ? ('itemscope="itemscope" itemtype="http://data-vocabulary.org/Rating"') : ('')) . '>
		<dl>
			<dt class="prompt muted">' . $prompt . '</dt>
			<dd>
				<span class="ratings">
					 <button type="submit" name="rating" value="1" class="star ' . (($rating >= 1) ? ('Full') : ('')) . (($rating >= 0.5 AND $rating < 1) ? ('Half') : ('')) . '" title="' . 'Terrible' . '">1</button
					><button type="submit" name="rating" value="2" class="star ' . (($rating >= 2) ? ('Full') : ('')) . (($rating >= 1.5 AND $rating < 2) ? ('Half') : ('')) . '" title="' . 'Poor' . '">2</button
					><button type="submit" name="rating" value="3" class="star ' . (($rating >= 3) ? ('Full') : ('')) . (($rating >= 2.5 AND $rating < 3) ? ('Half') : ('')) . '" title="' . 'Average' . '">3</button
					><button type="submit" name="rating" value="4" class="star ' . (($rating >= 4) ? ('Full') : ('')) . (($rating >= 3.5 AND $rating < 4) ? ('Half') : ('')) . '" title="' . 'Good' . '">4</button
					><button type="submit" name="rating" value="5" class="star ' . (($rating >= 5) ? ('Full') : ('')) . (($rating >= 4.5 AND $rating < 5) ? ('Half') : ('')) . '" title="' . 'Excellent' . '">5</button>
				</span>
			
				<span class="RatingValue"><span class="Number" itemprop="average">' . htmlspecialchars($rating, ENT_QUOTES, 'UTF-8') . '</span>/<span itemprop="best">5</span>,</span>
				';
if ($threadrating['whoRated'] AND $controllerName == ('XenForo_ControllerPublic_Thread') AND $thread['thread_rate_count'] > 0)
{
$__compilerVar47 .= '
					<a href="' . XenForo_Template_Helper_Core::link('threads/whoRated', $thread, array()) . '" title="' . 'Who has rated this thread?' . '" class="OverlayTrigger"><span class="Hint">' . $hint . '</span></a>
				';
}
else
{
$__compilerVar47 .= '
				<span class="Hint">' . $hint . '</span>
				';
}
$__compilerVar47 .= '
			</dd>
		</dl>
		
		<input type="hidden" name="_xfToken" value="' . htmlspecialchars($visitor['csrf_token_page'], ENT_QUOTES, 'UTF-8') . '" />
	</form>
	
';
}
else
{
$__compilerVar47 .= '
	
	<div class="rating ';
if ($xenOptions['threadrating_greyedout'])
{
$__compilerVar47 .= 'tr_greyedout';
}
$__compilerVar47 .= '">
		<dl>
			<dt class="prompt muted">' . $prompt . '</dt>
			<dd>		
				<span class="ratings" title="' . XenForo_Template_Helper_Core::numberFormat($rating, '2') . '">
					 <span class="star ' . (($rating >= 1) ? ('Full') : ('')) . (($rating >= 0.5 AND $rating < 1) ? ('Half') : ('')) . '"></span
					><span class="star ' . (($rating >= 2) ? ('Full') : ('')) . (($rating >= 1.5 AND $rating < 2) ? ('Half') : ('')) . '"></span
					><span class="star ' . (($rating >= 3) ? ('Full') : ('')) . (($rating >= 2.5 AND $rating < 3) ? ('Half') : ('')) . '"></span
					><span class="star ' . (($rating >= 4) ? ('Full') : ('')) . (($rating >= 3.5 AND $rating < 4) ? ('Half') : ('')) . '"></span
					><span class="star ' . (($rating >= 5) ? ('Full') : ('')) . (($rating >= 4.5 AND $rating < 5) ? ('Half') : ('')) . '"></span>
				</span>
				
				<span class="RatingValue"><span class="Number" itemprop="average">' . htmlspecialchars($rating, ENT_QUOTES, 'UTF-8') . '</span>/<span itemprop="best">5</span>,</span>
				';
if ($threadrating['whoRated'] AND $controllerName == ('XenForo_ControllerPublic_Thread') AND $thread['thread_rate_count'] > 0)
{
$__compilerVar47 .= '
					<a href="' . XenForo_Template_Helper_Core::link('threads/whoRated', $thread, array()) . '" title="' . 'Who has rated this thread?' . '" class="OverlayTrigger"><span class="Hint">' . $hint . '</span></a>
				';
}
else
{
$__compilerVar47 .= '
				<span class="Hint">' . $hint . '</span>
				';
}
$__compilerVar47 .= '
			</dd>
		</dl>	
	</div>

';
}
$__output .= $__compilerVar47;
unset($__compilerVar46, $__compilerVar47);
$__output .= '
	</div>
';
}
$__output .= '

';
if ($updates)
{
$__output .= '
	<div class="section updates">
		<h3 class="textHeading">' . 'Recent Updates' . '</h3>
		<ol>
		';
foreach ($updates AS $update)
{
$__output .= '
			<li><a href="' . XenForo_Template_Helper_Core::link('resources/update', $resource, array(
'update' => $update['resource_update_id']
)) . '">' . htmlspecialchars($update['title'], ENT_QUOTES, 'UTF-8') . '</a> <span class="postDate">' . XenForo_Template_Helper_Core::callHelper('datetimehtml', array($update['post_date'],array(
'time' => htmlspecialchars($update['post_date'], ENT_QUOTES, 'UTF-8')
))) . '</li>
		';
}
$__output .= '
		</ol>
		';
if ($showReadAllUpdates)
{
$__output .= '
			<div class="moreLink"><a href="' . XenForo_Template_Helper_Core::link('resources/updates', $resource, array()) . '">' . 'Read all ' . XenForo_Template_Helper_Core::numberFormat($resource['update_count'], '0') . ' updates' . '...</a></div>
		';
}
$__output .= '
	</div>
';
}
$__output .= '

';
if ($reviews)
{
$__output .= '
	<div class="section reviews">
		<h3 class="textHeading">' . 'Recent Reviews' . '</h3>
		<ol>
		';
foreach ($reviews AS $review)
{
$__output .= '
			';
$__compilerVar48 = '';
$this->addRequiredExternal('css', 'message_simple');
$__compilerVar48 .= '
';
$this->addRequiredExternal('css', 'resource_review');
$__compilerVar48 .= '
';
$this->addRequiredExternal('css', 'bb_code');
$__compilerVar48 .= '

<li id="review-' . htmlspecialchars($review['resource_version_id'], ENT_QUOTES, 'UTF-8') . '-' . htmlspecialchars($review['user_id'], ENT_QUOTES, 'UTF-8') . '" class="primaryContent review messageSimple ' . (($review['is_admin'] OR $review['is_moderator']) ? ('staff') : ('')) . ' ' . (($review['rating_state'] == ('deleted')) ? ('resourceReviewDeleted') : ('')) . ' ' . (($review['isIgnored']) ? (' ignored') : ('')) . '" data-author="' . htmlspecialchars($review['username'], ENT_QUOTES, 'UTF-8') . '">

	' . XenForo_Template_Helper_Core::callHelper('avatarhtml', array($review,(true),array(
'user' => '$review',
'size' => 's',
'img' => 'true'
),'')) . '

	<div class="messageInfo">

		<div class="messageContent ToggleTriggerAnchor">
			' . XenForo_Template_Helper_Core::callHelper('usernamehtml', array($review,'',false,array(
'class' => 'poster'
))) . '
			';
if ($review['is_anonymous'] AND $review['canViewAnonymous'])
{
$__compilerVar48 .= '
				(' . XenForo_Template_Helper_Core::callHelper('usernamehtml', array($review['user'],'',false,array())) . ')
			';
}
$__compilerVar48 .= '
			';
$__compilerVar49 = '';
$__compilerVar49 .= htmlspecialchars($review['rating'], ENT_QUOTES, 'UTF-8');
$__compilerVar50 = '';
$this->addRequiredExternal('css', 'rating');
$__compilerVar50 .= '

';
if ($action)
{
$__compilerVar50 .= '
	';
$this->addRequiredExternal('js', 'js/xenforo/rating.js');
$__compilerVar50 .= '

	<form action="' . htmlspecialchars($action, ENT_QUOTES, 'UTF-8') . '" method="post" class="rating RatingWidget" ' . (($microdata) ? ('itemscope="itemscope" itemtype="http://data-vocabulary.org/Rating"') : ('')) . '>
		<dl>
			<dt class="prompt muted">' . $prompt . '</dt>
			<dd>
				<span class="ratings">
					 <button type="submit" name="rating" value="1" class="star ' . (($__compilerVar49 >= 1) ? ('Full') : ('')) . (($__compilerVar49 >= 0.5 AND $__compilerVar49 < 1) ? ('Half') : ('')) . '" title="' . 'Terrible' . '">1</button
					><button type="submit" name="rating" value="2" class="star ' . (($__compilerVar49 >= 2) ? ('Full') : ('')) . (($__compilerVar49 >= 1.5 AND $__compilerVar49 < 2) ? ('Half') : ('')) . '" title="' . 'Poor' . '">2</button
					><button type="submit" name="rating" value="3" class="star ' . (($__compilerVar49 >= 3) ? ('Full') : ('')) . (($__compilerVar49 >= 2.5 AND $__compilerVar49 < 3) ? ('Half') : ('')) . '" title="' . 'Average' . '">3</button
					><button type="submit" name="rating" value="4" class="star ' . (($__compilerVar49 >= 4) ? ('Full') : ('')) . (($__compilerVar49 >= 3.5 AND $__compilerVar49 < 4) ? ('Half') : ('')) . '" title="' . 'Good' . '">4</button
					><button type="submit" name="rating" value="5" class="star ' . (($__compilerVar49 >= 5) ? ('Full') : ('')) . (($__compilerVar49 >= 4.5 AND $__compilerVar49 < 5) ? ('Half') : ('')) . '" title="' . 'Excellent' . '">5</button>
				</span>
			
				<span class="RatingValue"><span class="Number" itemprop="average">' . htmlspecialchars($__compilerVar49, ENT_QUOTES, 'UTF-8') . '</span>/<span itemprop="best">5</span>,</span>
				';
if ($threadrating['whoRated'] AND $controllerName == ('XenForo_ControllerPublic_Thread') AND $thread['thread_rate_count'] > 0)
{
$__compilerVar50 .= '
					<a href="' . XenForo_Template_Helper_Core::link('threads/whoRated', $thread, array()) . '" title="' . 'Who has rated this thread?' . '" class="OverlayTrigger"><span class="Hint">' . $hint . '</span></a>
				';
}
else
{
$__compilerVar50 .= '
				<span class="Hint">' . $hint . '</span>
				';
}
$__compilerVar50 .= '
			</dd>
		</dl>
		
		<input type="hidden" name="_xfToken" value="' . htmlspecialchars($visitor['csrf_token_page'], ENT_QUOTES, 'UTF-8') . '" />
	</form>
	
';
}
else
{
$__compilerVar50 .= '
	
	<div class="rating ';
if ($xenOptions['threadrating_greyedout'])
{
$__compilerVar50 .= 'tr_greyedout';
}
$__compilerVar50 .= '">
		<dl>
			<dt class="prompt muted">' . $prompt . '</dt>
			<dd>		
				<span class="ratings" title="' . XenForo_Template_Helper_Core::numberFormat($__compilerVar49, '2') . '">
					 <span class="star ' . (($__compilerVar49 >= 1) ? ('Full') : ('')) . (($__compilerVar49 >= 0.5 AND $__compilerVar49 < 1) ? ('Half') : ('')) . '"></span
					><span class="star ' . (($__compilerVar49 >= 2) ? ('Full') : ('')) . (($__compilerVar49 >= 1.5 AND $__compilerVar49 < 2) ? ('Half') : ('')) . '"></span
					><span class="star ' . (($__compilerVar49 >= 3) ? ('Full') : ('')) . (($__compilerVar49 >= 2.5 AND $__compilerVar49 < 3) ? ('Half') : ('')) . '"></span
					><span class="star ' . (($__compilerVar49 >= 4) ? ('Full') : ('')) . (($__compilerVar49 >= 3.5 AND $__compilerVar49 < 4) ? ('Half') : ('')) . '"></span
					><span class="star ' . (($__compilerVar49 >= 5) ? ('Full') : ('')) . (($__compilerVar49 >= 4.5 AND $__compilerVar49 < 5) ? ('Half') : ('')) . '"></span>
				</span>
				
				<span class="RatingValue"><span class="Number" itemprop="average">' . htmlspecialchars($__compilerVar49, ENT_QUOTES, 'UTF-8') . '</span>/<span itemprop="best">5</span>,</span>
				';
if ($threadrating['whoRated'] AND $controllerName == ('XenForo_ControllerPublic_Thread') AND $thread['thread_rate_count'] > 0)
{
$__compilerVar50 .= '
					<a href="' . XenForo_Template_Helper_Core::link('threads/whoRated', $thread, array()) . '" title="' . 'Who has rated this thread?' . '" class="OverlayTrigger"><span class="Hint">' . $hint . '</span></a>
				';
}
else
{
$__compilerVar50 .= '
				<span class="Hint">' . $hint . '</span>
				';
}
$__compilerVar50 .= '
			</dd>
		</dl>	
	</div>

';
}
$__compilerVar48 .= $__compilerVar50;
unset($__compilerVar49, $__compilerVar50);
$__compilerVar48 .= '
			';
if (!$resource['isFilelessNoExternal'])
{
$__compilerVar48 .= '<span class="muted">' . 'Version' . ': ' . htmlspecialchars($review['version_string'], ENT_QUOTES, 'UTF-8') . '</span>';
}
$__compilerVar48 .= '
			';
if ($review['rating_state'] == ('deleted'))
{
$__compilerVar48 .= '
				<div class="reviewDeletedNotice">
					<span class="icon"></span>
					' . 'This review has been deleted.' . ' <a href="javascript:" class="JsOnly ToggleTrigger" data-target=".ugc">' . 'Xem' . '</a>
				</div>
			';
}
$__compilerVar48 .= '
			<article><blockquote class="ugc baseHtml' . (($review['isIgnored']) ? (' ignored') : ('')) . '">' . XenForo_Template_Helper_Core::callHelper('bodyText', array(
'0' => $review['message']
)) . '</blockquote></article>
		</div>

		<div class="messageMeta">
			<div class="privateControls">
				<a href="' . XenForo_Template_Helper_Core::link('resources/reviews', $resource, array(
'review' => $review
)) . '" title="' . 'Permalink' . '" class="item muted">' . XenForo_Template_Helper_Core::callHelper('datetimehtml', array($review['rating_date'],array(
'time' => '$review.rating_date'
))) . '</a>
				';
if ($review['canDelete'])
{
$__compilerVar48 .= '
					<a href="' . XenForo_Template_Helper_Core::link('resources/reviews/delete', $resource, array(
'review' => $review
)) . '" class="item OverlayTrigger control delete"><span></span>' . 'Xóa' . '</a>
				';
}
$__compilerVar48 .= '
				';
if ($review['canUndelete'])
{
$__compilerVar48 .= '
					<a href="' . XenForo_Template_Helper_Core::link('resources/reviews/undelete', $resource, array(
'review' => $review,
't' => $visitor['csrf_token_page']
)) . '" class="item OverlayTrigger control undelete"><span></span>' . 'Undelete' . '</a>
				';
}
$__compilerVar48 .= '
				';
if ($canViewIps AND $review['ip_id'])
{
$__compilerVar48 .= '
					<a href="' . XenForo_Template_Helper_Core::link('resources/reviews/ip', $resource, array(
'review' => $review
)) . '" class="item control ip OverlayTrigger"><span></span>' . 'IP' . '</a>
				';
}
$__compilerVar48 .= '

				';
if ($review['canWarn'])
{
$__compilerVar48 .= '
					<a href="' . XenForo_Template_Helper_Core::link('members/warn', $review, array(
'content_type' => 'resource_rating',
'content_id' => $review['resource_rating_id']
)) . '" class="item control warn"><span></span>' . 'Cảnh cáo' . '</a>
				';
}
else if ($review['warning_id'] AND $canViewWarnings)
{
$__compilerVar48 .= '
					<a href="' . XenForo_Template_Helper_Core::link('warnings', $review, array()) . '" class="OverlayTrigger item control viewWarning"><span></span>' . 'View Warning' . '</a>
				';
}
$__compilerVar48 .= '

				';
if ($review['canReport'])
{
$__compilerVar48 .= '
					<a href="' . XenForo_Template_Helper_Core::link('resources/reviews/report', $resource, array(
'review' => $review
)) . '" class="OverlayTrigger item control report" data-cacheOverlay="false"><span></span>' . 'Báo cáo' . '</a>
				';
}
$__compilerVar48 .= '
			</div>

			';
if ($review['canReply'])
{
$__compilerVar48 .= '
				<div class="publicControls">
					<a href="' . XenForo_Template_Helper_Core::link('resources/reviews/reply', $resource, array(
'review' => $review
)) . '" class="OverlayTrigger item control reply"><span></span>' . 'Trả lời' . '</a>
				</div>
			';
}
$__compilerVar48 .= '
		</div>

		';
if ($review['author_response'])
{
$__compilerVar48 .= '
			<ol class="messageResponse">
				<li class="comment secondaryContent">
					' . XenForo_Template_Helper_Core::callHelper('avatarhtml', array($resource,(true),array(
'user' => '$resource',
'size' => 's',
'img' => 'true'
),'')) . '

					<div class="commentInfo">
						<div class="commentContent">
							<a href="' . XenForo_Template_Helper_Core::link('members', $resource, array()) . '" class="username poster">' . 'Author\'s Response' . '</a>
							<article><blockquote>' . XenForo_Template_Helper_Core::callHelper('bodyText', array(
'0' => $review['author_response']
)) . '</blockquote></article>
						</div>
						';
if ($review['canDeleteResponse'])
{
$__compilerVar48 .= '
							<div class="commentControls">
								<a href="' . XenForo_Template_Helper_Core::link('resources/reviews/delete', $resource, array(
'review' => $review,
'response' => '1'
)) . '" class="OverlayTrigger control delete"><span></span>' . 'Xóa' . '</a>
							</div>
						';
}
$__compilerVar48 .= '
					</div>

				</li>
			</ol>
		';
}
$__compilerVar48 .= '

	</div>
</li>';
$__output .= $__compilerVar48;
unset($__compilerVar48);
$__output .= '
		';
}
$__output .= '
		</ol>
		<div ' . ((!$ignoredReviewNames) ? (' style="display: none"') : ('')) . '><a href="javascript:" class="muted jsOnly DisplayIgnoredContent Tooltip" title="' . 'Show hidden content by ' . XenForo_Template_Helper_Core::callHelper('implode', array(
'0' => $ignoredReviewNames,
'1' => ', '
)) . '' . '">' . 'Show Ignored Content' . '</a></div>
		';
if ($showMoreReviews)
{
$__output .= '
			<div class="moreLink"><a href="' . XenForo_Template_Helper_Core::link('resources/reviews', $resource, array()) . '">' . 'Read all ' . XenForo_Template_Helper_Core::numberFormat($resource['review_count'], '0') . ' reviews' . '...</a></div>
		';
}
$__output .= '
	</div>
';
}
