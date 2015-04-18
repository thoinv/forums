<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__extraData['title'] = '';
$__extraData['title'] .= XenForo_Template_Helper_Core::callHelper('resourcePrefix', array(
'0' => $resource,
'1' => 'escaped'
)) . htmlspecialchars($resource['title'], ENT_QUOTES, 'UTF-8') . ' - ' . 'Reviews';
$__output .= '

';
$__extraData['head']['canonical'] = '';
$__extraData['head']['canonical'] .= '
	<link rel="canonical" href="' . XenForo_Template_Helper_Core::link('canonical:resources/reviews', $resource, array(
'page' => (($page > 1) ? ($page) : (''))
)) . '" />';
$__output .= '

<ol class="reviews">
';
foreach ($reviews AS $review)
{
$__output .= '
	';
$__compilerVar4 = '';
$this->addRequiredExternal('css', 'message_simple');
$__compilerVar4 .= '
';
$this->addRequiredExternal('css', 'resource_review');
$__compilerVar4 .= '
';
$this->addRequiredExternal('css', 'bb_code');
$__compilerVar4 .= '

<li id="review-' . htmlspecialchars($review['resource_version_id'], ENT_QUOTES, 'UTF-8') . '-' . htmlspecialchars($review['user_id'], ENT_QUOTES, 'UTF-8') . '" class="primaryContent review messageSimple ' . (($review['is_admin'] OR $review['is_moderator']) ? ('staff') : ('')) . ' ' . (($review['rating_state'] == ('deleted')) ? ('resourceReviewDeleted') : ('')) . ' ' . (($review['isIgnored']) ? (' ignored') : ('')) . '" data-author="' . htmlspecialchars($review['username'], ENT_QUOTES, 'UTF-8') . '">

	' . XenForo_Template_Helper_Core::callHelper('avatarhtml', array($review,(true),array(
'user' => '$review',
'size' => 's',
'img' => 'true'
),'')) . '

	<div class="messageInfo">

		<div class="messageContent ToggleTriggerAnchor">
			' . XenForo_Template_Helper_Core::callHelper('usernamehtml', array($review,'',false,array(
'class' => 'poster'
))) . '
			';
if ($review['is_anonymous'] AND $review['canViewAnonymous'])
{
$__compilerVar4 .= '
				(' . XenForo_Template_Helper_Core::callHelper('usernamehtml', array($review['user'],'',false,array())) . ')
			';
}
$__compilerVar4 .= '
			';
$__compilerVar5 = '';
$__compilerVar5 .= htmlspecialchars($review['rating'], ENT_QUOTES, 'UTF-8');
$__compilerVar6 = '';
$this->addRequiredExternal('css', 'rating');
$__compilerVar6 .= '

';
if ($action)
{
$__compilerVar6 .= '
	';
$this->addRequiredExternal('js', 'js/xenforo/rating.js');
$__compilerVar6 .= '

	<form action="' . htmlspecialchars($action, ENT_QUOTES, 'UTF-8') . '" method="post" class="rating RatingWidget" ' . (($microdata) ? ('itemscope="itemscope" itemtype="http://data-vocabulary.org/Rating"') : ('')) . '>
		<dl>
			<dt class="prompt muted">' . $prompt . '</dt>
			<dd>
				<span class="ratings">
					 <button type="submit" name="rating" value="1" class="star ' . (($__compilerVar5 >= 1) ? ('Full') : ('')) . (($__compilerVar5 >= 0.5 AND $__compilerVar5 < 1) ? ('Half') : ('')) . '" title="' . 'Terrible' . '">1</button
					><button type="submit" name="rating" value="2" class="star ' . (($__compilerVar5 >= 2) ? ('Full') : ('')) . (($__compilerVar5 >= 1.5 AND $__compilerVar5 < 2) ? ('Half') : ('')) . '" title="' . 'Poor' . '">2</button
					><button type="submit" name="rating" value="3" class="star ' . (($__compilerVar5 >= 3) ? ('Full') : ('')) . (($__compilerVar5 >= 2.5 AND $__compilerVar5 < 3) ? ('Half') : ('')) . '" title="' . 'Average' . '">3</button
					><button type="submit" name="rating" value="4" class="star ' . (($__compilerVar5 >= 4) ? ('Full') : ('')) . (($__compilerVar5 >= 3.5 AND $__compilerVar5 < 4) ? ('Half') : ('')) . '" title="' . 'Good' . '">4</button
					><button type="submit" name="rating" value="5" class="star ' . (($__compilerVar5 >= 5) ? ('Full') : ('')) . (($__compilerVar5 >= 4.5 AND $__compilerVar5 < 5) ? ('Half') : ('')) . '" title="' . 'Excellent' . '">5</button>
				</span>
			
				<span class="RatingValue"><span class="Number" itemprop="average">' . htmlspecialchars($__compilerVar5, ENT_QUOTES, 'UTF-8') . '</span>/<span itemprop="best">5</span>,</span>
				';
if ($threadrating['whoRated'] AND $controllerName == ('XenForo_ControllerPublic_Thread') AND $thread['thread_rate_count'] > 0)
{
$__compilerVar6 .= '
					<a href="' . XenForo_Template_Helper_Core::link('threads/whoRated', $thread, array()) . '" title="' . 'Who has rated this thread?' . '" class="OverlayTrigger"><span class="Hint">' . $hint . '</span></a>
				';
}
else
{
$__compilerVar6 .= '
				<span class="Hint">' . $hint . '</span>
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
			<dt class="prompt muted">' . $prompt . '</dt>
			<dd>		
				<span class="ratings" title="' . XenForo_Template_Helper_Core::numberFormat($__compilerVar5, '2') . '">
					 <span class="star ' . (($__compilerVar5 >= 1) ? ('Full') : ('')) . (($__compilerVar5 >= 0.5 AND $__compilerVar5 < 1) ? ('Half') : ('')) . '"></span
					><span class="star ' . (($__compilerVar5 >= 2) ? ('Full') : ('')) . (($__compilerVar5 >= 1.5 AND $__compilerVar5 < 2) ? ('Half') : ('')) . '"></span
					><span class="star ' . (($__compilerVar5 >= 3) ? ('Full') : ('')) . (($__compilerVar5 >= 2.5 AND $__compilerVar5 < 3) ? ('Half') : ('')) . '"></span
					><span class="star ' . (($__compilerVar5 >= 4) ? ('Full') : ('')) . (($__compilerVar5 >= 3.5 AND $__compilerVar5 < 4) ? ('Half') : ('')) . '"></span
					><span class="star ' . (($__compilerVar5 >= 5) ? ('Full') : ('')) . (($__compilerVar5 >= 4.5 AND $__compilerVar5 < 5) ? ('Half') : ('')) . '"></span>
				</span>
				
				<span class="RatingValue"><span class="Number" itemprop="average">' . htmlspecialchars($__compilerVar5, ENT_QUOTES, 'UTF-8') . '</span>/<span itemprop="best">5</span>,</span>
				';
if ($threadrating['whoRated'] AND $controllerName == ('XenForo_ControllerPublic_Thread') AND $thread['thread_rate_count'] > 0)
{
$__compilerVar6 .= '
					<a href="' . XenForo_Template_Helper_Core::link('threads/whoRated', $thread, array()) . '" title="' . 'Who has rated this thread?' . '" class="OverlayTrigger"><span class="Hint">' . $hint . '</span></a>
				';
}
else
{
$__compilerVar6 .= '
				<span class="Hint">' . $hint . '</span>
				';
}
$__compilerVar6 .= '
			</dd>
		</dl>	
	</div>

';
}
$__compilerVar4 .= $__compilerVar6;
unset($__compilerVar5, $__compilerVar6);
$__compilerVar4 .= '
			';
if (!$resource['isFilelessNoExternal'])
{
$__compilerVar4 .= '<span class="muted">' . 'Version' . ': ' . htmlspecialchars($review['version_string'], ENT_QUOTES, 'UTF-8') . '</span>';
}
$__compilerVar4 .= '
			';
if ($review['rating_state'] == ('deleted'))
{
$__compilerVar4 .= '
				<div class="reviewDeletedNotice">
					<span class="icon"></span>
					' . 'This review has been deleted.' . ' <a href="javascript:" class="JsOnly ToggleTrigger" data-target=".ugc">' . 'Xem' . '</a>
				</div>
			';
}
$__compilerVar4 .= '
			<article><blockquote class="ugc baseHtml' . (($review['isIgnored']) ? (' ignored') : ('')) . '">' . XenForo_Template_Helper_Core::callHelper('bodyText', array(
'0' => $review['message']
)) . '</blockquote></article>
		</div>

		<div class="messageMeta">
			<div class="privateControls">
				<a href="' . XenForo_Template_Helper_Core::link('resources/reviews', $resource, array(
'review' => $review
)) . '" title="' . 'Permalink' . '" class="item muted">' . XenForo_Template_Helper_Core::callHelper('datetimehtml', array($review['rating_date'],array(
'time' => '$review.rating_date'
))) . '</a>
				';
if ($review['canDelete'])
{
$__compilerVar4 .= '
					<a href="' . XenForo_Template_Helper_Core::link('resources/reviews/delete', $resource, array(
'review' => $review
)) . '" class="item OverlayTrigger control delete"><span></span>' . 'Xóa' . '</a>
				';
}
$__compilerVar4 .= '
				';
if ($review['canUndelete'])
{
$__compilerVar4 .= '
					<a href="' . XenForo_Template_Helper_Core::link('resources/reviews/undelete', $resource, array(
'review' => $review,
't' => $visitor['csrf_token_page']
)) . '" class="item OverlayTrigger control undelete"><span></span>' . 'Undelete' . '</a>
				';
}
$__compilerVar4 .= '
				';
if ($canViewIps AND $review['ip_id'])
{
$__compilerVar4 .= '
					<a href="' . XenForo_Template_Helper_Core::link('resources/reviews/ip', $resource, array(
'review' => $review
)) . '" class="item control ip OverlayTrigger"><span></span>' . 'IP' . '</a>
				';
}
$__compilerVar4 .= '

				';
if ($review['canWarn'])
{
$__compilerVar4 .= '
					<a href="' . XenForo_Template_Helper_Core::link('members/warn', $review, array(
'content_type' => 'resource_rating',
'content_id' => $review['resource_rating_id']
)) . '" class="item control warn"><span></span>' . 'Cảnh cáo' . '</a>
				';
}
else if ($review['warning_id'] AND $canViewWarnings)
{
$__compilerVar4 .= '
					<a href="' . XenForo_Template_Helper_Core::link('warnings', $review, array()) . '" class="OverlayTrigger item control viewWarning"><span></span>' . 'View Warning' . '</a>
				';
}
$__compilerVar4 .= '

				';
if ($review['canReport'])
{
$__compilerVar4 .= '
					<a href="' . XenForo_Template_Helper_Core::link('resources/reviews/report', $resource, array(
'review' => $review
)) . '" class="OverlayTrigger item control report" data-cacheOverlay="false"><span></span>' . 'Báo cáo' . '</a>
				';
}
$__compilerVar4 .= '
			</div>

			';
if ($review['canReply'])
{
$__compilerVar4 .= '
				<div class="publicControls">
					<a href="' . XenForo_Template_Helper_Core::link('resources/reviews/reply', $resource, array(
'review' => $review
)) . '" class="OverlayTrigger item control reply"><span></span>' . 'Trả lời' . '</a>
				</div>
			';
}
$__compilerVar4 .= '
		</div>

		';
if ($review['author_response'])
{
$__compilerVar4 .= '
			<ol class="messageResponse">
				<li class="comment secondaryContent">
					' . XenForo_Template_Helper_Core::callHelper('avatarhtml', array($resource,(true),array(
'user' => '$resource',
'size' => 's',
'img' => 'true'
),'')) . '

					<div class="commentInfo">
						<div class="commentContent">
							<a href="' . XenForo_Template_Helper_Core::link('members', $resource, array()) . '" class="username poster">' . 'Author\'s Response' . '</a>
							<article><blockquote>' . XenForo_Template_Helper_Core::callHelper('bodyText', array(
'0' => $review['author_response']
)) . '</blockquote></article>
						</div>
						';
if ($review['canDeleteResponse'])
{
$__compilerVar4 .= '
							<div class="commentControls">
								<a href="' . XenForo_Template_Helper_Core::link('resources/reviews/delete', $resource, array(
'review' => $review,
'response' => '1'
)) . '" class="OverlayTrigger control delete"><span></span>' . 'Xóa' . '</a>
							</div>
						';
}
$__compilerVar4 .= '
					</div>

				</li>
			</ol>
		';
}
$__compilerVar4 .= '

	</div>
</li>';
$__output .= $__compilerVar4;
unset($__compilerVar4);
$__output .= '
';
}
$__output .= '
</ol>

<div class="pageNavLinkGroup">
	<div class="linkGroup"' . ((!$ignoredNames) ? (' style="display: none"') : ('')) . '><a href="javascript:" class="muted jsOnly DisplayIgnoredContent Tooltip" title="' . 'Show hidden content by ' . XenForo_Template_Helper_Core::callHelper('implode', array(
'0' => $ignoredNames,
'1' => ', '
)) . '' . '">' . 'Show Ignored Content' . '</a></div>
	' . XenForo_Template_Helper_Core::callHelper('pagenavhtml', array('public', htmlspecialchars($perPage, ENT_QUOTES, 'UTF-8'), htmlspecialchars($resource['review_count'], ENT_QUOTES, 'UTF-8'), htmlspecialchars($page, ENT_QUOTES, 'UTF-8'), 'resources/reviews', $resource, array(), false, array())) . '
</div>';
