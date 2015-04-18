<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__compilerVar1 = '';
$__compilerVar1 .= '
					';
$__compilerVar2 = '';
$__compilerVar2 .= '
						<li class="Tinhte_XenTag_TagCloudTag Tinhte_XenTag_TagCloud_Level{TAG_LEVEL}"><a href="{TAG_LINK}">{TAG_TEXT}</a></li>
					';
$__compilerVar1 .= $this->callTemplateHook('tinhte_xentag_tag_cloud_item', $__compilerVar2, array(
'max' => XenForo_Template_Helper_Core::callHelper('Tinhte_XenTag_getOption', array(
'0' => 'cloudMax'
))
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

	<div class="section Tinhte_XenTag_SidebarCloud Tinhte_XenTag_TagCloud">
		<div class="secondaryContent">
			<h3><a href="' . XenForo_Template_Helper_Core::link('tags', false, array()) . '">' . 'Tag Cloud' . '</a></h3>
			<ul>
				' . $__compilerVar1 . '
			</ul>
		</div>
	</div>
';
}
unset($__compilerVar1);
