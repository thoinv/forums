<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__extraData['title'] = '';
$__extraData['title'] .= 'Inline Moderation - Apply Thread Prefix';
$__output .= '

<form action="' . XenForo_Template_Helper_Core::link('inline-mod/thread/prefix', false, array()) . '" method="post" class="xenForm formOverlay">
	<p>' . 'Are you sure you want to apply the prefix specified below to the ' . htmlspecialchars($threadCount, ENT_QUOTES, 'UTF-8') . ' selected threads?' . '</p>

	<dl class="ctrlUnit">
		<dt><label for="ctrl_prefix_imod">' . 'Prefix' . ':</label></dt>
		<dd>
			<select name="prefix_id" class="textCtrl" id="ctrl_prefix_imod">
				';
foreach ($prefixes AS $prefixGroupId => $prefixGroup)
{
$__output .= '
					';
if ($prefixGroup['title'])
{
$__output .= '
						<optgroup label="' . htmlspecialchars($prefixGroup['title'], ENT_QUOTES, 'UTF-8') . '">
						';
foreach ($prefixGroup['prefixes'] AS $prefixId => $prefix)
{
$__output .= '
							<option value="' . htmlspecialchars($prefix['prefix_id'], ENT_QUOTES, 'UTF-8') . '" data-css="' . htmlspecialchars($prefix['css_class'], ENT_QUOTES, 'UTF-8') . '" ' . (($selectedPrefix == $prefix['prefix_id']) ? ' selected="selected"' : '') . '>' . XenForo_Template_Helper_Core::callHelper('threadPrefix', array(
'0' => $prefix['prefix_id'],
'1' => 'escaped',
'2' => ''
)) . '</option>
						';
}
$__output .= '
						</optgroup>
					';
}
else
{
$__output .= '
						';
foreach ($prefixGroup['prefixes'] AS $prefixId => $prefix)
{
$__output .= '
							<option value="' . htmlspecialchars($prefix['prefix_id'], ENT_QUOTES, 'UTF-8') . '" data-css="' . htmlspecialchars($prefix['css_class'], ENT_QUOTES, 'UTF-8') . '" ' . (($selectedPrefix == $prefix['prefix_id']) ? ' selected="selected"' : '') . '>' . XenForo_Template_Helper_Core::callHelper('threadPrefix', array(
'0' => $prefix['prefix_id'],
'1' => 'escaped',
'2' => ''
)) . '</option>
						';
}
$__output .= '
					';
}
$__output .= '
				';
}
$__output .= '
				<option value="0" data-css="prefix noPrefix" ' . (($selectedPrefix == 0) ? ' selected="selected"' : '') . '>(' . 'No prefix' . ')</option>
			</select>
			';
if ($forumCount > 1)
{
$__output .= '
				<p class="explain">' . 'The threads you have selected are located in more than one forum.<br />
<br />
In the event that some of the selected threads are not eligible to have the selected prefix applied, they will not be altered, and will remain selected.' . '</p>
			';
}
$__output .= '
		</dd>
	</dl>

	<dl class="ctrlUnit submitUnit">
		<dt></dt>
		<dd><input type="submit" name="save" value="' . 'Apply Thread Prefix' . '" accesskey="s" class="button primary" /></dd>
	</dl>

	';
foreach ($threadIds AS $threadId)
{
$__output .= '
		<input type="hidden" name="threads[]" value="' . htmlspecialchars($threadId, ENT_QUOTES, 'UTF-8') . '" />
	';
}
$__output .= '
	
	';
foreach ($nodeIds AS $nodeId)
{
$__output .= '
		<input type="hidden" name="nodeIds[]" value="' . htmlspecialchars($nodeId, ENT_QUOTES, 'UTF-8') . '" />
	';
}
$__output .= '

	<input type="hidden" name="_xfConfirm" value="1" />
	<input type="hidden" name="redirect" value="' . htmlspecialchars($redirect, ENT_QUOTES, 'UTF-8') . '" />
	<input type="hidden" name="_xfToken" value="' . htmlspecialchars($visitor['csrf_token_page'], ENT_QUOTES, 'UTF-8') . '" />
</form>';
