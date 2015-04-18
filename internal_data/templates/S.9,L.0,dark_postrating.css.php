<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__output .= '.message .dark_postrating.likesSummary, .dark_postrating { margin-top: 10px; padding-bottom: 2px; min-height: 19px; } 
.messageSimple .dark_postrating { background: transparent; border-bottom: none; /*margin-left: 65px;*/ margin-top: 6px !important; /*border-top: 1px solid ' . XenForo_Template_Helper_Core::styleProperty('primaryLightest') . ';*/ }

.dark_postrating_table { border-spacing: 5px; border-collapse: separate; }
.dark_postrating_detail { background: ' . XenForo_Template_Helper_Core::styleProperty('contentBackground') . '; font-family: \'Trebuchet MS\',Helvetica,Arial,sans-serif; color:' . XenForo_Template_Helper_Core::styleProperty('mutedTextColor') . '; font-size: 11px; padding: 4px !important; }
.dark_postrating_column { vertical-align: top; padding: 0; margin: 3px; width: 155px; border: 1px solid ' . XenForo_Template_Helper_Core::styleProperty('primaryLighterStill') . '; }
.dark_postrating_column > div { display: block; max-height: 105px; overflow: auto; padding: 7px; }
.dark_postrating_delete { display: block; visibility: hidden; float: left; height: 13px; margin-right: 3px; width: 12px; color: #FF2888; background: url(styles/dark/cross_small.png) center no-repeat; }
.dark_postrating_column:hover .dark_postrating_moderator { visibility: visible !important; }
.dark_postrating_header strong { font-weight: bold; color:' . XenForo_Template_Helper_Core::styleProperty('dimmedTextColor') . ';  }
.dark_postrating_header img { vertical-align: middle; position: relative; top: -2px; }
.dark_postrating_header { font-size: 14px; margin-bottom: 2px; padding-bottom: 3px; border-bottom: 1px dotted ' . XenForo_Template_Helper_Core::styleProperty('primaryLighterStill') . '; }
.dark_postrating_column a.username { display: block; /*float: left; clear: left;*/ }
/*.dark_postrating_delete + a.username { width: 125px; }*/

.dark_postrating_member { border-spacing: 0; border-collapse: separate; border-width: 0 1px 0px 1px; border-style: solid; border-color: ' . XenForo_Template_Helper_Core::styleProperty('primaryLighterStill') . '; color: ' . XenForo_Template_Helper_Core::styleProperty('contentText') . '; width: 100%; padding: 5px 25px; }
.dark_postrating_member td, .dark_postrating_member th { padding: 2px 4px 1px; text-align: center; }
.dark_postrating_member td { border-width: 1px 0px 0 0; border-style: solid; border-color: ' . XenForo_Template_Helper_Core::styleProperty('primaryLighterStill') . '; }
.dark_postrating_member tr:nth-child(2) td { border-width: 0; }
.dark_postrating_member th { color: ' . XenForo_Template_Helper_Core::styleProperty('mutedTextColor') . '; font-size: 11px; }
.dark_postrating_member img { vertical-align: text-top; }
.dark_postrating_positive { color: #62A201; }
.dark_postrating_negative { color: #D90B00; }
.dark_postrating_bar { width: 80px; height: 10px; background: transparent; border: 1px solid #ddd; border-radius: 2px; padding: 1px; font-size: 0; }
.dark_postrating_bar_positive { height: 10px; background: #62A201; display: inline-block; opacity: 0.4; font-size: 0; }
.dark_postrating_bar_neutral { height: 10px; background: #bbb; display: inline-block; opacity: 0.4; font-size: 0; }
.dark_postrating_bar_negative { height: 10px; background: #D90B00; display: inline-block; opacity: 0.4; font-size: 0; }
.dark_postrating_bar:hover > div { opacity: 1.0; }
.profilePage .infoBlock dd.dark_postrating_bar_dd:last-child { margin-bottom: 0; }

.dark_postrating_inputlist { display: block; cursor: default; float: right; opacity: 1.0; font-size: 11px; -ms-filter:\'alpha(opacity=100)\'; filter:alpha(opacity=100) }
.dark_postrating_inputlist.dark_postrating_inputlist_undo li { opacity: 1.0; -ms-filter:\'alpha(opacity=100)\'; filter:alpha(opacity=100) }
.dark_postrating_inputlist li { display: inline; opacity: 0.5; -ms-filter:\'alpha(opacity=50)\'; filter:alpha(opacity=50); zoom:1; }
.dark_postrating_ie8 .dark_postrating_inputlist li { display: inline-block }
.dark_postrating_inputlist li:hover { opacity: 1.0; -ms-filter:\'alpha(opacity=100)\'; filter:alpha(opacity=100) }
li.dark_postrating_textonly { vertical-align: top; display: inline-block; margin: 1px 4px 0 4px; }

.dark_postrating_outputlist { display: block; margin-left: 3px; float: left; font-family: \'Trebuchet MS\',Helvetica,Arial,sans-serif; color: ' . XenForo_Template_Helper_Core::styleProperty('mutedTextColor') . '; font-size: 11px; }
.dark_postrating_outputlist li { display: inline; margin-right: 6px; }
.dark_postrating_outputlist li strong, .dark_postrating_thread_rating strong { font-weight: bold; color: ' . XenForo_Template_Helper_Core::styleProperty('dimmedTextColor') . '; }
.dark_postrating_outputlist li img, .dark_postrating_thread_rating img { vertical-align: text-top; }
.dark_postrating_thread_rating { float: right; font-family: \'Trebuchet MS\',Helvetica,Arial,sans-serif; color: ' . XenForo_Template_Helper_Core::styleProperty('mutedTextColor') . '; font-size: 11px; margin-left: 10px; }
.discussionListItem .iconKey span ~ .dark_postrating_thread_rating { margin-right: 10px; }


.dark_postrating_hide_post { display: none }
.message > .dark_postrating_hide_post { display: block !important }

.pairsJustified .dark_postrating_bar_dd { width: 100%; }
.pairsJustified .dark_postrating_bar_dd div { margin: 1px auto 5px auto; }
.pairsJustified .dark_postrating_bar_dd + dd { float: left; width: 100%; text-align: left; }

/* fix above sig float bug */
.message .messageMeta { margin: 0 !important;}


@media (max-width:' . XenForo_Template_Helper_Core::styleProperty('maxResponsiveNarrowWidth') . ')
{
	.dark_postrating_column { display: block; float: left; }
}
';
