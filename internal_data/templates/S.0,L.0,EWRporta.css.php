<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__output .= '.topRightBlocks,
.midRightBlocks,
.btmRightBlocks { float: none; width: auto; }
.topLeftBlocks,
.midLeftBlocks,
.btmLeftBlocks { float: left; }
' . XenForo_Template_Helper_Core::callHelper('clearfix', array(
'0' => '.topRightBlocks'
)) . '
' . XenForo_Template_Helper_Core::callHelper('clearfix', array(
'0' => '.midRightBlocks'
)) . '
' . XenForo_Template_Helper_Core::callHelper('clearfix', array(
'0' => '.btmRightBlocks'
)) . '

.centerShift { margin-left: ' . (XenForo_Template_Helper_Core::styleProperty('sidebar.width') + 10) . 'px; }
.forum_list .btmRightBlocks.centerShift .section:first-child { margin-top: 20px; }

.articleCategories li { display: inline-block; width: 49%; }

.EWRporta_ArticleView .categorySummary
{
	' . XenForo_Template_Helper_Core::styleProperty('messageLikesSummary') . '
	margin-top: -10px;
	margin-bottom: 15px;
}
.EWRporta_ArticleView .categorySummary .categoryEdit { float: right; }
.EWRporta_ArticleView .categorySummary ul { display: inline; }
.EWRporta_ArticleView .categorySummary li { display: inline; }

.EWRporta_ArticleView .messageArticle .messageAuthor { padding-bottom: 10px; }
.EWRporta_ArticleView .messageArticle .messageAuthor .avatar { float: left; }
.EWRporta_ArticleView .messageArticle .messageAuthor .messageInfo { margin-left: 65px; padding-top: 30px; }
.EWRporta_ArticleView .messageArticle .messageAuthor .shareControl { float: right; padding-top: 25px; }
' . XenForo_Template_Helper_Core::callHelper('clearfix', array(
'0' => '.EWRporta_ArticleView .messageArticle .messageAuthor'
)) . '

.EWRporta_ArticleView .messageArticle .message { padding-bottom: 20px; }
.EWRporta_ArticleView .messageArticle .messageUserInfo { display: none; }
.EWRporta_ArticleView .messageArticle .messageInfo { margin-left: 0px; }

.EWRporta_ArticleView .mainComments { margin-top: 15px; }
.EWRporta_ArticleView .mainComments .bbCodeImage { vertical-align: top; }
.EWRporta_ArticleView .mainComments .pageNavLinkGroup { border-bottom: 1px solid ' . XenForo_Template_Helper_Core::styleProperty('primaryLighterStill') . '; }
.EWRporta_ArticleView .mainComments .quickReply { border-top: none; }
.EWRporta_ArticleView .mainComments .bbCodeBlock blockquote { display: block; }
.EWRporta_ArticleView .mainComments .messageSimple .newIndicator
{
	' . XenForo_Template_Helper_Core::styleProperty('messageNewIndicator') . '
	
	margin-right: 0px;
	margin-top: 0px;
}

.adminModules { width: 100%; }
.adminModules td { vertical-align: top; }

.adminModules .sortColumn { height: 50px; padding-bottom: 0px; }
.adminModules .sortColumn .portlet { text-align: center; margin-bottom: 10px; border: 1px dotted ' . XenForo_Template_Helper_Core::styleProperty('mutedTextColor') . '; }
.adminModules .sortColumn .portlet.locked { border: 1px solid ' . XenForo_Template_Helper_Core::styleProperty('contentText') . '; }
.adminModules .sortColumn .portlet-placeholder { margin-bottom: 10px; border: 2px dashed ' . XenForo_Template_Helper_Core::styleProperty('contentText') . '; height: 35px; }
.adminModules .sortColumn .portlet-placeholder * { visibility: hidden; }
.adminModules .sortColumn .portlet .delete { display: none; padding-top: 10px; }

.adminModules #disabled.sortColumn { padding-right: 0px; }
.adminModules #disabled.sortColumn .portlet,
.adminModules #disabled.sortColumn .portlet-placeholder { float: left; width: 150px; margin-right: 10px; }
.adminModules #disabled.sortColumn .portlet .clear { display: none; }
.adminModules #disabled.sortColumn .portlet .delete { display: inline; }

.xenOverlay .xenForm { width: auto !important; margin: 0px; }
.xenOverlay .xenForm .ctrlUnit dt label { margin-left: 0px; }

.xenForm .date
{
	background-image: url("styles/8wayrun/calendar.png");
	background-position: right center;
	background-repeat: no-repeat;
}

.copyright { text-align: center; font-size: 11px; margin: 10px; }

';
if (XenForo_Template_Helper_Core::styleProperty('enableResponsive'))
{
$__output .= '
	@media (max-width:' . XenForo_Template_Helper_Core::styleProperty('maxResponsiveNarrowWidth') . ')
	{
		.mainComments .primaryContent.messageSimple .avatar { display: none; }
		.mainComments .primaryContent.messageSimple .messageInfo { margin-left: 0; }
	}
';
}
