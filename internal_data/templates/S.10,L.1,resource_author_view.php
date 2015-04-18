<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__extraData['title'] = '';
$__extraData['title'] .= 'Resources from ' . htmlspecialchars($user['username'], ENT_QUOTES, 'UTF-8') . '';
$__output .= '

';
$__extraData['navigation'] = array();
$__extraData['navigation'][] = array('href' => XenForo_Template_Helper_Core::link('full:resources/authors', false, array()), 'value' => 'Authors');
$__output .= '

';
$__extraData['head']['openGraph'] = '';
$__extraData['head']['openGraph'] .= '
	';
$__compilerVar1 = '';
$__compilerVar1 .= XenForo_Template_Helper_Core::link('canonical:resources/authors', $user, array());
$__compilerVar2 = '';
$__compilerVar2 .= 'Resources from ' . htmlspecialchars($user['username'], ENT_QUOTES, 'UTF-8') . '';
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
$__extraData['head']['openGraph'] .= '
';
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
foreach ($resources AS $resource)
{
$__output .= '
				';
$__compilerVar5 = '';
$__compilerVar5 .= '1';
$__compilerVar6 = '';
$__compilerVar6 .= '1';
$__compilerVar7 = '';
$__compilerVar7 .= htmlspecialchars($fromProfile, ENT_QUOTES, 'UTF-8');
$__compilerVar8 = '';
$__compilerVar8 .= '<li class="resourceListItem ' . htmlspecialchars($resource['resource_state'], ENT_QUOTES, 'UTF-8') . (($resource['isIgnored'] AND !$__compilerVar6) ? (' ignored') : ('')) . ' ' . (($resource['feature_date']) ? ('featured') : ('')) . '" id="resource-' . htmlspecialchars($resource['resource_id'], ENT_QUOTES, 'UTF-8') . '">
	<div class="listBlock resourceImage">
		<div class="listBlockInner">
			';
if ($xenOptions['resourceAllowIcons'])
{
$__compilerVar8 .= '
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
$__compilerVar8 .= '
				' . XenForo_Template_Helper_Core::callHelper('avatarhtml', array($resource,(true),array(
'user' => '$resource',
'size' => 's',
'img' => 'true'
),'')) . '
			';
}
$__compilerVar8 .= '
		</div>
	</div>
	<div class="listBlock main">
		<div class="listBlockInner">
			';
$__compilerVar9 = '';
$__compilerVar9 .= '
					';
if ($resource['resource_state'] == ('moderated'))
{
$__compilerVar9 .= '<span class="moderated" title="' . 'Moderated' . '">' . 'Moderated' . '</span>';
}
$__compilerVar9 .= '
					';
if ($resource['resource_state'] == ('deleted'))
{
$__compilerVar9 .= '<span class="deleted" title="' . 'Deleted' . '">' . 'Deleted' . '</span>';
}
$__compilerVar9 .= '
				';
if (trim($__compilerVar9) !== '')
{
$__compilerVar8 .= '
				<div class="iconKey">
				' . $__compilerVar9 . '
				</div>
			';
}
unset($__compilerVar9);
$__compilerVar8 .= '
			';
if ($listItemExtraHtml)
{
$__compilerVar8 .= '<span class="extra muted">' . $listItemExtraHtml . '</span>';
}
$__compilerVar8 .= '
			';
if ($resource['cost'])
{
$__compilerVar8 .= '<span class="cost">' . htmlspecialchars($resource['cost'], ENT_QUOTES, 'UTF-8') . '</span>';
}
$__compilerVar8 .= '
			';
if ($resource['feature_date'])
{
$__compilerVar8 .= '<span class="featuredBanner">' . 'Featured' . '</span>';
}
$__compilerVar8 .= '
			<h3 class="title">
				';
if ($resource['canInlineMod'] AND !$__compilerVar7 AND !$showCheckbox)
{
$__compilerVar8 .= '<input type="checkbox" name="resources[]" value="' . htmlspecialchars($resource['resource_id'], ENT_QUOTES, 'UTF-8') . '" class="InlineModCheck" id="inlineModCheck-resource-' . htmlspecialchars($resource['resource_id'], ENT_QUOTES, 'UTF-8') . '" data-target="#resource-' . htmlspecialchars($resource['resource_id'], ENT_QUOTES, 'UTF-8') . '" title="' . 'Select resource' . ': \'' . htmlspecialchars($resource['title'], ENT_QUOTES, 'UTF-8') . '\'" />';
}
$__compilerVar8 .= '
				';
if ($showCheckbox)
{
$__compilerVar8 .= '<input type="checkbox" name="resource_ids[]" value="' . htmlspecialchars($resource['resource_id'], ENT_QUOTES, 'UTF-8') . '" /> ';
}
if ($resource['prefix_id'] AND $linkPrefixHtml)
{
$__compilerVar8 .= '<a href="' . $linkPrefixHtml . '" class="prefixLink" title="' . 'Show only resources prefixed by \'' . XenForo_Template_Helper_Core::callHelper('resourcePrefix', array(
'0' => $resource,
'1' => 'escaped',
'2' => ''
)) . '\'.' . '">' . XenForo_Template_Helper_Core::callHelper('resourcePrefix', array(
'0' => $resource
)) . '</a>';
}
else
{
$__compilerVar8 .= XenForo_Template_Helper_Core::callHelper('resourcePrefix', array(
'0' => $resource
));
}
$__compilerVar8 .= '<a
				href="' . XenForo_Template_Helper_Core::link('resources', $resource, array()) . '">' . htmlspecialchars($resource['title'], ENT_QUOTES, 'UTF-8') . '</a>
				';
if (!$resource['isFilelessNoExternal'])
{
$__compilerVar8 .= '<span class="version">' . htmlspecialchars($resource['version_string'], ENT_QUOTES, 'UTF-8') . '</span>';
}
$__compilerVar8 .= '
			</h3>
			<div class="resourceDetails muted">' . XenForo_Template_Helper_Core::callHelper('usernamehtml', array($resource,'',false,array())) . ',
				<a href="' . XenForo_Template_Helper_Core::link('resources', $resource, array()) . '" class="faint">' . XenForo_Template_Helper_Core::callHelper('datetimehtml', array($resource['resource_date'],array(
'time' => htmlspecialchars($resource['resource_date'], ENT_QUOTES, 'UTF-8')
))) . '</a>';
if ($__compilerVar5)
{
$__compilerVar8 .= ', <a href="' . XenForo_Template_Helper_Core::link('resources/categories', $resource, array()) . '">' . htmlspecialchars($resource['category_title'], ENT_QUOTES, 'UTF-8') . '</a>';
}
$__compilerVar8 .= '
			</div>
			<div class="tagLine">
				';
if ($resource['resource_state'] == ('deleted'))
{
$__compilerVar8 .= '
					<span class="deletionNote">' . 'This resource has been deleted.' . '
						';
if ($resource['delete_user_id'])
{
$__compilerVar8 .= '
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
$__compilerVar8 .= ', ' . 'Reason' . ': ' . htmlspecialchars($resource['delete_reason'], ENT_QUOTES, 'UTF-8');
}
$__compilerVar8 .= '.
						';
}
$__compilerVar8 .= '
					</span>
				';
}
else
{
$__compilerVar8 .= '
					' . htmlspecialchars($resource['tag_line'], ENT_QUOTES, 'UTF-8') . '
				';
}
$__compilerVar8 .= '
			</div>
		</div>
	</div>
	<div class="listBlock resourceStats">
		<div class="listBlockInner">
			';
$__compilerVar10 = '';
$__compilerVar10 .= htmlspecialchars($resource['rating_avg'], ENT_QUOTES, 'UTF-8');
$__compilerVar11 = '';
$__compilerVar11 .= (($resource['rating_count'] == 1) ? ('1 vote') : ('' . htmlspecialchars($resource['rating_count'], ENT_QUOTES, 'UTF-8') . ' votes'));
$__compilerVar12 = '';
$this->addRequiredExternal('css', 'rating');
$__compilerVar12 .= '

';
if ($action)
{
$__compilerVar12 .= '
	';
$this->addRequiredExternal('js', 'js/xenforo/rating.js');
$__compilerVar12 .= '

	<form action="' . htmlspecialchars($action, ENT_QUOTES, 'UTF-8') . '" method="post" class="rating RatingWidget" ' . (($microdata) ? ('itemscope="itemscope" itemtype="http://data-vocabulary.org/Rating"') : ('')) . '>
		<dl>
			<dt class="prompt muted">' . $prompt . '</dt>
			<dd>
				<span class="ratings">
					 <button type="submit" name="rating" value="1" class="star ' . (($__compilerVar10 >= 1) ? ('Full') : ('')) . (($__compilerVar10 >= 0.5 AND $__compilerVar10 < 1) ? ('Half') : ('')) . '" title="' . 'Terrible' . '">1</button
					><button type="submit" name="rating" value="2" class="star ' . (($__compilerVar10 >= 2) ? ('Full') : ('')) . (($__compilerVar10 >= 1.5 AND $__compilerVar10 < 2) ? ('Half') : ('')) . '" title="' . 'Poor' . '">2</button
					><button type="submit" name="rating" value="3" class="star ' . (($__compilerVar10 >= 3) ? ('Full') : ('')) . (($__compilerVar10 >= 2.5 AND $__compilerVar10 < 3) ? ('Half') : ('')) . '" title="' . 'Average' . '">3</button
					><button type="submit" name="rating" value="4" class="star ' . (($__compilerVar10 >= 4) ? ('Full') : ('')) . (($__compilerVar10 >= 3.5 AND $__compilerVar10 < 4) ? ('Half') : ('')) . '" title="' . 'Good' . '">4</button
					><button type="submit" name="rating" value="5" class="star ' . (($__compilerVar10 >= 5) ? ('Full') : ('')) . (($__compilerVar10 >= 4.5 AND $__compilerVar10 < 5) ? ('Half') : ('')) . '" title="' . 'Excellent' . '">5</button>
				</span>
			
				<span class="RatingValue"><span class="Number" itemprop="average">' . htmlspecialchars($__compilerVar10, ENT_QUOTES, 'UTF-8') . '</span>/<span itemprop="best">5</span>,</span>
				';
if ($threadrating['whoRated'] AND $controllerName == ('XenForo_ControllerPublic_Thread') AND $thread['thread_rate_count'] > 0)
{
$__compilerVar12 .= '
					<a href="' . XenForo_Template_Helper_Core::link('threads/whoRated', $thread, array()) . '" title="' . 'Who has rated this thread?' . '" class="OverlayTrigger"><span class="Hint">' . $__compilerVar11 . '</span></a>
				';
}
else
{
$__compilerVar12 .= '
				<span class="Hint">' . $__compilerVar11 . '</span>
				';
}
$__compilerVar12 .= '
			</dd>
		</dl>
		
		<input type="hidden" name="_xfToken" value="' . htmlspecialchars($visitor['csrf_token_page'], ENT_QUOTES, 'UTF-8') . '" />
	</form>
	
';
}
else
{
$__compilerVar12 .= '
	
	<div class="rating ';
if ($xenOptions['threadrating_greyedout'])
{
$__compilerVar12 .= 'tr_greyedout';
}
$__compilerVar12 .= '">
		<dl>
			<dt class="prompt muted">' . $prompt . '</dt>
			<dd>		
				<span class="ratings" title="' . XenForo_Template_Helper_Core::numberFormat($__compilerVar10, '2') . '">
					 <span class="star ' . (($__compilerVar10 >= 1) ? ('Full') : ('')) . (($__compilerVar10 >= 0.5 AND $__compilerVar10 < 1) ? ('Half') : ('')) . '"></span
					><span class="star ' . (($__compilerVar10 >= 2) ? ('Full') : ('')) . (($__compilerVar10 >= 1.5 AND $__compilerVar10 < 2) ? ('Half') : ('')) . '"></span
					><span class="star ' . (($__compilerVar10 >= 3) ? ('Full') : ('')) . (($__compilerVar10 >= 2.5 AND $__compilerVar10 < 3) ? ('Half') : ('')) . '"></span
					><span class="star ' . (($__compilerVar10 >= 4) ? ('Full') : ('')) . (($__compilerVar10 >= 3.5 AND $__compilerVar10 < 4) ? ('Half') : ('')) . '"></span
					><span class="star ' . (($__compilerVar10 >= 5) ? ('Full') : ('')) . (($__compilerVar10 >= 4.5 AND $__compilerVar10 < 5) ? ('Half') : ('')) . '"></span>
				</span>
				
				<span class="RatingValue"><span class="Number" itemprop="average">' . htmlspecialchars($__compilerVar10, ENT_QUOTES, 'UTF-8') . '</span>/<span itemprop="best">5</span>,</span>
				';
if ($threadrating['whoRated'] AND $controllerName == ('XenForo_ControllerPublic_Thread') AND $thread['thread_rate_count'] > 0)
{
$__compilerVar12 .= '
					<a href="' . XenForo_Template_Helper_Core::link('threads/whoRated', $thread, array()) . '" title="' . 'Who has rated this thread?' . '" class="OverlayTrigger"><span class="Hint">' . $__compilerVar11 . '</span></a>
				';
}
else
{
$__compilerVar12 .= '
				<span class="Hint">' . $__compilerVar11 . '</span>
				';
}
$__compilerVar12 .= '
			</dd>
		</dl>	
	</div>

';
}
$__compilerVar8 .= $__compilerVar12;
unset($__compilerVar10, $__compilerVar11, $__compilerVar12);
$__compilerVar8 .= '
			<div class="pairsJustified">
				';
if (!$resource['is_fileless'])
{
$__compilerVar8 .= '<dl class="resourceDownloads"><dt>' . 'Downloads' . ':</dt> <dd>' . XenForo_Template_Helper_Core::numberFormat($resource['download_count'], '0') . '</dd></dl>';
}
$__compilerVar8 .= '
				<dl class="resourceUpdated"><dt>' . 'Updated' . ':</dt> <dd><a href="' . XenForo_Template_Helper_Core::link('resources/updates', $resource, array()) . '" class="concealed">' . XenForo_Template_Helper_Core::callHelper('datetimehtml', array($resource['last_update'],array(
'time' => htmlspecialchars($resource['last_update'], ENT_QUOTES, 'UTF-8')
))) . '</a></dd></dl>
			</div>
		</div>
	</div>
</li>

';
$this->addRequiredExternal('css', 'resource_list');
$__output .= $__compilerVar8;
unset($__compilerVar5, $__compilerVar6, $__compilerVar7, $__compilerVar8);
$__output .= '
			';
}
$__output .= '
		</ol>
		
		<div class="pageNavLinkGroup">
			';
if ($inlineModOptions AND !$fromProfile)
{
$__output .= '<div class="linkGroup InlineMod SelectionCountContainer"></div>';
}
$__output .= '
			' . XenForo_Template_Helper_Core::callHelper('pagenavhtml', array('public', htmlspecialchars($perPage, ENT_QUOTES, 'UTF-8'), htmlspecialchars($aggregate['total_resources'], ENT_QUOTES, 'UTF-8'), htmlspecialchars($page, ENT_QUOTES, 'UTF-8'), 'resources/authors', $user, array(), false, array())) . '
		</div>
	
		';
if ($inlineModOptions AND !$fromProfile)
{
$__output .= '
			';
$__compilerVar13 = '';
$__compilerVar14 = '';
$__compilerVar14 .= 'Resource moderation';
$__compilerVar15 = '';
$__compilerVar15 .= '
		';
if ($inlineModOptions['delete'])
{
$__compilerVar15 .= '<option value="delete">' . 'Delete resources' . '...</option>';
}
$__compilerVar15 .= '
		';
if ($inlineModOptions['undelete'])
{
$__compilerVar15 .= '<option value="undelete">' . 'Undelete resources' . '</option>';
}
$__compilerVar15 .= '
		';
if ($inlineModOptions['approve'])
{
$__compilerVar15 .= '<option value="approve">' . 'Approve resources' . '</option>';
}
$__compilerVar15 .= '
		';
if ($inlineModOptions['unapprove'])
{
$__compilerVar15 .= '<option value="unapprove">' . 'Unapprove resources' . '</option>';
}
$__compilerVar15 .= '
		';
if ($inlineModOptions['feature'])
{
$__compilerVar15 .= '<option value="feature">' . 'Feature Resources' . '</option>';
}
$__compilerVar15 .= '
		';
if ($inlineModOptions['unfeature'])
{
$__compilerVar15 .= '<option value="unfeature">' . 'Unfeature Resources' . '</option>';
}
$__compilerVar15 .= '
		';
if ($inlineModOptions['reassign'])
{
$__compilerVar15 .= '<option value="reassign">' . 'Reassign resources' . '...</option>';
}
$__compilerVar15 .= '
		';
if ($inlineModOptions['move'])
{
$__compilerVar15 .= '<option value="move">' . 'Move Resources' . '...</option>';
}
$__compilerVar15 .= '
		<option value="deselect">' . 'Deselect resources' . '</option>
	';
$__compilerVar16 = '';
$__compilerVar16 .= 'Select / deselect all resources on this page';
$__compilerVar17 = '';
$__compilerVar17 .= 'Selected Resources';
$__compilerVar18 = '';
$this->addRequiredExternal('css', 'inline_mod');
$__compilerVar18 .= '
';
$this->addRequiredExternal('js', 'js/xenforo/inline_mod.js');
$__compilerVar18 .= '

<span id="InlineModControls">
	<span class="selectionControl secondaryContent">
		<label for="ModerationCheck">
			' . 'Select All' . ' <input type="checkbox" id="ModerationCheck" title="' . htmlspecialchars($__compilerVar16, ENT_QUOTES, 'UTF-8') . '" />
		</label>

		<input type="button" class="button ClickNext" value="&darr;" title="' . 'Move down' . '" />
		<input type="button" class="button ClickPrev" value="&uarr;" title="' . 'Move up' . '" />
		<a class="SelectionCount">' . htmlspecialchars($__compilerVar17, ENT_QUOTES, 'UTF-8') . ': <em class="InlineModCheckedTotal">0</em></a>
	</span>

	<span class="actionControl sectionFooter">
		<span class="commonActions">
			';
if ($inlineModOptions['delete'])
{
$__compilerVar18 .= '<input type="submit" class="button" value="' . 'Delete' . '..." name="delete" />';
}
$__compilerVar18 .= '
			';
if ($inlineModOptions['approve'])
{
$__compilerVar18 .= '<input type="submit" class="button" value="' . 'Approve' . '" name="approve" />';
}
$__compilerVar18 .= '
		</span>

		<span class="otherActions">
			<select name="a" id="ModerationSelect" class="textCtrl">
				<option value="">' . 'Other Action' . '...</option>
				<optgroup label="' . 'Moderation Actions' . '">
					' . $__compilerVar15 . '
				</optgroup>
				<option value="closeOverlay">' . 'Close This Overlay' . '</option>
			</select>

			<input type="submit" class="button primary" value="' . 'Go' . '" />
			<input type="reset" class="button OverlayCloser overylayOnly" value="X" title="' . 'Cancel and close these controls' . '" />
		</span>
	</span>
</span>';
$__compilerVar13 .= $__compilerVar18;
unset($__compilerVar14, $__compilerVar15, $__compilerVar16, $__compilerVar17, $__compilerVar18);
$__output .= $__compilerVar13;
unset($__compilerVar13);
$__output .= '
		';
}
$__output .= '
	</form>
</div>

';
$__extraData['sidebar'] = '';
$__extraData['sidebar'] .= '

	<div class="section">
		<div class="secondaryContent statsList" id="authorStats">
			<h3>' . 'Author Details' . '</h3>
			<div class="pairsJustified">
				<dl class="authorName"><dt>' . 'Author' . ':</dt>
					<dd>' . XenForo_Template_Helper_Core::callHelper('usernamehtml', array($user,'',false,array())) . '</dd></dl>
				<dl class="resourceCount"><dt>' . 'Tài nguyên' . ':</dt>
					<dd>' . XenForo_Template_Helper_Core::numberFormat($aggregate['total_resources'], '0') . '</dd></dl>
				';
if ($aggregate['rating_count'])
{
$__extraData['sidebar'] .= '
					<dl class="averageRating"><dt>' . 'Average Rating' . ':</dt>
					<dd>';
$__compilerVar19 = '';
$__compilerVar19 .= htmlspecialchars($ratingAvg, ENT_QUOTES, 'UTF-8');
$__compilerVar20 = '';
$this->addRequiredExternal('css', 'rating');
$__compilerVar20 .= '

';
if ($action)
{
$__compilerVar20 .= '
	';
$this->addRequiredExternal('js', 'js/xenforo/rating.js');
$__compilerVar20 .= '

	<form action="' . htmlspecialchars($action, ENT_QUOTES, 'UTF-8') . '" method="post" class="rating RatingWidget" ' . (($microdata) ? ('itemscope="itemscope" itemtype="http://data-vocabulary.org/Rating"') : ('')) . '>
		<dl>
			<dt class="prompt muted">' . $prompt . '</dt>
			<dd>
				<span class="ratings">
					 <button type="submit" name="rating" value="1" class="star ' . (($__compilerVar19 >= 1) ? ('Full') : ('')) . (($__compilerVar19 >= 0.5 AND $__compilerVar19 < 1) ? ('Half') : ('')) . '" title="' . 'Terrible' . '">1</button
					><button type="submit" name="rating" value="2" class="star ' . (($__compilerVar19 >= 2) ? ('Full') : ('')) . (($__compilerVar19 >= 1.5 AND $__compilerVar19 < 2) ? ('Half') : ('')) . '" title="' . 'Poor' . '">2</button
					><button type="submit" name="rating" value="3" class="star ' . (($__compilerVar19 >= 3) ? ('Full') : ('')) . (($__compilerVar19 >= 2.5 AND $__compilerVar19 < 3) ? ('Half') : ('')) . '" title="' . 'Average' . '">3</button
					><button type="submit" name="rating" value="4" class="star ' . (($__compilerVar19 >= 4) ? ('Full') : ('')) . (($__compilerVar19 >= 3.5 AND $__compilerVar19 < 4) ? ('Half') : ('')) . '" title="' . 'Good' . '">4</button
					><button type="submit" name="rating" value="5" class="star ' . (($__compilerVar19 >= 5) ? ('Full') : ('')) . (($__compilerVar19 >= 4.5 AND $__compilerVar19 < 5) ? ('Half') : ('')) . '" title="' . 'Excellent' . '">5</button>
				</span>
			
				<span class="RatingValue"><span class="Number" itemprop="average">' . htmlspecialchars($__compilerVar19, ENT_QUOTES, 'UTF-8') . '</span>/<span itemprop="best">5</span>,</span>
				';
if ($threadrating['whoRated'] AND $controllerName == ('XenForo_ControllerPublic_Thread') AND $thread['thread_rate_count'] > 0)
{
$__compilerVar20 .= '
					<a href="' . XenForo_Template_Helper_Core::link('threads/whoRated', $thread, array()) . '" title="' . 'Who has rated this thread?' . '" class="OverlayTrigger"><span class="Hint">' . $hint . '</span></a>
				';
}
else
{
$__compilerVar20 .= '
				<span class="Hint">' . $hint . '</span>
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
			<dt class="prompt muted">' . $prompt . '</dt>
			<dd>		
				<span class="ratings" title="' . XenForo_Template_Helper_Core::numberFormat($__compilerVar19, '2') . '">
					 <span class="star ' . (($__compilerVar19 >= 1) ? ('Full') : ('')) . (($__compilerVar19 >= 0.5 AND $__compilerVar19 < 1) ? ('Half') : ('')) . '"></span
					><span class="star ' . (($__compilerVar19 >= 2) ? ('Full') : ('')) . (($__compilerVar19 >= 1.5 AND $__compilerVar19 < 2) ? ('Half') : ('')) . '"></span
					><span class="star ' . (($__compilerVar19 >= 3) ? ('Full') : ('')) . (($__compilerVar19 >= 2.5 AND $__compilerVar19 < 3) ? ('Half') : ('')) . '"></span
					><span class="star ' . (($__compilerVar19 >= 4) ? ('Full') : ('')) . (($__compilerVar19 >= 3.5 AND $__compilerVar19 < 4) ? ('Half') : ('')) . '"></span
					><span class="star ' . (($__compilerVar19 >= 5) ? ('Full') : ('')) . (($__compilerVar19 >= 4.5 AND $__compilerVar19 < 5) ? ('Half') : ('')) . '"></span>
				</span>
				
				<span class="RatingValue"><span class="Number" itemprop="average">' . htmlspecialchars($__compilerVar19, ENT_QUOTES, 'UTF-8') . '</span>/<span itemprop="best">5</span>,</span>
				';
if ($threadrating['whoRated'] AND $controllerName == ('XenForo_ControllerPublic_Thread') AND $thread['thread_rate_count'] > 0)
{
$__compilerVar20 .= '
					<a href="' . XenForo_Template_Helper_Core::link('threads/whoRated', $thread, array()) . '" title="' . 'Who has rated this thread?' . '" class="OverlayTrigger"><span class="Hint">' . $hint . '</span></a>
				';
}
else
{
$__compilerVar20 .= '
				<span class="Hint">' . $hint . '</span>
				';
}
$__compilerVar20 .= '
			</dd>
		</dl>	
	</div>

';
}
$__extraData['sidebar'] .= $__compilerVar20;
unset($__compilerVar19, $__compilerVar20);
$__extraData['sidebar'] .= '
					</dd></dl>
				';
}
$__extraData['sidebar'] .= '
				<dl class="resourceCount"><dt>' . 'Last Update' . ':</dt>
					<dd>' . XenForo_Template_Helper_Core::callHelper('datetimehtml', array($aggregate['last_update'],array(
'time' => htmlspecialchars($aggregate['last_update'], ENT_QUOTES, 'UTF-8')
))) . '</dd></dl>
			</div>
		</div>
	</div>

	';
$__compilerVar21 = '';
$__compilerVar21 .= XenForo_Template_Helper_Core::link('canonical:resources/authors', $user, array());
$__compilerVar22 = '';
$__compilerVar23 = '';
$__compilerVar23 .= '
				';
$__compilerVar24 = '';
$__compilerVar24 .= '
				';
if ($xenOptions['tweet']['enabled'])
{
$__compilerVar24 .= '
					<div class="tweet shareControl">
						<a href="https://twitter.com/share" class="twitter-share-button" data-count="horizontal"
							data-lang="' . XenForo_Template_Helper_Core::callHelper('twitterLang', array(
'0' => $visitorLanguage['language_code']
)) . '"
							data-url="' . htmlspecialchars($__compilerVar21, ENT_QUOTES, 'UTF-8') . '"
							' . (($xenOptions['tweet']['via']) ? ('data-via="' . htmlspecialchars($xenOptions['tweet']['via'], ENT_QUOTES, 'UTF-8') . '"') : ('')) . '
							' . (($xenOptions['tweet']['related']) ? ('data-related="' . htmlspecialchars($xenOptions['tweet']['related'], ENT_QUOTES, 'UTF-8') . '"') : ('')) . '>' . 'Tweet' . '</a>
					</div>
				';
}
$__compilerVar24 .= '		
				';
if ($xenOptions['facebookLike'])
{
$__compilerVar24 .= '
					<div class="facebookLike shareControl">
						';
$__extraData['facebookSdk'] = '';
$__extraData['facebookSdk'] .= '1';
$__compilerVar24 .= '
						<div class="fb-like-box" data-href="https://www.facebook.com/pages/H%E1%BB%99i-nh%E1%BB%AFng-ng%C6%B0%E1%BB%9Di-kh%C3%B4ng-th%E1%BB%83-s%E1%BB%91ng-thi%E1%BA%BFu-Mobile/1437174653239569?ref=bookmarks" data-width="235" data-colorscheme="light" data-show-faces="true" data-header="false" data-stream="false" data-show-border="false"></div>
					</div>
				';
}
$__compilerVar24 .= '
				';
if ($xenOptions['plusone'])
{
$__compilerVar24 .= '
					<div class="plusone shareControl">
						<div class="g-plusone" data-size="medium" data-count="true" data-href="' . htmlspecialchars($__compilerVar21, ENT_QUOTES, 'UTF-8') . '"></div>
					</div>
				';
}
$__compilerVar24 .= '	
				';
$__compilerVar23 .= $this->callTemplateHook('sidebar_share_page_options', $__compilerVar24, array());
unset($__compilerVar24);
$__compilerVar23 .= '		
			';
if (trim($__compilerVar23) !== '')
{
$__compilerVar22 .= '	
	';
$this->addRequiredExternal('css', 'sidebar_share_page');
$__compilerVar22 .= '
	<div class="section infoBlock sharePage">
		<div class="secondaryContent">
			<h3>' . 'Share This Page' . '</h3>
			' . $__compilerVar23 . '
		</div>
	</div>
';
}
unset($__compilerVar23);
$__extraData['sidebar'] .= $__compilerVar22;
unset($__compilerVar21, $__compilerVar22);
$__extraData['sidebar'] .= '

';
