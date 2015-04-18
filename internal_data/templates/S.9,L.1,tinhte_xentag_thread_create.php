<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
if ($Tinhte_XenTag_canTag)
{
$__output .= '
	<!-- [Tinhte] XenTag / Mark --><!-- slot: after_editor --><!-- [Tinhte] XenTag / Mark -->

	<fieldset>';
$__compilerVar1 = '';
$this->addRequiredExternal('js', 'js/Tinhte/XenTag/frontend.js');
$__compilerVar1 .= '
';
$this->addRequiredExternal('css', 'tinhte_xentag');
$__compilerVar1 .= '

<dl class="ctrlUnit">
	<dt><label for="ctrl_tinhte_xentag_tags">' . 'Tags' . ':</label></dt>
	<dd>
		<ul class="Tinhte_XenTag_TagsEditor" data-varname="tinhte_xentag_tags[]">
			<li>
				<input type="text"
					name="tinhte_xentag_tags_text"
					value="' . XenForo_Template_Helper_Core::callHelper('Tinhte_XenTag_getImplodedTagsFromThread', array(
'0' => $thread
)) . '"
					id="ctrl_tinhte_xentag_tags"
					class="textCtrl AutoComplete AcSingle Tinhte_XenTag_TagNewInput"
					data-acUrl="' . XenForo_Template_Helper_Core::link('tags/find', false, array()) . '"
					/>
			</li>
		</ul>
		<p class="explain">' . 'Enter list of tags, separated by comma.' . '</p>
		<input type="hidden" name="tinhte_xentag_included" value="1" />
	</dd>
</dl>';
$__output .= $__compilerVar1;
unset($__compilerVar1);
$__output .= '</fieldset>
';
}
$__output .= '

';
$__compilerVar2 = '';
if (isset($forum['Tinhte_XenTag_maximumHashtags']))
{
$__compilerVar2 .= '
	';
$__extraData['head']['Tinhte_XenTag_maximumHashtags'] = '';
$__extraData['head']['Tinhte_XenTag_maximumHashtags'] .= '<script type="text/javascript">
window.Tinhte_XenTag_maximumHashtags = parseInt(\'' . htmlspecialchars($forum['Tinhte_XenTag_maximumHashtags'], ENT_QUOTES, 'UTF-8') . '\');
</script>';
$__compilerVar2 .= '
';
}
$__output .= $__compilerVar2;
unset($__compilerVar2);
