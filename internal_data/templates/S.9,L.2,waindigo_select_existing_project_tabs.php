<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$this->addRequiredExternal('js', 'js/waindigo/tabs/existing_tab.js');
$__output .= '

';
$this->addRequiredExternal('css', 'waindigo_select_existing_tabs');
$__output .= '

<div id="TabsContentIdSelect">
	<dl class="ctrlUnit">
		<dt><label for="ctrl_content_id2">' . 'waindigo_project_freeagent' . ':</label></dt>
		<dd><select name="content_id2" class="textCtrl" id="ctrl_content_id2">
			';
foreach ($projects AS $projectId => $project)
{
$__output .= '
				<option value="' . htmlspecialchars($projectId, ENT_QUOTES, 'UTF-8') . '">' . htmlspecialchars($project['name'], ENT_QUOTES, 'UTF-8') . '</option>
			';
}
$__output .= '
		</select></dd>
	</dl>
</div>';
