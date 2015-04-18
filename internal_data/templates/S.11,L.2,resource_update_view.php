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
$__compilerVar9 = '';
$__compilerVar9 .= (($isLimited) ? ('1') : (''));
$__compilerVar10 = '';
$this->addRequiredExternal('css', 'message_simple');
$__compilerVar10 .= '
';
$this->addRequiredExternal('css', 'bb_code');
$__compilerVar10 .= '
';
$this->addRequiredExternal('css', 'resource_view_header');
$__compilerVar10 .= '
';
$this->addRequiredExternal('css', 'resource_update');
$__compilerVar10 .= '

<li class="primaryContent messageSimple resourceUpdate" id="update-' . htmlspecialchars($update['resource_update_id'], ENT_QUOTES, 'UTF-8') . '" data-author="' . htmlspecialchars($resource['username'], ENT_QUOTES, 'UTF-8') . '">

	';
if ($update['title'] AND !$update['isDescriptionUpdate'] AND !$hideUpdateTitle)
{
$__compilerVar10 .= '
		<h2 class="textHeading">
			<a href="' . XenForo_Template_Helper_Core::link('resources/update', $resource, array(
'update' => $update['resource_update_id']
)) . '">' . htmlspecialchars($update['title'], ENT_QUOTES, 'UTF-8') . '</a>
		</h2>
	';
}
$__compilerVar10 .= '

	' . XenForo_Template_Helper_Core::callHelper('avatarhtml', array($resource,(1),array(
'user' => '$resource',
'img' => '1'
),'')) . '

	';
$__compilerVar11 = '';
$__compilerVar11 .= '
			';
if ($update['warning_message'])
{
$__compilerVar11 .= '
				<li class="warningNotice"><span class="icon Tooltip" title="' . 'Warning' . '" data-tipclass="iconTip flipped"></span>' . htmlspecialchars($update['warning_message'], ENT_QUOTES, 'UTF-8') . '</li>
			';
}
$__compilerVar11 .= '
			';
if ($update['message_state'] == ('deleted'))
{
$__compilerVar11 .= '
				<li class="deletedNotice">
					<span class="icon"></span>
					' . 'This update has been deleted.' . '
					';
if ($update['delete_user_id'])
{
$__compilerVar11 .= '
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
$__compilerVar11 .= ', ' . 'Lý do' . ': ' . htmlspecialchars($update['delete_reason'], ENT_QUOTES, 'UTF-8');
}
$__compilerVar11 .= '.
					';
}
$__compilerVar11 .= '
				</li>
			';
}
$__compilerVar11 .= '
			';
if ($update['message_state'] == ('moderated'))
{
$__compilerVar11 .= '
				<li class="moderatedNotice">
					<span class="icon"></span>
					' . 'This update is currently awaiting approval.' . '
				</li>
			';
}
$__compilerVar11 .= '
		';
if (trim($__compilerVar11) !== '')
{
$__compilerVar10 .= '
		';
$this->addRequiredExternal('css', 'message_notices');
$__compilerVar10 .= '
		<ul class="messageNotices">
		' . $__compilerVar11 . '
		</ul>
	';
}
unset($__compilerVar11);
$__compilerVar10 .= '

	' . $extraUpdateHtml . '

	<article><blockquote class="ugc baseHtml messageText">
		' . $messageBeforeHtml . '
		' . $update['messageHtml'] . '
		' . $messageAfterHtml . '
	</blockquote></article>

	';
if ($update['attachments'] AND !$update['isMessageTrimmed'])
{
$__compilerVar10 .= '
		<div class="imageCollection">
			<h3 class="textHeading">' . 'Images' . '</h3>
			<ol>
				';
foreach ($update['attachments'] AS $attachment)
{
$__compilerVar10 .= '
					';
if ($attachment['thumbnailUrl'])
{
$__compilerVar10 .= '
					<li><a href="' . XenForo_Template_Helper_Core::link('attachments', $attachment, array()) . '" target="_blank" class="' . (($canViewImages) ? ('LbTrigger') : ('')) . ' ' . ((!$attachment['thumbnailUrl']) ? ('noThumb') : ('')) . '"
						data-href="' . XenForo_Template_Helper_Core::link('misc/lightbox', false, array()) . '"><img
						src="' . htmlspecialchars($attachment['thumbnailUrl'], ENT_QUOTES, 'UTF-8') . '" alt="' . htmlspecialchars($attachment['filename'], ENT_QUOTES, 'UTF-8') . '"
						class="LbImage"
						data-src="' . XenForo_Template_Helper_Core::link('attachments', $attachment, array(
'embedded' => '1'
)) . '" /></a></li>
					';
}
$__compilerVar10 .= '
				';
}
$__compilerVar10 .= '
			</ol>
		</div>
	';
}
$__compilerVar10 .= '

	';
if ($__compilerVar9)
{
$__compilerVar10 .= '
		<div class="resourceAlerts secondaryContent" style="text-align: center">
			' . 'You do not have permission to view the full content of this resource.' . '
			';
if (!$visitor['user_id'])
{
$__compilerVar10 .= '
				<div style="margin-top: .5em">
					<label for="LoginControl"><a href="' . XenForo_Template_Helper_Core::link('login', false, array()) . '" class="inner">' . (($xenOptions['registrationSetup']['enabled']) ? ('Đăng ký!') : ('Đăng nhập')) . '</a></label>
				</div>
			';
}
$__compilerVar10 .= '
		</div>
	';
}
$__compilerVar10 .= '

	<div class="messageMeta">
		<span class="privateControls">
			';
if (!$update['isDescriptionUpdate'])
{
$__compilerVar10 .= '
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
$__compilerVar10 .= '
			';
$__compilerVar12 = '';
$__compilerVar12 .= '
			';
if ($update['canEdit'])
{
$__compilerVar12 .= '
				';
if ($update['isDescriptionUpdate'])
{
$__compilerVar12 .= '
					<a href="' . XenForo_Template_Helper_Core::link('resources/edit', $resource, array()) . '"
						class="item control edit"><span></span>' . 'Sửa' . '</a>
				';
}
else
{
$__compilerVar12 .= '
					';
$this->addRequiredExternal('js', 'js/xenforo/discussion.js');
$__compilerVar12 .= '
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
$__compilerVar12 .= '
			';
}
$__compilerVar12 .= '
			';
if ($update['canDelete'])
{
$__compilerVar12 .= '
				<a href="' . XenForo_Template_Helper_Core::link('resources/delete-update', $resource, array(
'resource_update_id' => $update['resource_update_id']
)) . '"
					class="item control delete OverlayTrigger">' . 'Xóa' . '</a>
			';
}
$__compilerVar12 .= '
			';
if ($update['canWarn'])
{
$__compilerVar12 .= '
				<a href="' . XenForo_Template_Helper_Core::link('members/warn', $resource, array(
'content_type' => 'resource_update',
'content_id' => $update['resource_update_id']
)) . '" class="item control warn"><span></span>' . 'Cảnh cáo' . '</a>
			';
}
else if ($update['warning_id'] AND $canViewWarnings)
{
$__compilerVar12 .= '
				<a href="' . XenForo_Template_Helper_Core::link('warnings', $update, array()) . '" class="OverlayTrigger item control viewWarning"><span></span>' . 'View Warning' . '</a>
			';
}
$__compilerVar12 .= '
			';
if ($update['canReport'])
{
$__compilerVar12 .= '
				<a href="' . XenForo_Template_Helper_Core::link('resources/report-update', $resource, array(
'resource_update_id' => $update['resource_update_id']
)) . '" class="OverlayTrigger item control report" data-cacheOverlay="false"><span></span>' . 'Báo cáo' . '</a>
			';
}
$__compilerVar12 .= '
			';
if ($resource['canCleanSpam'])
{
$__compilerVar12 .= '<a href="' . XenForo_Template_Helper_Core::link('spam-cleaner', $resource, array()) . '" class="item control deleteSpam OverlayTrigger"><span></span>' . 'Spam' . '</a>';
}
$__compilerVar12 .= '
			';
$__compilerVar10 .= $this->callTemplateHook('resource_update_private_controls', $__compilerVar12, array(
'update' => $update
));
unset($__compilerVar12);
$__compilerVar10 .= '
		</span>
		';
$__compilerVar13 = '';
$__compilerVar13 .= '
				';
$__compilerVar14 = '';
$__compilerVar14 .= '
					';
if ($update['isMessageTrimmed'] and !$__compilerVar9)
{
$__compilerVar14 .= '
						<a href="' . XenForo_Template_Helper_Core::link('resources/update', $resource, array(
'resource_update_id' => $update['resource_update_id']
)) . '"
							class="item control readMore Loader"
							data-target="#update-' . htmlspecialchars($update['resource_update_id'], ENT_QUOTES, 'UTF-8') . '"
							data-method="replaceAll"><span></span>... ' . 'Read More' . '</a>
					';
}
$__compilerVar14 .= '
					';
if ($update['canLike'])
{
$__compilerVar14 .= '
						<a href="' . XenForo_Template_Helper_Core::link('resources/like-update', $resource, array(
'resource_update_id' => $update['resource_update_id']
)) . '"
							class="item control LikeLink ' . (($update['like_date']) ? ('unlike') : ('like')) . '"
							data-container="#likes-update-' . htmlspecialchars($update['resource_update_id'], ENT_QUOTES, 'UTF-8') . '"><span></span><span class="LikeLabel">' . (($update['like_date']) ? ('Không thích nữa') : ('Thích')) . '</span></a>
					';
}
$__compilerVar14 .= '
				';
$__compilerVar13 .= $this->callTemplateHook('resource_update_public_controls', $__compilerVar14, array(
'update' => $update
));
unset($__compilerVar14);
$__compilerVar13 .= '
				';
if (trim($__compilerVar13) !== '')
{
$__compilerVar10 .= '
			<span class="publicControls">
				' . $__compilerVar13 . '
			</span>
		';
}
unset($__compilerVar13);
$__compilerVar10 .= '
	</div>

	<div id="likes-update-' . htmlspecialchars($update['resource_update_id'], ENT_QUOTES, 'UTF-8') . '">';
if ($update['likes'])
{
$__compilerVar15 = '';
$__compilerVar15 .= XenForo_Template_Helper_Core::link('resources/update-likes', $resource, array(
'resource_update_id' => $update['resource_update_id']
));
$__compilerVar16 = '';
if ($update['likes'])
{
$__compilerVar16 .= '
	';
$this->addRequiredExternal('css', 'likes_summary');
$__compilerVar16 .= '
	<div class="likesSummary secondaryContent">
		<span class="LikeText">
			' . XenForo_Template_Helper_Core::callHelper('likeshtml', array($update['likes'],$__compilerVar15,$update['like_date'],$update['likeUsers'])) . '
		</span>
	</div>
';
}
$__compilerVar10 .= $__compilerVar16;
unset($__compilerVar15, $__compilerVar16);
}
$__compilerVar10 .= '</div>
</li>';
$__output .= $__compilerVar10;
unset($__compilerVar9, $__compilerVar10);
$__output .= '
	</ol>

	<a href="' . XenForo_Template_Helper_Core::link('resources/updates', $resource, array()) . '">' . 'Return to update list' . '...</a>
</div>';
