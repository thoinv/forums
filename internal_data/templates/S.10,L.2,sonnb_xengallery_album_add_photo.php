<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__extraData['title'] = '';
$__extraData['title'] .= 'Add photos to the album: ' . htmlspecialchars($album['title'], ENT_QUOTES, 'UTF-8') . '';
$__output .= '
';
$__extraData['pageDescription'] = array(
'class' => 'baseHtml'
);
$__extraData['pageDescription']['content'] = '';
$__extraData['pageDescription']['content'] .= $album['description'];
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
';
$this->addRequiredExternal('js', 'js/sonnb/XenGallery/jquery.masonry.min.js');
$__output .= '
';
$this->addRequiredExternal('js', 'js/sonnb/XenGallery/modernizr.min.js');
$__output .= '

<form action="' . XenForo_Template_Helper_Core::link('gallery/albums/add-photo', $album, array()) . '" method="post"
	class="xenForm AutoValidator" data-redirect="on">
	
	';
if ($xenOptions['sonnbXG_showPrivacyOnUpload'])
{
$__output .= '
		<h3 class="sectionHeader">' . 'Privacy For New Photos' . '</h3>
		';
$__compilerVar10 = '';
$__compilerVar10 .= 'photo';
$__compilerVar11 = '';
$this->addRequiredExternal('css', 'sonnb_xengallery_helper_album_privacy');
$__compilerVar11 .= '
';
$this->addRequiredExternal('js', 'js/sonnb/XenGallery/gallery.privacyeditor.js');
$__compilerVar11 .= '

<dl class="ctrlUnit">
	<dt>' . 'Who can view' . ':</dt>
	<dd>
		<select name="' . htmlspecialchars($__compilerVar10, ENT_QUOTES, 'UTF-8') . '_allow_view" id="ctrl_' . htmlspecialchars($__compilerVar10, ENT_QUOTES, 'UTF-8') . '_allow_view" class="textCtrl xenGalleryCtrl">
			<option value="everyone" ' . (($photoPrivacy['allow_view'] == ('everyone')) ? ' selected="selected"' : '') . '>' . 'Everyone' . '</option>
			<option value="members" ' . (($photoPrivacy['allow_view'] == ('members')) ? ' selected="selected"' : '') . '>' . 'Registered Users' . '</option>
			<option value="followed" ' . (($photoPrivacy['allow_view'] == ('followed')) ? ' selected="selected"' : '') . '>' . 'People I Followed' . '</option>
			<option value="following" ' . (($photoPrivacy['allow_view'] == ('following')) ? ' selected="selected"' : '') . '>' . 'People Following Me' . '</option>
			<option value="custom" ' . (($photoPrivacy['allow_view'] == ('custom')) ? ' selected="selected"' : '') . '>' . 'Custom' . '</option>
			<option value="none" ' . (($photoPrivacy['allow_view'] == ('none')) ? ' selected="selected"' : '') . '>' . 'Only Me' . '</option>
		</select>
		<input type="text" name="' . htmlspecialchars($__compilerVar10, ENT_QUOTES, 'UTF-8') . '_allow_view_username" value="" id="ctrl_' . htmlspecialchars($__compilerVar10, ENT_QUOTES, 'UTF-8') . '_allow_view_username" class="textCtrl xenGalleryCtrl AutoComplete" ' . (($photoPrivacy['allow_view'] != ('custom')) ? ('style="display:none;"') : ('')) . ' />			
		<p class="explain xenGalleryCtrl" ' . (($photoPrivacy['allow_view'] != ('custom')) ? ('style="display:none;"') : ('')) . '>' . 'Dãn cách tên bằng dấu phẩy(,).' . '</p>
	</dd>
</dl>
<dl class="ctrlUnit">
	<dt>' . 'Who can comment' . ':</dt>
	<dd>
		<select name="' . htmlspecialchars($__compilerVar10, ENT_QUOTES, 'UTF-8') . '_allow_comment" id="ctrl_' . htmlspecialchars($__compilerVar10, ENT_QUOTES, 'UTF-8') . '_allow_comment" class="textCtrl xenGalleryCtrl">
			<option value="everyone" ' . (($photoPrivacy['allow_comment'] == ('everyone')) ? ' selected="selected"' : '') . '>' . 'Everyone' . '</option>
			<option value="members" ' . (($photoPrivacy['allow_comment'] == ('members')) ? ' selected="selected"' : '') . '>' . 'Registered Users' . '</option>
			<option value="followed" ' . (($photoPrivacy['allow_comment'] == ('followed')) ? ' selected="selected"' : '') . '>' . 'People I Followed' . '</option>
			<option value="following" ' . (($photoPrivacy['allow_comment'] == ('following')) ? ' selected="selected"' : '') . '>' . 'People Following Me' . '</option>
			<option value="custom" ' . (($photoPrivacy['allow_comment'] == ('custom')) ? ' selected="selected"' : '') . '>' . 'Custom' . '</option>
			<option value="none" ' . (($photoPrivacy['allow_comment'] == ('none')) ? ' selected="selected"' : '') . '>' . 'Only Me' . '</option>
		</select>
		<input type="text" name="' . htmlspecialchars($__compilerVar10, ENT_QUOTES, 'UTF-8') . '_allow_comment_username" value="" id="ctrl_' . htmlspecialchars($__compilerVar10, ENT_QUOTES, 'UTF-8') . '_allow_comment_username" class="textCtrl xenGalleryCtrl AutoComplete" ' . (($photoPrivacy['allow_comment'] != ('custom')) ? ('style="display:none;"') : ('')) . ' />	
		<p class="explain xenGalleryCtrl" ' . (($photoPrivacy['allow_comment'] != ('custom')) ? ('style="display:none;"') : ('')) . '>' . 'Dãn cách tên bằng dấu phẩy(,).' . '</p>
	</dd>
</dl>';
$__output .= $__compilerVar11;
unset($__compilerVar10, $__compilerVar11);
$__output .= '
	';
}
$__output .= '
	
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
			<span class="delete" title="' . 'Xóa' . '" data-content="' . ((!empty($__compilerVar14['content_data_id'])) ? (htmlspecialchars($__compilerVar14['content_data_id'], ENT_QUOTES, 'UTF-8')) : ('')) . '"></span>
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
			<span class="delete" title="' . 'Xóa' . '" data-content="' . ((!empty($content['content_data_id'])) ? (htmlspecialchars($content['content_data_id'], ENT_QUOTES, 'UTF-8')) : ('')) . '"></span>
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
$__output .= $__compilerVar12;
unset($__compilerVar12);
$__output .= '</dd>
	</dl>
	<dl class="ctrlUnit fullWidth" id="noContent" style="height: 200px; text-align:center;" >
		<dt></dt>
		<dd>
			<div style="margin-top: 80px;">' . 'Click "Upload Photos" and select your photos to start uploading.' . '</div>
		</dd>
	</dl>

	<dl class="ctrlUnit submitUnit">
		<dt></dt>
		<dd>
			<input type="submit" value="' . 'Lưu' . '" accesskey="s" class="button primary" />
			';
$__compilerVar17 = '';
if ($contentDataConstraints)
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
		data-maxfilesize="' . htmlspecialchars($contentDataConstraints['size'], ENT_QUOTES, 'UTF-8') . '"
		data-maxuploads="' . htmlspecialchars($contentDataConstraints['count'], ENT_QUOTES, 'UTF-8') . '"
		data-extensions="' . XenForo_Template_Helper_Core::callHelper('implode', array(
'0' => $contentDataConstraints['extensions'],
'1' => ','
)) . '"
		data-action="' . XenForo_Template_Helper_Core::link('full:gallery/photos/do-upload.json', '', array(
'_params' => $contentDataParams
)) . '"
		data-err-110="' . 'File đã tải lên lớn hơn so với quy định.' . '"
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
$__output .= $__compilerVar17;
unset($__compilerVar17);
$__output .= '
		</dd>
	</dl>
</form>
';
$__compilerVar18 = '';
$__output .= $this->callTemplateHook('sonnb_cr_information', $__compilerVar18, array());
unset($__compilerVar18);
$__output .= '

<script type="text/javascript">
!function($, window, document, _undefined) {	
	$(\'input.location\').each(function(){
		var $self = $(this);
		$self.geocomplete().bind("geocode:result", function(event, results){
			if (results.geometry.location.kb)
			{
				$self.parents(\'li.AttachedContent\').find(\'input.location_lat\').val(results.geometry.location.kb);
			}
			if (results.geometry.location.lb)
			{
				$self.parents(\'li.AttachedContent\').find(\'input.location_lng\').val(results.geometry.location.lb);
			}
			
			return false;
			event.preventDefault();
		});
	});
}(jQuery, this, document);
</script>';
