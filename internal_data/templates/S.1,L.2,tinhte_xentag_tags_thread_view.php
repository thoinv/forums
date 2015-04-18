<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
if ($Tinhte_XenTag_canEdit)
{
$__output .= '
    ';
$this->addRequiredExternal('js', 'js/Tinhte/XenTag/frontend.js');
$__output .= '
	';
$this->addRequiredExternal('css', 'tinhte_xentag');
$__output .= '

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
$__output .= '
			    ' . $__compilerVar3 . '
            ';
}
else
{
$__output .= '
                ' . 'No tags' . '
            ';
}
unset($__compilerVar3);
$__output .= '
			(<a class="Tinhte_XenTag_Trigger" href="' . XenForo_Template_Helper_Core::link('threads/edit-tags', $thread, array()) . '">' . 'Edit Tags' . '</a>)
		</div>
    </div>
';
}
else
{
$__output .= '
    ';
$__compilerVar4 = '';
$__compilerVar4 .= XenForo_Template_Helper_Core::callHelper('Tinhte_XenTag_getImplodedTagsFromThread', array(
'0' => $thread,
'1' => '1'
));
if (trim($__compilerVar4) !== '')
{
$__output .= '
        <div class="sectionMain Tinhte_XenTag_Tags_ThreadView">
    		<label>' . 'Tags' . '</label>:
    		' . $__compilerVar4 . '
    	</div>
    ';
}
unset($__compilerVar4);
$__output .= '
';
}
