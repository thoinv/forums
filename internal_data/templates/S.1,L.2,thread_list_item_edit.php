<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$this->addRequiredExternal('css', 'thread_list_item_edit');
$__output .= '

<li>
	<div class="discussionListItemEdit inlineCtrlGroup">
	
		<div class="titleEdit editBlock">
			<label>' . 'Tiêu đề' . ':
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
$__compilerVar5 = '';
$__compilerVar5 .= htmlspecialchars($thread['prefix_id'], ENT_QUOTES, 'UTF-8');
$__compilerVar6 = '';
$__compilerVar6 .= '<option value="0" data-css="prefix noPrefix" ' . (($__compilerVar5 == 0) ? ' selected="selected"' : '') . '>(' . 'Không tiền tố' . ')</option>
';
foreach ($prefixes AS $prefixGroup)
{
$__compilerVar6 .= '
	';
if ($prefixGroup['title'])
{
$__compilerVar6 .= '
		<optgroup label="' . htmlspecialchars($prefixGroup['title'], ENT_QUOTES, 'UTF-8') . '">
		';
foreach ($prefixGroup['prefixes'] AS $prefix)
{
$__compilerVar6 .= '
			<option value="' . htmlspecialchars($prefix['prefix_id'], ENT_QUOTES, 'UTF-8') . '" data-css="' . htmlspecialchars($prefix['css_class'], ENT_QUOTES, 'UTF-8') . '" ' . (($__compilerVar5 == $prefix['prefix_id']) ? ' selected="selected"' : '') . '>' . XenForo_Template_Helper_Core::callHelper('threadPrefix', array(
'0' => $prefix['prefix_id'],
'1' => 'escaped',
'2' => ''
)) . '</option>
		';
}
$__compilerVar6 .= '
		</optgroup>
	';
}
else
{
$__compilerVar6 .= '
		';
foreach ($prefixGroup['prefixes'] AS $prefix)
{
$__compilerVar6 .= '
			<option value="' . htmlspecialchars($prefix['prefix_id'], ENT_QUOTES, 'UTF-8') . '" data-css="' . htmlspecialchars($prefix['css_class'], ENT_QUOTES, 'UTF-8') . '" ' . (($__compilerVar5 == $prefix['prefix_id']) ? ' selected="selected"' : '') . '>' . XenForo_Template_Helper_Core::callHelper('threadPrefix', array(
'0' => $prefix['prefix_id'],
'1' => 'escaped',
'2' => ''
)) . '</option>
		';
}
$__compilerVar6 .= '
	';
}
$__compilerVar6 .= '
';
}
$__output .= $__compilerVar6;
unset($__compilerVar5, $__compilerVar6);
$__output .= '
					</select>
					
				';
}
$__output .= '
			</label>
			<input type="text" name="title" value="' . htmlspecialchars($thread['title'], ENT_QUOTES, 'UTF-8') . '" class="textCtrl titleField" id="ctrl_title_' . htmlspecialchars($thread['thread_id'], ENT_QUOTES, 'UTF-8') . '" maxlength="100" />
		</div>
		
		';
$__compilerVar7 = '';
$__compilerVar7 .= '
							';
if ($canAlterState['visible'])
{
$__compilerVar7 .= '<option value="visible" ' . (($thread['discussion_state'] == ('visible')) ? ' selected="selected"' : '') . '>' . 'Hiển thị' . '</option>';
}
$__compilerVar7 .= '
							';
if ($canAlterState['moderated'])
{
$__compilerVar7 .= '<option value="moderated" ' . (($thread['discussion_state'] == ('moderated')) ? ' selected="selected"' : '') . '>' . 'Cần kiểm duyệt' . '</option>';
}
$__compilerVar7 .= '
							';
if ($canAlterState['deleted'])
{
$__compilerVar7 .= '<option value="deleted" ' . (($thread['discussion_state'] == ('deleted')) ? ' selected="selected"' : '') . '>' . 'Bị xóa' . '</option>';
}
$__compilerVar7 .= '
						';
if (trim($__compilerVar7) !== '')
{
$__output .= '
			<div class="stateEdit editBlock">
				<label for="ctrl_state_' . htmlspecialchars($thread['thread_id'], ENT_QUOTES, 'UTF-8') . '">' . 'Tình trạng' . ':
					<select name="discussion_state" class="textCtrl" id="ctrl_state_' . htmlspecialchars($thread['thread_id'], ENT_QUOTES, 'UTF-8') . '">
						' . $__compilerVar7 . '
					</select>
				</label>
			</div>
		';
}
unset($__compilerVar7);
$__output .= '
		
		';
$__compilerVar8 = '';
$__compilerVar8 .= '
					';
if ($canLockUnlockThread)
{
$__compilerVar8 .= '
						<li><label for="ctrl_open_' . htmlspecialchars($thread['thread_id'], ENT_QUOTES, 'UTF-8') . '" title="' . 'Mọi người có thể trả lời chủ đề này' . '"><input type="checkbox" name="discussion_open" value="1" id="ctrl_open_' . htmlspecialchars($thread['thread_id'], ENT_QUOTES, 'UTF-8') . '" ' . (($thread['discussion_open']) ? ' checked="checked"' : '') . ' /> ' . 'Mở' . '</label></li>
					';
}
$__compilerVar8 .= '
					';
if ($canStickUnstickThread)
{
$__compilerVar8 .= '
						<li><label for="ctrl_sticky_' . htmlspecialchars($thread['thread_id'], ENT_QUOTES, 'UTF-8') . '"><input type="checkbox" name="sticky" value="1" id="ctrl_sticky_' . htmlspecialchars($thread['thread_id'], ENT_QUOTES, 'UTF-8') . '" ' . (($thread['sticky']) ? ' checked="checked"' : '') . ' /> ' . 'Dán lên cao' . '</label></li>
					';
}
$__compilerVar8 .= '
				';
if (trim($__compilerVar8) !== '')
{
$__output .= '
			<ul class="optionsEdit editBlock">
				' . $__compilerVar8 . '
			</ul>
		';
}
unset($__compilerVar8);
$__output .= '
	
		<div class="buttons editBlock">
			<img src="' . XenForo_Template_Helper_Core::styleProperty('imagePath') . '/xenforo/widgets/ajaxload.info_000000_facebook.gif" class="AjaxSaveProgress" alt="" />
			<input type="submit" value="' . 'Lưu' . '" class="textCtrl primary" id="ctrl_submit_' . htmlspecialchars($thread['thread_id'], ENT_QUOTES, 'UTF-8') . '" data-submitUrl="' . XenForo_Template_Helper_Core::link('threads/save', $thread, array()) . '" />
			<input type="reset"  value="' . 'Hủy bỏ' . '" class="textCtrl" id="ctrl_reset_' . htmlspecialchars($thread['thread_id'], ENT_QUOTES, 'UTF-8') . '" />
			<input type="hidden" name="showForumLink" value="' . htmlspecialchars($showForumLink, ENT_QUOTES, 'UTF-8') . '" />
		</div>
		
	</div>	
</li>';
