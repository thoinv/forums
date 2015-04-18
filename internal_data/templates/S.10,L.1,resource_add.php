<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__extraData['title'] = '';
$__extraData['title'] .= (($resource['resource_id']) ? ('Edit Resource' . ': ' . XenForo_Template_Helper_Core::callHelper('resourcePrefix', array(
'0' => $resource,
'1' => 'escaped'
)) . htmlspecialchars($resource['title'], ENT_QUOTES, 'UTF-8')) : ('Add Resource'));
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
$__compilerVar1 = '';
$__compilerVar1 .= htmlspecialchars($resource['prefix_id'], ENT_QUOTES, 'UTF-8');
$__compilerVar2 = '';
$__compilerVar2 .= 'resource_add';
$__compilerVar3 = '';
if ($prefixes OR $forcePrefixes)
{
$__compilerVar3 .= '

	';
$this->addRequiredExternal('js', 'js/xenforo/title_prefix.js');
$__compilerVar3 .= '
	';
$this->addRequiredExternal('css', 'title_prefix_edit');
$__compilerVar3 .= '
	
	<dl class="ctrlUnit" id="PrefixContainer_' . htmlspecialchars($__compilerVar2, ENT_QUOTES, 'UTF-8') . '">
		<dt><label for="ctrl_prefix_id_' . htmlspecialchars($__compilerVar2, ENT_QUOTES, 'UTF-8') . '">' . 'Prefix' . ':</label></dt>
		<dd>
			<select name="prefix_id" id="ctrl_prefix_id_' . htmlspecialchars($__compilerVar2, ENT_QUOTES, 'UTF-8') . '" class="textCtrl TitlePrefix"
				data-container="#PrefixContainer_' . htmlspecialchars($__compilerVar2, ENT_QUOTES, 'UTF-8') . '"
				data-textbox="#ctrl_title_' . htmlspecialchars($__compilerVar2, ENT_QUOTES, 'UTF-8') . '"
				' . (($nodeControl) ? ('data-nodecontrol="' . htmlspecialchars($nodeControl, ENT_QUOTES, 'UTF-8') . '" data-prefixurl="' . XenForo_Template_Helper_Core::link('resources/prefixes', false, array()) . '"') : ('')) . '>
				<option value="0" data-css="prefix noPrefix" ' . (($__compilerVar1 == 0) ? ' selected="selected"' : '') . '>(' . 'No prefix' . ')</option>
					';
foreach ($prefixes AS $prefixGroup)
{
$__compilerVar3 .= '
						';
if ($prefixGroup['title'])
{
$__compilerVar3 .= '
							<optgroup label="' . htmlspecialchars($prefixGroup['title'], ENT_QUOTES, 'UTF-8') . '">
							';
foreach ($prefixGroup['prefixes'] AS $prefix)
{
$__compilerVar3 .= '
								<option value="' . htmlspecialchars($prefix['prefix_id'], ENT_QUOTES, 'UTF-8') . '" data-css="' . htmlspecialchars($prefix['css_class'], ENT_QUOTES, 'UTF-8') . '" ' . (($__compilerVar1 == $prefix['prefix_id']) ? ' selected="selected"' : '') . '>' . XenForo_Template_Helper_Core::callHelper('resourcePrefix', array(
'0' => $prefix['prefix_id'],
'1' => 'escaped',
'2' => ''
)) . '</option>
							';
}
$__compilerVar3 .= '
							</optgroup>
						';
}
else
{
$__compilerVar3 .= '
							';
foreach ($prefixGroup['prefixes'] AS $prefix)
{
$__compilerVar3 .= '
								<option value="' . htmlspecialchars($prefix['prefix_id'], ENT_QUOTES, 'UTF-8') . '" data-css="' . htmlspecialchars($prefix['css_class'], ENT_QUOTES, 'UTF-8') . '" ' . (($__compilerVar1 == $prefix['prefix_id']) ? ' selected="selected"' : '') . '>' . XenForo_Template_Helper_Core::callHelper('resourcePrefix', array(
'0' => $prefix['prefix_id'],
'1' => 'escaped',
'2' => ''
)) . '</option>
							';
}
$__compilerVar3 .= '
						';
}
$__compilerVar3 .= '
					';
}
$__compilerVar3 .= '
			</select>
		</dd>
	</dl>
	
';
}
$__output .= $__compilerVar3;
unset($__compilerVar1, $__compilerVar2, $__compilerVar3);
$__output .= '
		
		<dl class="ctrlUnit titleUnit">
			<dt><label for="ctrl_title">' . 'Title' . ':</label></dt>
			<dd>
				';
if ($allowFilelessOnly OR $resource['isFilelessNoExternal'])
{
$__output .= '
					<input type="text" name="title" value="' . htmlspecialchars($resource['title'], ENT_QUOTES, 'UTF-8') . '" class="textCtrl"
						data-liveTitleTemplate="' . (($resource['resource_id']) ? ('Edit Resource') : ('Add Resource')) . ': <em>%s</em>"
						id="ctrl_title_resource_add" maxlength="100"
					/>
					<input type="hidden" name="version_string" value="' . htmlspecialchars($resource['version_string'], ENT_QUOTES, 'UTF-8') . '" />
				';
}
else
{
$__output .= '
					<input type="text" name="title" value="' . htmlspecialchars($resource['title'], ENT_QUOTES, 'UTF-8') . '" class="textCtrl titleWithVersion OptOut"
						data-liveTitleTemplate="' . (($resource['resource_id']) ? ('Edit Resource') : ('Add Resource')) . ': <em>%s</em>"
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
$__compilerVar4 = '';
$__compilerVar4 .= 'Upload Your Resource';
$__compilerVar5 = '';
$__compilerVar5 .= 'resource';
$__compilerVar6 = '';
$this->addRequiredExternal('js', 'js/xenforo/attachment_editor.js');
$__compilerVar6 .= '
';
$this->addRequiredExternal('css', 'attachment_editor');
$__compilerVar6 .= '
';
$this->addRequiredExternal('js', 'js/xenresource/file_uploader.js');
$__compilerVar6 .= '
';
if ($xenOptions['swfUpload'] AND $visitor['enable_flash_uploader'])
{
$__compilerVar6 .= '
	';
$this->addRequiredExternal('js', 'js/swfupload/swfupload.min.js');
$__compilerVar6 .= '
';
}
$__compilerVar6 .= '
';
$this->addRequiredExternal('css', 'file_uploader');
$__compilerVar6 .= '

<div id="UploadedFile_' . htmlspecialchars($uploaderId, ENT_QUOTES, 'UTF-8') . '" class="uploadedFile">
	<a href="" class="Delete" title="' . 'Delete' . '">x</a>
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
'key' => $__compilerVar5
)) . '"
	data-uniquekey="' . htmlspecialchars($__compilerVar5, ENT_QUOTES, 'UTF-8') . '"
	data-err-110="' . 'The uploaded file is too large.' . '"
	data-err-120="' . 'The uploaded file is empty.' . '"
	data-err-130="' . 'The uploaded file does not have an allowed extension.' . '"
	data-err-unknown="' . 'There was a problem uploading your file.' . '">

	<span id="SWFUploadPlaceHolder_' . htmlspecialchars($uploaderId, ENT_QUOTES, 'UTF-8') . '"></span>

	<input type="button" value="' . (($__compilerVar4) ? ($__compilerVar4) : ('Upload a File')) . '"
		id="ctrl_uploader_' . htmlspecialchars($uploaderId, ENT_QUOTES, 'UTF-8') . '" class="button OverlayTrigger DisableOnSubmit"
		data-href="' . XenForo_Template_Helper_Core::link('full:attachments/upload', '', array(
'_params' => $fileParams[$uploaderId],
'key' => $__compilerVar5
)) . '"
		data-hider="#FileUploader_' . htmlspecialchars($uploaderId, ENT_QUOTES, 'UTF-8') . '" />
	<span class="HiddenInput" data-name="_xfSessionId" data-value="' . htmlspecialchars($sessionId, ENT_QUOTES, 'UTF-8') . '"></span>
	';
foreach ($fileParams[$uploaderId]['content_data'] AS $dataKey => $dataValue)
{
$__compilerVar6 .= '<span class="HiddenInput" data-name="content_data[' . htmlspecialchars($dataKey, ENT_QUOTES, 'UTF-8') . ']" data-value="' . htmlspecialchars($dataValue, ENT_QUOTES, 'UTF-8') . '"></span>
	';
}
$__compilerVar6 .= '
</span>

<noscript>
	<a href="' . XenForo_Template_Helper_Core::link('attachments/upload', '', array(
'_params' => $fileParams[$uploaderId]
)) . '" class="button" target="_blank">' . (($__compilerVar4) ? ($__compilerVar4) : ('Upload a File')) . '</a>
</noscript>';
$__output .= $__compilerVar6;
unset($__compilerVar4, $__compilerVar5, $__compilerVar6);
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
$__compilerVar7 = '';
if (!$customFieldInputName)
{
$customFieldInputName = 'custom_fields';
}
$__compilerVar7 .= '
<dl class="ctrlUnit customFieldEdit' . htmlspecialchars($field['field_id'], ENT_QUOTES, 'UTF-8') . ' ' . htmlspecialchars($customFieldExtraClass, ENT_QUOTES, 'UTF-8') . '">
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
			<input type="text" name="' . htmlspecialchars($customFieldInputName, ENT_QUOTES, 'UTF-8') . '[' . htmlspecialchars($field['field_id'], ENT_QUOTES, 'UTF-8') . ']" value="' . htmlspecialchars($field['field_value'], ENT_QUOTES, 'UTF-8') . '" 
				id="ctrl_custom_field_' . htmlspecialchars($field['field_id'], ENT_QUOTES, 'UTF-8') . '"
				data-validatorname="custom_field_' . htmlspecialchars($field['field_id'], ENT_QUOTES, 'UTF-8') . '"
				class="textCtrl" maxlength="' . (($field['max_length']) ? (htmlspecialchars($field['max_length'], ENT_QUOTES, 'UTF-8')) : ('')) . '" 
			/>
		';
}
else if ($field['field_type'] == ('textarea'))
{
$__compilerVar7 .= '
			<textarea name="' . htmlspecialchars($customFieldInputName, ENT_QUOTES, 'UTF-8') . '[' . htmlspecialchars($field['field_id'], ENT_QUOTES, 'UTF-8') . ']" 
				id="ctrl_custom_field_' . htmlspecialchars($field['field_id'], ENT_QUOTES, 'UTF-8') . '"
				data-validatorname="custom_field_' . htmlspecialchars($field['field_id'], ENT_QUOTES, 'UTF-8') . '" 
				class="textCtrl Elastic">' . htmlspecialchars($field['field_value'], ENT_QUOTES, 'UTF-8') . '</textarea>
		';
}
else if ($field['field_type'] == ('bbcode'))
{
$__compilerVar7 .= '
			';
if ($field['editorTemplateHtml'])
{
$__compilerVar7 .= '
				' . $field['editorTemplateHtml'] . '
			';
}
else
{
$__compilerVar7 .= '
				<textarea name="custom_fields[' . htmlspecialchars($field['field_id'], ENT_QUOTES, 'UTF-8') . ']" 
					id="ctrl_custom_field_' . htmlspecialchars($field['field_id'], ENT_QUOTES, 'UTF-8') . '"
					data-validatorname="custom_field_' . htmlspecialchars($field['field_id'], ENT_QUOTES, 'UTF-8') . '" 
					class="textCtrl Elastic">' . htmlspecialchars($field['field_value'], ENT_QUOTES, 'UTF-8') . '</textarea>
			';
}
$__compilerVar7 .= '
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
				<li><label><input type="radio" name="' . htmlspecialchars($customFieldInputName, ENT_QUOTES, 'UTF-8') . '[' . htmlspecialchars($field['field_id'], ENT_QUOTES, 'UTF-8') . ']" value="" ' . (($field['field_value'] == ('')) ? ' checked="checked"' : '') . ' /> <span class="muted">' . 'No selection' . '</span></label></li>
			';
}
$__compilerVar7 .= '
			';
foreach ($field['fieldChoices'] AS $choice => $text)
{
$__compilerVar7 .= '
				<li><label><input type="radio" name="' . htmlspecialchars($customFieldInputName, ENT_QUOTES, 'UTF-8') . '[' . htmlspecialchars($field['field_id'], ENT_QUOTES, 'UTF-8') . ']" value="' . htmlspecialchars($choice, ENT_QUOTES, 'UTF-8') . '" ' . (($field['field_value'] == $choice) ? ' checked="checked"' : '') . ' /> ' . $text . '</label></li>
			';
}
$__compilerVar7 .= '
			</ul>
		';
}
else if ($field['field_type'] == ('select'))
{
$__compilerVar7 .= '
			<select name="' . htmlspecialchars($customFieldInputName, ENT_QUOTES, 'UTF-8') . '[' . htmlspecialchars($field['field_id'], ENT_QUOTES, 'UTF-8') . ']" id="ctrl_custom_field_' . htmlspecialchars($field['field_id'], ENT_QUOTES, 'UTF-8') . '" class="textCtrl">
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
				<li><label><input type="checkbox" name="' . htmlspecialchars($customFieldInputName, ENT_QUOTES, 'UTF-8') . '[' . htmlspecialchars($field['field_id'], ENT_QUOTES, 'UTF-8') . '][' . htmlspecialchars($choice, ENT_QUOTES, 'UTF-8') . ']" value="' . htmlspecialchars($choice, ENT_QUOTES, 'UTF-8') . '" ' . ((isset($field['field_value'][$choice])) ? ' checked="checked"' : '') . ' /> ' . $text . '</label></li>
			';
}
$__compilerVar7 .= '
			</ul>
		';
}
else if ($field['field_type'] == ('multiselect'))
{
$__compilerVar7 .= '
			<select name="' . htmlspecialchars($customFieldInputName, ENT_QUOTES, 'UTF-8') . '[' . htmlspecialchars($field['field_id'], ENT_QUOTES, 'UTF-8') . '][]" id="ctrl_custom_field_' . htmlspecialchars($field['field_id'], ENT_QUOTES, 'UTF-8') . '" class="textCtrl" size="7" multiple="multiple">
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
		<input type="hidden" name="custom_fields_shown[]" value="' . htmlspecialchars($field['field_id'], ENT_QUOTES, 'UTF-8') . '" />
	</dd>
</dl>';
$__output .= $__compilerVar7;
unset($__compilerVar7);
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
				<dt><label for="ctrl_uploader">' . 'Attached Files' . ':</label></dt>
				<dd>';
$__compilerVar9 = '';
if ($attachmentParams)
{
$__compilerVar9 .= '

	';
$this->addRequiredExternal('js', 'js/xenforo/attachment_editor.js');
$__compilerVar9 .= '
	';
$this->addRequiredExternal('css', 'attachment_editor');
$__compilerVar9 .= '
	
	<div class="AttachmentEditor">
	
		';
if ($showUploadButton)
{
$__compilerVar9 .= '
			';
$__compilerVar10 = '';
if ($attachmentParams)
{
$__compilerVar10 .= '

	';
$this->addRequiredExternal('js', 'js/xenforo/attachment_editor.js');
$__compilerVar10 .= '
	';
if ($xenOptions['swfUpload'] AND $visitor['enable_flash_uploader'])
{
$__compilerVar10 .= '
		';
$this->addRequiredExternal('js', 'js/swfupload/swfupload.min.js');
$__compilerVar10 .= '
	';
}
$__compilerVar10 .= '	
	';
$this->addRequiredExternal('css', 'attachment_editor');
$__compilerVar10 .= '

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
		data-err-110="' . 'The uploaded file is too large.' . '"
		data-err-120="' . 'The uploaded file is empty.' . '"
		data-err-130="' . 'The uploaded file does not have an allowed extension.' . '"
		data-err-unknown="' . 'There was a problem uploading your file.' . '">
		
		<span id="SWFUploadPlaceHolder"></span>		
			
		<input type="button" value="' . (($buttonText) ? ($buttonText) : ('Upload a File')) . '"
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
$__compilerVar10 .= '<span class="HiddenInput" data-name="content_data[' . htmlspecialchars($dataKey, ENT_QUOTES, 'UTF-8') . ']" data-value="' . htmlspecialchars($dataValue, ENT_QUOTES, 'UTF-8') . '"></span>
		';
}
$__compilerVar10 .= '
	</span>

	<noscript>
		<a href="' . XenForo_Template_Helper_Core::link('attachments/upload', '', array(
'_params' => $attachmentParams
)) . '" class="button" target="_blank">' . (($buttonText) ? ($buttonText) : ('Upload a File')) . '</a>
	</noscript>

';
}
$__compilerVar9 .= $__compilerVar10;
unset($__compilerVar10);
$__compilerVar9 .= '
		';
}
$__compilerVar9 .= '
		
		<div class="NoAttachments"></div>
		
		<div class="secondaryContent AttachmentInsertAllBlock JsOnly">
			<span></span>
			<div class="AttachmentText">
				<div class="label">' . 'Insert every image as a' . '...</div>
				<div class="controls">
					<!--<input type="button" value="' . 'Delete All' . '" class="button _smallButton AttachmentDeleteAll" />-->
					<input type="button" value="' . 'Thumbnail' . '" class="button smallButton AttachmentInsertAll" name="thumb" />
					<input type="button" value="' . 'Full Image' . '" class="button smallButton AttachmentInsertAll" name="image" />
				</div>
			</div>
		</div>
	
		<ol class="AttachmentList New">
			';
$__compilerVar11 = '';
$__compilerVar11 .= '1';
$__compilerVar12 = '';
$__compilerVar13 = '';
$this->addRequiredExternal('css', 'attachment_editor');
$__compilerVar13 .= '

<li id="' . (($__compilerVar11) ? ('AttachedFileTemplate') : ('attachment' . htmlspecialchars($__compilerVar12['attachment_id'], ENT_QUOTES, 'UTF-8'))) . '"
	class="AttachedFile ' . (($__compilerVar12 and $__compilerVar12['thumbnailUrl']) ? ('AttachedImage') : ('')) . ' secondaryContent">

	<div class="Thumbnail">
		';
if ($__compilerVar12 and $__compilerVar12['thumbnailUrl'])
{
$__compilerVar13 .= '
			<a href="' . XenForo_Template_Helper_Core::link('attachments', $__compilerVar12, array()) . '" target="_blank"
				data-attachmentId="' . htmlspecialchars($__compilerVar12['attachment_id'], ENT_QUOTES, 'UTF-8') . '"
				class="_not_LbTrigger" data-href="' . XenForo_Template_Helper_Core::link('misc/lightbox', false, array()) . '"><img
				src="' . htmlspecialchars($__compilerVar12['thumbnailUrl'], ENT_QUOTES, 'UTF-8') . '" alt="' . htmlspecialchars($__compilerVar12['filename'], ENT_QUOTES, 'UTF-8') . '"
				class="_not_LbImage" data-src="' . XenForo_Template_Helper_Core::link('attachments', $__compilerVar12, array(
'embedded' => '1'
)) . '" /></a>
		';
}
else
{
$__compilerVar13 .= '
			<span class="genericAttachment"></span>
		';
}
$__compilerVar13 .= '
	</div>

	<div class="AttachmentText">
		<div class="Filename"><a href="' . XenForo_Template_Helper_Core::link('attachments', $__compilerVar12, array()) . '" target="_blank">' . (($__compilerVar12) ? (htmlspecialchars($__compilerVar12['filename'], ENT_QUOTES, 'UTF-8')) : ('')) . '</a></div>
	
		';
if ($__compilerVar11)
{
$__compilerVar13 .= '
			<input type="button" value="' . 'Cancel' . '" class="button smallButton AttachmentCanceller" />
			
			<span class="ProgressMeter"><span class="ProgressGraphic">&nbsp;</span><span class="ProgressCounter">0%</span></span>
		';
}
else
{
$__compilerVar13 .= '
			<noscript>
				<a href="' . XenForo_Template_Helper_Core::link('attachments/upload', '', array(
'_params' => $attachmentParams
)) . '" target="_blank" class="button Smallbutton">' . 'Delete' . '</a>
			</noscript>
			
			';
if ($__compilerVar12['thumbnailUrl'])
{
$__compilerVar13 .= '
				<div class="label JsOnly">' . 'Insert' . ':</div>
			';
}
$__compilerVar13 .= '
			
			<div class="controls JsOnly">				
				<input type="button" value="' . 'Delete' . '" class="button smallButton AttachmentDeleter" data-href="' . XenForo_Template_Helper_Core::link('attachments/delete', $__compilerVar12, array()) . '" />
			
				';
if ($__compilerVar12['thumbnailUrl'])
{
$__compilerVar13 .= '
					<input type="button" name="thumb" value="' . 'Thumbnail' . '" class="button smallButton AttachmentInserter" />
					<input type="button" name="image" value="' . 'Full Image' . '" class="button smallButton AttachmentInserter" />
				';
}
$__compilerVar13 .= '
			</div>
		';
}
$__compilerVar13 .= '

	</div>
	
</li>';
$__compilerVar9 .= $__compilerVar13;
unset($__compilerVar11, $__compilerVar12, $__compilerVar13);
$__compilerVar9 .= '
			';
if ($attachments)
{
$__compilerVar9 .= '
				';
foreach ($attachments AS $attachment)
{
$__compilerVar9 .= '
					';
if ($attachment['temp_hash'])
{
$__compilerVar9 .= '
						';
$__compilerVar14 = '';
$this->addRequiredExternal('css', 'attachment_editor');
$__compilerVar14 .= '

<li id="' . (($isTemplate) ? ('AttachedFileTemplate') : ('attachment' . htmlspecialchars($attachment['attachment_id'], ENT_QUOTES, 'UTF-8'))) . '"
	class="AttachedFile ' . (($attachment and $attachment['thumbnailUrl']) ? ('AttachedImage') : ('')) . ' secondaryContent">

	<div class="Thumbnail">
		';
if ($attachment and $attachment['thumbnailUrl'])
{
$__compilerVar14 .= '
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
$__compilerVar14 .= '
			<span class="genericAttachment"></span>
		';
}
$__compilerVar14 .= '
	</div>

	<div class="AttachmentText">
		<div class="Filename"><a href="' . XenForo_Template_Helper_Core::link('attachments', $attachment, array()) . '" target="_blank">' . (($attachment) ? (htmlspecialchars($attachment['filename'], ENT_QUOTES, 'UTF-8')) : ('')) . '</a></div>
	
		';
if ($isTemplate)
{
$__compilerVar14 .= '
			<input type="button" value="' . 'Cancel' . '" class="button smallButton AttachmentCanceller" />
			
			<span class="ProgressMeter"><span class="ProgressGraphic">&nbsp;</span><span class="ProgressCounter">0%</span></span>
		';
}
else
{
$__compilerVar14 .= '
			<noscript>
				<a href="' . XenForo_Template_Helper_Core::link('attachments/upload', '', array(
'_params' => $attachmentParams
)) . '" target="_blank" class="button Smallbutton">' . 'Delete' . '</a>
			</noscript>
			
			';
if ($attachment['thumbnailUrl'])
{
$__compilerVar14 .= '
				<div class="label JsOnly">' . 'Insert' . ':</div>
			';
}
$__compilerVar14 .= '
			
			<div class="controls JsOnly">				
				<input type="button" value="' . 'Delete' . '" class="button smallButton AttachmentDeleter" data-href="' . XenForo_Template_Helper_Core::link('attachments/delete', $attachment, array()) . '" />
			
				';
if ($attachment['thumbnailUrl'])
{
$__compilerVar14 .= '
					<input type="button" name="thumb" value="' . 'Thumbnail' . '" class="button smallButton AttachmentInserter" />
					<input type="button" name="image" value="' . 'Full Image' . '" class="button smallButton AttachmentInserter" />
				';
}
$__compilerVar14 .= '
			</div>
		';
}
$__compilerVar14 .= '

	</div>
	
</li>';
$__compilerVar9 .= $__compilerVar14;
unset($__compilerVar14);
$__compilerVar9 .= '
					';
}
$__compilerVar9 .= '
				';
}
$__compilerVar9 .= '
			';
}
$__compilerVar9 .= '
		</ol>
	
		';
if ($attachments)
{
$__compilerVar9 .= '
			';
$__compilerVar15 = '';
$__compilerVar15 .= '
					';
foreach ($attachments AS $attachment)
{
$__compilerVar15 .= '
						';
if (!$attachment['temp_hash'])
{
$__compilerVar15 .= '
							';
$__compilerVar16 = '';
$this->addRequiredExternal('css', 'attachment_editor');
$__compilerVar16 .= '

<li id="' . (($isTemplate) ? ('AttachedFileTemplate') : ('attachment' . htmlspecialchars($attachment['attachment_id'], ENT_QUOTES, 'UTF-8'))) . '"
	class="AttachedFile ' . (($attachment and $attachment['thumbnailUrl']) ? ('AttachedImage') : ('')) . ' secondaryContent">

	<div class="Thumbnail">
		';
if ($attachment and $attachment['thumbnailUrl'])
{
$__compilerVar16 .= '
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
$__compilerVar16 .= '
			<span class="genericAttachment"></span>
		';
}
$__compilerVar16 .= '
	</div>

	<div class="AttachmentText">
		<div class="Filename"><a href="' . XenForo_Template_Helper_Core::link('attachments', $attachment, array()) . '" target="_blank">' . (($attachment) ? (htmlspecialchars($attachment['filename'], ENT_QUOTES, 'UTF-8')) : ('')) . '</a></div>
	
		';
if ($isTemplate)
{
$__compilerVar16 .= '
			<input type="button" value="' . 'Cancel' . '" class="button smallButton AttachmentCanceller" />
			
			<span class="ProgressMeter"><span class="ProgressGraphic">&nbsp;</span><span class="ProgressCounter">0%</span></span>
		';
}
else
{
$__compilerVar16 .= '
			<noscript>
				<a href="' . XenForo_Template_Helper_Core::link('attachments/upload', '', array(
'_params' => $attachmentParams
)) . '" target="_blank" class="button Smallbutton">' . 'Delete' . '</a>
			</noscript>
			
			';
if ($attachment['thumbnailUrl'])
{
$__compilerVar16 .= '
				<div class="label JsOnly">' . 'Insert' . ':</div>
			';
}
$__compilerVar16 .= '
			
			<div class="controls JsOnly">				
				<input type="button" value="' . 'Delete' . '" class="button smallButton AttachmentDeleter" data-href="' . XenForo_Template_Helper_Core::link('attachments/delete', $attachment, array()) . '" />
			
				';
if ($attachment['thumbnailUrl'])
{
$__compilerVar16 .= '
					<input type="button" name="thumb" value="' . 'Thumbnail' . '" class="button smallButton AttachmentInserter" />
					<input type="button" name="image" value="' . 'Full Image' . '" class="button smallButton AttachmentInserter" />
				';
}
$__compilerVar16 .= '
			</div>
		';
}
$__compilerVar16 .= '

	</div>
	
</li>';
$__compilerVar15 .= $__compilerVar16;
unset($__compilerVar16);
$__compilerVar15 .= '
						';
}
$__compilerVar15 .= '
					';
}
$__compilerVar15 .= '
				';
if (trim($__compilerVar15) !== '')
{
$__compilerVar9 .= '
			<ol class="AttachmentList Existing">
				' . $__compilerVar15 . '
			</ol>
			';
}
unset($__compilerVar15);
$__compilerVar9 .= '
		';
}
$__compilerVar9 .= '
		
		<input type="hidden" name="attachment_hash" value="' . htmlspecialchars($attachmentParams['hash'], ENT_QUOTES, 'UTF-8') . '" />
		
		' . '
		
	</div>
	
';
}
$__output .= $__compilerVar9;
unset($__compilerVar9);
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
$__compilerVar17 = '';
if (!$customFieldInputName)
{
$customFieldInputName = 'custom_fields';
}
$__compilerVar17 .= '
<dl class="ctrlUnit customFieldEdit' . htmlspecialchars($field['field_id'], ENT_QUOTES, 'UTF-8') . ' ' . htmlspecialchars($customFieldExtraClass, ENT_QUOTES, 'UTF-8') . '">
	<dt>
		<label for="ctrl_custom_field_' . htmlspecialchars($field['field_id'], ENT_QUOTES, 'UTF-8') . '">' . htmlspecialchars($field['title'], ENT_QUOTES, 'UTF-8') . ':</label>
		';
if ($field['required'])
{
$__compilerVar17 .= '<dfn>' . 'Required' . '</dfn>';
}
$__compilerVar17 .= '
	</dt>
	<dd>
		';
if ($field['field_type'] == ('textbox'))
{
$__compilerVar17 .= '
			<input type="text" name="' . htmlspecialchars($customFieldInputName, ENT_QUOTES, 'UTF-8') . '[' . htmlspecialchars($field['field_id'], ENT_QUOTES, 'UTF-8') . ']" value="' . htmlspecialchars($field['field_value'], ENT_QUOTES, 'UTF-8') . '" 
				id="ctrl_custom_field_' . htmlspecialchars($field['field_id'], ENT_QUOTES, 'UTF-8') . '"
				data-validatorname="custom_field_' . htmlspecialchars($field['field_id'], ENT_QUOTES, 'UTF-8') . '"
				class="textCtrl" maxlength="' . (($field['max_length']) ? (htmlspecialchars($field['max_length'], ENT_QUOTES, 'UTF-8')) : ('')) . '" 
			/>
		';
}
else if ($field['field_type'] == ('textarea'))
{
$__compilerVar17 .= '
			<textarea name="' . htmlspecialchars($customFieldInputName, ENT_QUOTES, 'UTF-8') . '[' . htmlspecialchars($field['field_id'], ENT_QUOTES, 'UTF-8') . ']" 
				id="ctrl_custom_field_' . htmlspecialchars($field['field_id'], ENT_QUOTES, 'UTF-8') . '"
				data-validatorname="custom_field_' . htmlspecialchars($field['field_id'], ENT_QUOTES, 'UTF-8') . '" 
				class="textCtrl Elastic">' . htmlspecialchars($field['field_value'], ENT_QUOTES, 'UTF-8') . '</textarea>
		';
}
else if ($field['field_type'] == ('bbcode'))
{
$__compilerVar17 .= '
			';
if ($field['editorTemplateHtml'])
{
$__compilerVar17 .= '
				' . $field['editorTemplateHtml'] . '
			';
}
else
{
$__compilerVar17 .= '
				<textarea name="custom_fields[' . htmlspecialchars($field['field_id'], ENT_QUOTES, 'UTF-8') . ']" 
					id="ctrl_custom_field_' . htmlspecialchars($field['field_id'], ENT_QUOTES, 'UTF-8') . '"
					data-validatorname="custom_field_' . htmlspecialchars($field['field_id'], ENT_QUOTES, 'UTF-8') . '" 
					class="textCtrl Elastic">' . htmlspecialchars($field['field_value'], ENT_QUOTES, 'UTF-8') . '</textarea>
			';
}
$__compilerVar17 .= '
';
}
else if ($field['field_type'] == ('radio'))
{
$__compilerVar17 .= '
			<ul class="checkboxColumns">
			';
if (!$field['required'])
{
$__compilerVar17 .= '
				<li><label><input type="radio" name="' . htmlspecialchars($customFieldInputName, ENT_QUOTES, 'UTF-8') . '[' . htmlspecialchars($field['field_id'], ENT_QUOTES, 'UTF-8') . ']" value="" ' . (($field['field_value'] == ('')) ? ' checked="checked"' : '') . ' /> <span class="muted">' . 'No selection' . '</span></label></li>
			';
}
$__compilerVar17 .= '
			';
foreach ($field['fieldChoices'] AS $choice => $text)
{
$__compilerVar17 .= '
				<li><label><input type="radio" name="' . htmlspecialchars($customFieldInputName, ENT_QUOTES, 'UTF-8') . '[' . htmlspecialchars($field['field_id'], ENT_QUOTES, 'UTF-8') . ']" value="' . htmlspecialchars($choice, ENT_QUOTES, 'UTF-8') . '" ' . (($field['field_value'] == $choice) ? ' checked="checked"' : '') . ' /> ' . $text . '</label></li>
			';
}
$__compilerVar17 .= '
			</ul>
		';
}
else if ($field['field_type'] == ('select'))
{
$__compilerVar17 .= '
			<select name="' . htmlspecialchars($customFieldInputName, ENT_QUOTES, 'UTF-8') . '[' . htmlspecialchars($field['field_id'], ENT_QUOTES, 'UTF-8') . ']" id="ctrl_custom_field_' . htmlspecialchars($field['field_id'], ENT_QUOTES, 'UTF-8') . '" class="textCtrl">
			';
if (!$field['required'] OR !$field['hasValue'])
{
$__compilerVar17 .= '
				<option value="">&nbsp;</option>
			';
}
$__compilerVar17 .= '
			';
foreach ($field['fieldChoices'] AS $choice => $text)
{
$__compilerVar17 .= '
				<option value="' . htmlspecialchars($choice, ENT_QUOTES, 'UTF-8') . '" ' . (($field['field_value'] == $choice) ? ' selected="selected"' : '') . '>' . $text . '</option>
			';
}
$__compilerVar17 .= '
			</select>
		';
}
else if ($field['field_type'] == ('checkbox'))
{
$__compilerVar17 .= '
			<ul class="checkboxColumns">
			';
foreach ($field['fieldChoices'] AS $choice => $text)
{
$__compilerVar17 .= '
				<li><label><input type="checkbox" name="' . htmlspecialchars($customFieldInputName, ENT_QUOTES, 'UTF-8') . '[' . htmlspecialchars($field['field_id'], ENT_QUOTES, 'UTF-8') . '][' . htmlspecialchars($choice, ENT_QUOTES, 'UTF-8') . ']" value="' . htmlspecialchars($choice, ENT_QUOTES, 'UTF-8') . '" ' . ((isset($field['field_value'][$choice])) ? ' checked="checked"' : '') . ' /> ' . $text . '</label></li>
			';
}
$__compilerVar17 .= '
			</ul>
		';
}
else if ($field['field_type'] == ('multiselect'))
{
$__compilerVar17 .= '
			<select name="' . htmlspecialchars($customFieldInputName, ENT_QUOTES, 'UTF-8') . '[' . htmlspecialchars($field['field_id'], ENT_QUOTES, 'UTF-8') . '][]" id="ctrl_custom_field_' . htmlspecialchars($field['field_id'], ENT_QUOTES, 'UTF-8') . '" class="textCtrl" size="7" multiple="multiple">
			';
if (!$field['required'] OR !$field['hasValue'])
{
$__compilerVar17 .= '
				<option value="">&nbsp;</option>
			';
}
$__compilerVar17 .= '
			';
foreach ($field['fieldChoices'] AS $choice => $text)
{
$__compilerVar17 .= '
				<option value="' . htmlspecialchars($choice, ENT_QUOTES, 'UTF-8') . '" ' . ((isset($field['field_value'][$choice])) ? ' selected="selected"' : '') . '>' . $text . '</option>
			';
}
$__compilerVar17 .= '
			</select>
		';
}
$__compilerVar17 .= '

		';
$__compilerVar18 = '';
$__compilerVar18 .= $field['description'];
if (trim($__compilerVar18) !== '')
{
$__compilerVar17 .= '<p class="explain">' . $__compilerVar18 . '</p>';
}
unset($__compilerVar18);
$__compilerVar17 .= '
		<input type="hidden" name="custom_fields_shown[]" value="' . htmlspecialchars($field['field_id'], ENT_QUOTES, 'UTF-8') . '" />
	</dd>
</dl>';
$__output .= $__compilerVar17;
unset($__compilerVar17);
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
$__compilerVar19 = '';
if (!$customFieldInputName)
{
$customFieldInputName = 'custom_fields';
}
$__compilerVar19 .= '
<dl class="ctrlUnit customFieldEdit' . htmlspecialchars($field['field_id'], ENT_QUOTES, 'UTF-8') . ' ' . htmlspecialchars($customFieldExtraClass, ENT_QUOTES, 'UTF-8') . '">
	<dt>
		<label for="ctrl_custom_field_' . htmlspecialchars($field['field_id'], ENT_QUOTES, 'UTF-8') . '">' . htmlspecialchars($field['title'], ENT_QUOTES, 'UTF-8') . ':</label>
		';
if ($field['required'])
{
$__compilerVar19 .= '<dfn>' . 'Required' . '</dfn>';
}
$__compilerVar19 .= '
	</dt>
	<dd>
		';
if ($field['field_type'] == ('textbox'))
{
$__compilerVar19 .= '
			<input type="text" name="' . htmlspecialchars($customFieldInputName, ENT_QUOTES, 'UTF-8') . '[' . htmlspecialchars($field['field_id'], ENT_QUOTES, 'UTF-8') . ']" value="' . htmlspecialchars($field['field_value'], ENT_QUOTES, 'UTF-8') . '" 
				id="ctrl_custom_field_' . htmlspecialchars($field['field_id'], ENT_QUOTES, 'UTF-8') . '"
				data-validatorname="custom_field_' . htmlspecialchars($field['field_id'], ENT_QUOTES, 'UTF-8') . '"
				class="textCtrl" maxlength="' . (($field['max_length']) ? (htmlspecialchars($field['max_length'], ENT_QUOTES, 'UTF-8')) : ('')) . '" 
			/>
		';
}
else if ($field['field_type'] == ('textarea'))
{
$__compilerVar19 .= '
			<textarea name="' . htmlspecialchars($customFieldInputName, ENT_QUOTES, 'UTF-8') . '[' . htmlspecialchars($field['field_id'], ENT_QUOTES, 'UTF-8') . ']" 
				id="ctrl_custom_field_' . htmlspecialchars($field['field_id'], ENT_QUOTES, 'UTF-8') . '"
				data-validatorname="custom_field_' . htmlspecialchars($field['field_id'], ENT_QUOTES, 'UTF-8') . '" 
				class="textCtrl Elastic">' . htmlspecialchars($field['field_value'], ENT_QUOTES, 'UTF-8') . '</textarea>
		';
}
else if ($field['field_type'] == ('bbcode'))
{
$__compilerVar19 .= '
			';
if ($field['editorTemplateHtml'])
{
$__compilerVar19 .= '
				' . $field['editorTemplateHtml'] . '
			';
}
else
{
$__compilerVar19 .= '
				<textarea name="custom_fields[' . htmlspecialchars($field['field_id'], ENT_QUOTES, 'UTF-8') . ']" 
					id="ctrl_custom_field_' . htmlspecialchars($field['field_id'], ENT_QUOTES, 'UTF-8') . '"
					data-validatorname="custom_field_' . htmlspecialchars($field['field_id'], ENT_QUOTES, 'UTF-8') . '" 
					class="textCtrl Elastic">' . htmlspecialchars($field['field_value'], ENT_QUOTES, 'UTF-8') . '</textarea>
			';
}
$__compilerVar19 .= '
';
}
else if ($field['field_type'] == ('radio'))
{
$__compilerVar19 .= '
			<ul class="checkboxColumns">
			';
if (!$field['required'])
{
$__compilerVar19 .= '
				<li><label><input type="radio" name="' . htmlspecialchars($customFieldInputName, ENT_QUOTES, 'UTF-8') . '[' . htmlspecialchars($field['field_id'], ENT_QUOTES, 'UTF-8') . ']" value="" ' . (($field['field_value'] == ('')) ? ' checked="checked"' : '') . ' /> <span class="muted">' . 'No selection' . '</span></label></li>
			';
}
$__compilerVar19 .= '
			';
foreach ($field['fieldChoices'] AS $choice => $text)
{
$__compilerVar19 .= '
				<li><label><input type="radio" name="' . htmlspecialchars($customFieldInputName, ENT_QUOTES, 'UTF-8') . '[' . htmlspecialchars($field['field_id'], ENT_QUOTES, 'UTF-8') . ']" value="' . htmlspecialchars($choice, ENT_QUOTES, 'UTF-8') . '" ' . (($field['field_value'] == $choice) ? ' checked="checked"' : '') . ' /> ' . $text . '</label></li>
			';
}
$__compilerVar19 .= '
			</ul>
		';
}
else if ($field['field_type'] == ('select'))
{
$__compilerVar19 .= '
			<select name="' . htmlspecialchars($customFieldInputName, ENT_QUOTES, 'UTF-8') . '[' . htmlspecialchars($field['field_id'], ENT_QUOTES, 'UTF-8') . ']" id="ctrl_custom_field_' . htmlspecialchars($field['field_id'], ENT_QUOTES, 'UTF-8') . '" class="textCtrl">
			';
if (!$field['required'] OR !$field['hasValue'])
{
$__compilerVar19 .= '
				<option value="">&nbsp;</option>
			';
}
$__compilerVar19 .= '
			';
foreach ($field['fieldChoices'] AS $choice => $text)
{
$__compilerVar19 .= '
				<option value="' . htmlspecialchars($choice, ENT_QUOTES, 'UTF-8') . '" ' . (($field['field_value'] == $choice) ? ' selected="selected"' : '') . '>' . $text . '</option>
			';
}
$__compilerVar19 .= '
			</select>
		';
}
else if ($field['field_type'] == ('checkbox'))
{
$__compilerVar19 .= '
			<ul class="checkboxColumns">
			';
foreach ($field['fieldChoices'] AS $choice => $text)
{
$__compilerVar19 .= '
				<li><label><input type="checkbox" name="' . htmlspecialchars($customFieldInputName, ENT_QUOTES, 'UTF-8') . '[' . htmlspecialchars($field['field_id'], ENT_QUOTES, 'UTF-8') . '][' . htmlspecialchars($choice, ENT_QUOTES, 'UTF-8') . ']" value="' . htmlspecialchars($choice, ENT_QUOTES, 'UTF-8') . '" ' . ((isset($field['field_value'][$choice])) ? ' checked="checked"' : '') . ' /> ' . $text . '</label></li>
			';
}
$__compilerVar19 .= '
			</ul>
		';
}
else if ($field['field_type'] == ('multiselect'))
{
$__compilerVar19 .= '
			<select name="' . htmlspecialchars($customFieldInputName, ENT_QUOTES, 'UTF-8') . '[' . htmlspecialchars($field['field_id'], ENT_QUOTES, 'UTF-8') . '][]" id="ctrl_custom_field_' . htmlspecialchars($field['field_id'], ENT_QUOTES, 'UTF-8') . '" class="textCtrl" size="7" multiple="multiple">
			';
if (!$field['required'] OR !$field['hasValue'])
{
$__compilerVar19 .= '
				<option value="">&nbsp;</option>
			';
}
$__compilerVar19 .= '
			';
foreach ($field['fieldChoices'] AS $choice => $text)
{
$__compilerVar19 .= '
				<option value="' . htmlspecialchars($choice, ENT_QUOTES, 'UTF-8') . '" ' . ((isset($field['field_value'][$choice])) ? ' selected="selected"' : '') . '>' . $text . '</option>
			';
}
$__compilerVar19 .= '
			</select>
		';
}
$__compilerVar19 .= '

		';
$__compilerVar20 = '';
$__compilerVar20 .= $field['description'];
if (trim($__compilerVar20) !== '')
{
$__compilerVar19 .= '<p class="explain">' . $__compilerVar20 . '</p>';
}
unset($__compilerVar20);
$__compilerVar19 .= '
		<input type="hidden" name="custom_fields_shown[]" value="' . htmlspecialchars($field['field_id'], ENT_QUOTES, 'UTF-8') . '" />
	</dd>
</dl>';
$__output .= $__compilerVar19;
unset($__compilerVar19);
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
$__compilerVar21 = '';
if (!$customFieldInputName)
{
$customFieldInputName = 'custom_fields';
}
$__compilerVar21 .= '
<dl class="ctrlUnit customFieldEdit' . htmlspecialchars($field['field_id'], ENT_QUOTES, 'UTF-8') . ' ' . htmlspecialchars($customFieldExtraClass, ENT_QUOTES, 'UTF-8') . '">
	<dt>
		<label for="ctrl_custom_field_' . htmlspecialchars($field['field_id'], ENT_QUOTES, 'UTF-8') . '">' . htmlspecialchars($field['title'], ENT_QUOTES, 'UTF-8') . ':</label>
		';
if ($field['required'])
{
$__compilerVar21 .= '<dfn>' . 'Required' . '</dfn>';
}
$__compilerVar21 .= '
	</dt>
	<dd>
		';
if ($field['field_type'] == ('textbox'))
{
$__compilerVar21 .= '
			<input type="text" name="' . htmlspecialchars($customFieldInputName, ENT_QUOTES, 'UTF-8') . '[' . htmlspecialchars($field['field_id'], ENT_QUOTES, 'UTF-8') . ']" value="' . htmlspecialchars($field['field_value'], ENT_QUOTES, 'UTF-8') . '" 
				id="ctrl_custom_field_' . htmlspecialchars($field['field_id'], ENT_QUOTES, 'UTF-8') . '"
				data-validatorname="custom_field_' . htmlspecialchars($field['field_id'], ENT_QUOTES, 'UTF-8') . '"
				class="textCtrl" maxlength="' . (($field['max_length']) ? (htmlspecialchars($field['max_length'], ENT_QUOTES, 'UTF-8')) : ('')) . '" 
			/>
		';
}
else if ($field['field_type'] == ('textarea'))
{
$__compilerVar21 .= '
			<textarea name="' . htmlspecialchars($customFieldInputName, ENT_QUOTES, 'UTF-8') . '[' . htmlspecialchars($field['field_id'], ENT_QUOTES, 'UTF-8') . ']" 
				id="ctrl_custom_field_' . htmlspecialchars($field['field_id'], ENT_QUOTES, 'UTF-8') . '"
				data-validatorname="custom_field_' . htmlspecialchars($field['field_id'], ENT_QUOTES, 'UTF-8') . '" 
				class="textCtrl Elastic">' . htmlspecialchars($field['field_value'], ENT_QUOTES, 'UTF-8') . '</textarea>
		';
}
else if ($field['field_type'] == ('bbcode'))
{
$__compilerVar21 .= '
			';
if ($field['editorTemplateHtml'])
{
$__compilerVar21 .= '
				' . $field['editorTemplateHtml'] . '
			';
}
else
{
$__compilerVar21 .= '
				<textarea name="custom_fields[' . htmlspecialchars($field['field_id'], ENT_QUOTES, 'UTF-8') . ']" 
					id="ctrl_custom_field_' . htmlspecialchars($field['field_id'], ENT_QUOTES, 'UTF-8') . '"
					data-validatorname="custom_field_' . htmlspecialchars($field['field_id'], ENT_QUOTES, 'UTF-8') . '" 
					class="textCtrl Elastic">' . htmlspecialchars($field['field_value'], ENT_QUOTES, 'UTF-8') . '</textarea>
			';
}
$__compilerVar21 .= '
';
}
else if ($field['field_type'] == ('radio'))
{
$__compilerVar21 .= '
			<ul class="checkboxColumns">
			';
if (!$field['required'])
{
$__compilerVar21 .= '
				<li><label><input type="radio" name="' . htmlspecialchars($customFieldInputName, ENT_QUOTES, 'UTF-8') . '[' . htmlspecialchars($field['field_id'], ENT_QUOTES, 'UTF-8') . ']" value="" ' . (($field['field_value'] == ('')) ? ' checked="checked"' : '') . ' /> <span class="muted">' . 'No selection' . '</span></label></li>
			';
}
$__compilerVar21 .= '
			';
foreach ($field['fieldChoices'] AS $choice => $text)
{
$__compilerVar21 .= '
				<li><label><input type="radio" name="' . htmlspecialchars($customFieldInputName, ENT_QUOTES, 'UTF-8') . '[' . htmlspecialchars($field['field_id'], ENT_QUOTES, 'UTF-8') . ']" value="' . htmlspecialchars($choice, ENT_QUOTES, 'UTF-8') . '" ' . (($field['field_value'] == $choice) ? ' checked="checked"' : '') . ' /> ' . $text . '</label></li>
			';
}
$__compilerVar21 .= '
			</ul>
		';
}
else if ($field['field_type'] == ('select'))
{
$__compilerVar21 .= '
			<select name="' . htmlspecialchars($customFieldInputName, ENT_QUOTES, 'UTF-8') . '[' . htmlspecialchars($field['field_id'], ENT_QUOTES, 'UTF-8') . ']" id="ctrl_custom_field_' . htmlspecialchars($field['field_id'], ENT_QUOTES, 'UTF-8') . '" class="textCtrl">
			';
if (!$field['required'] OR !$field['hasValue'])
{
$__compilerVar21 .= '
				<option value="">&nbsp;</option>
			';
}
$__compilerVar21 .= '
			';
foreach ($field['fieldChoices'] AS $choice => $text)
{
$__compilerVar21 .= '
				<option value="' . htmlspecialchars($choice, ENT_QUOTES, 'UTF-8') . '" ' . (($field['field_value'] == $choice) ? ' selected="selected"' : '') . '>' . $text . '</option>
			';
}
$__compilerVar21 .= '
			</select>
		';
}
else if ($field['field_type'] == ('checkbox'))
{
$__compilerVar21 .= '
			<ul class="checkboxColumns">
			';
foreach ($field['fieldChoices'] AS $choice => $text)
{
$__compilerVar21 .= '
				<li><label><input type="checkbox" name="' . htmlspecialchars($customFieldInputName, ENT_QUOTES, 'UTF-8') . '[' . htmlspecialchars($field['field_id'], ENT_QUOTES, 'UTF-8') . '][' . htmlspecialchars($choice, ENT_QUOTES, 'UTF-8') . ']" value="' . htmlspecialchars($choice, ENT_QUOTES, 'UTF-8') . '" ' . ((isset($field['field_value'][$choice])) ? ' checked="checked"' : '') . ' /> ' . $text . '</label></li>
			';
}
$__compilerVar21 .= '
			</ul>
		';
}
else if ($field['field_type'] == ('multiselect'))
{
$__compilerVar21 .= '
			<select name="' . htmlspecialchars($customFieldInputName, ENT_QUOTES, 'UTF-8') . '[' . htmlspecialchars($field['field_id'], ENT_QUOTES, 'UTF-8') . '][]" id="ctrl_custom_field_' . htmlspecialchars($field['field_id'], ENT_QUOTES, 'UTF-8') . '" class="textCtrl" size="7" multiple="multiple">
			';
if (!$field['required'] OR !$field['hasValue'])
{
$__compilerVar21 .= '
				<option value="">&nbsp;</option>
			';
}
$__compilerVar21 .= '
			';
foreach ($field['fieldChoices'] AS $choice => $text)
{
$__compilerVar21 .= '
				<option value="' . htmlspecialchars($choice, ENT_QUOTES, 'UTF-8') . '" ' . ((isset($field['field_value'][$choice])) ? ' selected="selected"' : '') . '>' . $text . '</option>
			';
}
$__compilerVar21 .= '
			</select>
		';
}
$__compilerVar21 .= '

		';
$__compilerVar22 = '';
$__compilerVar22 .= $field['description'];
if (trim($__compilerVar22) !== '')
{
$__compilerVar21 .= '<p class="explain">' . $__compilerVar22 . '</p>';
}
unset($__compilerVar22);
$__compilerVar21 .= '
		<input type="hidden" name="custom_fields_shown[]" value="' . htmlspecialchars($field['field_id'], ENT_QUOTES, 'UTF-8') . '" />
	</dd>
</dl>';
$__output .= $__compilerVar21;
unset($__compilerVar21);
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
			<dt><label for="ctrl_external_url">' . 'Additional Information URL' . ':</label></dt>
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
			<input type="submit" value="' . 'Save' . '" accesskey="s" class="button primary" />
			';
$__compilerVar23 = '';
$__compilerVar23 .= 'Upload Images' . '...';
$__compilerVar24 = '';
$__compilerVar24 .= 'image';
$__compilerVar25 = '';
if ($attachmentParams)
{
$__compilerVar25 .= '

	';
$this->addRequiredExternal('js', 'js/xenforo/attachment_editor.js');
$__compilerVar25 .= '
	';
if ($xenOptions['swfUpload'] AND $visitor['enable_flash_uploader'])
{
$__compilerVar25 .= '
		';
$this->addRequiredExternal('js', 'js/swfupload/swfupload.min.js');
$__compilerVar25 .= '
	';
}
$__compilerVar25 .= '	
	';
$this->addRequiredExternal('css', 'attachment_editor');
$__compilerVar25 .= '

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
'key' => $__compilerVar24
)) . '"
		data-uniquekey="' . htmlspecialchars($__compilerVar24, ENT_QUOTES, 'UTF-8') . '"
		data-err-110="' . 'The uploaded file is too large.' . '"
		data-err-120="' . 'The uploaded file is empty.' . '"
		data-err-130="' . 'The uploaded file does not have an allowed extension.' . '"
		data-err-unknown="' . 'There was a problem uploading your file.' . '">
		
		<span id="SWFUploadPlaceHolder"></span>		
			
		<input type="button" value="' . (($__compilerVar23) ? ($__compilerVar23) : ('Upload a File')) . '"
			id="ctrl_uploader" class="button OverlayTrigger DisableOnSubmit"
			data-href="' . XenForo_Template_Helper_Core::link('full:attachments/upload', '', array(
'_params' => $attachmentParams,
'key' => $__compilerVar24
)) . '"
			data-hider="#AttachmentUploader" />
		<span class="HiddenInput" data-name="_xfSessionId" data-value="' . htmlspecialchars($sessionId, ENT_QUOTES, 'UTF-8') . '"></span>
		';
foreach ($attachmentParams['content_data'] AS $dataKey => $dataValue)
{
$__compilerVar25 .= '<span class="HiddenInput" data-name="content_data[' . htmlspecialchars($dataKey, ENT_QUOTES, 'UTF-8') . ']" data-value="' . htmlspecialchars($dataValue, ENT_QUOTES, 'UTF-8') . '"></span>
		';
}
$__compilerVar25 .= '
	</span>

	<noscript>
		<a href="' . XenForo_Template_Helper_Core::link('attachments/upload', '', array(
'_params' => $attachmentParams
)) . '" class="button" target="_blank">' . (($__compilerVar23) ? ($__compilerVar23) : ('Upload a File')) . '</a>
	</noscript>

';
}
$__output .= $__compilerVar25;
unset($__compilerVar23, $__compilerVar24, $__compilerVar25);
$__output .= '
			<input type="button" value="' . 'Preview' . '..." class="button PreviewButton JsOnly" />
		</dd>
	</dl>

	<input type="hidden" name="_xfToken" value="' . htmlspecialchars($visitor['csrf_token_page'], ENT_QUOTES, 'UTF-8') . '" />
</form>';
