<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__extraData['title'] = '';
$__extraData['title'] .= 'Sign up with Twitter';
$__output .= '
	
<form action="' . XenForo_Template_Helper_Core::link('register/twitter/register', false, array()) . '" method="post" class="xenForm AutoValidator"
	data-fieldValidatorUrl="' . XenForo_Template_Helper_Core::link('register/validate-field', false, array()) . '"
	data-OptInOut="OptIn"
	data-normalSubmit="1">

<ul class="tabs Tabs" data-panes="#TwitterTabs > li">
	';
if (!$associateOnly)
{
$__output .= '<li><a>' . 'Create New Account' . '</a></li>';
}
$__output .= '
	<li><a>' . 'Associate Existing Account' . '</a></li>
</ul>

<ul id="TwitterTabs">
	
	';
if (!$associateOnly)
{
$__output .= '
	<li>
		<dl class="ctrlUnit">
			<dt><label for="ctrl_username">' . 'Name' . ':</label></dt>
			<dd>
				<input type="text" name="username" value="" class="textCtrl OptIn" id="ctrl_username" autofocus="true" autocomplete="off" />
				<p class="explain">' . 'This is the name that will be shown with your messages. You may use any name you wish. Once set, this cannot be changed.' . '</p>
			</dd>
		</dl>
	
		<dl class="ctrlUnit">
			<dt><label for="ctrl_email">' . 'Email' . ':</label></dt>
			<dd><input type="email" name="email" value="" dir="ltr" class="textCtrl OptIn" id="ctrl_email" /></dd>
		</dl>
		
		';
$__compilerVar1 = '';
$__compilerVar1 .= '	<dl class="ctrlUnit OptOut">
		<dt>
			' . 'Date of Birth' . ':
			';
if ($dobRequired)
{
$__compilerVar1 .= '<dfn>' . 'Required' . '</dfn>';
}
$__compilerVar1 .= '
		</dt>
		<dd>
			';
$__compilerVar2 = '';
$__compilerVar2 .= '<ul dir="ltr" id="helper_birthday">
<li><select name="dob_month" class="textCtrl autoSize">
	<option value="0" ' . (($fields['dob_month'] == 0) ? ' selected="selected"' : '') . '>&nbsp;</option>
	<option value="1" ' . (($fields['dob_month'] == 1) ? ' selected="selected"' : '') . '>' . 'January' . '</option>
	<option value="2" ' . (($fields['dob_month'] == 2) ? ' selected="selected"' : '') . '>' . 'February' . '</option>
	<option value="3" ' . (($fields['dob_month'] == 3) ? ' selected="selected"' : '') . '>' . 'March' . '</option>
	<option value="4" ' . (($fields['dob_month'] == 4) ? ' selected="selected"' : '') . '>' . 'April' . '</option>
	<option value="5" ' . (($fields['dob_month'] == 5) ? ' selected="selected"' : '') . '>' . 'May' . '</option>
	<option value="6" ' . (($fields['dob_month'] == 6) ? ' selected="selected"' : '') . '>' . 'June' . '</option>
	<option value="7" ' . (($fields['dob_month'] == 7) ? ' selected="selected"' : '') . '>' . 'July' . '</option>
	<option value="8" ' . (($fields['dob_month'] == 8) ? ' selected="selected"' : '') . '>' . 'August' . '</option>
	<option value="9" ' . (($fields['dob_month'] == 9) ? ' selected="selected"' : '') . '>' . 'September' . '</option>
	<option value="10" ' . (($fields['dob_month'] == 10) ? ' selected="selected"' : '') . '>' . 'October' . '</option>
	<option value="11" ' . (($fields['dob_month'] == 11) ? ' selected="selected"' : '') . '>' . 'November' . '</option>
	<option value="12" ' . (($fields['dob_month'] == 12) ? ' selected="selected"' : '') . '>' . 'December' . '</option>
</select></li>
<li><input type="text" name="dob_day" value="' . (($fields['dob_day']) ? (htmlspecialchars($fields['dob_day'], ENT_QUOTES, 'UTF-8')) : ('')) . '" class="textCtrl autoSize" placeholder="' . 'Day' . '" size="2" maxlength="2" /></li>
<li><input type="text" name="dob_year" value="' . (($fields['dob_year']) ? (htmlspecialchars($fields['dob_year'], ENT_QUOTES, 'UTF-8')) : ('')) . '" class="textCtrl autoSize" placeholder="' . 'Year' . '" size="4" maxlength="4" /></li>
</ul>';
$__compilerVar1 .= $__compilerVar2;
unset($__compilerVar2);
$__compilerVar1 .= '
		</dd>
	</dl>';
$__output .= $__compilerVar1;
unset($__compilerVar1);
$__output .= '
		
		';
if ($xenOptions['registrationSetup']['requireLocation'] AND !$credentials['location'])
{
$__output .= '
			<dl class="ctrlUnit">
				<dt>
					' . 'Location' . ':
					<dfn>' . 'Required' . '</dfn>
				</dt>
				<dd>
					<input type="text" name="location" class="textCtrl" />
				</dd>
			</dl>
		';
}
$__output .= '
		
		';
$__compilerVar3 = '';
foreach ($customFields AS $field)
{
$__compilerVar3 .= '
	';
if ($field['isEditable'])
{
$__compilerVar3 .= '
		';
$__compilerVar4 = '';
if (!$customFieldInputName)
{
$customFieldInputName = 'custom_fields';
}
$__compilerVar4 .= '
<dl class="ctrlUnit customFieldEdit' . htmlspecialchars($field['field_id'], ENT_QUOTES, 'UTF-8') . ' ' . htmlspecialchars($customFieldExtraClass, ENT_QUOTES, 'UTF-8') . '">
	<dt>
		<label for="ctrl_custom_field_' . htmlspecialchars($field['field_id'], ENT_QUOTES, 'UTF-8') . '">' . htmlspecialchars($field['title'], ENT_QUOTES, 'UTF-8') . ':</label>
		';
if ($field['required'])
{
$__compilerVar4 .= '<dfn>' . 'Required' . '</dfn>';
}
$__compilerVar4 .= '
	</dt>
	<dd>
		';
if ($field['field_type'] == ('textbox'))
{
$__compilerVar4 .= '
			<input type="text" name="' . htmlspecialchars($customFieldInputName, ENT_QUOTES, 'UTF-8') . '[' . htmlspecialchars($field['field_id'], ENT_QUOTES, 'UTF-8') . ']" value="' . htmlspecialchars($field['field_value'], ENT_QUOTES, 'UTF-8') . '" 
				id="ctrl_custom_field_' . htmlspecialchars($field['field_id'], ENT_QUOTES, 'UTF-8') . '"
				data-validatorname="custom_field_' . htmlspecialchars($field['field_id'], ENT_QUOTES, 'UTF-8') . '"
				class="textCtrl" maxlength="' . (($field['max_length']) ? (htmlspecialchars($field['max_length'], ENT_QUOTES, 'UTF-8')) : ('')) . '" 
			/>
		';
}
else if ($field['field_type'] == ('textarea'))
{
$__compilerVar4 .= '
			<textarea name="' . htmlspecialchars($customFieldInputName, ENT_QUOTES, 'UTF-8') . '[' . htmlspecialchars($field['field_id'], ENT_QUOTES, 'UTF-8') . ']" 
				id="ctrl_custom_field_' . htmlspecialchars($field['field_id'], ENT_QUOTES, 'UTF-8') . '"
				data-validatorname="custom_field_' . htmlspecialchars($field['field_id'], ENT_QUOTES, 'UTF-8') . '" 
				class="textCtrl Elastic">' . htmlspecialchars($field['field_value'], ENT_QUOTES, 'UTF-8') . '</textarea>
		';
}
else if ($field['field_type'] == ('bbcode'))
{
$__compilerVar4 .= '
			';
if ($field['editorTemplateHtml'])
{
$__compilerVar4 .= '
				' . $field['editorTemplateHtml'] . '
			';
}
else
{
$__compilerVar4 .= '
				<textarea name="custom_fields[' . htmlspecialchars($field['field_id'], ENT_QUOTES, 'UTF-8') . ']" 
					id="ctrl_custom_field_' . htmlspecialchars($field['field_id'], ENT_QUOTES, 'UTF-8') . '"
					data-validatorname="custom_field_' . htmlspecialchars($field['field_id'], ENT_QUOTES, 'UTF-8') . '" 
					class="textCtrl Elastic">' . htmlspecialchars($field['field_value'], ENT_QUOTES, 'UTF-8') . '</textarea>
			';
}
$__compilerVar4 .= '
';
}
else if ($field['field_type'] == ('radio'))
{
$__compilerVar4 .= '
			<ul class="checkboxColumns">
			';
if (!$field['required'])
{
$__compilerVar4 .= '
				<li><label><input type="radio" name="' . htmlspecialchars($customFieldInputName, ENT_QUOTES, 'UTF-8') . '[' . htmlspecialchars($field['field_id'], ENT_QUOTES, 'UTF-8') . ']" value="" ' . (($field['field_value'] == ('')) ? ' checked="checked"' : '') . ' /> <span class="muted">' . 'No selection' . '</span></label></li>
			';
}
$__compilerVar4 .= '
			';
foreach ($field['fieldChoices'] AS $choice => $text)
{
$__compilerVar4 .= '
				<li><label><input type="radio" name="' . htmlspecialchars($customFieldInputName, ENT_QUOTES, 'UTF-8') . '[' . htmlspecialchars($field['field_id'], ENT_QUOTES, 'UTF-8') . ']" value="' . htmlspecialchars($choice, ENT_QUOTES, 'UTF-8') . '" ' . (($field['field_value'] == $choice) ? ' checked="checked"' : '') . ' /> ' . $text . '</label></li>
			';
}
$__compilerVar4 .= '
			</ul>
		';
}
else if ($field['field_type'] == ('select'))
{
$__compilerVar4 .= '
			<select name="' . htmlspecialchars($customFieldInputName, ENT_QUOTES, 'UTF-8') . '[' . htmlspecialchars($field['field_id'], ENT_QUOTES, 'UTF-8') . ']" id="ctrl_custom_field_' . htmlspecialchars($field['field_id'], ENT_QUOTES, 'UTF-8') . '" class="textCtrl">
			';
if (!$field['required'] OR !$field['hasValue'])
{
$__compilerVar4 .= '
				<option value="">&nbsp;</option>
			';
}
$__compilerVar4 .= '
			';
foreach ($field['fieldChoices'] AS $choice => $text)
{
$__compilerVar4 .= '
				<option value="' . htmlspecialchars($choice, ENT_QUOTES, 'UTF-8') . '" ' . (($field['field_value'] == $choice) ? ' selected="selected"' : '') . '>' . $text . '</option>
			';
}
$__compilerVar4 .= '
			</select>
		';
}
else if ($field['field_type'] == ('checkbox'))
{
$__compilerVar4 .= '
			<ul class="checkboxColumns">
			';
foreach ($field['fieldChoices'] AS $choice => $text)
{
$__compilerVar4 .= '
				<li><label><input type="checkbox" name="' . htmlspecialchars($customFieldInputName, ENT_QUOTES, 'UTF-8') . '[' . htmlspecialchars($field['field_id'], ENT_QUOTES, 'UTF-8') . '][' . htmlspecialchars($choice, ENT_QUOTES, 'UTF-8') . ']" value="' . htmlspecialchars($choice, ENT_QUOTES, 'UTF-8') . '" ' . ((isset($field['field_value'][$choice])) ? ' checked="checked"' : '') . ' /> ' . $text . '</label></li>
			';
}
$__compilerVar4 .= '
			</ul>
		';
}
else if ($field['field_type'] == ('multiselect'))
{
$__compilerVar4 .= '
			<select name="' . htmlspecialchars($customFieldInputName, ENT_QUOTES, 'UTF-8') . '[' . htmlspecialchars($field['field_id'], ENT_QUOTES, 'UTF-8') . '][]" id="ctrl_custom_field_' . htmlspecialchars($field['field_id'], ENT_QUOTES, 'UTF-8') . '" class="textCtrl" size="7" multiple="multiple">
			';
if (!$field['required'] OR !$field['hasValue'])
{
$__compilerVar4 .= '
				<option value="">&nbsp;</option>
			';
}
$__compilerVar4 .= '
			';
foreach ($field['fieldChoices'] AS $choice => $text)
{
$__compilerVar4 .= '
				<option value="' . htmlspecialchars($choice, ENT_QUOTES, 'UTF-8') . '" ' . ((isset($field['field_value'][$choice])) ? ' selected="selected"' : '') . '>' . $text . '</option>
			';
}
$__compilerVar4 .= '
			</select>
		';
}
$__compilerVar4 .= '

		';
$__compilerVar5 = '';
$__compilerVar5 .= $field['description'];
if (trim($__compilerVar5) !== '')
{
$__compilerVar4 .= '<p class="explain">' . $__compilerVar5 . '</p>';
}
unset($__compilerVar5);
$__compilerVar4 .= '
		<input type="hidden" name="custom_fields_shown[]" value="' . htmlspecialchars($field['field_id'], ENT_QUOTES, 'UTF-8') . '" />
	</dd>
</dl>';
$__compilerVar3 .= $__compilerVar4;
unset($__compilerVar4);
$__compilerVar3 .= '
	';
}
$__compilerVar3 .= '
';
}
$__output .= $__compilerVar3;
unset($__compilerVar3);
$__output .= '
	
		<dl class="ctrlUnit" style="display: none">
			<dt><label for="ctrl_timezone">' . 'Time Zone' . ':</label></dt>
			<dd>
				<select name="timezone" class="textCtrl AutoTimeZone OptOut" id="ctrl_timezone">
					';
foreach ($timeZones AS $identifier => $name)
{
$__output .= '
						<option value="' . htmlspecialchars($identifier, ENT_QUOTES, 'UTF-8') . '" ' . (($identifier == $xenOptions['guestTimeZone']) ? ' selected="selected"' : '') . '>' . htmlspecialchars($name, ENT_QUOTES, 'UTF-8') . '</option>
					';
}
$__output .= '
				</select>
			</dd>
		</dl>
		
		<dl class="ctrlUnit submitUnit">
			<dt></dt>
			<dd>
				';
if ($tosUrl)
{
$__output .= '
					<ul>
						<li>
							' . '<label>' . '<input type="checkbox" name="agree" value="1" id="ctrl_agree" class="Disabler" />' . ' I agree to the</label> <a ' . 'href="' . htmlspecialchars($tosUrl, ENT_QUOTES, 'UTF-8') . '" target="_blank"' . '>terms and rules</a>.' . '
							<ul id="ctrl_agree_Disabler">
								<li><input type="submit" value="' . 'Sign up' . '" accesskey="s" class="button primary" /></li>
							</ul>						
						</li>
					</ul>
				';
}
else
{
$__output .= '
					<input type="submit" value="' . 'Sign up' . '" accesskey="s" class="button primary" />
				';
}
$__output .= '
				
				<p class="explain" style="margin-top: 10px">' . 'We will automatically associate your profile picture, home page, and other details with your account. You can edit these after the account is created.' . '</p>
			</dd>
		</dl>
	
	</li>
	';
}
$__output .= '

	<li>
		<dl class="ctrlUnit">
			<dt><label for="ctrl_associate_login">' . 'Associate with' . ':</label></dt>
			<dd>
				';
if ($existingUser)
{
$__output .= '
					' . htmlspecialchars($existingUser['username'], ENT_QUOTES, 'UTF-8') . '
					<input type="hidden" name="associate_login" value="' . htmlspecialchars($existingUser['username'], ENT_QUOTES, 'UTF-8') . '" />
					<input type="hidden" name="force_assoc" value="1" />
				';
}
else
{
$__output .= '
					<input type="text" name="associate_login" class="textCtrl" id="ctrl_associate_login" />
				';
}
$__output .= '
			</dd>
		</dl>
		
		<dl class="ctrlUnit">
			<dt><label for="ctrl_associate_password">' . 'Password' . ':</label></dt>
			<dd>
				<input type="password" name="associate_password" class="textCtrl" id="ctrl_associate_password" />
				<p class="explain">' . 'This is the password of the ' . htmlspecialchars($xenOptions['boardTitle'], ENT_QUOTES, 'UTF-8') . ' account that you wish to associate with.' . '</p>
			</dd>
		</dl>
		
		<dl class="ctrlUnit submitUnit">
			<dt></dt>
			<dd><input type="submit" value="' . 'Associate Account' . '" name="associate" accesskey="a" class="button primary" /></dd>
		</dl>
	</li>

</ul>

<input type="hidden" name="_xfToken" value="' . htmlspecialchars($visitor['csrf_token_page'], ENT_QUOTES, 'UTF-8') . '" />
<input type="hidden" name="redirect" value="' . htmlspecialchars($redirect, ENT_QUOTES, 'UTF-8') . '" />
</form>';
