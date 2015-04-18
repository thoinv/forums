<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__extraData['title'] = '';
$__extraData['title'] .= 'Upload Attachments';
$__output .= '

<form action="' . XenForo_Template_Helper_Core::link('attachments/do-upload', false, array()) . '" method="post" enctype="multipart/form-data" class="xenForm">
	
	';
if ($canUpload)
{
$__output .= '
		<dl class="ctrlUnit">
			<dt><label>' . 'Upload Attachments' . ':</label></dt>
			<dd><input type="file" name="upload" /></dd>
		</dl>
	';
}
$__output .= '
		
	';
if ($newAttachments)
{
$__output .= '
		<dl class="ctrlUnit">
			<dt><label>' . 'New Attachments' . ':</label></dt>
			<dd>
				<ul>
				';
foreach ($newAttachments AS $attachment)
{
$__output .= '
					<li>
						<a href="' . XenForo_Template_Helper_Core::link('attachments', $attachment, array()) . '">' . htmlspecialchars($attachment['filename'], ENT_QUOTES, 'UTF-8') . '</a>
						<input type="submit" name="delete[' . htmlspecialchars($attachment['attachment_id'], ENT_QUOTES, 'UTF-8') . ']" value="' . 'Delete' . '" class="button" />
					</li>
				';
}
$__output .= '
				</ul>
			</dd>
		</dl>
	';
}
$__output .= '

	';
if ($existingAttachments)
{
$__output .= '
		<dl class="ctrlUnit">
			<dt><label>' . 'Existing Attachments' . ':</label></dt>
			<dd>
				<ul>
				';
foreach ($existingAttachments AS $attachment)
{
$__output .= '
					<li>
						<a href="' . XenForo_Template_Helper_Core::link('attachments', $attachment, array()) . '">' . htmlspecialchars($attachment['filename'], ENT_QUOTES, 'UTF-8') . '</a>
						<input type="submit" name="delete[' . htmlspecialchars($attachment['attachment_id'], ENT_QUOTES, 'UTF-8') . ']" value="' . 'Delete' . '" class="button" />
					</li>
				';
}
$__output .= '
				</ul>
			</dd>
		</dl>
	';
}
$__output .= '

	<dl class="ctrlUnit submitUnit">
		<dt></dt>
		<dd><input type="submit" value="' . 'Upload Attachments' . '" accesskey="s" class="button primary" /></dd>
	</dl>

	<input type="hidden" name="_xfToken" value="' . htmlspecialchars($visitor['csrf_token_page'], ENT_QUOTES, 'UTF-8') . '" />
	<input type="hidden" name="hash" value="' . htmlspecialchars($hash, ENT_QUOTES, 'UTF-8') . '" />
	<input type="hidden" name="content_type" value="' . htmlspecialchars($contentType, ENT_QUOTES, 'UTF-8') . '" />
	<input type="hidden" name="key" value="' . htmlspecialchars($key, ENT_QUOTES, 'UTF-8') . '" />
	
	';
foreach ($contentData AS $dataKey => $dataValue)
{
$__output .= '
		<input type="hidden" name="content_data[' . htmlspecialchars($dataKey, ENT_QUOTES, 'UTF-8') . ']" value="' . htmlspecialchars($dataValue, ENT_QUOTES, 'UTF-8') . '" />
	';
}
$__output .= '
</form>';
