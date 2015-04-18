<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__extraData['h1'] = '';
$__output .= '

';
$__extraData['pageDescription'] = array();
$__extraData['pageDescription']['content'] = '';
$__extraData['pageDescription']['content'] .= htmlspecialchars($resource['tag_line'], ENT_QUOTES, 'UTF-8');
$__output .= '

';
$__extraData['head']['openGraph'] = '';
$__extraData['head']['openGraph'] .= '
	';
$__compilerVar40 = '';
$__compilerVar40 .= XenForo_Template_Helper_Core::link('canonical:resources', $resource, array());
$__compilerVar41 = '';
$__compilerVar41 .= XenForo_Template_Helper_Core::callHelper('resourcePrefix', array(
'0' => $resource,
'1' => 'escaped'
)) . htmlspecialchars($resource['title'], ENT_QUOTES, 'UTF-8');
$__compilerVar42 = '';
if ($xenOptions['facebookAppId'] OR $xenOptions['facebookAdmins'])
{
$__compilerVar42 .= '
	<meta property="og:site_name" content="' . htmlspecialchars($xenOptions['boardTitle'], ENT_QUOTES, 'UTF-8') . '" />
	';
if ($avatar)
{
$__compilerVar42 .= '<meta property="og:image" content="' . htmlspecialchars($avatar, ENT_QUOTES, 'UTF-8') . '" />';
}
$__compilerVar42 .= '
	<meta property="og:image" content="';
$__compilerVar43 = '';
$__compilerVar43 .= XenForo_Template_Helper_Core::callHelper('fullurl', array(
'0' => XenForo_Template_Helper_Core::styleProperty('ogLogoPath'),
'1' => '1'
));
$__compilerVar42 .= $this->callTemplateCallback('OpenGraphImage_Callback', 'getImage', $__compilerVar43, array());
unset($__compilerVar43);
$__compilerVar42 .= '" />
	<meta property="og:type" content="' . (($ogType) ? (htmlspecialchars($ogType, ENT_QUOTES, 'UTF-8')) : ('article')) . '" />
	<meta property="og:url" content="' . $__compilerVar40 . '" />
	<meta property="og:title" content="' . $__compilerVar41 . '" />
	';
if ($description)
{
$__compilerVar42 .= '<meta property="og:description" content="' . $description . '" />';
}
$__compilerVar42 .= '
	' . $ogExtraHtml . '
	';
if ($xenOptions['facebookAppId'])
{
$__compilerVar42 .= '<meta property="fb:app_id" content="' . htmlspecialchars($xenOptions['facebookAppId'], ENT_QUOTES, 'UTF-8') . '" />';
}
$__compilerVar42 .= '
	';
if ($xenOptions['facebookAdmins'])
{
$__compilerVar42 .= '<meta property="fb:admins" content="' . XenForo_Template_Helper_Core::callHelper('implode', array(
'0' => $xenOptions['facebookAdmins'],
'1' => ','
)) . '" />';
}
$__compilerVar42 .= '
';
}
$__extraData['head']['openGraph'] .= $__compilerVar42;
unset($__compilerVar40, $__compilerVar41, $__compilerVar42);
$__output .= '
';
$__extraData['searchBar']['resourceUpdate'] = '';
$__compilerVar44 = '';
if ($category)
{
$__compilerVar44 .= '
	<label title="' . 'Search only ' . htmlspecialchars($category['category_title'], ENT_QUOTES, 'UTF-8') . '' . '"><input type="checkbox" name="type[resource_update][categories][]" value="' . htmlspecialchars($category['resource_category_id'], ENT_QUOTES, 'UTF-8') . '" checked="checked" /> ' . 'Search this category only' . '</label>
';
}
else
{
$__compilerVar44 .= '
	<label><input type="checkbox" name="type[resource_update][null]" value="" checked="checked" id="search_bar_resources" /> ' . 'Search resources only' . '</label>
';
}
$__compilerVar44 .= '
<ul>
	<li><label><input type="checkbox" name="type[resource_update][is_resource]" value="1" /> ' . 'Search only resource descriptions' . '</label>
</ul>';
$__extraData['searchBar']['resourceUpdate'] .= $__compilerVar44;
unset($__compilerVar44);
$__output .= '

';
$__extraData['navigation'] = array();
$__extraData['navigation'] = XenForo_Template_Helper_Core::appendBreadCrumbs($__extraData['navigation'], $categoryBreadcrumbs);
$__output .= '

';
if ($resource['canAddVersion'])
{
$__output .= '
	';
$__extraData['topctrl'] = '';
$__extraData['topctrl'] .= '<a href="' . XenForo_Template_Helper_Core::link('resources/add-version', $resource, array()) . '" class="callToAction"><span>' . 'Post Resource Update' . '</span></a>';
$__output .= '
';
}
$__output .= '

';
$this->addRequiredExternal('css', 'resource_view');
$__output .= '

';
$__compilerVar45 = '';
$this->addRequiredExternal('css', 'resource_view_header');
$__compilerVar45 .= '

<div class="resourceInfo">
';
$__compilerVar46 = '';
$__compilerVar46 .= '
	';
$__compilerVar47 = '';
$__compilerVar47 .= '
			';
if ($resource['external_purchase_url'])
{
$__compilerVar47 .= '
				<li><label class="downloadButton purchase">
					<a href="' . htmlspecialchars($resource['external_purchase_url'], ENT_QUOTES, 'UTF-8') . '" class="inner">
						' . 'Buy Now for ' . htmlspecialchars($resource['cost'], ENT_QUOTES, 'UTF-8') . '' . '
					</a>
				</label></li>
			';
}
else if (!$resource['is_fileless'])
{
$__compilerVar47 .= '
				<li><label class="downloadButton ' . ((!$resource['canDownload']) ? ('downloadDisabled') : ('')) . '">
					<a href="' . XenForo_Template_Helper_Core::link('resources/download', $resource, array(
'version' => $resource['current_version_id']
)) . '" class="inner">
						';
if ($resource['canDownload'])
{
$__compilerVar47 .= 'Download Now';
}
else
{
$__compilerVar47 .= 'Đăng Ký Để Download';
}
$__compilerVar47 .= '
						';
if ($resource['download_url'])
{
$__compilerVar47 .= '
							<small class="minorText">' . 'Via external site' . '</small>
						';
}
else
{
$__compilerVar47 .= '
							<small class="minorText">' . XenForo_Template_Helper_Core::numberFormat($resource['attachment']['file_size'], 'size') . ' .' . htmlspecialchars($resource['attachment']['extension'], ENT_QUOTES, 'UTF-8') . '</small>
						';
}
$__compilerVar47 .= '
					</a>
				</label></li>
			';
}
$__compilerVar47 .= '

			';
$__compilerVar48 = '';
$__compilerVar47 .= $this->callTemplateHook('resource_view_header_after_resource_buttons', $__compilerVar48, array());
unset($__compilerVar48);
$__compilerVar47 .= '
		';
if (trim($__compilerVar47) !== '')
{
$__compilerVar46 .= '
		<ul class="primaryLinks ' . (($resource['is_fileless'] AND !$resource['external_purchase_url']) ? ('noButton') : ('')) . '">
		' . $__compilerVar47 . '
		</ul>
	';
}
unset($__compilerVar47);
$__compilerVar46 .= '

	<div class="resourceImage">
		';
if ($xenOptions['resourceAllowIcons'])
{
$__compilerVar46 .= '
			<img src="' . XenForo_Template_Helper_Core::callHelper('resourceiconurl', array(
'0' => $resource
)) . '" alt="" class="resourceIcon" />
		';
}
else
{
$__compilerVar46 .= '
			' . XenForo_Template_Helper_Core::callHelper('avatarhtml', array($resource,(true),array(
'user' => '$resource',
'size' => 's',
'img' => 'true'
),'')) . '
		';
}
$__compilerVar46 .= '
	</div>

	<h1>';
if ($titleHtml AND $titleHtml != htmlspecialchars($resource['title'], ENT_QUOTES, 'UTF-8', true))
{
$__compilerVar46 .= $titleHtml;
}
else
{
$__compilerVar46 .= XenForo_Template_Helper_Core::callHelper('resourcePrefix', array(
'0' => $resource
)) . htmlspecialchars($resource['title'], ENT_QUOTES, 'UTF-8');
}
$__compilerVar46 .= ' ';
if (!$resource['isFilelessNoExternal'])
{
$__compilerVar46 .= '<span class="muted">' . htmlspecialchars($resource['version_string'], ENT_QUOTES, 'UTF-8') . '</span>';
}
$__compilerVar46 .= '</h1>
	';
if ($resource['tag_line'] OR $extraDescriptionHtml)
{
$__compilerVar46 .= '<p class="tagLine muted">' . htmlspecialchars($resource['tag_line'], ENT_QUOTES, 'UTF-8');
if ($resource['tag_line'] AND $extraDescriptionHtml)
{
$__compilerVar46 .= '<br />';
}
$__compilerVar46 .= $extraDescriptionHtml . '</p>';
}
$__compilerVar46 .= '
';
$__compilerVar45 .= $this->callTemplateHook('resource_view_header_info', $__compilerVar46, array());
unset($__compilerVar46);
$__compilerVar45 .= '
</div>

';
$__compilerVar49 = '';
$__compilerVar45 .= $this->callTemplateHook('resource_view_header_after_info', $__compilerVar49, array());
unset($__compilerVar49);
$__compilerVar45 .= '

';
if ($resource['resource_state'] != ('visible'))
{
$__compilerVar45 .= '
	<ul class="secondaryContent resourceAlerts">
	';
if ($resource['resource_state'] == ('deleted'))
{
$__compilerVar45 .= '
		<li class="deletedAlert">
			<span class="icon"></span>
			' . 'This resource has been deleted.' . '
			';
if ($resource['delete_user_id'])
{
$__compilerVar45 .= '
				' . 'Bị xóa bởi ' . XenForo_Template_Helper_Core::callHelper('username', array(
'0' => array(
'user_id' => $resource['delete_user_id'],
'username' => $resource['delete_username']
)
)) . '' . ', ' . XenForo_Template_Helper_Core::callHelper('datetimehtml', array($resource['delete_date'],array(
'time' => htmlspecialchars($resource['delete_date'], ENT_QUOTES, 'UTF-8')
)));
if ($resource['delete_reason'])
{
$__compilerVar45 .= ', ' . 'Lý do' . ': ' . htmlspecialchars($resource['delete_reason'], ENT_QUOTES, 'UTF-8');
}
$__compilerVar45 .= '.
			';
}
$__compilerVar45 .= '
		</li>
	';
}
$__compilerVar45 .= '
	';
if ($resource['resource_state'] == ('moderated'))
{
$__compilerVar45 .= '
		<li class="moderatedAlert">
			<span class="icon"></span>
			' . 'This resource is currently awaiting approval.' . '
		</li>
	';
}
$__compilerVar45 .= '
	</ul>
';
}
$__output .= $__compilerVar45;
unset($__compilerVar45);
$__output .= '

';
$__compilerVar50 = '';
$this->addRequiredExternal('css', 'resource_view_tabs');
$__compilerVar50 .= '

<div class="resourceTabs">
	';
if ($resource['canWatch'])
{
$__compilerVar50 .= '
		<div class="extraLinks">
			<a href="' . XenForo_Template_Helper_Core::link('resources/watch', $resource, array()) . '" class="OverlayTrigger watchLink" data-cacheoverlay="false">';
if ($resource['is_watched'])
{
$__compilerVar50 .= 'Unwatch This Resource';
}
else
{
$__compilerVar50 .= 'Watch This Resource';
}
$__compilerVar50 .= '</a>
		</div>
	';
}
$__compilerVar50 .= '
	<ul class="tabs">
	';
$__compilerVar51 = '';
$__compilerVar51 .= '
		<li class="resourceTabDescription ' . (($selectedTab == ('description')) ? ('active') : ('')) . '">
			<a href="' . XenForo_Template_Helper_Core::link('resources', $resource, array()) . '">' . 'Overview' . '</a>
		</li>
		';
if ($resource['showExtraInfoTab'])
{
$__compilerVar51 .= '
			<li class="resourceTabExtra ' . (($selectedTab == ('extra')) ? ('active') : ('')) . '">
				<a href="' . XenForo_Template_Helper_Core::link('resources/extra', $resource, array()) . '">' . 'Extra Info' . '</a>
			</li>
		';
}
$__compilerVar51 .= '		
		';
if ($resource['customFieldTabs'])
{
$__compilerVar51 .= '
			';
foreach ($resource['customFieldTabs'] AS $fieldId)
{
$__compilerVar51 .= '
				<li class="resourceTabExtra ' . (($selectedTab == ('field_' . $fieldId)) ? ('active') : ('')) . '">
					<a href="' . XenForo_Template_Helper_Core::link('resources/field', $resource, array(
'field' => $fieldId
)) . '">' . XenForo_Template_Helper_Core::callHelper('resourceFieldTitle', array(
'0' => $fieldId
)) . '</a>
				</li>
			';
}
$__compilerVar51 .= '
		';
}
$__compilerVar51 .= '
		';
if ($resource['update_count'] or $resourceUpdateCount)
{
$__compilerVar51 .= '<li class="resourceTabUpdates ' . (($selectedTab == ('updates')) ? ('active') : ('')) . '">
			<a href="' . XenForo_Template_Helper_Core::link('resources/updates', $resource, array()) . '">' . 'Updates' . ' (' . XenForo_Template_Helper_Core::numberFormat($resourceUpdateCount, '0') . ')</a>
		</li>';
}
$__compilerVar51 .= '
		';
if ($resource['review_count'])
{
$__compilerVar51 .= '<li class="resourceTabReviews ' . (($selectedTab == ('reviews')) ? ('active') : ('')) . '">
			<a href="' . XenForo_Template_Helper_Core::link('resources/reviews', $resource, array()) . '">' . 'Reviews' . ' (' . htmlspecialchars($resource['review_count'], ENT_QUOTES, 'UTF-8') . ')</a>
		</li>';
}
$__compilerVar51 .= '
		';
if (!$resource['isFilelessNoExternal'])
{
$__compilerVar51 .= '<li class="resourceTabHistory ' . (($selectedTab == ('history')) ? ('active') : ('')) . '">
			<a href="' . XenForo_Template_Helper_Core::link('resources/history', $resource, array()) . '">' . 'Version History' . '</a>
			</li>';
}
$__compilerVar51 .= '
		';
if ($thread)
{
$__compilerVar51 .= '<li class="resourceTabDiscussion ' . (($selectedTab == ('discussion')) ? ('active') : ('')) . '">
			<a href="' . XenForo_Template_Helper_Core::link('threads', $thread, array()) . '">' . 'Discussion' . '</a>
		</li>';
}
$__compilerVar51 .= '
	';
$__compilerVar50 .= $this->callTemplateHook('resource_view_tabs', $__compilerVar51, array());
unset($__compilerVar51);
$__compilerVar50 .= '
	</ul>
</div>';
$__output .= $__compilerVar50;
unset($__compilerVar50);
$__output .= '

<div class="innerContent">
	' . $_subView . '
</div>

';
$__extraData['sidebar'] = '';
$__extraData['sidebar'] .= '
	';
$__extraData['noVisitorPanel'] = '';
$__extraData['noVisitorPanel'] .= '1';
$__extraData['sidebar'] .= '

	';
$__compilerVar52 = '';
$__extraData['sidebar'] .= $this->callTemplateHook('resource_view_sidebar_start', $__compilerVar52, array(
'resource' => $resource
));
unset($__compilerVar52);
$__extraData['sidebar'] .= '
	
	<div class="section statsList" id="resourceInfo"' . (($resource['rating_count']) ? (' itemscope="itemscope" itemtype="http://data-vocabulary.org/Review-aggregate"') : ('')) . '>
		<div class="secondaryContent">
		';
$__compilerVar53 = '';
$__compilerVar53 .= '
			';
if ($resource['feature_date'])
{
$__compilerVar53 .= '
				<strong class="featuredNotice">' . 'Featured' . '</strong>
			';
}
$__compilerVar53 .= '
			<h3>
				' . 'Thông tin' . '
			</h3>
			<span style="display:none">
				<span itemprop="itemreviewed">' . XenForo_Template_Helper_Core::callHelper('resourcePrefix', array(
'0' => $resource,
'1' => 'escaped'
)) . htmlspecialchars($resource['title'], ENT_QUOTES, 'UTF-8') . '</span>,
				<span itemprop="votes">' . htmlspecialchars($resource['rating_count'], ENT_QUOTES, 'UTF-8') . '</span> ' . 'votes' . '
			</span>
			<div class="pairsJustified">
				<dl class="author"><dt>' . 'Tác giả' . ':</dt>
					';
if ($resource['user_id'])
{
$__compilerVar53 .= '
						<dd><a href="' . XenForo_Template_Helper_Core::link('resources/authors', $resource, array()) . '">' . htmlspecialchars($resource['username'], ENT_QUOTES, 'UTF-8') . '</a></dd>
					';
}
else
{
$__compilerVar53 .= '
						<dd>' . htmlspecialchars($resource['username'], ENT_QUOTES, 'UTF-8') . '</dd>
					';
}
$__compilerVar53 .= '
				</dl>
				';
if (!$resource['is_fileless'])
{
$__compilerVar53 .= '
					<dl class="downloadCount"><dt title="' . 'By unique downloaders' . '">' . 'Total Downloads' . ':</dt>
						<dd>' . XenForo_Template_Helper_Core::numberFormat($resource['download_count'], '0') . '</dd></dl>
				';
}
$__compilerVar53 .= '
				<dl class="firstRelease"><dt>' . 'First Release' . ':</dt>
					<dd>' . XenForo_Template_Helper_Core::callHelper('datetimehtml', array($resource['resource_date'],array(
'time' => '$resource.resource_date'
))) . '</dd></dl>
				<dl class="lastUpdate"><dt>' . 'Last Update' . ':</dt>
					<dd>' . XenForo_Template_Helper_Core::callHelper('datetimehtml', array($resource['last_update'],array(
'time' => '$resource.last_update'
))) . '</dd></dl>
				<dl class="resourceCategory"><dt>' . 'Category' . ':</dt>
					<dd><a href="' . XenForo_Template_Helper_Core::link('resources/categories', $category, array()) . '">' . htmlspecialchars($category['category_title'], ENT_QUOTES, 'UTF-8') . '</a></dd></dl>
				';
$__compilerVar54 = '';
$__compilerVar54 .= (($resource['canRateIfDownloaded']) ? (XenForo_Template_Helper_Core::link('resources/rate', $resource, array())) : (''));
$__compilerVar55 = '';
$__compilerVar55 .= htmlspecialchars($resource['rating_avg'], ENT_QUOTES, 'UTF-8');
$__compilerVar56 = '';
$__compilerVar56 .= 'All-Time Rating' . ':';
$__compilerVar57 = '';
$__compilerVar57 .= (($resource['rating_count'] == 1) ? ('1 phiếu') : ('' . htmlspecialchars($resource['rating_count'], ENT_QUOTES, 'UTF-8') . ' phiếu'));
$__compilerVar58 = '';
$__compilerVar58 .= (($resource['rating_count']) ? ('1') : ('0'));
$__compilerVar59 = '';
$this->addRequiredExternal('css', 'rating');
$__compilerVar59 .= '

';
if ($__compilerVar54)
{
$__compilerVar59 .= '
	';
$this->addRequiredExternal('js', 'js/xenforo/rating.js');
$__compilerVar59 .= '

	<form action="' . htmlspecialchars($__compilerVar54, ENT_QUOTES, 'UTF-8') . '" method="post" class="rating RatingWidget" ' . (($__compilerVar58) ? ('itemscope="itemscope" itemtype="http://data-vocabulary.org/Rating"') : ('')) . '>
		<dl>
			<dt class="prompt muted">' . $__compilerVar56 . '</dt>
			<dd>
				<span class="ratings">
					 <button type="submit" name="rating" value="1" class="star ' . (($__compilerVar55 >= 1) ? ('Full') : ('')) . (($__compilerVar55 >= 0.5 AND $__compilerVar55 < 1) ? ('Half') : ('')) . '" title="' . 'Terrible' . '">1</button
					><button type="submit" name="rating" value="2" class="star ' . (($__compilerVar55 >= 2) ? ('Full') : ('')) . (($__compilerVar55 >= 1.5 AND $__compilerVar55 < 2) ? ('Half') : ('')) . '" title="' . 'Poor' . '">2</button
					><button type="submit" name="rating" value="3" class="star ' . (($__compilerVar55 >= 3) ? ('Full') : ('')) . (($__compilerVar55 >= 2.5 AND $__compilerVar55 < 3) ? ('Half') : ('')) . '" title="' . 'Average' . '">3</button
					><button type="submit" name="rating" value="4" class="star ' . (($__compilerVar55 >= 4) ? ('Full') : ('')) . (($__compilerVar55 >= 3.5 AND $__compilerVar55 < 4) ? ('Half') : ('')) . '" title="' . 'Good' . '">4</button
					><button type="submit" name="rating" value="5" class="star ' . (($__compilerVar55 >= 5) ? ('Full') : ('')) . (($__compilerVar55 >= 4.5 AND $__compilerVar55 < 5) ? ('Half') : ('')) . '" title="' . 'Excellent' . '">5</button>
				</span>
			
				<span class="RatingValue"><span class="Number" itemprop="average">' . htmlspecialchars($__compilerVar55, ENT_QUOTES, 'UTF-8') . '</span>/<span itemprop="best">5</span>,</span>
				';
if ($threadrating['whoRated'] AND $controllerName == ('XenForo_ControllerPublic_Thread') AND $thread['thread_rate_count'] > 0)
{
$__compilerVar59 .= '
					<a href="' . XenForo_Template_Helper_Core::link('threads/whoRated', $thread, array()) . '" title="' . 'Who has rated this thread?' . '" class="OverlayTrigger"><span class="Hint">' . $__compilerVar57 . '</span></a>
				';
}
else
{
$__compilerVar59 .= '
				<span class="Hint">' . $__compilerVar57 . '</span>
				';
}
$__compilerVar59 .= '
			</dd>
		</dl>
		
		<input type="hidden" name="_xfToken" value="' . htmlspecialchars($visitor['csrf_token_page'], ENT_QUOTES, 'UTF-8') . '" />
	</form>
	
';
}
else
{
$__compilerVar59 .= '
	
	<div class="rating ';
if ($xenOptions['threadrating_greyedout'])
{
$__compilerVar59 .= 'tr_greyedout';
}
$__compilerVar59 .= '">
		<dl>
			<dt class="prompt muted">' . $__compilerVar56 . '</dt>
			<dd>		
				<span class="ratings" title="' . XenForo_Template_Helper_Core::numberFormat($__compilerVar55, '2') . '">
					 <span class="star ' . (($__compilerVar55 >= 1) ? ('Full') : ('')) . (($__compilerVar55 >= 0.5 AND $__compilerVar55 < 1) ? ('Half') : ('')) . '"></span
					><span class="star ' . (($__compilerVar55 >= 2) ? ('Full') : ('')) . (($__compilerVar55 >= 1.5 AND $__compilerVar55 < 2) ? ('Half') : ('')) . '"></span
					><span class="star ' . (($__compilerVar55 >= 3) ? ('Full') : ('')) . (($__compilerVar55 >= 2.5 AND $__compilerVar55 < 3) ? ('Half') : ('')) . '"></span
					><span class="star ' . (($__compilerVar55 >= 4) ? ('Full') : ('')) . (($__compilerVar55 >= 3.5 AND $__compilerVar55 < 4) ? ('Half') : ('')) . '"></span
					><span class="star ' . (($__compilerVar55 >= 5) ? ('Full') : ('')) . (($__compilerVar55 >= 4.5 AND $__compilerVar55 < 5) ? ('Half') : ('')) . '"></span>
				</span>
				
				<span class="RatingValue"><span class="Number" itemprop="average">' . htmlspecialchars($__compilerVar55, ENT_QUOTES, 'UTF-8') . '</span>/<span itemprop="best">5</span>,</span>
				';
if ($threadrating['whoRated'] AND $controllerName == ('XenForo_ControllerPublic_Thread') AND $thread['thread_rate_count'] > 0)
{
$__compilerVar59 .= '
					<a href="' . XenForo_Template_Helper_Core::link('threads/whoRated', $thread, array()) . '" title="' . 'Who has rated this thread?' . '" class="OverlayTrigger"><span class="Hint">' . $__compilerVar57 . '</span></a>
				';
}
else
{
$__compilerVar59 .= '
				<span class="Hint">' . $__compilerVar57 . '</span>
				';
}
$__compilerVar59 .= '
			</dd>
		</dl>	
	</div>

';
}
$__compilerVar53 .= $__compilerVar59;
unset($__compilerVar54, $__compilerVar55, $__compilerVar56, $__compilerVar57, $__compilerVar58, $__compilerVar59);
$__compilerVar53 .= '
			</div>

			';
if ($resource['external_url'])
{
$__compilerVar53 .= '
				<div class="footnote">
					<a href="' . htmlspecialchars($resource['external_url'], ENT_QUOTES, 'UTF-8') . '" ' . ((!$resource['isTrusted']) ? ('rel="nofollow"') : ('')) . ' target="_blank">' . 'Find more info at ' . htmlspecialchars($resource['external_url_components']['host'], ENT_QUOTES, 'UTF-8') . '' . '...</a>
				</div>
			';
}
$__compilerVar53 .= '
		';
$__extraData['sidebar'] .= $this->callTemplateHook('resource_view_sidebar_resource_info', $__compilerVar53, array());
unset($__compilerVar53);
$__extraData['sidebar'] .= '
		</div>
	</div>

	';
$__compilerVar60 = '';
$__extraData['sidebar'] .= $this->callTemplateHook('resource_view_sidebar_below_info', $__compilerVar60, array(
'resource' => $resource
));
unset($__compilerVar60);
$__extraData['sidebar'] .= '
	
	';
if (!$resource['isFilelessNoExternal'])
{
$__extraData['sidebar'] .= '
		<div class="section" id="versionInfo">
			<div class="secondaryContent">
			';
$__compilerVar61 = '';
$__compilerVar61 .= '
				<h3>' . 'Version ' . htmlspecialchars($resource['version_string'], ENT_QUOTES, 'UTF-8') . '' . '</h3>
		
				<div class="pairsJustified">
					<dl class="versionReleaseDate"><dt>' . 'Released' . ':</dt>
						<dd>' . XenForo_Template_Helper_Core::callHelper('datetimehtml', array($resource['release_date'],array(
'time' => '$resource.release_date'
))) . '</dd></dl>
		
					';
if (!$resource['is_fileless'])
{
$__compilerVar61 .= '
						<dl class="versionDownloadCount"><dt title="' . 'By unique downloaders' . '">' . 'Downloads' . ':</dt>
							<dd>' . XenForo_Template_Helper_Core::numberFormat($resource['version_download_count'], '0') . '</dd></dl>
					';
}
$__compilerVar61 .= '
		
					';
$__compilerVar62 = '';
$__compilerVar62 .= (($resource['canRateIfDownloaded']) ? (XenForo_Template_Helper_Core::link('resources/rate', $resource, array())) : (''));
$__compilerVar63 = '';
$__compilerVar63 .= htmlspecialchars($resource['version_rating'], ENT_QUOTES, 'UTF-8');
$__compilerVar64 = '';
$__compilerVar64 .= 'Version Rating' . ':';
$__compilerVar65 = '';
$__compilerVar65 .= (($resource['version_rating_count'] == 1) ? ('1 phiếu') : ('' . htmlspecialchars($resource['version_rating_count'], ENT_QUOTES, 'UTF-8') . ' phiếu'));
$__compilerVar66 = '';
$this->addRequiredExternal('css', 'rating');
$__compilerVar66 .= '

';
if ($__compilerVar62)
{
$__compilerVar66 .= '
	';
$this->addRequiredExternal('js', 'js/xenforo/rating.js');
$__compilerVar66 .= '

	<form action="' . htmlspecialchars($__compilerVar62, ENT_QUOTES, 'UTF-8') . '" method="post" class="rating RatingWidget" ' . (($microdata) ? ('itemscope="itemscope" itemtype="http://data-vocabulary.org/Rating"') : ('')) . '>
		<dl>
			<dt class="prompt muted">' . $__compilerVar64 . '</dt>
			<dd>
				<span class="ratings">
					 <button type="submit" name="rating" value="1" class="star ' . (($__compilerVar63 >= 1) ? ('Full') : ('')) . (($__compilerVar63 >= 0.5 AND $__compilerVar63 < 1) ? ('Half') : ('')) . '" title="' . 'Terrible' . '">1</button
					><button type="submit" name="rating" value="2" class="star ' . (($__compilerVar63 >= 2) ? ('Full') : ('')) . (($__compilerVar63 >= 1.5 AND $__compilerVar63 < 2) ? ('Half') : ('')) . '" title="' . 'Poor' . '">2</button
					><button type="submit" name="rating" value="3" class="star ' . (($__compilerVar63 >= 3) ? ('Full') : ('')) . (($__compilerVar63 >= 2.5 AND $__compilerVar63 < 3) ? ('Half') : ('')) . '" title="' . 'Average' . '">3</button
					><button type="submit" name="rating" value="4" class="star ' . (($__compilerVar63 >= 4) ? ('Full') : ('')) . (($__compilerVar63 >= 3.5 AND $__compilerVar63 < 4) ? ('Half') : ('')) . '" title="' . 'Good' . '">4</button
					><button type="submit" name="rating" value="5" class="star ' . (($__compilerVar63 >= 5) ? ('Full') : ('')) . (($__compilerVar63 >= 4.5 AND $__compilerVar63 < 5) ? ('Half') : ('')) . '" title="' . 'Excellent' . '">5</button>
				</span>
			
				<span class="RatingValue"><span class="Number" itemprop="average">' . htmlspecialchars($__compilerVar63, ENT_QUOTES, 'UTF-8') . '</span>/<span itemprop="best">5</span>,</span>
				';
if ($threadrating['whoRated'] AND $controllerName == ('XenForo_ControllerPublic_Thread') AND $thread['thread_rate_count'] > 0)
{
$__compilerVar66 .= '
					<a href="' . XenForo_Template_Helper_Core::link('threads/whoRated', $thread, array()) . '" title="' . 'Who has rated this thread?' . '" class="OverlayTrigger"><span class="Hint">' . $__compilerVar65 . '</span></a>
				';
}
else
{
$__compilerVar66 .= '
				<span class="Hint">' . $__compilerVar65 . '</span>
				';
}
$__compilerVar66 .= '
			</dd>
		</dl>
		
		<input type="hidden" name="_xfToken" value="' . htmlspecialchars($visitor['csrf_token_page'], ENT_QUOTES, 'UTF-8') . '" />
	</form>
	
';
}
else
{
$__compilerVar66 .= '
	
	<div class="rating ';
if ($xenOptions['threadrating_greyedout'])
{
$__compilerVar66 .= 'tr_greyedout';
}
$__compilerVar66 .= '">
		<dl>
			<dt class="prompt muted">' . $__compilerVar64 . '</dt>
			<dd>		
				<span class="ratings" title="' . XenForo_Template_Helper_Core::numberFormat($__compilerVar63, '2') . '">
					 <span class="star ' . (($__compilerVar63 >= 1) ? ('Full') : ('')) . (($__compilerVar63 >= 0.5 AND $__compilerVar63 < 1) ? ('Half') : ('')) . '"></span
					><span class="star ' . (($__compilerVar63 >= 2) ? ('Full') : ('')) . (($__compilerVar63 >= 1.5 AND $__compilerVar63 < 2) ? ('Half') : ('')) . '"></span
					><span class="star ' . (($__compilerVar63 >= 3) ? ('Full') : ('')) . (($__compilerVar63 >= 2.5 AND $__compilerVar63 < 3) ? ('Half') : ('')) . '"></span
					><span class="star ' . (($__compilerVar63 >= 4) ? ('Full') : ('')) . (($__compilerVar63 >= 3.5 AND $__compilerVar63 < 4) ? ('Half') : ('')) . '"></span
					><span class="star ' . (($__compilerVar63 >= 5) ? ('Full') : ('')) . (($__compilerVar63 >= 4.5 AND $__compilerVar63 < 5) ? ('Half') : ('')) . '"></span>
				</span>
				
				<span class="RatingValue"><span class="Number" itemprop="average">' . htmlspecialchars($__compilerVar63, ENT_QUOTES, 'UTF-8') . '</span>/<span itemprop="best">5</span>,</span>
				';
if ($threadrating['whoRated'] AND $controllerName == ('XenForo_ControllerPublic_Thread') AND $thread['thread_rate_count'] > 0)
{
$__compilerVar66 .= '
					<a href="' . XenForo_Template_Helper_Core::link('threads/whoRated', $thread, array()) . '" title="' . 'Who has rated this thread?' . '" class="OverlayTrigger"><span class="Hint">' . $__compilerVar65 . '</span></a>
				';
}
else
{
$__compilerVar66 .= '
				<span class="Hint">' . $__compilerVar65 . '</span>
				';
}
$__compilerVar66 .= '
			</dd>
		</dl>	
	</div>

';
}
$__compilerVar61 .= $__compilerVar66;
unset($__compilerVar62, $__compilerVar63, $__compilerVar64, $__compilerVar65, $__compilerVar66);
$__compilerVar61 .= '
		
					';
if ($resource['canRateIfDownloaded'] AND !$resource['canRate'])
{
$__compilerVar61 .= '
						<span class="muted">' . 'You may only rate after downloading.' . '</span>
					';
}
$__compilerVar61 .= '
				</div>
			';
$__extraData['sidebar'] .= $this->callTemplateHook('resource_view_sidebar_version_info', $__compilerVar61, array());
unset($__compilerVar61);
$__extraData['sidebar'] .= '
			</div>
		</div>
	';
}
$__extraData['sidebar'] .= '

	';
$__compilerVar67 = '';
$__extraData['sidebar'] .= $this->callTemplateHook('resource_view_sidebar_below_version', $__compilerVar67, array(
'resource' => $resource
));
unset($__compilerVar67);
$__extraData['sidebar'] .= '

	';
if ($xenOptions['allowAltResourceSupportUrl'] and $resource['alt_support_url'])
{
$__extraData['sidebar'] .= '
		<a class="callToAction" href="' . htmlspecialchars($resource['alt_support_url'], ENT_QUOTES, 'UTF-8') . '" ' . ((!$resource['isTrusted']) ? ('rel="nofollow"') : ('')) . '><span>
			' . 'Ask Questions / Get Support' . '
		</span></a>
	';
}
$__extraData['sidebar'] .= '

	';
$__compilerVar68 = '';
$__extraData['sidebar'] .= $this->callTemplateHook('resource_view_sidebar_below_support_button', $__compilerVar68, array(
'resource' => $resource
));
unset($__compilerVar68);
$__extraData['sidebar'] .= '

	';
if ($thread)
{
$__extraData['sidebar'] .= '<a class="callToAction" href="' . XenForo_Template_Helper_Core::link('threads', $thread, array()) . '"><span>
		' . 'Discuss This Resource' . '
		';
if ($thread['reply_count'])
{
$__extraData['sidebar'] .= '<small class="minorText">' . 'Trả lời' . ': ' . XenForo_Template_Helper_Core::numberFormat($thread['reply_count'], '0') . ', ' . 'Mới nhất' . ': ' . XenForo_Template_Helper_Core::datetime($thread['last_post_date'], '') . '</small>';
}
$__extraData['sidebar'] .= '
	</span></a>';
}
$__extraData['sidebar'] .= '

	';
$__compilerVar69 = '';
$__extraData['sidebar'] .= $this->callTemplateHook('resource_view_sidebar_below_discussion_button', $__compilerVar69, array(
'resource' => $resource
));
unset($__compilerVar69);
$__extraData['sidebar'] .= '

	';
$__compilerVar70 = '';
$__compilerVar70 .= '
					';
$__compilerVar71 = '';
$__compilerVar71 .= '
						';
if ($resource['canEdit'])
{
$__compilerVar71 .= '
							<li><a href="' . XenForo_Template_Helper_Core::link('resources/edit', $resource, array()) . '"><span>' . 'Edit Resource' . '</span></a></li>
						';
}
$__compilerVar71 .= '
						';
if ($resource['canEditIcon'])
{
$__compilerVar71 .= '
							<li><a href="' . XenForo_Template_Helper_Core::link('resources/icon', $resource, array()) . '" class="OverlayTrigger" id="EditIconTrigger"><span>' . 'Edit Resource Icon' . '</span></a></li>
						';
}
$__compilerVar71 .= '
						';
if ($resource['canAddVersion'])
{
$__compilerVar71 .= '
							<li><a href="' . XenForo_Template_Helper_Core::link('resources/add-version', $resource, array()) . '"><span>' . 'Post Resource Update' . '</span></a></li>
						';
}
$__compilerVar71 .= '
						';
if ($resource['canDelete'])
{
$__compilerVar71 .= '
							<li><a href="' . XenForo_Template_Helper_Core::link('resources/delete', $resource, array()) . '" class="OverlayTrigger"><span>' . 'Delete Resource' . '</span></a></li>
						';
}
$__compilerVar71 .= '
						';
if ($resource['canUndelete'])
{
$__compilerVar71 .= '
							<li><a href="' . XenForo_Template_Helper_Core::link('resources/undelete', $resource, array()) . '" class="OverlayTrigger"><span>' . 'Undelete Resource' . '</span></a></li>
						';
}
$__compilerVar71 .= '
						';
if ($resource['canApprove'])
{
$__compilerVar71 .= '
							<li><a href="' . XenForo_Template_Helper_Core::link('resources/approve', $resource, array(
't' => $visitor['csrf_token_page']
)) . '" class="OverlayTrigger"><span>' . 'Approve Resource' . '</span></a></li>
						';
}
$__compilerVar71 .= '
						';
if ($resource['canUnapprove'])
{
$__compilerVar71 .= '
							<li><a href="' . XenForo_Template_Helper_Core::link('resources/unapprove', $resource, array(
't' => $visitor['csrf_token_page']
)) . '" class="OverlayTrigger"><span>' . 'Unapprove Resource' . '</span></a></li>
						';
}
$__compilerVar71 .= '
						';
if ($resource['canFeatureUnfeature'])
{
$__compilerVar71 .= '
							<li><a href="' . XenForo_Template_Helper_Core::link('resources/toggle-featured', $resource, array(
't' => $visitor['csrf_token_page']
)) . '" class="OverlayTrigger">';
if ($resource['feature_date'])
{
$__compilerVar71 .= 'Unfeature Resource';
}
else
{
$__compilerVar71 .= 'Feature Resource';
}
$__compilerVar71 .= '</a></li>
						';
}
$__compilerVar71 .= '
						';
if ($resource['canReassign'])
{
$__compilerVar71 .= '
							<li><a href="' . XenForo_Template_Helper_Core::link('resources/reassign', $resource, array()) . '" class="OverlayTrigger"><span>' . 'Reassign Resource' . '</span></a></li>
						';
}
$__compilerVar71 .= '
					';
$__compilerVar70 .= $this->callTemplateHook('resource_controls', $__compilerVar71, array(
'resource' => $resource
));
unset($__compilerVar71);
$__compilerVar70 .= '
					';
if (trim($__compilerVar70) !== '')
{
$__extraData['sidebar'] .= '
		<div class="section">
			<div class="secondaryContent" id="authorTools">
				<h3>' . 'Resource Tools' . '</h3>
				<ul class="resourceControls">
					' . $__compilerVar70 . '
				</ul>
			</div>
		</div>
	';
}
unset($__compilerVar70);
$__extraData['sidebar'] .= '

	';
$__compilerVar72 = '';
$__extraData['sidebar'] .= $this->callTemplateHook('resource_view_sidebar_below_resource_controls', $__compilerVar72, array(
'resource' => $resource
));
unset($__compilerVar72);
$__extraData['sidebar'] .= '

	';
if ($otherResources)
{
$__extraData['sidebar'] .= '
	<div class="section">
		<div class="secondaryContent" id="moreAppsByAuthor">
			<h3><a href="' . XenForo_Template_Helper_Core::link('resources/authors', $resource, array()) . '" class="concealed">' . 'More Resources from ' . htmlspecialchars($resource['username'], ENT_QUOTES, 'UTF-8') . '' . '</a></h3>
			<dl>
			';
foreach ($otherResources AS $otherResource)
{
$__extraData['sidebar'] .= '
				<dt style="margin-top: 5px"><a href="' . XenForo_Template_Helper_Core::link('resources', $otherResource, array()) . '">' . XenForo_Template_Helper_Core::callHelper('resourcePrefix', array(
'0' => $otherResource
)) . XenForo_Template_Helper_Core::string('censor', array(
'0' => htmlspecialchars($otherResource['title'], ENT_QUOTES, 'UTF-8')
)) . '</a></dt>
					<dd class="muted">' . XenForo_Template_Helper_Core::string('censor', array(
'0' => htmlspecialchars($otherResource['tag_line'], ENT_QUOTES, 'UTF-8')
)) . '</dd>
			';
}
$__extraData['sidebar'] .= '
			</dl>
		</div>
	</div>
	';
}
$__extraData['sidebar'] .= '

	';
$__compilerVar73 = '';
$__extraData['sidebar'] .= $this->callTemplateHook('resource_view_sidebar_below_other_resources', $__compilerVar73, array(
'resource' => $resource
));
unset($__compilerVar73);
$__extraData['sidebar'] .= '

	';
$__compilerVar74 = '';
$__compilerVar74 .= XenForo_Template_Helper_Core::link('canonical:resources', $resource, array());
$__compilerVar75 = '';
$__compilerVar75 .= '<!--';
$__compilerVar76 = '';
$__compilerVar76 .= '
				';
$__compilerVar77 = '';
$__compilerVar77 .= '
				';
if ($xenOptions['tweet']['enabled'])
{
$__compilerVar77 .= '
					<div class="tweet shareControl">
						<a href="https://twitter.com/share" class="twitter-share-button" data-count="horizontal"
							data-lang="' . XenForo_Template_Helper_Core::callHelper('twitterLang', array(
'0' => $visitorLanguage['language_code']
)) . '"
							data-url="' . htmlspecialchars($__compilerVar74, ENT_QUOTES, 'UTF-8') . '"
							' . (($xenOptions['tweet']['via']) ? ('data-via="' . htmlspecialchars($xenOptions['tweet']['via'], ENT_QUOTES, 'UTF-8') . '"') : ('')) . '
							' . (($xenOptions['tweet']['related']) ? ('data-related="' . htmlspecialchars($xenOptions['tweet']['related'], ENT_QUOTES, 'UTF-8') . '"') : ('')) . '>' . 'Tweet' . '</a>
					</div>
				';
}
$__compilerVar77 .= '		
				';
if ($xenOptions['facebookLike'])
{
$__compilerVar77 .= '
					<div class="facebookLike shareControl">
						';
$__extraData['facebookSdk'] = '';
$__extraData['facebookSdk'] .= '1';
$__compilerVar77 .= '
						<fb:like href="' . htmlspecialchars($__compilerVar74, ENT_QUOTES, 'UTF-8') . '" layout="button_count" action="' . htmlspecialchars($xenOptions['facebookLikeAction'], ENT_QUOTES, 'UTF-8') . '" font="trebuchet ms" colorscheme="' . XenForo_Template_Helper_Core::styleProperty('fbColorScheme') . '"></fb:like>
					</div>
				';
}
$__compilerVar77 .= '
				';
if ($xenOptions['plusone'])
{
$__compilerVar77 .= '
					<div class="plusone shareControl">
						<div class="g-plusone" data-size="medium" data-count="true" data-href="' . htmlspecialchars($__compilerVar74, ENT_QUOTES, 'UTF-8') . '"></div>
					</div>
				';
}
$__compilerVar77 .= '	
				';
$__compilerVar76 .= $this->callTemplateHook('sidebar_share_page_options', $__compilerVar77, array());
unset($__compilerVar77);
$__compilerVar76 .= '		
			';
if (trim($__compilerVar76) !== '')
{
$__compilerVar75 .= '	
	';
$this->addRequiredExternal('css', 'sidebar_share_page');
$__compilerVar75 .= '
	<div class="section infoBlock sharePage">
		<div class="secondaryContent">
			<h3>' . 'Chia sẻ trang này' . '</h3>
			' . $__compilerVar76 . '
		</div>
	</div>
';
}
unset($__compilerVar76);
$__compilerVar75 .= '-->';
$__extraData['sidebar'] .= $__compilerVar75;
unset($__compilerVar74, $__compilerVar75);
$__extraData['sidebar'] .= '

	';
$__compilerVar78 = '';
$__extraData['sidebar'] .= $this->callTemplateHook('resource_view_sidebar_end', $__compilerVar78, array(
'resource' => $resource
));
unset($__compilerVar78);
$__extraData['sidebar'] .= '

';
$__output .= '

';
if ($autoClickTrigger)
{
$__output .= '
<script>
$(function() {
	$(\'' . XenForo_Template_Helper_Core::jsEscape(htmlspecialchars($autoClickTrigger, ENT_QUOTES, 'UTF-8'), 'double') . '\').click();
});
</script>
';
}
