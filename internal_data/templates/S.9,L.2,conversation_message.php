<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__compilerVar29 = '';
$__compilerVar29 .= 'message-' . htmlspecialchars($message['message_id'], ENT_QUOTES, 'UTF-8');
$__compilerVar30 = '';
if ($message['attachments'])
{
$__compilerVar31 = '';
$this->addRequiredExternal('css', 'attached_files');
$__compilerVar31 .= '

<div class="attachedFiles">
	<h4 class="attachedFilesHeader">' . 'Các file đính kèm' . ':</h4>
	<ul class="attachmentList SquareThumbs"
		data-thumb-height="' . ($xenOptions['attachmentThumbnailDimensions'] / 2) . '"
		data-thumb-selector="div.thumbnail > a">
		';
foreach ($message['attachments'] AS $attachment)
{
$__compilerVar31 .= '
			<li class="attachment' . (($attachment['thumbnailUrl']) ? (' image') : ('')) . '" title="' . htmlspecialchars($attachment['filename'], ENT_QUOTES, 'UTF-8') . '">
				<div class="boxModelFixer primaryContent">
					
					';
$__compilerVar32 = '';
$__compilerVar32 .= '
					<div class="thumbnail">
						';
if ($attachment['thumbnailUrl'] AND $canViewAttachments)
{
$__compilerVar32 .= '
							<a href="' . XenForo_Template_Helper_Core::link('attachments', $attachment, array()) . '" target="_blank" class="LbTrigger"
								data-href="' . XenForo_Template_Helper_Core::link('misc/lightbox', false, array()) . '"><img 
								src="' . htmlspecialchars($attachment['thumbnailUrl'], ENT_QUOTES, 'UTF-8') . '" alt="' . htmlspecialchars($attachment['filename'], ENT_QUOTES, 'UTF-8') . '" class="LbImage" /></a>
						';
}
else if ($attachment['thumbnailUrl'])
{
$__compilerVar32 .= '
							<a href="' . XenForo_Template_Helper_Core::link('attachments', $attachment, array()) . '" target="_blank"><img
								src="' . htmlspecialchars($attachment['thumbnailUrl'], ENT_QUOTES, 'UTF-8') . '" alt="' . htmlspecialchars($attachment['filename'], ENT_QUOTES, 'UTF-8') . '" /></a>
						';
}
else
{
$__compilerVar32 .= '
							<a href="' . XenForo_Template_Helper_Core::link('attachments', $attachment, array()) . '" target="_blank" class="genericAttachment"></a>
						';
}
$__compilerVar32 .= '
					</div>
					';
$__compilerVar31 .= $this->callTemplateHook('attached_file_thumbnail', $__compilerVar32, array(
'attachment' => $attachment
));
unset($__compilerVar32);
$__compilerVar31 .= '
					
					<div class="attachmentInfo pairsJustified">
						<h6 class="filename"><a href="' . XenForo_Template_Helper_Core::link('attachments', $attachment, array()) . '" target="_blank">' . htmlspecialchars($attachment['filename'], ENT_QUOTES, 'UTF-8') . '</a></h6>
						<dl><dt>' . 'Kích thước' . ':</dt> <dd>' . XenForo_Template_Helper_Core::numberFormat($attachment['file_size'], 'size') . '</dd></dl>
						<dl><dt>' . 'Đọc' . ':</dt> <dd>' . XenForo_Template_Helper_Core::numberFormat($attachment['view_count'], '0') . '</dd></dl>
					</div>
				</div>
			</li>
		';
}
$__compilerVar31 .= '
	</ul>
</div>

';
$__compilerVar30 .= $__compilerVar31;
unset($__compilerVar31);
}
$__compilerVar33 = '';
$__compilerVar33 .= '
		<div class="messageMeta">
			<div class="privateControls">
				<span class="item muted">' . XenForo_Template_Helper_Core::callHelper('usernamehtml', array($message,'',false,array(
'class' => 'author'
))) . ', 
					<a href="' . XenForo_Template_Helper_Core::link('conversations/message', $conversation, array(
'message_id' => $message['message_id']
)) . '" class="datePermalink">' . XenForo_Template_Helper_Core::callHelper('datetimehtml', array($message['message_date'],array(
'time' => '$message.message_date'
))) . '</a>
				</span>
				';
$__compilerVar34 = '';
$__compilerVar34 .= '
				';
if ($message['canEdit'])
{
$__compilerVar34 .= '
					<a href="' . XenForo_Template_Helper_Core::link('conversations/edit-message', $conversation, array(
'm' => $message['message_id']
)) . '"
						class="item control edit ' . (($xenOptions['messageInlineEdit']) ? ('OverlayTrigger') : ('')) . '"
						data-overlayOptions="{&quot;fixed&quot;:false}" 
						data-href="' . XenForo_Template_Helper_Core::link('conversations/edit-message-inline', $conversation, array(
'm' => $message['message_id']
)) . '"
						data-messageSelector="#message-' . htmlspecialchars($message['message_id'], ENT_QUOTES, 'UTF-8') . '"><span></span>' . 'Sửa' . '</a>
					';
$this->addRequiredExternal('js', 'js/xenforo/discussion.js');
$__compilerVar34 .= '
				';
}
$__compilerVar34 .= '
				';
if ($message['canReport'])
{
$__compilerVar34 .= '
					<a href="' . XenForo_Template_Helper_Core::link('conversations/report', $conversation, array(
'message_id' => $message['message_id']
)) . '" class="OverlayTrigger item control report" data-cacheOverlay="false"><span></span>' . 'Báo cáo' . '</a>
				';
}
$__compilerVar34 .= '
				';
$__compilerVar33 .= $this->callTemplateHook('conversation_message_private_controls', $__compilerVar34, array(
'message' => $message
));
unset($__compilerVar34);
$__compilerVar33 .= '
			</div>
			
			';
$__compilerVar35 = '';
$__compilerVar35 .= '
					';
$__compilerVar36 = '';
$__compilerVar36 .= '
					';
if ($canReplyConversation)
{
$__compilerVar36 .= '
						<a href="' . XenForo_Template_Helper_Core::link('conversations/reply', $conversation, array(
'm' => $message['message_id']
)) . '"
							class="item control reply ReplyQuote"><span></span>' . 'Trả lời' . '</a>
					';
}
$__compilerVar36 .= '
					';
$__compilerVar35 .= $this->callTemplateHook('conversation_message_public_controls', $__compilerVar36, array(
'message' => $message
));
unset($__compilerVar36);
$__compilerVar35 .= '
				';
if (trim($__compilerVar35) !== '')
{
$__compilerVar33 .= '
			<div class="publicControls">
				' . $__compilerVar35 . '
			</div>
			';
}
unset($__compilerVar35);
$__compilerVar33 .= '
		</div>
	';
$__compilerVar37 = '';
$this->addRequiredExternal('css', 'message');
$__compilerVar37 .= '
';
$this->addRequiredExternal('css', 'bb_code');
$__compilerVar37 .= '

<li id="' . htmlspecialchars($__compilerVar29, ENT_QUOTES, 'UTF-8') . '" class="message ' . (($message['isDeleted']) ? ('deleted') : ('')) . ' ' . (($message['is_staff']) ? ('staff') : ('')) . ' ' . (($message['isIgnored']) ? ('ignored') : ('')) . '" data-author="' . htmlspecialchars($message['username'], ENT_QUOTES, 'UTF-8') . '">

	';
$__compilerVar38 = '';
$this->addRequiredExternal('css', 'message_user_info');
$__compilerVar38 .= '

<div class="messageUserInfo" itemscope="itemscope" itemtype="http://data-vocabulary.org/Person">	
<div class="messageUserBlock ' . (($message['isOnline']) ? ('online') : ('')) . '">
	';
$__compilerVar39 = '';
$__compilerVar39 .= '
		<div class="avatarHolder">
			<span class="helper"></span>
			' . XenForo_Template_Helper_Core::callHelper('avatarhtml', array($message,(true),array(
'user' => '$user',
'size' => 'm',
'img' => 'true'
),'')) . '
			';
if ($message['isOnline'])
{
$__compilerVar39 .= '<span class="Tooltip onlineMarker" title="' . 'Online Now' . '" data-offsetX="-22" data-offsetY="-8"></span>';
}
$__compilerVar39 .= '
			<!-- slot: message_user_info_avatar -->
		</div>
	';
$__compilerVar38 .= $this->callTemplateHook('message_user_info_avatar', $__compilerVar39, array(
'user' => $message,
'isQuickReply' => $isQuickReply
));
unset($__compilerVar39);
$__compilerVar38 .= '

';
if (!$isQuickReply)
{
$__compilerVar38 .= '
	';
$__compilerVar40 = '';
$__compilerVar40 .= '
		<h3 class="userText">
			' . XenForo_Template_Helper_Core::callHelper('usernamehtml', array($message,'',(true),array(
'itemprop' => 'name'
))) . '
			';
$__compilerVar41 = '';
$__compilerVar41 .= XenForo_Template_Helper_Core::callHelper('userTitle', array(
'0' => $message,
'1' => '1',
'2' => '1'
));
if (trim($__compilerVar41) !== '')
{
$__compilerVar40 .= '<em class="userTitle" itemprop="title">' . $__compilerVar41 . '</em>';
}
unset($__compilerVar41);
$__compilerVar40 .= '
			' . XenForo_Template_Helper_Core::callHelper('userBanner', array(
'0' => $message,
'1' => 'wrapped'
)) . '
			<!-- slot: message_user_info_text -->
		</h3>
	';
$__compilerVar38 .= $this->callTemplateHook('message_user_info_text', $__compilerVar40, array(
'user' => $message,
'isQuickReply' => $isQuickReply
));
unset($__compilerVar40);
$__compilerVar38 .= '
		
	';
if (XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsActive'))
{
$__compilerVar42 = '';
$__compilerVar42 .= '
';
if (!XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsBadgeCSS'))
{
$__compilerVar42 .= '
    ';
$this->addRequiredExternal('css', 'userrankribbons');
$__compilerVar42 .= '
';
}
$__compilerVar42 .= '

';
if (XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsBadgeCSS'))
{
$__compilerVar42 .= '
    ';
$this->addRequiredExternal('css', 'userrankribbonsbadge');
$__compilerVar42 .= '
';
}
$__compilerVar42 .= '

';
if (XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsSoftResponsiveFix'))
{
$__compilerVar42 .= '
    ';
$this->addRequiredExternal('css', 'UserRankRibbonsSoftResponsiveFix');
$__compilerVar42 .= '
';
}
$__compilerVar42 .= '

';
if (XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsXenMoodsFix'))
{
$__compilerVar42 .= '
    ';
$this->addRequiredExternal('css', 'UserRankRibbonsXenMoodsFix');
$__compilerVar42 .= '
';
}
$__compilerVar42 .= '
    
';
if (XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsActive'))
{
$__compilerVar42 .= '

	<ul class="ribbon">
    
		';
if (XenForo_Template_Helper_Core::callHelper('ismemberof', array(
'0' => $message,
'1' => XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon1UserGroup')
)) AND XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon1'))
{
$__compilerVar42 .= '
			<li class="ribbon1">
				<div class="Rleft"></div>
				<div class="Rright"></div>
				' . XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon1Title') . '
			</li>
		';
}
$__compilerVar42 .= '
		
		';
if (XenForo_Template_Helper_Core::callHelper('ismemberof', array(
'0' => $message,
'1' => XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon2UserGroup')
)) AND XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon2'))
{
$__compilerVar42 .= '
			<li class="ribbon2">
				<div class="Rleft"></div>
				<div class="Rright"></div>
				' . XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon2Title') . '
			</li>
		';
}
$__compilerVar42 .= '
		
		';
if (XenForo_Template_Helper_Core::callHelper('ismemberof', array(
'0' => $message,
'1' => XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon3UserGroup')
)) AND XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon3'))
{
$__compilerVar42 .= '
			<li class="ribbon3">
				<div class="Rleft"></div>
				<div class="Rright"></div>
				' . XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon3Title') . '
			</li>
		';
}
$__compilerVar42 .= '
		
		';
if (XenForo_Template_Helper_Core::callHelper('ismemberof', array(
'0' => $message,
'1' => XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon4UserGroup')
)) AND XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon4'))
{
$__compilerVar42 .= '
			<li class="ribbon4">
				<div class="Rleft"></div>
				<div class="Rright"></div>
				' . XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon4Title') . '
			</li>
		';
}
$__compilerVar42 .= '
		
		';
if (XenForo_Template_Helper_Core::callHelper('ismemberof', array(
'0' => $message,
'1' => XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon5UserGroup')
)) AND XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon5'))
{
$__compilerVar42 .= '
			<li class="ribbon5">
				<div class="Rleft"></div>
				<div class="Rright"></div>
				' . XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon5Title') . '
			</li>
		';
}
$__compilerVar42 .= '
		
		';
if (XenForo_Template_Helper_Core::callHelper('ismemberof', array(
'0' => $message,
'1' => XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon6UserGroup')
)) AND XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon6'))
{
$__compilerVar42 .= '
			<li class="ribbon6">
				<div class="Rleft"></div>
				<div class="Rright"></div>
				' . XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon6Title') . '
			</li>
		';
}
$__compilerVar42 .= '
		
		';
if (XenForo_Template_Helper_Core::callHelper('ismemberof', array(
'0' => $message,
'1' => XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon7UserGroup')
)) AND XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon7'))
{
$__compilerVar42 .= '
			<li class="ribbon7">
				<div class="Rleft"></div>
				<div class="Rright"></div>
				' . XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon7Title') . '
			</li>
		';
}
$__compilerVar42 .= '
		
		';
if (XenForo_Template_Helper_Core::callHelper('ismemberof', array(
'0' => $message,
'1' => XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon8UserGroup')
)) AND XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon8'))
{
$__compilerVar42 .= '
			<li class="ribbon8">
				<div class="Rleft"></div>
				<div class="Rright"></div>
				' . XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon8Title') . '
			</li>
		';
}
$__compilerVar42 .= '
		
		';
if (XenForo_Template_Helper_Core::callHelper('ismemberof', array(
'0' => $message,
'1' => XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon9UserGroup')
)) AND XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon9'))
{
$__compilerVar42 .= '
			<li class="ribbon9">
				<div class="Rleft"></div>
				<div class="Rright"></div>
				' . XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon9Title') . '
			</li>
		';
}
$__compilerVar42 .= '
		
		';
if (XenForo_Template_Helper_Core::callHelper('ismemberof', array(
'0' => $message,
'1' => XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon10UserGroup')
)) AND XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon10'))
{
$__compilerVar42 .= '
			<li class="ribbon10">
				<div class="Rleft"></div>
				<div class="Rright"></div>
				' . XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon10Title') . '
			</li>
		';
}
$__compilerVar42 .= '
		
		';
if (XenForo_Template_Helper_Core::callHelper('ismemberof', array(
'0' => $message,
'1' => XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon11UserGroup')
)) AND XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon11'))
{
$__compilerVar42 .= '
			<li class="ribbon11">
				<div class="Rleft"></div>
				<div class="Rright"></div>
				' . XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon11Title') . '
			</li>
		';
}
$__compilerVar42 .= '
		
		';
if (XenForo_Template_Helper_Core::callHelper('ismemberof', array(
'0' => $message,
'1' => XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon12UserGroup')
)) AND XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon12'))
{
$__compilerVar42 .= '
			<li class="ribbon12">
				<div class="Rleft"></div>
				<div class="Rright"></div>
				' . XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon12Title') . '
			</li>
		';
}
$__compilerVar42 .= '
		
		';
if (XenForo_Template_Helper_Core::callHelper('ismemberof', array(
'0' => $message,
'1' => XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon13UserGroup')
)) AND XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon13'))
{
$__compilerVar42 .= '
			<li class="ribbon13">
				<div class="Rleft"></div>
				<div class="Rright"></div>
				' . XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon13Title') . '
			</li>
		';
}
$__compilerVar42 .= '
		
		';
if (XenForo_Template_Helper_Core::callHelper('ismemberof', array(
'0' => $message,
'1' => XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon14UserGroup')
)) AND XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon14'))
{
$__compilerVar42 .= '
			<li class="ribbon14">
				<div class="Rleft"></div>
				<div class="Rright"></div>
				' . XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon14Title') . '
			</li>
		';
}
$__compilerVar42 .= '
		
		';
if (XenForo_Template_Helper_Core::callHelper('ismemberof', array(
'0' => $message,
'1' => XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon15UserGroup')
)) AND XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon15'))
{
$__compilerVar42 .= '
			<li class="ribbon15">
				<div class="Rleft"></div>
				<div class="Rright"></div>
				' . XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon15Title') . '
			</li>
		';
}
$__compilerVar42 .= '
		
		';
if (XenForo_Template_Helper_Core::callHelper('ismemberof', array(
'0' => $message,
'1' => XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon16UserGroup')
)) AND XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon16'))
{
$__compilerVar42 .= '
			<li class="ribbon16">
				<div class="Rleft"></div>
				<div class="Rright"></div>
				' . XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon16Title') . '
			</li>
		';
}
$__compilerVar42 .= '
		
		';
if (XenForo_Template_Helper_Core::callHelper('ismemberof', array(
'0' => $message,
'1' => XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon17UserGroup')
)) AND XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon17'))
{
$__compilerVar42 .= '
			<li class="ribbon17">
				<div class="Rleft"></div>
				<div class="Rright"></div>
				' . XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon17Title') . '
			</li>
		';
}
$__compilerVar42 .= '
		
		';
if (XenForo_Template_Helper_Core::callHelper('ismemberof', array(
'0' => $message,
'1' => XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon18UserGroup')
)) AND XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon18'))
{
$__compilerVar42 .= '
			<li class="ribbon18">
				<div class="Rleft"></div>
				<div class="Rright"></div>
				' . XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon18Title') . '
			</li>
		';
}
$__compilerVar42 .= '
		
		';
if (XenForo_Template_Helper_Core::callHelper('ismemberof', array(
'0' => $message,
'1' => XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon19UserGroup')
)) AND XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon19'))
{
$__compilerVar42 .= '
			<li class="ribbon19">
				<div class="Rleft"></div>
				<div class="Rright"></div>
				' . XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon19Title') . '
			</li>
		';
}
$__compilerVar42 .= '
		
		';
if (XenForo_Template_Helper_Core::callHelper('ismemberof', array(
'0' => $message,
'1' => XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon20UserGroup')
)) AND XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon20'))
{
$__compilerVar42 .= '
			<li class="ribbon20">
				<div class="Rleft"></div>
				<div class="Rright"></div>
				' . XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon20Title') . '
			</li>
		';
}
$__compilerVar42 .= '
		
		';
if (XenForo_Template_Helper_Core::callHelper('ismemberof', array(
'0' => $message,
'1' => XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon21UserGroup')
)) AND XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon21'))
{
$__compilerVar42 .= '
			<li class="ribbon21">
				<div class="Rleft"></div>
				<div class="Rright"></div>
				' . XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon21Title') . '
			</li>
		';
}
$__compilerVar42 .= '
		
		';
if (XenForo_Template_Helper_Core::callHelper('ismemberof', array(
'0' => $message,
'1' => XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon22UserGroup')
)) AND XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon22'))
{
$__compilerVar42 .= '
			<li class="ribbon22">
				<div class="Rleft"></div>
				<div class="Rright"></div>
				' . XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon22Title') . '
			</li>
		';
}
$__compilerVar42 .= '
		
		';
if (XenForo_Template_Helper_Core::callHelper('ismemberof', array(
'0' => $message,
'1' => XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon23UserGroup')
)) AND XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon23'))
{
$__compilerVar42 .= '
			<li class="ribbon23">
				<div class="Rleft"></div>
				<div class="Rright"></div>
				' . XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon23Title') . '
			</li>
		';
}
$__compilerVar42 .= '
		
		';
if (XenForo_Template_Helper_Core::callHelper('ismemberof', array(
'0' => $message,
'1' => XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon24UserGroup')
)) AND XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon24'))
{
$__compilerVar42 .= '
			<li class="ribbon24">
				<div class="Rleft"></div>
				<div class="Rright"></div>
				' . XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon24Title') . '
			</li>
		';
}
$__compilerVar42 .= '
		
		';
if (XenForo_Template_Helper_Core::callHelper('ismemberof', array(
'0' => $message,
'1' => XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon25UserGroup')
)) AND XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon25'))
{
$__compilerVar42 .= '
			<li class="ribbon25">
				<div class="Rleft"></div>
				<div class="Rright"></div>
				' . XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon25Title') . '
			</li>
		';
}
$__compilerVar42 .= '
		
		';
if (XenForo_Template_Helper_Core::callHelper('ismemberof', array(
'0' => $message,
'1' => XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon26UserGroup')
)) AND XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon26'))
{
$__compilerVar42 .= '
			<li class="ribbon26">
				<div class="Rleft"></div>
				<div class="Rright"></div>
				' . XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon26Title') . '
			</li>
		';
}
$__compilerVar42 .= '
		
		';
if (XenForo_Template_Helper_Core::callHelper('ismemberof', array(
'0' => $message,
'1' => XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon27UserGroup')
)) AND XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon27'))
{
$__compilerVar42 .= '
			<li class="ribbon27">
				<div class="Rleft"></div>
				<div class="Rright"></div>
				' . XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon27Title') . '
			</li>
		';
}
$__compilerVar42 .= '
		
		';
if (XenForo_Template_Helper_Core::callHelper('ismemberof', array(
'0' => $message,
'1' => XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon28UserGroup')
)) AND XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon28'))
{
$__compilerVar42 .= '
			<li class="ribbon28">
				<div class="Rleft"></div>
				<div class="Rright"></div>
				' . XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon28Title') . '
			</li>
		';
}
$__compilerVar42 .= '
		
		';
if (XenForo_Template_Helper_Core::callHelper('ismemberof', array(
'0' => $message,
'1' => XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon29UserGroup')
)) AND XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon29'))
{
$__compilerVar42 .= '
			<li class="ribbon29">
				<div class="Rleft"></div>
				<div class="Rright"></div>
				' . XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon29Title') . '
			</li>
		';
}
$__compilerVar42 .= '
		
		';
if (XenForo_Template_Helper_Core::callHelper('ismemberof', array(
'0' => $message,
'1' => XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon30UserGroup')
)) AND XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon30'))
{
$__compilerVar42 .= '
			<li class="ribbon30">
				<div class="Rleft"></div>
				<div class="Rright"></div>
				' . XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon30Title') . '
			</li>
		';
}
$__compilerVar42 .= '
		
		';
if (XenForo_Template_Helper_Core::callHelper('ismemberof', array(
'0' => $message,
'1' => XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon31UserGroup')
)) AND XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon31'))
{
$__compilerVar42 .= '
			<li class="ribbon31">
				<div class="Rleft"></div>
				<div class="Rright"></div>
				' . XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon31Title') . '
			</li>
		';
}
$__compilerVar42 .= '
		
		';
if (XenForo_Template_Helper_Core::callHelper('ismemberof', array(
'0' => $message,
'1' => XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon32UserGroup')
)) AND XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon32'))
{
$__compilerVar42 .= '
			<li class="ribbon32">
				<div class="Rleft"></div>
				<div class="Rright"></div>
				' . XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon32Title') . '
			</li>
		';
}
$__compilerVar42 .= '
		
		';
if (XenForo_Template_Helper_Core::callHelper('ismemberof', array(
'0' => $message,
'1' => XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon33UserGroup')
)) AND XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon33'))
{
$__compilerVar42 .= '
			<li class="ribbon33">
				<div class="Rleft"></div>
				<div class="Rright"></div>
				' . XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon33Title') . '
			</li>
		';
}
$__compilerVar42 .= '
		
		';
if (XenForo_Template_Helper_Core::callHelper('ismemberof', array(
'0' => $message,
'1' => XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon34UserGroup')
)) AND XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon34'))
{
$__compilerVar42 .= '
			<li class="ribbon34">
				<div class="Rleft"></div>
				<div class="Rright"></div>
				' . XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon34Title') . '
			</li>
		';
}
$__compilerVar42 .= '
		
		';
if (XenForo_Template_Helper_Core::callHelper('ismemberof', array(
'0' => $message,
'1' => XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon35UserGroup')
)) AND XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon35'))
{
$__compilerVar42 .= '
			<li class="ribbon35">
				<div class="Rleft"></div>
				<div class="Rright"></div>
				' . XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon35Title') . '
			</li>
		';
}
$__compilerVar42 .= '
		
	</ul>
';
}
$__compilerVar38 .= $__compilerVar42;
unset($__compilerVar42);
}
$__compilerVar38 .= '
    ';
$__compilerVar43 = '';
$__compilerVar43 .= '
			';
$__compilerVar44 = '';
$__compilerVar44 .= '
				';
if (XenForo_Template_Helper_Core::styleProperty('messageShowRegisterDate') AND $message['user_id'])
{
$__compilerVar44 .= '
					<dl class="pairsJustified">
						<dt>' . 'Tham gia ngày' . ':</dt>
						<dd>' . XenForo_Template_Helper_Core::date($message['register_date'], '') . '</dd>
					</dl>
				';
}
$__compilerVar44 .= '
				
				';
if (XenForo_Template_Helper_Core::styleProperty('messageShowMessageCount') AND $message['user_id'])
{
$__compilerVar44 .= '
					<dl class="pairsJustified">
						<dt>' . 'Bài viết' . ':</dt>
						<dd><a href="' . XenForo_Template_Helper_Core::link('search/member', '', array(
'user_id' => $message['user_id']
)) . '" class="concealed" rel="nofollow">' . XenForo_Template_Helper_Core::numberFormat($message['message_count'], '0') . '</a></dd>
					</dl>
				';
}
$__compilerVar44 .= '
				
				';
if (XenForo_Template_Helper_Core::styleProperty('messageShowTotalLikes') AND $message['user_id'])
{
$__compilerVar44 .= '
					<dl class="pairsJustified">
						<dt>' . 'Đã được thích' . ':</dt>
						<dd>' . XenForo_Template_Helper_Core::numberFormat($message['like_count'], '0') . '</dd>
					</dl>
				';
}
$__compilerVar44 .= '
				
				';
if (XenForo_Template_Helper_Core::styleProperty('messageShowTrophyPoints') AND $message['user_id'])
{
$__compilerVar44 .= '
					<dl class="pairsJustified">
						<dt>' . 'Điểm thành tích' . ':</dt>
						<dd><a href="' . XenForo_Template_Helper_Core::link('members/trophies', $message, array()) . '" class="OverlayTrigger concealed">' . XenForo_Template_Helper_Core::numberFormat($message['trophy_points'], '0') . '</a></dd>
					</dl>
				';
}
$__compilerVar44 .= '
			
				';
if (XenForo_Template_Helper_Core::styleProperty('messageShowGender') AND $message['gender'])
{
$__compilerVar44 .= '
					<dl class="pairsJustified">
						<dt>' . 'Giới tính' . ':</dt>
						<dd itemprop="gender">';
if ($message['gender'] == ('male'))
{
$__compilerVar44 .= 'Nam';
}
else
{
$__compilerVar44 .= 'Nữ';
}
$__compilerVar44 .= '</dd>
					</dl>
				';
}
$__compilerVar44 .= '
				
				';
if (XenForo_Template_Helper_Core::styleProperty('messageShowOccupation') AND $message['occupation'])
{
$__compilerVar44 .= '
					<dl class="pairsJustified">
						<dt>' . 'Nghề nghiệp' . ':</dt>
						<dd itemprop="role">' . XenForo_Template_Helper_Core::string('censor', array(
'0' => htmlspecialchars($message['occupation'], ENT_QUOTES, 'UTF-8')
)) . '</dd>
					</dl>
				';
}
$__compilerVar44 .= '
				
				';
if (XenForo_Template_Helper_Core::styleProperty('messageShowLocation') AND $message['location'])
{
$__compilerVar44 .= '
					<dl class="pairsJustified">
						<dt>' . 'Nơi ở' . ':</dt>
						<dd><a href="' . XenForo_Template_Helper_Core::link('misc/location-info', '', array(
'location' => XenForo_Template_Helper_Core::string('censor', array(
'0' => $message['location'],
'1' => '-'
))
)) . '" target="_blank" rel="nofollow" itemprop="address" class="concealed">' . XenForo_Template_Helper_Core::string('censor', array(
'0' => htmlspecialchars($message['location'], ENT_QUOTES, 'UTF-8')
)) . '</a></dd>
					</dl>
				';
}
$__compilerVar44 .= '
			
				';
if (XenForo_Template_Helper_Core::styleProperty('messageShowHomepage') AND $message['homepage'])
{
$__compilerVar44 .= '
					<dl class="pairsJustified">
						<dt>' . 'Web' . ':</dt>
						<dd><a href="' . XenForo_Template_Helper_Core::string('censor', array(
'0' => htmlspecialchars($message['homepage'], ENT_QUOTES, 'UTF-8'),
'1' => '-'
)) . '" rel="nofollow" target="_blank" itemprop="url">' . XenForo_Template_Helper_Core::string('censor', array(
'0' => htmlspecialchars($message['homepage'], ENT_QUOTES, 'UTF-8')
)) . '</a></dd>
					</dl>
				';
}
$__compilerVar44 .= '
							
			';
$__compilerVar43 .= $this->callTemplateHook('message_user_info_extra', $__compilerVar44, array(
'user' => $message,
'isQuickReply' => $isQuickReply
));
unset($__compilerVar44);
$__compilerVar43 .= '			
			';
if (XenForo_Template_Helper_Core::styleProperty('messageShowCustomFields') AND $message['customFields'])
{
$__compilerVar43 .= '
			';
$__compilerVar45 = '';
$__compilerVar45 .= '
			
				';
foreach ($userFieldsInfo AS $fieldId => $fieldInfo)
{
$__compilerVar45 .= '
					';
if ($fieldInfo['viewable_message'] AND ($fieldInfo['display_group'] != ('contact') OR $message['allow_view_identities'] == ('everyone') OR ($message['allow_view_identities'] == ('members') AND $visitor['user_id'])))
{
$__compilerVar45 .= '
						';
$__compilerVar46 = '';
$__compilerVar46 .= XenForo_Template_Helper_Core::callHelper('userFieldValue', array(
'0' => $fieldInfo,
'1' => $message,
'2' => $message['customFields'][$fieldId]
));
if (trim($__compilerVar46) !== '')
{
$__compilerVar45 .= '
							<dl class="pairsJustified userField_' . htmlspecialchars($fieldId, ENT_QUOTES, 'UTF-8') . '">
								<dt>' . XenForo_Template_Helper_Core::callHelper('userFieldTitle', array(
'0' => $fieldId
)) . ':</dt>
								<dd>' . $__compilerVar46 . '</dd>
							</dl>
						';
}
unset($__compilerVar46);
$__compilerVar45 .= '
					';
}
$__compilerVar45 .= '
				';
}
$__compilerVar45 .= '
				
			';
$__compilerVar43 .= $this->callTemplateHook('message_user_info_custom_fields', $__compilerVar45, array(
'user' => $message,
'isQuickReply' => $isQuickReply
));
unset($__compilerVar45);
$__compilerVar43 .= '
			';
}
$__compilerVar43 .= '
			';
if (trim($__compilerVar43) !== '')
{
$__compilerVar38 .= '
		<div class="extraUserInfo">
			' . $__compilerVar43 . '
		</div>
	';
}
unset($__compilerVar43);
$__compilerVar38 .= '
		
';
}
$__compilerVar38 .= '

	<span class="arrow"><span></span></span>
</div>
</div>';
$__compilerVar37 .= $__compilerVar38;
unset($__compilerVar38);
$__compilerVar37 .= '

	<div class="messageInfo primaryContent">
		';
if ($message['isNew'])
{
$__compilerVar37 .= '<strong class="newIndicator"><span></span>' . 'Mới' . '</strong>';
}
$__compilerVar37 .= '
		
		';
$__compilerVar47 = '';
$__compilerVar47 .= '
					';
$__compilerVar48 = '';
$__compilerVar48 .= '
						';
if ($message['warning_message'])
{
$__compilerVar48 .= '
							<li class="warningNotice"><span class="icon Tooltip" title="' . 'Warning' . '" data-tipclass="iconTip flipped"></span>' . htmlspecialchars($message['warning_message'], ENT_QUOTES, 'UTF-8') . '</li>
						';
}
$__compilerVar48 .= '
						';
if ($message['isDeleted'])
{
$__compilerVar48 .= '
							<li class="deletedNotice"><span class="icon Tooltip" title="' . 'Bị xóa' . '" data-tipclass="iconTip flipped"></span>' . 'This message has been removed from public view.' . '</li>
						';
}
else if ($message['isModerated'])
{
$__compilerVar48 .= '
							<li class="moderatedNotice"><span class="icon Tooltip" title="' . 'Awaiting moderation' . '" data-tipclass="iconTip flipped"></span>' . 'This message is awaiting moderator approval, and is invisible to normal visitors.' . '</li>
						';
}
$__compilerVar48 .= '
						';
if ($message['isIgnored'])
{
$__compilerVar48 .= '
							<li>' . 'You are ignoring content by this member.' . ' <a href="javascript:" class="JsOnly DisplayIgnoredContent">' . 'Show Ignored Content' . '</a></li>
						';
}
$__compilerVar48 .= '
					';
$__compilerVar47 .= $this->callTemplateHook('message_notices', $__compilerVar48, array(
'message' => $message
));
unset($__compilerVar48);
$__compilerVar47 .= '
				';
if (trim($__compilerVar47) !== '')
{
$__compilerVar37 .= '
			<ul class="messageNotices">
				' . $__compilerVar47 . '
			</ul>
		';
}
unset($__compilerVar47);
$__compilerVar37 .= '
		
		';
$__compilerVar49 = '';
$__compilerVar49 .= '
		<div class="messageContent">		
			<article>
				<blockquote class="messageText SelectQuoteContainer ugc baseHtml' . (($message['isIgnored']) ? (' ignored') : ('')) . '">
					';
$__compilerVar50 = '';
$__compilerVar51 = '';
$__compilerVar50 .= $this->callTemplateHook('ad_message_body', $__compilerVar51, array());
unset($__compilerVar51);
$__compilerVar49 .= $__compilerVar50;
unset($__compilerVar50);
$__compilerVar49 .= '
					' . $message['messageHtml'] . '
					<div class="messageTextEndMarker">&nbsp;</div>
				</blockquote>
			</article>
			
			' . $__compilerVar30 . '
		</div>
		';
$__compilerVar37 .= $this->callTemplateHook('message_content', $__compilerVar49, array(
'message' => $message
));
unset($__compilerVar49);
$__compilerVar37 .= '
		
		';
if ($message['last_edit_date'])
{
$__compilerVar37 .= '
			<div class="editDate">
			';
if ($message['user_id'] == $message['last_edit_user_id'])
{
$__compilerVar37 .= '
				' . 'Chỉnh sửa cuối' . ': ' . XenForo_Template_Helper_Core::callHelper('datetimehtml', array($message['last_edit_date'],array(
'time' => htmlspecialchars($message['last_edit_date'], ENT_QUOTES, 'UTF-8')
))) . '
			';
}
else
{
$__compilerVar37 .= '
				' . 'Last edited by a moderator' . ': ' . XenForo_Template_Helper_Core::callHelper('datetimehtml', array($message['last_edit_date'],array(
'time' => htmlspecialchars($message['last_edit_date'], ENT_QUOTES, 'UTF-8')
))) . '
			';
}
$__compilerVar37 .= '
			</div>
		';
}
$__compilerVar37 .= '
		
		';
if ($visitor['content_show_signature'] && $message['signature'])
{
$__compilerVar37 .= '
			<div class="baseHtml signature messageText ugc' . (($message['isIgnored']) ? (' ignored') : ('')) . '"><aside>' . $message['signatureHtml'] . '</aside></div>
		';
}
$__compilerVar37 .= '
		
		' . $__compilerVar33 . '
		
		';
$__compilerVar52 = '';
$__compilerVar37 .= $this->callTemplateHook('dark_postrating_likes_bar', $__compilerVar52, array(
'post' => $message,
'message_id' => $__compilerVar29
));
unset($__compilerVar52);
$__compilerVar37 .= '
	</div>

	';
$__compilerVar53 = '';
$__compilerVar37 .= $this->callTemplateHook('message_below', $__compilerVar53, array(
'post' => $message,
'message_id' => $__compilerVar29
));
unset($__compilerVar53);
$__compilerVar37 .= '
	
	';
$__compilerVar54 = '';
$__compilerVar55 = '';
$__compilerVar54 .= $this->callTemplateHook('ad_message_below', $__compilerVar55, array());
unset($__compilerVar55);
$__compilerVar37 .= $__compilerVar54;
unset($__compilerVar54);
$__compilerVar37 .= '
';
$__compilerVar56 = '';
$__compilerVar37 .= $this->callTemplateCallback('DigitalPointAdPositioning_Callback_AdBelowPost', 'renderAd', $__compilerVar56, array(
'dp_ads' => $dp_ads
));
unset($__compilerVar56);
$__compilerVar37 .= '
</li>';
$__output .= $__compilerVar37;
unset($__compilerVar29, $__compilerVar30, $__compilerVar33, $__compilerVar37);
