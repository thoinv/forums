<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__compilerVar4 = '';
$__compilerVar4 .= 'isMiu';
$__compilerVar5 = '';
$__compilerVar5 .= '
		data-normal-width="' . XenForo_Template_Helper_Core::styleProperty('adv_template_normaltitlefield_width') . '"
		data-streched-width="' . XenForo_Template_Helper_Core::styleProperty('adv_template_stretchedtitlefield_width') . '"
		data-auto="' . 'Auto' . '"
	';
$__compilerVar6 = '';
$this->addRequiredExternal('css', 'editor_dialog_fast');
$__compilerVar6 .= '
';
$this->addRequiredExternal('css', 'editor_dialog_advlatex');
$__compilerVar6 .= '

';
if ($xenOptions['AdvBBcodeBar_debug_devmode'])
{
$__compilerVar6 .= '
	';
$this->addRequiredExternal('js', 'js/tinymce/plugins/advtoolbar/templates/src/advlatex_manager_src.js');
$__compilerVar6 .= '
	';
$this->addRequiredExternal('js', 'js/tinymce/plugins/advtoolbar/templates/src/advlatex_sender_src.js');
$__compilerVar6 .= '
';
}
else
{
$__compilerVar6 .= '
	';
$this->addRequiredExternal('js', 'js/tinymce/plugins/advtoolbar/templates/advlatex_manager.js');
$__compilerVar6 .= '
	';
$this->addRequiredExternal('js', 'js/tinymce/plugins/advtoolbar/templates/advlatex_sender.js');
$__compilerVar6 .= '
';
}
$__compilerVar6 .= '

<form method="post" class="section cust_popup">
	<div id="adv_latex" class="cust_popup_content fastlatex ' . htmlspecialchars($__compilerVar4, ENT_QUOTES, 'UTF-8') . '" ' . $__compilerVar5 . '>
		<h1 class="heading cust_heading">' . 'Latex Insertion Panel' . '</h1>
		<div id="formbox">
			<div class="secondaryContent">
				' . 'Title:' . ' <input id="ctrl_title" name="title" type="text" class="textCtrl" style="width:' . XenForo_Template_Helper_Core::styleProperty('adv_template_normaltitlefield_width') . '" value="' . 'Auto' . '" />
				<span class="advtopextra">' . 'Width:' . ' <input id="ctrl_width" name="width" type="text" class="textCtrl" style="width:' . XenForo_Template_Helper_Core::styleProperty('adv_template_widthfield_width') . '" value="' . 'Auto' . '" /> <input id="ctrl_widthtype" name="widthtype" type="text" class="textCtrl" style="width:15px" readonly="true" value="%" /></span>
				<span class="advtopextra">' . 'Block align:' . '
					<select name="type" id="ctrl_blockalign" class="textCtrl">
						<option value="bleft">' . 'Normal left' . '</option>
						<option value="bcenter">' . 'Normal center' . '</option>
						<option value="bright">' . 'Normal right' . '</option>
						<option value="fleft">' . 'Float left' . '</option>
						<option value="fright">' . 'Float right' . '</option>
					</select>
				</span>
				<div id="cmd_height" class="advtopextra">' . 'Height:' . ' <input id="ctrl_height" name="height" type="text" class="textCtrl" style="width:' . XenForo_Template_Helper_Core::styleProperty('adv_template_widthfield_width') . '" value="' . 'Auto' . '" /> <span id="heightpx">px</span></div>
			</div>

			<div class="primaryContent">
				' . 'Type your latex code here' . '
				<textarea name="text" id="ctrl_text" style="display: block; width: 98%; height: 98px; resize: none" class="textCtrl caption mceFocus miuFocus"></textarea>
			</div>

			<div id="trigger_help" class="subHeading">' . 'Basic Commands (click here)' . '</div>

			<div id="help_content">
				<div class="primaryContent">
					<table class="latex_helper">
						<tr id="op_desc">
							<td class="cmd">' . 'Command' . '</td>
							<td class="desc">' . 'Description' . '</td>
							<td class="example">' . 'Example' . '</td>
							<td class="img">' . 'Display' . '</td>
						</tr>
						<tr id="op_fontsize">
							<td class="cmd">\\fontsize{2}</td>
							<td class="desc">' . 'Font size (from 1 (tiny) to 7 (Huge)' . '</td>
							<td class="example">&nbsp</td>
							<td class="img">&nbsp</td>
						</tr>	
						<tr id="op_return">
							<td class="cmd">//</td>
							<td class="desc">' . 'Carriage return' . '</td>
							<td class="example">&nbsp</td>
							<td class="img">&nbsp</td>
						</tr>
						<tr id="op_add">
							<td class="cmd">+</td>
							<td class="desc">' . 'Addition operator' . '</td>
							<td class="example">1+2</td>
							<td class="img"><img src="js/tinymce/plugins/advtoolbar/templates/latex_help/add.png" alt="" /></td>
						</tr>
						<tr id="op_subtr">
							<td class="cmd">-</td>
							<td class="desc">' . 'Substraction operator' . '</td>
							<td class="example">1-2</td>
							<td class="img"><img src="js/tinymce/plugins/advtoolbar/templates/latex_help/substr.png" alt="" /></td>
						</tr>
						<tr id="op_times">
							<td class="cmd">\\times</td>
							<td class="desc">' . 'Multiplication operator' . '</td>
							<td class="example">1\\times2</td>
							<td class="img"><img src="js/tinymce/plugins/advtoolbar/templates/latex_help/times.png" alt="" /></td>
						</tr>
						<tr id="op_divide">
							<td class="cmd">\\div</td>
							<td class="desc">' . 'Division operator' . '</td>
							<td class="example">1\\div2</td>
							<td class="img"><img src="js/tinymce/plugins/advtoolbar/templates/latex_help/divide.png" alt="" /></td>
						</tr>
						<tr id="op_frac_1">
							<td class="cmd">\\frac...{}</td>
							<td class="desc">' . 'Fraction operator (example 1)' . '</td>
							<td class="example">\\frac 1{2}</td>
							<td class="img"><img src="js/tinymce/plugins/advtoolbar/templates/latex_help/frac_1.png" alt="" /></td>
						</tr>
						<tr id="op_frac_2">
							<td class="cmd">\\frac...{}</td>
							<td class="desc">' . 'Fraction operator (example 2)' . '</td>
							<td class="example">\\frac 1{2+x^2}</td>
							<td class="img"><img src="js/tinymce/plugins/advtoolbar/templates/latex_help/frac_2.png" alt="" /></td>
						</tr>
						<tr id="op_global_brackets">
							<td class="cmd">\\left(...\\right)</td>
							<td class="desc">' . 'Wrapping brackets' . '</td>
							<td class="example">\\left( \\frac 1{2+x^2} \\right)</td>
							<td class="img"><img src="js/tinymce/plugins/advtoolbar/templates/latex_help/global_brackets.png" alt="" /></td>
						</tr>
					</table>
					<div id="latex_link"><a href="http://www.forkosh.com/mimetexmanual.html?reference" target="_blank">' . 'Mimetex Manual' . '</a> - <a href="http://www.ultrametrik.de/wbb/symbols.htm" target="_blank">' . 'Mimetex Symbols' . '</a></div>
				</div>
			</div>
		
		</div>

      		<div class="sectionFooter">
      			<div style="float: right">
      				<input type="button" id="cancel" name="cancel" value="' . 'Hủy bỏ' . '" class="button close" />
      			</div>
      			<input type="submit" id="insert" name="insert" value="' . 'Chèn' . '" class="tinyTrigger miuTrigger button primary" />
      		</div>
      		<input type="hidden" name="_xfToken" value="' . htmlspecialchars($visitor['csrf_token_page'], ENT_QUOTES, 'UTF-8') . '" />
	</div>
</form>
		
';
$__output .= $__compilerVar6;
unset($__compilerVar4, $__compilerVar5, $__compilerVar6);
