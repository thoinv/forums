<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__compilerVar1 = '';
$__compilerVar1 .= '
            ';
$__compilerVar2 = '';
$__compilerVar2 .= '
            	<li class="Tinhte_XenTag_TagCloudTag Tinhte_XenTag_TagCloud_Level{TAG_LEVEL}"><a href="{TAG_LINK}">{TAG_TEXT}</a></li>
            ';
$__compilerVar1 .= $this->callTemplateHook('tinhte_xentag_tag_cloud_item', $__compilerVar2, array(
'max' => $widget['options']['limit']
));
unset($__compilerVar2);
$__compilerVar1 .= '
        ';
if (trim($__compilerVar1) !== '')
{
$__output .= '
    ';
$this->addRequiredExternal('css', 'tinhte_xentag');
$__output .= '
    
    <ul class="Tinhte_XenTag_TagCloud cloud">
        ' . $__compilerVar1 . '
    </ul>
';
}
unset($__compilerVar1);
