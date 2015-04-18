<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__compilerVar12 = '';
$__compilerVar12 .= 'conversations/starred';
$__compilerVar13 = '';
$__compilerVar13 .= 'Starred Conversations';
$__compilerVar14 = '';
if (!$__compilerVar13)
{
$title = '';
$title .= 'Đối thoại';
}
$__compilerVar14 .= '
';
if (!$__compilerVar12)
{
$pageRoute = '';
$pageRoute .= 'conversations';
}
$__compilerVar14 .= '

';
$__extraData['title'] = '';
$__extraData['title'] .= htmlspecialchars($__compilerVar13, ENT_QUOTES, 'UTF-8', (false)) . XenForo_Template_Helper_Core::callHelper('pagenumber', array(
'0' => $page
));
$__compilerVar14 .= '
';
$__extraData['h1'] = '';
$__extraData['h1'] .= htmlspecialchars($__compilerVar13, ENT_QUOTES, 'UTF-8', (false));
$__compilerVar14 .= '
';
$__extraData['pageDescription'] = array();
$__extraData['pageDescription']['content'] = '';
$__extraData['pageDescription']['content'] .= 'Đối thoại cho phép bạn trao đổi thông tin trực tiếp với thành viên khác.';
$__compilerVar14 .= '

';
if ($canStartConversation)
{
$__compilerVar14 .= '
	';
$__extraData['topctrl'] = '';
$__extraData['topctrl'] .= '
		<a href="' . XenForo_Template_Helper_Core::link('conversations/add', false, array()) . '" class="callToAction"><span>' . 'Bắt đầu đối thoại mới' . '</span></a>
	';
$__compilerVar14 .= '
';
}
$__compilerVar14 .= '

';
$this->addRequiredExternal('css', 'discussion_list');
$__compilerVar14 .= '
';
$this->addRequiredExternal('js', 'js/xenforo/discussion_list.js');
$__compilerVar14 .= '

' . XenForo_Template_Helper_Core::callHelper('pagenavhtml', array('public', htmlspecialchars($conversationsPerPage, ENT_QUOTES, 'UTF-8'), htmlspecialchars($totalConversations, ENT_QUOTES, 'UTF-8'), htmlspecialchars($page, ENT_QUOTES, 'UTF-8'), htmlspecialchars($__compilerVar12, ENT_QUOTES, 'UTF-8'), false, $pageNavParams, false, array())) . '

<div class="discussionList section sectionMain">
	<form action="' . XenForo_Template_Helper_Core::link('inline-mod/conversation/switch', false, array()) . '" method="post"
		class="DiscussionList InlineModForm"
		data-cookieName="conversations"
		data-controls="#InlineModControls"
		data-imodOptions="#ModerationSelect option"
	>	
		<dl class="sectionHeaders">
			<dt class="posterAvatar"><a><span></span></a></dt>			
			<dd class="main">
				<a class="title"><span>' . 'Tiêu đề đối thoại' . '</span></a>
				<a class="postDate"><span></span></a>
			</dd>			
			<dd class="stats"><a><span>' . 'Trả lời' . '</span></a></dd>
			<dd class="lastPost"><a><span>' . 'Bài viết cuối' . '</span></a></dd>
		</dl>

		<ol class="discussionListItems">
		';
if ($conversations)
{
$__compilerVar14 .= '
			';
foreach ($conversations AS $conversation)
{
$__compilerVar14 .= '
				';
$__compilerVar15 = '';
$this->addRequiredExternal('css', 'discussion_list');
$__compilerVar15 .= '

<li id="conversation-' . htmlspecialchars($conversation['conversation_id'], ENT_QUOTES, 'UTF-8') . '" class="discussionListItem ' . (($conversation['isNew']) ? ('unread') : ('')) . '" data-author="' . htmlspecialchars($conversation['username'], ENT_QUOTES, 'UTF-8') . '">

	<div class="listBlock posterAvatar">' . XenForo_Template_Helper_Core::callHelper('avatarhtml', array($conversation,(true),array(
'user' => '$conversation',
'size' => 's',
'img' => 'true'
),'')) . '</div>			
		
	<div class="listBlock main">
		<div class="titleText">
			';
$__compilerVar16 = '';
$__compilerVar16 .= '
					';
if ($conversation['is_starred'])
{
$__compilerVar16 .= '<a href="' . XenForo_Template_Helper_Core::link('conversations/starred', false, array()) . '"><span class="starred" title="' . 'Starred' . '">' . 'Starred' . '</span></a>';
}
$__compilerVar16 .= '
				';
if (trim($__compilerVar16) !== '')
{
$__compilerVar15 .= '
				<div class="iconKey">
				' . $__compilerVar16 . '
				</div>
			';
}
unset($__compilerVar16);
$__compilerVar15 .= '

			<h3 class="title">
				<input type="checkbox" name="conversations[]" value="' . htmlspecialchars($conversation['conversation_id'], ENT_QUOTES, 'UTF-8') . '" class="InlineModCheck" id="inlineModCheck-conversation-' . htmlspecialchars($conversation['conversation_id'], ENT_QUOTES, 'UTF-8') . '" data-target="#conversation-' . htmlspecialchars($conversation['conversation_id'], ENT_QUOTES, 'UTF-8') . '" title="' . 'Select conversation' . ': \'' . htmlspecialchars($conversation['title'], ENT_QUOTES, 'UTF-8') . '\'" />
				<a href="' . XenForo_Template_Helper_Core::link('conversations' . (($conversation['isNew']) ? ('/unread') : ('')), $conversation, array()) . '">' . XenForo_Template_Helper_Core::callHelper('wrap', array(
'0' => $conversation['title'],
'1' => '50'
)) . '</a>
				';
if ($visitor['user_id'])
{
$__compilerVar15 .= '<a href="' . XenForo_Template_Helper_Core::link('conversations/toggle-read', $conversation, array()) . '" class="ReadToggle"
					data-counter="#ConversationsMenu_Counter"
					title="' . (($conversation['isNew']) ? ('Mark as Read') : ('Mark as Unread')) . '"></a>';
}
$__compilerVar15 .= '
			</h3>

			<div class="secondRow">
				<div class="posterDate muted">
					' . XenForo_Template_Helper_Core::callHelper('usernamehtml', array($conversation,'',false,array(
'title' => 'Conversation Starter'
))) . ',
					';
foreach ($conversation['recipientNames'] AS $recipient)
{
$__compilerVar15 .= '
						';
if ($recipient['user_id'] != $conversation['user_id'])
{
$__compilerVar15 .= XenForo_Template_Helper_Core::callHelper('usernamehtml', array($recipient,(($recipient['user_id']) ? (htmlspecialchars($recipient['username'], ENT_QUOTES, 'UTF-8')) : ('Unknown Member')),false,array())) . ',';
}
$__compilerVar15 .= '
					';
}
$__compilerVar15 .= '

					<a href="' . XenForo_Template_Helper_Core::link('conversations', $conversation, array()) . '" class="faint">' . XenForo_Template_Helper_Core::callHelper('datetimehtml', array($conversation['start_date'],array(
'time' => '$conversation.start_date'
))) . '</a>
									
					';
if ($conversation['lastPageNumbers'])
{
$__compilerVar15 .= '
						<span class="itemPageNav">
							<span>...</span>
							';
foreach ($conversation['lastPageNumbers'] AS $pageNumber)
{
$__compilerVar15 .= '
								<a href="' . XenForo_Template_Helper_Core::link('conversations', $conversation, array(
'page' => $pageNumber
)) . '">' . htmlspecialchars($pageNumber, ENT_QUOTES, 'UTF-8') . '</a>
							';
}
$__compilerVar15 .= '
						</span>
					';
}
$__compilerVar15 .= '
				</div>
			</div>
		</div>
	</div>
		
	<div class="listBlock stats pairsJustified">
		<dl class="major"><dt>' . 'Trả lời' . ':</dt> <dd>' . XenForo_Template_Helper_Core::numberFormat($conversation['reply_count'], '0') . '</dd></dl>
		<dl class="minor"><dt>' . 'Những người tham gia' . ':</dt> <dd>' . XenForo_Template_Helper_Core::numberFormat($conversation['recipient_count'], '0') . '</dd></dl>
	</div>

	<div class="listBlock lastPost">
		<dl class="lastPostInfo">
			<dt>' . XenForo_Template_Helper_Core::callHelper('usernamehtml', array($conversation['last_message'],'',false,array())) . '</dt>
			<dd class="muted"><a href="' . XenForo_Template_Helper_Core::link('conversations/message', $conversation, array(
'message_id' => $conversation['last_message_id']
)) . '" class="dateTime">' . XenForo_Template_Helper_Core::callHelper('datetimehtml', array($conversation['last_message_date'],array(
'time' => '$conversation.last_message_date'
))) . '</a></dd>
		</dl>
	</div>
	
</li>';
$__compilerVar14 .= $__compilerVar15;
unset($__compilerVar15);
$__compilerVar14 .= '
			';
}
$__compilerVar14 .= '
		';
}
else
{
$__compilerVar14 .= '
			<li class="primaryContent">' . 'Chưa có đối thoại nào để hiển thị.' . ' ';
if ($canStartConversation)
{
$__compilerVar14 .= '<a href="' . XenForo_Template_Helper_Core::link('conversations/add', false, array()) . '">' . 'Bắt đầu đối thoại bây giờ' . '</a>';
}
$__compilerVar14 .= '</li>
		';
}
$__compilerVar14 .= '
		</ol>

		<div class="sectionFooter InlineMod SelectionCountContainer">
			';
if ($totalConversations)
{
$__compilerVar14 .= '<span class="contentSummary">' . 'Showing conversations ' . XenForo_Template_Helper_Core::numberFormat($startOffset, '0') . ' to ' . XenForo_Template_Helper_Core::numberFormat($endOffset, '0') . ' of ' . XenForo_Template_Helper_Core::numberFormat($totalConversations, '0') . '' . '</span>';
}
$__compilerVar14 .= '

			';
$__compilerVar17 = '';
$__compilerVar18 = '';
$__compilerVar18 .= 'Conversation Management';
$__compilerVar19 = '';
$__compilerVar19 .= '
		<option value="leave">' . 'Leave Conversations' . '...</option>
		<option value="read">' . 'Mark Conversations Read' . '</option>
		<option value="unread">' . 'Mark Conversations Unread' . '</option>
		<option value="star">' . 'Star Conversations' . '</option>
		<option value="unstar">' . 'Unstar Conversations' . '</option>
		<option value="deselect">' . 'Deselect Conversations' . '</option>
	';
$__compilerVar20 = '';
$__compilerVar20 .= 'Select / deselect all conversations on this page';
$__compilerVar21 = '';
$__compilerVar21 .= 'Selected conversations';
$__compilerVar22 = '';
$this->addRequiredExternal('css', 'inline_mod');
$__compilerVar22 .= '
';
$this->addRequiredExternal('js', 'js/xenforo/inline_mod.js');
$__compilerVar22 .= '

<span id="InlineModControls">
	<span class="selectionControl secondaryContent">
		<label for="ModerationCheck">
			' . 'Chọn tất cả' . ' <input type="checkbox" id="ModerationCheck" title="' . htmlspecialchars($__compilerVar20, ENT_QUOTES, 'UTF-8') . '" />
		</label>

		<input type="button" class="button ClickNext" value="&darr;" title="' . 'Chuyển xuống' . '" />
		<input type="button" class="button ClickPrev" value="&uarr;" title="' . 'Chuyển lên trên' . '" />
		<a class="SelectionCount">' . htmlspecialchars($__compilerVar21, ENT_QUOTES, 'UTF-8') . ': <em class="InlineModCheckedTotal">0</em></a>
	</span>

	<span class="actionControl sectionFooter">
		<span class="commonActions">
			';
if ($inlineModOptions['delete'])
{
$__compilerVar22 .= '<input type="submit" class="button" value="' . 'Xóa' . '..." name="delete" />';
}
$__compilerVar22 .= '
			';
if ($inlineModOptions['approve'])
{
$__compilerVar22 .= '<input type="submit" class="button" value="' . 'Duyệt bài' . '" name="approve" />';
}
$__compilerVar22 .= '
		</span>

		<span class="otherActions">
			<select name="a" id="ModerationSelect" class="textCtrl">
				<option value="">' . 'Hành động khác' . '...</option>
				<optgroup label="' . 'Hành động Quản lý' . '">
					' . $__compilerVar19 . '
				</optgroup>
				<option value="closeOverlay">' . 'Đóng lớp phủ này' . '</option>
			</select>

			<input type="submit" class="button primary" value="' . 'Tới' . '" />
			<input type="reset" class="button OverlayCloser overylayOnly" value="X" title="' . 'Cancel and close these controls' . '" />
		</span>
	</span>
</span>';
$__compilerVar17 .= $__compilerVar22;
unset($__compilerVar18, $__compilerVar19, $__compilerVar20, $__compilerVar21, $__compilerVar22);
$__compilerVar14 .= $__compilerVar17;
unset($__compilerVar17);
$__compilerVar14 .= '
		</div>

	</form>
	
	<h3 id="DiscussionListOptionsHandle" class="JsOnly"><a href="#">' . 'Tùy chọn hiển thị đối thoại' . '</a></h3>

	<form action="' . XenForo_Template_Helper_Core::link(htmlspecialchars($__compilerVar12, ENT_QUOTES, 'UTF-8'), false, array()) . '" method="post" class="DiscussionListOptions secondaryContent">
		<div class="controlGroup">
			<label for="ctrl_search_type">' . 'Chỉ hiện thị đối thoại' . ':</label>
			<select name="search_type" id="ctrl_search_type" class="textCtrl">
				<option value="">(' . 'Hiển thị tất cả đối thoại' . ')</option>
				<option value="received_by" ' . (($search_type == ('received_by')) ? ' selected="selected"' : '') . '>' . 'Được nhận bởi' . '</option>
				
				<option value="started_by" ' . (($search_type == ('started_by')) ? ' selected="selected"' : '') . '>' . 'Bắt đầu bởi' . '</option>
			</select>
			<input type="search" name="search_user" value="' . htmlspecialchars($search_user, ENT_QUOTES, 'UTF-8') . '" placeholder="' . 'Tên tài khoản' . '..."
				results="0" class="textCtrl AutoComplete AcSingle"
				data-acurl="' . XenForo_Template_Helper_Core::link('conversations/find-user', false, array()) . '" data-acextrafields="#ctrl_search_type" />
		</div>
	
		<div class="buttonGroup">
			<input type="submit" class="button primary" value="' . 'Đặt tùy chọn' . '" />
			<input type="reset" class="button" value="' . 'Hủy bỏ' . '" />
		</div>
	
		<input type="hidden" name="_xfToken" value="' . htmlspecialchars($visitor['csrf_token_page'], ENT_QUOTES, 'UTF-8') . '" />
	</form>
	
</div>
	
<div class="pageNavLinkGroup afterDiscussionListHandle">
	<div class="linkGroup">
		';
if ($canStartConversation)
{
$__compilerVar14 .= '
			<a href="' . XenForo_Template_Helper_Core::link('conversations/add', false, array()) . '" class="callToAction"><span>' . 'Bắt đầu đối thoại mới' . '</span></a>
		';
}
$__compilerVar14 .= '
	</div>
	
	' . XenForo_Template_Helper_Core::callHelper('pagenavhtml', array('public', htmlspecialchars($conversationsPerPage, ENT_QUOTES, 'UTF-8'), htmlspecialchars($totalConversations, ENT_QUOTES, 'UTF-8'), htmlspecialchars($page, ENT_QUOTES, 'UTF-8'), htmlspecialchars($__compilerVar12, ENT_QUOTES, 'UTF-8'), false, $pageNavParams, false, array())) . '
</div>';
$__output .= $__compilerVar14;
unset($__compilerVar12, $__compilerVar13, $__compilerVar14);
