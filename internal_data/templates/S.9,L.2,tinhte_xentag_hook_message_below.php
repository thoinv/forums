<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
if (XenForo_Template_Helper_Core::callHelper('Tinhte_XenTag_getOption', array(
'0' => 'displayPosition'
)) == ('post_below'))
{
$__output .= '
	';
if ($post['post_id'] == $thread['first_post_id'])
{
$__output .= '
		

		';
$__compilerVar5 = '';
$__compilerVar5 .= '
				';
$__compilerVar6 = '';
if ($Tinhte_XenTag_canEdit)
{
$__compilerVar6 .= '
    ';
$this->addRequiredExternal('js', 'js/Tinhte/XenTag/frontend.js');
$__compilerVar6 .= '
	';
$this->addRequiredExternal('css', 'tinhte_xentag');
$__compilerVar6 .= '

    <div class="sectionMain Tinhte_XenTag_Tags_ThreadView">
        <div class="Tinhte_XenTag_TagsInlineEditor" data-template="tags_thread_view">
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
    </div>
';
}
else
{
$__compilerVar6 .= '
    ';
$__compilerVar8 = '';
$__compilerVar8 .= XenForo_Template_Helper_Core::callHelper('Tinhte_XenTag_getImplodedTagsFromThread', array(
'0' => $thread,
'1' => '1'
));
if (trim($__compilerVar8) !== '')
{
$__compilerVar6 .= '
        <div class="sectionMain Tinhte_XenTag_Tags_ThreadView">
    		<label>' . 'Tags' . '</label>:
    		' . $__compilerVar8 . '
    	</div>
    ';
}
unset($__compilerVar8);
$__compilerVar6 .= '
';
}
$__compilerVar5 .= $__compilerVar6;
unset($__compilerVar6);
$__compilerVar5 .= '
			';
if (trim($__compilerVar5) !== '')
{
$__output .= '
			<div style="clear: both; height: 0px;">&nbsp;</div>
			' . $__compilerVar5 . '
		';
}
unset($__compilerVar5);
$__output .= '
	';
}
$__output .= '
';
}
