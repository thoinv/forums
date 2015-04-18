<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__compilerVar5 = '';
$__compilerVar5 .= '
				';
foreach ($resources AS $resource)
{
$__compilerVar5 .= '
					<li class="resource-' . htmlspecialchars($resource['resource_id'], ENT_QUOTES, 'UTF-8') . ' resource-category-' . htmlspecialchars($resource['resource_category_id'], ENT_QUOTES, 'UTF-8') . '">
						';
if ($xenOptions['resourceAllowIcons'])
{
$__compilerVar5 .= '
							<a href="' . XenForo_Template_Helper_Core::link('resources', $resource, array()) . '" class="avatar NoOverlay">
								<img src="' . XenForo_Template_Helper_Core::callHelper('resourceiconurl', array(
'0' => $resource
)) . '" class="resourceIcon" width="48" height="48" />
							</a>
						';
}
else
{
$__compilerVar5 .= '
							' . XenForo_Template_Helper_Core::callHelper('avatarhtml', array($resource,(true),array(
'user' => '$resource',
'size' => 's',
'img' => 'true'
),'')) . '
						';
}
$__compilerVar5 .= '

						<a href="' . XenForo_Template_Helper_Core::link('resources', $resource, array()) . '">' . htmlspecialchars($resource['title'], ENT_QUOTES, 'UTF-8') . '</a>

						';
if ($widget['options']['type'] == ('new'))
{
$__compilerVar5 .= '
							<div class="userTitle">' . '' . '<a href="' . XenForo_Template_Helper_Core::link('members', $resource, array()) . '">' . htmlspecialchars($resource['username'], ENT_QUOTES, 'UTF-8') . '</a>' . ' posted' . ' ' . XenForo_Template_Helper_Core::callHelper('datetimehtml', array($resource['resource_date'],array(
'time' => htmlspecialchars($resource['resource_date'], ENT_QUOTES, 'UTF-8')
))) . '</div>
						';
}
else if ($widget['options']['type'] == ('latest_update'))
{
$__compilerVar5 .= '
							<div class="userTitle">' . '' . '<a href="' . XenForo_Template_Helper_Core::link('members', $resource, array()) . '">' . htmlspecialchars($resource['username'], ENT_QUOTES, 'UTF-8') . '</a>' . ' updated' . ' ' . XenForo_Template_Helper_Core::callHelper('datetimehtml', array($resource['last_update'],array(
'time' => htmlspecialchars($resource['last_update'], ENT_QUOTES, 'UTF-8')
))) . '</div>
						';
}
else if ($widget['options']['type'] == ('highest_rating'))
{
$__compilerVar5 .= '
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
$__compilerVar5 .= $__compilerVar8;
unset($__compilerVar6, $__compilerVar7, $__compilerVar8);
$__compilerVar5 .= '
						';
}
else if ($widget['options']['type'] == ('most_downloaded'))
{
$__compilerVar5 .= '
							<div class="userTitle">' . 'Downloads' . ': ' . XenForo_Template_Helper_Core::numberFormat($resource['download_count'], '0') . '</div>
						';
}
$__compilerVar5 .= '
					</li>
				';
}
$__compilerVar5 .= '
			';
if (trim($__compilerVar5) !== '')
{
$__output .= '
	';
$this->addRequiredExternal('css', 'wf_default');
$__output .= '

	<div class="avatarList">
		<ul>
			' . $__compilerVar5 . '
		</ul>
	</div>
';
}
unset($__compilerVar5);
