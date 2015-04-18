<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
if ($isPrivacySettings)
{
$__output .= '<h3 class="sectionHeader">' . 'Date of Birth Privacy' . '</h3>';
}
$__output .= '
<dl class="ctrlUnit' . ((!$isPrivacySettings) ? (' sectionLink') : ('')) . '">
	';
if ($isPrivacySettings)
{
$__output .= '
		<dt></dt>
	';
}
else
{
$__output .= '
		<dt><a href="' . XenForo_Template_Helper_Core::link('account/privacy', false, array()) . '">' . 'Edit Your Privacy Settings' . '</a></dt>
	';
}
$__output .= '
	<dd>
		<ul>
			<li>
				<label for="ctrl_show_dob_date"><input type="checkbox" name="show_dob_date" value="1" id="ctrl_show_dob_date" class="Disabler" ' . (($visitor['show_dob_date']) ? ' checked="checked"' : '') . ' /> ' . 'Show day and month of birth' . '</label>
				<ul id="ctrl_show_dob_date_Disabler">
					<li><label for="ctrl_show_dob_year"><input type="checkbox" name="show_dob_year" value="1" id="ctrl_show_dob_year" ' . (($visitor['show_dob_year']) ? ' checked="checked"' : '') . ' /> ' . 'Show year of birth' . '</label> <p class="hint">' . 'This will allow people to see your age.' . '</p></li>
				</ul>
			</li>
		</ul>
	</dd>
</dl>';
