<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__extraData['title'] = '';
$__extraData['title'] .= htmlspecialchars($category['category_title'], ENT_QUOTES, 'UTF-8');
$__output .= '
';
$__extraData['pageDescription'] = array(
'class' => 'baseHtml'
);
$__extraData['pageDescription']['content'] = '';
$__extraData['pageDescription']['content'] .= $category['category_description'];
$__output .= '

';
if ($canAddResource)
{
$__output .= '
	';
$__extraData['topctrl'] = '';
$__extraData['topctrl'] .= '<a href="' . XenForo_Template_Helper_Core::link('resources/add', '', array(
'resource_category_id' => $category['resource_category_id']
)) . '" class="callToAction"><span>' . 'Thêm tài nguyên' . '</span></a>';
$__output .= '
';
}
$__output .= '

';
$__extraData['navigation'] = array();
$__extraData['navigation'] = XenForo_Template_Helper_Core::appendBreadCrumbs($__extraData['navigation'], $categoryBreadcrumbs);
$__output .= '

';
$__extraData['searchBar']['resourceUpdate'] = '';
$__compilerVar21 = '';
if ($category)
{
$__compilerVar21 .= '
	<label title="' . 'Search only ' . htmlspecialchars($category['category_title'], ENT_QUOTES, 'UTF-8') . '' . '"><input type="checkbox" name="type[resource_update][categories][]" value="' . htmlspecialchars($category['resource_category_id'], ENT_QUOTES, 'UTF-8') . '" checked="checked" /> ' . 'Search this category only' . '</label>
';
}
else
{
$__compilerVar21 .= '
	<label><input type="checkbox" name="type[resource_update][null]" value="" checked="checked" id="search_bar_resources" /> ' . 'Search resources only' . '</label>
';
}
$__compilerVar21 .= '
<ul>
	<li><label><input type="checkbox" name="type[resource_update][is_resource]" value="1" /> ' . 'Search only resource descriptions' . '</label>
</ul>';
$__extraData['searchBar']['resourceUpdate'] .= $__compilerVar21;
unset($__compilerVar21);
$__output .= '
';
$__extraData['head']['canonical'] = '';
$__extraData['head']['canonical'] .= '
	<link rel="canonical" href="' . XenForo_Template_Helper_Core::link('canonical:resources/categories', $category, array(
'page' => (($page > 1) ? ($page) : (''))
)) . '" />';
$__output .= '

';
$this->addRequiredExternal('css', 'resource_list');
$__output .= '

<div class="resourceListBlock">

<div class="resourceListSidebar">
	<div class="secondaryContent categoryList">
		<h3>' . 'Categories' . '</h3>
		' . $categorySidebarHtml . '
	</div>

	';
if ($topResources)
{
$__output .= '
		<div class="secondaryContent miniResourceList">
			<h3><a href="' . XenForo_Template_Helper_Core::link('resources/categories', $category, array(
'order' => 'rating_weighted'
)) . '" class="concealed">' . 'Top Resources' . '</a></h3>
			';
$__compilerVar22 = '';
$this->addRequiredExternal('css', 'resource_list_mini');
$__compilerVar22 .= '
<ol>
';
foreach ($topResources AS $resource)
{
$__compilerVar22 .= '
	<li class="' . htmlspecialchars($resource['resource_state'], ENT_QUOTES, 'UTF-8') . '">
		<a href="' . XenForo_Template_Helper_Core::link('resources', $resource, array()) . '" class="resourceTitle">' . XenForo_Template_Helper_Core::callHelper('resourcePrefix', array(
'0' => $resource
)) . htmlspecialchars($resource['title'], ENT_QUOTES, 'UTF-8') . '</a>
		' . XenForo_Template_Helper_Core::callHelper('usernamehtml', array($resource,'',(true),array())) . '
		<div class="tagLine">' . htmlspecialchars($resource['tag_line'], ENT_QUOTES, 'UTF-8') . '</div>
	</li>
';
}
$__compilerVar22 .= '
</ol>';
$__output .= $__compilerVar22;
unset($__compilerVar22);
$__output .= '
		</div>
	';
}
$__output .= '
</div>

<div class="resourceListMain">
	';
if ($featuredResources)
{
$__output .= '
		<div class="section">
			<h2 class="textHeading">
				<a class="viewAllFeatured" href="' . XenForo_Template_Helper_Core::link('resources/categories/featured', $category, array()) . '">' . 'View All' . '</a>
				' . 'Featured Resources' . '
			</h2>
			';
$__compilerVar23 = '';
$this->addRequiredExternal('css', 'resource_list');
$__compilerVar23 .= '

<ol class="featuredResourceList">
';
foreach ($featuredResources AS $resource)
{
$__compilerVar23 .= '
	<li class="featuredResource">
		<div class="resourceImage">
			';
if ($xenOptions['resourceAllowIcons'])
{
$__compilerVar23 .= '
				<a href="' . XenForo_Template_Helper_Core::link('resources', $resource, array()) . '" class="resourceIcon"><img src="' . XenForo_Template_Helper_Core::callHelper('resourceiconurl', array(
'0' => $resource
)) . '" alt="" /></a>
			';
}
else
{
$__compilerVar23 .= '
				' . XenForo_Template_Helper_Core::callHelper('avatarhtml', array($resource,(true),array(
'user' => '$resource',
'size' => 'm',
'img' => 'true'
),'')) . '
			';
}
$__compilerVar23 .= '
		</div>
		<div class="resourceInfo">
			<h3 class="title"><a href="' . XenForo_Template_Helper_Core::link('resources', $resource, array()) . '">' . XenForo_Template_Helper_Core::callHelper('resourcePrefix', array(
'0' => $resource
)) . htmlspecialchars($resource['title'], ENT_QUOTES, 'UTF-8') . '</a></h3>
			<div class="tagLine muted">' . htmlspecialchars($resource['tag_line'], ENT_QUOTES, 'UTF-8') . '</div>
			<div class="details muted">' . XenForo_Template_Helper_Core::callHelper('usernamehtml', array($resource,'',false,array())) . ',
				<a href="' . XenForo_Template_Helper_Core::link('resources', $resource, array()) . '" class="faint">' . XenForo_Template_Helper_Core::callHelper('datetimehtml', array($resource['resource_date'],array(
'time' => htmlspecialchars($resource['resource_date'], ENT_QUOTES, 'UTF-8')
))) . '</a>
			</div>
		</div>
	</li>
';
}
$__compilerVar23 .= '
</ol>';
$__output .= $__compilerVar23;
unset($__compilerVar23);
$__output .= '
		</div>
	';
}
$__output .= '

	<div class="section">

	';
$__compilerVar24 = '';
$__compilerVar24 .= '
				';
if ($canWatchCategory)
{
$__compilerVar24 .= '
					<a href="' . XenForo_Template_Helper_Core::link('resources/categories/watch', $category, array()) . '" class="OverlayTrigger" data-cacheOverlay="false">' . (($category['category_is_watched']) ? ('Unwatch Category') : ('Watch Category')) . '</a>
				';
}
$__compilerVar24 .= '
			';
if (trim($__compilerVar24) !== '')
{
$__output .= '
		<div class="pageNavLinkGroup">
			<div class="linkGroup SelectionCountContainer">
			' . $__compilerVar24 . '
			</div>
		</div>
	';
}
unset($__compilerVar24);
$__output .= '
	
	';
$__compilerVar25 = 'resources/categories';
$__compilerVar26 = $category;
$__compilerVar27 = '';
$__compilerVar28 = '';
$__compilerVar28 .= '
		';
if ($prefixFilter)
{
$__compilerVar28 .= '
			<dt>' . 'Tiền tố' . ':</dt>
			<dd><a href="' . XenForo_Template_Helper_Core::link(htmlspecialchars($__compilerVar25, ENT_QUOTES, 'UTF-8'), $__compilerVar26, array(
'_params' => $pageNavParams,
'prefix_id' => ''
)) . '" class="removeFilter Tooltip" title="' . 'Remove filter' . '">' . (($prefixFilter < 0) ? ('Không có') : (XenForo_Template_Helper_Core::callHelper('resourcePrefix', array(
'0' => $prefixFilter,
'1' => 'escaped',
'2' => ''
)))) . ' <span class="gadget">x</span></a></dd>
		';
}
$__compilerVar28 .= '
		';
if ($typeFilter)
{
$__compilerVar28 .= '
			<dt>' . 'Price' . ':</dt>
			<dd><a href="' . XenForo_Template_Helper_Core::link(htmlspecialchars($__compilerVar25, ENT_QUOTES, 'UTF-8'), $__compilerVar26, array(
'_params' => $pageNavParams,
'type' => ''
)) . '" class="removeFilter Tooltip" title="' . 'Remove filter' . '">' . (($typeFilter == ('free')) ? ('Free') : ('Paid')) . ' <span class="gadget">x</span></a></dd>
		';
}
$__compilerVar28 .= '
		';
if (trim($__compilerVar28) !== '')
{
$__compilerVar27 .= '
	';
$this->addRequiredExternal('css', 'discussion_list');
$__compilerVar27 .= '
	<div class="discussionListFilters secondaryContent">
		<h3 class="filtersHeading">' . 'Filters' . ':</h3>
		<dl class="pairsInline filterPairs">
		' . $__compilerVar28 . '
		</dl>
		<dl class="pairsInline removeAll">
			<dt>' . 'Remove all Filters' . ':</dt>
			<dd><a href="' . XenForo_Template_Helper_Core::link(htmlspecialchars($__compilerVar25, ENT_QUOTES, 'UTF-8'), $__compilerVar26, array(
'order' => $pageNavParams['order']
)) . '" class="removeAllFilters Tooltip" data-tipclass="flipped" data-offsetX="10" title="' . 'Remove all Filters' . '">x</a></dd>
		</dl>
	</div>
';
}
unset($__compilerVar28);
$__output .= $__compilerVar27;
unset($__compilerVar25, $__compilerVar26, $__compilerVar27);
$__output .= '

	<div class="resourceHeaders">
		';
if ($showFilterTabs)
{
$__output .= '
			<div class="extraLinks">
				<div class="Popup filterLink JsOnly">
					<a rel="Menu">' . 'Filters' . '</a>
					<div class="Menu resourceFilterMenu" id="ResourceFilterMenu"
						data-contentsrc="' . XenForo_Template_Helper_Core::link('resources/filter-menu', '', array(
'params' => $pageNavParams,
'resource_category_id' => $category['resource_category_id']
)) . '"
						data-contentdest="#ResourceFilterMenu > .primaryContent"
						data-insertfn="replaceAll"
					>
						<div class="primaryContent">' . 'Đang tải' . '...</div>
					</div>
				</div>
			</div>
		';
}
$__output .= '
		<ol class="tabs">
			<li class="' . (($order == ('last_update')) ? ('active') : ('')) . '"><a href="' . XenForo_Template_Helper_Core::link('resources/categories', $category, array(
'_params' => $pageNavParams,
'order' => ''
)) . '">' . 'Latest Updates' . '</a></li>
			<li class="' . (($order == ('resource_date')) ? ('active') : ('')) . '"><a href="' . XenForo_Template_Helper_Core::link('resources/categories', $category, array(
'_params' => $pageNavParams,
'order' => 'resource_date'
)) . '">' . 'Newest Resources' . '</a></li>
			<li class="' . (($order == ('rating_weighted')) ? ('active') : ('')) . '"><a href="' . XenForo_Template_Helper_Core::link('resources/categories', $category, array(
'_params' => $pageNavParams,
'order' => 'rating_weighted'
)) . '">' . 'Top Resources' . '</a></li>
			<li class="' . (($order == ('download_count')) ? ('active') : ('')) . '"><a href="' . XenForo_Template_Helper_Core::link('resources/categories', $category, array(
'_params' => $pageNavParams,
'order' => 'download_count'
)) . '">' . 'Most Downloaded' . '</a></li>
		</ol>
	</div>

	<form action="' . XenForo_Template_Helper_Core::link('resources/inline-mod/switch', false, array()) . '" method="post"
		class="InlineModForm"
		data-cookieName="resources"
		data-controls="#InlineModControls"
		data-imodOptions="#ModerationSelect option">

		<ol class="resourceList">
		';
if ($resources)
{
$__output .= '
			';
if ($childCategories)
{
$__output .= '
				';
$showCategoryTitle = '';
$showCategoryTitle .= '1';
$__output .= '
				<li class="secondaryContent resourceNote">' . 'Resources are being shown from all child categories.' . '</li>
			';
}
$__output .= '
			';
foreach ($resources AS $resource)
{
$__output .= '
				';
$__compilerVar29 = (($resource['prefix_id']) ? (XenForo_Template_Helper_Core::link('resources/categories', $category, array(
'_params' => $pageNavParams,
'prefix_id' => $resource['prefix_id']
), false)) : (''));
$__compilerVar30 = '';
$__compilerVar30 .= '<li class="resourceListItem ' . htmlspecialchars($resource['resource_state'], ENT_QUOTES, 'UTF-8') . (($resource['isIgnored'] AND !$showIgnored) ? (' ignored') : ('')) . ' ' . (($resource['feature_date']) ? ('featured') : ('')) . '" id="resource-' . htmlspecialchars($resource['resource_id'], ENT_QUOTES, 'UTF-8') . '">
	<div class="listBlock resourceImage">
		<div class="listBlockInner">
			';
if ($xenOptions['resourceAllowIcons'])
{
$__compilerVar30 .= '
				<a href="' . XenForo_Template_Helper_Core::link('resources', $resource, array()) . '" class="resourceIcon"><img src="' . XenForo_Template_Helper_Core::callHelper('resourceiconurl', array(
'0' => $resource
)) . '" alt="" /></a>
				' . XenForo_Template_Helper_Core::callHelper('avatarhtml', array($resource,(true),array(
'user' => '$resource',
'size' => 's',
'img' => 'true',
'class' => 'creatorMini'
),'')) . '
			';
}
else
{
$__compilerVar30 .= '
				' . XenForo_Template_Helper_Core::callHelper('avatarhtml', array($resource,(true),array(
'user' => '$resource',
'size' => 's',
'img' => 'true'
),'')) . '
			';
}
$__compilerVar30 .= '
		</div>
	</div>
	<div class="listBlock main">
		<div class="listBlockInner">
			';
$__compilerVar31 = '';
$__compilerVar31 .= '
					';
if ($resource['resource_state'] == ('moderated'))
{
$__compilerVar31 .= '<span class="moderated" title="' . 'Cần kiểm duyệt' . '">' . 'Cần kiểm duyệt' . '</span>';
}
$__compilerVar31 .= '
					';
if ($resource['resource_state'] == ('deleted'))
{
$__compilerVar31 .= '<span class="deleted" title="' . 'Bị xóa' . '">' . 'Bị xóa' . '</span>';
}
$__compilerVar31 .= '
				';
if (trim($__compilerVar31) !== '')
{
$__compilerVar30 .= '
				<div class="iconKey">
				' . $__compilerVar31 . '
				</div>
			';
}
unset($__compilerVar31);
$__compilerVar30 .= '
			';
if ($listItemExtraHtml)
{
$__compilerVar30 .= '<span class="extra muted">' . $listItemExtraHtml . '</span>';
}
$__compilerVar30 .= '
			';
if ($resource['cost'])
{
$__compilerVar30 .= '<span class="cost">' . htmlspecialchars($resource['cost'], ENT_QUOTES, 'UTF-8') . '</span>';
}
$__compilerVar30 .= '
			';
if ($resource['feature_date'])
{
$__compilerVar30 .= '<span class="featuredBanner">' . 'Featured' . '</span>';
}
$__compilerVar30 .= '
			<h3 class="title">
				';
if ($resource['canInlineMod'] AND !$hideInlineMod AND !$showCheckbox)
{
$__compilerVar30 .= '<input type="checkbox" name="resources[]" value="' . htmlspecialchars($resource['resource_id'], ENT_QUOTES, 'UTF-8') . '" class="InlineModCheck" id="inlineModCheck-resource-' . htmlspecialchars($resource['resource_id'], ENT_QUOTES, 'UTF-8') . '" data-target="#resource-' . htmlspecialchars($resource['resource_id'], ENT_QUOTES, 'UTF-8') . '" title="' . 'Select resource' . ': \'' . htmlspecialchars($resource['title'], ENT_QUOTES, 'UTF-8') . '\'" />';
}
$__compilerVar30 .= '
				';
if ($showCheckbox)
{
$__compilerVar30 .= '<input type="checkbox" name="resource_ids[]" value="' . htmlspecialchars($resource['resource_id'], ENT_QUOTES, 'UTF-8') . '" /> ';
}
if ($resource['prefix_id'] AND $__compilerVar29)
{
$__compilerVar30 .= '<a href="' . $__compilerVar29 . '" class="prefixLink" title="' . 'Show only resources prefixed by \'' . XenForo_Template_Helper_Core::callHelper('resourcePrefix', array(
'0' => $resource,
'1' => 'escaped',
'2' => ''
)) . '\'.' . '">' . XenForo_Template_Helper_Core::callHelper('resourcePrefix', array(
'0' => $resource
)) . '</a>';
}
else
{
$__compilerVar30 .= XenForo_Template_Helper_Core::callHelper('resourcePrefix', array(
'0' => $resource
));
}
$__compilerVar30 .= '<a
				href="' . XenForo_Template_Helper_Core::link('resources', $resource, array()) . '">' . htmlspecialchars($resource['title'], ENT_QUOTES, 'UTF-8') . '</a>
				';
if (!$resource['isFilelessNoExternal'])
{
$__compilerVar30 .= '<span class="version">' . htmlspecialchars($resource['version_string'], ENT_QUOTES, 'UTF-8') . '</span>';
}
$__compilerVar30 .= '
			</h3>
			<div class="resourceDetails muted">' . XenForo_Template_Helper_Core::callHelper('usernamehtml', array($resource,'',false,array())) . ',
				<a href="' . XenForo_Template_Helper_Core::link('resources', $resource, array()) . '" class="faint">' . XenForo_Template_Helper_Core::callHelper('datetimehtml', array($resource['resource_date'],array(
'time' => htmlspecialchars($resource['resource_date'], ENT_QUOTES, 'UTF-8')
))) . '</a>';
if ($showCategoryTitle)
{
$__compilerVar30 .= ', <a href="' . XenForo_Template_Helper_Core::link('resources/categories', $resource, array()) . '">' . htmlspecialchars($resource['category_title'], ENT_QUOTES, 'UTF-8') . '</a>';
}
$__compilerVar30 .= '
			</div>
			<div class="tagLine">
				';
if ($resource['resource_state'] == ('deleted'))
{
$__compilerVar30 .= '
					<span class="deletionNote">' . 'This resource has been deleted.' . '
						';
if ($resource['delete_user_id'])
{
$__compilerVar30 .= '
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
$__compilerVar30 .= ', ' . 'Lý do' . ': ' . htmlspecialchars($resource['delete_reason'], ENT_QUOTES, 'UTF-8');
}
$__compilerVar30 .= '.
						';
}
$__compilerVar30 .= '
					</span>
				';
}
else
{
$__compilerVar30 .= '
					' . htmlspecialchars($resource['tag_line'], ENT_QUOTES, 'UTF-8') . '
				';
}
$__compilerVar30 .= '
			</div>
		</div>
	</div>
	<div class="listBlock resourceStats">
		<div class="listBlockInner">
			';
$__compilerVar32 = '';
$__compilerVar32 .= htmlspecialchars($resource['rating_avg'], ENT_QUOTES, 'UTF-8');
$__compilerVar33 = '';
$__compilerVar33 .= (($resource['rating_count'] == 1) ? ('1 phiếu') : ('' . htmlspecialchars($resource['rating_count'], ENT_QUOTES, 'UTF-8') . ' phiếu'));
$__compilerVar34 = '';
$this->addRequiredExternal('css', 'rating');
$__compilerVar34 .= '

';
if ($action)
{
$__compilerVar34 .= '
	';
$this->addRequiredExternal('js', 'js/xenforo/rating.js');
$__compilerVar34 .= '

	<form action="' . htmlspecialchars($action, ENT_QUOTES, 'UTF-8') . '" method="post" class="rating RatingWidget" ' . (($microdata) ? ('itemscope="itemscope" itemtype="http://data-vocabulary.org/Rating"') : ('')) . '>
		<dl>
			<dt class="prompt muted">' . $prompt . '</dt>
			<dd>
				<span class="ratings">
					 <button type="submit" name="rating" value="1" class="star ' . (($__compilerVar32 >= 1) ? ('Full') : ('')) . (($__compilerVar32 >= 0.5 AND $__compilerVar32 < 1) ? ('Half') : ('')) . '" title="' . 'Terrible' . '">1</button
					><button type="submit" name="rating" value="2" class="star ' . (($__compilerVar32 >= 2) ? ('Full') : ('')) . (($__compilerVar32 >= 1.5 AND $__compilerVar32 < 2) ? ('Half') : ('')) . '" title="' . 'Poor' . '">2</button
					><button type="submit" name="rating" value="3" class="star ' . (($__compilerVar32 >= 3) ? ('Full') : ('')) . (($__compilerVar32 >= 2.5 AND $__compilerVar32 < 3) ? ('Half') : ('')) . '" title="' . 'Average' . '">3</button
					><button type="submit" name="rating" value="4" class="star ' . (($__compilerVar32 >= 4) ? ('Full') : ('')) . (($__compilerVar32 >= 3.5 AND $__compilerVar32 < 4) ? ('Half') : ('')) . '" title="' . 'Good' . '">4</button
					><button type="submit" name="rating" value="5" class="star ' . (($__compilerVar32 >= 5) ? ('Full') : ('')) . (($__compilerVar32 >= 4.5 AND $__compilerVar32 < 5) ? ('Half') : ('')) . '" title="' . 'Excellent' . '">5</button>
				</span>
			
				<span class="RatingValue"><span class="Number" itemprop="average">' . htmlspecialchars($__compilerVar32, ENT_QUOTES, 'UTF-8') . '</span>/<span itemprop="best">5</span>,</span>
				';
if ($threadrating['whoRated'] AND $controllerName == ('XenForo_ControllerPublic_Thread') AND $thread['thread_rate_count'] > 0)
{
$__compilerVar34 .= '
					<a href="' . XenForo_Template_Helper_Core::link('threads/whoRated', $thread, array()) . '" title="' . 'Who has rated this thread?' . '" class="OverlayTrigger"><span class="Hint">' . $__compilerVar33 . '</span></a>
				';
}
else
{
$__compilerVar34 .= '
				<span class="Hint">' . $__compilerVar33 . '</span>
				';
}
$__compilerVar34 .= '
			</dd>
		</dl>
		
		<input type="hidden" name="_xfToken" value="' . htmlspecialchars($visitor['csrf_token_page'], ENT_QUOTES, 'UTF-8') . '" />
	</form>
	
';
}
else
{
$__compilerVar34 .= '
	
	<div class="rating ';
if ($xenOptions['threadrating_greyedout'])
{
$__compilerVar34 .= 'tr_greyedout';
}
$__compilerVar34 .= '">
		<dl>
			<dt class="prompt muted">' . $prompt . '</dt>
			<dd>		
				<span class="ratings" title="' . XenForo_Template_Helper_Core::numberFormat($__compilerVar32, '2') . '">
					 <span class="star ' . (($__compilerVar32 >= 1) ? ('Full') : ('')) . (($__compilerVar32 >= 0.5 AND $__compilerVar32 < 1) ? ('Half') : ('')) . '"></span
					><span class="star ' . (($__compilerVar32 >= 2) ? ('Full') : ('')) . (($__compilerVar32 >= 1.5 AND $__compilerVar32 < 2) ? ('Half') : ('')) . '"></span
					><span class="star ' . (($__compilerVar32 >= 3) ? ('Full') : ('')) . (($__compilerVar32 >= 2.5 AND $__compilerVar32 < 3) ? ('Half') : ('')) . '"></span
					><span class="star ' . (($__compilerVar32 >= 4) ? ('Full') : ('')) . (($__compilerVar32 >= 3.5 AND $__compilerVar32 < 4) ? ('Half') : ('')) . '"></span
					><span class="star ' . (($__compilerVar32 >= 5) ? ('Full') : ('')) . (($__compilerVar32 >= 4.5 AND $__compilerVar32 < 5) ? ('Half') : ('')) . '"></span>
				</span>
				
				<span class="RatingValue"><span class="Number" itemprop="average">' . htmlspecialchars($__compilerVar32, ENT_QUOTES, 'UTF-8') . '</span>/<span itemprop="best">5</span>,</span>
				';
if ($threadrating['whoRated'] AND $controllerName == ('XenForo_ControllerPublic_Thread') AND $thread['thread_rate_count'] > 0)
{
$__compilerVar34 .= '
					<a href="' . XenForo_Template_Helper_Core::link('threads/whoRated', $thread, array()) . '" title="' . 'Who has rated this thread?' . '" class="OverlayTrigger"><span class="Hint">' . $__compilerVar33 . '</span></a>
				';
}
else
{
$__compilerVar34 .= '
				<span class="Hint">' . $__compilerVar33 . '</span>
				';
}
$__compilerVar34 .= '
			</dd>
		</dl>	
	</div>

';
}
$__compilerVar30 .= $__compilerVar34;
unset($__compilerVar32, $__compilerVar33, $__compilerVar34);
$__compilerVar30 .= '
			<div class="pairsJustified">
				';
if (!$resource['is_fileless'])
{
$__compilerVar30 .= '<dl class="resourceDownloads"><dt>' . 'Downloads' . ':</dt> <dd>' . XenForo_Template_Helper_Core::numberFormat($resource['download_count'], '0') . '</dd></dl>';
}
$__compilerVar30 .= '
				<dl class="resourceUpdated"><dt>' . 'Updated' . ':</dt> <dd><a href="' . XenForo_Template_Helper_Core::link('resources/updates', $resource, array()) . '" class="concealed">' . XenForo_Template_Helper_Core::callHelper('datetimehtml', array($resource['last_update'],array(
'time' => htmlspecialchars($resource['last_update'], ENT_QUOTES, 'UTF-8')
))) . '</a></dd></dl>
			</div>
		</div>
	</div>
</li>

';
$this->addRequiredExternal('css', 'resource_list');
$__output .= $__compilerVar30;
unset($__compilerVar29, $__compilerVar30);
$__output .= '
			';
}
$__output .= '
		';
}
else
{
$__output .= '
			<li class="primaryContent">' . 'There are currently no resources to display.' . '</li>
		';
}
$__output .= '
		</ol>
		
		<div class="pageNavLinkGroup">
			';
if ($inlineModOptions)
{
$__output .= '<div class="linkGroup InlineMod SelectionCountContainer"></div>';
}
$__output .= '
		<div class="linkGroup"' . ((!$ignoredNames) ? (' style="display: none"') : ('')) . '><a href="javascript:" class="muted jsOnly DisplayIgnoredContent Tooltip" title="' . 'Show hidden content by ' . XenForo_Template_Helper_Core::callHelper('implode', array(
'0' => $ignoredNames,
'1' => ', '
)) . '' . '">' . 'Show Ignored Content' . '</a></div>
		' . XenForo_Template_Helper_Core::callHelper('pagenavhtml', array('public', htmlspecialchars($perPage, ENT_QUOTES, 'UTF-8'), htmlspecialchars($totalResources, ENT_QUOTES, 'UTF-8'), htmlspecialchars($page, ENT_QUOTES, 'UTF-8'), 'resources/categories', $category, $pageNavParams, false, array())) . '
		</div>
	
		';
if ($inlineModOptions)
{
$__output .= '
			';
$__compilerVar35 = '';
$__compilerVar36 = '';
$__compilerVar36 .= 'Resource moderation';
$__compilerVar37 = '';
$__compilerVar37 .= '
		';
if ($inlineModOptions['delete'])
{
$__compilerVar37 .= '<option value="delete">' . 'Delete resources' . '...</option>';
}
$__compilerVar37 .= '
		';
if ($inlineModOptions['undelete'])
{
$__compilerVar37 .= '<option value="undelete">' . 'Undelete resources' . '</option>';
}
$__compilerVar37 .= '
		';
if ($inlineModOptions['approve'])
{
$__compilerVar37 .= '<option value="approve">' . 'Approve resources' . '</option>';
}
$__compilerVar37 .= '
		';
if ($inlineModOptions['unapprove'])
{
$__compilerVar37 .= '<option value="unapprove">' . 'Unapprove resources' . '</option>';
}
$__compilerVar37 .= '
		';
if ($inlineModOptions['feature'])
{
$__compilerVar37 .= '<option value="feature">' . 'Feature Resources' . '</option>';
}
$__compilerVar37 .= '
		';
if ($inlineModOptions['unfeature'])
{
$__compilerVar37 .= '<option value="unfeature">' . 'Unfeature Resources' . '</option>';
}
$__compilerVar37 .= '
		';
if ($inlineModOptions['reassign'])
{
$__compilerVar37 .= '<option value="reassign">' . 'Reassign resources' . '...</option>';
}
$__compilerVar37 .= '
		';
if ($inlineModOptions['move'])
{
$__compilerVar37 .= '<option value="move">' . 'Move Resources' . '...</option>';
}
$__compilerVar37 .= '
		<option value="deselect">' . 'Deselect resources' . '</option>
	';
$__compilerVar38 = '';
$__compilerVar38 .= 'Select / deselect all resources on this page';
$__compilerVar39 = '';
$__compilerVar39 .= 'Selected Resources';
$__compilerVar40 = '';
$this->addRequiredExternal('css', 'inline_mod');
$__compilerVar40 .= '
';
$this->addRequiredExternal('js', 'js/xenforo/inline_mod.js');
$__compilerVar40 .= '

<span id="InlineModControls">
	<span class="selectionControl secondaryContent">
		<label for="ModerationCheck">
			' . 'Chọn tất cả' . ' <input type="checkbox" id="ModerationCheck" title="' . htmlspecialchars($__compilerVar38, ENT_QUOTES, 'UTF-8') . '" />
		</label>

		<input type="button" class="button ClickNext" value="&darr;" title="' . 'Chuyển xuống' . '" />
		<input type="button" class="button ClickPrev" value="&uarr;" title="' . 'Chuyển lên trên' . '" />
		<a class="SelectionCount">' . htmlspecialchars($__compilerVar39, ENT_QUOTES, 'UTF-8') . ': <em class="InlineModCheckedTotal">0</em></a>
	</span>

	<span class="actionControl sectionFooter">
		<span class="commonActions">
			';
if ($inlineModOptions['delete'])
{
$__compilerVar40 .= '<input type="submit" class="button" value="' . 'Xóa' . '..." name="delete" />';
}
$__compilerVar40 .= '
			';
if ($inlineModOptions['approve'])
{
$__compilerVar40 .= '<input type="submit" class="button" value="' . 'Duyệt bài' . '" name="approve" />';
}
$__compilerVar40 .= '
		</span>

		<span class="otherActions">
			<select name="a" id="ModerationSelect" class="textCtrl">
				<option value="">' . 'Hành động khác' . '...</option>
				<optgroup label="' . 'Hành động Quản lý' . '">
					' . $__compilerVar37 . '
				</optgroup>
				<option value="closeOverlay">' . 'Đóng lớp phủ này' . '</option>
			</select>

			<input type="submit" class="button primary" value="' . 'Tới' . '" />
			<input type="reset" class="button OverlayCloser overylayOnly" value="X" title="' . 'Cancel and close these controls' . '" />
		</span>
	</span>
</span>';
$__compilerVar35 .= $__compilerVar40;
unset($__compilerVar36, $__compilerVar37, $__compilerVar38, $__compilerVar39, $__compilerVar40);
$__output .= $__compilerVar35;
unset($__compilerVar35);
$__output .= '
		';
}
$__output .= '
	</form>
	</div>
</div>

</div>';
