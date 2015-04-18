<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__extraData['title'] = '';
$__extraData['title'] .= 'Privacy';
$__output .= '

';
$this->addRequiredExternal('css', 'account');
$__output .= '

<form method="post" class="xenForm privacyForm AutoValidator"
	action="' . XenForo_Template_Helper_Core::link('account/privacy-save', false, array()) . '"
	data-fieldValidatorUrl="' . XenForo_Template_Helper_Core::link('account/validate-field.json', false, array()) . '">
	
	';
$__compilerVar1 = '';
$__compilerVar1 .= '

	<dl class="ctrlUnit surplusLabel">
		<dt><label>' . 'Activity Display' . ':</label></dt>
		<dd>
			<ul>
				<li>
					<label for="ctrl_visible"><input type="checkbox" name="visible" value="1" id="ctrl_visible" class="OptOut Disabler" ' . (($visitor['visible']) ? ' checked="checked"' : '') . ' /> ' . 'Show your online status' . '</label>
					<p class="hint">' . 'This will allow other people to see when you are online.' . '</p>
					<ul id="ctrl_visible_Disabler">
						<li>
							<label><input type="checkbox" name="activity_visible" value="1" class="OptOut" ' . (($visitor['activity_visible']) ? ' checked="checked"' : '') . ' /> ' . 'Show your current activity' . '</label>
							<p class="hint">' . 'This will allow other people to see what page you are currently viewing.' . '</p>
						</li>
					</ul>
				</li>
			</ul>
		</dd>
	</dl>

	<dl class="ctrlUnit surplusLabel">
		<dt><label>' . 'Administrator Email' . ':</label></dt>
		<dd>
			<ul>
				<li><label for="ctrl_receive_admin_email"><input type="checkbox" name="receive_admin_email" value="1" id="ctrl_receive_admin_email" class="OptOut" ' . (($visitor['receive_admin_email']) ? ' checked="checked"' : '') . ' /> ' . 'Receive site mailings' . '</label> <p class="hint">' . 'You will receive a copy of emails sent by the administrator to all members of the site.' . '</p></li>
			</ul>
		</dd>
	</dl>

	';
$__compilerVar2 = '';
if ($isPrivacySettings)
{
$__compilerVar2 .= '<h3 class="sectionHeader">' . 'Date of Birth Privacy' . '</h3>';
}
$__compilerVar2 .= '
<dl class="ctrlUnit' . ((!$isPrivacySettings) ? (' sectionLink') : ('')) . '">
	';
if ($isPrivacySettings)
{
$__compilerVar2 .= '
		<dt></dt>
	';
}
else
{
$__compilerVar2 .= '
		<dt><a href="' . XenForo_Template_Helper_Core::link('account/privacy', false, array()) . '">' . 'Edit Your Privacy Settings' . '</a></dt>
	';
}
$__compilerVar2 .= '
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
$__compilerVar1 .= $__compilerVar2;
unset($__compilerVar2);
$__compilerVar1 .= '
	
	';
$__output .= $this->callTemplateHook('account_privacy_top', $__compilerVar1, array());
unset($__compilerVar1);
$__output .= '

	<h3 class="sectionHeader">' . 'People Who May' . '...</h3>

	<fieldset>
		<dl class="ctrlUnit sectionLink" id="personal_details">
			<dt><a href="' . XenForo_Template_Helper_Core::link('account/personal-details', false, array()) . '">' . 'Edit Your Personal Details' . '</a></dt>
			<dd>
				<ul>
					';
$__compilerVar3 = '';
$__compilerVar3 .= '
					<li><label for="ctrl_allow_view_profile_enable"><input type="checkbox" name="allow_view_profile_enable" value="1" id="ctrl_allow_view_profile_enable" class="Disabler OptOut" ' . (($visitor['allow_view_profile'] != ('none')) ? ' checked="checked"' : '') . ' /> ' . 'View your details on your profile page' . ':</label>
						<ul id="ctrl_allow_view_profile_enable_Disabler">
							<li>
								<select name="allow_view_profile" class="textCtrl autoSize" id="ctrl_allow_view_profile">
									<option value="everyone" ' . (($visitor['allow_view_profile'] == ('everyone')) ? ' selected="selected"' : '') . '>' . 'All Visitors' . '</option>
									<option value="members"  ' . (($visitor['allow_view_profile'] == ('members')) ? ' selected="selected"' : '') . '>' . 'Members Only' . '</option>
									<option value="followed" ' . (($visitor['allow_view_profile'] == ('followed')) ? ' selected="selected"' : '') . '>' . 'People You Follow Only' . '</option>
								
<option value="friends" ' . (($visitor['allow_view_profile'] == ('friends')) ? ' selected="selected"' : '') . '>' . 'Friends Only' . '</option>
</select>
							</li>
						</ul>
					</li>
					<li><label for="ctrl_allow_post_profile_enable"><input type="checkbox" name="allow_post_profile_enable" value="1" id="ctrl_allow_post_profile_enable" class="Disabler OptOut" ' . (($visitor['allow_post_profile'] != ('none')) ? ' checked="checked"' : '') . ' /> ' . 'Post messages on your profile page' . ':</label>
						<ul id="ctrl_allow_post_profile_enable_Disabler">
							<li>
								<select name="allow_post_profile" class="textCtrl autoSize" id="ctrl_allow_post_profile">
									
									<option value="members"  ' . (($visitor['allow_post_profile'] == ('members')) ? ' selected="selected"' : '') . '>' . 'Members Only' . '</option>
									<option value="followed" ' . (($visitor['allow_post_profile'] == ('followed')) ? ' selected="selected"' : '') . '>' . 'People You Follow Only' . '</option>
								
<option value="friends" ' . (($visitor['allow_post_profile'] == ('friends')) ? ' selected="selected"' : '') . '>' . 'Friends Only' . '</option>
</select>
							</li>
						</ul>
					</li>
					';
$__output .= $this->callTemplateHook('account_privacy_personal_details', $__compilerVar3, array());
unset($__compilerVar3);
$__output .= '
				</ul>
			</dd>
		</dl>

		';
if ($xenOptions['enableNewsFeed'])
{
$__output .= '
		<dl class="ctrlUnit surplusLabel">
			<dt><label for="ctrl_allow_receive_news_feed">' . 'News Feed' . ':</label></dt>
			<dd>
				<ul>
					';
$__compilerVar4 = '';
$__compilerVar4 .= '
					<li><label for="ctrl_allow_receive_news_feed_enable"><input type="checkbox" name="allow_receive_news_feed_enable" value="1" id="ctrl_allow_receive_news_feed_enable" class="Disabler OptOut" ' . (($visitor['allow_receive_news_feed'] != ('none')) ? ' checked="checked"' : '') . ' /> ' . 'Receive your news feed' . ':</label>
						<ul id="ctrl_allow_receive_news_feed_enable_Disabler">
							<li>
								<select name="allow_receive_news_feed" class="textCtrl autoSize" id="ctrl_allow_receive_news_feed">
									<option value="everyone" ' . (($visitor['allow_receive_news_feed'] == ('everyone')) ? ' selected="selected"' : '') . '>' . 'All Visitors' . '</option>
									<option value="members"  ' . (($visitor['allow_receive_news_feed'] == ('members')) ? ' selected="selected"' : '') . '>' . 'Members Only' . '</option>
									<option value="followed" ' . (($visitor['allow_receive_news_feed'] == ('followed')) ? ' selected="selected"' : '') . '>' . 'People You Follow Only' . '</option>
								
<option value="friends" ' . (($visitor['allow_receive_news_feed'] == ('friends')) ? ' selected="selected"' : '') . '>' . 'Friends Only' . '</option>
</select>
							</li>
						</ul>
					</li>
					';
$__output .= $this->callTemplateHook('account_privacy_news_feed', $__compilerVar4, array());
unset($__compilerVar4);
$__output .= '
				</ul>
			</dd>
		</dl>
	</fieldset>
	';
}
else
{
$__output .= '
	<input type="hidden" name="allow_receive_news_feed" value="' . htmlspecialchars($visitor['allow_receive_news_feed'], ENT_QUOTES, 'UTF-8') . '" />
	';
}
$__output .= '

	<fieldset>
		<dl class="ctrlUnit sectionLink" id="contact_details">
			<dt><a href="' . XenForo_Template_Helper_Core::link('account/contact-details', false, array()) . '">' . 'Edit Your Contact Details' . '</a></dt>
			<dd>
				<ul>
					';
$__compilerVar5 = '';
$__compilerVar5 .= '
					<li><label for="ctrl_allow_send_personal_conversation_enable"><input type="checkbox" name="allow_send_personal_conversation_enable" value="1" id="ctrl_allow_send_personal_conversation_enable" class="Disabler OptOut" ' . (($visitor['allow_send_personal_conversation'] != ('none')) ? ' checked="checked"' : '') . ' /> ' . 'Start conversations with you' . ':</label>
						<ul id="ctrl_allow_send_personal_conversation_enable_Disabler">
							<li>
								<select name="allow_send_personal_conversation" class="textCtrl autoSize" id="ctrl_allow_send_personal_conversation">
									
									<option value="members"  ' . (($visitor['allow_send_personal_conversation'] == ('members')) ? ' selected="selected"' : '') . '>' . 'Members Only' . '</option>
									<option value="followed" ' . (($visitor['allow_send_personal_conversation'] == ('followed')) ? ' selected="selected"' : '') . '>' . 'People You Follow Only' . '</option>
								
<option value="friends" ' . (($visitor['allow_send_personal_conversation'] == ('friends')) ? ' selected="selected"' : '') . '>' . 'Friends Only' . '</option>
</select>
							</li>
						</ul>
					</li>
					<li><label for="ctrl_allow_view_identities_enable"><input type="checkbox" name="allow_view_identities_enable" value="1" id="ctrl_allow_view_identities_enable" class="Disabler OptOut" ' . (($visitor['allow_view_identities'] != ('none')) ? ' checked="checked"' : '') . ' /> ' . 'View your identities' . ':</label>
						<ul id="ctrl_allow_view_identities_enable_Disabler">
							<li>
								<select name="allow_view_identities" class="textCtrl autoSize" id="ctrl_allow_view_identities">
									<option value="everyone" ' . (($visitor['allow_view_identities'] == ('everyone')) ? ' selected="selected"' : '') . '>' . 'All Visitors' . '</option>
									<option value="members"  ' . (($visitor['allow_view_identities'] == ('members')) ? ' selected="selected"' : '') . '>' . 'Members Only' . '</option>
									<option value="followed" ' . (($visitor['allow_view_identities'] == ('followed')) ? ' selected="selected"' : '') . '>' . 'People You Follow Only' . '</option>
								
<option value="friends" ' . (($visitor['allow_view_identities'] == ('friends')) ? ' selected="selected"' : '') . '>' . 'Friends Only' . '</option>
</select>
							</li>
						</ul>
					</li>
					';
$__output .= $this->callTemplateHook('account_privacy_contact_details', $__compilerVar5, array());
unset($__compilerVar5);
$__output .= '
				</ul>
			</dd>
		</dl>
	</fieldset>
	
	';
$__compilerVar6 = '';
$__output .= $this->callTemplateHook('account_privacy_bottom', $__compilerVar6, array());
unset($__compilerVar6);
$__output .= '

	<dl class="ctrlUnit submitUnit">
		<dt></dt>
		<dd><input type="submit" name="save" value="' . 'Save Changes' . '" accesskey="s" class="button primary" /></dd>
	</dl>

	<input type="hidden" name="_xfToken" value="' . htmlspecialchars($visitor['csrf_token_page'], ENT_QUOTES, 'UTF-8') . '" />
</form>';
