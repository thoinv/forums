<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__extraData['title'] = '';
$__extraData['title'] .= htmlspecialchars($page['page_name'], ENT_QUOTES, 'UTF-8');
$__output .= '
';
$__extraData['h1'] = '';
$__extraData['h1'] .= htmlspecialchars($page['page_name'], ENT_QUOTES, 'UTF-8') . ' - ' . 'Historical';
$__output .= '
';
$__extraData['pageDescription'] = array();
$__extraData['pageDescription']['content'] = '';
$__extraData['pageDescription']['content'] .= 'Applied By' . ' 
	';
if ($history['user_id'])
{
$__extraData['pageDescription']['content'] .= '<a href="' . XenForo_Template_Helper_Core::link('members', $history, array()) . '" class="username">' . htmlspecialchars($history['username'], ENT_QUOTES, 'UTF-8') . '</a>';
}
else
{
$__extraData['pageDescription']['content'] .= htmlspecialchars($history['username'], ENT_QUOTES, 'UTF-8');
}
$__extraData['pageDescription']['content'] .= ': 
	' . '' . XenForo_Template_Helper_Core::date($history['history_date'], '') . ' at ' . XenForo_Template_Helper_Core::time($history['history_date'], '') . '' . '
';
$__output .= '

';
$__extraData['quickNavSelected'] = '';
$__extraData['quickNavSelected'] .= 'wiki-' . htmlspecialchars($page['page_id'], ENT_QUOTES, 'UTF-8');
$__output .= '

';
$__extraData['navigation'] = array();
$__extraData['navigation'] = XenForo_Template_Helper_Core::appendBreadCrumbs($__extraData['navigation'], $breadCrumbs);
$__extraData['navigation'][] = array('href' => XenForo_Template_Helper_Core::link('full:wiki/history', $page, array()), 'value' => 'History');
$__output .= '

';
$this->addRequiredExternal('css', 'EWRcarta');
$__output .= '
';
$this->addRequiredExternal('js', 'js/8wayrun/EWRcarta_ajax.js');
$__output .= '
';
$this->addRequiredExternal('js', 'js/8wayrun/sortable.js');
$__output .= '

<div class="sectionMain wikiPage">
	<div class="subHeading">
		<div style="float: right;">
			(<a href="' . XenForo_Template_Helper_Core::link('wiki/history', $page, array()) . '">' . 'History' . '</a>)
			';
if ($perms['edit'])
{
$__output .= '
				';
if ($page['page_protect'])
{
$__output .= '
					(<a href="' . XenForo_Template_Helper_Core::link('wiki/edit', $page, array()) . '">' . 'LOCKED' . '</a>)
				';
}
else
{
$__output .= '
					(<a href="' . XenForo_Template_Helper_Core::link('wiki/edit', $page, array()) . '">' . 'Edit' . '</a>)
				';
}
$__output .= '
			';
}
$__output .= '
		</div>
		' . htmlspecialchars($page['page_name'], ENT_QUOTES, 'UTF-8') . '
	</div>

	';
$__compilerVar1 = '';
$__compilerVar1 .= '
		';
foreach ($subList AS $subPage)
{
$__compilerVar1 .= '
			<div style="margin-left: 5px">
				' . $subPage['page_indent'] . '<a href="' . XenForo_Template_Helper_Core::link('wiki', $subPage, array()) . '">' . htmlspecialchars($subPage['page_name'], ENT_QUOTES, 'UTF-8') . '</a>
			</div>
		';
}
$__compilerVar1 .= '
		';
if (trim($__compilerVar1) !== '')
{
$__output .= '
	<div class="secondaryContent">
		' . $__compilerVar1 . '
	</div>
	';
}
unset($__compilerVar1);
$__output .= '

	<div class="wikiContent primaryContent">
		' . $history['HTML'] . '
	</div>

	<div class="sectionFooter">
		' . 'Applied By' . ' ' . htmlspecialchars($history['username'], ENT_QUOTES, 'UTF-8') . ': ' . '' . XenForo_Template_Helper_Core::date($history['history_date'], '') . ' at ' . XenForo_Template_Helper_Core::time($history['history_date'], '') . '' . '
	</div>
</div>

<div class="sectionMain" style="padding-right: 18px; padding-bottom: 5px;">
	<textarea name="history_content" style="height:260px; width:100%;" class="textCtrl">' . $history['history_content'] . '</textarea>
</div>

';
$__compilerVar2 = '';
if ($sidebar)
{
$__compilerVar2 .= '
';
$this->addRequiredExternal('css', 'member_list');
$__compilerVar2 .= '

';
$__extraData['sidebar'] = '';
$__extraData['sidebar'] .= '

	';
if ($sidebar['related'])
{
$__extraData['sidebar'] .= '
	<div class="section wikiSub" id="SubPages">
		<div class="secondaryContent">
			<h3>' . 'Wiki Navigation' . '</h3>

			<ul>
			';
foreach ($sidebar['related'] AS $subPage)
{
$__extraData['sidebar'] .= '
				<li>
					' . $subPage['page_indent'] . '
					';
if ($page['page_slug'] != $subPage['page_slug'])
{
$__extraData['sidebar'] .= '
						<a href="' . XenForo_Template_Helper_Core::link('wiki', $subPage, array()) . '">' . htmlspecialchars($subPage['page_name'], ENT_QUOTES, 'UTF-8') . '</a>
					';
}
else
{
$__extraData['sidebar'] .= '
						<b>' . htmlspecialchars($subPage['page_name'], ENT_QUOTES, 'UTF-8') . '</b>
					';
}
$__extraData['sidebar'] .= '
				</li>
			';
}
$__extraData['sidebar'] .= '
			</ul>
		</div>
	</div>
	';
}
$__extraData['sidebar'] .= '

	<div class="section wikiNav">
		<div class="secondaryContent" id="wikiNav">
			<h3><a href="' . XenForo_Template_Helper_Core::link('wiki', false, array()) . '">' . htmlspecialchars($sidebar['index']['page_name'], ENT_QUOTES, 'UTF-8') . '</a></h3>

			';
$__compilerVar3 = '';
$__compilerVar3 .= '
				';
foreach ($sidebar['pages'] AS $subPage)
{
$__compilerVar3 .= '
					<li>
						';
if ($page['page_slug'] != $subPage['page_slug'])
{
$__compilerVar3 .= '
							<a href="' . XenForo_Template_Helper_Core::link('wiki', $subPage, array()) . '">' . htmlspecialchars($subPage['page_name'], ENT_QUOTES, 'UTF-8') . '</a>
						';
}
else
{
$__compilerVar3 .= '
							<b>' . htmlspecialchars($subPage['page_name'], ENT_QUOTES, 'UTF-8') . '</b>
						';
}
$__compilerVar3 .= '
					</li>
				';
}
$__compilerVar3 .= '
				';
if (trim($__compilerVar3) !== '')
{
$__extraData['sidebar'] .= '
			<ul>
				' . $__compilerVar3 . '
			</ul>
			';
}
unset($__compilerVar3);
$__extraData['sidebar'] .= '

			<div style="margin-top: 10px;" class="findMember">
				<form action="' . XenForo_Template_Helper_Core::link('search/search', false, array()) . '" method="post" class="AutoValidator" data-optInOut="optIn" data-redirect="true">
					<input type="search" name="keywords" class="textCtrl" placeholder="' . 'Search Wiki' . '..." results="0" title="' . 'Enter your search and hit enter' . '" id="searchBar_keywords" value="' . htmlspecialchars($search['keywords'], ENT_QUOTES, 'UTF-8') . '" />
					<input type="hidden" name="type" value="wiki" />
					<input type="hidden" name="_xfToken" value="' . htmlspecialchars($visitor['csrf_token_page'], ENT_QUOTES, 'UTF-8') . '" />
				</form>
			</div>
		</div>
	</div>

	';
$__compilerVar4 = '';
$__compilerVar4 .= XenForo_Template_Helper_Core::link('canonical:wiki', $page, array());
$__compilerVar5 = '';
$__compilerVar5 .= '<!--';
$__compilerVar6 = '';
$__compilerVar6 .= '
				';
$__compilerVar7 = '';
$__compilerVar7 .= '
				';
if ($xenOptions['tweet']['enabled'])
{
$__compilerVar7 .= '
					<div class="tweet shareControl">
						<a href="https://twitter.com/share" class="twitter-share-button" data-count="horizontal"
							data-lang="' . XenForo_Template_Helper_Core::callHelper('twitterLang', array(
'0' => $visitorLanguage['language_code']
)) . '"
							data-url="' . htmlspecialchars($__compilerVar4, ENT_QUOTES, 'UTF-8') . '"
							' . (($xenOptions['tweet']['via']) ? ('data-via="' . htmlspecialchars($xenOptions['tweet']['via'], ENT_QUOTES, 'UTF-8') . '"') : ('')) . '
							' . (($xenOptions['tweet']['related']) ? ('data-related="' . htmlspecialchars($xenOptions['tweet']['related'], ENT_QUOTES, 'UTF-8') . '"') : ('')) . '>' . 'Tweet' . '</a>
					</div>
				';
}
$__compilerVar7 .= '		
				';
if ($xenOptions['facebookLike'])
{
$__compilerVar7 .= '
					<div class="facebookLike shareControl">
						';
$__extraData['facebookSdk'] = '';
$__extraData['facebookSdk'] .= '1';
$__compilerVar7 .= '
						<fb:like href="' . htmlspecialchars($__compilerVar4, ENT_QUOTES, 'UTF-8') . '" layout="button_count" action="' . htmlspecialchars($xenOptions['facebookLikeAction'], ENT_QUOTES, 'UTF-8') . '" font="trebuchet ms" colorscheme="' . XenForo_Template_Helper_Core::styleProperty('fbColorScheme') . '"></fb:like>
					</div>
				';
}
$__compilerVar7 .= '
				';
if ($xenOptions['plusone'])
{
$__compilerVar7 .= '
					<div class="plusone shareControl">
						<div class="g-plusone" data-size="medium" data-count="true" data-href="' . htmlspecialchars($__compilerVar4, ENT_QUOTES, 'UTF-8') . '"></div>
					</div>
				';
}
$__compilerVar7 .= '	
				';
$__compilerVar6 .= $this->callTemplateHook('sidebar_share_page_options', $__compilerVar7, array());
unset($__compilerVar7);
$__compilerVar6 .= '		
			';
if (trim($__compilerVar6) !== '')
{
$__compilerVar5 .= '	
	';
$this->addRequiredExternal('css', 'sidebar_share_page');
$__compilerVar5 .= '
	<div class="section infoBlock sharePage">
		<div class="secondaryContent">
			<h3>' . 'Share This Page' . '</h3>
			' . $__compilerVar6 . '
		</div>
	</div>
';
}
unset($__compilerVar6);
$__compilerVar5 .= '-->';
$__extraData['sidebar'] .= $__compilerVar5;
unset($__compilerVar4, $__compilerVar5);
$__extraData['sidebar'] .= '

	<div class="section">
		<div class="secondaryContent" id="wikiStats">
			<h3>' . 'Wiki Statistics' . '</h3>
			<div class="pairsJustified">
				<dl>
					<dt>' . 'Pages' . ':</dt>
					<dd>' . XenForo_Template_Helper_Core::numberFormat($sidebar['count'], '0') . '</dd>
				</dl>
				<dl>
					<dt>' . 'Edits' . ':</dt>
					<dd>' . XenForo_Template_Helper_Core::numberFormat($sidebar['edits'], '0') . '</dd>
				</dl>
				<dl>
					<dt>' . 'Likes' . ':</dt>
					<dd>' . XenForo_Template_Helper_Core::numberFormat($sidebar['likes'], '0') . '</dd>
				</dl>
				<dl>
					<dt>' . 'Views' . ':</dt>
					<dd>' . XenForo_Template_Helper_Core::numberFormat($sidebar['views'], '0') . '</dd>
				</dl>
				<dl>
					<dt>' . 'Attached Files' . ':</dt>
					<dd>' . XenForo_Template_Helper_Core::numberFormat($sidebar['files']['count'], '0') . ' (' . XenForo_Template_Helper_Core::numberFormat($sidebar['files']['size'], 'size') . ')</dd>
				</dl>
			</div>
		</div>
	</div>

';
$__compilerVar2 .= '

';
}
$__output .= $__compilerVar2;
unset($__compilerVar2);
$__output .= '
';
$__compilerVar8 = '';
$__compilerVar8 .= '<div class="cartaCopy copyright muted">
	<a href="http://xenforo.com/community/resources/98/">XenCarta</a>
	&copy; Jason Axelrod from <a href="http://8wayrun.com/">8WAYRUN.COM</a>
</div>';
$__output .= $__compilerVar8;
unset($__compilerVar8);
