<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__extraData['title'] = '';
$__extraData['title'] .= 'Locations' . XenForo_Template_Helper_Core::callHelper('pagenumber', array(
'0' => $page
));
$__output .= '
';
$__extraData['h1'] = '';
$__extraData['h1'] .= 'Locations';
$__output .= '
';
$__extraData['pageDescription'] = array();
$__extraData['pageDescription']['content'] = '';
$__extraData['pageDescription']['content'] .= 'Explore popular locations where our members at ' . htmlspecialchars($xenOptions['boardTitle'], ENT_QUOTES, 'UTF-8') . ' usually take photos.';
$__output .= '

';
$__extraData['head']['canonical'] = '';
$__extraData['head']['canonical'] .= '
	<link rel="canonical" href="' . XenForo_Template_Helper_Core::link('canonical:gallery/locations', false, array()) . '" />
';
$__output .= '

';
$__extraData['navigation'] = array();
$__extraData['navigation'] = XenForo_Template_Helper_Core::appendBreadCrumbs($__extraData['navigation'], $breadCrumbs);
$__output .= '

';
$this->addRequiredExternal('css', 'sonnb_xengallery_location_view');
$__output .= '
';
if ($locations)
{
$__output .= '
	';
$this->addRequiredExternal('js', '//maps.googleapis.com/maps/api/js?libraries=places&sensor=false' . (($xenOptions['sonnbXG_mapApiKey']) ? ('&key=' . htmlspecialchars($xenOptions['sonnbXG_mapApiKey'], ENT_QUOTES, 'UTF-8')) : ('')));
$__output .= '
	';
$this->addRequiredExternal('js', 'js/sonnb/XenGallery/gallery.map.markercluster.js');
$__output .= '
';
}
$__output .= '

';
if ($locations)
{
$__output .= '
	<div id="map"></div>
';
}
else
{
$__output .= '
	<div class="clearfix masonryContainer">
		<div style="text-align: center;">' . 'There is no location was recently tagged yet. ' . '</div>
	</div>
';
}
$__output .= '
';
$__compilerVar6 = '';
$__compilerVar6 .= XenForo_Template_Helper_Core::link('canonical:gallery/locations', false, array());
$__compilerVar7 = '';
$__compilerVar8 = '';
$__compilerVar8 .= '
			';
$__compilerVar9 = '';
$__compilerVar9 .= '
			';
if ($xenOptions['tweet']['enabled'])
{
$__compilerVar9 .= '
				<div class="tweet shareControl">
					<a href="https://twitter.com/share" class="twitter-share-button"
						data-count="horizontal"
						data-lang="' . XenForo_Template_Helper_Core::callHelper('twitterLang', array(
'0' => $visitorLanguage['language_code']
)) . '"
						data-url="' . htmlspecialchars($__compilerVar6, ENT_QUOTES, 'UTF-8') . '"
						' . (($thread['title']) ? ('data-text="' . XenForo_Template_Helper_Core::callHelper('threadPrefix', array(
'0' => $thread,
'1' => 'escaped'
)) . htmlspecialchars($thread['title'], ENT_QUOTES, 'UTF-8') . '"') : ('')) . '
						' . (($xenOptions['tweet']['via']) ? ('data-via="' . htmlspecialchars($xenOptions['tweet']['via'], ENT_QUOTES, 'UTF-8') . '"') : ('')) . '
						' . (($xenOptions['tweet']['related']) ? ('data-related="' . htmlspecialchars($xenOptions['tweet']['related'], ENT_QUOTES, 'UTF-8') . '"') : ('')) . '>' . 'Tweet' . '</a>
				</div>
			';
}
$__compilerVar9 .= '
			';
if ($xenOptions['plusone'])
{
$__compilerVar9 .= '
				<div class="plusone shareControl">
					<div class="g-plusone" data-size="medium" data-count="true" data-href="' . htmlspecialchars($__compilerVar6, ENT_QUOTES, 'UTF-8') . '"></div>
				</div>
			';
}
$__compilerVar9 .= '
			';
if ($xenOptions['facebookLike'])
{
$__compilerVar9 .= '
				<div class="facebookLike shareControl">
					';
$__extraData['facebookSdk'] = '';
$__extraData['facebookSdk'] .= '1';
$__compilerVar9 .= '
					<fb:like href="' . htmlspecialchars($__compilerVar6, ENT_QUOTES, 'UTF-8') . '" show_faces="true" width="400" action="' . htmlspecialchars($xenOptions['facebookLikeAction'], ENT_QUOTES, 'UTF-8') . '" font="trebuchet ms" colorscheme="' . XenForo_Template_Helper_Core::styleProperty('fbColorScheme') . '"></fb:like>
				</div>
			';
}
$__compilerVar9 .= '
			';
$__compilerVar8 .= $this->callTemplateHook('share_page_options', $__compilerVar9, array());
unset($__compilerVar9);
$__compilerVar8 .= '
		';
if (trim($__compilerVar8) !== '')
{
$__compilerVar7 .= '
	';
$this->addRequiredExternal('css', 'share_page');
$__compilerVar7 .= '

	<div class="sharePage">
		<h3 class="textHeading larger">' . 'Chia sẻ trang này' . '</h3>
		' . $__compilerVar8 . '
	</div>
';
}
unset($__compilerVar8);
$__output .= $__compilerVar7;
unset($__compilerVar6, $__compilerVar7);
$__output .= '
';
$__compilerVar10 = '';
$__output .= $this->callTemplateHook('sonnb_cr_information', $__compilerVar10, array());
unset($__compilerVar10);
$__output .= '

';
if ($locations)
{
$__output .= '
	<script type="text/javascript">
		!function($, window, document, _undefined)
		{
			var markerClusters = [],
				infoWindows = [],
				markerCluster,
				grouped = ' . $locationGrouped . ',
				geocoder = new google.maps.Geocoder(),
				latlng = new google.maps.LatLng(-34.397, 150.644),
				map = new google.maps.Map(document.getElementById("map"), {
					center: latlng,
					zoom: 6,
					mapTypeId: google.maps.MapTypeId.HYBRID
				}),
				setMap = false;
			
			if (grouped)
			{
				$.each(grouped, function(index, location)
				{					
					var htmlChild = location.url,
						pointChild = new google.maps.LatLng(parseFloat(location.location_lat) ? location.location_lat : 0, parseFloat(location.location_lng) ? location.location_lng : 0);
						
					if (parseFloat(location.location_lat) === 0 && parseFloat(location.location_lng) === 0)
					{
						geocoder.geocode({\'address\': location.location_name}, function(results, status) 
						{
							if (status == google.maps.GeocoderStatus.OK) 
							{
								pointChild = results[0].geometry.location;
							
								if (setMap == false)
								{
									map.setCenter(pointChild);
									setMap = true;
								}
						
								var markerChild = new google.maps.Marker({
									map: map,
									position: pointChild,
									title: location.location_name
								}),
								infoWindow = new google.maps.InfoWindow({
									content: htmlChild
								});
								infoWindows.push(infoWindow);
								
								google.maps.event.addListener(markerChild, \'click\', function() 
								{
									for (var i=0; i<infoWindows.length; i++) 
									{
										infoWindows[i].close();
									}
									
									infoWindow.open(map, markerChild);
								});
								
								markerClusters.push(markerChild);
								markerCluster = new MarkerClusterer(map, markerClusters);
							}
						});
					}
					else
					{
						if (setMap == false)
						{
							map.setCenter(pointChild);
							setMap = true;
						}
					
						var markerChild = new google.maps.Marker({
							map: map,
							position: pointChild,
							title: location.location_name
						}),
						infoWindow = new google.maps.InfoWindow({
							content: htmlChild
						});
						infoWindows.push(infoWindow);
						
						google.maps.event.addListener(markerChild, \'click\', function() 
						{
							for (var i=0; i<infoWindows.length; i++) 
							{
								infoWindows[i].close();
							}
							
							infoWindow.open(map, markerChild);
						});
						
						markerClusters.push(markerChild);
					}
				});
			}
			
			google.maps.event.addListener(map, "click", function(event) 
			{
				for (var i=0; i<infoWindows.length; i++) 
				{
					infoWindows[i].close();
				}
			});
			markerCluster = new MarkerClusterer(map, markerClusters);
		}
		(jQuery, this, document);
	</script>
';
}
