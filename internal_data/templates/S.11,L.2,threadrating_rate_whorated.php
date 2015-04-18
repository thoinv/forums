<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$this->addRequiredExternal('css', 'threadrating');
$__output .= '
';
$__compilerVar3 = '';
$__compilerVar3 .= htmlspecialchars($who['rating'], ENT_QUOTES, 'UTF-8');
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
					 <button type="submit" name="rating" value="1" class="star ' . (($__compilerVar3 >= 1) ? ('Full') : ('')) . (($__compilerVar3 >= 0.5 AND $__compilerVar3 < 1) ? ('Half') : ('')) . '" title="' . 'Terrible' . '">1</button
					><button type="submit" name="rating" value="2" class="star ' . (($__compilerVar3 >= 2) ? ('Full') : ('')) . (($__compilerVar3 >= 1.5 AND $__compilerVar3 < 2) ? ('Half') : ('')) . '" title="' . 'Poor' . '">2</button
					><button type="submit" name="rating" value="3" class="star ' . (($__compilerVar3 >= 3) ? ('Full') : ('')) . (($__compilerVar3 >= 2.5 AND $__compilerVar3 < 3) ? ('Half') : ('')) . '" title="' . 'Average' . '">3</button
					><button type="submit" name="rating" value="4" class="star ' . (($__compilerVar3 >= 4) ? ('Full') : ('')) . (($__compilerVar3 >= 3.5 AND $__compilerVar3 < 4) ? ('Half') : ('')) . '" title="' . 'Good' . '">4</button
					><button type="submit" name="rating" value="5" class="star ' . (($__compilerVar3 >= 5) ? ('Full') : ('')) . (($__compilerVar3 >= 4.5 AND $__compilerVar3 < 5) ? ('Half') : ('')) . '" title="' . 'Excellent' . '">5</button>
				</span>
			
				<span class="RatingValue"><span class="Number" itemprop="average">' . htmlspecialchars($__compilerVar3, ENT_QUOTES, 'UTF-8') . '</span>/<span itemprop="best">5</span>,</span>
				';
if ($threadrating['whoRated'] AND $controllerName == ('XenForo_ControllerPublic_Thread') AND $thread['thread_rate_count'] > 0)
{
$__compilerVar4 .= '
					<a href="' . XenForo_Template_Helper_Core::link('threads/whoRated', $thread, array()) . '" title="' . 'Who has rated this thread?' . '" class="OverlayTrigger"><span class="Hint">' . $hint . '</span></a>
				';
}
else
{
$__compilerVar4 .= '
				<span class="Hint">' . $hint . '</span>
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
				<span class="ratings" title="' . XenForo_Template_Helper_Core::numberFormat($__compilerVar3, '2') . '">
					 <span class="star ' . (($__compilerVar3 >= 1) ? ('Full') : ('')) . (($__compilerVar3 >= 0.5 AND $__compilerVar3 < 1) ? ('Half') : ('')) . '"></span
					><span class="star ' . (($__compilerVar3 >= 2) ? ('Full') : ('')) . (($__compilerVar3 >= 1.5 AND $__compilerVar3 < 2) ? ('Half') : ('')) . '"></span
					><span class="star ' . (($__compilerVar3 >= 3) ? ('Full') : ('')) . (($__compilerVar3 >= 2.5 AND $__compilerVar3 < 3) ? ('Half') : ('')) . '"></span
					><span class="star ' . (($__compilerVar3 >= 4) ? ('Full') : ('')) . (($__compilerVar3 >= 3.5 AND $__compilerVar3 < 4) ? ('Half') : ('')) . '"></span
					><span class="star ' . (($__compilerVar3 >= 5) ? ('Full') : ('')) . (($__compilerVar3 >= 4.5 AND $__compilerVar3 < 5) ? ('Half') : ('')) . '"></span>
				</span>
				
				<span class="RatingValue"><span class="Number" itemprop="average">' . htmlspecialchars($__compilerVar3, ENT_QUOTES, 'UTF-8') . '</span>/<span itemprop="best">5</span>,</span>
				';
if ($threadrating['whoRated'] AND $controllerName == ('XenForo_ControllerPublic_Thread') AND $thread['thread_rate_count'] > 0)
{
$__compilerVar4 .= '
					<a href="' . XenForo_Template_Helper_Core::link('threads/whoRated', $thread, array()) . '" title="' . 'Who has rated this thread?' . '" class="OverlayTrigger"><span class="Hint">' . $hint . '</span></a>
				';
}
else
{
$__compilerVar4 .= '
				<span class="Hint">' . $hint . '</span>
				';
}
$__compilerVar4 .= '
			</dd>
		</dl>	
	</div>

';
}
$__output .= $__compilerVar4;
unset($__compilerVar3, $__compilerVar4);
