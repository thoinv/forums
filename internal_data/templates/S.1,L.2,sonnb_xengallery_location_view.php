<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__extraData['title'] = '';
$__extraData['title'] .= 'The albums and photos were taken at ' . htmlspecialchars($location['location_name'], ENT_QUOTES, 'UTF-8') . '' . ' ' . XenForo_Template_Helper_Core::callHelper('pagenumber', array(
'0' => $page
));
$__output .= '
';
$__extraData['h1'] = '';
$__extraData['h1'] .= 'The albums and photos were taken at ' . htmlspecialchars($location['location_name'], ENT_QUOTES, 'UTF-8') . '';
$__output .= '
';
$__extraData['pageDescription'] = array();
$__extraData['pageDescription']['content'] = '';
$__extraData['pageDescription']['content'] .= 'Explore more albums and photos taken at ' . htmlspecialchars($location['location_name'], ENT_QUOTES, 'UTF-8') . '';
$__output .= '

';
$__extraData['head']['canonical'] = '';
$__extraData['head']['canonical'] .= '
	<link rel="canonical" href="' . XenForo_Template_Helper_Core::link('canonical:gallery/locations', $location, array(
'page' => $page
)) . '" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no" />
	<meta name="apple-mobile-web-app-capable" content="yes" />
';
$__output .= '

';
$__extraData['navigation'] = array();
$__extraData['navigation'] = XenForo_Template_Helper_Core::appendBreadCrumbs($__extraData['navigation'], $breadCrumbs);
$__output .= '

';
$this->addRequiredExternal('js', 'js/sonnb/XenGallery/gallery.mobile.js');
$__output .= '

';
$this->addRequiredExternal('css', 'sonnb_xengallery_album_list');
$__output .= '
';
$this->addRequiredExternal('css', 'sonnb_xengallery_album_list_item');
$__output .= '
';
$this->addRequiredExternal('css', 'sonnb_xengallery_location_view');
$__output .= '
';
$this->addRequiredExternal('css', 'sonnb_xengallery_photo_view');
$__output .= '

';
$this->addRequiredExternal('js', 'js/sonnb/XenGallery/jquery.masonry.min.js');
$__output .= '
';
$this->addRequiredExternal('js', 'js/sonnb/XenGallery/jquery.infinitescroll.min.js');
$__output .= '
';
$this->addRequiredExternal('js', 'js/sonnb/XenGallery/modernizr.min.js');
$__output .= '
';
$this->addRequiredExternal('js', 'js/sonnb/XenGallery/gallery.js');
$__output .= '
';
$this->addRequiredExternal('js', 'js/sonnb/XenGallery/gallery.overlay.js');
$__output .= '

';
$this->addRequiredExternal('js', '//maps.googleapis.com/maps/api/js?libraries=places&sensor=false' . (($xenOptions['sonnbXG_mapApiKey']) ? ('&key=' . htmlspecialchars($xenOptions['sonnbXG_mapApiKey'], ENT_QUOTES, 'UTF-8')) : ('')));
$__output .= '

<div id="map"></div>

';
$__compilerVar8 = '';
$__output .= $this->callTemplateHook('ad_location_view_above_album_list', $__compilerVar8, array());
unset($__compilerVar8);
$__output .= '

<div class="clearfix masonryContainer" ' . ((XenForo_Template_Helper_Core::styleProperty('sonnbXenGalleryDisableAutoScroll')) ? ('data-noAutoScroll="1"') : ('')) . ' data-loading="' . 'Loading Photos' . '..." data-finish="' . 'There are no more photos to be loaded.' . '" data-ajax="' . XenForo_Template_Helper_Core::styleProperty('imagePath') . '/xenforo/widgets/ajaxload.info_B4B4DC_facebook.gif">
	';
if ($itemRendered)
{
$__output .= '
		';
$__compilerVar9 = '';
$__compilerVar9 .= '
		';
foreach ($itemRendered AS $item)
{
$__compilerVar9 .= '
			' . $item . '
		';
}
$__compilerVar9 .= '
		';
$__output .= $this->callTemplateHook('location_item_list', $__compilerVar9, array());
unset($__compilerVar9);
$__output .= '
		<div id="infscr-loading">
			<img src="' . XenForo_Template_Helper_Core::styleProperty('imagePath') . '/xenforo/widgets/ajaxload.info_FFFFFF_facebook.gif" 
				alt="' . 'Loading Photos' . '......" />
			<div><em>' . 'Loading Photos' . '......</em></div>
		</div>
	';
}
else
{
$__output .= '
		<div class="noData">' . 'There is no photo taken at this location yet.' . '</div>
	';
}
$__output .= '
</div>
	
<div class="pageNavLinkGroup xengallery">
	' . XenForo_Template_Helper_Core::callHelper('pagenavhtml', array('public', htmlspecialchars($itemsPerPage, ENT_QUOTES, 'UTF-8'), htmlspecialchars($totalItems, ENT_QUOTES, 'UTF-8'), htmlspecialchars($page, ENT_QUOTES, 'UTF-8'), 'gallery/locations', $location, $pageNavParams, false, array())) . '
</div>
';
$__compilerVar10 = '';
$__compilerVar10 .= XenForo_Template_Helper_Core::link('canonical:gallery/locations', $location, array());
$__compilerVar11 = '';
$__compilerVar12 = '';
$__compilerVar12 .= '
			';
$__compilerVar13 = '';
$__compilerVar13 .= '
			';
if ($xenOptions['tweet']['enabled'])
{
$__compilerVar13 .= '
				<div class="tweet shareControl">
					<a href="https://twitter.com/share" class="twitter-share-button"
						data-count="horizontal"
						data-lang="' . XenForo_Template_Helper_Core::callHelper('twitterLang', array(
'0' => $visitorLanguage['language_code']
)) . '"
						data-url="' . htmlspecialchars($__compilerVar10, ENT_QUOTES, 'UTF-8') . '"
						' . (($thread['title']) ? ('data-text="' . XenForo_Template_Helper_Core::callHelper('threadPrefix', array(
'0' => $thread,
'1' => 'escaped'
)) . htmlspecialchars($thread['title'], ENT_QUOTES, 'UTF-8') . '"') : ('')) . '
						' . (($xenOptions['tweet']['via']) ? ('data-via="' . htmlspecialchars($xenOptions['tweet']['via'], ENT_QUOTES, 'UTF-8') . '"') : ('')) . '
						' . (($xenOptions['tweet']['related']) ? ('data-related="' . htmlspecialchars($xenOptions['tweet']['related'], ENT_QUOTES, 'UTF-8') . '"') : ('')) . '>' . 'Tweet' . '</a>
				</div>
			';
}
$__compilerVar13 .= '
			';
if ($xenOptions['plusone'])
{
$__compilerVar13 .= '
				<div class="plusone shareControl">
					<div class="g-plusone" data-size="medium" data-count="true" data-href="' . htmlspecialchars($__compilerVar10, ENT_QUOTES, 'UTF-8') . '"></div>
				</div>
			';
}
$__compilerVar13 .= '
			';
if ($xenOptions['facebookLike'])
{
$__compilerVar13 .= '
				<div class="facebookLike shareControl">
					';
$__extraData['facebookSdk'] = '';
$__extraData['facebookSdk'] .= '1';
$__compilerVar13 .= '
					<fb:like href="' . htmlspecialchars($__compilerVar10, ENT_QUOTES, 'UTF-8') . '" show_faces="true" width="400" action="' . htmlspecialchars($xenOptions['facebookLikeAction'], ENT_QUOTES, 'UTF-8') . '" font="trebuchet ms" colorscheme="' . XenForo_Template_Helper_Core::styleProperty('fbColorScheme') . '"></fb:like>
				</div>
			';
}
$__compilerVar13 .= '
			';
$__compilerVar12 .= $this->callTemplateHook('share_page_options', $__compilerVar13, array());
unset($__compilerVar13);
$__compilerVar12 .= '
		';
if (trim($__compilerVar12) !== '')
{
$__compilerVar11 .= '
	';
$this->addRequiredExternal('css', 'share_page');
$__compilerVar11 .= '

	<div class="sharePage">
		<h3 class="textHeading larger">' . 'Chia sẻ trang này' . '</h3>
		' . $__compilerVar12 . '
	</div>
';
}
unset($__compilerVar12);
$__output .= $__compilerVar11;
unset($__compilerVar10, $__compilerVar11);
$__output .= '
';
$__compilerVar14 = '';
$__output .= $this->callTemplateHook('sonnb_cr_information', $__compilerVar14, array());
unset($__compilerVar14);
$__output .= '

';
if (!$location['location_lat'] && !$location['location_lng'])
{
$__output .= '
	<script type="text/javascript">
		!function($, window, document, _undefined) {
			var geocoder = new google.maps.Geocoder(),
				latlng = new google.maps.LatLng(-34.397, 150.644),
				mapOptions = {
					zoom: 7,
					center: latlng,
					mapTypeId: google.maps.MapTypeId.HYBRID
				}
				map = new google.maps.Map(document.getElementById("map"), mapOptions);
			
			geocoder.geocode({\'address\': \'' . htmlspecialchars($location['location_name'], ENT_QUOTES, 'UTF-8') . '\'}, function(results, status) 
			{
				if (status == google.maps.GeocoderStatus.OK) 
				{
					map.setCenter(results[0].geometry.location);
					var marker = new google.maps.Marker({
							map: map,
							position: results[0].geometry.location
						})
						infoWindow = new google.maps.InfoWindow({
							content: \'<div class="windowInfo"><h2 class="title"><a href="javascript:void(0);">' . htmlspecialchars($location['location_name'], ENT_QUOTES, 'UTF-8') . '</a></h2></div>\'
						});
					google.maps.event.addListener(marker, \'click\', function() 
					{		
						infoWindow.open(map, marker);
					});
				}
			});
		}(jQuery, this, document);
	</script>
';
}
else
{
$__output .= '
	<script type="text/javascript">
		!function($, window, document, _undefined) {
			var point = new google.maps.LatLng(' . (($location['location_lat']) ? (htmlspecialchars($location['location_lat'], ENT_QUOTES, 'UTF-8')) : ('0')) . ', ' . (($location['location_lng']) ? (htmlspecialchars($location['location_lng'], ENT_QUOTES, 'UTF-8')) : ('0')) . '),
				map = new google.maps.Map(document.getElementById("map"), {
					center: new google.maps.LatLng(' . (($location['location_lat']) ? (htmlspecialchars($location['location_lat'], ENT_QUOTES, 'UTF-8')) : ('0')) . ', ' . (($location['location_lng']) ? (htmlspecialchars($location['location_lng'], ENT_QUOTES, 'UTF-8')) : ('0')) . '),
					zoom: 8,
					mapTypeId: google.maps.MapTypeId.HYBRID
				}),
				marker = new google.maps.Marker({
					map: map,
					position: point,
					title: \'' . htmlspecialchars($location['location_name'], ENT_QUOTES, 'UTF-8') . '\'
				}),
				infoWindow = new google.maps.InfoWindow({
					content: \'<div class="windowInfo"><h2 class="title"><a href="javascript:void(0);">' . htmlspecialchars($location['location_name'], ENT_QUOTES, 'UTF-8') . '</a></h2></div>\'
				});
				
			google.maps.event.addListener(marker, \'click\', function() 
			{		
				infoWindow.open(map, marker);
			});
		}(jQuery, this, document);
	</script>
';
}
