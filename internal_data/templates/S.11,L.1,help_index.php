<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__extraData['title'] = '';
$__extraData['title'] .= 'Help';
$__output .= '

';
$__extraData['navigation'] = array();
$__extraData['navigation'][] = array('href' => XenForo_Template_Helper_Core::link('help', false, array()), 'value' => 'Help');
$__output .= '

<div class="baseHtml">
	<dl>
		<dt><a href="' . XenForo_Template_Helper_Core::link('help/smilies', false, array()) . '">' . 'Smilies' . '</a></dt>
		<dd>' . 'This shows a full list of the smilies you can insert when posting a message.' . '</dd>
	</dl>
	
	<dl>
		<dt><a href="' . XenForo_Template_Helper_Core::link('help/bb-codes', false, array()) . '">' . 'BB Codes' . '</a></dt>
		<dd>' . 'The list of BB codes you can use to spice up the look of your messages. This page shows a list of all BB codes that are available.' . '</dd>
	</dl>
	
	<dl>
		<dt><a href="' . XenForo_Template_Helper_Core::link('help/trophies', false, array()) . '">' . 'Trophies' . '</a></dt>
		<dd>' . 'You can earn trophies by carrying out different actions. This page shows a list of the trophies that are available.' . '</dd>
	</dl>
	
	<dl>
		<dt><a href="' . XenForo_Template_Helper_Core::link('help/cookies', false, array()) . '">' . 'Cookie Usage' . '</a></dt>
		<dd>' . 'This page explains how this site uses cookies.' . '</dd>
	</dl>
	
	';
if ($tosUrl)
{
$__output .= '
		<dl>
			<dt><a href="' . htmlspecialchars($tosUrl, ENT_QUOTES, 'UTF-8') . '">' . 'Terms and Rules' . '</a></dt>
			<dd>' . 'You must agree to these terms and rules before using the site.' . '</dd>
		</dl>
	';
}
$__output .= '

	';
$__compilerVar1 = '';
$__output .= $this->callTemplateHook('help_index_extra', $__compilerVar1, array());
unset($__compilerVar1);
$__output .= '

	';
foreach ($pages AS $page)
{
$__output .= '
		<dl>
			<dt><a href="' . XenForo_Template_Helper_Core::link('help', $page, array()) . '">' . htmlspecialchars($page['title'], ENT_QUOTES, 'UTF-8') . '</a></dt>
			<dd>' . htmlspecialchars($page['description'], ENT_QUOTES, 'UTF-8') . '</dd>
		</dl>
	';
}
$__output .= '
</div>';
