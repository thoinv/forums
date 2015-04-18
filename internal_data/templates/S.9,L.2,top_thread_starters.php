<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
if ($TopThreadStarters)
{
$__output .= '
	';
if (!$xenOptions['TopthreadstarterExcludedavatars'])
{
$__output .= '
		<div class="section staffOnline avatarList">
			<div class="secondaryContent">
			<h3>' . 'Top Thread Starters' . '</h3>
				<ul>
					';
foreach ($TopThreadStarters AS $Tts)
{
$__output .= '
						<li>
							' . XenForo_Template_Helper_Core::callHelper('usernamehtml', array($Tts['user'],'',(true),array())) . '
							<div class="userTitle">' . 'The total number of threads created' . ': ' . htmlspecialchars($Tts['discussion_count'], ENT_QUOTES, 'UTF-8') . '</div>
						</li>
					';
}
$__output .= '
				</ul>
			</div>
		</div>
	';
}
else
{
$__output .= '
		<div class="section activeMembers">
			<div class="secondaryContent avatarHeap">
			<h3>' . 'Top Thread Starters' . '</h3>
				<ol>
					';
foreach ($TopThreadStarters AS $Tts)
{
$__output .= '
						<li>
							' . XenForo_Template_Helper_Core::callHelper('avatarhtml', array($Tts['user'],false,array(
'user' => '$Tts.user',
'size' => 's',
'text' => htmlspecialchars($Tts['username'], ENT_QUOTES, 'UTF-8') . ' (' . 'The total number of threads created' . ': ' . htmlspecialchars($Tts['discussion_count'], ENT_QUOTES, 'UTF-8') . ')',
'class' => 'Tooltip',
'title' => htmlspecialchars($Tts['username'], ENT_QUOTES, 'UTF-8') . ' (' . 'The total number of threads created' . ': ' . htmlspecialchars($Tts['discussion_count'], ENT_QUOTES, 'UTF-8') . ')'
),'')) . '
						</li>
					';
}
$__output .= '
				</ol>
			</div>
		</div>
	';
}
$__output .= '
';
}
