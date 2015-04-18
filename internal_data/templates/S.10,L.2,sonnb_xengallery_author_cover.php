<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
if ($canManageCover)
{
$__output .= '
	';
$this->addRequiredExternal('js', 'js/sonnb/XenGallery/gallery.cover.js');
$__output .= '

	<ul class="controls">
		<li title="' . 'Delete Cover' . '" class="button delete" style="' . ((empty($user['sonnb_xengallery_cover'])) ? ('display: none;') : ('')) . '"><span class="icon delete"></span></li>
		<li title="' . 'Upload Cover Image' . '" class="button upload">
			<form action="' . XenForo_Template_Helper_Core::link('gallery/authors/cover-upload', $user, array()) . '" method="post" enctype="multipart/form-data"
				class="AutoInlineUploader formOverlay">
				<input type="file" name="cover" class="textCtrl" onchange="this.blur()" id="ctrl_cover" title="' . 'Supported formats: JPEG, PNG, GIF' . '" />
				<span class="icon upload"></span>
			
				<input type="hidden" name="crop_x" value="" autocomplete="off" />
				<input type="hidden" name="crop_y" value="" autocomplete="off" />
				<input type="hidden" name="width" value="" autocomplete="off" />
				<input type="hidden" name="height" value="" autocomplete="off" />
				<input type="hidden" name="delete" value="" autocomplete="off" />
				<input type="hidden" name="_xfToken" value="' . htmlspecialchars($visitor['csrf_token_page'], ENT_QUOTES, 'UTF-8') . '" autocomplete="off" />
			</form>
		</li>
		<li title="' . 'Change Cover Position' . '" class="button edit"><span class="icon edit"></span></li>
	</ul>
';
}
$__output .= '

<label class="CoverCropControl" style="' . ((empty($user['sonnb_xengallery_cover'])) ? ('display: none;') : ('')) . '"><img class="coverImage" src="' . XenForo_Template_Helper_Core::callHelper('sonnb_xengallery_cover', array(
'0' => $user
)) . '" /></label>
<a class="avatar Av6m">
	<span style="background-image: url(\'' . XenForo_Template_Helper_Core::callHelper('avatar', array(
'0' => $user,
'1' => 'm'
)) . '\')" class="img m"></span>
</a>
<div class="person">
	<h1><span class="character-name-holder">' . htmlspecialchars($user['username'], ENT_QUOTES, 'UTF-8') . '</span></h1>
</div>
<div class="stats">
	<div class="stat statcount">
		<h1>' . htmlspecialchars($user['sonnb_xengallery_album_count'], ENT_QUOTES, 'UTF-8') . '</h1>
		<h2>' . 'Albums' . '</h2>
	</div>
	<div class="stat statcount">
		<h1>' . htmlspecialchars($user['sonnb_xengallery_photo_count'], ENT_QUOTES, 'UTF-8') . '</h1>
		<h2>' . 'Photos' . '</h2>
	</div>
	<div class="stat statcount">
		<h1>' . htmlspecialchars($user['sonnb_xengallery_video_count'], ENT_QUOTES, 'UTF-8') . '</h1>
		<h2>' . 'Videos' . '</h2>
	</div>
</div>';
