<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__extraData['title'] = '';
$__extraData['title'] .= 'Administrate Wiki';
$__output .= '
';
$__extraData['h1'] = '';
$__extraData['h1'] .= 'Administrate Wiki';
$__output .= '

';
$this->addRequiredExternal('css', 'EWRcarta');
$__output .= '

<div class="sectionMain">
	<div class="wikiPage">
		<div class="primaryContent" style="text-align: right;">
			<h3 style="float: left; text-decoration: none;">' . 'Template List' . '</h3>
			<a href="' . XenForo_Template_Helper_Core::link('wiki/special/create-page', '', array(
'page_type' => 'phpfile'
)) . '" class="button primary">' . 'Create New PHP Page' . '</a> &nbsp;
			<a href="' . XenForo_Template_Helper_Core::link('wiki/special/create-template/', false, array()) . '" class="button primary">' . 'Create New Template' . '</a> &nbsp;
			<a href="' . XenForo_Template_Helper_Core::link('wiki/special/empty-cache/', false, array()) . '" class="button primary">' . 'Empty Page Cache' . '</a>
		</div>
		';
foreach ($fullList AS $template)
{
$__output .= '
			<div class="primaryContent">
				<a href="' . XenForo_Template_Helper_Core::link('wiki/special/edit-template', $template, array()) . '">' . $template['template_name'] . '</a>
			</div>
		';
}
$__output .= '
	</div>
</div>

';
$__compilerVar2 = '';
$__compilerVar2 .= '<div class="cartaCopy copyright muted">
	<a href="http://xenforo.com/community/resources/98/">XenCarta</a>
	&copy; Jason Axelrod from <a href="http://8wayrun.com/">8WAYRUN.COM</a>
</div>';
$__output .= $__compilerVar2;
unset($__compilerVar2);
