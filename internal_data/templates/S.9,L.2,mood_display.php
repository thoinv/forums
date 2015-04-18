<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
if ($canViewMoods)
{
$__output .= '
	';
$this->addRequiredExternal('css', 'mood_display');
$__output .= '

	';
$moodImageUrl = '';
$moodImageUrl .= (($user['mood_id']) ? (htmlspecialchars($moods[$user['mood_id']]['image_url'], ENT_QUOTES, 'UTF-8')) : (htmlspecialchars($moods[$defaultMoodId]['image_url'], ENT_QUOTES, 'UTF-8')));
$__output .= '

	<div class="userMood">
		';
if ($visitor['user_id'] == $user['user_id'] && $canHaveMood)
{
$__output .= '
			<a href="' . XenForo_Template_Helper_Core::link('moods/mood-chooser', '', array(
'redirect' => $requestPaths['requestUri']
)) . '" class="OverlayTrigger Tooltip" title="' . 'Mood Chooser' . '" data-cacheOverlay="false" data-offsetY="-8">
				<img src="' . htmlspecialchars($moodImageUrl, ENT_QUOTES, 'UTF-8') . '" alt="' . htmlspecialchars($moods[$user['mood_id']]['title'], ENT_QUOTES, 'UTF-8') . '" />
			</a>
		';
}
else
{
$__output .= '
			<img src="' . htmlspecialchars($moodImageUrl, ENT_QUOTES, 'UTF-8') . '" alt="' . htmlspecialchars($moods[$user['mood_id']]['title'], ENT_QUOTES, 'UTF-8') . '" />
		';
}
$__output .= '
	</div>
';
}
