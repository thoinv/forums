<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__output .= '<ul dir="ltr" id="helper_birthday">
<li><select name="dob_month" class="textCtrl autoSize">
	<option value="0" ' . (($user['dob_month'] == 0) ? ' selected="selected"' : '') . '>&nbsp;</option>
	<option value="1" ' . (($user['dob_month'] == 1) ? ' selected="selected"' : '') . '>' . 'Tháng một' . '</option>
	<option value="2" ' . (($user['dob_month'] == 2) ? ' selected="selected"' : '') . '>' . 'Tháng hai' . '</option>
	<option value="3" ' . (($user['dob_month'] == 3) ? ' selected="selected"' : '') . '>' . 'Tháng ba' . '</option>
	<option value="4" ' . (($user['dob_month'] == 4) ? ' selected="selected"' : '') . '>' . 'Tháng tư' . '</option>
	<option value="5" ' . (($user['dob_month'] == 5) ? ' selected="selected"' : '') . '>' . 'Tháng năm' . '</option>
	<option value="6" ' . (($user['dob_month'] == 6) ? ' selected="selected"' : '') . '>' . 'Tháng sáu' . '</option>
	<option value="7" ' . (($user['dob_month'] == 7) ? ' selected="selected"' : '') . '>' . 'Tháng bảy' . '</option>
	<option value="8" ' . (($user['dob_month'] == 8) ? ' selected="selected"' : '') . '>' . 'Tháng tám' . '</option>
	<option value="9" ' . (($user['dob_month'] == 9) ? ' selected="selected"' : '') . '>' . 'Tháng chín' . '</option>
	<option value="10" ' . (($user['dob_month'] == 10) ? ' selected="selected"' : '') . '>' . 'Tháng mười' . '</option>
	<option value="11" ' . (($user['dob_month'] == 11) ? ' selected="selected"' : '') . '>' . 'Tháng mười một' . '</option>
	<option value="12" ' . (($user['dob_month'] == 12) ? ' selected="selected"' : '') . '>' . 'Tháng mười hai' . '</option>
</select></li>
<li><input type="text" name="dob_day" value="' . (($user['dob_day']) ? (htmlspecialchars($user['dob_day'], ENT_QUOTES, 'UTF-8')) : ('')) . '" class="textCtrl autoSize" placeholder="' . 'Ngày' . '" size="2" maxlength="2" /></li>
<li><input type="text" name="dob_year" value="' . (($user['dob_year']) ? (htmlspecialchars($user['dob_year'], ENT_QUOTES, 'UTF-8')) : ('')) . '" class="textCtrl autoSize" placeholder="' . 'Năm' . '" size="4" maxlength="4" /></li>
</ul>';
