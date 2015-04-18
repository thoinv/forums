<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__extraData['title'] = '';
$__extraData['title'] .= 'Edit video "' . htmlspecialchars($content['title'], ENT_QUOTES, 'UTF-8') . '" in the album "' . htmlspecialchars($album['title'], ENT_QUOTES, 'UTF-8') . '"';
$__output .= '

';
if ($content['description'])
{
$__output .= '
	';
$__extraData['pageDescription'] = array(
'class' => 'baseHtml'
);
$__extraData['pageDescription']['content'] = '';
$__extraData['pageDescription']['content'] .= $content['description'];
$__output .= '
';
}
else if ($album['description'])
{
$__output .= '
	';
$__extraData['pageDescription'] = array(
'class' => 'baseHtml'
);
$__extraData['pageDescription']['content'] = '';
$__extraData['pageDescription']['content'] .= $album['description'];
$__output .= '
';
}
$__output .= '

';
$__extraData['navigation'] = array();
$__extraData['navigation'] = XenForo_Template_Helper_Core::appendBreadCrumbs($__extraData['navigation'], $breadCrumbs);
$__output .= '

';
$__extraData['head']['robots'] = '';
$__extraData['head']['robots'] .= '
	<meta name="robots" content="noindex" />
';
$__output .= '

';
$this->addRequiredExternal('js', '//maps.googleapis.com/maps/api/js?sensor=false&libraries=places' . (($xenOptions['sonnbXG_mapApiKey']) ? ('&key=' . htmlspecialchars($xenOptions['sonnbXG_mapApiKey'], ENT_QUOTES, 'UTF-8')) : ('')));
$__output .= '
';
$this->addRequiredExternal('js', 'js/sonnb/XenGallery/jquery.geocomplete.js');
$__output .= '

<form action="' . XenForo_Template_Helper_Core::link('gallery/videos/save', $content, array()) . '" method="post"
	class="xenForm formOverlay AutoValidator" data-redirect="on">

	';
$__compilerVar8 = '';
$__compilerVar8 .= '

		<fieldset>		
			<dl class="ctrlUnit">
				<dt><label for="ctrl_title_create">' . 'Tiêu đề' . ':</label></dt>
				<dd><input type="text" name="title" class="textCtrl" id="ctrl_title_create" maxlength="255" autofocus="true"
					placeholder="' . 'Title' . '..." value="' . (($content['title'] AND $content['title'] != $content['content_id']) ? (htmlspecialchars($content['title'], ENT_QUOTES, 'UTF-8')) : ('')) . '"
					data-liveTitleTemplate="' . ((!$content['content_id']) ? ('sonnb_xengallery_create_video') : ('Edit video')) . ': <em>%s</em>" /></dd>
			</dl>

			<dl class="ctrlUnit">
				<dt>' . 'Description' . ':</dt>
				<dd>' . $editorTemplate . '</dd>
			</dl>
			
			';
if (!$disableLocation)
{
$__compilerVar8 .= '
			<dl class="ctrlUnit">
				<dt><label for="ctrl_location">' . 'Location' . ':</label></dt>
				<dd>
					<input type="text" name="content_location" class="textCtrl" id="ctrl_location" maxlength="255" autofocus="true"
						placeholder="' . 'Where did you record this video' . '..." value="' . (($content['content_location']) ? (htmlspecialchars($content['content_location'], ENT_QUOTES, 'UTF-8')) : ('')) . '"/>
				</dd>
			</dl>
			';
}
$__compilerVar8 .= '

			<dl class="ctrlUnit">
				<dt><label for="ctrl_stream">' . 'Streams' . ':</label></dt>
				<dd>
					<input id="ctrl_stream" type="text" name="stream_name" class="textCtrl" value="' . (($content['stream_name']) ? (htmlspecialchars($content['stream_name'], ENT_QUOTES, 'UTF-8')) : ('')) . '"/>
					<p class="explain">' . 'Separate each stream with a comma: my family, my car, etc.' . '</p>
				</dd>
			</dl>
			
			<dl class="ctrlUnit">
				<dt><label for="ctrl_with">' . 'Tag People' . ':</label></dt>
				<dd>
					<input type="text" name="content_people" class="textCtrl AutoComplete" id="ctrl_with" autofocus="true"
						placeholder="' . 'Who was there with you?' . '..." value="' . (($content['content_people']) ? (htmlspecialchars($content['content_people'], ENT_QUOTES, 'UTF-8')) : ('')) . '"/>
					<p class="explain">' . 'Dãn cách tên bằng dấu phẩy(,).' . '</p>
				</dd>
			</dl>
		</fieldset>
			
		<fieldset style="clear: both;">
			';
$__compilerVar9 = '';
$this->addRequiredExternal('css', 'sonnb_xengallery_helper_album_privacy');
$__compilerVar9 .= '
';
$this->addRequiredExternal('js', 'js/sonnb/XenGallery/gallery.privacyeditor.js');
$__compilerVar9 .= '

<dl class="ctrlUnit">
	<dt>' . 'View this video' . ':</dt>
	<dd>
		<select name="allow_view" id="ctrl_allow_view" class="textCtrl xenGalleryCtrl">
			<option value="everyone" ' . (($content['content_privacy']['allow_view'] == ('everyone')) ? ' selected="selected"' : '') . '>' . 'Everyone' . '</option>
			<option value="members" ' . (($content['content_privacy']['allow_view'] == ('members')) ? ' selected="selected"' : '') . '>' . 'Registered Users' . '</option>
			<option value="followed" ' . (($content['content_privacy']['allow_view'] == ('followed')) ? ' selected="selected"' : '') . '>' . 'People I Followed' . '</option>
			<option value="following" ' . (($content['content_privacy']['allow_view'] == ('following')) ? ' selected="selected"' : '') . '>' . 'People Following Me' . '</option>
			<option value="custom" ' . (($content['content_privacy']['allow_view'] == ('custom')) ? ' selected="selected"' : '') . '>' . 'Custom' . '</option>
			<option value="none" ' . (($content['content_privacy']['allow_view'] == ('none')) ? ' selected="selected"' : '') . '>' . 'Only Me' . '</option>
		</select>
		<input type="text" name="allow_view_username" value="' . htmlspecialchars($content['allow_view_username'], ENT_QUOTES, 'UTF-8') . '" id="ctrl_allow_view_username" class="textCtrl xenGalleryCtrl AutoComplete" ' . (($content['content_privacy']['allow_view'] != ('custom')) ? ('style="display:none;"') : ('')) . ' />
		<p class="explain xenGalleryCtrl" ' . (($content['content_privacy']['allow_view'] != ('custom')) ? ('style="display:none;"') : ('')) . '>' . 'Dãn cách tên bằng dấu phẩy(,).' . '</p>
	</dd>
</dl>
<dl class="ctrlUnit">
	<dt>' . 'Comment on this video' . ':</dt>
	<dd>
		<select name="allow_comment" id="ctrl_allow_comment" class="textCtrl xenGalleryCtrl">
			<option value="everyone" ' . (($content['content_privacy']['allow_comment'] == ('everyone')) ? ' selected="selected"' : '') . '>' . 'Everyone' . '</option>
			<option value="members" ' . (($content['content_privacy']['allow_comment'] == ('members')) ? ' selected="selected"' : '') . '>' . 'Registered Users' . '</option>
			<option value="followed" ' . (($content['content_privacy']['allow_comment'] == ('followed')) ? ' selected="selected"' : '') . '>' . 'People I Followed' . '</option>
			<option value="following" ' . (($content['content_privacy']['allow_comment'] == ('following')) ? ' selected="selected"' : '') . '>' . 'People Following Me' . '</option>
			<option value="custom" ' . (($content['content_privacy']['allow_comment'] == ('custom')) ? ' selected="selected"' : '') . '>' . 'Custom' . '</option>
			<option value="none" ' . (($content['content_privacy']['allow_comment'] == ('none')) ? ' selected="selected"' : '') . '>' . 'Only Me' . '</option>
		</select>
		<input type="text" name="allow_comment_username" value="' . htmlspecialchars($content['allow_comment_username'], ENT_QUOTES, 'UTF-8') . '" id="ctrl_allow_comment_username" class="textCtrl xenGalleryCtrl AutoComplete" ' . (($content['content_privacy']['allow_comment'] != ('custom')) ? ('style="display:none;"') : ('')) . ' />
		<p class="explain xenGalleryCtrl" ' . (($content['content_privacy']['allow_comment'] != ('custom')) ? ('style="display:none;"') : ('')) . '>' . 'Dãn cách tên bằng dấu phẩy(,).' . '</p>
	</dd>
</dl>';
$__compilerVar8 .= $__compilerVar9;
unset($__compilerVar9);
$__compilerVar8 .= '
		</fieldset>

		';
$__compilerVar10 = '';
$__compilerVar10 .= '
			';
if ($fields)
{
$__compilerVar10 .= '
				<h3 class="sectionHeader">' . 'Custom Fields' . '</h3>
				';
$__compilerVar11 = '';
foreach ($fields AS $field)
{
$__compilerVar11 .= '
	';
$__compilerVar12 = '';
$__compilerVar12 .= '<dl class="ctrlUnit">
	<dt>
		<label for="ctrl_custom_field_' . htmlspecialchars($field['field_id'], ENT_QUOTES, 'UTF-8') . '">' . htmlspecialchars($field['title'], ENT_QUOTES, 'UTF-8') . ':</label>
		';
if ($field['required'])
{
$__compilerVar12 .= '<dfn>' . 'Required' . '</dfn>';
}
$__compilerVar12 .= '
	</dt>
	<dd>
		';
if ($field['field_type'] == ('textbox'))
{
$__compilerVar12 .= '
			<input type="text" name="custom_fields[' . htmlspecialchars($field['field_id'], ENT_QUOTES, 'UTF-8') . ']" value="' . htmlspecialchars($field['field_value'], ENT_QUOTES, 'UTF-8') . '" 
				id="ctrl_custom_field_' . htmlspecialchars($field['field_id'], ENT_QUOTES, 'UTF-8') . '"
				data-validatorname="custom_field_' . htmlspecialchars($field['field_id'], ENT_QUOTES, 'UTF-8') . '"
				class="textCtrl" maxlength="' . (($field['max_length']) ? (htmlspecialchars($field['max_length'], ENT_QUOTES, 'UTF-8')) : ('')) . '" 
			/>
		';
}
else if ($field['field_type'] == ('textarea'))
{
$__compilerVar12 .= '
			<textarea name="custom_fields[' . htmlspecialchars($field['field_id'], ENT_QUOTES, 'UTF-8') . ']" 
				id="ctrl_custom_field_' . htmlspecialchars($field['field_id'], ENT_QUOTES, 'UTF-8') . '"
				data-validatorname="custom_field_' . htmlspecialchars($field['field_id'], ENT_QUOTES, 'UTF-8') . '" 
				class="textCtrl Elastic">' . htmlspecialchars($field['field_value'], ENT_QUOTES, 'UTF-8') . '</textarea>
		';
}
else if ($field['field_type'] == ('radio'))
{
$__compilerVar12 .= '
			<ul class="checkboxColumns">
			';
if (!$field['required'])
{
$__compilerVar12 .= '
				<li><label><input autocomplete="off" type="radio" name="custom_fields[' . htmlspecialchars($field['field_id'], ENT_QUOTES, 'UTF-8') . ']" value="" ' . (($field['field_value'] == ('')) ? ' checked="checked"' : '') . ' /> <span class="muted">' . 'No selection' . '</span></label></li>
			';
}
$__compilerVar12 .= '
			';
foreach ($field['fieldChoices'] AS $choice => $text)
{
$__compilerVar12 .= '
				<li><label><input autocomplete="off" type="radio" name="custom_fields[' . htmlspecialchars($field['field_id'], ENT_QUOTES, 'UTF-8') . ']" value="' . htmlspecialchars($choice, ENT_QUOTES, 'UTF-8') . '" ' . (($field['field_value'] == $choice) ? ' checked="checked"' : '') . ' /> ' . $text . '</label></li>
			';
}
$__compilerVar12 .= '
			</ul>
		';
}
else if ($field['field_type'] == ('select'))
{
$__compilerVar12 .= '
			<select name="custom_fields[' . htmlspecialchars($field['field_id'], ENT_QUOTES, 'UTF-8') . ']" id="ctrl_custom_field_' . htmlspecialchars($field['field_id'], ENT_QUOTES, 'UTF-8') . '" class="textCtrl" autocomplete="off" >
			';
if (!$field['required'] OR !$field['hasValue'])
{
$__compilerVar12 .= '
				<option value="">&nbsp;</option>
			';
}
$__compilerVar12 .= '
			';
foreach ($field['fieldChoices'] AS $choice => $text)
{
$__compilerVar12 .= '
				<option value="' . htmlspecialchars($choice, ENT_QUOTES, 'UTF-8') . '" ' . (($field['field_value'] == $choice) ? ' selected="selected"' : '') . '>' . $text . '</option>
			';
}
$__compilerVar12 .= '
			</select>
		';
}
else if ($field['field_type'] == ('checkbox'))
{
$__compilerVar12 .= '
			<ul class="checkboxColumns">
			';
foreach ($field['fieldChoices'] AS $choice => $text)
{
$__compilerVar12 .= '
				<li><label><input autocomplete="off" type="checkbox" name="custom_fields[' . htmlspecialchars($field['field_id'], ENT_QUOTES, 'UTF-8') . '][' . htmlspecialchars($choice, ENT_QUOTES, 'UTF-8') . ']" value="' . htmlspecialchars($choice, ENT_QUOTES, 'UTF-8') . '" ' . ((isset($field['field_value'][$choice])) ? ' checked="checked"' : '') . ' /> ' . $text . '</label></li>
			';
}
$__compilerVar12 .= '
			</ul>
		';
}
else if ($field['field_type'] == ('multiselect'))
{
$__compilerVar12 .= '
			<select name="custom_fields[' . htmlspecialchars($field['field_id'], ENT_QUOTES, 'UTF-8') . '][]" id="ctrl_custom_field_' . htmlspecialchars($field['field_id'], ENT_QUOTES, 'UTF-8') . '" class="textCtrl" size="7" multiple="multiple" autocomplete="off" >
			';
if (!$field['required'] OR !$field['hasValue'])
{
$__compilerVar12 .= '
				<option value="">&nbsp;</option>
			';
}
$__compilerVar12 .= '
			';
foreach ($field['fieldChoices'] AS $choice => $text)
{
$__compilerVar12 .= '
				<option value="' . htmlspecialchars($choice, ENT_QUOTES, 'UTF-8') . '" ' . ((isset($field['field_value'][$choice])) ? ' selected="selected"' : '') . '>' . $text . '</option>
			';
}
$__compilerVar12 .= '
			</select>
		';
}
$__compilerVar12 .= '

		';
$__compilerVar13 = '';
$__compilerVar13 .= $field['description'];
if (trim($__compilerVar13) !== '')
{
$__compilerVar12 .= '<p class="explain">' . $__compilerVar13 . '</p>';
}
unset($__compilerVar13);
$__compilerVar12 .= '
	</dd>
</dl>';
$__compilerVar11 .= $__compilerVar12;
unset($__compilerVar12);
$__compilerVar11 .= '
';
}
$__compilerVar10 .= $__compilerVar11;
unset($__compilerVar11);
$__compilerVar10 .= '
			';
}
$__compilerVar10 .= '
		';
$__compilerVar8 .= $this->callTemplateHook('video_edit_fields_extra', $__compilerVar10, array());
unset($__compilerVar10);
$__compilerVar8 .= '

		<dl class="ctrlUnit submitUnit">
			<dt></dt>
			<dd>
				<input type="submit" value="' . 'Lưu' . '" accesskey="s" class="button primary" />
			</dd>
		</dl>
	';
$__output .= $this->callTemplateHook('xengallery_video_edit', $__compilerVar8, array());
unset($__compilerVar8);
$__output .= '

	<input type="hidden" name="location_lat" value="" />
	<input type="hidden" name="location_lng" value="" />
	<input type="hidden" name="_xfToken" value="' . htmlspecialchars($visitor['csrf_token_page'], ENT_QUOTES, 'UTF-8') . '" />
</form>

';
$__compilerVar14 = '';
$__output .= $this->callTemplateHook('sonnb_cr_information', $__compilerVar14, array());
unset($__compilerVar14);
$__output .= '

<script type="text/javascript">
	$("#ctrl_location").geocomplete().bind("geocode:result", function(event, results){
		event.preventDefault();

		if (results.geometry.location.lat())
		{
			$(\'input[name="location_lat"]\').val(results.geometry.location.lat());
		}
		if (results.geometry.location.lng())
		{
			$(\'input[name="location_lng"]\').val(results.geometry.location.lng());
		}
		
		return false;
	});
</script>';
