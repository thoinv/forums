<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__compilerVar6 = '';
$__compilerVar6 .= 'Thread Moderation';
$__compilerVar7 = '';
$__compilerVar7 .= '
		';
if ($inlineModOptions['delete'])
{
$__compilerVar7 .= '<option value="delete">' . 'Xóa các chủ đề' . '...</option>';
}
$__compilerVar7 .= '
		';
if ($inlineModOptions['undelete'])
{
$__compilerVar7 .= '<option value="undelete">' . 'Khôi phục các chủ đề' . '</option>';
}
$__compilerVar7 .= '
		';
if ($inlineModOptions['approve'])
{
$__compilerVar7 .= '<option value="approve">' . 'Approve Threads' . '</option>';
}
$__compilerVar7 .= '
		';
if ($inlineModOptions['unapprove'])
{
$__compilerVar7 .= '<option value="unapprove">' . 'Unapprove Threads' . '</option>';
}
$__compilerVar7 .= '
		';
if ($inlineModOptions['stick'])
{
$__compilerVar7 .= '<option value="stick">' . 'Stick Threads' . '</option>';
}
$__compilerVar7 .= '
		';
if ($inlineModOptions['unstick'])
{
$__compilerVar7 .= '<option value="unstick">' . 'Unstick Threads' . '</option>';
}
$__compilerVar7 .= '
		';
if ($inlineModOptions['lock'])
{
$__compilerVar7 .= '<option value="lock">' . 'Lock Threads' . '</option>';
}
$__compilerVar7 .= '
		';
if ($inlineModOptions['unlock'])
{
$__compilerVar7 .= '<option value="unlock">' . 'Unlock Threads' . '</option>';
}
$__compilerVar7 .= '
		';
if ($inlineModOptions['move'])
{
$__compilerVar7 .= '<option value="move">' . 'Move Threads' . '...</option>';
}
$__compilerVar7 .= '
		';
if ($inlineModOptions['merge'])
{
$__compilerVar7 .= '<option value="merge">' . 'Merge Threads' . '...</option>';
}
$__compilerVar7 .= '
		';
if ($inlineModOptions['edit'])
{
$__compilerVar7 .= '<option value="prefix">' . 'Apply Thread Prefix' . '...</option>';
}
$__compilerVar7 .= '
		<option value="deselect">' . 'Bỏ chọn chủ đề' . '</option>
	';
$__compilerVar8 = '';
$__compilerVar8 .= 'Select / deselect all threads on this page';
$__compilerVar9 = '';
$__compilerVar9 .= 'Chủ đề đã chọn';
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
