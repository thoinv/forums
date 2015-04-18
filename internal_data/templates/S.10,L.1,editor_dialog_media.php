<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__output .= '<dl class="ctrlUnit">
	<dt>' . 'Enter media URL' . ':</dt>
	<dd><input type="text" id="redactor_media_link" class="textCtrl" />
		<div class="explain listInline commaImplode">
			' . 'You may embed media from the following sites' . ':
			<ul>
			';
$i = 0;
$totalSites = count($sites);
foreach ($sites AS $site)
{
$i++;
$__output .= '
				';
if ($site['supported'])
{
$__output .= '
					<li><a href="' . htmlspecialchars($site['site_url'], ENT_QUOTES, 'UTF-8') . '" target="_blank" rel="nofollow">' . htmlspecialchars($site['site_title'], ENT_QUOTES, 'UTF-8') . '</a></li>
				';
}
$__output .= '
			';
}
$__output .= '
			</ul>
		</div>
	</dd>
</dl>

<dl class="ctrlUnit submitUnit">
	<dt></dt>
	<dd>
		<input type="button" name="upload" class="redactor_modal_btn button primary" id="redactor_insert_media_btn" value="' . 'Embed' . '" />
		<a href="javascript:void(null);" class="redactor_modal_btn redactor_btn_modal_close button">' . 'Cancel' . '</a>
	</dd>
</dd>';
