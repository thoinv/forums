<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__extraData['title'] = '';
$__extraData['title'] .= 'Tùy chọn xem diễn đàn';
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
$__compilerVar7 = '';
$__compilerVar7 .= '
	';
if ($canChangeStyle)
{
$__compilerVar7 .= '	
		<dl class="ctrlUnit">
			<dt><label for="ctrl_style_id">' . 'Giao diện' . ':</label></dt>
			<dd>
				<select name="style_id" class="textCtrl OptOut" id="ctrl_style_id" autofocus="on">
					<option value="0">(' . 'Dùng giao diện mặc định' . ': ' . htmlspecialchars($defaultStyle['title'], ENT_QUOTES, 'UTF-8') . ')</option>
					<optgroup label="' . 'Các giao diện' . ':">
					';
foreach ($styles AS $styleId => $style)
{
$__compilerVar7 .= '
						';
if ($style['user_selectable'] OR $visitor['is_admin'])
{
$__compilerVar7 .= '
							<option value="' . htmlspecialchars($styleId, ENT_QUOTES, 'UTF-8') . '" class="' . htmlspecialchars($style['depthClass'], ENT_QUOTES, 'UTF-8') . '" ' . (($styleId == $visitor['style_id']) ? ' selected="selected"' : '') . '>' . htmlspecialchars($style['depthPrefix'], ENT_QUOTES, 'UTF-8') . htmlspecialchars($style['title'], ENT_QUOTES, 'UTF-8') . ((!$style['user_selectable']) ? (' *') : ('')) . '</option>
						';
}
$__compilerVar7 .= '
					';
}
$__compilerVar7 .= '
					</optgroup>
				</select>
				<p class="explain">' . 'Bạn có thể xem diễn đàn trong 1 trong những giao diện cung cấp ở đây.' . '</p>
			</dd>
		</dl>
	';
}
else
{
$__compilerVar7 .= '
		<input type="hidden" name="style_id" value="' . htmlspecialchars($visitor['style_id'], ENT_QUOTES, 'UTF-8') . '" />
	';
}
$__compilerVar7 .= '
	';
$__output .= $this->callTemplateHook('account_preferences_appearance', $__compilerVar7, array());
unset($__compilerVar7);
$__output .= '


	<h3 class="sectionHeader">' . 'Locale' . '</h3>
	<fieldset>
	';
$__compilerVar8 = '';
$__compilerVar8 .= '
	
	';
if ($canChangeLanguage)
{
$__compilerVar8 .= '
		<dl class="ctrlUnit">
			<dt><label for="ctrl_language_id">' . 'Ngôn ngữ' . ':</label></dt>
			<dd>
				<select name="language_id" class="textCtrl" id="ctrl_language_id">
					';
foreach ($languages AS $languageId => $language)
{
$__compilerVar8 .= '
						<option value="' . htmlspecialchars($languageId, ENT_QUOTES, 'UTF-8') . '" ' . (($languageId == $visitor['effectiveLanguageId']) ? ' selected="selected"' : '') . '>' . htmlspecialchars($language['title'], ENT_QUOTES, 'UTF-8') . '</option>
					';
}
$__compilerVar8 .= '
				</select>
				<p class="explain">' . 'Bạn có thể chọn ngôn ngữ sử dụng tại diễn đàn này ở đây.' . '</p>
			</dd>
		</dl>
	';
}
else
{
$__compilerVar8 .= '
		<input type="hidden" name="language_id" value="' . htmlspecialchars($visitor['effectiveLanguageId'], ENT_QUOTES, 'UTF-8') . '" />
	';
}
$__compilerVar8 .= '

	<dl class="ctrlUnit">
		<dt><label for="ctrl_timezone">' . 'Múi giờ' . ':</label></dt>
		<dd>
			<select name="timezone" class="textCtrl" id="ctrl_timezone">
				';
foreach ($timeZones AS $identifier => $name)
{
$__compilerVar8 .= '
					<option value="' . htmlspecialchars($identifier, ENT_QUOTES, 'UTF-8') . '" ' . (($identifier == $visitor['timezone']) ? ' selected="selected"' : '') . '>' . htmlspecialchars($name, ENT_QUOTES, 'UTF-8') . '</option>
				';
}
$__compilerVar8 .= '
			</select>
		</dd>
	</dl>
	';
$__output .= $this->callTemplateHook('account_preferences_locale', $__compilerVar8, array());
unset($__compilerVar8);
$__output .= '
	</fieldset>
	
	<h3 class="sectionHeader">' . 'Tùy chọn' . '</h3>
	
	';
$__compilerVar9 = '';
$__compilerVar9 .= '
	<dl class="ctrlUnit">
		<dt></dt>
		<dd>
			<ul>
				<li><label><input type="checkbox" name="default_watch_state" value="1" class="Disabler" id="ctrl_default_watch_state" ' . (($visitor['default_watch_state']) ? ' checked="checked"' : '') . ' />
					' . 'Tự động theo dõi chủ đề mà bạn tạo hoặc chủ đề bạn trả lời' . '...</label>
					<ul id="ctrl_default_watch_state_Disabler">
						<li><label><input type="checkbox" name="default_watch_state_email" value="1" ' . (($visitor['default_watch_state'] == ('watch_email')) ? ' checked="checked"' : '') . ' />
							' . 'và nhận email nhắc nhở khi có trả lời' . '</label></li>
					</ul></li>				
				<li><label for="ctrl_show_notification_popup"><input type="checkbox" name="show_notification_popup" id="ctrl_show_notification_popup" value="1" ' . (($visitor['show_notification_popup']) ? ' checked="checked"' : '') . ' /> ' . 'Show new alerts and messages as pop ups' . '</label></li>
<li><label for="ctrl_enable_rte"><input type="checkbox" name="enable_rte" value="1" id="ctrl_enable_rte" ' . (($visitor['enable_rte']) ? ' checked="checked"' : '') . ' />
					' . 'Sử dụng bộ soạn thảo trù phú để tạo và sửa bài viết' . '</label></li>
				';
if ($xenOptions['swfUpload'])
{
$__compilerVar9 .= '
					<li><label for="ctrl_enable_flash_uploader"><input type="checkbox" name="enable_flash_uploader" value="1" id="ctrl_enable_flash_uploader" ' . (($visitor['enable_flash_uploader']) ? ' checked="checked"' : '') . ' />
						' . 'Use the Flash-based uploader to upload attachments' . '</label></li>	
				';
}
$__compilerVar9 .= '
				<li><label for="ctrl_content_show_signature"><input type="checkbox" name="content_show_signature" value="1" id="ctrl_content_show_signature" ' . (($visitor['content_show_signature']) ? ' checked="checked"' : '') . ' />
					' . 'Hiện chữ ký của mọi người bên dưới bài viết' . '</label></li>				
				<li>
					<label for="ctrl_visible"><input type="checkbox" name="visible" value="1" id="ctrl_visible" class="OptOut Disabler" ' . (($visitor['visible']) ? ' checked="checked"' : '') . ' /> ' . 'Hiển thị trạng thái trực tuyến' . '</label>
					<p class="hint">' . 'This will allow other people to see when you are online.' . '</p>
					<ul id="ctrl_visible_Disabler">
						<li>
							<label><input type="checkbox" name="activity_visible" value="1" class="OptOut" ' . (($visitor['activity_visible']) ? ' checked="checked"' : '') . ' /> ' . 'Show your current activity' . '</label>
							<p class="hint">' . 'Điều này sẽ cho phép tất cả mọi người nhìn thấy trang nào bạn đang xem.' . '</p>
						</li>
					</ul>
				</li>
			</ul>
			';
if (!$xenOptions['swfUpload'])
{
$__compilerVar9 .= '
				<input type="hidden" name="enable_flash_uploader" value="' . (($visitor['enable_flash_uploader']) ? ('1') : ('0')) . '" />
			';
}
$__compilerVar9 .= '
		</dd>
	</dl>
	
	';
$__compilerVar10 = '';
foreach ($customFields AS $field)
{
$__compilerVar10 .= '
	';
if ($field['isEditable'])
{
$__compilerVar10 .= '
		';
$__compilerVar11 = '';
if (!$customFieldInputName)
{
$customFieldInputName = 'custom_fields';
}
$__compilerVar11 .= '
<dl class="ctrlUnit customFieldEdit' . htmlspecialchars($field['field_id'], ENT_QUOTES, 'UTF-8') . ' ' . htmlspecialchars($customFieldExtraClass, ENT_QUOTES, 'UTF-8') . '">
	<dt>
		<label for="ctrl_custom_field_' . htmlspecialchars($field['field_id'], ENT_QUOTES, 'UTF-8') . '">' . htmlspecialchars($field['title'], ENT_QUOTES, 'UTF-8') . ':</label>
		';
if ($field['required'])
{
$__compilerVar11 .= '<dfn>' . 'Required' . '</dfn>';
}
$__compilerVar11 .= '
	</dt>
	<dd>
		';
if ($field['field_type'] == ('textbox'))
{
$__compilerVar11 .= '
			<input type="text" name="' . htmlspecialchars($customFieldInputName, ENT_QUOTES, 'UTF-8') . '[' . htmlspecialchars($field['field_id'], ENT_QUOTES, 'UTF-8') . ']" value="' . htmlspecialchars($field['field_value'], ENT_QUOTES, 'UTF-8') . '" 
				id="ctrl_custom_field_' . htmlspecialchars($field['field_id'], ENT_QUOTES, 'UTF-8') . '"
				data-validatorname="custom_field_' . htmlspecialchars($field['field_id'], ENT_QUOTES, 'UTF-8') . '"
				class="textCtrl" maxlength="' . (($field['max_length']) ? (htmlspecialchars($field['max_length'], ENT_QUOTES, 'UTF-8')) : ('')) . '" 
			/>
		';
}
else if ($field['field_type'] == ('textarea'))
{
$__compilerVar11 .= '
			<textarea name="' . htmlspecialchars($customFieldInputName, ENT_QUOTES, 'UTF-8') . '[' . htmlspecialchars($field['field_id'], ENT_QUOTES, 'UTF-8') . ']" 
				id="ctrl_custom_field_' . htmlspecialchars($field['field_id'], ENT_QUOTES, 'UTF-8') . '"
				data-validatorname="custom_field_' . htmlspecialchars($field['field_id'], ENT_QUOTES, 'UTF-8') . '" 
				class="textCtrl Elastic">' . htmlspecialchars($field['field_value'], ENT_QUOTES, 'UTF-8') . '</textarea>
		';
}
else if ($field['field_type'] == ('bbcode'))
{
$__compilerVar11 .= '
			';
if ($field['editorTemplateHtml'])
{
$__compilerVar11 .= '
				' . $field['editorTemplateHtml'] . '
			';
}
else
{
$__compilerVar11 .= '
				<textarea name="custom_fields[' . htmlspecialchars($field['field_id'], ENT_QUOTES, 'UTF-8') . ']" 
					id="ctrl_custom_field_' . htmlspecialchars($field['field_id'], ENT_QUOTES, 'UTF-8') . '"
					data-validatorname="custom_field_' . htmlspecialchars($field['field_id'], ENT_QUOTES, 'UTF-8') . '" 
					class="textCtrl Elastic">' . htmlspecialchars($field['field_value'], ENT_QUOTES, 'UTF-8') . '</textarea>
			';
}
$__compilerVar11 .= '
';
}
else if ($field['field_type'] == ('radio'))
{
$__compilerVar11 .= '
			<ul class="checkboxColumns">
			';
if (!$field['required'])
{
$__compilerVar11 .= '
				<li><label><input type="radio" name="' . htmlspecialchars($customFieldInputName, ENT_QUOTES, 'UTF-8') . '[' . htmlspecialchars($field['field_id'], ENT_QUOTES, 'UTF-8') . ']" value="" ' . (($field['field_value'] == ('')) ? ' checked="checked"' : '') . ' /> <span class="muted">' . 'No selection' . '</span></label></li>
			';
}
$__compilerVar11 .= '
			';
foreach ($field['fieldChoices'] AS $choice => $text)
{
$__compilerVar11 .= '
				<li><label><input type="radio" name="' . htmlspecialchars($customFieldInputName, ENT_QUOTES, 'UTF-8') . '[' . htmlspecialchars($field['field_id'], ENT_QUOTES, 'UTF-8') . ']" value="' . htmlspecialchars($choice, ENT_QUOTES, 'UTF-8') . '" ' . (($field['field_value'] == $choice) ? ' checked="checked"' : '') . ' /> ' . $text . '</label></li>
			';
}
$__compilerVar11 .= '
			</ul>
		';
}
else if ($field['field_type'] == ('select'))
{
$__compilerVar11 .= '
			<select name="' . htmlspecialchars($customFieldInputName, ENT_QUOTES, 'UTF-8') . '[' . htmlspecialchars($field['field_id'], ENT_QUOTES, 'UTF-8') . ']" id="ctrl_custom_field_' . htmlspecialchars($field['field_id'], ENT_QUOTES, 'UTF-8') . '" class="textCtrl">
			';
if (!$field['required'] OR !$field['hasValue'])
{
$__compilerVar11 .= '
				<option value="">&nbsp;</option>
			';
}
$__compilerVar11 .= '
			';
foreach ($field['fieldChoices'] AS $choice => $text)
{
$__compilerVar11 .= '
				<option value="' . htmlspecialchars($choice, ENT_QUOTES, 'UTF-8') . '" ' . (($field['field_value'] == $choice) ? ' selected="selected"' : '') . '>' . $text . '</option>
			';
}
$__compilerVar11 .= '
			</select>
		';
}
else if ($field['field_type'] == ('checkbox'))
{
$__compilerVar11 .= '
			<ul class="checkboxColumns">
			';
foreach ($field['fieldChoices'] AS $choice => $text)
{
$__compilerVar11 .= '
				<li><label><input type="checkbox" name="' . htmlspecialchars($customFieldInputName, ENT_QUOTES, 'UTF-8') . '[' . htmlspecialchars($field['field_id'], ENT_QUOTES, 'UTF-8') . '][' . htmlspecialchars($choice, ENT_QUOTES, 'UTF-8') . ']" value="' . htmlspecialchars($choice, ENT_QUOTES, 'UTF-8') . '" ' . ((isset($field['field_value'][$choice])) ? ' checked="checked"' : '') . ' /> ' . $text . '</label></li>
			';
}
$__compilerVar11 .= '
			</ul>
		';
}
else if ($field['field_type'] == ('multiselect'))
{
$__compilerVar11 .= '
			<select name="' . htmlspecialchars($customFieldInputName, ENT_QUOTES, 'UTF-8') . '[' . htmlspecialchars($field['field_id'], ENT_QUOTES, 'UTF-8') . '][]" id="ctrl_custom_field_' . htmlspecialchars($field['field_id'], ENT_QUOTES, 'UTF-8') . '" class="textCtrl" size="7" multiple="multiple">
			';
if (!$field['required'] OR !$field['hasValue'])
{
$__compilerVar11 .= '
				<option value="">&nbsp;</option>
			';
}
$__compilerVar11 .= '
			';
foreach ($field['fieldChoices'] AS $choice => $text)
{
$__compilerVar11 .= '
				<option value="' . htmlspecialchars($choice, ENT_QUOTES, 'UTF-8') . '" ' . ((isset($field['field_value'][$choice])) ? ' selected="selected"' : '') . '>' . $text . '</option>
			';
}
$__compilerVar11 .= '
			</select>
		';
}
$__compilerVar11 .= '

		';
$__compilerVar12 = '';
$__compilerVar12 .= $field['description'];
if (trim($__compilerVar12) !== '')
{
$__compilerVar11 .= '<p class="explain">' . $__compilerVar12 . '</p>';
}
unset($__compilerVar12);
$__compilerVar11 .= '
		<input type="hidden" name="custom_fields_shown[]" value="' . htmlspecialchars($field['field_id'], ENT_QUOTES, 'UTF-8') . '" />
	</dd>
</dl>';
$__compilerVar10 .= $__compilerVar11;
unset($__compilerVar11);
$__compilerVar10 .= '
	';
}
$__compilerVar10 .= '
';
}
$__compilerVar9 .= $__compilerVar10;
unset($__compilerVar10);
$__compilerVar9 .= '
		
	';
$__output .= $this->callTemplateHook('account_preferences_options', $__compilerVar9, array());
unset($__compilerVar9);
$__output .= '
	
	';
if ($xenOptions['enableNotices'] AND $showNoticeReset)
{
$__output .= '
	<h3 class="sectionHeader">' . 'Các lưu ý' . '</h3>
	
	<dl class="ctrlUnit">
		<dt></dt>
		<dd>
			<ul>
				<li><label><input type="checkbox" name="restore_notices" value="1" />
					' . 'Khôi phục lưu ý đã bị bỏ qua' . '</label>
					<p class="hint">' . 'Bất ký lưu ý nào bạn đã bỏ qua trước đây sẽ được khôi phục để xem nếu bạn đánh dấu vào mục này.' . '</p></li>
			</ul>
		</dd>
	</dl>
	';
}
$__output .= '

	<dl class="ctrlUnit submitUnit">
		<dt></dt>
		<dd><input type="submit" name="save" value="' . 'Lưu thay đổi' . '" accesskey="s" class="button primary" /></dd>
	</dl>

	<input type="hidden" name="_xfToken" value="' . htmlspecialchars($visitor['csrf_token_page'], ENT_QUOTES, 'UTF-8') . '" />
</form>';
