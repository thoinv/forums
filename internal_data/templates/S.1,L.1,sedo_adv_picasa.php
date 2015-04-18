<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$this->addRequiredExternal('css', 'sedo_adv_picasa');
$__output .= '

';
if ($rendererStates['canViewBbCode'])
{
$__output .= '
	';
if ($options['type'] == ('album'))
{
$__output .= '	
		<div id="' . htmlspecialchars($options['id'], ENT_QUOTES, 'UTF-8') . '" class="bbcode_picassa ' . (($options['responsiveMode']) ? ('responsive') : ('')) . '">
			<embed 	type="application/x-shockwave-flash"
				wmode="transparent" 
				src="https://picasaweb.google.com/s/c/bin/slideshow.swf"
				width="' . htmlspecialchars($options['width'], ENT_QUOTES, 'UTF-8') . '"
				height="' . htmlspecialchars($options['height'], ENT_QUOTES, 'UTF-8') . '"
				flashvars="host=picasaweb.google.com' . $options['extra'] . '&amp;debug=1&amp;hl=' . htmlspecialchars($xenOptions['sedo_adv_picasa_lang'], ENT_QUOTES, 'UTF-8') . '&amp;feat=flashalbum&amp;RGB=0x' . htmlspecialchars($options['hexaColor'], ENT_QUOTES, 'UTF-8') . '&amp;feed=https%3A%2F%2Fpicasaweb.google.com%2Fdata%2Ffeed%2Fapi%2Fuser%2F' . htmlspecialchars($options['user'], ENT_QUOTES, 'UTF-8') . '%2Falbumid%2F' . htmlspecialchars($options['albumid'], ENT_QUOTES, 'UTF-8') . '%3Falt%3Drss%26kind%3Dphoto' . htmlspecialchars($options['authkey'], ENT_QUOTES, 'UTF-8') . '%26hl%3D' . htmlspecialchars($xenOptions['sedo_adv_picasa_lang'], ENT_QUOTES, 'UTF-8') . '" pluginspage="http://www.macromedia.com/go/getflashplayer">
			</embed>
		</div>
	';
}
else if ($options['type'] == ('photo'))
{
$__output .= '
		<div id="' . htmlspecialchars($options['id'], ENT_QUOTES, 'UTF-8') . '" class="bbcode_picassa ' . (($options['responsiveMode']) ? ('responsive') : ('')) . '">
			<a href="' . htmlspecialchars($options['img_urlLink'], ENT_QUOTES, 'UTF-8') . '" target="_blank">
				<img class="picasa_image" width="' . htmlspecialchars($options['width'], ENT_QUOTES, 'UTF-8') . '" height="' . htmlspecialchars($options['height'], ENT_QUOTES, 'UTF-8') . '" src="' . htmlspecialchars($options['img_urlImg'], ENT_QUOTES, 'UTF-8') . '" alt="" />
			</a>
		</div>
	';
}
else
{
$__output .= '
		';
if ($options['error'] == ('code1'))
{
$__output .= '
			' . 'Impossible to find the RSS link' . '
		';
}
else if ($options['error'] == ('code2'))
{
$__output .= '
			' . 'The URL doesn\'t seem to come from Picasa' . '
		';
}
else if ($options['error'] == ('code3'))
{
$__output .= '
			' . 'The URL you\'re using seems to be a direct link to a Picasa Album, please use instead its RSS link.' . '
		';
}
else if ($options['error'] == ('code4'))
{
$__output .= '
			' . 'You are supposed to use a Picasa URL with this BB Code and more precisely a RSS Album link.' . '
		';
}
else if ($options['error'] == ('code5'))
{
$__output .= '
			' . 'The Picasa Image URL has some problems' . '
		';
}
else
{
$__output .= '
			' . 'Unknown error' . '
		';
}
$__output .= '
	';
}
$__output .= '
';
}
else if (!$rendererStates['canViewBbCode'] AND $xenOptions['sedo_adv_picasa_noperms_icon'])
{
$__output .= '
	';
if ($options['contentIsUrl'])
{
$__output .= '
		<a href="' . $content . '" target="_blank">
			<img style="vertical-align:middle;width:20px;height:20px" src="' . htmlspecialchars($xenOptions['boardUrl'], ENT_QUOTES, 'UTF-8') . '/styles/sedo/picasa/picasa.png" alt="" />
				<span style="vertical-align:middle; font-size:14px; font-weight:bolder;">' . 'Picasa link' . '</span>
		</a>
	';
}
else
{
$__output .= '
		' . 'Content is not an url' . '
	';
}
$__output .= '
';
}
else
{
$__output .= '
	' . 'You\'re not authorised to see the Picasa content' . '
';
}
