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
$__compilerVar1 = '';
$__compilerVar1 .= (($isLimited) ? ('1') : (''));
$__compilerVar2 = '';
$__compilerVar2 .= '
				';
$__compilerVar3 = 'above_info';
$__compilerVar4 = 'aboveInfo';
$__compilerVar5 = '';
if ($category['fieldCache'][$__compilerVar3])
{
$__compilerVar5 .= '
	';
$__compilerVar6 = '';
$__compilerVar6 .= '
			';
foreach ($category['fieldCache'][$__compilerVar3] AS $fieldId)
{
$__compilerVar6 .= '
				';
$__compilerVar7 = '';
$__compilerVar7 .= XenForo_Template_Helper_Core::callHelper('resourceFieldValue', array(
'0' => $resource,
'1' => $fieldId,
'2' => $resource['customFields'][$fieldId]
));
if (trim($__compilerVar7) !== '')
{
$__compilerVar6 .= '
					<dl class="customResourceField' . htmlspecialchars($fieldId, ENT_QUOTES, 'UTF-8') . '">
						<dt>' . XenForo_Template_Helper_Core::callHelper('resourceFieldTitle', array(
'0' => $fieldId
)) . ':</dt>
						<dd>' . $__compilerVar7 . '</dd>
					</dl>
				';
}
unset($__compilerVar7);
$__compilerVar6 .= '
			';
}
$__compilerVar6 .= '
		';
if (trim($__compilerVar6) !== '')
{
$__compilerVar5 .= '
		<div class="customResourceFields ' . htmlspecialchars($__compilerVar4, ENT_QUOTES, 'UTF-8') . '">
		' . $__compilerVar6 . '
		</div>
	';
}
unset($__compilerVar6);
$__compilerVar5 .= '
';
}
$__compilerVar2 .= $__compilerVar5;
unset($__compilerVar3, $__compilerVar4, $__compilerVar5);
$__compilerVar2 .= '
			';
$__compilerVar8 = '';
$__compilerVar8 .= '
				';
$__compilerVar9 = 'below_info';
$__compilerVar10 = 'belowInfo';
$__compilerVar11 = '';
if ($category['fieldCache'][$__compilerVar9])
{
$__compilerVar11 .= '
	';
$__compilerVar12 = '';
$__compilerVar12 .= '
			';
foreach ($category['fieldCache'][$__compilerVar9] AS $fieldId)
{
$__compilerVar12 .= '
				';
$__compilerVar13 = '';
$__compilerVar13 .= XenForo_Template_Helper_Core::callHelper('resourceFieldValue', array(
'0' => $resource,
'1' => $fieldId,
'2' => $resource['customFields'][$fieldId]
));
if (trim($__compilerVar13) !== '')
{
$__compilerVar12 .= '
					<dl class="customResourceField' . htmlspecialchars($fieldId, ENT_QUOTES, 'UTF-8') . '">
						<dt>' . XenForo_Template_Helper_Core::callHelper('resourceFieldTitle', array(
'0' => $fieldId
)) . ':</dt>
						<dd>' . $__compilerVar13 . '</dd>
					</dl>
				';
}
unset($__compilerVar13);
$__compilerVar12 .= '
			';
}
$__compilerVar12 .= '
		';
if (trim($__compilerVar12) !== '')
{
$__compilerVar11 .= '
		<div class="customResourceFields ' . htmlspecialchars($__compilerVar10, ENT_QUOTES, 'UTF-8') . '">
		' . $__compilerVar12 . '
		</div>
	';
}
unset($__compilerVar12);
$__compilerVar11 .= '
';
}
$__compilerVar8 .= $__compilerVar11;
unset($__compilerVar9, $__compilerVar10, $__compilerVar11);
$__compilerVar8 .= '
			';
$__compilerVar14 = '';
$this->addRequiredExternal('css', 'message_simple');
$__compilerVar14 .= '
';
$this->addRequiredExternal('css', 'bb_code');
$__compilerVar14 .= '
';
$this->addRequiredExternal('css', 'resource_view_header');
$__compilerVar14 .= '
';
$this->addRequiredExternal('css', 'resource_update');
$__compilerVar14 .= '

<li class="primaryContent messageSimple resourceUpdate" id="update-' . htmlspecialchars($update['resource_update_id'], ENT_QUOTES, 'UTF-8') . '" data-author="' . htmlspecialchars($resource['username'], ENT_QUOTES, 'UTF-8') . '">

	';
if ($update['title'] AND !$update['isDescriptionUpdate'] AND !$hideUpdateTitle)
{
$__compilerVar14 .= '
		<h2 class="textHeading">
			<a href="' . XenForo_Template_Helper_Core::link('resources/update', $resource, array(
'update' => $update['resource_update_id']
)) . '">' . htmlspecialchars($update['title'], ENT_QUOTES, 'UTF-8') . '</a>
		</h2>
	';
}
$__compilerVar14 .= '

	' . XenForo_Template_Helper_Core::callHelper('avatarhtml', array($resource,(1),array(
'user' => '$resource',
'img' => '1'
),'')) . '

	';
$__compilerVar15 = '';
$__compilerVar15 .= '
			';
if ($update['warning_message'])
{
$__compilerVar15 .= '
				<li class="warningNotice"><span class="icon Tooltip" title="' . 'Warning' . '" data-tipclass="iconTip flipped"></span>' . htmlspecialchars($update['warning_message'], ENT_QUOTES, 'UTF-8') . '</li>
			';
}
$__compilerVar15 .= '
			';
if ($update['message_state'] == ('deleted'))
{
$__compilerVar15 .= '
				<li class="deletedNotice">
					<span class="icon"></span>
					' . 'This update has been deleted.' . '
					';
if ($update['delete_user_id'])
{
$__compilerVar15 .= '
						' . 'Deleted by ' . XenForo_Template_Helper_Core::callHelper('username', array(
'0' => array(
'user_id' => $update['delete_user_id'],
'username' => $update['delete_username']
)
)) . '' . ', ' . XenForo_Template_Helper_Core::callHelper('datetimehtml', array($update['delete_date'],array(
'time' => htmlspecialchars($update['delete_date'], ENT_QUOTES, 'UTF-8')
)));
if ($update['delete_reason'])
{
$__compilerVar15 .= ', ' . 'Reason' . ': ' . htmlspecialchars($update['delete_reason'], ENT_QUOTES, 'UTF-8');
}
$__compilerVar15 .= '.
					';
}
$__compilerVar15 .= '
				</li>
			';
}
$__compilerVar15 .= '
			';
if ($update['message_state'] == ('moderated'))
{
$__compilerVar15 .= '
				<li class="moderatedNotice">
					<span class="icon"></span>
					' . 'This update is currently awaiting approval.' . '
				</li>
			';
}
$__compilerVar15 .= '
		';
if (trim($__compilerVar15) !== '')
{
$__compilerVar14 .= '
		';
$this->addRequiredExternal('css', 'message_notices');
$__compilerVar14 .= '
		<ul class="messageNotices">
		' . $__compilerVar15 . '
		</ul>
	';
}
unset($__compilerVar15);
$__compilerVar14 .= '

	' . $extraUpdateHtml . '

	<article><blockquote class="ugc baseHtml messageText">
		' . $__compilerVar2 . '
		' . $update['messageHtml'] . '
		' . $__compilerVar8 . '
	</blockquote></article>

	';
if ($update['attachments'] AND !$update['isMessageTrimmed'])
{
$__compilerVar14 .= '
		<div class="imageCollection">
			<h3 class="textHeading">' . 'Images' . '</h3>
			<ol>
				';
foreach ($update['attachments'] AS $attachment)
{
$__compilerVar14 .= '
					';
if ($attachment['thumbnailUrl'])
{
$__compilerVar14 .= '
					<li><a href="' . XenForo_Template_Helper_Core::link('attachments', $attachment, array()) . '" target="_blank" class="' . (($canViewImages) ? ('LbTrigger') : ('')) . ' ' . ((!$attachment['thumbnailUrl']) ? ('noThumb') : ('')) . '"
						data-href="' . XenForo_Template_Helper_Core::link('misc/lightbox', false, array()) . '"><img
						src="' . htmlspecialchars($attachment['thumbnailUrl'], ENT_QUOTES, 'UTF-8') . '" alt="' . htmlspecialchars($attachment['filename'], ENT_QUOTES, 'UTF-8') . '"
						class="LbImage"
						data-src="' . XenForo_Template_Helper_Core::link('attachments', $attachment, array(
'embedded' => '1'
)) . '" /></a></li>
					';
}
$__compilerVar14 .= '
				';
}
$__compilerVar14 .= '
			</ol>
		</div>
	';
}
$__compilerVar14 .= '

	';
if ($__compilerVar1)
{
$__compilerVar14 .= '
		<div class="resourceAlerts secondaryContent" style="text-align: center">
			' . 'You do not have permission to view the full content of this resource.' . '
			';
if (!$visitor['user_id'])
{
$__compilerVar14 .= '
				<div style="margin-top: .5em">
					<label for="LoginControl"><a href="' . XenForo_Template_Helper_Core::link('login', false, array()) . '" class="inner">' . (($xenOptions['registrationSetup']['enabled']) ? ('Sign up now!') : ('Log in')) . '</a></label>
				</div>
			';
}
$__compilerVar14 .= '
		</div>
	';
}
$__compilerVar14 .= '

	<div class="messageMeta">
		<span class="privateControls">
			';
if (!$update['isDescriptionUpdate'])
{
$__compilerVar14 .= '
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
$__compilerVar14 .= '
			';
$__compilerVar16 = '';
$__compilerVar16 .= '
			';
if ($update['canEdit'])
{
$__compilerVar16 .= '
				';
if ($update['isDescriptionUpdate'])
{
$__compilerVar16 .= '
					<a href="' . XenForo_Template_Helper_Core::link('resources/edit', $resource, array()) . '"
						class="item control edit"><span></span>' . 'Edit' . '</a>
				';
}
else
{
$__compilerVar16 .= '
					';
$this->addRequiredExternal('js', 'js/xenforo/discussion.js');
$__compilerVar16 .= '
					<a href="' . XenForo_Template_Helper_Core::link('resources/edit-update', $resource, array(
'resource_update_id' => $update['resource_update_id']
)) . '"
						class="item control edit OverlayTrigger"
						data-href="' . XenForo_Template_Helper_Core::link('resources/edit-update', $resource, array(
'resource_update_id' => $update['resource_update_id'],
'inline' => '1'
)) . '"
						data-overlayoptions="{&quot;fixed&quot;:false}"
						data-messageselector="#update-' . htmlspecialchars($update['resource_update_id'], ENT_QUOTES, 'UTF-8') . '"><span></span>' . 'Edit' . '</a>
				';
}
$__compilerVar16 .= '
			';
}
$__compilerVar16 .= '
			';
if ($update['canDelete'])
{
$__compilerVar16 .= '
				<a href="' . XenForo_Template_Helper_Core::link('resources/delete-update', $resource, array(
'resource_update_id' => $update['resource_update_id']
)) . '"
					class="item control delete OverlayTrigger">' . 'Delete' . '</a>
			';
}
$__compilerVar16 .= '
			';
if ($update['canWarn'])
{
$__compilerVar16 .= '
				<a href="' . XenForo_Template_Helper_Core::link('members/warn', $resource, array(
'content_type' => 'resource_update',
'content_id' => $update['resource_update_id']
)) . '" class="item control warn"><span></span>' . 'Warn' . '</a>
			';
}
else if ($update['warning_id'] AND $canViewWarnings)
{
$__compilerVar16 .= '
				<a href="' . XenForo_Template_Helper_Core::link('warnings', $update, array()) . '" class="OverlayTrigger item control viewWarning"><span></span>' . 'View Warning' . '</a>
			';
}
$__compilerVar16 .= '
			';
if ($update['canReport'])
{
$__compilerVar16 .= '
				<a href="' . XenForo_Template_Helper_Core::link('resources/report-update', $resource, array(
'resource_update_id' => $update['resource_update_id']
)) . '" class="OverlayTrigger item control report" data-cacheOverlay="false"><span></span>' . 'Report' . '</a>
			';
}
$__compilerVar16 .= '
			';
if ($resource['canCleanSpam'])
{
$__compilerVar16 .= '<a href="' . XenForo_Template_Helper_Core::link('spam-cleaner', $resource, array()) . '" class="item control deleteSpam OverlayTrigger"><span></span>' . 'Spam' . '</a>';
}
$__compilerVar16 .= '
			';
$__compilerVar14 .= $this->callTemplateHook('resource_update_private_controls', $__compilerVar16, array(
'update' => $update
));
unset($__compilerVar16);
$__compilerVar14 .= '
		</span>
		';
$__compilerVar17 = '';
$__compilerVar17 .= '
				';
$__compilerVar18 = '';
$__compilerVar18 .= '
					';
if ($update['isMessageTrimmed'] and !$__compilerVar1)
{
$__compilerVar18 .= '
						<a href="' . XenForo_Template_Helper_Core::link('resources/update', $resource, array(
'resource_update_id' => $update['resource_update_id']
)) . '"
							class="item control readMore Loader"
							data-target="#update-' . htmlspecialchars($update['resource_update_id'], ENT_QUOTES, 'UTF-8') . '"
							data-method="replaceAll"><span></span>... ' . 'Read More' . '</a>
					';
}
$__compilerVar18 .= '
					';
if ($update['canLike'])
{
$__compilerVar18 .= '
						<a href="' . XenForo_Template_Helper_Core::link('resources/like-update', $resource, array(
'resource_update_id' => $update['resource_update_id']
)) . '"
							class="item control LikeLink ' . (($update['like_date']) ? ('unlike') : ('like')) . '"
							data-container="#likes-update-' . htmlspecialchars($update['resource_update_id'], ENT_QUOTES, 'UTF-8') . '"><span></span><span class="LikeLabel">' . (($update['like_date']) ? ('Unlike') : ('Like')) . '</span></a>
					';
}
$__compilerVar18 .= '
				';
$__compilerVar17 .= $this->callTemplateHook('resource_update_public_controls', $__compilerVar18, array(
'update' => $update
));
unset($__compilerVar18);
$__compilerVar17 .= '
				';
if (trim($__compilerVar17) !== '')
{
$__compilerVar14 .= '
			<span class="publicControls">
				' . $__compilerVar17 . '
			</span>
		';
}
unset($__compilerVar17);
$__compilerVar14 .= '
	</div>

	<div id="likes-update-' . htmlspecialchars($update['resource_update_id'], ENT_QUOTES, 'UTF-8') . '">';
if ($update['likes'])
{
$__compilerVar19 = '';
$__compilerVar19 .= XenForo_Template_Helper_Core::link('resources/update-likes', $resource, array(
'resource_update_id' => $update['resource_update_id']
));
$__compilerVar20 = '';
if ($update['likes'])
{
$__compilerVar20 .= '
	';
$this->addRequiredExternal('css', 'likes_summary');
$__compilerVar20 .= '
	<div class="likesSummary secondaryContent">
		<span class="LikeText">
			' . XenForo_Template_Helper_Core::callHelper('likeshtml', array($update['likes'],$__compilerVar19,$update['like_date'],$update['likeUsers'])) . '
		</span>
	</div>
';
}
$__compilerVar14 .= $__compilerVar20;
unset($__compilerVar19, $__compilerVar20);
}
$__compilerVar14 .= '</div>
</li>';
$__output .= $__compilerVar14;
unset($__compilerVar1, $__compilerVar2, $__compilerVar8, $__compilerVar14);
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
$__compilerVar21 = '';
$__compilerVar21 .= XenForo_Template_Helper_Core::link('resources/rate', $resource, array());
$__compilerVar22 = '';
$this->addRequiredExternal('css', 'rating');
$__compilerVar22 .= '

';
if ($__compilerVar21)
{
$__compilerVar22 .= '
	';
$this->addRequiredExternal('js', 'js/xenforo/rating.js');
$__compilerVar22 .= '

	<form action="' . htmlspecialchars($__compilerVar21, ENT_QUOTES, 'UTF-8') . '" method="post" class="rating RatingWidget" ' . (($microdata) ? ('itemscope="itemscope" itemtype="http://data-vocabulary.org/Rating"') : ('')) . '>
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
$__compilerVar22 .= '
					<a href="' . XenForo_Template_Helper_Core::link('threads/whoRated', $thread, array()) . '" title="' . 'Who has rated this thread?' . '" class="OverlayTrigger"><span class="Hint">' . $hint . '</span></a>
				';
}
else
{
$__compilerVar22 .= '
				<span class="Hint">' . $hint . '</span>
				';
}
$__compilerVar22 .= '
			</dd>
		</dl>
		
		<input type="hidden" name="_xfToken" value="' . htmlspecialchars($visitor['csrf_token_page'], ENT_QUOTES, 'UTF-8') . '" />
	</form>
	
';
}
else
{
$__compilerVar22 .= '
	
	<div class="rating ';
if ($xenOptions['threadrating_greyedout'])
{
$__compilerVar22 .= 'tr_greyedout';
}
$__compilerVar22 .= '">
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
$__compilerVar22 .= '
					<a href="' . XenForo_Template_Helper_Core::link('threads/whoRated', $thread, array()) . '" title="' . 'Who has rated this thread?' . '" class="OverlayTrigger"><span class="Hint">' . $hint . '</span></a>
				';
}
else
{
$__compilerVar22 .= '
				<span class="Hint">' . $hint . '</span>
				';
}
$__compilerVar22 .= '
			</dd>
		</dl>	
	</div>

';
}
$__output .= $__compilerVar22;
unset($__compilerVar21, $__compilerVar22);
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
$__compilerVar23 = '';
$this->addRequiredExternal('css', 'message_simple');
$__compilerVar23 .= '
';
$this->addRequiredExternal('css', 'resource_review');
$__compilerVar23 .= '
';
$this->addRequiredExternal('css', 'bb_code');
$__compilerVar23 .= '

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
$__compilerVar23 .= '
				(' . XenForo_Template_Helper_Core::callHelper('usernamehtml', array($review['user'],'',false,array())) . ')
			';
}
$__compilerVar23 .= '
			';
$__compilerVar24 = '';
$__compilerVar24 .= htmlspecialchars($review['rating'], ENT_QUOTES, 'UTF-8');
$__compilerVar25 = '';
$this->addRequiredExternal('css', 'rating');
$__compilerVar25 .= '

';
if ($action)
{
$__compilerVar25 .= '
	';
$this->addRequiredExternal('js', 'js/xenforo/rating.js');
$__compilerVar25 .= '

	<form action="' . htmlspecialchars($action, ENT_QUOTES, 'UTF-8') . '" method="post" class="rating RatingWidget" ' . (($microdata) ? ('itemscope="itemscope" itemtype="http://data-vocabulary.org/Rating"') : ('')) . '>
		<dl>
			<dt class="prompt muted">' . $prompt . '</dt>
			<dd>
				<span class="ratings">
					 <button type="submit" name="rating" value="1" class="star ' . (($__compilerVar24 >= 1) ? ('Full') : ('')) . (($__compilerVar24 >= 0.5 AND $__compilerVar24 < 1) ? ('Half') : ('')) . '" title="' . 'Terrible' . '">1</button
					><button type="submit" name="rating" value="2" class="star ' . (($__compilerVar24 >= 2) ? ('Full') : ('')) . (($__compilerVar24 >= 1.5 AND $__compilerVar24 < 2) ? ('Half') : ('')) . '" title="' . 'Poor' . '">2</button
					><button type="submit" name="rating" value="3" class="star ' . (($__compilerVar24 >= 3) ? ('Full') : ('')) . (($__compilerVar24 >= 2.5 AND $__compilerVar24 < 3) ? ('Half') : ('')) . '" title="' . 'Average' . '">3</button
					><button type="submit" name="rating" value="4" class="star ' . (($__compilerVar24 >= 4) ? ('Full') : ('')) . (($__compilerVar24 >= 3.5 AND $__compilerVar24 < 4) ? ('Half') : ('')) . '" title="' . 'Good' . '">4</button
					><button type="submit" name="rating" value="5" class="star ' . (($__compilerVar24 >= 5) ? ('Full') : ('')) . (($__compilerVar24 >= 4.5 AND $__compilerVar24 < 5) ? ('Half') : ('')) . '" title="' . 'Excellent' . '">5</button>
				</span>
			
				<span class="RatingValue"><span class="Number" itemprop="average">' . htmlspecialchars($__compilerVar24, ENT_QUOTES, 'UTF-8') . '</span>/<span itemprop="best">5</span>,</span>
				';
if ($threadrating['whoRated'] AND $controllerName == ('XenForo_ControllerPublic_Thread') AND $thread['thread_rate_count'] > 0)
{
$__compilerVar25 .= '
					<a href="' . XenForo_Template_Helper_Core::link('threads/whoRated', $thread, array()) . '" title="' . 'Who has rated this thread?' . '" class="OverlayTrigger"><span class="Hint">' . $hint . '</span></a>
				';
}
else
{
$__compilerVar25 .= '
				<span class="Hint">' . $hint . '</span>
				';
}
$__compilerVar25 .= '
			</dd>
		</dl>
		
		<input type="hidden" name="_xfToken" value="' . htmlspecialchars($visitor['csrf_token_page'], ENT_QUOTES, 'UTF-8') . '" />
	</form>
	
';
}
else
{
$__compilerVar25 .= '
	
	<div class="rating ';
if ($xenOptions['threadrating_greyedout'])
{
$__compilerVar25 .= 'tr_greyedout';
}
$__compilerVar25 .= '">
		<dl>
			<dt class="prompt muted">' . $prompt . '</dt>
			<dd>		
				<span class="ratings" title="' . XenForo_Template_Helper_Core::numberFormat($__compilerVar24, '2') . '">
					 <span class="star ' . (($__compilerVar24 >= 1) ? ('Full') : ('')) . (($__compilerVar24 >= 0.5 AND $__compilerVar24 < 1) ? ('Half') : ('')) . '"></span
					><span class="star ' . (($__compilerVar24 >= 2) ? ('Full') : ('')) . (($__compilerVar24 >= 1.5 AND $__compilerVar24 < 2) ? ('Half') : ('')) . '"></span
					><span class="star ' . (($__compilerVar24 >= 3) ? ('Full') : ('')) . (($__compilerVar24 >= 2.5 AND $__compilerVar24 < 3) ? ('Half') : ('')) . '"></span
					><span class="star ' . (($__compilerVar24 >= 4) ? ('Full') : ('')) . (($__compilerVar24 >= 3.5 AND $__compilerVar24 < 4) ? ('Half') : ('')) . '"></span
					><span class="star ' . (($__compilerVar24 >= 5) ? ('Full') : ('')) . (($__compilerVar24 >= 4.5 AND $__compilerVar24 < 5) ? ('Half') : ('')) . '"></span>
				</span>
				
				<span class="RatingValue"><span class="Number" itemprop="average">' . htmlspecialchars($__compilerVar24, ENT_QUOTES, 'UTF-8') . '</span>/<span itemprop="best">5</span>,</span>
				';
if ($threadrating['whoRated'] AND $controllerName == ('XenForo_ControllerPublic_Thread') AND $thread['thread_rate_count'] > 0)
{
$__compilerVar25 .= '
					<a href="' . XenForo_Template_Helper_Core::link('threads/whoRated', $thread, array()) . '" title="' . 'Who has rated this thread?' . '" class="OverlayTrigger"><span class="Hint">' . $hint . '</span></a>
				';
}
else
{
$__compilerVar25 .= '
				<span class="Hint">' . $hint . '</span>
				';
}
$__compilerVar25 .= '
			</dd>
		</dl>	
	</div>

';
}
$__compilerVar23 .= $__compilerVar25;
unset($__compilerVar24, $__compilerVar25);
$__compilerVar23 .= '
			';
if (!$resource['isFilelessNoExternal'])
{
$__compilerVar23 .= '<span class="muted">' . 'Version' . ': ' . htmlspecialchars($review['version_string'], ENT_QUOTES, 'UTF-8') . '</span>';
}
$__compilerVar23 .= '
			';
if ($review['rating_state'] == ('deleted'))
{
$__compilerVar23 .= '
				<div class="reviewDeletedNotice">
					<span class="icon"></span>
					' . 'This review has been deleted.' . ' <a href="javascript:" class="JsOnly ToggleTrigger" data-target=".ugc">' . 'View' . '</a>
				</div>
			';
}
$__compilerVar23 .= '
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
$__compilerVar23 .= '
					<a href="' . XenForo_Template_Helper_Core::link('resources/reviews/delete', $resource, array(
'review' => $review
)) . '" class="item OverlayTrigger control delete"><span></span>' . 'Delete' . '</a>
				';
}
$__compilerVar23 .= '
				';
if ($review['canUndelete'])
{
$__compilerVar23 .= '
					<a href="' . XenForo_Template_Helper_Core::link('resources/reviews/undelete', $resource, array(
'review' => $review,
't' => $visitor['csrf_token_page']
)) . '" class="item OverlayTrigger control undelete"><span></span>' . 'Undelete' . '</a>
				';
}
$__compilerVar23 .= '
				';
if ($canViewIps AND $review['ip_id'])
{
$__compilerVar23 .= '
					<a href="' . XenForo_Template_Helper_Core::link('resources/reviews/ip', $resource, array(
'review' => $review
)) . '" class="item control ip OverlayTrigger"><span></span>' . 'IP' . '</a>
				';
}
$__compilerVar23 .= '

				';
if ($review['canWarn'])
{
$__compilerVar23 .= '
					<a href="' . XenForo_Template_Helper_Core::link('members/warn', $review, array(
'content_type' => 'resource_rating',
'content_id' => $review['resource_rating_id']
)) . '" class="item control warn"><span></span>' . 'Warn' . '</a>
				';
}
else if ($review['warning_id'] AND $canViewWarnings)
{
$__compilerVar23 .= '
					<a href="' . XenForo_Template_Helper_Core::link('warnings', $review, array()) . '" class="OverlayTrigger item control viewWarning"><span></span>' . 'View Warning' . '</a>
				';
}
$__compilerVar23 .= '

				';
if ($review['canReport'])
{
$__compilerVar23 .= '
					<a href="' . XenForo_Template_Helper_Core::link('resources/reviews/report', $resource, array(
'review' => $review
)) . '" class="OverlayTrigger item control report" data-cacheOverlay="false"><span></span>' . 'Report' . '</a>
				';
}
$__compilerVar23 .= '
			</div>

			';
if ($review['canReply'])
{
$__compilerVar23 .= '
				<div class="publicControls">
					<a href="' . XenForo_Template_Helper_Core::link('resources/reviews/reply', $resource, array(
'review' => $review
)) . '" class="OverlayTrigger item control reply"><span></span>' . 'Reply' . '</a>
				</div>
			';
}
$__compilerVar23 .= '
		</div>

		';
if ($review['author_response'])
{
$__compilerVar23 .= '
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
$__compilerVar23 .= '
							<div class="commentControls">
								<a href="' . XenForo_Template_Helper_Core::link('resources/reviews/delete', $resource, array(
'review' => $review,
'response' => '1'
)) . '" class="OverlayTrigger control delete"><span></span>' . 'Delete' . '</a>
							</div>
						';
}
$__compilerVar23 .= '
					</div>

				</li>
			</ol>
		';
}
$__compilerVar23 .= '

	</div>
</li>';
$__output .= $__compilerVar23;
unset($__compilerVar23);
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
