<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__compilerVar1 = '';
$__extraData['title'] = '';
$__extraData['title'] .= htmlspecialchars($page['page_name'], ENT_QUOTES, 'UTF-8');
$__compilerVar1 .= '
';
$__extraData['h1'] = '';
$__extraData['h1'] .= htmlspecialchars($page['page_name'], ENT_QUOTES, 'UTF-8');
$__compilerVar1 .= '
';
if ($redirect)
{
$__compilerVar1 .= '
	';
$__extraData['pageDescription'] = array();
$__extraData['pageDescription']['content'] = '';
$__extraData['pageDescription']['content'] .= '
		<span class="redirect"></span>
		' . 'redirected from ' . '<b><a href="' . XenForo_Template_Helper_Core::link('wiki', $redirect, array(
'noRedirect' => '1'
)) . '">' . htmlspecialchars($redirect['page_name'], ENT_QUOTES, 'UTF-8') . '</a></b>' . '' . '
	';
$__compilerVar1 .= '
';
}
$__compilerVar1 .= '

';
$__extraData['head']['canonical'] = '';
$__extraData['head']['canonical'] .= '<link rel="canonical" href="' . XenForo_Template_Helper_Core::link('canonical:wiki', $page, array()) . '" />';
$__compilerVar1 .= '

';
if ($xenOptions['boardDescription'])
{
$__compilerVar1 .= '
	';
$__extraData['head']['description'] = '';
$__extraData['head']['description'] .= '<meta name="description" content="' . htmlspecialchars($xenOptions['boardDescription'], ENT_QUOTES, 'UTF-8') . '" />';
$__compilerVar1 .= '
';
}
$__compilerVar1 .= '

';
$__extraData['quickNavSelected'] = '';
$__extraData['quickNavSelected'] .= 'wiki-' . htmlspecialchars($page['page_id'], ENT_QUOTES, 'UTF-8');
$__compilerVar1 .= '

';
$__extraData['navigation'] = array();
$__extraData['navigation'] = XenForo_Template_Helper_Core::appendBreadCrumbs($__extraData['navigation'], $breadCrumbs);
$__compilerVar1 .= '

';
$this->addRequiredExternal('css', 'EWRcarta');
$__compilerVar1 .= '
';
$this->addRequiredExternal('css', 'lightbox');
$__compilerVar1 .= '
';
$this->addRequiredExternal('js', 'js/xenforo/lightbox.js');
$__compilerVar1 .= '
';
$this->addRequiredExternal('js', 'js/8wayrun/EWRcarta_ajax.js');
$__compilerVar1 .= '
';
$this->addRequiredExternal('js', 'js/8wayrun/sortable.js');
$__compilerVar1 .= '

<div class="sectionMain wikiPage" id="wikiPage" data-author="' . htmlspecialchars($xenOptions['boardTitle'], ENT_QUOTES, 'UTF-8') . '">
	<div style="display: none;">
		<a href="' . XenForo_Template_Helper_Core::link('wiki', false, array()) . '" class="avatar"><span class="img" style="background-image: url(\'' . XenForo_Template_Helper_Core::styleProperty('imagePath') . '/xenforo/logo.og.png\')"></span></a>
		' . XenForo_Template_Helper_Core::callHelper('datetimehtml', array($page['page_date'],array(
'time' => htmlspecialchars($page['page_date'], ENT_QUOTES, 'UTF-8')
))) . '
	</div>

	';
$__compilerVar2 = '';
$__compilerVar2 .= '
		';
if ($perms['edit'])
{
$__compilerVar2 .= '<li><a href="' . XenForo_Template_Helper_Core::link('wiki/edit', $page, array()) . '">';
if ($page['page_protect'])
{
$__compilerVar2 .= 'LOCKED';
}
else
{
$__compilerVar2 .= 'Edit';
}
$__compilerVar2 .= '</a></li>';
}
$__compilerVar2 .= '
		';
if ($thread)
{
$__compilerVar2 .= '<li><a href="' . XenForo_Template_Helper_Core::link('threads/unread', $thread, array()) . '">' . 'Discussion' . ' (' . htmlspecialchars($thread['reply_count'], ENT_QUOTES, 'UTF-8') . ')</a></li>';
}
$__compilerVar2 .= '
		';
if (trim($__compilerVar2) !== '')
{
$__compilerVar1 .= '
	<ul class="tabs controlTabs">
		' . $__compilerVar2 . '
	</ul>
	';
}
unset($__compilerVar2);
$__compilerVar1 .= '
	
	<ul class="tabs mainTabs Tabs" data-panes="#WikiPanes > li" data-history="on">
		<li><a href="' . htmlspecialchars($requestPaths['requestUri'], ENT_QUOTES, 'UTF-8') . '#wikiContent">' . 'Page' . '</a></li>
		';
if ($page['attachments'])
{
$__compilerVar1 .= '<li><a href="' . htmlspecialchars($requestPaths['requestUri'], ENT_QUOTES, 'UTF-8') . '#attachments">' . 'Attachments' . ' (' . XenForo_Template_Helper_Core::numberFormat(count($page['attachments']), '0') . ')</a></li>';
}
$__compilerVar1 .= '
		';
if ($perms['history'])
{
$__compilerVar1 .= '
			<li><a href="' . htmlspecialchars($requestPaths['requestUri'], ENT_QUOTES, 'UTF-8') . '#history">' . 'History' . '</a></li>
			<li><a href="' . htmlspecialchars($requestPaths['requestUri'], ENT_QUOTES, 'UTF-8') . '#editors">' . 'Editors' . '</a></li>
		';
}
$__compilerVar1 .= '
	</ul>

	<div class="subHeading">
		<div style="float: right;">
			';
if ($visitor['user_id'])
{
$__compilerVar1 .= '
				(<a href="' . XenForo_Template_Helper_Core::link('wiki/watch-confirm', $page, array()) . '" class="OverlayTrigger" data-cacheOverlay="false">' . (($page['page_is_watched']) ? ('Unwatch Page') : ('Watch Page')) . '</a>)
			';
}
$__compilerVar1 .= '
		</div>
		' . htmlspecialchars($page['page_name'], ENT_QUOTES, 'UTF-8') . '
	</div>

	<ul id="WikiPanes">
		<li id="wikiContent" class="wikiContent">
			';
$__compilerVar3 = '';
$__compilerVar3 .= '
				';
foreach ($subList AS $subPage)
{
$__compilerVar3 .= '
					<div style="margin-left: 5px">
						' . $subPage['page_indent'] . '<a href="' . XenForo_Template_Helper_Core::link('wiki', $subPage, array()) . '">' . htmlspecialchars($subPage['page_name'], ENT_QUOTES, 'UTF-8') . '</a>
					</div>
				';
}
$__compilerVar3 .= '
				';
if (trim($__compilerVar3) !== '')
{
$__compilerVar1 .= '
			<div class="secondaryContent">
				' . $__compilerVar3 . '
			</div>
			';
}
unset($__compilerVar3);
$__compilerVar1 .= '

			<div class="primaryContent">
				' . $page['HTML'] . '
			</div>
		</li>
		
		';
if ($page['attachments'])
{
$__compilerVar1 .= '
			<li id="attachments" class="wikiAttachments" data-loadUrl="' . XenForo_Template_Helper_Core::link('wiki/attachments', $page, array()) . '">
				<span class="jsOnly">' . 'Loading' . '...</span>
				<noscript><a href="' . XenForo_Template_Helper_Core::link('wiki/attachments', $page, array()) . '">' . 'View' . '</a></noscript>
			</li>
		';
}
$__compilerVar1 .= '
		
		';
if ($perms['history'])
{
$__compilerVar1 .= '
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
$__compilerVar1 .= '
	</ul>

	<div id="likes-wiki-' . htmlspecialchars($page['page_id'], ENT_QUOTES, 'UTF-8') . '">
		';
if ($page['page_likes'])
{
$__compilerVar1 .= '
			';
$__compilerVar4 = '';
$__compilerVar4 .= XenForo_Template_Helper_Core::link('wiki/likes', $page, array());
$__compilerVar5 = '';
if ($page['likes'])
{
$__compilerVar5 .= '
	';
$this->addRequiredExternal('css', 'likes_summary');
$__compilerVar5 .= '
	<div class="likesSummary secondaryContent">
		<span class="LikeText">
			' . XenForo_Template_Helper_Core::callHelper('likeshtml', array($page['likes'],$__compilerVar4,$page['like_date'],$page['likeUsers'])) . '
		</span>
	</div>
';
}
$__compilerVar1 .= $__compilerVar5;
unset($__compilerVar4, $__compilerVar5);
$__compilerVar1 .= '
		';
}
$__compilerVar1 .= '
	</div>

	<div class="sectionFooter">
		<div style="float: right;">
			';
if ($perms['like'])
{
$__compilerVar1 .= '
				(<a href="' . XenForo_Template_Helper_Core::link('wiki/like', $page, array()) . '" class="LikeLink item control ' . (($wiki['like_date']) ? ('unlike') : ('like')) . '" data-container="#likes-wiki-' . htmlspecialchars($page['page_id'], ENT_QUOTES, 'UTF-8') . '"><span></span><span class="LikeLabel">' . (($page['like_date']) ? ('Unlike') : ('Like')) . '</span></a>)
			';
}
$__compilerVar1 .= '
			(' . htmlspecialchars($page['page_views'], ENT_QUOTES, 'UTF-8') . ' ' . 'Views' . ')
		</div>
		' . 'Last Modified' . ': ' . '' . XenForo_Template_Helper_Core::date($page['page_date'], '') . ' at ' . XenForo_Template_Helper_Core::time($page['page_date'], '') . '' . '
		';
if ($page['cache'])
{
$__compilerVar1 .= '(Cached)';
}
$__compilerVar1 .= '
	</div>
</div>

';
$__compilerVar6 = '';
if ($sidebar)
{
$__compilerVar6 .= '
';
$this->addRequiredExternal('css', 'member_list');
$__compilerVar6 .= '

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
$__compilerVar7 = '';
$__compilerVar7 .= '
				';
foreach ($sidebar['pages'] AS $subPage)
{
$__compilerVar7 .= '
					<li>
						';
if ($page['page_slug'] != $subPage['page_slug'])
{
$__compilerVar7 .= '
							<a href="' . XenForo_Template_Helper_Core::link('wiki', $subPage, array()) . '">' . htmlspecialchars($subPage['page_name'], ENT_QUOTES, 'UTF-8') . '</a>
						';
}
else
{
$__compilerVar7 .= '
							<b>' . htmlspecialchars($subPage['page_name'], ENT_QUOTES, 'UTF-8') . '</b>
						';
}
$__compilerVar7 .= '
					</li>
				';
}
$__compilerVar7 .= '
				';
if (trim($__compilerVar7) !== '')
{
$__extraData['sidebar'] .= '
			<ul>
				' . $__compilerVar7 . '
			</ul>
			';
}
unset($__compilerVar7);
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
$__compilerVar8 = '';
$__compilerVar8 .= XenForo_Template_Helper_Core::link('canonical:wiki', $page, array());
$__compilerVar9 = '';
$__compilerVar9 .= '<!--';
$__compilerVar10 = '';
$__compilerVar10 .= '
				';
$__compilerVar11 = '';
$__compilerVar11 .= '
				';
if ($xenOptions['tweet']['enabled'])
{
$__compilerVar11 .= '
					<div class="tweet shareControl">
						<a href="https://twitter.com/share" class="twitter-share-button" data-count="horizontal"
							data-lang="' . XenForo_Template_Helper_Core::callHelper('twitterLang', array(
'0' => $visitorLanguage['language_code']
)) . '"
							data-url="' . htmlspecialchars($__compilerVar8, ENT_QUOTES, 'UTF-8') . '"
							' . (($xenOptions['tweet']['via']) ? ('data-via="' . htmlspecialchars($xenOptions['tweet']['via'], ENT_QUOTES, 'UTF-8') . '"') : ('')) . '
							' . (($xenOptions['tweet']['related']) ? ('data-related="' . htmlspecialchars($xenOptions['tweet']['related'], ENT_QUOTES, 'UTF-8') . '"') : ('')) . '>' . 'Tweet' . '</a>
					</div>
				';
}
$__compilerVar11 .= '		
				';
if ($xenOptions['facebookLike'])
{
$__compilerVar11 .= '
					<div class="facebookLike shareControl">
						';
$__extraData['facebookSdk'] = '';
$__extraData['facebookSdk'] .= '1';
$__compilerVar11 .= '
						<fb:like href="' . htmlspecialchars($__compilerVar8, ENT_QUOTES, 'UTF-8') . '" layout="button_count" action="' . htmlspecialchars($xenOptions['facebookLikeAction'], ENT_QUOTES, 'UTF-8') . '" font="trebuchet ms" colorscheme="' . XenForo_Template_Helper_Core::styleProperty('fbColorScheme') . '"></fb:like>
					</div>
				';
}
$__compilerVar11 .= '
				';
if ($xenOptions['plusone'])
{
$__compilerVar11 .= '
					<div class="plusone shareControl">
						<div class="g-plusone" data-size="medium" data-count="true" data-href="' . htmlspecialchars($__compilerVar8, ENT_QUOTES, 'UTF-8') . '"></div>
					</div>
				';
}
$__compilerVar11 .= '	
				';
$__compilerVar10 .= $this->callTemplateHook('sidebar_share_page_options', $__compilerVar11, array());
unset($__compilerVar11);
$__compilerVar10 .= '		
			';
if (trim($__compilerVar10) !== '')
{
$__compilerVar9 .= '	
	';
$this->addRequiredExternal('css', 'sidebar_share_page');
$__compilerVar9 .= '
	<div class="section infoBlock sharePage">
		<div class="secondaryContent">
			<h3>' . 'Share This Page' . '</h3>
			' . $__compilerVar10 . '
		</div>
	</div>
';
}
unset($__compilerVar10);
$__compilerVar9 .= '-->';
$__extraData['sidebar'] .= $__compilerVar9;
unset($__compilerVar8, $__compilerVar9);
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
$__compilerVar6 .= '

';
}
$__compilerVar1 .= $__compilerVar6;
unset($__compilerVar6);
$__compilerVar1 .= '
';
$__compilerVar12 = '';
$__compilerVar12 .= '<div class="cartaCopy copyright muted">
	<a href="http://xenforo.com/community/resources/98/">XenCarta</a>
	&copy; Jason Axelrod from <a href="http://8wayrun.com/">8WAYRUN.COM</a>
</div>';
$__compilerVar1 .= $__compilerVar12;
unset($__compilerVar12);
$__output .= $__compilerVar1;
unset($__compilerVar1);
$__output .= '

';
$__compilerVar13 = '';
$__compilerVar13 .= XenForo_Template_Helper_Core::link('canonical:wiki', $page, array());
$__compilerVar14 = '';
$__compilerVar15 = '';
$__compilerVar15 .= '
			';
$__compilerVar16 = '';
$__compilerVar16 .= '
			';
if ($xenOptions['tweet']['enabled'])
{
$__compilerVar16 .= '
				<div class="tweet shareControl">
					<a href="https://twitter.com/share" class="twitter-share-button"
						data-count="horizontal"
						data-lang="' . XenForo_Template_Helper_Core::callHelper('twitterLang', array(
'0' => $visitorLanguage['language_code']
)) . '"
						data-url="' . htmlspecialchars($__compilerVar13, ENT_QUOTES, 'UTF-8') . '"
						' . (($thread['title']) ? ('data-text="' . XenForo_Template_Helper_Core::callHelper('threadPrefix', array(
'0' => $thread,
'1' => 'escaped'
)) . htmlspecialchars($thread['title'], ENT_QUOTES, 'UTF-8') . '"') : ('')) . '
						' . (($xenOptions['tweet']['via']) ? ('data-via="' . htmlspecialchars($xenOptions['tweet']['via'], ENT_QUOTES, 'UTF-8') . '"') : ('')) . '
						' . (($xenOptions['tweet']['related']) ? ('data-related="' . htmlspecialchars($xenOptions['tweet']['related'], ENT_QUOTES, 'UTF-8') . '"') : ('')) . '>' . 'Tweet' . '</a>
				</div>
			';
}
$__compilerVar16 .= '
			';
if ($xenOptions['plusone'])
{
$__compilerVar16 .= '
				<div class="plusone shareControl">
					<div class="g-plusone" data-size="medium" data-count="true" data-href="' . htmlspecialchars($__compilerVar13, ENT_QUOTES, 'UTF-8') . '"></div>
				</div>
			';
}
$__compilerVar16 .= '
			';
if ($xenOptions['facebookLike'])
{
$__compilerVar16 .= '
				<div class="facebookLike shareControl">
					';
$__extraData['facebookSdk'] = '';
$__extraData['facebookSdk'] .= '1';
$__compilerVar16 .= '
					<fb:like href="' . htmlspecialchars($__compilerVar13, ENT_QUOTES, 'UTF-8') . '" show_faces="true" width="400" action="' . htmlspecialchars($xenOptions['facebookLikeAction'], ENT_QUOTES, 'UTF-8') . '" font="trebuchet ms" colorscheme="' . XenForo_Template_Helper_Core::styleProperty('fbColorScheme') . '"></fb:like>
				</div>
			';
}
$__compilerVar16 .= '
			';
$__compilerVar15 .= $this->callTemplateHook('share_page_options', $__compilerVar16, array());
unset($__compilerVar16);
$__compilerVar15 .= '
		';
if (trim($__compilerVar15) !== '')
{
$__compilerVar14 .= '
	';
$this->addRequiredExternal('css', 'share_page');
$__compilerVar14 .= '

	<div class="sharePage">
		<h3 class="textHeading larger">' . 'Share This Page' . '</h3>
		' . $__compilerVar15 . '
	</div>
';
}
unset($__compilerVar15);
$__output .= $__compilerVar14;
unset($__compilerVar13, $__compilerVar14);
