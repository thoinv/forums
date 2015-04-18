<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__extraData['title'] = '';
$__extraData['title'] .= htmlspecialchars($event['event_title'], ENT_QUOTES, 'UTF-8') . ' - ' . 'Edit';
$__output .= '
';
$__extraData['h1'] = '';
$__extraData['h1'] .= htmlspecialchars($event['event_title'], ENT_QUOTES, 'UTF-8') . ' - ' . 'Edit';
$__output .= '

';
$__extraData['navigation'] = array();
$__extraData['navigation'][] = array('href' => XenForo_Template_Helper_Core::link('full:events', $event, array()), 'value' => htmlspecialchars($event['event_title'], ENT_QUOTES, 'UTF-8'));
$__output .= '

';
$this->addRequiredExternal('css', 'EWRatendo');
$__output .= '
';
$this->addRequiredExternal('js', 'js/8wayrun/EWRatendo_ajax.js');
$__output .= '

<div class="sectionMain">
	<form action="' . XenForo_Template_Helper_Core::link('events/edit', $event, array()) . '" method="post" class="xenForm AutoValidator" data-redirect="true">
		<fieldset>
			';
$__compilerVar1 = '';
$__compilerVar1 .= htmlspecialchars($thread['prefix_id'], ENT_QUOTES, 'UTF-8');
$__compilerVar2 = '';
$__compilerVar2 .= 'event_edit';
$__compilerVar3 = '';
if ($prefixes OR $forcePrefixes)
{
$__compilerVar3 .= '

	';
$this->addRequiredExternal('js', 'js/xenforo/title_prefix.js');
$__compilerVar3 .= '
	';
$this->addRequiredExternal('css', 'title_prefix_edit');
$__compilerVar3 .= '
	
	<dl class="ctrlUnit" id="PrefixContainer_' . htmlspecialchars($__compilerVar2, ENT_QUOTES, 'UTF-8') . '">
		<dt><label for="ctrl_prefix_id_' . htmlspecialchars($__compilerVar2, ENT_QUOTES, 'UTF-8') . '">' . 'Prefix' . ':</label></dt>
		<dd>
			<select name="prefix_id" id="ctrl_prefix_id_' . htmlspecialchars($__compilerVar2, ENT_QUOTES, 'UTF-8') . '" class="textCtrl TitlePrefix"
				data-container="#PrefixContainer_' . htmlspecialchars($__compilerVar2, ENT_QUOTES, 'UTF-8') . '"
				data-textbox="#ctrl_title_' . htmlspecialchars($__compilerVar2, ENT_QUOTES, 'UTF-8') . '"
				' . (($nodeControl) ? ('data-nodecontrol="' . htmlspecialchars($nodeControl, ENT_QUOTES, 'UTF-8') . '" data-prefixurl="' . XenForo_Template_Helper_Core::link('forums/-/prefixes', false, array()) . '"') : ('')) . '>
				';
$__compilerVar4 = '';
$__compilerVar4 .= '<option value="0" data-css="prefix noPrefix" ' . (($__compilerVar1 == 0) ? ' selected="selected"' : '') . '>(' . 'No prefix' . ')</option>
';
foreach ($prefixes AS $prefixGroup)
{
$__compilerVar4 .= '
	';
if ($prefixGroup['title'])
{
$__compilerVar4 .= '
		<optgroup label="' . htmlspecialchars($prefixGroup['title'], ENT_QUOTES, 'UTF-8') . '">
		';
foreach ($prefixGroup['prefixes'] AS $prefix)
{
$__compilerVar4 .= '
			<option value="' . htmlspecialchars($prefix['prefix_id'], ENT_QUOTES, 'UTF-8') . '" data-css="' . htmlspecialchars($prefix['css_class'], ENT_QUOTES, 'UTF-8') . '" ' . (($__compilerVar1 == $prefix['prefix_id']) ? ' selected="selected"' : '') . '>' . XenForo_Template_Helper_Core::callHelper('threadPrefix', array(
'0' => $prefix['prefix_id'],
'1' => 'escaped',
'2' => ''
)) . '</option>
		';
}
$__compilerVar4 .= '
		</optgroup>
	';
}
else
{
$__compilerVar4 .= '
		';
foreach ($prefixGroup['prefixes'] AS $prefix)
{
$__compilerVar4 .= '
			<option value="' . htmlspecialchars($prefix['prefix_id'], ENT_QUOTES, 'UTF-8') . '" data-css="' . htmlspecialchars($prefix['css_class'], ENT_QUOTES, 'UTF-8') . '" ' . (($__compilerVar1 == $prefix['prefix_id']) ? ' selected="selected"' : '') . '>' . XenForo_Template_Helper_Core::callHelper('threadPrefix', array(
'0' => $prefix['prefix_id'],
'1' => 'escaped',
'2' => ''
)) . '</option>
		';
}
$__compilerVar4 .= '
	';
}
$__compilerVar4 .= '
';
}
$__compilerVar3 .= $__compilerVar4;
unset($__compilerVar4);
$__compilerVar3 .= '
			</select>
		</dd>
	</dl>
	
';
}
$__output .= $__compilerVar3;
unset($__compilerVar1, $__compilerVar2, $__compilerVar3);
$__output .= '

			<dl class="ctrlUnit">
				<dt><label for="ctrl_title_event_edit">' . 'Event' . ':</label></dt>
				<dd><input type="text" name="event_title" class="textCtrl" id="ctrl_title_event_edit" value="' . htmlspecialchars($event['event_title'], ENT_QUOTES, 'UTF-8') . '" />
					<p class="hint">' . 'Do not include date/location info in the event title. It will be added automatically.' . '</p>
				</dd>
			</dl>

			';
if ($editorTemplate)
{
$__output .= '
				<dl class="ctrlUnit fullWidth">
					<dt></dt>
					<dd>' . $editorTemplate . '</dd>
				</dl>
			';
}
$__output .= '
		</fieldset>

		<fieldset>
			<dl class="ctrlUnit">
				<dt><label for="ctrl_venue">' . 'Venue' . ':</label></dt>
				<dd><input type="text" name="event_venue" class="textCtrl" id="ctrl_venue" value="' . htmlspecialchars($event['event_venue'], ENT_QUOTES, 'UTF-8') . '" /></dd>
			</dl>

			';
if ($xenOptions['EWRatendo_extendedvenue'])
{
$__output .= '
				<dl class="ctrlUnit">
					<dt><label for="ctrl_address">' . 'Address' . ':</label></dt>
					<dd><input type="text" name="event_address" class="textCtrl GoogleMap" id="ctrl_address" value="' . htmlspecialchars($event['event_address'], ENT_QUOTES, 'UTF-8') . '" /></dd>
				</dl>

				<dl class="ctrlUnit">
					<dt><label for="ctrl_citystate">' . 'City, State' . ':</label></dt>
					<dd><input type="text" name="event_citystate" class="textCtrl GoogleMap" id="ctrl_citystate" value="' . htmlspecialchars($event['event_citystate'], ENT_QUOTES, 'UTF-8') . '" /></dd>
				</dl>

				<dl class="ctrlUnit">
					<dt><label for="ctrl_zipcode">' . 'Zipcode' . ':</label></dt>
					<dd><input type="text" name="event_zipcode" class="textCtrl GoogleMap" id="ctrl_zipcode" value="' . htmlspecialchars($event['event_zipcode'], ENT_QUOTES, 'UTF-8') . '" /></dd>
				</dl>

				<dl class="ctrlUnit fullWidth">
					<dt></dt>
					<dd><iframe width="100%" height="350" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" id="ctrl_googlemap"
						src="' . htmlspecialchars($event['location'], ENT_QUOTES, 'UTF-8') . '"></iframe></dd>
				</dl>
			';
}
$__output .= '

			<dl class="ctrlUnit">
				<dt><label for="ctrl_strtime">' . 'Start/End Time' . ':</label></dt>
				<dd>
					<input type="date" size="10" name="event_date" class="textCtrl autoSize" value="' . htmlspecialchars($event['event_date'], ENT_QUOTES, 'UTF-8') . '" />
					&nbsp;' . 'at' . '&nbsp;

					';
if ($xenOptions['EWRatendo_24hour'])
{
$__output .= '
						<select name="event_time" class="textCtrl autoSize">
							<option value="24" ' . (($event['event_time'] == ('24')) ? ' selected="selected"' : '') . '>00</option>
							<option value="01" ' . (($event['event_time'] == ('01')) ? ' selected="selected"' : '') . '>01</option>
							<option value="02" ' . (($event['event_time'] == ('02')) ? ' selected="selected"' : '') . '>02</option>
							<option value="03" ' . (($event['event_time'] == ('03')) ? ' selected="selected"' : '') . '>03</option>
							<option value="04" ' . (($event['event_time'] == ('04')) ? ' selected="selected"' : '') . '>04</option>
							<option value="05" ' . (($event['event_time'] == ('05')) ? ' selected="selected"' : '') . '>05</option>
							<option value="06" ' . (($event['event_time'] == ('06')) ? ' selected="selected"' : '') . '>06</option>
							<option value="07" ' . (($event['event_time'] == ('07')) ? ' selected="selected"' : '') . '>07</option>
							<option value="08" ' . (($event['event_time'] == ('08')) ? ' selected="selected"' : '') . '>08</option>
							<option value="09" ' . (($event['event_time'] == ('09')) ? ' selected="selected"' : '') . '>09</option>
							<option value="10" ' . (($event['event_time'] == ('10')) ? ' selected="selected"' : '') . '>10</option>
							<option value="11" ' . (($event['event_time'] == ('11')) ? ' selected="selected"' : '') . '>11</option>
							<option value="13" ' . (($event['event_time'] == ('13')) ? ' selected="selected"' : '') . '>13</option>
							<option value="14" ' . (($event['event_time'] == ('14')) ? ' selected="selected"' : '') . '>14</option>
							<option value="15" ' . (($event['event_time'] == ('15')) ? ' selected="selected"' : '') . '>15</option>
							<option value="16" ' . (($event['event_time'] == ('16')) ? ' selected="selected"' : '') . '>16</option>
							<option value="17" ' . (($event['event_time'] == ('17')) ? ' selected="selected"' : '') . '>17</option>
							<option value="18" ' . (($event['event_time'] == ('18')) ? ' selected="selected"' : '') . '>18</option>
							<option value="19" ' . (($event['event_time'] == ('19')) ? ' selected="selected"' : '') . '>19</option>
							<option value="20" ' . (($event['event_time'] == ('20')) ? ' selected="selected"' : '') . '>20</option>
							<option value="21" ' . (($event['event_time'] == ('21')) ? ' selected="selected"' : '') . '>21</option>
							<option value="22" ' . (($event['event_time'] == ('22')) ? ' selected="selected"' : '') . '>22</option>
							<option value="23" ' . (($event['event_time'] == ('23')) ? ' selected="selected"' : '') . '>23</option>
						</select>';
if ($xenOptions['EWRatendo_minutes'])
{
$__output .= ':<select
							 name="event_mins" class="textCtrl autoSize">
								<option value="00" ' . (($event['event_mins'] == ('00')) ? ' selected="selected"' : '') . '>00</option>
								<option value="15" ' . (($event['event_mins'] == ('15')) ? ' selected="selected"' : '') . '>15</option>
								<option value="30" ' . (($event['event_mins'] == ('30')) ? ' selected="selected"' : '') . '>30</option>
								<option value="45" ' . (($event['event_mins'] == ('45')) ? ' selected="selected"' : '') . '>45</option>
							</select>
						';
}
else
{
$__output .= ':00 
						';
}
$__output .= '
					';
}
else
{
$__output .= '
						<select name="event_time" class="textCtrl autoSize">
							<option value="12" ' . (($event['event_time'] == ('12')) ? ' selected="selected"' : '') . '>12</option>
							<option value="01" ' . (($event['event_time'] == ('01')) ? ' selected="selected"' : '') . '>01</option>
							<option value="02" ' . (($event['event_time'] == ('02')) ? ' selected="selected"' : '') . '>02</option>
							<option value="03" ' . (($event['event_time'] == ('03')) ? ' selected="selected"' : '') . '>03</option>
							<option value="04" ' . (($event['event_time'] == ('04')) ? ' selected="selected"' : '') . '>04</option>
							<option value="05" ' . (($event['event_time'] == ('05')) ? ' selected="selected"' : '') . '>05</option>
							<option value="06" ' . (($event['event_time'] == ('06')) ? ' selected="selected"' : '') . '>06</option>
							<option value="07" ' . (($event['event_time'] == ('07')) ? ' selected="selected"' : '') . '>07</option>
							<option value="08" ' . (($event['event_time'] == ('08')) ? ' selected="selected"' : '') . '>08</option>
							<option value="09" ' . (($event['event_time'] == ('09')) ? ' selected="selected"' : '') . '>09</option>
							<option value="10" ' . (($event['event_time'] == ('10')) ? ' selected="selected"' : '') . '>10</option>
							<option value="11" ' . (($event['event_time'] == ('11')) ? ' selected="selected"' : '') . '>11</option>
						</select>';
if ($xenOptions['EWRatendo_minutes'])
{
$__output .= ':<select
							 name="event_mins" class="textCtrl autoSize">
								<option value="00" ' . (($event['event_mins'] == ('00')) ? ' selected="selected"' : '') . '>00</option>
								<option value="15" ' . (($event['event_mins'] == ('15')) ? ' selected="selected"' : '') . '>15</option>
								<option value="30" ' . (($event['event_mins'] == ('30')) ? ' selected="selected"' : '') . '>30</option>
								<option value="45" ' . (($event['event_mins'] == ('45')) ? ' selected="selected"' : '') . '>45</option>
							</select>
						';
}
else
{
$__output .= ':00 
						';
}
$__output .= ' 
						<select name="event_ampm" class="textCtrl autoSize">
							<option value="AM" ' . (($event['event_ampm'] == ('AM')) ? ' selected="selected"' : '') . '>AM</option>
							<option value="PM" ' . (($event['event_ampm'] == ('PM')) ? ' selected="selected"' : '') . '>PM</option>
						</select>
					';
}
$__output .= '

					&nbsp;' . 'for' . '&nbsp;
					<input type="text" size="1" name="event_length" value="' . htmlspecialchars($event['event_length'], ENT_QUOTES, 'UTF-8') . '" class="textCtrl autoSize SpinBox" step="1" max="' . htmlspecialchars($xenOptions['EWRatendo_maxhours'], ENT_QUOTES, 'UTF-8') . '" min="' . htmlspecialchars($xenOptions['EWRatendo_minhours'], ENT_QUOTES, 'UTF-8') . '" />
					&nbsp;' . 'Hours' . '
				</dd>
			</dl>

			<dl class="ctrlUnit">
				<dt><label for="ctrl_timezone">' . 'Time Zone' . ':</label></dt>
				<dd>
					<select name="event_timezone" class="textCtrl" id="ctrl_timezone">
						';
foreach ($timeZones AS $identifier => $name)
{
$__output .= '
							<option value="' . htmlspecialchars($identifier, ENT_QUOTES, 'UTF-8') . '" ' . (($identifier == $event['event_timezone']) ? ' selected="selected"' : '') . '>' . htmlspecialchars($name, ENT_QUOTES, 'UTF-8') . '</option>
						';
}
$__output .= '
					</select>
				</dd>
			</dl>
		</fieldset>

		<dl class="ctrlUnit submitUnit">
			<dt></dt>
			<dd>
				<input type="submit" value="' . 'Save Event' . '" name="submit" accesskey="s" class="button primary" />
				<a href="' . XenForo_Template_Helper_Core::link('events/unload', $event, array()) . '" type="button" class="button OverlayTrigger">' . 'Delete RSVPs' . '...</a>
				<a href="' . XenForo_Template_Helper_Core::link('events/delete', $event, array()) . '" type="button" class="button OverlayTrigger">' . 'Delete Event' . '...</a>
			</dd>
		</dl>

		<fieldset>
			<dl class="ctrlUnit">
				<dt>' . 'Options' . ':</dt>
				<dd><ul>

					<li><label for="ctrl_recur"><input type="checkbox" name="event_recur" value="1" class="Disabler" id="ctrl_recur" ' . (($event['recur_check']) ? ' checked="checked"' : '') . ' /> ' . 'Recur This Event Every' . ':</label>
						<ul id="ctrl_recur_Disabler">
							<li>
								<input type="text" size="5" name="event_recur_count" value="' . htmlspecialchars($event['event_recur_count'], ENT_QUOTES, 'UTF-8') . '" class="textCtrl autoSize" />
								<select name="event_recur_units" class="textCtrl autoSize">
									<option value="days" ' . (($event['event_recur_units'] == ('days')) ? ' selected="selected"' : '') . '>' . 'Days' . '</option>
									<option value="weeks" ' . (($event['event_recur_units'] == ('weeks')) ? ' selected="selected"' : '') . '>' . 'Weeks' . '</option>
									<option value="months" ' . (($event['event_recur_units'] == ('months')) ? ' selected="selected"' : '') . '>' . 'Months' . '</option>
								</select>
								&nbsp;&nbsp;&nbsp;
								';
if ($xenOptions['EWRatendo_endlessevents'])
{
$__output .= '
									<label for="ctrl_expire"><input type="checkbox" name="event_expire" value="1" class="Disabler" id="ctrl_expire" ' . (($event['event_expire']) ? ('checked') : ('')) . ' /> ' . 'Stop After' . ':</label>
									<span id="ctrl_expire_Disabler"><input type="date" size="10" name="event_recur_expire" class="textCtrl autoSize" value="' . htmlspecialchars($event['event_expire'], ENT_QUOTES, 'UTF-8') . '" /></span>
								';
}
else
{
$__output .= '
									<input type="hidden" name="event_expire" value="1" />
									<label for="ctrl_expire">' . 'Stop After' . ':</label>
									<input type="date" size="10" name="event_recur_expire" class="textCtrl autoSize" value="' . htmlspecialchars($event['event_expire'], ENT_QUOTES, 'UTF-8') . '" />
								';
}
$__output .= '
							</li>
						</ul>
						<p class="hint">' . 'If you set a stop date, this event will stop repeating after that time.' . '</p>
					</li>

					<li>
						<label for="ctrl_rsvp"><input type="checkbox" name="event_rsvp" value="1" id="ctrl_rsvp" ' . (($event['event_rsvp']) ? ('checked') : ('')) . ' /> ' . 'Enable RSVP System' . '</label>
						<p class="hint">' . 'If selected, users will be able to respond with their attendance.' . '</p>
					</li>

				</ul></dd>
			</dl>
		</fieldset>

		<input type="hidden" name="_xfToken" value="' . htmlspecialchars($visitor['csrf_token_page'], ENT_QUOTES, 'UTF-8') . '" />
	</form>
</div>

';
$__compilerVar5 = '';
$__compilerVar5 .= '<div class="atendoCopy copyright muted">
	<a href="http://xenforo.com/community/resources/99/">XenAtendo</a>
	&copy; Jason Axelrod from <a href="http://8wayrun.com/">8WAYRUN.COM</a>
</div>';
$__output .= $__compilerVar5;
unset($__compilerVar5);
$__output .= '

<script type="text/javascript"><!--
var geoLocUrl = \'' . $xenOptions['EWRatendo_geoLocationUrl'] . '\';
--></script>';
