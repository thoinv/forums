<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__extraData['title'] = '';
$__extraData['title'] .= 'Edit video "' . htmlspecialchars($content['title'], ENT_QUOTES, 'UTF-8') . '" in the album "' . htmlspecialchars($album['title'], ENT_QUOTES, 'UTF-8') . '"';
$__output .= '

';
$__extraData['navigation'] = array();
$__extraData['navigation'] = XenForo_Template_Helper_Core::appendBreadCrumbs($__extraData['navigation'], $breadCrumbs);
$__output .= '

';
$this->addRequiredExternal('css', 'sonnb_xengallery_photo_edit_overlay');
$__output .= '
';
$this->addRequiredExternal('js', 'js/sonnb/XenGallery/gallery.contentedit.js');
$__output .= '

<form action="' . XenForo_Template_Helper_Core::link('gallery/videos/save-inline', $content, array()) . '" method="post" class="section ContentEditOverlay InlineMessageEditor NoAutoHeader">

	<h2 class="heading overlayOnly">' . 'Edit video "' . htmlspecialchars($content['title'], ENT_QUOTES, 'UTF-8') . '" in the album "' . htmlspecialchars($album['title'], ENT_QUOTES, 'UTF-8') . '"' . '</h2>

	<div class="primaryContent messageContainer">' . $editorTemplate . '</div>

        ';
if ($fields)
{
$__output .= '
        	<div class="secondaryContent" style="margin-top: -2px;">
			';
$__compilerVar5 = '';
$__compilerVar5 .= '
			    <h3 class="sectionHeader">' . 'Custom Fields' . '</h3>
			    ';
$__compilerVar6 = '';
foreach ($fields AS $field)
{
$__compilerVar6 .= '
	';
$__compilerVar7 = '';
$__compilerVar7 .= '<dl class="ctrlUnit">
	<dt>
		<label for="ctrl_custom_field_' . htmlspecialchars($field['field_id'], ENT_QUOTES, 'UTF-8') . '">' . htmlspecialchars($field['title'], ENT_QUOTES, 'UTF-8') . ':</label>
		';
if ($field['required'])
{
$__compilerVar7 .= '<dfn>' . 'Required' . '</dfn>';
}
$__compilerVar7 .= '
	</dt>
	<dd>
		';
if ($field['field_type'] == ('textbox'))
{
$__compilerVar7 .= '
			<input type="text" name="custom_fields[' . htmlspecialchars($field['field_id'], ENT_QUOTES, 'UTF-8') . ']" value="' . htmlspecialchars($field['field_value'], ENT_QUOTES, 'UTF-8') . '" 
				id="ctrl_custom_field_' . htmlspecialchars($field['field_id'], ENT_QUOTES, 'UTF-8') . '"
				data-validatorname="custom_field_' . htmlspecialchars($field['field_id'], ENT_QUOTES, 'UTF-8') . '"
				class="textCtrl" maxlength="' . (($field['max_length']) ? (htmlspecialchars($field['max_length'], ENT_QUOTES, 'UTF-8')) : ('')) . '" 
			/>
		';
}
else if ($field['field_type'] == ('textarea'))
{
$__compilerVar7 .= '
			<textarea name="custom_fields[' . htmlspecialchars($field['field_id'], ENT_QUOTES, 'UTF-8') . ']" 
				id="ctrl_custom_field_' . htmlspecialchars($field['field_id'], ENT_QUOTES, 'UTF-8') . '"
				data-validatorname="custom_field_' . htmlspecialchars($field['field_id'], ENT_QUOTES, 'UTF-8') . '" 
				class="textCtrl Elastic">' . htmlspecialchars($field['field_value'], ENT_QUOTES, 'UTF-8') . '</textarea>
		';
}
else if ($field['field_type'] == ('radio'))
{
$__compilerVar7 .= '
			<ul class="checkboxColumns">
			';
if (!$field['required'])
{
$__compilerVar7 .= '
				<li><label><input autocomplete="off" type="radio" name="custom_fields[' . htmlspecialchars($field['field_id'], ENT_QUOTES, 'UTF-8') . ']" value="" ' . (($field['field_value'] == ('')) ? ' checked="checked"' : '') . ' /> <span class="muted">' . 'No selection' . '</span></label></li>
			';
}
$__compilerVar7 .= '
			';
foreach ($field['fieldChoices'] AS $choice => $text)
{
$__compilerVar7 .= '
				<li><label><input autocomplete="off" type="radio" name="custom_fields[' . htmlspecialchars($field['field_id'], ENT_QUOTES, 'UTF-8') . ']" value="' . htmlspecialchars($choice, ENT_QUOTES, 'UTF-8') . '" ' . (($field['field_value'] == $choice) ? ' checked="checked"' : '') . ' /> ' . $text . '</label></li>
			';
}
$__compilerVar7 .= '
			</ul>
		';
}
else if ($field['field_type'] == ('select'))
{
$__compilerVar7 .= '
			<select name="custom_fields[' . htmlspecialchars($field['field_id'], ENT_QUOTES, 'UTF-8') . ']" id="ctrl_custom_field_' . htmlspecialchars($field['field_id'], ENT_QUOTES, 'UTF-8') . '" class="textCtrl" autocomplete="off" >
			';
if (!$field['required'] OR !$field['hasValue'])
{
$__compilerVar7 .= '
				<option value="">&nbsp;</option>
			';
}
$__compilerVar7 .= '
			';
foreach ($field['fieldChoices'] AS $choice => $text)
{
$__compilerVar7 .= '
				<option value="' . htmlspecialchars($choice, ENT_QUOTES, 'UTF-8') . '" ' . (($field['field_value'] == $choice) ? ' selected="selected"' : '') . '>' . $text . '</option>
			';
}
$__compilerVar7 .= '
			</select>
		';
}
else if ($field['field_type'] == ('checkbox'))
{
$__compilerVar7 .= '
			<ul class="checkboxColumns">
			';
foreach ($field['fieldChoices'] AS $choice => $text)
{
$__compilerVar7 .= '
				<li><label><input autocomplete="off" type="checkbox" name="custom_fields[' . htmlspecialchars($field['field_id'], ENT_QUOTES, 'UTF-8') . '][' . htmlspecialchars($choice, ENT_QUOTES, 'UTF-8') . ']" value="' . htmlspecialchars($choice, ENT_QUOTES, 'UTF-8') . '" ' . ((isset($field['field_value'][$choice])) ? ' checked="checked"' : '') . ' /> ' . $text . '</label></li>
			';
}
$__compilerVar7 .= '
			</ul>
		';
}
else if ($field['field_type'] == ('multiselect'))
{
$__compilerVar7 .= '
			<select name="custom_fields[' . htmlspecialchars($field['field_id'], ENT_QUOTES, 'UTF-8') . '][]" id="ctrl_custom_field_' . htmlspecialchars($field['field_id'], ENT_QUOTES, 'UTF-8') . '" class="textCtrl" size="7" multiple="multiple" autocomplete="off" >
			';
if (!$field['required'] OR !$field['hasValue'])
{
$__compilerVar7 .= '
				<option value="">&nbsp;</option>
			';
}
$__compilerVar7 .= '
			';
foreach ($field['fieldChoices'] AS $choice => $text)
{
$__compilerVar7 .= '
				<option value="' . htmlspecialchars($choice, ENT_QUOTES, 'UTF-8') . '" ' . ((isset($field['field_value'][$choice])) ? ' selected="selected"' : '') . '>' . $text . '</option>
			';
}
$__compilerVar7 .= '
			</select>
		';
}
$__compilerVar7 .= '

		';
$__compilerVar8 = '';
$__compilerVar8 .= $field['description'];
if (trim($__compilerVar8) !== '')
{
$__compilerVar7 .= '<p class="explain">' . $__compilerVar8 . '</p>';
}
unset($__compilerVar8);
$__compilerVar7 .= '
	</dd>
</dl>';
$__compilerVar6 .= $__compilerVar7;
unset($__compilerVar7);
$__compilerVar6 .= '
';
}
$__compilerVar5 .= $__compilerVar6;
unset($__compilerVar6);
$__compilerVar5 .= '
			';
$__output .= $this->callTemplateHook('photo_edit_fields_extra', $__compilerVar5, array());
unset($__compilerVar5);
$__output .= '
		</div>
        ';
}
$__output .= '

	<div class="sectionFooter">
		<span class="buttonContainer">
			<input type="submit" value="' . 'Lưu thay đổi' . '" accesskey="s" class="button primary" />
			<input type="submit" value="' . 'Thêm tùy chọn' . '..." name="more_options" class="button primary" />
			<input type="button" value="' . 'Hủy bỏ' . '" class="button OverlayCloser" accesskey="r" />
		</span>
	</div>

	<input type="hidden" name="_xfToken" value="' . htmlspecialchars($visitor['csrf_token_page'], ENT_QUOTES, 'UTF-8') . '" />
</form>';
