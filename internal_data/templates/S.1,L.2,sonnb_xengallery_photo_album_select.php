<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__extraData['title'] = '';
$__extraData['title'] .= 'Select an Album';
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
$this->addRequiredExternal('css', 'sonnb_xengallery_photo_album_select');
$__output .= '

<div class="section albumSelect xenForm">
	<div class="secondaryContent">
		<p class="hint">' . 'Only 20 latest updated albums would be shown up. If you want to upload to your specified album that is not listed here, please go to "My albums", choose an album and "Add Photos" to it.
<br/><br/>' . '</p>

		<dl class="ctrlUnit">
			<dt>' . 'Select an Album' . ':</dt>
			<dd>
				<select id="ctrl_addPhotoSelect" name="album_id" class="textCtrl">
					<option value="0" class="muted">--- ' . 'Select an Album' . ' ---</option>
					';
foreach ($albums AS $album)
{
$__output .= '
						<option value="' . htmlspecialchars($album['album_id'], ENT_QUOTES, 'UTF-8') . '" data-href="' . XenForo_Template_Helper_Core::link('gallery/albums/add-photo', $album, array()) . '">' . htmlspecialchars($album['title'], ENT_QUOTES, 'UTF-8') . '</option>
					';
}
$__output .= '
				</select>
			</dd>
		</dl>
		<input type="hidden" name="_xfToken" value="' . htmlspecialchars($visitor['csrf_token_page'], ENT_QUOTES, 'UTF-8') . '" />
	</div>
	<div class="sectionFooter overlayOnly">
		<a class="button primary OverlayCloser">' . 'Đóng' . '</a>
	</div>
</div>

<script type="text/javascript">
	!function($, window, document, _undefined) {
		$(\'#ctrl_addPhotoSelect\').change(function(e){
			var target = $(this).find(":selected").data(\'href\');
			
			if (target)
			{
				XenForo.redirect(target);
			}
		});
	}(jQuery, this, document);
</script>';
