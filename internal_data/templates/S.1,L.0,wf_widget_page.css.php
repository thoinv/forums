<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__output .= '.WidgetFramework_WidgetPage_LayoutVertical {
	margin: 0;
	padding: 0;
	width: 100% !important;
}
' . XenForo_Template_Helper_Core::callHelper('clearfix', array(
'0' => '.WidgetFramework_WidgetPage_LayoutVertical'
)) . '

.WidgetFramework_WidgetPage_LayoutVertical .WidgetFramework_WidgetPage_LayoutColumn {
	display: block;
	float: left;
	overflow: hidden;
}

.WidgetFramework_WidgetPage_LayoutVertical .WidgetFramework_WidgetPage_LayoutColumn.isLast > .margin {
	margin-right: 0 !important;
}

.WidgetFramework_WidgetPage_LayoutHorizontal {
	width: 100%;
	margin: 0;
	padding: 0;
}

.WidgetFramework_WidgetPage_LayoutHorizontal .WidgetFramework_WidgetPage_LayoutRow {
	width: 100%;
	overflow: hidden;
}

#WidgetPageContent .widget > h3 {
	font-size: 12pt;
	font-weight: bold;
}';
