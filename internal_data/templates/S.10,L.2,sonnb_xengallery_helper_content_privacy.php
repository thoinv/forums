<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$this->addRequiredExternal('css', 'sonnb_xengallery_helper_album_privacy');
$__output .= '
';
$this->addRequiredExternal('js', 'js/sonnb/XenGallery/gallery.privacyeditor.js');
$__output .= '

<dl class="ctrlUnit">
	<dt>' . 'Who can view' . ':</dt>
	<dd>
		<select name="' . htmlspecialchars($type, ENT_QUOTES, 'UTF-8') . '_allow_view" id="ctrl_' . htmlspecialchars($type, ENT_QUOTES, 'UTF-8') . '_allow_view" class="textCtrl xenGalleryCtrl">
			<option value="everyone" ' . (($contentPrivacy['allow_view'] == ('everyone')) ? ' selected="selected"' : '') . '>' . 'Everyone' . '</option>
			<option value="members" ' . (($contentPrivacy['allow_view'] == ('members')) ? ' selected="selected"' : '') . '>' . 'Registered Users' . '</option>
			<option value="followed" ' . (($contentPrivacy['allow_view'] == ('followed')) ? ' selected="selected"' : '') . '>' . 'People I Followed' . '</option>
			<option value="following" ' . (($contentPrivacy['allow_view'] == ('following')) ? ' selected="selected"' : '') . '>' . 'People Following Me' . '</option>
			<option value="custom" ' . (($contentPrivacy['allow_view'] == ('custom')) ? ' selected="selected"' : '') . '>' . 'Custom' . '</option>
			<option value="none" ' . (($contentPrivacy['allow_view'] == ('none')) ? ' selected="selected"' : '') . '>' . 'Only Me' . '</option>
		</select>
		<input type="text" name="' . htmlspecialchars($type, ENT_QUOTES, 'UTF-8') . '_allow_view_username" value="" id="ctrl_' . htmlspecialchars($type, ENT_QUOTES, 'UTF-8') . '_allow_view_username" class="textCtrl xenGalleryCtrl AutoComplete" ' . (($contentPrivacy['allow_view'] != ('custom')) ? ('style="display:none;"') : ('')) . ' />			
		<p class="explain xenGalleryCtrl" ' . (($contentPrivacy['allow_view'] != ('custom')) ? ('style="display:none;"') : ('')) . '>' . 'Dãn cách tên bằng dấu phẩy(,).' . '</p>
	</dd>
</dl>
<dl class="ctrlUnit">
	<dt>' . 'Who can comment' . ':</dt>
	<dd>
		<select name="' . htmlspecialchars($type, ENT_QUOTES, 'UTF-8') . '_allow_comment" id="ctrl_' . htmlspecialchars($type, ENT_QUOTES, 'UTF-8') . '_allow_comment" class="textCtrl xenGalleryCtrl">
			<option value="everyone" ' . (($contentPrivacy['allow_comment'] == ('everyone')) ? ' selected="selected"' : '') . '>' . 'Everyone' . '</option>
			<option value="members" ' . (($contentPrivacy['allow_comment'] == ('members')) ? ' selected="selected"' : '') . '>' . 'Registered Users' . '</option>
			<option value="followed" ' . (($contentPrivacy['allow_comment'] == ('followed')) ? ' selected="selected"' : '') . '>' . 'People I Followed' . '</option>
			<option value="following" ' . (($contentPrivacy['allow_comment'] == ('following')) ? ' selected="selected"' : '') . '>' . 'People Following Me' . '</option>
			<option value="custom" ' . (($contentPrivacy['allow_comment'] == ('custom')) ? ' selected="selected"' : '') . '>' . 'Custom' . '</option>
			<option value="none" ' . (($contentPrivacy['allow_comment'] == ('none')) ? ' selected="selected"' : '') . '>' . 'Only Me' . '</option>
		</select>
		<input type="text" name="' . htmlspecialchars($type, ENT_QUOTES, 'UTF-8') . '_allow_comment_username" value="" id="ctrl_' . htmlspecialchars($type, ENT_QUOTES, 'UTF-8') . '_allow_comment_username" class="textCtrl xenGalleryCtrl AutoComplete" ' . (($contentPrivacy['allow_comment'] != ('custom')) ? ('style="display:none;"') : ('')) . ' />	
		<p class="explain xenGalleryCtrl" ' . (($contentPrivacy['allow_comment'] != ('custom')) ? ('style="display:none;"') : ('')) . '>' . 'Dãn cách tên bằng dấu phẩy(,).' . '</p>
	</dd>
</dl>';
