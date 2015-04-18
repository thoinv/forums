<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__extraData['title'] = '';
$__extraData['title'] .= 'Tài nguyên';
$__output .= '

';
$__extraData['searchBar']['resourceUpdate'] = '';
$__compilerVar1 = '';
if ($category)
{
$__compilerVar1 .= '
	<label title="' . 'Search only ' . htmlspecialchars($category['category_title'], ENT_QUOTES, 'UTF-8') . '' . '"><input type="checkbox" name="type[resource_update][categories][]" value="' . htmlspecialchars($category['resource_category_id'], ENT_QUOTES, 'UTF-8') . '" checked="checked" /> ' . 'Search this category only' . '</label>
';
}
else
{
$__compilerVar1 .= '
	<label><input type="checkbox" name="type[resource_update][null]" value="" checked="checked" id="search_bar_resources" /> ' . 'Search resources only' . '</label>
';
}
$__compilerVar1 .= '
<ul>
	<li><label><input type="checkbox" name="type[resource_update][is_resource]" value="1" /> ' . 'Search only resource descriptions' . '</label>
</ul>';
$__extraData['searchBar']['resourceUpdate'] .= $__compilerVar1;
unset($__compilerVar1);
$__output .= '
';
$__extraData['head']['canonical'] = '';
$__extraData['head']['canonical'] .= '
	<link rel="canonical" href="' . XenForo_Template_Helper_Core::link('canonical:resources', '', array(
'page' => (($page > 1) ? ($page) : (''))
)) . '" />';
$__output .= '

';
$this->addRequiredExternal('css', 'resource_list');
$__output .= '

';
if ($canAddResource)
{
$__output .= '
	';
$__extraData['topctrl'] = '';
$__extraData['topctrl'] .= '<a href="' . XenForo_Template_Helper_Core::link('resources/add', '', array(
'resource_category_id' => $category['resource_category_id']
)) . '" class="callToAction OverlayTrigger"><span>' . 'Add Resource' . '</span></a>';
$__output .= '
';
}
$__output .= '

<div class="resourceListBlock">

<div class="resourceListSidebar">
	<div class="secondaryContent categoryList">
		<h3>' . 'Categories' . '</h3>
		';
if ($categories)
{
$__output .= '
			<ol>
			';
foreach ($categories AS $_category)
{
$__output .= '
				<li class="' . (($_category['resource_category_id'] == $selectedCategoryId) ? ('selected') : ('')) . '">
					<a href="' . XenForo_Template_Helper_Core::link('resources/categories', $_category, array()) . '" ' . (($_category['category_description']) ? ('title="' . XenForo_Template_Helper_Core::callHelper('striphtml', array(
'0' => $_category['category_description']
)) . '" class="Tooltip" data-tipclass="resourceCategoryTooltip"') : ('')) . '>' . htmlspecialchars($_category['category_title'], ENT_QUOTES, 'UTF-8') . '</a>
					<span class="count">' . XenForo_Template_Helper_Core::numberFormat($_category['resource_count'], '0') . '</span>
				</li>
			';
}
$__output .= '
			</ol>
		';
}
else
{
$__output .= '
			<div>' . 'N/A' . '</div>
		';
}
$__output .= '
	</div>

	';
if ($topResources)
{
$__output .= '
		<div class="secondaryContent miniResourceList">
			<h3><a href="' . XenForo_Template_Helper_Core::link('resources', '', array(
'order' => 'rating_weighted'
)) . '" class="concealed">' . 'Top Resources' . '</a></h3>
			';
$__compilerVar2 = '';
$this->addRequiredExternal('css', 'resource_list_mini');
$__compilerVar2 .= '
<ol>
';
foreach ($topResources AS $resource)
{
$__compilerVar2 .= '
	<li class="' . htmlspecialchars($resource['resource_state'], ENT_QUOTES, 'UTF-8') . '">
		<a href="' . XenForo_Template_Helper_Core::link('resources', $resource, array()) . '" class="resourceTitle">' . XenForo_Template_Helper_Core::callHelper('resourcePrefix', array(
'0' => $resource
)) . htmlspecialchars($resource['title'], ENT_QUOTES, 'UTF-8') . '</a>
		' . XenForo_Template_Helper_Core::callHelper('usernamehtml', array($resource,'',(true),array())) . '
		<div class="tagLine">' . htmlspecialchars($resource['tag_line'], ENT_QUOTES, 'UTF-8') . '</div>
	</li>
';
}
$__compilerVar2 .= '
</ol>';
$__output .= $__compilerVar2;
unset($__compilerVar2);
$__output .= '
		</div>
	';
}
$__output .= '

	';
if ($activeAuthors)
{
$__output .= '
		<div class="secondaryContent avatarList">
			<h3><a href="' . XenForo_Template_Helper_Core::link('resources/authors', false, array()) . '" class="concealed">' . 'Most Active Authors' . '</a></h3>
			<ol>
			';
foreach ($activeAuthors AS $author)
{
$__output .= '
				<li>
					' . XenForo_Template_Helper_Core::callHelper('avatarhtml', array($author,(true),array(
'user' => '$author',
'size' => 's',
'img' => 'true',
'href' => XenForo_Template_Helper_Core::link('resources/authors', $author, array()),
'class' => 'NoOverlay'
),'')) . '
					' . XenForo_Template_Helper_Core::callHelper('usernamehtml', array($author,'',(true),array(
'href' => XenForo_Template_Helper_Core::link('resources/authors', $author, array()),
'class' => 'NoOverlay'
))) . '
					<div class="extraData"><a href="' . XenForo_Template_Helper_Core::link('resources/authors', $author, array()) . '">' . 'Tài nguyên' . ': ' . XenForo_Template_Helper_Core::numberFormat($author['resource_count'], '0') . '</a></div>
				</li>
			';
}
$__output .= '
			</ol>
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
				<a class="viewAllFeatured" href="' . XenForo_Template_Helper_Core::link('resources/featured', false, array()) . '">' . 'View All' . '</a>
				' . 'Featured Resources' . '
			</h2>
			';
$__compilerVar3 = '';
$this->addRequiredExternal('css', 'resource_list');
$__compilerVar3 .= '

<ol class="featuredResourceList">
';
foreach ($featuredResources AS $resource)
{
$__compilerVar3 .= '
	<li class="featuredResource">
		<div class="resourceImage">
			';
if ($xenOptions['resourceAllowIcons'])
{
$__compilerVar3 .= '
				<a href="' . XenForo_Template_Helper_Core::link('resources', $resource, array()) . '" class="resourceIcon"><img src="' . XenForo_Template_Helper_Core::callHelper('resourceiconurl', array(
'0' => $resource
)) . '" alt="" /></a>
			';
}
else
{
$__compilerVar3 .= '
				' . XenForo_Template_Helper_Core::callHelper('avatarhtml', array($resource,(true),array(
'user' => '$resource',
'size' => 'm',
'img' => 'true'
),'')) . '
			';
}
$__compilerVar3 .= '
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
$__compilerVar3 .= '
</ol>';
$__output .= $__compilerVar3;
unset($__compilerVar3);
$__output .= '
		</div>
	';
}
$__output .= '

	<div class="section">
	
	';
$__compilerVar4 = 'resources';
$__compilerVar5 = '';
$__compilerVar6 = '';
$__compilerVar7 = '';
$__compilerVar7 .= '
		';
if ($prefixFilter)
{
$__compilerVar7 .= '
			<dt>' . 'Prefix' . ':</dt>
			<dd><a href="' . XenForo_Template_Helper_Core::link(htmlspecialchars($__compilerVar4, ENT_QUOTES, 'UTF-8'), $__compilerVar5, array(
'_params' => $pageNavParams,
'prefix_id' => ''
)) . '" class="removeFilter Tooltip" title="' . 'Remove Filter' . '">' . (($prefixFilter < 0) ? ('None') : (XenForo_Template_Helper_Core::callHelper('resourcePrefix', array(
'0' => $prefixFilter,
'1' => 'escaped',
'2' => ''
)))) . ' <span class="gadget">x</span></a></dd>
		';
}
$__compilerVar7 .= '
		';
if ($typeFilter)
{
$__compilerVar7 .= '
			<dt>' . 'Price' . ':</dt>
			<dd><a href="' . XenForo_Template_Helper_Core::link(htmlspecialchars($__compilerVar4, ENT_QUOTES, 'UTF-8'), $__compilerVar5, array(
'_params' => $pageNavParams,
'type' => ''
)) . '" class="removeFilter Tooltip" title="' . 'Remove Filter' . '">' . (($typeFilter == ('free')) ? ('Free') : ('Paid')) . ' <span class="gadget">x</span></a></dd>
		';
}
$__compilerVar7 .= '
		';
if (trim($__compilerVar7) !== '')
{
$__compilerVar6 .= '
	';
$this->addRequiredExternal('css', 'discussion_list');
$__compilerVar6 .= '
	<div class="discussionListFilters secondaryContent">
		<h3 class="filtersHeading">' . 'Filters' . ':</h3>
		<dl class="pairsInline filterPairs">
		' . $__compilerVar7 . '
		</dl>
		<dl class="pairsInline removeAll">
			<dt>' . 'Remove All Filters' . ':</dt>
			<dd><a href="' . XenForo_Template_Helper_Core::link(htmlspecialchars($__compilerVar4, ENT_QUOTES, 'UTF-8'), $__compilerVar5, array(
'order' => $pageNavParams['order']
)) . '" class="removeAllFilters Tooltip" data-tipclass="flipped" data-offsetX="10" title="' . 'Remove All Filters' . '">x</a></dd>
		</dl>
	</div>
';
}
unset($__compilerVar7);
$__output .= $__compilerVar6;
unset($__compilerVar4, $__compilerVar5, $__compilerVar6);
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
'params' => $pageNavParams
)) . '"
						data-contentdest="#ResourceFilterMenu > .primaryContent"
						data-insertfn="replaceAll"
					>
						<div class="primaryContent">' . 'Loading' . '...</div>
					</div>
				</div>
			</div>
		';
}
$__output .= '
		<ol class="tabs">
			<li class="' . (($order == ('last_update')) ? ('active') : ('')) . '"><a href="' . XenForo_Template_Helper_Core::link('resources', '', array(
'_params' => $pageNavParams,
'order' => ''
)) . '">' . 'Latest Updates' . '</a></li>
			<li class="' . (($order == ('resource_date')) ? ('active') : ('')) . '"><a href="' . XenForo_Template_Helper_Core::link('resources', '', array(
'_params' => $pageNavParams,
'order' => 'resource_date'
)) . '">' . 'Newest Resources' . '</a></li>
			<li class="' . (($order == ('rating_weighted')) ? ('active') : ('')) . '"><a href="' . XenForo_Template_Helper_Core::link('resources', '', array(
'_params' => $pageNavParams,
'order' => 'rating_weighted'
)) . '">' . 'Top Resources' . '</a></li>
			<li class="' . (($order == ('download_count')) ? ('active') : ('')) . '"><a href="' . XenForo_Template_Helper_Core::link('resources', '', array(
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
foreach ($resources AS $resource)
{
$__output .= '
				';
$__compilerVar8 = (($resource['prefix_id']) ? (XenForo_Template_Helper_Core::link('resources', '', array(
'_params' => $pageNavParams,
'prefix_id' => $resource['prefix_id']
), false)) : (''));
$__compilerVar9 = '';
$__compilerVar9 .= '1';
$__compilerVar10 = '';
$__compilerVar10 .= '<li class="resourceListItem ' . htmlspecialchars($resource['resource_state'], ENT_QUOTES, 'UTF-8') . (($resource['isIgnored'] AND !$showIgnored) ? (' ignored') : ('')) . ' ' . (($resource['feature_date']) ? ('featured') : ('')) . '" id="resource-' . htmlspecialchars($resource['resource_id'], ENT_QUOTES, 'UTF-8') . '">
	<div class="listBlock resourceImage">
		<div class="listBlockInner">
			';
if ($xenOptions['resourceAllowIcons'])
{
$__compilerVar10 .= '
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
$__compilerVar10 .= '
				' . XenForo_Template_Helper_Core::callHelper('avatarhtml', array($resource,(true),array(
'user' => '$resource',
'size' => 's',
'img' => 'true'
),'')) . '
			';
}
$__compilerVar10 .= '
		</div>
	</div>
	<div class="listBlock main">
		<div class="listBlockInner">
			';
$__compilerVar11 = '';
$__compilerVar11 .= '
					';
if ($resource['resource_state'] == ('moderated'))
{
$__compilerVar11 .= '<span class="moderated" title="' . 'Moderated' . '">' . 'Moderated' . '</span>';
}
$__compilerVar11 .= '
					';
if ($resource['resource_state'] == ('deleted'))
{
$__compilerVar11 .= '<span class="deleted" title="' . 'Deleted' . '">' . 'Deleted' . '</span>';
}
$__compilerVar11 .= '
				';
if (trim($__compilerVar11) !== '')
{
$__compilerVar10 .= '
				<div class="iconKey">
				' . $__compilerVar11 . '
				</div>
			';
}
unset($__compilerVar11);
$__compilerVar10 .= '
			';
if ($listItemExtraHtml)
{
$__compilerVar10 .= '<span class="extra muted">' . $listItemExtraHtml . '</span>';
}
$__compilerVar10 .= '
			';
if ($resource['cost'])
{
$__compilerVar10 .= '<span class="cost">' . htmlspecialchars($resource['cost'], ENT_QUOTES, 'UTF-8') . '</span>';
}
$__compilerVar10 .= '
			';
if ($resource['feature_date'])
{
$__compilerVar10 .= '<span class="featuredBanner">' . 'Featured' . '</span>';
}
$__compilerVar10 .= '
			<h3 class="title">
				';
if ($resource['canInlineMod'] AND !$hideInlineMod AND !$showCheckbox)
{
$__compilerVar10 .= '<input type="checkbox" name="resources[]" value="' . htmlspecialchars($resource['resource_id'], ENT_QUOTES, 'UTF-8') . '" class="InlineModCheck" id="inlineModCheck-resource-' . htmlspecialchars($resource['resource_id'], ENT_QUOTES, 'UTF-8') . '" data-target="#resource-' . htmlspecialchars($resource['resource_id'], ENT_QUOTES, 'UTF-8') . '" title="' . 'Select resource' . ': \'' . htmlspecialchars($resource['title'], ENT_QUOTES, 'UTF-8') . '\'" />';
}
$__compilerVar10 .= '
				';
if ($showCheckbox)
{
$__compilerVar10 .= '<input type="checkbox" name="resource_ids[]" value="' . htmlspecialchars($resource['resource_id'], ENT_QUOTES, 'UTF-8') . '" /> ';
}
if ($resource['prefix_id'] AND $__compilerVar8)
{
$__compilerVar10 .= '<a href="' . $__compilerVar8 . '" class="prefixLink" title="' . 'Show only resources prefixed by \'' . XenForo_Template_Helper_Core::callHelper('resourcePrefix', array(
'0' => $resource,
'1' => 'escaped',
'2' => ''
)) . '\'.' . '">' . XenForo_Template_Helper_Core::callHelper('resourcePrefix', array(
'0' => $resource
)) . '</a>';
}
else
{
$__compilerVar10 .= XenForo_Template_Helper_Core::callHelper('resourcePrefix', array(
'0' => $resource
));
}
$__compilerVar10 .= '<a
				href="' . XenForo_Template_Helper_Core::link('resources', $resource, array()) . '">' . htmlspecialchars($resource['title'], ENT_QUOTES, 'UTF-8') . '</a>
				';
if (!$resource['isFilelessNoExternal'])
{
$__compilerVar10 .= '<span class="version">' . htmlspecialchars($resource['version_string'], ENT_QUOTES, 'UTF-8') . '</span>';
}
$__compilerVar10 .= '
			</h3>
			<div class="resourceDetails muted">' . XenForo_Template_Helper_Core::callHelper('usernamehtml', array($resource,'',false,array())) . ',
				<a href="' . XenForo_Template_Helper_Core::link('resources', $resource, array()) . '" class="faint">' . XenForo_Template_Helper_Core::callHelper('datetimehtml', array($resource['resource_date'],array(
'time' => htmlspecialchars($resource['resource_date'], ENT_QUOTES, 'UTF-8')
))) . '</a>';
if ($__compilerVar9)
{
$__compilerVar10 .= ', <a href="' . XenForo_Template_Helper_Core::link('resources/categories', $resource, array()) . '">' . htmlspecialchars($resource['category_title'], ENT_QUOTES, 'UTF-8') . '</a>';
}
$__compilerVar10 .= '
			</div>
			<div class="tagLine">
				';
if ($resource['resource_state'] == ('deleted'))
{
$__compilerVar10 .= '
					<span class="deletionNote">' . 'This resource has been deleted.' . '
						';
if ($resource['delete_user_id'])
{
$__compilerVar10 .= '
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
$__compilerVar10 .= ', ' . 'Reason' . ': ' . htmlspecialchars($resource['delete_reason'], ENT_QUOTES, 'UTF-8');
}
$__compilerVar10 .= '.
						';
}
$__compilerVar10 .= '
					</span>
				';
}
else
{
$__compilerVar10 .= '
					' . htmlspecialchars($resource['tag_line'], ENT_QUOTES, 'UTF-8') . '
				';
}
$__compilerVar10 .= '
			</div>
		</div>
	</div>
	<div class="listBlock resourceStats">
		<div class="listBlockInner">
			';
$__compilerVar12 = '';
$__compilerVar12 .= htmlspecialchars($resource['rating_avg'], ENT_QUOTES, 'UTF-8');
$__compilerVar13 = '';
$__compilerVar13 .= (($resource['rating_count'] == 1) ? ('1 vote') : ('' . htmlspecialchars($resource['rating_count'], ENT_QUOTES, 'UTF-8') . ' votes'));
$__compilerVar14 = '';
$this->addRequiredExternal('css', 'rating');
$__compilerVar14 .= '

';
if ($action)
{
$__compilerVar14 .= '
	';
$this->addRequiredExternal('js', 'js/xenforo/rating.js');
$__compilerVar14 .= '

	<form action="' . htmlspecialchars($action, ENT_QUOTES, 'UTF-8') . '" method="post" class="rating RatingWidget" ' . (($microdata) ? ('itemscope="itemscope" itemtype="http://data-vocabulary.org/Rating"') : ('')) . '>
		<dl>
			<dt class="prompt muted">' . $prompt . '</dt>
			<dd>
				<span class="ratings">
					 <button type="submit" name="rating" value="1" class="star ' . (($__compilerVar12 >= 1) ? ('Full') : ('')) . (($__compilerVar12 >= 0.5 AND $__compilerVar12 < 1) ? ('Half') : ('')) . '" title="' . 'Terrible' . '">1</button
					><button type="submit" name="rating" value="2" class="star ' . (($__compilerVar12 >= 2) ? ('Full') : ('')) . (($__compilerVar12 >= 1.5 AND $__compilerVar12 < 2) ? ('Half') : ('')) . '" title="' . 'Poor' . '">2</button
					><button type="submit" name="rating" value="3" class="star ' . (($__compilerVar12 >= 3) ? ('Full') : ('')) . (($__compilerVar12 >= 2.5 AND $__compilerVar12 < 3) ? ('Half') : ('')) . '" title="' . 'Average' . '">3</button
					><button type="submit" name="rating" value="4" class="star ' . (($__compilerVar12 >= 4) ? ('Full') : ('')) . (($__compilerVar12 >= 3.5 AND $__compilerVar12 < 4) ? ('Half') : ('')) . '" title="' . 'Good' . '">4</button
					><button type="submit" name="rating" value="5" class="star ' . (($__compilerVar12 >= 5) ? ('Full') : ('')) . (($__compilerVar12 >= 4.5 AND $__compilerVar12 < 5) ? ('Half') : ('')) . '" title="' . 'Excellent' . '">5</button>
				</span>
			
				<span class="RatingValue"><span class="Number" itemprop="average">' . htmlspecialchars($__compilerVar12, ENT_QUOTES, 'UTF-8') . '</span>/<span itemprop="best">5</span>,</span>
				';
if ($threadrating['whoRated'] AND $controllerName == ('XenForo_ControllerPublic_Thread') AND $thread['thread_rate_count'] > 0)
{
$__compilerVar14 .= '
					<a href="' . XenForo_Template_Helper_Core::link('threads/whoRated', $thread, array()) . '" title="' . 'Who has rated this thread?' . '" class="OverlayTrigger"><span class="Hint">' . $__compilerVar13 . '</span></a>
				';
}
else
{
$__compilerVar14 .= '
				<span class="Hint">' . $__compilerVar13 . '</span>
				';
}
$__compilerVar14 .= '
			</dd>
		</dl>
		
		<input type="hidden" name="_xfToken" value="' . htmlspecialchars($visitor['csrf_token_page'], ENT_QUOTES, 'UTF-8') . '" />
	</form>
	
';
}
else
{
$__compilerVar14 .= '
	
	<div class="rating ';
if ($xenOptions['threadrating_greyedout'])
{
$__compilerVar14 .= 'tr_greyedout';
}
$__compilerVar14 .= '">
		<dl>
			<dt class="prompt muted">' . $prompt . '</dt>
			<dd>		
				<span class="ratings" title="' . XenForo_Template_Helper_Core::numberFormat($__compilerVar12, '2') . '">
					 <span class="star ' . (($__compilerVar12 >= 1) ? ('Full') : ('')) . (($__compilerVar12 >= 0.5 AND $__compilerVar12 < 1) ? ('Half') : ('')) . '"></span
					><span class="star ' . (($__compilerVar12 >= 2) ? ('Full') : ('')) . (($__compilerVar12 >= 1.5 AND $__compilerVar12 < 2) ? ('Half') : ('')) . '"></span
					><span class="star ' . (($__compilerVar12 >= 3) ? ('Full') : ('')) . (($__compilerVar12 >= 2.5 AND $__compilerVar12 < 3) ? ('Half') : ('')) . '"></span
					><span class="star ' . (($__compilerVar12 >= 4) ? ('Full') : ('')) . (($__compilerVar12 >= 3.5 AND $__compilerVar12 < 4) ? ('Half') : ('')) . '"></span
					><span class="star ' . (($__compilerVar12 >= 5) ? ('Full') : ('')) . (($__compilerVar12 >= 4.5 AND $__compilerVar12 < 5) ? ('Half') : ('')) . '"></span>
				</span>
				
				<span class="RatingValue"><span class="Number" itemprop="average">' . htmlspecialchars($__compilerVar12, ENT_QUOTES, 'UTF-8') . '</span>/<span itemprop="best">5</span>,</span>
				';
if ($threadrating['whoRated'] AND $controllerName == ('XenForo_ControllerPublic_Thread') AND $thread['thread_rate_count'] > 0)
{
$__compilerVar14 .= '
					<a href="' . XenForo_Template_Helper_Core::link('threads/whoRated', $thread, array()) . '" title="' . 'Who has rated this thread?' . '" class="OverlayTrigger"><span class="Hint">' . $__compilerVar13 . '</span></a>
				';
}
else
{
$__compilerVar14 .= '
				<span class="Hint">' . $__compilerVar13 . '</span>
				';
}
$__compilerVar14 .= '
			</dd>
		</dl>	
	</div>

';
}
$__compilerVar10 .= $__compilerVar14;
unset($__compilerVar12, $__compilerVar13, $__compilerVar14);
$__compilerVar10 .= '
			<div class="pairsJustified">
				';
if (!$resource['is_fileless'])
{
$__compilerVar10 .= '<dl class="resourceDownloads"><dt>' . 'Downloads' . ':</dt> <dd>' . XenForo_Template_Helper_Core::numberFormat($resource['download_count'], '0') . '</dd></dl>';
}
$__compilerVar10 .= '
				<dl class="resourceUpdated"><dt>' . 'Updated' . ':</dt> <dd><a href="' . XenForo_Template_Helper_Core::link('resources/updates', $resource, array()) . '" class="concealed">' . XenForo_Template_Helper_Core::callHelper('datetimehtml', array($resource['last_update'],array(
'time' => htmlspecialchars($resource['last_update'], ENT_QUOTES, 'UTF-8')
))) . '</a></dd></dl>
			</div>
		</div>
	</div>
</li>

';
$this->addRequiredExternal('css', 'resource_list');
$__output .= $__compilerVar10;
unset($__compilerVar8, $__compilerVar9, $__compilerVar10);
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
			' . XenForo_Template_Helper_Core::callHelper('pagenavhtml', array('public', htmlspecialchars($perPage, ENT_QUOTES, 'UTF-8'), htmlspecialchars($totalResources, ENT_QUOTES, 'UTF-8'), htmlspecialchars($page, ENT_QUOTES, 'UTF-8'), 'resources', false, $pageNavParams, false, array())) . '
		</div>
	
		';
if ($inlineModOptions)
{
$__output .= '
			';
$__compilerVar15 = '';
$__compilerVar16 = '';
$__compilerVar16 .= 'Resource moderation';
$__compilerVar17 = '';
$__compilerVar17 .= '
		';
if ($inlineModOptions['delete'])
{
$__compilerVar17 .= '<option value="delete">' . 'Delete resources' . '...</option>';
}
$__compilerVar17 .= '
		';
if ($inlineModOptions['undelete'])
{
$__compilerVar17 .= '<option value="undelete">' . 'Undelete resources' . '</option>';
}
$__compilerVar17 .= '
		';
if ($inlineModOptions['approve'])
{
$__compilerVar17 .= '<option value="approve">' . 'Approve resources' . '</option>';
}
$__compilerVar17 .= '
		';
if ($inlineModOptions['unapprove'])
{
$__compilerVar17 .= '<option value="unapprove">' . 'Unapprove resources' . '</option>';
}
$__compilerVar17 .= '
		';
if ($inlineModOptions['feature'])
{
$__compilerVar17 .= '<option value="feature">' . 'Feature Resources' . '</option>';
}
$__compilerVar17 .= '
		';
if ($inlineModOptions['unfeature'])
{
$__compilerVar17 .= '<option value="unfeature">' . 'Unfeature Resources' . '</option>';
}
$__compilerVar17 .= '
		';
if ($inlineModOptions['reassign'])
{
$__compilerVar17 .= '<option value="reassign">' . 'Reassign resources' . '...</option>';
}
$__compilerVar17 .= '
		';
if ($inlineModOptions['move'])
{
$__compilerVar17 .= '<option value="move">' . 'Move Resources' . '...</option>';
}
$__compilerVar17 .= '
		<option value="deselect">' . 'Deselect resources' . '</option>
	';
$__compilerVar18 = '';
$__compilerVar18 .= 'Select / deselect all resources on this page';
$__compilerVar19 = '';
$__compilerVar19 .= 'Selected Resources';
$__compilerVar20 = '';
$this->addRequiredExternal('css', 'inline_mod');
$__compilerVar20 .= '
';
$this->addRequiredExternal('js', 'js/xenforo/inline_mod.js');
$__compilerVar20 .= '

<span id="InlineModControls">
	<span class="selectionControl secondaryContent">
		<label for="ModerationCheck">
			' . 'Select All' . ' <input type="checkbox" id="ModerationCheck" title="' . htmlspecialchars($__compilerVar18, ENT_QUOTES, 'UTF-8') . '" />
		</label>

		<input type="button" class="button ClickNext" value="&darr;" title="' . 'Move down' . '" />
		<input type="button" class="button ClickPrev" value="&uarr;" title="' . 'Move up' . '" />
		<a class="SelectionCount">' . htmlspecialchars($__compilerVar19, ENT_QUOTES, 'UTF-8') . ': <em class="InlineModCheckedTotal">0</em></a>
	</span>

	<span class="actionControl sectionFooter">
		<span class="commonActions">
			';
if ($inlineModOptions['delete'])
{
$__compilerVar20 .= '<input type="submit" class="button" value="' . 'Delete' . '..." name="delete" />';
}
$__compilerVar20 .= '
			';
if ($inlineModOptions['approve'])
{
$__compilerVar20 .= '<input type="submit" class="button" value="' . 'Approve' . '" name="approve" />';
}
$__compilerVar20 .= '
		</span>

		<span class="otherActions">
			<select name="a" id="ModerationSelect" class="textCtrl">
				<option value="">' . 'Other Action' . '...</option>
				<optgroup label="' . 'Moderation Actions' . '">
					' . $__compilerVar17 . '
				</optgroup>
				<option value="closeOverlay">' . 'Close This Overlay' . '</option>
			</select>

			<input type="submit" class="button primary" value="' . 'Go' . '" />
			<input type="reset" class="button OverlayCloser overylayOnly" value="X" title="' . 'Cancel and close these controls' . '" />
		</span>
	</span>
</span>';
$__compilerVar15 .= $__compilerVar20;
unset($__compilerVar16, $__compilerVar17, $__compilerVar18, $__compilerVar19, $__compilerVar20);
$__output .= $__compilerVar15;
unset($__compilerVar15);
$__output .= '
		';
}
$__output .= '
	</form>
	</div>
</div>

</div>';
