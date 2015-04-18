<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__output .= '.rrssb-buttons.large-format li a, .rrssb-buttons.large-format li a .rrssb-text {
    -webkit-backface-visibility: hidden;
    -moz-backface-visibility: hidden;
    -ms-backface-visibility: hidden;
}
.rrssb-buttons, .rrssb-buttons li, .rrssb-buttons li a {
    -moz-box-sizing: border-box;
    box-sizing: border-box;
}
.clearfix {
    *zoom: 1;
}
.clearfix:after {
    clear: both;
}
.clearfix:before, .clearfix:after {
    content: " ";
    display: table;
}
.rrssb-buttons {

    height: 36px;
    margin: 0;
    padding: 0;
    width: 100%}
.rrssb-buttons li {
    float: left;
    height: 100%;
    line-height: 13px;
    list-style: none;
    margin: 0;
    padding: 0 2.5px;
}
.rrssb-buttons li.rrssb-facebook a {
    background-color: ' . XenForo_Template_Helper_Core::styleProperty('rrssbFacebookColor') . ';
}
.rrssb-buttons li.rrssb-facebook a:hover {
    background-color: ' . XenForo_Template_Helper_Core::styleProperty('rrssbFacebookHoverColor') . ';
}
.rrssb-buttons li.rrssb-twitter a {
    background-color: ' . XenForo_Template_Helper_Core::styleProperty('rrssbTwitterColor') . ';
}
.rrssb-buttons li.rrssb-twitter a:hover {
    background-color: ' . XenForo_Template_Helper_Core::styleProperty('rrssbTwitterHoverColor') . ';
}
.rrssb-buttons li.rrssb-linkedin a {
    background-color: ' . XenForo_Template_Helper_Core::styleProperty('rrssbLinkedinColor') . ';
}
.rrssb-buttons li.rrssb-linkedin a:hover {
    background-color: ' . XenForo_Template_Helper_Core::styleProperty('rrssbLinkedinHoverColor') . ';
}
.rrssb-buttons li.rrssb-googleplus a {
    background-color: ' . XenForo_Template_Helper_Core::styleProperty('rrssbGoogleplusColor') . ';
}
.rrssb-buttons li.rrssb-googleplus a:hover {
    background-color: ' . XenForo_Template_Helper_Core::styleProperty('rrssbGoogleplusHoverColor') . ';
}
.rrssb-buttons li.rrssb-tumblr a {
    background-color: ' . XenForo_Template_Helper_Core::styleProperty('rrssbTumblrColor') . ';
}
.rrssb-buttons li.rrssb-tumblr a:hover {
    background-color: ' . XenForo_Template_Helper_Core::styleProperty('rrssbTumblrHoverColor') . ';
}
.rrssb-buttons li.rrssb-reddit a {
    background-color: ' . XenForo_Template_Helper_Core::styleProperty('rrssbRedditColor') . ';
}
.rrssb-buttons li.rrssb-reddit a:hover {
    background-color: ' . XenForo_Template_Helper_Core::styleProperty('rrssbRedditHoverColor') . ';
}
.rrssb-buttons li.rrssb-pinterest a {
    background-color: ' . XenForo_Template_Helper_Core::styleProperty('rrssbPinterestColor') . ';
}
.rrssb-buttons li.rrssb-pinterest a:hover {
    background-color: ' . XenForo_Template_Helper_Core::styleProperty('rrssbPinterestHoverColor') . ';
}
.rrssb-buttons li.rrssb-pocket a {
    background-color: ' . XenForo_Template_Helper_Core::styleProperty('rrssbPocketColor') . ';
}
.rrssb-buttons li.rrssb-pocket a:hover {
    background-color: ' . XenForo_Template_Helper_Core::styleProperty('rrssbPocketHoverColor') . ';
}
.rrssb-buttons li.rrssb-buffer a {
    background-color: ' . XenForo_Template_Helper_Core::styleProperty('rrssbBufferColor') . ';
}
.rrssb-buttons li.rrssb-buffer a:hover {
    background-color: ' . XenForo_Template_Helper_Core::styleProperty('rrssbBufferHoverColor') . ';
}
.rrssb-buttons li.rrssb-email a {
    background-color: ' . XenForo_Template_Helper_Core::styleProperty('rrssbEmailColor') . ';
}
.rrssb-buttons li.rrssb-email a:hover {
    background-color: ' . XenForo_Template_Helper_Core::styleProperty('rrssbEmailHoverColor') . ';
}
.rrssb-buttons li a {
    ' . XenForo_Template_Helper_Core::styleProperty('rrssbButtonStyle') . '
    display: block;
    height: 100%;
    padding: 11px 7px 12px 27px;
    position: relative;
    text-align: center;
    width: 100%;
    -webkit-font-smoothing: antialiased;
    -moz-osx-font-smoothing: grayscale;
    -webkit-transition: background-color 0.2s ease-in-out;
    -moz-transition: background-color 0.2s ease-in-out;
    -o-transition: background-color 0.2s ease-in-out;
    transition: background-color 0.2s ease-in-out;
}
.rrssb-buttons li a .rrssb-icon {
    display: block;
    height: 17px; /* changed from 100% to fix overlay issue */
    left: 10px;
    padding-top: 9px;
    position: absolute;
    top: 0;
    width: 10%}
.rrssb-buttons li a .rrssb-icon svg {
    height: 17px;
    width: 17px;
}
.rrssb-buttons li a .rrssb-icon svg path, .rrssb-buttons li a .rrssb-icon svg polygon {
    fill: #fff;
}
.rrssb-buttons li a .rrssb-text {
    color: ' . XenForo_Template_Helper_Core::styleProperty('rrssbButtonStyle.color') . ';
}
.rrssb-buttons li a:active {
    box-shadow: inset 1px 3px 15px 0 rgba(22, 0, 0, 0.25);
}
.rrssb-buttons li.small a {
    padding: 0;
}
.rrssb-buttons li.small a .rrssb-icon {
    height: 27px;
    left: auto;
    margin: 0 auto;
    overflow: hidden;
    position: relative;
    top: auto;
    width: 100%}
.rrssb-buttons li.small a .rrssb-text {
    visibility: hidden;
}
.rrssb-buttons.large-format {
    height: auto;
}
.rrssb-buttons.large-format li {
    height: auto;
}
.rrssb-buttons.large-format li a {
    border-radius: 0.2em;
    font-size: 15px;
    font-size: 1vw;
    line-height: 1vw;
    padding: 7% 0% 7% 12%}
.rrssb-buttons.large-format li a .rrssb-icon {
    left: 7%;
    padding-top: 0;
    width: 12%;
    height: 100%} /* Added height to counter fix medium size button overlap */
.rrssb-buttons.large-format li a .rrssb-icon svg {
    height: 100%;
    width: 100%;
    position: absolute;
    top: 0;
}
.rrssb-buttons.large-format li a .rrssb-text {
    font-size: 15px;
    font-size: 1vw;
}
.rrssb-buttons.large-format li a:hover {
    font-size: 15px;
    font-size: 1vw;
    padding: 7% 0% 7% 12%;
    border-radius: 0.2em;
}
.rrssb-buttons.small-format {
    padding-top: 5px;
}
.rrssb-buttons.small-format li {
    height: 80%;
    padding: 0 1.5px;
}
.rrssb-buttons.small-format li a .rrssb-icon {
    height: 100%;
    padding-top: 0;
}
.rrssb-buttons.small-format li a .rrssb-icon svg {
    height: 48%;
    position: relative;
    top: 6px;
    width: 80%}
.rrssb-buttons.tiny-format {
    height: 22px;
    position: relative;
}
.rrssb-buttons.tiny-format li {
    padding-right: 7px;
}
.rrssb-buttons.tiny-format li a {
    background-color: transparent;
    padding: 0;
}
.rrssb-buttons.tiny-format li a .rrssb-icon svg {
    height: 70%;
    width: 100%}
.rrssb-buttons.tiny-format li a:hover, .rrssb-buttons.tiny-format li a:active {
    background-color: transparent;
}

.rrssb-buttons.tiny-format li.rrssb-facebook a .rrssb-icon svg path, .rrssb-buttons.tiny-format li.rrssb-facebook a .rrssb-icon svg polygon {
    fill: ' . XenForo_Template_Helper_Core::styleProperty('rrssbFacebookColor') . ';
}
.rrssb-buttons.tiny-format li.rrssb-facebook a .rrssb-icon:hover .rrssb-icon svg path, .rrssb-buttons.tiny-format li.rrssb-facebook a .rrssb-icon:hover .rrssb-icon svg polygon {
    fill: ' . XenForo_Template_Helper_Core::styleProperty('rrssbFacebookHoverColor') . ';
}
.rrssb-buttons.tiny-format li.rrssb-twitter a .rrssb-icon svg path, .rrssb-buttons.tiny-format li.rrssb-twitter a .rrssb-icon svg polygon {
    fill: ' . XenForo_Template_Helper_Core::styleProperty('rrssbTwitterColor') . ';
}
.rrssb-buttons.tiny-format li.rrssb-twitter a .rrssb-icon:hover .rrssb-icon svg path, .rrssb-buttons.tiny-format li.rrssb-twitter a .rrssb-icon:hover .rrssb-icon svg polygon {
    fill: ' . XenForo_Template_Helper_Core::styleProperty('rrssbTwitterHoverColor') . ';
}
.rrssb-buttons.tiny-format li.rrssb-linkedin a .rrssb-icon svg path, .rrssb-buttons.tiny-format li.rrssb-linkedin a .rrssb-icon svg polygon {
    fill: ' . XenForo_Template_Helper_Core::styleProperty('rrssbLinkedinColor') . ';
}
.rrssb-buttons.tiny-format li.rrssb-linkedin a .rrssb-icon:hover .rrssb-icon svg path, .rrssb-buttons.tiny-format li.rrssb-linkedin a .rrssb-icon:hover .rrssb-icon svg polygon {
    fill: ' . XenForo_Template_Helper_Core::styleProperty('rrssbLinkedinHoverColor') . ';
}
.rrssb-buttons.tiny-format li.rrssb-googleplus a .rrssb-icon svg path, .rrssb-buttons.tiny-format li.rrssb-googleplus a .rrssb-icon svg polygon {
    fill: ' . XenForo_Template_Helper_Core::styleProperty('rrssbGoogleplusColor') . ';
}
.rrssb-buttons.tiny-format li.rrssb-googleplus a .rrssb-icon:hover .rrssb-icon svg path, .rrssb-buttons.tiny-format li.rrssb-googleplus a .rrssb-icon:hover .rrssb-icon svg polygon {
    fill: ' . XenForo_Template_Helper_Core::styleProperty('rrssbGoogleplusHoverColor') . ';
}
.rrssb-buttons.tiny-format li.rrssb-tumblr a .rrssb-icon svg path, .rrssb-buttons.tiny-format li.rrssb-tumblr a .rrssb-icon svg polygon {
    fill: ' . XenForo_Template_Helper_Core::styleProperty('rrssbTumblrColor') . ';
}
.rrssb-buttons.tiny-format li.rrssb-tumblr a .rrssb-icon:hover .rrssb-icon svg path, .rrssb-buttons.tiny-format li.rrssb-tumblr a .rrssb-icon:hover .rrssb-icon svg polygon {
    fill: ' . XenForo_Template_Helper_Core::styleProperty('rrssbTumblrHoverColor') . ';
}
.rrssb-buttons.tiny-format li.rrssb-reddit a .rrssb-icon svg path, .rrssb-buttons.tiny-format li.rrssb-reddit a .rrssb-icon svg polygon {
    fill: ' . XenForo_Template_Helper_Core::styleProperty('rrssbRedditColor') . ';
}
.rrssb-buttons.tiny-format li.rrssb-reddit a .rrssb-icon:hover .rrssb-icon svg path, .rrssb-buttons.tiny-format li.rrssb-reddit a .rrssb-icon:hover .rrssb-icon svg polygon {
    fill: ' . XenForo_Template_Helper_Core::styleProperty('rrssbRedditHoverColor') . ';
}
.rrssb-buttons.tiny-format li.rrssb-pinterest a .rrssb-icon svg path, .rrssb-buttons.tiny-format li.rrssb-pinterest a .rrssb-icon svg polygon {
    fill: ' . XenForo_Template_Helper_Core::styleProperty('rrssbPinterestColor') . ';
}
.rrssb-buttons.tiny-format li.rrssb-pinterest a .rrssb-icon:hover .rrssb-icon svg path, .rrssb-buttons.tiny-format li.rrssb-pinterest a .rrssb-icon:hover .rrssb-icon svg polygon {
    fill: ' . XenForo_Template_Helper_Core::styleProperty('rrssbPinterestHoverColor') . ';
}
.rrssb-buttons.tiny-format li.rrssb-pocket a .rrssb-icon svg path, .rrssb-buttons.tiny-format li.rrssb-pocket a .rrssb-icon svg polygon {
    fill: ' . XenForo_Template_Helper_Core::styleProperty('rrssbPocketColor') . ';
}
.rrssb-buttons.tiny-format li.rrssb-pocket a .rrssb-icon:hover .rrssb-icon svg path, .rrssb-buttons.tiny-format li.rrssb-pocket a .rrssb-icon:hover .rrssb-icon svg polygon {
    fill: ' . XenForo_Template_Helper_Core::styleProperty('rrssbPocketHoverColor') . ';
}
.rrssb-buttons.tiny-format li.rrssb-buffer a .rrssb-icon svg path, .rrssb-buttons.tiny-format li.rrssb-pocket a .rrssb-icon svg polygon {
    fill: ' . XenForo_Template_Helper_Core::styleProperty('rrssbBufferColor') . ';
}
.rrssb-buttons.tiny-format li.rrssb-buffer a .rrssb-icon:hover .rrssb-icon svg path, .rrssb-buttons.tiny-format li.rrssb-pocket a .rrssb-icon:hover .rrssb-icon svg polygon {
    fill: ' . XenForo_Template_Helper_Core::styleProperty('rrssbBufferHoverColor') . ';
}
.rrssb-buttons.tiny-format li.rrssb-email a .rrssb-icon svg path, .rrssb-buttons.tiny-format li.rrssb-email a .rrssb-icon svg polygon {
    fill: ' . XenForo_Template_Helper_Core::styleProperty('rrssbEmailColor') . ';
}
.rrssb-buttons.tiny-format li.rrssb-email a .rrssb-icon:hover .rrssb-icon svg path, .rrssb-buttons.tiny-format li.rrssb-email a .rrssb-icon:hover .rrssb-icon svg polygon {
    fill: ' . XenForo_Template_Helper_Core::styleProperty('rrssbEmailHoverColor') . ';
}

/* rssb options CSS */

';
if ((($xenOptions['rrssb_turnOn_bottomHook']['enabled']) ? ' checked="checked"' : ''))
{
$__output .= '
.quickReply {
    margin-top: 10px;
}
';
}
$__output .= '

.share-container.clearfix {
    word-wrap: normal;
    margin: 10px 0;
    ';
if ($xenOptions['rrssb_maxWidth'])
{
$__output .= '
    max-width: ' . htmlspecialchars($xenOptions['rrssb_maxWidth'], ENT_QUOTES, 'UTF-8') . ';
    ';
}
$__output .= '
    ';
if ($xenOptions['rrssb_minWidth'])
{
$__output .= '
    min-width: ' . htmlspecialchars($xenOptions['rrssb_minWidth'], ENT_QUOTES, 'UTF-8') . ';
    ';
}
$__output .= '
}

';
if (XenForo_Template_Helper_Core::styleProperty('enableResponsive'))
{
$__output .= '
@media (max-width:' . XenForo_Template_Helper_Core::styleProperty('maxResponsiveWideWidth') . ')
{
    .Responsive .share-container.clearfix {
        ';
if ($xenOptions['rrssb_maxWidthResponsiveWide'])
{
$__output .= '
        max-width: ' . htmlspecialchars($xenOptions['rrssb_maxWidthResponsiveWide'], ENT_QUOTES, 'UTF-8') . ';
        ';
}
$__output .= '
        ';
if ($xenOptions['rrssb_minWidthResponsiveWide'])
{
$__output .= '
        min-width: ' . htmlspecialchars($xenOptions['rrssb_minWidthResponsiveWide'], ENT_QUOTES, 'UTF-8') . ';
        ';
}
$__output .= '
    }

}
@media (max-width:' . XenForo_Template_Helper_Core::styleProperty('maxResponsiveMediumWidth') . ')
{
    .Responsive .share-container.clearfix {
        ';
if ($xenOptions['rrssb_maxWidthResponsiveMedium'])
{
$__output .= '
        max-width: ' . htmlspecialchars($xenOptions['rrssb_maxWidthResponsiveMedium'], ENT_QUOTES, 'UTF-8') . ';
        ';
}
$__output .= '
        ';
if ($xenOptions['rrssb_minWidthResponsiveMedum'])
{
$__output .= '
        min-width: ' . htmlspecialchars($xenOptions['rrssb_minWidthResponsiveMedum'], ENT_QUOTES, 'UTF-8') . ';
        ';
}
$__output .= '
    }
}
@media (max-width:' . XenForo_Template_Helper_Core::styleProperty('maxResponsiveNarrowWidth') . ')
{
    .Responsive .share-container.clearfix {
        ';
if ($xenOptions['rrssb_maxWidthResponsiveNarrow'])
{
$__output .= '
        max-width: ' . htmlspecialchars($xenOptions['rrssb_maxWidthResponsiveNarrow'], ENT_QUOTES, 'UTF-8') . ';
        ';
}
$__output .= '
        ';
if ($xenOptions['rrssb_minWidthResponsiveNarrow'])
{
$__output .= '
        min-width: ' . htmlspecialchars($xenOptions['rrssb_minWidthResponsiveNarrow'], ENT_QUOTES, 'UTF-8') . ';
        ';
}
$__output .= '
    }

}
';
}
$__output .= '
';
