<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__output .= '

';
if ($Tinhte_XenTag_canEdit)
{
$__output .= '
	<div class="Tinhte_XenTag_TagEdit editBlock">
		<label for="ctrl_tinhte_xentag_tags_' . htmlspecialchars($thread['thread_id'], ENT_QUOTES, 'UTF-8') . '">' . 'Tags' . ':
			<input type="text"
				name="tinhte_xentag_tags_text"
				value="' . XenForo_Template_Helper_Core::callHelper('Tinhte_XenTag_getImplodedTagsFromThread', array(
'0' => $thread
)) . '"
				id="ctrl_tinhte_xentag_tags_' . htmlspecialchars($thread['thread_id'], ENT_QUOTES, 'UTF-8') . '"
				class="textCtrl AutoComplete"
				data-acUrl="' . XenForo_Template_Helper_Core::link('tags/find', false, array()) . '"
				/>
			<input type="hidden" name="tinhte_xentag_included" value="1" />
		</label>
	</div>

	<!-- [Tinhte] XenTag / Mark --><div class="buttons editBlock"><!-- [Tinhte] XenTag / Mark -->
';
}
