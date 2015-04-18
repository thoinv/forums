<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__extraData['title'] = '';
$__extraData['title'] .= XenForo_Template_Helper_Core::callHelper('resourcePrefix', array(
'0' => $resource,
'1' => 'escaped'
)) . htmlspecialchars($resource['title'], ENT_QUOTES, 'UTF-8') . ' - ' . 'Rate This Resource';
$__output .= '
';
$__extraData['h1'] = '';
$__extraData['h1'] .= 'Rate This Resource';
$__output .= '

';
$__extraData['navigation'] = array();
$__extraData['navigation'] = XenForo_Template_Helper_Core::appendBreadCrumbs($__extraData['navigation'], $categoryBreadcrumbs);
$__extraData['navigation'][] = array('href' => XenForo_Template_Helper_Core::link('full:resources', $resource, array()), 'value' => XenForo_Template_Helper_Core::callHelper('resourcePrefix', array(
'0' => $resource
)) . htmlspecialchars($resource['title'], ENT_QUOTES, 'UTF-8'));
$__output .= '

<form action="' . XenForo_Template_Helper_Core::link('resources/rate', $resource, array()) . '" method="post" class="xenForm formOverlay AutoValidator" data-redirect="on">

	';
if ($existing)
{
$__output .= '
		<h3 class="subHeading"><em>' . 'Note' . '</em>: ' . 'You have already rated this version. Re-rating it will remove your existing rating or review.' . '</h3>
	';
}
$__output .= '

	<dl class="ctrlUnit">
		<dt>' . 'Rating' . ':</dt>
		<dd>
		';
if ($rating)
{
$__output .= '
			<input type="hidden" name="rating" value="' . htmlspecialchars($rating, ENT_QUOTES, 'UTF-8') . '" />
			';
$__compilerVar3 = '';
$__compilerVar3 .= htmlspecialchars($rating, ENT_QUOTES, 'UTF-8');
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
$__output .= '
		';
}
else
{
$__output .= '
			<select name="rating" class="textCtrl">
				<option value="1">1</option>
				<option value="2">2</option>
				<option value="3" selected="selected">3</option>
				<option value="4">4</option>
				<option value="5">5</option>
			</select>
		';
}
$__output .= '
		</dd>
	</dl>

	<dl class="ctrlUnit">
		<dt>
			' . 'Review' . ':
			';
if (!$xenOptions['resourceReviewRequired'])
{
$__output .= '<dfn>(' . 'Optional' . ')</dfn>';
}
$__output .= '
		</dt>
		<dd>
			<textarea name="message" id="review_' . htmlspecialchars($serverTime, ENT_QUOTES, 'UTF-8') . '_text" data-min-length="' . htmlspecialchars($xenOptions['resourceMinimumReviewLength'], ENT_QUOTES, 'UTF-8') . '" data-review-required="' . (($xenOptions['resourceReviewRequired']) ? ('1') : ('0')) . '" class="textCtrl Elastic" rows="2"></textarea>
			<p class="explain">
				' . 'Explain why you\'re giving this rating. Reviews which are not constructive may be removed without notice.' . '
				';
if ($xenOptions['resourceReviewRequired'])
{
$__output .= 'A review is required.';
}
$__output .= '
			</p>
		</dd>
	</dl>

	';
if ($xenOptions['resourceAllowAnonReview'])
{
$__output .= '
		<dl class="ctrlUnit">
			<dt></dt>
			<dd><ul>
				<li>
					<label><input type="checkbox" name="is_anonymous" value="1" /> ' . 'Submit review anonymously' . '</label>
					<p class="explain">' . 'If selected, the resource creator and other members will not be able to see that who wrote the review. However, staff will still be able to see this.' . '</p>
				</li>
			</ul></dd>
		</dl>
	';
}
$__output .= '

	<dl class="ctrlUnit submitUnit">
		<dt></dt>
		<dd>
			<input type="submit" class="button primary" value="' . 'Submit Rating' . '" id="review_' . htmlspecialchars($serverTime, ENT_QUOTES, 'UTF-8') . '_submit" />
			';
if ($xenOptions['resourceMinimumReviewLength'])
{
$__output .= '<p class="explain" id="review_' . htmlspecialchars($serverTime, ENT_QUOTES, 'UTF-8') . '_note" style="display:none">' . 'Your review must be at least ' . htmlspecialchars($xenOptions['resourceMinimumReviewLength'], ENT_QUOTES, 'UTF-8') . ' characters.' . '</p>';
}
$__output .= '
		</dd>
	</dl>

	<script>
	(function($)
	{
		var baseId = \'#review_' . htmlspecialchars($serverTime, ENT_QUOTES, 'UTF-8') . '_\',
			$text = $(baseId + \'text\'),
			$submit = $(baseId + \'submit\'),
			$explain = $(baseId + \'note\'),
			minLength = parseInt($text.data(\'min-length\'), 10),
			required = parseInt($text.data(\'review-required\'), 10),
			requirementsMet = null;

		if (!$explain.length)
		{
			return;
		}

		var checkLimits = function()
		{
			var len = $.trim($text.val()).length,
				met = (len >= minLength || (!len && !required));

			if (met === requirementsMet)
			{
				return;
			}
			requirementsMet = met;

			if (met)
			{
				$explain.hide();
				$submit.prop(\'disabled\', false).removeClass(\'disabled\');
			}
			else
			{
				$explain.show();
				$submit.prop(\'disabled\', true).addClass(\'disabled\');
			}
		};

		$text.on(\'change keypress keydown paste\', function() { setTimeout(checkLimits, 0); });
		checkLimits();
	})(jQuery);
	</script>

	<input type="hidden" name="_xfToken" value="' . htmlspecialchars($visitor['csrf_token_page'], ENT_QUOTES, 'UTF-8') . '" />
	<input type="hidden" name="_xfConfirm" value="1" />
</form>';
