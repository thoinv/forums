<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__extraData['title'] = '';
$__extraData['title'] .= 'Chat logs';
$__output .= '

';
$this->addRequiredExternal('js', 'js/modm/ajaxchat/logs.js');
$__output .= '

';
$__extraData['navigation'] = array();
$__extraData['navigation'][] = array('href' => XenForo_Template_Helper_Core::link('chat/chat-logs', false, array()), 'value' => 'Chat logs');
$__output .= '

<div class="main">
' . 'Search within chat history according to the following criteria:' . '
<form action="' . XenForo_Template_Helper_Core::link('chat/logs', false, array()) . '" method="post" class="xenForm AutoValidator AjaxChatLogs">
	<dl class="ctrlUnit">
		<dt><label for="ctrl_usernames">' . 'Members' . '</label></dt>
		<dd><input type="text" name="usernames" value="" id="ctrl_usernames" class="textCtrl AutoComplete" />
		<p class="explain">' . 'You can fill in several comma-separated usernames. Leave emptu in order to skip the username filter.' . '</p>
		</dd>
	</dl>
	<dl class="ctrlUnit">
		<dt>' . 'Messages sent between...' . '</dt>
		<dd>
			<input type="date" size="10" name="dateAfter_date" class="textCtrl autoSize" value="' . htmlspecialchars($dateTime, ENT_QUOTES, 'UTF-8') . '" /> à 

			<select name="dateAfter_hour" class="textCtrl autoSize">
				<option value="00" selected>00</option>
				<option value="01">01</option>
				<option value="02">02</option>
				<option value="03">03</option>
				<option value="04">04</option>
				<option value="05">05</option>
				<option value="06">06</option>
				<option value="07">07</option>
				<option value="08">08</option>
				<option value="09">09</option>
				<option value="10">10</option>
				<option value="11">11</option>
				<option value="12">12</option>
				<option value="13">13</option>
				<option value="14">14</option>
				<option value="15">15</option>
				<option value="16">16</option>
				<option value="17">17</option>
				<option value="18">18</option>
				<option value="19">19</option>
				<option value="20">20</option>
				<option value="21">21</option>
				<option value="22">22</option>
				<option value="23">23</option>
			</select> h <input type="text" size="1" name="dateAfter_mins" value="00" class="textCtrl autoSize SpinBox" step="15" max="59" min="00" /> min
		</dd>
	</dl>
	<dl class="ctrlUnit">
		<dt>' . 'and...' . '</dt>
		<dd>
			<input type="date" size="10" name="dateBefore_date" class="textCtrl autoSize" value="' . htmlspecialchars($dateTime, ENT_QUOTES, 'UTF-8') . '" /> à 

			<select name="dateBefore_hour" class="textCtrl autoSize">
				<option value="00">00</option>
				<option value="01">01</option>
				<option value="02">02</option>
				<option value="03">03</option>
				<option value="04">04</option>
				<option value="05">05</option>
				<option value="06">06</option>
				<option value="07">07</option>
				<option value="08">08</option>
				<option value="09">09</option>
				<option value="10">10</option>
				<option value="11">11</option>
				<option value="12">12</option>
				<option value="13">13</option>
				<option value="14">14</option>
				<option value="15">15</option>
				<option value="16">16</option>
				<option value="17">17</option>
				<option value="18">18</option>
				<option value="19">19</option>
				<option value="20">20</option>
				<option value="21">21</option>
				<option value="22">22</option>
				<option value="23" selected>23</option>
			</select> h <input type="text" size="1" name="dateBefore_mins" value="59" class="textCtrl autoSize SpinBox" step="15" max="59" min="00" /> min
		</dd>
	</dl>
	<dl class="ctrlUnit">
		<dt>' . 'In channel:' . '</dt>
		<dd>
			<select name="channels" class="textCtrl autoSize">
				<option value="" selected></option>
				';
foreach ($channels AS $channelName => $channelId)
{
$__output .= '
					<option value="' . htmlspecialchars($channelId, ENT_QUOTES, 'UTF-8') . '">' . htmlspecialchars($channelName, ENT_QUOTES, 'UTF-8') . '</option>
				';
}
$__output .= '
				<option value="01">01</option>
			</select>
		</dd>
	</dl>
	<dl class="ctrlUnit submitUnit">
		<dt></dt>
		<dd><input type="submit" value="' . 'Load logs' . '" class="button primary" accesskey="s" /></dd>
	</dl>

	<input type="hidden" name="_xfToken" value="' . htmlspecialchars($visitor['csrf_token_page'], ENT_QUOTES, 'UTF-8') . '" />
</form>

<div class="section">
    <h2 class="subHeading">' . 'Chat logs' . '</h2>
    <div id="LogsEntries"></div>
    ';
if ($logEntries)
{
$__output .= '
        ';
$__compilerVar1 = '';
$this->addRequiredExternal('css', 'modm_ajaxchat_log');
$__compilerVar1 .= '

<div id="LogsEntries">
';
$__compilerVar2 = '';
$__compilerVar2 .= '
    ';
foreach ($logEntries AS $entry)
{
$__compilerVar2 .= '
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
$__compilerVar2 .= '
                    <a href="' . XenForo_Template_Helper_Core::link('members', $entry, array()) . '" class="modm_ajaxchat_username username">' . htmlspecialchars($entry['username'], ENT_QUOTES, 'UTF-8') . '</a>
                    ';
}
else
{
$__compilerVar2 .= '
                    ' . htmlspecialchars($entry['username'], ENT_QUOTES, 'UTF-8') . '
                    ';
}
$__compilerVar2 .= ' : </span>
                <span class="modm_ajaxchat_message">' . XenForo_Template_Helper_Core::callHelper('bodytext', array(
'0' => $entry['text']
)) . '</span>
            </div>
        </li>
    ';
}
$__compilerVar2 .= '
';
if (trim($__compilerVar2) !== '')
{
$__compilerVar1 .= '
<ul class="notes">
' . $__compilerVar2 . '
</ul>
';
}
else
{
$__compilerVar1 .= '
<div id="LogsListEmpty" class="secondaryContent">' . 'Erf. :( Nothing found!' . '</div>
';
}
unset($__compilerVar2);
$__compilerVar1 .= '
</div>';
$__output .= $__compilerVar1;
unset($__compilerVar1);
$__output .= '
    ';
}
else
{
$__output .= '
        <div id="LogsListEmpty" class="secondaryContent"></div>
    ';
}
$__output .= '
    <div class="sectionFooter"><a id="FooterLink" style="display: none;" href="' . XenForo_Template_Helper_Core::link('chat/logs', false, array()) . '" class="AjaxChatLogs"
                    data-target="#LogEntries" data-last-item-id="' . htmlspecialchars($lastItemId, ENT_QUOTES, 'UTF-8') . '">' . 'Load next log entries' . '</a></div>
</div>
</div>';
