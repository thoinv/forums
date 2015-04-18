<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__compilerVar8 = '';
$__compilerVar8 .= 'InlineModControlsContent';
$__compilerVar9 = '';
$__compilerVar9 .= 'ModerationSelectContent';
$__compilerVar10 = '';
$__compilerVar10 .= 'Content Moderation';
$__compilerVar11 = '';
$__compilerVar11 .= '
		';
if ($inlineModOptions['delete'])
{
$__compilerVar11 .= '<option value="delete">' . 'Delete Contents' . '...</option>';
}
$__compilerVar11 .= '
		';
if ($inlineModOptions['undelete'])
{
$__compilerVar11 .= '<option value="undelete">' . 'Undelete Contents' . '</option>';
}
$__compilerVar11 .= '
		';
if ($inlineModOptions['approve'])
{
$__compilerVar11 .= '<option value="approve">' . 'Approve Contents' . '</option>';
}
$__compilerVar11 .= '
		';
if ($inlineModOptions['unapprove'])
{
$__compilerVar11 .= '<option value="unapprove">' . 'Unapprove Contents' . '</option>';
}
$__compilerVar11 .= '
		';
if ($inlineModOptions['move'])
{
$__compilerVar11 .= '<option value="move">' . 'Move Contents' . '...</option>';
}
$__compilerVar11 .= '
		<option value="deselect">' . 'Deselect Contents' . '</option>
	';
$__compilerVar12 = '';
$__compilerVar12 .= 'sonnb_xengallery_select_deselect_all_loaded_contents';
$__compilerVar13 = '';
$__compilerVar13 .= 'Contents';
$__compilerVar14 = '';
$this->addRequiredExternal('css', 'sonnb_xengallery_inline_mod_controls');
$__compilerVar14 .= '
';
$this->addRequiredExternal('js', 'js/sonnb/XenGallery/gallery.inlinemod.js');
$__compilerVar14 .= '

<span id="' . (($__compilerVar8) ? (htmlspecialchars($__compilerVar8, ENT_QUOTES, 'UTF-8')) : ('InlineModControls')) . '" class="InlineModControls">
	<span class="selectionControl secondaryContent">
		<label for="ModerationCheck">
			' . 'Chọn tất cả' . ' <input type="checkbox" id="ModerationCheck" title="' . htmlspecialchars($__compilerVar12, ENT_QUOTES, 'UTF-8') . '" />
		</label>

		<input type="button" class="button ClickNext" value="&darr;" title="' . 'Chuyển xuống' . '" />
		<input type="button" class="button ClickPrev" value="&uarr;" title="' . 'Chuyển lên trên' . '" />
		<a class="SelectionCount">' . htmlspecialchars($__compilerVar13, ENT_QUOTES, 'UTF-8') . ': <em class="InlineModCheckedTotal">0</em></a>
	</span>

	<span class="actionControl sectionFooter">
		<span class="commonActions">
			';
if ($inlineModOptions['delete'])
{
$__compilerVar14 .= '<input type="submit" class="button" value="' . 'Xóa' . '..." name="delete" />';
}
$__compilerVar14 .= '
			';
if ($inlineModOptions['approve'])
{
$__compilerVar14 .= '<input type="submit" class="button" value="' . 'Duyệt bài' . '" name="approve" />';
}
$__compilerVar14 .= '
		</span>

		<span class="otherActions">
			<select name="a" id="' . (($__compilerVar9) ? (htmlspecialchars($__compilerVar9, ENT_QUOTES, 'UTF-8')) : ('ModerationSelect')) . '" class="textCtrl ModerationSelect">
				<option value="">' . 'Hành động khác' . '...</option>
				<optgroup label="' . 'Hành động Quản lý' . '">
					' . $__compilerVar11 . '
				</optgroup>
				<option value="closeOverlay">' . 'Đóng lớp phủ này' . '</option>
			</select>

			<input type="submit" class="button primary" value="' . 'Tới' . '" />
			<input type="reset" class="button OverlayCloser overylayOnly" value="X" title="' . 'Cancel and close these controls' . '" />
		</span>
	</span>
</span>';
$__output .= $__compilerVar14;
unset($__compilerVar8, $__compilerVar9, $__compilerVar10, $__compilerVar11, $__compilerVar12, $__compilerVar13, $__compilerVar14);
