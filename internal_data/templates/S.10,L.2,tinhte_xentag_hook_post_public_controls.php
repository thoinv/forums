<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
if (XenForo_Template_Helper_Core::callHelper('Tinhte_XenTag_getOption', array(
'0' => 'displayPosition'
)) == ('post_permalink_after'))
{
$__output .= '
	';
$__compilerVar4 = '';
$__compilerVar4 .= '
				';
$__compilerVar5 = '';
if ($post['post_id'] > 0 AND $post['post_id'] == $thread['first_post_id'])
{
$__compilerVar5 .= '
	<div class="Tinhte_XenTag_Tags_InPost">
		';
if ($Tinhte_XenTag_canEdit)
{
$__compilerVar5 .= '
			';
$this->addRequiredExternal('js', 'js/Tinhte/XenTag/frontend.js');
$__compilerVar5 .= '
		
			<div class="Tinhte_XenTag_TagsInlineEditor" data-template="tags_in_post">
				<label>' . 'Tags' . '</label>:
				';
$__compilerVar6 = '';
$__compilerVar6 .= XenForo_Template_Helper_Core::callHelper('Tinhte_XenTag_getImplodedTagsFromThread', array(
'0' => $thread,
'1' => '1'
));
if (trim($__compilerVar6) !== '')
{
$__compilerVar5 .= '
                    ' . $__compilerVar6 . '
                ';
}
else
{
$__compilerVar5 .= '
                    ' . 'No tags' . '
                ';
}
unset($__compilerVar6);
$__compilerVar5 .= '
				(<a class="Tinhte_XenTag_Trigger" href="' . XenForo_Template_Helper_Core::link('threads/edit-tags', $thread, array()) . '">' . 'Edit Tags' . '</a>)
			</div>
		';
}
else
{
$__compilerVar5 .= '
			<label>' . 'Tags' . '</label>:
			' . XenForo_Template_Helper_Core::callHelper('Tinhte_XenTag_getImplodedTagsFromThread', array(
'0' => $thread,
'1' => '1'
)) . '
		';
}
$__compilerVar5 .= '
	</div>
';
}
$__compilerVar4 .= $__compilerVar5;
unset($__compilerVar5);
$__compilerVar4 .= '
			';
if (trim($__compilerVar4) !== '')
{
$__output .= '
		<span class="item">
			' . $__compilerVar4 . '
		</span>
		<!-- [Tinhte] XenTag / Revert Mark -->
	';
}
unset($__compilerVar4);
$__output .= '
';
}
