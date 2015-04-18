<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__output .= '.hasJs .BbCodeWysiwygEditor
{
	visibility: hidden;
}

.redactor_box {
	' . XenForo_Template_Helper_Core::styleProperty('rteContainer') . '
}

	.redactor_box .redactor_smilies
	{
		overflow: hidden; *zoom: 1;
	}
	
		.redactor_box .redactor_smilies .tabs
		{
			min-height: 0;
		}
		
		.redactor_box .redactor_smilies .smilieContainer
		{
			max-height: 150px;
			overflow: auto;
		}

		.redactor_box .redactor_smilies .primaryContent,
		.redactor_box .redactor_smilies .secondaryContent
		{
			border-bottom: none;
		}
		
		.redactor_box .redactor_smilies .secondaryContent
		{
			border-top: ' . XenForo_Template_Helper_Core::styleProperty('rteContainer.border-bottom-width') . ' ' . XenForo_Template_Helper_Core::styleProperty('rteContainer.border-bottom-style') . ' ' . XenForo_Template_Helper_Core::styleProperty('rteContainer.border-bottom-color') . ';
		}
		
		.redactor_box .redactor_smilies .tabs a
		{
			height: 18px;
			line-height: 18px;
			font-size: 11px;
		}
		

		.redactor_box .redactor_smilies .smilieCategory li
		{
			display: inline-block;
			margin: 0;
			padding: 2px;
			cursor: pointer;
			line-height: 1.6;
		}
		
	.redactor_box .draftNotice,
	.redactor_box .placeholder
	{
		display: none;
		position: relative;
		line-height: 0;
		font-size: 0;
		z-index: 1;
	}
	
	.redactor_box .draftNotice span
	{
		position: absolute;
		right: 20px;
		top: -30px;
		float: right;
		line-height: 14px;
		font-size: 11px;
		color: ' . XenForo_Template_Helper_Core::styleProperty('mutedTextColor') . ';
		padding: 5px;
		border-radius: 3px;
		background: ' . XenForo_Template_Helper_Core::styleProperty('contentBackground') . ';
		box-shadow: 1px 1px 4px ' . XenForo_Template_Helper_Core::styleProperty('mutedTextColor') . ';
		opacity: .5;
	}
		
	.redactor_box .placeholder span
	{
		line-height: 14px;

		' . XenForo_Template_Helper_Core::styleProperty('messageText') . '
	
		position: absolute;
		left: 8px;
		top: 8px;
		color: ' . XenForo_Template_Helper_Core::styleProperty('formElementPrompt.color') . ';
	}


/* TOOLBAR */
.redactor_toolbar {
	' . XenForo_Template_Helper_Core::styleProperty('rteToolbar') . '
}

	.blendedEditor .redactor_box .redactor_toolbar
	{
		max-height: 68px;
	}
	
	.blendedEditor .redactor_box.activated .redactor_toolbar
	{
		max-height: none;
	}

	.redactor_toolbar li {
		float: left;
		margin: 2px 1px;
		margin-right: 0;
		list-style: none;
		outline: none;
	}

		.redactor_toolbar li.redactor_btn_right {
			float: right;
		}

		.redactor_toolbar li a {
			' . XenForo_Template_Helper_Core::styleProperty('rteToolbarButton') . '
		}
		
		html .redactor_toolbar li a,
		html .redactor_toolbar li a:hover,
		html .redactor_toolbar li a:active,
		html .redactor_toolbar li a.redactor_act
		{
			background-image: url(\'' . XenForo_Template_Helper_Core::styleProperty('imagePath') . '/xenforo/editor/icons.png?redactor\');
			background-repeat: no-repeat;
			background-position: 0;
		}

			.redactor_toolbar li a:hover {
				' . XenForo_Template_Helper_Core::styleProperty('rteToolbarButtonHover') . '
			}

			.redactor_toolbar li a:active, .redactor_toolbar li a.redactor_act {
				' . XenForo_Template_Helper_Core::styleProperty('rteToolbarButtonActive') . '
			}

		.redactor_toolbar li li {
			padding: 0;
			margin: 1px;
		}

		.redactor_toolbar li.redactor_btn_group {
			margin-left: 2px;
			margin-right: 2px;
		}

			.redactor_toolbar li.redactor_btn_group ul {
				' . XenForo_Template_Helper_Core::styleProperty('rteToolbarGroup') . '
			}
	
			';
if (XenForo_Template_Helper_Core::styleProperty('rteFaded'))
{
$__output .= '
				/* Fade toolbar when editor is not activated */
				.blendedEditor .redactor_box .redactor_btn_group ul,
				.blendedEditor .redactor_box iframe,
				.blendedEditor .redactor_box .redactor_smilies li
				{
					opacity: 0.5;
					-webkit-transition: opacity 0.3s ease-in-out;
					-moz-transition: opacity 0.3s ease-in-out;
					transition: opacity 0.3s ease-in-out;
				}
		
				.blendedEditor .redactor_box.activated .redactor_btn_group ul,
				.blendedEditor .redactor_box.activated iframe,
				.blendedEditor .redactor_box.activated .redactor_smilies li
				{
					opacity: 1;
				}
			';
}
$__output .= '
	
		.redactor_toolbar li.redactor_separator {
			float: left;
			height: 32px;
			border-left: 1px solid #d3d3d3;
			border-right: 1px solid #f5f5f5;
			padding: 0;
			margin: 0 2px 0 3px;
		}


/*BUTTONS*/

';
$redactorButtons = array(
'redactor_btn_html' => '76',
'redactor_btn_switchmode' => '19',
'redactor_btn_removeformat' => '69',
'redactor_btn_draft' => '70',
'redactor_btn_draftsave' => '70',
'redactor_btn_new' => '58',
'redactor_btn_draftdelete' => '58',
'redactor_btn_bold' => '1',
'redactor_btn_italic' => '2',
'redactor_btn_underline' => '6',
'redactor_btn_deleted' => '3',
'redactor_btn_fontcolor' => '17',
'redactor_btn_fontsize' => '92',
'redactor_btn_fontfamily' => '91',
'redactor_btn_smilies' => '75',
'redactor_btn_alignment' => '46',
'redactor_btn_alignleft' => '46',
'redactor_btn_aligncenter' => '45',
'redactor_btn_alignright' => '47',
'redactor_btn_justify' => '44',
'redactor_btn_unorderedlist' => '53',
'redactor_btn_orderedlist' => '55',
'redactor_btn_outdent' => '43',
'redactor_btn_indent' => '41',
'redactor_btn_image' => '39',
'redactor_btn_table' => '78',
'redactor_btn_link' => '50',
'redactor_btn_createlink' => '50',
'redactor_btn_unlink' => '51',
'redactor_btn_horizontalrule' => '37',
'redactor_btn_code' => '76',
'redactor_btn_insertcode' => '76',
'redactor_btn_quote' => '9',
'redactor_btn_insertquote' => '9',
'redactor_btn_media' => '90',
'redactor_btn_undo' => '88',
'redactor_btn_redo' => '86',
'redactor_btn_spoiler' => '49',
'redactor_btn_insertspoiler' => '49',
'redactor_btn_insert' => '72'
);
$__output .= '
';
foreach ($redactorButtons AS $button => $position)
{
$__output .= '
	html .redactor_toolbar li a.' . htmlspecialchars($button, ENT_QUOTES, 'UTF-8') . ' { background-position: 3px -' . ($position * 32 - 3) . 'px; }
';
}
$__output .= '

';
foreach ($customBbCodes AS $bbCodeTag => $bbCode)
{
$__output .= '
	';
if ($bbCode['editor_icon_url'])
{
$__output .= '
		html .redactor_toolbar li a.redactor_btn_custom_' . htmlspecialchars($bbCodeTag, ENT_QUOTES, 'UTF-8') . '
		{
			background-image: url(\'' . htmlspecialchars($bbCode['editor_icon_url'], ENT_QUOTES, 'UTF-8') . '\');
			';
if ($bbCode['sprite_mode'] AND $bbCode['sprite_params'])
{
$__output .= '
				background-position: ' . htmlspecialchars($bbCode['sprite_params']['x'], ENT_QUOTES, 'UTF-8') . 'px ' . htmlspecialchars($bbCode['sprite_params']['y'], ENT_QUOTES, 'UTF-8') . 'px;
			';
}
$__output .= '
		}
	';
}
$__output .= '
';
}
$__output .= '

';
$redactorButtonsRtl = array(
'redactor_btn_unorderedlist' => '52',
'redactor_btn_orderedlist' => '54',
'redactor_btn_outdent' => '42',
'redactor_btn_indent' => '40',
'redactor_btn_undo' => '87',
'redactor_btn_redo' => '85'
);
$__output .= '
';
foreach ($redactorButtonsRtl AS $button => $position)
{
$__output .= '
	html[dir=rtl] .redactor_toolbar li a.' . htmlspecialchars($button, ENT_QUOTES, 'UTF-8') . ' { background-position: 3px -' . ($position * 32 - 3) . 'px; }
';
}
$__output .= '


/* DROPDOWN */
.redactor_dropdown {
	top: 28px;
	rtl-raw.left: 0;
	z-index: 100004;
	position: absolute;
	width: 200px;
	max-height: 150px;
	overflow: auto;
	background-color: ' . XenForo_Template_Helper_Core::styleProperty('contentBackground') . ';
	border: 1px solid #ccc;
	font-size: 13px;
	box-shadow: 0 2px 5px #ccc;
	line-height: 1.5;
	padding: 5px;
}

	.redactor_dropdown a
	{
		display: block;
		color: ' . XenForo_Template_Helper_Core::styleProperty('contentText') . ';
		padding: 3px 5px;
		text-decoration: none;
	}
	
	.redactor_dropdown a.icon
	{
		padding: 0px 0px 0px 32px;
		height: 24px;
		line-height: 24px;
		background: transparent url(\'' . XenForo_Template_Helper_Core::styleProperty('imagePath') . '/xenforo/editor/icons.png?redactor\') no-repeat 0 0;		
	}
	
		.redactor_dropdown a.alignLeft
		{
			background-position: ' . (($pageIsRtl) ? ('97%') : ('3%')) . ' -' . ($redactorButtons['redactor_btn_alignleft'] * 32 - 3) . 'px;
		}
		.redactor_dropdown a.alignCenter
		{
			background-position: ' . (($pageIsRtl) ? ('97%') : ('3%')) . ' -' . ($redactorButtons['redactor_btn_aligncenter'] * 32 - 3) . 'px;
		}
		.redactor_dropdown a.alignRight
		{
			background-position: ' . (($pageIsRtl) ? ('97%') : ('3%')) . ' -' . ($redactorButtons['redactor_btn_alignright'] * 32 - 3) . 'px;
		}
		
		.redactor_dropdown a.saveDraft
		{
			background-position: ' . (($pageIsRtl) ? ('97%') : ('3%')) . ' -' . ($redactorButtons['redactor_btn_draft'] * 32 - 3) . 'px;
		}
		.redactor_dropdown a.deleteDraft
		{
			background-position: ' . (($pageIsRtl) ? ('97%') : ('3%')) . ' -' . ($redactorButtons['redactor_btn_new'] * 32 - 3) . 'px;
		}
		
		.redactor_dropdown a.code
		{
			background-position: ' . (($pageIsRtl) ? ('97%') : ('3%')) . ' -' . ($redactorButtons['redactor_btn_code'] * 32 - 3) . 'px;
		}		
		.redactor_dropdown a.quote
		{
			background-position: ' . (($pageIsRtl) ? ('97%') : ('3%')) . ' -' . ($redactorButtons['redactor_btn_quote'] * 32 - 3) . 'px;
		}		
		.redactor_dropdown a.spoiler
		{
			background-position: ' . (($pageIsRtl) ? ('97%') : ('3%')) . ' -' . ($redactorButtons['redactor_btn_spoiler'] * 32 - 3) . 'px;
		}		
		.redactor_dropdown a.strikethrough
		{
			background-position: ' . (($pageIsRtl) ? ('97%') : ('3%')) . ' -' . ($redactorButtons['redactor_btn_deleted'] * 32 - 3) . 'px;
		}

	.redactor_dropdown a:hover {
		text-decoration: none;
		background-color: ' . XenForo_Template_Helper_Core::styleProperty('primaryLightest') . ';
	}

.redactor_separator_drop {
	border-top: 1px solid #ddd;
	padding: 0;
	line-height: 0;
	font-size: 0;
}

/* ColorPicker */

.redactor_color_link {
	padding: 0;
	width: 15px;
	height: 15px;
	box-shadow: 0 1px 2px rgba(0, 0, 0, .2) inset;
	border-radius: 4px;
	float: left;
	margin: 2px;
	font-size: 0;
	box-sizing: border-box;
}

.redactor_color_none {
	font-size: 11px;
	clear: both;
}



/* MODAL */
#redactor_modal_overlay {
	position: fixed;
	margin: auto;
	top: 0;
	rtl-raw.left: 0;
	width: 100%;
	height: 100%;
	z-index: 209998;

	opacity: ' . XenForo_Template_Helper_Core::styleProperty('overlayMaskOpacity') . ';
	filter: alpha(opacity=\'' . (floor(XenForo_Template_Helper_Core::styleProperty('overlayMaskOpacity') * 100)) . '\');

	background-color: ' . XenForo_Template_Helper_Core::styleProperty('overlayMaskColor') . ';
}

#redactor_modal {
	padding: 0;
	position: fixed;
	top: 50%;
  	z-index: 209999;
}

#redactor_modal_close {
	overflow: hidden;
	text-indent: -9999px;
	cursor: pointer;
	' . XenForo_Template_Helper_Core::styleProperty('overlayCloseControl') . '
}

#redactor_tabs {
	margin-bottom: 18px;
	text-align: center;
}

	#redactor_tabs a {
		display: inline-block;
		border: 1px solid #d8d8d8;
		padding: 4px 14px;
		font-size: 12px;
		background-color: #ccc;
		text-decoration: none;
		color: #555;
		line-height: 1;
		border-radius: 5px;
		margin-right: 5px;
	}

		#redactor_tabs a:hover, #redactor_tabs a.redactor_tabs_act {
			background-color: #eee;
			padding: 5px 15px;
			box-shadow: 0 1px 2px rgba(0, 0, 0, .4) inset;
			border: none;
			text-shadow: 0 1px 0 #eee;
			color: #777;
			text-decoration: none;
		}

.redactor_editor_drop {
	display: none;
	position: absolute;
	top: 0;
	bottom: 0;
	left: 0;
	right: 0;
	border: 2px dashed #aaa;
	color: #000;
	background: rgba(190, 190, 190, .5);
}

	.redactor_editor_drop.dragDisabled
	{
		background: rgba(190, 140, 140, .5);
		border-color: rgb(150, 75, 75);
	}

	.redactor_editor_drop span {
		display: block;
		text-align: center;
		position: absolute;
		top: 50%;
		width: 100%;
		font-size: 18px;
		line-height: 26px;
		margin-top: -13px;
	}

	.redactor_editor_drop.hover {
		display: block;
	}


/* Drag and Drop Area */
.redactor_droparea {
	position: relative;
    width: 100%;
    margin: auto;
    margin-bottom: 5px;
}
.redactor_droparea .redactor_dropareabox {
	z-index: 1;
	position: relative;
    text-align: center;
    width: 99%;
    background-color: #fff;
    padding: 60px 0;
    border: 2px dashed #bbb;
}
.redactor_droparea .redactor_dropareabox, .redactor_dropalternative {
    color: #555;
    font-size: 12px;
}
.redactor_dropalternative {
	margin: 4px 0 2px 0;
}
.redactor_dropareabox.hover {
    background: #efe3b8;
    border-color: #aaa;
}
.redactor_dropareabox.error {
    background: #f7e5e5;
    border-color: #dcc3c3;
}
.redactor_dropareabox.drop {
    background: #f4f4ee;
    border-color: #e0e5d6;
}';
