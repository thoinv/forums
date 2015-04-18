<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__extraData['title'] = '';
$__extraData['title'] .= 'Bảo mật cá nhân';
$__output .= '

';
$this->addRequiredExternal('css', 'account');
$__output .= '

<form method="post" class="xenForm privacyForm AutoValidator"
	action="' . XenForo_Template_Helper_Core::link('account/privacy-save', false, array()) . '"
	data-fieldValidatorUrl="' . XenForo_Template_Helper_Core::link('account/validate-field.json', false, array()) . '">
	
	';
$__compilerVar7 = '';
$__compilerVar7 .= '

	<dl class="ctrlUnit surplusLabel">
		<dt><label>' . 'Activity Display' . ':</label></dt>
		<dd>
			<ul>
				<li>
					<label for="ctrl_visible"><input type="checkbox" name="visible" value="1" id="ctrl_visible" class="OptOut Disabler" ' . (($visitor['visible']) ? ' checked="checked"' : '') . ' /> ' . 'Hiển thị trạng thái trực tuyến' . '</label>
					<p class="hint">' . 'This will allow other people to see when you are online.' . '</p>
					<ul id="ctrl_visible_Disabler">
						<li>
							<label><input type="checkbox" name="activity_visible" value="1" class="OptOut" ' . (($visitor['activity_visible']) ? ' checked="checked"' : '') . ' /> ' . 'Show your current activity' . '</label>
							<p class="hint">' . 'Điều này sẽ cho phép tất cả mọi người nhìn thấy trang nào bạn đang xem.' . '</p>
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
				<li><label for="ctrl_receive_admin_email"><input type="checkbox" name="receive_admin_email" value="1" id="ctrl_receive_admin_email" class="OptOut" ' . (($visitor['receive_admin_email']) ? ' checked="checked"' : '') . ' /> ' . 'Nhận thông báo từ diễn đàn' . '</label> <p class="hint">' . 'Bạn sẽ nhận được bản sao email gửi từ Ban Quản Trị đến tất cả thành viên diễn đàn.' . '</p></li>
			</ul>
		</dd>
	</dl>

	';
$__compilerVar8 = '';
if ($isPrivacySettings)
{
$__compilerVar8 .= '<h3 class="sectionHeader">' . 'Bảo mật ngày sinh' . '</h3>';
}
$__compilerVar8 .= '
<dl class="ctrlUnit' . ((!$isPrivacySettings) ? (' sectionLink') : ('')) . '">
	';
if ($isPrivacySettings)
{
$__compilerVar8 .= '
		<dt></dt>
	';
}
else
{
$__compilerVar8 .= '
		<dt><a href="' . XenForo_Template_Helper_Core::link('account/privacy', false, array()) . '">' . 'Sửa cài đặt bảo mật cá nhân của bạn' . '</a></dt>
	';
}
$__compilerVar8 .= '
	<dd>
		<ul>
			<li>
				<label for="ctrl_show_dob_date"><input type="checkbox" name="show_dob_date" value="1" id="ctrl_show_dob_date" class="Disabler" ' . (($visitor['show_dob_date']) ? ' checked="checked"' : '') . ' /> ' . 'Hiển thị ngày và tháng sinh' . '</label>
				<ul id="ctrl_show_dob_date_Disabler">
					<li><label for="ctrl_show_dob_year"><input type="checkbox" name="show_dob_year" value="1" id="ctrl_show_dob_year" ' . (($visitor['show_dob_year']) ? ' checked="checked"' : '') . ' /> ' . 'Hiển thị năm sinh' . '</label> <p class="hint">' . 'Điều này sẽ cho phép mọi người nhìn thấy tuổi của bạn.' . '</p></li>
				</ul>
			</li>
		</ul>
	</dd>
</dl>';
$__compilerVar7 .= $__compilerVar8;
unset($__compilerVar8);
$__compilerVar7 .= '
	
	';
$__output .= $this->callTemplateHook('account_privacy_top', $__compilerVar7, array());
unset($__compilerVar7);
$__output .= '

	<h3 class="sectionHeader">' . 'Mọi người có thể' . '...</h3>

	<fieldset>
		<dl class="ctrlUnit sectionLink" id="personal_details">
			<dt><a href="' . XenForo_Template_Helper_Core::link('account/personal-details', false, array()) . '">' . 'Sửa chi tiết cá nhân của bạn' . '</a></dt>
			<dd>
				<ul>
					';
$__compilerVar9 = '';
$__compilerVar9 .= '
					<li><label for="ctrl_allow_view_profile_enable"><input type="checkbox" name="allow_view_profile_enable" value="1" id="ctrl_allow_view_profile_enable" class="Disabler OptOut" ' . (($visitor['allow_view_profile'] != ('none')) ? ' checked="checked"' : '') . ' /> ' . 'Xem chi tiết của bạn trong trang hồ sơ' . ':</label>
						<ul id="ctrl_allow_view_profile_enable_Disabler">
							<li>
								<select name="allow_view_profile" class="textCtrl autoSize" id="ctrl_allow_view_profile">
									<option value="everyone" ' . (($visitor['allow_view_profile'] == ('everyone')) ? ' selected="selected"' : '') . '>' . 'Tất cả khách thăm' . '</option>
									<option value="members"  ' . (($visitor['allow_view_profile'] == ('members')) ? ' selected="selected"' : '') . '>' . 'Chỉ từ thành viên' . '</option>
									<option value="followed" ' . (($visitor['allow_view_profile'] == ('followed')) ? ' selected="selected"' : '') . '>' . 'Chỉ có thành viên bạn theo dõi' . '</option>
								
<option value="friends" ' . (($visitor['allow_view_profile'] == ('friends')) ? ' selected="selected"' : '') . '>' . 'Friends Only' . '</option>
</select>
							</li>
						</ul>
					</li>
					<li><label for="ctrl_allow_post_profile_enable"><input type="checkbox" name="allow_post_profile_enable" value="1" id="ctrl_allow_post_profile_enable" class="Disabler OptOut" ' . (($visitor['allow_post_profile'] != ('none')) ? ' checked="checked"' : '') . ' /> ' . 'Đăng tin nhắn trong trang hồ sơ cá nhân' . ':</label>
						<ul id="ctrl_allow_post_profile_enable_Disabler">
							<li>
								<select name="allow_post_profile" class="textCtrl autoSize" id="ctrl_allow_post_profile">
									
									<option value="members"  ' . (($visitor['allow_post_profile'] == ('members')) ? ' selected="selected"' : '') . '>' . 'Chỉ từ thành viên' . '</option>
									<option value="followed" ' . (($visitor['allow_post_profile'] == ('followed')) ? ' selected="selected"' : '') . '>' . 'Chỉ có thành viên bạn theo dõi' . '</option>
								
<option value="friends" ' . (($visitor['allow_post_profile'] == ('friends')) ? ' selected="selected"' : '') . '>' . 'Friends Only' . '</option>
</select>
							</li>
						</ul>
					</li>
					';
$__output .= $this->callTemplateHook('account_privacy_personal_details', $__compilerVar9, array());
unset($__compilerVar9);
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
$__compilerVar10 = '';
$__compilerVar10 .= '
					<li><label for="ctrl_allow_receive_news_feed_enable"><input type="checkbox" name="allow_receive_news_feed_enable" value="1" id="ctrl_allow_receive_news_feed_enable" class="Disabler OptOut" ' . (($visitor['allow_receive_news_feed'] != ('none')) ? ' checked="checked"' : '') . ' /> ' . 'Nhận luồng tin của bạn' . ':</label>
						<ul id="ctrl_allow_receive_news_feed_enable_Disabler">
							<li>
								<select name="allow_receive_news_feed" class="textCtrl autoSize" id="ctrl_allow_receive_news_feed">
									<option value="everyone" ' . (($visitor['allow_receive_news_feed'] == ('everyone')) ? ' selected="selected"' : '') . '>' . 'Tất cả khách thăm' . '</option>
									<option value="members"  ' . (($visitor['allow_receive_news_feed'] == ('members')) ? ' selected="selected"' : '') . '>' . 'Chỉ từ thành viên' . '</option>
									<option value="followed" ' . (($visitor['allow_receive_news_feed'] == ('followed')) ? ' selected="selected"' : '') . '>' . 'Chỉ có thành viên bạn theo dõi' . '</option>
								
<option value="friends" ' . (($visitor['allow_receive_news_feed'] == ('friends')) ? ' selected="selected"' : '') . '>' . 'Friends Only' . '</option>
</select>
							</li>
						</ul>
					</li>
					';
$__output .= $this->callTemplateHook('account_privacy_news_feed', $__compilerVar10, array());
unset($__compilerVar10);
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
			<dt><a href="' . XenForo_Template_Helper_Core::link('account/contact-details', false, array()) . '">' . 'Sửa chi tiết liên hệ của bạn' . '</a></dt>
			<dd>
				<ul>
					';
$__compilerVar11 = '';
$__compilerVar11 .= '
					<li><label for="ctrl_allow_send_personal_conversation_enable"><input type="checkbox" name="allow_send_personal_conversation_enable" value="1" id="ctrl_allow_send_personal_conversation_enable" class="Disabler OptOut" ' . (($visitor['allow_send_personal_conversation'] != ('none')) ? ' checked="checked"' : '') . ' /> ' . 'Bắt đầu đối thoại với bạn' . ':</label>
						<ul id="ctrl_allow_send_personal_conversation_enable_Disabler">
							<li>
								<select name="allow_send_personal_conversation" class="textCtrl autoSize" id="ctrl_allow_send_personal_conversation">
									
									<option value="members"  ' . (($visitor['allow_send_personal_conversation'] == ('members')) ? ' selected="selected"' : '') . '>' . 'Chỉ từ thành viên' . '</option>
									<option value="followed" ' . (($visitor['allow_send_personal_conversation'] == ('followed')) ? ' selected="selected"' : '') . '>' . 'Chỉ có thành viên bạn theo dõi' . '</option>
								
<option value="friends" ' . (($visitor['allow_send_personal_conversation'] == ('friends')) ? ' selected="selected"' : '') . '>' . 'Friends Only' . '</option>
</select>
							</li>
						</ul>
					</li>
					<li><label for="ctrl_allow_view_identities_enable"><input type="checkbox" name="allow_view_identities_enable" value="1" id="ctrl_allow_view_identities_enable" class="Disabler OptOut" ' . (($visitor['allow_view_identities'] != ('none')) ? ' checked="checked"' : '') . ' /> ' . 'Xem danh tính của bạn' . ':</label>
						<ul id="ctrl_allow_view_identities_enable_Disabler">
							<li>
								<select name="allow_view_identities" class="textCtrl autoSize" id="ctrl_allow_view_identities">
									<option value="everyone" ' . (($visitor['allow_view_identities'] == ('everyone')) ? ' selected="selected"' : '') . '>' . 'Tất cả khách thăm' . '</option>
									<option value="members"  ' . (($visitor['allow_view_identities'] == ('members')) ? ' selected="selected"' : '') . '>' . 'Chỉ từ thành viên' . '</option>
									<option value="followed" ' . (($visitor['allow_view_identities'] == ('followed')) ? ' selected="selected"' : '') . '>' . 'Chỉ có thành viên bạn theo dõi' . '</option>
								
<option value="friends" ' . (($visitor['allow_view_identities'] == ('friends')) ? ' selected="selected"' : '') . '>' . 'Friends Only' . '</option>
</select>
							</li>
						</ul>
					</li>
					';
$__output .= $this->callTemplateHook('account_privacy_contact_details', $__compilerVar11, array());
unset($__compilerVar11);
$__output .= '
				</ul>
			</dd>
		</dl>
	</fieldset>
	
	';
$__compilerVar12 = '';
$__output .= $this->callTemplateHook('account_privacy_bottom', $__compilerVar12, array());
unset($__compilerVar12);
$__output .= '

	<dl class="ctrlUnit submitUnit">
		<dt></dt>
		<dd><input type="submit" name="save" value="' . 'Lưu thay đổi' . '" accesskey="s" class="button primary" /></dd>
	</dl>

	<input type="hidden" name="_xfToken" value="' . htmlspecialchars($visitor['csrf_token_page'], ENT_QUOTES, 'UTF-8') . '" />
</form>';
