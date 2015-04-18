<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__output .= '<div class="section membersOnline userList">
    <div class="secondaryContent">
        <h3>' . 'Today\'s Online Visitors' . ' (' . XenForo_Template_Helper_Core::numberFormat(count($todayOnlineUsers), '0') . ')</h3>
        <ul class="listInline commaImplode">
            ';
foreach ($todayOnlineUsers AS $user)
{
$__output .= '
              <li>' . XenForo_Template_Helper_Core::callHelper('usernamehtml', array($user,'',(true),array(
'itemprop' => 'name'
))) . '</li>
            ';
}
$__output .= '
        </ul>
    </div>
</div>';
