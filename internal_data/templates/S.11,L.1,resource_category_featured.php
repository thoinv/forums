<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__extraData['title'] = '';
$__extraData['title'] .= 'Featured Resources' . ' - ' . htmlspecialchars($category['category_title'], ENT_QUOTES, 'UTF-8');
$__output .= '
';
$__extraData['h1'] = '';
$__extraData['h1'] .= 'Featured Resources';
$__output .= '

';
$__extraData['navigation'] = array();
$__extraData['navigation'] = XenForo_Template_Helper_Core::appendBreadCrumbs($__extraData['navigation'], $categoryBreadcrumbs);
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
$this->addRequiredExternal('css', 'resource_list');
$__output .= '

<div class="section">
	<form action="' . XenForo_Template_Helper_Core::link('resources/inline-mod/switch', false, array()) . '" method="post"
		class="InlineModForm"
		data-cookieName="resources"
		data-controls="#InlineModControls"
		data-imodOptions="#ModerationSelect option">

		<ol class="resourceList">
			';
if ($childCategories)
{
$__output .= '
				';
$showCategoryTitle = '';
$showCategoryTitle .= '1';
$__output .= '
			';
}
$__output .= '
			';
foreach ($resources AS $resource)
{
$__output .= '
				';
$__compilerVar2 = '';
$__compilerVar2 .= '<li class="resourceListItem ' . htmlspecialchars($resource['resource_state'], ENT_QUOTES, 'UTF-8') . (($resource['isIgnored'] AND !$showIgnored) ? (' ignored') : ('')) . ' ' . (($resource['feature_date']) ? ('featured') : ('')) . '" id="resource-' . htmlspecialchars($resource['resource_id'], ENT_QUOTES, 'UTF-8') . '">
	<div class="listBlock resourceImage">
		<div class="listBlockInner">
			';
if ($xenOptions['resourceAllowIcons'])
{
$__compilerVar2 .= '
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
$__compilerVar2 .= '
				' . XenForo_Template_Helper_Core::callHelper('avatarhtml', array($resource,(true),array(
'user' => '$resource',
'size' => 's',
'img' => 'true'
),'')) . '
			';
}
$__compilerVar2 .= '
		</div>
	</div>
	<div class="listBlock main">
		<div class="listBlockInner">
			';
$__compilerVar3 = '';
$__compilerVar3 .= '
					';
if ($resource['resource_state'] == ('moderated'))
{
$__compilerVar3 .= '<span class="moderated" title="' . 'Moderated' . '">' . 'Moderated' . '</span>';
}
$__compilerVar3 .= '
					';
if ($resource['resource_state'] == ('deleted'))
{
$__compilerVar3 .= '<span class="deleted" title="' . 'Deleted' . '">' . 'Deleted' . '</span>';
}
$__compilerVar3 .= '
				';
if (trim($__compilerVar3) !== '')
{
$__compilerVar2 .= '
				<div class="iconKey">
				' . $__compilerVar3 . '
				</div>
			';
}
unset($__compilerVar3);
$__compilerVar2 .= '
			';
if ($listItemExtraHtml)
{
$__compilerVar2 .= '<span class="extra muted">' . $listItemExtraHtml . '</span>';
}
$__compilerVar2 .= '
			';
if ($resource['cost'])
{
$__compilerVar2 .= '<span class="cost">' . htmlspecialchars($resource['cost'], ENT_QUOTES, 'UTF-8') . '</span>';
}
$__compilerVar2 .= '
			';
if ($resource['feature_date'])
{
$__compilerVar2 .= '<span class="featuredBanner">' . 'Featured' . '</span>';
}
$__compilerVar2 .= '
			<h3 class="title">
				';
if ($resource['canInlineMod'] AND !$hideInlineMod AND !$showCheckbox)
{
$__compilerVar2 .= '<input type="checkbox" name="resources[]" value="' . htmlspecialchars($resource['resource_id'], ENT_QUOTES, 'UTF-8') . '" class="InlineModCheck" id="inlineModCheck-resource-' . htmlspecialchars($resource['resource_id'], ENT_QUOTES, 'UTF-8') . '" data-target="#resource-' . htmlspecialchars($resource['resource_id'], ENT_QUOTES, 'UTF-8') . '" title="' . 'Select resource' . ': \'' . htmlspecialchars($resource['title'], ENT_QUOTES, 'UTF-8') . '\'" />';
}
$__compilerVar2 .= '
				';
if ($showCheckbox)
{
$__compilerVar2 .= '<input type="checkbox" name="resource_ids[]" value="' . htmlspecialchars($resource['resource_id'], ENT_QUOTES, 'UTF-8') . '" /> ';
}
if ($resource['prefix_id'] AND $linkPrefixHtml)
{
$__compilerVar2 .= '<a href="' . $linkPrefixHtml . '" class="prefixLink" title="' . 'Show only resources prefixed by \'' . XenForo_Template_Helper_Core::callHelper('resourcePrefix', array(
'0' => $resource,
'1' => 'escaped',
'2' => ''
)) . '\'.' . '">' . XenForo_Template_Helper_Core::callHelper('resourcePrefix', array(
'0' => $resource
)) . '</a>';
}
else
{
$__compilerVar2 .= XenForo_Template_Helper_Core::callHelper('resourcePrefix', array(
'0' => $resource
));
}
$__compilerVar2 .= '<a
				href="' . XenForo_Template_Helper_Core::link('resources', $resource, array()) . '">' . htmlspecialchars($resource['title'], ENT_QUOTES, 'UTF-8') . '</a>
				';
if (!$resource['isFilelessNoExternal'])
{
$__compilerVar2 .= '<span class="version">' . htmlspecialchars($resource['version_string'], ENT_QUOTES, 'UTF-8') . '</span>';
}
$__compilerVar2 .= '
			</h3>
			<div class="resourceDetails muted">' . XenForo_Template_Helper_Core::callHelper('usernamehtml', array($resource,'',false,array())) . ',
				<a href="' . XenForo_Template_Helper_Core::link('resources', $resource, array()) . '" class="faint">' . XenForo_Template_Helper_Core::callHelper('datetimehtml', array($resource['resource_date'],array(
'time' => htmlspecialchars($resource['resource_date'], ENT_QUOTES, 'UTF-8')
))) . '</a>';
if ($showCategoryTitle)
{
$__compilerVar2 .= ', <a href="' . XenForo_Template_Helper_Core::link('resources/categories', $resource, array()) . '">' . htmlspecialchars($resource['category_title'], ENT_QUOTES, 'UTF-8') . '</a>';
}
$__compilerVar2 .= '
			</div>
			<div class="tagLine">
				';
if ($resource['resource_state'] == ('deleted'))
{
$__compilerVar2 .= '
					<span class="deletionNote">' . 'This resource has been deleted.' . '
						';
if ($resource['delete_user_id'])
{
$__compilerVar2 .= '
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
$__compilerVar2 .= ', ' . 'Reason' . ': ' . htmlspecialchars($resource['delete_reason'], ENT_QUOTES, 'UTF-8');
}
$__compilerVar2 .= '.
						';
}
$__compilerVar2 .= '
					</span>
				';
}
else
{
$__compilerVar2 .= '
					' . htmlspecialchars($resource['tag_line'], ENT_QUOTES, 'UTF-8') . '
				';
}
$__compilerVar2 .= '
			</div>
		</div>
	</div>
	<div class="listBlock resourceStats">
		<div class="listBlockInner">
			';
$__compilerVar4 = '';
$__compilerVar4 .= htmlspecialchars($resource['rating_avg'], ENT_QUOTES, 'UTF-8');
$__compilerVar5 = '';
$__compilerVar5 .= (($resource['rating_count'] == 1) ? ('1 vote') : ('' . htmlspecialchars($resource['rating_count'], ENT_QUOTES, 'UTF-8') . ' votes'));
$__compilerVar6 = '';
$this->addRequiredExternal('css', 'rating');
$__compilerVar6 .= '

';
if ($action)
{
$__compilerVar6 .= '
	';
$this->addRequiredExternal('js', 'js/xenforo/rating.js');
$__compilerVar6 .= '

	<form action="' . htmlspecialchars($action, ENT_QUOTES, 'UTF-8') . '" method="post" class="rating RatingWidget" ' . (($microdata) ? ('itemscope="itemscope" itemtype="http://data-vocabulary.org/Rating"') : ('')) . '>
		<dl>
			<dt class="prompt muted">' . $prompt . '</dt>
			<dd>
				<span class="ratings">
					 <button type="submit" name="rating" value="1" class="star ' . (($__compilerVar4 >= 1) ? ('Full') : ('')) . (($__compilerVar4 >= 0.5 AND $__compilerVar4 < 1) ? ('Half') : ('')) . '" title="' . 'Terrible' . '">1</button
					><button type="submit" name="rating" value="2" class="star ' . (($__compilerVar4 >= 2) ? ('Full') : ('')) . (($__compilerVar4 >= 1.5 AND $__compilerVar4 < 2) ? ('Half') : ('')) . '" title="' . 'Poor' . '">2</button
					><button type="submit" name="rating" value="3" class="star ' . (($__compilerVar4 >= 3) ? ('Full') : ('')) . (($__compilerVar4 >= 2.5 AND $__compilerVar4 < 3) ? ('Half') : ('')) . '" title="' . 'Average' . '">3</button
					><button type="submit" name="rating" value="4" class="star ' . (($__compilerVar4 >= 4) ? ('Full') : ('')) . (($__compilerVar4 >= 3.5 AND $__compilerVar4 < 4) ? ('Half') : ('')) . '" title="' . 'Good' . '">4</button
					><button type="submit" name="rating" value="5" class="star ' . (($__compilerVar4 >= 5) ? ('Full') : ('')) . (($__compilerVar4 >= 4.5 AND $__compilerVar4 < 5) ? ('Half') : ('')) . '" title="' . 'Excellent' . '">5</button>
				</span>
			
				<span class="RatingValue"><span class="Number" itemprop="average">' . htmlspecialchars($__compilerVar4, ENT_QUOTES, 'UTF-8') . '</span>/<span itemprop="best">5</span>,</span>
				';
if ($threadrating['whoRated'] AND $controllerName == ('XenForo_ControllerPublic_Thread') AND $thread['thread_rate_count'] > 0)
{
$__compilerVar6 .= '
					<a href="' . XenForo_Template_Helper_Core::link('threads/whoRated', $thread, array()) . '" title="' . 'Who has rated this thread?' . '" class="OverlayTrigger"><span class="Hint">' . $__compilerVar5 . '</span></a>
				';
}
else
{
$__compilerVar6 .= '
				<span class="Hint">' . $__compilerVar5 . '</span>
				';
}
$__compilerVar6 .= '
			</dd>
		</dl>
		
		<input type="hidden" name="_xfToken" value="' . htmlspecialchars($visitor['csrf_token_page'], ENT_QUOTES, 'UTF-8') . '" />
	</form>
	
';
}
else
{
$__compilerVar6 .= '
	
	<div class="rating ';
if ($xenOptions['threadrating_greyedout'])
{
$__compilerVar6 .= 'tr_greyedout';
}
$__compilerVar6 .= '">
		<dl>
			<dt class="prompt muted">' . $prompt . '</dt>
			<dd>		
				<span class="ratings" title="' . XenForo_Template_Helper_Core::numberFormat($__compilerVar4, '2') . '">
					 <span class="star ' . (($__compilerVar4 >= 1) ? ('Full') : ('')) . (($__compilerVar4 >= 0.5 AND $__compilerVar4 < 1) ? ('Half') : ('')) . '"></span
					><span class="star ' . (($__compilerVar4 >= 2) ? ('Full') : ('')) . (($__compilerVar4 >= 1.5 AND $__compilerVar4 < 2) ? ('Half') : ('')) . '"></span
					><span class="star ' . (($__compilerVar4 >= 3) ? ('Full') : ('')) . (($__compilerVar4 >= 2.5 AND $__compilerVar4 < 3) ? ('Half') : ('')) . '"></span
					><span class="star ' . (($__compilerVar4 >= 4) ? ('Full') : ('')) . (($__compilerVar4 >= 3.5 AND $__compilerVar4 < 4) ? ('Half') : ('')) . '"></span
					><span class="star ' . (($__compilerVar4 >= 5) ? ('Full') : ('')) . (($__compilerVar4 >= 4.5 AND $__compilerVar4 < 5) ? ('Half') : ('')) . '"></span>
				</span>
				
				<span class="RatingValue"><span class="Number" itemprop="average">' . htmlspecialchars($__compilerVar4, ENT_QUOTES, 'UTF-8') . '</span>/<span itemprop="best">5</span>,</span>
				';
if ($threadrating['whoRated'] AND $controllerName == ('XenForo_ControllerPublic_Thread') AND $thread['thread_rate_count'] > 0)
{
$__compilerVar6 .= '
					<a href="' . XenForo_Template_Helper_Core::link('threads/whoRated', $thread, array()) . '" title="' . 'Who has rated this thread?' . '" class="OverlayTrigger"><span class="Hint">' . $__compilerVar5 . '</span></a>
				';
}
else
{
$__compilerVar6 .= '
				<span class="Hint">' . $__compilerVar5 . '</span>
				';
}
$__compilerVar6 .= '
			</dd>
		</dl>	
	</div>

';
}
$__compilerVar2 .= $__compilerVar6;
unset($__compilerVar4, $__compilerVar5, $__compilerVar6);
$__compilerVar2 .= '
			<div class="pairsJustified">
				';
if (!$resource['is_fileless'])
{
$__compilerVar2 .= '<dl class="resourceDownloads"><dt>' . 'Downloads' . ':</dt> <dd>' . XenForo_Template_Helper_Core::numberFormat($resource['download_count'], '0') . '</dd></dl>';
}
$__compilerVar2 .= '
				<dl class="resourceUpdated"><dt>' . 'Updated' . ':</dt> <dd><a href="' . XenForo_Template_Helper_Core::link('resources/updates', $resource, array()) . '" class="concealed">' . XenForo_Template_Helper_Core::callHelper('datetimehtml', array($resource['last_update'],array(
'time' => htmlspecialchars($resource['last_update'], ENT_QUOTES, 'UTF-8')
))) . '</a></dd></dl>
			</div>
		</div>
	</div>
</li>

';
$this->addRequiredExternal('css', 'resource_list');
$__output .= $__compilerVar2;
unset($__compilerVar2);
$__output .= '
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
		</div>
	
		';
if ($inlineModOptions)
{
$__output .= '
			';
$__compilerVar7 = '';
$__compilerVar8 = '';
$__compilerVar8 .= 'Resource moderation';
$__compilerVar9 = '';
$__compilerVar9 .= '
		';
if ($inlineModOptions['delete'])
{
$__compilerVar9 .= '<option value="delete">' . 'Delete resources' . '...</option>';
}
$__compilerVar9 .= '
		';
if ($inlineModOptions['undelete'])
{
$__compilerVar9 .= '<option value="undelete">' . 'Undelete resources' . '</option>';
}
$__compilerVar9 .= '
		';
if ($inlineModOptions['approve'])
{
$__compilerVar9 .= '<option value="approve">' . 'Approve resources' . '</option>';
}
$__compilerVar9 .= '
		';
if ($inlineModOptions['unapprove'])
{
$__compilerVar9 .= '<option value="unapprove">' . 'Unapprove resources' . '</option>';
}
$__compilerVar9 .= '
		';
if ($inlineModOptions['feature'])
{
$__compilerVar9 .= '<option value="feature">' . 'Feature Resources' . '</option>';
}
$__compilerVar9 .= '
		';
if ($inlineModOptions['unfeature'])
{
$__compilerVar9 .= '<option value="unfeature">' . 'Unfeature Resources' . '</option>';
}
$__compilerVar9 .= '
		';
if ($inlineModOptions['reassign'])
{
$__compilerVar9 .= '<option value="reassign">' . 'Reassign resources' . '...</option>';
}
$__compilerVar9 .= '
		';
if ($inlineModOptions['move'])
{
$__compilerVar9 .= '<option value="move">' . 'Move Resources' . '...</option>';
}
$__compilerVar9 .= '
		<option value="deselect">' . 'Deselect resources' . '</option>
	';
$__compilerVar10 = '';
$__compilerVar10 .= 'Select / deselect all resources on this page';
$__compilerVar11 = '';
$__compilerVar11 .= 'Selected Resources';
$__compilerVar12 = '';
$this->addRequiredExternal('css', 'inline_mod');
$__compilerVar12 .= '
';
$this->addRequiredExternal('js', 'js/xenforo/inline_mod.js');
$__compilerVar12 .= '

<span id="InlineModControls">
	<span class="selectionControl secondaryContent">
		<label for="ModerationCheck">
			' . 'Select All' . ' <input type="checkbox" id="ModerationCheck" title="' . htmlspecialchars($__compilerVar10, ENT_QUOTES, 'UTF-8') . '" />
		</label>

		<input type="button" class="button ClickNext" value="&darr;" title="' . 'Move down' . '" />
		<input type="button" class="button ClickPrev" value="&uarr;" title="' . 'Move up' . '" />
		<a class="SelectionCount">' . htmlspecialchars($__compilerVar11, ENT_QUOTES, 'UTF-8') . ': <em class="InlineModCheckedTotal">0</em></a>
	</span>

	<span class="actionControl sectionFooter">
		<span class="commonActions">
			';
if ($inlineModOptions['delete'])
{
$__compilerVar12 .= '<input type="submit" class="button" value="' . 'Delete' . '..." name="delete" />';
}
$__compilerVar12 .= '
			';
if ($inlineModOptions['approve'])
{
$__compilerVar12 .= '<input type="submit" class="button" value="' . 'Approve' . '" name="approve" />';
}
$__compilerVar12 .= '
		</span>

		<span class="otherActions">
			<select name="a" id="ModerationSelect" class="textCtrl">
				<option value="">' . 'Other Action' . '...</option>
				<optgroup label="' . 'Moderation Actions' . '">
					' . $__compilerVar9 . '
				</optgroup>
				<option value="closeOverlay">' . 'Close This Overlay' . '</option>
			</select>

			<input type="submit" class="button primary" value="' . 'Go' . '" />
			<input type="reset" class="button OverlayCloser overylayOnly" value="X" title="' . 'Cancel and close these controls' . '" />
		</span>
	</span>
</span>';
$__compilerVar7 .= $__compilerVar12;
unset($__compilerVar8, $__compilerVar9, $__compilerVar10, $__compilerVar11, $__compilerVar12);
$__output .= $__compilerVar7;
unset($__compilerVar7);
$__output .= '
		';
}
$__output .= '
	</form>
</div>';
