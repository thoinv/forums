<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__extraData['title'] = '';
$__extraData['title'] .= 'Customize This Page';
$__output .= '
';
$__extraData['h1'] = '';
$__extraData['h1'] .= 'Customize This Page';
$__output .= '

';
$this->addRequiredExternal('css', 'EWRporta');
$__output .= '
';
$this->addRequiredExternal('js', 'js/8wayrun/EWRporta_ajax.js');
$__output .= '
';
$this->addRequiredExternal('js', 'js/8wayrun/EWRporta_jqui.js');
$__output .= '

<form action="' . XenForo_Template_Helper_Core::link('portal/blocks', false, array()) . '" method="post" class="AutoValidator">

	<div class="sectionMain">
		<table class="adminModules">
		<tr>
			<td class="subHeading">' . 'Position' . ': Top-Left</td>
			<td class="subHeading">' . 'Position' . ': Top-Right</td>
			<td class="subHeading">' . 'Position' . ': Sidebar</td>
		</tr>
		<tr>
			<td class="sectionMain sortColumn" id="top-left">
				';
foreach ($blocks['top-left'] AS $block)
{
$__output .= '
					';
$__compilerVar10 = '';
$__compilerVar10 .= '<div class="portlet secondaryContent ' . (($block['locked']) ? ('locked') : ('')) . '">
	' . htmlspecialchars($block['block_id'], ENT_QUOTES, 'UTF-8') . '
	<input type="hidden" class="position" name="blocks[' . htmlspecialchars($block['block_id'], ENT_QUOTES, 'UTF-8') . ']" value="' . htmlspecialchars($block['position'], ENT_QUOTES, 'UTF-8') . '" />
</div>';
$__output .= $__compilerVar10;
unset($__compilerVar10);
$__output .= '
				';
}
$__output .= '
			</td>
			<td class="sectionMain sortColumn" id="top-right">
				';
foreach ($blocks['top-right'] AS $block)
{
$__output .= '
					';
$__compilerVar11 = '';
$__compilerVar11 .= '<div class="portlet secondaryContent ' . (($block['locked']) ? ('locked') : ('')) . '">
	' . htmlspecialchars($block['block_id'], ENT_QUOTES, 'UTF-8') . '
	<input type="hidden" class="position" name="blocks[' . htmlspecialchars($block['block_id'], ENT_QUOTES, 'UTF-8') . ']" value="' . htmlspecialchars($block['position'], ENT_QUOTES, 'UTF-8') . '" />
</div>';
$__output .= $__compilerVar11;
unset($__compilerVar11);
$__output .= '
				';
}
$__output .= '
			</td>
			<td class="sectionMain sortColumn" rowspan="5" id="sidebar">
				';
foreach ($blocks['sidebar'] AS $block)
{
$__output .= '
					';
$__compilerVar12 = '';
$__compilerVar12 .= '<div class="portlet secondaryContent ' . (($block['locked']) ? ('locked') : ('')) . '">
	' . htmlspecialchars($block['block_id'], ENT_QUOTES, 'UTF-8') . '
	<input type="hidden" class="position" name="blocks[' . htmlspecialchars($block['block_id'], ENT_QUOTES, 'UTF-8') . ']" value="' . htmlspecialchars($block['position'], ENT_QUOTES, 'UTF-8') . '" />
</div>';
$__output .= $__compilerVar12;
unset($__compilerVar12);
$__output .= '
				';
}
$__output .= '
			</td>
		</tr>
		<tr>
			<td class="subHeading">' . 'Position' . ': Mid-Left</td>
			<td class="subHeading">' . 'Position' . ': Mid-Right</td>
		</tr>
		<tr>
			<td class="sectionMain sortColumn" id="mid-left">
				';
foreach ($blocks['mid-left'] AS $block)
{
$__output .= '
					';
$__compilerVar13 = '';
$__compilerVar13 .= '<div class="portlet secondaryContent ' . (($block['locked']) ? ('locked') : ('')) . '">
	' . htmlspecialchars($block['block_id'], ENT_QUOTES, 'UTF-8') . '
	<input type="hidden" class="position" name="blocks[' . htmlspecialchars($block['block_id'], ENT_QUOTES, 'UTF-8') . ']" value="' . htmlspecialchars($block['position'], ENT_QUOTES, 'UTF-8') . '" />
</div>';
$__output .= $__compilerVar13;
unset($__compilerVar13);
$__output .= '
				';
}
$__output .= '
			</td>
			<td class="sectionMain sortColumn" id="mid-right">
				';
foreach ($blocks['mid-right'] AS $block)
{
$__output .= '
					';
$__compilerVar14 = '';
$__compilerVar14 .= '<div class="portlet secondaryContent ' . (($block['locked']) ? ('locked') : ('')) . '">
	' . htmlspecialchars($block['block_id'], ENT_QUOTES, 'UTF-8') . '
	<input type="hidden" class="position" name="blocks[' . htmlspecialchars($block['block_id'], ENT_QUOTES, 'UTF-8') . ']" value="' . htmlspecialchars($block['position'], ENT_QUOTES, 'UTF-8') . '" />
</div>';
$__output .= $__compilerVar14;
unset($__compilerVar14);
$__output .= '
				';
}
$__output .= '
			</td>
		</tr>
		<tr>
			<td class="subHeading">' . 'Position' . ': Btm-Left</td>
			<td class="subHeading">' . 'Position' . ': Btm-Right</td>
		</tr>
		<tr>
			<td class="sectionMain sortColumn" id="btm-left">
				';
foreach ($blocks['btm-left'] AS $block)
{
$__output .= '
					';
$__compilerVar15 = '';
$__compilerVar15 .= '<div class="portlet secondaryContent ' . (($block['locked']) ? ('locked') : ('')) . '">
	' . htmlspecialchars($block['block_id'], ENT_QUOTES, 'UTF-8') . '
	<input type="hidden" class="position" name="blocks[' . htmlspecialchars($block['block_id'], ENT_QUOTES, 'UTF-8') . ']" value="' . htmlspecialchars($block['position'], ENT_QUOTES, 'UTF-8') . '" />
</div>';
$__output .= $__compilerVar15;
unset($__compilerVar15);
$__output .= '
				';
}
$__output .= '
			</td>
			<td class="sectionMain sortColumn" id="btm-right">
				';
foreach ($blocks['btm-right'] AS $block)
{
$__output .= '
					';
$__compilerVar16 = '';
$__compilerVar16 .= '<div class="portlet secondaryContent ' . (($block['locked']) ? ('locked') : ('')) . '">
	' . htmlspecialchars($block['block_id'], ENT_QUOTES, 'UTF-8') . '
	<input type="hidden" class="position" name="blocks[' . htmlspecialchars($block['block_id'], ENT_QUOTES, 'UTF-8') . ']" value="' . htmlspecialchars($block['position'], ENT_QUOTES, 'UTF-8') . '" />
</div>';
$__output .= $__compilerVar16;
unset($__compilerVar16);
$__output .= '
				';
}
$__output .= '
			</td>
		</tr>
		</table>

		<br />

		<table class="adminModules">
		<tr>
			<td class="subHeading">' . 'Disabled Blocks' . '</td>
		</tr>
		<tr>
			<td class="sectionMain sortColumn" id="disabled">
				';
foreach ($blocks['disabled'] AS $block)
{
$__output .= '
					';
$__compilerVar17 = '';
$__compilerVar17 .= '<div class="portlet secondaryContent ' . (($block['locked']) ? ('locked') : ('')) . '">
	' . htmlspecialchars($block['block_id'], ENT_QUOTES, 'UTF-8') . '
	<input type="hidden" class="position" name="blocks[' . htmlspecialchars($block['block_id'], ENT_QUOTES, 'UTF-8') . ']" value="' . htmlspecialchars($block['position'], ENT_QUOTES, 'UTF-8') . '" />
</div>';
$__output .= $__compilerVar17;
unset($__compilerVar17);
$__output .= '
				';
}
$__output .= '
			</td>
		</tr>
		</table>

		<br />

		<div class="secondaryContent" style="text-align: center;">
			<input type="submit" value="' . 'Lưu thay đổi' . '" name="submit" accesskey="s" class="button primary" />
			<a href="' . XenForo_Template_Helper_Core::link('portal/revert', false, array()) . '" class="button">' . 'Revert All' . '</a>
		</div>
	</div>

	<input type="hidden" name="_xfToken" value="' . htmlspecialchars($visitor['csrf_token_page'], ENT_QUOTES, 'UTF-8') . '" />
</form>

';
$__compilerVar18 = '';
$__compilerVar18 .= '<div class="portaCopy copyright muted">
	<a href="http://xenforo.com/community/resources/90/">XenPorta</a>
	&copy; Jason Axelrod from <a href="http://8wayrun.com/">8WAYRUN.COM</a>
</div>';
$__output .= $__compilerVar18;
unset($__compilerVar18);
