<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$this->addRequiredExternal('css', 'modm_ajaxchat_log');
$__output .= '

';
foreach ($logEntries AS $entry)
{
$__output .= '<li class="secondaryContent" id="log-entry-' . htmlspecialchars($entry['message_id'], ENT_QUOTES, 'UTF-8') . '">
        <div>
            <span class="modm_ajaxchat_timestamp">' . XenForo_Template_Helper_Core::callHelper('datetimehtml', array($entry['message_date'],array(
'time' => '$entry.message_date'
))) . '
       		</span>
	        <span class="modm_ajaxchat_username">
	            ';
if ($entry['user_id'] != $chatBotId)
{
$__output .= '
                <a href="' . XenForo_Template_Helper_Core::link('members', $entry, array()) . '" class="modm_ajaxchat_username username">' . htmlspecialchars($entry['username'], ENT_QUOTES, 'UTF-8') . '</a>
	            ';
}
else
{
$__output .= '
                ' . htmlspecialchars($entry['username'], ENT_QUOTES, 'UTF-8') . '
	            ';
}
$__output .= ' : </span>
    	    <span class="modm_ajaxchat_message">' . XenForo_Template_Helper_Core::callHelper('bodytext', array(
'0' => $entry['text']
)) . '</span>
        </div>
    </li>';
}
