<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__extraData['title'] = '';
$__extraData['title'] .= 'Photo "' . htmlspecialchars($content['title'], ENT_QUOTES, 'UTF-8') . '" in the album "' . htmlspecialchars($album['title'], ENT_QUOTES, 'UTF-8') . '" by ' . htmlspecialchars($content['username'], ENT_QUOTES, 'UTF-8') . '' . XenForo_Template_Helper_Core::callHelper('pagenumber', array(
'0' => $page
));
$__output .= '
';
$__extraData['h1'] = '';
$__output .= '

';
$__extraData['head']['openGraph'] = '';
$__extraData['head']['openGraph'] .= '
	';
if ($xenOptions['facebookAppId'] OR $xenOptions['facebookAdmins'])
{
$__extraData['head']['openGraph'] .= '
		';
$__compilerVar1 = '';
$__compilerVar1 .= XenForo_Template_Helper_Core::link('canonical:gallery/photos', $content, array());
$__compilerVar2 = '';
$__compilerVar2 .= XenForo_Template_Helper_Core::callHelper('striphtml', array(
'0' => 'Photo "' . $content['title'] . '" in the album "' . $album['title'] . '" by ' . $content['username'] . ''
));
$__compilerVar3 = '';
$__compilerVar3 .= '
				<meta property="og:image" content="' . XenForo_Template_Helper_Core::callHelper('fullurl', array(
'0' => $content['contentUrl'],
'1' => 'true'
)) . '" />
				<meta property="og:description" content="' . XenForo_Template_Helper_Core::callHelper('striphtml', array(
'0' => (($content['description']) ? ($content['description']) : ($album['description']))
)) . '" />
			';
$__compilerVar4 = '';
if ($xenOptions['facebookAppId'] OR $xenOptions['facebookAdmins'])
{
$__compilerVar4 .= '
	<meta property="og:site_name" content="' . htmlspecialchars($xenOptions['boardTitle'], ENT_QUOTES, 'UTF-8') . '" />
	';
if ($avatar)
{
$__compilerVar4 .= '<meta property="og:image" content="' . htmlspecialchars($avatar, ENT_QUOTES, 'UTF-8') . '" />';
}
$__compilerVar4 .= '
	<meta property="og:image" content="';
$__compilerVar5 = '';
$__compilerVar5 .= XenForo_Template_Helper_Core::callHelper('fullurl', array(
'0' => XenForo_Template_Helper_Core::styleProperty('ogLogoPath'),
'1' => '1'
));
$__compilerVar4 .= $this->callTemplateCallback('OpenGraphImage_Callback', 'getImage', $__compilerVar5, array());
unset($__compilerVar5);
$__compilerVar4 .= '" />
	<meta property="og:type" content="' . (($ogType) ? (htmlspecialchars($ogType, ENT_QUOTES, 'UTF-8')) : ('article')) . '" />
	<meta property="og:url" content="' . $__compilerVar1 . '" />
	<meta property="og:title" content="' . $__compilerVar2 . '" />
	';
if ($description)
{
$__compilerVar4 .= '<meta property="og:description" content="' . $description . '" />';
}
$__compilerVar4 .= '
	' . $__compilerVar3 . '
	';
if ($xenOptions['facebookAppId'])
{
$__compilerVar4 .= '<meta property="fb:app_id" content="' . htmlspecialchars($xenOptions['facebookAppId'], ENT_QUOTES, 'UTF-8') . '" />';
}
$__compilerVar4 .= '
	';
if ($xenOptions['facebookAdmins'])
{
$__compilerVar4 .= '<meta property="fb:admins" content="' . XenForo_Template_Helper_Core::callHelper('implode', array(
'0' => $xenOptions['facebookAdmins'],
'1' => ','
)) . '" />';
}
$__compilerVar4 .= '
';
}
$__extraData['head']['openGraph'] .= $__compilerVar4;
unset($__compilerVar1, $__compilerVar2, $__compilerVar3, $__compilerVar4);
$__extraData['head']['openGraph'] .= '
	';
}
else
{
$__extraData['head']['openGraph'] .= '
		<meta property="og:image" content="' . XenForo_Template_Helper_Core::callHelper('fullurl', array(
'0' => $content['contentUrl'],
'1' => 'true'
)) . '" />
		<meta property="og:type" content="article" />
		<meta property="og:url" content="' . XenForo_Template_Helper_Core::link('canonical:gallery/photos', $content, array()) . '" />
		<meta property="og:title" content="' . XenForo_Template_Helper_Core::callHelper('striphtml', array(
'0' => 'Photo "' . $content['title'] . '" in the album "' . $album['title'] . '" by ' . $content['username'] . ''
)) . '" />
		<meta property="og:description" content="' . XenForo_Template_Helper_Core::callHelper('striphtml', array(
'0' => (($content['description']) ? ($content['description']) : ($album['description']))
)) . '" />
	';
}
$__extraData['head']['openGraph'] .= '
';
$__output .= '
';
$__compilerVar6 = '';
$__extraData['head']['twitterCard'] = '';
$__extraData['head']['twitterCard'] .= '
	<meta name="twitter:card" content="photo">
	<meta name="twitter:title" content="' . (($content['description']) ? (htmlspecialchars($content['description'], ENT_QUOTES, 'UTF-8')) : (htmlspecialchars($album['title'], ENT_QUOTES, 'UTF-8'))) . '">
	<meta name="twitter:image" content="' . XenForo_Template_Helper_Core::callHelper('fullurl', array(
'0' => $content['contentUrl'],
'1' => 'true'
)) . '">
	<meta name="twitter:image:width" content="' . htmlspecialchars($content['large_width'], ENT_QUOTES, 'UTF-8') . '">
	<meta name="twitter:image:height" content="' . htmlspecialchars($content['large_height'], ENT_QUOTES, 'UTF-8') . '">
';
$__output .= $__compilerVar6;
unset($__compilerVar6);
$__output .= '

';
$__extraData['searchBar']['photo'] = '';
$__compilerVar7 = '';
$__compilerVar7 .= '<label><input type="checkbox" name="type[sonnb_xengallery_photo][null]" value="" checked="checked" id="search_bar_photo" /> ' . 'Search photos only' . '</label>

';
if ($xenOptions['sonnbXG_advSearch'] && !$xenOptions['sonnb_XG_disableCamera'])
{
$__compilerVar7 .= '
	<fieldset>
		<dl class="ctrlUnit">
			<dt><label for="ctrl_meta_camera">' . 'Camera' . ':</label></dt>
			<dd>
				<input placeholder="' . 'Type camera\'s name for suggestion' . '..." type="search" name="type[sonnb_xengallery_photo][camera]" value="' . htmlspecialchars($search['camera'], ENT_QUOTES, 'UTF-8') . '" class="textCtrl AutoComplete AcSingle" id="ctrl_meta_camera" data-acurl="' . XenForo_Template_Helper_Core::link('gallery/cameras/find', '', array(
'_xfResponseType' => 'json'
)) . '" autocomplete="off" />
			</dd>
		</dl>
		<dl class="ctrlUnit">
			<dt><label for="ctrl_meta_exposure">' . 'Exposure' . ':</label></dt>
			<dd>
				<input placeholder="' . 'Shutter Speed. Ex: 1/200' . '..." type="search" name="type[sonnb_xengallery_photo][exposure]" value="' . htmlspecialchars($search['exposure'], ENT_QUOTES, 'UTF-8') . '" class="textCtrl" id="ctrl_meta_exposure" />
			</dd>
		</dl>
		<dl class="ctrlUnit">
			<dt><label for="ctrl_meta_aperture">' . 'Aperture' . ':</label></dt>
			<dd>
				<input placeholder="' . 'F value. Ex: 1.8 (means f/1.8).' . '..." type="search" name="type[sonnb_xengallery_photo][aperture]" value="' . htmlspecialchars($search['aperture'], ENT_QUOTES, 'UTF-8') . '" class="textCtrl" id="ctrl_meta_aperture" />
			</dd>
		</dl>
		<dl class="ctrlUnit">
			<dt><label for="ctrl_meta_focal_length">' . 'Focal Length' . ':</label></dt>
			<dd>
				<input placeholder="' . 'Focal Length: Ex: 85 (means 85mm)' . '..." type="search" name="type[sonnb_xengallery_photo][focal]" value="' . htmlspecialchars($search['focal'], ENT_QUOTES, 'UTF-8') . '" class="textCtrl" id="ctrl_meta_focal_length" />
			</dd>
		</dl>
		<dl class="ctrlUnit">
			<dt><label for="ctrl_meta_iso_speed">' . 'ISO Speed' . ':</label></dt>
			<dd>
				<input placeholder="' . 'ISO Speed. Ex: 200' . '..." type="search" name="type[sonnb_xengallery_photo][iso]" value="' . htmlspecialchars($search['iso'], ENT_QUOTES, 'UTF-8') . '" class="textCtrl" id="ctrl_meta_iso_speed" />
			</dd>
		</dl>
	</fieldset>
';
}
$__extraData['searchBar']['photo'] .= $__compilerVar7;
unset($__compilerVar7);
$__output .= '

';
$__extraData['head']['canonical'] = '';
$__extraData['head']['canonical'] .= '
	<link rel="canonical" href="' . XenForo_Template_Helper_Core::link('canonical:gallery/photos', $content, array(
'page' => $page
)) . '" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
	<meta name="apple-mobile-web-app-capable" content="yes" />
';
$__output .= '

';
$__extraData['navigation'] = array();
$__extraData['navigation'] = XenForo_Template_Helper_Core::appendBreadCrumbs($__extraData['navigation'], $breadCrumbs);
$__output .= '

';
$this->addRequiredExternal('css', 'sonnb_xengallery_photo_view');
$__output .= '

';
$this->addRequiredExternal('js', 'js/sonnb/XenGallery/gallery.mobile.js');
$__output .= '
';
$this->addRequiredExternal('js', 'js/sonnb/XenGallery/gallery.js');
$__output .= '
';
$this->addRequiredExternal('js', 'js/sonnb/XenGallery/gallery.overlay.js');
$__output .= '
';
$this->addRequiredExternal('js', 'js/sonnb/XenGallery/jquery.phototag.min.js');
$__output .= '

';
if ($includeTaggerJs AND $content['canComment'])
{
$__output .= '
    ';
$this->addRequiredExternal('js', 'js/sonnb/XenGallery/gallery.usertagger.js');
$__output .= '
';
}
$__output .= '

';
if ($content['canPromote'] || $content['canEdit'])
{
$__output .= '
	';
$promoteButton = '';
$promoteButton .= '
		';
if (!$xenOptions['sonnbXG_disableCollection'] && $content['canPromote'])
{
$promoteButton .= '
			<a href="' . XenForo_Template_Helper_Core::link('gallery/photos/collection-edit', $content, array()) . '" class="callToAction OverlayTrigger" data-cacheOverlay="false"><span>' . (($content['collection_id']) ? ('Change Collection') : ('Add To A Collection')) . '</span></a>
		';
}
$promoteButton .= '
		';
if ($content['canEdit'])
{
$promoteButton .= '
			<a href="' . XenForo_Template_Helper_Core::link('gallery/photos/edit', $content, array()) . '" class="callToAction OverlayTrigger" data-cacheOverlay="false" data-overlayOptions="{&quot;fixed&quot;:false}"><span>' . 'Edit' . '</span></a>
		';
}
$promoteButton .= '
	';
$__output .= '
	';
$__extraData['topctrl'] = '';
$__extraData['topctrl'] .= $promoteButton;
$__output .= '
';
}
$__output .= '

';
if ($content['title'] AND $content['title'] != $content['content_id'])
{
$__output .= '
<div class="titleBar"> 
	<h1 itemprop="name">' . htmlspecialchars($content['title'], ENT_QUOTES, 'UTF-8') . '</h1>
</div>
';
}
$__output .= '

';
if ($content['isDeleted'])
{
$__output .= '
	<p class="importantMessage">' . 'This photo has been deleted.' . '</p>
';
}
$__output .= '
';
if ($content['isModerated'])
{
$__output .= '
	<p class="importantMessage">' . 'Awaiting moderation before being displayed publicly.' . '</p>
';
}
$__output .= '

<div class="pvContentWrapper" itemscope="itemscope" itemtype="http://schema.org/ImageObject">

	<meta itemprop="caption" content="' . htmlspecialchars($content['description'], ENT_QUOTES, 'UTF-8') . '">
	<meta itemprop="publisher" content="' . htmlspecialchars($content['username'], ENT_QUOTES, 'UTF-8') . '">
	<meta itemprop="description" content="' . htmlspecialchars($content['description'], ENT_QUOTES, 'UTF-8') . '">
	<meta itemprop="representativeOfPage" content="true">
	<meta itemprop="contentSize" content="' . htmlspecialchars($content['file_size'], ENT_QUOTES, 'UTF-8') . '">
	<meta itemprop="encodingFormat" content="' . htmlspecialchars($content['extension'], ENT_QUOTES, 'UTF-8') . '">
	<meta itemprop="height" content="' . htmlspecialchars($content['height'], ENT_QUOTES, 'UTF-8') . '">
	<meta itemprop="width" content="' . htmlspecialchars($content['width'], ENT_QUOTES, 'UTF-8') . '">
	<meta itemprop="uploadDate" content="' . XenForo_Template_Helper_Core::datetime($content['content_date'], '') . '">
	<meta itemprop="datePublished" content="' . XenForo_Template_Helper_Core::datetime($content['content_date'], '') . '">

	<div class="pvContentInner clearfix">
		<div class="photoWrapper" id="photoTag-canvas_' . htmlspecialchars($content['content_id'], ENT_QUOTES, 'UTF-8') . '" ' . (($content['height'] < 250) ? ('style="display: table; height: 250px;"') : ('')) . '>
			<div class="pwPhoto photoTag-wrap" id="photoTag-wrap_' . htmlspecialchars($content['content_id'], ENT_QUOTES, 'UTF-8') . '">
				<a data-role="page" class="prevPhoto ' . (($prevContent) ? ('hasPhoto') : ('')) . '" href="' . (($prevContent) ? (htmlspecialchars($prevContent['url'], ENT_QUOTES, 'UTF-8')) : (htmlspecialchars($requestPaths['requestUri'], ENT_QUOTES, 'UTF-8') . '#')) . '"><i></i></a>
				<img title="' . XenForo_Template_Helper_Core::callHelper('wordTrim', array(
'0' => $content['description'],
'1' => '100'
)) . '" alt="' . XenForo_Template_Helper_Core::callHelper('wordTrim', array(
'0' => $content['description'],
'1' => '100'
)) . '"
				class="photo lazy" data-lazy="' . htmlspecialchars($content['thumbnailUrl'], ENT_QUOTES, 'UTF-8') . '" data-src="' . htmlspecialchars($content['contentUrl'], ENT_QUOTES, 'UTF-8') . '"
				data-width="' . htmlspecialchars($content['large_width'], ENT_QUOTES, 'UTF-8') . '" data-height="' . htmlspecialchars($content['large_height'], ENT_QUOTES, 'UTF-8') . '"
				data-tagrequesturl="' . XenForo_Template_Helper_Core::link('canonical:gallery/photos/tags', $content, array()) . '"
				data-tagdeleteurl="' . (($content['canEdit']) ? (XenForo_Template_Helper_Core::link('canonical:gallery/tags/delete', false, array())) : ('')) . '"
				data-tagaddurl="' . (($content['canEdit']) ? (XenForo_Template_Helper_Core::link('canonical:gallery/photos/tag', $content, array())) : ('')) . '"
				data-savephrase="' . 'Save' . '"  data-imagewrapper=".pvContentInner"
				data-cancelphrase="' . 'Cancel' . '" />
				<noscript><img title="' . XenForo_Template_Helper_Core::callHelper('wordTrim', array(
'0' => $content['description'],
'1' => '100'
)) . '" alt="' . XenForo_Template_Helper_Core::callHelper('wordTrim', array(
'0' => $content['description'],
'1' => '100'
)) . '" class="photo" src="' . htmlspecialchars($content['contentUrl'], ENT_QUOTES, 'UTF-8') . '" /></noscript>
				<a data-role="page" class="nextPhoto ' . (($nextContent) ? ('hasPhoto') : ('')) . '" href="' . (($nextContent) ? (htmlspecialchars($nextContent['url'], ENT_QUOTES, 'UTF-8')) : (htmlspecialchars($requestPaths['requestUri'], ENT_QUOTES, 'UTF-8') . '#')) . '"><i></i></a>
			</div>
			<div class="photoTag-cpanel" id="photoTag-cpanel_' . htmlspecialchars($content['content_id'], ENT_QUOTES, 'UTF-8') . '">' . 'Click on the photo to start tagging.' . ' <a href="' . htmlspecialchars($requestPath['requestUri'], ENT_QUOTES, 'UTF-8') . '#">' . 'Done Tagging' . '</a></div>
			<div class="pwPhotoActions">
				';
if (XenForo_Template_Helper_Core::styleProperty('sonnbXG_enableOverlay'))
{
$__output .= '
					<a data-target="div.pvContentWrapper" rel="nofollow" href="' . XenForo_Template_Helper_Core::link('gallery/photos', $content, array()) . '" class="action fullscreen" title="' . 'Enter fullscreen mode' . '">
						<i></i>
					</a>
				';
}
$__output .= '
				<a rel="nofollow" href="' . XenForo_Template_Helper_Core::link('gallery/photos/share', $content, array()) . '" class="action share" title="' . 'Share this photo with your friends.' . '">
					<i></i>
				</a>
				';
if ($content['canLike'])
{
$__output .= '
					<a rel="nofollow" href="' . XenForo_Template_Helper_Core::link('gallery/photos/like', $content, array()) . '" class="action like ' . (($content['like_date']) ? ('active') : ('')) . '" title="' . (($content['like_date']) ? ('Unlike this photo') : ('Like this photo')) . '">
						<i></i>
					</a>
				';
}
$__output .= '
				';
if ($content['canComment'])
{
$__output .= '
					<a rel="nofollow" href="' . XenForo_Template_Helper_Core::link('gallery/photos/comment', $content, array()) . '" class="action comment" title="' . 'Leave a comment' . '">
						<i></i>
					</a>
				';
}
$__output .= '
				';
if ($content['canEdit'])
{
$__output .= '
					<a rel="nofollow" href="' . htmlspecialchars($requestPaths['requestUri'], ENT_QUOTES, 'UTF-8') . '#" class="action tag addTag" title="' . 'Tag This Photo' . '">
						<i></i>
					</a>
				';
}
$__output .= '
			</div>
		</div>
		';
if ($relatedContents)
{
$__output .= '
			<h4>' . 'In This Album' . '</h4>
			<div class="relatedPhotos">
				<a class="prev browse left"><span></span></a>
				<div class="scrollable" id="scrollable">
					<div class="items">
						';
foreach ($relatedContents AS $related)
{
$__output .= '
							<a ' . (($related['content_id'] == $content['content_id']) ? ('class="active"') : ('')) . ' title="' . htmlspecialchars($related['title'], ENT_QUOTES, 'UTF-8') . '" href="' . htmlspecialchars($related['url'], ENT_QUOTES, 'UTF-8') . '"><img alt="' . htmlspecialchars($related['title'], ENT_QUOTES, 'UTF-8') . '" src="' . (($related['thumbnailSmall']) ? (htmlspecialchars($related['thumbnailSmall'], ENT_QUOTES, 'UTF-8')) : (htmlspecialchars($related['thumbnailUrl'], ENT_QUOTES, 'UTF-8'))) . '" /></a>
						';
}
$__output .= '
					</div>
				</div>
				<a class="next browse right"><span></span></a>
			</div>
		';
}
$__output .= '
		<div class="commentWrapper">
			<div class="cwHeader">
				<div class="cwhControls">
				</div>
			</div>
			<div class="commentContainer">
				';
$this->addRequiredExternal('js', 'js/xenforo/comments_simple.js');
$__output .= '

				';
$__compilerVar8 = '';
$__compilerVar8 .= 'content-' . htmlspecialchars($content['content_id'], ENT_QUOTES, 'UTF-8');
$__compilerVar9 = '';
$__compilerVar9 .= '
						<div class="locationContainer muted">
							';
if (!$xenOptions['sonnb_XG_disableLocation'] && $content['content_location'])
{
$__compilerVar9 .= '
								<span class="photoLocation">' . 'Taken at' . ' <a itemprop="contentLocation" target="_blank" href="' . XenForo_Template_Helper_Core::link('gallery/locations', array(
'location_url' => $content['content_location']
), array()) . '">' . htmlspecialchars($content['content_location'], ENT_QUOTES, 'UTF-8') . '</a></span>
							';
}
$__compilerVar9 .= '
							
							<span class="photoTag-list">';
if ($content['tagUsers'])
{
$__compilerVar9 .= '<br/>' . XenForo_Template_Helper_Core::callHelper('sonnb_xengallery_tag', array(
'0' => $content['tagUsers'],
'1' => XenForo_Template_Helper_Core::link('gallery/photos/tags', $content, array(), false)
));
}
$__compilerVar9 .= '</span>
							
							';
if (!$xenOptions['sonnb_XG_disableCamera'] && $content['photo_exif']['Model'])
{
$__compilerVar9 .= '
								<div class="cameraContainer">
									<meta itemprop="exifData" content="' . htmlspecialchars($content['photo_exif']['Model'], ENT_QUOTES, 'UTF-8') . '">
									<span class="exifData">' . 'Using <a href="' . XenForo_Template_Helper_Core::link('gallery/cameras', array(
'camera_url' => $content['photo_exif']['Model']
), array()) . '" >' . htmlspecialchars($content['photo_exif']['Model'], ENT_QUOTES, 'UTF-8') . '</a>' . '</span>
								</div>	
							';
}
$__compilerVar9 .= '
						</div>

						<div id="fieldList-content-' . htmlspecialchars($content['content_id'], ENT_QUOTES, 'UTF-8') . '" class="fieldListContainer">
							';
if ($fields)
{
$__compilerVar9 .= '
								';
foreach ($fields AS $field)
{
$__compilerVar9 .= '
									';
$__compilerVar10 = '';
$__compilerVar11 = '';
$__compilerVar11 .= '
			';
if (is_array($field['fieldValueHtml']))
{
$__compilerVar11 .= '
				<ul>
				';
foreach ($field['fieldValueHtml'] AS $_fieldValueHtml)
{
$__compilerVar11 .= '
					<li>' . $_fieldValueHtml . '</li>
				';
}
$__compilerVar11 .= '
				</ul>
			';
}
else
{
$__compilerVar11 .= '
				' . $field['fieldValueHtml'] . '
			';
}
$__compilerVar11 .= '
		';
if (trim($__compilerVar11) !== '')
{
$__compilerVar10 .= '
	<dl class="ctrlUnit">
		<dt class="muted">' . htmlspecialchars($field['title'], ENT_QUOTES, 'UTF-8') . ':</dt> 
		<dd>' . $__compilerVar11 . '</dd>
	</dl>
';
}
unset($__compilerVar11);
$__compilerVar9 .= $__compilerVar10;
unset($__compilerVar10);
$__compilerVar9 .= '
								';
}
$__compilerVar9 .= '
							';
}
$__compilerVar9 .= '
						</div>
					';
$__compilerVar12 = '';
$__compilerVar12 .= '

						<div class="messageMeta">
								<div class="privateControls">
									<a itemprop="contentURL" href="' . XenForo_Template_Helper_Core::link('gallery/photos', $content, array()) . '" title="' . 'Permalink' . '" class="item muted">' . XenForo_Template_Helper_Core::callHelper('datetimehtml', array($content['content_date'],array(
'time' => '$content.content_date'
))) . '</a>
									';
$__compilerVar13 = '';
$__compilerVar13 .= '
										';
if ($content['canEdit'])
{
$__compilerVar13 .= '
											<a href="' . XenForo_Template_Helper_Core::link('gallery/photos/edit', $content, array()) . '" class="item control edit NoOverlay OverlayTrigger" data-cacheOverlay="false" data-overlayOptions="{&quot;fixed&quot;:false}"><span></span>' . 'Edit' . '</a>
										';
}
$__compilerVar13 .= '
										';
if ($content['canDelete'])
{
$__compilerVar13 .= '
											<a href="' . XenForo_Template_Helper_Core::link('gallery/photos/delete', $content, array()) . '" class="item OverlayTrigger control delete"><span></span>' . 'Delete' . '</a>
										';
}
$__compilerVar13 .= '
										';
if ($content['canReport'])
{
$__compilerVar13 .= '
											<a href="' . XenForo_Template_Helper_Core::link('gallery/photos/report', $content, array()) . '" class="OverlayTrigger item control report" data-cacheOverlay="false"><span></span>' . 'Report' . '</a>
										';
}
$__compilerVar13 .= '
									';
$__compilerVar12 .= $this->callTemplateHook('photo_private_controls', $__compilerVar13, array(
'photo' => $content
));
unset($__compilerVar13);
$__compilerVar12 .= '
								</div>
								
								';
$__compilerVar14 = '';
$__compilerVar14 .= '
										';
$__compilerVar15 = '';
$__compilerVar15 .= '
										';
if ($content['canWatch'])
{
$__compilerVar15 .= '
											<a href="' . XenForo_Template_Helper_Core::link('gallery/photos/watch', $content, array()) . '" class="WatchLink item control ' . (($content['watch_date']) ? ('unwatch') : ('watch')) . '"><span></span><span class="WatchLabel">' . (($content['watch_date']) ? ('Unwatch') : ('Watch')) . '</span></a>
										';
}
$__compilerVar15 .= '
										';
if ($content['canLike'])
{
$__compilerVar15 .= '
											<a href="' . XenForo_Template_Helper_Core::link('gallery/photos/like', $content, array()) . '" class="LikeLink item control ' . (($content['like_date']) ? ('unlike') : ('like')) . '" data-container="#likes-wp-' . htmlspecialchars($content['content_id'], ENT_QUOTES, 'UTF-8') . '"><span></span><span class="LikeLabel">' . (($content['like_date']) ? ('Unlike') : ('Like')) . '</span></a>
										';
}
$__compilerVar15 .= '
										';
if ($content['canComment'])
{
$__compilerVar15 .= '
											<a href="' . XenForo_Template_Helper_Core::link('gallery/photos/comment', $content, array()) . '" data-commentArea="#commentPhoto' . htmlspecialchars($content['content_id'], ENT_QUOTES, 'UTF-8') . '"
												data-postParams="' . htmlspecialchars(XenForo_Template_Helper_Core::callHelper('json', array(
'0' => array(
'after' => $lastShownCommentDate
)
)), ENT_QUOTES, 'UTF-8', true) . '"
												class="XenGalleryCommentPoster item control postComment" ><span></span>' . 'Comment' . '</a>
										';
}
$__compilerVar15 .= '
										';
$__compilerVar14 .= $this->callTemplateHook('photo_public_controls', $__compilerVar15, array(
'photo' => $content
));
unset($__compilerVar15);
$__compilerVar14 .= '
									';
if (trim($__compilerVar14) !== '')
{
$__compilerVar12 .= '
									<div class="publicControls">
									' . $__compilerVar14 . '
									</div>
								';
}
unset($__compilerVar14);
$__compilerVar12 .= '
						</div>

						<form action="' . XenForo_Template_Helper_Core::link('gallery/inline-mod-comment/switch', false, array()) . '" method="post"
							class="InlineModForm"
							data-cookieName="sxgcomments"
							data-overlayId="InlineModOverlayComment"
							data-controls="#InlineModControlsComment"
							data-imodOptions="#ModerationSelectComment">
							
							<ol class="messageResponse" itemscope="itemscope" itemtype="http://schema.org/UserComments">
								';
if ($content['likes'])
{
$__compilerVar12 .= '
									<meta itemprop="interactionCount" content="UserLikes:' . htmlspecialchars($content['likes'], ENT_QUOTES, 'UTF-8') . '"/>
								';
}
$__compilerVar12 .= '		
								<li id="likes-wp-' . htmlspecialchars($content['content_id'], ENT_QUOTES, 'UTF-8') . '">
									';
if ($content['likes'])
{
$__compilerVar12 .= '
										';
$__compilerVar16 = '';
$__compilerVar16 .= XenForo_Template_Helper_Core::link('gallery/photos/likes', $content, array());
$__compilerVar17 = '';
if ($content['likes'])
{
$__compilerVar17 .= '
	';
$this->addRequiredExternal('css', 'likes_summary');
$__compilerVar17 .= '
	<div class="likesSummary secondaryContent">
		<span class="LikeText">
			' . XenForo_Template_Helper_Core::callHelper('likeshtml', array($content['likes'],$__compilerVar16,$content['like_date'],$content['likeUsers'])) . '
		</span>
	</div>
';
}
$__compilerVar12 .= $__compilerVar17;
unset($__compilerVar16, $__compilerVar17);
$__compilerVar12 .= '
									';
}
$__compilerVar12 .= '
								</li>

								';
if ($content['comments'])
{
$__compilerVar12 .= '
									<meta itemprop="interactionCount" content="UserComments:' . htmlspecialchars($content['comment_count'], ENT_QUOTES, 'UTF-8') . '"/>
									';
if ($content['comment_count'] > $commentOnLoad)
{
$__compilerVar12 .= '
										';
$__compilerVar18 = '';
$__compilerVar18 .= '<li class="commentMore secondaryContent">
	<a href="' . XenForo_Template_Helper_Core::link('gallery/photos/comments', $content, array()) . '"
		class="XenGalleryCommentLoader"
		data-loadParams="' . htmlspecialchars(XenForo_Template_Helper_Core::callHelper('json', array(
'0' => array(
'before' => $firstShownCommentDate
)
)), ENT_QUOTES, 'UTF-8', true) . '">' . 'View previous comments' . '...</a>
	<span class="muted">' . '' . htmlspecialchars($commentShownCount, ENT_QUOTES, 'UTF-8') . ' of ' . htmlspecialchars($content['comment_count'], ENT_QUOTES, 'UTF-8') . '' . '</span>
</li>';
$__compilerVar12 .= $__compilerVar18;
unset($__compilerVar18);
$__compilerVar12 .= '
									';
}
$__compilerVar12 .= '

									';
foreach ($content['comments'] AS $comment)
{
$__compilerVar12 .= '
										';
$__compilerVar19 = '';
$__compilerVar19 .= '<li id="comment_' . htmlspecialchars($comment['comment_id'], ENT_QUOTES, 'UTF-8') . '" class="comment secondaryContent ' . (($comment['isIgnored']) ? ('ignored') : ('')) . '" itemscope="itemscope" itemtype="http://schema.org/Comment" itemprop="comment">
	
	<meta itemprop="commentTime" content="' . XenForo_Template_Helper_Core::datetime($comment['comment_date'], '') . '">	
	<meta itemprop="creator" content="' . htmlspecialchars($comment['username'], ENT_QUOTES, 'UTF-8') . '">
	' . XenForo_Template_Helper_Core::callHelper('avatarhtml', array($comment,(true),array(
'user' => '$comment',
'size' => 's',
'img' => 'true'
),'')) . '

	<div class="commentInfo">
		';
$__compilerVar20 = '';
$__compilerVar20 .= '
					';
if ($comment['isDeleted'])
{
$__compilerVar20 .= '
						<li class="deletedNotice"><span class="icon Tooltip" title="' . 'Deleted' . '" data-tipclass="iconTip flipped"></span>' . 'This message has been removed from public view.' . '</li>
					';
}
else if ($comment['isModerated'])
{
$__compilerVar20 .= '
						<li class="moderatedNotice"><span class="icon Tooltip" title="' . 'Awaiting moderation' . '" data-tipclass="iconTip flipped"></span>' . 'This message is awaiting moderator approval, and is invisible to normal visitors.' . '</li>
					';
}
$__compilerVar20 .= '
					';
if ($comment['isIgnored'])
{
$__compilerVar20 .= '
						<li>' . 'You are ignoring content by this member.' . ' <a href="javascript:" class="jsOnly DisplayIgnoredContent">' . 'Show Ignored Content' . '</a></li>
					';
}
$__compilerVar20 .= '
				';
if (trim($__compilerVar20) !== '')
{
$__compilerVar19 .= '
			<ul class="messageNotices">
				' . $__compilerVar20 . '
			</ul>
		';
}
unset($__compilerVar20);
$__compilerVar19 .= '
		<div class="commentContent">
			<a href="' . ((XenForo_Template_Helper_Core::styleProperty('sonnbXG_showUserPage')) ? (XenForo_Template_Helper_Core::link('gallery/authors', $comment, array())) : (XenForo_Template_Helper_Core::link('members', $comment, array()))) . '" class="' . ((!XenForo_Template_Helper_Core::styleProperty('sonnbXG_showUserPage')) ? ('username') : ('')) . ' poster">' . htmlspecialchars($comment['username'], ENT_QUOTES, 'UTF-8') . '</a>
			<article><blockquote itemprop="commentText">' . $comment['message'] . '</blockquote></article>
		</div>
		<div class="messageMeta">
			<div class="privateControls">
				';
if ($comment['canInlineMod'])
{
$__compilerVar19 .= '
					<input type="checkbox" value="' . htmlspecialchars($comment['comment_id'], ENT_QUOTES, 'UTF-8') . '" class="InlineModCheck item" id="inlineModCheck-comment-' . htmlspecialchars($comment['comment_id'], ENT_QUOTES, 'UTF-8') . '" data-target="#comment_' . htmlspecialchars($comment['comment_id'], ENT_QUOTES, 'UTF-8') . '" title="' . 'Select comment id: ' . htmlspecialchars($comment['comment_id'], ENT_QUOTES, 'UTF-8') . '' . '" name="sxgcomments" />
				';
}
$__compilerVar19 .= '
				<a href="' . XenForo_Template_Helper_Core::link('gallery/comments', $comment, array()) . '" title="' . 'Permalink' . '" class="item muted">' . XenForo_Template_Helper_Core::callHelper('datetimehtml', array($comment['comment_date'],array(
'time' => '$comment.comment_date'
))) . '</a>
				';
if ($comment['canEdit'])
{
$__compilerVar19 .= '
					<a href="' . XenForo_Template_Helper_Core::link('gallery/comments/edit', $comment, array()) . '" class="item control edit"><span></span>' . 'Edit' . '</a>
				';
}
$__compilerVar19 .= '
				';
if ($comment['canDelete'])
{
$__compilerVar19 .= '
					<a href="' . XenForo_Template_Helper_Core::link('gallery/comments/delete', $comment, array()) . '" class="item control delete"><span></span>' . 'Delete' . '</a>
				';
}
$__compilerVar19 .= '
				
				';
if ($comment['canWarn'])
{
$__compilerVar19 .= '
					<a href="' . XenForo_Template_Helper_Core::link('members/warn', $comment, array(
'content_type' => 'sonnb_xengallery_comment',
'content_id' => $comment['comment_id']
)) . '" class="item control warn"><span></span>' . 'Warn' . '</a>
				';
}
else if ($comment['warning_id'] && $canViewWarnings)
{
$__compilerVar19 .= '
					<a href="' . XenForo_Template_Helper_Core::link('warnings', $comment, array()) . '" class="OverlayTrigger item control viewWarning"><span></span>' . 'View Warning' . '</a>
				';
}
$__compilerVar19 .= '
				';
if ($comment['canReport'])
{
$__compilerVar19 .= '
					<a href="' . XenForo_Template_Helper_Core::link('gallery/comments/report', $comment, array()) . '" class="OverlayTrigger item control report" data-cacheOverlay="false"><span></span>' . 'Report' . '</a>
				';
}
$__compilerVar19 .= '
			</div>
			
			';
$__compilerVar21 = '';
$__compilerVar21 .= '
					';
if ($comment['canLike'])
{
$__compilerVar21 .= '
						<a href="' . XenForo_Template_Helper_Core::link('gallery/comments/like', $comment, array()) . '" class="LikeLink item control ' . (($comment['like_date']) ? ('unlike') : ('like')) . '" data-container="#likes-comment-' . htmlspecialchars($comment['comment_id'], ENT_QUOTES, 'UTF-8') . '"><span></span><span class="LikeLabel">' . (($comment['like_date']) ? ('Unlike') : ('Like')) . '</span></a>
					';
}
$__compilerVar21 .= '
					';
if ($comment['canComment'])
{
$__compilerVar21 .= '
						<a href="' . XenForo_Template_Helper_Core::link('gallery/comments/comment', $comment, array()) . '" class="CommentPoster item control postComment" data-commentArea="#commentSubmit-' . htmlspecialchars($comment['comment_id'], ENT_QUOTES, 'UTF-8') . '"><span></span>' . 'Comment' . '</a>
					';
}
$__compilerVar21 .= '
				';
if (trim($__compilerVar21) !== '')
{
$__compilerVar19 .= '
				<div class="publicControls">
				' . $__compilerVar21 . '
				</div>
			';
}
unset($__compilerVar21);
$__compilerVar19 .= '
		</div>
		<div id="likes-comment-' . htmlspecialchars($comment['comment_id'], ENT_QUOTES, 'UTF-8') . '">
			';
if ($comment['likes'])
{
$__compilerVar19 .= '
				';
$__compilerVar22 = '';
$__compilerVar22 .= XenForo_Template_Helper_Core::link('gallery/comments/likes', $comment, array());
$__compilerVar23 = '';
if ($comment['likes'])
{
$__compilerVar23 .= '
	';
$this->addRequiredExternal('css', 'likes_summary');
$__compilerVar23 .= '
	<div class="likesSummary secondaryContent">
		<span class="LikeText">
			' . XenForo_Template_Helper_Core::callHelper('likeshtml', array($comment['likes'],$__compilerVar22,$comment['like_date'],$comment['likeUsers'])) . '
		</span>
	</div>
';
}
$__compilerVar19 .= $__compilerVar23;
unset($__compilerVar22, $__compilerVar23);
$__compilerVar19 .= '
			';
}
$__compilerVar19 .= '
		</div>
	</div>
</li>';
$__compilerVar12 .= $__compilerVar19;
unset($__compilerVar19);
$__compilerVar12 .= '
									';
}
$__compilerVar12 .= '

								';
}
$__compilerVar12 .= '

								';
if ($content['canComment'])
{
$__compilerVar12 .= '
									<li id="commentPhoto' . htmlspecialchars($content['content_id'], ENT_QUOTES, 'UTF-8') . '" class="comment secondaryContent">
										' . XenForo_Template_Helper_Core::callHelper('avatarhtml', array($visitor,(true),array(
'user' => '$visitor',
'size' => 's',
'img' => 'true'
),'')) . '
										<div class="elements">
											<textarea name="message" rows="2" class="textCtrl Elastic UserTagger"></textarea>
											<div class="submit"><input type="submit" class="button primary" value="' . 'Post Comment' . '" /></div>
										</div>
									</li>
								';
}
$__compilerVar12 .= '

							</ol>
							';
if ($inlineModOptions)
{
$__compilerVar12 .= '
								';
$__compilerVar24 = '';
$__compilerVar25 = '';
$__compilerVar25 .= 'InlineModControlsComment';
$__compilerVar26 = '';
$__compilerVar26 .= 'ModerationSelectComment';
$__compilerVar27 = '';
$__compilerVar27 .= 'Comment Moderation';
$__compilerVar28 = '';
$__compilerVar28 .= '
		';
if ($inlineModOptions['delete'])
{
$__compilerVar28 .= '<option value="delete">' . 'Delete Comments' . '...</option>';
}
$__compilerVar28 .= '
		';
if ($inlineModOptions['undelete'])
{
$__compilerVar28 .= '<option value="undelete">' . 'Undelete Comments' . '</option>';
}
$__compilerVar28 .= '
		';
if ($inlineModOptions['approve'])
{
$__compilerVar28 .= '<option value="approve">' . 'Approve Comments' . '</option>';
}
$__compilerVar28 .= '
		';
if ($inlineModOptions['unapprove'])
{
$__compilerVar28 .= '<option value="unapprove">' . 'Unapprove Comments' . '</option>';
}
$__compilerVar28 .= '
		<option value="deselect">' . 'Deselect Comments' . '</option>
	';
$__compilerVar29 = '';
$__compilerVar29 .= 'Select / Deselect all loaded comments.';
$__compilerVar30 = '';
$__compilerVar30 .= 'Select comments';
$__compilerVar31 = '';
$this->addRequiredExternal('css', 'sonnb_xengallery_inline_mod_controls');
$__compilerVar31 .= '
';
$this->addRequiredExternal('js', 'js/sonnb/XenGallery/gallery.inlinemod.js');
$__compilerVar31 .= '

<span id="' . (($__compilerVar25) ? (htmlspecialchars($__compilerVar25, ENT_QUOTES, 'UTF-8')) : ('InlineModControls')) . '" class="InlineModControls">
	<span class="selectionControl secondaryContent">
		<label for="ModerationCheck">
			' . 'Select All' . ' <input type="checkbox" id="ModerationCheck" title="' . htmlspecialchars($__compilerVar29, ENT_QUOTES, 'UTF-8') . '" />
		</label>

		<input type="button" class="button ClickNext" value="&darr;" title="' . 'Move down' . '" />
		<input type="button" class="button ClickPrev" value="&uarr;" title="' . 'Move up' . '" />
		<a class="SelectionCount">' . htmlspecialchars($__compilerVar30, ENT_QUOTES, 'UTF-8') . ': <em class="InlineModCheckedTotal">0</em></a>
	</span>

	<span class="actionControl sectionFooter">
		<span class="commonActions">
			';
if ($inlineModOptions['delete'])
{
$__compilerVar31 .= '<input type="submit" class="button" value="' . 'Delete' . '..." name="delete" />';
}
$__compilerVar31 .= '
			';
if ($inlineModOptions['approve'])
{
$__compilerVar31 .= '<input type="submit" class="button" value="' . 'Approve' . '" name="approve" />';
}
$__compilerVar31 .= '
		</span>

		<span class="otherActions">
			<select name="a" id="' . (($__compilerVar26) ? (htmlspecialchars($__compilerVar26, ENT_QUOTES, 'UTF-8')) : ('ModerationSelect')) . '" class="textCtrl ModerationSelect">
				<option value="">' . 'Other Action' . '...</option>
				<optgroup label="' . 'Moderation Actions' . '">
					' . $__compilerVar28 . '
				</optgroup>
				<option value="closeOverlay">' . 'Close This Overlay' . '</option>
			</select>

			<input type="submit" class="button primary" value="' . 'Go' . '" />
			<input type="reset" class="button OverlayCloser overylayOnly" value="X" title="' . 'Cancel and close these controls' . '" />
		</span>
	</span>
</span>';
$__compilerVar24 .= $__compilerVar31;
unset($__compilerVar25, $__compilerVar26, $__compilerVar27, $__compilerVar28, $__compilerVar29, $__compilerVar30, $__compilerVar31);
$__compilerVar12 .= $__compilerVar24;
unset($__compilerVar24);
$__compilerVar12 .= '
							';
}
$__compilerVar12 .= '
							
							<input type="hidden" name="_xfToken" value="' . htmlspecialchars($visitor['csrf_token_page'], ENT_QUOTES, 'UTF-8') . '" />
						</form>
						
					';
$__compilerVar32 = '';
$this->addRequiredExternal('css', 'message_simple');
$__compilerVar32 .= '
';
$this->addRequiredExternal('css', 'bb_code');
$__compilerVar32 .= '

<div class="commentWrapper">
	<div id="' . htmlspecialchars($__compilerVar8, ENT_QUOTES, 'UTF-8') . '" class="messageSimple ' . (($content['isDeleted']) ? ('deleted') : ('')) . ' ' . (($content['is_admin'] OR $content['is_moderator']) ? ('staff') : ('')) . ' ' . (($content['isIgnored']) ? ('ignored') : ('')) . '" data-author="' . htmlspecialchars($content['username'], ENT_QUOTES, 'UTF-8') . '">

		' . XenForo_Template_Helper_Core::callHelper('avatarhtml', array($content,false,array(
'user' => '$message',
'size' => 's'
),'')) . '
		
		<div class="messageInfo">
			
			';
$__compilerVar33 = '';
$__compilerVar33 .= '
						';
$__compilerVar34 = '';
$__compilerVar34 .= '
							';
if ($content['warning_message'])
{
$__compilerVar34 .= '
								<li class="warningNotice"><span class="icon Tooltip" title="' . 'Warning' . '" data-tipclass="iconTip flipped"></span>' . htmlspecialchars($content['warning_message'], ENT_QUOTES, 'UTF-8') . '</li>
							';
}
$__compilerVar34 .= '
							';
if ($content['isIgnored'])
{
$__compilerVar34 .= '
								<li>' . 'You are ignoring content by this member.' . ' <a href="javascript:" class="jsOnly DisplayIgnoredContent">' . 'Show Ignored Content' . '</a></li>
							';
}
$__compilerVar34 .= '
						';
$__compilerVar33 .= $this->callTemplateHook('message_simple_notices', $__compilerVar34, array(
'message' => $content
));
unset($__compilerVar34);
$__compilerVar33 .= '
					';
if (trim($__compilerVar33) !== '')
{
$__compilerVar32 .= '
				<ul class="messageNotices">
					' . $__compilerVar33 . '
				</ul>
			';
}
unset($__compilerVar33);
$__compilerVar32 .= '

			<div class="messageContent">
				<a href="' . ((XenForo_Template_Helper_Core::styleProperty('sonnbXG_showUserPage')) ? (XenForo_Template_Helper_Core::link('gallery/authors', $content, array())) : (XenForo_Template_Helper_Core::link('members', $content, array()))) . '" class="' . ((!XenForo_Template_Helper_Core::styleProperty('sonnbXG_showUserPage')) ? ('username') : ('')) . ' poster">' . htmlspecialchars($content['username'], ENT_QUOTES, 'UTF-8') . '</a>
				<article><blockquote class="ugc baseHtml">' . $content['descriptionHtml'] . '</blockquote></article>
				' . $__compilerVar9 . '
			</div>

			' . $__compilerVar12 . '
		</div>
	</div>
</div>';
$__output .= $__compilerVar32;
unset($__compilerVar8, $__compilerVar9, $__compilerVar12, $__compilerVar32);
$__output .= '
				<div class="commentControls">
					';
if ($content['canEdit'])
{
$__output .= '
					<h4>' . 'Privacy' . '</h4>
					<div class="albumInfo">
						<div class="albumPrivacy">
							<span class="muted">' . htmlspecialchars($content['allow_view_html'], ENT_QUOTES, 'UTF-8') . '</span> <a class="OverlayTrigger" href="' . XenForo_Template_Helper_Core::link('gallery/photos/privacy', $content, array()) . '">' . 'Edit' . '</a>
						</div>
					</div>
					';
}
$__output .= '
					';
if (!$xenOptions['sonnb_XG_disableCamera'] && $content['photo_exif'])
{
$__output .= '
					<h4>' . 'Additional Info' . '</h4>
					<div class="photoExif">
						';
$__compilerVar35 = '';
$__compilerVar35 .= '
										';
if ($content['photo_exif']['ExposureTime'])
{
$__compilerVar35 .= '<span class="exif-detail" id="exif-exposure">' . htmlspecialchars($content['photo_exif']['ExposureTime'], ENT_QUOTES, 'UTF-8') . '</span>';
}
$__compilerVar35 .= '
										';
if ($content['photo_exif']['FNumber'])
{
$__compilerVar35 .= '<span class="exif-detail" id="exif-aperture">' . $content['photo_exif']['FNumber'] . '</span>';
}
$__compilerVar35 .= '
										';
if ($content['photo_exif']['FocalLength'])
{
$__compilerVar35 .= '<span class="exif-detail" id="exif-focal-length">' . htmlspecialchars($content['photo_exif']['FocalLength'], ENT_QUOTES, 'UTF-8') . '</span>';
}
$__compilerVar35 .= '
									';
if (trim($__compilerVar35) !== '')
{
$__output .= '
							<span class="muted">' . 'Settings' . ':</span>
							<span class="muted" id="exif-detail-container">
								<a class="OverlayTrigger" data-overlayOptions="{&quot;fixed&quot;:false}" href="' . XenForo_Template_Helper_Core::link('gallery/photos/meta', $content, array()) . '">
									' . $__compilerVar35 . '
								</a>
							</span>
						';
}
else
{
$__output .= '
							<div class="viewExifLink">
								<a class="OverlayTrigger" data-overlayOptions="{&quot;fixed&quot;:false}" href="' . XenForo_Template_Helper_Core::link('gallery/photos/meta', $content, array()) . '">' . 'View EXIF Information' . '</a>
							</div>
						';
}
unset($__compilerVar35);
$__output .= '
					</div>
					';
}
$__output .= '
					
					';
$__compilerVar36 = '';
$__compilerVar36 .= '
							';
if ($content['contentStreams'] || ($content['canEdit'] && !$content['contentStreams']))
{
$__compilerVar36 .= '
							<div class="streamList">
								<ul>
									';
if ($content['contentStreams'])
{
$__compilerVar36 .= '
									';
foreach ($content['contentStreams'] AS $stream)
{
$__compilerVar36 .= '
										';
$__compilerVar37 = '';
$__compilerVar37 .= '<li id="stream__' . htmlspecialchars($stream, ENT_QUOTES, 'UTF-8') . '">
	<span class="streamItem">
		<a href="' . XenForo_Template_Helper_Core::link('gallery/streams', array(
'stream_name' => $stream
), array()) . '">' . htmlspecialchars($stream, ENT_QUOTES, 'UTF-8') . '</a>
		';
if ($content['canEdit'])
{
$__compilerVar37 .= '
			<a class="delete" title="' . 'Delete' . '" href="' . XenForo_Template_Helper_Core::link('gallery/photos/stream-delete', $content, array(
'stream_name' => $stream
)) . '">[x]</a>
		';
}
$__compilerVar37 .= '
	</span>
</li>';
$__compilerVar36 .= $__compilerVar37;
unset($__compilerVar37);
$__compilerVar36 .= '
									';
}
$__compilerVar36 .= '
									';
}
$__compilerVar36 .= '
								</ul>
							</div>	
							';
}
$__compilerVar36 .= '				
							';
if ($content['canEdit'])
{
$__compilerVar36 .= '
							<form class="xenForm" method="POST" action="' . XenForo_Template_Helper_Core::link('gallery/photos/stream-add', $content, array()) . '">
								<input id="addStream" data-acUrl="' . XenForo_Template_Helper_Core::link('gallery/streams/find', '', array(
'_xfResponseType' => 'json'
)) . '" class="textCtrl AutoComplete" type="text" name="stream_name" value="" placeholder="" autocomplete="off" />
								<p class="explain muted">' . 'Separate each stream with a comma: my family, my car, etc.' . '</p>									
								<input type="submit" value="' . 'Add Streams' . '" name="submit" class="primary button" />
								<input type="hidden" value="' . htmlspecialchars($visitor['csrf_token_page'], ENT_QUOTES, 'UTF-8') . '" name="_xfToken">
							</form>
							';
}
$__compilerVar36 .= '
						';
if (trim($__compilerVar36) !== '')
{
$__output .= '
					<h4 class="streamingHeader">' . 'Streams' . ' ';
if ($content['canEdit'])
{
$__output .= '<a class="editToggle" href="' . htmlspecialchars($requestPaths['requestUri'], ENT_QUOTES, 'UTF-8') . '#">' . 'Add Streams' . '</a>';
}
$__output .= '</h4>
					<div class="streaming streamingEditor">
						' . $__compilerVar36 . '
					</div>
					';
}
unset($__compilerVar36);
$__output .= '
					';
$__compilerVar38 = '';
$__compilerVar38 .= '
								';
if ($content['canEdit'])
{
$__compilerVar38 .= '
									<div class="iconActionLinks">
											<a class="addTag" href="' . htmlspecialchars($requestPaths['requestUri'], ENT_QUOTES, 'UTF-8') . '#"><i></i><span>' . 'Tag This Photo' . '</span></a>
											';
if (!$xenOptions['sonnb_XG_disableLocation'])
{
$__compilerVar38 .= '
												<a class="item control location OverlayTrigger" href="' . XenForo_Template_Helper_Core::link('gallery/photos/location', $content, array()) . '" data-cacheOverlay="false" data-overlayOptions="{&quot;fixed&quot;:false}"><i></i><span>' . 'Edit Location' . '</span></a>
											';
}
$__compilerVar38 .= '
											<a class="OverlayTrigger" href="' . XenForo_Template_Helper_Core::link('gallery/photos/move', $content, array()) . '"><i></i><span>' . 'Move Photo' . '</span></a>
											<a class="OverlayTrigger" href="' . XenForo_Template_Helper_Core::link('gallery/photos/rotate', $content, array()) . '"><i></i><span>' . 'Rotate This Photo' . '</span></a>
											';
if ($album['canEdit'])
{
$__compilerVar38 .= '<a class="OverlayTrigger" href="' . XenForo_Template_Helper_Core::link('gallery/photos/make-cover', $content, array()) . '"><i></i><span>' . 'Make Album Cover' . '</span></a>';
}
$__compilerVar38 .= '
									</div>
								';
}
$__compilerVar38 .= '
								';
if ($visitor['user_id'])
{
$__compilerVar38 .= '
									<a target="_blank" href="' . XenForo_Template_Helper_Core::link('gallery/photos/download', $content, array()) . '"><i></i><span>' . 'Download' . '</span></a>
									';
if (!$xenOptions['sonnbXG_disableOriginal'] && $content['canDownloadFull'])
{
$__compilerVar38 .= '
										<a target="_blank" href="' . htmlspecialchars($content['originalUrl'], ENT_QUOTES, 'UTF-8') . '"><i></i><span>' . 'View Original Photo' . '</span></a>
										<a target="_blank" href="' . XenForo_Template_Helper_Core::link('gallery/photos/download', $content, array(
'fullsize' => '1'
)) . '"><i></i><span>' . 'Download Original' . '</span></a>
									';
}
$__compilerVar38 .= '
									<a class="OverlayTrigger" href="' . XenForo_Template_Helper_Core::link('gallery/photos/set-cover', $content, array()) . '"><i></i><span>' . 'Set My Gallery\'s Cover' . '</span></a>
									<a class="OverlayTrigger" href="' . XenForo_Template_Helper_Core::link('gallery/photos/make-avatar', $content, array()) . '"><i></i><span>' . 'Set As My Avatar' . '</span></a>
								';
}
$__compilerVar38 .= '
								';
if ($content['canChangeOwner'])
{
$__compilerVar38 .= '<a class="OverlayTrigger" href="' . XenForo_Template_Helper_Core::link('gallery/photos/owner', $content, array()) . '"><i></i><span>' . 'Change Photo\'s Owner' . '</span></a>';
}
$__compilerVar38 .= '
								';
if ($content['canDelete'])
{
$__compilerVar38 .= '<a class="OverlayTrigger" href="' . XenForo_Template_Helper_Core::link('gallery/photos/delete', $content, array()) . '"><i></i><span>' . 'Delete This Photo' . '</span></a>';
}
$__compilerVar38 .= '
							';
if (trim($__compilerVar38) !== '')
{
$__output .= '
						<h4>' . 'Actions' . '</h4>
						<div class="photoControls">
							' . $__compilerVar38 . '
						</div>
					';
}
unset($__compilerVar38);
$__output .= '
				</div>
			</div>
		</div>
	</div>
</div>

<div style="display:none">
	';
$__compilerVar39 = '';
$__compilerVar39 .= '1';
$__compilerVar40 = '';
if (!$__compilerVar39)
{
$__compilerVar40 .= '
	';
$__extraData['title'] = '';
$__extraData['title'] .= 'Share this photo with your friends.';
$__compilerVar40 .= '
	';
$__extraData['h1'] = '';
$__extraData['h1'] .= 'Share this photo with your friends.';
$__compilerVar40 .= '
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
$__compilerVar40 .= '

	';
$__extraData['navigation'] = array();
$__extraData['navigation'] = XenForo_Template_Helper_Core::appendBreadCrumbs($__extraData['navigation'], $breadCrumbs);
$__compilerVar40 .= '
';
}
$__compilerVar40 .= '

';
$this->addRequiredExternal('css', 'sonnb_xengallery_photo_share');
$__compilerVar40 .= '
<div class="' . (($class) ? (htmlspecialchars($class, ENT_QUOTES, 'UTF-8')) : ('shareContainer')) . ' section">
	<div class="shareContent">
		<ul class="shareList">
			<li class="share-options">
				<div class="share-options-header">
					<span class="caret"></span>
					' . 'Share this via' . '...
				</div>
				<div class="share-options-inner">
					<ul class="share-services">
						<li class="share-service">
							<a class="share-action google" title="' . 'Share on ' . 'Google+' . '' . '" href="' . htmlspecialchars($requestPaths['requestUri'], ENT_QUOTES, 'UTF-8') . '#" data-url="' . XenForo_Template_Helper_Core::link('full:gallery/photos', $content, array()) . '" data-thumbnail="' . XenForo_Template_Helper_Core::callHelper('fullurl', array(
'0' => $content['contentUrl'],
'1' => '1'
)) . '">
								<span class="share-icon google"></span>
								<span class="service-name">Google+</span>
							</a>
						</li>
						<li class="share-service">
							<a class="share-action facebook" title="' . 'Share on ' . 'Facebook' . '' . '" href="' . htmlspecialchars($requestPaths['requestUri'], ENT_QUOTES, 'UTF-8') . '#" data-url="' . XenForo_Template_Helper_Core::link('full:gallery/photos', $content, array()) . '" data-thumbnail="' . XenForo_Template_Helper_Core::callHelper('fullurl', array(
'0' => $content['contentUrl'],
'1' => '1'
)) . '">
								<span class="share-icon facebook"></span>
								<span class="service-name">Facebook</span>
							</a>
						</li>
						<li class="share-service">
							<a class="share-action twitter" title="' . 'Share on ' . 'Twitter' . '' . '" href="' . htmlspecialchars($requestPaths['requestUri'], ENT_QUOTES, 'UTF-8') . '#" data-url="' . XenForo_Template_Helper_Core::link('full:gallery/photos', $content, array()) . '" data-thumbnail="' . XenForo_Template_Helper_Core::callHelper('fullurl', array(
'0' => $content['contentUrl'],
'1' => '1'
)) . '">
								<span class="share-icon twitter"></span>
								<span class="service-name">Twitter</span>
							</a>
						</li>
						<li class="share-service">
							<a class="share-action tumblr" title="' . 'Share on ' . 'Tumblr' . '' . '" href="' . htmlspecialchars($requestPaths['requestUri'], ENT_QUOTES, 'UTF-8') . '#" data-url="' . XenForo_Template_Helper_Core::link('full:gallery/photos', $content, array()) . '" data-thumbnail="' . XenForo_Template_Helper_Core::callHelper('fullurl', array(
'0' => $content['contentUrl'],
'1' => '1'
)) . '">
								<span class="share-icon tumblr"></span>
								<span class="service-name">Tumblr</span>
							</a>
						</li>
						<li class="share-service">
							<a class="share-action pinterest" title="' . 'Share on ' . 'Pinterest' . '' . '" href="' . htmlspecialchars($requestPaths['requestUri'], ENT_QUOTES, 'UTF-8') . '#" data-url="' . XenForo_Template_Helper_Core::link('full:gallery/photos', $content, array()) . '" data-thumbnail="' . XenForo_Template_Helper_Core::callHelper('fullurl', array(
'0' => $content['contentUrl'],
'1' => '1'
)) . '">
								<span class="share-icon pinterest"></span>
								<span class="service-name">Pinterest</span>
							</a>
						</li>
					</ul>

				</div>
			</li>
			<li class="share-options share-options-open">
				<div class="share-options-header">
					<span>' . 'Grab the link' . '</span>
				</div>
				<div class="share-options-inner">
					<p class="muted">' . 'Here\'s a link to this photo. Just copy and paste!' . '</p>
					<p>
						<input type="text" class="textCtrl" value="' . XenForo_Template_Helper_Core::link('full:gallery/photos', $content, array()) . '">
					</p>
					<p class="muted">' . 'Here is direct link of this photo' . '</p>
					<p>
						<input type="text" class="textCtrl" value="' . XenForo_Template_Helper_Core::callHelper('fullurl', array(
'0' => $content['contentUrl'],
'1' => '1'
)) . '">
					</p>
				</div>
			</li>
			<li class="share-options">
				<div class="share-options-header">
					<span>' . 'Grab the HTML/BBCode' . '</span>
				</div>
				<div class="share-options-inner">
					<p class="muted">' . 'Copy and paste the code below (' . 'HTML' . ')' . ':</p>
					<p>
						<textarea class="textCtrl html Elastic">' . '<a href="' . XenForo_Template_Helper_Core::link('full:gallery/photos', $content, array()) . '" title="' . htmlspecialchars($content['title'], ENT_QUOTES, 'UTF-8') . ' by ' . htmlspecialchars($content['username'], ENT_QUOTES, 'UTF-8') . ', on ' . htmlspecialchars($xenOptions['boardTitle'], ENT_QUOTES, 'UTF-8') . '"><img src="' . XenForo_Template_Helper_Core::callHelper('fullurl', array(
'0' => $content['contentUrl'],
'1' => '1'
)) . '" alt="' . htmlspecialchars($content['title'], ENT_QUOTES, 'UTF-8') . '" /></a>' . '</textarea>
					</p>
					<p class="muted">' . 'Copy and paste the code below (' . 'BBCode' . ')' . ':</p>
					<p>
						<textarea class="textCtrl bbcode Elastic">' . '[URL=' . XenForo_Template_Helper_Core::link('full:gallery/photos', $content, array()) . '][IMG]' . XenForo_Template_Helper_Core::callHelper('fullurl', array(
'0' => $content['contentUrl'],
'1' => '1'
)) . '[/IMG][/URL]
[URL=' . XenForo_Template_Helper_Core::link('full:gallery/photos', $content, array()) . ']' . htmlspecialchars($content['title'], ENT_QUOTES, 'UTF-8') . '[/URL] by [URL=' . XenForo_Template_Helper_Core::link('full:gallery/authors', $content, array()) . ']' . htmlspecialchars($content['username'], ENT_QUOTES, 'UTF-8') . '[/URL] on ' . htmlspecialchars($xenOptions['boardTitle'], ENT_QUOTES, 'UTF-8') . '' . '</textarea>
					</p>
				</div>
			</li>
		</ul>
		<div class="clearfix"></div>
	</div>
</div>';
$__output .= $__compilerVar40;
unset($__compilerVar39, $__compilerVar40);
$__output .= '
</div>
';
$__compilerVar41 = '';
if ($triggerFullscreen && XenForo_Template_Helper_Core::styleProperty('sonnbXG_triggerFullscreen') && XenForo_Template_Helper_Core::styleProperty('sonnbXG_enableOverlay'))
{
$__compilerVar41 .= '
	<script type="text/javascript">
		!function($, window, document, _undefined)
		{
			$(document).ready(function()
			{
				//console.log(XenForo.XenGalleryOverlayToggle.prototype.show);
				//XenForo.XenGalleryOverlayToggle.prototype.show();
				var $overlay = new XenForo.XenGalleryOverlayToggle($(\'.action.fullscreen\'));
				//$overlay.$toggle.click();
				$overlay.show();
				//$(\'.action.fullscreen\').trigger(\'click\');
			});
		}(jQuery, this, document);
	</script>
';
}
$__output .= $__compilerVar41;
unset($__compilerVar41);
$__output .= '
';
$__compilerVar42 = '';
$__compilerVar42 .= XenForo_Template_Helper_Core::link('canonical:gallery/photos', $content, array());
$__compilerVar43 = '';
$__compilerVar44 = '';
$__compilerVar44 .= '
			';
$__compilerVar45 = '';
$__compilerVar45 .= '
			';
if ($xenOptions['tweet']['enabled'])
{
$__compilerVar45 .= '
				<div class="tweet shareControl">
					<a href="https://twitter.com/share" class="twitter-share-button"
						data-count="horizontal"
						data-lang="' . XenForo_Template_Helper_Core::callHelper('twitterLang', array(
'0' => $visitorLanguage['language_code']
)) . '"
						data-url="' . htmlspecialchars($__compilerVar42, ENT_QUOTES, 'UTF-8') . '"
						' . (($thread['title']) ? ('data-text="' . XenForo_Template_Helper_Core::callHelper('threadPrefix', array(
'0' => $thread,
'1' => 'escaped'
)) . htmlspecialchars($thread['title'], ENT_QUOTES, 'UTF-8') . '"') : ('')) . '
						' . (($xenOptions['tweet']['via']) ? ('data-via="' . htmlspecialchars($xenOptions['tweet']['via'], ENT_QUOTES, 'UTF-8') . '"') : ('')) . '
						' . (($xenOptions['tweet']['related']) ? ('data-related="' . htmlspecialchars($xenOptions['tweet']['related'], ENT_QUOTES, 'UTF-8') . '"') : ('')) . '>' . 'Tweet' . '</a>
				</div>
			';
}
$__compilerVar45 .= '
			';
if ($xenOptions['plusone'])
{
$__compilerVar45 .= '
				<div class="plusone shareControl">
					<div class="g-plusone" data-size="medium" data-count="true" data-href="' . htmlspecialchars($__compilerVar42, ENT_QUOTES, 'UTF-8') . '"></div>
				</div>
			';
}
$__compilerVar45 .= '
			';
if ($xenOptions['facebookLike'])
{
$__compilerVar45 .= '
				<div class="facebookLike shareControl">
					';
$__extraData['facebookSdk'] = '';
$__extraData['facebookSdk'] .= '1';
$__compilerVar45 .= '
					<fb:like href="' . htmlspecialchars($__compilerVar42, ENT_QUOTES, 'UTF-8') . '" show_faces="true" width="400" action="' . htmlspecialchars($xenOptions['facebookLikeAction'], ENT_QUOTES, 'UTF-8') . '" font="trebuchet ms" colorscheme="' . XenForo_Template_Helper_Core::styleProperty('fbColorScheme') . '"></fb:like>
				</div>
			';
}
$__compilerVar45 .= '
			';
$__compilerVar44 .= $this->callTemplateHook('share_page_options', $__compilerVar45, array());
unset($__compilerVar45);
$__compilerVar44 .= '
		';
if (trim($__compilerVar44) !== '')
{
$__compilerVar43 .= '
	';
$this->addRequiredExternal('css', 'share_page');
$__compilerVar43 .= '

	<div class="sharePage">
		<h3 class="textHeading larger">' . 'Share This Page' . '</h3>
		' . $__compilerVar44 . '
	</div>
';
}
unset($__compilerVar44);
$__output .= $__compilerVar43;
unset($__compilerVar42, $__compilerVar43);
$__output .= '
';
$__compilerVar46 = '';
$__output .= $this->callTemplateHook('sonnb_cr_information', $__compilerVar46, array());
unset($__compilerVar46);
