<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__compilerVar5 = '';
$__compilerVar5 .= 'post-' . htmlspecialchars($post['post_id'], ENT_QUOTES, 'UTF-8');
$__compilerVar6 = '';
$__compilerVar6 .= '
		';
if ($post['canInlineMod'])
{
$__compilerVar6 .= '<input type="checkbox" name="posts[]" value="' . htmlspecialchars($post['post_id'], ENT_QUOTES, 'UTF-8') . '" class="InlineModCheck item" title="' . 'Select this post' . '" data-target="#post-' . htmlspecialchars($post['post_id'], ENT_QUOTES, 'UTF-8') . '" />';
}
$__compilerVar6 .= '
		
		' . XenForo_Template_Helper_Core::callHelper('datetimehtml', array($post['post_date'],array(
'time' => '$post.post_date',
'class' => 'muted item'
))) . '
		
		<a href="' . XenForo_Template_Helper_Core::link('threads/show-posts', $thread, array(
'post_id' => $post['post_id']
)) . '" class="MessageLoader control item show" data-messageSelector="#post-' . htmlspecialchars($post['post_id'], ENT_QUOTES, 'UTF-8') . '"><span></span>' . 'Show' . '</a>		
	';
$__compilerVar7 = '';
$this->addRequiredExternal('css', 'message');
$__compilerVar7 .= '
';
$this->addRequiredExternal('js', 'js/xenforo/discussion.js');
$__compilerVar7 .= '

<li id="' . htmlspecialchars($__compilerVar5, ENT_QUOTES, 'UTF-8') . '" class="message deleted placeholder ' . (($post['isIgnored']) ? ('ignored') : ('')) . '">
	<div class="placeholderContent">

		' . XenForo_Template_Helper_Core::callHelper('avatarhtml', array($post,(true),array(
'user' => '$message',
'size' => 's',
'img' => 'true'
),'')) . '
		
		<div class="messageInfo primaryContent">
			<div>
				' . 'This message by ' . XenForo_Template_Helper_Core::callHelper('username', array(
'0' => $post
)) . ' has been removed from public view.' . '
				
				';
if ($post['delete_username'])
{
$__compilerVar7 .= '
					' . 'Bị xóa bởi ' . XenForo_Template_Helper_Core::callHelper('username', array(
'0' => $post['deleteInfo']
)) . '' . ',
					' . XenForo_Template_Helper_Core::callHelper('datetimehtml', array($post['delete_date'],array(
'time' => htmlspecialchars($post['delete_date'], ENT_QUOTES, 'UTF-8')
)));
if ($post['delete_reason'])
{
$__compilerVar7 .= ', ' . 'Lý do' . ': ' . htmlspecialchars($post['delete_reason'], ENT_QUOTES, 'UTF-8');
}
$__compilerVar7 .= '.
				';
}
$__compilerVar7 .= '
			</div>
			
			';
$__compilerVar8 = '';
$__compilerVar7 .= $this->callTemplateCallback('DigitalPointAdPositioning_Callback_AdBelowPost', 'renderAdCounterAdvance', $__compilerVar8, array());
unset($__compilerVar8);
$__compilerVar7 .= '
<div class="messageMeta">
				<div class="privateControls">' . $__compilerVar6 . '</div>
			</div>
		</div>
		
	</div>
</li>';
$__output .= $__compilerVar7;
unset($__compilerVar5, $__compilerVar6, $__compilerVar7);
