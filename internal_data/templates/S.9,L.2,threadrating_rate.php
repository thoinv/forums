<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$this->addRequiredExternal('css', 'threadrating');
$__output .= '
';
$__compilerVar7 = '';
$__compilerVar7 .= (($threadrating['canRate']) ? (XenForo_Template_Helper_Core::link('threads/rate', $thread, array())) : (''));
$__compilerVar8 = '';
$__compilerVar8 .= htmlspecialchars($thread['thread_rate_avg'], ENT_QUOTES, 'UTF-8');
$__compilerVar9 = '';
$__compilerVar10 = '';
$__compilerVar10 .= (($thread['thread_rate_count'] == 1) ? ('1 phiếu') : ('' . htmlspecialchars($thread['thread_rate_count'], ENT_QUOTES, 'UTF-8') . ' phiếu'));
$__compilerVar11 = '';
$__compilerVar11 .= '1';
$__compilerVar12 = '';
$this->addRequiredExternal('css', 'rating');
$__compilerVar12 .= '

';
if ($__compilerVar7)
{
$__compilerVar12 .= '
	';
$this->addRequiredExternal('js', 'js/xenforo/rating.js');
$__compilerVar12 .= '

	<form action="' . htmlspecialchars($__compilerVar7, ENT_QUOTES, 'UTF-8') . '" method="post" class="rating RatingWidget" ' . (($__compilerVar11) ? ('itemscope="itemscope" itemtype="http://data-vocabulary.org/Rating"') : ('')) . '>
		<dl>
			<dt class="prompt muted">' . $__compilerVar9 . '</dt>
			<dd>
				<span class="ratings">
					 <button type="submit" name="rating" value="1" class="star ' . (($__compilerVar8 >= 1) ? ('Full') : ('')) . (($__compilerVar8 >= 0.5 AND $__compilerVar8 < 1) ? ('Half') : ('')) . '" title="' . 'Terrible' . '">1</button
					><button type="submit" name="rating" value="2" class="star ' . (($__compilerVar8 >= 2) ? ('Full') : ('')) . (($__compilerVar8 >= 1.5 AND $__compilerVar8 < 2) ? ('Half') : ('')) . '" title="' . 'Poor' . '">2</button
					><button type="submit" name="rating" value="3" class="star ' . (($__compilerVar8 >= 3) ? ('Full') : ('')) . (($__compilerVar8 >= 2.5 AND $__compilerVar8 < 3) ? ('Half') : ('')) . '" title="' . 'Average' . '">3</button
					><button type="submit" name="rating" value="4" class="star ' . (($__compilerVar8 >= 4) ? ('Full') : ('')) . (($__compilerVar8 >= 3.5 AND $__compilerVar8 < 4) ? ('Half') : ('')) . '" title="' . 'Good' . '">4</button
					><button type="submit" name="rating" value="5" class="star ' . (($__compilerVar8 >= 5) ? ('Full') : ('')) . (($__compilerVar8 >= 4.5 AND $__compilerVar8 < 5) ? ('Half') : ('')) . '" title="' . 'Excellent' . '">5</button>
				</span>
			
				<span class="RatingValue"><span class="Number" itemprop="average">' . htmlspecialchars($__compilerVar8, ENT_QUOTES, 'UTF-8') . '</span>/<span itemprop="best">5</span>,</span>
				';
if ($threadrating['whoRated'] AND $controllerName == ('XenForo_ControllerPublic_Thread') AND $thread['thread_rate_count'] > 0)
{
$__compilerVar12 .= '
					<a href="' . XenForo_Template_Helper_Core::link('threads/whoRated', $thread, array()) . '" title="' . 'Who has rated this thread?' . '" class="OverlayTrigger"><span class="Hint">' . $__compilerVar10 . '</span></a>
				';
}
else
{
$__compilerVar12 .= '
				<span class="Hint">' . $__compilerVar10 . '</span>
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
			<dt class="prompt muted">' . $__compilerVar9 . '</dt>
			<dd>		
				<span class="ratings" title="' . XenForo_Template_Helper_Core::numberFormat($__compilerVar8, '2') . '">
					 <span class="star ' . (($__compilerVar8 >= 1) ? ('Full') : ('')) . (($__compilerVar8 >= 0.5 AND $__compilerVar8 < 1) ? ('Half') : ('')) . '"></span
					><span class="star ' . (($__compilerVar8 >= 2) ? ('Full') : ('')) . (($__compilerVar8 >= 1.5 AND $__compilerVar8 < 2) ? ('Half') : ('')) . '"></span
					><span class="star ' . (($__compilerVar8 >= 3) ? ('Full') : ('')) . (($__compilerVar8 >= 2.5 AND $__compilerVar8 < 3) ? ('Half') : ('')) . '"></span
					><span class="star ' . (($__compilerVar8 >= 4) ? ('Full') : ('')) . (($__compilerVar8 >= 3.5 AND $__compilerVar8 < 4) ? ('Half') : ('')) . '"></span
					><span class="star ' . (($__compilerVar8 >= 5) ? ('Full') : ('')) . (($__compilerVar8 >= 4.5 AND $__compilerVar8 < 5) ? ('Half') : ('')) . '"></span>
				</span>
				
				<span class="RatingValue"><span class="Number" itemprop="average">' . htmlspecialchars($__compilerVar8, ENT_QUOTES, 'UTF-8') . '</span>/<span itemprop="best">5</span>,</span>
				';
if ($threadrating['whoRated'] AND $controllerName == ('XenForo_ControllerPublic_Thread') AND $thread['thread_rate_count'] > 0)
{
$__compilerVar12 .= '
					<a href="' . XenForo_Template_Helper_Core::link('threads/whoRated', $thread, array()) . '" title="' . 'Who has rated this thread?' . '" class="OverlayTrigger"><span class="Hint">' . $__compilerVar10 . '</span></a>
				';
}
else
{
$__compilerVar12 .= '
				<span class="Hint">' . $__compilerVar10 . '</span>
				';
}
$__compilerVar12 .= '
			</dd>
		</dl>	
	</div>

';
}
$__output .= $__compilerVar12;
unset($__compilerVar7, $__compilerVar8, $__compilerVar9, $__compilerVar10, $__compilerVar11, $__compilerVar12);
