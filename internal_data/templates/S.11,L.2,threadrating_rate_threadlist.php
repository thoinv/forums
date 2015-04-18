<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
if ($thread['thread_rate_count'])
{
$__output .= '
';
$this->addRequiredExternal('css', 'threadrating');
$__output .= '
';
$__compilerVar6 = '';
$__compilerVar7 = '';
$__compilerVar7 .= htmlspecialchars($thread['thread_rate_avg'], ENT_QUOTES, 'UTF-8');
$__compilerVar8 = '';
$__compilerVar9 = '';
$__compilerVar9 .= '1';
$__compilerVar10 = '';
$this->addRequiredExternal('css', 'rating');
$__compilerVar10 .= '

';
if ($__compilerVar6)
{
$__compilerVar10 .= '
	';
$this->addRequiredExternal('js', 'js/xenforo/rating.js');
$__compilerVar10 .= '

	<form action="' . htmlspecialchars($__compilerVar6, ENT_QUOTES, 'UTF-8') . '" method="post" class="rating RatingWidget" ' . (($__compilerVar9) ? ('itemscope="itemscope" itemtype="http://data-vocabulary.org/Rating"') : ('')) . '>
		<dl>
			<dt class="prompt muted">' . $__compilerVar8 . '</dt>
			<dd>
				<span class="ratings">
					 <button type="submit" name="rating" value="1" class="star ' . (($__compilerVar7 >= 1) ? ('Full') : ('')) . (($__compilerVar7 >= 0.5 AND $__compilerVar7 < 1) ? ('Half') : ('')) . '" title="' . 'Terrible' . '">1</button
					><button type="submit" name="rating" value="2" class="star ' . (($__compilerVar7 >= 2) ? ('Full') : ('')) . (($__compilerVar7 >= 1.5 AND $__compilerVar7 < 2) ? ('Half') : ('')) . '" title="' . 'Poor' . '">2</button
					><button type="submit" name="rating" value="3" class="star ' . (($__compilerVar7 >= 3) ? ('Full') : ('')) . (($__compilerVar7 >= 2.5 AND $__compilerVar7 < 3) ? ('Half') : ('')) . '" title="' . 'Average' . '">3</button
					><button type="submit" name="rating" value="4" class="star ' . (($__compilerVar7 >= 4) ? ('Full') : ('')) . (($__compilerVar7 >= 3.5 AND $__compilerVar7 < 4) ? ('Half') : ('')) . '" title="' . 'Good' . '">4</button
					><button type="submit" name="rating" value="5" class="star ' . (($__compilerVar7 >= 5) ? ('Full') : ('')) . (($__compilerVar7 >= 4.5 AND $__compilerVar7 < 5) ? ('Half') : ('')) . '" title="' . 'Excellent' . '">5</button>
				</span>
			
				<span class="RatingValue"><span class="Number" itemprop="average">' . htmlspecialchars($__compilerVar7, ENT_QUOTES, 'UTF-8') . '</span>/<span itemprop="best">5</span>,</span>
				';
if ($threadrating['whoRated'] AND $controllerName == ('XenForo_ControllerPublic_Thread') AND $thread['thread_rate_count'] > 0)
{
$__compilerVar10 .= '
					<a href="' . XenForo_Template_Helper_Core::link('threads/whoRated', $thread, array()) . '" title="' . 'Who has rated this thread?' . '" class="OverlayTrigger"><span class="Hint">' . $hint . '</span></a>
				';
}
else
{
$__compilerVar10 .= '
				<span class="Hint">' . $hint . '</span>
				';
}
$__compilerVar10 .= '
			</dd>
		</dl>
		
		<input type="hidden" name="_xfToken" value="' . htmlspecialchars($visitor['csrf_token_page'], ENT_QUOTES, 'UTF-8') . '" />
	</form>
	
';
}
else
{
$__compilerVar10 .= '
	
	<div class="rating ';
if ($xenOptions['threadrating_greyedout'])
{
$__compilerVar10 .= 'tr_greyedout';
}
$__compilerVar10 .= '">
		<dl>
			<dt class="prompt muted">' . $__compilerVar8 . '</dt>
			<dd>		
				<span class="ratings" title="' . XenForo_Template_Helper_Core::numberFormat($__compilerVar7, '2') . '">
					 <span class="star ' . (($__compilerVar7 >= 1) ? ('Full') : ('')) . (($__compilerVar7 >= 0.5 AND $__compilerVar7 < 1) ? ('Half') : ('')) . '"></span
					><span class="star ' . (($__compilerVar7 >= 2) ? ('Full') : ('')) . (($__compilerVar7 >= 1.5 AND $__compilerVar7 < 2) ? ('Half') : ('')) . '"></span
					><span class="star ' . (($__compilerVar7 >= 3) ? ('Full') : ('')) . (($__compilerVar7 >= 2.5 AND $__compilerVar7 < 3) ? ('Half') : ('')) . '"></span
					><span class="star ' . (($__compilerVar7 >= 4) ? ('Full') : ('')) . (($__compilerVar7 >= 3.5 AND $__compilerVar7 < 4) ? ('Half') : ('')) . '"></span
					><span class="star ' . (($__compilerVar7 >= 5) ? ('Full') : ('')) . (($__compilerVar7 >= 4.5 AND $__compilerVar7 < 5) ? ('Half') : ('')) . '"></span>
				</span>
				
				<span class="RatingValue"><span class="Number" itemprop="average">' . htmlspecialchars($__compilerVar7, ENT_QUOTES, 'UTF-8') . '</span>/<span itemprop="best">5</span>,</span>
				';
if ($threadrating['whoRated'] AND $controllerName == ('XenForo_ControllerPublic_Thread') AND $thread['thread_rate_count'] > 0)
{
$__compilerVar10 .= '
					<a href="' . XenForo_Template_Helper_Core::link('threads/whoRated', $thread, array()) . '" title="' . 'Who has rated this thread?' . '" class="OverlayTrigger"><span class="Hint">' . $hint . '</span></a>
				';
}
else
{
$__compilerVar10 .= '
				<span class="Hint">' . $hint . '</span>
				';
}
$__compilerVar10 .= '
			</dd>
		</dl>	
	</div>

';
}
$__output .= $__compilerVar10;
unset($__compilerVar6, $__compilerVar7, $__compilerVar8, $__compilerVar9, $__compilerVar10);
$__output .= '
';
}
