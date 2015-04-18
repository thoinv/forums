<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$this->addRequiredExternal('css', 'rating');
$__output .= '

';
if ($action)
{
$__output .= '
	';
$this->addRequiredExternal('js', 'js/xenforo/rating.js');
$__output .= '

	<form action="' . htmlspecialchars($action, ENT_QUOTES, 'UTF-8') . '" method="post" class="rating RatingWidget" ' . (($microdata) ? ('itemscope="itemscope" itemtype="http://data-vocabulary.org/Rating"') : ('')) . '>
		<dl>
			<dt class="prompt muted">' . $prompt . '</dt>
			<dd>
				<span class="ratings">
					 <button type="submit" name="rating" value="1" class="star ' . (($rating >= 1) ? ('Full') : ('')) . (($rating >= 0.5 AND $rating < 1) ? ('Half') : ('')) . '" title="' . 'Terrible' . '">1</button
					><button type="submit" name="rating" value="2" class="star ' . (($rating >= 2) ? ('Full') : ('')) . (($rating >= 1.5 AND $rating < 2) ? ('Half') : ('')) . '" title="' . 'Poor' . '">2</button
					><button type="submit" name="rating" value="3" class="star ' . (($rating >= 3) ? ('Full') : ('')) . (($rating >= 2.5 AND $rating < 3) ? ('Half') : ('')) . '" title="' . 'Average' . '">3</button
					><button type="submit" name="rating" value="4" class="star ' . (($rating >= 4) ? ('Full') : ('')) . (($rating >= 3.5 AND $rating < 4) ? ('Half') : ('')) . '" title="' . 'Good' . '">4</button
					><button type="submit" name="rating" value="5" class="star ' . (($rating >= 5) ? ('Full') : ('')) . (($rating >= 4.5 AND $rating < 5) ? ('Half') : ('')) . '" title="' . 'Excellent' . '">5</button>
				</span>
			
				<span class="RatingValue"><span class="Number" itemprop="average">' . htmlspecialchars($rating, ENT_QUOTES, 'UTF-8') . '</span>/<span itemprop="best">5</span>,</span>
				';
if ($threadrating['whoRated'] AND $controllerName == ('XenForo_ControllerPublic_Thread') AND $thread['thread_rate_count'] > 0)
{
$__output .= '
					<a href="' . XenForo_Template_Helper_Core::link('threads/whoRated', $thread, array()) . '" title="' . 'Who has rated this thread?' . '" class="OverlayTrigger"><span class="Hint">' . $hint . '</span></a>
				';
}
else
{
$__output .= '
				<span class="Hint">' . $hint . '</span>
				';
}
$__output .= '
			</dd>
		</dl>
		
		<input type="hidden" name="_xfToken" value="' . htmlspecialchars($visitor['csrf_token_page'], ENT_QUOTES, 'UTF-8') . '" />
	</form>
	
';
}
else
{
$__output .= '
	
	<div class="rating ';
if ($xenOptions['threadrating_greyedout'])
{
$__output .= 'tr_greyedout';
}
$__output .= '">
		<dl>
			<dt class="prompt muted">' . $prompt . '</dt>
			<dd>		
				<span class="ratings" title="' . XenForo_Template_Helper_Core::numberFormat($rating, '2') . '">
					 <span class="star ' . (($rating >= 1) ? ('Full') : ('')) . (($rating >= 0.5 AND $rating < 1) ? ('Half') : ('')) . '"></span
					><span class="star ' . (($rating >= 2) ? ('Full') : ('')) . (($rating >= 1.5 AND $rating < 2) ? ('Half') : ('')) . '"></span
					><span class="star ' . (($rating >= 3) ? ('Full') : ('')) . (($rating >= 2.5 AND $rating < 3) ? ('Half') : ('')) . '"></span
					><span class="star ' . (($rating >= 4) ? ('Full') : ('')) . (($rating >= 3.5 AND $rating < 4) ? ('Half') : ('')) . '"></span
					><span class="star ' . (($rating >= 5) ? ('Full') : ('')) . (($rating >= 4.5 AND $rating < 5) ? ('Half') : ('')) . '"></span>
				</span>
				
				<span class="RatingValue"><span class="Number" itemprop="average">' . htmlspecialchars($rating, ENT_QUOTES, 'UTF-8') . '</span>/<span itemprop="best">5</span>,</span>
				';
if ($threadrating['whoRated'] AND $controllerName == ('XenForo_ControllerPublic_Thread') AND $thread['thread_rate_count'] > 0)
{
$__output .= '
					<a href="' . XenForo_Template_Helper_Core::link('threads/whoRated', $thread, array()) . '" title="' . 'Who has rated this thread?' . '" class="OverlayTrigger"><span class="Hint">' . $hint . '</span></a>
				';
}
else
{
$__output .= '
				<span class="Hint">' . $hint . '</span>
				';
}
$__output .= '
			</dd>
		</dl>	
	</div>

';
}
