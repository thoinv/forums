<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$this->addRequiredExternal('css', 'usermap');
$__output .= '
';
$this->addRequiredExternal('js', '//maps.google.com/maps/api/js?sensor=false');
$__output .= '
';
$this->addRequiredExternal('js', 'js/digitalpoint/usermap.js');
$__output .= '

';
$__extraData['title'] = '';
$__extraData['title'] .= 'User Map';
$__output .= '
';
$__extraData['pageDescription'] = array();
$__extraData['pageDescription']['content'] = '';
$__extraData['pageDescription']['content'] .= 'This is a map showing where in the world currently online users are located.';
$__output .= '

';
$__extraData['navigation'] = array();
$__extraData['navigation'][] = array('href' => XenForo_Template_Helper_Core::link('full:usermap/', false, array()), 'value' => 'User Map');
$__output .= '

<script type="text/javascript">
<!--
' . htmlspecialchars($js_array, ENT_QUOTES, 'UTF-8') . ';
DigitalPointUserMap._UserMap.user_location = new Array(' . htmlspecialchars($user_location['latitude'], ENT_QUOTES, 'UTF-8') . ', ' . htmlspecialchars($user_location['longitude'], ENT_QUOTES, 'UTF-8') . ');
//-->
</script>

<ul id="map_legend"> 
	<li><img src="js/digitalpoint/pins/red.png" alt="' . 'staff' . '" />' . 'Thành viên BQT' . '</li>
	<li><img src="js/digitalpoint/pins/green.png" alt="' . 'Thành viên đã đăng ký' . '" />' . 'Thành viên đã đăng ký' . '</li>
	<li><img src="js/digitalpoint/pins/orange.png" alt="' . 'Khách' . '" />' . 'Khách' . '</li>
	<li><img src="js/digitalpoint/pins/white.png" alt="' . 'Spider' . '" />' . 'Spider' . '</li>
	<li style="font-weight:normal">' . 'Xem' . ': <select id="move_and_zoom"><option value="">' . 'World' . '<option value="usa">' . 'United States' . '<option value="europe">' . 'Europe' . '<option value="india">' . 'India' . '<option value="oceania">' . 'Oceania' . '<option value="me">' . 'Show Yourself' . '</select></li>
</ul>

<div id="map"></div>';
