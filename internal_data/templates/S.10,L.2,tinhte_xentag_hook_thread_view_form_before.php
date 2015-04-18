<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
if (XenForo_Template_Helper_Core::callHelper('Tinhte_XenTag_getOption', array(
'0' => 'displayPosition'
)) == ('thread_messages_above'))
{
$__output .= '
	';
$__compilerVar4 = '';
if ($Tinhte_XenTag_canEdit)
{
$__compilerVar4 .= '
    ';
$this->addRequiredExternal('js', 'js/Tinhte/XenTag/frontend.js');
$__compilerVar4 .= '
	';
$this->addRequiredExternal('css', 'tinhte_xentag');
$__compilerVar4 .= '

    <div class="sectionMain Tinhte_XenTag_Tags_ThreadView">
        <div class="Tinhte_XenTag_TagsInlineEditor" data-template="tags_thread_view">
			<label>' . 'Tags' . '</label>:
            ';
$__compilerVar5 = '';
$__compilerVar5 .= XenForo_Template_Helper_Core::callHelper('Tinhte_XenTag_getImplodedTagsFromThread', array(
'0' => $thread,
'1' => '1'
));
if (trim($__compilerVar5) !== '')
{
$__compilerVar4 .= '
			    ' . $__compilerVar5 . '
            ';
}
else
{
$__compilerVar4 .= '
                ' . 'No tags' . '
            ';
}
unset($__compilerVar5);
$__compilerVar4 .= '
			(<a class="Tinhte_XenTag_Trigger" href="' . XenForo_Template_Helper_Core::link('threads/edit-tags', $thread, array()) . '">' . 'Edit Tags' . '</a>)
		</div>
    </div>
';
}
else
{
$__compilerVar4 .= '
    ';
$__compilerVar6 = '';
$__compilerVar6 .= XenForo_Template_Helper_Core::callHelper('Tinhte_XenTag_getImplodedTagsFromThread', array(
'0' => $thread,
'1' => '1'
));
if (trim($__compilerVar6) !== '')
{
$__compilerVar4 .= '
        <div class="sectionMain Tinhte_XenTag_Tags_ThreadView">
    		<label>' . 'Tags' . '</label>:
    		' . $__compilerVar6 . '
    	</div>
    ';
}
unset($__compilerVar6);
$__compilerVar4 .= '
';
}
$__output .= $__compilerVar4;
unset($__compilerVar4);
$__output .= '
';
}
