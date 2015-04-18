<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$this->addRequiredExternal('css', 'andy_useragent');
$__output .= '

';
$__extraData['title'] = '';
$__extraData['title'] .= 'User Agent';
$__output .= '

' . 'Total of' . ' ' . htmlspecialchars($total, ENT_QUOTES, 'UTF-8') . ' ' . 'members in the past' . ' ' . htmlspecialchars($hours, ENT_QUOTES, 'UTF-8') . ' ' . 'Hours' . '
<br><br>
' . 'Chrome' . ' = ' . htmlspecialchars($chrome, ENT_QUOTES, 'UTF-8') . '
<br>
' . 'Firefox' . ' = ' . htmlspecialchars($firefox, ENT_QUOTES, 'UTF-8') . '
<br>
' . 'MSIE' . ' = ' . htmlspecialchars($msie, ENT_QUOTES, 'UTF-8') . '
<br>
' . 'Safari' . ' = ' . htmlspecialchars($safari, ENT_QUOTES, 'UTF-8') . '
<br><br>
' . 'Android' . ' = ' . htmlspecialchars($android, ENT_QUOTES, 'UTF-8') . '
<br>
' . 'iPad' . ' = ' . htmlspecialchars($ipad, ENT_QUOTES, 'UTF-8') . '
<br>
' . 'iPhone' . ' = ' . htmlspecialchars($iphone, ENT_QUOTES, 'UTF-8') . '
<br><br>

<table class="dataTable">

    <tr class="dataRow">
    	<th>' . 'User Name' . '</th>
	<th>' . 'IP' . '</th>
        <th>' . 'User Agent' . '</th>
        <th>' . 'View Date' . '</th>
    </tr>
    
    ';
foreach ($results AS $result)
{
$__output .= '
    <tr class="dataRow useragentDataRow">
        <td><a href="' . XenForo_Template_Helper_Core::link('members/' . htmlspecialchars($result['user_id'], ENT_QUOTES, 'UTF-8') . '/', false, array()) . '" />' . htmlspecialchars($result['username'], ENT_QUOTES, 'UTF-8') . '</a></td>      
        <td><a href="http://whatismyipaddress.com/ip/' . htmlspecialchars($result['ip'], ENT_QUOTES, 'UTF-8') . '" target="_blank">' . htmlspecialchars($result['ip'], ENT_QUOTES, 'UTF-8') . '</a></td>
        <td>' . htmlspecialchars($result['user_agent'], ENT_QUOTES, 'UTF-8') . '</td>
        <td>' . XenForo_Template_Helper_Core::datetime($result['view_date'], '') . '</td>
    </tr>
    ';
}
$__output .= '
    
</table>';
