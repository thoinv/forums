<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$this->addRequiredExternal('css', 'threadrating');
$__output .= '
';
$__compilerVar1 = '';
$__compilerVar1 .= (($threadrating['canRate']) ? (XenForo_Template_Helper_Core::link('threads/rate', $thread, array())) : (''));
$__compilerVar2 = '';
$__compilerVar2 .= htmlspecialchars($thread['thread_rate_avg'], ENT_QUOTES, 'UTF-8');
$__compilerVar3 = '';
$__compilerVar4 = '';
$__compilerVar4 .= (($thread['thread_rate_count'] == 1) ? ('1 vote') : ('' . htmlspecialchars($thread['thread_rate_count'], ENT_QUOTES, 'UTF-8') . ' votes'));
$__compilerVar5 = '';
$__compilerVar5 .= '1';
$__compilerVar6 = '';
$this->addRequiredExternal('css', 'rating');
$__compilerVar6 .= '

';
if ($__compilerVar1)
{
$__compilerVar6 .= '
	';
$this->addRequiredExternal('js', 'js/xenforo/rating.js');
$__compilerVar6 .= '

	<form action="' . htmlspecialchars($__compilerVar1, ENT_QUOTES, 'UTF-8') . '" method="post" class="rating RatingWidget" ' . (($__compilerVar5) ? ('itemscope="itemscope" itemtype="http://data-vocabulary.org/Rating"') : ('')) . '>
		<dl>
			<dt class="prompt muted">' . $__compilerVar3 . '</dt>
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
$__compilerVar6 .= '
					<a href="' . XenForo_Template_Helper_Core::link('threads/whoRated', $thread, array()) . '" title="' . 'Who has rated this thread?' . '" class="OverlayTrigger"><span class="Hint">' . $__compilerVar4 . '</span></a>
				';
}
else
{
$__compilerVar6 .= '
				<span class="Hint">' . $__compilerVar4 . '</span>
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
			<dt class="prompt muted">' . $__compilerVar3 . '</dt>
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
$__compilerVar6 .= '
					<a href="' . XenForo_Template_Helper_Core::link('threads/whoRated', $thread, array()) . '" title="' . 'Who has rated this thread?' . '" class="OverlayTrigger"><span class="Hint">' . $__compilerVar4 . '</span></a>
				';
}
else
{
$__compilerVar6 .= '
				<span class="Hint">' . $__compilerVar4 . '</span>
				';
}
$__compilerVar6 .= '
			</dd>
		</dl>	
	</div>

';
}
$__output .= $__compilerVar6;
unset($__compilerVar1, $__compilerVar2, $__compilerVar3, $__compilerVar4, $__compilerVar5, $__compilerVar6);
