<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__extraData['title'] = '';
$__extraData['title'] .= 'Confirmation of removal from Collection';
$__output .= '

<form action="' . XenForo_Template_Helper_Core::link('gallery/videos/collection-remove', $content, array()) . '" method="post" class="xenForm formOverlay AutoValidator">

	<p>' . 'Please confirm that you want to remove this video from collection <b>' . htmlspecialchars($collection['title'], ENT_QUOTES, 'UTF-8') . '</b>' . '</p>
	
	<dl class="ctrlUnit submitUnit">
		<dt></dt>
		<dd>
			<input type="submit" value="' . 'Save' . '" class="button primary" />
		</dd>
	</dl>

	<input type="hidden" name="_xfToken" value="' . htmlspecialchars($visitor['csrf_token_page'], ENT_QUOTES, 'UTF-8') . '" />
	<input type="hidden" name="_xfConfirm" value="1" />
</form>';
