<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
if (XenForo_Template_Helper_Core::callHelper('Tinhte_XenTag_getOption', array(
'0' => 'displayPosition'
)) == ('post_message_above'))
{
$__output .= '
	';
$__compilerVar3 = '';
if ($message['post_id'] > 0 AND $message['post_id'] == $thread['first_post_id'])
{
$__compilerVar3 .= '
	<div class="Tinhte_XenTag_Tags_InPost">
		';
if ($Tinhte_XenTag_canEdit)
{
$__compilerVar3 .= '
			';
$this->addRequiredExternal('js', 'js/Tinhte/XenTag/frontend.js');
$__compilerVar3 .= '
		
			<div class="Tinhte_XenTag_TagsInlineEditor" data-template="tags_in_post">
				<label>' . 'Tags' . '</label>:
				';
$__compilerVar4 = '';
$__compilerVar4 .= XenForo_Template_Helper_Core::callHelper('Tinhte_XenTag_getImplodedTagsFromThread', array(
'0' => $thread,
'1' => '1'
));
if (trim($__compilerVar4) !== '')
{
$__compilerVar3 .= '
                    ' . $__compilerVar4 . '
                ';
}
else
{
$__compilerVar3 .= '
                    ' . 'No tags' . '
                ';
}
unset($__compilerVar4);
$__compilerVar3 .= '
				(<a class="Tinhte_XenTag_Trigger" href="' . XenForo_Template_Helper_Core::link('threads/edit-tags', $thread, array()) . '">' . 'Edit Tags' . '</a>)
			</div>
		';
}
else
{
$__compilerVar3 .= '
			<label>' . 'Tags' . '</label>:
			' . XenForo_Template_Helper_Core::callHelper('Tinhte_XenTag_getImplodedTagsFromThread', array(
'0' => $thread,
'1' => '1'
)) . '
		';
}
$__compilerVar3 .= '
	</div>
';
}
$__output .= $__compilerVar3;
unset($__compilerVar3);
$__output .= '
';
}
