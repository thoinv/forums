<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__output .= '<li class="resourceListItem ' . htmlspecialchars($resource['resource_state'], ENT_QUOTES, 'UTF-8') . (($resource['isIgnored'] AND !$showIgnored) ? (' ignored') : ('')) . ' ' . (($resource['feature_date']) ? ('featured') : ('')) . '" id="resource-' . htmlspecialchars($resource['resource_id'], ENT_QUOTES, 'UTF-8') . '">
	<div class="listBlock resourceImage">
		<div class="listBlockInner">
			';
if ($xenOptions['resourceAllowIcons'])
{
$__output .= '
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
$__output .= '
				' . XenForo_Template_Helper_Core::callHelper('avatarhtml', array($resource,(true),array(
'user' => '$resource',
'size' => 's',
'img' => 'true'
),'')) . '
			';
}
$__output .= '
		</div>
	</div>
	<div class="listBlock main">
		<div class="listBlockInner">
			';
$__compilerVar5 = '';
$__compilerVar5 .= '
					';
if ($resource['resource_state'] == ('moderated'))
{
$__compilerVar5 .= '<span class="moderated" title="' . 'Cần kiểm duyệt' . '">' . 'Cần kiểm duyệt' . '</span>';
}
$__compilerVar5 .= '
					';
if ($resource['resource_state'] == ('deleted'))
{
$__compilerVar5 .= '<span class="deleted" title="' . 'Bị xóa' . '">' . 'Bị xóa' . '</span>';
}
$__compilerVar5 .= '
				';
if (trim($__compilerVar5) !== '')
{
$__output .= '
				<div class="iconKey">
				' . $__compilerVar5 . '
				</div>
			';
}
unset($__compilerVar5);
$__output .= '
			';
if ($listItemExtraHtml)
{
$__output .= '<span class="extra muted">' . $listItemExtraHtml . '</span>';
}
$__output .= '
			';
if ($resource['cost'])
{
$__output .= '<span class="cost">' . htmlspecialchars($resource['cost'], ENT_QUOTES, 'UTF-8') . '</span>';
}
$__output .= '
			';
if ($resource['feature_date'])
{
$__output .= '<span class="featuredBanner">' . 'Featured' . '</span>';
}
$__output .= '
			<h3 class="title">
				';
if ($resource['canInlineMod'] AND !$hideInlineMod AND !$showCheckbox)
{
$__output .= '<input type="checkbox" name="resources[]" value="' . htmlspecialchars($resource['resource_id'], ENT_QUOTES, 'UTF-8') . '" class="InlineModCheck" id="inlineModCheck-resource-' . htmlspecialchars($resource['resource_id'], ENT_QUOTES, 'UTF-8') . '" data-target="#resource-' . htmlspecialchars($resource['resource_id'], ENT_QUOTES, 'UTF-8') . '" title="' . 'Select resource' . ': \'' . htmlspecialchars($resource['title'], ENT_QUOTES, 'UTF-8') . '\'" />';
}
$__output .= '
				';
if ($showCheckbox)
{
$__output .= '<input type="checkbox" name="resource_ids[]" value="' . htmlspecialchars($resource['resource_id'], ENT_QUOTES, 'UTF-8') . '" /> ';
}
if ($resource['prefix_id'] AND $linkPrefixHtml)
{
$__output .= '<a href="' . $linkPrefixHtml . '" class="prefixLink" title="' . 'Show only resources prefixed by \'' . XenForo_Template_Helper_Core::callHelper('resourcePrefix', array(
'0' => $resource,
'1' => 'escaped',
'2' => ''
)) . '\'.' . '">' . XenForo_Template_Helper_Core::callHelper('resourcePrefix', array(
'0' => $resource
)) . '</a>';
}
else
{
$__output .= XenForo_Template_Helper_Core::callHelper('resourcePrefix', array(
'0' => $resource
));
}
$__output .= '<a
				href="' . XenForo_Template_Helper_Core::link('resources', $resource, array()) . '">' . htmlspecialchars($resource['title'], ENT_QUOTES, 'UTF-8') . '</a>
				';
if (!$resource['isFilelessNoExternal'])
{
$__output .= '<span class="version">' . htmlspecialchars($resource['version_string'], ENT_QUOTES, 'UTF-8') . '</span>';
}
$__output .= '
			</h3>
			<div class="resourceDetails muted">' . XenForo_Template_Helper_Core::callHelper('usernamehtml', array($resource,'',false,array())) . ',
				<a href="' . XenForo_Template_Helper_Core::link('resources', $resource, array()) . '" class="faint">' . XenForo_Template_Helper_Core::callHelper('datetimehtml', array($resource['resource_date'],array(
'time' => htmlspecialchars($resource['resource_date'], ENT_QUOTES, 'UTF-8')
))) . '</a>';
if ($showCategoryTitle)
{
$__output .= ', <a href="' . XenForo_Template_Helper_Core::link('resources/categories', $resource, array()) . '">' . htmlspecialchars($resource['category_title'], ENT_QUOTES, 'UTF-8') . '</a>';
}
$__output .= '
			</div>
			<div class="tagLine">
				';
if ($resource['resource_state'] == ('deleted'))
{
$__output .= '
					<span class="deletionNote">' . 'This resource has been deleted.' . '
						';
if ($resource['delete_user_id'])
{
$__output .= '
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
$__output .= ', ' . 'Lý do' . ': ' . htmlspecialchars($resource['delete_reason'], ENT_QUOTES, 'UTF-8');
}
$__output .= '.
						';
}
$__output .= '
					</span>
				';
}
else
{
$__output .= '
					' . htmlspecialchars($resource['tag_line'], ENT_QUOTES, 'UTF-8') . '
				';
}
$__output .= '
			</div>
		</div>
	</div>
	<div class="listBlock resourceStats">
		<div class="listBlockInner">
			';
$__compilerVar6 = '';
$__compilerVar6 .= htmlspecialchars($resource['rating_avg'], ENT_QUOTES, 'UTF-8');
$__compilerVar7 = '';
$__compilerVar7 .= (($resource['rating_count'] == 1) ? ('1 phiếu') : ('' . htmlspecialchars($resource['rating_count'], ENT_QUOTES, 'UTF-8') . ' phiếu'));
$__compilerVar8 = '';
$this->addRequiredExternal('css', 'rating');
$__compilerVar8 .= '

';
if ($action)
{
$__compilerVar8 .= '
	';
$this->addRequiredExternal('js', 'js/xenforo/rating.js');
$__compilerVar8 .= '

	<form action="' . htmlspecialchars($action, ENT_QUOTES, 'UTF-8') . '" method="post" class="rating RatingWidget" ' . (($microdata) ? ('itemscope="itemscope" itemtype="http://data-vocabulary.org/Rating"') : ('')) . '>
		<dl>
			<dt class="prompt muted">' . $prompt . '</dt>
			<dd>
				<span class="ratings">
					 <button type="submit" name="rating" value="1" class="star ' . (($__compilerVar6 >= 1) ? ('Full') : ('')) . (($__compilerVar6 >= 0.5 AND $__compilerVar6 < 1) ? ('Half') : ('')) . '" title="' . 'Terrible' . '">1</button
					><button type="submit" name="rating" value="2" class="star ' . (($__compilerVar6 >= 2) ? ('Full') : ('')) . (($__compilerVar6 >= 1.5 AND $__compilerVar6 < 2) ? ('Half') : ('')) . '" title="' . 'Poor' . '">2</button
					><button type="submit" name="rating" value="3" class="star ' . (($__compilerVar6 >= 3) ? ('Full') : ('')) . (($__compilerVar6 >= 2.5 AND $__compilerVar6 < 3) ? ('Half') : ('')) . '" title="' . 'Average' . '">3</button
					><button type="submit" name="rating" value="4" class="star ' . (($__compilerVar6 >= 4) ? ('Full') : ('')) . (($__compilerVar6 >= 3.5 AND $__compilerVar6 < 4) ? ('Half') : ('')) . '" title="' . 'Good' . '">4</button
					><button type="submit" name="rating" value="5" class="star ' . (($__compilerVar6 >= 5) ? ('Full') : ('')) . (($__compilerVar6 >= 4.5 AND $__compilerVar6 < 5) ? ('Half') : ('')) . '" title="' . 'Excellent' . '">5</button>
				</span>
			
				<span class="RatingValue"><span class="Number" itemprop="average">' . htmlspecialchars($__compilerVar6, ENT_QUOTES, 'UTF-8') . '</span>/<span itemprop="best">5</span>,</span>
				';
if ($threadrating['whoRated'] AND $controllerName == ('XenForo_ControllerPublic_Thread') AND $thread['thread_rate_count'] > 0)
{
$__compilerVar8 .= '
					<a href="' . XenForo_Template_Helper_Core::link('threads/whoRated', $thread, array()) . '" title="' . 'Who has rated this thread?' . '" class="OverlayTrigger"><span class="Hint">' . $__compilerVar7 . '</span></a>
				';
}
else
{
$__compilerVar8 .= '
				<span class="Hint">' . $__compilerVar7 . '</span>
				';
}
$__compilerVar8 .= '
			</dd>
		</dl>
		
		<input type="hidden" name="_xfToken" value="' . htmlspecialchars($visitor['csrf_token_page'], ENT_QUOTES, 'UTF-8') . '" />
	</form>
	
';
}
else
{
$__compilerVar8 .= '
	
	<div class="rating ';
if ($xenOptions['threadrating_greyedout'])
{
$__compilerVar8 .= 'tr_greyedout';
}
$__compilerVar8 .= '">
		<dl>
			<dt class="prompt muted">' . $prompt . '</dt>
			<dd>		
				<span class="ratings" title="' . XenForo_Template_Helper_Core::numberFormat($__compilerVar6, '2') . '">
					 <span class="star ' . (($__compilerVar6 >= 1) ? ('Full') : ('')) . (($__compilerVar6 >= 0.5 AND $__compilerVar6 < 1) ? ('Half') : ('')) . '"></span
					><span class="star ' . (($__compilerVar6 >= 2) ? ('Full') : ('')) . (($__compilerVar6 >= 1.5 AND $__compilerVar6 < 2) ? ('Half') : ('')) . '"></span
					><span class="star ' . (($__compilerVar6 >= 3) ? ('Full') : ('')) . (($__compilerVar6 >= 2.5 AND $__compilerVar6 < 3) ? ('Half') : ('')) . '"></span
					><span class="star ' . (($__compilerVar6 >= 4) ? ('Full') : ('')) . (($__compilerVar6 >= 3.5 AND $__compilerVar6 < 4) ? ('Half') : ('')) . '"></span
					><span class="star ' . (($__compilerVar6 >= 5) ? ('Full') : ('')) . (($__compilerVar6 >= 4.5 AND $__compilerVar6 < 5) ? ('Half') : ('')) . '"></span>
				</span>
				
				<span class="RatingValue"><span class="Number" itemprop="average">' . htmlspecialchars($__compilerVar6, ENT_QUOTES, 'UTF-8') . '</span>/<span itemprop="best">5</span>,</span>
				';
if ($threadrating['whoRated'] AND $controllerName == ('XenForo_ControllerPublic_Thread') AND $thread['thread_rate_count'] > 0)
{
$__compilerVar8 .= '
					<a href="' . XenForo_Template_Helper_Core::link('threads/whoRated', $thread, array()) . '" title="' . 'Who has rated this thread?' . '" class="OverlayTrigger"><span class="Hint">' . $__compilerVar7 . '</span></a>
				';
}
else
{
$__compilerVar8 .= '
				<span class="Hint">' . $__compilerVar7 . '</span>
				';
}
$__compilerVar8 .= '
			</dd>
		</dl>	
	</div>

';
}
$__output .= $__compilerVar8;
unset($__compilerVar6, $__compilerVar7, $__compilerVar8);
$__output .= '
			<div class="pairsJustified">
				';
if (!$resource['is_fileless'])
{
$__output .= '<dl class="resourceDownloads"><dt>' . 'Downloads' . ':</dt> <dd>' . XenForo_Template_Helper_Core::numberFormat($resource['download_count'], '0') . '</dd></dl>';
}
$__output .= '
				<dl class="resourceUpdated"><dt>' . 'Updated' . ':</dt> <dd><a href="' . XenForo_Template_Helper_Core::link('resources/updates', $resource, array()) . '" class="concealed">' . XenForo_Template_Helper_Core::callHelper('datetimehtml', array($resource['last_update'],array(
'time' => htmlspecialchars($resource['last_update'], ENT_QUOTES, 'UTF-8')
))) . '</a></dd></dl>
			</div>
		</div>
	</div>
</li>

';
$this->addRequiredExternal('css', 'resource_list');
