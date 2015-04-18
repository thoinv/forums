<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$this->addRequiredExternal('css', 'modm_ajaxchat_log');
$__output .= '

<div id="LogsEntries">
';
$__compilerVar1 = '';
$__compilerVar1 .= '
    ';
foreach ($logEntries AS $entry)
{
$__compilerVar1 .= '
        <li class="secondaryContent" id="log-entry-' . htmlspecialchars($entry['message_id'], ENT_QUOTES, 'UTF-8') . '">
            <div>
                <span class="modm_ajaxchat_timestamp">' . XenForo_Template_Helper_Core::callHelper('datetimehtml', array($entry['message_date'],array(
'time' => '$entry.message_date'
))) . '
                </span>
                <span class="modm_ajaxchat_username">
                    ';
if ($entry['user_id'] != $chatBotId)
{
$__compilerVar1 .= '
                    <a href="' . XenForo_Template_Helper_Core::link('members', $entry, array()) . '" class="modm_ajaxchat_username username">' . htmlspecialchars($entry['username'], ENT_QUOTES, 'UTF-8') . '</a>
                    ';
}
else
{
$__compilerVar1 .= '
                    ' . htmlspecialchars($entry['username'], ENT_QUOTES, 'UTF-8') . '
                    ';
}
$__compilerVar1 .= ' : </span>
                <span class="modm_ajaxchat_message">' . XenForo_Template_Helper_Core::callHelper('bodytext', array(
'0' => $entry['text']
)) . '</span>
            </div>
        </li>
    ';
}
$__compilerVar1 .= '
';
if (trim($__compilerVar1) !== '')
{
$__output .= '
<ul class="notes">
' . $__compilerVar1 . '
</ul>
';
}
else
{
$__output .= '
<div id="LogsListEmpty" class="secondaryContent">' . 'Erf. :( Nothing found!' . '</div>
';
}
unset($__compilerVar1);
$__output .= '
</div>';
