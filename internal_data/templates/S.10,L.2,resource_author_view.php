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
$__compilerVar25 = '';
$__compilerVar25 .= XenForo_Template_Helper_Core::link('canonical:resources/authors', $user, array());
$__compilerVar26 = '';
$__compilerVar26 .= 'Resources from ' . htmlspecialchars($user['username'], ENT_QUOTES, 'UTF-8') . '';
$__compilerVar27 = '';
if ($xenOptions['facebookAppId'] OR $xenOptions['facebookAdmins'])
{
$__compilerVar27 .= '
	<meta property="og:site_name" content="' . htmlspecialchars($xenOptions['boardTitle'], ENT_QUOTES, 'UTF-8') . '" />
	';
if ($avatar)
{
$__compilerVar27 .= '<meta property="og:image" content="' . htmlspecialchars($avatar, ENT_QUOTES, 'UTF-8') . '" />';
}
$__compilerVar27 .= '
	<meta property="og:image" content="';
$__compilerVar28 = '';
$__compilerVar28 .= XenForo_Template_Helper_Core::callHelper('fullurl', array(
'0' => XenForo_Template_Helper_Core::styleProperty('ogLogoPath'),
'1' => '1'
));
$__compilerVar27 .= $this->callTemplateCallback('OpenGraphImage_Callback', 'getImage', $__compilerVar28, array());
unset($__compilerVar28);
$__compilerVar27 .= '" />
	<meta property="og:type" content="' . (($ogType) ? (htmlspecialchars($ogType, ENT_QUOTES, 'UTF-8')) : ('article')) . '" />
	<meta property="og:url" content="' . $__compilerVar25 . '" />
	<meta property="og:title" content="' . $__compilerVar26 . '" />
	';
if ($description)
{
$__compilerVar27 .= '<meta property="og:description" content="' . $description . '" />';
}
$__compilerVar27 .= '
	' . $ogExtraHtml . '
	';
if ($xenOptions['facebookAppId'])
{
$__compilerVar27 .= '<meta property="fb:app_id" content="' . htmlspecialchars($xenOptions['facebookAppId'], ENT_QUOTES, 'UTF-8') . '" />';
}
$__compilerVar27 .= '
	';
if ($xenOptions['facebookAdmins'])
{
$__compilerVar27 .= '<meta property="fb:admins" content="' . XenForo_Template_Helper_Core::callHelper('implode', array(
'0' => $xenOptions['facebookAdmins'],
'1' => ','
)) . '" />';
}
$__compilerVar27 .= '
';
}
$__extraData['head']['openGraph'] .= $__compilerVar27;
unset($__compilerVar25, $__compilerVar26, $__compilerVar27);
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
$__compilerVar29 = '';
$__compilerVar29 .= '1';
$__compilerVar30 = '';
$__compilerVar30 .= '1';
$__compilerVar31 = '';
$__compilerVar31 .= htmlspecialchars($fromProfile, ENT_QUOTES, 'UTF-8');
$__compilerVar32 = '';
$__compilerVar32 .= '<li class="resourceListItem ' . htmlspecialchars($resource['resource_state'], ENT_QUOTES, 'UTF-8') . (($resource['isIgnored'] AND !$__compilerVar30) ? (' ignored') : ('')) . ' ' . (($resource['feature_date']) ? ('featured') : ('')) . '" id="resource-' . htmlspecialchars($resource['resource_id'], ENT_QUOTES, 'UTF-8') . '">
	<div class="listBlock resourceImage">
		<div class="listBlockInner">
			';
if ($xenOptions['resourceAllowIcons'])
{
$__compilerVar32 .= '
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
$__compilerVar32 .= '
				' . XenForo_Template_Helper_Core::callHelper('avatarhtml', array($resource,(true),array(
'user' => '$resource',
'size' => 's',
'img' => 'true'
),'')) . '
			';
}
$__compilerVar32 .= '
		</div>
	</div>
	<div class="listBlock main">
		<div class="listBlockInner">
			';
$__compilerVar33 = '';
$__compilerVar33 .= '
					';
if ($resource['resource_state'] == ('moderated'))
{
$__compilerVar33 .= '<span class="moderated" title="' . 'Cần kiểm duyệt' . '">' . 'Cần kiểm duyệt' . '</span>';
}
$__compilerVar33 .= '
					';
if ($resource['resource_state'] == ('deleted'))
{
$__compilerVar33 .= '<span class="deleted" title="' . 'Bị xóa' . '">' . 'Bị xóa' . '</span>';
}
$__compilerVar33 .= '
				';
if (trim($__compilerVar33) !== '')
{
$__compilerVar32 .= '
				<div class="iconKey">
				' . $__compilerVar33 . '
				</div>
			';
}
unset($__compilerVar33);
$__compilerVar32 .= '
			';
if ($listItemExtraHtml)
{
$__compilerVar32 .= '<span class="extra muted">' . $listItemExtraHtml . '</span>';
}
$__compilerVar32 .= '
			';
if ($resource['cost'])
{
$__compilerVar32 .= '<span class="cost">' . htmlspecialchars($resource['cost'], ENT_QUOTES, 'UTF-8') . '</span>';
}
$__compilerVar32 .= '
			';
if ($resource['feature_date'])
{
$__compilerVar32 .= '<span class="featuredBanner">' . 'Featured' . '</span>';
}
$__compilerVar32 .= '
			<h3 class="title">
				';
if ($resource['canInlineMod'] AND !$__compilerVar31 AND !$showCheckbox)
{
$__compilerVar32 .= '<input type="checkbox" name="resources[]" value="' . htmlspecialchars($resource['resource_id'], ENT_QUOTES, 'UTF-8') . '" class="InlineModCheck" id="inlineModCheck-resource-' . htmlspecialchars($resource['resource_id'], ENT_QUOTES, 'UTF-8') . '" data-target="#resource-' . htmlspecialchars($resource['resource_id'], ENT_QUOTES, 'UTF-8') . '" title="' . 'Select resource' . ': \'' . htmlspecialchars($resource['title'], ENT_QUOTES, 'UTF-8') . '\'" />';
}
$__compilerVar32 .= '
				';
if ($showCheckbox)
{
$__compilerVar32 .= '<input type="checkbox" name="resource_ids[]" value="' . htmlspecialchars($resource['resource_id'], ENT_QUOTES, 'UTF-8') . '" /> ';
}
if ($resource['prefix_id'] AND $linkPrefixHtml)
{
$__compilerVar32 .= '<a href="' . $linkPrefixHtml . '" class="prefixLink" title="' . 'Show only resources prefixed by \'' . XenForo_Template_Helper_Core::callHelper('resourcePrefix', array(
'0' => $resource,
'1' => 'escaped',
'2' => ''
)) . '\'.' . '">' . XenForo_Template_Helper_Core::callHelper('resourcePrefix', array(
'0' => $resource
)) . '</a>';
}
else
{
$__compilerVar32 .= XenForo_Template_Helper_Core::callHelper('resourcePrefix', array(
'0' => $resource
));
}
$__compilerVar32 .= '<a
				href="' . XenForo_Template_Helper_Core::link('resources', $resource, array()) . '">' . htmlspecialchars($resource['title'], ENT_QUOTES, 'UTF-8') . '</a>
				';
if (!$resource['isFilelessNoExternal'])
{
$__compilerVar32 .= '<span class="version">' . htmlspecialchars($resource['version_string'], ENT_QUOTES, 'UTF-8') . '</span>';
}
$__compilerVar32 .= '
			</h3>
			<div class="resourceDetails muted">' . XenForo_Template_Helper_Core::callHelper('usernamehtml', array($resource,'',false,array())) . ',
				<a href="' . XenForo_Template_Helper_Core::link('resources', $resource, array()) . '" class="faint">' . XenForo_Template_Helper_Core::callHelper('datetimehtml', array($resource['resource_date'],array(
'time' => htmlspecialchars($resource['resource_date'], ENT_QUOTES, 'UTF-8')
))) . '</a>';
if ($__compilerVar29)
{
$__compilerVar32 .= ', <a href="' . XenForo_Template_Helper_Core::link('resources/categories', $resource, array()) . '">' . htmlspecialchars($resource['category_title'], ENT_QUOTES, 'UTF-8') . '</a>';
}
$__compilerVar32 .= '
			</div>
			<div class="tagLine">
				';
if ($resource['resource_state'] == ('deleted'))
{
$__compilerVar32 .= '
					<span class="deletionNote">' . 'This resource has been deleted.' . '
						';
if ($resource['delete_user_id'])
{
$__compilerVar32 .= '
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
$__compilerVar32 .= ', ' . 'Lý do' . ': ' . htmlspecialchars($resource['delete_reason'], ENT_QUOTES, 'UTF-8');
}
$__compilerVar32 .= '.
						';
}
$__compilerVar32 .= '
					</span>
				';
}
else
{
$__compilerVar32 .= '
					' . htmlspecialchars($resource['tag_line'], ENT_QUOTES, 'UTF-8') . '
				';
}
$__compilerVar32 .= '
			</div>
		</div>
	</div>
	<div class="listBlock resourceStats">
		<div class="listBlockInner">
			';
$__compilerVar34 = '';
$__compilerVar34 .= htmlspecialchars($resource['rating_avg'], ENT_QUOTES, 'UTF-8');
$__compilerVar35 = '';
$__compilerVar35 .= (($resource['rating_count'] == 1) ? ('1 phiếu') : ('' . htmlspecialchars($resource['rating_count'], ENT_QUOTES, 'UTF-8') . ' phiếu'));
$__compilerVar36 = '';
$this->addRequiredExternal('css', 'rating');
$__compilerVar36 .= '

';
if ($action)
{
$__compilerVar36 .= '
	';
$this->addRequiredExternal('js', 'js/xenforo/rating.js');
$__compilerVar36 .= '

	<form action="' . htmlspecialchars($action, ENT_QUOTES, 'UTF-8') . '" method="post" class="rating RatingWidget" ' . (($microdata) ? ('itemscope="itemscope" itemtype="http://data-vocabulary.org/Rating"') : ('')) . '>
		<dl>
			<dt class="prompt muted">' . $prompt . '</dt>
			<dd>
				<span class="ratings">
					 <button type="submit" name="rating" value="1" class="star ' . (($__compilerVar34 >= 1) ? ('Full') : ('')) . (($__compilerVar34 >= 0.5 AND $__compilerVar34 < 1) ? ('Half') : ('')) . '" title="' . 'Terrible' . '">1</button
					><button type="submit" name="rating" value="2" class="star ' . (($__compilerVar34 >= 2) ? ('Full') : ('')) . (($__compilerVar34 >= 1.5 AND $__compilerVar34 < 2) ? ('Half') : ('')) . '" title="' . 'Poor' . '">2</button
					><button type="submit" name="rating" value="3" class="star ' . (($__compilerVar34 >= 3) ? ('Full') : ('')) . (($__compilerVar34 >= 2.5 AND $__compilerVar34 < 3) ? ('Half') : ('')) . '" title="' . 'Average' . '">3</button
					><button type="submit" name="rating" value="4" class="star ' . (($__compilerVar34 >= 4) ? ('Full') : ('')) . (($__compilerVar34 >= 3.5 AND $__compilerVar34 < 4) ? ('Half') : ('')) . '" title="' . 'Good' . '">4</button
					><button type="submit" name="rating" value="5" class="star ' . (($__compilerVar34 >= 5) ? ('Full') : ('')) . (($__compilerVar34 >= 4.5 AND $__compilerVar34 < 5) ? ('Half') : ('')) . '" title="' . 'Excellent' . '">5</button>
				</span>
			
				<span class="RatingValue"><span class="Number" itemprop="average">' . htmlspecialchars($__compilerVar34, ENT_QUOTES, 'UTF-8') . '</span>/<span itemprop="best">5</span>,</span>
				';
if ($threadrating['whoRated'] AND $controllerName == ('XenForo_ControllerPublic_Thread') AND $thread['thread_rate_count'] > 0)
{
$__compilerVar36 .= '
					<a href="' . XenForo_Template_Helper_Core::link('threads/whoRated', $thread, array()) . '" title="' . 'Who has rated this thread?' . '" class="OverlayTrigger"><span class="Hint">' . $__compilerVar35 . '</span></a>
				';
}
else
{
$__compilerVar36 .= '
				<span class="Hint">' . $__compilerVar35 . '</span>
				';
}
$__compilerVar36 .= '
			</dd>
		</dl>
		
		<input type="hidden" name="_xfToken" value="' . htmlspecialchars($visitor['csrf_token_page'], ENT_QUOTES, 'UTF-8') . '" />
	</form>
	
';
}
else
{
$__compilerVar36 .= '
	
	<div class="rating ';
if ($xenOptions['threadrating_greyedout'])
{
$__compilerVar36 .= 'tr_greyedout';
}
$__compilerVar36 .= '">
		<dl>
			<dt class="prompt muted">' . $prompt . '</dt>
			<dd>		
				<span class="ratings" title="' . XenForo_Template_Helper_Core::numberFormat($__compilerVar34, '2') . '">
					 <span class="star ' . (($__compilerVar34 >= 1) ? ('Full') : ('')) . (($__compilerVar34 >= 0.5 AND $__compilerVar34 < 1) ? ('Half') : ('')) . '"></span
					><span class="star ' . (($__compilerVar34 >= 2) ? ('Full') : ('')) . (($__compilerVar34 >= 1.5 AND $__compilerVar34 < 2) ? ('Half') : ('')) . '"></span
					><span class="star ' . (($__compilerVar34 >= 3) ? ('Full') : ('')) . (($__compilerVar34 >= 2.5 AND $__compilerVar34 < 3) ? ('Half') : ('')) . '"></span
					><span class="star ' . (($__compilerVar34 >= 4) ? ('Full') : ('')) . (($__compilerVar34 >= 3.5 AND $__compilerVar34 < 4) ? ('Half') : ('')) . '"></span
					><span class="star ' . (($__compilerVar34 >= 5) ? ('Full') : ('')) . (($__compilerVar34 >= 4.5 AND $__compilerVar34 < 5) ? ('Half') : ('')) . '"></span>
				</span>
				
				<span class="RatingValue"><span class="Number" itemprop="average">' . htmlspecialchars($__compilerVar34, ENT_QUOTES, 'UTF-8') . '</span>/<span itemprop="best">5</span>,</span>
				';
if ($threadrating['whoRated'] AND $controllerName == ('XenForo_ControllerPublic_Thread') AND $thread['thread_rate_count'] > 0)
{
$__compilerVar36 .= '
					<a href="' . XenForo_Template_Helper_Core::link('threads/whoRated', $thread, array()) . '" title="' . 'Who has rated this thread?' . '" class="OverlayTrigger"><span class="Hint">' . $__compilerVar35 . '</span></a>
				';
}
else
{
$__compilerVar36 .= '
				<span class="Hint">' . $__compilerVar35 . '</span>
				';
}
$__compilerVar36 .= '
			</dd>
		</dl>	
	</div>

';
}
$__compilerVar32 .= $__compilerVar36;
unset($__compilerVar34, $__compilerVar35, $__compilerVar36);
$__compilerVar32 .= '
			<div class="pairsJustified">
				';
if (!$resource['is_fileless'])
{
$__compilerVar32 .= '<dl class="resourceDownloads"><dt>' . 'Downloads' . ':</dt> <dd>' . XenForo_Template_Helper_Core::numberFormat($resource['download_count'], '0') . '</dd></dl>';
}
$__compilerVar32 .= '
				<dl class="resourceUpdated"><dt>' . 'Updated' . ':</dt> <dd><a href="' . XenForo_Template_Helper_Core::link('resources/updates', $resource, array()) . '" class="concealed">' . XenForo_Template_Helper_Core::callHelper('datetimehtml', array($resource['last_update'],array(
'time' => htmlspecialchars($resource['last_update'], ENT_QUOTES, 'UTF-8')
))) . '</a></dd></dl>
			</div>
		</div>
	</div>
</li>

';
$this->addRequiredExternal('css', 'resource_list');
$__output .= $__compilerVar32;
unset($__compilerVar29, $__compilerVar30, $__compilerVar31, $__compilerVar32);
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
$__compilerVar37 = '';
$__compilerVar38 = '';
$__compilerVar38 .= 'Resource moderation';
$__compilerVar39 = '';
$__compilerVar39 .= '
		';
if ($inlineModOptions['delete'])
{
$__compilerVar39 .= '<option value="delete">' . 'Delete resources' . '...</option>';
}
$__compilerVar39 .= '
		';
if ($inlineModOptions['undelete'])
{
$__compilerVar39 .= '<option value="undelete">' . 'Undelete resources' . '</option>';
}
$__compilerVar39 .= '
		';
if ($inlineModOptions['approve'])
{
$__compilerVar39 .= '<option value="approve">' . 'Approve resources' . '</option>';
}
$__compilerVar39 .= '
		';
if ($inlineModOptions['unapprove'])
{
$__compilerVar39 .= '<option value="unapprove">' . 'Unapprove resources' . '</option>';
}
$__compilerVar39 .= '
		';
if ($inlineModOptions['feature'])
{
$__compilerVar39 .= '<option value="feature">' . 'Feature Resources' . '</option>';
}
$__compilerVar39 .= '
		';
if ($inlineModOptions['unfeature'])
{
$__compilerVar39 .= '<option value="unfeature">' . 'Unfeature Resources' . '</option>';
}
$__compilerVar39 .= '
		';
if ($inlineModOptions['reassign'])
{
$__compilerVar39 .= '<option value="reassign">' . 'Reassign resources' . '...</option>';
}
$__compilerVar39 .= '
		';
if ($inlineModOptions['move'])
{
$__compilerVar39 .= '<option value="move">' . 'Move Resources' . '...</option>';
}
$__compilerVar39 .= '
		<option value="deselect">' . 'Deselect resources' . '</option>
	';
$__compilerVar40 = '';
$__compilerVar40 .= 'Select / deselect all resources on this page';
$__compilerVar41 = '';
$__compilerVar41 .= 'Selected Resources';
$__compilerVar42 = '';
$this->addRequiredExternal('css', 'inline_mod');
$__compilerVar42 .= '
';
$this->addRequiredExternal('js', 'js/xenforo/inline_mod.js');
$__compilerVar42 .= '

<span id="InlineModControls">
	<span class="selectionControl secondaryContent">
		<label for="ModerationCheck">
			' . 'Chọn tất cả' . ' <input type="checkbox" id="ModerationCheck" title="' . htmlspecialchars($__compilerVar40, ENT_QUOTES, 'UTF-8') . '" />
		</label>

		<input type="button" class="button ClickNext" value="&darr;" title="' . 'Chuyển xuống' . '" />
		<input type="button" class="button ClickPrev" value="&uarr;" title="' . 'Chuyển lên trên' . '" />
		<a class="SelectionCount">' . htmlspecialchars($__compilerVar41, ENT_QUOTES, 'UTF-8') . ': <em class="InlineModCheckedTotal">0</em></a>
	</span>

	<span class="actionControl sectionFooter">
		<span class="commonActions">
			';
if ($inlineModOptions['delete'])
{
$__compilerVar42 .= '<input type="submit" class="button" value="' . 'Xóa' . '..." name="delete" />';
}
$__compilerVar42 .= '
			';
if ($inlineModOptions['approve'])
{
$__compilerVar42 .= '<input type="submit" class="button" value="' . 'Duyệt bài' . '" name="approve" />';
}
$__compilerVar42 .= '
		</span>

		<span class="otherActions">
			<select name="a" id="ModerationSelect" class="textCtrl">
				<option value="">' . 'Hành động khác' . '...</option>
				<optgroup label="' . 'Hành động Quản lý' . '">
					' . $__compilerVar39 . '
				</optgroup>
				<option value="closeOverlay">' . 'Đóng lớp phủ này' . '</option>
			</select>

			<input type="submit" class="button primary" value="' . 'Tới' . '" />
			<input type="reset" class="button OverlayCloser overylayOnly" value="X" title="' . 'Cancel and close these controls' . '" />
		</span>
	</span>
</span>';
$__compilerVar37 .= $__compilerVar42;
unset($__compilerVar38, $__compilerVar39, $__compilerVar40, $__compilerVar41, $__compilerVar42);
$__output .= $__compilerVar37;
unset($__compilerVar37);
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
				<dl class="authorName"><dt>' . 'Tác giả' . ':</dt>
					<dd>' . XenForo_Template_Helper_Core::callHelper('usernamehtml', array($user,'',false,array())) . '</dd></dl>
				<dl class="resourceCount"><dt>' . 'Tài nguyên' . ':</dt>
					<dd>' . XenForo_Template_Helper_Core::numberFormat($aggregate['total_resources'], '0') . '</dd></dl>
				';
if ($aggregate['rating_count'])
{
$__extraData['sidebar'] .= '
					<dl class="averageRating"><dt>' . 'Average Rating' . ':</dt>
					<dd>';
$__compilerVar43 = '';
$__compilerVar43 .= htmlspecialchars($ratingAvg, ENT_QUOTES, 'UTF-8');
$__compilerVar44 = '';
$this->addRequiredExternal('css', 'rating');
$__compilerVar44 .= '

';
if ($action)
{
$__compilerVar44 .= '
	';
$this->addRequiredExternal('js', 'js/xenforo/rating.js');
$__compilerVar44 .= '

	<form action="' . htmlspecialchars($action, ENT_QUOTES, 'UTF-8') . '" method="post" class="rating RatingWidget" ' . (($microdata) ? ('itemscope="itemscope" itemtype="http://data-vocabulary.org/Rating"') : ('')) . '>
		<dl>
			<dt class="prompt muted">' . $prompt . '</dt>
			<dd>
				<span class="ratings">
					 <button type="submit" name="rating" value="1" class="star ' . (($__compilerVar43 >= 1) ? ('Full') : ('')) . (($__compilerVar43 >= 0.5 AND $__compilerVar43 < 1) ? ('Half') : ('')) . '" title="' . 'Terrible' . '">1</button
					><button type="submit" name="rating" value="2" class="star ' . (($__compilerVar43 >= 2) ? ('Full') : ('')) . (($__compilerVar43 >= 1.5 AND $__compilerVar43 < 2) ? ('Half') : ('')) . '" title="' . 'Poor' . '">2</button
					><button type="submit" name="rating" value="3" class="star ' . (($__compilerVar43 >= 3) ? ('Full') : ('')) . (($__compilerVar43 >= 2.5 AND $__compilerVar43 < 3) ? ('Half') : ('')) . '" title="' . 'Average' . '">3</button
					><button type="submit" name="rating" value="4" class="star ' . (($__compilerVar43 >= 4) ? ('Full') : ('')) . (($__compilerVar43 >= 3.5 AND $__compilerVar43 < 4) ? ('Half') : ('')) . '" title="' . 'Good' . '">4</button
					><button type="submit" name="rating" value="5" class="star ' . (($__compilerVar43 >= 5) ? ('Full') : ('')) . (($__compilerVar43 >= 4.5 AND $__compilerVar43 < 5) ? ('Half') : ('')) . '" title="' . 'Excellent' . '">5</button>
				</span>
			
				<span class="RatingValue"><span class="Number" itemprop="average">' . htmlspecialchars($__compilerVar43, ENT_QUOTES, 'UTF-8') . '</span>/<span itemprop="best">5</span>,</span>
				';
if ($threadrating['whoRated'] AND $controllerName == ('XenForo_ControllerPublic_Thread') AND $thread['thread_rate_count'] > 0)
{
$__compilerVar44 .= '
					<a href="' . XenForo_Template_Helper_Core::link('threads/whoRated', $thread, array()) . '" title="' . 'Who has rated this thread?' . '" class="OverlayTrigger"><span class="Hint">' . $hint . '</span></a>
				';
}
else
{
$__compilerVar44 .= '
				<span class="Hint">' . $hint . '</span>
				';
}
$__compilerVar44 .= '
			</dd>
		</dl>
		
		<input type="hidden" name="_xfToken" value="' . htmlspecialchars($visitor['csrf_token_page'], ENT_QUOTES, 'UTF-8') . '" />
	</form>
	
';
}
else
{
$__compilerVar44 .= '
	
	<div class="rating ';
if ($xenOptions['threadrating_greyedout'])
{
$__compilerVar44 .= 'tr_greyedout';
}
$__compilerVar44 .= '">
		<dl>
			<dt class="prompt muted">' . $prompt . '</dt>
			<dd>		
				<span class="ratings" title="' . XenForo_Template_Helper_Core::numberFormat($__compilerVar43, '2') . '">
					 <span class="star ' . (($__compilerVar43 >= 1) ? ('Full') : ('')) . (($__compilerVar43 >= 0.5 AND $__compilerVar43 < 1) ? ('Half') : ('')) . '"></span
					><span class="star ' . (($__compilerVar43 >= 2) ? ('Full') : ('')) . (($__compilerVar43 >= 1.5 AND $__compilerVar43 < 2) ? ('Half') : ('')) . '"></span
					><span class="star ' . (($__compilerVar43 >= 3) ? ('Full') : ('')) . (($__compilerVar43 >= 2.5 AND $__compilerVar43 < 3) ? ('Half') : ('')) . '"></span
					><span class="star ' . (($__compilerVar43 >= 4) ? ('Full') : ('')) . (($__compilerVar43 >= 3.5 AND $__compilerVar43 < 4) ? ('Half') : ('')) . '"></span
					><span class="star ' . (($__compilerVar43 >= 5) ? ('Full') : ('')) . (($__compilerVar43 >= 4.5 AND $__compilerVar43 < 5) ? ('Half') : ('')) . '"></span>
				</span>
				
				<span class="RatingValue"><span class="Number" itemprop="average">' . htmlspecialchars($__compilerVar43, ENT_QUOTES, 'UTF-8') . '</span>/<span itemprop="best">5</span>,</span>
				';
if ($threadrating['whoRated'] AND $controllerName == ('XenForo_ControllerPublic_Thread') AND $thread['thread_rate_count'] > 0)
{
$__compilerVar44 .= '
					<a href="' . XenForo_Template_Helper_Core::link('threads/whoRated', $thread, array()) . '" title="' . 'Who has rated this thread?' . '" class="OverlayTrigger"><span class="Hint">' . $hint . '</span></a>
				';
}
else
{
$__compilerVar44 .= '
				<span class="Hint">' . $hint . '</span>
				';
}
$__compilerVar44 .= '
			</dd>
		</dl>	
	</div>

';
}
$__extraData['sidebar'] .= $__compilerVar44;
unset($__compilerVar43, $__compilerVar44);
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
$__compilerVar45 = '';
$__compilerVar45 .= XenForo_Template_Helper_Core::link('canonical:resources/authors', $user, array());
$__compilerVar46 = '';
$__compilerVar47 = '';
$__compilerVar47 .= '
				';
$__compilerVar48 = '';
$__compilerVar48 .= '
				';
if ($xenOptions['tweet']['enabled'])
{
$__compilerVar48 .= '
					<div class="tweet shareControl">
						<a href="https://twitter.com/share" class="twitter-share-button" data-count="horizontal"
							data-lang="' . XenForo_Template_Helper_Core::callHelper('twitterLang', array(
'0' => $visitorLanguage['language_code']
)) . '"
							data-url="' . htmlspecialchars($__compilerVar45, ENT_QUOTES, 'UTF-8') . '"
							' . (($xenOptions['tweet']['via']) ? ('data-via="' . htmlspecialchars($xenOptions['tweet']['via'], ENT_QUOTES, 'UTF-8') . '"') : ('')) . '
							' . (($xenOptions['tweet']['related']) ? ('data-related="' . htmlspecialchars($xenOptions['tweet']['related'], ENT_QUOTES, 'UTF-8') . '"') : ('')) . '>' . 'Tweet' . '</a>
					</div>
				';
}
$__compilerVar48 .= '		
				';
if ($xenOptions['facebookLike'])
{
$__compilerVar48 .= '
					<div class="facebookLike shareControl">
						';
$__extraData['facebookSdk'] = '';
$__extraData['facebookSdk'] .= '1';
$__compilerVar48 .= '
						<div class="fb-like-box" data-href="https://www.facebook.com/pages/H%E1%BB%99i-nh%E1%BB%AFng-ng%C6%B0%E1%BB%9Di-kh%C3%B4ng-th%E1%BB%83-s%E1%BB%91ng-thi%E1%BA%BFu-Mobile/1437174653239569?ref=bookmarks" data-width="235" data-colorscheme="light" data-show-faces="true" data-header="false" data-stream="false" data-show-border="false"></div>
					</div>
				';
}
$__compilerVar48 .= '
				';
if ($xenOptions['plusone'])
{
$__compilerVar48 .= '
					<div class="plusone shareControl">
						<div class="g-plusone" data-size="medium" data-count="true" data-href="' . htmlspecialchars($__compilerVar45, ENT_QUOTES, 'UTF-8') . '"></div>
					</div>
				';
}
$__compilerVar48 .= '	
				';
$__compilerVar47 .= $this->callTemplateHook('sidebar_share_page_options', $__compilerVar48, array());
unset($__compilerVar48);
$__compilerVar47 .= '		
			';
if (trim($__compilerVar47) !== '')
{
$__compilerVar46 .= '	
	';
$this->addRequiredExternal('css', 'sidebar_share_page');
$__compilerVar46 .= '
	<div class="section infoBlock sharePage">
		<div class="secondaryContent">
			<h3>' . 'Chia sẻ trang này' . '</h3>
			' . $__compilerVar47 . '
		</div>
	</div>
';
}
unset($__compilerVar47);
$__extraData['sidebar'] .= $__compilerVar46;
unset($__compilerVar45, $__compilerVar46);
$__extraData['sidebar'] .= '

';
