<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__compilerVar1 = '';
$__compilerVar1 .= 'InlineModControlsComment';
$__compilerVar2 = '';
$__compilerVar2 .= 'ModerationSelectComment';
$__compilerVar3 = '';
$__compilerVar3 .= 'Comment Moderation';
$__compilerVar4 = '';
$__compilerVar4 .= '
		';
if ($inlineModOptions['delete'])
{
$__compilerVar4 .= '<option value="delete">' . 'Delete Comments' . '...</option>';
}
$__compilerVar4 .= '
		';
if ($inlineModOptions['undelete'])
{
$__compilerVar4 .= '<option value="undelete">' . 'Undelete Comments' . '</option>';
}
$__compilerVar4 .= '
		';
if ($inlineModOptions['approve'])
{
$__compilerVar4 .= '<option value="approve">' . 'Approve Comments' . '</option>';
}
$__compilerVar4 .= '
		';
if ($inlineModOptions['unapprove'])
{
$__compilerVar4 .= '<option value="unapprove">' . 'Unapprove Comments' . '</option>';
}
$__compilerVar4 .= '
		<option value="deselect">' . 'Deselect Comments' . '</option>
	';
$__compilerVar5 = '';
$__compilerVar5 .= 'Select / Deselect all loaded comments.';
$__compilerVar6 = '';
$__compilerVar6 .= 'Select comments';
$__compilerVar7 = '';
$this->addRequiredExternal('css', 'sonnb_xengallery_inline_mod_controls');
$__compilerVar7 .= '
';
$this->addRequiredExternal('js', 'js/sonnb/XenGallery/gallery.inlinemod.js');
$__compilerVar7 .= '

<span id="' . (($__compilerVar1) ? (htmlspecialchars($__compilerVar1, ENT_QUOTES, 'UTF-8')) : ('InlineModControls')) . '" class="InlineModControls">
	<span class="selectionControl secondaryContent">
		<label for="ModerationCheck">
			' . 'Select All' . ' <input type="checkbox" id="ModerationCheck" title="' . htmlspecialchars($__compilerVar5, ENT_QUOTES, 'UTF-8') . '" />
		</label>

		<input type="button" class="button ClickNext" value="&darr;" title="' . 'Move down' . '" />
		<input type="button" class="button ClickPrev" value="&uarr;" title="' . 'Move up' . '" />
		<a class="SelectionCount">' . htmlspecialchars($__compilerVar6, ENT_QUOTES, 'UTF-8') . ': <em class="InlineModCheckedTotal">0</em></a>
	</span>

	<span class="actionControl sectionFooter">
		<span class="commonActions">
			';
if ($inlineModOptions['delete'])
{
$__compilerVar7 .= '<input type="submit" class="button" value="' . 'Delete' . '..." name="delete" />';
}
$__compilerVar7 .= '
			';
if ($inlineModOptions['approve'])
{
$__compilerVar7 .= '<input type="submit" class="button" value="' . 'Approve' . '" name="approve" />';
}
$__compilerVar7 .= '
		</span>

		<span class="otherActions">
			<select name="a" id="' . (($__compilerVar2) ? (htmlspecialchars($__compilerVar2, ENT_QUOTES, 'UTF-8')) : ('ModerationSelect')) . '" class="textCtrl ModerationSelect">
				<option value="">' . 'Other Action' . '...</option>
				<optgroup label="' . 'Moderation Actions' . '">
					' . $__compilerVar4 . '
				</optgroup>
				<option value="closeOverlay">' . 'Close This Overlay' . '</option>
			</select>

			<input type="submit" class="button primary" value="' . 'Go' . '" />
			<input type="reset" class="button OverlayCloser overylayOnly" value="X" title="' . 'Cancel and close these controls' . '" />
		</span>
	</span>
</span>';
$__output .= $__compilerVar7;
unset($__compilerVar1, $__compilerVar2, $__compilerVar3, $__compilerVar4, $__compilerVar5, $__compilerVar6, $__compilerVar7);
