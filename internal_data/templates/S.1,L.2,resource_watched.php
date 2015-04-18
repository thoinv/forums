<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__extraData['title'] = '';
$__extraData['title'] .= 'Watched Resources';
$__output .= '

';
$this->addRequiredExternal('css', 'resource_list');
$__output .= '

<form action="' . XenForo_Template_Helper_Core::link('resources/watched/update', false, array()) . '" method="post" class="sectionMain">
	';
if ($resources)
{
$__output .= '

		<ol class="resourceList">
		';
foreach ($resources AS $resource)
{
$__output .= '
			';
$__compilerVar9 = '';
$__compilerVar9 .= '1';
$__compilerVar10 = '';
$__compilerVar10 .= '1';
$__compilerVar11 = '';
if ($resource['email_subscribe'])
{
$__compilerVar11 .= 'Email';
}
$__compilerVar12 = '';
$__compilerVar12 .= '<li class="resourceListItem ' . htmlspecialchars($resource['resource_state'], ENT_QUOTES, 'UTF-8') . (($resource['isIgnored'] AND !$showIgnored) ? (' ignored') : ('')) . ' ' . (($resource['feature_date']) ? ('featured') : ('')) . '" id="resource-' . htmlspecialchars($resource['resource_id'], ENT_QUOTES, 'UTF-8') . '">
	<div class="listBlock resourceImage">
		<div class="listBlockInner">
			';
if ($xenOptions['resourceAllowIcons'])
{
$__compilerVar12 .= '
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
$__compilerVar12 .= '
				' . XenForo_Template_Helper_Core::callHelper('avatarhtml', array($resource,(true),array(
'user' => '$resource',
'size' => 's',
'img' => 'true'
),'')) . '
			';
}
$__compilerVar12 .= '
		</div>
	</div>
	<div class="listBlock main">
		<div class="listBlockInner">
			';
$__compilerVar13 = '';
$__compilerVar13 .= '
					';
if ($resource['resource_state'] == ('moderated'))
{
$__compilerVar13 .= '<span class="moderated" title="' . 'Cần kiểm duyệt' . '">' . 'Cần kiểm duyệt' . '</span>';
}
$__compilerVar13 .= '
					';
if ($resource['resource_state'] == ('deleted'))
{
$__compilerVar13 .= '<span class="deleted" title="' . 'Bị xóa' . '">' . 'Bị xóa' . '</span>';
}
$__compilerVar13 .= '
				';
if (trim($__compilerVar13) !== '')
{
$__compilerVar12 .= '
				<div class="iconKey">
				' . $__compilerVar13 . '
				</div>
			';
}
unset($__compilerVar13);
$__compilerVar12 .= '
			';
if ($__compilerVar11)
{
$__compilerVar12 .= '<span class="extra muted">' . $__compilerVar11 . '</span>';
}
$__compilerVar12 .= '
			';
if ($resource['cost'])
{
$__compilerVar12 .= '<span class="cost">' . htmlspecialchars($resource['cost'], ENT_QUOTES, 'UTF-8') . '</span>';
}
$__compilerVar12 .= '
			';
if ($resource['feature_date'])
{
$__compilerVar12 .= '<span class="featuredBanner">' . 'Featured' . '</span>';
}
$__compilerVar12 .= '
			<h3 class="title">
				';
if ($resource['canInlineMod'] AND !$hideInlineMod AND !$__compilerVar9)
{
$__compilerVar12 .= '<input type="checkbox" name="resources[]" value="' . htmlspecialchars($resource['resource_id'], ENT_QUOTES, 'UTF-8') . '" class="InlineModCheck" id="inlineModCheck-resource-' . htmlspecialchars($resource['resource_id'], ENT_QUOTES, 'UTF-8') . '" data-target="#resource-' . htmlspecialchars($resource['resource_id'], ENT_QUOTES, 'UTF-8') . '" title="' . 'Select resource' . ': \'' . htmlspecialchars($resource['title'], ENT_QUOTES, 'UTF-8') . '\'" />';
}
$__compilerVar12 .= '
				';
if ($__compilerVar9)
{
$__compilerVar12 .= '<input type="checkbox" name="resource_ids[]" value="' . htmlspecialchars($resource['resource_id'], ENT_QUOTES, 'UTF-8') . '" /> ';
}
if ($resource['prefix_id'] AND $linkPrefixHtml)
{
$__compilerVar12 .= '<a href="' . $linkPrefixHtml . '" class="prefixLink" title="' . 'Show only resources prefixed by \'' . XenForo_Template_Helper_Core::callHelper('resourcePrefix', array(
'0' => $resource,
'1' => 'escaped',
'2' => ''
)) . '\'.' . '">' . XenForo_Template_Helper_Core::callHelper('resourcePrefix', array(
'0' => $resource
)) . '</a>';
}
else
{
$__compilerVar12 .= XenForo_Template_Helper_Core::callHelper('resourcePrefix', array(
'0' => $resource
));
}
$__compilerVar12 .= '<a
				href="' . XenForo_Template_Helper_Core::link('resources', $resource, array()) . '">' . htmlspecialchars($resource['title'], ENT_QUOTES, 'UTF-8') . '</a>
				';
if (!$resource['isFilelessNoExternal'])
{
$__compilerVar12 .= '<span class="version">' . htmlspecialchars($resource['version_string'], ENT_QUOTES, 'UTF-8') . '</span>';
}
$__compilerVar12 .= '
			</h3>
			<div class="resourceDetails muted">' . XenForo_Template_Helper_Core::callHelper('usernamehtml', array($resource,'',false,array())) . ',
				<a href="' . XenForo_Template_Helper_Core::link('resources', $resource, array()) . '" class="faint">' . XenForo_Template_Helper_Core::callHelper('datetimehtml', array($resource['resource_date'],array(
'time' => htmlspecialchars($resource['resource_date'], ENT_QUOTES, 'UTF-8')
))) . '</a>';
if ($__compilerVar10)
{
$__compilerVar12 .= ', <a href="' . XenForo_Template_Helper_Core::link('resources/categories', $resource, array()) . '">' . htmlspecialchars($resource['category_title'], ENT_QUOTES, 'UTF-8') . '</a>';
}
$__compilerVar12 .= '
			</div>
			<div class="tagLine">
				';
if ($resource['resource_state'] == ('deleted'))
{
$__compilerVar12 .= '
					<span class="deletionNote">' . 'This resource has been deleted.' . '
						';
if ($resource['delete_user_id'])
{
$__compilerVar12 .= '
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
$__compilerVar12 .= ', ' . 'Lý do' . ': ' . htmlspecialchars($resource['delete_reason'], ENT_QUOTES, 'UTF-8');
}
$__compilerVar12 .= '.
						';
}
$__compilerVar12 .= '
					</span>
				';
}
else
{
$__compilerVar12 .= '
					' . htmlspecialchars($resource['tag_line'], ENT_QUOTES, 'UTF-8') . '
				';
}
$__compilerVar12 .= '
			</div>
		</div>
	</div>
	<div class="listBlock resourceStats">
		<div class="listBlockInner">
			';
$__compilerVar14 = '';
$__compilerVar14 .= htmlspecialchars($resource['rating_avg'], ENT_QUOTES, 'UTF-8');
$__compilerVar15 = '';
$__compilerVar15 .= (($resource['rating_count'] == 1) ? ('1 phiếu') : ('' . htmlspecialchars($resource['rating_count'], ENT_QUOTES, 'UTF-8') . ' phiếu'));
$__compilerVar16 = '';
$this->addRequiredExternal('css', 'rating');
$__compilerVar16 .= '

';
if ($action)
{
$__compilerVar16 .= '
	';
$this->addRequiredExternal('js', 'js/xenforo/rating.js');
$__compilerVar16 .= '

	<form action="' . htmlspecialchars($action, ENT_QUOTES, 'UTF-8') . '" method="post" class="rating RatingWidget" ' . (($microdata) ? ('itemscope="itemscope" itemtype="http://data-vocabulary.org/Rating"') : ('')) . '>
		<dl>
			<dt class="prompt muted">' . $prompt . '</dt>
			<dd>
				<span class="ratings">
					 <button type="submit" name="rating" value="1" class="star ' . (($__compilerVar14 >= 1) ? ('Full') : ('')) . (($__compilerVar14 >= 0.5 AND $__compilerVar14 < 1) ? ('Half') : ('')) . '" title="' . 'Terrible' . '">1</button
					><button type="submit" name="rating" value="2" class="star ' . (($__compilerVar14 >= 2) ? ('Full') : ('')) . (($__compilerVar14 >= 1.5 AND $__compilerVar14 < 2) ? ('Half') : ('')) . '" title="' . 'Poor' . '">2</button
					><button type="submit" name="rating" value="3" class="star ' . (($__compilerVar14 >= 3) ? ('Full') : ('')) . (($__compilerVar14 >= 2.5 AND $__compilerVar14 < 3) ? ('Half') : ('')) . '" title="' . 'Average' . '">3</button
					><button type="submit" name="rating" value="4" class="star ' . (($__compilerVar14 >= 4) ? ('Full') : ('')) . (($__compilerVar14 >= 3.5 AND $__compilerVar14 < 4) ? ('Half') : ('')) . '" title="' . 'Good' . '">4</button
					><button type="submit" name="rating" value="5" class="star ' . (($__compilerVar14 >= 5) ? ('Full') : ('')) . (($__compilerVar14 >= 4.5 AND $__compilerVar14 < 5) ? ('Half') : ('')) . '" title="' . 'Excellent' . '">5</button>
				</span>
			
				<span class="RatingValue"><span class="Number" itemprop="average">' . htmlspecialchars($__compilerVar14, ENT_QUOTES, 'UTF-8') . '</span>/<span itemprop="best">5</span>,</span>
				';
if ($threadrating['whoRated'] AND $controllerName == ('XenForo_ControllerPublic_Thread') AND $thread['thread_rate_count'] > 0)
{
$__compilerVar16 .= '
					<a href="' . XenForo_Template_Helper_Core::link('threads/whoRated', $thread, array()) . '" title="' . 'Who has rated this thread?' . '" class="OverlayTrigger"><span class="Hint">' . $__compilerVar15 . '</span></a>
				';
}
else
{
$__compilerVar16 .= '
				<span class="Hint">' . $__compilerVar15 . '</span>
				';
}
$__compilerVar16 .= '
			</dd>
		</dl>
		
		<input type="hidden" name="_xfToken" value="' . htmlspecialchars($visitor['csrf_token_page'], ENT_QUOTES, 'UTF-8') . '" />
	</form>
	
';
}
else
{
$__compilerVar16 .= '
	
	<div class="rating ';
if ($xenOptions['threadrating_greyedout'])
{
$__compilerVar16 .= 'tr_greyedout';
}
$__compilerVar16 .= '">
		<dl>
			<dt class="prompt muted">' . $prompt . '</dt>
			<dd>		
				<span class="ratings" title="' . XenForo_Template_Helper_Core::numberFormat($__compilerVar14, '2') . '">
					 <span class="star ' . (($__compilerVar14 >= 1) ? ('Full') : ('')) . (($__compilerVar14 >= 0.5 AND $__compilerVar14 < 1) ? ('Half') : ('')) . '"></span
					><span class="star ' . (($__compilerVar14 >= 2) ? ('Full') : ('')) . (($__compilerVar14 >= 1.5 AND $__compilerVar14 < 2) ? ('Half') : ('')) . '"></span
					><span class="star ' . (($__compilerVar14 >= 3) ? ('Full') : ('')) . (($__compilerVar14 >= 2.5 AND $__compilerVar14 < 3) ? ('Half') : ('')) . '"></span
					><span class="star ' . (($__compilerVar14 >= 4) ? ('Full') : ('')) . (($__compilerVar14 >= 3.5 AND $__compilerVar14 < 4) ? ('Half') : ('')) . '"></span
					><span class="star ' . (($__compilerVar14 >= 5) ? ('Full') : ('')) . (($__compilerVar14 >= 4.5 AND $__compilerVar14 < 5) ? ('Half') : ('')) . '"></span>
				</span>
				
				<span class="RatingValue"><span class="Number" itemprop="average">' . htmlspecialchars($__compilerVar14, ENT_QUOTES, 'UTF-8') . '</span>/<span itemprop="best">5</span>,</span>
				';
if ($threadrating['whoRated'] AND $controllerName == ('XenForo_ControllerPublic_Thread') AND $thread['thread_rate_count'] > 0)
{
$__compilerVar16 .= '
					<a href="' . XenForo_Template_Helper_Core::link('threads/whoRated', $thread, array()) . '" title="' . 'Who has rated this thread?' . '" class="OverlayTrigger"><span class="Hint">' . $__compilerVar15 . '</span></a>
				';
}
else
{
$__compilerVar16 .= '
				<span class="Hint">' . $__compilerVar15 . '</span>
				';
}
$__compilerVar16 .= '
			</dd>
		</dl>	
	</div>

';
}
$__compilerVar12 .= $__compilerVar16;
unset($__compilerVar14, $__compilerVar15, $__compilerVar16);
$__compilerVar12 .= '
			<div class="pairsJustified">
				';
if (!$resource['is_fileless'])
{
$__compilerVar12 .= '<dl class="resourceDownloads"><dt>' . 'Downloads' . ':</dt> <dd>' . XenForo_Template_Helper_Core::numberFormat($resource['download_count'], '0') . '</dd></dl>';
}
$__compilerVar12 .= '
				<dl class="resourceUpdated"><dt>' . 'Updated' . ':</dt> <dd><a href="' . XenForo_Template_Helper_Core::link('resources/updates', $resource, array()) . '" class="concealed">' . XenForo_Template_Helper_Core::callHelper('datetimehtml', array($resource['last_update'],array(
'time' => htmlspecialchars($resource['last_update'], ENT_QUOTES, 'UTF-8')
))) . '</a></dd></dl>
			</div>
		</div>
	</div>
</li>

';
$this->addRequiredExternal('css', 'resource_list');
$__output .= $__compilerVar12;
unset($__compilerVar9, $__compilerVar10, $__compilerVar11, $__compilerVar12);
$__output .= '
		';
}
$__output .= '
		</ol>
		<div class="sectionFooter">
			<select name="do" class="textCtrl">
				<option>' . 'Lựa chọn với' . '...</option>
				<option value="email">' . 'Bật thông báo Email' . '</option>
				<option value="no_email">' . 'Tắt thông báo Email' . '</option>
				<option value="stop">' . 'Ngừng theo dõi' . '</option>
			</select>
			<input type="submit" value="' . 'Tới' . '" class="button" class="button" />
		</div>

	';
}
else
{
$__output .= '
		<div class="primaryContent">' . 'You are not currently watching any resources.' . '</div>
	';
}
$__output .= '

	<input type="hidden" name="_xfToken" value="' . htmlspecialchars($visitor['csrf_token_page'], ENT_QUOTES, 'UTF-8') . '" />

</form>

<div class="pageNavLinkGroup">
	' . XenForo_Template_Helper_Core::callHelper('pagenavhtml', array('public', htmlspecialchars($perPage, ENT_QUOTES, 'UTF-8'), htmlspecialchars($totalResources, ENT_QUOTES, 'UTF-8'), htmlspecialchars($page, ENT_QUOTES, 'UTF-8'), 'resources/watched', false, array(), false, array())) . '
</div>';
