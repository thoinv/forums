<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__extraData['title'] = '';
$__extraData['title'] .= 'Photo "' . htmlspecialchars($content['title'], ENT_QUOTES, 'UTF-8') . '" In The Album "' . htmlspecialchars($album['title'], ENT_QUOTES, 'UTF-8') . '"';
$__output .= '
';
$__extraData['h1'] = '';
$__extraData['h1'] .= htmlspecialchars($album['title'], ENT_QUOTES, 'UTF-8');
$__output .= '
';
$__extraData['pageDescription'] = array();
$__extraData['pageDescription']['content'] = '';
if ($content['description'])
{
$__extraData['pageDescription']['content'] .= htmlspecialchars($content['description'], ENT_QUOTES, 'UTF-8');
}
else
{
$__extraData['pageDescription']['content'] .= htmlspecialchars($album['description'], ENT_QUOTES, 'UTF-8');
}
$__output .= '

';
$__extraData['head']['canonical'] = '';
$__extraData['head']['canonical'] .= '
	<link rel="canonical" href="' . XenForo_Template_Helper_Core::link('canonical:gallery/photos', $content, array(
'page' => $page
)) . '" />
';
$__output .= '

';
$__extraData['navigation'] = array();
$__extraData['navigation'] = XenForo_Template_Helper_Core::appendBreadCrumbs($__extraData['navigation'], $breadCrumbs);
$__output .= '

';
$this->addRequiredExternal('css', 'sonnb_xengallery_photo_exif');
$__output .= '

<div class="section">
	<div class="primaryContent">
		<div class="meta-data">
			<div class="photo-meta">
				<div class="meta-img">
					<span class="photo_container"> 
						<a href="' . XenForo_Template_Helper_Core::link('gallery/photos', $content, array()) . '"><img width="220" src="' . htmlspecialchars($content['thumbnailUrl'], ENT_QUOTES, 'UTF-8') . '" /></a>
					</span>
				</div>

				<div class="meta-info">
					<h2>' . 'What is EXIF data?' . '</h2>
					<p class="explain">' . 'Exif data is a record of the settings a camera used to take a photo or video. This information is embedded into the files the camera saves, and we read and display it here.' . '</p>
				</div>

			</div>
			<div class="photo-data">
				';
$__compilerVar3 = '';
$__compilerVar3 .= '
							';
if ($content['photo_exif']['DateTimeOriginal'])
{
$__compilerVar3 .= '
								<tr>
									<th>' . 'Taken on' . '</th>
									<td>' . XenForo_Template_Helper_Core::callHelper('datetimehtml', array($content['photo_exif']['DateTimeOriginal'],array(
'time' => '$content.photo_exif.DateTimeOriginal'
))) . '</td>
								</tr>
							';
}
$__compilerVar3 .= '
							<tr>
								<th>' . 'Posted to Gallery' . '</th>
								<td>' . XenForo_Template_Helper_Core::callHelper('datetimehtml', array($content['content_date'],array(
'time' => htmlspecialchars($content['content_date'], ENT_QUOTES, 'UTF-8')
))) . '</td>
							</tr>
							';
if (trim($__compilerVar3) !== '')
{
$__output .= '
					<h2>' . 'Dates' . '</h2>
					<table width="100%" cellspacing="0" cellpadding="0">
						<tbody>
							' . $__compilerVar3 . '
						</tbody>
					</table>
				';
}
unset($__compilerVar3);
$__output .= '

				';
$__compilerVar4 = '';
$__compilerVar4 .= '
							';
if ($content['photo_exif']['Model'])
{
$__compilerVar4 .= '
								<tr class="lookatme">
									<th>' . 'Camera' . '</th>
									<td><a href="' . XenForo_Template_Helper_Core::link('gallery/cameras', array(
'camera_url' => $content['photo_exif']['Model']
), array()) . '">' . htmlspecialchars($content['photo_exif']['Model'], ENT_QUOTES, 'UTF-8') . '</a></td>
								</tr>
							';
}
$__compilerVar4 .= '
							';
if ($content['photo_exif']['ExposureTime'])
{
$__compilerVar4 .= '
								<tr class="lookatme">
									<th>' . 'Exposure' . '</th>
									<td>' . htmlspecialchars($content['photo_exif']['ExposureTime'], ENT_QUOTES, 'UTF-8') . '</td>
								</tr>
							';
}
$__compilerVar4 .= '
							';
if ($content['photo_exif']['FNumber'])
{
$__compilerVar4 .= '
								<tr class="lookatme">
									<th>' . 'Aperture' . '</th>
									<td>' . $content['photo_exif']['FNumber'] . '</td>
								</tr>
							';
}
$__compilerVar4 .= '
							';
if ($content['photo_exif']['FocalLength'])
{
$__compilerVar4 .= '
								<tr class="lookatme">
									<th>' . 'Focal Length' . '</th>
									<td>' . htmlspecialchars($content['photo_exif']['FocalLength'], ENT_QUOTES, 'UTF-8') . '</td>
								</tr>
							';
}
$__compilerVar4 .= '
							';
if ($content['photo_exif']['ISOSpeedRatings'])
{
$__compilerVar4 .= '
								<tr>
									<th>' . 'ISO Speed' . '</th>
									<td>' . htmlspecialchars($content['photo_exif']['ISOSpeedRatings'], ENT_QUOTES, 'UTF-8') . '</td>
								</tr>
							';
}
$__compilerVar4 .= '
							';
if ($content['photo_exif']['ExposureProgram'])
{
$__compilerVar4 .= '
								<tr>
									<th>' . 'Exposure Program' . '</th>
									<td>' . htmlspecialchars($content['photo_exif']['ExposureProgram'], ENT_QUOTES, 'UTF-8') . '</td>
								</tr>
							';
}
$__compilerVar4 .= '
							';
if ($content['photo_exif']['Software'])
{
$__compilerVar4 .= '
								<tr>
									<th>' . 'Software' . '</th>
									<td>' . htmlspecialchars($content['photo_exif']['Software'], ENT_QUOTES, 'UTF-8') . '</td>
								</tr>
							';
}
$__compilerVar4 .= '
							';
if ($content['photo_exif']['DateTimeDigitized'])
{
$__compilerVar4 .= '
								<tr>
									<th>' . 'Date and Time (Modified)' . '</th>
									<td>' . XenForo_Template_Helper_Core::callHelper('datetimehtml', array($content['photo_exif']['DateTimeDigitized'],array(
'time' => htmlspecialchars($content['photo_exif']['DateTimeDigitized'], ENT_QUOTES, 'UTF-8')
))) . '</td>
								</tr>
							';
}
$__compilerVar4 .= '
							';
if ($content['photo_exif']['Artist'])
{
$__compilerVar4 .= '
								<tr>
									<th>' . 'Artist' . '</th>
									<td>' . htmlspecialchars($content['photo_exif']['Artist'], ENT_QUOTES, 'UTF-8') . '</td>
								</tr>
							';
}
$__compilerVar4 .= '
							';
if ($content['photo_exif']['Copyright'])
{
$__compilerVar4 .= '
								<tr>
									<th>' . 'Copyright' . '</th>
									<td>' . htmlspecialchars($content['photo_exif']['Copyright'], ENT_QUOTES, 'UTF-8') . '</td>
								</tr>
							';
}
$__compilerVar4 .= '
							';
if ($content['photo_exif']['ImageDescription'])
{
$__compilerVar4 .= '
								<tr>
									<th>' . 'Description' . '</th>
									<td>' . htmlspecialchars($content['photo_exif']['ImageDescription'], ENT_QUOTES, 'UTF-8') . '</td>
								</tr>
							';
}
$__compilerVar4 .= '
							';
if (trim($__compilerVar4) !== '')
{
$__output .= '
					<h2 class="data-data">' . 'Exif data' . '</h2>
					<table width="100%" cellspacing="0" cellpadding="0">
						<tbody>
							' . $__compilerVar4 . '
						</tbody>
					</table>
				';
}
unset($__compilerVar4);
$__output .= '
			</div>
		</div>
	</div>
</div>';
