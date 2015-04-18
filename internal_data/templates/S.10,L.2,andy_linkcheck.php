<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__extraData['title'] = '';
$__extraData['title'] .= 'Link Check';
$__output .= '

' . 'Limit' . ': ' . htmlspecialchars($limit, ENT_QUOTES, 'UTF-8') . '
<br />
' . 'Offset' . ': ' . htmlspecialchars($offset, ENT_QUOTES, 'UTF-8') . '

<table class="dataTable">
<tr class="dataRow">
<th>' . 'Đăng' . '</th>
<th>' . 'Date' . '</th>
<th>' . 'Tên chủ đề' . '</th>
<th>' . 'Status' . '</th>
<th>' . 'URL' . '</th>
</tr>

';
foreach ($posts AS $post)
{
$__output .= '
<tr class="dataRow">
<td><a href="' . XenForo_Template_Helper_Core::link('posts', $post, array()) . '" target="_blank" />' . htmlspecialchars($post['post_id'], ENT_QUOTES, 'UTF-8') . '</a></td>
<td>' . XenForo_Template_Helper_Core::datetime($post['post_date'], '') . '</td>
<td>' . htmlspecialchars($post['title'], ENT_QUOTES, 'UTF-8') . '</td>
<td>' . htmlspecialchars($post['status'], ENT_QUOTES, 'UTF-8') . '</td>
<td><a href="' . htmlspecialchars($post['url'], ENT_QUOTES, 'UTF-8') . '" target="_blank" />' . htmlspecialchars($post['url'], ENT_QUOTES, 'UTF-8') . '</a></td>
</tr>
';
}
$__output .= '
</table>';
