<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__compilerVar1 = '';
$__compilerVar1 .= 'isMiu';
$__compilerVar2 = '';
$__compilerVar2 .= '
		data-normal-width="' . XenForo_Template_Helper_Core::styleProperty('adv_template_normaltitlefield_width') . '"
		data-streched-width="' . XenForo_Template_Helper_Core::styleProperty('adv_template_stretchedtitlefield_width') . '"
		data-auto="' . 'Auto' . '"
		data-bimgid="' . 'Id:' . '"
	';
$__compilerVar3 = '';
$this->addRequiredExternal('css', 'editor_dialog_fast');
$__compilerVar3 .= '
';
$this->addRequiredExternal('css', 'editor_dialog_advaccordion');
$__compilerVar3 .= '

';
if ($xenOptions['AdvBBcodeBar_debug_devmode'])
{
$__compilerVar3 .= '
	';
$this->addRequiredExternal('js', 'js/tinymce/plugins/advtoolbar/templates/src/advaccordion_manager_src.js');
$__compilerVar3 .= '
	';
$this->addRequiredExternal('js', 'js/tinymce/plugins/advtoolbar/templates/src/advaccordion_sender_src.js');
$__compilerVar3 .= '
';
}
else
{
$__compilerVar3 .= '
	';
$this->addRequiredExternal('js', 'js/tinymce/plugins/advtoolbar/templates/advaccordion_manager.js');
$__compilerVar3 .= '
	';
$this->addRequiredExternal('js', 'js/tinymce/plugins/advtoolbar/templates/advaccordion_sender.js');
$__compilerVar3 .= '
';
}
$__compilerVar3 .= '

<form method="post" class="section cust_popup">
	<div id="adv_accordion" class="cust_popup_content fastaccordion ' . htmlspecialchars($__compilerVar1, ENT_QUOTES, 'UTF-8') . '" ' . $__compilerVar2 . '>
		<div id="adv_mode">
			<select name="type" id="ctrl_mode" class="textCtrl">
				<option value="accordion">' . 'Accordion' . '</option>
				<option value="tabs">' . 'Tabs' . '</option>
			</select>
		</div>
		<h1 class="heading cust_heading">' . 'Slides Insertion Panel' . '</h1>
		<div id="formbox">
			<div style="100%" id="topbox" class="secondaryContent">
				<div id="menu_right">
					<div>' . 'Block align:' . '
						<select name="type" id="ctrl_blockalign" class="textCtrl">
							<option value="bleft">' . 'Normal left' . '</option>
							<option value="bcenter">' . 'Normal center' . '</option>
							<option value="bright">' . 'Normal right' . '</option>
							<option value="fleft">' . 'Float left' . '</option>
							<option value="fright">' . 'Float right' . '</option>
						</select>
					</div>
					<div id="createSlide"><div class="button_create">' . 'Add a slide' . '</div></div>
				</div>
				<div id="menu_left">
					<span>' . 'Block width: ' . ' <input id="ctrl_width" name="width" type="text" class="textCtrl" style="width:' . XenForo_Template_Helper_Core::styleProperty('adv_template_widthfield_width') . '" value="' . 'Auto' . '" /> <input id="ctrl_widthtype" name="widthtype" type="text" class="textCtrl" style="width:15px" readonly="true" value="px" /></span>
					<div id="MasterHeight" class="CMD_Height">
						' . 'Slides height:' . ' <input id="ctrl_height" name="height" type="text" class="textCtrl" style="width:100px" value="' . 'Full display' . '" /> <span class="heightpx">px</span>
					</div>
				</div>
			</div>
			<div class="primaryContent">
				<ul id="model" style="display:none">
					<li id="slide_replaceid" class="slide">
						<div class="slide_manage"><div class="button_x deleteSlide"><span>x</span></div><div id="id_replaceid" class="CMD_Id displayid">replaceid</div></div>
						<div class="slide_title">
							<ul class="title_options">
								<li class="CMD_Title">' . 'Title:' . ' <input id="slide_title_replaceid" name="slidetitlereplaceid" type="text" class="textCtrl" style="width:' . XenForo_Template_Helper_Core::styleProperty('adv_template_widthfield_width') . '" value="" /></li>
								<li class="CMD_Align">
									<ul class="align_options">
										<li><div class="align_button align_left align_select_left"></div></li>
										<li><div class="align_button align_center"></div></li>
										<li><div class="align_button align_right"></div></li>
									</ul>
									<input id="slide_align_replaceid" name="slidealignreplaceid" type="hidden" value="left" />
								</li>
								<li class="CMD_Height">' . 'Height:' . ' <input id="slide_height_replaceid" name="slideheightreplaceid" type="text" class="textCtrl" style="width:100px;text-align:center" value="' . 'Full display' . '" /> <span class="heightpx">px</span></li>
								<li class="CMD_Open"><div class="openbox"><input id="slide_open_replaceid" name="slideopenreplaceid" type="checkbox" value="open" /> ' . 'Open?' . '</div></li>
							</ul>
						</div>
						<div class="CMD_Content slide_content"><textarea id="slide_content_replaceid" name="slidecontentreplaceid" style="display: block; width: 98%; height: 15px; resize: none" class="textCtrl"></textarea></div>
					</li>
				</ul>
				<ul id="slides" class="slides_container">
					<li id="slide_1" class="slide">
						<div class="slide_manage"><div id="id_1" class="CMD_Id displayid">1</div></div>
						<div class="slide_title">
							<ul class="title_options">
								<li class="CMD_Title">' . 'Title:' . ' <input id="slide_title_1" name="slidetitle1" type="text" class="textCtrl" style="width:' . XenForo_Template_Helper_Core::styleProperty('adv_template_widthfield_width') . '" value="" /></li>
								<li class="CMD_Align">
									<ul class="align_options">
										<li><div class="align_button align_left align_select_left"></div></li>
										<li><div class="align_button align_center"></div></li>
										<li><div class="align_button align_right"></div></li>
									</ul>
									<input id="slide_align_1" name="slidealign1" type="hidden" value="left" />
								</li>
								<li class="CMD_Height">' . 'Height:' . ' <input id="slide_height_1" name="slideheight1" type="text" class="textCtrl" style="width:100px;text-align:center" value="' . 'Full display' . '" /> <span class="heightpx">px</span></li>
								<li class="CMD_Open"><div class="openbox"><input id="slide_open_1" name="slideopen1" type="checkbox" value="open" /> ' . 'Open?' . '</div></li>
							</ul>
						</div>
						<div class="CMD_Content slide_content"><textarea id="slide_content_1" name="slidecontent1" style="display: block; width: 98%; height: 15px; resize: none" class="textCtrl miuFocus"></textarea></div>
					</li>
				</ul>
			</div>
		</div>
		<div class="sectionFooter">
			<div style="float: right">
				<input type="button" id="cancel" name="cancel" value="' . 'Cancel' . '" class="button close"  />
			</div>
			<input type="submit" id="insert" name="insert" value="' . 'Insert' . '" class="tinyTrigger miuTrigger button primary" />
		</div>
		<input type="hidden" name="_xfToken" value="' . htmlspecialchars($visitor['csrf_token_page'], ENT_QUOTES, 'UTF-8') . '" />
	</div>
</form>';
$__output .= $__compilerVar3;
unset($__compilerVar1, $__compilerVar2, $__compilerVar3);
