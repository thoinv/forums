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
$__compilerVar1 = '';
$__compilerVar1 .= XenForo_Template_Helper_Core::link('canonical:resources', $resource, array());
$__compilerVar2 = '';
$__compilerVar2 .= XenForo_Template_Helper_Core::callHelper('resourcePrefix', array(
'0' => $resource,
'1' => 'escaped'
)) . htmlspecialchars($resource['title'], ENT_QUOTES, 'UTF-8');
$__compilerVar3 = '';
if ($xenOptions['facebookAppId'] OR $xenOptions['facebookAdmins'])
{
$__compilerVar3 .= '
	<meta property="og:site_name" content="' . htmlspecialchars($xenOptions['boardTitle'], ENT_QUOTES, 'UTF-8') . '" />
	';
if ($avatar)
{
$__compilerVar3 .= '<meta property="og:image" content="' . htmlspecialchars($avatar, ENT_QUOTES, 'UTF-8') . '" />';
}
$__compilerVar3 .= '
	<meta property="og:image" content="';
$__compilerVar4 = '';
$__compilerVar4 .= XenForo_Template_Helper_Core::callHelper('fullurl', array(
'0' => XenForo_Template_Helper_Core::styleProperty('ogLogoPath'),
'1' => '1'
));
$__compilerVar3 .= $this->callTemplateCallback('OpenGraphImage_Callback', 'getImage', $__compilerVar4, array());
unset($__compilerVar4);
$__compilerVar3 .= '" />
	<meta property="og:type" content="' . (($ogType) ? (htmlspecialchars($ogType, ENT_QUOTES, 'UTF-8')) : ('article')) . '" />
	<meta property="og:url" content="' . $__compilerVar1 . '" />
	<meta property="og:title" content="' . $__compilerVar2 . '" />
	';
if ($description)
{
$__compilerVar3 .= '<meta property="og:description" content="' . $description . '" />';
}
$__compilerVar3 .= '
	' . $ogExtraHtml . '
	';
if ($xenOptions['facebookAppId'])
{
$__compilerVar3 .= '<meta property="fb:app_id" content="' . htmlspecialchars($xenOptions['facebookAppId'], ENT_QUOTES, 'UTF-8') . '" />';
}
$__compilerVar3 .= '
	';
if ($xenOptions['facebookAdmins'])
{
$__compilerVar3 .= '<meta property="fb:admins" content="' . XenForo_Template_Helper_Core::callHelper('implode', array(
'0' => $xenOptions['facebookAdmins'],
'1' => ','
)) . '" />';
}
$__compilerVar3 .= '
';
}
$__extraData['head']['openGraph'] .= $__compilerVar3;
unset($__compilerVar1, $__compilerVar2, $__compilerVar3);
$__output .= '
';
$__extraData['searchBar']['resourceUpdate'] = '';
$__compilerVar5 = '';
if ($category)
{
$__compilerVar5 .= '
	<label title="' . 'Search only ' . htmlspecialchars($category['category_title'], ENT_QUOTES, 'UTF-8') . '' . '"><input type="checkbox" name="type[resource_update][categories][]" value="' . htmlspecialchars($category['resource_category_id'], ENT_QUOTES, 'UTF-8') . '" checked="checked" /> ' . 'Search this category only' . '</label>
';
}
else
{
$__compilerVar5 .= '
	<label><input type="checkbox" name="type[resource_update][null]" value="" checked="checked" id="search_bar_resources" /> ' . 'Search resources only' . '</label>
';
}
$__compilerVar5 .= '
<ul>
	<li><label><input type="checkbox" name="type[resource_update][is_resource]" value="1" /> ' . 'Search only resource descriptions' . '</label>
</ul>';
$__extraData['searchBar']['resourceUpdate'] .= $__compilerVar5;
unset($__compilerVar5);
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
$__compilerVar6 = '';
$this->addRequiredExternal('css', 'resource_view_header');
$__compilerVar6 .= '

<div class="resourceInfo">
';
$__compilerVar7 = '';
$__compilerVar7 .= '
	';
$__compilerVar8 = '';
$__compilerVar8 .= '
			';
if ($resource['external_purchase_url'])
{
$__compilerVar8 .= '
				<li><label class="downloadButton purchase">
					<a href="' . htmlspecialchars($resource['external_purchase_url'], ENT_QUOTES, 'UTF-8') . '" class="inner">
						' . 'Buy Now for ' . htmlspecialchars($resource['cost'], ENT_QUOTES, 'UTF-8') . '' . '
					</a>
				</label></li>
			';
}
else if (!$resource['is_fileless'])
{
$__compilerVar8 .= '
				<li><label class="downloadButton ' . ((!$resource['canDownload']) ? ('downloadDisabled') : ('')) . '">
					<a href="' . XenForo_Template_Helper_Core::link('resources/download', $resource, array(
'version' => $resource['current_version_id']
)) . '" class="inner">
						';
if ($resource['canDownload'])
{
$__compilerVar8 .= 'Download Now';
}
else
{
$__compilerVar8 .= 'Download Not Available';
}
$__compilerVar8 .= '
						';
if ($resource['download_url'])
{
$__compilerVar8 .= '
							<small class="minorText">' . 'Via external site' . '</small>
						';
}
else
{
$__compilerVar8 .= '
							<small class="minorText">' . XenForo_Template_Helper_Core::numberFormat($resource['attachment']['file_size'], 'size') . ' .' . htmlspecialchars($resource['attachment']['extension'], ENT_QUOTES, 'UTF-8') . '</small>
						';
}
$__compilerVar8 .= '
					</a>
				</label></li>
			';
}
$__compilerVar8 .= '

			';
$__compilerVar9 = '';
$__compilerVar8 .= $this->callTemplateHook('resource_view_header_after_resource_buttons', $__compilerVar9, array());
unset($__compilerVar9);
$__compilerVar8 .= '
		';
if (trim($__compilerVar8) !== '')
{
$__compilerVar7 .= '
		<ul class="primaryLinks ' . (($resource['is_fileless'] AND !$resource['external_purchase_url']) ? ('noButton') : ('')) . '">
		' . $__compilerVar8 . '
		</ul>
	';
}
unset($__compilerVar8);
$__compilerVar7 .= '

	<div class="resourceImage">
		';
if ($xenOptions['resourceAllowIcons'])
{
$__compilerVar7 .= '
			<img src="' . XenForo_Template_Helper_Core::callHelper('resourceiconurl', array(
'0' => $resource
)) . '" alt="" class="resourceIcon" />
		';
}
else
{
$__compilerVar7 .= '
			' . XenForo_Template_Helper_Core::callHelper('avatarhtml', array($resource,(true),array(
'user' => '$resource',
'size' => 's',
'img' => 'true'
),'')) . '
		';
}
$__compilerVar7 .= '
	</div>

	<h1>';
if ($titleHtml AND $titleHtml != htmlspecialchars($resource['title'], ENT_QUOTES, 'UTF-8', true))
{
$__compilerVar7 .= $titleHtml;
}
else
{
$__compilerVar7 .= XenForo_Template_Helper_Core::callHelper('resourcePrefix', array(
'0' => $resource
)) . htmlspecialchars($resource['title'], ENT_QUOTES, 'UTF-8');
}
$__compilerVar7 .= ' ';
if (!$resource['isFilelessNoExternal'])
{
$__compilerVar7 .= '<span class="muted">' . htmlspecialchars($resource['version_string'], ENT_QUOTES, 'UTF-8') . '</span>';
}
$__compilerVar7 .= '</h1>
	';
if ($resource['tag_line'] OR $extraDescriptionHtml)
{
$__compilerVar7 .= '<p class="tagLine muted">' . htmlspecialchars($resource['tag_line'], ENT_QUOTES, 'UTF-8');
if ($resource['tag_line'] AND $extraDescriptionHtml)
{
$__compilerVar7 .= '<br />';
}
$__compilerVar7 .= $extraDescriptionHtml . '</p>';
}
$__compilerVar7 .= '
';
$__compilerVar6 .= $this->callTemplateHook('resource_view_header_info', $__compilerVar7, array());
unset($__compilerVar7);
$__compilerVar6 .= '
</div>

';
$__compilerVar10 = '';
$__compilerVar6 .= $this->callTemplateHook('resource_view_header_after_info', $__compilerVar10, array());
unset($__compilerVar10);
$__compilerVar6 .= '

';
if ($resource['resource_state'] != ('visible'))
{
$__compilerVar6 .= '
	<ul class="secondaryContent resourceAlerts">
	';
if ($resource['resource_state'] == ('deleted'))
{
$__compilerVar6 .= '
		<li class="deletedAlert">
			<span class="icon"></span>
			' . 'This resource has been deleted.' . '
			';
if ($resource['delete_user_id'])
{
$__compilerVar6 .= '
				' . 'Deleted by ' . XenForo_Template_Helper_Core::callHelper('username', array(
'0' => array(
'user_id' => $resource['delete_user_id'],
'username' => $resource['delete_username']
)
)) . '' . ', ' . XenForo_Template_Helper_Core::callHelper('datetimehtml', array($resource['delete_date'],array(
'time' => htmlspecialchars($resource['delete_date'], ENT_QUOTES, 'UTF-8')
)));
if ($resource['delete_reason'])
{
$__compilerVar6 .= ', ' . 'Reason' . ': ' . htmlspecialchars($resource['delete_reason'], ENT_QUOTES, 'UTF-8');
}
$__compilerVar6 .= '.
			';
}
$__compilerVar6 .= '
		</li>
	';
}
$__compilerVar6 .= '
	';
if ($resource['resource_state'] == ('moderated'))
{
$__compilerVar6 .= '
		<li class="moderatedAlert">
			<span class="icon"></span>
			' . 'This resource is currently awaiting approval.' . '
		</li>
	';
}
$__compilerVar6 .= '
	</ul>
';
}
$__output .= $__compilerVar6;
unset($__compilerVar6);
$__output .= '

';
$__compilerVar11 = '';
$this->addRequiredExternal('css', 'resource_view_tabs');
$__compilerVar11 .= '

<div class="resourceTabs">
	';
if ($resource['canWatch'])
{
$__compilerVar11 .= '
		<div class="extraLinks">
			<a href="' . XenForo_Template_Helper_Core::link('resources/watch', $resource, array()) . '" class="OverlayTrigger watchLink" data-cacheoverlay="false">';
if ($resource['is_watched'])
{
$__compilerVar11 .= 'Unwatch This Resource';
}
else
{
$__compilerVar11 .= 'Watch This Resource';
}
$__compilerVar11 .= '</a>
		</div>
	';
}
$__compilerVar11 .= '
	<ul class="tabs">
	';
$__compilerVar12 = '';
$__compilerVar12 .= '
		<li class="resourceTabDescription ' . (($selectedTab == ('description')) ? ('active') : ('')) . '">
			<a href="' . XenForo_Template_Helper_Core::link('resources', $resource, array()) . '">' . 'Overview' . '</a>
		</li>
		';
if ($resource['showExtraInfoTab'])
{
$__compilerVar12 .= '
			<li class="resourceTabExtra ' . (($selectedTab == ('extra')) ? ('active') : ('')) . '">
				<a href="' . XenForo_Template_Helper_Core::link('resources/extra', $resource, array()) . '">' . 'Extra Info' . '</a>
			</li>
		';
}
$__compilerVar12 .= '		
		';
if ($resource['customFieldTabs'])
{
$__compilerVar12 .= '
			';
foreach ($resource['customFieldTabs'] AS $fieldId)
{
$__compilerVar12 .= '
				<li class="resourceTabExtra ' . (($selectedTab == ('field_' . $fieldId)) ? ('active') : ('')) . '">
					<a href="' . XenForo_Template_Helper_Core::link('resources/field', $resource, array(
'field' => $fieldId
)) . '">' . XenForo_Template_Helper_Core::callHelper('resourceFieldTitle', array(
'0' => $fieldId
)) . '</a>
				</li>
			';
}
$__compilerVar12 .= '
		';
}
$__compilerVar12 .= '
		';
if ($resource['update_count'] or $resourceUpdateCount)
{
$__compilerVar12 .= '<li class="resourceTabUpdates ' . (($selectedTab == ('updates')) ? ('active') : ('')) . '">
			<a href="' . XenForo_Template_Helper_Core::link('resources/updates', $resource, array()) . '">' . 'Updates' . ' (' . XenForo_Template_Helper_Core::numberFormat($resourceUpdateCount, '0') . ')</a>
		</li>';
}
$__compilerVar12 .= '
		';
if ($resource['review_count'])
{
$__compilerVar12 .= '<li class="resourceTabReviews ' . (($selectedTab == ('reviews')) ? ('active') : ('')) . '">
			<a href="' . XenForo_Template_Helper_Core::link('resources/reviews', $resource, array()) . '">' . 'Reviews' . ' (' . htmlspecialchars($resource['review_count'], ENT_QUOTES, 'UTF-8') . ')</a>
		</li>';
}
$__compilerVar12 .= '
		';
if (!$resource['isFilelessNoExternal'])
{
$__compilerVar12 .= '<li class="resourceTabHistory ' . (($selectedTab == ('history')) ? ('active') : ('')) . '">
			<a href="' . XenForo_Template_Helper_Core::link('resources/history', $resource, array()) . '">' . 'Version History' . '</a>
			</li>';
}
$__compilerVar12 .= '
		';
if ($thread)
{
$__compilerVar12 .= '<li class="resourceTabDiscussion ' . (($selectedTab == ('discussion')) ? ('active') : ('')) . '">
			<a href="' . XenForo_Template_Helper_Core::link('threads', $thread, array()) . '">' . 'Discussion' . '</a>
		</li>';
}
$__compilerVar12 .= '
	';
$__compilerVar11 .= $this->callTemplateHook('resource_view_tabs', $__compilerVar12, array());
unset($__compilerVar12);
$__compilerVar11 .= '
	</ul>
</div>';
$__output .= $__compilerVar11;
unset($__compilerVar11);
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
$__compilerVar13 = '';
$__extraData['sidebar'] .= $this->callTemplateHook('resource_view_sidebar_start', $__compilerVar13, array(
'resource' => $resource
));
unset($__compilerVar13);
$__extraData['sidebar'] .= '
	
	<div class="section statsList" id="resourceInfo"' . (($resource['rating_count']) ? (' itemscope="itemscope" itemtype="http://data-vocabulary.org/Review-aggregate"') : ('')) . '>
		<div class="secondaryContent">
		';
$__compilerVar14 = '';
$__compilerVar14 .= '
			';
if ($resource['feature_date'])
{
$__compilerVar14 .= '
				<strong class="featuredNotice">' . 'Featured' . '</strong>
			';
}
$__compilerVar14 .= '
			<h3>
				' . 'Information' . '
			</h3>
			<span style="display:none">
				<span itemprop="itemreviewed">' . XenForo_Template_Helper_Core::callHelper('resourcePrefix', array(
'0' => $resource,
'1' => 'escaped'
)) . htmlspecialchars($resource['title'], ENT_QUOTES, 'UTF-8') . '</span>,
				<span itemprop="votes">' . htmlspecialchars($resource['rating_count'], ENT_QUOTES, 'UTF-8') . '</span> ' . 'votes' . '
			</span>
			<div class="pairsJustified">
				<dl class="author"><dt>' . 'Author' . ':</dt>
					';
if ($resource['user_id'])
{
$__compilerVar14 .= '
						<dd><a href="' . XenForo_Template_Helper_Core::link('resources/authors', $resource, array()) . '">' . htmlspecialchars($resource['username'], ENT_QUOTES, 'UTF-8') . '</a></dd>
					';
}
else
{
$__compilerVar14 .= '
						<dd>' . htmlspecialchars($resource['username'], ENT_QUOTES, 'UTF-8') . '</dd>
					';
}
$__compilerVar14 .= '
				</dl>
				';
if (!$resource['is_fileless'])
{
$__compilerVar14 .= '
					<dl class="downloadCount"><dt title="' . 'By unique downloaders' . '">' . 'Total Downloads' . ':</dt>
						<dd>' . XenForo_Template_Helper_Core::numberFormat($resource['download_count'], '0') . '</dd></dl>
				';
}
$__compilerVar14 .= '
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
$__compilerVar15 = '';
$__compilerVar15 .= (($resource['canRateIfDownloaded']) ? (XenForo_Template_Helper_Core::link('resources/rate', $resource, array())) : (''));
$__compilerVar16 = '';
$__compilerVar16 .= htmlspecialchars($resource['rating_avg'], ENT_QUOTES, 'UTF-8');
$__compilerVar17 = '';
$__compilerVar17 .= 'All-Time Rating' . ':';
$__compilerVar18 = '';
$__compilerVar18 .= (($resource['rating_count'] == 1) ? ('1 vote') : ('' . htmlspecialchars($resource['rating_count'], ENT_QUOTES, 'UTF-8') . ' votes'));
$__compilerVar19 = '';
$__compilerVar19 .= (($resource['rating_count']) ? ('1') : ('0'));
$__compilerVar20 = '';
$this->addRequiredExternal('css', 'rating');
$__compilerVar20 .= '

';
if ($__compilerVar15)
{
$__compilerVar20 .= '
	';
$this->addRequiredExternal('js', 'js/xenforo/rating.js');
$__compilerVar20 .= '

	<form action="' . htmlspecialchars($__compilerVar15, ENT_QUOTES, 'UTF-8') . '" method="post" class="rating RatingWidget" ' . (($__compilerVar19) ? ('itemscope="itemscope" itemtype="http://data-vocabulary.org/Rating"') : ('')) . '>
		<dl>
			<dt class="prompt muted">' . $__compilerVar17 . '</dt>
			<dd>
				<span class="ratings">
					 <button type="submit" name="rating" value="1" class="star ' . (($__compilerVar16 >= 1) ? ('Full') : ('')) . (($__compilerVar16 >= 0.5 AND $__compilerVar16 < 1) ? ('Half') : ('')) . '" title="' . 'Terrible' . '">1</button
					><button type="submit" name="rating" value="2" class="star ' . (($__compilerVar16 >= 2) ? ('Full') : ('')) . (($__compilerVar16 >= 1.5 AND $__compilerVar16 < 2) ? ('Half') : ('')) . '" title="' . 'Poor' . '">2</button
					><button type="submit" name="rating" value="3" class="star ' . (($__compilerVar16 >= 3) ? ('Full') : ('')) . (($__compilerVar16 >= 2.5 AND $__compilerVar16 < 3) ? ('Half') : ('')) . '" title="' . 'Average' . '">3</button
					><button type="submit" name="rating" value="4" class="star ' . (($__compilerVar16 >= 4) ? ('Full') : ('')) . (($__compilerVar16 >= 3.5 AND $__compilerVar16 < 4) ? ('Half') : ('')) . '" title="' . 'Good' . '">4</button
					><button type="submit" name="rating" value="5" class="star ' . (($__compilerVar16 >= 5) ? ('Full') : ('')) . (($__compilerVar16 >= 4.5 AND $__compilerVar16 < 5) ? ('Half') : ('')) . '" title="' . 'Excellent' . '">5</button>
				</span>
			
				<span class="RatingValue"><span class="Number" itemprop="average">' . htmlspecialchars($__compilerVar16, ENT_QUOTES, 'UTF-8') . '</span>/<span itemprop="best">5</span>,</span>
				';
if ($threadrating['whoRated'] AND $controllerName == ('XenForo_ControllerPublic_Thread') AND $thread['thread_rate_count'] > 0)
{
$__compilerVar20 .= '
					<a href="' . XenForo_Template_Helper_Core::link('threads/whoRated', $thread, array()) . '" title="' . 'Who has rated this thread?' . '" class="OverlayTrigger"><span class="Hint">' . $__compilerVar18 . '</span></a>
				';
}
else
{
$__compilerVar20 .= '
				<span class="Hint">' . $__compilerVar18 . '</span>
				';
}
$__compilerVar20 .= '
			</dd>
		</dl>
		
		<input type="hidden" name="_xfToken" value="' . htmlspecialchars($visitor['csrf_token_page'], ENT_QUOTES, 'UTF-8') . '" />
	</form>
	
';
}
else
{
$__compilerVar20 .= '
	
	<div class="rating ';
if ($xenOptions['threadrating_greyedout'])
{
$__compilerVar20 .= 'tr_greyedout';
}
$__compilerVar20 .= '">
		<dl>
			<dt class="prompt muted">' . $__compilerVar17 . '</dt>
			<dd>		
				<span class="ratings" title="' . XenForo_Template_Helper_Core::numberFormat($__compilerVar16, '2') . '">
					 <span class="star ' . (($__compilerVar16 >= 1) ? ('Full') : ('')) . (($__compilerVar16 >= 0.5 AND $__compilerVar16 < 1) ? ('Half') : ('')) . '"></span
					><span class="star ' . (($__compilerVar16 >= 2) ? ('Full') : ('')) . (($__compilerVar16 >= 1.5 AND $__compilerVar16 < 2) ? ('Half') : ('')) . '"></span
					><span class="star ' . (($__compilerVar16 >= 3) ? ('Full') : ('')) . (($__compilerVar16 >= 2.5 AND $__compilerVar16 < 3) ? ('Half') : ('')) . '"></span
					><span class="star ' . (($__compilerVar16 >= 4) ? ('Full') : ('')) . (($__compilerVar16 >= 3.5 AND $__compilerVar16 < 4) ? ('Half') : ('')) . '"></span
					><span class="star ' . (($__compilerVar16 >= 5) ? ('Full') : ('')) . (($__compilerVar16 >= 4.5 AND $__compilerVar16 < 5) ? ('Half') : ('')) . '"></span>
				</span>
				
				<span class="RatingValue"><span class="Number" itemprop="average">' . htmlspecialchars($__compilerVar16, ENT_QUOTES, 'UTF-8') . '</span>/<span itemprop="best">5</span>,</span>
				';
if ($threadrating['whoRated'] AND $controllerName == ('XenForo_ControllerPublic_Thread') AND $thread['thread_rate_count'] > 0)
{
$__compilerVar20 .= '
					<a href="' . XenForo_Template_Helper_Core::link('threads/whoRated', $thread, array()) . '" title="' . 'Who has rated this thread?' . '" class="OverlayTrigger"><span class="Hint">' . $__compilerVar18 . '</span></a>
				';
}
else
{
$__compilerVar20 .= '
				<span class="Hint">' . $__compilerVar18 . '</span>
				';
}
$__compilerVar20 .= '
			</dd>
		</dl>	
	</div>

';
}
$__compilerVar14 .= $__compilerVar20;
unset($__compilerVar15, $__compilerVar16, $__compilerVar17, $__compilerVar18, $__compilerVar19, $__compilerVar20);
$__compilerVar14 .= '
			</div>

			';
if ($resource['external_url'])
{
$__compilerVar14 .= '
				<div class="footnote">
					<a href="' . htmlspecialchars($resource['external_url'], ENT_QUOTES, 'UTF-8') . '" ' . ((!$resource['isTrusted']) ? ('rel="nofollow"') : ('')) . ' target="_blank">' . 'Find more info at ' . htmlspecialchars($resource['external_url_components']['host'], ENT_QUOTES, 'UTF-8') . '' . '...</a>
				</div>
			';
}
$__compilerVar14 .= '
		';
$__extraData['sidebar'] .= $this->callTemplateHook('resource_view_sidebar_resource_info', $__compilerVar14, array());
unset($__compilerVar14);
$__extraData['sidebar'] .= '
		</div>
	</div>

	';
$__compilerVar21 = '';
$__extraData['sidebar'] .= $this->callTemplateHook('resource_view_sidebar_below_info', $__compilerVar21, array(
'resource' => $resource
));
unset($__compilerVar21);
$__extraData['sidebar'] .= '
	
	';
if (!$resource['isFilelessNoExternal'])
{
$__extraData['sidebar'] .= '
		<div class="section" id="versionInfo">
			<div class="secondaryContent">
			';
$__compilerVar22 = '';
$__compilerVar22 .= '
				<h3>' . 'Version ' . htmlspecialchars($resource['version_string'], ENT_QUOTES, 'UTF-8') . '' . '</h3>
		
				<div class="pairsJustified">
					<dl class="versionReleaseDate"><dt>' . 'Released' . ':</dt>
						<dd>' . XenForo_Template_Helper_Core::callHelper('datetimehtml', array($resource['release_date'],array(
'time' => '$resource.release_date'
))) . '</dd></dl>
		
					';
if (!$resource['is_fileless'])
{
$__compilerVar22 .= '
						<dl class="versionDownloadCount"><dt title="' . 'By unique downloaders' . '">' . 'Downloads' . ':</dt>
							<dd>' . XenForo_Template_Helper_Core::numberFormat($resource['version_download_count'], '0') . '</dd></dl>
					';
}
$__compilerVar22 .= '
		
					';
$__compilerVar23 = '';
$__compilerVar23 .= (($resource['canRateIfDownloaded']) ? (XenForo_Template_Helper_Core::link('resources/rate', $resource, array())) : (''));
$__compilerVar24 = '';
$__compilerVar24 .= htmlspecialchars($resource['version_rating'], ENT_QUOTES, 'UTF-8');
$__compilerVar25 = '';
$__compilerVar25 .= 'Version Rating' . ':';
$__compilerVar26 = '';
$__compilerVar26 .= (($resource['version_rating_count'] == 1) ? ('1 vote') : ('' . htmlspecialchars($resource['version_rating_count'], ENT_QUOTES, 'UTF-8') . ' votes'));
$__compilerVar27 = '';
$this->addRequiredExternal('css', 'rating');
$__compilerVar27 .= '

';
if ($__compilerVar23)
{
$__compilerVar27 .= '
	';
$this->addRequiredExternal('js', 'js/xenforo/rating.js');
$__compilerVar27 .= '

	<form action="' . htmlspecialchars($__compilerVar23, ENT_QUOTES, 'UTF-8') . '" method="post" class="rating RatingWidget" ' . (($microdata) ? ('itemscope="itemscope" itemtype="http://data-vocabulary.org/Rating"') : ('')) . '>
		<dl>
			<dt class="prompt muted">' . $__compilerVar25 . '</dt>
			<dd>
				<span class="ratings">
					 <button type="submit" name="rating" value="1" class="star ' . (($__compilerVar24 >= 1) ? ('Full') : ('')) . (($__compilerVar24 >= 0.5 AND $__compilerVar24 < 1) ? ('Half') : ('')) . '" title="' . 'Terrible' . '">1</button
					><button type="submit" name="rating" value="2" class="star ' . (($__compilerVar24 >= 2) ? ('Full') : ('')) . (($__compilerVar24 >= 1.5 AND $__compilerVar24 < 2) ? ('Half') : ('')) . '" title="' . 'Poor' . '">2</button
					><button type="submit" name="rating" value="3" class="star ' . (($__compilerVar24 >= 3) ? ('Full') : ('')) . (($__compilerVar24 >= 2.5 AND $__compilerVar24 < 3) ? ('Half') : ('')) . '" title="' . 'Average' . '">3</button
					><button type="submit" name="rating" value="4" class="star ' . (($__compilerVar24 >= 4) ? ('Full') : ('')) . (($__compilerVar24 >= 3.5 AND $__compilerVar24 < 4) ? ('Half') : ('')) . '" title="' . 'Good' . '">4</button
					><button type="submit" name="rating" value="5" class="star ' . (($__compilerVar24 >= 5) ? ('Full') : ('')) . (($__compilerVar24 >= 4.5 AND $__compilerVar24 < 5) ? ('Half') : ('')) . '" title="' . 'Excellent' . '">5</button>
				</span>
			
				<span class="RatingValue"><span class="Number" itemprop="average">' . htmlspecialchars($__compilerVar24, ENT_QUOTES, 'UTF-8') . '</span>/<span itemprop="best">5</span>,</span>
				';
if ($threadrating['whoRated'] AND $controllerName == ('XenForo_ControllerPublic_Thread') AND $thread['thread_rate_count'] > 0)
{
$__compilerVar27 .= '
					<a href="' . XenForo_Template_Helper_Core::link('threads/whoRated', $thread, array()) . '" title="' . 'Who has rated this thread?' . '" class="OverlayTrigger"><span class="Hint">' . $__compilerVar26 . '</span></a>
				';
}
else
{
$__compilerVar27 .= '
				<span class="Hint">' . $__compilerVar26 . '</span>
				';
}
$__compilerVar27 .= '
			</dd>
		</dl>
		
		<input type="hidden" name="_xfToken" value="' . htmlspecialchars($visitor['csrf_token_page'], ENT_QUOTES, 'UTF-8') . '" />
	</form>
	
';
}
else
{
$__compilerVar27 .= '
	
	<div class="rating ';
if ($xenOptions['threadrating_greyedout'])
{
$__compilerVar27 .= 'tr_greyedout';
}
$__compilerVar27 .= '">
		<dl>
			<dt class="prompt muted">' . $__compilerVar25 . '</dt>
			<dd>		
				<span class="ratings" title="' . XenForo_Template_Helper_Core::numberFormat($__compilerVar24, '2') . '">
					 <span class="star ' . (($__compilerVar24 >= 1) ? ('Full') : ('')) . (($__compilerVar24 >= 0.5 AND $__compilerVar24 < 1) ? ('Half') : ('')) . '"></span
					><span class="star ' . (($__compilerVar24 >= 2) ? ('Full') : ('')) . (($__compilerVar24 >= 1.5 AND $__compilerVar24 < 2) ? ('Half') : ('')) . '"></span
					><span class="star ' . (($__compilerVar24 >= 3) ? ('Full') : ('')) . (($__compilerVar24 >= 2.5 AND $__compilerVar24 < 3) ? ('Half') : ('')) . '"></span
					><span class="star ' . (($__compilerVar24 >= 4) ? ('Full') : ('')) . (($__compilerVar24 >= 3.5 AND $__compilerVar24 < 4) ? ('Half') : ('')) . '"></span
					><span class="star ' . (($__compilerVar24 >= 5) ? ('Full') : ('')) . (($__compilerVar24 >= 4.5 AND $__compilerVar24 < 5) ? ('Half') : ('')) . '"></span>
				</span>
				
				<span class="RatingValue"><span class="Number" itemprop="average">' . htmlspecialchars($__compilerVar24, ENT_QUOTES, 'UTF-8') . '</span>/<span itemprop="best">5</span>,</span>
				';
if ($threadrating['whoRated'] AND $controllerName == ('XenForo_ControllerPublic_Thread') AND $thread['thread_rate_count'] > 0)
{
$__compilerVar27 .= '
					<a href="' . XenForo_Template_Helper_Core::link('threads/whoRated', $thread, array()) . '" title="' . 'Who has rated this thread?' . '" class="OverlayTrigger"><span class="Hint">' . $__compilerVar26 . '</span></a>
				';
}
else
{
$__compilerVar27 .= '
				<span class="Hint">' . $__compilerVar26 . '</span>
				';
}
$__compilerVar27 .= '
			</dd>
		</dl>	
	</div>

';
}
$__compilerVar22 .= $__compilerVar27;
unset($__compilerVar23, $__compilerVar24, $__compilerVar25, $__compilerVar26, $__compilerVar27);
$__compilerVar22 .= '
		
					';
if ($resource['canRateIfDownloaded'] AND !$resource['canRate'])
{
$__compilerVar22 .= '
						<span class="muted">' . 'You may only rate after downloading.' . '</span>
					';
}
$__compilerVar22 .= '
				</div>
			';
$__extraData['sidebar'] .= $this->callTemplateHook('resource_view_sidebar_version_info', $__compilerVar22, array());
unset($__compilerVar22);
$__extraData['sidebar'] .= '
			</div>
		</div>
	';
}
$__extraData['sidebar'] .= '

	';
$__compilerVar28 = '';
$__extraData['sidebar'] .= $this->callTemplateHook('resource_view_sidebar_below_version', $__compilerVar28, array(
'resource' => $resource
));
unset($__compilerVar28);
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
$__compilerVar29 = '';
$__extraData['sidebar'] .= $this->callTemplateHook('resource_view_sidebar_below_support_button', $__compilerVar29, array(
'resource' => $resource
));
unset($__compilerVar29);
$__extraData['sidebar'] .= '

	';
if ($thread)
{
$__extraData['sidebar'] .= '<a class="callToAction" href="' . XenForo_Template_Helper_Core::link('threads', $thread, array()) . '"><span>
		' . 'Discuss This Resource' . '
		';
if ($thread['reply_count'])
{
$__extraData['sidebar'] .= '<small class="minorText">' . 'Replies' . ': ' . XenForo_Template_Helper_Core::numberFormat($thread['reply_count'], '0') . ', ' . 'Latest' . ': ' . XenForo_Template_Helper_Core::datetime($thread['last_post_date'], '') . '</small>';
}
$__extraData['sidebar'] .= '
	</span></a>';
}
$__extraData['sidebar'] .= '

	';
$__compilerVar30 = '';
$__extraData['sidebar'] .= $this->callTemplateHook('resource_view_sidebar_below_discussion_button', $__compilerVar30, array(
'resource' => $resource
));
unset($__compilerVar30);
$__extraData['sidebar'] .= '

	';
$__compilerVar31 = '';
$__compilerVar31 .= '
					';
$__compilerVar32 = '';
$__compilerVar32 .= '
						';
if ($resource['canEdit'])
{
$__compilerVar32 .= '
							<li><a href="' . XenForo_Template_Helper_Core::link('resources/edit', $resource, array()) . '"><span>' . 'Edit Resource' . '</span></a></li>
						';
}
$__compilerVar32 .= '
						';
if ($resource['canEditIcon'])
{
$__compilerVar32 .= '
							<li><a href="' . XenForo_Template_Helper_Core::link('resources/icon', $resource, array()) . '" class="OverlayTrigger" id="EditIconTrigger"><span>' . 'Edit Resource Icon' . '</span></a></li>
						';
}
$__compilerVar32 .= '
						';
if ($resource['canAddVersion'])
{
$__compilerVar32 .= '
							<li><a href="' . XenForo_Template_Helper_Core::link('resources/add-version', $resource, array()) . '"><span>' . 'Post Resource Update' . '</span></a></li>
						';
}
$__compilerVar32 .= '
						';
if ($resource['canDelete'])
{
$__compilerVar32 .= '
							<li><a href="' . XenForo_Template_Helper_Core::link('resources/delete', $resource, array()) . '" class="OverlayTrigger"><span>' . 'Delete Resource' . '</span></a></li>
						';
}
$__compilerVar32 .= '
						';
if ($resource['canUndelete'])
{
$__compilerVar32 .= '
							<li><a href="' . XenForo_Template_Helper_Core::link('resources/undelete', $resource, array()) . '" class="OverlayTrigger"><span>' . 'Undelete Resource' . '</span></a></li>
						';
}
$__compilerVar32 .= '
						';
if ($resource['canApprove'])
{
$__compilerVar32 .= '
							<li><a href="' . XenForo_Template_Helper_Core::link('resources/approve', $resource, array(
't' => $visitor['csrf_token_page']
)) . '" class="OverlayTrigger"><span>' . 'Approve Resource' . '</span></a></li>
						';
}
$__compilerVar32 .= '
						';
if ($resource['canUnapprove'])
{
$__compilerVar32 .= '
							<li><a href="' . XenForo_Template_Helper_Core::link('resources/unapprove', $resource, array(
't' => $visitor['csrf_token_page']
)) . '" class="OverlayTrigger"><span>' . 'Unapprove Resource' . '</span></a></li>
						';
}
$__compilerVar32 .= '
						';
if ($resource['canFeatureUnfeature'])
{
$__compilerVar32 .= '
							<li><a href="' . XenForo_Template_Helper_Core::link('resources/toggle-featured', $resource, array(
't' => $visitor['csrf_token_page']
)) . '" class="OverlayTrigger">';
if ($resource['feature_date'])
{
$__compilerVar32 .= 'Unfeature Resource';
}
else
{
$__compilerVar32 .= 'Feature Resource';
}
$__compilerVar32 .= '</a></li>
						';
}
$__compilerVar32 .= '
						';
if ($resource['canReassign'])
{
$__compilerVar32 .= '
							<li><a href="' . XenForo_Template_Helper_Core::link('resources/reassign', $resource, array()) . '" class="OverlayTrigger"><span>' . 'Reassign Resource' . '</span></a></li>
						';
}
$__compilerVar32 .= '
					';
$__compilerVar31 .= $this->callTemplateHook('resource_controls', $__compilerVar32, array(
'resource' => $resource
));
unset($__compilerVar32);
$__compilerVar31 .= '
					';
if (trim($__compilerVar31) !== '')
{
$__extraData['sidebar'] .= '
		<div class="section">
			<div class="secondaryContent" id="authorTools">
				<h3>' . 'Resource Tools' . '</h3>
				<ul class="resourceControls">
					' . $__compilerVar31 . '
				</ul>
			</div>
		</div>
	';
}
unset($__compilerVar31);
$__extraData['sidebar'] .= '

	';
$__compilerVar33 = '';
$__extraData['sidebar'] .= $this->callTemplateHook('resource_view_sidebar_below_resource_controls', $__compilerVar33, array(
'resource' => $resource
));
unset($__compilerVar33);
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
$__compilerVar34 = '';
$__extraData['sidebar'] .= $this->callTemplateHook('resource_view_sidebar_below_other_resources', $__compilerVar34, array(
'resource' => $resource
));
unset($__compilerVar34);
$__extraData['sidebar'] .= '

	';
$__compilerVar35 = '';
$__compilerVar35 .= XenForo_Template_Helper_Core::link('canonical:resources', $resource, array());
$__compilerVar36 = '';
$__compilerVar37 = '';
$__compilerVar37 .= '
				';
$__compilerVar38 = '';
$__compilerVar38 .= '
				';
if ($xenOptions['tweet']['enabled'])
{
$__compilerVar38 .= '
					<div class="tweet shareControl">
						<a href="https://twitter.com/share" class="twitter-share-button" data-count="horizontal"
							data-lang="' . XenForo_Template_Helper_Core::callHelper('twitterLang', array(
'0' => $visitorLanguage['language_code']
)) . '"
							data-url="' . htmlspecialchars($__compilerVar35, ENT_QUOTES, 'UTF-8') . '"
							' . (($xenOptions['tweet']['via']) ? ('data-via="' . htmlspecialchars($xenOptions['tweet']['via'], ENT_QUOTES, 'UTF-8') . '"') : ('')) . '
							' . (($xenOptions['tweet']['related']) ? ('data-related="' . htmlspecialchars($xenOptions['tweet']['related'], ENT_QUOTES, 'UTF-8') . '"') : ('')) . '>' . 'Tweet' . '</a>
					</div>
				';
}
$__compilerVar38 .= '		
				';
if ($xenOptions['facebookLike'])
{
$__compilerVar38 .= '
					<div class="facebookLike shareControl">
						';
$__extraData['facebookSdk'] = '';
$__extraData['facebookSdk'] .= '1';
$__compilerVar38 .= '
						<div class="fb-like-box" data-href="https://www.facebook.com/pages/H%E1%BB%99i-nh%E1%BB%AFng-ng%C6%B0%E1%BB%9Di-kh%C3%B4ng-th%E1%BB%83-s%E1%BB%91ng-thi%E1%BA%BFu-Mobile/1437174653239569?ref=bookmarks" data-width="235" data-colorscheme="light" data-show-faces="true" data-header="false" data-stream="false" data-show-border="false"></div>
					</div>
				';
}
$__compilerVar38 .= '
				';
if ($xenOptions['plusone'])
{
$__compilerVar38 .= '
					<div class="plusone shareControl">
						<div class="g-plusone" data-size="medium" data-count="true" data-href="' . htmlspecialchars($__compilerVar35, ENT_QUOTES, 'UTF-8') . '"></div>
					</div>
				';
}
$__compilerVar38 .= '	
				';
$__compilerVar37 .= $this->callTemplateHook('sidebar_share_page_options', $__compilerVar38, array());
unset($__compilerVar38);
$__compilerVar37 .= '		
			';
if (trim($__compilerVar37) !== '')
{
$__compilerVar36 .= '	
	';
$this->addRequiredExternal('css', 'sidebar_share_page');
$__compilerVar36 .= '
	<div class="section infoBlock sharePage">
		<div class="secondaryContent">
			<h3>' . 'Share This Page' . '</h3>
			' . $__compilerVar37 . '
		</div>
	</div>
';
}
unset($__compilerVar37);
$__extraData['sidebar'] .= $__compilerVar36;
unset($__compilerVar35, $__compilerVar36);
$__extraData['sidebar'] .= '

	';
$__compilerVar39 = '';
$__extraData['sidebar'] .= $this->callTemplateHook('resource_view_sidebar_end', $__compilerVar39, array(
'resource' => $resource
));
unset($__compilerVar39);
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
