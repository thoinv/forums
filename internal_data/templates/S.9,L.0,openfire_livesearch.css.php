<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__output .= '#livesearch_bar:after
{
	clear: both;
	content: ".";
	display: block;
	height: 10px;
	visibility: hidden;
}

#livesearch_input
{
	vertical-align: top;
	width: 90%;
	';
if ($xenOptions['openfire_livesearch_breathing'])
{
$__output .= '
		-webkit-animation-name: livesearchPulse;
		-webkit-animation-duration: 2s;
		-webkit-animation-iteration-count: infinite;
		-moz-animation-name: livesearchPulse;
		-moz-animation-duration: 2s;
		-moz-animation-iteration-count: infinite;
		-o-animation-name: livesearchPulse;
		-o-animation-duration: 2s;
		-o-animation-iteration-count: infinite;
		animation-name: livesearchPulse;
		animation-duration: 2s;
		animation-iteration-count: infinite;
	';
}
$__output .= '
}

#livesearch_toggle
{
	display: inline;
	vertical-align: middle;
	white-space: nowrap;
	float: right;
}

.liveresult
{
	';
if (!$xenOptions['openfire_livesearch_maxheight'] == 0)
{
$__output .= '
		max-height: ' . htmlspecialchars($xenOptions['openfire_livesearch_maxheight'], ENT_QUOTES, 'UTF-8') . 'px;
		overflow-y: scroll;
		overflow-x: hidden;
	';
}
$__output .= '
}

.liveresult dd.main span
{
	padding: 5px 10px;
	display: block;
	color: ' . XenForo_Template_Helper_Core::styleProperty('secondaryDarker') . ';
}

';
if ($xenOptions['openfire_livesearch_breathing'])
{
$__output .= '
@-webkit-keyframes livesearchPulse {
from { -webkit-box-shadow: 0 0 9px #333; }
          50% { -webkit-box-shadow: 0 0 18px ' . htmlspecialchars($xenOptions['openfire_livesearch_breathing_color'], ENT_QUOTES, 'UTF-8') . '; }
          to { -webkit-box-shadow: 0 0 9px #333; }
	}
@-moz-keyframes livesearchPulse {
from { -moz-box-shadow: 0 0 9px #333; }
          50% { -moz-box-shadow: 0 0 18px ' . htmlspecialchars($xenOptions['openfire_livesearch_breathing_color'], ENT_QUOTES, 'UTF-8') . '; }
          to { -moz-box-shadow: 0 0 9px #333; }
        }
@-o-keyframes livesearchPulse {
from { -o-box-shadow: 0 0 9px #333; }
          50% { -o-box-shadow: 0 0 18px ' . htmlspecialchars($xenOptions['openfire_livesearch_breathing_color'], ENT_QUOTES, 'UTF-8') . '; }
          to { -o-box-shadow: 0 0 9px #333; }
        }
@keyframes livesearchPulse {
from { box-shadow: 0 0 9px #333; }
          50% { box-shadow: 0 0 18px ' . htmlspecialchars($xenOptions['openfire_livesearch_breathing_color'], ENT_QUOTES, 'UTF-8') . '; }
          to { box-shadow: 0 0 9px #333; }
        }
';
}
