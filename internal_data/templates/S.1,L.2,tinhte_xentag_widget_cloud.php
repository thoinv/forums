<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__compilerVar3 = '';
$__compilerVar3 .= '
            ';
$__compilerVar4 = '';
$__compilerVar4 .= '
            	<li class="Tinhte_XenTag_TagCloudTag Tinhte_XenTag_TagCloud_Level{TAG_LEVEL}"><a href="{TAG_LINK}">{TAG_TEXT}</a></li>
            ';
$__compilerVar3 .= $this->callTemplateHook('tinhte_xentag_tag_cloud_item', $__compilerVar4, array(
'max' => $widget['options']['limit']
));
unset($__compilerVar4);
$__compilerVar3 .= '
        ';
if (trim($__compilerVar3) !== '')
{
$__output .= '
    ';
$this->addRequiredExternal('css', 'tinhte_xentag');
$__output .= '
    
    <ul class="Tinhte_XenTag_TagCloud cloud">
        ' . $__compilerVar3 . '
    </ul>
';
}
unset($__compilerVar3);
