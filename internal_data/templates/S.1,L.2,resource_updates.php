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
$__compilerVar8 = '';
$this->addRequiredExternal('css', 'message_simple');
$__compilerVar8 .= '
';
$this->addRequiredExternal('css', 'bb_code');
$__compilerVar8 .= '
';
$this->addRequiredExternal('css', 'resource_view_header');
$__compilerVar8 .= '
';
$this->addRequiredExternal('css', 'resource_update');
$__compilerVar8 .= '

<li class="primaryContent messageSimple resourceUpdate" id="update-' . htmlspecialchars($update['resource_update_id'], ENT_QUOTES, 'UTF-8') . '" data-author="' . htmlspecialchars($resource['username'], ENT_QUOTES, 'UTF-8') . '">

	';
if ($update['title'] AND !$update['isDescriptionUpdate'] AND !$hideUpdateTitle)
{
$__compilerVar8 .= '
		<h2 class="textHeading">
			<a href="' . XenForo_Template_Helper_Core::link('resources/update', $resource, array(
'update' => $update['resource_update_id']
)) . '">' . htmlspecialchars($update['title'], ENT_QUOTES, 'UTF-8') . '</a>
		</h2>
	';
}
$__compilerVar8 .= '

	' . XenForo_Template_Helper_Core::callHelper('avatarhtml', array($resource,(1),array(
'user' => '$resource',
'img' => '1'
),'')) . '

	';
$__compilerVar9 = '';
$__compilerVar9 .= '
			';
if ($update['warning_message'])
{
$__compilerVar9 .= '
				<li class="warningNotice"><span class="icon Tooltip" title="' . 'Warning' . '" data-tipclass="iconTip flipped"></span>' . htmlspecialchars($update['warning_message'], ENT_QUOTES, 'UTF-8') . '</li>
			';
}
$__compilerVar9 .= '
			';
if ($update['message_state'] == ('deleted'))
{
$__compilerVar9 .= '
				<li class="deletedNotice">
					<span class="icon"></span>
					' . 'This update has been deleted.' . '
					';
if ($update['delete_user_id'])
{
$__compilerVar9 .= '
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
$__compilerVar9 .= ', ' . 'Lý do' . ': ' . htmlspecialchars($update['delete_reason'], ENT_QUOTES, 'UTF-8');
}
$__compilerVar9 .= '.
					';
}
$__compilerVar9 .= '
				</li>
			';
}
$__compilerVar9 .= '
			';
if ($update['message_state'] == ('moderated'))
{
$__compilerVar9 .= '
				<li class="moderatedNotice">
					<span class="icon"></span>
					' . 'This update is currently awaiting approval.' . '
				</li>
			';
}
$__compilerVar9 .= '
		';
if (trim($__compilerVar9) !== '')
{
$__compilerVar8 .= '
		';
$this->addRequiredExternal('css', 'message_notices');
$__compilerVar8 .= '
		<ul class="messageNotices">
		' . $__compilerVar9 . '
		</ul>
	';
}
unset($__compilerVar9);
$__compilerVar8 .= '

	' . $extraUpdateHtml . '

	<article><blockquote class="ugc baseHtml messageText">
		' . $messageBeforeHtml . '
		' . $update['messageHtml'] . '
		' . $messageAfterHtml . '
	</blockquote></article>

	';
if ($update['attachments'] AND !$update['isMessageTrimmed'])
{
$__compilerVar8 .= '
		<div class="imageCollection">
			<h3 class="textHeading">' . 'Images' . '</h3>
			<ol>
				';
foreach ($update['attachments'] AS $attachment)
{
$__compilerVar8 .= '
					';
if ($attachment['thumbnailUrl'])
{
$__compilerVar8 .= '
					<li><a href="' . XenForo_Template_Helper_Core::link('attachments', $attachment, array()) . '" target="_blank" class="' . (($canViewImages) ? ('LbTrigger') : ('')) . ' ' . ((!$attachment['thumbnailUrl']) ? ('noThumb') : ('')) . '"
						data-href="' . XenForo_Template_Helper_Core::link('misc/lightbox', false, array()) . '"><img
						src="' . htmlspecialchars($attachment['thumbnailUrl'], ENT_QUOTES, 'UTF-8') . '" alt="' . htmlspecialchars($attachment['filename'], ENT_QUOTES, 'UTF-8') . '"
						class="LbImage"
						data-src="' . XenForo_Template_Helper_Core::link('attachments', $attachment, array(
'embedded' => '1'
)) . '" /></a></li>
					';
}
$__compilerVar8 .= '
				';
}
$__compilerVar8 .= '
			</ol>
		</div>
	';
}
$__compilerVar8 .= '

	';
if ($showLimitedNotice)
{
$__compilerVar8 .= '
		<div class="resourceAlerts secondaryContent" style="text-align: center">
			' . 'You do not have permission to view the full content of this resource.' . '
			';
if (!$visitor['user_id'])
{
$__compilerVar8 .= '
				<div style="margin-top: .5em">
					<label for="LoginControl"><a href="' . XenForo_Template_Helper_Core::link('login', false, array()) . '" class="inner">' . (($xenOptions['registrationSetup']['enabled']) ? ('Đăng ký!') : ('Đăng nhập')) . '</a></label>
				</div>
			';
}
$__compilerVar8 .= '
		</div>
	';
}
$__compilerVar8 .= '

	<div class="messageMeta">
		<span class="privateControls">
			';
if (!$update['isDescriptionUpdate'])
{
$__compilerVar8 .= '
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
$__compilerVar8 .= '
			';
$__compilerVar10 = '';
$__compilerVar10 .= '
			';
if ($update['canEdit'])
{
$__compilerVar10 .= '
				';
if ($update['isDescriptionUpdate'])
{
$__compilerVar10 .= '
					<a href="' . XenForo_Template_Helper_Core::link('resources/edit', $resource, array()) . '"
						class="item control edit"><span></span>' . 'Sửa' . '</a>
				';
}
else
{
$__compilerVar10 .= '
					';
$this->addRequiredExternal('js', 'js/xenforo/discussion.js');
$__compilerVar10 .= '
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
$__compilerVar10 .= '
			';
}
$__compilerVar10 .= '
			';
if ($update['canDelete'])
{
$__compilerVar10 .= '
				<a href="' . XenForo_Template_Helper_Core::link('resources/delete-update', $resource, array(
'resource_update_id' => $update['resource_update_id']
)) . '"
					class="item control delete OverlayTrigger">' . 'Xóa' . '</a>
			';
}
$__compilerVar10 .= '
			';
if ($update['canWarn'])
{
$__compilerVar10 .= '
				<a href="' . XenForo_Template_Helper_Core::link('members/warn', $resource, array(
'content_type' => 'resource_update',
'content_id' => $update['resource_update_id']
)) . '" class="item control warn"><span></span>' . 'Cảnh cáo' . '</a>
			';
}
else if ($update['warning_id'] AND $canViewWarnings)
{
$__compilerVar10 .= '
				<a href="' . XenForo_Template_Helper_Core::link('warnings', $update, array()) . '" class="OverlayTrigger item control viewWarning"><span></span>' . 'View Warning' . '</a>
			';
}
$__compilerVar10 .= '
			';
if ($update['canReport'])
{
$__compilerVar10 .= '
				<a href="' . XenForo_Template_Helper_Core::link('resources/report-update', $resource, array(
'resource_update_id' => $update['resource_update_id']
)) . '" class="OverlayTrigger item control report" data-cacheOverlay="false"><span></span>' . 'Báo cáo' . '</a>
			';
}
$__compilerVar10 .= '
			';
if ($resource['canCleanSpam'])
{
$__compilerVar10 .= '<a href="' . XenForo_Template_Helper_Core::link('spam-cleaner', $resource, array()) . '" class="item control deleteSpam OverlayTrigger"><span></span>' . 'Spam' . '</a>';
}
$__compilerVar10 .= '
			';
$__compilerVar8 .= $this->callTemplateHook('resource_update_private_controls', $__compilerVar10, array(
'update' => $update
));
unset($__compilerVar10);
$__compilerVar8 .= '
		</span>
		';
$__compilerVar11 = '';
$__compilerVar11 .= '
				';
$__compilerVar12 = '';
$__compilerVar12 .= '
					';
if ($update['isMessageTrimmed'] and !$showLimitedNotice)
{
$__compilerVar12 .= '
						<a href="' . XenForo_Template_Helper_Core::link('resources/update', $resource, array(
'resource_update_id' => $update['resource_update_id']
)) . '"
							class="item control readMore Loader"
							data-target="#update-' . htmlspecialchars($update['resource_update_id'], ENT_QUOTES, 'UTF-8') . '"
							data-method="replaceAll"><span></span>... ' . 'Read More' . '</a>
					';
}
$__compilerVar12 .= '
					';
if ($update['canLike'])
{
$__compilerVar12 .= '
						<a href="' . XenForo_Template_Helper_Core::link('resources/like-update', $resource, array(
'resource_update_id' => $update['resource_update_id']
)) . '"
							class="item control LikeLink ' . (($update['like_date']) ? ('unlike') : ('like')) . '"
							data-container="#likes-update-' . htmlspecialchars($update['resource_update_id'], ENT_QUOTES, 'UTF-8') . '"><span></span><span class="LikeLabel">' . (($update['like_date']) ? ('Không thích nữa') : ('Thích')) . '</span></a>
					';
}
$__compilerVar12 .= '
				';
$__compilerVar11 .= $this->callTemplateHook('resource_update_public_controls', $__compilerVar12, array(
'update' => $update
));
unset($__compilerVar12);
$__compilerVar11 .= '
				';
if (trim($__compilerVar11) !== '')
{
$__compilerVar8 .= '
			<span class="publicControls">
				' . $__compilerVar11 . '
			</span>
		';
}
unset($__compilerVar11);
$__compilerVar8 .= '
	</div>

	<div id="likes-update-' . htmlspecialchars($update['resource_update_id'], ENT_QUOTES, 'UTF-8') . '">';
if ($update['likes'])
{
$__compilerVar13 = '';
$__compilerVar13 .= XenForo_Template_Helper_Core::link('resources/update-likes', $resource, array(
'resource_update_id' => $update['resource_update_id']
));
$__compilerVar14 = '';
if ($update['likes'])
{
$__compilerVar14 .= '
	';
$this->addRequiredExternal('css', 'likes_summary');
$__compilerVar14 .= '
	<div class="likesSummary secondaryContent">
		<span class="LikeText">
			' . XenForo_Template_Helper_Core::callHelper('likeshtml', array($update['likes'],$__compilerVar13,$update['like_date'],$update['likeUsers'])) . '
		</span>
	</div>
';
}
$__compilerVar8 .= $__compilerVar14;
unset($__compilerVar13, $__compilerVar14);
}
$__compilerVar8 .= '</div>
</li>';
$__output .= $__compilerVar8;
unset($__compilerVar8);
$__output .= '
		';
}
$__output .= '
	</ol>

	' . XenForo_Template_Helper_Core::callHelper('pagenavhtml', array('public', htmlspecialchars($perPage, ENT_QUOTES, 'UTF-8'), htmlspecialchars($totalUpdates, ENT_QUOTES, 'UTF-8'), htmlspecialchars($page, ENT_QUOTES, 'UTF-8'), 'resources/updates', $resource, array(), false, array())) . '
</div>';
