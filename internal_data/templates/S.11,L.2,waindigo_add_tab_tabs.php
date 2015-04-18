<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__extraData['title'] = '';
$__extraData['title'] .= 'Add Tab to ' . htmlspecialchars($title, ENT_QUOTES, 'UTF-8') . '';
$__output .= '

';
if ($xenOptions['waindigo_tabs_selectExistingContentMethod'] == ('urlfield'))
{
$__output .= '
	<form action="' . XenForo_Template_Helper_Core::link('tabs/add', false, array()) . '" method="post" class="xenForm formOverlay overlayScroll AutoValidator" data-redirect="on">

	<dl class="ctrlUnit">
		<dt><label for="ctrl_existing_url">' . 'Existing URL' . ':</label></dt>
		<dd><input name="existing_url" class="textCtrl" id="ctrl_existing_url" /></dd>
	</dl>
';
}
else
{
$__output .= '
	';
$this->addRequiredExternal('js', 'js/waindigo/tabs/existing_tab.js');
$__output .= '
	
	';
$this->addRequiredExternal('css', 'waindigo_select_existing_tabs');
$__output .= '
	
	<form action="' . XenForo_Template_Helper_Core::link('tabs/add', false, array()) . '" method="post" class="xenForm formOverlay overlayScroll ExistingTabForm AutoValidator"
	data-select=".ExistingTabContentType" data-redirect="on">

	<dl class="ctrlUnit">
		<dt><label for="ctrl_content_type2">' . 'Content Type' . ':</label></dt>
		<dd><select name="content_type2" class="textCtrl ExistingTabContentType" id="ctrl_content_type2"
			data-href="' . XenForo_Template_Helper_Core::link('tabs/select-existing-tab', false, array()) . '" data-target="#TabsContentIdSelect">
			';
foreach ($contentTypes AS $_contentTypeId => $_contentType)
{
$__output .= '
				<option value="' . htmlspecialchars($_contentTypeId, ENT_QUOTES, 'UTF-8') . '">' . htmlspecialchars($_contentType, ENT_QUOTES, 'UTF-8') . '</option>
			';
}
$__output .= '
		</select></dd>
	</dl>
	
	<div id="TabsContentIdSelect"></div>
';
}
$__output .= '

	<dl class="ctrlUnit submitUnit">
		<dt></dt>
		<dd><input type="submit" value="' . 'Add Tab' . '" accesskey="s" class="button primary" /></dd>
	</dl>

	<input type="hidden" name="content_type1" value="' . htmlspecialchars($contentType, ENT_QUOTES, 'UTF-8') . '" />
	<input type="hidden" name="content_id1" value="' . htmlspecialchars($contentId, ENT_QUOTES, 'UTF-8') . '" />

	<input type="hidden" name="redirect" value="' . htmlspecialchars($redirect, ENT_QUOTES, 'UTF-8') . '" />

	<input type="hidden" name="_xfToken" value="' . htmlspecialchars($visitor['csrf_token_page'], ENT_QUOTES, 'UTF-8') . '" />
</form>';
