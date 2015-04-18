<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__output .= '.NoDragDrop .multiQuoteDragHeading,
.Touch .multiQuoteDragHeading
{
	display: none;
}

.MultiQuoteItem table
{
	width: 100%;
	table-layout: fixed;
}

.HasDragDrop .MultiQuoteItem
{
	cursor: move;
}

.MultiQuoteItem table tr
{
	vertical-align: top;
}

.MultiQuoteItem table .messageCell
{
	height: 100%;
}

.MultiQuoteItem .avatarHolder
{
	width: 50px;
}

.MultiQuoteItem .messageInfo
{
	font-size: 11px;
	padding: 5px 10px;
}

.MultiQuoteItem a.MultiQuoteRemove
{
	float: right;
}

.MultiQuoteItem .messageArea
{
	position: relative;
	overflow: hidden;
	padding-bottom: 0;
	border-bottom: none;
}

.MultiQuoteItem .messageText
{
	max-height: 120px;
	overflow: hidden;
}

.MultiQuoteItem .messageGradient
{
	position: absolute;
	top: 0px;
	left: 0px;
	right: 0px;
	height: 120px;
	background: -webkit-linear-gradient(top, ' . XenForo_Template_Helper_Core::callHelper('rgba', array(
'0' => XenForo_Template_Helper_Core::styleProperty('primaryContent.background-color'),
'1' => '0'
)) . ' 70px, ' . XenForo_Template_Helper_Core::callHelper('unrgba', array(
'0' => XenForo_Template_Helper_Core::styleProperty('primaryContent.background-color')
)) . ' 90%);
	background: -moz-linear-gradient(top, ' . XenForo_Template_Helper_Core::callHelper('rgba', array(
'0' => XenForo_Template_Helper_Core::styleProperty('primaryContent.background-color'),
'1' => '0'
)) . ' 70px, ' . XenForo_Template_Helper_Core::callHelper('unrgba', array(
'0' => XenForo_Template_Helper_Core::styleProperty('primaryContent.background-color')
)) . ' 90%);
	background: -o-linear-gradient(top, ' . XenForo_Template_Helper_Core::callHelper('rgba', array(
'0' => XenForo_Template_Helper_Core::styleProperty('primaryContent.background-color'),
'1' => '0'
)) . ' 70px, ' . XenForo_Template_Helper_Core::callHelper('unrgba', array(
'0' => XenForo_Template_Helper_Core::styleProperty('primaryContent.background-color')
)) . ' 90%);
	background: linear-gradient(to bottom, ' . XenForo_Template_Helper_Core::callHelper('rgba', array(
'0' => XenForo_Template_Helper_Core::styleProperty('primaryContent.background-color'),
'1' => '0'
)) . ' 70px, ' . XenForo_Template_Helper_Core::callHelper('unrgba', array(
'0' => XenForo_Template_Helper_Core::styleProperty('primaryContent.background-color')
)) . ' 90%);
}

.MultiQuoteItem.sortable-dragging .messageGradient
{
	display: none;
}';
