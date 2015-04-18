<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__compilerVar1 = '';
$__compilerVar1 .= '
				';
foreach ($resources AS $resource)
{
$__compilerVar1 .= '
					<li class="resource-' . htmlspecialchars($resource['resource_id'], ENT_QUOTES, 'UTF-8') . ' resource-category-' . htmlspecialchars($resource['resource_category_id'], ENT_QUOTES, 'UTF-8') . '">
						';
if ($xenOptions['resourceAllowIcons'])
{
$__compilerVar1 .= '
							<a href="' . XenForo_Template_Helper_Core::link('resources', $resource, array()) . '" class="avatar NoOverlay">
								<img src="' . XenForo_Template_Helper_Core::callHelper('resourceiconurl', array(
'0' => $resource
)) . '" class="resourceIcon" width="48" height="48" />
							</a>
						';
}
else
{
$__compilerVar1 .= '
							' . XenForo_Template_Helper_Core::callHelper('avatarhtml', array($resource,(true),array(
'user' => '$resource',
'size' => 's',
'img' => 'true'
),'')) . '
						';
}
$__compilerVar1 .= '

						<a href="' . XenForo_Template_Helper_Core::link('resources', $resource, array()) . '">' . htmlspecialchars($resource['title'], ENT_QUOTES, 'UTF-8') . '</a>

						';
if ($widget['options']['type'] == ('new'))
{
$__compilerVar1 .= '
							<div class="userTitle">' . '' . '<a href="' . XenForo_Template_Helper_Core::link('members', $resource, array()) . '">' . htmlspecialchars($resource['username'], ENT_QUOTES, 'UTF-8') . '</a>' . ' posted' . ' ' . XenForo_Template_Helper_Core::callHelper('datetimehtml', array($resource['resource_date'],array(
'time' => htmlspecialchars($resource['resource_date'], ENT_QUOTES, 'UTF-8')
))) . '</div>
						';
}
else if ($widget['options']['type'] == ('latest_update'))
{
$__compilerVar1 .= '
							<div class="userTitle">' . '' . '<a href="' . XenForo_Template_Helper_Core::link('members', $resource, array()) . '">' . htmlspecialchars($resource['username'], ENT_QUOTES, 'UTF-8') . '</a>' . ' updated' . ' ' . XenForo_Template_Helper_Core::callHelper('datetimehtml', array($resource['last_update'],array(
'time' => htmlspecialchars($resource['last_update'], ENT_QUOTES, 'UTF-8')
))) . '</div>
						';
}
else if ($widget['options']['type'] == ('highest_rating'))
{
$__compilerVar1 .= '
							';
$__compilerVar2 = '';
$__compilerVar2 .= htmlspecialchars($resource['rating_avg'], ENT_QUOTES, 'UTF-8');
$__compilerVar3 = '';
$__compilerVar3 .= (($resource['rating_count'] == 1) ? ('1 vote') : ('' . htmlspecialchars($resource['rating_count'], ENT_QUOTES, 'UTF-8') . ' votes'));
$__compilerVar4 = '';
$this->addRequiredExternal('css', 'rating');
$__compilerVar4 .= '

';
if ($action)
{
$__compilerVar4 .= '
	';
$this->addRequiredExternal('js', 'js/xenforo/rating.js');
$__compilerVar4 .= '

	<form action="' . htmlspecialchars($action, ENT_QUOTES, 'UTF-8') . '" method="post" class="rating RatingWidget" ' . (($microdata) ? ('itemscope="itemscope" itemtype="http://data-vocabulary.org/Rating"') : ('')) . '>
		<dl>
			<dt class="prompt muted">' . $prompt . '</dt>
			<dd>
				<span class="ratings">
					 <button type="submit" name="rating" value="1" class="star ' . (($__compilerVar2 >= 1) ? ('Full') : ('')) . (($__compilerVar2 >= 0.5 AND $__compilerVar2 < 1) ? ('Half') : ('')) . '" title="' . 'Terrible' . '">1</button
					><button type="submit" name="rating" value="2" class="star ' . (($__compilerVar2 >= 2) ? ('Full') : ('')) . (($__compilerVar2 >= 1.5 AND $__compilerVar2 < 2) ? ('Half') : ('')) . '" title="' . 'Poor' . '">2</button
					><button type="submit" name="rating" value="3" class="star ' . (($__compilerVar2 >= 3) ? ('Full') : ('')) . (($__compilerVar2 >= 2.5 AND $__compilerVar2 < 3) ? ('Half') : ('')) . '" title="' . 'Average' . '">3</button
					><button type="submit" name="rating" value="4" class="star ' . (($__compilerVar2 >= 4) ? ('Full') : ('')) . (($__compilerVar2 >= 3.5 AND $__compilerVar2 < 4) ? ('Half') : ('')) . '" title="' . 'Good' . '">4</button
					><button type="submit" name="rating" value="5" class="star ' . (($__compilerVar2 >= 5) ? ('Full') : ('')) . (($__compilerVar2 >= 4.5 AND $__compilerVar2 < 5) ? ('Half') : ('')) . '" title="' . 'Excellent' . '">5</button>
				</span>
			
				<span class="RatingValue"><span class="Number" itemprop="average">' . htmlspecialchars($__compilerVar2, ENT_QUOTES, 'UTF-8') . '</span>/<span itemprop="best">5</span>,</span>
				';
if ($threadrating['whoRated'] AND $controllerName == ('XenForo_ControllerPublic_Thread') AND $thread['thread_rate_count'] > 0)
{
$__compilerVar4 .= '
					<a href="' . XenForo_Template_Helper_Core::link('threads/whoRated', $thread, array()) . '" title="' . 'Who has rated this thread?' . '" class="OverlayTrigger"><span class="Hint">' . $__compilerVar3 . '</span></a>
				';
}
else
{
$__compilerVar4 .= '
				<span class="Hint">' . $__compilerVar3 . '</span>
				';
}
$__compilerVar4 .= '
			</dd>
		</dl>
		
		<input type="hidden" name="_xfToken" value="' . htmlspecialchars($visitor['csrf_token_page'], ENT_QUOTES, 'UTF-8') . '" />
	</form>
	
';
}
else
{
$__compilerVar4 .= '
	
	<div class="rating ';
if ($xenOptions['threadrating_greyedout'])
{
$__compilerVar4 .= 'tr_greyedout';
}
$__compilerVar4 .= '">
		<dl>
			<dt class="prompt muted">' . $prompt . '</dt>
			<dd>		
				<span class="ratings" title="' . XenForo_Template_Helper_Core::numberFormat($__compilerVar2, '2') . '">
					 <span class="star ' . (($__compilerVar2 >= 1) ? ('Full') : ('')) . (($__compilerVar2 >= 0.5 AND $__compilerVar2 < 1) ? ('Half') : ('')) . '"></span
					><span class="star ' . (($__compilerVar2 >= 2) ? ('Full') : ('')) . (($__compilerVar2 >= 1.5 AND $__compilerVar2 < 2) ? ('Half') : ('')) . '"></span
					><span class="star ' . (($__compilerVar2 >= 3) ? ('Full') : ('')) . (($__compilerVar2 >= 2.5 AND $__compilerVar2 < 3) ? ('Half') : ('')) . '"></span
					><span class="star ' . (($__compilerVar2 >= 4) ? ('Full') : ('')) . (($__compilerVar2 >= 3.5 AND $__compilerVar2 < 4) ? ('Half') : ('')) . '"></span
					><span class="star ' . (($__compilerVar2 >= 5) ? ('Full') : ('')) . (($__compilerVar2 >= 4.5 AND $__compilerVar2 < 5) ? ('Half') : ('')) . '"></span>
				</span>
				
				<span class="RatingValue"><span class="Number" itemprop="average">' . htmlspecialchars($__compilerVar2, ENT_QUOTES, 'UTF-8') . '</span>/<span itemprop="best">5</span>,</span>
				';
if ($threadrating['whoRated'] AND $controllerName == ('XenForo_ControllerPublic_Thread') AND $thread['thread_rate_count'] > 0)
{
$__compilerVar4 .= '
					<a href="' . XenForo_Template_Helper_Core::link('threads/whoRated', $thread, array()) . '" title="' . 'Who has rated this thread?' . '" class="OverlayTrigger"><span class="Hint">' . $__compilerVar3 . '</span></a>
				';
}
else
{
$__compilerVar4 .= '
				<span class="Hint">' . $__compilerVar3 . '</span>
				';
}
$__compilerVar4 .= '
			</dd>
		</dl>	
	</div>

';
}
$__compilerVar1 .= $__compilerVar4;
unset($__compilerVar2, $__compilerVar3, $__compilerVar4);
$__compilerVar1 .= '
						';
}
else if ($widget['options']['type'] == ('most_downloaded'))
{
$__compilerVar1 .= '
							<div class="userTitle">' . 'Downloads' . ': ' . XenForo_Template_Helper_Core::numberFormat($resource['download_count'], '0') . '</div>
						';
}
$__compilerVar1 .= '
					</li>
				';
}
$__compilerVar1 .= '
			';
if (trim($__compilerVar1) !== '')
{
$__output .= '
	';
$this->addRequiredExternal('css', 'wf_default');
$__output .= '

	<div class="avatarList">
		<ul>
			' . $__compilerVar1 . '
		</ul>
	</div>
';
}
unset($__compilerVar1);
