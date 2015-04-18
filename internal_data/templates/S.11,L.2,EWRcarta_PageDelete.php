<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__extraData['title'] = '';
$__extraData['title'] .= 'Delete Page' . ': ' . htmlspecialchars($page['page_name'], ENT_QUOTES, 'UTF-8');
$__output .= '

<form action="' . XenForo_Template_Helper_Core::link('wiki/delete', $page, array()) . '" method="post" class="xenForm formOverlay">

	<dl class="ctrlUnit">
		<dt>' . 'Delete Page' . '</dt>
		<dd>
			' . htmlspecialchars($page['page_name'], ENT_QUOTES, 'UTF-8') . '
			<p class="explain">' . 'Are you sure you wish to delete this page?<br />
Child pages will be moved to the parent node.' . '</p>
		</dd>
		<br /><br /><br />
		<dl class="ctrlUnit">
			<dt><label for="ctrl_parent">' . 'Parent Node' . ':</label></dt>
			<dd><select name="page_parent" id="ctrl_parent" class="textCtrl autoSize" ' . (($page['page_slug'] == ('index')) ? ('disabled') : ('')) . '>
				<option value="0">(' . 'Không xác định' . ')</option>
				';
foreach ($fullList AS $list)
{
$__output .= '
					<option value="' . htmlspecialchars($list['page_id'], ENT_QUOTES, 'UTF-8') . '"
						' . (($list['page_id'] == $page['page_parent']) ? ('selected') : ('')) . '
						' . (($list['disabled']) ? ('disabled') : ('')) . '>
						&nbsp; ' . $list['page_indent'] . $list['page_name'] . '
					</option>
				';
}
$__output .= '
			</select></dd>
		</dl>
	</dl>

	<dl class="ctrlUnit submitUnit">
		<dt></dt>
		<dd><input type="submit" value="' . 'Delete Page' . '" class="button primary" /></dd>
	</dl>

	<input type="hidden" name="_xfToken" value="' . htmlspecialchars($visitor['csrf_token_page'], ENT_QUOTES, 'UTF-8') . '" />
</form>';
