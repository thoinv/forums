<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__extraData['title'] = '';
$__extraData['title'] .= (($resource['resource_id']) ? ('Edit Resource' . ': ' . XenForo_Template_Helper_Core::callHelper('resourcePrefix', array(
'0' => $resource,
'1' => 'escaped'
)) . htmlspecialchars($resource['title'], ENT_QUOTES, 'UTF-8')) : ('Thêm tài nguyên'));
$__output .= '

';
if ($resource['resource_id'])
{
$__output .= '
	';
$__extraData['navigation'] = array();
$__extraData['navigation'] = XenForo_Template_Helper_Core::appendBreadCrumbs($__extraData['navigation'], $categoryBreadcrumbs);
$__extraData['navigation'][] = array('href' => XenForo_Template_Helper_Core::link('full:resources', $resource, array()), 'value' => XenForo_Template_Helper_Core::callHelper('resourcePrefix', array(
'0' => $resource
)) . htmlspecialchars($resource['title'], ENT_QUOTES, 'UTF-8'));
$__output .= '
';
}
else
{
$__output .= '
	';
$__extraData['navigation'] = array();
$__extraData['navigation'] = XenForo_Template_Helper_Core::appendBreadCrumbs($__extraData['navigation'], $categoryBreadcrumbs);
$__output .= '	
';
}
$__output .= '

';
$this->addRequiredExternal('css', 'resource_editor');
$__output .= '

<form action="' . XenForo_Template_Helper_Core::link('resources/save', $resource, array()) . '" method="post" class="xenForm AutoValidator Preview" 
	data-redirect="on"
	data-previewUrl="' . XenForo_Template_Helper_Core::link('resources/preview', $resource, array()) . '"
>

	<fieldset>
		';
if ($resource['resource_id'] AND $canEditCategory)
{
$__output .= '
			<dl class="ctrlUnit">
				<dt><label for="ctrl_resource_category_id">' . 'Category' . ':</label></dt>
				<dd>
					<select name="resource_category_id" class="textCtrl" id="ctrl_resource_category_id" autofocus="true">
						<option value="">&nbsp;</option>
						';
foreach ($categories AS $categoryId => $_category)
{
$__output .= '
							<option value="' . htmlspecialchars($categoryId, ENT_QUOTES, 'UTF-8') . '"
								' . (($categoryId == $resource['resource_category_id']) ? ' selected="selected"' : '') . '
								' . (((!$_category['allowResource'] or !$_category['canAdd']) and $categoryId !== $resource['resource_category_id']) ? ('disabled="disabled"') : ('')) . '
								>' . XenForo_Template_Helper_Core::string('repeat', array(
'0' => '&nbsp; ',
'1' => htmlspecialchars($_category['depth'], ENT_QUOTES, 'UTF-8')
)) . htmlspecialchars($_category['category_title'], ENT_QUOTES, 'UTF-8') . '</option>
						';
}
$__output .= '
					</select>
				</dd>
			</dl>
		';
}
else
{
$__output .= '
			<input type="hidden" name="resource_category_id" value="' . htmlspecialchars($category['resource_category_id'], ENT_QUOTES, 'UTF-8') . '" />
		';
}
$__output .= '
		
		';
$__compilerVar26 = '';
$__compilerVar26 .= htmlspecialchars($resource['prefix_id'], ENT_QUOTES, 'UTF-8');
$__compilerVar27 = '';
$__compilerVar27 .= 'resource_add';
$__compilerVar28 = '';
if ($prefixes OR $forcePrefixes)
{
$__compilerVar28 .= '

	';
$this->addRequiredExternal('js', 'js/xenforo/title_prefix.js');
$__compilerVar28 .= '
	';
$this->addRequiredExternal('css', 'title_prefix_edit');
$__compilerVar28 .= '
	
	<dl class="ctrlUnit" id="PrefixContainer_' . htmlspecialchars($__compilerVar27, ENT_QUOTES, 'UTF-8') . '">
		<dt><label for="ctrl_prefix_id_' . htmlspecialchars($__compilerVar27, ENT_QUOTES, 'UTF-8') . '">' . 'Tiền tố' . ':</label></dt>
		<dd>
			<select name="prefix_id" id="ctrl_prefix_id_' . htmlspecialchars($__compilerVar27, ENT_QUOTES, 'UTF-8') . '" class="textCtrl TitlePrefix"
				data-container="#PrefixContainer_' . htmlspecialchars($__compilerVar27, ENT_QUOTES, 'UTF-8') . '"
				data-textbox="#ctrl_title_' . htmlspecialchars($__compilerVar27, ENT_QUOTES, 'UTF-8') . '"
				' . (($nodeControl) ? ('data-nodecontrol="' . htmlspecialchars($nodeControl, ENT_QUOTES, 'UTF-8') . '" data-prefixurl="' . XenForo_Template_Helper_Core::link('resources/prefixes', false, array()) . '"') : ('')) . '>
				<option value="0" data-css="prefix noPrefix" ' . (($__compilerVar26 == 0) ? ' selected="selected"' : '') . '>(' . 'Không tiền tố' . ')</option>
					';
foreach ($prefixes AS $prefixGroup)
{
$__compilerVar28 .= '
						';
if ($prefixGroup['title'])
{
$__compilerVar28 .= '
							<optgroup label="' . htmlspecialchars($prefixGroup['title'], ENT_QUOTES, 'UTF-8') . '">
							';
foreach ($prefixGroup['prefixes'] AS $prefix)
{
$__compilerVar28 .= '
								<option value="' . htmlspecialchars($prefix['prefix_id'], ENT_QUOTES, 'UTF-8') . '" data-css="' . htmlspecialchars($prefix['css_class'], ENT_QUOTES, 'UTF-8') . '" ' . (($__compilerVar26 == $prefix['prefix_id']) ? ' selected="selected"' : '') . '>' . XenForo_Template_Helper_Core::callHelper('resourcePrefix', array(
'0' => $prefix['prefix_id'],
'1' => 'escaped',
'2' => ''
)) . '</option>
							';
}
$__compilerVar28 .= '
							</optgroup>
						';
}
else
{
$__compilerVar28 .= '
							';
foreach ($prefixGroup['prefixes'] AS $prefix)
{
$__compilerVar28 .= '
								<option value="' . htmlspecialchars($prefix['prefix_id'], ENT_QUOTES, 'UTF-8') . '" data-css="' . htmlspecialchars($prefix['css_class'], ENT_QUOTES, 'UTF-8') . '" ' . (($__compilerVar26 == $prefix['prefix_id']) ? ' selected="selected"' : '') . '>' . XenForo_Template_Helper_Core::callHelper('resourcePrefix', array(
'0' => $prefix['prefix_id'],
'1' => 'escaped',
'2' => ''
)) . '</option>
							';
}
$__compilerVar28 .= '
						';
}
$__compilerVar28 .= '
					';
}
$__compilerVar28 .= '
			</select>
		</dd>
	</dl>
	
';
}
$__output .= $__compilerVar28;
unset($__compilerVar26, $__compilerVar27, $__compilerVar28);
$__output .= '
		
		<dl class="ctrlUnit titleUnit">
			<dt><label for="ctrl_title">' . 'Tiêu đề' . ':</label></dt>
			<dd>
				';
if ($allowFilelessOnly OR $resource['isFilelessNoExternal'])
{
$__output .= '
					<input type="text" name="title" value="' . htmlspecialchars($resource['title'], ENT_QUOTES, 'UTF-8') . '" class="textCtrl"
						data-liveTitleTemplate="' . (($resource['resource_id']) ? ('Edit Resource') : ('Thêm tài nguyên')) . ': <em>%s</em>"
						id="ctrl_title_resource_add" maxlength="100"
					/>
					<input type="hidden" name="version_string" value="' . htmlspecialchars($resource['version_string'], ENT_QUOTES, 'UTF-8') . '" />
				';
}
else
{
$__output .= '
					<input type="text" name="title" value="' . htmlspecialchars($resource['title'], ENT_QUOTES, 'UTF-8') . '" class="textCtrl titleWithVersion OptOut"
						data-liveTitleTemplate="' . (($resource['resource_id']) ? ('Edit Resource') : ('Thêm tài nguyên')) . ': <em>%s</em>"
						id="ctrl_title_resource_add" maxlength="100"
					/><input type="text" name="version_string" value="' . htmlspecialchars($resource['version_string'], ENT_QUOTES, 'UTF-8') . '" class="textCtrl versionCtrl" id="ctrl_version_string" maxlength="25" placeholder="' . 'Version String' . '" />
					<p class="explain">' . 'This is the name by which your resource will be known, and its version (such as 1.0).' . '</p>
				';
}
$__output .= '
			</dd>
		</dl>

		<dl class="ctrlUnit">
			<dt><label for="ctrl_tag_line">' . 'Tag Line' . ':</label></dt>
			<dd>
				<input type="text" name="tag_line" value="' . htmlspecialchars($resource['tag_line'], ENT_QUOTES, 'UTF-8') . '" class="textCtrl OptOut" id="ctrl_tag_line" maxlength="100" />
				<p class="explain">' . 'Provide a very brief, one-line description of your resource.' . '</p>
			</dd>
		</dl>
	</fieldset>

	';
if ($resource['resource_id'])
{
$__output .= '
		';
if ($resource['external_purchase_url'])
{
$__output .= '
			<fieldset>
				<dl class="ctrlUnit">
					<dt>' . 'External Purchase URL' . ':</dt>
					<dd><input type="url" name="external_purchase_url" value="' . htmlspecialchars($resource['external_purchase_url'], ENT_QUOTES, 'UTF-8') . '" class="textCtrl" maxlength="500" /></dd>
				</dl>
				
				<dl class="ctrlUnit">
					<dt>' . 'Cost' . ':</dt>
					<dd>
						<input type="text" name="price" value="' . htmlspecialchars($resource['price'], ENT_QUOTES, 'UTF-8') . '" id="ctrl_price" class="textCtrl" placeholder="' . 'Price' . '"
						/><select name="currency" class="textCtrl" id="ctrl_currency">
						';
foreach ($currencies AS $currencyId => $currency)
{
$__output .= '
							<option value="' . htmlspecialchars($currencyId, ENT_QUOTES, 'UTF-8') . '" ' . (($resource['currency'] == $currencyId) ? ' selected="selected"' : '') . '>' . htmlspecialchars($currency, ENT_QUOTES, 'UTF-8') . '</option>
						';
}
$__output .= '
						</select>
					</dd>
				</dl>
			</fieldset>
		';
}
$__output .= '
	';
}
else
{
$__output .= '
		';
if ($allowFilelessOnly)
{
$__output .= '
			<input type="hidden" name="resource_file_type" value="fileless" />
		';
}
else
{
$__output .= '
			<fieldset>
				<dl class="ctrlUnit">
					<dt><label for="ctrl_version_string">' . 'Resource Type' . ':</label></dt>
					<dd><ul>
						';
if ($category['allow_local'])
{
$__output .= '
							<li><label><input type="radio" name="resource_file_type" value="file" id="ctrl_resource_file_type_file" class="Disabler" ' . (($resourceType == ('local')) ? ' checked="checked"' : '') . ' /> ' . 'Uploaded file' . ':</label>
								<ul id="ctrl_resource_file_type_file_Disabler">
									<li>
										';
$__compilerVar29 = '';
$__compilerVar29 .= 'Upload Your Resource';
$__compilerVar30 = '';
$__compilerVar30 .= 'resource';
$__compilerVar31 = '';
$this->addRequiredExternal('js', 'js/xenforo/attachment_editor.js');
$__compilerVar31 .= '
';
$this->addRequiredExternal('css', 'attachment_editor');
$__compilerVar31 .= '
';
$this->addRequiredExternal('js', 'js/xenresource/file_uploader.js');
$__compilerVar31 .= '
';
if ($xenOptions['swfUpload'] AND $visitor['enable_flash_uploader'])
{
$__compilerVar31 .= '
	';
$this->addRequiredExternal('js', 'js/swfupload/swfupload.min.js');
$__compilerVar31 .= '
';
}
$__compilerVar31 .= '
';
$this->addRequiredExternal('css', 'file_uploader');
$__compilerVar31 .= '

<div id="UploadedFile_' . htmlspecialchars($uploaderId, ENT_QUOTES, 'UTF-8') . '" class="uploadedFile">
	<a href="" class="Delete" title="' . 'Xóa' . '">x</a>
	<div class="Progress"><div class="gauge"><div class="Meter">&nbsp;</div></div></div>
	<div class="Filename">&nbsp;</div>
</div>

<input type="hidden" name="file_hash" value="' . htmlspecialchars($fileParams[$uploaderId]['hash'], ENT_QUOTES, 'UTF-8') . '" />

<span id="FileUploader_' . htmlspecialchars($uploaderId, ENT_QUOTES, 'UTF-8') . '" class="buttonProxy FileUploader"
	style="display: none"
	data-uploaderid="' . htmlspecialchars($uploaderId, ENT_QUOTES, 'UTF-8') . '"
	data-placeholder="#SWFUploadPlaceHolder_' . htmlspecialchars($uploaderId, ENT_QUOTES, 'UTF-8') . '"
	data-trigger="#ctrl_uploader_' . htmlspecialchars($uploaderId, ENT_QUOTES, 'UTF-8') . '"
	data-result="#UploadedFile_' . htmlspecialchars($uploaderId, ENT_QUOTES, 'UTF-8') . '"
	data-postname="upload"
	data-maxfilesize="' . htmlspecialchars($fileConstraints[$uploaderId]['size'], ENT_QUOTES, 'UTF-8') . '"
	data-maxuploads="' . htmlspecialchars($fileConstraints[$uploaderId]['count'], ENT_QUOTES, 'UTF-8') . '"
	data-extensions="' . XenForo_Template_Helper_Core::callHelper('implode', array(
'0' => $fileConstraints[$uploaderId]['extensions'],
'1' => ','
)) . '"
	data-action="' . XenForo_Template_Helper_Core::link('full:attachments/do-upload.json', '', array(
'hash' => $fileParams[$uploaderId]['hash'],
'content_type' => $fileParams[$uploaderId]['content_type'],
'key' => $__compilerVar30
)) . '"
	data-uniquekey="' . htmlspecialchars($__compilerVar30, ENT_QUOTES, 'UTF-8') . '"
	data-err-110="' . 'File đã tải lên lớn hơn so với quy định.' . '"
	data-err-120="' . 'The uploaded file is empty.' . '"
	data-err-130="' . 'The uploaded file does not have an allowed extension.' . '"
	data-err-unknown="' . 'There was a problem uploading your file.' . '">

	<span id="SWFUploadPlaceHolder_' . htmlspecialchars($uploaderId, ENT_QUOTES, 'UTF-8') . '"></span>

	<input type="button" value="' . (($__compilerVar29) ? ($__compilerVar29) : ('Tải lên file đính kèm')) . '"
		id="ctrl_uploader_' . htmlspecialchars($uploaderId, ENT_QUOTES, 'UTF-8') . '" class="button OverlayTrigger DisableOnSubmit"
		data-href="' . XenForo_Template_Helper_Core::link('full:attachments/upload', '', array(
'_params' => $fileParams[$uploaderId],
'key' => $__compilerVar30
)) . '"
		data-hider="#FileUploader_' . htmlspecialchars($uploaderId, ENT_QUOTES, 'UTF-8') . '" />
	<span class="HiddenInput" data-name="_xfSessionId" data-value="' . htmlspecialchars($sessionId, ENT_QUOTES, 'UTF-8') . '"></span>
	';
foreach ($fileParams[$uploaderId]['content_data'] AS $dataKey => $dataValue)
{
$__compilerVar31 .= '<span class="HiddenInput" data-name="content_data[' . htmlspecialchars($dataKey, ENT_QUOTES, 'UTF-8') . ']" data-value="' . htmlspecialchars($dataValue, ENT_QUOTES, 'UTF-8') . '"></span>
	';
}
$__compilerVar31 .= '
</span>

<noscript>
	<a href="' . XenForo_Template_Helper_Core::link('attachments/upload', '', array(
'_params' => $fileParams[$uploaderId]
)) . '" class="button" target="_blank">' . (($__compilerVar29) ? ($__compilerVar29) : ('Tải lên file đính kèm')) . '</a>
</noscript>';
$__output .= $__compilerVar31;
unset($__compilerVar29, $__compilerVar30, $__compilerVar31);
$__output .= '
									</li>
								</ul>
							</li>
						';
}
$__output .= '
						';
if ($category['allow_external'])
{
$__output .= '
							<li><label><input type="radio" name="resource_file_type" value="url" id="ctrl_resource_file_type_url" class="Disabler" ' . (($resourceType == ('url')) ? ' checked="checked"' : '') . ' /> ' . 'External download URL' . ':</label>
								<ul id="ctrl_resource_file_type_url_Disabler">
									<li><input type="url" name="download_url" value="' . htmlspecialchars($resource['download_url'], ENT_QUOTES, 'UTF-8') . '" class="textCtrl" /></li>
								</ul>
							</li>
						';
}
$__output .= '
						';
if ($category['allow_commercial_external'])
{
$__output .= '
							<li><label><input type="radio" name="resource_file_type" value="commercial_external" id="ctrl_resource_file_type_commercial_external" class="Disabler" ' . (($resourceType == ('commercial_external')) ? ' checked="checked"' : '') . ' /> ' . 'External purchase and download' . ':</label>
								<ul id="ctrl_resource_file_type_commercial_external_Disabler">
									<li>
										<input type="url" name="external_purchase_url" value="' . htmlspecialchars($resource['external_purchase_url'], ENT_QUOTES, 'UTF-8') . '" id="ctrl_external_purchase_url" class="textCtrl" placeholder="' . 'Purchase URL' . '"
										/><input type="text" name="price" value="' . (($resource['price']) ? (htmlspecialchars($resource['price'], ENT_QUOTES, 'UTF-8')) : ('')) . '" id="ctrl_price" class="textCtrl" placeholder="' . 'Price' . '"
										/><select name="currency" class="textCtrl" id="ctrl_currency">
										';
foreach ($currencies AS $currencyId => $currency)
{
$__output .= '
											<option value="' . htmlspecialchars($currencyId, ENT_QUOTES, 'UTF-8') . '" ' . (($resource['currency'] == $currencyId) ? ' selected="selected"' : '') . '>' . htmlspecialchars($currency, ENT_QUOTES, 'UTF-8') . '</option>
										';
}
$__output .= '
										</select>
									</li>
								</ul>
							</li>
						';
}
$__output .= '
						';
if ($category['allow_fileless'])
{
$__output .= '
							<li><label><input type="radio" name="resource_file_type" value="fileless" ' . (($resourceType == ('fileless')) ? ' checked="checked"' : '') . ' /> ' . 'Does not have a file' . '</label>
								<p class="explain">' . 'The body of this resource should be provided in the description.' . '</p>
							</li>
						';
}
$__output .= '
					</ul></dd>
				</dl>
			</fieldset>
		';
}
$__output .= '
	';
}
$__output .= '

	';
if ($customFields['above_info'])
{
$__output .= '
		<fieldset>
			';
foreach ($customFields['above_info'] AS $field)
{
$__output .= '
				';
$__compilerVar32 = '';
if (!$customFieldInputName)
{
$customFieldInputName = 'custom_fields';
}
$__compilerVar32 .= '
<dl class="ctrlUnit customFieldEdit' . htmlspecialchars($field['field_id'], ENT_QUOTES, 'UTF-8') . ' ' . htmlspecialchars($customFieldExtraClass, ENT_QUOTES, 'UTF-8') . '">
	<dt>
		<label for="ctrl_custom_field_' . htmlspecialchars($field['field_id'], ENT_QUOTES, 'UTF-8') . '">' . htmlspecialchars($field['title'], ENT_QUOTES, 'UTF-8') . ':</label>
		';
if ($field['required'])
{
$__compilerVar32 .= '<dfn>' . 'Required' . '</dfn>';
}
$__compilerVar32 .= '
	</dt>
	<dd>
		';
if ($field['field_type'] == ('textbox'))
{
$__compilerVar32 .= '
			<input type="text" name="' . htmlspecialchars($customFieldInputName, ENT_QUOTES, 'UTF-8') . '[' . htmlspecialchars($field['field_id'], ENT_QUOTES, 'UTF-8') . ']" value="' . htmlspecialchars($field['field_value'], ENT_QUOTES, 'UTF-8') . '" 
				id="ctrl_custom_field_' . htmlspecialchars($field['field_id'], ENT_QUOTES, 'UTF-8') . '"
				data-validatorname="custom_field_' . htmlspecialchars($field['field_id'], ENT_QUOTES, 'UTF-8') . '"
				class="textCtrl" maxlength="' . (($field['max_length']) ? (htmlspecialchars($field['max_length'], ENT_QUOTES, 'UTF-8')) : ('')) . '" 
			/>
		';
}
else if ($field['field_type'] == ('textarea'))
{
$__compilerVar32 .= '
			<textarea name="' . htmlspecialchars($customFieldInputName, ENT_QUOTES, 'UTF-8') . '[' . htmlspecialchars($field['field_id'], ENT_QUOTES, 'UTF-8') . ']" 
				id="ctrl_custom_field_' . htmlspecialchars($field['field_id'], ENT_QUOTES, 'UTF-8') . '"
				data-validatorname="custom_field_' . htmlspecialchars($field['field_id'], ENT_QUOTES, 'UTF-8') . '" 
				class="textCtrl Elastic">' . htmlspecialchars($field['field_value'], ENT_QUOTES, 'UTF-8') . '</textarea>
		';
}
else if ($field['field_type'] == ('bbcode'))
{
$__compilerVar32 .= '
			';
if ($field['editorTemplateHtml'])
{
$__compilerVar32 .= '
				' . $field['editorTemplateHtml'] . '
			';
}
else
{
$__compilerVar32 .= '
				<textarea name="custom_fields[' . htmlspecialchars($field['field_id'], ENT_QUOTES, 'UTF-8') . ']" 
					id="ctrl_custom_field_' . htmlspecialchars($field['field_id'], ENT_QUOTES, 'UTF-8') . '"
					data-validatorname="custom_field_' . htmlspecialchars($field['field_id'], ENT_QUOTES, 'UTF-8') . '" 
					class="textCtrl Elastic">' . htmlspecialchars($field['field_value'], ENT_QUOTES, 'UTF-8') . '</textarea>
			';
}
$__compilerVar32 .= '
';
}
else if ($field['field_type'] == ('radio'))
{
$__compilerVar32 .= '
			<ul class="checkboxColumns">
			';
if (!$field['required'])
{
$__compilerVar32 .= '
				<li><label><input type="radio" name="' . htmlspecialchars($customFieldInputName, ENT_QUOTES, 'UTF-8') . '[' . htmlspecialchars($field['field_id'], ENT_QUOTES, 'UTF-8') . ']" value="" ' . (($field['field_value'] == ('')) ? ' checked="checked"' : '') . ' /> <span class="muted">' . 'No selection' . '</span></label></li>
			';
}
$__compilerVar32 .= '
			';
foreach ($field['fieldChoices'] AS $choice => $text)
{
$__compilerVar32 .= '
				<li><label><input type="radio" name="' . htmlspecialchars($customFieldInputName, ENT_QUOTES, 'UTF-8') . '[' . htmlspecialchars($field['field_id'], ENT_QUOTES, 'UTF-8') . ']" value="' . htmlspecialchars($choice, ENT_QUOTES, 'UTF-8') . '" ' . (($field['field_value'] == $choice) ? ' checked="checked"' : '') . ' /> ' . $text . '</label></li>
			';
}
$__compilerVar32 .= '
			</ul>
		';
}
else if ($field['field_type'] == ('select'))
{
$__compilerVar32 .= '
			<select name="' . htmlspecialchars($customFieldInputName, ENT_QUOTES, 'UTF-8') . '[' . htmlspecialchars($field['field_id'], ENT_QUOTES, 'UTF-8') . ']" id="ctrl_custom_field_' . htmlspecialchars($field['field_id'], ENT_QUOTES, 'UTF-8') . '" class="textCtrl">
			';
if (!$field['required'] OR !$field['hasValue'])
{
$__compilerVar32 .= '
				<option value="">&nbsp;</option>
			';
}
$__compilerVar32 .= '
			';
foreach ($field['fieldChoices'] AS $choice => $text)
{
$__compilerVar32 .= '
				<option value="' . htmlspecialchars($choice, ENT_QUOTES, 'UTF-8') . '" ' . (($field['field_value'] == $choice) ? ' selected="selected"' : '') . '>' . $text . '</option>
			';
}
$__compilerVar32 .= '
			</select>
		';
}
else if ($field['field_type'] == ('checkbox'))
{
$__compilerVar32 .= '
			<ul class="checkboxColumns">
			';
foreach ($field['fieldChoices'] AS $choice => $text)
{
$__compilerVar32 .= '
				<li><label><input type="checkbox" name="' . htmlspecialchars($customFieldInputName, ENT_QUOTES, 'UTF-8') . '[' . htmlspecialchars($field['field_id'], ENT_QUOTES, 'UTF-8') . '][' . htmlspecialchars($choice, ENT_QUOTES, 'UTF-8') . ']" value="' . htmlspecialchars($choice, ENT_QUOTES, 'UTF-8') . '" ' . ((isset($field['field_value'][$choice])) ? ' checked="checked"' : '') . ' /> ' . $text . '</label></li>
			';
}
$__compilerVar32 .= '
			</ul>
		';
}
else if ($field['field_type'] == ('multiselect'))
{
$__compilerVar32 .= '
			<select name="' . htmlspecialchars($customFieldInputName, ENT_QUOTES, 'UTF-8') . '[' . htmlspecialchars($field['field_id'], ENT_QUOTES, 'UTF-8') . '][]" id="ctrl_custom_field_' . htmlspecialchars($field['field_id'], ENT_QUOTES, 'UTF-8') . '" class="textCtrl" size="7" multiple="multiple">
			';
if (!$field['required'] OR !$field['hasValue'])
{
$__compilerVar32 .= '
				<option value="">&nbsp;</option>
			';
}
$__compilerVar32 .= '
			';
foreach ($field['fieldChoices'] AS $choice => $text)
{
$__compilerVar32 .= '
				<option value="' . htmlspecialchars($choice, ENT_QUOTES, 'UTF-8') . '" ' . ((isset($field['field_value'][$choice])) ? ' selected="selected"' : '') . '>' . $text . '</option>
			';
}
$__compilerVar32 .= '
			</select>
		';
}
$__compilerVar32 .= '

		';
$__compilerVar33 = '';
$__compilerVar33 .= $field['description'];
if (trim($__compilerVar33) !== '')
{
$__compilerVar32 .= '<p class="explain">' . $__compilerVar33 . '</p>';
}
unset($__compilerVar33);
$__compilerVar32 .= '
		<input type="hidden" name="custom_fields_shown[]" value="' . htmlspecialchars($field['field_id'], ENT_QUOTES, 'UTF-8') . '" />
	</dd>
</dl>';
$__output .= $__compilerVar32;
unset($__compilerVar32);
$__output .= '
			';
}
$__output .= '
		</fieldset>
	';
}
$__output .= '

	<fieldset>
		<dl class="ctrlUnit">
			<dt><label for="ctrl_message">' . 'Description' . ':</label></dt>
			<dd>
				' . $editorTemplate . '
				<p class="explain">' . 'Provide a more in-depth description of your resource, including its feature highlights and any other important information. You should also include installation instructions in this area, if any are required.' . '</p>
			</dd>
		</dl>

		';
if ($attachmentParams)
{
$__output .= '
			<dl class="ctrlUnit AttachedFilesUnit">
				<dt><label for="ctrl_uploader">' . 'Các file đính kèm' . ':</label></dt>
				<dd>';
$__compilerVar34 = '';
if ($attachmentParams)
{
$__compilerVar34 .= '

	';
$this->addRequiredExternal('js', 'js/xenforo/attachment_editor.js');
$__compilerVar34 .= '
	';
$this->addRequiredExternal('css', 'attachment_editor');
$__compilerVar34 .= '
	
	<div class="AttachmentEditor">
	
		';
if ($showUploadButton)
{
$__compilerVar34 .= '
			';
$__compilerVar35 = '';
if ($attachmentParams)
{
$__compilerVar35 .= '

	';
$this->addRequiredExternal('js', 'js/xenforo/attachment_editor.js');
$__compilerVar35 .= '
	';
if ($xenOptions['swfUpload'] AND $visitor['enable_flash_uploader'])
{
$__compilerVar35 .= '
		';
$this->addRequiredExternal('js', 'js/swfupload/swfupload.min.js');
$__compilerVar35 .= '
	';
}
$__compilerVar35 .= '	
	';
$this->addRequiredExternal('css', 'attachment_editor');
$__compilerVar35 .= '

	<span id="AttachmentUploader" class="buttonProxy AttachmentUploader"
		style="display: none"
		data-placeholder="#SWFUploadPlaceHolder"
		data-trigger="#ctrl_uploader"
		data-postname="upload"
		data-maxfilesize="' . htmlspecialchars($attachmentConstraints['size'], ENT_QUOTES, 'UTF-8') . '"
		data-maxuploads="' . htmlspecialchars($attachmentConstraints['count'], ENT_QUOTES, 'UTF-8') . '"
		data-extensions="' . XenForo_Template_Helper_Core::callHelper('implode', array(
'0' => $attachmentConstraints['extensions'],
'1' => ','
)) . '"
		data-action="' . XenForo_Template_Helper_Core::link('full:attachments/do-upload.json', '', array(
'hash' => $attachmentParams['hash'],
'content_type' => $attachmentParams['content_type'],
'key' => $attachmentButtonKey
)) . '"
		data-uniquekey="' . htmlspecialchars($attachmentButtonKey, ENT_QUOTES, 'UTF-8') . '"
		data-err-110="' . 'File đã tải lên lớn hơn so với quy định.' . '"
		data-err-120="' . 'The uploaded file is empty.' . '"
		data-err-130="' . 'The uploaded file does not have an allowed extension.' . '"
		data-err-unknown="' . 'There was a problem uploading your file.' . '">
		
		<span id="SWFUploadPlaceHolder"></span>		
			
		<input type="button" value="' . (($buttonText) ? ($buttonText) : ('Tải lên file đính kèm')) . '"
			id="ctrl_uploader" class="button OverlayTrigger DisableOnSubmit"
			data-href="' . XenForo_Template_Helper_Core::link('full:attachments/upload', '', array(
'_params' => $attachmentParams,
'key' => $attachmentButtonKey
)) . '"
			data-hider="#AttachmentUploader" />
		<span class="HiddenInput" data-name="_xfSessionId" data-value="' . htmlspecialchars($sessionId, ENT_QUOTES, 'UTF-8') . '"></span>
		';
foreach ($attachmentParams['content_data'] AS $dataKey => $dataValue)
{
$__compilerVar35 .= '<span class="HiddenInput" data-name="content_data[' . htmlspecialchars($dataKey, ENT_QUOTES, 'UTF-8') . ']" data-value="' . htmlspecialchars($dataValue, ENT_QUOTES, 'UTF-8') . '"></span>
		';
}
$__compilerVar35 .= '
	</span>

	<noscript>
		<a href="' . XenForo_Template_Helper_Core::link('attachments/upload', '', array(
'_params' => $attachmentParams
)) . '" class="button" target="_blank">' . (($buttonText) ? ($buttonText) : ('Tải lên file đính kèm')) . '</a>
	</noscript>

';
}
$__compilerVar34 .= $__compilerVar35;
unset($__compilerVar35);
$__compilerVar34 .= '
		';
}
$__compilerVar34 .= '
		
		<div class="NoAttachments"></div>
		
		<div class="secondaryContent AttachmentInsertAllBlock JsOnly">
			<span></span>
			<div class="AttachmentText">
				<div class="label">' . 'Chèn các ảnh theo kiểu' . '...</div>
				<div class="controls">
					<!--<input type="button" value="' . 'Delete All' . '" class="button _smallButton AttachmentDeleteAll" />-->
					<input type="button" value="' . 'Hình thu nhỏ' . '" class="button smallButton AttachmentInsertAll" name="thumb" />
					<input type="button" value="' . 'Hình đầy đủ' . '" class="button smallButton AttachmentInsertAll" name="image" />
				</div>
			</div>
		</div>
	
		<ol class="AttachmentList New">
			';
$__compilerVar36 = '';
$__compilerVar36 .= '1';
$__compilerVar37 = '';
$__compilerVar38 = '';
$this->addRequiredExternal('css', 'attachment_editor');
$__compilerVar38 .= '

<li id="' . (($__compilerVar36) ? ('AttachedFileTemplate') : ('attachment' . htmlspecialchars($__compilerVar37['attachment_id'], ENT_QUOTES, 'UTF-8'))) . '"
	class="AttachedFile ' . (($__compilerVar37 and $__compilerVar37['thumbnailUrl']) ? ('AttachedImage') : ('')) . ' secondaryContent">

	<div class="Thumbnail">
		';
if ($__compilerVar37 and $__compilerVar37['thumbnailUrl'])
{
$__compilerVar38 .= '
			<a href="' . XenForo_Template_Helper_Core::link('attachments', $__compilerVar37, array()) . '" target="_blank"
				data-attachmentId="' . htmlspecialchars($__compilerVar37['attachment_id'], ENT_QUOTES, 'UTF-8') . '"
				class="_not_LbTrigger" data-href="' . XenForo_Template_Helper_Core::link('misc/lightbox', false, array()) . '"><img
				src="' . htmlspecialchars($__compilerVar37['thumbnailUrl'], ENT_QUOTES, 'UTF-8') . '" alt="' . htmlspecialchars($__compilerVar37['filename'], ENT_QUOTES, 'UTF-8') . '"
				class="_not_LbImage" data-src="' . XenForo_Template_Helper_Core::link('attachments', $__compilerVar37, array(
'embedded' => '1'
)) . '" /></a>
		';
}
else
{
$__compilerVar38 .= '
			<span class="genericAttachment"></span>
		';
}
$__compilerVar38 .= '
	</div>

	<div class="AttachmentText">
		<div class="Filename"><a href="' . XenForo_Template_Helper_Core::link('attachments', $__compilerVar37, array()) . '" target="_blank">' . (($__compilerVar37) ? (htmlspecialchars($__compilerVar37['filename'], ENT_QUOTES, 'UTF-8')) : ('')) . '</a></div>
	
		';
if ($__compilerVar36)
{
$__compilerVar38 .= '
			<input type="button" value="' . 'Hủy bỏ' . '" class="button smallButton AttachmentCanceller" />
			
			<span class="ProgressMeter"><span class="ProgressGraphic">&nbsp;</span><span class="ProgressCounter">0%</span></span>
		';
}
else
{
$__compilerVar38 .= '
			<noscript>
				<a href="' . XenForo_Template_Helper_Core::link('attachments/upload', '', array(
'_params' => $attachmentParams
)) . '" target="_blank" class="button Smallbutton">' . 'Xóa' . '</a>
			</noscript>
			
			';
if ($__compilerVar37['thumbnailUrl'])
{
$__compilerVar38 .= '
				<div class="label JsOnly">' . 'Chèn' . ':</div>
			';
}
$__compilerVar38 .= '
			
			<div class="controls JsOnly">				
				<input type="button" value="' . 'Xóa' . '" class="button smallButton AttachmentDeleter" data-href="' . XenForo_Template_Helper_Core::link('attachments/delete', $__compilerVar37, array()) . '" />
			
				';
if ($__compilerVar37['thumbnailUrl'])
{
$__compilerVar38 .= '
					<input type="button" name="thumb" value="' . 'Hình thu nhỏ' . '" class="button smallButton AttachmentInserter" />
					<input type="button" name="image" value="' . 'Hình đầy đủ' . '" class="button smallButton AttachmentInserter" />
				';
}
$__compilerVar38 .= '
			</div>
		';
}
$__compilerVar38 .= '

	</div>
	
</li>';
$__compilerVar34 .= $__compilerVar38;
unset($__compilerVar36, $__compilerVar37, $__compilerVar38);
$__compilerVar34 .= '
			';
if ($attachments)
{
$__compilerVar34 .= '
				';
foreach ($attachments AS $attachment)
{
$__compilerVar34 .= '
					';
if ($attachment['temp_hash'])
{
$__compilerVar34 .= '
						';
$__compilerVar39 = '';
$this->addRequiredExternal('css', 'attachment_editor');
$__compilerVar39 .= '

<li id="' . (($isTemplate) ? ('AttachedFileTemplate') : ('attachment' . htmlspecialchars($attachment['attachment_id'], ENT_QUOTES, 'UTF-8'))) . '"
	class="AttachedFile ' . (($attachment and $attachment['thumbnailUrl']) ? ('AttachedImage') : ('')) . ' secondaryContent">

	<div class="Thumbnail">
		';
if ($attachment and $attachment['thumbnailUrl'])
{
$__compilerVar39 .= '
			<a href="' . XenForo_Template_Helper_Core::link('attachments', $attachment, array()) . '" target="_blank"
				data-attachmentId="' . htmlspecialchars($attachment['attachment_id'], ENT_QUOTES, 'UTF-8') . '"
				class="_not_LbTrigger" data-href="' . XenForo_Template_Helper_Core::link('misc/lightbox', false, array()) . '"><img
				src="' . htmlspecialchars($attachment['thumbnailUrl'], ENT_QUOTES, 'UTF-8') . '" alt="' . htmlspecialchars($attachment['filename'], ENT_QUOTES, 'UTF-8') . '"
				class="_not_LbImage" data-src="' . XenForo_Template_Helper_Core::link('attachments', $attachment, array(
'embedded' => '1'
)) . '" /></a>
		';
}
else
{
$__compilerVar39 .= '
			<span class="genericAttachment"></span>
		';
}
$__compilerVar39 .= '
	</div>

	<div class="AttachmentText">
		<div class="Filename"><a href="' . XenForo_Template_Helper_Core::link('attachments', $attachment, array()) . '" target="_blank">' . (($attachment) ? (htmlspecialchars($attachment['filename'], ENT_QUOTES, 'UTF-8')) : ('')) . '</a></div>
	
		';
if ($isTemplate)
{
$__compilerVar39 .= '
			<input type="button" value="' . 'Hủy bỏ' . '" class="button smallButton AttachmentCanceller" />
			
			<span class="ProgressMeter"><span class="ProgressGraphic">&nbsp;</span><span class="ProgressCounter">0%</span></span>
		';
}
else
{
$__compilerVar39 .= '
			<noscript>
				<a href="' . XenForo_Template_Helper_Core::link('attachments/upload', '', array(
'_params' => $attachmentParams
)) . '" target="_blank" class="button Smallbutton">' . 'Xóa' . '</a>
			</noscript>
			
			';
if ($attachment['thumbnailUrl'])
{
$__compilerVar39 .= '
				<div class="label JsOnly">' . 'Chèn' . ':</div>
			';
}
$__compilerVar39 .= '
			
			<div class="controls JsOnly">				
				<input type="button" value="' . 'Xóa' . '" class="button smallButton AttachmentDeleter" data-href="' . XenForo_Template_Helper_Core::link('attachments/delete', $attachment, array()) . '" />
			
				';
if ($attachment['thumbnailUrl'])
{
$__compilerVar39 .= '
					<input type="button" name="thumb" value="' . 'Hình thu nhỏ' . '" class="button smallButton AttachmentInserter" />
					<input type="button" name="image" value="' . 'Hình đầy đủ' . '" class="button smallButton AttachmentInserter" />
				';
}
$__compilerVar39 .= '
			</div>
		';
}
$__compilerVar39 .= '

	</div>
	
</li>';
$__compilerVar34 .= $__compilerVar39;
unset($__compilerVar39);
$__compilerVar34 .= '
					';
}
$__compilerVar34 .= '
				';
}
$__compilerVar34 .= '
			';
}
$__compilerVar34 .= '
		</ol>
	
		';
if ($attachments)
{
$__compilerVar34 .= '
			';
$__compilerVar40 = '';
$__compilerVar40 .= '
					';
foreach ($attachments AS $attachment)
{
$__compilerVar40 .= '
						';
if (!$attachment['temp_hash'])
{
$__compilerVar40 .= '
							';
$__compilerVar41 = '';
$this->addRequiredExternal('css', 'attachment_editor');
$__compilerVar41 .= '

<li id="' . (($isTemplate) ? ('AttachedFileTemplate') : ('attachment' . htmlspecialchars($attachment['attachment_id'], ENT_QUOTES, 'UTF-8'))) . '"
	class="AttachedFile ' . (($attachment and $attachment['thumbnailUrl']) ? ('AttachedImage') : ('')) . ' secondaryContent">

	<div class="Thumbnail">
		';
if ($attachment and $attachment['thumbnailUrl'])
{
$__compilerVar41 .= '
			<a href="' . XenForo_Template_Helper_Core::link('attachments', $attachment, array()) . '" target="_blank"
				data-attachmentId="' . htmlspecialchars($attachment['attachment_id'], ENT_QUOTES, 'UTF-8') . '"
				class="_not_LbTrigger" data-href="' . XenForo_Template_Helper_Core::link('misc/lightbox', false, array()) . '"><img
				src="' . htmlspecialchars($attachment['thumbnailUrl'], ENT_QUOTES, 'UTF-8') . '" alt="' . htmlspecialchars($attachment['filename'], ENT_QUOTES, 'UTF-8') . '"
				class="_not_LbImage" data-src="' . XenForo_Template_Helper_Core::link('attachments', $attachment, array(
'embedded' => '1'
)) . '" /></a>
		';
}
else
{
$__compilerVar41 .= '
			<span class="genericAttachment"></span>
		';
}
$__compilerVar41 .= '
	</div>

	<div class="AttachmentText">
		<div class="Filename"><a href="' . XenForo_Template_Helper_Core::link('attachments', $attachment, array()) . '" target="_blank">' . (($attachment) ? (htmlspecialchars($attachment['filename'], ENT_QUOTES, 'UTF-8')) : ('')) . '</a></div>
	
		';
if ($isTemplate)
{
$__compilerVar41 .= '
			<input type="button" value="' . 'Hủy bỏ' . '" class="button smallButton AttachmentCanceller" />
			
			<span class="ProgressMeter"><span class="ProgressGraphic">&nbsp;</span><span class="ProgressCounter">0%</span></span>
		';
}
else
{
$__compilerVar41 .= '
			<noscript>
				<a href="' . XenForo_Template_Helper_Core::link('attachments/upload', '', array(
'_params' => $attachmentParams
)) . '" target="_blank" class="button Smallbutton">' . 'Xóa' . '</a>
			</noscript>
			
			';
if ($attachment['thumbnailUrl'])
{
$__compilerVar41 .= '
				<div class="label JsOnly">' . 'Chèn' . ':</div>
			';
}
$__compilerVar41 .= '
			
			<div class="controls JsOnly">				
				<input type="button" value="' . 'Xóa' . '" class="button smallButton AttachmentDeleter" data-href="' . XenForo_Template_Helper_Core::link('attachments/delete', $attachment, array()) . '" />
			
				';
if ($attachment['thumbnailUrl'])
{
$__compilerVar41 .= '
					<input type="button" name="thumb" value="' . 'Hình thu nhỏ' . '" class="button smallButton AttachmentInserter" />
					<input type="button" name="image" value="' . 'Hình đầy đủ' . '" class="button smallButton AttachmentInserter" />
				';
}
$__compilerVar41 .= '
			</div>
		';
}
$__compilerVar41 .= '

	</div>
	
</li>';
$__compilerVar40 .= $__compilerVar41;
unset($__compilerVar41);
$__compilerVar40 .= '
						';
}
$__compilerVar40 .= '
					';
}
$__compilerVar40 .= '
				';
if (trim($__compilerVar40) !== '')
{
$__compilerVar34 .= '
			<ol class="AttachmentList Existing">
				' . $__compilerVar40 . '
			</ol>
			';
}
unset($__compilerVar40);
$__compilerVar34 .= '
		';
}
$__compilerVar34 .= '
		
		<input type="hidden" name="attachment_hash" value="' . htmlspecialchars($attachmentParams['hash'], ENT_QUOTES, 'UTF-8') . '" />
		
		' . '
		
	</div>
	
';
}
$__output .= $__compilerVar34;
unset($__compilerVar34);
$__output .= '</dd>
			</dl>
		';
}
$__output .= '
	</fieldset>

	';
if ($customFields['below_info'])
{
$__output .= '
		<fieldset>
			';
foreach ($customFields['below_info'] AS $field)
{
$__output .= '
				';
$__compilerVar42 = '';
if (!$customFieldInputName)
{
$customFieldInputName = 'custom_fields';
}
$__compilerVar42 .= '
<dl class="ctrlUnit customFieldEdit' . htmlspecialchars($field['field_id'], ENT_QUOTES, 'UTF-8') . ' ' . htmlspecialchars($customFieldExtraClass, ENT_QUOTES, 'UTF-8') . '">
	<dt>
		<label for="ctrl_custom_field_' . htmlspecialchars($field['field_id'], ENT_QUOTES, 'UTF-8') . '">' . htmlspecialchars($field['title'], ENT_QUOTES, 'UTF-8') . ':</label>
		';
if ($field['required'])
{
$__compilerVar42 .= '<dfn>' . 'Required' . '</dfn>';
}
$__compilerVar42 .= '
	</dt>
	<dd>
		';
if ($field['field_type'] == ('textbox'))
{
$__compilerVar42 .= '
			<input type="text" name="' . htmlspecialchars($customFieldInputName, ENT_QUOTES, 'UTF-8') . '[' . htmlspecialchars($field['field_id'], ENT_QUOTES, 'UTF-8') . ']" value="' . htmlspecialchars($field['field_value'], ENT_QUOTES, 'UTF-8') . '" 
				id="ctrl_custom_field_' . htmlspecialchars($field['field_id'], ENT_QUOTES, 'UTF-8') . '"
				data-validatorname="custom_field_' . htmlspecialchars($field['field_id'], ENT_QUOTES, 'UTF-8') . '"
				class="textCtrl" maxlength="' . (($field['max_length']) ? (htmlspecialchars($field['max_length'], ENT_QUOTES, 'UTF-8')) : ('')) . '" 
			/>
		';
}
else if ($field['field_type'] == ('textarea'))
{
$__compilerVar42 .= '
			<textarea name="' . htmlspecialchars($customFieldInputName, ENT_QUOTES, 'UTF-8') . '[' . htmlspecialchars($field['field_id'], ENT_QUOTES, 'UTF-8') . ']" 
				id="ctrl_custom_field_' . htmlspecialchars($field['field_id'], ENT_QUOTES, 'UTF-8') . '"
				data-validatorname="custom_field_' . htmlspecialchars($field['field_id'], ENT_QUOTES, 'UTF-8') . '" 
				class="textCtrl Elastic">' . htmlspecialchars($field['field_value'], ENT_QUOTES, 'UTF-8') . '</textarea>
		';
}
else if ($field['field_type'] == ('bbcode'))
{
$__compilerVar42 .= '
			';
if ($field['editorTemplateHtml'])
{
$__compilerVar42 .= '
				' . $field['editorTemplateHtml'] . '
			';
}
else
{
$__compilerVar42 .= '
				<textarea name="custom_fields[' . htmlspecialchars($field['field_id'], ENT_QUOTES, 'UTF-8') . ']" 
					id="ctrl_custom_field_' . htmlspecialchars($field['field_id'], ENT_QUOTES, 'UTF-8') . '"
					data-validatorname="custom_field_' . htmlspecialchars($field['field_id'], ENT_QUOTES, 'UTF-8') . '" 
					class="textCtrl Elastic">' . htmlspecialchars($field['field_value'], ENT_QUOTES, 'UTF-8') . '</textarea>
			';
}
$__compilerVar42 .= '
';
}
else if ($field['field_type'] == ('radio'))
{
$__compilerVar42 .= '
			<ul class="checkboxColumns">
			';
if (!$field['required'])
{
$__compilerVar42 .= '
				<li><label><input type="radio" name="' . htmlspecialchars($customFieldInputName, ENT_QUOTES, 'UTF-8') . '[' . htmlspecialchars($field['field_id'], ENT_QUOTES, 'UTF-8') . ']" value="" ' . (($field['field_value'] == ('')) ? ' checked="checked"' : '') . ' /> <span class="muted">' . 'No selection' . '</span></label></li>
			';
}
$__compilerVar42 .= '
			';
foreach ($field['fieldChoices'] AS $choice => $text)
{
$__compilerVar42 .= '
				<li><label><input type="radio" name="' . htmlspecialchars($customFieldInputName, ENT_QUOTES, 'UTF-8') . '[' . htmlspecialchars($field['field_id'], ENT_QUOTES, 'UTF-8') . ']" value="' . htmlspecialchars($choice, ENT_QUOTES, 'UTF-8') . '" ' . (($field['field_value'] == $choice) ? ' checked="checked"' : '') . ' /> ' . $text . '</label></li>
			';
}
$__compilerVar42 .= '
			</ul>
		';
}
else if ($field['field_type'] == ('select'))
{
$__compilerVar42 .= '
			<select name="' . htmlspecialchars($customFieldInputName, ENT_QUOTES, 'UTF-8') . '[' . htmlspecialchars($field['field_id'], ENT_QUOTES, 'UTF-8') . ']" id="ctrl_custom_field_' . htmlspecialchars($field['field_id'], ENT_QUOTES, 'UTF-8') . '" class="textCtrl">
			';
if (!$field['required'] OR !$field['hasValue'])
{
$__compilerVar42 .= '
				<option value="">&nbsp;</option>
			';
}
$__compilerVar42 .= '
			';
foreach ($field['fieldChoices'] AS $choice => $text)
{
$__compilerVar42 .= '
				<option value="' . htmlspecialchars($choice, ENT_QUOTES, 'UTF-8') . '" ' . (($field['field_value'] == $choice) ? ' selected="selected"' : '') . '>' . $text . '</option>
			';
}
$__compilerVar42 .= '
			</select>
		';
}
else if ($field['field_type'] == ('checkbox'))
{
$__compilerVar42 .= '
			<ul class="checkboxColumns">
			';
foreach ($field['fieldChoices'] AS $choice => $text)
{
$__compilerVar42 .= '
				<li><label><input type="checkbox" name="' . htmlspecialchars($customFieldInputName, ENT_QUOTES, 'UTF-8') . '[' . htmlspecialchars($field['field_id'], ENT_QUOTES, 'UTF-8') . '][' . htmlspecialchars($choice, ENT_QUOTES, 'UTF-8') . ']" value="' . htmlspecialchars($choice, ENT_QUOTES, 'UTF-8') . '" ' . ((isset($field['field_value'][$choice])) ? ' checked="checked"' : '') . ' /> ' . $text . '</label></li>
			';
}
$__compilerVar42 .= '
			</ul>
		';
}
else if ($field['field_type'] == ('multiselect'))
{
$__compilerVar42 .= '
			<select name="' . htmlspecialchars($customFieldInputName, ENT_QUOTES, 'UTF-8') . '[' . htmlspecialchars($field['field_id'], ENT_QUOTES, 'UTF-8') . '][]" id="ctrl_custom_field_' . htmlspecialchars($field['field_id'], ENT_QUOTES, 'UTF-8') . '" class="textCtrl" size="7" multiple="multiple">
			';
if (!$field['required'] OR !$field['hasValue'])
{
$__compilerVar42 .= '
				<option value="">&nbsp;</option>
			';
}
$__compilerVar42 .= '
			';
foreach ($field['fieldChoices'] AS $choice => $text)
{
$__compilerVar42 .= '
				<option value="' . htmlspecialchars($choice, ENT_QUOTES, 'UTF-8') . '" ' . ((isset($field['field_value'][$choice])) ? ' selected="selected"' : '') . '>' . $text . '</option>
			';
}
$__compilerVar42 .= '
			</select>
		';
}
$__compilerVar42 .= '

		';
$__compilerVar43 = '';
$__compilerVar43 .= $field['description'];
if (trim($__compilerVar43) !== '')
{
$__compilerVar42 .= '<p class="explain">' . $__compilerVar43 . '</p>';
}
unset($__compilerVar43);
$__compilerVar42 .= '
		<input type="hidden" name="custom_fields_shown[]" value="' . htmlspecialchars($field['field_id'], ENT_QUOTES, 'UTF-8') . '" />
	</dd>
</dl>';
$__output .= $__compilerVar42;
unset($__compilerVar42);
$__output .= '
			';
}
$__output .= '
		</fieldset>
	';
}
$__output .= '

	';
if ($customFields['extra_tab'])
{
$__output .= '
		<fieldset>
			';
foreach ($customFields['extra_tab'] AS $field)
{
$__output .= '
				';
$__compilerVar44 = '';
if (!$customFieldInputName)
{
$customFieldInputName = 'custom_fields';
}
$__compilerVar44 .= '
<dl class="ctrlUnit customFieldEdit' . htmlspecialchars($field['field_id'], ENT_QUOTES, 'UTF-8') . ' ' . htmlspecialchars($customFieldExtraClass, ENT_QUOTES, 'UTF-8') . '">
	<dt>
		<label for="ctrl_custom_field_' . htmlspecialchars($field['field_id'], ENT_QUOTES, 'UTF-8') . '">' . htmlspecialchars($field['title'], ENT_QUOTES, 'UTF-8') . ':</label>
		';
if ($field['required'])
{
$__compilerVar44 .= '<dfn>' . 'Required' . '</dfn>';
}
$__compilerVar44 .= '
	</dt>
	<dd>
		';
if ($field['field_type'] == ('textbox'))
{
$__compilerVar44 .= '
			<input type="text" name="' . htmlspecialchars($customFieldInputName, ENT_QUOTES, 'UTF-8') . '[' . htmlspecialchars($field['field_id'], ENT_QUOTES, 'UTF-8') . ']" value="' . htmlspecialchars($field['field_value'], ENT_QUOTES, 'UTF-8') . '" 
				id="ctrl_custom_field_' . htmlspecialchars($field['field_id'], ENT_QUOTES, 'UTF-8') . '"
				data-validatorname="custom_field_' . htmlspecialchars($field['field_id'], ENT_QUOTES, 'UTF-8') . '"
				class="textCtrl" maxlength="' . (($field['max_length']) ? (htmlspecialchars($field['max_length'], ENT_QUOTES, 'UTF-8')) : ('')) . '" 
			/>
		';
}
else if ($field['field_type'] == ('textarea'))
{
$__compilerVar44 .= '
			<textarea name="' . htmlspecialchars($customFieldInputName, ENT_QUOTES, 'UTF-8') . '[' . htmlspecialchars($field['field_id'], ENT_QUOTES, 'UTF-8') . ']" 
				id="ctrl_custom_field_' . htmlspecialchars($field['field_id'], ENT_QUOTES, 'UTF-8') . '"
				data-validatorname="custom_field_' . htmlspecialchars($field['field_id'], ENT_QUOTES, 'UTF-8') . '" 
				class="textCtrl Elastic">' . htmlspecialchars($field['field_value'], ENT_QUOTES, 'UTF-8') . '</textarea>
		';
}
else if ($field['field_type'] == ('bbcode'))
{
$__compilerVar44 .= '
			';
if ($field['editorTemplateHtml'])
{
$__compilerVar44 .= '
				' . $field['editorTemplateHtml'] . '
			';
}
else
{
$__compilerVar44 .= '
				<textarea name="custom_fields[' . htmlspecialchars($field['field_id'], ENT_QUOTES, 'UTF-8') . ']" 
					id="ctrl_custom_field_' . htmlspecialchars($field['field_id'], ENT_QUOTES, 'UTF-8') . '"
					data-validatorname="custom_field_' . htmlspecialchars($field['field_id'], ENT_QUOTES, 'UTF-8') . '" 
					class="textCtrl Elastic">' . htmlspecialchars($field['field_value'], ENT_QUOTES, 'UTF-8') . '</textarea>
			';
}
$__compilerVar44 .= '
';
}
else if ($field['field_type'] == ('radio'))
{
$__compilerVar44 .= '
			<ul class="checkboxColumns">
			';
if (!$field['required'])
{
$__compilerVar44 .= '
				<li><label><input type="radio" name="' . htmlspecialchars($customFieldInputName, ENT_QUOTES, 'UTF-8') . '[' . htmlspecialchars($field['field_id'], ENT_QUOTES, 'UTF-8') . ']" value="" ' . (($field['field_value'] == ('')) ? ' checked="checked"' : '') . ' /> <span class="muted">' . 'No selection' . '</span></label></li>
			';
}
$__compilerVar44 .= '
			';
foreach ($field['fieldChoices'] AS $choice => $text)
{
$__compilerVar44 .= '
				<li><label><input type="radio" name="' . htmlspecialchars($customFieldInputName, ENT_QUOTES, 'UTF-8') . '[' . htmlspecialchars($field['field_id'], ENT_QUOTES, 'UTF-8') . ']" value="' . htmlspecialchars($choice, ENT_QUOTES, 'UTF-8') . '" ' . (($field['field_value'] == $choice) ? ' checked="checked"' : '') . ' /> ' . $text . '</label></li>
			';
}
$__compilerVar44 .= '
			</ul>
		';
}
else if ($field['field_type'] == ('select'))
{
$__compilerVar44 .= '
			<select name="' . htmlspecialchars($customFieldInputName, ENT_QUOTES, 'UTF-8') . '[' . htmlspecialchars($field['field_id'], ENT_QUOTES, 'UTF-8') . ']" id="ctrl_custom_field_' . htmlspecialchars($field['field_id'], ENT_QUOTES, 'UTF-8') . '" class="textCtrl">
			';
if (!$field['required'] OR !$field['hasValue'])
{
$__compilerVar44 .= '
				<option value="">&nbsp;</option>
			';
}
$__compilerVar44 .= '
			';
foreach ($field['fieldChoices'] AS $choice => $text)
{
$__compilerVar44 .= '
				<option value="' . htmlspecialchars($choice, ENT_QUOTES, 'UTF-8') . '" ' . (($field['field_value'] == $choice) ? ' selected="selected"' : '') . '>' . $text . '</option>
			';
}
$__compilerVar44 .= '
			</select>
		';
}
else if ($field['field_type'] == ('checkbox'))
{
$__compilerVar44 .= '
			<ul class="checkboxColumns">
			';
foreach ($field['fieldChoices'] AS $choice => $text)
{
$__compilerVar44 .= '
				<li><label><input type="checkbox" name="' . htmlspecialchars($customFieldInputName, ENT_QUOTES, 'UTF-8') . '[' . htmlspecialchars($field['field_id'], ENT_QUOTES, 'UTF-8') . '][' . htmlspecialchars($choice, ENT_QUOTES, 'UTF-8') . ']" value="' . htmlspecialchars($choice, ENT_QUOTES, 'UTF-8') . '" ' . ((isset($field['field_value'][$choice])) ? ' checked="checked"' : '') . ' /> ' . $text . '</label></li>
			';
}
$__compilerVar44 .= '
			</ul>
		';
}
else if ($field['field_type'] == ('multiselect'))
{
$__compilerVar44 .= '
			<select name="' . htmlspecialchars($customFieldInputName, ENT_QUOTES, 'UTF-8') . '[' . htmlspecialchars($field['field_id'], ENT_QUOTES, 'UTF-8') . '][]" id="ctrl_custom_field_' . htmlspecialchars($field['field_id'], ENT_QUOTES, 'UTF-8') . '" class="textCtrl" size="7" multiple="multiple">
			';
if (!$field['required'] OR !$field['hasValue'])
{
$__compilerVar44 .= '
				<option value="">&nbsp;</option>
			';
}
$__compilerVar44 .= '
			';
foreach ($field['fieldChoices'] AS $choice => $text)
{
$__compilerVar44 .= '
				<option value="' . htmlspecialchars($choice, ENT_QUOTES, 'UTF-8') . '" ' . ((isset($field['field_value'][$choice])) ? ' selected="selected"' : '') . '>' . $text . '</option>
			';
}
$__compilerVar44 .= '
			</select>
		';
}
$__compilerVar44 .= '

		';
$__compilerVar45 = '';
$__compilerVar45 .= $field['description'];
if (trim($__compilerVar45) !== '')
{
$__compilerVar44 .= '<p class="explain">' . $__compilerVar45 . '</p>';
}
unset($__compilerVar45);
$__compilerVar44 .= '
		<input type="hidden" name="custom_fields_shown[]" value="' . htmlspecialchars($field['field_id'], ENT_QUOTES, 'UTF-8') . '" />
	</dd>
</dl>';
$__output .= $__compilerVar44;
unset($__compilerVar44);
$__output .= '
			';
}
$__output .= '
		</fieldset>
	';
}
$__output .= '

	';
if ($customFields['new_tab'])
{
$__output .= '
		<fieldset>
			';
foreach ($customFields['new_tab'] AS $field)
{
$__output .= '
				';
$__compilerVar46 = '';
if (!$customFieldInputName)
{
$customFieldInputName = 'custom_fields';
}
$__compilerVar46 .= '
<dl class="ctrlUnit customFieldEdit' . htmlspecialchars($field['field_id'], ENT_QUOTES, 'UTF-8') . ' ' . htmlspecialchars($customFieldExtraClass, ENT_QUOTES, 'UTF-8') . '">
	<dt>
		<label for="ctrl_custom_field_' . htmlspecialchars($field['field_id'], ENT_QUOTES, 'UTF-8') . '">' . htmlspecialchars($field['title'], ENT_QUOTES, 'UTF-8') . ':</label>
		';
if ($field['required'])
{
$__compilerVar46 .= '<dfn>' . 'Required' . '</dfn>';
}
$__compilerVar46 .= '
	</dt>
	<dd>
		';
if ($field['field_type'] == ('textbox'))
{
$__compilerVar46 .= '
			<input type="text" name="' . htmlspecialchars($customFieldInputName, ENT_QUOTES, 'UTF-8') . '[' . htmlspecialchars($field['field_id'], ENT_QUOTES, 'UTF-8') . ']" value="' . htmlspecialchars($field['field_value'], ENT_QUOTES, 'UTF-8') . '" 
				id="ctrl_custom_field_' . htmlspecialchars($field['field_id'], ENT_QUOTES, 'UTF-8') . '"
				data-validatorname="custom_field_' . htmlspecialchars($field['field_id'], ENT_QUOTES, 'UTF-8') . '"
				class="textCtrl" maxlength="' . (($field['max_length']) ? (htmlspecialchars($field['max_length'], ENT_QUOTES, 'UTF-8')) : ('')) . '" 
			/>
		';
}
else if ($field['field_type'] == ('textarea'))
{
$__compilerVar46 .= '
			<textarea name="' . htmlspecialchars($customFieldInputName, ENT_QUOTES, 'UTF-8') . '[' . htmlspecialchars($field['field_id'], ENT_QUOTES, 'UTF-8') . ']" 
				id="ctrl_custom_field_' . htmlspecialchars($field['field_id'], ENT_QUOTES, 'UTF-8') . '"
				data-validatorname="custom_field_' . htmlspecialchars($field['field_id'], ENT_QUOTES, 'UTF-8') . '" 
				class="textCtrl Elastic">' . htmlspecialchars($field['field_value'], ENT_QUOTES, 'UTF-8') . '</textarea>
		';
}
else if ($field['field_type'] == ('bbcode'))
{
$__compilerVar46 .= '
			';
if ($field['editorTemplateHtml'])
{
$__compilerVar46 .= '
				' . $field['editorTemplateHtml'] . '
			';
}
else
{
$__compilerVar46 .= '
				<textarea name="custom_fields[' . htmlspecialchars($field['field_id'], ENT_QUOTES, 'UTF-8') . ']" 
					id="ctrl_custom_field_' . htmlspecialchars($field['field_id'], ENT_QUOTES, 'UTF-8') . '"
					data-validatorname="custom_field_' . htmlspecialchars($field['field_id'], ENT_QUOTES, 'UTF-8') . '" 
					class="textCtrl Elastic">' . htmlspecialchars($field['field_value'], ENT_QUOTES, 'UTF-8') . '</textarea>
			';
}
$__compilerVar46 .= '
';
}
else if ($field['field_type'] == ('radio'))
{
$__compilerVar46 .= '
			<ul class="checkboxColumns">
			';
if (!$field['required'])
{
$__compilerVar46 .= '
				<li><label><input type="radio" name="' . htmlspecialchars($customFieldInputName, ENT_QUOTES, 'UTF-8') . '[' . htmlspecialchars($field['field_id'], ENT_QUOTES, 'UTF-8') . ']" value="" ' . (($field['field_value'] == ('')) ? ' checked="checked"' : '') . ' /> <span class="muted">' . 'No selection' . '</span></label></li>
			';
}
$__compilerVar46 .= '
			';
foreach ($field['fieldChoices'] AS $choice => $text)
{
$__compilerVar46 .= '
				<li><label><input type="radio" name="' . htmlspecialchars($customFieldInputName, ENT_QUOTES, 'UTF-8') . '[' . htmlspecialchars($field['field_id'], ENT_QUOTES, 'UTF-8') . ']" value="' . htmlspecialchars($choice, ENT_QUOTES, 'UTF-8') . '" ' . (($field['field_value'] == $choice) ? ' checked="checked"' : '') . ' /> ' . $text . '</label></li>
			';
}
$__compilerVar46 .= '
			</ul>
		';
}
else if ($field['field_type'] == ('select'))
{
$__compilerVar46 .= '
			<select name="' . htmlspecialchars($customFieldInputName, ENT_QUOTES, 'UTF-8') . '[' . htmlspecialchars($field['field_id'], ENT_QUOTES, 'UTF-8') . ']" id="ctrl_custom_field_' . htmlspecialchars($field['field_id'], ENT_QUOTES, 'UTF-8') . '" class="textCtrl">
			';
if (!$field['required'] OR !$field['hasValue'])
{
$__compilerVar46 .= '
				<option value="">&nbsp;</option>
			';
}
$__compilerVar46 .= '
			';
foreach ($field['fieldChoices'] AS $choice => $text)
{
$__compilerVar46 .= '
				<option value="' . htmlspecialchars($choice, ENT_QUOTES, 'UTF-8') . '" ' . (($field['field_value'] == $choice) ? ' selected="selected"' : '') . '>' . $text . '</option>
			';
}
$__compilerVar46 .= '
			</select>
		';
}
else if ($field['field_type'] == ('checkbox'))
{
$__compilerVar46 .= '
			<ul class="checkboxColumns">
			';
foreach ($field['fieldChoices'] AS $choice => $text)
{
$__compilerVar46 .= '
				<li><label><input type="checkbox" name="' . htmlspecialchars($customFieldInputName, ENT_QUOTES, 'UTF-8') . '[' . htmlspecialchars($field['field_id'], ENT_QUOTES, 'UTF-8') . '][' . htmlspecialchars($choice, ENT_QUOTES, 'UTF-8') . ']" value="' . htmlspecialchars($choice, ENT_QUOTES, 'UTF-8') . '" ' . ((isset($field['field_value'][$choice])) ? ' checked="checked"' : '') . ' /> ' . $text . '</label></li>
			';
}
$__compilerVar46 .= '
			</ul>
		';
}
else if ($field['field_type'] == ('multiselect'))
{
$__compilerVar46 .= '
			<select name="' . htmlspecialchars($customFieldInputName, ENT_QUOTES, 'UTF-8') . '[' . htmlspecialchars($field['field_id'], ENT_QUOTES, 'UTF-8') . '][]" id="ctrl_custom_field_' . htmlspecialchars($field['field_id'], ENT_QUOTES, 'UTF-8') . '" class="textCtrl" size="7" multiple="multiple">
			';
if (!$field['required'] OR !$field['hasValue'])
{
$__compilerVar46 .= '
				<option value="">&nbsp;</option>
			';
}
$__compilerVar46 .= '
			';
foreach ($field['fieldChoices'] AS $choice => $text)
{
$__compilerVar46 .= '
				<option value="' . htmlspecialchars($choice, ENT_QUOTES, 'UTF-8') . '" ' . ((isset($field['field_value'][$choice])) ? ' selected="selected"' : '') . '>' . $text . '</option>
			';
}
$__compilerVar46 .= '
			</select>
		';
}
$__compilerVar46 .= '

		';
$__compilerVar47 = '';
$__compilerVar47 .= $field['description'];
if (trim($__compilerVar47) !== '')
{
$__compilerVar46 .= '<p class="explain">' . $__compilerVar47 . '</p>';
}
unset($__compilerVar47);
$__compilerVar46 .= '
		<input type="hidden" name="custom_fields_shown[]" value="' . htmlspecialchars($field['field_id'], ENT_QUOTES, 'UTF-8') . '" />
	</dd>
</dl>';
$__output .= $__compilerVar46;
unset($__compilerVar46);
$__output .= '
			';
}
$__output .= '
		</fieldset>
	';
}
$__output .= '

	<fieldset>
		<dl class="ctrlUnit">
			<dt><label for="ctrl_external_url">' . 'Thông tin bổ sung của URL' . ':</label></dt>
			<dd>
				<input type="url" name="external_url" value="' . htmlspecialchars($resource['external_url'], ENT_QUOTES, 'UTF-8') . '" class="textCtrl" id="ctrl_external_url" maxlength="500" />
				<p class="explain">' . 'If you have your own web page containing a demo, extended description or support services etc. for this resource, enter its URL here.' . '</p>
			</dd>
		</dl>

		';
if ($xenOptions['allowAltResourceSupportUrl'])
{
$__output .= '
			<dl class="ctrlUnit">
				<dt><label for="ctrl_alt_support_url">' . 'Alternative Support URL' . ':</label></dt>
				<dd>
					<input type="url" name="alt_support_url" value="' . htmlspecialchars($resource['alt_support_url'], ENT_QUOTES, 'UTF-8') . '" class="textCtrl" id="ctrl_alt_support_url" maxlength="500" />
					<p class="explain">' . 'If you have a specific location where you will be providing support or answering questions, please enter the URL here.' . '</p>
				</dd>
			</dl>
		';
}
$__output .= '
	</fieldset>

	';
if ($showEditIconOption AND !$resource['resource_id'])
{
$__output .= '
		<dl class="ctrlUnit">
			<dt></dt>
			<dd>
				<ul>
					<li>
						<label><input type="checkbox" name="edit_icon" value="1" /> ' . 'Upload resource icon' . '</label>
						<p class="explain">' . 'If you have an icon to upload for this resource, you will be given an option to upload this icon after saving. This icon should be 96x96 pixels.' . '</p>
					</li>
				</ul>
			</dd>
		</dl>
	';
}
$__output .= '

	<dl class="ctrlUnit submitUnit">
		<dt></dt>
		<dd>
			<input type="submit" value="' . 'Lưu' . '" accesskey="s" class="button primary" />
			';
$__compilerVar48 = '';
$__compilerVar48 .= 'Upload Images' . '...';
$__compilerVar49 = '';
$__compilerVar49 .= 'image';
$__compilerVar50 = '';
if ($attachmentParams)
{
$__compilerVar50 .= '

	';
$this->addRequiredExternal('js', 'js/xenforo/attachment_editor.js');
$__compilerVar50 .= '
	';
if ($xenOptions['swfUpload'] AND $visitor['enable_flash_uploader'])
{
$__compilerVar50 .= '
		';
$this->addRequiredExternal('js', 'js/swfupload/swfupload.min.js');
$__compilerVar50 .= '
	';
}
$__compilerVar50 .= '	
	';
$this->addRequiredExternal('css', 'attachment_editor');
$__compilerVar50 .= '

	<span id="AttachmentUploader" class="buttonProxy AttachmentUploader"
		style="display: none"
		data-placeholder="#SWFUploadPlaceHolder"
		data-trigger="#ctrl_uploader"
		data-postname="upload"
		data-maxfilesize="' . htmlspecialchars($attachmentConstraints['size'], ENT_QUOTES, 'UTF-8') . '"
		data-maxuploads="' . htmlspecialchars($attachmentConstraints['count'], ENT_QUOTES, 'UTF-8') . '"
		data-extensions="' . XenForo_Template_Helper_Core::callHelper('implode', array(
'0' => $attachmentConstraints['extensions'],
'1' => ','
)) . '"
		data-action="' . XenForo_Template_Helper_Core::link('full:attachments/do-upload.json', '', array(
'hash' => $attachmentParams['hash'],
'content_type' => $attachmentParams['content_type'],
'key' => $__compilerVar49
)) . '"
		data-uniquekey="' . htmlspecialchars($__compilerVar49, ENT_QUOTES, 'UTF-8') . '"
		data-err-110="' . 'File đã tải lên lớn hơn so với quy định.' . '"
		data-err-120="' . 'The uploaded file is empty.' . '"
		data-err-130="' . 'The uploaded file does not have an allowed extension.' . '"
		data-err-unknown="' . 'There was a problem uploading your file.' . '">
		
		<span id="SWFUploadPlaceHolder"></span>		
			
		<input type="button" value="' . (($__compilerVar48) ? ($__compilerVar48) : ('Tải lên file đính kèm')) . '"
			id="ctrl_uploader" class="button OverlayTrigger DisableOnSubmit"
			data-href="' . XenForo_Template_Helper_Core::link('full:attachments/upload', '', array(
'_params' => $attachmentParams,
'key' => $__compilerVar49
)) . '"
			data-hider="#AttachmentUploader" />
		<span class="HiddenInput" data-name="_xfSessionId" data-value="' . htmlspecialchars($sessionId, ENT_QUOTES, 'UTF-8') . '"></span>
		';
foreach ($attachmentParams['content_data'] AS $dataKey => $dataValue)
{
$__compilerVar50 .= '<span class="HiddenInput" data-name="content_data[' . htmlspecialchars($dataKey, ENT_QUOTES, 'UTF-8') . ']" data-value="' . htmlspecialchars($dataValue, ENT_QUOTES, 'UTF-8') . '"></span>
		';
}
$__compilerVar50 .= '
	</span>

	<noscript>
		<a href="' . XenForo_Template_Helper_Core::link('attachments/upload', '', array(
'_params' => $attachmentParams
)) . '" class="button" target="_blank">' . (($__compilerVar48) ? ($__compilerVar48) : ('Tải lên file đính kèm')) . '</a>
	</noscript>

';
}
$__output .= $__compilerVar50;
unset($__compilerVar48, $__compilerVar49, $__compilerVar50);
$__output .= '
			<input type="button" value="' . 'Xem trước' . '..." class="button PreviewButton JsOnly" />
		</dd>
	</dl>

	<input type="hidden" name="_xfToken" value="' . htmlspecialchars($visitor['csrf_token_page'], ENT_QUOTES, 'UTF-8') . '" />
</form>';
