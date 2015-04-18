<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__output .= '<div>
	';
$post['post_id'] = '';
$post['post_id'] .= htmlspecialchars($thread['first_post_id'], ENT_QUOTES, 'UTF-8');
$__output .= '

    ';
if ($Tinhte_XenTag_callerTemplate == ('tags_thread_view'))
{
$__output .= '
        ';
$__compilerVar8 = '';
$__compilerVar8 .= '1';
$__compilerVar9 = '';
if ($__compilerVar8)
{
$__compilerVar9 .= '
    ';
$this->addRequiredExternal('js', 'js/Tinhte/XenTag/frontend.js');
$__compilerVar9 .= '
	';
$this->addRequiredExternal('css', 'tinhte_xentag');
$__compilerVar9 .= '

    <div class="sectionMain Tinhte_XenTag_Tags_ThreadView">
        <div class="Tinhte_XenTag_TagsInlineEditor" data-template="tags_thread_view">
			<label>' . 'Tags' . '</label>:
            ';
$__compilerVar10 = '';
$__compilerVar10 .= XenForo_Template_Helper_Core::callHelper('Tinhte_XenTag_getImplodedTagsFromThread', array(
'0' => $thread,
'1' => '1'
));
if (trim($__compilerVar10) !== '')
{
$__compilerVar9 .= '
			    ' . $__compilerVar10 . '
            ';
}
else
{
$__compilerVar9 .= '
                ' . 'No tags' . '
            ';
}
unset($__compilerVar10);
$__compilerVar9 .= '
			(<a class="Tinhte_XenTag_Trigger" href="' . XenForo_Template_Helper_Core::link('threads/edit-tags', $thread, array()) . '">' . 'Edit Tags' . '</a>)
		</div>
    </div>
';
}
else
{
$__compilerVar9 .= '
    ';
$__compilerVar11 = '';
$__compilerVar11 .= XenForo_Template_Helper_Core::callHelper('Tinhte_XenTag_getImplodedTagsFromThread', array(
'0' => $thread,
'1' => '1'
));
if (trim($__compilerVar11) !== '')
{
$__compilerVar9 .= '
        <div class="sectionMain Tinhte_XenTag_Tags_ThreadView">
    		<label>' . 'Tags' . '</label>:
    		' . $__compilerVar11 . '
    	</div>
    ';
}
unset($__compilerVar11);
$__compilerVar9 .= '
';
}
$__output .= $__compilerVar9;
unset($__compilerVar8, $__compilerVar9);
$__output .= '
    ';
}
else
{
$__output .= '
    	';
$__compilerVar12 = '';
$__compilerVar12 .= '1';
$__compilerVar13 = '';
if ($post['post_id'] > 0 AND $post['post_id'] == $thread['first_post_id'])
{
$__compilerVar13 .= '
	<div class="Tinhte_XenTag_Tags_InPost">
		';
if ($__compilerVar12)
{
$__compilerVar13 .= '
			';
$this->addRequiredExternal('js', 'js/Tinhte/XenTag/frontend.js');
$__compilerVar13 .= '
		
			<div class="Tinhte_XenTag_TagsInlineEditor" data-template="tags_in_post">
				<label>' . 'Tags' . '</label>:
				';
$__compilerVar14 = '';
$__compilerVar14 .= XenForo_Template_Helper_Core::callHelper('Tinhte_XenTag_getImplodedTagsFromThread', array(
'0' => $thread,
'1' => '1'
));
if (trim($__compilerVar14) !== '')
{
$__compilerVar13 .= '
                    ' . $__compilerVar14 . '
                ';
}
else
{
$__compilerVar13 .= '
                    ' . 'No tags' . '
                ';
}
unset($__compilerVar14);
$__compilerVar13 .= '
				(<a class="Tinhte_XenTag_Trigger" href="' . XenForo_Template_Helper_Core::link('threads/edit-tags', $thread, array()) . '">' . 'Edit Tags' . '</a>)
			</div>
		';
}
else
{
$__compilerVar13 .= '
			<label>' . 'Tags' . '</label>:
			' . XenForo_Template_Helper_Core::callHelper('Tinhte_XenTag_getImplodedTagsFromThread', array(
'0' => $thread,
'1' => '1'
)) . '
		';
}
$__compilerVar13 .= '
	</div>
';
}
$__output .= $__compilerVar13;
unset($__compilerVar12, $__compilerVar13);
$__output .= '
    ';
}
$__output .= '
</div>';
