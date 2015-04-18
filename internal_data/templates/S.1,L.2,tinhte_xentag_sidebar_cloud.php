<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__compilerVar3 = '';
$__compilerVar3 .= '
					';
$__compilerVar4 = '';
$__compilerVar4 .= '
						<li class="Tinhte_XenTag_TagCloudTag Tinhte_XenTag_TagCloud_Level{TAG_LEVEL}"><a href="{TAG_LINK}">{TAG_TEXT}</a></li>
					';
$__compilerVar3 .= $this->callTemplateHook('tinhte_xentag_tag_cloud_item', $__compilerVar4, array(
'max' => XenForo_Template_Helper_Core::callHelper('Tinhte_XenTag_getOption', array(
'0' => 'cloudMax'
))
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

	<div class="section Tinhte_XenTag_SidebarCloud Tinhte_XenTag_TagCloud">
		<div class="secondaryContent">
			<h3><a href="' . XenForo_Template_Helper_Core::link('tags', false, array()) . '">' . 'Tag Cloud' . '</a></h3>
			<ul>
				' . $__compilerVar3 . '
			</ul>
		</div>
	</div>
';
}
unset($__compilerVar3);
