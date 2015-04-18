<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__extraData['title'] = '';
$__extraData['title'] .= 'Mood Chooser';
$__output .= '

';
$__extraData['navigation'] = array();
$__extraData['navigation'][] = array('href' => XenForo_Template_Helper_Core::link('moods/mood-chooser', false, array()), 'value' => 'Mood Chooser');
$__output .= '

';
$this->addRequiredExternal('css', 'chooser_overlay');
$__output .= '
';
$this->addRequiredExternal('css', 'mood_chooser');
$__output .= '

';
$this->addRequiredExternal('js', 'js/xenmoods/xenmoods.js');
$__output .= '

<div class="section moodChooser" data-overlayClass="chooserOverlay">

	<h3 class="subHeading">' . 'Select the mood you are currently in' . '</h3>

	<ol class="primaryContent chooserColumns threeColumns">

		';
foreach ($moods AS $moodId => $mood)
{
$__output .= '
			<li' . (($selected == ($mood['mood_id'])) ? (' class="currentMood"') : ('')) . '>
				<a href="' . XenForo_Template_Helper_Core::link('moods/mood-chooser', '', array(
'mood_id' => $mood['mood_id'],
'_xfToken' => $visitor['csrf_token_page'],
'redirect' => $redirect
)) . '" class="UpdateMood">
					<img src="' . htmlspecialchars($mood['image_url'], ENT_QUOTES, 'UTF-8') . '" alt="' . htmlspecialchars($mood['title'], ENT_QUOTES, 'UTF-8') . '" />
				</a>
			</li>
		';
}
$__output .= '

	</ol>

	<div class="sectionFooter overlayOnly"><a class="button primary OverlayCloser">' . 'Cancel' . '</a></div>
</div>';
