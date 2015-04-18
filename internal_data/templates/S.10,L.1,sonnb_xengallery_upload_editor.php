<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
if ($contentDataParams)
{
$__output .= '

	';
$this->addRequiredExternal('js', 'js/xenforo/attachment_editor.js');
$__output .= '
	';
$this->addRequiredExternal('js', 'js/sonnb/XenGallery/gallery.contentuploader.js');
$__output .= '
	';
$this->addRequiredExternal('css', 'sonnb_xengallery_upload');
$__output .= '
	
	<div class="ContentEditor">		
		<div class="NoContents"></div>
	
		<ol class="ContentList Existing">
			';
$__compilerVar1 = '';
$__compilerVar1 .= '1';
$__compilerVar2 = '';
$__compilerVar3 = '';
$this->addRequiredExternal('css', 'sonnb_xengallery_upload');
$__compilerVar3 .= '

<li id="' . (($__compilerVar1) ? ('AttachedContentTemplate') : ('content' . htmlspecialchars($__compilerVar2['content_data_id'], ENT_QUOTES, 'UTF-8'))) . '" class="AttachedContent">
	<div class="Thumbnail" ' . ((!empty($__compilerVar2['thumbnailUrl'])) ? ('style="background-image:url(' . htmlspecialchars($__compilerVar2['thumbnailUrl'], ENT_QUOTES, 'UTF-8') . ')"') : ('')) . '>
		';
if (!empty($__compilerVar2['thumbnailUrl']))
{
$__compilerVar3 .= '
			<img src="' . htmlspecialchars($__compilerVar2['thumbnailUrl'], ENT_QUOTES, 'UTF-8') . '" alt="" class="img" />
		';
}
$__compilerVar3 .= '
		';
if (!empty($__compilerVar2['is_animated']))
{
$__compilerVar3 .= '<i class="icon gif"></i>';
}
$__compilerVar3 .= '
		';
if (isset($__compilerVar2['content_type']) && $__compilerVar2['content_type'] == ('video'))
{
$__compilerVar3 .= '<i class="icon video"></i>';
}
$__compilerVar3 .= '
	</div>
	<div class="progress" style="display: none;">
		<div class="gauge">
			<span class="meter">&nbsp;</span>
			<span class="text">&nbsp;</span>
		</div>
	</div>
	';
if (!empty($__compilerVar2['content_data_id']))
{
$__compilerVar3 .= '
		<div class="description">
			<input type="text" placeholder="' . 'Title' . '..." value="' . (($__compilerVar2['title'] AND $__compilerVar2['title'] != $__compilerVar2['content_id']) ? (htmlspecialchars($__compilerVar2['title'], ENT_QUOTES, 'UTF-8')) : ('')) . '" name="content_title[' . htmlspecialchars($__compilerVar2['content_data_id'], ENT_QUOTES, 'UTF-8') . ']" class="textCtrl title">
		</div>
		<div class="description">
			<textarea name="content_description[' . htmlspecialchars($__compilerVar2['content_data_id'], ENT_QUOTES, 'UTF-8') . ']" class="textCtrl" 
				cols="20" rows="2" placeholder="' . 'Description' . '" >' . htmlspecialchars($__compilerVar2['description'], ENT_QUOTES, 'UTF-8') . '</textarea>			
			<input placeholder="' . 'Who was with you?' . '" type="text" value="' . ((!empty($__compilerVar2['content_people'])) ? (htmlspecialchars($__compilerVar2['content_people'], ENT_QUOTES, 'UTF-8')) : ('')) . '" name="content_people[' . htmlspecialchars($__compilerVar2['content_data_id'], ENT_QUOTES, 'UTF-8') . ']" class="textCtrl people AutoComplete" ' . ((empty($__compilerVar2['content_people'])) ? ('style="display:none;"') : ('')) . ' />
			
			';
if (!$xenOptions['sonnb_XG_disableLocation'])
{
$__compilerVar3 .= '
				<input placeholder="' . 'Where is this?' . '" type="text" value="' . htmlspecialchars($__compilerVar2['content_location'], ENT_QUOTES, 'UTF-8') . '" name="content_location[' . htmlspecialchars($__compilerVar2['content_data_id'], ENT_QUOTES, 'UTF-8') . ']" class="textCtrl location" ' . ((!$__compilerVar2['content_location']) ? ('style="display:none;"') : ('')) . '/>
				<input type="hidden" class="location_lat" name="location_lat[' . htmlspecialchars($__compilerVar2['content_data_id'], ENT_QUOTES, 'UTF-8') . ']" value="' . ((isset($__compilerVar2['location_lat'])) ? (htmlspecialchars($__compilerVar2['location_lat'], ENT_QUOTES, 'UTF-8')) : ('')) . '" autocomplete="off" />
				<input type="hidden" class="location_lng" name="location_lng[' . htmlspecialchars($__compilerVar2['content_data_id'], ENT_QUOTES, 'UTF-8') . ']" value="' . ((isset($__compilerVar2['location_lat'])) ? (htmlspecialchars($__compilerVar2['location_lng'], ENT_QUOTES, 'UTF-8')) : ('')) . '" autocomplete="off" />
			';
}
$__compilerVar3 .= '

			<input type="hidden" name="video_key[' . htmlspecialchars($__compilerVar2['content_data_id'], ENT_QUOTES, 'UTF-8') . ']" value="' . (($__compilerVar2['video_key']) ? (htmlspecialchars($__compilerVar2['video_key'], ENT_QUOTES, 'UTF-8')) : ('')) . '" autocomplete="off" />
			<input type="hidden" name="video_type[' . htmlspecialchars($__compilerVar2['content_data_id'], ENT_QUOTES, 'UTF-8') . ']" value="' . (($__compilerVar2['video_type']) ? (htmlspecialchars($__compilerVar2['video_type'], ENT_QUOTES, 'UTF-8')) : ('')) . '" autocomplete="off" />
			<input type="hidden" name="content_type[' . htmlspecialchars($__compilerVar2['content_data_id'], ENT_QUOTES, 'UTF-8') . ']" value="' . htmlspecialchars($__compilerVar2['content_type'], ENT_QUOTES, 'UTF-8') . '" autocomplete="off" />
			<input type="hidden" name="delete[]" id="delete_' . htmlspecialchars($__compilerVar2['content_data_id'], ENT_QUOTES, 'UTF-8') . '" value="" autocomplete="off" />
			<input type="radio" class="cover" name="cover_content_id" value="' . ((isset($__compilerVar2['content_id'])) ? ('c' . htmlspecialchars($__compilerVar2['content_id'], ENT_QUOTES, 'UTF-8')) : ('d' . htmlspecialchars($__compilerVar2['content_data_id'], ENT_QUOTES, 'UTF-8'))) . '" ' . ((!empty($__compilerVar2['content_id']) && $album['cover_content_id'] === $__compilerVar2['content_id']) ? ' checked="checked"' : '') . ' autocomplete="off" />
			<input type="radio" class="coverType" name="cover_content_type" value="' . htmlspecialchars($__compilerVar2['content_type'], ENT_QUOTES, 'UTF-8') . '" ' . ((!empty($__compilerVar2['content_id']) && $album['cover_content_id'] === $__compilerVar2['content_id']) ? ' checked="checked"' : '') . ' autocomplete="off" />
		</div>
	';
}
$__compilerVar3 .= '
	<div class="controls">
		<div class="inner">
			<span class="metaIcon peopleIcon ' . ((!empty($__compilerVar2['content_people'])) ? ('active') : ('')) . '" title="' . 'Tag People' . '"></span>
			';
if (!$xenOptions['sonnb_XG_disableLocation'])
{
$__compilerVar3 .= '
				<span class="metaIcon placeIcon ' . ((!empty($__compilerVar2['content_location'])) ? ('active') : ('')) . '" title="' . 'Location' . '"></span>
			';
}
$__compilerVar3 .= '
			<span class="metaIcon coverIcon ' . ((!empty($__compilerVar2['content_id']) && $album['cover_content_id'] == $__compilerVar2['content_id']) ? ('active') : ('')) . '" title="' . 'Set this as album cover' . '"></span>
			<span class="delete" title="' . 'Delete' . '" data-content="' . ((!empty($__compilerVar2['content_data_id'])) ? (htmlspecialchars($__compilerVar2['content_data_id'], ENT_QUOTES, 'UTF-8')) : ('')) . '"></span>
		</div>
	</div>
</li>';
$__output .= $__compilerVar3;
unset($__compilerVar1, $__compilerVar2, $__compilerVar3);
$__output .= '
	
			';
if ($contents)
{
$__output .= '
				';
foreach ($contents AS $content)
{
$__output .= '
					';
$__compilerVar4 = '';
$this->addRequiredExternal('css', 'sonnb_xengallery_upload');
$__compilerVar4 .= '

<li id="' . (($isTemplate) ? ('AttachedContentTemplate') : ('content' . htmlspecialchars($content['content_data_id'], ENT_QUOTES, 'UTF-8'))) . '" class="AttachedContent">
	<div class="Thumbnail" ' . ((!empty($content['thumbnailUrl'])) ? ('style="background-image:url(' . htmlspecialchars($content['thumbnailUrl'], ENT_QUOTES, 'UTF-8') . ')"') : ('')) . '>
		';
if (!empty($content['thumbnailUrl']))
{
$__compilerVar4 .= '
			<img src="' . htmlspecialchars($content['thumbnailUrl'], ENT_QUOTES, 'UTF-8') . '" alt="" class="img" />
		';
}
$__compilerVar4 .= '
		';
if (!empty($content['is_animated']))
{
$__compilerVar4 .= '<i class="icon gif"></i>';
}
$__compilerVar4 .= '
		';
if (isset($content['content_type']) && $content['content_type'] == ('video'))
{
$__compilerVar4 .= '<i class="icon video"></i>';
}
$__compilerVar4 .= '
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
$__compilerVar4 .= '
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
$__compilerVar4 .= '
				<input placeholder="' . 'Where is this?' . '" type="text" value="' . htmlspecialchars($content['content_location'], ENT_QUOTES, 'UTF-8') . '" name="content_location[' . htmlspecialchars($content['content_data_id'], ENT_QUOTES, 'UTF-8') . ']" class="textCtrl location" ' . ((!$content['content_location']) ? ('style="display:none;"') : ('')) . '/>
				<input type="hidden" class="location_lat" name="location_lat[' . htmlspecialchars($content['content_data_id'], ENT_QUOTES, 'UTF-8') . ']" value="' . ((isset($content['location_lat'])) ? (htmlspecialchars($content['location_lat'], ENT_QUOTES, 'UTF-8')) : ('')) . '" autocomplete="off" />
				<input type="hidden" class="location_lng" name="location_lng[' . htmlspecialchars($content['content_data_id'], ENT_QUOTES, 'UTF-8') . ']" value="' . ((isset($content['location_lat'])) ? (htmlspecialchars($content['location_lng'], ENT_QUOTES, 'UTF-8')) : ('')) . '" autocomplete="off" />
			';
}
$__compilerVar4 .= '

			<input type="hidden" name="video_key[' . htmlspecialchars($content['content_data_id'], ENT_QUOTES, 'UTF-8') . ']" value="' . (($content['video_key']) ? (htmlspecialchars($content['video_key'], ENT_QUOTES, 'UTF-8')) : ('')) . '" autocomplete="off" />
			<input type="hidden" name="video_type[' . htmlspecialchars($content['content_data_id'], ENT_QUOTES, 'UTF-8') . ']" value="' . (($content['video_type']) ? (htmlspecialchars($content['video_type'], ENT_QUOTES, 'UTF-8')) : ('')) . '" autocomplete="off" />
			<input type="hidden" name="content_type[' . htmlspecialchars($content['content_data_id'], ENT_QUOTES, 'UTF-8') . ']" value="' . htmlspecialchars($content['content_type'], ENT_QUOTES, 'UTF-8') . '" autocomplete="off" />
			<input type="hidden" name="delete[]" id="delete_' . htmlspecialchars($content['content_data_id'], ENT_QUOTES, 'UTF-8') . '" value="" autocomplete="off" />
			<input type="radio" class="cover" name="cover_content_id" value="' . ((isset($content['content_id'])) ? ('c' . htmlspecialchars($content['content_id'], ENT_QUOTES, 'UTF-8')) : ('d' . htmlspecialchars($content['content_data_id'], ENT_QUOTES, 'UTF-8'))) . '" ' . ((!empty($content['content_id']) && $album['cover_content_id'] === $content['content_id']) ? ' checked="checked"' : '') . ' autocomplete="off" />
			<input type="radio" class="coverType" name="cover_content_type" value="' . htmlspecialchars($content['content_type'], ENT_QUOTES, 'UTF-8') . '" ' . ((!empty($content['content_id']) && $album['cover_content_id'] === $content['content_id']) ? ' checked="checked"' : '') . ' autocomplete="off" />
		</div>
	';
}
$__compilerVar4 .= '
	<div class="controls">
		<div class="inner">
			<span class="metaIcon peopleIcon ' . ((!empty($content['content_people'])) ? ('active') : ('')) . '" title="' . 'Tag People' . '"></span>
			';
if (!$xenOptions['sonnb_XG_disableLocation'])
{
$__compilerVar4 .= '
				<span class="metaIcon placeIcon ' . ((!empty($content['content_location'])) ? ('active') : ('')) . '" title="' . 'Location' . '"></span>
			';
}
$__compilerVar4 .= '
			<span class="metaIcon coverIcon ' . ((!empty($content['content_id']) && $album['cover_content_id'] == $content['content_id']) ? ('active') : ('')) . '" title="' . 'Set this as album cover' . '"></span>
			<span class="delete" title="' . 'Delete' . '" data-content="' . ((!empty($content['content_data_id'])) ? (htmlspecialchars($content['content_data_id'], ENT_QUOTES, 'UTF-8')) : ('')) . '"></span>
		</div>
	</div>
</li>';
$__output .= $__compilerVar4;
unset($__compilerVar4);
$__output .= '
				';
}
$__output .= '
			';
}
$__output .= '
		</ol>
		
		<input type="hidden" name="content_data_hash" value="' . htmlspecialchars($contentDataParams['hash'], ENT_QUOTES, 'UTF-8') . '" />
	</div>
	
';
}
