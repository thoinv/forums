<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$this->addRequiredExternal('css', 'thread_list_item_edit');
$__output .= '

<li>
	<div class="discussionListItemEdit inlineCtrlGroup">
	
		<div class="titleEdit editBlock">
			<label>' . 'Title' . ':
				';
if ($prefixes)
{
$__output .= '
				
					';
$this->addRequiredExternal('js', 'js/xenforo/title_prefix.js');
$__output .= '
					';
$this->addRequiredExternal('css', 'title_prefix_edit');
$__output .= '
					
					<select name="prefix_id" id="ctrl_prefix_' . htmlspecialchars($thread['thread_id'], ENT_QUOTES, 'UTF-8') . '" class="textCtrl TitlePrefix"
						data-container="#ctrl_prefix_' . htmlspecialchars($thread['thread_id'], ENT_QUOTES, 'UTF-8') . '"
						data-textbox="#ctrl_title_' . htmlspecialchars($thread['thread_id'], ENT_QUOTES, 'UTF-8') . '">
						';
$__compilerVar1 = '';
$__compilerVar1 .= htmlspecialchars($thread['prefix_id'], ENT_QUOTES, 'UTF-8');
$__compilerVar2 = '';
$__compilerVar2 .= '<option value="0" data-css="prefix noPrefix" ' . (($__compilerVar1 == 0) ? ' selected="selected"' : '') . '>(' . 'No prefix' . ')</option>
';
foreach ($prefixes AS $prefixGroup)
{
$__compilerVar2 .= '
	';
if ($prefixGroup['title'])
{
$__compilerVar2 .= '
		<optgroup label="' . htmlspecialchars($prefixGroup['title'], ENT_QUOTES, 'UTF-8') . '">
		';
foreach ($prefixGroup['prefixes'] AS $prefix)
{
$__compilerVar2 .= '
			<option value="' . htmlspecialchars($prefix['prefix_id'], ENT_QUOTES, 'UTF-8') . '" data-css="' . htmlspecialchars($prefix['css_class'], ENT_QUOTES, 'UTF-8') . '" ' . (($__compilerVar1 == $prefix['prefix_id']) ? ' selected="selected"' : '') . '>' . XenForo_Template_Helper_Core::callHelper('threadPrefix', array(
'0' => $prefix['prefix_id'],
'1' => 'escaped',
'2' => ''
)) . '</option>
		';
}
$__compilerVar2 .= '
		</optgroup>
	';
}
else
{
$__compilerVar2 .= '
		';
foreach ($prefixGroup['prefixes'] AS $prefix)
{
$__compilerVar2 .= '
			<option value="' . htmlspecialchars($prefix['prefix_id'], ENT_QUOTES, 'UTF-8') . '" data-css="' . htmlspecialchars($prefix['css_class'], ENT_QUOTES, 'UTF-8') . '" ' . (($__compilerVar1 == $prefix['prefix_id']) ? ' selected="selected"' : '') . '>' . XenForo_Template_Helper_Core::callHelper('threadPrefix', array(
'0' => $prefix['prefix_id'],
'1' => 'escaped',
'2' => ''
)) . '</option>
		';
}
$__compilerVar2 .= '
	';
}
$__compilerVar2 .= '
';
}
$__output .= $__compilerVar2;
unset($__compilerVar1, $__compilerVar2);
$__output .= '
					</select>
					
				';
}
$__output .= '
			</label>
			<input type="text" name="title" value="' . htmlspecialchars($thread['title'], ENT_QUOTES, 'UTF-8') . '" class="textCtrl titleField" id="ctrl_title_' . htmlspecialchars($thread['thread_id'], ENT_QUOTES, 'UTF-8') . '" maxlength="100" />
		</div>
		
		';
$__compilerVar3 = '';
$__compilerVar3 .= '
							';
if ($canAlterState['visible'])
{
$__compilerVar3 .= '<option value="visible" ' . (($thread['discussion_state'] == ('visible')) ? ' selected="selected"' : '') . '>' . 'Visible' . '</option>';
}
$__compilerVar3 .= '
							';
if ($canAlterState['moderated'])
{
$__compilerVar3 .= '<option value="moderated" ' . (($thread['discussion_state'] == ('moderated')) ? ' selected="selected"' : '') . '>' . 'Moderated' . '</option>';
}
$__compilerVar3 .= '
							';
if ($canAlterState['deleted'])
{
$__compilerVar3 .= '<option value="deleted" ' . (($thread['discussion_state'] == ('deleted')) ? ' selected="selected"' : '') . '>' . 'Deleted' . '</option>';
}
$__compilerVar3 .= '
						';
if (trim($__compilerVar3) !== '')
{
$__output .= '
			<div class="stateEdit editBlock">
				<label for="ctrl_state_' . htmlspecialchars($thread['thread_id'], ENT_QUOTES, 'UTF-8') . '">' . 'State' . ':
					<select name="discussion_state" class="textCtrl" id="ctrl_state_' . htmlspecialchars($thread['thread_id'], ENT_QUOTES, 'UTF-8') . '">
						' . $__compilerVar3 . '
					</select>
				</label>
			</div>
		';
}
unset($__compilerVar3);
$__output .= '
		
		';
$__compilerVar4 = '';
$__compilerVar4 .= '
					';
if ($canLockUnlockThread)
{
$__compilerVar4 .= '
						<li><label for="ctrl_open_' . htmlspecialchars($thread['thread_id'], ENT_QUOTES, 'UTF-8') . '" title="' . 'People may reply to this thread' . '"><input type="checkbox" name="discussion_open" value="1" id="ctrl_open_' . htmlspecialchars($thread['thread_id'], ENT_QUOTES, 'UTF-8') . '" ' . (($thread['discussion_open']) ? ' checked="checked"' : '') . ' /> ' . 'Open' . '</label></li>
					';
}
$__compilerVar4 .= '
					';
if ($canStickUnstickThread)
{
$__compilerVar4 .= '
						<li><label for="ctrl_sticky_' . htmlspecialchars($thread['thread_id'], ENT_QUOTES, 'UTF-8') . '"><input type="checkbox" name="sticky" value="1" id="ctrl_sticky_' . htmlspecialchars($thread['thread_id'], ENT_QUOTES, 'UTF-8') . '" ' . (($thread['sticky']) ? ' checked="checked"' : '') . ' /> ' . 'Sticky' . '</label></li>
					';
}
$__compilerVar4 .= '
				';
if (trim($__compilerVar4) !== '')
{
$__output .= '
			<ul class="optionsEdit editBlock">
				' . $__compilerVar4 . '
			</ul>
		';
}
unset($__compilerVar4);
$__output .= '
	
		<div class="buttons editBlock">
			<img src="' . XenForo_Template_Helper_Core::styleProperty('imagePath') . '/xenforo/widgets/ajaxload.info_000000_facebook.gif" class="AjaxSaveProgress" alt="" />
			<input type="submit" value="' . 'Save' . '" class="textCtrl primary" id="ctrl_submit_' . htmlspecialchars($thread['thread_id'], ENT_QUOTES, 'UTF-8') . '" data-submitUrl="' . XenForo_Template_Helper_Core::link('threads/save', $thread, array()) . '" />
			<input type="reset"  value="' . 'Cancel' . '" class="textCtrl" id="ctrl_reset_' . htmlspecialchars($thread['thread_id'], ENT_QUOTES, 'UTF-8') . '" />
			<input type="hidden" name="showForumLink" value="' . htmlspecialchars($showForumLink, ENT_QUOTES, 'UTF-8') . '" />
		</div>
		
	</div>	
</li>';
