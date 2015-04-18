<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__extraData['title'] = '';
$__extraData['title'] .= 'Create Event';
$__output .= '
';
$__extraData['h1'] = '';
$__extraData['h1'] .= 'Create Event';
$__output .= '

';
$this->addRequiredExternal('css', 'EWRatendo');
$__output .= '
';
$this->addRequiredExternal('js', 'js/8wayrun/EWRatendo_ajax.js');
$__output .= '

<div class="sectionMain">
	<form action="' . XenForo_Template_Helper_Core::link('events/create', false, array()) . '" method="post" class="xenForm AutoValidator" data-redirect="true">
		<fieldset>
			<dl class="ctrlUnit">
				<dt><label for="ctrl_title">' . 'Event' . ':</label></dt>
				<dd><input type="text" name="event_title" class="textCtrl" id="ctrl_title" value="' . htmlspecialchars($input['event_title'], ENT_QUOTES, 'UTF-8') . '" />
					<p class="hint">' . 'Do not include date/location info in the event title. It will be added automatically.' . '</p>
				</dd>
			</dl>

			<dl class="ctrlUnit fullWidth">
				<dt></dt>
				<dd>' . $editorTemplate . '</dd>
			</dl>
		</fieldset>

		<fieldset>
			<dl class="ctrlUnit">
				<dt><label for="ctrl_venue">' . 'Venue' . ':</label></dt>
				<dd><input type="text" name="event_venue" class="textCtrl" id="ctrl_venue" value="' . htmlspecialchars($input['event_venue'], ENT_QUOTES, 'UTF-8') . '" /></dd>
			</dl>

			';
if ($xenOptions['EWRatendo_extendedvenue'])
{
$__output .= '
				<dl class="ctrlUnit">
					<dt><label for="ctrl_address">' . 'Địa chỉ' . ':</label></dt>
					<dd><input type="text" name="event_address" class="textCtrl GoogleMap" id="ctrl_address" value="' . htmlspecialchars($input['event_address'], ENT_QUOTES, 'UTF-8') . '" /></dd>
				</dl>

				<dl class="ctrlUnit">
					<dt><label for="ctrl_citystate">' . 'City, State' . ':</label></dt>
					<dd><input type="text" name="event_citystate" class="textCtrl GoogleMap" id="ctrl_citystate" value="' . htmlspecialchars($input['event_citystate'], ENT_QUOTES, 'UTF-8') . '" /></dd>
				</dl>

				<dl class="ctrlUnit">
					<dt><label for="ctrl_zipcode">' . 'Zipcode' . ':</label></dt>
					<dd><input type="text" name="event_zipcode" class="textCtrl GoogleMap" id="ctrl_zipcode" value="' . htmlspecialchars($input['event_zipcode'], ENT_QUOTES, 'UTF-8') . '" /></dd>
				</dl>

				<dl class="ctrlUnit fullWidth">
					<dt></dt>
					<dd><iframe width="100%" height="350" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" id="ctrl_googlemap"
						src="' . htmlspecialchars($input['location'], ENT_QUOTES, 'UTF-8') . '"></iframe></dd>
				</dl>
			';
}
$__output .= '

			<dl class="ctrlUnit">
				<dt><label for="ctrl_strtime">' . 'Start/End Time' . ':</label></dt>
				<dd>
					<input type="date" size="10" name="event_date" class="textCtrl autoSize" value="' . htmlspecialchars($input['event_date'], ENT_QUOTES, 'UTF-8') . '" />
					&nbsp;' . 'at' . '&nbsp;

					';
if ($xenOptions['EWRatendo_24hour'])
{
$__output .= '
						<select name="event_time" class="textCtrl autoSize">
							<option value="24" ' . (($input['event_time'] == ('24')) ? ' selected="selected"' : '') . '>00</option>
							<option value="01" ' . (($input['event_time'] == ('01')) ? ' selected="selected"' : '') . '>01</option>
							<option value="02" ' . (($input['event_time'] == ('02')) ? ' selected="selected"' : '') . '>02</option>
							<option value="03" ' . (($input['event_time'] == ('03')) ? ' selected="selected"' : '') . '>03</option>
							<option value="04" ' . (($input['event_time'] == ('04')) ? ' selected="selected"' : '') . '>04</option>
							<option value="05" ' . (($input['event_time'] == ('05')) ? ' selected="selected"' : '') . '>05</option>
							<option value="06" ' . (($input['event_time'] == ('06')) ? ' selected="selected"' : '') . '>06</option>
							<option value="07" ' . (($input['event_time'] == ('07')) ? ' selected="selected"' : '') . '>07</option>
							<option value="08" ' . (($input['event_time'] == ('08')) ? ' selected="selected"' : '') . '>08</option>
							<option value="09" ' . (($input['event_time'] == ('09')) ? ' selected="selected"' : '') . '>09</option>
							<option value="10" ' . (($input['event_time'] == ('10')) ? ' selected="selected"' : '') . '>10</option>
							<option value="11" ' . (($input['event_time'] == ('11')) ? ' selected="selected"' : '') . '>11</option>
							<option value="13" ' . (($input['event_time'] == ('13')) ? ' selected="selected"' : '') . '>13</option>
							<option value="14" ' . (($input['event_time'] == ('14')) ? ' selected="selected"' : '') . '>14</option>
							<option value="15" ' . (($input['event_time'] == ('15')) ? ' selected="selected"' : '') . '>15</option>
							<option value="16" ' . (($input['event_time'] == ('16')) ? ' selected="selected"' : '') . '>16</option>
							<option value="17" ' . (($input['event_time'] == ('17')) ? ' selected="selected"' : '') . '>17</option>
							<option value="18" ' . (($input['event_time'] == ('18')) ? ' selected="selected"' : '') . '>18</option>
							<option value="19" ' . (($input['event_time'] == ('19')) ? ' selected="selected"' : '') . '>19</option>
							<option value="20" ' . (($input['event_time'] == ('20')) ? ' selected="selected"' : '') . '>20</option>
							<option value="21" ' . (($input['event_time'] == ('21')) ? ' selected="selected"' : '') . '>21</option>
							<option value="22" ' . (($input['event_time'] == ('22')) ? ' selected="selected"' : '') . '>22</option>
							<option value="23" ' . (($input['event_time'] == ('23')) ? ' selected="selected"' : '') . '>23</option>
						</select>';
if ($xenOptions['EWRatendo_minutes'])
{
$__output .= ':<select
							 name="event_mins" class="textCtrl autoSize">
								<option value="00" ' . (($input['event_mins'] == ('00')) ? ' selected="selected"' : '') . '>00</option>
								<option value="15" ' . (($input['event_mins'] == ('15')) ? ' selected="selected"' : '') . '>15</option>
								<option value="30" ' . (($input['event_mins'] == ('30')) ? ' selected="selected"' : '') . '>30</option>
								<option value="45" ' . (($input['event_mins'] == ('45')) ? ' selected="selected"' : '') . '>45</option>
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
							<option value="12" ' . (($input['event_time'] == ('12')) ? ' selected="selected"' : '') . '>12</option>
							<option value="01" ' . (($input['event_time'] == ('01')) ? ' selected="selected"' : '') . '>01</option>
							<option value="02" ' . (($input['event_time'] == ('02')) ? ' selected="selected"' : '') . '>02</option>
							<option value="03" ' . (($input['event_time'] == ('03')) ? ' selected="selected"' : '') . '>03</option>
							<option value="04" ' . (($input['event_time'] == ('04')) ? ' selected="selected"' : '') . '>04</option>
							<option value="05" ' . (($input['event_time'] == ('05')) ? ' selected="selected"' : '') . '>05</option>
							<option value="06" ' . (($input['event_time'] == ('06')) ? ' selected="selected"' : '') . '>06</option>
							<option value="07" ' . (($input['event_time'] == ('07')) ? ' selected="selected"' : '') . '>07</option>
							<option value="08" ' . (($input['event_time'] == ('08')) ? ' selected="selected"' : '') . '>08</option>
							<option value="09" ' . (($input['event_time'] == ('09')) ? ' selected="selected"' : '') . '>09</option>
							<option value="10" ' . (($input['event_time'] == ('10')) ? ' selected="selected"' : '') . '>10</option>
							<option value="11" ' . (($input['event_time'] == ('11')) ? ' selected="selected"' : '') . '>11</option>
						</select>';
if ($xenOptions['EWRatendo_minutes'])
{
$__output .= ':<select
							 name="event_mins" class="textCtrl autoSize">
								<option value="00" ' . (($input['event_mins'] == ('00')) ? ' selected="selected"' : '') . '>00</option>
								<option value="15" ' . (($input['event_mins'] == ('15')) ? ' selected="selected"' : '') . '>15</option>
								<option value="30" ' . (($input['event_mins'] == ('30')) ? ' selected="selected"' : '') . '>30</option>
								<option value="45" ' . (($input['event_mins'] == ('45')) ? ' selected="selected"' : '') . '>45</option>
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
							<option value="AM" ' . (($input['event_ampm'] == ('AM')) ? ' selected="selected"' : '') . '>AM</option>
							<option value="PM" ' . (($input['event_ampm'] == ('PM')) ? ' selected="selected"' : '') . '>PM</option>
						</select>
					';
}
$__output .= '

					&nbsp;' . 'for' . '&nbsp;
					<input type="text" size="1" name="event_length" value="' . htmlspecialchars($input['event_length'], ENT_QUOTES, 'UTF-8') . '" class="textCtrl autoSize SpinBox" step="1" max="' . htmlspecialchars($xenOptions['EWRatendo_maxhours'], ENT_QUOTES, 'UTF-8') . '" min="' . htmlspecialchars($xenOptions['EWRatendo_minhours'], ENT_QUOTES, 'UTF-8') . '" />
					&nbsp;' . 'Giờ' . '
				</dd>
			</dl>

			<dl class="ctrlUnit">
				<dt><label for="ctrl_timezone">' . 'Múi giờ' . ':</label></dt>
				<dd>
					<select name="event_timezone" class="textCtrl" id="ctrl_timezone">
						';
foreach ($timeZones AS $identifier => $name)
{
$__output .= '
							<option value="' . htmlspecialchars($identifier, ENT_QUOTES, 'UTF-8') . '" ' . (($identifier == $visitor['timezone']) ? ' selected="selected"' : '') . '>' . htmlspecialchars($name, ENT_QUOTES, 'UTF-8') . '</option>
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
			</dd>
		</dl>

		<fieldset>
			<dl class="ctrlUnit">
				<dt>' . 'Tùy chọn' . ':</dt>
				<dd><ul>

					<li><label for="ctrl_recur"><input type="checkbox" name="event_recur" value="1" class="Disabler" id="ctrl_recur" ' . (($input['event_recur']) ? ' checked="checked"' : '') . ' /> ' . 'Recur This Event Every' . ':</label>
						<ul id="ctrl_recur_Disabler">
							<li>
								<input type="text" size="5" name="event_recur_count" value="1" class="textCtrl autoSize" />
								<select name="event_recur_units" class="textCtrl autoSize">
									<option value="days" ' . (($input['event_recur_units'] == ('days')) ? ' selected="selected"' : '') . '>' . 'Ngày' . '</option>
									<option value="weeks" ' . (($input['event_recur_units'] == ('weeks')) ? ' selected="selected"' : '') . '>' . 'Tuần' . '</option>
									<option value="months" ' . (($input['event_recur_units'] == ('months')) ? ' selected="selected"' : '') . '>' . 'Tháng' . '</option>
								</select>
								&nbsp;&nbsp;&nbsp;
								';
if ($xenOptions['EWRatendo_endlessevents'])
{
$__output .= '
									<label for="ctrl_expire"><input type="checkbox" name="event_expire" value="1" class="Disabler" id="ctrl_expire" ' . (($input['event_expire']) ? ('checked') : ('')) . ' /> ' . 'Stop After' . ':</label>
									<span id="ctrl_expire_Disabler"><input type="date" size="10" name="event_recur_expire" class="textCtrl autoSize" value="' . htmlspecialchars($input['event_recur_expire'], ENT_QUOTES, 'UTF-8') . '" /></span>
								';
}
else
{
$__output .= '
									<input type="hidden" name="event_expire" value="1" />
									<label for="ctrl_expire">' . 'Stop After' . ':</label>
									<input type="date" size="10" name="event_recur_expire" class="textCtrl autoSize" value="' . htmlspecialchars($input['event_recur_expire'], ENT_QUOTES, 'UTF-8') . '" />
								';
}
$__output .= '
							</li>
						</ul>
						<p class="hint">' . 'If you set a stop date, this event will stop repeating after that time.' . '</p>
					</li>

					<li>
						<label for="ctrl_rsvp"><input type="checkbox" name="event_rsvp" value="1" id="ctrl_rsvp" ' . (($input['event_rsvp']) ? ('checked') : ('')) . ' /> ' . 'Enable RSVP System' . '</label>
						<p class="hint">' . 'If selected, users will be able to respond with their attendance.' . '</p>
					</li>

					';
$__compilerVar3 = '';
$__compilerVar3 .= '
										';
foreach ($forums AS $forum)
{
$__compilerVar3 .= '
											<option value="' . htmlspecialchars($forum['node_id'], ENT_QUOTES, 'UTF-8') . '" ' . (($selected == $forum['node_id']) ? ' selected="selected"' : '') . '>' . htmlspecialchars($forum['title'], ENT_QUOTES, 'UTF-8') . '</option>
										';
}
$__compilerVar3 .= '
									';
if (trim($__compilerVar3) !== '')
{
$__output .= '
					<li><label for="ctrl_thread"><input type="checkbox" name="create_thread" value="1" class="Disabler" id="ctrl_thread" ' . (($selected) ? ('checked') : ('')) . ' /> ' . 'Create Event Thread' . ':</label>
						<ul id="ctrl_thread_Disabler">
							<li>
								<select name="event_node" class="textCtrl autoSize">
									' . $__compilerVar3 . '
								</select>
							</li>
						</ul>
					</li>
					';
}
unset($__compilerVar3);
$__output .= '

				</ul></dd>
			</dl>
		</fieldset>

		<input type="hidden" name="_xfToken" value="' . htmlspecialchars($visitor['csrf_token_page'], ENT_QUOTES, 'UTF-8') . '" />
	</form>
</div>

';
$__compilerVar4 = '';
$__compilerVar4 .= '<div class="atendoCopy copyright muted">
	<a href="http://xenforo.com/community/resources/99/">XenAtendo</a>
	&copy; Jason Axelrod from <a href="http://8wayrun.com/">8WAYRUN.COM</a>
</div>';
$__output .= $__compilerVar4;
unset($__compilerVar4);
$__output .= '

<script type="text/javascript"><!--
var geoLocUrl = \'' . $xenOptions['EWRatendo_geoLocationUrl'] . '\';
--></script>';
