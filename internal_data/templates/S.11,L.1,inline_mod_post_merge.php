<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__extraData['title'] = '';
$__extraData['title'] .= 'Inline Moderation - Merge Posts';
$__output .= '

<form action="' . XenForo_Template_Helper_Core::link('inline-mod/post/merge', false, array()) . '" method="post" class="xenForm formOverlay">
	<p>' . 'Are you sure you want to merge ' . htmlspecialchars($postCount, ENT_QUOTES, 'UTF-8') . ' posts together?' . '</p>

	<dl class="ctrlUnit">
		<dt><label for="ctrl_target_post_id">' . 'Merge into Post' . ':</label></dt>
		<dd>
			<select name="target_post_id" id="ctrl_target_post_id" class="textCtrl">
			';
foreach ($posts AS $post)
{
$__output .= '
				<option value="' . htmlspecialchars($post['post_id'], ENT_QUOTES, 'UTF-8') . '">' . htmlspecialchars($post['username'], ENT_QUOTES, 'UTF-8') . ', ' . XenForo_Template_Helper_Core::datetime($post['post_date'], 'absolute') . '</option>
			';
}
$__output .= '
			</select>
		</dd>
	</dl>

	<dl class="ctrlUnit fullWidth surplusLabel">
		<dt><label for="ctrl_new_message">' . 'Merged Message' . ':</label></dt>
		<dd>' . $editorTemplate . '</dd>
	</dl>

	<dl class="ctrlUnit submitUnit">
		<dt></dt>
		<dd><input type="submit" name="save" value="' . 'Merge Posts' . '" accesskey="s" class="button primary" /></dd>
	</dl>

	';
foreach ($postIds AS $postId)
{
$__output .= '
		<input type="hidden" name="posts[]" value="' . htmlspecialchars($postId, ENT_QUOTES, 'UTF-8') . '" />
	';
}
$__output .= '

	<input type="hidden" name="_xfConfirm" value="1" />
	<input type="hidden" name="redirect" value="' . htmlspecialchars($redirect, ENT_QUOTES, 'UTF-8') . '" />
	<input type="hidden" name="_xfToken" value="' . htmlspecialchars($visitor['csrf_token_page'], ENT_QUOTES, 'UTF-8') . '" />
</form>';
