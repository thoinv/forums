<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
if (XenForo_Template_Helper_Core::callHelper('Tinhte_XenTag_getOption', array(
'0' => 'displayPosition'
)) == ('post_message_below'))
{
$__output .= '
	';
$__compilerVar1 = '';
if ($message['post_id'] > 0 AND $message['post_id'] == $thread['first_post_id'])
{
$__compilerVar1 .= '
	<div class="Tinhte_XenTag_Tags_InPost">
		';
if ($Tinhte_XenTag_canEdit)
{
$__compilerVar1 .= '
			';
$this->addRequiredExternal('js', 'js/Tinhte/XenTag/frontend.js');
$__compilerVar1 .= '
		
			<div class="Tinhte_XenTag_TagsInlineEditor" data-template="tags_in_post">
				<label>' . 'Tags' . '</label>:
				';
$__compilerVar2 = '';
$__compilerVar2 .= XenForo_Template_Helper_Core::callHelper('Tinhte_XenTag_getImplodedTagsFromThread', array(
'0' => $thread,
'1' => '1'
));
if (trim($__compilerVar2) !== '')
{
$__compilerVar1 .= '
                    ' . $__compilerVar2 . '
                ';
}
else
{
$__compilerVar1 .= '
                    ' . 'No tags' . '
                ';
}
unset($__compilerVar2);
$__compilerVar1 .= '
				(<a class="Tinhte_XenTag_Trigger" href="' . XenForo_Template_Helper_Core::link('threads/edit-tags', $thread, array()) . '">' . 'Edit Tags' . '</a>)
			</div>
		';
}
else
{
$__compilerVar1 .= '
			<label>' . 'Tags' . '</label>:
			' . XenForo_Template_Helper_Core::callHelper('Tinhte_XenTag_getImplodedTagsFromThread', array(
'0' => $thread,
'1' => '1'
)) . '
		';
}
$__compilerVar1 .= '
	</div>
';
}
$__output .= $__compilerVar1;
unset($__compilerVar1);
$__output .= '
';
}
