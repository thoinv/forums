<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$this->addRequiredExternal('css', 'quattro_dialog');
$__output .= '
';
$this->addRequiredExternal('css', 'quattro_dialog_bbm_adv_latex');
$__output .= '
';
$this->addRequiredExternal('js', 'js/sedo/advtoolbar/tinyquattro/latex.js');
$__output .= '

<div class="mceTitle FastReload" data-width="550" data-height="250">' . 'Latex Insertion Panel' . '</div>

<div id="adv_latex">
	<dl id="adv_latex_align" class="xenmce_inline">
		<dt></dt>
		<dd>
			<select id="adv_latex_align" name="blockalign" class="mce-textbox">
				<option value="bleft">' . 'Normal left' . '</option>
				<option value="bcenter">' . 'Normal center' . '</option>
				<option value="bright">' . 'Normal right' . '</option>
				<option value="fleft">' . 'Float left' . '</option>
				<option value="fright">' . 'Float right' . '</option>
			</select>
		</dd>
	</dl>

	<div class="mceTabs">
		<div id="xentabs_bimg_general">' . 'Latex input' . '</div>
		<div id="xentabs_bimg_caption">' . 'Latex help' . '</div>
	</div>

	<div class="mcePanes">
		<div id="xenpane_latex_general">
			<dl class="xenmce_inline">
				<dt>' . 'Title:' . '</dt>
				<dd><input 	id="adv_latex_title"
						name="title"
						type="text"
						style="width:50px;margin-right:15px"
						class="mce-textbox mceFocus"
						value="' . 'Auto' . '"
					/>
				</dd>	
		
				<dt>' . 'Width:' . '</dt>
				<dd><input 	id="adv_latex_width"
						name="width"
						type="text"
						style="width:50px;"
						class="mce-textbox"
						value="' . 'Auto' . '"
					/>
				</dd>
		
				<dt></dt>
				<dd><input 	id="adv_latex_width_type"
						name="widthType"
						type="text"
						class="mce-textbox"
						style="width:20px;margin-right:15px"
						readonly="true"
						value="%" 
					/>
				</dd>
		
				<dt>' . 'Height:' . '</dt>
				<dd><input 	id="adv_latex_height"
						name="height"
						type="text"
						style="width:50px"
						class="mce-textbox"
						value="' . 'Auto' . '"
					/>
				</dd>

				<dt></dt>
				<dd><input 	id="adv_latex_height_px"
						name="heightType"
						type="text"
						class="mce-textbox disable"
						style="width:20px"
						readonly="true"
						value="px" 
					/>
				</dd>
			</dl>

			<dl>
				<dt></dt>
				<dd><textarea	id="adv_latex_text"
						name="text"
						type="text"
						data-message="' . 'Type your latex code here' . '"	
						class="mce-textbox MceReset MceSelec mceFocus"
					>' . (($selection['bbCode']) ? (htmlspecialchars($selection['bbCode'], ENT_QUOTES, 'UTF-8')) : ('Type your latex code here')) . '</textarea>
				</dd>
			</dl>
		</div>
		<div id="xenpane_latex_help">
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
					<td class="img"><img src="styles/sedo/adv/latex_help/add.png" alt="" /></td>
				</tr>
				<tr id="op_subtr">
					<td class="cmd">-</td>
					<td class="desc">' . 'Substraction operator' . '</td>
					<td class="example">1-2</td>
					<td class="img"><img src="styles/sedo/adv/latex_help/substr.png" alt="" /></td>
				</tr>
				<tr id="op_times">
					<td class="cmd">\\times</td>
					<td class="desc">' . 'Multiplication operator' . '</td>
					<td class="example">1\\times2</td>
					<td class="img"><img src="styles/sedo/adv/latex_help/times.png" alt="" /></td>
				</tr>
				<tr id="op_divide">
					<td class="cmd">\\div</td>
					<td class="desc">' . 'Division operator' . '</td>
					<td class="example">1\\div2</td>
					<td class="img"><img src="styles/sedo/adv/latex_help/divide.png" alt="" /></td>
				</tr>
				<tr id="op_frac_1">
					<td class="cmd">\\frac...{}</td>
					<td class="desc">' . 'Fraction operator (example 1)' . '</td>
					<td class="example">\\frac 1{2}</td>
					<td class="img"><img src="styles/sedo/adv/latex_help/frac_1.png" alt="" /></td>
				</tr>
				<tr id="op_frac_2">
					<td class="cmd">\\frac...{}</td>
					<td class="desc">' . 'Fraction operator (example 2)' . '</td>
					<td class="example">\\frac 1{2+x^2}</td>
					<td class="img"><img src="styles/sedo/adv/latex_help/frac_2.png" alt="" /></td>
				</tr>
				<tr id="op_global_brackets">
					<td class="cmd">\\left(...\\right)</td>
					<td class="desc">' . 'Wrapping brackets' . '</td>
					<td class="example">\\left( \\frac 1{2+x^2} \\right)</td>
					<td class="img"><img src="styles/sedo/adv/latex_help/global_brackets.png" alt="" /></td>
				</tr>
			</table>

			<div id="latex_link"><a href="http://www.forkosh.com/mimetexmanual.html?reference" target="_blank">' . 'Mimetex Manual' . '</a> - <a href="http://www.ultrametrik.de/wbb/symbols.htm" target="_blank">' . 'Mimetex Symbols' . '</a></div>
		</div>
</div>';
