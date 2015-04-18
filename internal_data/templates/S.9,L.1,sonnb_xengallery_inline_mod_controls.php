<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$this->addRequiredExternal('css', 'sonnb_xengallery_inline_mod_controls');
$__output .= '
';
$this->addRequiredExternal('js', 'js/sonnb/XenGallery/gallery.inlinemod.js');
$__output .= '

<span id="' . (($controlId) ? (htmlspecialchars($controlId, ENT_QUOTES, 'UTF-8')) : ('InlineModControls')) . '" class="InlineModControls">
	<span class="selectionControl secondaryContent">
		<label for="ModerationCheck">
			' . 'Select All' . ' <input type="checkbox" id="ModerationCheck" title="' . htmlspecialchars($checkboxTitle, ENT_QUOTES, 'UTF-8') . '" />
		</label>

		<input type="button" class="button ClickNext" value="&darr;" title="' . 'Move down' . '" />
		<input type="button" class="button ClickPrev" value="&uarr;" title="' . 'Move up' . '" />
		<a class="SelectionCount">' . htmlspecialchars($selectedItemsPhrase, ENT_QUOTES, 'UTF-8') . ': <em class="InlineModCheckedTotal">0</em></a>
	</span>

	<span class="actionControl sectionFooter">
		<span class="commonActions">
			';
if ($inlineModOptions['delete'])
{
$__output .= '<input type="submit" class="button" value="' . 'Delete' . '..." name="delete" />';
}
$__output .= '
			';
if ($inlineModOptions['approve'])
{
$__output .= '<input type="submit" class="button" value="' . 'Approve' . '" name="approve" />';
}
$__output .= '
		</span>

		<span class="otherActions">
			<select name="a" id="' . (($selectId) ? (htmlspecialchars($selectId, ENT_QUOTES, 'UTF-8')) : ('ModerationSelect')) . '" class="textCtrl ModerationSelect">
				<option value="">' . 'Other Action' . '...</option>
				<optgroup label="' . 'Moderation Actions' . '">
					' . $options . '
				</optgroup>
				<option value="closeOverlay">' . 'Close This Overlay' . '</option>
			</select>

			<input type="submit" class="button primary" value="' . 'Go' . '" />
			<input type="reset" class="button OverlayCloser overylayOnly" value="X" title="' . 'Cancel and close these controls' . '" />
		</span>
	</span>
</span>';
