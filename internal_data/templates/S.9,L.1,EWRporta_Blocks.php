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
$__compilerVar1 = '';
$__compilerVar1 .= '<div class="portlet secondaryContent ' . (($block['locked']) ? ('locked') : ('')) . '">
	' . htmlspecialchars($block['block_id'], ENT_QUOTES, 'UTF-8') . '
	<input type="hidden" class="position" name="blocks[' . htmlspecialchars($block['block_id'], ENT_QUOTES, 'UTF-8') . ']" value="' . htmlspecialchars($block['position'], ENT_QUOTES, 'UTF-8') . '" />
</div>';
$__output .= $__compilerVar1;
unset($__compilerVar1);
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
$__compilerVar2 = '';
$__compilerVar2 .= '<div class="portlet secondaryContent ' . (($block['locked']) ? ('locked') : ('')) . '">
	' . htmlspecialchars($block['block_id'], ENT_QUOTES, 'UTF-8') . '
	<input type="hidden" class="position" name="blocks[' . htmlspecialchars($block['block_id'], ENT_QUOTES, 'UTF-8') . ']" value="' . htmlspecialchars($block['position'], ENT_QUOTES, 'UTF-8') . '" />
</div>';
$__output .= $__compilerVar2;
unset($__compilerVar2);
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
$__compilerVar3 = '';
$__compilerVar3 .= '<div class="portlet secondaryContent ' . (($block['locked']) ? ('locked') : ('')) . '">
	' . htmlspecialchars($block['block_id'], ENT_QUOTES, 'UTF-8') . '
	<input type="hidden" class="position" name="blocks[' . htmlspecialchars($block['block_id'], ENT_QUOTES, 'UTF-8') . ']" value="' . htmlspecialchars($block['position'], ENT_QUOTES, 'UTF-8') . '" />
</div>';
$__output .= $__compilerVar3;
unset($__compilerVar3);
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
$__compilerVar4 = '';
$__compilerVar4 .= '<div class="portlet secondaryContent ' . (($block['locked']) ? ('locked') : ('')) . '">
	' . htmlspecialchars($block['block_id'], ENT_QUOTES, 'UTF-8') . '
	<input type="hidden" class="position" name="blocks[' . htmlspecialchars($block['block_id'], ENT_QUOTES, 'UTF-8') . ']" value="' . htmlspecialchars($block['position'], ENT_QUOTES, 'UTF-8') . '" />
</div>';
$__output .= $__compilerVar4;
unset($__compilerVar4);
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
$__compilerVar5 = '';
$__compilerVar5 .= '<div class="portlet secondaryContent ' . (($block['locked']) ? ('locked') : ('')) . '">
	' . htmlspecialchars($block['block_id'], ENT_QUOTES, 'UTF-8') . '
	<input type="hidden" class="position" name="blocks[' . htmlspecialchars($block['block_id'], ENT_QUOTES, 'UTF-8') . ']" value="' . htmlspecialchars($block['position'], ENT_QUOTES, 'UTF-8') . '" />
</div>';
$__output .= $__compilerVar5;
unset($__compilerVar5);
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
$__compilerVar6 = '';
$__compilerVar6 .= '<div class="portlet secondaryContent ' . (($block['locked']) ? ('locked') : ('')) . '">
	' . htmlspecialchars($block['block_id'], ENT_QUOTES, 'UTF-8') . '
	<input type="hidden" class="position" name="blocks[' . htmlspecialchars($block['block_id'], ENT_QUOTES, 'UTF-8') . ']" value="' . htmlspecialchars($block['position'], ENT_QUOTES, 'UTF-8') . '" />
</div>';
$__output .= $__compilerVar6;
unset($__compilerVar6);
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
$__compilerVar7 = '';
$__compilerVar7 .= '<div class="portlet secondaryContent ' . (($block['locked']) ? ('locked') : ('')) . '">
	' . htmlspecialchars($block['block_id'], ENT_QUOTES, 'UTF-8') . '
	<input type="hidden" class="position" name="blocks[' . htmlspecialchars($block['block_id'], ENT_QUOTES, 'UTF-8') . ']" value="' . htmlspecialchars($block['position'], ENT_QUOTES, 'UTF-8') . '" />
</div>';
$__output .= $__compilerVar7;
unset($__compilerVar7);
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
$__compilerVar8 = '';
$__compilerVar8 .= '<div class="portlet secondaryContent ' . (($block['locked']) ? ('locked') : ('')) . '">
	' . htmlspecialchars($block['block_id'], ENT_QUOTES, 'UTF-8') . '
	<input type="hidden" class="position" name="blocks[' . htmlspecialchars($block['block_id'], ENT_QUOTES, 'UTF-8') . ']" value="' . htmlspecialchars($block['position'], ENT_QUOTES, 'UTF-8') . '" />
</div>';
$__output .= $__compilerVar8;
unset($__compilerVar8);
$__output .= '
				';
}
$__output .= '
			</td>
		</tr>
		</table>

		<br />

		<div class="secondaryContent" style="text-align: center;">
			<input type="submit" value="' . 'Save Changes' . '" name="submit" accesskey="s" class="button primary" />
			<a href="' . XenForo_Template_Helper_Core::link('portal/revert', false, array()) . '" class="button">' . 'Revert All' . '</a>
		</div>
	</div>

	<input type="hidden" name="_xfToken" value="' . htmlspecialchars($visitor['csrf_token_page'], ENT_QUOTES, 'UTF-8') . '" />
</form>

';
$__compilerVar9 = '';
$__compilerVar9 .= '<div class="portaCopy copyright muted">
	<a href="http://xenforo.com/community/resources/90/">XenPorta</a>
	&copy; Jason Axelrod from <a href="http://8wayrun.com/">8WAYRUN.COM</a>
</div>';
$__output .= $__compilerVar9;
unset($__compilerVar9);
