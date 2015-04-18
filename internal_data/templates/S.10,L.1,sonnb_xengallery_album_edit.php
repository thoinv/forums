<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__extraData['title'] = '';
if ($album['album_id'])
{
$__extraData['title'] .= 'Edit Album' . ': ' . htmlspecialchars($album['title'], ENT_QUOTES, 'UTF-8');
}
else
{
$__extraData['title'] .= 'Create New Album';
}
$__output .= '

';
if ($album['description'])
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
if (!$disableLocation)
{
$__output .= '
	';
$this->addRequiredExternal('js', '//maps.googleapis.com/maps/api/js?sensor=false&libraries=places' . (($xenOptions['sonnbXG_mapApiKey']) ? ('&key=' . htmlspecialchars($xenOptions['sonnbXG_mapApiKey'], ENT_QUOTES, 'UTF-8')) : ('')));
$__output .= '
	';
$this->addRequiredExternal('js', 'js/sonnb/XenGallery/jquery.geocomplete.js');
$__output .= '
';
}
$__output .= '

';
$this->addRequiredExternal('js', 'js/sonnb/XenGallery/jquery.masonry.min.js');
$__output .= '
';
$this->addRequiredExternal('js', 'js/sonnb/XenGallery/modernizr.min.js');
$__output .= '

<form action="' . XenForo_Template_Helper_Core::link('gallery/albums/save', $album, array()) . '" method="post"
	class="xenForm ' . ((!$album['album_id'] AND XenForo_Template_Helper_Core::styleProperty('sonnbXG_disableCreationAutoValidator')) ? ('') : ('AutoValidator')) . '" data-redirect="on">

	';
$__compilerVar1 = '';
$__compilerVar1 .= '

		<fieldset>		
			<dl class="ctrlUnit">
				<dt><label for="ctrl_title_create">' . 'Title' . ':</label></dt>
				<dd><input type="text" name="title" class="textCtrl" id="ctrl_title_create" maxlength="255" autofocus="true"
					placeholder="' . 'Album Title' . '..." value="' . (($album['title']) ? (htmlspecialchars($album['title'], ENT_QUOTES, 'UTF-8')) : ('')) . '"
					data-liveTitleTemplate="' . ((!$album['album_id']) ? ('Create New Album') : ('Edit Album')) . ': <em>%s</em>" /></dd>
			</dl>

			';
if (!$xenOptions['sonnbXG_disableCategory'])
{
$__compilerVar1 .= '
			<dl class="ctrlUnit">
				<dt><label for="ctrl_location">' . 'Category' . ':</label></dt>
				<dd>
					<select name="category_id" class="textCtrl">
						<option value="0"></option>
						';
if ($categories)
{
$__compilerVar1 .= '
							';
foreach ($categories AS $cat)
{
$__compilerVar1 .= '
								<option value="' . htmlspecialchars($cat['category_id'], ENT_QUOTES, 'UTF-8') . '" ' . (($album['category_id'] && $cat['category_id'] == $album['category_id']) ? ' selected="selected"' : '') . '>' . XenForo_Template_Helper_Core::string('repeat', array(
'0' => '&nbsp; &nbsp; ',
'1' => htmlspecialchars($cat['depth'], ENT_QUOTES, 'UTF-8')
)) . htmlspecialchars($cat['title'], ENT_QUOTES, 'UTF-8') . '</option>
							';
}
$__compilerVar1 .= '
						';
}
$__compilerVar1 .= '
					</select>
				</dd>
			</dl>
			';
}
$__compilerVar1 .= '

			';
$__compilerVar2 = '';
$__compilerVar1 .= $this->callTemplateHook('album_create_fields_main', $__compilerVar2, array());
unset($__compilerVar2);
$__compilerVar1 .= '

			<dl class="ctrlUnit">
				<dt>' . 'Description' . ':</dt>
				<dd>' . $editorTemplate . '</dd>
			</dl>
			
			';
if (!$disableLocation)
{
$__compilerVar1 .= '
			<dl class="ctrlUnit">
				<dt><label for="ctrl_location">' . 'Location' . ':</label></dt>
				<dd>
					<input type="text" name="album_location" class="textCtrl" id="ctrl_location" maxlength="255"
						placeholder="' . 'Where did you take this Album?' . '..." value="' . (($album['album_location']) ? (htmlspecialchars($album['album_location'], ENT_QUOTES, 'UTF-8')) : ('')) . '"/>
				</dd>
			</dl>
			';
}
$__compilerVar1 .= '

			<dl class="ctrlUnit">
				<dt><label for="ctrl_stream">' . 'Streams' . ':</label></dt>
				<dd>
					<input id="ctrl_stream" type="text" name="stream_name" class="textCtrl" value="' . (($album['stream_name']) ? (htmlspecialchars($album['stream_name'], ENT_QUOTES, 'UTF-8')) : ('')) . '"/>
					<p class="explain">' . 'Separate each stream with a comma: my family, my car, etc.' . '</p>
				</dd>
			</dl>
			
			<dl class="ctrlUnit">
				<dt><label for="ctrl_with">' . 'Tag People' . ':</label></dt>
				<dd>
					<input type="text" name="album_with" class="textCtrl AutoComplete" id="ctrl_with"
						placeholder="' . 'Who was there with you?' . '..." value="' . (($album['album_people']) ? (htmlspecialchars($album['album_people'], ENT_QUOTES, 'UTF-8')) : ('')) . '"/>
					<p class="explain">' . 'Separate names with a comma.' . '</p>
				</dd>
			</dl>
		</fieldset>
		
		<fieldset style="clear: both;">
			';
$__compilerVar3 = '';
$this->addRequiredExternal('css', 'sonnb_xengallery_helper_album_privacy');
$__compilerVar3 .= '
';
$this->addRequiredExternal('js', 'js/sonnb/XenGallery/gallery.privacyeditor.js');
$__compilerVar3 .= '

<dl class="ctrlUnit">
	<dt>' . 'View this album' . ':</dt>
	<dd>
		<select name="allow_view" id="ctrl_allow_view" class="textCtrl xenGalleryCtrl">
			<option value="everyone" ' . (($album['album_privacy']['allow_view'] == ('everyone')) ? ' selected="selected"' : '') . '>' . 'Everyone' . '</option>
			<option value="members" ' . (($album['album_privacy']['allow_view'] == ('members')) ? ' selected="selected"' : '') . '>' . 'Registered Users' . '</option>
			<option value="followed" ' . (($album['album_privacy']['allow_view'] == ('followed')) ? ' selected="selected"' : '') . '>' . 'People I Followed' . '</option>
			<option value="following" ' . (($album['album_privacy']['allow_view'] == ('following')) ? ' selected="selected"' : '') . '>' . 'People Following Me' . '</option>
			<option value="custom" ' . (($album['album_privacy']['allow_view'] == ('custom')) ? ' selected="selected"' : '') . '>' . 'Custom' . '</option>
			<option value="none" ' . (($album['album_privacy']['allow_view'] == ('none')) ? ' selected="selected"' : '') . '>' . 'Only Me' . '</option>
		</select>
		<input type="text" name="allow_view_username" value="' . htmlspecialchars($album['allow_view_username'], ENT_QUOTES, 'UTF-8') . '" id="ctrl_allow_view_username" class="textCtrl xenGalleryCtrl AutoComplete" ' . (($album['album_privacy']['allow_view'] != ('custom')) ? ('style="display:none;"') : ('')) . ' />			
		<p class="explain xenGalleryCtrl" ' . (($album['album_privacy']['allow_view'] != ('custom')) ? ('style="display:none;"') : ('')) . '>' . 'Separate names with a comma.' . '</p>
	</dd>
</dl>
<dl class="ctrlUnit">
	<dt>' . 'Comment On This Album' . ':</dt>
	<dd>
		<select name="allow_comment" id="ctrl_allow_comment" class="textCtrl xenGalleryCtrl">
			<option value="everyone" ' . (($album['album_privacy']['allow_comment'] == ('everyone')) ? ' selected="selected"' : '') . '>' . 'Everyone' . '</option>
			<option value="members" ' . (($album['album_privacy']['allow_comment'] == ('members')) ? ' selected="selected"' : '') . '>' . 'Registered Users' . '</option>
			<option value="followed" ' . (($album['album_privacy']['allow_comment'] == ('followed')) ? ' selected="selected"' : '') . '>' . 'People I Followed' . '</option>
			<option value="following" ' . (($album['album_privacy']['allow_comment'] == ('following')) ? ' selected="selected"' : '') . '>' . 'People Following Me' . '</option>
			<option value="custom" ' . (($album['album_privacy']['allow_comment'] == ('custom')) ? ' selected="selected"' : '') . '>' . 'Custom' . '</option>
			<option value="none" ' . (($album['album_privacy']['allow_comment'] == ('none')) ? ' selected="selected"' : '') . '>' . 'Only Me' . '</option>
		</select>
		<input type="text" name="allow_comment_username" value="' . htmlspecialchars($album['allow_comment_username'], ENT_QUOTES, 'UTF-8') . '" id="ctrl_allow_comment_username" class="textCtrl xenGalleryCtrl AutoComplete" ' . (($album['album_privacy']['allow_comment'] != ('custom')) ? ('style="display:none;"') : ('')) . ' />	
		<p class="explain xenGalleryCtrl" ' . (($album['album_privacy']['allow_comment'] != ('custom')) ? ('style="display:none;"') : ('')) . '>' . 'Separate names with a comma.' . '</p>
	</dd>
</dl>
<dl class="ctrlUnit">
	<dt>' . 'Download Original Photos' . ':</dt>
	<dd>
		<select name="allow_download" id="ctrl_allow_download" class="textCtrl xenGalleryCtrl">
			<option value="everyone" ' . (($album['album_privacy']['allow_download'] == ('everyone')) ? ' selected="selected"' : '') . '>' . 'Everyone' . '</option>
			<option value="members" ' . (($album['album_privacy']['allow_download'] == ('members')) ? ' selected="selected"' : '') . '>' . 'Registered Users' . '</option>
			<option value="followed" ' . (($album['album_privacy']['allow_download'] == ('followed')) ? ' selected="selected"' : '') . '>' . 'People I Followed' . '</option>
			<option value="following" ' . (($album['album_privacy']['allow_download'] == ('following')) ? ' selected="selected"' : '') . '>' . 'People Following Me' . '</option>
			<option value="custom" ' . (($album['album_privacy']['allow_download'] == ('custom')) ? ' selected="selected"' : '') . '>' . 'Custom' . '</option>
			<option value="none" ' . (($album['album_privacy']['allow_download'] == ('none')) ? ' selected="selected"' : '') . '>' . 'Only Me' . '</option>
		</select>
		<input type="text" name="allow_download_username" value="' . htmlspecialchars($album['allow_download_username'], ENT_QUOTES, 'UTF-8') . '" id="ctrl_allow_download_username" class="textCtrl xenGalleryCtrl AutoComplete" ' . (($album['album_privacy']['allow_download'] != ('custom')) ? ('style="display:none;"') : ('')) . ' />	
		<p class="explain xenGalleryCtrl" ' . (($album['album_privacy']['allow_download'] != ('custom')) ? ('style="display:none;"') : ('')) . '>' . 'Separate names with a comma.' . '</p>
	</dd>
</dl>
<dl class="ctrlUnit">
	<dt>' . 'Add Photos to this album' . ':</dt>
	<dd>
		<select name="allow_add_photo" id="ctrl_allow_add_photo" class="textCtrl xenGalleryCtrl">
			<option value="everyone" ' . (($album['album_privacy']['allow_add_photo'] == ('everyone')) ? ' selected="selected"' : '') . '>' . 'Everyone' . '</option>
			<option value="members" ' . (($album['album_privacy']['allow_add_photo'] == ('members')) ? ' selected="selected"' : '') . '>' . 'Registered Users' . '</option>
			<option value="followed" ' . (($album['album_privacy']['allow_add_photo'] == ('followed')) ? ' selected="selected"' : '') . '>' . 'People I Followed' . '</option>
			<option value="following" ' . (($album['album_privacy']['allow_add_photo'] == ('following')) ? ' selected="selected"' : '') . '>' . 'People Following Me' . '</option>
			<option value="custom" ' . (($album['album_privacy']['allow_add_photo'] == ('custom')) ? ' selected="selected"' : '') . '>' . 'Custom' . '</option>
			<option value="none" ' . (($album['album_privacy']['allow_add_photo'] == ('none')) ? ' selected="selected"' : '') . '>' . 'Only Me' . '</option>
		</select>
		<input type="text" name="allow_add_photo_username" value="' . htmlspecialchars($album['allow_add_photo_username'], ENT_QUOTES, 'UTF-8') . '" id="ctrl_allow_add_photo_username" class="textCtrl xenGalleryCtrl AutoComplete" ' . (($album['album_privacy']['allow_add_photo'] != ('custom')) ? ('style="display:none;"') : ('')) . ' />	
		<p class="explain xenGalleryCtrl" ' . (($album['album_privacy']['allow_add_photo'] != ('custom')) ? ('style="display:none;"') : ('')) . '>' . 'Separate names with a comma.' . '</p>
	</dd>
</dl>
<dl class="ctrlUnit">
	<dt>' . 'Add Videos to this album' . ':</dt>
	<dd>
		<select name="allow_add_video" id="ctrl_allow_add_video" class="textCtrl xenGalleryCtrl">
			<option value="everyone" ' . (($album['album_privacy']['allow_add_video'] == ('everyone')) ? ' selected="selected"' : '') . '>' . 'Everyone' . '</option>
			<option value="members" ' . (($album['album_privacy']['allow_add_video'] == ('members')) ? ' selected="selected"' : '') . '>' . 'Registered Users' . '</option>
			<option value="followed" ' . (($album['album_privacy']['allow_add_video'] == ('followed')) ? ' selected="selected"' : '') . '>' . 'People I Followed' . '</option>
			<option value="following" ' . (($album['album_privacy']['allow_add_video'] == ('following')) ? ' selected="selected"' : '') . '>' . 'People Following Me' . '</option>
			<option value="custom" ' . (($album['album_privacy']['allow_add_video'] == ('custom')) ? ' selected="selected"' : '') . '>' . 'Custom' . '</option>
			<option value="none" ' . (($album['album_privacy']['allow_add_video'] == ('none')) ? ' selected="selected"' : '') . '>' . 'Only Me' . '</option>
		</select>
		<input type="text" name="allow_add_video_username" value="' . htmlspecialchars($album['allow_add_video_username'], ENT_QUOTES, 'UTF-8') . '" id="ctrl_allow_add_video_username" class="textCtrl xenGalleryCtrl AutoComplete" ' . (($album['album_privacy']['allow_add_video'] != ('custom')) ? ('style="display:none;"') : ('')) . ' />	
		<p class="explain xenGalleryCtrl" ' . (($album['album_privacy']['allow_add_video'] != ('custom')) ? ('style="display:none;"') : ('')) . '>' . 'Separate names with a comma.' . '</p>
	</dd>
</dl>';
$__compilerVar1 .= $__compilerVar3;
unset($__compilerVar3);
$__compilerVar1 .= '
		</fieldset>
		
		';
if ($xenOptions['sonnbXG_showPrivacyOnUpload'] && ($album['album_id'] || (!$album['album_id'] && !$xenOptions['sonnbXG_disableCreationUpload'])))
{
$__compilerVar1 .= '
			<h3 class="sectionHeader">' . 'Privacy For New Photos' . '</h3>
			';
$__compilerVar4 = '';
$__compilerVar4 .= 'photo';
$__compilerVar5 = '';
$this->addRequiredExternal('css', 'sonnb_xengallery_helper_album_privacy');
$__compilerVar5 .= '
';
$this->addRequiredExternal('js', 'js/sonnb/XenGallery/gallery.privacyeditor.js');
$__compilerVar5 .= '

<dl class="ctrlUnit">
	<dt>' . 'Who can view' . ':</dt>
	<dd>
		<select name="' . htmlspecialchars($__compilerVar4, ENT_QUOTES, 'UTF-8') . '_allow_view" id="ctrl_' . htmlspecialchars($__compilerVar4, ENT_QUOTES, 'UTF-8') . '_allow_view" class="textCtrl xenGalleryCtrl">
			<option value="everyone" ' . (($photoPrivacy['allow_view'] == ('everyone')) ? ' selected="selected"' : '') . '>' . 'Everyone' . '</option>
			<option value="members" ' . (($photoPrivacy['allow_view'] == ('members')) ? ' selected="selected"' : '') . '>' . 'Registered Users' . '</option>
			<option value="followed" ' . (($photoPrivacy['allow_view'] == ('followed')) ? ' selected="selected"' : '') . '>' . 'People I Followed' . '</option>
			<option value="following" ' . (($photoPrivacy['allow_view'] == ('following')) ? ' selected="selected"' : '') . '>' . 'People Following Me' . '</option>
			<option value="custom" ' . (($photoPrivacy['allow_view'] == ('custom')) ? ' selected="selected"' : '') . '>' . 'Custom' . '</option>
			<option value="none" ' . (($photoPrivacy['allow_view'] == ('none')) ? ' selected="selected"' : '') . '>' . 'Only Me' . '</option>
		</select>
		<input type="text" name="' . htmlspecialchars($__compilerVar4, ENT_QUOTES, 'UTF-8') . '_allow_view_username" value="" id="ctrl_' . htmlspecialchars($__compilerVar4, ENT_QUOTES, 'UTF-8') . '_allow_view_username" class="textCtrl xenGalleryCtrl AutoComplete" ' . (($photoPrivacy['allow_view'] != ('custom')) ? ('style="display:none;"') : ('')) . ' />			
		<p class="explain xenGalleryCtrl" ' . (($photoPrivacy['allow_view'] != ('custom')) ? ('style="display:none;"') : ('')) . '>' . 'Separate names with a comma.' . '</p>
	</dd>
</dl>
<dl class="ctrlUnit">
	<dt>' . 'Who can comment' . ':</dt>
	<dd>
		<select name="' . htmlspecialchars($__compilerVar4, ENT_QUOTES, 'UTF-8') . '_allow_comment" id="ctrl_' . htmlspecialchars($__compilerVar4, ENT_QUOTES, 'UTF-8') . '_allow_comment" class="textCtrl xenGalleryCtrl">
			<option value="everyone" ' . (($photoPrivacy['allow_comment'] == ('everyone')) ? ' selected="selected"' : '') . '>' . 'Everyone' . '</option>
			<option value="members" ' . (($photoPrivacy['allow_comment'] == ('members')) ? ' selected="selected"' : '') . '>' . 'Registered Users' . '</option>
			<option value="followed" ' . (($photoPrivacy['allow_comment'] == ('followed')) ? ' selected="selected"' : '') . '>' . 'People I Followed' . '</option>
			<option value="following" ' . (($photoPrivacy['allow_comment'] == ('following')) ? ' selected="selected"' : '') . '>' . 'People Following Me' . '</option>
			<option value="custom" ' . (($photoPrivacy['allow_comment'] == ('custom')) ? ' selected="selected"' : '') . '>' . 'Custom' . '</option>
			<option value="none" ' . (($photoPrivacy['allow_comment'] == ('none')) ? ' selected="selected"' : '') . '>' . 'Only Me' . '</option>
		</select>
		<input type="text" name="' . htmlspecialchars($__compilerVar4, ENT_QUOTES, 'UTF-8') . '_allow_comment_username" value="" id="ctrl_' . htmlspecialchars($__compilerVar4, ENT_QUOTES, 'UTF-8') . '_allow_comment_username" class="textCtrl xenGalleryCtrl AutoComplete" ' . (($photoPrivacy['allow_comment'] != ('custom')) ? ('style="display:none;"') : ('')) . ' />	
		<p class="explain xenGalleryCtrl" ' . (($photoPrivacy['allow_comment'] != ('custom')) ? ('style="display:none;"') : ('')) . '>' . 'Separate names with a comma.' . '</p>
	</dd>
</dl>';
$__compilerVar1 .= $__compilerVar5;
unset($__compilerVar4, $__compilerVar5);
$__compilerVar1 .= '
		
			<h3 class="sectionHeader">' . 'Privacy For New Videos' . '</h3>
			';
$__compilerVar6 = '';
$__compilerVar6 .= 'video';
$__compilerVar7 = '';
$this->addRequiredExternal('css', 'sonnb_xengallery_helper_album_privacy');
$__compilerVar7 .= '
';
$this->addRequiredExternal('js', 'js/sonnb/XenGallery/gallery.privacyeditor.js');
$__compilerVar7 .= '

<dl class="ctrlUnit">
	<dt>' . 'Who can view' . ':</dt>
	<dd>
		<select name="' . htmlspecialchars($__compilerVar6, ENT_QUOTES, 'UTF-8') . '_allow_view" id="ctrl_' . htmlspecialchars($__compilerVar6, ENT_QUOTES, 'UTF-8') . '_allow_view" class="textCtrl xenGalleryCtrl">
			<option value="everyone" ' . (($videoPrivacy['allow_view'] == ('everyone')) ? ' selected="selected"' : '') . '>' . 'Everyone' . '</option>
			<option value="members" ' . (($videoPrivacy['allow_view'] == ('members')) ? ' selected="selected"' : '') . '>' . 'Registered Users' . '</option>
			<option value="followed" ' . (($videoPrivacy['allow_view'] == ('followed')) ? ' selected="selected"' : '') . '>' . 'People I Followed' . '</option>
			<option value="following" ' . (($videoPrivacy['allow_view'] == ('following')) ? ' selected="selected"' : '') . '>' . 'People Following Me' . '</option>
			<option value="custom" ' . (($videoPrivacy['allow_view'] == ('custom')) ? ' selected="selected"' : '') . '>' . 'Custom' . '</option>
			<option value="none" ' . (($videoPrivacy['allow_view'] == ('none')) ? ' selected="selected"' : '') . '>' . 'Only Me' . '</option>
		</select>
		<input type="text" name="' . htmlspecialchars($__compilerVar6, ENT_QUOTES, 'UTF-8') . '_allow_view_username" value="" id="ctrl_' . htmlspecialchars($__compilerVar6, ENT_QUOTES, 'UTF-8') . '_allow_view_username" class="textCtrl xenGalleryCtrl AutoComplete" ' . (($videoPrivacy['allow_view'] != ('custom')) ? ('style="display:none;"') : ('')) . ' />			
		<p class="explain xenGalleryCtrl" ' . (($videoPrivacy['allow_view'] != ('custom')) ? ('style="display:none;"') : ('')) . '>' . 'Separate names with a comma.' . '</p>
	</dd>
</dl>
<dl class="ctrlUnit">
	<dt>' . 'Who can comment' . ':</dt>
	<dd>
		<select name="' . htmlspecialchars($__compilerVar6, ENT_QUOTES, 'UTF-8') . '_allow_comment" id="ctrl_' . htmlspecialchars($__compilerVar6, ENT_QUOTES, 'UTF-8') . '_allow_comment" class="textCtrl xenGalleryCtrl">
			<option value="everyone" ' . (($videoPrivacy['allow_comment'] == ('everyone')) ? ' selected="selected"' : '') . '>' . 'Everyone' . '</option>
			<option value="members" ' . (($videoPrivacy['allow_comment'] == ('members')) ? ' selected="selected"' : '') . '>' . 'Registered Users' . '</option>
			<option value="followed" ' . (($videoPrivacy['allow_comment'] == ('followed')) ? ' selected="selected"' : '') . '>' . 'People I Followed' . '</option>
			<option value="following" ' . (($videoPrivacy['allow_comment'] == ('following')) ? ' selected="selected"' : '') . '>' . 'People Following Me' . '</option>
			<option value="custom" ' . (($videoPrivacy['allow_comment'] == ('custom')) ? ' selected="selected"' : '') . '>' . 'Custom' . '</option>
			<option value="none" ' . (($videoPrivacy['allow_comment'] == ('none')) ? ' selected="selected"' : '') . '>' . 'Only Me' . '</option>
		</select>
		<input type="text" name="' . htmlspecialchars($__compilerVar6, ENT_QUOTES, 'UTF-8') . '_allow_comment_username" value="" id="ctrl_' . htmlspecialchars($__compilerVar6, ENT_QUOTES, 'UTF-8') . '_allow_comment_username" class="textCtrl xenGalleryCtrl AutoComplete" ' . (($videoPrivacy['allow_comment'] != ('custom')) ? ('style="display:none;"') : ('')) . ' />	
		<p class="explain xenGalleryCtrl" ' . (($videoPrivacy['allow_comment'] != ('custom')) ? ('style="display:none;"') : ('')) . '>' . 'Separate names with a comma.' . '</p>
	</dd>
</dl>';
$__compilerVar1 .= $__compilerVar7;
unset($__compilerVar6, $__compilerVar7);
$__compilerVar1 .= '
		';
}
$__compilerVar1 .= '

		';
$__compilerVar8 = '';
$__compilerVar8 .= '
			';
if ($fields)
{
$__compilerVar8 .= '
				<h3 class="sectionHeader">' . 'Custom Fields' . '</h3>
				';
$__compilerVar9 = '';
foreach ($fields AS $field)
{
$__compilerVar9 .= '
	';
$__compilerVar10 = '';
$__compilerVar10 .= '<dl class="ctrlUnit">
	<dt>
		<label for="ctrl_custom_field_' . htmlspecialchars($field['field_id'], ENT_QUOTES, 'UTF-8') . '">' . htmlspecialchars($field['title'], ENT_QUOTES, 'UTF-8') . ':</label>
		';
if ($field['required'])
{
$__compilerVar10 .= '<dfn>' . 'Required' . '</dfn>';
}
$__compilerVar10 .= '
	</dt>
	<dd>
		';
if ($field['field_type'] == ('textbox'))
{
$__compilerVar10 .= '
			<input type="text" name="custom_fields[' . htmlspecialchars($field['field_id'], ENT_QUOTES, 'UTF-8') . ']" value="' . htmlspecialchars($field['field_value'], ENT_QUOTES, 'UTF-8') . '" 
				id="ctrl_custom_field_' . htmlspecialchars($field['field_id'], ENT_QUOTES, 'UTF-8') . '"
				data-validatorname="custom_field_' . htmlspecialchars($field['field_id'], ENT_QUOTES, 'UTF-8') . '"
				class="textCtrl" maxlength="' . (($field['max_length']) ? (htmlspecialchars($field['max_length'], ENT_QUOTES, 'UTF-8')) : ('')) . '" 
			/>
		';
}
else if ($field['field_type'] == ('textarea'))
{
$__compilerVar10 .= '
			<textarea name="custom_fields[' . htmlspecialchars($field['field_id'], ENT_QUOTES, 'UTF-8') . ']" 
				id="ctrl_custom_field_' . htmlspecialchars($field['field_id'], ENT_QUOTES, 'UTF-8') . '"
				data-validatorname="custom_field_' . htmlspecialchars($field['field_id'], ENT_QUOTES, 'UTF-8') . '" 
				class="textCtrl Elastic">' . htmlspecialchars($field['field_value'], ENT_QUOTES, 'UTF-8') . '</textarea>
		';
}
else if ($field['field_type'] == ('radio'))
{
$__compilerVar10 .= '
			<ul class="checkboxColumns">
			';
if (!$field['required'])
{
$__compilerVar10 .= '
				<li><label><input autocomplete="off" type="radio" name="custom_fields[' . htmlspecialchars($field['field_id'], ENT_QUOTES, 'UTF-8') . ']" value="" ' . (($field['field_value'] == ('')) ? ' checked="checked"' : '') . ' /> <span class="muted">' . 'No selection' . '</span></label></li>
			';
}
$__compilerVar10 .= '
			';
foreach ($field['fieldChoices'] AS $choice => $text)
{
$__compilerVar10 .= '
				<li><label><input autocomplete="off" type="radio" name="custom_fields[' . htmlspecialchars($field['field_id'], ENT_QUOTES, 'UTF-8') . ']" value="' . htmlspecialchars($choice, ENT_QUOTES, 'UTF-8') . '" ' . (($field['field_value'] == $choice) ? ' checked="checked"' : '') . ' /> ' . $text . '</label></li>
			';
}
$__compilerVar10 .= '
			</ul>
		';
}
else if ($field['field_type'] == ('select'))
{
$__compilerVar10 .= '
			<select name="custom_fields[' . htmlspecialchars($field['field_id'], ENT_QUOTES, 'UTF-8') . ']" id="ctrl_custom_field_' . htmlspecialchars($field['field_id'], ENT_QUOTES, 'UTF-8') . '" class="textCtrl" autocomplete="off" >
			';
if (!$field['required'] OR !$field['hasValue'])
{
$__compilerVar10 .= '
				<option value="">&nbsp;</option>
			';
}
$__compilerVar10 .= '
			';
foreach ($field['fieldChoices'] AS $choice => $text)
{
$__compilerVar10 .= '
				<option value="' . htmlspecialchars($choice, ENT_QUOTES, 'UTF-8') . '" ' . (($field['field_value'] == $choice) ? ' selected="selected"' : '') . '>' . $text . '</option>
			';
}
$__compilerVar10 .= '
			</select>
		';
}
else if ($field['field_type'] == ('checkbox'))
{
$__compilerVar10 .= '
			<ul class="checkboxColumns">
			';
foreach ($field['fieldChoices'] AS $choice => $text)
{
$__compilerVar10 .= '
				<li><label><input autocomplete="off" type="checkbox" name="custom_fields[' . htmlspecialchars($field['field_id'], ENT_QUOTES, 'UTF-8') . '][' . htmlspecialchars($choice, ENT_QUOTES, 'UTF-8') . ']" value="' . htmlspecialchars($choice, ENT_QUOTES, 'UTF-8') . '" ' . ((isset($field['field_value'][$choice])) ? ' checked="checked"' : '') . ' /> ' . $text . '</label></li>
			';
}
$__compilerVar10 .= '
			</ul>
		';
}
else if ($field['field_type'] == ('multiselect'))
{
$__compilerVar10 .= '
			<select name="custom_fields[' . htmlspecialchars($field['field_id'], ENT_QUOTES, 'UTF-8') . '][]" id="ctrl_custom_field_' . htmlspecialchars($field['field_id'], ENT_QUOTES, 'UTF-8') . '" class="textCtrl" size="7" multiple="multiple" autocomplete="off" >
			';
if (!$field['required'] OR !$field['hasValue'])
{
$__compilerVar10 .= '
				<option value="">&nbsp;</option>
			';
}
$__compilerVar10 .= '
			';
foreach ($field['fieldChoices'] AS $choice => $text)
{
$__compilerVar10 .= '
				<option value="' . htmlspecialchars($choice, ENT_QUOTES, 'UTF-8') . '" ' . ((isset($field['field_value'][$choice])) ? ' selected="selected"' : '') . '>' . $text . '</option>
			';
}
$__compilerVar10 .= '
			</select>
		';
}
$__compilerVar10 .= '

		';
$__compilerVar11 = '';
$__compilerVar11 .= $field['description'];
if (trim($__compilerVar11) !== '')
{
$__compilerVar10 .= '<p class="explain">' . $__compilerVar11 . '</p>';
}
unset($__compilerVar11);
$__compilerVar10 .= '
	</dd>
</dl>';
$__compilerVar9 .= $__compilerVar10;
unset($__compilerVar10);
$__compilerVar9 .= '
';
}
$__compilerVar8 .= $__compilerVar9;
unset($__compilerVar9);
$__compilerVar8 .= '
			';
}
$__compilerVar8 .= '
		';
$__compilerVar1 .= $this->callTemplateHook('album_create_fields_extra', $__compilerVar8, array());
unset($__compilerVar8);
$__compilerVar1 .= '

		';
if ($album['album_id'] || (!$album['album_id'] && !$xenOptions['sonnbXG_disableCreationUpload']))
{
$__compilerVar1 .= '
			<fieldset style="clear: both;">
			';
if ($contentDataParams)
{
$__compilerVar1 .= '
				<dl class="ctrlUnit fullWidth">
					<dt></dt>
					<dd>';
$__compilerVar12 = '';
if ($contentDataParams)
{
$__compilerVar12 .= '

	';
$this->addRequiredExternal('js', 'js/xenforo/attachment_editor.js');
$__compilerVar12 .= '
	';
$this->addRequiredExternal('js', 'js/sonnb/XenGallery/gallery.contentuploader.js');
$__compilerVar12 .= '
	';
$this->addRequiredExternal('css', 'sonnb_xengallery_upload');
$__compilerVar12 .= '
	
	<div class="ContentEditor">		
		<div class="NoContents"></div>
	
		<ol class="ContentList Existing">
			';
$__compilerVar13 = '';
$__compilerVar13 .= '1';
$__compilerVar14 = '';
$__compilerVar15 = '';
$this->addRequiredExternal('css', 'sonnb_xengallery_upload');
$__compilerVar15 .= '

<li id="' . (($__compilerVar13) ? ('AttachedContentTemplate') : ('content' . htmlspecialchars($__compilerVar14['content_data_id'], ENT_QUOTES, 'UTF-8'))) . '" class="AttachedContent">
	<div class="Thumbnail" ' . ((!empty($__compilerVar14['thumbnailUrl'])) ? ('style="background-image:url(' . htmlspecialchars($__compilerVar14['thumbnailUrl'], ENT_QUOTES, 'UTF-8') . ')"') : ('')) . '>
		';
if (!empty($__compilerVar14['thumbnailUrl']))
{
$__compilerVar15 .= '
			<img src="' . htmlspecialchars($__compilerVar14['thumbnailUrl'], ENT_QUOTES, 'UTF-8') . '" alt="" class="img" />
		';
}
$__compilerVar15 .= '
		';
if (!empty($__compilerVar14['is_animated']))
{
$__compilerVar15 .= '<i class="icon gif"></i>';
}
$__compilerVar15 .= '
		';
if (isset($__compilerVar14['content_type']) && $__compilerVar14['content_type'] == ('video'))
{
$__compilerVar15 .= '<i class="icon video"></i>';
}
$__compilerVar15 .= '
	</div>
	<div class="progress" style="display: none;">
		<div class="gauge">
			<span class="meter">&nbsp;</span>
			<span class="text">&nbsp;</span>
		</div>
	</div>
	';
if (!empty($__compilerVar14['content_data_id']))
{
$__compilerVar15 .= '
		<div class="description">
			<input type="text" placeholder="' . 'Title' . '..." value="' . (($__compilerVar14['title'] AND $__compilerVar14['title'] != $__compilerVar14['content_id']) ? (htmlspecialchars($__compilerVar14['title'], ENT_QUOTES, 'UTF-8')) : ('')) . '" name="content_title[' . htmlspecialchars($__compilerVar14['content_data_id'], ENT_QUOTES, 'UTF-8') . ']" class="textCtrl title">
		</div>
		<div class="description">
			<textarea name="content_description[' . htmlspecialchars($__compilerVar14['content_data_id'], ENT_QUOTES, 'UTF-8') . ']" class="textCtrl" 
				cols="20" rows="2" placeholder="' . 'Description' . '" >' . htmlspecialchars($__compilerVar14['description'], ENT_QUOTES, 'UTF-8') . '</textarea>			
			<input placeholder="' . 'Who was with you?' . '" type="text" value="' . ((!empty($__compilerVar14['content_people'])) ? (htmlspecialchars($__compilerVar14['content_people'], ENT_QUOTES, 'UTF-8')) : ('')) . '" name="content_people[' . htmlspecialchars($__compilerVar14['content_data_id'], ENT_QUOTES, 'UTF-8') . ']" class="textCtrl people AutoComplete" ' . ((empty($__compilerVar14['content_people'])) ? ('style="display:none;"') : ('')) . ' />
			
			';
if (!$xenOptions['sonnb_XG_disableLocation'])
{
$__compilerVar15 .= '
				<input placeholder="' . 'Where is this?' . '" type="text" value="' . htmlspecialchars($__compilerVar14['content_location'], ENT_QUOTES, 'UTF-8') . '" name="content_location[' . htmlspecialchars($__compilerVar14['content_data_id'], ENT_QUOTES, 'UTF-8') . ']" class="textCtrl location" ' . ((!$__compilerVar14['content_location']) ? ('style="display:none;"') : ('')) . '/>
				<input type="hidden" class="location_lat" name="location_lat[' . htmlspecialchars($__compilerVar14['content_data_id'], ENT_QUOTES, 'UTF-8') . ']" value="' . ((isset($__compilerVar14['location_lat'])) ? (htmlspecialchars($__compilerVar14['location_lat'], ENT_QUOTES, 'UTF-8')) : ('')) . '" autocomplete="off" />
				<input type="hidden" class="location_lng" name="location_lng[' . htmlspecialchars($__compilerVar14['content_data_id'], ENT_QUOTES, 'UTF-8') . ']" value="' . ((isset($__compilerVar14['location_lat'])) ? (htmlspecialchars($__compilerVar14['location_lng'], ENT_QUOTES, 'UTF-8')) : ('')) . '" autocomplete="off" />
			';
}
$__compilerVar15 .= '

			<input type="hidden" name="video_key[' . htmlspecialchars($__compilerVar14['content_data_id'], ENT_QUOTES, 'UTF-8') . ']" value="' . (($__compilerVar14['video_key']) ? (htmlspecialchars($__compilerVar14['video_key'], ENT_QUOTES, 'UTF-8')) : ('')) . '" autocomplete="off" />
			<input type="hidden" name="video_type[' . htmlspecialchars($__compilerVar14['content_data_id'], ENT_QUOTES, 'UTF-8') . ']" value="' . (($__compilerVar14['video_type']) ? (htmlspecialchars($__compilerVar14['video_type'], ENT_QUOTES, 'UTF-8')) : ('')) . '" autocomplete="off" />
			<input type="hidden" name="content_type[' . htmlspecialchars($__compilerVar14['content_data_id'], ENT_QUOTES, 'UTF-8') . ']" value="' . htmlspecialchars($__compilerVar14['content_type'], ENT_QUOTES, 'UTF-8') . '" autocomplete="off" />
			<input type="hidden" name="delete[]" id="delete_' . htmlspecialchars($__compilerVar14['content_data_id'], ENT_QUOTES, 'UTF-8') . '" value="" autocomplete="off" />
			<input type="radio" class="cover" name="cover_content_id" value="' . ((isset($__compilerVar14['content_id'])) ? ('c' . htmlspecialchars($__compilerVar14['content_id'], ENT_QUOTES, 'UTF-8')) : ('d' . htmlspecialchars($__compilerVar14['content_data_id'], ENT_QUOTES, 'UTF-8'))) . '" ' . ((!empty($__compilerVar14['content_id']) && $album['cover_content_id'] === $__compilerVar14['content_id']) ? ' checked="checked"' : '') . ' autocomplete="off" />
			<input type="radio" class="coverType" name="cover_content_type" value="' . htmlspecialchars($__compilerVar14['content_type'], ENT_QUOTES, 'UTF-8') . '" ' . ((!empty($__compilerVar14['content_id']) && $album['cover_content_id'] === $__compilerVar14['content_id']) ? ' checked="checked"' : '') . ' autocomplete="off" />
		</div>
	';
}
$__compilerVar15 .= '
	<div class="controls">
		<div class="inner">
			<span class="metaIcon peopleIcon ' . ((!empty($__compilerVar14['content_people'])) ? ('active') : ('')) . '" title="' . 'Tag People' . '"></span>
			';
if (!$xenOptions['sonnb_XG_disableLocation'])
{
$__compilerVar15 .= '
				<span class="metaIcon placeIcon ' . ((!empty($__compilerVar14['content_location'])) ? ('active') : ('')) . '" title="' . 'Location' . '"></span>
			';
}
$__compilerVar15 .= '
			<span class="metaIcon coverIcon ' . ((!empty($__compilerVar14['content_id']) && $album['cover_content_id'] == $__compilerVar14['content_id']) ? ('active') : ('')) . '" title="' . 'Set this as album cover' . '"></span>
			<span class="delete" title="' . 'Delete' . '" data-content="' . ((!empty($__compilerVar14['content_data_id'])) ? (htmlspecialchars($__compilerVar14['content_data_id'], ENT_QUOTES, 'UTF-8')) : ('')) . '"></span>
		</div>
	</div>
</li>';
$__compilerVar12 .= $__compilerVar15;
unset($__compilerVar13, $__compilerVar14, $__compilerVar15);
$__compilerVar12 .= '
	
			';
if ($contents)
{
$__compilerVar12 .= '
				';
foreach ($contents AS $content)
{
$__compilerVar12 .= '
					';
$__compilerVar16 = '';
$this->addRequiredExternal('css', 'sonnb_xengallery_upload');
$__compilerVar16 .= '

<li id="' . (($isTemplate) ? ('AttachedContentTemplate') : ('content' . htmlspecialchars($content['content_data_id'], ENT_QUOTES, 'UTF-8'))) . '" class="AttachedContent">
	<div class="Thumbnail" ' . ((!empty($content['thumbnailUrl'])) ? ('style="background-image:url(' . htmlspecialchars($content['thumbnailUrl'], ENT_QUOTES, 'UTF-8') . ')"') : ('')) . '>
		';
if (!empty($content['thumbnailUrl']))
{
$__compilerVar16 .= '
			<img src="' . htmlspecialchars($content['thumbnailUrl'], ENT_QUOTES, 'UTF-8') . '" alt="" class="img" />
		';
}
$__compilerVar16 .= '
		';
if (!empty($content['is_animated']))
{
$__compilerVar16 .= '<i class="icon gif"></i>';
}
$__compilerVar16 .= '
		';
if (isset($content['content_type']) && $content['content_type'] == ('video'))
{
$__compilerVar16 .= '<i class="icon video"></i>';
}
$__compilerVar16 .= '
	</div>
	<div class="progress" style="display: none;">
		<div class="gauge">
			<span class="meter">&nbsp;</span>
			<span class="text">&nbsp;</span>
		</div>
	</div>
	';
if (!empty($content['content_data_id']))
{
$__compilerVar16 .= '
		<div class="description">
			<input type="text" placeholder="' . 'Title' . '..." value="' . (($content['title'] AND $content['title'] != $content['content_id']) ? (htmlspecialchars($content['title'], ENT_QUOTES, 'UTF-8')) : ('')) . '" name="content_title[' . htmlspecialchars($content['content_data_id'], ENT_QUOTES, 'UTF-8') . ']" class="textCtrl title">
		</div>
		<div class="description">
			<textarea name="content_description[' . htmlspecialchars($content['content_data_id'], ENT_QUOTES, 'UTF-8') . ']" class="textCtrl" 
				cols="20" rows="2" placeholder="' . 'Description' . '" >' . htmlspecialchars($content['description'], ENT_QUOTES, 'UTF-8') . '</textarea>			
			<input placeholder="' . 'Who was with you?' . '" type="text" value="' . ((!empty($content['content_people'])) ? (htmlspecialchars($content['content_people'], ENT_QUOTES, 'UTF-8')) : ('')) . '" name="content_people[' . htmlspecialchars($content['content_data_id'], ENT_QUOTES, 'UTF-8') . ']" class="textCtrl people AutoComplete" ' . ((empty($content['content_people'])) ? ('style="display:none;"') : ('')) . ' />
			
			';
if (!$xenOptions['sonnb_XG_disableLocation'])
{
$__compilerVar16 .= '
				<input placeholder="' . 'Where is this?' . '" type="text" value="' . htmlspecialchars($content['content_location'], ENT_QUOTES, 'UTF-8') . '" name="content_location[' . htmlspecialchars($content['content_data_id'], ENT_QUOTES, 'UTF-8') . ']" class="textCtrl location" ' . ((!$content['content_location']) ? ('style="display:none;"') : ('')) . '/>
				<input type="hidden" class="location_lat" name="location_lat[' . htmlspecialchars($content['content_data_id'], ENT_QUOTES, 'UTF-8') . ']" value="' . ((isset($content['location_lat'])) ? (htmlspecialchars($content['location_lat'], ENT_QUOTES, 'UTF-8')) : ('')) . '" autocomplete="off" />
				<input type="hidden" class="location_lng" name="location_lng[' . htmlspecialchars($content['content_data_id'], ENT_QUOTES, 'UTF-8') . ']" value="' . ((isset($content['location_lat'])) ? (htmlspecialchars($content['location_lng'], ENT_QUOTES, 'UTF-8')) : ('')) . '" autocomplete="off" />
			';
}
$__compilerVar16 .= '

			<input type="hidden" name="video_key[' . htmlspecialchars($content['content_data_id'], ENT_QUOTES, 'UTF-8') . ']" value="' . (($content['video_key']) ? (htmlspecialchars($content['video_key'], ENT_QUOTES, 'UTF-8')) : ('')) . '" autocomplete="off" />
			<input type="hidden" name="video_type[' . htmlspecialchars($content['content_data_id'], ENT_QUOTES, 'UTF-8') . ']" value="' . (($content['video_type']) ? (htmlspecialchars($content['video_type'], ENT_QUOTES, 'UTF-8')) : ('')) . '" autocomplete="off" />
			<input type="hidden" name="content_type[' . htmlspecialchars($content['content_data_id'], ENT_QUOTES, 'UTF-8') . ']" value="' . htmlspecialchars($content['content_type'], ENT_QUOTES, 'UTF-8') . '" autocomplete="off" />
			<input type="hidden" name="delete[]" id="delete_' . htmlspecialchars($content['content_data_id'], ENT_QUOTES, 'UTF-8') . '" value="" autocomplete="off" />
			<input type="radio" class="cover" name="cover_content_id" value="' . ((isset($content['content_id'])) ? ('c' . htmlspecialchars($content['content_id'], ENT_QUOTES, 'UTF-8')) : ('d' . htmlspecialchars($content['content_data_id'], ENT_QUOTES, 'UTF-8'))) . '" ' . ((!empty($content['content_id']) && $album['cover_content_id'] === $content['content_id']) ? ' checked="checked"' : '') . ' autocomplete="off" />
			<input type="radio" class="coverType" name="cover_content_type" value="' . htmlspecialchars($content['content_type'], ENT_QUOTES, 'UTF-8') . '" ' . ((!empty($content['content_id']) && $album['cover_content_id'] === $content['content_id']) ? ' checked="checked"' : '') . ' autocomplete="off" />
		</div>
	';
}
$__compilerVar16 .= '
	<div class="controls">
		<div class="inner">
			<span class="metaIcon peopleIcon ' . ((!empty($content['content_people'])) ? ('active') : ('')) . '" title="' . 'Tag People' . '"></span>
			';
if (!$xenOptions['sonnb_XG_disableLocation'])
{
$__compilerVar16 .= '
				<span class="metaIcon placeIcon ' . ((!empty($content['content_location'])) ? ('active') : ('')) . '" title="' . 'Location' . '"></span>
			';
}
$__compilerVar16 .= '
			<span class="metaIcon coverIcon ' . ((!empty($content['content_id']) && $album['cover_content_id'] == $content['content_id']) ? ('active') : ('')) . '" title="' . 'Set this as album cover' . '"></span>
			<span class="delete" title="' . 'Delete' . '" data-content="' . ((!empty($content['content_data_id'])) ? (htmlspecialchars($content['content_data_id'], ENT_QUOTES, 'UTF-8')) : ('')) . '"></span>
		</div>
	</div>
</li>';
$__compilerVar12 .= $__compilerVar16;
unset($__compilerVar16);
$__compilerVar12 .= '
				';
}
$__compilerVar12 .= '
			';
}
$__compilerVar12 .= '
		</ol>
		
		<input type="hidden" name="content_data_hash" value="' . htmlspecialchars($contentDataParams['hash'], ENT_QUOTES, 'UTF-8') . '" />
	</div>
	
';
}
$__compilerVar1 .= $__compilerVar12;
unset($__compilerVar12);
$__compilerVar1 .= '</dd>
				</dl>
			';
}
$__compilerVar1 .= '
			';
if (!$contents)
{
$__compilerVar1 .= '
				<dl class="ctrlUnit fullWidth" id="noContent" style="height: 200px; text-align:center;" >
					<dt></dt>
					<dd>
						<div style="margin-top: 80px;">' . 'Click "Upload Photos" and select your photos to start uploading.' . '</div>
					</dd>
				</dl>
			';
}
$__compilerVar1 .= '
			</fieldset>
		
			';
if ($album['album_id'])
{
$__compilerVar1 .= '
				<div class="pageNavLinkGroup xengallery">
					' . XenForo_Template_Helper_Core::callHelper('pagenavhtml', array('public', htmlspecialchars($perPage, ENT_QUOTES, 'UTF-8'), htmlspecialchars($totalPhotos, ENT_QUOTES, 'UTF-8'), htmlspecialchars($page, ENT_QUOTES, 'UTF-8'), 'gallery/albums/edit', $album, $pageNavParams, false, array())) . '
				</div>
			';
}
$__compilerVar1 .= '
		';
}
$__compilerVar1 .= '

		<dl class="ctrlUnit submitUnit">
			<dt></dt>
			<dd>
				<input type="submit" value="' . 'Save' . '" accesskey="s" class="button primary" />
				
				';
if ($album['album_id'] || (!$album['album_id'] && !$xenOptions['sonnbXG_disableCreationUpload']))
{
$__compilerVar1 .= '
					';
$__compilerVar17 = '';
if ($photoDataConstraints)
{
$__compilerVar17 .= '

	';
$this->addRequiredExternal('css', 'sonnb_xengallery_upload');
$__compilerVar17 .= '
	';
$this->addRequiredExternal('js', 'js/sonnb/XenGallery/gallery.contentuploader.js');
$__compilerVar17 .= '
	';
if ($xenOptions['swfUpload'])
{
$__compilerVar17 .= '
		';
$this->addRequiredExternal('js', 'js/swfupload/swfupload.min.js');
$__compilerVar17 .= '
	';
}
$__compilerVar17 .= '	

	<span id="PhotoUploader" class="buttonProxy ContentUploader"
		style="display: none"
		data-placeholder="#PhotoUploadPlaceHolder"
		data-trigger="#ctrl_photo_uploader"
		data-postname="upload"
		data-maxfilesize="' . htmlspecialchars($photoDataConstraints['size'], ENT_QUOTES, 'UTF-8') . '"
		data-maxuploads="' . htmlspecialchars($photoDataConstraints['count'], ENT_QUOTES, 'UTF-8') . '"
		data-extensions="' . XenForo_Template_Helper_Core::callHelper('implode', array(
'0' => $photoDataConstraints['extensions'],
'1' => ','
)) . '"
		data-action="' . XenForo_Template_Helper_Core::link('full:gallery/photos/do-upload.json', '', array(
'_params' => $contentDataParams
)) . '"
		data-err-110="' . 'The uploaded file is too large.' . '"
		data-err-120="' . 'The uploaded file is empty.' . '"
		data-err-130="' . 'The uploaded file does not have an allowed extension.' . '"
		data-maxfileupload="100"
		data-error-maxfileupload="' . 'You only can upload ' . '100' . ' contents at a time.' . '"
		data-err-unknown="' . 'There was a problem uploading your file.' . '">
		
		<span id="PhotoUploadPlaceHolder"></span>		
			
		<input type="button" value="' . 'Upload Photos' . '"
			id="ctrl_photo_uploader" class="button OverlayTrigger DisableOnSubmit"
			data-href="' . XenForo_Template_Helper_Core::link('full:gallery/photos/upload', '', array(
'_params' => $contentDataParams
)) . '"
			data-hider="#PhotoUploader" />
		<span class="HiddenInput" data-name="_xfSessionId" data-value="' . htmlspecialchars($sessionId, ENT_QUOTES, 'UTF-8') . '"></span>
	</span>

	<noscript>
		<a href="' . XenForo_Template_Helper_Core::link('gallery/photos/upload', '', array(
'_params' => $contentDataParams
)) . '" class="button" target="_blank">' . 'Upload Photos' . '</a>
	</noscript>

';
}
$__compilerVar1 .= $__compilerVar17;
unset($__compilerVar17);
$__compilerVar1 .= '
					';
if ($canEmbedVideos)
{
$__compilerVar1 .= '
						';
$__compilerVar18 = '';
$__compilerVar18 .= '<input type="button" value="' . 'Embed Videos' . '"
	id="ctrl_video_embed" class="button OverlayTrigger DisableOnSubmit" data-cacheOverlay="false"
	data-href="' . XenForo_Template_Helper_Core::link('full:gallery/videos/embed', '', array(
'_params' => $contentDataParams
)) . '"
	data-maxfileupload="100"
	data-error-maxfileupload="' . 'You only can upload ' . '100' . ' contents at a time.' . '" />';
$__compilerVar1 .= $__compilerVar18;
unset($__compilerVar18);
$__compilerVar1 .= '
					';
}
$__compilerVar1 .= '
				';
}
$__compilerVar1 .= '
			</dd>
		</dl>
	';
$__output .= $this->callTemplateHook('album_create', $__compilerVar1, array());
unset($__compilerVar1);
$__output .= '

	';
if (!$disableLocation)
{
$__output .= '
		<input type="hidden" name="album_location_lat" value="" />
		<input type="hidden" name="album_location_lng" value="" />
	';
}
$__output .= '
	<input type="hidden" name="_xfToken" value="' . htmlspecialchars($visitor['csrf_token_page'], ENT_QUOTES, 'UTF-8') . '" />
</form>
';
$__compilerVar19 = '';
$__output .= $this->callTemplateHook('sonnb_cr_information', $__compilerVar19, array());
unset($__compilerVar19);
$__output .= '

';
if (!$disableLocation)
{
$__output .= '
	<script type="text/javascript">
	!function($, window, document, _undefined) {
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
		
		$(\'input.location\').each(function(){
			var $self = $(this);
			$self.geocomplete().bind("geocode:result", function(event, results){
				event.preventDefault();

				if (results.geometry.location.lat())
				{
					$self.parents(\'li.AttachedContent\').find(\'input.location_lat\').val(results.geometry.location.lat());
				}
				if (results.geometry.location.lng())
				{
					$self.parents(\'li.AttachedContent\').find(\'input.location_lng\').val(results.geometry.location.lng());
				}
				
				return false;
			});
		});
	}(jQuery, this, document);
	</script>
';
}
