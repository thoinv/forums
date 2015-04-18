<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__extraData['title'] = '';
$__extraData['title'] .= htmlspecialchars($page['page_slug'], ENT_QUOTES, 'UTF-8');
$__output .= '
';
$__extraData['h1'] = '';
$__extraData['h1'] .= htmlspecialchars($page['page_slug'], ENT_QUOTES, 'UTF-8');
$__output .= '

';
$this->addRequiredExternal('css', 'EWRcarta');
$__output .= '

<div class="sectionMain">
	<div class="subHeading">
		' . htmlspecialchars($page['page_slug'], ENT_QUOTES, 'UTF-8') . '
	</div>

	<div class="primaryContent">
		' . 'The requested page could not be found.' . '<br />
		<br />
		<a href="' . XenForo_Template_Helper_Core::link('search/search/?keywords=' . htmlspecialchars($page['page_slug'], ENT_QUOTES, 'UTF-8') . '&type=wiki', false, array()) . '">' . 'Search Wiki' . ': ' . htmlspecialchars($page['page_slug'], ENT_QUOTES, 'UTF-8') . '</a><br />
		<a href="' . XenForo_Template_Helper_Core::link('search/search/?keywords=' . htmlspecialchars($page['page_slug'], ENT_QUOTES, 'UTF-8') . '&type=forums', false, array()) . '">' . 'Search Forums' . ': ' . htmlspecialchars($page['page_slug'], ENT_QUOTES, 'UTF-8') . '</a><br />
		<a href="' . XenForo_Template_Helper_Core::link('search/search/?keywords=' . htmlspecialchars($page['page_slug'], ENT_QUOTES, 'UTF-8'), false, array()) . '">' . 'Search Everything' . ': ' . htmlspecialchars($page['page_slug'], ENT_QUOTES, 'UTF-8') . '</a>
	</div>

	';
if ($perms['create'])
{
$__output .= '
	<div class="secondaryContent">
		<form action="' . XenForo_Template_Helper_Core::link('wiki/special/create-page', false, array()) . '" method="post">
			<input type="submit" value="' . 'Create New Page' . '" name="submit" accesskey="s" class="button primary" />
			<input type="hidden" name="page_name" value="' . htmlspecialchars($page['page_slug'], ENT_QUOTES, 'UTF-8') . '" />
			<input type="hidden" name="page_slug" value="' . htmlspecialchars($page['page_slug'], ENT_QUOTES, 'UTF-8') . '" />
			<input type="hidden" name="_xfToken" value="' . htmlspecialchars($visitor['csrf_token_page'], ENT_QUOTES, 'UTF-8') . '" />
		</form>
	</div>
	';
}
$__output .= '
</div>

';
$__compilerVar1 = '';
if ($sidebar)
{
$__compilerVar1 .= '
';
$this->addRequiredExternal('css', 'member_list');
$__compilerVar1 .= '

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
$__compilerVar2 = '';
$__compilerVar2 .= '
				';
foreach ($sidebar['pages'] AS $subPage)
{
$__compilerVar2 .= '
					<li>
						';
if ($page['page_slug'] != $subPage['page_slug'])
{
$__compilerVar2 .= '
							<a href="' . XenForo_Template_Helper_Core::link('wiki', $subPage, array()) . '">' . htmlspecialchars($subPage['page_name'], ENT_QUOTES, 'UTF-8') . '</a>
						';
}
else
{
$__compilerVar2 .= '
							<b>' . htmlspecialchars($subPage['page_name'], ENT_QUOTES, 'UTF-8') . '</b>
						';
}
$__compilerVar2 .= '
					</li>
				';
}
$__compilerVar2 .= '
				';
if (trim($__compilerVar2) !== '')
{
$__extraData['sidebar'] .= '
			<ul>
				' . $__compilerVar2 . '
			</ul>
			';
}
unset($__compilerVar2);
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
$__compilerVar3 = '';
$__compilerVar3 .= XenForo_Template_Helper_Core::link('canonical:wiki', $page, array());
$__compilerVar4 = '';
$__compilerVar5 = '';
$__compilerVar5 .= '
				';
$__compilerVar6 = '';
$__compilerVar6 .= '
				';
if ($xenOptions['tweet']['enabled'])
{
$__compilerVar6 .= '
					<div class="tweet shareControl">
						<a href="https://twitter.com/share" class="twitter-share-button" data-count="horizontal"
							data-lang="' . XenForo_Template_Helper_Core::callHelper('twitterLang', array(
'0' => $visitorLanguage['language_code']
)) . '"
							data-url="' . htmlspecialchars($__compilerVar3, ENT_QUOTES, 'UTF-8') . '"
							' . (($xenOptions['tweet']['via']) ? ('data-via="' . htmlspecialchars($xenOptions['tweet']['via'], ENT_QUOTES, 'UTF-8') . '"') : ('')) . '
							' . (($xenOptions['tweet']['related']) ? ('data-related="' . htmlspecialchars($xenOptions['tweet']['related'], ENT_QUOTES, 'UTF-8') . '"') : ('')) . '>' . 'Tweet' . '</a>
					</div>
				';
}
$__compilerVar6 .= '		
				';
if ($xenOptions['facebookLike'])
{
$__compilerVar6 .= '
					<div class="facebookLike shareControl">
						';
$__extraData['facebookSdk'] = '';
$__extraData['facebookSdk'] .= '1';
$__compilerVar6 .= '
						<div class="fb-like-box" data-href="https://www.facebook.com/pages/H%E1%BB%99i-nh%E1%BB%AFng-ng%C6%B0%E1%BB%9Di-kh%C3%B4ng-th%E1%BB%83-s%E1%BB%91ng-thi%E1%BA%BFu-Mobile/1437174653239569?ref=bookmarks" data-width="235" data-colorscheme="light" data-show-faces="true" data-header="false" data-stream="false" data-show-border="false"></div>
					</div>
				';
}
$__compilerVar6 .= '
				';
if ($xenOptions['plusone'])
{
$__compilerVar6 .= '
					<div class="plusone shareControl">
						<div class="g-plusone" data-size="medium" data-count="true" data-href="' . htmlspecialchars($__compilerVar3, ENT_QUOTES, 'UTF-8') . '"></div>
					</div>
				';
}
$__compilerVar6 .= '	
				';
$__compilerVar5 .= $this->callTemplateHook('sidebar_share_page_options', $__compilerVar6, array());
unset($__compilerVar6);
$__compilerVar5 .= '		
			';
if (trim($__compilerVar5) !== '')
{
$__compilerVar4 .= '	
	';
$this->addRequiredExternal('css', 'sidebar_share_page');
$__compilerVar4 .= '
	<div class="section infoBlock sharePage">
		<div class="secondaryContent">
			<h3>' . 'Share This Page' . '</h3>
			' . $__compilerVar5 . '
		</div>
	</div>
';
}
unset($__compilerVar5);
$__extraData['sidebar'] .= $__compilerVar4;
unset($__compilerVar3, $__compilerVar4);
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
$__compilerVar1 .= '

';
}
$__output .= $__compilerVar1;
unset($__compilerVar1);
$__output .= '
';
$__compilerVar7 = '';
$__compilerVar7 .= '<div class="cartaCopy copyright muted">
	<a href="http://xenforo.com/community/resources/98/">XenCarta</a>
	&copy; Jason Axelrod from <a href="http://8wayrun.com/">8WAYRUN.COM</a>
</div>';
$__output .= $__compilerVar7;
unset($__compilerVar7);
