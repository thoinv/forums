<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__extraData['title'] = '';
$__extraData['title'] .= 'Thiết lập thông báo';
$__output .= '

';
$this->addRequiredExternal('css', 'account');
$__output .= '
';
$this->addRequiredExternal('js', 'js/xenforo/personal_details_editor.js');
$__output .= '

' . '
' . '

<form method="post" class="xenForm AutoValidator"
	action="' . XenForo_Template_Helper_Core::link('account/alert-preferences-save', false, array()) . '"
	data-fieldValidatorUrl="' . XenForo_Template_Helper_Core::link('account/validate-field.json', false, array()) . '">
	
	<h3 class="sectionHeader">' . 'Bài viết trong chủ đề' . '</h3>
	<dl class="ctrlUnit">
		<dt>' . 'Nhận thông báo khi ai đó' . '...</dt>
		<dd>
			<ul>
				';
$__compilerVar9 = '';
$__compilerVar9 .= '
				<li><input type="hidden" name="alertSet[post_insert]" value="1" />
					<label><input type="checkbox" value="1" name="alert[post_insert]" ' . ((!$alertOptOuts['post_insert']) ? ' checked="checked"' : '') . ' autofocus="true" /> ' . 'Trả lời vào chủ đề đang theo dõi' . '</label>
					<p class="hint">' . 'Ai đó trả lời vào chủ đề bạn đang theo dõi' . '</p>
				</li>
				<li><input type="hidden" name="alertSet[post_insert_attachment]" value="1" />
					<label><input type="checkbox" value="1" name="alert[post_insert_attachment]" ' . ((!$alertOptOuts['post_insert_attachment']) ? ' checked="checked"' : '') . ' /> ' . 'Đính kèm file vào chủ đề theo dõi' . '</label>
					<p class="hint">' . 'Ai đó trả lời và đính kèm file vào chủ đề bạn đang theo dõi' . '</p>
				</li>
				<li><input type="hidden" name="alertSet[post_quote]" value="1" />
					<label><input type="checkbox" value="1" name="alert[post_quote]" ' . ((!$alertOptOuts['post_quote']) ? ' checked="checked"' : '') . ' /> ' . 'Trích bài viết của bạn' . '</label>
					<p class="hint">' . 'Ai đó trực tiếp trích lại một trong những bài viết của bạn trong chủ đề' . '</p>
				</li>
				<li><input type="hidden" name="alertSet[post_tag]" value="1" />
					<label><input type="checkbox" value="1" name="alert[post_tag]" ' . ((!$alertOptOuts['post_tag']) ? ' checked="checked"' : '') . ' /> ' . 'Tags you in a message' . '</label>
					<p class="hint">' . 'Someone tags you in a message' . '</p>
				</li>
				<li><input type="hidden" name="alertSet[post_like]" value="1" />
					<label><input type="checkbox" value="1" name="alert[post_like]" ' . ((!$alertOptOuts['post_like']) ? ' checked="checked"' : '') . ' /> ' . 'Thích bài viết của bạn' . '</label>
					<p class="hint">' . 'Ai đó thích một trong những bài viết trong chủ đề' . '</p>
				</li>
				';
$__output .= $this->callTemplateHook('account_alerts_messages_in_threads', $__compilerVar9, array());
unset($__compilerVar9);
$__output .= '
			</ul>
		</dd>
	</dl>

	';
$__compilerVar10 = '';
$__output .= $this->callTemplateHook('account_alerts_after_posts', $__compilerVar10, array());
unset($__compilerVar10);
$__output .= '
	
	<h3 class="sectionHeader">' . 'Tin nhắn trong trang Hồ sơ' . '</h3>
	<dl class="ctrlUnit">
		<dt>' . 'Nhận thông báo khi ai đó' . '...</dt>
		<dd>
			<ul>
				';
$__compilerVar11 = '';
$__compilerVar11 .= '
				<li><input type="hidden" name="alertSet[profile_post_insert]" value="1" />
					<label><input type="checkbox" value="1" name="alert[profile_post_insert]" ' . ((!$alertOptOuts['profile_post_insert']) ? ' checked="checked"' : '') . ' /> ' . 'Viết vào hồ sơ của bạn' . '</label>
					<p class="hint">' . 'Ai đó để lại tin nhắn trong trang hồ sơ của bạn' . '</p>
				</li>
				<li><input type="hidden" name="alertSet[profile_post_comment_your_profile]" value="1" />
					<label><input type="checkbox" value="1" name="alert[profile_post_comment_your_profile]" ' . ((!$alertOptOuts['profile_post_comment_your_profile']) ? ' checked="checked"' : '') . ' /> ' . 'Bình luận trong trang hồ sơ hoặc trạng thái của bạn' . '</label>
					<p class="hint">' . 'Ai đó bình luận vào tin nhắn trong trang hồ sơ hoặc dòng trạng thái của bạn' . '</p>
				</li>
				<li><input type="hidden" name="alertSet[profile_post_comment_your_post]" value="1" />
					<label><input type="checkbox" value="1" name="alert[profile_post_comment_your_post]" ' . ((!$alertOptOuts['profile_post_comment_your_post']) ? ' checked="checked"' : '') . ' /> ' . 'Bình luận trong tin nhắn của bạn gửi cho người khác' . '</label>
					<p class="hint">' . 'Ai đó bình luận vào tin nhắn bạn để lại trong trang hồ sơ người khác' . '</p>
				</li>
				<li><input type="hidden" name="alertSet[profile_post_comment_other_commenter]" value="1" />
					<label><input type="checkbox" value="1" name="alert[profile_post_comment_other_commenter]" ' . ((!$alertOptOuts['profile_post_comment_other_commenter']) ? ' checked="checked"' : '') . ' /> ' . 'Cũng bình luận trong một tin nhắn hồ sơ' . '</label>
					<p class="hint">' . 'Ai đó bình luận vào tin nhắn hồ sơ mà bạn đã bình luận' . '</p>
				</li>
				<li><input type="hidden" name="alertSet[profile_post_tag]" value="1" />
					<label><input type="checkbox" value="1" name="alert[profile_post_tag]" ' . ((!$alertOptOuts['profile_post_tag']) ? ' checked="checked"' : '') . ' /> ' . 'Tags you in a profile post or comment' . '</label>
					<p class="hint">' . 'Someone tags you in a post or comment on someone\'s profile' . '</p>
				</li>
				<li><input type="hidden" name="alertSet[profile_post_like]" value="1" />
					<label><input type="checkbox" value="1" name="alert[profile_post_like]" ' . ((!$alertOptOuts['profile_post_like']) ? ' checked="checked"' : '') . ' /> ' . 'Thích tin nhắn trong hồ sơ' . '</label>
					<p class="hint">' . 'Ai đó thích tin nhắn bạn để lại trong trang hồ sơ thành viên' . '</p>
				</li>
				';
$__output .= $this->callTemplateHook('account_alerts_messages_on_profile_pages', $__compilerVar11, array());
unset($__compilerVar11);
$__output .= '
			</ul>
		</dd>
	</dl>
	
	';
$__compilerVar12 = '';
if ($canViewResources)
{
$__compilerVar12 .= '
<h3 class="sectionHeader">' . 'Tài nguyên' . '</h3>
<dl class="ctrlUnit">
	<dt>' . 'Nhận thông báo khi ai đó' . '...</dt>
	<dd>
		<ul>
			';
$__compilerVar13 = '';
$__compilerVar13 .= '
			<li><input type="hidden" name="alertSet[resource_update_insert]" value="1" />
				<label><input type="checkbox" value="1" name="alert[resource_update_insert]" ' . ((!$alertOptOuts['resource_update_insert']) ? ' checked="checked"' : '') . ' /> ' . 'Adds an update to a watched resource' . '</label>
				<p class="hint">' . 'Someone updates a resource you are watching with a new update entry' . '</p>
			</li>
			<li><input type="hidden" name="alertSet[resource_update_like]" value="1" />
				<label><input type="checkbox" value="1" name="alert[resource_update_like]" ' . ((!$alertOptOuts['resource_update_like']) ? ' checked="checked"' : '') . ' /> ' . 'Likes your resource update' . '</label>
				<p class="hint">' . 'Someone likes an update you have posted to accompany one of your resources' . '</p>
			</li>
			<li><input type="hidden" name="alertSet[resource_rating_review]" value="1" />
				<label><input type="checkbox" value="1" name="alert[resource_rating_review]" ' . ((!$alertOptOuts['resource_rating_review']) ? ' checked="checked"' : '') . ' /> ' . 'Reviews your resource' . '</label>
				<p class="hint">' . 'Someone reviews one of your resources' . '</p>
			</li>
			<li><input type="hidden" name="alertSet[resource_rating_reply]" value="1" />
				<label><input type="checkbox" value="1" name="alert[resource_rating_reply]" ' . ((!$alertOptOuts['resource_rating_reply']) ? ' checked="checked"' : '') . ' /> ' . 'Replies to your review' . '</label>
				<p class="hint">' . 'Someone replies to your resource review' . '</p>
			</li>
			';
$__compilerVar12 .= $this->callTemplateHook('account_alerts_resources', $__compilerVar13, array());
unset($__compilerVar13);
$__compilerVar12 .= '
		</ul>
	</dd>
</dl>
';
}
$__output .= $__compilerVar12;
unset($__compilerVar12);
$__output .= '
';
$__compilerVar14 = '';
$__output .= $this->callTemplateHook('account_alerts_after_profile_posts', $__compilerVar14, array());
unset($__compilerVar14);
$__output .= '
		
	<h3 class="sectionHeader">' . 'Thành tích đạt được' . '</h3>
	<dl class="ctrlUnit">
		<dt>' . 'Nhận thông báo khi bạn nhận được' . '...</dt>
		<dd>
			<ul>
				';
$__compilerVar15 = '';
$__compilerVar15 .= '
				<li><input type="hidden" name="alertSet[user_following]" value="1" />
					<label><input type="checkbox" value="1" name="alert[user_following]" ' . ((!$alertOptOuts['user_following']) ? ' checked="checked"' : '') . ' /> ' . 'Người theo đuôi mới' . '</label
					 ><p class="hint">' . 'Ai đó bắt đầu theo dõi bạn' . '</p>
				</li>
				<li><input type="hidden" name="alertSet[user_trophy]" value="1" />
					<label><input type="checkbox" value="1" name="alert[user_trophy]" ' . ((!$alertOptOuts['user_trophy']) ? ' checked="checked"' : '') . ' /> ' . 'Danh hiệu mới' . '</label>
					<p class="hint">' . 'Bạn được thưởng một danh hiệu mới' . '</p>
				</li>
				';
$__output .= $this->callTemplateHook('account_alerts_achievements', $__compilerVar15, array());
unset($__compilerVar15);
$__output .= '
			</ul>
		</dd>
	</dl>
	
	';
$__compilerVar16 = '';
$__output .= $this->callTemplateHook('account_alerts_extra', $__compilerVar16, array());
unset($__compilerVar16);
$__output .= '

	<dl class="ctrlUnit submitUnit">
		<dt></dt>
		<dd><input type="submit" name="save" value="' . 'Lưu thay đổi' . '" accesskey="s" class="button primary" /></dd>
	</dl>
	
	<input type="hidden" name="_xfToken" value="' . htmlspecialchars($visitor['csrf_token_page'], ENT_QUOTES, 'UTF-8') . '" />
</form>';
