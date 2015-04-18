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
$__compilerVar13 = '';
if ($category)
{
$__compilerVar13 .= '
	<label title="' . 'Search only ' . htmlspecialchars($category['category_title'], ENT_QUOTES, 'UTF-8') . '' . '"><input type="checkbox" name="type[resource_update][categories][]" value="' . htmlspecialchars($category['resource_category_id'], ENT_QUOTES, 'UTF-8') . '" checked="checked" /> ' . 'Search this category only' . '</label>
';
}
else
{
$__compilerVar13 .= '
	<label><input type="checkbox" name="type[resource_update][null]" value="" checked="checked" id="search_bar_resources" /> ' . 'Search resources only' . '</label>
';
}
$__compilerVar13 .= '
<ul>
	<li><label><input type="checkbox" name="type[resource_update][is_resource]" value="1" /> ' . 'Search only resource descriptions' . '</label>
</ul>';
$__extraData['searchBar']['resourceUpdate'] .= $__compilerVar13;
unset($__compilerVar13);
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
$__compilerVar14 = '';
$__compilerVar14 .= '<li class="resourceListItem ' . htmlspecialchars($resource['resource_state'], ENT_QUOTES, 'UTF-8') . (($resource['isIgnored'] AND !$showIgnored) ? (' ignored') : ('')) . ' ' . (($resource['feature_date']) ? ('featured') : ('')) . '" id="resource-' . htmlspecialchars($resource['resource_id'], ENT_QUOTES, 'UTF-8') . '">
	<div class="listBlock resourceImage">
		<div class="listBlockInner">
			';
if ($xenOptions['resourceAllowIcons'])
{
$__compilerVar14 .= '
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
$__compilerVar14 .= '
				' . XenForo_Template_Helper_Core::callHelper('avatarhtml', array($resource,(true),array(
'user' => '$resource',
'size' => 's',
'img' => 'true'
),'')) . '
			';
}
$__compilerVar14 .= '
		</div>
	</div>
	<div class="listBlock main">
		<div class="listBlockInner">
			';
$__compilerVar15 = '';
$__compilerVar15 .= '
					';
if ($resource['resource_state'] == ('moderated'))
{
$__compilerVar15 .= '<span class="moderated" title="' . 'Cần kiểm duyệt' . '">' . 'Cần kiểm duyệt' . '</span>';
}
$__compilerVar15 .= '
					';
if ($resource['resource_state'] == ('deleted'))
{
$__compilerVar15 .= '<span class="deleted" title="' . 'Bị xóa' . '">' . 'Bị xóa' . '</span>';
}
$__compilerVar15 .= '
				';
if (trim($__compilerVar15) !== '')
{
$__compilerVar14 .= '
				<div class="iconKey">
				' . $__compilerVar15 . '
				</div>
			';
}
unset($__compilerVar15);
$__compilerVar14 .= '
			';
if ($listItemExtraHtml)
{
$__compilerVar14 .= '<span class="extra muted">' . $listItemExtraHtml . '</span>';
}
$__compilerVar14 .= '
			';
if ($resource['cost'])
{
$__compilerVar14 .= '<span class="cost">' . htmlspecialchars($resource['cost'], ENT_QUOTES, 'UTF-8') . '</span>';
}
$__compilerVar14 .= '
			';
if ($resource['feature_date'])
{
$__compilerVar14 .= '<span class="featuredBanner">' . 'Featured' . '</span>';
}
$__compilerVar14 .= '
			<h3 class="title">
				';
if ($resource['canInlineMod'] AND !$hideInlineMod AND !$showCheckbox)
{
$__compilerVar14 .= '<input type="checkbox" name="resources[]" value="' . htmlspecialchars($resource['resource_id'], ENT_QUOTES, 'UTF-8') . '" class="InlineModCheck" id="inlineModCheck-resource-' . htmlspecialchars($resource['resource_id'], ENT_QUOTES, 'UTF-8') . '" data-target="#resource-' . htmlspecialchars($resource['resource_id'], ENT_QUOTES, 'UTF-8') . '" title="' . 'Select resource' . ': \'' . htmlspecialchars($resource['title'], ENT_QUOTES, 'UTF-8') . '\'" />';
}
$__compilerVar14 .= '
				';
if ($showCheckbox)
{
$__compilerVar14 .= '<input type="checkbox" name="resource_ids[]" value="' . htmlspecialchars($resource['resource_id'], ENT_QUOTES, 'UTF-8') . '" /> ';
}
if ($resource['prefix_id'] AND $linkPrefixHtml)
{
$__compilerVar14 .= '<a href="' . $linkPrefixHtml . '" class="prefixLink" title="' . 'Show only resources prefixed by \'' . XenForo_Template_Helper_Core::callHelper('resourcePrefix', array(
'0' => $resource,
'1' => 'escaped',
'2' => ''
)) . '\'.' . '">' . XenForo_Template_Helper_Core::callHelper('resourcePrefix', array(
'0' => $resource
)) . '</a>';
}
else
{
$__compilerVar14 .= XenForo_Template_Helper_Core::callHelper('resourcePrefix', array(
'0' => $resource
));
}
$__compilerVar14 .= '<a
				href="' . XenForo_Template_Helper_Core::link('resources', $resource, array()) . '">' . htmlspecialchars($resource['title'], ENT_QUOTES, 'UTF-8') . '</a>
				';
if (!$resource['isFilelessNoExternal'])
{
$__compilerVar14 .= '<span class="version">' . htmlspecialchars($resource['version_string'], ENT_QUOTES, 'UTF-8') . '</span>';
}
$__compilerVar14 .= '
			</h3>
			<div class="resourceDetails muted">' . XenForo_Template_Helper_Core::callHelper('usernamehtml', array($resource,'',false,array())) . ',
				<a href="' . XenForo_Template_Helper_Core::link('resources', $resource, array()) . '" class="faint">' . XenForo_Template_Helper_Core::callHelper('datetimehtml', array($resource['resource_date'],array(
'time' => htmlspecialchars($resource['resource_date'], ENT_QUOTES, 'UTF-8')
))) . '</a>';
if ($showCategoryTitle)
{
$__compilerVar14 .= ', <a href="' . XenForo_Template_Helper_Core::link('resources/categories', $resource, array()) . '">' . htmlspecialchars($resource['category_title'], ENT_QUOTES, 'UTF-8') . '</a>';
}
$__compilerVar14 .= '
			</div>
			<div class="tagLine">
				';
if ($resource['resource_state'] == ('deleted'))
{
$__compilerVar14 .= '
					<span class="deletionNote">' . 'This resource has been deleted.' . '
						';
if ($resource['delete_user_id'])
{
$__compilerVar14 .= '
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
$__compilerVar14 .= ', ' . 'Lý do' . ': ' . htmlspecialchars($resource['delete_reason'], ENT_QUOTES, 'UTF-8');
}
$__compilerVar14 .= '.
						';
}
$__compilerVar14 .= '
					</span>
				';
}
else
{
$__compilerVar14 .= '
					' . htmlspecialchars($resource['tag_line'], ENT_QUOTES, 'UTF-8') . '
				';
}
$__compilerVar14 .= '
			</div>
		</div>
	</div>
	<div class="listBlock resourceStats">
		<div class="listBlockInner">
			';
$__compilerVar16 = '';
$__compilerVar16 .= htmlspecialchars($resource['rating_avg'], ENT_QUOTES, 'UTF-8');
$__compilerVar17 = '';
$__compilerVar17 .= (($resource['rating_count'] == 1) ? ('1 phiếu') : ('' . htmlspecialchars($resource['rating_count'], ENT_QUOTES, 'UTF-8') . ' phiếu'));
$__compilerVar18 = '';
$this->addRequiredExternal('css', 'rating');
$__compilerVar18 .= '

';
if ($action)
{
$__compilerVar18 .= '
	';
$this->addRequiredExternal('js', 'js/xenforo/rating.js');
$__compilerVar18 .= '

	<form action="' . htmlspecialchars($action, ENT_QUOTES, 'UTF-8') . '" method="post" class="rating RatingWidget" ' . (($microdata) ? ('itemscope="itemscope" itemtype="http://data-vocabulary.org/Rating"') : ('')) . '>
		<dl>
			<dt class="prompt muted">' . $prompt . '</dt>
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
$__compilerVar18 .= '
					<a href="' . XenForo_Template_Helper_Core::link('threads/whoRated', $thread, array()) . '" title="' . 'Who has rated this thread?' . '" class="OverlayTrigger"><span class="Hint">' . $__compilerVar17 . '</span></a>
				';
}
else
{
$__compilerVar18 .= '
				<span class="Hint">' . $__compilerVar17 . '</span>
				';
}
$__compilerVar18 .= '
			</dd>
		</dl>
		
		<input type="hidden" name="_xfToken" value="' . htmlspecialchars($visitor['csrf_token_page'], ENT_QUOTES, 'UTF-8') . '" />
	</form>
	
';
}
else
{
$__compilerVar18 .= '
	
	<div class="rating ';
if ($xenOptions['threadrating_greyedout'])
{
$__compilerVar18 .= 'tr_greyedout';
}
$__compilerVar18 .= '">
		<dl>
			<dt class="prompt muted">' . $prompt . '</dt>
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
$__compilerVar18 .= '
					<a href="' . XenForo_Template_Helper_Core::link('threads/whoRated', $thread, array()) . '" title="' . 'Who has rated this thread?' . '" class="OverlayTrigger"><span class="Hint">' . $__compilerVar17 . '</span></a>
				';
}
else
{
$__compilerVar18 .= '
				<span class="Hint">' . $__compilerVar17 . '</span>
				';
}
$__compilerVar18 .= '
			</dd>
		</dl>	
	</div>

';
}
$__compilerVar14 .= $__compilerVar18;
unset($__compilerVar16, $__compilerVar17, $__compilerVar18);
$__compilerVar14 .= '
			<div class="pairsJustified">
				';
if (!$resource['is_fileless'])
{
$__compilerVar14 .= '<dl class="resourceDownloads"><dt>' . 'Downloads' . ':</dt> <dd>' . XenForo_Template_Helper_Core::numberFormat($resource['download_count'], '0') . '</dd></dl>';
}
$__compilerVar14 .= '
				<dl class="resourceUpdated"><dt>' . 'Updated' . ':</dt> <dd><a href="' . XenForo_Template_Helper_Core::link('resources/updates', $resource, array()) . '" class="concealed">' . XenForo_Template_Helper_Core::callHelper('datetimehtml', array($resource['last_update'],array(
'time' => htmlspecialchars($resource['last_update'], ENT_QUOTES, 'UTF-8')
))) . '</a></dd></dl>
			</div>
		</div>
	</div>
</li>

';
$this->addRequiredExternal('css', 'resource_list');
$__output .= $__compilerVar14;
unset($__compilerVar14);
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
$__compilerVar19 = '';
$__compilerVar20 = '';
$__compilerVar20 .= 'Resource moderation';
$__compilerVar21 = '';
$__compilerVar21 .= '
		';
if ($inlineModOptions['delete'])
{
$__compilerVar21 .= '<option value="delete">' . 'Delete resources' . '...</option>';
}
$__compilerVar21 .= '
		';
if ($inlineModOptions['undelete'])
{
$__compilerVar21 .= '<option value="undelete">' . 'Undelete resources' . '</option>';
}
$__compilerVar21 .= '
		';
if ($inlineModOptions['approve'])
{
$__compilerVar21 .= '<option value="approve">' . 'Approve resources' . '</option>';
}
$__compilerVar21 .= '
		';
if ($inlineModOptions['unapprove'])
{
$__compilerVar21 .= '<option value="unapprove">' . 'Unapprove resources' . '</option>';
}
$__compilerVar21 .= '
		';
if ($inlineModOptions['feature'])
{
$__compilerVar21 .= '<option value="feature">' . 'Feature Resources' . '</option>';
}
$__compilerVar21 .= '
		';
if ($inlineModOptions['unfeature'])
{
$__compilerVar21 .= '<option value="unfeature">' . 'Unfeature Resources' . '</option>';
}
$__compilerVar21 .= '
		';
if ($inlineModOptions['reassign'])
{
$__compilerVar21 .= '<option value="reassign">' . 'Reassign resources' . '...</option>';
}
$__compilerVar21 .= '
		';
if ($inlineModOptions['move'])
{
$__compilerVar21 .= '<option value="move">' . 'Move Resources' . '...</option>';
}
$__compilerVar21 .= '
		<option value="deselect">' . 'Deselect resources' . '</option>
	';
$__compilerVar22 = '';
$__compilerVar22 .= 'Select / deselect all resources on this page';
$__compilerVar23 = '';
$__compilerVar23 .= 'Selected Resources';
$__compilerVar24 = '';
$this->addRequiredExternal('css', 'inline_mod');
$__compilerVar24 .= '
';
$this->addRequiredExternal('js', 'js/xenforo/inline_mod.js');
$__compilerVar24 .= '

<span id="InlineModControls">
	<span class="selectionControl secondaryContent">
		<label for="ModerationCheck">
			' . 'Chọn tất cả' . ' <input type="checkbox" id="ModerationCheck" title="' . htmlspecialchars($__compilerVar22, ENT_QUOTES, 'UTF-8') . '" />
		</label>

		<input type="button" class="button ClickNext" value="&darr;" title="' . 'Chuyển xuống' . '" />
		<input type="button" class="button ClickPrev" value="&uarr;" title="' . 'Chuyển lên trên' . '" />
		<a class="SelectionCount">' . htmlspecialchars($__compilerVar23, ENT_QUOTES, 'UTF-8') . ': <em class="InlineModCheckedTotal">0</em></a>
	</span>

	<span class="actionControl sectionFooter">
		<span class="commonActions">
			';
if ($inlineModOptions['delete'])
{
$__compilerVar24 .= '<input type="submit" class="button" value="' . 'Xóa' . '..." name="delete" />';
}
$__compilerVar24 .= '
			';
if ($inlineModOptions['approve'])
{
$__compilerVar24 .= '<input type="submit" class="button" value="' . 'Duyệt bài' . '" name="approve" />';
}
$__compilerVar24 .= '
		</span>

		<span class="otherActions">
			<select name="a" id="ModerationSelect" class="textCtrl">
				<option value="">' . 'Hành động khác' . '...</option>
				<optgroup label="' . 'Hành động Quản lý' . '">
					' . $__compilerVar21 . '
				</optgroup>
				<option value="closeOverlay">' . 'Đóng lớp phủ này' . '</option>
			</select>

			<input type="submit" class="button primary" value="' . 'Tới' . '" />
			<input type="reset" class="button OverlayCloser overylayOnly" value="X" title="' . 'Cancel and close these controls' . '" />
		</span>
	</span>
</span>';
$__compilerVar19 .= $__compilerVar24;
unset($__compilerVar20, $__compilerVar21, $__compilerVar22, $__compilerVar23, $__compilerVar24);
$__output .= $__compilerVar19;
unset($__compilerVar19);
$__output .= '
		';
}
$__output .= '
	</form>
</div>';
