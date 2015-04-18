<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__extraData['title'] = '';
$__extraData['title'] .= 'Page List';
$__output .= '
';
$__extraData['h1'] = '';
$__extraData['h1'] .= 'Page List';
$__output .= '

';
$this->addRequiredExternal('css', 'EWRcarta');
$__output .= '
';
$this->addRequiredExternal('js', 'js/8wayrun/EWRcarta_ajax.js');
$__output .= '

<div class="sectionMain wikiPage">
	<div class="primaryContent wikiContent">
		<div>' . 'This wiki contains a total of <b>' . htmlspecialchars($pageCount, ENT_QUOTES, 'UTF-8') . '</b> pages.' . '</div>
		<div class="letterGrid">
			';
foreach ($fullList AS $key => $letter)
{
$__output .= '
				';
if ($letter == ('break'))
{
$__output .= '
					</div><div class="letterGrid">
				';
}
else
{
$__output .= '
					<div class="ToggleContents">
						<h2>' . htmlspecialchars($key, ENT_QUOTES, 'UTF-8') . '</h2>
						<div class="contents">
							';
foreach ($letter AS $page)
{
$__output .= '
							<div class="pageGrid">
								' . $page['page_indent'] . '<a href="' . XenForo_Template_Helper_Core::link('wiki', $page, array()) . '">' . $page['page_name'] . '</a>
							</div>
							';
}
$__output .= '
						</div>
					</div>
				';
}
$__output .= '
			';
}
$__output .= '
		</div>
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
