<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__compilerVar1 = '';
$__compilerVar1 .= 'post-' . htmlspecialchars($post['post_id'], ENT_QUOTES, 'UTF-8');
$__compilerVar2 = '';
$__compilerVar2 .= '
		';
if ($post['canInlineMod'])
{
$__compilerVar2 .= '<input type="checkbox" name="posts[]" value="' . htmlspecialchars($post['post_id'], ENT_QUOTES, 'UTF-8') . '" class="InlineModCheck item" title="' . 'Select this post' . '" data-target="#post-' . htmlspecialchars($post['post_id'], ENT_QUOTES, 'UTF-8') . '" />';
}
$__compilerVar2 .= '
		
		' . XenForo_Template_Helper_Core::callHelper('datetimehtml', array($post['post_date'],array(
'time' => '$post.post_date',
'class' => 'muted item'
))) . '
		
		<a href="' . XenForo_Template_Helper_Core::link('threads/show-posts', $thread, array(
'post_id' => $post['post_id']
)) . '" class="MessageLoader control item show" data-messageSelector="#post-' . htmlspecialchars($post['post_id'], ENT_QUOTES, 'UTF-8') . '"><span></span>' . 'Show' . '</a>		
	';
$__compilerVar3 = '';
$this->addRequiredExternal('css', 'message');
$__compilerVar3 .= '
';
$this->addRequiredExternal('js', 'js/xenforo/discussion.js');
$__compilerVar3 .= '

<li id="' . htmlspecialchars($__compilerVar1, ENT_QUOTES, 'UTF-8') . '" class="message deleted placeholder ' . (($post['isIgnored']) ? ('ignored') : ('')) . '">
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
$__compilerVar3 .= '
					' . 'Deleted by ' . XenForo_Template_Helper_Core::callHelper('username', array(
'0' => $post['deleteInfo']
)) . '' . ',
					' . XenForo_Template_Helper_Core::callHelper('datetimehtml', array($post['delete_date'],array(
'time' => htmlspecialchars($post['delete_date'], ENT_QUOTES, 'UTF-8')
)));
if ($post['delete_reason'])
{
$__compilerVar3 .= ', ' . 'Reason' . ': ' . htmlspecialchars($post['delete_reason'], ENT_QUOTES, 'UTF-8');
}
$__compilerVar3 .= '.
				';
}
$__compilerVar3 .= '
			</div>
			
			';
$__compilerVar4 = '';
$__compilerVar3 .= $this->callTemplateCallback('DigitalPointAdPositioning_Callback_AdBelowPost', 'renderAdCounterAdvance', $__compilerVar4, array());
unset($__compilerVar4);
$__compilerVar3 .= '
<div class="messageMeta">
				<div class="privateControls">' . $__compilerVar2 . '</div>
			</div>
		</div>
		
	</div>
</li>';
$__output .= $__compilerVar3;
unset($__compilerVar1, $__compilerVar2, $__compilerVar3);
