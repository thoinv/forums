<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__extraData['title'] = '';
$__extraData['title'] .= XenForo_Template_Helper_Core::callHelper('resourcePrefix', array(
'0' => $resource,
'1' => 'escaped'
)) . htmlspecialchars($resource['title'], ENT_QUOTES, 'UTF-8') . ' - ' . 'Updates';
$__output .= '

';
$__extraData['head']['canonical'] = '';
$__extraData['head']['canonical'] .= '
	<link rel="canonical" href="' . XenForo_Template_Helper_Core::link('canonical:resources/updates', $resource, array(
'page' => (($page > 1) ? ($page) : (''))
)) . '" />';
$__output .= '

<div class="updateContainer">
	<ol>
		';
foreach ($updates AS $updateId => $update)
{
$__output .= '
			';
$__compilerVar1 = '';
$this->addRequiredExternal('css', 'message_simple');
$__compilerVar1 .= '
';
$this->addRequiredExternal('css', 'bb_code');
$__compilerVar1 .= '
';
$this->addRequiredExternal('css', 'resource_view_header');
$__compilerVar1 .= '
';
$this->addRequiredExternal('css', 'resource_update');
$__compilerVar1 .= '

<li class="primaryContent messageSimple resourceUpdate" id="update-' . htmlspecialchars($update['resource_update_id'], ENT_QUOTES, 'UTF-8') . '" data-author="' . htmlspecialchars($resource['username'], ENT_QUOTES, 'UTF-8') . '">

	';
if ($update['title'] AND !$update['isDescriptionUpdate'] AND !$hideUpdateTitle)
{
$__compilerVar1 .= '
		<h2 class="textHeading">
			<a href="' . XenForo_Template_Helper_Core::link('resources/update', $resource, array(
'update' => $update['resource_update_id']
)) . '">' . htmlspecialchars($update['title'], ENT_QUOTES, 'UTF-8') . '</a>
		</h2>
	';
}
$__compilerVar1 .= '

	' . XenForo_Template_Helper_Core::callHelper('avatarhtml', array($resource,(1),array(
'user' => '$resource',
'img' => '1'
),'')) . '

	';
$__compilerVar2 = '';
$__compilerVar2 .= '
			';
if ($update['warning_message'])
{
$__compilerVar2 .= '
				<li class="warningNotice"><span class="icon Tooltip" title="' . 'Warning' . '" data-tipclass="iconTip flipped"></span>' . htmlspecialchars($update['warning_message'], ENT_QUOTES, 'UTF-8') . '</li>
			';
}
$__compilerVar2 .= '
			';
if ($update['message_state'] == ('deleted'))
{
$__compilerVar2 .= '
				<li class="deletedNotice">
					<span class="icon"></span>
					' . 'This update has been deleted.' . '
					';
if ($update['delete_user_id'])
{
$__compilerVar2 .= '
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
$__compilerVar2 .= ', ' . 'Reason' . ': ' . htmlspecialchars($update['delete_reason'], ENT_QUOTES, 'UTF-8');
}
$__compilerVar2 .= '.
					';
}
$__compilerVar2 .= '
				</li>
			';
}
$__compilerVar2 .= '
			';
if ($update['message_state'] == ('moderated'))
{
$__compilerVar2 .= '
				<li class="moderatedNotice">
					<span class="icon"></span>
					' . 'This update is currently awaiting approval.' . '
				</li>
			';
}
$__compilerVar2 .= '
		';
if (trim($__compilerVar2) !== '')
{
$__compilerVar1 .= '
		';
$this->addRequiredExternal('css', 'message_notices');
$__compilerVar1 .= '
		<ul class="messageNotices">
		' . $__compilerVar2 . '
		</ul>
	';
}
unset($__compilerVar2);
$__compilerVar1 .= '

	' . $extraUpdateHtml . '

	<article><blockquote class="ugc baseHtml messageText">
		' . $messageBeforeHtml . '
		' . $update['messageHtml'] . '
		' . $messageAfterHtml . '
	</blockquote></article>

	';
if ($update['attachments'] AND !$update['isMessageTrimmed'])
{
$__compilerVar1 .= '
		<div class="imageCollection">
			<h3 class="textHeading">' . 'Images' . '</h3>
			<ol>
				';
foreach ($update['attachments'] AS $attachment)
{
$__compilerVar1 .= '
					';
if ($attachment['thumbnailUrl'])
{
$__compilerVar1 .= '
					<li><a href="' . XenForo_Template_Helper_Core::link('attachments', $attachment, array()) . '" target="_blank" class="' . (($canViewImages) ? ('LbTrigger') : ('')) . ' ' . ((!$attachment['thumbnailUrl']) ? ('noThumb') : ('')) . '"
						data-href="' . XenForo_Template_Helper_Core::link('misc/lightbox', false, array()) . '"><img
						src="' . htmlspecialchars($attachment['thumbnailUrl'], ENT_QUOTES, 'UTF-8') . '" alt="' . htmlspecialchars($attachment['filename'], ENT_QUOTES, 'UTF-8') . '"
						class="LbImage"
						data-src="' . XenForo_Template_Helper_Core::link('attachments', $attachment, array(
'embedded' => '1'
)) . '" /></a></li>
					';
}
$__compilerVar1 .= '
				';
}
$__compilerVar1 .= '
			</ol>
		</div>
	';
}
$__compilerVar1 .= '

	';
if ($showLimitedNotice)
{
$__compilerVar1 .= '
		<div class="resourceAlerts secondaryContent" style="text-align: center">
			' . 'You do not have permission to view the full content of this resource.' . '
			';
if (!$visitor['user_id'])
{
$__compilerVar1 .= '
				<div style="margin-top: .5em">
					<label for="LoginControl"><a href="' . XenForo_Template_Helper_Core::link('login', false, array()) . '" class="inner">' . (($xenOptions['registrationSetup']['enabled']) ? ('Sign up now!') : ('Log in')) . '</a></label>
				</div>
			';
}
$__compilerVar1 .= '
		</div>
	';
}
$__compilerVar1 .= '

	<div class="messageMeta">
		<span class="privateControls">
			';
if (!$update['isDescriptionUpdate'])
{
$__compilerVar1 .= '
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
$__compilerVar1 .= '
			';
$__compilerVar3 = '';
$__compilerVar3 .= '
			';
if ($update['canEdit'])
{
$__compilerVar3 .= '
				';
if ($update['isDescriptionUpdate'])
{
$__compilerVar3 .= '
					<a href="' . XenForo_Template_Helper_Core::link('resources/edit', $resource, array()) . '"
						class="item control edit"><span></span>' . 'Edit' . '</a>
				';
}
else
{
$__compilerVar3 .= '
					';
$this->addRequiredExternal('js', 'js/xenforo/discussion.js');
$__compilerVar3 .= '
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
$__compilerVar3 .= '
			';
}
$__compilerVar3 .= '
			';
if ($update['canDelete'])
{
$__compilerVar3 .= '
				<a href="' . XenForo_Template_Helper_Core::link('resources/delete-update', $resource, array(
'resource_update_id' => $update['resource_update_id']
)) . '"
					class="item control delete OverlayTrigger">' . 'Delete' . '</a>
			';
}
$__compilerVar3 .= '
			';
if ($update['canWarn'])
{
$__compilerVar3 .= '
				<a href="' . XenForo_Template_Helper_Core::link('members/warn', $resource, array(
'content_type' => 'resource_update',
'content_id' => $update['resource_update_id']
)) . '" class="item control warn"><span></span>' . 'Warn' . '</a>
			';
}
else if ($update['warning_id'] AND $canViewWarnings)
{
$__compilerVar3 .= '
				<a href="' . XenForo_Template_Helper_Core::link('warnings', $update, array()) . '" class="OverlayTrigger item control viewWarning"><span></span>' . 'View Warning' . '</a>
			';
}
$__compilerVar3 .= '
			';
if ($update['canReport'])
{
$__compilerVar3 .= '
				<a href="' . XenForo_Template_Helper_Core::link('resources/report-update', $resource, array(
'resource_update_id' => $update['resource_update_id']
)) . '" class="OverlayTrigger item control report" data-cacheOverlay="false"><span></span>' . 'Report' . '</a>
			';
}
$__compilerVar3 .= '
			';
if ($resource['canCleanSpam'])
{
$__compilerVar3 .= '<a href="' . XenForo_Template_Helper_Core::link('spam-cleaner', $resource, array()) . '" class="item control deleteSpam OverlayTrigger"><span></span>' . 'Spam' . '</a>';
}
$__compilerVar3 .= '
			';
$__compilerVar1 .= $this->callTemplateHook('resource_update_private_controls', $__compilerVar3, array(
'update' => $update
));
unset($__compilerVar3);
$__compilerVar1 .= '
		</span>
		';
$__compilerVar4 = '';
$__compilerVar4 .= '
				';
$__compilerVar5 = '';
$__compilerVar5 .= '
					';
if ($update['isMessageTrimmed'] and !$showLimitedNotice)
{
$__compilerVar5 .= '
						<a href="' . XenForo_Template_Helper_Core::link('resources/update', $resource, array(
'resource_update_id' => $update['resource_update_id']
)) . '"
							class="item control readMore Loader"
							data-target="#update-' . htmlspecialchars($update['resource_update_id'], ENT_QUOTES, 'UTF-8') . '"
							data-method="replaceAll"><span></span>... ' . 'Read More' . '</a>
					';
}
$__compilerVar5 .= '
					';
if ($update['canLike'])
{
$__compilerVar5 .= '
						<a href="' . XenForo_Template_Helper_Core::link('resources/like-update', $resource, array(
'resource_update_id' => $update['resource_update_id']
)) . '"
							class="item control LikeLink ' . (($update['like_date']) ? ('unlike') : ('like')) . '"
							data-container="#likes-update-' . htmlspecialchars($update['resource_update_id'], ENT_QUOTES, 'UTF-8') . '"><span></span><span class="LikeLabel">' . (($update['like_date']) ? ('Unlike') : ('Like')) . '</span></a>
					';
}
$__compilerVar5 .= '
				';
$__compilerVar4 .= $this->callTemplateHook('resource_update_public_controls', $__compilerVar5, array(
'update' => $update
));
unset($__compilerVar5);
$__compilerVar4 .= '
				';
if (trim($__compilerVar4) !== '')
{
$__compilerVar1 .= '
			<span class="publicControls">
				' . $__compilerVar4 . '
			</span>
		';
}
unset($__compilerVar4);
$__compilerVar1 .= '
	</div>

	<div id="likes-update-' . htmlspecialchars($update['resource_update_id'], ENT_QUOTES, 'UTF-8') . '">';
if ($update['likes'])
{
$__compilerVar6 = '';
$__compilerVar6 .= XenForo_Template_Helper_Core::link('resources/update-likes', $resource, array(
'resource_update_id' => $update['resource_update_id']
));
$__compilerVar7 = '';
if ($update['likes'])
{
$__compilerVar7 .= '
	';
$this->addRequiredExternal('css', 'likes_summary');
$__compilerVar7 .= '
	<div class="likesSummary secondaryContent">
		<span class="LikeText">
			' . XenForo_Template_Helper_Core::callHelper('likeshtml', array($update['likes'],$__compilerVar6,$update['like_date'],$update['likeUsers'])) . '
		</span>
	</div>
';
}
$__compilerVar1 .= $__compilerVar7;
unset($__compilerVar6, $__compilerVar7);
}
$__compilerVar1 .= '</div>
</li>';
$__output .= $__compilerVar1;
unset($__compilerVar1);
$__output .= '
		';
}
$__output .= '
	</ol>

	' . XenForo_Template_Helper_Core::callHelper('pagenavhtml', array('public', htmlspecialchars($perPage, ENT_QUOTES, 'UTF-8'), htmlspecialchars($totalUpdates, ENT_QUOTES, 'UTF-8'), htmlspecialchars($page, ENT_QUOTES, 'UTF-8'), 'resources/updates', $resource, array(), false, array())) . '
</div>';
