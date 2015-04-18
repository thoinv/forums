<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__compilerVar1 = '';
$__compilerVar1 .= 'Conversation Management';
$__compilerVar2 = '';
$__compilerVar2 .= '
		<option value="leave">' . 'Leave Conversations' . '...</option>
		<option value="read">' . 'Mark Conversations Read' . '</option>
		<option value="unread">' . 'Mark Conversations Unread' . '</option>
		<option value="star">' . 'Star Conversations' . '</option>
		<option value="unstar">' . 'Unstar Conversations' . '</option>
		<option value="deselect">' . 'Deselect Conversations' . '</option>
	';
$__compilerVar3 = '';
$__compilerVar3 .= 'Select / deselect all conversations on this page';
$__compilerVar4 = '';
$__compilerVar4 .= 'Selected Conversations';
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
