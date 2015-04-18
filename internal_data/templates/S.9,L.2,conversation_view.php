<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__extraData['title'] = '';
$__extraData['title'] .= htmlspecialchars($conversation['title'], ENT_QUOTES, 'UTF-8') . XenForo_Template_Helper_Core::callHelper('pagenumber', array(
'0' => $page
));
$__output .= '
';
$__extraData['h1'] = '';
$__extraData['h1'] .= htmlspecialchars($conversation['title'], ENT_QUOTES, 'UTF-8');
$__output .= '

';
if ($xenOptions['selectQuotable'])
{
$__output .= '
	';
$__extraData['bodyClasses'] = '';
$__extraData['bodyClasses'] .= 'SelectQuotable';
$__output .= '
';
}
$__output .= '

';
$this->addRequiredExternal('css', 'conversation');
$__output .= '



<div class="pageNavLinkGroup">
	<div class="linkGroup">
		';
if ($canEditConversation)
{
$__output .= '<a href="' . XenForo_Template_Helper_Core::link('conversations/edit', $conversation, array()) . '" class="OverlayTrigger">' . 'Sửa đối thoại' . '</a>';
}
$__output .= '
		<a href="' . XenForo_Template_Helper_Core::link('conversations/toggle-read', $conversation, array()) . '" class="ReadToggle" data-counter="#ConversationsMenu_Counter">';
if ($conversation['showMarkRead'])
{
$__output .= 'Mark as Read';
}
else
{
$__output .= 'Mark as Unread';
}
$__output .= '</a>
		<a href="' . XenForo_Template_Helper_Core::link('conversations/toggle-starred', $conversation, array()) . '" class="ReadToggle">';
if ($conversation['is_starred'])
{
$__output .= 'Unstar Conversation';
}
else
{
$__output .= 'Star Conversation';
}
$__output .= '</a>
		<a href="' . XenForo_Template_Helper_Core::link('conversations/leave', $conversation, array()) . '" class="OverlayTrigger">' . 'Ra khỏi đối thoại này' . '</a>
	</div>
	
	' . XenForo_Template_Helper_Core::callHelper('pagenavhtml', array('public', htmlspecialchars($messagesPerPage, ENT_QUOTES, 'UTF-8'), htmlspecialchars($totalMessages, ENT_QUOTES, 'UTF-8'), htmlspecialchars($page, ENT_QUOTES, 'UTF-8'), 'conversations', $conversation, array(), false, array())) . '
</div>

<ol class="messageList withSidebar" id="messageList">
	';
foreach ($messages AS $message)
{
$__output .= '
		';
$__compilerVar58 = '';
$__compilerVar59 = '';
$__compilerVar59 .= 'message-' . htmlspecialchars($message['message_id'], ENT_QUOTES, 'UTF-8');
$__compilerVar60 = '';
if ($message['attachments'])
{
$__compilerVar61 = '';
$this->addRequiredExternal('css', 'attached_files');
$__compilerVar61 .= '

<div class="attachedFiles">
	<h4 class="attachedFilesHeader">' . 'Các file đính kèm' . ':</h4>
	<ul class="attachmentList SquareThumbs"
		data-thumb-height="' . ($xenOptions['attachmentThumbnailDimensions'] / 2) . '"
		data-thumb-selector="div.thumbnail > a">
		';
foreach ($message['attachments'] AS $attachment)
{
$__compilerVar61 .= '
			<li class="attachment' . (($attachment['thumbnailUrl']) ? (' image') : ('')) . '" title="' . htmlspecialchars($attachment['filename'], ENT_QUOTES, 'UTF-8') . '">
				<div class="boxModelFixer primaryContent">
					
					';
$__compilerVar62 = '';
$__compilerVar62 .= '
					<div class="thumbnail">
						';
if ($attachment['thumbnailUrl'] AND $canViewAttachments)
{
$__compilerVar62 .= '
							<a href="' . XenForo_Template_Helper_Core::link('attachments', $attachment, array()) . '" target="_blank" class="LbTrigger"
								data-href="' . XenForo_Template_Helper_Core::link('misc/lightbox', false, array()) . '"><img 
								src="' . htmlspecialchars($attachment['thumbnailUrl'], ENT_QUOTES, 'UTF-8') . '" alt="' . htmlspecialchars($attachment['filename'], ENT_QUOTES, 'UTF-8') . '" class="LbImage" /></a>
						';
}
else if ($attachment['thumbnailUrl'])
{
$__compilerVar62 .= '
							<a href="' . XenForo_Template_Helper_Core::link('attachments', $attachment, array()) . '" target="_blank"><img
								src="' . htmlspecialchars($attachment['thumbnailUrl'], ENT_QUOTES, 'UTF-8') . '" alt="' . htmlspecialchars($attachment['filename'], ENT_QUOTES, 'UTF-8') . '" /></a>
						';
}
else
{
$__compilerVar62 .= '
							<a href="' . XenForo_Template_Helper_Core::link('attachments', $attachment, array()) . '" target="_blank" class="genericAttachment"></a>
						';
}
$__compilerVar62 .= '
					</div>
					';
$__compilerVar61 .= $this->callTemplateHook('attached_file_thumbnail', $__compilerVar62, array(
'attachment' => $attachment
));
unset($__compilerVar62);
$__compilerVar61 .= '
					
					<div class="attachmentInfo pairsJustified">
						<h6 class="filename"><a href="' . XenForo_Template_Helper_Core::link('attachments', $attachment, array()) . '" target="_blank">' . htmlspecialchars($attachment['filename'], ENT_QUOTES, 'UTF-8') . '</a></h6>
						<dl><dt>' . 'Kích thước' . ':</dt> <dd>' . XenForo_Template_Helper_Core::numberFormat($attachment['file_size'], 'size') . '</dd></dl>
						<dl><dt>' . 'Đọc' . ':</dt> <dd>' . XenForo_Template_Helper_Core::numberFormat($attachment['view_count'], '0') . '</dd></dl>
					</div>
				</div>
			</li>
		';
}
$__compilerVar61 .= '
	</ul>
</div>

';
$__compilerVar60 .= $__compilerVar61;
unset($__compilerVar61);
}
$__compilerVar63 = '';
$__compilerVar63 .= '
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
$__compilerVar64 = '';
$__compilerVar64 .= '
				';
if ($message['canEdit'])
{
$__compilerVar64 .= '
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
$__compilerVar64 .= '
				';
}
$__compilerVar64 .= '
				';
if ($message['canReport'])
{
$__compilerVar64 .= '
					<a href="' . XenForo_Template_Helper_Core::link('conversations/report', $conversation, array(
'message_id' => $message['message_id']
)) . '" class="OverlayTrigger item control report" data-cacheOverlay="false"><span></span>' . 'Báo cáo' . '</a>
				';
}
$__compilerVar64 .= '
				';
$__compilerVar63 .= $this->callTemplateHook('conversation_message_private_controls', $__compilerVar64, array(
'message' => $message
));
unset($__compilerVar64);
$__compilerVar63 .= '
			</div>
			
			';
$__compilerVar65 = '';
$__compilerVar65 .= '
					';
$__compilerVar66 = '';
$__compilerVar66 .= '
					';
if ($canReplyConversation)
{
$__compilerVar66 .= '
						<a href="' . XenForo_Template_Helper_Core::link('conversations/reply', $conversation, array(
'm' => $message['message_id']
)) . '"
							class="item control reply ReplyQuote"><span></span>' . 'Trả lời' . '</a>
					';
}
$__compilerVar66 .= '
					';
$__compilerVar65 .= $this->callTemplateHook('conversation_message_public_controls', $__compilerVar66, array(
'message' => $message
));
unset($__compilerVar66);
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
	';
$__compilerVar67 = '';
$this->addRequiredExternal('css', 'message');
$__compilerVar67 .= '
';
$this->addRequiredExternal('css', 'bb_code');
$__compilerVar67 .= '

<li id="' . htmlspecialchars($__compilerVar59, ENT_QUOTES, 'UTF-8') . '" class="message ' . (($message['isDeleted']) ? ('deleted') : ('')) . ' ' . (($message['is_staff']) ? ('staff') : ('')) . ' ' . (($message['isIgnored']) ? ('ignored') : ('')) . '" data-author="' . htmlspecialchars($message['username'], ENT_QUOTES, 'UTF-8') . '">

	';
$__compilerVar68 = '';
$this->addRequiredExternal('css', 'message_user_info');
$__compilerVar68 .= '

<div class="messageUserInfo" itemscope="itemscope" itemtype="http://data-vocabulary.org/Person">	
<div class="messageUserBlock ' . (($message['isOnline']) ? ('online') : ('')) . '">
	';
$__compilerVar69 = '';
$__compilerVar69 .= '
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
$__compilerVar69 .= '<span class="Tooltip onlineMarker" title="' . 'Online Now' . '" data-offsetX="-22" data-offsetY="-8"></span>';
}
$__compilerVar69 .= '
			<!-- slot: message_user_info_avatar -->
		</div>
	';
$__compilerVar68 .= $this->callTemplateHook('message_user_info_avatar', $__compilerVar69, array(
'user' => $message,
'isQuickReply' => $isQuickReply
));
unset($__compilerVar69);
$__compilerVar68 .= '

';
if (!$isQuickReply)
{
$__compilerVar68 .= '
	';
$__compilerVar70 = '';
$__compilerVar70 .= '
		<h3 class="userText">
			' . XenForo_Template_Helper_Core::callHelper('usernamehtml', array($message,'',(true),array(
'itemprop' => 'name'
))) . '
			';
$__compilerVar71 = '';
$__compilerVar71 .= XenForo_Template_Helper_Core::callHelper('userTitle', array(
'0' => $message,
'1' => '1',
'2' => '1'
));
if (trim($__compilerVar71) !== '')
{
$__compilerVar70 .= '<em class="userTitle" itemprop="title">' . $__compilerVar71 . '</em>';
}
unset($__compilerVar71);
$__compilerVar70 .= '
			' . XenForo_Template_Helper_Core::callHelper('userBanner', array(
'0' => $message,
'1' => 'wrapped'
)) . '
			<!-- slot: message_user_info_text -->
		</h3>
	';
$__compilerVar68 .= $this->callTemplateHook('message_user_info_text', $__compilerVar70, array(
'user' => $message,
'isQuickReply' => $isQuickReply
));
unset($__compilerVar70);
$__compilerVar68 .= '
		
	';
if (XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsActive'))
{
$__compilerVar72 = '';
$__compilerVar72 .= '
';
if (!XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsBadgeCSS'))
{
$__compilerVar72 .= '
    ';
$this->addRequiredExternal('css', 'userrankribbons');
$__compilerVar72 .= '
';
}
$__compilerVar72 .= '

';
if (XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsBadgeCSS'))
{
$__compilerVar72 .= '
    ';
$this->addRequiredExternal('css', 'userrankribbonsbadge');
$__compilerVar72 .= '
';
}
$__compilerVar72 .= '

';
if (XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsSoftResponsiveFix'))
{
$__compilerVar72 .= '
    ';
$this->addRequiredExternal('css', 'UserRankRibbonsSoftResponsiveFix');
$__compilerVar72 .= '
';
}
$__compilerVar72 .= '

';
if (XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsXenMoodsFix'))
{
$__compilerVar72 .= '
    ';
$this->addRequiredExternal('css', 'UserRankRibbonsXenMoodsFix');
$__compilerVar72 .= '
';
}
$__compilerVar72 .= '
    
';
if (XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsActive'))
{
$__compilerVar72 .= '

	<ul class="ribbon">
    
		';
if (XenForo_Template_Helper_Core::callHelper('ismemberof', array(
'0' => $message,
'1' => XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon1UserGroup')
)) AND XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon1'))
{
$__compilerVar72 .= '
			<li class="ribbon1">
				<div class="Rleft"></div>
				<div class="Rright"></div>
				' . XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon1Title') . '
			</li>
		';
}
$__compilerVar72 .= '
		
		';
if (XenForo_Template_Helper_Core::callHelper('ismemberof', array(
'0' => $message,
'1' => XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon2UserGroup')
)) AND XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon2'))
{
$__compilerVar72 .= '
			<li class="ribbon2">
				<div class="Rleft"></div>
				<div class="Rright"></div>
				' . XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon2Title') . '
			</li>
		';
}
$__compilerVar72 .= '
		
		';
if (XenForo_Template_Helper_Core::callHelper('ismemberof', array(
'0' => $message,
'1' => XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon3UserGroup')
)) AND XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon3'))
{
$__compilerVar72 .= '
			<li class="ribbon3">
				<div class="Rleft"></div>
				<div class="Rright"></div>
				' . XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon3Title') . '
			</li>
		';
}
$__compilerVar72 .= '
		
		';
if (XenForo_Template_Helper_Core::callHelper('ismemberof', array(
'0' => $message,
'1' => XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon4UserGroup')
)) AND XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon4'))
{
$__compilerVar72 .= '
			<li class="ribbon4">
				<div class="Rleft"></div>
				<div class="Rright"></div>
				' . XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon4Title') . '
			</li>
		';
}
$__compilerVar72 .= '
		
		';
if (XenForo_Template_Helper_Core::callHelper('ismemberof', array(
'0' => $message,
'1' => XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon5UserGroup')
)) AND XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon5'))
{
$__compilerVar72 .= '
			<li class="ribbon5">
				<div class="Rleft"></div>
				<div class="Rright"></div>
				' . XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon5Title') . '
			</li>
		';
}
$__compilerVar72 .= '
		
		';
if (XenForo_Template_Helper_Core::callHelper('ismemberof', array(
'0' => $message,
'1' => XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon6UserGroup')
)) AND XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon6'))
{
$__compilerVar72 .= '
			<li class="ribbon6">
				<div class="Rleft"></div>
				<div class="Rright"></div>
				' . XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon6Title') . '
			</li>
		';
}
$__compilerVar72 .= '
		
		';
if (XenForo_Template_Helper_Core::callHelper('ismemberof', array(
'0' => $message,
'1' => XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon7UserGroup')
)) AND XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon7'))
{
$__compilerVar72 .= '
			<li class="ribbon7">
				<div class="Rleft"></div>
				<div class="Rright"></div>
				' . XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon7Title') . '
			</li>
		';
}
$__compilerVar72 .= '
		
		';
if (XenForo_Template_Helper_Core::callHelper('ismemberof', array(
'0' => $message,
'1' => XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon8UserGroup')
)) AND XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon8'))
{
$__compilerVar72 .= '
			<li class="ribbon8">
				<div class="Rleft"></div>
				<div class="Rright"></div>
				' . XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon8Title') . '
			</li>
		';
}
$__compilerVar72 .= '
		
		';
if (XenForo_Template_Helper_Core::callHelper('ismemberof', array(
'0' => $message,
'1' => XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon9UserGroup')
)) AND XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon9'))
{
$__compilerVar72 .= '
			<li class="ribbon9">
				<div class="Rleft"></div>
				<div class="Rright"></div>
				' . XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon9Title') . '
			</li>
		';
}
$__compilerVar72 .= '
		
		';
if (XenForo_Template_Helper_Core::callHelper('ismemberof', array(
'0' => $message,
'1' => XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon10UserGroup')
)) AND XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon10'))
{
$__compilerVar72 .= '
			<li class="ribbon10">
				<div class="Rleft"></div>
				<div class="Rright"></div>
				' . XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon10Title') . '
			</li>
		';
}
$__compilerVar72 .= '
		
		';
if (XenForo_Template_Helper_Core::callHelper('ismemberof', array(
'0' => $message,
'1' => XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon11UserGroup')
)) AND XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon11'))
{
$__compilerVar72 .= '
			<li class="ribbon11">
				<div class="Rleft"></div>
				<div class="Rright"></div>
				' . XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon11Title') . '
			</li>
		';
}
$__compilerVar72 .= '
		
		';
if (XenForo_Template_Helper_Core::callHelper('ismemberof', array(
'0' => $message,
'1' => XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon12UserGroup')
)) AND XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon12'))
{
$__compilerVar72 .= '
			<li class="ribbon12">
				<div class="Rleft"></div>
				<div class="Rright"></div>
				' . XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon12Title') . '
			</li>
		';
}
$__compilerVar72 .= '
		
		';
if (XenForo_Template_Helper_Core::callHelper('ismemberof', array(
'0' => $message,
'1' => XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon13UserGroup')
)) AND XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon13'))
{
$__compilerVar72 .= '
			<li class="ribbon13">
				<div class="Rleft"></div>
				<div class="Rright"></div>
				' . XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon13Title') . '
			</li>
		';
}
$__compilerVar72 .= '
		
		';
if (XenForo_Template_Helper_Core::callHelper('ismemberof', array(
'0' => $message,
'1' => XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon14UserGroup')
)) AND XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon14'))
{
$__compilerVar72 .= '
			<li class="ribbon14">
				<div class="Rleft"></div>
				<div class="Rright"></div>
				' . XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon14Title') . '
			</li>
		';
}
$__compilerVar72 .= '
		
		';
if (XenForo_Template_Helper_Core::callHelper('ismemberof', array(
'0' => $message,
'1' => XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon15UserGroup')
)) AND XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon15'))
{
$__compilerVar72 .= '
			<li class="ribbon15">
				<div class="Rleft"></div>
				<div class="Rright"></div>
				' . XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon15Title') . '
			</li>
		';
}
$__compilerVar72 .= '
		
		';
if (XenForo_Template_Helper_Core::callHelper('ismemberof', array(
'0' => $message,
'1' => XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon16UserGroup')
)) AND XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon16'))
{
$__compilerVar72 .= '
			<li class="ribbon16">
				<div class="Rleft"></div>
				<div class="Rright"></div>
				' . XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon16Title') . '
			</li>
		';
}
$__compilerVar72 .= '
		
		';
if (XenForo_Template_Helper_Core::callHelper('ismemberof', array(
'0' => $message,
'1' => XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon17UserGroup')
)) AND XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon17'))
{
$__compilerVar72 .= '
			<li class="ribbon17">
				<div class="Rleft"></div>
				<div class="Rright"></div>
				' . XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon17Title') . '
			</li>
		';
}
$__compilerVar72 .= '
		
		';
if (XenForo_Template_Helper_Core::callHelper('ismemberof', array(
'0' => $message,
'1' => XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon18UserGroup')
)) AND XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon18'))
{
$__compilerVar72 .= '
			<li class="ribbon18">
				<div class="Rleft"></div>
				<div class="Rright"></div>
				' . XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon18Title') . '
			</li>
		';
}
$__compilerVar72 .= '
		
		';
if (XenForo_Template_Helper_Core::callHelper('ismemberof', array(
'0' => $message,
'1' => XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon19UserGroup')
)) AND XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon19'))
{
$__compilerVar72 .= '
			<li class="ribbon19">
				<div class="Rleft"></div>
				<div class="Rright"></div>
				' . XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon19Title') . '
			</li>
		';
}
$__compilerVar72 .= '
		
		';
if (XenForo_Template_Helper_Core::callHelper('ismemberof', array(
'0' => $message,
'1' => XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon20UserGroup')
)) AND XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon20'))
{
$__compilerVar72 .= '
			<li class="ribbon20">
				<div class="Rleft"></div>
				<div class="Rright"></div>
				' . XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon20Title') . '
			</li>
		';
}
$__compilerVar72 .= '
		
		';
if (XenForo_Template_Helper_Core::callHelper('ismemberof', array(
'0' => $message,
'1' => XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon21UserGroup')
)) AND XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon21'))
{
$__compilerVar72 .= '
			<li class="ribbon21">
				<div class="Rleft"></div>
				<div class="Rright"></div>
				' . XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon21Title') . '
			</li>
		';
}
$__compilerVar72 .= '
		
		';
if (XenForo_Template_Helper_Core::callHelper('ismemberof', array(
'0' => $message,
'1' => XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon22UserGroup')
)) AND XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon22'))
{
$__compilerVar72 .= '
			<li class="ribbon22">
				<div class="Rleft"></div>
				<div class="Rright"></div>
				' . XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon22Title') . '
			</li>
		';
}
$__compilerVar72 .= '
		
		';
if (XenForo_Template_Helper_Core::callHelper('ismemberof', array(
'0' => $message,
'1' => XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon23UserGroup')
)) AND XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon23'))
{
$__compilerVar72 .= '
			<li class="ribbon23">
				<div class="Rleft"></div>
				<div class="Rright"></div>
				' . XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon23Title') . '
			</li>
		';
}
$__compilerVar72 .= '
		
		';
if (XenForo_Template_Helper_Core::callHelper('ismemberof', array(
'0' => $message,
'1' => XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon24UserGroup')
)) AND XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon24'))
{
$__compilerVar72 .= '
			<li class="ribbon24">
				<div class="Rleft"></div>
				<div class="Rright"></div>
				' . XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon24Title') . '
			</li>
		';
}
$__compilerVar72 .= '
		
		';
if (XenForo_Template_Helper_Core::callHelper('ismemberof', array(
'0' => $message,
'1' => XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon25UserGroup')
)) AND XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon25'))
{
$__compilerVar72 .= '
			<li class="ribbon25">
				<div class="Rleft"></div>
				<div class="Rright"></div>
				' . XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon25Title') . '
			</li>
		';
}
$__compilerVar72 .= '
		
		';
if (XenForo_Template_Helper_Core::callHelper('ismemberof', array(
'0' => $message,
'1' => XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon26UserGroup')
)) AND XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon26'))
{
$__compilerVar72 .= '
			<li class="ribbon26">
				<div class="Rleft"></div>
				<div class="Rright"></div>
				' . XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon26Title') . '
			</li>
		';
}
$__compilerVar72 .= '
		
		';
if (XenForo_Template_Helper_Core::callHelper('ismemberof', array(
'0' => $message,
'1' => XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon27UserGroup')
)) AND XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon27'))
{
$__compilerVar72 .= '
			<li class="ribbon27">
				<div class="Rleft"></div>
				<div class="Rright"></div>
				' . XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon27Title') . '
			</li>
		';
}
$__compilerVar72 .= '
		
		';
if (XenForo_Template_Helper_Core::callHelper('ismemberof', array(
'0' => $message,
'1' => XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon28UserGroup')
)) AND XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon28'))
{
$__compilerVar72 .= '
			<li class="ribbon28">
				<div class="Rleft"></div>
				<div class="Rright"></div>
				' . XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon28Title') . '
			</li>
		';
}
$__compilerVar72 .= '
		
		';
if (XenForo_Template_Helper_Core::callHelper('ismemberof', array(
'0' => $message,
'1' => XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon29UserGroup')
)) AND XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon29'))
{
$__compilerVar72 .= '
			<li class="ribbon29">
				<div class="Rleft"></div>
				<div class="Rright"></div>
				' . XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon29Title') . '
			</li>
		';
}
$__compilerVar72 .= '
		
		';
if (XenForo_Template_Helper_Core::callHelper('ismemberof', array(
'0' => $message,
'1' => XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon30UserGroup')
)) AND XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon30'))
{
$__compilerVar72 .= '
			<li class="ribbon30">
				<div class="Rleft"></div>
				<div class="Rright"></div>
				' . XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon30Title') . '
			</li>
		';
}
$__compilerVar72 .= '
		
		';
if (XenForo_Template_Helper_Core::callHelper('ismemberof', array(
'0' => $message,
'1' => XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon31UserGroup')
)) AND XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon31'))
{
$__compilerVar72 .= '
			<li class="ribbon31">
				<div class="Rleft"></div>
				<div class="Rright"></div>
				' . XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon31Title') . '
			</li>
		';
}
$__compilerVar72 .= '
		
		';
if (XenForo_Template_Helper_Core::callHelper('ismemberof', array(
'0' => $message,
'1' => XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon32UserGroup')
)) AND XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon32'))
{
$__compilerVar72 .= '
			<li class="ribbon32">
				<div class="Rleft"></div>
				<div class="Rright"></div>
				' . XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon32Title') . '
			</li>
		';
}
$__compilerVar72 .= '
		
		';
if (XenForo_Template_Helper_Core::callHelper('ismemberof', array(
'0' => $message,
'1' => XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon33UserGroup')
)) AND XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon33'))
{
$__compilerVar72 .= '
			<li class="ribbon33">
				<div class="Rleft"></div>
				<div class="Rright"></div>
				' . XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon33Title') . '
			</li>
		';
}
$__compilerVar72 .= '
		
		';
if (XenForo_Template_Helper_Core::callHelper('ismemberof', array(
'0' => $message,
'1' => XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon34UserGroup')
)) AND XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon34'))
{
$__compilerVar72 .= '
			<li class="ribbon34">
				<div class="Rleft"></div>
				<div class="Rright"></div>
				' . XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon34Title') . '
			</li>
		';
}
$__compilerVar72 .= '
		
		';
if (XenForo_Template_Helper_Core::callHelper('ismemberof', array(
'0' => $message,
'1' => XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon35UserGroup')
)) AND XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon35'))
{
$__compilerVar72 .= '
			<li class="ribbon35">
				<div class="Rleft"></div>
				<div class="Rright"></div>
				' . XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon35Title') . '
			</li>
		';
}
$__compilerVar72 .= '
		
	</ul>
';
}
$__compilerVar68 .= $__compilerVar72;
unset($__compilerVar72);
}
$__compilerVar68 .= '
    ';
$__compilerVar73 = '';
$__compilerVar73 .= '
			';
$__compilerVar74 = '';
$__compilerVar74 .= '
				';
if (XenForo_Template_Helper_Core::styleProperty('messageShowRegisterDate') AND $message['user_id'])
{
$__compilerVar74 .= '
					<dl class="pairsJustified">
						<dt>' . 'Tham gia ngày' . ':</dt>
						<dd>' . XenForo_Template_Helper_Core::date($message['register_date'], '') . '</dd>
					</dl>
				';
}
$__compilerVar74 .= '
				
				';
if (XenForo_Template_Helper_Core::styleProperty('messageShowMessageCount') AND $message['user_id'])
{
$__compilerVar74 .= '
					<dl class="pairsJustified">
						<dt>' . 'Bài viết' . ':</dt>
						<dd><a href="' . XenForo_Template_Helper_Core::link('search/member', '', array(
'user_id' => $message['user_id']
)) . '" class="concealed" rel="nofollow">' . XenForo_Template_Helper_Core::numberFormat($message['message_count'], '0') . '</a></dd>
					</dl>
				';
}
$__compilerVar74 .= '
				
				';
if (XenForo_Template_Helper_Core::styleProperty('messageShowTotalLikes') AND $message['user_id'])
{
$__compilerVar74 .= '
					<dl class="pairsJustified">
						<dt>' . 'Đã được thích' . ':</dt>
						<dd>' . XenForo_Template_Helper_Core::numberFormat($message['like_count'], '0') . '</dd>
					</dl>
				';
}
$__compilerVar74 .= '
				
				';
if (XenForo_Template_Helper_Core::styleProperty('messageShowTrophyPoints') AND $message['user_id'])
{
$__compilerVar74 .= '
					<dl class="pairsJustified">
						<dt>' . 'Điểm thành tích' . ':</dt>
						<dd><a href="' . XenForo_Template_Helper_Core::link('members/trophies', $message, array()) . '" class="OverlayTrigger concealed">' . XenForo_Template_Helper_Core::numberFormat($message['trophy_points'], '0') . '</a></dd>
					</dl>
				';
}
$__compilerVar74 .= '
			
				';
if (XenForo_Template_Helper_Core::styleProperty('messageShowGender') AND $message['gender'])
{
$__compilerVar74 .= '
					<dl class="pairsJustified">
						<dt>' . 'Giới tính' . ':</dt>
						<dd itemprop="gender">';
if ($message['gender'] == ('male'))
{
$__compilerVar74 .= 'Nam';
}
else
{
$__compilerVar74 .= 'Nữ';
}
$__compilerVar74 .= '</dd>
					</dl>
				';
}
$__compilerVar74 .= '
				
				';
if (XenForo_Template_Helper_Core::styleProperty('messageShowOccupation') AND $message['occupation'])
{
$__compilerVar74 .= '
					<dl class="pairsJustified">
						<dt>' . 'Nghề nghiệp' . ':</dt>
						<dd itemprop="role">' . XenForo_Template_Helper_Core::string('censor', array(
'0' => htmlspecialchars($message['occupation'], ENT_QUOTES, 'UTF-8')
)) . '</dd>
					</dl>
				';
}
$__compilerVar74 .= '
				
				';
if (XenForo_Template_Helper_Core::styleProperty('messageShowLocation') AND $message['location'])
{
$__compilerVar74 .= '
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
$__compilerVar74 .= '
			
				';
if (XenForo_Template_Helper_Core::styleProperty('messageShowHomepage') AND $message['homepage'])
{
$__compilerVar74 .= '
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
$__compilerVar74 .= '
							
			';
$__compilerVar73 .= $this->callTemplateHook('message_user_info_extra', $__compilerVar74, array(
'user' => $message,
'isQuickReply' => $isQuickReply
));
unset($__compilerVar74);
$__compilerVar73 .= '			
			';
if (XenForo_Template_Helper_Core::styleProperty('messageShowCustomFields') AND $message['customFields'])
{
$__compilerVar73 .= '
			';
$__compilerVar75 = '';
$__compilerVar75 .= '
			
				';
foreach ($userFieldsInfo AS $fieldId => $fieldInfo)
{
$__compilerVar75 .= '
					';
if ($fieldInfo['viewable_message'] AND ($fieldInfo['display_group'] != ('contact') OR $message['allow_view_identities'] == ('everyone') OR ($message['allow_view_identities'] == ('members') AND $visitor['user_id'])))
{
$__compilerVar75 .= '
						';
$__compilerVar76 = '';
$__compilerVar76 .= XenForo_Template_Helper_Core::callHelper('userFieldValue', array(
'0' => $fieldInfo,
'1' => $message,
'2' => $message['customFields'][$fieldId]
));
if (trim($__compilerVar76) !== '')
{
$__compilerVar75 .= '
							<dl class="pairsJustified userField_' . htmlspecialchars($fieldId, ENT_QUOTES, 'UTF-8') . '">
								<dt>' . XenForo_Template_Helper_Core::callHelper('userFieldTitle', array(
'0' => $fieldId
)) . ':</dt>
								<dd>' . $__compilerVar76 . '</dd>
							</dl>
						';
}
unset($__compilerVar76);
$__compilerVar75 .= '
					';
}
$__compilerVar75 .= '
				';
}
$__compilerVar75 .= '
				
			';
$__compilerVar73 .= $this->callTemplateHook('message_user_info_custom_fields', $__compilerVar75, array(
'user' => $message,
'isQuickReply' => $isQuickReply
));
unset($__compilerVar75);
$__compilerVar73 .= '
			';
}
$__compilerVar73 .= '
			';
if (trim($__compilerVar73) !== '')
{
$__compilerVar68 .= '
		<div class="extraUserInfo">
			' . $__compilerVar73 . '
		</div>
	';
}
unset($__compilerVar73);
$__compilerVar68 .= '
		
';
}
$__compilerVar68 .= '

	<span class="arrow"><span></span></span>
</div>
</div>';
$__compilerVar67 .= $__compilerVar68;
unset($__compilerVar68);
$__compilerVar67 .= '

	<div class="messageInfo primaryContent">
		';
if ($message['isNew'])
{
$__compilerVar67 .= '<strong class="newIndicator"><span></span>' . 'Mới' . '</strong>';
}
$__compilerVar67 .= '
		
		';
$__compilerVar77 = '';
$__compilerVar77 .= '
					';
$__compilerVar78 = '';
$__compilerVar78 .= '
						';
if ($message['warning_message'])
{
$__compilerVar78 .= '
							<li class="warningNotice"><span class="icon Tooltip" title="' . 'Warning' . '" data-tipclass="iconTip flipped"></span>' . htmlspecialchars($message['warning_message'], ENT_QUOTES, 'UTF-8') . '</li>
						';
}
$__compilerVar78 .= '
						';
if ($message['isDeleted'])
{
$__compilerVar78 .= '
							<li class="deletedNotice"><span class="icon Tooltip" title="' . 'Bị xóa' . '" data-tipclass="iconTip flipped"></span>' . 'This message has been removed from public view.' . '</li>
						';
}
else if ($message['isModerated'])
{
$__compilerVar78 .= '
							<li class="moderatedNotice"><span class="icon Tooltip" title="' . 'Awaiting moderation' . '" data-tipclass="iconTip flipped"></span>' . 'This message is awaiting moderator approval, and is invisible to normal visitors.' . '</li>
						';
}
$__compilerVar78 .= '
						';
if ($message['isIgnored'])
{
$__compilerVar78 .= '
							<li>' . 'You are ignoring content by this member.' . ' <a href="javascript:" class="JsOnly DisplayIgnoredContent">' . 'Show Ignored Content' . '</a></li>
						';
}
$__compilerVar78 .= '
					';
$__compilerVar77 .= $this->callTemplateHook('message_notices', $__compilerVar78, array(
'message' => $message
));
unset($__compilerVar78);
$__compilerVar77 .= '
				';
if (trim($__compilerVar77) !== '')
{
$__compilerVar67 .= '
			<ul class="messageNotices">
				' . $__compilerVar77 . '
			</ul>
		';
}
unset($__compilerVar77);
$__compilerVar67 .= '
		
		';
$__compilerVar79 = '';
$__compilerVar79 .= '
		<div class="messageContent">		
			<article>
				<blockquote class="messageText SelectQuoteContainer ugc baseHtml' . (($message['isIgnored']) ? (' ignored') : ('')) . '">
					';
$__compilerVar80 = '';
$__compilerVar81 = '';
$__compilerVar80 .= $this->callTemplateHook('ad_message_body', $__compilerVar81, array());
unset($__compilerVar81);
$__compilerVar79 .= $__compilerVar80;
unset($__compilerVar80);
$__compilerVar79 .= '
					' . $message['messageHtml'] . '
					<div class="messageTextEndMarker">&nbsp;</div>
				</blockquote>
			</article>
			
			' . $__compilerVar60 . '
		</div>
		';
$__compilerVar67 .= $this->callTemplateHook('message_content', $__compilerVar79, array(
'message' => $message
));
unset($__compilerVar79);
$__compilerVar67 .= '
		
		';
if ($message['last_edit_date'])
{
$__compilerVar67 .= '
			<div class="editDate">
			';
if ($message['user_id'] == $message['last_edit_user_id'])
{
$__compilerVar67 .= '
				' . 'Chỉnh sửa cuối' . ': ' . XenForo_Template_Helper_Core::callHelper('datetimehtml', array($message['last_edit_date'],array(
'time' => htmlspecialchars($message['last_edit_date'], ENT_QUOTES, 'UTF-8')
))) . '
			';
}
else
{
$__compilerVar67 .= '
				' . 'Last edited by a moderator' . ': ' . XenForo_Template_Helper_Core::callHelper('datetimehtml', array($message['last_edit_date'],array(
'time' => htmlspecialchars($message['last_edit_date'], ENT_QUOTES, 'UTF-8')
))) . '
			';
}
$__compilerVar67 .= '
			</div>
		';
}
$__compilerVar67 .= '
		
		';
if ($visitor['content_show_signature'] && $message['signature'])
{
$__compilerVar67 .= '
			<div class="baseHtml signature messageText ugc' . (($message['isIgnored']) ? (' ignored') : ('')) . '"><aside>' . $message['signatureHtml'] . '</aside></div>
		';
}
$__compilerVar67 .= '
		
		' . $__compilerVar63 . '
		
		';
$__compilerVar82 = '';
$__compilerVar67 .= $this->callTemplateHook('dark_postrating_likes_bar', $__compilerVar82, array(
'post' => $message,
'message_id' => $__compilerVar59
));
unset($__compilerVar82);
$__compilerVar67 .= '
	</div>

	';
$__compilerVar83 = '';
$__compilerVar67 .= $this->callTemplateHook('message_below', $__compilerVar83, array(
'post' => $message,
'message_id' => $__compilerVar59
));
unset($__compilerVar83);
$__compilerVar67 .= '
	
	';
$__compilerVar84 = '';
$__compilerVar85 = '';
$__compilerVar84 .= $this->callTemplateHook('ad_message_below', $__compilerVar85, array());
unset($__compilerVar85);
$__compilerVar67 .= $__compilerVar84;
unset($__compilerVar84);
$__compilerVar67 .= '
';
$__compilerVar86 = '';
$__compilerVar67 .= $this->callTemplateCallback('DigitalPointAdPositioning_Callback_AdBelowPost', 'renderAd', $__compilerVar86, array(
'dp_ads' => $dp_ads
));
unset($__compilerVar86);
$__compilerVar67 .= '
</li>';
$__compilerVar58 .= $__compilerVar67;
unset($__compilerVar59, $__compilerVar60, $__compilerVar63, $__compilerVar67);
$__output .= $__compilerVar58;
unset($__compilerVar58);
$__output .= '
	';
}
$__output .= '
</ol>

';
$__compilerVar87 = '';
$__compilerVar87 .= '
			' . XenForo_Template_Helper_Core::callHelper('pagenavhtml', array('public', htmlspecialchars($messagesPerPage, ENT_QUOTES, 'UTF-8'), htmlspecialchars($totalMessages, ENT_QUOTES, 'UTF-8'), htmlspecialchars($page, ENT_QUOTES, 'UTF-8'), 'conversations', $conversation, array(), false, array())) . '
		';
if (trim($__compilerVar87) !== '')
{
$__output .= '
	<div class="pageNavLinkGroup">
		' . $__compilerVar87 . '
	</div>
';
}
unset($__compilerVar87);
$__output .= '

';
if ($canReplyConversation)
{
$__output .= '
	';
$__compilerVar88 = '';
$__compilerVar88 .= XenForo_Template_Helper_Core::link('conversations/insert-reply', $conversation, array());
$__compilerVar89 = '';
$__compilerVar89 .= htmlspecialchars($lastMessage['message_date'], ENT_QUOTES, 'UTF-8');
$__compilerVar90 = '';
$__compilerVar90 .= '1';
$__compilerVar91 = '';
$this->addRequiredExternal('css', 'quick_reply');
$__compilerVar91 .= '
';
$this->addRequiredExternal('js', 'js/xenforo/discussion.js');
$__compilerVar91 .= '

<div class="quickReply message">
	
	';
$__compilerVar92 = '';
$__compilerVar92 .= '1';
$__compilerVar93 = '';
$this->addRequiredExternal('css', 'message_user_info');
$__compilerVar93 .= '

<div class="messageUserInfo" itemscope="itemscope" itemtype="http://data-vocabulary.org/Person">	
<div class="messageUserBlock ' . (($visitor['isOnline']) ? ('online') : ('')) . '">
	';
$__compilerVar94 = '';
$__compilerVar94 .= '
		<div class="avatarHolder">
			<span class="helper"></span>
			' . XenForo_Template_Helper_Core::callHelper('avatarhtml', array($visitor,(true),array(
'user' => '$user',
'size' => 'm',
'img' => 'true'
),'')) . '
			';
if ($visitor['isOnline'])
{
$__compilerVar94 .= '<span class="Tooltip onlineMarker" title="' . 'Online Now' . '" data-offsetX="-22" data-offsetY="-8"></span>';
}
$__compilerVar94 .= '
			<!-- slot: message_user_info_avatar -->
		</div>
	';
$__compilerVar93 .= $this->callTemplateHook('message_user_info_avatar', $__compilerVar94, array(
'user' => $visitor,
'isQuickReply' => $__compilerVar92
));
unset($__compilerVar94);
$__compilerVar93 .= '

';
if (!$__compilerVar92)
{
$__compilerVar93 .= '
	';
$__compilerVar95 = '';
$__compilerVar95 .= '
		<h3 class="userText">
			' . XenForo_Template_Helper_Core::callHelper('usernamehtml', array($visitor,'',(true),array(
'itemprop' => 'name'
))) . '
			';
$__compilerVar96 = '';
$__compilerVar96 .= XenForo_Template_Helper_Core::callHelper('userTitle', array(
'0' => $visitor,
'1' => '1',
'2' => '1'
));
if (trim($__compilerVar96) !== '')
{
$__compilerVar95 .= '<em class="userTitle" itemprop="title">' . $__compilerVar96 . '</em>';
}
unset($__compilerVar96);
$__compilerVar95 .= '
			' . XenForo_Template_Helper_Core::callHelper('userBanner', array(
'0' => $visitor,
'1' => 'wrapped'
)) . '
			<!-- slot: message_user_info_text -->
		</h3>
	';
$__compilerVar93 .= $this->callTemplateHook('message_user_info_text', $__compilerVar95, array(
'user' => $visitor,
'isQuickReply' => $__compilerVar92
));
unset($__compilerVar95);
$__compilerVar93 .= '
		
	';
if (XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsActive'))
{
$__compilerVar97 = '';
$__compilerVar97 .= '
';
if (!XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsBadgeCSS'))
{
$__compilerVar97 .= '
    ';
$this->addRequiredExternal('css', 'userrankribbons');
$__compilerVar97 .= '
';
}
$__compilerVar97 .= '

';
if (XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsBadgeCSS'))
{
$__compilerVar97 .= '
    ';
$this->addRequiredExternal('css', 'userrankribbonsbadge');
$__compilerVar97 .= '
';
}
$__compilerVar97 .= '

';
if (XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsSoftResponsiveFix'))
{
$__compilerVar97 .= '
    ';
$this->addRequiredExternal('css', 'UserRankRibbonsSoftResponsiveFix');
$__compilerVar97 .= '
';
}
$__compilerVar97 .= '

';
if (XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsXenMoodsFix'))
{
$__compilerVar97 .= '
    ';
$this->addRequiredExternal('css', 'UserRankRibbonsXenMoodsFix');
$__compilerVar97 .= '
';
}
$__compilerVar97 .= '
    
';
if (XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsActive'))
{
$__compilerVar97 .= '

	<ul class="ribbon">
    
		';
if (XenForo_Template_Helper_Core::callHelper('ismemberof', array(
'0' => $visitor,
'1' => XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon1UserGroup')
)) AND XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon1'))
{
$__compilerVar97 .= '
			<li class="ribbon1">
				<div class="Rleft"></div>
				<div class="Rright"></div>
				' . XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon1Title') . '
			</li>
		';
}
$__compilerVar97 .= '
		
		';
if (XenForo_Template_Helper_Core::callHelper('ismemberof', array(
'0' => $visitor,
'1' => XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon2UserGroup')
)) AND XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon2'))
{
$__compilerVar97 .= '
			<li class="ribbon2">
				<div class="Rleft"></div>
				<div class="Rright"></div>
				' . XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon2Title') . '
			</li>
		';
}
$__compilerVar97 .= '
		
		';
if (XenForo_Template_Helper_Core::callHelper('ismemberof', array(
'0' => $visitor,
'1' => XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon3UserGroup')
)) AND XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon3'))
{
$__compilerVar97 .= '
			<li class="ribbon3">
				<div class="Rleft"></div>
				<div class="Rright"></div>
				' . XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon3Title') . '
			</li>
		';
}
$__compilerVar97 .= '
		
		';
if (XenForo_Template_Helper_Core::callHelper('ismemberof', array(
'0' => $visitor,
'1' => XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon4UserGroup')
)) AND XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon4'))
{
$__compilerVar97 .= '
			<li class="ribbon4">
				<div class="Rleft"></div>
				<div class="Rright"></div>
				' . XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon4Title') . '
			</li>
		';
}
$__compilerVar97 .= '
		
		';
if (XenForo_Template_Helper_Core::callHelper('ismemberof', array(
'0' => $visitor,
'1' => XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon5UserGroup')
)) AND XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon5'))
{
$__compilerVar97 .= '
			<li class="ribbon5">
				<div class="Rleft"></div>
				<div class="Rright"></div>
				' . XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon5Title') . '
			</li>
		';
}
$__compilerVar97 .= '
		
		';
if (XenForo_Template_Helper_Core::callHelper('ismemberof', array(
'0' => $visitor,
'1' => XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon6UserGroup')
)) AND XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon6'))
{
$__compilerVar97 .= '
			<li class="ribbon6">
				<div class="Rleft"></div>
				<div class="Rright"></div>
				' . XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon6Title') . '
			</li>
		';
}
$__compilerVar97 .= '
		
		';
if (XenForo_Template_Helper_Core::callHelper('ismemberof', array(
'0' => $visitor,
'1' => XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon7UserGroup')
)) AND XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon7'))
{
$__compilerVar97 .= '
			<li class="ribbon7">
				<div class="Rleft"></div>
				<div class="Rright"></div>
				' . XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon7Title') . '
			</li>
		';
}
$__compilerVar97 .= '
		
		';
if (XenForo_Template_Helper_Core::callHelper('ismemberof', array(
'0' => $visitor,
'1' => XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon8UserGroup')
)) AND XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon8'))
{
$__compilerVar97 .= '
			<li class="ribbon8">
				<div class="Rleft"></div>
				<div class="Rright"></div>
				' . XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon8Title') . '
			</li>
		';
}
$__compilerVar97 .= '
		
		';
if (XenForo_Template_Helper_Core::callHelper('ismemberof', array(
'0' => $visitor,
'1' => XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon9UserGroup')
)) AND XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon9'))
{
$__compilerVar97 .= '
			<li class="ribbon9">
				<div class="Rleft"></div>
				<div class="Rright"></div>
				' . XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon9Title') . '
			</li>
		';
}
$__compilerVar97 .= '
		
		';
if (XenForo_Template_Helper_Core::callHelper('ismemberof', array(
'0' => $visitor,
'1' => XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon10UserGroup')
)) AND XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon10'))
{
$__compilerVar97 .= '
			<li class="ribbon10">
				<div class="Rleft"></div>
				<div class="Rright"></div>
				' . XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon10Title') . '
			</li>
		';
}
$__compilerVar97 .= '
		
		';
if (XenForo_Template_Helper_Core::callHelper('ismemberof', array(
'0' => $visitor,
'1' => XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon11UserGroup')
)) AND XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon11'))
{
$__compilerVar97 .= '
			<li class="ribbon11">
				<div class="Rleft"></div>
				<div class="Rright"></div>
				' . XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon11Title') . '
			</li>
		';
}
$__compilerVar97 .= '
		
		';
if (XenForo_Template_Helper_Core::callHelper('ismemberof', array(
'0' => $visitor,
'1' => XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon12UserGroup')
)) AND XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon12'))
{
$__compilerVar97 .= '
			<li class="ribbon12">
				<div class="Rleft"></div>
				<div class="Rright"></div>
				' . XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon12Title') . '
			</li>
		';
}
$__compilerVar97 .= '
		
		';
if (XenForo_Template_Helper_Core::callHelper('ismemberof', array(
'0' => $visitor,
'1' => XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon13UserGroup')
)) AND XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon13'))
{
$__compilerVar97 .= '
			<li class="ribbon13">
				<div class="Rleft"></div>
				<div class="Rright"></div>
				' . XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon13Title') . '
			</li>
		';
}
$__compilerVar97 .= '
		
		';
if (XenForo_Template_Helper_Core::callHelper('ismemberof', array(
'0' => $visitor,
'1' => XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon14UserGroup')
)) AND XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon14'))
{
$__compilerVar97 .= '
			<li class="ribbon14">
				<div class="Rleft"></div>
				<div class="Rright"></div>
				' . XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon14Title') . '
			</li>
		';
}
$__compilerVar97 .= '
		
		';
if (XenForo_Template_Helper_Core::callHelper('ismemberof', array(
'0' => $visitor,
'1' => XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon15UserGroup')
)) AND XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon15'))
{
$__compilerVar97 .= '
			<li class="ribbon15">
				<div class="Rleft"></div>
				<div class="Rright"></div>
				' . XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon15Title') . '
			</li>
		';
}
$__compilerVar97 .= '
		
		';
if (XenForo_Template_Helper_Core::callHelper('ismemberof', array(
'0' => $visitor,
'1' => XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon16UserGroup')
)) AND XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon16'))
{
$__compilerVar97 .= '
			<li class="ribbon16">
				<div class="Rleft"></div>
				<div class="Rright"></div>
				' . XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon16Title') . '
			</li>
		';
}
$__compilerVar97 .= '
		
		';
if (XenForo_Template_Helper_Core::callHelper('ismemberof', array(
'0' => $visitor,
'1' => XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon17UserGroup')
)) AND XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon17'))
{
$__compilerVar97 .= '
			<li class="ribbon17">
				<div class="Rleft"></div>
				<div class="Rright"></div>
				' . XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon17Title') . '
			</li>
		';
}
$__compilerVar97 .= '
		
		';
if (XenForo_Template_Helper_Core::callHelper('ismemberof', array(
'0' => $visitor,
'1' => XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon18UserGroup')
)) AND XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon18'))
{
$__compilerVar97 .= '
			<li class="ribbon18">
				<div class="Rleft"></div>
				<div class="Rright"></div>
				' . XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon18Title') . '
			</li>
		';
}
$__compilerVar97 .= '
		
		';
if (XenForo_Template_Helper_Core::callHelper('ismemberof', array(
'0' => $visitor,
'1' => XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon19UserGroup')
)) AND XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon19'))
{
$__compilerVar97 .= '
			<li class="ribbon19">
				<div class="Rleft"></div>
				<div class="Rright"></div>
				' . XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon19Title') . '
			</li>
		';
}
$__compilerVar97 .= '
		
		';
if (XenForo_Template_Helper_Core::callHelper('ismemberof', array(
'0' => $visitor,
'1' => XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon20UserGroup')
)) AND XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon20'))
{
$__compilerVar97 .= '
			<li class="ribbon20">
				<div class="Rleft"></div>
				<div class="Rright"></div>
				' . XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon20Title') . '
			</li>
		';
}
$__compilerVar97 .= '
		
		';
if (XenForo_Template_Helper_Core::callHelper('ismemberof', array(
'0' => $visitor,
'1' => XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon21UserGroup')
)) AND XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon21'))
{
$__compilerVar97 .= '
			<li class="ribbon21">
				<div class="Rleft"></div>
				<div class="Rright"></div>
				' . XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon21Title') . '
			</li>
		';
}
$__compilerVar97 .= '
		
		';
if (XenForo_Template_Helper_Core::callHelper('ismemberof', array(
'0' => $visitor,
'1' => XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon22UserGroup')
)) AND XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon22'))
{
$__compilerVar97 .= '
			<li class="ribbon22">
				<div class="Rleft"></div>
				<div class="Rright"></div>
				' . XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon22Title') . '
			</li>
		';
}
$__compilerVar97 .= '
		
		';
if (XenForo_Template_Helper_Core::callHelper('ismemberof', array(
'0' => $visitor,
'1' => XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon23UserGroup')
)) AND XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon23'))
{
$__compilerVar97 .= '
			<li class="ribbon23">
				<div class="Rleft"></div>
				<div class="Rright"></div>
				' . XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon23Title') . '
			</li>
		';
}
$__compilerVar97 .= '
		
		';
if (XenForo_Template_Helper_Core::callHelper('ismemberof', array(
'0' => $visitor,
'1' => XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon24UserGroup')
)) AND XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon24'))
{
$__compilerVar97 .= '
			<li class="ribbon24">
				<div class="Rleft"></div>
				<div class="Rright"></div>
				' . XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon24Title') . '
			</li>
		';
}
$__compilerVar97 .= '
		
		';
if (XenForo_Template_Helper_Core::callHelper('ismemberof', array(
'0' => $visitor,
'1' => XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon25UserGroup')
)) AND XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon25'))
{
$__compilerVar97 .= '
			<li class="ribbon25">
				<div class="Rleft"></div>
				<div class="Rright"></div>
				' . XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon25Title') . '
			</li>
		';
}
$__compilerVar97 .= '
		
		';
if (XenForo_Template_Helper_Core::callHelper('ismemberof', array(
'0' => $visitor,
'1' => XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon26UserGroup')
)) AND XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon26'))
{
$__compilerVar97 .= '
			<li class="ribbon26">
				<div class="Rleft"></div>
				<div class="Rright"></div>
				' . XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon26Title') . '
			</li>
		';
}
$__compilerVar97 .= '
		
		';
if (XenForo_Template_Helper_Core::callHelper('ismemberof', array(
'0' => $visitor,
'1' => XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon27UserGroup')
)) AND XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon27'))
{
$__compilerVar97 .= '
			<li class="ribbon27">
				<div class="Rleft"></div>
				<div class="Rright"></div>
				' . XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon27Title') . '
			</li>
		';
}
$__compilerVar97 .= '
		
		';
if (XenForo_Template_Helper_Core::callHelper('ismemberof', array(
'0' => $visitor,
'1' => XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon28UserGroup')
)) AND XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon28'))
{
$__compilerVar97 .= '
			<li class="ribbon28">
				<div class="Rleft"></div>
				<div class="Rright"></div>
				' . XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon28Title') . '
			</li>
		';
}
$__compilerVar97 .= '
		
		';
if (XenForo_Template_Helper_Core::callHelper('ismemberof', array(
'0' => $visitor,
'1' => XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon29UserGroup')
)) AND XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon29'))
{
$__compilerVar97 .= '
			<li class="ribbon29">
				<div class="Rleft"></div>
				<div class="Rright"></div>
				' . XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon29Title') . '
			</li>
		';
}
$__compilerVar97 .= '
		
		';
if (XenForo_Template_Helper_Core::callHelper('ismemberof', array(
'0' => $visitor,
'1' => XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon30UserGroup')
)) AND XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon30'))
{
$__compilerVar97 .= '
			<li class="ribbon30">
				<div class="Rleft"></div>
				<div class="Rright"></div>
				' . XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon30Title') . '
			</li>
		';
}
$__compilerVar97 .= '
		
		';
if (XenForo_Template_Helper_Core::callHelper('ismemberof', array(
'0' => $visitor,
'1' => XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon31UserGroup')
)) AND XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon31'))
{
$__compilerVar97 .= '
			<li class="ribbon31">
				<div class="Rleft"></div>
				<div class="Rright"></div>
				' . XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon31Title') . '
			</li>
		';
}
$__compilerVar97 .= '
		
		';
if (XenForo_Template_Helper_Core::callHelper('ismemberof', array(
'0' => $visitor,
'1' => XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon32UserGroup')
)) AND XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon32'))
{
$__compilerVar97 .= '
			<li class="ribbon32">
				<div class="Rleft"></div>
				<div class="Rright"></div>
				' . XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon32Title') . '
			</li>
		';
}
$__compilerVar97 .= '
		
		';
if (XenForo_Template_Helper_Core::callHelper('ismemberof', array(
'0' => $visitor,
'1' => XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon33UserGroup')
)) AND XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon33'))
{
$__compilerVar97 .= '
			<li class="ribbon33">
				<div class="Rleft"></div>
				<div class="Rright"></div>
				' . XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon33Title') . '
			</li>
		';
}
$__compilerVar97 .= '
		
		';
if (XenForo_Template_Helper_Core::callHelper('ismemberof', array(
'0' => $visitor,
'1' => XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon34UserGroup')
)) AND XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon34'))
{
$__compilerVar97 .= '
			<li class="ribbon34">
				<div class="Rleft"></div>
				<div class="Rright"></div>
				' . XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon34Title') . '
			</li>
		';
}
$__compilerVar97 .= '
		
		';
if (XenForo_Template_Helper_Core::callHelper('ismemberof', array(
'0' => $visitor,
'1' => XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon35UserGroup')
)) AND XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon35'))
{
$__compilerVar97 .= '
			<li class="ribbon35">
				<div class="Rleft"></div>
				<div class="Rright"></div>
				' . XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon35Title') . '
			</li>
		';
}
$__compilerVar97 .= '
		
	</ul>
';
}
$__compilerVar93 .= $__compilerVar97;
unset($__compilerVar97);
}
$__compilerVar93 .= '
    ';
$__compilerVar98 = '';
$__compilerVar98 .= '
			';
$__compilerVar99 = '';
$__compilerVar99 .= '
				';
if (XenForo_Template_Helper_Core::styleProperty('messageShowRegisterDate') AND $visitor['user_id'])
{
$__compilerVar99 .= '
					<dl class="pairsJustified">
						<dt>' . 'Tham gia ngày' . ':</dt>
						<dd>' . XenForo_Template_Helper_Core::date($visitor['register_date'], '') . '</dd>
					</dl>
				';
}
$__compilerVar99 .= '
				
				';
if (XenForo_Template_Helper_Core::styleProperty('messageShowMessageCount') AND $visitor['user_id'])
{
$__compilerVar99 .= '
					<dl class="pairsJustified">
						<dt>' . 'Bài viết' . ':</dt>
						<dd><a href="' . XenForo_Template_Helper_Core::link('search/member', '', array(
'user_id' => $visitor['user_id']
)) . '" class="concealed" rel="nofollow">' . XenForo_Template_Helper_Core::numberFormat($visitor['message_count'], '0') . '</a></dd>
					</dl>
				';
}
$__compilerVar99 .= '
				
				';
if (XenForo_Template_Helper_Core::styleProperty('messageShowTotalLikes') AND $visitor['user_id'])
{
$__compilerVar99 .= '
					<dl class="pairsJustified">
						<dt>' . 'Đã được thích' . ':</dt>
						<dd>' . XenForo_Template_Helper_Core::numberFormat($visitor['like_count'], '0') . '</dd>
					</dl>
				';
}
$__compilerVar99 .= '
				
				';
if (XenForo_Template_Helper_Core::styleProperty('messageShowTrophyPoints') AND $visitor['user_id'])
{
$__compilerVar99 .= '
					<dl class="pairsJustified">
						<dt>' . 'Điểm thành tích' . ':</dt>
						<dd><a href="' . XenForo_Template_Helper_Core::link('members/trophies', $visitor, array()) . '" class="OverlayTrigger concealed">' . XenForo_Template_Helper_Core::numberFormat($visitor['trophy_points'], '0') . '</a></dd>
					</dl>
				';
}
$__compilerVar99 .= '
			
				';
if (XenForo_Template_Helper_Core::styleProperty('messageShowGender') AND $visitor['gender'])
{
$__compilerVar99 .= '
					<dl class="pairsJustified">
						<dt>' . 'Giới tính' . ':</dt>
						<dd itemprop="gender">';
if ($visitor['gender'] == ('male'))
{
$__compilerVar99 .= 'Nam';
}
else
{
$__compilerVar99 .= 'Nữ';
}
$__compilerVar99 .= '</dd>
					</dl>
				';
}
$__compilerVar99 .= '
				
				';
if (XenForo_Template_Helper_Core::styleProperty('messageShowOccupation') AND $visitor['occupation'])
{
$__compilerVar99 .= '
					<dl class="pairsJustified">
						<dt>' . 'Nghề nghiệp' . ':</dt>
						<dd itemprop="role">' . XenForo_Template_Helper_Core::string('censor', array(
'0' => htmlspecialchars($visitor['occupation'], ENT_QUOTES, 'UTF-8')
)) . '</dd>
					</dl>
				';
}
$__compilerVar99 .= '
				
				';
if (XenForo_Template_Helper_Core::styleProperty('messageShowLocation') AND $visitor['location'])
{
$__compilerVar99 .= '
					<dl class="pairsJustified">
						<dt>' . 'Nơi ở' . ':</dt>
						<dd><a href="' . XenForo_Template_Helper_Core::link('misc/location-info', '', array(
'location' => XenForo_Template_Helper_Core::string('censor', array(
'0' => $visitor['location'],
'1' => '-'
))
)) . '" target="_blank" rel="nofollow" itemprop="address" class="concealed">' . XenForo_Template_Helper_Core::string('censor', array(
'0' => htmlspecialchars($visitor['location'], ENT_QUOTES, 'UTF-8')
)) . '</a></dd>
					</dl>
				';
}
$__compilerVar99 .= '
			
				';
if (XenForo_Template_Helper_Core::styleProperty('messageShowHomepage') AND $visitor['homepage'])
{
$__compilerVar99 .= '
					<dl class="pairsJustified">
						<dt>' . 'Web' . ':</dt>
						<dd><a href="' . XenForo_Template_Helper_Core::string('censor', array(
'0' => htmlspecialchars($visitor['homepage'], ENT_QUOTES, 'UTF-8'),
'1' => '-'
)) . '" rel="nofollow" target="_blank" itemprop="url">' . XenForo_Template_Helper_Core::string('censor', array(
'0' => htmlspecialchars($visitor['homepage'], ENT_QUOTES, 'UTF-8')
)) . '</a></dd>
					</dl>
				';
}
$__compilerVar99 .= '
							
			';
$__compilerVar98 .= $this->callTemplateHook('message_user_info_extra', $__compilerVar99, array(
'user' => $visitor,
'isQuickReply' => $__compilerVar92
));
unset($__compilerVar99);
$__compilerVar98 .= '			
			';
if (XenForo_Template_Helper_Core::styleProperty('messageShowCustomFields') AND $visitor['customFields'])
{
$__compilerVar98 .= '
			';
$__compilerVar100 = '';
$__compilerVar100 .= '
			
				';
foreach ($userFieldsInfo AS $fieldId => $fieldInfo)
{
$__compilerVar100 .= '
					';
if ($fieldInfo['viewable_message'] AND ($fieldInfo['display_group'] != ('contact') OR $visitor['allow_view_identities'] == ('everyone') OR ($visitor['allow_view_identities'] == ('members') AND $visitor['user_id'])))
{
$__compilerVar100 .= '
						';
$__compilerVar101 = '';
$__compilerVar101 .= XenForo_Template_Helper_Core::callHelper('userFieldValue', array(
'0' => $fieldInfo,
'1' => $visitor,
'2' => $visitor['customFields'][$fieldId]
));
if (trim($__compilerVar101) !== '')
{
$__compilerVar100 .= '
							<dl class="pairsJustified userField_' . htmlspecialchars($fieldId, ENT_QUOTES, 'UTF-8') . '">
								<dt>' . XenForo_Template_Helper_Core::callHelper('userFieldTitle', array(
'0' => $fieldId
)) . ':</dt>
								<dd>' . $__compilerVar101 . '</dd>
							</dl>
						';
}
unset($__compilerVar101);
$__compilerVar100 .= '
					';
}
$__compilerVar100 .= '
				';
}
$__compilerVar100 .= '
				
			';
$__compilerVar98 .= $this->callTemplateHook('message_user_info_custom_fields', $__compilerVar100, array(
'user' => $visitor,
'isQuickReply' => $__compilerVar92
));
unset($__compilerVar100);
$__compilerVar98 .= '
			';
}
$__compilerVar98 .= '
			';
if (trim($__compilerVar98) !== '')
{
$__compilerVar93 .= '
		<div class="extraUserInfo">
			' . $__compilerVar98 . '
		</div>
	';
}
unset($__compilerVar98);
$__compilerVar93 .= '
		
';
}
$__compilerVar93 .= '

	<span class="arrow"><span></span></span>
</div>
</div>';
$__compilerVar91 .= $__compilerVar93;
unset($__compilerVar92, $__compilerVar93);
$__compilerVar91 .= '

	<form action="' . htmlspecialchars($__compilerVar88, ENT_QUOTES, 'UTF-8', (false)) . '" method="post" class="AutoValidator blendedEditor" data-optInOut="OptIn" id="QuickReply">

		' . $qrEditor . '<div class="floatLeft">';
$__compilerVar102 = '';
if ($captcha)
{
$__compilerVar102 .= '
	<dl class="ctrlUnit">
		<dt>' . 'Mã xác nhận' . ':</dt>
		<dd>' . $captcha . '</dd>
	</dl>
';
}
$__compilerVar91 .= $__compilerVar102;
unset($__compilerVar102);
$__compilerVar91 .= '</div>

		<div class="submitUnit">
			<div class="draftUpdate">
				<span class="draftSaved">' . 'Bản thảo đã lưu' . '</span>
				<span class="draftDeleted">' . 'Bản thảo đã xóa' . '</span>
			</div>
			';
if ($xenOptions['multiQuote'] AND $multiQuoteAction)
{
$__compilerVar91 .= '<input type="button" class="button JsOnly MultiQuoteWatcher insertQuotes" id="MultiQuote"
				value="' . 'Insert Quotes' . '..."
				tabindex="1"
				data-href="' . htmlspecialchars($multiQuoteAction, ENT_QUOTES, 'UTF-8', (false)) . '"
				' . (($multiQuoteCookie) ? ('data-mq-cookie="' . htmlspecialchars($multiQuoteCookie, ENT_QUOTES, 'UTF-8') . '"') : ('')) . '
				data-add="' . '+ Quote' . '"
				data-add-message="' . 'Message added to multi-quote.' . '"
				data-remove="' . '− Quote' . '"
				data-remove-message="' . 'Message removed from multi-quote.' . '"
				data-cacheOverlay="false" />';
}
$__compilerVar91 .= '
			<input type="submit" class="button primary" value="' . 'Gửi trả lời' . '" accesskey="s" />
			';
$__compilerVar103 = '';
if ($attachmentParams)
{
$__compilerVar103 .= '

	';
$this->addRequiredExternal('js', 'js/xenforo/attachment_editor.js');
$__compilerVar103 .= '
	';
if ($xenOptions['swfUpload'] AND $visitor['enable_flash_uploader'])
{
$__compilerVar103 .= '
		';
$this->addRequiredExternal('js', 'js/swfupload/swfupload.min.js');
$__compilerVar103 .= '
	';
}
$__compilerVar103 .= '	
	';
$this->addRequiredExternal('css', 'attachment_editor');
$__compilerVar103 .= '

	<span id="AttachmentUploader" class="buttonProxy AttachmentUploader"
		style="display: none"
		data-placeholder="#SWFUploadPlaceHolder"
		data-trigger="#ctrl_uploader"
		data-postname="upload"
		data-maxfilesize="' . htmlspecialchars($attachmentConstraints['size'], ENT_QUOTES, 'UTF-8') . '"
		data-maxuploads="' . htmlspecialchars($attachmentConstraints['count'], ENT_QUOTES, 'UTF-8') . '"
		data-extensions="' . XenForo_Template_Helper_Core::callHelper('implode', array(
'0' => $attachmentConstraints['extensions'],
'1' => ','
)) . '"
		data-action="' . XenForo_Template_Helper_Core::link('full:attachments/do-upload.json', '', array(
'hash' => $attachmentParams['hash'],
'content_type' => $attachmentParams['content_type'],
'key' => $attachmentButtonKey
)) . '"
		data-uniquekey="' . htmlspecialchars($attachmentButtonKey, ENT_QUOTES, 'UTF-8') . '"
		data-err-110="' . 'File đã tải lên lớn hơn so với quy định.' . '"
		data-err-120="' . 'The uploaded file is empty.' . '"
		data-err-130="' . 'The uploaded file does not have an allowed extension.' . '"
		data-err-unknown="' . 'There was a problem uploading your file.' . '">
		
		<span id="SWFUploadPlaceHolder"></span>		
			
		<input type="button" value="' . (($buttonText) ? ($buttonText) : ('Tải lên file đính kèm')) . '"
			id="ctrl_uploader" class="button OverlayTrigger DisableOnSubmit"
			data-href="' . XenForo_Template_Helper_Core::link('full:attachments/upload', '', array(
'_params' => $attachmentParams,
'key' => $attachmentButtonKey
)) . '"
			data-hider="#AttachmentUploader" />
		<span class="HiddenInput" data-name="_xfSessionId" data-value="' . htmlspecialchars($sessionId, ENT_QUOTES, 'UTF-8') . '"></span>
		';
foreach ($attachmentParams['content_data'] AS $dataKey => $dataValue)
{
$__compilerVar103 .= '<span class="HiddenInput" data-name="content_data[' . htmlspecialchars($dataKey, ENT_QUOTES, 'UTF-8') . ']" data-value="' . htmlspecialchars($dataValue, ENT_QUOTES, 'UTF-8') . '"></span>
		';
}
$__compilerVar103 .= '
	</span>

	<noscript>
		<a href="' . XenForo_Template_Helper_Core::link('attachments/upload', '', array(
'_params' => $attachmentParams
)) . '" class="button" target="_blank">' . (($buttonText) ? ($buttonText) : ('Tải lên file đính kèm')) . '</a>
	</noscript>

';
}
$__compilerVar91 .= $__compilerVar103;
unset($__compilerVar103);
$__compilerVar91 .= '
			';
if ($__compilerVar90)
{
$__compilerVar91 .= '<input type="submit" class="button DisableOnSubmit" value="' . 'Thêm tùy chọn' . '..." name="more_options" />';
}
$__compilerVar91 .= '
		</div>
		
		';
if ($attachmentParams)
{
$__compilerVar91 .= '
			';
$__compilerVar104 = $attachmentParams['attachments'];
$__compilerVar105 = '';
if ($attachmentParams)
{
$__compilerVar105 .= '

	';
$this->addRequiredExternal('js', 'js/xenforo/attachment_editor.js');
$__compilerVar105 .= '
	';
$this->addRequiredExternal('css', 'attachment_editor');
$__compilerVar105 .= '
	
	<div class="AttachmentEditor">
	
		';
if ($showUploadButton)
{
$__compilerVar105 .= '
			';
$__compilerVar106 = '';
if ($attachmentParams)
{
$__compilerVar106 .= '

	';
$this->addRequiredExternal('js', 'js/xenforo/attachment_editor.js');
$__compilerVar106 .= '
	';
if ($xenOptions['swfUpload'] AND $visitor['enable_flash_uploader'])
{
$__compilerVar106 .= '
		';
$this->addRequiredExternal('js', 'js/swfupload/swfupload.min.js');
$__compilerVar106 .= '
	';
}
$__compilerVar106 .= '	
	';
$this->addRequiredExternal('css', 'attachment_editor');
$__compilerVar106 .= '

	<span id="AttachmentUploader" class="buttonProxy AttachmentUploader"
		style="display: none"
		data-placeholder="#SWFUploadPlaceHolder"
		data-trigger="#ctrl_uploader"
		data-postname="upload"
		data-maxfilesize="' . htmlspecialchars($attachmentConstraints['size'], ENT_QUOTES, 'UTF-8') . '"
		data-maxuploads="' . htmlspecialchars($attachmentConstraints['count'], ENT_QUOTES, 'UTF-8') . '"
		data-extensions="' . XenForo_Template_Helper_Core::callHelper('implode', array(
'0' => $attachmentConstraints['extensions'],
'1' => ','
)) . '"
		data-action="' . XenForo_Template_Helper_Core::link('full:attachments/do-upload.json', '', array(
'hash' => $attachmentParams['hash'],
'content_type' => $attachmentParams['content_type'],
'key' => $attachmentButtonKey
)) . '"
		data-uniquekey="' . htmlspecialchars($attachmentButtonKey, ENT_QUOTES, 'UTF-8') . '"
		data-err-110="' . 'File đã tải lên lớn hơn so với quy định.' . '"
		data-err-120="' . 'The uploaded file is empty.' . '"
		data-err-130="' . 'The uploaded file does not have an allowed extension.' . '"
		data-err-unknown="' . 'There was a problem uploading your file.' . '">
		
		<span id="SWFUploadPlaceHolder"></span>		
			
		<input type="button" value="' . (($buttonText) ? ($buttonText) : ('Tải lên file đính kèm')) . '"
			id="ctrl_uploader" class="button OverlayTrigger DisableOnSubmit"
			data-href="' . XenForo_Template_Helper_Core::link('full:attachments/upload', '', array(
'_params' => $attachmentParams,
'key' => $attachmentButtonKey
)) . '"
			data-hider="#AttachmentUploader" />
		<span class="HiddenInput" data-name="_xfSessionId" data-value="' . htmlspecialchars($sessionId, ENT_QUOTES, 'UTF-8') . '"></span>
		';
foreach ($attachmentParams['content_data'] AS $dataKey => $dataValue)
{
$__compilerVar106 .= '<span class="HiddenInput" data-name="content_data[' . htmlspecialchars($dataKey, ENT_QUOTES, 'UTF-8') . ']" data-value="' . htmlspecialchars($dataValue, ENT_QUOTES, 'UTF-8') . '"></span>
		';
}
$__compilerVar106 .= '
	</span>

	<noscript>
		<a href="' . XenForo_Template_Helper_Core::link('attachments/upload', '', array(
'_params' => $attachmentParams
)) . '" class="button" target="_blank">' . (($buttonText) ? ($buttonText) : ('Tải lên file đính kèm')) . '</a>
	</noscript>

';
}
$__compilerVar105 .= $__compilerVar106;
unset($__compilerVar106);
$__compilerVar105 .= '
		';
}
$__compilerVar105 .= '
		
		<div class="NoAttachments"></div>
		
		<div class="secondaryContent AttachmentInsertAllBlock JsOnly">
			<span></span>
			<div class="AttachmentText">
				<div class="label">' . 'Chèn các ảnh theo kiểu' . '...</div>
				<div class="controls">
					<!--<input type="button" value="' . 'Delete All' . '" class="button _smallButton AttachmentDeleteAll" />-->
					<input type="button" value="' . 'Hình thu nhỏ' . '" class="button smallButton AttachmentInsertAll" name="thumb" />
					<input type="button" value="' . 'Hình đầy đủ' . '" class="button smallButton AttachmentInsertAll" name="image" />
				</div>
			</div>
		</div>
	
		<ol class="AttachmentList New">
			';
$__compilerVar107 = '';
$__compilerVar107 .= '1';
$__compilerVar108 = '';
$__compilerVar109 = '';
$this->addRequiredExternal('css', 'attachment_editor');
$__compilerVar109 .= '

<li id="' . (($__compilerVar107) ? ('AttachedFileTemplate') : ('attachment' . htmlspecialchars($__compilerVar108['attachment_id'], ENT_QUOTES, 'UTF-8'))) . '"
	class="AttachedFile ' . (($__compilerVar108 and $__compilerVar108['thumbnailUrl']) ? ('AttachedImage') : ('')) . ' secondaryContent">

	<div class="Thumbnail">
		';
if ($__compilerVar108 and $__compilerVar108['thumbnailUrl'])
{
$__compilerVar109 .= '
			<a href="' . XenForo_Template_Helper_Core::link('attachments', $__compilerVar108, array()) . '" target="_blank"
				data-attachmentId="' . htmlspecialchars($__compilerVar108['attachment_id'], ENT_QUOTES, 'UTF-8') . '"
				class="_not_LbTrigger" data-href="' . XenForo_Template_Helper_Core::link('misc/lightbox', false, array()) . '"><img
				src="' . htmlspecialchars($__compilerVar108['thumbnailUrl'], ENT_QUOTES, 'UTF-8') . '" alt="' . htmlspecialchars($__compilerVar108['filename'], ENT_QUOTES, 'UTF-8') . '"
				class="_not_LbImage" data-src="' . XenForo_Template_Helper_Core::link('attachments', $__compilerVar108, array(
'embedded' => '1'
)) . '" /></a>
		';
}
else
{
$__compilerVar109 .= '
			<span class="genericAttachment"></span>
		';
}
$__compilerVar109 .= '
	</div>

	<div class="AttachmentText">
		<div class="Filename"><a href="' . XenForo_Template_Helper_Core::link('attachments', $__compilerVar108, array()) . '" target="_blank">' . (($__compilerVar108) ? (htmlspecialchars($__compilerVar108['filename'], ENT_QUOTES, 'UTF-8')) : ('')) . '</a></div>
	
		';
if ($__compilerVar107)
{
$__compilerVar109 .= '
			<input type="button" value="' . 'Hủy bỏ' . '" class="button smallButton AttachmentCanceller" />
			
			<span class="ProgressMeter"><span class="ProgressGraphic">&nbsp;</span><span class="ProgressCounter">0%</span></span>
		';
}
else
{
$__compilerVar109 .= '
			<noscript>
				<a href="' . XenForo_Template_Helper_Core::link('attachments/upload', '', array(
'_params' => $attachmentParams
)) . '" target="_blank" class="button Smallbutton">' . 'Xóa' . '</a>
			</noscript>
			
			';
if ($__compilerVar108['thumbnailUrl'])
{
$__compilerVar109 .= '
				<div class="label JsOnly">' . 'Chèn' . ':</div>
			';
}
$__compilerVar109 .= '
			
			<div class="controls JsOnly">				
				<input type="button" value="' . 'Xóa' . '" class="button smallButton AttachmentDeleter" data-href="' . XenForo_Template_Helper_Core::link('attachments/delete', $__compilerVar108, array()) . '" />
			
				';
if ($__compilerVar108['thumbnailUrl'])
{
$__compilerVar109 .= '
					<input type="button" name="thumb" value="' . 'Hình thu nhỏ' . '" class="button smallButton AttachmentInserter" />
					<input type="button" name="image" value="' . 'Hình đầy đủ' . '" class="button smallButton AttachmentInserter" />
				';
}
$__compilerVar109 .= '
			</div>
		';
}
$__compilerVar109 .= '

	</div>
	
</li>';
$__compilerVar105 .= $__compilerVar109;
unset($__compilerVar107, $__compilerVar108, $__compilerVar109);
$__compilerVar105 .= '
			';
if ($__compilerVar104)
{
$__compilerVar105 .= '
				';
foreach ($__compilerVar104 AS $attachment)
{
$__compilerVar105 .= '
					';
if ($attachment['temp_hash'])
{
$__compilerVar105 .= '
						';
$__compilerVar110 = '';
$this->addRequiredExternal('css', 'attachment_editor');
$__compilerVar110 .= '

<li id="' . (($isTemplate) ? ('AttachedFileTemplate') : ('attachment' . htmlspecialchars($attachment['attachment_id'], ENT_QUOTES, 'UTF-8'))) . '"
	class="AttachedFile ' . (($attachment and $attachment['thumbnailUrl']) ? ('AttachedImage') : ('')) . ' secondaryContent">

	<div class="Thumbnail">
		';
if ($attachment and $attachment['thumbnailUrl'])
{
$__compilerVar110 .= '
			<a href="' . XenForo_Template_Helper_Core::link('attachments', $attachment, array()) . '" target="_blank"
				data-attachmentId="' . htmlspecialchars($attachment['attachment_id'], ENT_QUOTES, 'UTF-8') . '"
				class="_not_LbTrigger" data-href="' . XenForo_Template_Helper_Core::link('misc/lightbox', false, array()) . '"><img
				src="' . htmlspecialchars($attachment['thumbnailUrl'], ENT_QUOTES, 'UTF-8') . '" alt="' . htmlspecialchars($attachment['filename'], ENT_QUOTES, 'UTF-8') . '"
				class="_not_LbImage" data-src="' . XenForo_Template_Helper_Core::link('attachments', $attachment, array(
'embedded' => '1'
)) . '" /></a>
		';
}
else
{
$__compilerVar110 .= '
			<span class="genericAttachment"></span>
		';
}
$__compilerVar110 .= '
	</div>

	<div class="AttachmentText">
		<div class="Filename"><a href="' . XenForo_Template_Helper_Core::link('attachments', $attachment, array()) . '" target="_blank">' . (($attachment) ? (htmlspecialchars($attachment['filename'], ENT_QUOTES, 'UTF-8')) : ('')) . '</a></div>
	
		';
if ($isTemplate)
{
$__compilerVar110 .= '
			<input type="button" value="' . 'Hủy bỏ' . '" class="button smallButton AttachmentCanceller" />
			
			<span class="ProgressMeter"><span class="ProgressGraphic">&nbsp;</span><span class="ProgressCounter">0%</span></span>
		';
}
else
{
$__compilerVar110 .= '
			<noscript>
				<a href="' . XenForo_Template_Helper_Core::link('attachments/upload', '', array(
'_params' => $attachmentParams
)) . '" target="_blank" class="button Smallbutton">' . 'Xóa' . '</a>
			</noscript>
			
			';
if ($attachment['thumbnailUrl'])
{
$__compilerVar110 .= '
				<div class="label JsOnly">' . 'Chèn' . ':</div>
			';
}
$__compilerVar110 .= '
			
			<div class="controls JsOnly">				
				<input type="button" value="' . 'Xóa' . '" class="button smallButton AttachmentDeleter" data-href="' . XenForo_Template_Helper_Core::link('attachments/delete', $attachment, array()) . '" />
			
				';
if ($attachment['thumbnailUrl'])
{
$__compilerVar110 .= '
					<input type="button" name="thumb" value="' . 'Hình thu nhỏ' . '" class="button smallButton AttachmentInserter" />
					<input type="button" name="image" value="' . 'Hình đầy đủ' . '" class="button smallButton AttachmentInserter" />
				';
}
$__compilerVar110 .= '
			</div>
		';
}
$__compilerVar110 .= '

	</div>
	
</li>';
$__compilerVar105 .= $__compilerVar110;
unset($__compilerVar110);
$__compilerVar105 .= '
					';
}
$__compilerVar105 .= '
				';
}
$__compilerVar105 .= '
			';
}
$__compilerVar105 .= '
		</ol>
	
		';
if ($__compilerVar104)
{
$__compilerVar105 .= '
			';
$__compilerVar111 = '';
$__compilerVar111 .= '
					';
foreach ($__compilerVar104 AS $attachment)
{
$__compilerVar111 .= '
						';
if (!$attachment['temp_hash'])
{
$__compilerVar111 .= '
							';
$__compilerVar112 = '';
$this->addRequiredExternal('css', 'attachment_editor');
$__compilerVar112 .= '

<li id="' . (($isTemplate) ? ('AttachedFileTemplate') : ('attachment' . htmlspecialchars($attachment['attachment_id'], ENT_QUOTES, 'UTF-8'))) . '"
	class="AttachedFile ' . (($attachment and $attachment['thumbnailUrl']) ? ('AttachedImage') : ('')) . ' secondaryContent">

	<div class="Thumbnail">
		';
if ($attachment and $attachment['thumbnailUrl'])
{
$__compilerVar112 .= '
			<a href="' . XenForo_Template_Helper_Core::link('attachments', $attachment, array()) . '" target="_blank"
				data-attachmentId="' . htmlspecialchars($attachment['attachment_id'], ENT_QUOTES, 'UTF-8') . '"
				class="_not_LbTrigger" data-href="' . XenForo_Template_Helper_Core::link('misc/lightbox', false, array()) . '"><img
				src="' . htmlspecialchars($attachment['thumbnailUrl'], ENT_QUOTES, 'UTF-8') . '" alt="' . htmlspecialchars($attachment['filename'], ENT_QUOTES, 'UTF-8') . '"
				class="_not_LbImage" data-src="' . XenForo_Template_Helper_Core::link('attachments', $attachment, array(
'embedded' => '1'
)) . '" /></a>
		';
}
else
{
$__compilerVar112 .= '
			<span class="genericAttachment"></span>
		';
}
$__compilerVar112 .= '
	</div>

	<div class="AttachmentText">
		<div class="Filename"><a href="' . XenForo_Template_Helper_Core::link('attachments', $attachment, array()) . '" target="_blank">' . (($attachment) ? (htmlspecialchars($attachment['filename'], ENT_QUOTES, 'UTF-8')) : ('')) . '</a></div>
	
		';
if ($isTemplate)
{
$__compilerVar112 .= '
			<input type="button" value="' . 'Hủy bỏ' . '" class="button smallButton AttachmentCanceller" />
			
			<span class="ProgressMeter"><span class="ProgressGraphic">&nbsp;</span><span class="ProgressCounter">0%</span></span>
		';
}
else
{
$__compilerVar112 .= '
			<noscript>
				<a href="' . XenForo_Template_Helper_Core::link('attachments/upload', '', array(
'_params' => $attachmentParams
)) . '" target="_blank" class="button Smallbutton">' . 'Xóa' . '</a>
			</noscript>
			
			';
if ($attachment['thumbnailUrl'])
{
$__compilerVar112 .= '
				<div class="label JsOnly">' . 'Chèn' . ':</div>
			';
}
$__compilerVar112 .= '
			
			<div class="controls JsOnly">				
				<input type="button" value="' . 'Xóa' . '" class="button smallButton AttachmentDeleter" data-href="' . XenForo_Template_Helper_Core::link('attachments/delete', $attachment, array()) . '" />
			
				';
if ($attachment['thumbnailUrl'])
{
$__compilerVar112 .= '
					<input type="button" name="thumb" value="' . 'Hình thu nhỏ' . '" class="button smallButton AttachmentInserter" />
					<input type="button" name="image" value="' . 'Hình đầy đủ' . '" class="button smallButton AttachmentInserter" />
				';
}
$__compilerVar112 .= '
			</div>
		';
}
$__compilerVar112 .= '

	</div>
	
</li>';
$__compilerVar111 .= $__compilerVar112;
unset($__compilerVar112);
$__compilerVar111 .= '
						';
}
$__compilerVar111 .= '
					';
}
$__compilerVar111 .= '
				';
if (trim($__compilerVar111) !== '')
{
$__compilerVar105 .= '
			<ol class="AttachmentList Existing">
				' . $__compilerVar111 . '
			</ol>
			';
}
unset($__compilerVar111);
$__compilerVar105 .= '
		';
}
$__compilerVar105 .= '
		
		<input type="hidden" name="attachment_hash" value="' . htmlspecialchars($attachmentParams['hash'], ENT_QUOTES, 'UTF-8') . '" />
		
		' . '
		
	</div>
	
';
}
$__compilerVar91 .= $__compilerVar105;
unset($__compilerVar104, $__compilerVar105);
$__compilerVar91 .= '
		';
}
$__compilerVar91 .= '

		<input type="hidden" name="last_date" value="' . htmlspecialchars($__compilerVar89, ENT_QUOTES, 'UTF-8') . '" data-load-value="' . htmlspecialchars($__compilerVar89, ENT_QUOTES, 'UTF-8') . '" />
		<input type="hidden" name="last_known_date" value="' . htmlspecialchars($lastKnownDate, ENT_QUOTES, 'UTF-8') . '" />
		<input type="hidden" name="_xfToken" value="' . htmlspecialchars($visitor['csrf_token_page'], ENT_QUOTES, 'UTF-8') . '" />

	</form>

</div>';
$__output .= $__compilerVar91;
unset($__compilerVar88, $__compilerVar89, $__compilerVar90, $__compilerVar91);
$__output .= '
';
}
$__output .= '

';
$__extraData['sidebar'] = '';
$__extraData['sidebar'] .= '

	<div class="section statsList">
		<div class="secondaryContent">
			<h3>' . 'Thông tin đối thoại' . '</h3>
			<div class="pairsJustified">
				<dl><dt>' . 'Những người tham gia' . ':</dt>
					<dd>' . XenForo_Template_Helper_Core::numberFormat(count($recipients), '0') . '</dd></dl>
				<dl><dt>' . 'Trả lời' . ':</dt>
					<dd>' . XenForo_Template_Helper_Core::numberFormat($conversation['reply_count'], '0') . '</dd></dl>
				<dl><dt>' . 'Lần trả lời cuối' . ':</dt>
					<dd>' . XenForo_Template_Helper_Core::callHelper('datetimehtml', array($conversation['last_message_date'],array(
'time' => '$conversation.last_message_date'
))) . '</dd></dl>
				<dl><dt>' . 'Trả lời lần cuối từ' . ':</dt>
					<dd>' . XenForo_Template_Helper_Core::callHelper('usernamehtml', array($conversation['last_message'],'',false,array())) . '</dd></dl>
			</div>
		</div>
	</div>
	
	<div class="section participants avatarList">
		<div class="secondaryContent">
			<h3>' . 'Những người tham gia đối thoại' . '</h3>
			<div id="ConversationRecipientsPlaceholder">
				';
$__compilerVar113 = '';
$__compilerVar113 .= '<ul id="ConversationRecipients">
	';
foreach ($recipients AS $recipient)
{
$__compilerVar113 .= '
		<li>
			' . XenForo_Template_Helper_Core::callHelper('avatarhtml', array($recipient,(true),array(
'user' => '$recipient',
'size' => 's',
'img' => 'true'
),'')) . '
			';
if ($recipient['user_id'])
{
$__compilerVar113 .= '
				' . XenForo_Template_Helper_Core::callHelper('usernamehtml', array($recipient,'',(true),array())) . '
			';
}
else
{
$__compilerVar113 .= '
				' . XenForo_Template_Helper_Core::callHelper('userNameHtml', array(
'0' => $recipient,
'1' => 'Unknown Member',
'2' => '1'
)) . '
			';
}
$__compilerVar113 .= '
			';
if ($recipient['user_id'])
{
$__compilerVar114 = '';
$__compilerVar114 .= XenForo_Template_Helper_Core::callHelper('usertitle', array(
'0' => $recipient
));
if (trim($__compilerVar114) !== '')
{
$__compilerVar113 .= '<div class="userTitle">' . $__compilerVar114 . '</div>';
}
unset($__compilerVar114);
}
$__compilerVar113 .= '
		</li>
	';
}
$__compilerVar113 .= '
</ul>';
$__extraData['sidebar'] .= $__compilerVar113;
unset($__compilerVar113);
$__extraData['sidebar'] .= '
			</div>
		</div>
			';
if ($canInviteUsers)
{
$__extraData['sidebar'] .= '
				<div class="sectionFooter"><a href="' . XenForo_Template_Helper_Core::link('conversations/invite', $conversation, array()) . '" class="_callToAction _inviteCtrl OverlayTrigger"
					title="' . 'Invite more members to participate in this conversation' . '">' . 'Invite More' . '</a></div>
			';
}
$__extraData['sidebar'] .= '
	</div>
	
';
