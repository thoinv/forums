<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
if ($post['post_id'] > 0 AND $post['post_id'] == $thread['first_post_id'])
{
$__output .= '
	<div class="Tinhte_XenTag_Tags_InPost">
		';
if ($Tinhte_XenTag_canEdit)
{
$__output .= '
			';
$this->addRequiredExternal('js', 'js/Tinhte/XenTag/frontend.js');
$__output .= '
		
			<div class="Tinhte_XenTag_TagsInlineEditor" data-template="tags_in_post">
				<label>' . 'Tags' . '</label>:
				';
$__compilerVar1 = '';
$__compilerVar1 .= XenForo_Template_Helper_Core::callHelper('Tinhte_XenTag_getImplodedTagsFromThread', array(
'0' => $thread,
'1' => '1'
));
if (trim($__compilerVar1) !== '')
{
$__output .= '
                    ' . $__compilerVar1 . '
                ';
}
else
{
$__output .= '
                    ' . 'No tags' . '
                ';
}
unset($__compilerVar1);
$__output .= '
				(<a class="Tinhte_XenTag_Trigger" href="' . XenForo_Template_Helper_Core::link('threads/edit-tags', $thread, array()) . '">' . 'Edit Tags' . '</a>)
			</div>
		';
}
else
{
$__output .= '
			<label>' . 'Tags' . '</label>:
			' . XenForo_Template_Helper_Core::callHelper('Tinhte_XenTag_getImplodedTagsFromThread', array(
'0' => $thread,
'1' => '1'
)) . '
		';
}
$__output .= '
	</div>
';
}
