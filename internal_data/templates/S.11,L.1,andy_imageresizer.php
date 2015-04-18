<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__output .= 'Total attachments over maximum:' . ' ' . htmlspecialchars($attachCount, ENT_QUOTES, 'UTF-8') . '
<br /><br />
' . 'Max Width:' . ' ' . htmlspecialchars($maximumWidth, ENT_QUOTES, 'UTF-8') . '
<br />
' . 'Max Height:' . ' ' . htmlspecialchars($maximumHeight, ENT_QUOTES, 'UTF-8') . '
<br />
' . 'Action' . ': ' . htmlspecialchars($action, ENT_QUOTES, 'UTF-8') . ' 
<br />
' . 'Limit' . ': ' . htmlspecialchars($limit, ENT_QUOTES, 'UTF-8') . '
<br /><br />
' . 'Order by: Width and Data ID' . '
<br /><br />

<a href="' . XenForo_Template_Helper_Core::link('imageresizer/update', '', array(
'limit' => $limit
)) . '" rel="nofollow">' . 'Update' . ' ' . htmlspecialchars($limit, ENT_QUOTES, 'UTF-8') . ' ' . 'attachments' . '</a>

<br /><br />

<table class="dataTable">

<tr class="dataRow">
<th>' . 'Attachment ID' . '</th>
<th>' . 'Data ID' . '</th>
<th>' . 'Content Type' . '</th>
<th>' . 'Content ID' . '</th>
<th>' . 'Member' . '</th>
<th>' . 'Size' . '</th>
<th>' . 'Width' . '</th>
<th>' . 'Height' . '</th>
</tr>

';
foreach ($attachments AS $attachment)
{
$__output .= '
<tr class="dataRow">
<td>' . htmlspecialchars($attachment['attachment_id'], ENT_QUOTES, 'UTF-8') . '</td>
<td>' . htmlspecialchars($attachment['data_id'], ENT_QUOTES, 'UTF-8') . '</td>
<td>' . htmlspecialchars($attachment['content_type'], ENT_QUOTES, 'UTF-8') . '</td>
';
if ($attachment['content_type'] == ('post'))
{
$__output .= '
<td><a href="' . XenForo_Template_Helper_Core::link('posts/' . htmlspecialchars($attachment['content_id'], ENT_QUOTES, 'UTF-8'), false, array()) . '" />' . htmlspecialchars($attachment['content_id'], ENT_QUOTES, 'UTF-8') . '</a></td>
';
}
$__output .= '
';
if ($attachment['content_type'] == ('conversation_message'))
{
$__output .= '
<td>' . htmlspecialchars($attachment['content_id'], ENT_QUOTES, 'UTF-8') . '</td>
';
}
$__output .= '
<td>' . htmlspecialchars($attachment['username'], ENT_QUOTES, 'UTF-8') . '</td>
<td>' . htmlspecialchars($attachment['file_size'], ENT_QUOTES, 'UTF-8') . '</td>
<td>' . htmlspecialchars($attachment['width'], ENT_QUOTES, 'UTF-8') . '</td>
<td>' . htmlspecialchars($attachment['height'], ENT_QUOTES, 'UTF-8') . '</td>
</tr>
';
}
$__output .= '

</table>';
