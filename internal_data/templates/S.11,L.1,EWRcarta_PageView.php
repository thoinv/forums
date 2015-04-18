<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__extraData['title'] = '';
$__extraData['title'] .= htmlspecialchars($page['page_name'], ENT_QUOTES, 'UTF-8');
$__output .= '
';
$__extraData['h1'] = '';
$__extraData['h1'] .= htmlspecialchars($page['page_name'], ENT_QUOTES, 'UTF-8');
$__output .= '
';
if ($redirect)
{
$__output .= '
	';
$__extraData['pageDescription'] = array();
$__extraData['pageDescription']['content'] = '';
$__extraData['pageDescription']['content'] .= '
		<span class="redirect"></span>
		' . 'redirected from ' . '<b><a href="' . XenForo_Template_Helper_Core::link('wiki', $redirect, array(
'noRedirect' => '1'
)) . '">' . htmlspecialchars($redirect['page_name'], ENT_QUOTES, 'UTF-8') . '</a></b>' . '' . '
	';
$__output .= '
';
}
$__output .= '

';
$__extraData['head']['canonical'] = '';
$__extraData['head']['canonical'] .= '<link rel="canonical" href="' . XenForo_Template_Helper_Core::link('canonical:wiki', $page, array()) . '" />';
$__output .= '

';
if ($xenOptions['boardDescription'])
{
$__output .= '
	';
$__extraData['head']['description'] = '';
$__extraData['head']['description'] .= '<meta name="description" content="' . htmlspecialchars($xenOptions['boardDescription'], ENT_QUOTES, 'UTF-8') . '" />';
$__output .= '
';
}
$__output .= '

';
$__extraData['quickNavSelected'] = '';
$__extraData['quickNavSelected'] .= 'wiki-' . htmlspecialchars($page['page_id'], ENT_QUOTES, 'UTF-8');
$__output .= '

';
$__extraData['navigation'] = array();
$__extraData['navigation'] = XenForo_Template_Helper_Core::appendBreadCrumbs($__extraData['navigation'], $breadCrumbs);
$__output .= '

';
$this->addRequiredExternal('css', 'EWRcarta');
$__output .= '
';
$this->addRequiredExternal('css', 'lightbox');
$__output .= '
';
$this->addRequiredExternal('js', 'js/xenforo/lightbox.js');
$__output .= '
';
$this->addRequiredExternal('js', 'js/8wayrun/EWRcarta_ajax.js');
$__output .= '
';
$this->addRequiredExternal('js', 'js/8wayrun/sortable.js');
$__output .= '

<div class="sectionMain wikiPage" id="wikiPage" data-author="' . htmlspecialchars($xenOptions['boardTitle'], ENT_QUOTES, 'UTF-8') . '">
	<div style="display: none;">
		<a href="' . XenForo_Template_Helper_Core::link('wiki', false, array()) . '" class="avatar"><span class="img" style="background-image: url(\'' . XenForo_Template_Helper_Core::styleProperty('imagePath') . '/xenforo/logo.og.png\')"></span></a>
		' . XenForo_Template_Helper_Core::callHelper('datetimehtml', array($page['page_date'],array(
'time' => htmlspecialchars($page['page_date'], ENT_QUOTES, 'UTF-8')
))) . '
	</div>

	';
$__compilerVar1 = '';
$__compilerVar1 .= '
		';
if ($perms['edit'])
{
$__compilerVar1 .= '<li><a href="' . XenForo_Template_Helper_Core::link('wiki/edit', $page, array()) . '">';
if ($page['page_protect'])
{
$__compilerVar1 .= 'LOCKED';
}
else
{
$__compilerVar1 .= 'Edit';
}
$__compilerVar1 .= '</a></li>';
}
$__compilerVar1 .= '
		';
if ($thread)
{
$__compilerVar1 .= '<li><a href="' . XenForo_Template_Helper_Core::link('threads/unread', $thread, array()) . '">' . 'Discussion' . ' (' . htmlspecialchars($thread['reply_count'], ENT_QUOTES, 'UTF-8') . ')</a></li>';
}
$__compilerVar1 .= '
		';
if (trim($__compilerVar1) !== '')
{
$__output .= '
	<ul class="tabs controlTabs">
		' . $__compilerVar1 . '
	</ul>
	';
}
unset($__compilerVar1);
$__output .= '
	
	<ul class="tabs mainTabs Tabs" data-panes="#WikiPanes > li" data-history="on">
		<li><a href="' . htmlspecialchars($requestPaths['requestUri'], ENT_QUOTES, 'UTF-8') . '#wikiContent">' . 'Page' . '</a></li>
		';
if ($page['attachments'])
{
$__output .= '<li><a href="' . htmlspecialchars($requestPaths['requestUri'], ENT_QUOTES, 'UTF-8') . '#attachments">' . 'Attachments' . ' (' . XenForo_Template_Helper_Core::numberFormat(count($page['attachments']), '0') . ')</a></li>';
}
$__output .= '
		';
if ($perms['history'])
{
$__output .= '
			<li><a href="' . htmlspecialchars($requestPaths['requestUri'], ENT_QUOTES, 'UTF-8') . '#history">' . 'History' . '</a></li>
			<li><a href="' . htmlspecialchars($requestPaths['requestUri'], ENT_QUOTES, 'UTF-8') . '#editors">' . 'Editors' . '</a></li>
		';
}
$__output .= '
	</ul>

	<div class="subHeading">
		<div style="float: right;">
			';
if ($visitor['user_id'])
{
$__output .= '
				(<a href="' . XenForo_Template_Helper_Core::link('wiki/watch-confirm', $page, array()) . '" class="OverlayTrigger" data-cacheOverlay="false">' . (($page['page_is_watched']) ? ('Unwatch Page') : ('Watch Page')) . '</a>)
			';
}
$__output .= '
		</div>
		' . htmlspecialchars($page['page_name'], ENT_QUOTES, 'UTF-8') . '
	</div>

	<ul id="WikiPanes">
		<li id="wikiContent" class="wikiContent">
			';
$__compilerVar2 = '';
$__compilerVar2 .= '
				';
foreach ($subList AS $subPage)
{
$__compilerVar2 .= '
					<div style="margin-left: 5px">
						' . $subPage['page_indent'] . '<a href="' . XenForo_Template_Helper_Core::link('wiki', $subPage, array()) . '">' . htmlspecialchars($subPage['page_name'], ENT_QUOTES, 'UTF-8') . '</a>
					</div>
				';
}
$__compilerVar2 .= '
				';
if (trim($__compilerVar2) !== '')
{
$__output .= '
			<div class="secondaryContent">
				' . $__compilerVar2 . '
			</div>
			';
}
unset($__compilerVar2);
$__output .= '

			<div class="primaryContent">
				' . $page['HTML'] . '
			</div>
		</li>
		
		';
if ($page['attachments'])
{
$__output .= '
			<li id="attachments" class="wikiAttachments" data-loadUrl="' . XenForo_Template_Helper_Core::link('wiki/attachments', $page, array()) . '">
				<span class="jsOnly">' . 'Loading' . '...</span>
				<noscript><a href="' . XenForo_Template_Helper_Core::link('wiki/attachments', $page, array()) . '">' . 'View' . '</a></noscript>
			</li>
		';
}
$__output .= '
		
		';
if ($perms['history'])
{
$__output .= '
			<li id="history" class="wikiHistory" data-loadUrl="' . XenForo_Template_Helper_Core::link('wiki/history', $page, array()) . '">
				<span class="jsOnly">' . 'Loading' . '...</span>
				<noscript><a href="' . XenForo_Template_Helper_Core::link('wiki/history', $page, array()) . '">' . 'View' . '</a></noscript>
			</li>
			<li id="history" class="wikiEditors" data-loadUrl="' . XenForo_Template_Helper_Core::link('wiki/editors', $page, array()) . '">
				<span class="jsOnly">' . 'Loading' . '...</span>
				<noscript><a href="' . XenForo_Template_Helper_Core::link('wiki/editors', $page, array()) . '">' . 'View' . '</a></noscript>
			</li>
		';
}
$__output .= '
	</ul>

	<div id="likes-wiki-' . htmlspecialchars($page['page_id'], ENT_QUOTES, 'UTF-8') . '">
		';
if ($page['page_likes'])
{
$__output .= '
			';
$__compilerVar3 = '';
$__compilerVar3 .= XenForo_Template_Helper_Core::link('wiki/likes', $page, array());
$__compilerVar4 = '';
if ($page['likes'])
{
$__compilerVar4 .= '
	';
$this->addRequiredExternal('css', 'likes_summary');
$__compilerVar4 .= '
	<div class="likesSummary secondaryContent">
		<span class="LikeText">
			' . XenForo_Template_Helper_Core::callHelper('likeshtml', array($page['likes'],$__compilerVar3,$page['like_date'],$page['likeUsers'])) . '
		</span>
	</div>
';
}
$__output .= $__compilerVar4;
unset($__compilerVar3, $__compilerVar4);
$__output .= '
		';
}
$__output .= '
	</div>

	<div class="sectionFooter">
		<div style="float: right;">
			';
if ($perms['like'])
{
$__output .= '
				(<a href="' . XenForo_Template_Helper_Core::link('wiki/like', $page, array()) . '" class="LikeLink item control ' . (($wiki['like_date']) ? ('unlike') : ('like')) . '" data-container="#likes-wiki-' . htmlspecialchars($page['page_id'], ENT_QUOTES, 'UTF-8') . '"><span></span><span class="LikeLabel">' . (($page['like_date']) ? ('Unlike') : ('Like')) . '</span></a>)
			';
}
$__output .= '
			(' . htmlspecialchars($page['page_views'], ENT_QUOTES, 'UTF-8') . ' ' . 'Views' . ')
		</div>
		' . 'Last Modified' . ': ' . '' . XenForo_Template_Helper_Core::date($page['page_date'], '') . ' at ' . XenForo_Template_Helper_Core::time($page['page_date'], '') . '' . '
		';
if ($page['cache'])
{
$__output .= '(Cached)';
}
$__output .= '
	</div>
</div>

';
$__compilerVar5 = '';
if ($sidebar)
{
$__compilerVar5 .= '
';
$this->addRequiredExternal('css', 'member_list');
$__compilerVar5 .= '

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
$__compilerVar6 = '';
$__compilerVar6 .= '
				';
foreach ($sidebar['pages'] AS $subPage)
{
$__compilerVar6 .= '
					<li>
						';
if ($page['page_slug'] != $subPage['page_slug'])
{
$__compilerVar6 .= '
							<a href="' . XenForo_Template_Helper_Core::link('wiki', $subPage, array()) . '">' . htmlspecialchars($subPage['page_name'], ENT_QUOTES, 'UTF-8') . '</a>
						';
}
else
{
$__compilerVar6 .= '
							<b>' . htmlspecialchars($subPage['page_name'], ENT_QUOTES, 'UTF-8') . '</b>
						';
}
$__compilerVar6 .= '
					</li>
				';
}
$__compilerVar6 .= '
				';
if (trim($__compilerVar6) !== '')
{
$__extraData['sidebar'] .= '
			<ul>
				' . $__compilerVar6 . '
			</ul>
			';
}
unset($__compilerVar6);
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
$__compilerVar7 = '';
$__compilerVar7 .= XenForo_Template_Helper_Core::link('canonical:wiki', $page, array());
$__compilerVar8 = '';
$__compilerVar8 .= '<!--';
$__compilerVar9 = '';
$__compilerVar9 .= '
				';
$__compilerVar10 = '';
$__compilerVar10 .= '
				';
if ($xenOptions['tweet']['enabled'])
{
$__compilerVar10 .= '
					<div class="tweet shareControl">
						<a href="https://twitter.com/share" class="twitter-share-button" data-count="horizontal"
							data-lang="' . XenForo_Template_Helper_Core::callHelper('twitterLang', array(
'0' => $visitorLanguage['language_code']
)) . '"
							data-url="' . htmlspecialchars($__compilerVar7, ENT_QUOTES, 'UTF-8') . '"
							' . (($xenOptions['tweet']['via']) ? ('data-via="' . htmlspecialchars($xenOptions['tweet']['via'], ENT_QUOTES, 'UTF-8') . '"') : ('')) . '
							' . (($xenOptions['tweet']['related']) ? ('data-related="' . htmlspecialchars($xenOptions['tweet']['related'], ENT_QUOTES, 'UTF-8') . '"') : ('')) . '>' . 'Tweet' . '</a>
					</div>
				';
}
$__compilerVar10 .= '		
				';
if ($xenOptions['facebookLike'])
{
$__compilerVar10 .= '
					<div class="facebookLike shareControl">
						';
$__extraData['facebookSdk'] = '';
$__extraData['facebookSdk'] .= '1';
$__compilerVar10 .= '
						<fb:like href="' . htmlspecialchars($__compilerVar7, ENT_QUOTES, 'UTF-8') . '" layout="button_count" action="' . htmlspecialchars($xenOptions['facebookLikeAction'], ENT_QUOTES, 'UTF-8') . '" font="trebuchet ms" colorscheme="' . XenForo_Template_Helper_Core::styleProperty('fbColorScheme') . '"></fb:like>
					</div>
				';
}
$__compilerVar10 .= '
				';
if ($xenOptions['plusone'])
{
$__compilerVar10 .= '
					<div class="plusone shareControl">
						<div class="g-plusone" data-size="medium" data-count="true" data-href="' . htmlspecialchars($__compilerVar7, ENT_QUOTES, 'UTF-8') . '"></div>
					</div>
				';
}
$__compilerVar10 .= '	
				';
$__compilerVar9 .= $this->callTemplateHook('sidebar_share_page_options', $__compilerVar10, array());
unset($__compilerVar10);
$__compilerVar9 .= '		
			';
if (trim($__compilerVar9) !== '')
{
$__compilerVar8 .= '	
	';
$this->addRequiredExternal('css', 'sidebar_share_page');
$__compilerVar8 .= '
	<div class="section infoBlock sharePage">
		<div class="secondaryContent">
			<h3>' . 'Share This Page' . '</h3>
			' . $__compilerVar9 . '
		</div>
	</div>
';
}
unset($__compilerVar9);
$__compilerVar8 .= '-->';
$__extraData['sidebar'] .= $__compilerVar8;
unset($__compilerVar7, $__compilerVar8);
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
$__compilerVar5 .= '

';
}
$__output .= $__compilerVar5;
unset($__compilerVar5);
$__output .= '
';
$__compilerVar11 = '';
$__compilerVar11 .= '<div class="cartaCopy copyright muted">
	<a href="http://xenforo.com/community/resources/98/">XenCarta</a>
	&copy; Jason Axelrod from <a href="http://8wayrun.com/">8WAYRUN.COM</a>
</div>';
$__output .= $__compilerVar11;
unset($__compilerVar11);
