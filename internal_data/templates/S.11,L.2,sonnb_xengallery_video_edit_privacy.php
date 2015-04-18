<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__extraData['title'] = '';
$__extraData['title'] .= 'Edit Video Privacy';
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

<form action="' . XenForo_Template_Helper_Core::link('gallery/videos/privacy', $content, array()) . '" method="post"
	class="xenForm AutoValidator formOverlay editPrivacy" data-redirect="on">

	<fieldset style="clear: both;">
		';
$__compilerVar2 = '';
$this->addRequiredExternal('css', 'sonnb_xengallery_helper_album_privacy');
$__compilerVar2 .= '
';
$this->addRequiredExternal('js', 'js/sonnb/XenGallery/gallery.privacyeditor.js');
$__compilerVar2 .= '

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
$__output .= $__compilerVar2;
unset($__compilerVar2);
$__output .= '
	</fieldset>

	<dl class="ctrlUnit submitUnit">
		<dt></dt>
		<dd>
			<input type="submit" value="' . 'Lưu' . '" accesskey="s" class="button primary" />
		</dd>
	</dl>

	<input type="hidden" name="_xfToken" value="' . htmlspecialchars($visitor['csrf_token_page'], ENT_QUOTES, 'UTF-8') . '" />
</form>';
