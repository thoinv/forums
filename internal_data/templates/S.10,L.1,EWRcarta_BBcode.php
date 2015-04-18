<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$this->addRequiredExternal('css', 'EWRcarta');
$__output .= '
';
$this->addRequiredExternal('js', 'js/8wayrun/EWRcarta_ajax.js');
$__output .= '
';
$this->addRequiredExternal('js', 'js/8wayrun/sortable.js');
$__output .= '

<div class="sectionMain wikiPage">
	<div class="subHeading">' . htmlspecialchars($page['page_name'], ENT_QUOTES, 'UTF-8') . '</div>

	<div class="wikiContent primaryContent">' . $page['HTML'] . '</div>

	<div class="sectionFooter" style="text-align: right">
		<div style="float: left;">
			(<a href="' . XenForo_Template_Helper_Core::link('wiki', $page, array()) . '">' . 'View this Page on the Wiki' . '</a>)
		</div>
		' . 'Last Modified' . ': ' . '' . XenForo_Template_Helper_Core::date($page['page_date'], '') . ' at ' . XenForo_Template_Helper_Core::time($page['page_date'], '') . '' . ' (Cached)
	</div>
</div>';
