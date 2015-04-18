<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__extraData['title'] = '';
$__extraData['title'] .= 'Privacy Settings';
$__output .= '

';
$this->addRequiredExternal('css', 'account');
$__output .= '

<form method="post" class="xenForm privacyForm AutoValidator"
	action="' . XenForo_Template_Helper_Core::link('account/xengallery-privacy', false, array()) . '">

	<h3 class="sectionHeader">' . 'Album\'s Default Privacy' . '</h3>
	<fieldset>
		<dl class="ctrlUnit">
			<dt>' . 'Able to view' . ':</dt>
			<dd>
				<select name="album_allow_view" id="ctrl_album_allow_view" class="textCtrl xenGalleryCtrl">
					<option value="everyone" ' . (($visitor['xengalery']['album_allow_view'] == ('everyone')) ? ' selected="selected"' : '') . '>' . 'Everyone' . '</option>
					<option value="members" ' . (($visitor['xengallery']['album_allow_view'] == ('members')) ? ' selected="selected"' : '') . '>' . 'Registered Users' . '</option>
					<option value="followed" ' . (($visitor['xengallery']['album_allow_view'] == ('followed')) ? ' selected="selected"' : '') . '>' . 'People I Followed' . '</option>
					<option value="following" ' . (($visitor['xengallery']['album_allow_view'] == ('following')) ? ' selected="selected"' : '') . '>' . 'People Following Me' . '</option>
					<option value="none" ' . (($visitor['xengallery']['album_allow_view'] == ('none')) ? ' selected="selected"' : '') . '>' . 'Only Me' . '</option>
				</select>
			</dd>
		</dl>
		<dl class="ctrlUnit">
			<dt>' . 'Leave a comment' . ':</dt>
			<dd>
				<select name="album_allow_comment" id="ctrl_album_allow_comment" class="textCtrl xenGalleryCtrl">
					<option value="everyone" ' . (($visitor['xengallery']['album_allow_comment'] == ('everyone')) ? ' selected="selected"' : '') . '>' . 'Everyone' . '</option>
					<option value="members" ' . (($visitor['xengallery']['album_allow_comment'] == ('members')) ? ' selected="selected"' : '') . '>' . 'Registered Users' . '</option>
					<option value="followed" ' . (($visitor['xengallery']['album_allow_comment'] == ('followed')) ? ' selected="selected"' : '') . '>' . 'People I Followed' . '</option>
					<option value="following" ' . (($visitor['xengallery']['album_allow_comment'] == ('following')) ? ' selected="selected"' : '') . '>' . 'People Following Me' . '</option>
					<option value="none" ' . (($visitor['xengallery']['album_allow_comment'] == ('none')) ? ' selected="selected"' : '') . '>' . 'Only Me' . '</option>
				</select>
			</dd>
		</dl>
		<dl class="ctrlUnit">
			<dt>' . 'Add photos to your albums' . ':</dt>
			<dd>
				<select name="album_allow_add_photo" id="ctrl_album_allow_add_photo" class="textCtrl xenGalleryCtrl">
					<option value="everyone" ' . (($visitor['xengallery']['album_allow_add_photo'] == ('everyone')) ? ' selected="selected"' : '') . '>' . 'Everyone' . '</option>
					<option value="members" ' . (($visitor['xengallery']['album_allow_add_photo'] == ('members')) ? ' selected="selected"' : '') . '>' . 'Registered Users' . '</option>
					<option value="followed" ' . (($visitor['xengallery']['album_allow_add_photo'] == ('followed')) ? ' selected="selected"' : '') . '>' . 'People I Followed' . '</option>
					<option value="following" ' . (($visitor['xengallery']['album_allow_add_photo'] == ('following')) ? ' selected="selected"' : '') . '>' . 'People Following Me' . '</option>
					<option value="none" ' . (($visitor['xengallery']['album_allow_add_photo'] == ('none')) ? ' selected="selected"' : '') . '>' . 'Only Me' . '</option>
				</select>
				<p class="explain">' . 'These settings only affect newly created albums. Existing albums would remain unchanged.' . '</p>
			</dd>
		</dl>
		<dl class="ctrlUnit">
			<dt>' . 'Add videos to your albums' . ':</dt>
			<dd>
				<select name="album_allow_add_video" id="ctrl_album_allow_add_video" class="textCtrl xenGalleryCtrl">
					<option value="everyone" ' . (($visitor['xengallery']['album_allow_add_video'] == ('everyone')) ? ' selected="selected"' : '') . '>' . 'Everyone' . '</option>
					<option value="members" ' . (($visitor['xengallery']['album_allow_add_video'] == ('members')) ? ' selected="selected"' : '') . '>' . 'Registered Users' . '</option>
					<option value="followed" ' . (($visitor['xengallery']['album_allow_add_video'] == ('followed')) ? ' selected="selected"' : '') . '>' . 'People I Followed' . '</option>
					<option value="following" ' . (($visitor['xengallery']['album_allow_add_video'] == ('following')) ? ' selected="selected"' : '') . '>' . 'People Following Me' . '</option>
					<option value="none" ' . (($visitor['xengallery']['album_allow_add_video'] == ('none')) ? ' selected="selected"' : '') . '>' . 'Only Me' . '</option>
				</select>
				<p class="explain">' . 'These settings only affect newly created albums. Existing albums would remain unchanged.' . '</p>
			</dd>
		</dl>
		<dl class="ctrlUnit">
			<dt>' . 'Download Original Photo' . ':</dt>
			<dd>
				<select name="album_allow_download" id="ctrl_album_allow_download" class="textCtrl xenGalleryCtrl">
					<option value="everyone" ' . (($visitor['xengallery']['album_allow_download'] == ('everyone')) ? ' selected="selected"' : '') . '>' . 'Everyone' . '</option>
					<option value="members" ' . (($visitor['xengallery']['album_allow_download'] == ('members')) ? ' selected="selected"' : '') . '>' . 'Registered Users' . '</option>
					<option value="followed" ' . (($visitor['xengallery']['album_allow_download'] == ('followed')) ? ' selected="selected"' : '') . '>' . 'People I Followed' . '</option>
					<option value="following" ' . (($visitor['xengallery']['album_allow_download'] == ('following')) ? ' selected="selected"' : '') . '>' . 'People Following Me' . '</option>
					<option value="none" ' . (($visitor['xengallery']['album_allow_download'] == ('none')) ? ' selected="selected"' : '') . '>' . 'Only Me' . '</option>
				</select>
			</dd>
		</dl>
	</fieldset>
	
	
	<h3 class="sectionHeader">' . 'Photo\'s Default Privacy' . '</h3>
	<fieldset>
		<dl class="ctrlUnit">
			<dt>' . 'Able to view' . ':</dt>
			<dd>
				<select name="photo_allow_view" id="ctrl_photo_allow_view" class="textCtrl xenGalleryCtrl">
					<option value="everyone" ' . (($visitor['xengallery']['photo_allow_view'] == ('everyone')) ? ' selected="selected"' : '') . '>' . 'Everyone' . '</option>
					<option value="members" ' . (($visitor['xengallery']['photo_allow_view'] == ('members')) ? ' selected="selected"' : '') . '>' . 'Registered Users' . '</option>
					<option value="followed" ' . (($visitor['xengallery']['photo_allow_view'] == ('followed')) ? ' selected="selected"' : '') . '>' . 'People I Followed' . '</option>
					<option value="following" ' . (($visitor['xengallery']['photo_allow_view'] == ('following')) ? ' selected="selected"' : '') . '>' . 'People Following Me' . '</option>
					<option value="none" ' . (($visitor['xengallery']['photo_allow_view'] == ('none')) ? ' selected="selected"' : '') . '>' . 'Only Me' . '</option>
				</select>
			</dd>
		</dl>
		<dl class="ctrlUnit">
			<dt>' . 'Leave a comment' . ':</dt>
			<dd>
				<select name="photo_allow_comment" id="ctrl_photo_allow_comment" class="textCtrl xenGalleryCtrl">
					<option value="everyone" ' . (($visitor['xengallery']['photo_allow_comment'] == ('everyone')) ? ' selected="selected"' : '') . '>' . 'Everyone' . '</option>
					<option value="members" ' . (($visitor['xengallery']['photo_allow_comment'] == ('members')) ? ' selected="selected"' : '') . '>' . 'Registered Users' . '</option>
					<option value="followed" ' . (($visitor['xengallery']['photo_allow_comment'] == ('followed')) ? ' selected="selected"' : '') . '>' . 'People I Followed' . '</option>
					<option value="following" ' . (($visitor['xengallery']['photo_allow_comment'] == ('following')) ? ' selected="selected"' : '') . '>' . 'People Following Me' . '</option>
					<option value="none" ' . (($visitor['xengallery']['photo_allow_comment'] == ('none')) ? ' selected="selected"' : '') . '>' . 'Only Me' . '</option>
				</select>
				<p class="explain">' . 'These settings only affect newly created photos. Existing photos would remain unchanged.' . '</p>
			</dd>
		</dl>
	</fieldset>
	
	
	<h3 class="sectionHeader">' . 'Video\'s Default Privacy' . '</h3>
	<fieldset>
		<dl class="ctrlUnit">
			<dt>' . 'Able to view' . ':</dt>
			<dd>
				<select name="video_allow_view" id="ctrl_video_allow_view" class="textCtrl xenGalleryCtrl">
					<option value="everyone" ' . (($visitor['xengallery']['video_allow_view'] == ('everyone')) ? ' selected="selected"' : '') . '>' . 'Everyone' . '</option>
					<option value="members" ' . (($visitor['xengallery']['video_allow_view'] == ('members')) ? ' selected="selected"' : '') . '>' . 'Registered Users' . '</option>
					<option value="followed" ' . (($visitor['xengallery']['video_allow_view'] == ('followed')) ? ' selected="selected"' : '') . '>' . 'People I Followed' . '</option>
					<option value="following" ' . (($visitor['xengallery']['video_allow_view'] == ('following')) ? ' selected="selected"' : '') . '>' . 'People Following Me' . '</option>
					<option value="none" ' . (($visitor['xengallery']['video_allow_view'] == ('none')) ? ' selected="selected"' : '') . '>' . 'Only Me' . '</option>
				</select>
			</dd>
		</dl>
		<dl class="ctrlUnit">
			<dt>' . 'Leave a comment' . ':</dt>
			<dd>
				<select name="video_allow_comment" id="ctrl_video_allow_comment" class="textCtrl xenGalleryCtrl">
					<option value="everyone" ' . (($visitor['xengallery']['video_allow_comment'] == ('everyone')) ? ' selected="selected"' : '') . '>' . 'Everyone' . '</option>
					<option value="members" ' . (($visitor['xengallery']['video_allow_comment'] == ('members')) ? ' selected="selected"' : '') . '>' . 'Registered Users' . '</option>
					<option value="followed" ' . (($visitor['xengallery']['video_allow_comment'] == ('followed')) ? ' selected="selected"' : '') . '>' . 'People I Followed' . '</option>
					<option value="following" ' . (($visitor['xengallery']['video_allow_comment'] == ('following')) ? ' selected="selected"' : '') . '>' . 'People Following Me' . '</option>
					<option value="none" ' . (($visitor['xengallery']['video_allow_comment'] == ('none')) ? ' selected="selected"' : '') . '>' . 'Only Me' . '</option>
				</select>
				<p class="explain">' . 'These settings only affect newly created videos. Existing videos would remain unchanged.' . '</p>
			</dd>
		</dl>
	</fieldset>

	
	<h3 class="sectionHeader">' . 'Tagging Settings' . '</h3>
	<fieldset>
		<dl class="ctrlUnit">
			<dt>' . 'Can tag you' . '</dt>
			<dd>
				<select name="allow_tagging" id="ctrl_allow_tagging" class="textCtrl xenGalleryCtrl">
					<option value="everyone" ' . (($visitor['xengallery']['allow_tagging'] == ('everyone')) ? ' selected="selected"' : '') . '>' . 'Everyone' . '</option>
					<option value="members" ' . (($visitor['xengallery']['allow_tagging'] == ('members')) ? ' selected="selected"' : '') . '>' . 'Registered Users' . '</option>
					<option value="followed" ' . (($visitor['xengallery']['allow_tagging'] == ('followed')) ? ' selected="selected"' : '') . '>' . 'People I Followed' . '</option>
					<option value="following" ' . (($visitor['xengallery']['allow_tagging'] == ('following')) ? ' selected="selected"' : '') . '>' . 'People Following Me' . '</option>
					<option value="none" ' . (($visitor['xengallery']['allow_tagging'] == ('none')) ? ' selected="selected"' : '') . '>' . 'Only Me' . '</option>
				</select>
			</dd>
		</dl>
		<dl class="ctrlUnit sectionLink">
			<dt></dt>
			<dd>
				<label for="direct_tagging">
					<input type="checkbox" name="direct_tagging" value="1" ' . (($visitor['xengallery']['direct_tagging']) ? ' checked="checked"' : '') . ' /> 
					' . 'Allow Direct Tagging' . '
				</label>
				<p class="explain">' . 'You would be directly tagged to an album or a photo without needing your confirmation.' . '</p>
			</dd>
		</dl>
	</fieldset>
	
	';
if ($canCustomizeWatermark)
{
$__output .= '
		<h3 class="sectionHeader">' . 'Text Watermark' . '</h3>
		<fieldset>
			<dl class="ctrlUnit">
				<dt></dt>
				<dd>
					<ul>
						<li>
							<input type="text" name="text" value="' . htmlspecialchars($visitor['sonnb_xengallery_watermark']['text'], ENT_QUOTES, 'UTF-8') . '" class="textCtrl">
							<p class="explain">' . 'Text content to be shown as watermark. You can use some user\'s variables here: 
<br/>
- {username}: For uploader\'s username.<br/>
- {user_id}.<br/>
- {email}.<br/><br/>
<font style="color: red; font-weight: bold;">NOTE:</font> For the best result, please double check that you have extension GD & FreeType installed. ' . '</p>
						</li>
						<li>
							<input type="text" name="textSize"
								   value="' . htmlspecialchars($visitor['sonnb_xengallery_watermark']['textSize'], ENT_QUOTES, 'UTF-8') . '" size="3" step="1" min="1"
								   class="textCtrl number SpinBox" autocomplete="off">
							<p class="explain">' . 'Text Size' . '</p>
						</li>
						<li>
							<input type="text" name="textColor"
								   value="' . htmlspecialchars($visitor['sonnb_xengallery_watermark']['textColor'], ENT_QUOTES, 'UTF-8') . '" placeholder="' . 'Text Color (e.g: #FFFFFF)' . '"
								   class="textCtrl">
							<p class="explain">' . 'Text color for the overlay texts in HEX format. For example: #FFFFFF, #000000' . '</p>
						</li>
						<li>
							<input type="text" name="bgColor"
								   value="' . htmlspecialchars($visitor['sonnb_xengallery_watermark']['bgColor'], ENT_QUOTES, 'UTF-8') . '" placeholder="' . 'Background' . '"
								   class="textCtrl">
							<p class="explain">' . 'Background color for the watermark text. It could be the Hex color code like: #FFF, #000. If you want a transparent background, just enter: transparent.' . '</p>
						</li>
						<li>
							<select class="textCtrl" value="' . htmlspecialchars($visitor['sonnb_xengallery_watermark']['position'], ENT_QUOTES, 'UTF-8') . '" name="position">
								<option value="tl" ' . (($visitor['sonnb_xengallery_watermark']['position'] === ('tl')) ? ('selected="selected"') : ('')) . '>' . 'Top Left' . '</option>
								<option value="ct" ' . (($visitor['sonnb_xengallery_watermark']['position'] === ('ct')) ? ('selected="selected"') : ('')) . '>' . 'Top Center' . '</option>
								<option value="tr" ' . (($visitor['sonnb_xengallery_watermark']['position'] === ('tr')) ? ('selected="selected"') : ('')) . '>' . 'Top Right' . '</option>
								<option value="bl" ' . (($visitor['sonnb_xengallery_watermark']['position'] === ('bl')) ? ('selected="selected"') : ('')) . '>' . 'Bottom Left' . '</option>
								<option value="cb" ' . (($visitor['sonnb_xengallery_watermark']['position'] === ('cb')) ? ('selected="selected"') : ('')) . '>' . 'Bottom Center' . '</option>
								<option value="br" ' . (($visitor['sonnb_xengallery_watermark']['position'] === ('br')) ? ('selected="selected"') : ('')) . '>' . 'Bottom Right' . '</option>
								<option value="c" ' . (($visitor['sonnb_xengallery_watermark']['position'] === ('c	')) ? ('selected="selected"') : ('')) . '>' . 'Middle Center' . '</option>
							</select>
							<p class="explain">' . 'Watermark Position' . '</p>
						</li>
						<li>
							<input type="text" name="margin"
									placeholder="' . 'Watermark Margin' . '"
								   value="' . htmlspecialchars($visitor['sonnb_xengallery_watermark']['margin'], ENT_QUOTES, 'UTF-8') . '" size="3" step="1" min="1"
								   class="textCtrl number SpinBox" autocomplete="off">
							<p class="explain">' . 'Margin between watermark and the photo\'s borders.' . '</p>
						</li>
					</ul>
				</dd>
			</dl>
		</fieldset>
	';
}
$__output .= '
	
	<dl class="ctrlUnit submitUnit">
		<dt></dt>
		<dd><input type="submit" name="save" value="' . 'Save' . '" accesskey="s" class="button primary" /></dd>
	</dl>

	<input type="hidden" name="_xfToken" value="' . htmlspecialchars($visitor['csrf_token_page'], ENT_QUOTES, 'UTF-8') . '" />
</form>';
