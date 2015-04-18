<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__compilerVar6 = '';
$__compilerVar6 .= 'Conversation Management';
$__compilerVar7 = '';
$__compilerVar7 .= '
		<option value="leave">' . 'Leave Conversations' . '...</option>
		<option value="read">' . 'Mark Conversations Read' . '</option>
		<option value="unread">' . 'Mark Conversations Unread' . '</option>
		<option value="star">' . 'Star Conversations' . '</option>
		<option value="unstar">' . 'Unstar Conversations' . '</option>
		<option value="deselect">' . 'Deselect Conversations' . '</option>
	';
$__compilerVar8 = '';
$__compilerVar8 .= 'Select / deselect all conversations on this page';
$__compilerVar9 = '';
$__compilerVar9 .= 'Selected conversations';
$__compilerVar10 = '';
$this->addRequiredExternal('css', 'inline_mod');
$__compilerVar10 .= '
';
$this->addRequiredExternal('js', 'js/xenforo/inline_mod.js');
$__compilerVar10 .= '

<span id="InlineModControls">
	<span class="selectionControl secondaryContent">
		<label for="ModerationCheck">
			' . 'Chọn tất cả' . ' <input type="checkbox" id="ModerationCheck" title="' . htmlspecialchars($__compilerVar8, ENT_QUOTES, 'UTF-8') . '" />
		</label>

		<input type="button" class="button ClickNext" value="&darr;" title="' . 'Chuyển xuống' . '" />
		<input type="button" class="button ClickPrev" value="&uarr;" title="' . 'Chuyển lên trên' . '" />
		<a class="SelectionCount">' . htmlspecialchars($__compilerVar9, ENT_QUOTES, 'UTF-8') . ': <em class="InlineModCheckedTotal">0</em></a>
	</span>

	<span class="actionControl sectionFooter">
		<span class="commonActions">
			';
if ($inlineModOptions['delete'])
{
$__compilerVar10 .= '<input type="submit" class="button" value="' . 'Xóa' . '..." name="delete" />';
}
$__compilerVar10 .= '
			';
if ($inlineModOptions['approve'])
{
$__compilerVar10 .= '<input type="submit" class="button" value="' . 'Duyệt bài' . '" name="approve" />';
}
$__compilerVar10 .= '
		</span>

		<span class="otherActions">
			<select name="a" id="ModerationSelect" class="textCtrl">
				<option value="">' . 'Hành động khác' . '...</option>
				<optgroup label="' . 'Hành động Quản lý' . '">
					' . $__compilerVar7 . '
				</optgroup>
				<option value="closeOverlay">' . 'Đóng lớp phủ này' . '</option>
			</select>

			<input type="submit" class="button primary" value="' . 'Tới' . '" />
			<input type="reset" class="button OverlayCloser overylayOnly" value="X" title="' . 'Cancel and close these controls' . '" />
		</span>
	</span>
</span>';
$__output .= $__compilerVar10;
unset($__compilerVar6, $__compilerVar7, $__compilerVar8, $__compilerVar9, $__compilerVar10);
