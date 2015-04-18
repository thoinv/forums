<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
if ($canViewResources)
{
$__output .= '
<h3 class="sectionHeader">' . 'Tài nguyên' . '</h3>
<dl class="ctrlUnit">
	<dt>' . 'Receive an alert when someone' . '...</dt>
	<dd>
		<ul>
			';
$__compilerVar1 = '';
$__compilerVar1 .= '
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
$__output .= $this->callTemplateHook('account_alerts_resources', $__compilerVar1, array());
unset($__compilerVar1);
$__output .= '
		</ul>
	</dd>
</dl>
';
}
