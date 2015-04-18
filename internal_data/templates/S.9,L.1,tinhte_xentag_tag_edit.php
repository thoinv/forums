<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__extraData['title'] = '';
$__extraData['title'] .= 'Edit Tag' . ': ' . htmlspecialchars($tag['tag_text'], ENT_QUOTES, 'UTF-8');
$__output .= '

';
$__extraData['navigation'] = array();
$__extraData['navigation'][] = array('href' => XenForo_Template_Helper_Core::link('tags', false, array()), 'value' => 'Tags');
$__extraData['navigation'][] = array('href' => XenForo_Template_Helper_Core::link('tags', $tag, array()), 'value' => htmlspecialchars($tag['tag_text'], ENT_QUOTES, 'UTF-8'));
$__output .= '

<form method="post" class="xenForm formOverlay" action="' . XenForo_Template_Helper_Core::link('tags/edit', $tag, array()) . '">

	<dl class="ctrlUnit">
		<dt><label for="ctrl_tag_title">' . 'Title' . ':</label></dt>
		<dd>
			<input type="text" name="tag_title" id="ctrl_tag_title" class="textCtrl" value="' . htmlspecialchars($tag['tag_title'], ENT_QUOTES, 'UTF-8') . '" />
		</dd>
	</dl>

	<dl class="ctrlUnit">
		<dt><label for="ctrl_tag_description">' . 'Description' . ':</label></dt>
		<dd>
			<textarea name="tag_description" id="ctrl_tag_description" rows="5" class="textCtrl Elastic">' . htmlspecialchars($tag['tag_description'], ENT_QUOTES, 'UTF-8') . '</textarea>
		</dd>
	</dl>

	<dl class="ctrlUnit">
		<dt>&nbsp;</dt>
		<dd>
			<label>
				<input type="checkbox" name="delete" value="1" />
				' . 'Delete' . '
			</label>
			<p class="explain">' . 'Check this box to delete the tag. All tagged contents will be updated to remove reference to this tag. This action cannot be undone.' . '</p>
		</dd>
	</dl>

	<dl class="ctrlUnit submitUnit">
		<dt></dt>
		<dd><input type="submit" name="save" value="' . 'Save' . '" accesskey="s" class="button primary" /></dd>
	</dl>

	<input type="hidden" name="tag_id" value="' . htmlspecialchars($tag['tag_id'], ENT_QUOTES, 'UTF-8') . '" />
	<input type="hidden" name="_xfToken" value="' . htmlspecialchars($visitor['csrf_token_page'], ENT_QUOTES, 'UTF-8') . '" />
	<input type="hidden" name="_xfConfirm" value="1" />
</form>';
