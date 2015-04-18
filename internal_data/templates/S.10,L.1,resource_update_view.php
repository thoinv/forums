<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__extraData['title'] = '';
$__extraData['title'] .= XenForo_Template_Helper_Core::callHelper('resourcePrefix', array(
'0' => $resource,
'1' => 'escaped'
)) . htmlspecialchars($resource['title'], ENT_QUOTES, 'UTF-8') . ' - ' . htmlspecialchars($update['title'], ENT_QUOTES, 'UTF-8');
$__output .= '

<div class="updateContainer">
	<ol>
		';
$__compilerVar1 = '';
$__compilerVar1 .= (($isLimited) ? ('1') : (''));
$__compilerVar2 = '';
$this->addRequiredExternal('css', 'message_simple');
$__compilerVar2 .= '
';
$this->addRequiredExternal('css', 'bb_code');
$__compilerVar2 .= '
';
$this->addRequiredExternal('css', 'resource_view_header');
$__compilerVar2 .= '
';
$this->addRequiredExternal('css', 'resource_update');
$__compilerVar2 .= '

<li class="primaryContent messageSimple resourceUpdate" id="update-' . htmlspecialchars($update['resource_update_id'], ENT_QUOTES, 'UTF-8') . '" data-author="' . htmlspecialchars($resource['username'], ENT_QUOTES, 'UTF-8') . '">

	';
if ($update['title'] AND !$update['isDescriptionUpdate'] AND !$hideUpdateTitle)
{
$__compilerVar2 .= '
		<h2 class="textHeading">
			<a href="' . XenForo_Template_Helper_Core::link('resources/update', $resource, array(
'update' => $update['resource_update_id']
)) . '">' . htmlspecialchars($update['title'], ENT_QUOTES, 'UTF-8') . '</a>
		</h2>
	';
}
$__compilerVar2 .= '

	' . XenForo_Template_Helper_Core::callHelper('avatarhtml', array($resource,(1),array(
'user' => '$resource',
'img' => '1'
),'')) . '

	';
$__compilerVar3 = '';
$__compilerVar3 .= '
			';
if ($update['warning_message'])
{
$__compilerVar3 .= '
				<li class="warningNotice"><span class="icon Tooltip" title="' . 'Warning' . '" data-tipclass="iconTip flipped"></span>' . htmlspecialchars($update['warning_message'], ENT_QUOTES, 'UTF-8') . '</li>
			';
}
$__compilerVar3 .= '
			';
if ($update['message_state'] == ('deleted'))
{
$__compilerVar3 .= '
				<li class="deletedNotice">
					<span class="icon"></span>
					' . 'This update has been deleted.' . '
					';
if ($update['delete_user_id'])
{
$__compilerVar3 .= '
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
$__compilerVar3 .= ', ' . 'Reason' . ': ' . htmlspecialchars($update['delete_reason'], ENT_QUOTES, 'UTF-8');
}
$__compilerVar3 .= '.
					';
}
$__compilerVar3 .= '
				</li>
			';
}
$__compilerVar3 .= '
			';
if ($update['message_state'] == ('moderated'))
{
$__compilerVar3 .= '
				<li class="moderatedNotice">
					<span class="icon"></span>
					' . 'This update is currently awaiting approval.' . '
				</li>
			';
}
$__compilerVar3 .= '
		';
if (trim($__compilerVar3) !== '')
{
$__compilerVar2 .= '
		';
$this->addRequiredExternal('css', 'message_notices');
$__compilerVar2 .= '
		<ul class="messageNotices">
		' . $__compilerVar3 . '
		</ul>
	';
}
unset($__compilerVar3);
$__compilerVar2 .= '

	' . $extraUpdateHtml . '

	<article><blockquote class="ugc baseHtml messageText">
		' . $messageBeforeHtml . '
		' . $update['messageHtml'] . '
		' . $messageAfterHtml . '
	</blockquote></article>

	';
if ($update['attachments'] AND !$update['isMessageTrimmed'])
{
$__compilerVar2 .= '
		<div class="imageCollection">
			<h3 class="textHeading">' . 'Images' . '</h3>
			<ol>
				';
foreach ($update['attachments'] AS $attachment)
{
$__compilerVar2 .= '
					';
if ($attachment['thumbnailUrl'])
{
$__compilerVar2 .= '
					<li><a href="' . XenForo_Template_Helper_Core::link('attachments', $attachment, array()) . '" target="_blank" class="' . (($canViewImages) ? ('LbTrigger') : ('')) . ' ' . ((!$attachment['thumbnailUrl']) ? ('noThumb') : ('')) . '"
						data-href="' . XenForo_Template_Helper_Core::link('misc/lightbox', false, array()) . '"><img
						src="' . htmlspecialchars($attachment['thumbnailUrl'], ENT_QUOTES, 'UTF-8') . '" alt="' . htmlspecialchars($attachment['filename'], ENT_QUOTES, 'UTF-8') . '"
						class="LbImage"
						data-src="' . XenForo_Template_Helper_Core::link('attachments', $attachment, array(
'embedded' => '1'
)) . '" /></a></li>
					';
}
$__compilerVar2 .= '
				';
}
$__compilerVar2 .= '
			</ol>
		</div>
	';
}
$__compilerVar2 .= '

	';
if ($__compilerVar1)
{
$__compilerVar2 .= '
		<div class="resourceAlerts secondaryContent" style="text-align: center">
			' . 'You do not have permission to view the full content of this resource.' . '
			';
if (!$visitor['user_id'])
{
$__compilerVar2 .= '
				<div style="margin-top: .5em">
					<label for="LoginControl"><a href="' . XenForo_Template_Helper_Core::link('login', false, array()) . '" class="inner">' . (($xenOptions['registrationSetup']['enabled']) ? ('Sign up now!') : ('Log in')) . '</a></label>
				</div>
			';
}
$__compilerVar2 .= '
		</div>
	';
}
$__compilerVar2 .= '

	<div class="messageMeta">
		<span class="privateControls">
			';
if (!$update['isDescriptionUpdate'])
{
$__compilerVar2 .= '
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
$__compilerVar2 .= '
			';
$__compilerVar4 = '';
$__compilerVar4 .= '
			';
if ($update['canEdit'])
{
$__compilerVar4 .= '
				';
if ($update['isDescriptionUpdate'])
{
$__compilerVar4 .= '
					<a href="' . XenForo_Template_Helper_Core::link('resources/edit', $resource, array()) . '"
						class="item control edit"><span></span>' . 'Edit' . '</a>
				';
}
else
{
$__compilerVar4 .= '
					';
$this->addRequiredExternal('js', 'js/xenforo/discussion.js');
$__compilerVar4 .= '
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
$__compilerVar4 .= '
			';
}
$__compilerVar4 .= '
			';
if ($update['canDelete'])
{
$__compilerVar4 .= '
				<a href="' . XenForo_Template_Helper_Core::link('resources/delete-update', $resource, array(
'resource_update_id' => $update['resource_update_id']
)) . '"
					class="item control delete OverlayTrigger">' . 'Delete' . '</a>
			';
}
$__compilerVar4 .= '
			';
if ($update['canWarn'])
{
$__compilerVar4 .= '
				<a href="' . XenForo_Template_Helper_Core::link('members/warn', $resource, array(
'content_type' => 'resource_update',
'content_id' => $update['resource_update_id']
)) . '" class="item control warn"><span></span>' . 'Warn' . '</a>
			';
}
else if ($update['warning_id'] AND $canViewWarnings)
{
$__compilerVar4 .= '
				<a href="' . XenForo_Template_Helper_Core::link('warnings', $update, array()) . '" class="OverlayTrigger item control viewWarning"><span></span>' . 'View Warning' . '</a>
			';
}
$__compilerVar4 .= '
			';
if ($update['canReport'])
{
$__compilerVar4 .= '
				<a href="' . XenForo_Template_Helper_Core::link('resources/report-update', $resource, array(
'resource_update_id' => $update['resource_update_id']
)) . '" class="OverlayTrigger item control report" data-cacheOverlay="false"><span></span>' . 'Report' . '</a>
			';
}
$__compilerVar4 .= '
			';
if ($resource['canCleanSpam'])
{
$__compilerVar4 .= '<a href="' . XenForo_Template_Helper_Core::link('spam-cleaner', $resource, array()) . '" class="item control deleteSpam OverlayTrigger"><span></span>' . 'Spam' . '</a>';
}
$__compilerVar4 .= '
			';
$__compilerVar2 .= $this->callTemplateHook('resource_update_private_controls', $__compilerVar4, array(
'update' => $update
));
unset($__compilerVar4);
$__compilerVar2 .= '
		</span>
		';
$__compilerVar5 = '';
$__compilerVar5 .= '
				';
$__compilerVar6 = '';
$__compilerVar6 .= '
					';
if ($update['isMessageTrimmed'] and !$__compilerVar1)
{
$__compilerVar6 .= '
						<a href="' . XenForo_Template_Helper_Core::link('resources/update', $resource, array(
'resource_update_id' => $update['resource_update_id']
)) . '"
							class="item control readMore Loader"
							data-target="#update-' . htmlspecialchars($update['resource_update_id'], ENT_QUOTES, 'UTF-8') . '"
							data-method="replaceAll"><span></span>... ' . 'Read More' . '</a>
					';
}
$__compilerVar6 .= '
					';
if ($update['canLike'])
{
$__compilerVar6 .= '
						<a href="' . XenForo_Template_Helper_Core::link('resources/like-update', $resource, array(
'resource_update_id' => $update['resource_update_id']
)) . '"
							class="item control LikeLink ' . (($update['like_date']) ? ('unlike') : ('like')) . '"
							data-container="#likes-update-' . htmlspecialchars($update['resource_update_id'], ENT_QUOTES, 'UTF-8') . '"><span></span><span class="LikeLabel">' . (($update['like_date']) ? ('Unlike') : ('Like')) . '</span></a>
					';
}
$__compilerVar6 .= '
				';
$__compilerVar5 .= $this->callTemplateHook('resource_update_public_controls', $__compilerVar6, array(
'update' => $update
));
unset($__compilerVar6);
$__compilerVar5 .= '
				';
if (trim($__compilerVar5) !== '')
{
$__compilerVar2 .= '
			<span class="publicControls">
				' . $__compilerVar5 . '
			</span>
		';
}
unset($__compilerVar5);
$__compilerVar2 .= '
	</div>

	<div id="likes-update-' . htmlspecialchars($update['resource_update_id'], ENT_QUOTES, 'UTF-8') . '">';
if ($update['likes'])
{
$__compilerVar7 = '';
$__compilerVar7 .= XenForo_Template_Helper_Core::link('resources/update-likes', $resource, array(
'resource_update_id' => $update['resource_update_id']
));
$__compilerVar8 = '';
if ($update['likes'])
{
$__compilerVar8 .= '
	';
$this->addRequiredExternal('css', 'likes_summary');
$__compilerVar8 .= '
	<div class="likesSummary secondaryContent">
		<span class="LikeText">
			' . XenForo_Template_Helper_Core::callHelper('likeshtml', array($update['likes'],$__compilerVar7,$update['like_date'],$update['likeUsers'])) . '
		</span>
	</div>
';
}
$__compilerVar2 .= $__compilerVar8;
unset($__compilerVar7, $__compilerVar8);
}
$__compilerVar2 .= '</div>
</li>';
$__output .= $__compilerVar2;
unset($__compilerVar1, $__compilerVar2);
$__output .= '
	</ol>

	<a href="' . XenForo_Template_Helper_Core::link('resources/updates', $resource, array()) . '">' . 'Return to update list' . '...</a>
</div>';
