<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__extraData['title'] = '';
$__extraData['title'] .= 'Language Chooser';
$__output .= '

';
$__extraData['head']['metaNoindex'] = '';
$__extraData['head']['metaNoindex'] .= '<meta name="robots" content="noindex" />';
$__output .= '

';
$this->addRequiredExternal('css', 'chooser_overlay');
$__output .= '

<div class="section" data-overlayClass="chooserOverlay">

	<h3 class="subHeading">' . 'Select the language in which this site should be shown' . '</h3>

	<ol class="primaryContent chooserColumns threeColumns">

		';
foreach ($languages AS $language)
{
$__output .= '
			<li><a href="' . XenForo_Template_Helper_Core::link('misc/language', '', array(
'language_id' => $language['language_id'],
'_xfToken' => $visitor['csrf_token_page'],
'redirect' => $redirect
)) . '">' . htmlspecialchars($language['title'], ENT_QUOTES, 'UTF-8') . '</a></li>
		';
}
$__output .= '

	</ol>

	<div class="sectionFooter overlayOnly"><a class="button primary OverlayCloser">' . 'Cancel' . '</a></div>

</div>';
