<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__output .= '<li class="section">
    <h4 class="subHeading">' . 'XenGallery Settings' . '</h4>
    <ul>
        <li>
            <a class="' . (($selectedKey == ('account/xengallery-privacy')) ? ('secondaryContent') : ('primaryContent')) . '"
               href="' . XenForo_Template_Helper_Core::link('account/xengallery-privacy', false, array()) . '">' . 'Privacy Settings' . '</a>
        </li>
        <li>
            <a class="' . (($selectedKey == ('account/xengallery-alert')) ? ('secondaryContent') : ('primaryContent')) . '"
               href="' . XenForo_Template_Helper_Core::link('account/xengallery-alert', false, array()) . '">' . 'Alert Settings' . '</a>
        </li>
    </ul>
</li>';
