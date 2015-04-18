<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__extraData['title'] = '';
$__extraData['title'] .= 'Browsing Preferences';
$__output .= '

';
$this->addRequiredExternal('css', 'account');
$__output .= '

<form method="post" class="xenForm formOverlay NoFixedOverlay AutoValidator"
	action="' . XenForo_Template_Helper_Core::link('account/preferences-save', false, array()) . '"
	data-fieldValidatorUrl="' . XenForo_Template_Helper_Core::link('account/validate-field.json', false, array()) . '"
	data-redirect="yes">

	<!--<h3 class="sectionHeader">' . 'Appearance' . '</h3>-->
	';
$__compilerVar1 = '';
$__compilerVar1 .= '
	';
if ($canChangeStyle)
{
$__compilerVar1 .= '	
		<dl class="ctrlUnit">
			<dt><label for="ctrl_style_id">' . 'Style' . ':</label></dt>
			<dd>
				<select name="style_id" class="textCtrl OptOut" id="ctrl_style_id" autofocus="on">
					<option value="0">(' . 'Use default style' . ': ' . htmlspecialchars($defaultStyle['title'], ENT_QUOTES, 'UTF-8') . ')</option>
					<optgroup label="' . 'Styles' . ':">
					';
foreach ($styles AS $styleId => $style)
{
$__compilerVar1 .= '
						';
if ($style['user_selectable'] OR $visitor['is_admin'])
{
$__compilerVar1 .= '
							<option value="' . htmlspecialchars($styleId, ENT_QUOTES, 'UTF-8') . '" class="' . htmlspecialchars($style['depthClass'], ENT_QUOTES, 'UTF-8') . '" ' . (($styleId == $visitor['style_id']) ? ' selected="selected"' : '') . '>' . htmlspecialchars($style['depthPrefix'], ENT_QUOTES, 'UTF-8') . htmlspecialchars($style['title'], ENT_QUOTES, 'UTF-8') . ((!$style['user_selectable']) ? (' *') : ('')) . '</option>
						';
}
$__compilerVar1 .= '
					';
}
$__compilerVar1 .= '
					</optgroup>
				</select>
				<p class="explain">' . 'You may view the site in any of the styles provided here.' . '</p>
			</dd>
		</dl>
	';
}
else
{
$__compilerVar1 .= '
		<input type="hidden" name="style_id" value="' . htmlspecialchars($visitor['style_id'], ENT_QUOTES, 'UTF-8') . '" />
	';
}
$__compilerVar1 .= '
	';
$__output .= $this->callTemplateHook('account_preferences_appearance', $__compilerVar1, array());
unset($__compilerVar1);
$__output .= '


	<h3 class="sectionHeader">' . 'Locale' . '</h3>
	<fieldset>
	';
$__compilerVar2 = '';
$__compilerVar2 .= '
	
	';
if ($canChangeLanguage)
{
$__compilerVar2 .= '
		<dl class="ctrlUnit">
			<dt><label for="ctrl_language_id">' . 'Language' . ':</label></dt>
			<dd>
				<select name="language_id" class="textCtrl" id="ctrl_language_id">
					';
foreach ($languages AS $languageId => $language)
{
$__compilerVar2 .= '
						<option value="' . htmlspecialchars($languageId, ENT_QUOTES, 'UTF-8') . '" ' . (($languageId == $visitor['effectiveLanguageId']) ? ' selected="selected"' : '') . '>' . htmlspecialchars($language['title'], ENT_QUOTES, 'UTF-8') . '</option>
					';
}
$__compilerVar2 .= '
				</select>
				<p class="explain">' . 'The interface of this site can be displayed to you using any of the languages you may pick here.' . '</p>
			</dd>
		</dl>
	';
}
else
{
$__compilerVar2 .= '
		<input type="hidden" name="language_id" value="' . htmlspecialchars($visitor['effectiveLanguageId'], ENT_QUOTES, 'UTF-8') . '" />
	';
}
$__compilerVar2 .= '

	<dl class="ctrlUnit">
		<dt><label for="ctrl_timezone">' . 'Time Zone' . ':</label></dt>
		<dd>
			<select name="timezone" class="textCtrl" id="ctrl_timezone">
				';
foreach ($timeZones AS $identifier => $name)
{
$__compilerVar2 .= '
					<option value="' . htmlspecialchars($identifier, ENT_QUOTES, 'UTF-8') . '" ' . (($identifier == $visitor['timezone']) ? ' selected="selected"' : '') . '>' . htmlspecialchars($name, ENT_QUOTES, 'UTF-8') . '</option>
				';
}
$__compilerVar2 .= '
			</select>
		</dd>
	</dl>
	';
$__output .= $this->callTemplateHook('account_preferences_locale', $__compilerVar2, array());
unset($__compilerVar2);
$__output .= '
	</fieldset>
	
	<h3 class="sectionHeader">' . 'Options' . '</h3>
	
	';
$__compilerVar3 = '';
$__compilerVar3 .= '
	<dl class="ctrlUnit">
		<dt></dt>
		<dd>
			<ul>
				<li><label><input type="checkbox" name="default_watch_state" value="1" class="Disabler" id="ctrl_default_watch_state" ' . (($visitor['default_watch_state']) ? ' checked="checked"' : '') . ' />
					' . 'Automatically watch threads that you create or when you reply' . '...</label>
					<ul id="ctrl_default_watch_state_Disabler">
						<li><label><input type="checkbox" name="default_watch_state_email" value="1" ' . (($visitor['default_watch_state'] == ('watch_email')) ? ' checked="checked"' : '') . ' />
							' . 'and receive email notifications of replies' . '</label></li>
					</ul></li>				
				<li><label for="ctrl_show_notification_popup"><input type="checkbox" name="show_notification_popup" id="ctrl_show_notification_popup" value="1" ' . (($visitor['show_notification_popup']) ? ' checked="checked"' : '') . ' /> ' . 'Show new alerts and messages as pop ups' . '</label></li>
<li><label for="ctrl_enable_rte"><input type="checkbox" name="enable_rte" value="1" id="ctrl_enable_rte" ' . (($visitor['enable_rte']) ? ' checked="checked"' : '') . ' />
					' . 'Use the rich text editor to create and edit messages' . '</label></li>
				';
if ($xenOptions['swfUpload'])
{
$__compilerVar3 .= '
					<li><label for="ctrl_enable_flash_uploader"><input type="checkbox" name="enable_flash_uploader" value="1" id="ctrl_enable_flash_uploader" ' . (($visitor['enable_flash_uploader']) ? ' checked="checked"' : '') . ' />
						' . 'Use the Flash-based uploader to upload attachments' . '</label></li>	
				';
}
$__compilerVar3 .= '
				<li><label for="ctrl_content_show_signature"><input type="checkbox" name="content_show_signature" value="1" id="ctrl_content_show_signature" ' . (($visitor['content_show_signature']) ? ' checked="checked"' : '') . ' />
					' . 'Show people\'s signatures with their messages' . '</label></li>				
				<li>
					<label for="ctrl_visible"><input type="checkbox" name="visible" value="1" id="ctrl_visible" class="OptOut Disabler" ' . (($visitor['visible']) ? ' checked="checked"' : '') . ' /> ' . 'Show your online status' . '</label>
					<p class="hint">' . 'This will allow other people to see when you are online.' . '</p>
					<ul id="ctrl_visible_Disabler">
						<li>
							<label><input type="checkbox" name="activity_visible" value="1" class="OptOut" ' . (($visitor['activity_visible']) ? ' checked="checked"' : '') . ' /> ' . 'Show your current activity' . '</label>
							<p class="hint">' . 'This will allow other people to see what page you are currently viewing.' . '</p>
						</li>
					</ul>
				</li>
			</ul>
			';
if (!$xenOptions['swfUpload'])
{
$__compilerVar3 .= '
				<input type="hidden" name="enable_flash_uploader" value="' . (($visitor['enable_flash_uploader']) ? ('1') : ('0')) . '" />
			';
}
$__compilerVar3 .= '
		</dd>
	</dl>
	
	';
$__compilerVar4 = '';
foreach ($customFields AS $field)
{
$__compilerVar4 .= '
	';
if ($field['isEditable'])
{
$__compilerVar4 .= '
		';
$__compilerVar5 = '';
if (!$customFieldInputName)
{
$customFieldInputName = 'custom_fields';
}
$__compilerVar5 .= '
<dl class="ctrlUnit customFieldEdit' . htmlspecialchars($field['field_id'], ENT_QUOTES, 'UTF-8') . ' ' . htmlspecialchars($customFieldExtraClass, ENT_QUOTES, 'UTF-8') . '">
	<dt>
		<label for="ctrl_custom_field_' . htmlspecialchars($field['field_id'], ENT_QUOTES, 'UTF-8') . '">' . htmlspecialchars($field['title'], ENT_QUOTES, 'UTF-8') . ':</label>
		';
if ($field['required'])
{
$__compilerVar5 .= '<dfn>' . 'Required' . '</dfn>';
}
$__compilerVar5 .= '
	</dt>
	<dd>
		';
if ($field['field_type'] == ('textbox'))
{
$__compilerVar5 .= '
			<input type="text" name="' . htmlspecialchars($customFieldInputName, ENT_QUOTES, 'UTF-8') . '[' . htmlspecialchars($field['field_id'], ENT_QUOTES, 'UTF-8') . ']" value="' . htmlspecialchars($field['field_value'], ENT_QUOTES, 'UTF-8') . '" 
				id="ctrl_custom_field_' . htmlspecialchars($field['field_id'], ENT_QUOTES, 'UTF-8') . '"
				data-validatorname="custom_field_' . htmlspecialchars($field['field_id'], ENT_QUOTES, 'UTF-8') . '"
				class="textCtrl" maxlength="' . (($field['max_length']) ? (htmlspecialchars($field['max_length'], ENT_QUOTES, 'UTF-8')) : ('')) . '" 
			/>
		';
}
else if ($field['field_type'] == ('textarea'))
{
$__compilerVar5 .= '
			<textarea name="' . htmlspecialchars($customFieldInputName, ENT_QUOTES, 'UTF-8') . '[' . htmlspecialchars($field['field_id'], ENT_QUOTES, 'UTF-8') . ']" 
				id="ctrl_custom_field_' . htmlspecialchars($field['field_id'], ENT_QUOTES, 'UTF-8') . '"
				data-validatorname="custom_field_' . htmlspecialchars($field['field_id'], ENT_QUOTES, 'UTF-8') . '" 
				class="textCtrl Elastic">' . htmlspecialchars($field['field_value'], ENT_QUOTES, 'UTF-8') . '</textarea>
		';
}
else if ($field['field_type'] == ('bbcode'))
{
$__compilerVar5 .= '
			';
if ($field['editorTemplateHtml'])
{
$__compilerVar5 .= '
				' . $field['editorTemplateHtml'] . '
			';
}
else
{
$__compilerVar5 .= '
				<textarea name="custom_fields[' . htmlspecialchars($field['field_id'], ENT_QUOTES, 'UTF-8') . ']" 
					id="ctrl_custom_field_' . htmlspecialchars($field['field_id'], ENT_QUOTES, 'UTF-8') . '"
					data-validatorname="custom_field_' . htmlspecialchars($field['field_id'], ENT_QUOTES, 'UTF-8') . '" 
					class="textCtrl Elastic">' . htmlspecialchars($field['field_value'], ENT_QUOTES, 'UTF-8') . '</textarea>
			';
}
$__compilerVar5 .= '
';
}
else if ($field['field_type'] == ('radio'))
{
$__compilerVar5 .= '
			<ul class="checkboxColumns">
			';
if (!$field['required'])
{
$__compilerVar5 .= '
				<li><label><input type="radio" name="' . htmlspecialchars($customFieldInputName, ENT_QUOTES, 'UTF-8') . '[' . htmlspecialchars($field['field_id'], ENT_QUOTES, 'UTF-8') . ']" value="" ' . (($field['field_value'] == ('')) ? ' checked="checked"' : '') . ' /> <span class="muted">' . 'No selection' . '</span></label></li>
			';
}
$__compilerVar5 .= '
			';
foreach ($field['fieldChoices'] AS $choice => $text)
{
$__compilerVar5 .= '
				<li><label><input type="radio" name="' . htmlspecialchars($customFieldInputName, ENT_QUOTES, 'UTF-8') . '[' . htmlspecialchars($field['field_id'], ENT_QUOTES, 'UTF-8') . ']" value="' . htmlspecialchars($choice, ENT_QUOTES, 'UTF-8') . '" ' . (($field['field_value'] == $choice) ? ' checked="checked"' : '') . ' /> ' . $text . '</label></li>
			';
}
$__compilerVar5 .= '
			</ul>
		';
}
else if ($field['field_type'] == ('select'))
{
$__compilerVar5 .= '
			<select name="' . htmlspecialchars($customFieldInputName, ENT_QUOTES, 'UTF-8') . '[' . htmlspecialchars($field['field_id'], ENT_QUOTES, 'UTF-8') . ']" id="ctrl_custom_field_' . htmlspecialchars($field['field_id'], ENT_QUOTES, 'UTF-8') . '" class="textCtrl">
			';
if (!$field['required'] OR !$field['hasValue'])
{
$__compilerVar5 .= '
				<option value="">&nbsp;</option>
			';
}
$__compilerVar5 .= '
			';
foreach ($field['fieldChoices'] AS $choice => $text)
{
$__compilerVar5 .= '
				<option value="' . htmlspecialchars($choice, ENT_QUOTES, 'UTF-8') . '" ' . (($field['field_value'] == $choice) ? ' selected="selected"' : '') . '>' . $text . '</option>
			';
}
$__compilerVar5 .= '
			</select>
		';
}
else if ($field['field_type'] == ('checkbox'))
{
$__compilerVar5 .= '
			<ul class="checkboxColumns">
			';
foreach ($field['fieldChoices'] AS $choice => $text)
{
$__compilerVar5 .= '
				<li><label><input type="checkbox" name="' . htmlspecialchars($customFieldInputName, ENT_QUOTES, 'UTF-8') . '[' . htmlspecialchars($field['field_id'], ENT_QUOTES, 'UTF-8') . '][' . htmlspecialchars($choice, ENT_QUOTES, 'UTF-8') . ']" value="' . htmlspecialchars($choice, ENT_QUOTES, 'UTF-8') . '" ' . ((isset($field['field_value'][$choice])) ? ' checked="checked"' : '') . ' /> ' . $text . '</label></li>
			';
}
$__compilerVar5 .= '
			</ul>
		';
}
else if ($field['field_type'] == ('multiselect'))
{
$__compilerVar5 .= '
			<select name="' . htmlspecialchars($customFieldInputName, ENT_QUOTES, 'UTF-8') . '[' . htmlspecialchars($field['field_id'], ENT_QUOTES, 'UTF-8') . '][]" id="ctrl_custom_field_' . htmlspecialchars($field['field_id'], ENT_QUOTES, 'UTF-8') . '" class="textCtrl" size="7" multiple="multiple">
			';
if (!$field['required'] OR !$field['hasValue'])
{
$__compilerVar5 .= '
				<option value="">&nbsp;</option>
			';
}
$__compilerVar5 .= '
			';
foreach ($field['fieldChoices'] AS $choice => $text)
{
$__compilerVar5 .= '
				<option value="' . htmlspecialchars($choice, ENT_QUOTES, 'UTF-8') . '" ' . ((isset($field['field_value'][$choice])) ? ' selected="selected"' : '') . '>' . $text . '</option>
			';
}
$__compilerVar5 .= '
			</select>
		';
}
$__compilerVar5 .= '

		';
$__compilerVar6 = '';
$__compilerVar6 .= $field['description'];
if (trim($__compilerVar6) !== '')
{
$__compilerVar5 .= '<p class="explain">' . $__compilerVar6 . '</p>';
}
unset($__compilerVar6);
$__compilerVar5 .= '
		<input type="hidden" name="custom_fields_shown[]" value="' . htmlspecialchars($field['field_id'], ENT_QUOTES, 'UTF-8') . '" />
	</dd>
</dl>';
$__compilerVar4 .= $__compilerVar5;
unset($__compilerVar5);
$__compilerVar4 .= '
	';
}
$__compilerVar4 .= '
';
}
$__compilerVar3 .= $__compilerVar4;
unset($__compilerVar4);
$__compilerVar3 .= '
		
	';
$__output .= $this->callTemplateHook('account_preferences_options', $__compilerVar3, array());
unset($__compilerVar3);
$__output .= '
	
	';
if ($xenOptions['enableNotices'] AND $showNoticeReset)
{
$__output .= '
	<h3 class="sectionHeader">' . 'Notices' . '</h3>
	
	<dl class="ctrlUnit">
		<dt></dt>
		<dd>
			<ul>
				<li><label><input type="checkbox" name="restore_notices" value="1" />
					' . 'Restore dismissed notices' . '</label>
					<p class="hint">' . 'Any notices you have previously dismissed will be restored to view if you check this option.' . '</p></li>
			</ul>
		</dd>
	</dl>
	';
}
$__output .= '

	<dl class="ctrlUnit submitUnit">
		<dt></dt>
		<dd><input type="submit" name="save" value="' . 'Save Changes' . '" accesskey="s" class="button primary" /></dd>
	</dl>

	<input type="hidden" name="_xfToken" value="' . htmlspecialchars($visitor['csrf_token_page'], ENT_QUOTES, 'UTF-8') . '" />
</form>';
