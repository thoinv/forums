<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__extraData['title'] = '';
$__extraData['title'] .= 'Alert Settings';
$__output .= '

';
$this->addRequiredExternal('css', 'account');
$__output .= '

<form method="post" class="xenForm privacyForm AutoValidator"
	action="' . XenForo_Template_Helper_Core::link('account/xengallery-alert', false, array()) . '">

	<h3 class="sectionHeader">' . 'Alert Settings' . '</h3>
	<fieldset>
		<dl class="ctrlUnit">
			<dt>' . 'Nhận thông báo khi ai đó' . '</dt>
			<dd>
				<ul>
					<li>
						<input type="hidden" name="alertSet[sonnb_xengallery_album_like]" value="1" />
						<label><input type="checkbox" value="1" name="alert[sonnb_xengallery_album_like]" ' . ((!$alertOptOuts['sonnb_xengallery_album_like']) ? ' checked="checked"' : '') . ' /> ' . 'Like an album' . '</label>
						<p class="hint">' . 'When someone like your albums or an album that you are tagged-in or commented on.' . '</p>
					</li>
					<li>
						<input type="hidden" name="alertSet[sonnb_xengallery_album_comment]" value="1" />
						<label><input type="checkbox" value="1" name="alert[sonnb_xengallery_album_comment]" ' . ((!$alertOptOuts['sonnb_xengallery_album_comment']) ? ' checked="checked"' : '') . ' /> ' . 'Comments on an album' . '</label>
						<p class="hint">' . 'When someone comments on your albums, an album that you are tagged-in, or commented on.' . '</p>
					</li>
					<li>
						<input type="hidden" name="alertSet[sonnb_xengallery_album_add_photo]" value="1" />
						<label><input type="checkbox" value="1" name="alert[sonnb_xengallery_album_add_photo]" ' . ((!$alertOptOuts['sonnb_xengallery_album_add_photo']) ? ' checked="checked"' : '') . ' /> ' . 'Add a photo to an album' . '</label>
						<p class="hint">' . 'When someone adds a new photo to your albums, an album that you are tagged-in, or commented on.' . '</p>
					</li>
					<li>
						<input type="hidden" name="alertSet[sonnb_xengallery_album_add_video]" value="1" />
						<label><input type="checkbox" value="1" name="alert[sonnb_xengallery_album_add_video]" ' . ((!$alertOptOuts['sonnb_xengallery_album_add_video']) ? ' checked="checked"' : '') . ' /> ' . 'Add a video to an album' . '</label>
						<p class="hint">' . 'When someone adds a new video to your albums, an album that you are tagged-in, or commented on.' . '</p>
					</li>
					<li>
						<input type="hidden" name="alertSet[sonnb_xengallery_album_tag]" value="1" />
						<label><input type="checkbox" value="1" name="alert[sonnb_xengallery_album_tag]" ' . ((!$alertOptOuts['sonnb_xengallery_album_tag']) ? ' checked="checked"' : '') . ' /> ' . 'Tag you in a album' . '</label>
						<p class="hint">' . 'When someone tagged you to an album.' . '</p>
					</li>
					
					<li>
						<input type="hidden" name="alertSet[sonnb_xengallery_photo_like]" value="1" />
						<label><input type="checkbox" value="1" name="alert[sonnb_xengallery_photo_like]" ' . ((!$alertOptOuts['sonnb_xengallery_photo_like']) ? ' checked="checked"' : '') . ' /> ' . 'Like a photo' . '</label>
						<p class="hint">' . 'When someone like your photos or a photo that you are tagged-in or commented on.' . '</p>
					</li>
					<li>
						<input type="hidden" name="alertSet[sonnb_xengallery_photo_comment]" value="1" />
						<label><input type="checkbox" value="1" name="alert[sonnb_xengallery_photo_comment]" ' . ((!$alertOptOuts['sonnb_xengallery_photo_comment']) ? ' checked="checked"' : '') . ' /> ' . 'Comments on a photo' . '</label>
						<p class="hint">' . 'When someone comments on your photos, photo that you are tagged-in, or commented on.' . '</p>
					</li>
					<li>
						<input type="hidden" name="alertSet[sonnb_xengallery_photo_tag]" value="1" />
						<label><input type="checkbox" value="1" name="alert[sonnb_xengallery_photo_tag]" ' . ((!$alertOptOuts['sonnb_xengallery_photo_tag']) ? ' checked="checked"' : '') . ' /> ' . 'Tag you in a photo' . '</label>
						<p class="hint">' . 'When someone tag you in a photo' . '</p>
					</li>
					
					<li>
						<input type="hidden" name="alertSet[sonnb_xengallery_video_like]" value="1" />
						<label><input type="checkbox" value="1" name="alert[sonnb_xengallery_video_like]" ' . ((!$alertOptOuts['sonnb_xengallery_video_like']) ? ' checked="checked"' : '') . ' /> ' . 'Like a video' . '</label>
						<p class="hint">' . 'When someone like your videos or a video that you are tagged-in or commented on.' . '</p>
					</li>
					<li>
						<input type="hidden" name="alertSet[sonnb_xengallery_video_comment]" value="1" />
						<label><input type="checkbox" value="1" name="alert[sonnb_xengallery_video_comment]" ' . ((!$alertOptOuts['sonnb_xengallery_video_comment']) ? ' checked="checked"' : '') . ' /> ' . 'Comments on a video' . '</label>
						<p class="hint">' . 'When someone comments on your videos, video that you are tagged-in, or commented on.' . '</p>
					</li>
					<li>
						<input type="hidden" name="alertSet[sonnb_xengallery_video_tag]" value="1" />
						<label><input type="checkbox" value="1" name="alert[sonnb_xengallery_video_tag]" ' . ((!$alertOptOuts['sonnb_xengallery_video_tag']) ? ' checked="checked"' : '') . ' /> ' . 'Tag you in a video' . '</label>
						<p class="hint">' . 'When someone tag you in a video' . '</p>
					</li>
					
					<li>
						<input type="hidden" name="alertSet[sonnb_xengallery_comment_like]" value="1" />
						<label><input type="checkbox" value="1" name="alert[sonnb_xengallery_comment_like]" ' . ((!$alertOptOuts['sonnb_xengallery_comment_like']) ? ' checked="checked"' : '') . ' /> ' . 'Like your comment' . '</label>
						<p class="hint">' . 'When someone likes your comment.' . '</p>
					</li>
				</ul>
			</dd>
		</dl>
	</fieldset>

	<dl class="ctrlUnit submitUnit">
		<dt></dt>
		<dd><input type="submit" name="save" value="' . 'Lưu' . '" accesskey="s" class="button primary" /></dd>
	</dl>

	<input type="hidden" name="_xfToken" value="' . htmlspecialchars($visitor['csrf_token_page'], ENT_QUOTES, 'UTF-8') . '" />
</form>';
