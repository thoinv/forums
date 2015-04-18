<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$this->addRequiredExternal('js', 'js/waindigo/tabs/existing_tab.js');
$__output .= '

';
$this->addRequiredExternal('css', 'waindigo_select_existing_tabs');
$__output .= '

<div id="TabsContentIdSelect">
	<dl class="ctrlUnit ExistingTabForm" data-select=".ForumSelector">
		<dt><label for="ctrl_node_id">' . 'Diễn đàn' . ':</label></dt>
		<dd><select name="node_id" class="textCtrl ForumSelector" id="ctrl_node_id"
			data-href="' . XenForo_Template_Helper_Core::link('threads/select-existing-tab', false, array()) . '" data-target="#TabsThreadIdSelect">
			';
foreach ($forums AS $nodeId => $forum)
{
$__output .= '
				<option value="' . htmlspecialchars($nodeId, ENT_QUOTES, 'UTF-8') . '">' . htmlspecialchars($forum['title'], ENT_QUOTES, 'UTF-8') . '</option>
			';
}
$__output .= '
		</select></dd>
	</dl>
	
	<div id="TabsThreadIdSelect"></div>
</div>';
