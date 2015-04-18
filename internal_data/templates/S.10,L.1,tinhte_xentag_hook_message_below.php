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
$__compilerVar1 = '';
$__compilerVar1 .= '
				';
$__compilerVar2 = '';
if ($Tinhte_XenTag_canEdit)
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
$__compilerVar1 .= $__compilerVar2;
unset($__compilerVar2);
$__compilerVar1 .= '
			';
if (trim($__compilerVar1) !== '')
{
$__output .= '
			<div style="clear: both; height: 0px;">&nbsp;</div>
			' . $__compilerVar1 . '
		';
}
unset($__compilerVar1);
$__output .= '
	';
}
$__output .= '
';
}
