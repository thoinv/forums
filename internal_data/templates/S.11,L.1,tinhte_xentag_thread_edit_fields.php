<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$this->addRequiredExternal('js', 'js/Tinhte/XenTag/frontend.js');
$__output .= '
';
$this->addRequiredExternal('css', 'tinhte_xentag');
$__output .= '

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
