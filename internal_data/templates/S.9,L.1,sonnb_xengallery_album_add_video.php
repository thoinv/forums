<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__extraData['title'] = '';
$__extraData['title'] .= 'Add videos to the album: ' . htmlspecialchars($album['title'], ENT_QUOTES, 'UTF-8') . '';
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

<form action="' . XenForo_Template_Helper_Core::link('gallery/albums/add-video', $album, array()) . '" method="post"
	class="xenForm AutoValidator" data-redirect="on">
	
	';
if ($xenOptions['sonnbXG_showPrivacyOnUpload'])
{
$__output .= '
		<h3 class="sectionHeader">' . 'Privacy For New Videos' . '</h3>
		';
$__compilerVar1 = '';
$__compilerVar1 .= 'video';
$__compilerVar2 = '';
$this->addRequiredExternal('css', 'sonnb_xengallery_helper_album_privacy');
$__compilerVar2 .= '
';
$this->addRequiredExternal('js', 'js/sonnb/XenGallery/gallery.privacyeditor.js');
$__compilerVar2 .= '

<dl class="ctrlUnit">
	<dt>' . 'Who can view' . ':</dt>
	<dd>
		<select name="' . htmlspecialchars($__compilerVar1, ENT_QUOTES, 'UTF-8') . '_allow_view" id="ctrl_' . htmlspecialchars($__compilerVar1, ENT_QUOTES, 'UTF-8') . '_allow_view" class="textCtrl xenGalleryCtrl">
			<option value="everyone" ' . (($videoPrivacy['allow_view'] == ('everyone')) ? ' selected="selected"' : '') . '>' . 'Everyone' . '</option>
			<option value="members" ' . (($videoPrivacy['allow_view'] == ('members')) ? ' selected="selected"' : '') . '>' . 'Registered Users' . '</option>
			<option value="followed" ' . (($videoPrivacy['allow_view'] == ('followed')) ? ' selected="selected"' : '') . '>' . 'People I Followed' . '</option>
			<option value="following" ' . (($videoPrivacy['allow_view'] == ('following')) ? ' selected="selected"' : '') . '>' . 'People Following Me' . '</option>
			<option value="custom" ' . (($videoPrivacy['allow_view'] == ('custom')) ? ' selected="selected"' : '') . '>' . 'Custom' . '</option>
			<option value="none" ' . (($videoPrivacy['allow_view'] == ('none')) ? ' selected="selected"' : '') . '>' . 'Only Me' . '</option>
		</select>
		<input type="text" name="' . htmlspecialchars($__compilerVar1, ENT_QUOTES, 'UTF-8') . '_allow_view_username" value="" id="ctrl_' . htmlspecialchars($__compilerVar1, ENT_QUOTES, 'UTF-8') . '_allow_view_username" class="textCtrl xenGalleryCtrl AutoComplete" ' . (($videoPrivacy['allow_view'] != ('custom')) ? ('style="display:none;"') : ('')) . ' />			
		<p class="explain xenGalleryCtrl" ' . (($videoPrivacy['allow_view'] != ('custom')) ? ('style="display:none;"') : ('')) . '>' . 'Separate names with a comma.' . '</p>
	</dd>
</dl>
<dl class="ctrlUnit">
	<dt>' . 'Who can comment' . ':</dt>
	<dd>
		<select name="' . htmlspecialchars($__compilerVar1, ENT_QUOTES, 'UTF-8') . '_allow_comment" id="ctrl_' . htmlspecialchars($__compilerVar1, ENT_QUOTES, 'UTF-8') . '_allow_comment" class="textCtrl xenGalleryCtrl">
			<option value="everyone" ' . (($videoPrivacy['allow_comment'] == ('everyone')) ? ' selected="selected"' : '') . '>' . 'Everyone' . '</option>
			<option value="members" ' . (($videoPrivacy['allow_comment'] == ('members')) ? ' selected="selected"' : '') . '>' . 'Registered Users' . '</option>
			<option value="followed" ' . (($videoPrivacy['allow_comment'] == ('followed')) ? ' selected="selected"' : '') . '>' . 'People I Followed' . '</option>
			<option value="following" ' . (($videoPrivacy['allow_comment'] == ('following')) ? ' selected="selected"' : '') . '>' . 'People Following Me' . '</option>
			<option value="custom" ' . (($videoPrivacy['allow_comment'] == ('custom')) ? ' selected="selected"' : '') . '>' . 'Custom' . '</option>
			<option value="none" ' . (($videoPrivacy['allow_comment'] == ('none')) ? ' selected="selected"' : '') . '>' . 'Only Me' . '</option>
		</select>
		<input type="text" name="' . htmlspecialchars($__compilerVar1, ENT_QUOTES, 'UTF-8') . '_allow_comment_username" value="" id="ctrl_' . htmlspecialchars($__compilerVar1, ENT_QUOTES, 'UTF-8') . '_allow_comment_username" class="textCtrl xenGalleryCtrl AutoComplete" ' . (($videoPrivacy['allow_comment'] != ('custom')) ? ('style="display:none;"') : ('')) . ' />	
		<p class="explain xenGalleryCtrl" ' . (($videoPrivacy['allow_comment'] != ('custom')) ? ('style="display:none;"') : ('')) . '>' . 'Separate names with a comma.' . '</p>
	</dd>
</dl>';
$__output .= $__compilerVar2;
unset($__compilerVar1, $__compilerVar2);
$__output .= '
	';
}
$__output .= '
	
	<dl class="ctrlUnit fullWidth">
		<dt></dt>
		<dd>';
$__compilerVar3 = '';
if ($contentDataParams)
{
$__compilerVar3 .= '

	';
$this->addRequiredExternal('js', 'js/xenforo/attachment_editor.js');
$__compilerVar3 .= '
	';
$this->addRequiredExternal('js', 'js/sonnb/XenGallery/gallery.contentuploader.js');
$__compilerVar3 .= '
	';
$this->addRequiredExternal('css', 'sonnb_xengallery_upload');
$__compilerVar3 .= '
	
	<div class="ContentEditor">		
		<div class="NoContents"></div>
	
		<ol class="ContentList Existing">
			';
$__compilerVar4 = '';
$__compilerVar4 .= '1';
$__compilerVar5 = '';
$__compilerVar6 = '';
$this->addRequiredExternal('css', 'sonnb_xengallery_upload');
$__compilerVar6 .= '

<li id="' . (($__compilerVar4) ? ('AttachedContentTemplate') : ('content' . htmlspecialchars($__compilerVar5['content_data_id'], ENT_QUOTES, 'UTF-8'))) . '" class="AttachedContent">
	<div class="Thumbnail" ' . ((!empty($__compilerVar5['thumbnailUrl'])) ? ('style="background-image:url(' . htmlspecialchars($__compilerVar5['thumbnailUrl'], ENT_QUOTES, 'UTF-8') . ')"') : ('')) . '>
		';
if (!empty($__compilerVar5['thumbnailUrl']))
{
$__compilerVar6 .= '
			<img src="' . htmlspecialchars($__compilerVar5['thumbnailUrl'], ENT_QUOTES, 'UTF-8') . '" alt="" class="img" />
		';
}
$__compilerVar6 .= '
		';
if (!empty($__compilerVar5['is_animated']))
{
$__compilerVar6 .= '<i class="icon gif"></i>';
}
$__compilerVar6 .= '
		';
if (isset($__compilerVar5['content_type']) && $__compilerVar5['content_type'] == ('video'))
{
$__compilerVar6 .= '<i class="icon video"></i>';
}
$__compilerVar6 .= '
	</div>
	<div class="progress" style="display: none;">
		<div class="gauge">
			<span class="meter">&nbsp;</span>
			<span class="text">&nbsp;</span>
		</div>
	</div>
	';
if (!empty($__compilerVar5['content_data_id']))
{
$__compilerVar6 .= '
		<div class="description">
			<input type="text" placeholder="' . 'Title' . '..." value="' . (($__compilerVar5['title'] AND $__compilerVar5['title'] != $__compilerVar5['content_id']) ? (htmlspecialchars($__compilerVar5['title'], ENT_QUOTES, 'UTF-8')) : ('')) . '" name="content_title[' . htmlspecialchars($__compilerVar5['content_data_id'], ENT_QUOTES, 'UTF-8') . ']" class="textCtrl title">
		</div>
		<div class="description">
			<textarea name="content_description[' . htmlspecialchars($__compilerVar5['content_data_id'], ENT_QUOTES, 'UTF-8') . ']" class="textCtrl" 
				cols="20" rows="2" placeholder="' . 'Description' . '" >' . htmlspecialchars($__compilerVar5['description'], ENT_QUOTES, 'UTF-8') . '</textarea>			
			<input placeholder="' . 'Who was with you?' . '" type="text" value="' . ((!empty($__compilerVar5['content_people'])) ? (htmlspecialchars($__compilerVar5['content_people'], ENT_QUOTES, 'UTF-8')) : ('')) . '" name="content_people[' . htmlspecialchars($__compilerVar5['content_data_id'], ENT_QUOTES, 'UTF-8') . ']" class="textCtrl people AutoComplete" ' . ((empty($__compilerVar5['content_people'])) ? ('style="display:none;"') : ('')) . ' />
			
			';
if (!$xenOptions['sonnb_XG_disableLocation'])
{
$__compilerVar6 .= '
				<input placeholder="' . 'Where is this?' . '" type="text" value="' . htmlspecialchars($__compilerVar5['content_location'], ENT_QUOTES, 'UTF-8') . '" name="content_location[' . htmlspecialchars($__compilerVar5['content_data_id'], ENT_QUOTES, 'UTF-8') . ']" class="textCtrl location" ' . ((!$__compilerVar5['content_location']) ? ('style="display:none;"') : ('')) . '/>
				<input type="hidden" class="location_lat" name="location_lat[' . htmlspecialchars($__compilerVar5['content_data_id'], ENT_QUOTES, 'UTF-8') . ']" value="' . ((isset($__compilerVar5['location_lat'])) ? (htmlspecialchars($__compilerVar5['location_lat'], ENT_QUOTES, 'UTF-8')) : ('')) . '" autocomplete="off" />
				<input type="hidden" class="location_lng" name="location_lng[' . htmlspecialchars($__compilerVar5['content_data_id'], ENT_QUOTES, 'UTF-8') . ']" value="' . ((isset($__compilerVar5['location_lat'])) ? (htmlspecialchars($__compilerVar5['location_lng'], ENT_QUOTES, 'UTF-8')) : ('')) . '" autocomplete="off" />
			';
}
$__compilerVar6 .= '

			<input type="hidden" name="video_key[' . htmlspecialchars($__compilerVar5['content_data_id'], ENT_QUOTES, 'UTF-8') . ']" value="' . (($__compilerVar5['video_key']) ? (htmlspecialchars($__compilerVar5['video_key'], ENT_QUOTES, 'UTF-8')) : ('')) . '" autocomplete="off" />
			<input type="hidden" name="video_type[' . htmlspecialchars($__compilerVar5['content_data_id'], ENT_QUOTES, 'UTF-8') . ']" value="' . (($__compilerVar5['video_type']) ? (htmlspecialchars($__compilerVar5['video_type'], ENT_QUOTES, 'UTF-8')) : ('')) . '" autocomplete="off" />
			<input type="hidden" name="content_type[' . htmlspecialchars($__compilerVar5['content_data_id'], ENT_QUOTES, 'UTF-8') . ']" value="' . htmlspecialchars($__compilerVar5['content_type'], ENT_QUOTES, 'UTF-8') . '" autocomplete="off" />
			<input type="hidden" name="delete[]" id="delete_' . htmlspecialchars($__compilerVar5['content_data_id'], ENT_QUOTES, 'UTF-8') . '" value="" autocomplete="off" />
			<input type="radio" class="cover" name="cover_content_id" value="' . ((isset($__compilerVar5['content_id'])) ? ('c' . htmlspecialchars($__compilerVar5['content_id'], ENT_QUOTES, 'UTF-8')) : ('d' . htmlspecialchars($__compilerVar5['content_data_id'], ENT_QUOTES, 'UTF-8'))) . '" ' . ((!empty($__compilerVar5['content_id']) && $album['cover_content_id'] === $__compilerVar5['content_id']) ? ' checked="checked"' : '') . ' autocomplete="off" />
			<input type="radio" class="coverType" name="cover_content_type" value="' . htmlspecialchars($__compilerVar5['content_type'], ENT_QUOTES, 'UTF-8') . '" ' . ((!empty($__compilerVar5['content_id']) && $album['cover_content_id'] === $__compilerVar5['content_id']) ? ' checked="checked"' : '') . ' autocomplete="off" />
		</div>
	';
}
$__compilerVar6 .= '
	<div class="controls">
		<div class="inner">
			<span class="metaIcon peopleIcon ' . ((!empty($__compilerVar5['content_people'])) ? ('active') : ('')) . '" title="' . 'Tag People' . '"></span>
			';
if (!$xenOptions['sonnb_XG_disableLocation'])
{
$__compilerVar6 .= '
				<span class="metaIcon placeIcon ' . ((!empty($__compilerVar5['content_location'])) ? ('active') : ('')) . '" title="' . 'Location' . '"></span>
			';
}
$__compilerVar6 .= '
			<span class="metaIcon coverIcon ' . ((!empty($__compilerVar5['content_id']) && $album['cover_content_id'] == $__compilerVar5['content_id']) ? ('active') : ('')) . '" title="' . 'Set this as album cover' . '"></span>
			<span class="delete" title="' . 'Delete' . '" data-content="' . ((!empty($__compilerVar5['content_data_id'])) ? (htmlspecialchars($__compilerVar5['content_data_id'], ENT_QUOTES, 'UTF-8')) : ('')) . '"></span>
		</div>
	</div>
</li>';
$__compilerVar3 .= $__compilerVar6;
unset($__compilerVar4, $__compilerVar5, $__compilerVar6);
$__compilerVar3 .= '
	
			';
if ($contents)
{
$__compilerVar3 .= '
				';
foreach ($contents AS $content)
{
$__compilerVar3 .= '
					';
$__compilerVar7 = '';
$this->addRequiredExternal('css', 'sonnb_xengallery_upload');
$__compilerVar7 .= '

<li id="' . (($isTemplate) ? ('AttachedContentTemplate') : ('content' . htmlspecialchars($content['content_data_id'], ENT_QUOTES, 'UTF-8'))) . '" class="AttachedContent">
	<div class="Thumbnail" ' . ((!empty($content['thumbnailUrl'])) ? ('style="background-image:url(' . htmlspecialchars($content['thumbnailUrl'], ENT_QUOTES, 'UTF-8') . ')"') : ('')) . '>
		';
if (!empty($content['thumbnailUrl']))
{
$__compilerVar7 .= '
			<img src="' . htmlspecialchars($content['thumbnailUrl'], ENT_QUOTES, 'UTF-8') . '" alt="" class="img" />
		';
}
$__compilerVar7 .= '
		';
if (!empty($content['is_animated']))
{
$__compilerVar7 .= '<i class="icon gif"></i>';
}
$__compilerVar7 .= '
		';
if (isset($content['content_type']) && $content['content_type'] == ('video'))
{
$__compilerVar7 .= '<i class="icon video"></i>';
}
$__compilerVar7 .= '
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
$__compilerVar7 .= '
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
$__compilerVar7 .= '
				<input placeholder="' . 'Where is this?' . '" type="text" value="' . htmlspecialchars($content['content_location'], ENT_QUOTES, 'UTF-8') . '" name="content_location[' . htmlspecialchars($content['content_data_id'], ENT_QUOTES, 'UTF-8') . ']" class="textCtrl location" ' . ((!$content['content_location']) ? ('style="display:none;"') : ('')) . '/>
				<input type="hidden" class="location_lat" name="location_lat[' . htmlspecialchars($content['content_data_id'], ENT_QUOTES, 'UTF-8') . ']" value="' . ((isset($content['location_lat'])) ? (htmlspecialchars($content['location_lat'], ENT_QUOTES, 'UTF-8')) : ('')) . '" autocomplete="off" />
				<input type="hidden" class="location_lng" name="location_lng[' . htmlspecialchars($content['content_data_id'], ENT_QUOTES, 'UTF-8') . ']" value="' . ((isset($content['location_lat'])) ? (htmlspecialchars($content['location_lng'], ENT_QUOTES, 'UTF-8')) : ('')) . '" autocomplete="off" />
			';
}
$__compilerVar7 .= '

			<input type="hidden" name="video_key[' . htmlspecialchars($content['content_data_id'], ENT_QUOTES, 'UTF-8') . ']" value="' . (($content['video_key']) ? (htmlspecialchars($content['video_key'], ENT_QUOTES, 'UTF-8')) : ('')) . '" autocomplete="off" />
			<input type="hidden" name="video_type[' . htmlspecialchars($content['content_data_id'], ENT_QUOTES, 'UTF-8') . ']" value="' . (($content['video_type']) ? (htmlspecialchars($content['video_type'], ENT_QUOTES, 'UTF-8')) : ('')) . '" autocomplete="off" />
			<input type="hidden" name="content_type[' . htmlspecialchars($content['content_data_id'], ENT_QUOTES, 'UTF-8') . ']" value="' . htmlspecialchars($content['content_type'], ENT_QUOTES, 'UTF-8') . '" autocomplete="off" />
			<input type="hidden" name="delete[]" id="delete_' . htmlspecialchars($content['content_data_id'], ENT_QUOTES, 'UTF-8') . '" value="" autocomplete="off" />
			<input type="radio" class="cover" name="cover_content_id" value="' . ((isset($content['content_id'])) ? ('c' . htmlspecialchars($content['content_id'], ENT_QUOTES, 'UTF-8')) : ('d' . htmlspecialchars($content['content_data_id'], ENT_QUOTES, 'UTF-8'))) . '" ' . ((!empty($content['content_id']) && $album['cover_content_id'] === $content['content_id']) ? ' checked="checked"' : '') . ' autocomplete="off" />
			<input type="radio" class="coverType" name="cover_content_type" value="' . htmlspecialchars($content['content_type'], ENT_QUOTES, 'UTF-8') . '" ' . ((!empty($content['content_id']) && $album['cover_content_id'] === $content['content_id']) ? ' checked="checked"' : '') . ' autocomplete="off" />
		</div>
	';
}
$__compilerVar7 .= '
	<div class="controls">
		<div class="inner">
			<span class="metaIcon peopleIcon ' . ((!empty($content['content_people'])) ? ('active') : ('')) . '" title="' . 'Tag People' . '"></span>
			';
if (!$xenOptions['sonnb_XG_disableLocation'])
{
$__compilerVar7 .= '
				<span class="metaIcon placeIcon ' . ((!empty($content['content_location'])) ? ('active') : ('')) . '" title="' . 'Location' . '"></span>
			';
}
$__compilerVar7 .= '
			<span class="metaIcon coverIcon ' . ((!empty($content['content_id']) && $album['cover_content_id'] == $content['content_id']) ? ('active') : ('')) . '" title="' . 'Set this as album cover' . '"></span>
			<span class="delete" title="' . 'Delete' . '" data-content="' . ((!empty($content['content_data_id'])) ? (htmlspecialchars($content['content_data_id'], ENT_QUOTES, 'UTF-8')) : ('')) . '"></span>
		</div>
	</div>
</li>';
$__compilerVar3 .= $__compilerVar7;
unset($__compilerVar7);
$__compilerVar3 .= '
				';
}
$__compilerVar3 .= '
			';
}
$__compilerVar3 .= '
		</ol>
		
		<input type="hidden" name="content_data_hash" value="' . htmlspecialchars($contentDataParams['hash'], ENT_QUOTES, 'UTF-8') . '" />
	</div>
	
';
}
$__output .= $__compilerVar3;
unset($__compilerVar3);
$__output .= '</dd>
	</dl>
	<dl class="ctrlUnit fullWidth" id="noContent" style="height: 200px; text-align:center;" >
		<dt></dt>
		<dd>
			<div style="margin-top: 80px;">' . 'Click Upload Videos/Embed Videos to start.' . '</div>
		</dd>
	</dl>

	<dl class="ctrlUnit submitUnit">
		<dt></dt>
		<dd>
			<input type="submit" value="' . 'Save' . '" accesskey="s" class="button primary" />
			';
$__compilerVar8 = '';
$__compilerVar8 .= '<input type="button" value="' . 'Embed Videos' . '"
	id="ctrl_video_embed" class="button OverlayTrigger DisableOnSubmit" data-cacheOverlay="false"
	data-href="' . XenForo_Template_Helper_Core::link('full:gallery/videos/embed', '', array(
'_params' => $contentDataParams
)) . '"
	data-maxfileupload="100"
	data-error-maxfileupload="' . 'You only can upload ' . '100' . ' contents at a time.' . '" />';
$__output .= $__compilerVar8;
unset($__compilerVar8);
$__output .= '
		</dd>
	</dl>
</form>
';
$__compilerVar9 = '';
$__output .= $this->callTemplateHook('sonnb_cr_information', $__compilerVar9, array());
unset($__compilerVar9);
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
