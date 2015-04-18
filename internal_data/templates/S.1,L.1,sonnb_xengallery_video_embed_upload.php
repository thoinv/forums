<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__extraData['title'] = '';
$__extraData['title'] .= 'Embed Videos';
$__output .= '

';
$__extraData['navigation'] = array();
$__extraData['navigation'] = XenForo_Template_Helper_Core::appendBreadCrumbs($__extraData['navigation'], $breadCrumbs);
$__output .= '

';
$__extraData['head']['robots'] = '';
$__extraData['head']['robots'] .= '
	<meta name="robots" content="noindex" />
';
$__output .= '

';
$this->addRequiredExternal('css', 'sonnb_xengallery_video_embed_upload');
$__output .= '
';
$this->addRequiredExternal('js', 'js/sonnb/XenGallery/gallery.contentuploader.js');
$__output .= '

<form class="formOverlay xenForm formEmbedVideo" method="POST" action="' . XenForo_Template_Helper_Core::link('gallery/videos/embed-video', false, array()) . '">
	<dl class="ctrlUnit">
		<dt>' . 'Enter media URL' . ':</dt>
		<dd><input type="text" name="url" class="textCtrl" />
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
			<input type="submit" name="insert" class="button primary" value="' . 'Insert' . '" />
		</dd>
	</dl>
	
	<input type="hidden" name="_xfToken" value="' . htmlspecialchars($visitor['csrf_token_page'], ENT_QUOTES, 'UTF-8') . '" />
	<input type="hidden" name="content_data_hash" value="' . htmlspecialchars($contentDataParams['hash'], ENT_QUOTES, 'UTF-8') . '" />
	<input type="hidden" name="album_id" value="' . htmlspecialchars($contentDataParams['album_id'], ENT_QUOTES, 'UTF-8') . '" />
</form>';
