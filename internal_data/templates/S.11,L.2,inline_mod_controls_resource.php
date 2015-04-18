<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__compilerVar6 = '';
$__compilerVar6 .= 'Resource moderation';
$__compilerVar7 = '';
$__compilerVar7 .= '
		';
if ($inlineModOptions['delete'])
{
$__compilerVar7 .= '<option value="delete">' . 'Delete resources' . '...</option>';
}
$__compilerVar7 .= '
		';
if ($inlineModOptions['undelete'])
{
$__compilerVar7 .= '<option value="undelete">' . 'Undelete resources' . '</option>';
}
$__compilerVar7 .= '
		';
if ($inlineModOptions['approve'])
{
$__compilerVar7 .= '<option value="approve">' . 'Approve resources' . '</option>';
}
$__compilerVar7 .= '
		';
if ($inlineModOptions['unapprove'])
{
$__compilerVar7 .= '<option value="unapprove">' . 'Unapprove resources' . '</option>';
}
$__compilerVar7 .= '
		';
if ($inlineModOptions['feature'])
{
$__compilerVar7 .= '<option value="feature">' . 'Feature Resources' . '</option>';
}
$__compilerVar7 .= '
		';
if ($inlineModOptions['unfeature'])
{
$__compilerVar7 .= '<option value="unfeature">' . 'Unfeature Resources' . '</option>';
}
$__compilerVar7 .= '
		';
if ($inlineModOptions['reassign'])
{
$__compilerVar7 .= '<option value="reassign">' . 'Reassign resources' . '...</option>';
}
$__compilerVar7 .= '
		';
if ($inlineModOptions['move'])
{
$__compilerVar7 .= '<option value="move">' . 'Move Resources' . '...</option>';
}
$__compilerVar7 .= '
		<option value="deselect">' . 'Deselect resources' . '</option>
	';
$__compilerVar8 = '';
$__compilerVar8 .= 'Select / deselect all resources on this page';
$__compilerVar9 = '';
$__compilerVar9 .= 'Selected Resources';
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
