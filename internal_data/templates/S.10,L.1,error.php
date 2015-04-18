<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__extraData['title'] = '';
$__extraData['title'] .= 'Error';
$__output .= '
';
$__extraData['h1'] = '';
$__extraData['h1'] .= htmlspecialchars($xenOptions['boardTitle'], ENT_QUOTES, 'UTF-8') . ' - ' . 'Error';
$__output .= '

';
$__extraData['head']['robots'] = '';
$__extraData['head']['robots'] .= '<meta name="robots" content="noindex" />';
$__output .= '

<div class="errorOverlay">
	<a class="close OverlayCloser"></a>
	';
if (count($error) == 1)
{
$__output .= '
		';
if ($showHeading)
{
$__output .= '<h2 class="heading">' . 'The following error occurred' . ':</h2>';
}
$__output .= '
		
		<div class="baseHtml">
		';
foreach ($error AS $key => $value)
{
$__output .= '
			<label for="ctrl_' . htmlspecialchars($key, ENT_QUOTES, 'UTF-8') . '" class="OverlayCloser">' . $value . '</label>
		';
}
$__output .= '
		</div>
	';
}
else
{
$__output .= '
		';
if ($showHeading)
{
$__output .= '<h2 class="heading">' . 'Please correct the following errors' . ':</h2>';
}
$__output .= '
	
		<div class="baseHtml">
			<ul>
			';
foreach ($error AS $key => $value)
{
$__output .= '
				<li><label for="ctrl_' . htmlspecialchars($key, ENT_QUOTES, 'UTF-8') . '" class="OverlayCloser">' . $value . '</label></li>
			';
}
$__output .= '
			</ul>
		</div>
	';
}
$__output .= '
</div>';
