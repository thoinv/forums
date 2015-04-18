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
$__compilerVar1 = '';
$__compilerVar1 .= '1';
$__compilerVar2 = '';
if ($__compilerVar1)
{
$__compilerVar2 .= '
    ';
$this->addRequiredExternal('js', 'js/Tinhte/XenTag/frontend.js');
$__compilerVar2 .= '
	';
$this->addRequiredExternal('css', 'tinhte_xentag');
$__compilerVar2 .= '

    <div class="sectionMain Tinhte_XenTag_Tags_ThreadView">
        <div class="Tinhte_XenTag_TagsInlineEditor" data-template="tags_thread_view">
			<label>' . 'Tags' . '</label>:
            ';
$__compilerVar3 = '';
$__compilerVar3 .= XenForo_Template_Helper_Core::callHelper('Tinhte_XenTag_getImplodedTagsFromThread', array(
'0' => $thread,
'1' => '1'
));
if (trim($__compilerVar3) !== '')
{
$__compilerVar2 .= '
			    ' . $__compilerVar3 . '
            ';
}
else
{
$__compilerVar2 .= '
                ' . 'No tags' . '
            ';
}
unset($__compilerVar3);
$__compilerVar2 .= '
			(<a class="Tinhte_XenTag_Trigger" href="' . XenForo_Template_Helper_Core::link('threads/edit-tags', $thread, array()) . '">' . 'Edit Tags' . '</a>)
		</div>
    </div>
';
}
else
{
$__compilerVar2 .= '
    ';
$__compilerVar4 = '';
$__compilerVar4 .= XenForo_Template_Helper_Core::callHelper('Tinhte_XenTag_getImplodedTagsFromThread', array(
'0' => $thread,
'1' => '1'
));
if (trim($__compilerVar4) !== '')
{
$__compilerVar2 .= '
        <div class="sectionMain Tinhte_XenTag_Tags_ThreadView">
    		<label>' . 'Tags' . '</label>:
    		' . $__compilerVar4 . '
    	</div>
    ';
}
unset($__compilerVar4);
$__compilerVar2 .= '
';
}
$__output .= $__compilerVar2;
unset($__compilerVar1, $__compilerVar2);
$__output .= '
    ';
}
else
{
$__output .= '
    	';
$__compilerVar5 = '';
$__compilerVar5 .= '1';
$__compilerVar6 = '';
if ($post['post_id'] > 0 AND $post['post_id'] == $thread['first_post_id'])
{
$__compilerVar6 .= '
	<div class="Tinhte_XenTag_Tags_InPost">
		';
if ($__compilerVar5)
{
$__compilerVar6 .= '
			';
$this->addRequiredExternal('js', 'js/Tinhte/XenTag/frontend.js');
$__compilerVar6 .= '
		
			<div class="Tinhte_XenTag_TagsInlineEditor" data-template="tags_in_post">
				<label>' . 'Tags' . '</label>:
				';
$__compilerVar7 = '';
$__compilerVar7 .= XenForo_Template_Helper_Core::callHelper('Tinhte_XenTag_getImplodedTagsFromThread', array(
'0' => $thread,
'1' => '1'
));
if (trim($__compilerVar7) !== '')
{
$__compilerVar6 .= '
                    ' . $__compilerVar7 . '
                ';
}
else
{
$__compilerVar6 .= '
                    ' . 'No tags' . '
                ';
}
unset($__compilerVar7);
$__compilerVar6 .= '
				(<a class="Tinhte_XenTag_Trigger" href="' . XenForo_Template_Helper_Core::link('threads/edit-tags', $thread, array()) . '">' . 'Edit Tags' . '</a>)
			</div>
		';
}
else
{
$__compilerVar6 .= '
			<label>' . 'Tags' . '</label>:
			' . XenForo_Template_Helper_Core::callHelper('Tinhte_XenTag_getImplodedTagsFromThread', array(
'0' => $thread,
'1' => '1'
)) . '
		';
}
$__compilerVar6 .= '
	</div>
';
}
$__output .= $__compilerVar6;
unset($__compilerVar5, $__compilerVar6);
$__output .= '
    ';
}
$__output .= '
</div>';
