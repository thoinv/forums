<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__output .= '/*GLOBAL OPTIONS*/
#formbox
{
    width:100%;
    height:' . XenForo_Template_Helper_Core::styleProperty('adv_template_enc_height') . ';
    overflow-x: hidden;
    overflow-y: auto;
    background-color: ' . XenForo_Template_Helper_Core::styleProperty('contentBackground') . ';
}

.heading
{
    margin-bottom: 0 !important;
}

#ctrl_src
{
    margin:2px;
}

p.info
{
    font-size: 8pt;
    font-weight: bold;
}

p.info span
{
    font-weight: normal;
    font-style: italic;
}

#ctrl_widthtype
{
    text-align:center;
    cursor: pointer;
}

#ctrl_widthtype:hover
{
    background-color: ' . XenForo_Template_Helper_Core::styleProperty('secondaryLightest') . ';
    border:1px solid ' . XenForo_Template_Helper_Core::styleProperty('secondaryLight') . ';
}


#selectlist
{
    width:485px;
    text-align:center;
}

#selectlist li
{
	display:inline-block;
	list-style-type: none;
	height:38px;
	width: 240px;
	 /* Ugly Hack IE < 8 */
	*display: inline;
	*zoom : 1;
}
/*SKIN OPTIONS*/

#skins
{
    width: 100%;
    margin: 5px 0; 
    text-align:center;
}

#skins li
{
	display:inline-block;
	list-style-type: none;
	height:25px;
	width: 110px;
	cursor: pointer;

	background-color:' . XenForo_Template_Helper_Core::styleProperty('primaryLightest') . ';

	border:2px solid ' . XenForo_Template_Helper_Core::styleProperty('primaryContent.background-color') . ';
	-webkit-border-radius: 20px;
	-moz-border-radius: 20px;
	border-radius: 20px;

	 /* Ugly Hack IE < 8 */
	*display: inline;
	*zoom : 1;
}

#skins li.active
{
	background-color:' . XenForo_Template_Helper_Core::styleProperty('primaryLightest') . ';
	border:2px solid ' . XenForo_Template_Helper_Core::styleProperty('primaryLighter') . ';
	-webkit-border-radius: 20px;
	-moz-border-radius: 20px;
	border-radius: 20px;
}

#skins li:hover
{
	border:2px solid ' . XenForo_Template_Helper_Core::styleProperty('primaryLighter') . ';
	background:' . XenForo_Template_Helper_Core::styleProperty('primaryLighterStill') . ';
}

#skins li div
{
	display:block;
	margin-left:auto;
	margin-right:auto;
	width:100px;
	height:25px;
	line-height:25px;
	vertical-align:middle;
}

#skins li span
{
	width:100px;
}

/*FLOAT OPTIONS*/

#float
{
    width: 100%;
    margin: 5px 0; 
    text-align:center;
}

#float li
{
	display:inline-block;
	list-style-type: none;
	height:25px;
	width: 110px;
	cursor: pointer;

	background-color:' . XenForo_Template_Helper_Core::styleProperty('secondaryLightest') . ';

	border:2px solid ' . XenForo_Template_Helper_Core::styleProperty('primaryContent.background-color') . ';
	-webkit-border-radius: 20px;
	-moz-border-radius: 20px;
	border-radius: 20px;

	 /* Ugly Hack IE < 8 */
	*display: inline;
	*zoom : 1;
}

#float li.active
{
	background-color:' . XenForo_Template_Helper_Core::styleProperty('secondaryLightest') . ';
	border:2px solid ' . XenForo_Template_Helper_Core::styleProperty('secondaryLight') . ';
	-webkit-border-radius: 20px;
	-moz-border-radius: 20px;
	border-radius: 20px;
}

#float li:hover
{
	border:2px solid ' . XenForo_Template_Helper_Core::styleProperty('secondaryLight') . ';
	background:' . XenForo_Template_Helper_Core::styleProperty('secondaryLighter') . ';
}

#float li div
{
	display:block;
	margin-left:auto;
	margin-right:auto;
	width:100px;
	height:25px;
	line-height:25px;
	vertical-align:middle;
}

#float li span
{
	width:100px;
}

.fastlatex
{
	width:530px !important
}';
