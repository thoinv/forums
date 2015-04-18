<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__output .= '.Tinhte_XenTag_TagsEditor {
	overflow: auto;
}
	.ctrlUnit dd .Tinhte_XenTag_TagsEditor li,
	.Tinhte_XenTag_TagsEditor li {
		float: left;
		display: block;
		border-radius: 5px;
		margin: 2px 5px 2px 0;
	}
	
	.Tinhte_XenTag_TagsEditor .Tinhte_XenTag_Tag {
		' . XenForo_Template_Helper_Core::styleProperty('secondaryContent.background') . '
		
		color: ' . XenForo_Template_Helper_Core::styleProperty('textCtrlText') . ';
		padding: 3px;
		border: 1px solid ' . XenForo_Template_Helper_Core::styleProperty('primaryLight') . ';
	}
		.Tinhte_XenTag_TagsEditor .Tinhte_XenTag_Tag:hover {
			background-color: ' . XenForo_Template_Helper_Core::styleProperty('primaryLighterStill') . ';
		}
		.Tinhte_XenTag_TagsEditor .Tinhte_XenTag_Tag a.delete {
			color: #777777;
			cursor: pointer;
			font-size: 12px;
			font-weight: bold;
			outline: medium none;
			text-decoration: none;
			padding: 2px 0 2px 3px;
		}
		
	.Tinhte_XenTag_TagsEditor .Tinhte_XenTag_TagNew {
		padding: 2px 4px 1px 0;
	}
		.Tinhte_XenTag_TagsEditor .Tinhte_XenTag_TagNew .textCtrl.Tinhte_XenTag_TagNewInput {
			margin: 0 !important;
			padding: 3px !important;
			border: none !important;
			width: inherit !important;
			background: transparent !important;
		}
		.Tinhte_XenTag_TagsEditor .Tinhte_XenTag_TagNew .textCtrl.Tinhte_XenTag_TagNewInput:focus {
			border: none !important;
			background: transparent !important;
		}

.Tinhte_XenTag_TagsInlineEditorForm {
	/* this class is added to the form by javascript */
}
	.xenForm.Tinhte_XenTag_TagsInlineEditorForm {
		margin: 0;
		width: auto;
	}
	.Tinhte_XenTag_TagsInlineEditorForm .Tinhte_XenTag_TagsEditor.textCtrl {
		border: 0;
		background: transparent;
	}

/* Tag cloud */

.Tinhte_XenTag_TagCloud {
}
' . XenForo_Template_Helper_Core::callHelper('clearfix', array(
'0' => '.Tinhte_XenTag_TagCloud'
)) . '

	.Tinhte_XenTag_TagCloud .Tinhte_XenTag_TagCloudTag {
		background: ' . XenForo_Template_Helper_Core::styleProperty('primaryMedium') . ';
		color: ' . XenForo_Template_Helper_Core::styleProperty('primaryLightest') . ';
		display: inline;
		float: left;
		margin: 0.2em;
		padding: 0;
	}

	.Tinhte_XenTag_TagCloud .Tinhte_XenTag_TagCloudTag:hover {
		background: ' . XenForo_Template_Helper_Core::styleProperty('secondaryLighter') . ';
		color: ' . XenForo_Template_Helper_Core::styleProperty('primaryDark') . ';
	}
	
	.Tinhte_XenTag_TagCloud .Tinhte_XenTag_TagCloudTag a {
		color: inherit;
		display: block;
		font-size: 1em;
		font-weight: bold;
		margin: 0.5em;
		text-decoration: none;
		white-space: nowrap;
	}

	.Tinhte_XenTag_TagCloud .Tinhte_XenTag_TagCloud_Level1 { background-color: ' . XenForo_Template_Helper_Core::styleProperty('primaryLighterStill') . '; color: ' . XenForo_Template_Helper_Core::styleProperty('primaryMedium') . '; }
	.Tinhte_XenTag_TagCloud .Tinhte_XenTag_TagCloud_Level2 { background-color: ' . XenForo_Template_Helper_Core::styleProperty('primaryLighter') . '; }
	.Tinhte_XenTag_TagCloud .Tinhte_XenTag_TagCloud_Level3 { background-color: ' . XenForo_Template_Helper_Core::styleProperty('primaryLight') . '; }
	
.tinhte_xentag_tag_list .xenForm fieldset {
	/* disable the separating line for fieldset */
	border: 0;
}

.Tinhte_XenTag_Copyright {
	float: right;
}

';
if (XenForo_Template_Helper_Core::styleProperty('tinhte_xentag_showIconInTagLink'))
{
$__output .= '
a.Tinhte_XenTag_TagLink:link,
a.Tinhte_XenTag_TagLink:visited,
a.Tinhte_XenTag_TagLink:hover,
a.Tinhte_XenTag_TagLink:focus {
	background: url(\'' . XenForo_Template_Helper_Core::styleProperty('imagePath') . '/Tinhte/XenTag/tag.png\') bottom right no-repeat;
	padding-right: 12px !important;
}
';
}
$__output .= '

.Tinhte_XenTag_TagResult {
}
	.Tinhte_XenTag_TagResult_ContentCount {
		float: right;
	}';
