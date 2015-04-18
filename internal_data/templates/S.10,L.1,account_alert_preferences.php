<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__extraData['title'] = '';
$__extraData['title'] .= 'Alert Preferences';
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
	
	<h3 class="sectionHeader">' . 'Messages in Threads' . '</h3>
	<dl class="ctrlUnit">
		<dt>' . 'Receive an alert when someone' . '...</dt>
		<dd>
			<ul>
				';
$__compilerVar1 = '';
$__compilerVar1 .= '
				<li><input type="hidden" name="alertSet[post_insert]" value="1" />
					<label><input type="checkbox" value="1" name="alert[post_insert]" ' . ((!$alertOptOuts['post_insert']) ? ' checked="checked"' : '') . ' autofocus="true" /> ' . 'Replies to a watched thread' . '</label>
					<p class="hint">' . 'Someone replies to a thread you are watching' . '</p>
				</li>
				<li><input type="hidden" name="alertSet[post_insert_attachment]" value="1" />
					<label><input type="checkbox" value="1" name="alert[post_insert_attachment]" ' . ((!$alertOptOuts['post_insert_attachment']) ? ' checked="checked"' : '') . ' /> ' . 'Attaches a file to a watched thread' . '</label>
					<p class="hint">' . 'Someone replies and attaches a file to a thread you are watching' . '</p>
				</li>
				<li><input type="hidden" name="alertSet[post_quote]" value="1" />
					<label><input type="checkbox" value="1" name="alert[post_quote]" ' . ((!$alertOptOuts['post_quote']) ? ' checked="checked"' : '') . ' /> ' . 'Quotes your message' . '</label>
					<p class="hint">' . 'Someone directly quotes one of your messages in a thread' . '</p>
				</li>
				<li><input type="hidden" name="alertSet[post_tag]" value="1" />
					<label><input type="checkbox" value="1" name="alert[post_tag]" ' . ((!$alertOptOuts['post_tag']) ? ' checked="checked"' : '') . ' /> ' . 'Tags you in a message' . '</label>
					<p class="hint">' . 'Someone tags you in a message' . '</p>
				</li>
				<li><input type="hidden" name="alertSet[post_like]" value="1" />
					<label><input type="checkbox" value="1" name="alert[post_like]" ' . ((!$alertOptOuts['post_like']) ? ' checked="checked"' : '') . ' /> ' . 'Likes your message' . '</label>
					<p class="hint">' . 'Someone likes one of your messages in a thread' . '</p>
				</li>
				';
$__output .= $this->callTemplateHook('account_alerts_messages_in_threads', $__compilerVar1, array());
unset($__compilerVar1);
$__output .= '
			</ul>
		</dd>
	</dl>

	';
$__compilerVar2 = '';
$__output .= $this->callTemplateHook('account_alerts_after_posts', $__compilerVar2, array());
unset($__compilerVar2);
$__output .= '
	
	<h3 class="sectionHeader">' . 'Messages on Profile Pages' . '</h3>
	<dl class="ctrlUnit">
		<dt>' . 'Receive an alert when someone' . '...</dt>
		<dd>
			<ul>
				';
$__compilerVar3 = '';
$__compilerVar3 .= '
				<li><input type="hidden" name="alertSet[profile_post_insert]" value="1" />
					<label><input type="checkbox" value="1" name="alert[profile_post_insert]" ' . ((!$alertOptOuts['profile_post_insert']) ? ' checked="checked"' : '') . ' /> ' . 'Posts on your profile' . '</label>
					<p class="hint">' . 'Someone posts a message on your profile page' . '</p>
				</li>
				<li><input type="hidden" name="alertSet[profile_post_comment_your_profile]" value="1" />
					<label><input type="checkbox" value="1" name="alert[profile_post_comment_your_profile]" ' . ((!$alertOptOuts['profile_post_comment_your_profile']) ? ' checked="checked"' : '') . ' /> ' . 'Comments on your profile or status' . '</label>
					<p class="hint">' . 'Someone comments on a message on your profile page or your status' . '</p>
				</li>
				<li><input type="hidden" name="alertSet[profile_post_comment_your_post]" value="1" />
					<label><input type="checkbox" value="1" name="alert[profile_post_comment_your_post]" ' . ((!$alertOptOuts['profile_post_comment_your_post']) ? ' checked="checked"' : '') . ' /> ' . 'Comments on your profile posts for other members' . '</label>
					<p class="hint">' . 'Someone comments on a message you left on someone else\'s profile' . '</p>
				</li>
				<li><input type="hidden" name="alertSet[profile_post_comment_other_commenter]" value="1" />
					<label><input type="checkbox" value="1" name="alert[profile_post_comment_other_commenter]" ' . ((!$alertOptOuts['profile_post_comment_other_commenter']) ? ' checked="checked"' : '') . ' /> ' . 'Also comments on a profile post' . '</label>
					<p class="hint">' . 'Someone comments on a profile post that you have commented on' . '</p>
				</li>
				<li><input type="hidden" name="alertSet[profile_post_tag]" value="1" />
					<label><input type="checkbox" value="1" name="alert[profile_post_tag]" ' . ((!$alertOptOuts['profile_post_tag']) ? ' checked="checked"' : '') . ' /> ' . 'Tags you in a profile post or comment' . '</label>
					<p class="hint">' . 'Someone tags you in a post or comment on someone\'s profile' . '</p>
				</li>
				<li><input type="hidden" name="alertSet[profile_post_like]" value="1" />
					<label><input type="checkbox" value="1" name="alert[profile_post_like]" ' . ((!$alertOptOuts['profile_post_like']) ? ' checked="checked"' : '') . ' /> ' . 'Likes your profile post' . '</label>
					<p class="hint">' . 'Someone likes a message you left on a member profile page' . '</p>
				</li>
				';
$__output .= $this->callTemplateHook('account_alerts_messages_on_profile_pages', $__compilerVar3, array());
unset($__compilerVar3);
$__output .= '
			</ul>
		</dd>
	</dl>
	
	';
$__compilerVar4 = '';
if ($canViewResources)
{
$__compilerVar4 .= '
<h3 class="sectionHeader">' . 'Tài nguyên' . '</h3>
<dl class="ctrlUnit">
	<dt>' . 'Receive an alert when someone' . '...</dt>
	<dd>
		<ul>
			';
$__compilerVar5 = '';
$__compilerVar5 .= '
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
$__compilerVar4 .= $this->callTemplateHook('account_alerts_resources', $__compilerVar5, array());
unset($__compilerVar5);
$__compilerVar4 .= '
		</ul>
	</dd>
</dl>
';
}
$__output .= $__compilerVar4;
unset($__compilerVar4);
$__output .= '
';
$__compilerVar6 = '';
$__output .= $this->callTemplateHook('account_alerts_after_profile_posts', $__compilerVar6, array());
unset($__compilerVar6);
$__output .= '
		
	<h3 class="sectionHeader">' . 'Achievements' . '</h3>
	<dl class="ctrlUnit">
		<dt>' . 'Receive an alert when you receive a' . '...</dt>
		<dd>
			<ul>
				';
$__compilerVar7 = '';
$__compilerVar7 .= '
				<li><input type="hidden" name="alertSet[user_following]" value="1" />
					<label><input type="checkbox" value="1" name="alert[user_following]" ' . ((!$alertOptOuts['user_following']) ? ' checked="checked"' : '') . ' /> ' . 'New follower' . '</label
					 ><p class="hint">' . 'Someone starts following you' . '</p>
				</li>
				<li><input type="hidden" name="alertSet[user_trophy]" value="1" />
					<label><input type="checkbox" value="1" name="alert[user_trophy]" ' . ((!$alertOptOuts['user_trophy']) ? ' checked="checked"' : '') . ' /> ' . 'New trophy' . '</label>
					<p class="hint">' . 'You are awarded a new trophy for passing a milestone' . '</p>
				</li>
				';
$__output .= $this->callTemplateHook('account_alerts_achievements', $__compilerVar7, array());
unset($__compilerVar7);
$__output .= '
			</ul>
		</dd>
	</dl>
	
	';
$__compilerVar8 = '';
$__output .= $this->callTemplateHook('account_alerts_extra', $__compilerVar8, array());
unset($__compilerVar8);
$__output .= '

	<dl class="ctrlUnit submitUnit">
		<dt></dt>
		<dd><input type="submit" name="save" value="' . 'Save Changes' . '" accesskey="s" class="button primary" /></dd>
	</dl>
	
	<input type="hidden" name="_xfToken" value="' . htmlspecialchars($visitor['csrf_token_page'], ENT_QUOTES, 'UTF-8') . '" />
</form>';
