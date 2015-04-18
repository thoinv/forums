<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$this->addRequiredExternal('css', 'EWRblock_AjaxChatShoutbox');
$__output .= '

<div class="section">		
	<div class="secondaryContent">
	<h3><a href="' . XenForo_Template_Helper_Core::link('chat/login', false, array()) . '" title="' . 'Chat' . '">' . 'Shoutbox' . '</a></h3>
        <div class="ajaxChatShoutbox">
            ' . $AjaxChatShoutbox . '
        </div>
    </div>
</div>';
