<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__extraData['title'] = '';
$__extraData['title'] .= 'Edit Album' . ': ' . htmlspecialchars($album['title'], ENT_QUOTES, 'UTF-8');
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
$this->addRequiredExternal('css', 'sonnb_xengallery_album_edit_privacy');
$__output .= '

<form action="' . XenForo_Template_Helper_Core::link('gallery/albums/privacy', $album, array()) . '" method="post"
	class="xenForm AutoValidator formOverlay editPrivacy" data-redirect="on">
	<fieldset style="clear: both;">
		';
$__compilerVar1 = '';
$this->addRequiredExternal('css', 'sonnb_xengallery_helper_album_privacy');
$__compilerVar1 .= '
';
$this->addRequiredExternal('js', 'js/sonnb/XenGallery/gallery.privacyeditor.js');
$__compilerVar1 .= '

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
$__output .= $__compilerVar1;
unset($__compilerVar1);
$__output .= '
	</fieldset>

	<dl class="ctrlUnit submitUnit">
		<dt></dt>
		<dd>
			<input type="submit" value="' . 'Save' . '" accesskey="s" class="button primary" />
		</dd>
	</dl>

	<input type="hidden" name="_xfToken" value="' . htmlspecialchars($visitor['csrf_token_page'], ENT_QUOTES, 'UTF-8') . '" />
</form>';
