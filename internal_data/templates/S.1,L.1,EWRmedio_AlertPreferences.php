<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__output .= '<h3 class="sectionHeader">' . 'Media' . '</h3>
<dl class="ctrlUnit">
	<dt>' . 'Receive an alert when someone' . '...</dt>
	<dd>
		<ul>
			<li><input type="hidden" name="alertSet[media_comment_insert]" value="1" />
				<label><input type="checkbox" value="1" name="alert[media_comment_insert]" ' . ((!$alertOptOuts['media_comment_insert']) ? ' checked="checked"' : '') . ' /> ' . 'Replies to a watched media' . '</label>
				<p class="hint">' . 'Someone replies to a media you are watching' . '</p>
			</li>
			<li><input type="hidden" name="alertSet[media_like]" value="1" />
				<label><input type="checkbox" value="1" name="alert[media_like]" ' . ((!$alertOptOuts['media_like']) ? ' checked="checked"' : '') . ' /> ' . 'Likes your media' . '</label>
				<p class="hint">' . 'Someone likes one of your media' . '</p>
			</li>
		</ul>
	</dd>
</dl>';
