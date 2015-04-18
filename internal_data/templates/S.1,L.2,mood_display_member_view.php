<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__output .= '<dt>' . 'Mood' . ':</dt>
	<dl>';
$__compilerVar2 = '';
if ($canViewMoods)
{
$__compilerVar2 .= '
	';
$this->addRequiredExternal('css', 'mood_display');
$__compilerVar2 .= '

	';
$moodImageUrl = '';
$moodImageUrl .= (($user['mood_id']) ? (htmlspecialchars($moods[$user['mood_id']]['image_url'], ENT_QUOTES, 'UTF-8')) : (htmlspecialchars($moods[$defaultMoodId]['image_url'], ENT_QUOTES, 'UTF-8')));
$__compilerVar2 .= '

	<div class="userMood">
		';
if ($visitor['user_id'] == $user['user_id'] && $canHaveMood)
{
$__compilerVar2 .= '
			<a href="' . XenForo_Template_Helper_Core::link('moods/mood-chooser', '', array(
'redirect' => $requestPaths['requestUri']
)) . '" class="OverlayTrigger Tooltip" title="' . 'Mood Chooser' . '" data-cacheOverlay="false" data-offsetY="-8">
				<img src="' . htmlspecialchars($moodImageUrl, ENT_QUOTES, 'UTF-8') . '" alt="' . htmlspecialchars($moods[$user['mood_id']]['title'], ENT_QUOTES, 'UTF-8') . '" />
			</a>
		';
}
else
{
$__compilerVar2 .= '
			<img src="' . htmlspecialchars($moodImageUrl, ENT_QUOTES, 'UTF-8') . '" alt="' . htmlspecialchars($moods[$user['mood_id']]['title'], ENT_QUOTES, 'UTF-8') . '" />
		';
}
$__compilerVar2 .= '
	</div>
';
}
$__output .= $__compilerVar2;
unset($__compilerVar2);
$__output .= '</dl>';
