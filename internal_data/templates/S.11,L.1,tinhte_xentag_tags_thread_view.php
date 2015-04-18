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
    </div>
';
}
else
{
$__output .= '
    ';
$__compilerVar2 = '';
$__compilerVar2 .= XenForo_Template_Helper_Core::callHelper('Tinhte_XenTag_getImplodedTagsFromThread', array(
'0' => $thread,
'1' => '1'
));
if (trim($__compilerVar2) !== '')
{
$__output .= '
        <div class="sectionMain Tinhte_XenTag_Tags_ThreadView">
    		<label>' . 'Tags' . '</label>:
    		' . $__compilerVar2 . '
    	</div>
    ';
}
unset($__compilerVar2);
$__output .= '
';
}
