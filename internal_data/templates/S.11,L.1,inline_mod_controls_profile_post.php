<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__compilerVar1 = '';
$__compilerVar1 .= 'Post Moderation';
$__compilerVar2 = '';
$__compilerVar2 .= '
		';
if ($inlineModOptions['delete'])
{
$__compilerVar2 .= '<option value="delete">' . 'Delete Posts' . '</option>';
}
$__compilerVar2 .= '
		';
if ($inlineModOptions['undelete'])
{
$__compilerVar2 .= '<option value="undelete">' . 'Undelete Posts' . '</option>';
}
$__compilerVar2 .= '
		';
if ($inlineModOptions['approve'])
{
$__compilerVar2 .= '<option value="approve">' . 'Approve Posts' . '</option>';
}
$__compilerVar2 .= '
		';
if ($inlineModOptions['unapprove'])
{
$__compilerVar2 .= '<option value="unapprove">' . 'Unapprove Posts' . '</option>';
}
$__compilerVar2 .= '
		<option value="deselect">' . 'Deselect Posts' . '</option>
	';
$__compilerVar3 = '';
$__compilerVar3 .= 'Select / deselect all posts on this page';
$__compilerVar4 = '';
$__compilerVar4 .= 'Selected Posts';
$__compilerVar5 = '';
$this->addRequiredExternal('css', 'inline_mod');
$__compilerVar5 .= '
';
$this->addRequiredExternal('js', 'js/xenforo/inline_mod.js');
$__compilerVar5 .= '

<span id="InlineModControls">
	<span class="selectionControl secondaryContent">
		<label for="ModerationCheck">
			' . 'Select All' . ' <input type="checkbox" id="ModerationCheck" title="' . htmlspecialchars($__compilerVar3, ENT_QUOTES, 'UTF-8') . '" />
		</label>

		<input type="button" class="button ClickNext" value="&darr;" title="' . 'Move down' . '" />
		<input type="button" class="button ClickPrev" value="&uarr;" title="' . 'Move up' . '" />
		<a class="SelectionCount">' . htmlspecialchars($__compilerVar4, ENT_QUOTES, 'UTF-8') . ': <em class="InlineModCheckedTotal">0</em></a>
	</span>

	<span class="actionControl sectionFooter">
		<span class="commonActions">
			';
if ($inlineModOptions['delete'])
{
$__compilerVar5 .= '<input type="submit" class="button" value="' . 'Delete' . '..." name="delete" />';
}
$__compilerVar5 .= '
			';
if ($inlineModOptions['approve'])
{
$__compilerVar5 .= '<input type="submit" class="button" value="' . 'Approve' . '" name="approve" />';
}
$__compilerVar5 .= '
		</span>

		<span class="otherActions">
			<select name="a" id="ModerationSelect" class="textCtrl">
				<option value="">' . 'Other Action' . '...</option>
				<optgroup label="' . 'Moderation Actions' . '">
					' . $__compilerVar2 . '
				</optgroup>
				<option value="closeOverlay">' . 'Close This Overlay' . '</option>
			</select>

			<input type="submit" class="button primary" value="' . 'Go' . '" />
			<input type="reset" class="button OverlayCloser overylayOnly" value="X" title="' . 'Cancel and close these controls' . '" />
		</span>
	</span>
</span>';
$__output .= $__compilerVar5;
unset($__compilerVar1, $__compilerVar2, $__compilerVar3, $__compilerVar4, $__compilerVar5);
