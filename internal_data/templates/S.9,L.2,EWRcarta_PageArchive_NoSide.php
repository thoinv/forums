<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__compilerVar10 = '';
$__extraData['title'] = '';
$__extraData['title'] .= htmlspecialchars($page['page_name'], ENT_QUOTES, 'UTF-8');
$__compilerVar10 .= '
';
$__extraData['h1'] = '';
$__extraData['h1'] .= htmlspecialchars($page['page_name'], ENT_QUOTES, 'UTF-8') . ' - ' . 'Historical';
$__compilerVar10 .= '
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
	' . '' . XenForo_Template_Helper_Core::date($history['history_date'], '') . ' lúc ' . XenForo_Template_Helper_Core::time($history['history_date'], '') . '' . '
';
$__compilerVar10 .= '

';
$__extraData['quickNavSelected'] = '';
$__extraData['quickNavSelected'] .= 'wiki-' . htmlspecialchars($page['page_id'], ENT_QUOTES, 'UTF-8');
$__compilerVar10 .= '

';
$__extraData['navigation'] = array();
$__extraData['navigation'] = XenForo_Template_Helper_Core::appendBreadCrumbs($__extraData['navigation'], $breadCrumbs);
$__extraData['navigation'][] = array('href' => XenForo_Template_Helper_Core::link('full:wiki/history', $page, array()), 'value' => 'Lịch sử');
$__compilerVar10 .= '

';
$this->addRequiredExternal('css', 'EWRcarta');
$__compilerVar10 .= '
';
$this->addRequiredExternal('js', 'js/8wayrun/EWRcarta_ajax.js');
$__compilerVar10 .= '
';
$this->addRequiredExternal('js', 'js/8wayrun/sortable.js');
$__compilerVar10 .= '

<div class="sectionMain wikiPage">
	<div class="subHeading">
		<div style="float: right;">
			(<a href="' . XenForo_Template_Helper_Core::link('wiki/history', $page, array()) . '">' . 'Lịch sử' . '</a>)
			';
if ($perms['edit'])
{
$__compilerVar10 .= '
				';
if ($page['page_protect'])
{
$__compilerVar10 .= '
					(<a href="' . XenForo_Template_Helper_Core::link('wiki/edit', $page, array()) . '">' . 'LOCKED' . '</a>)
				';
}
else
{
$__compilerVar10 .= '
					(<a href="' . XenForo_Template_Helper_Core::link('wiki/edit', $page, array()) . '">' . 'Sửa' . '</a>)
				';
}
$__compilerVar10 .= '
			';
}
$__compilerVar10 .= '
		</div>
		' . htmlspecialchars($page['page_name'], ENT_QUOTES, 'UTF-8') . '
	</div>

	';
$__compilerVar11 = '';
$__compilerVar11 .= '
		';
foreach ($subList AS $subPage)
{
$__compilerVar11 .= '
			<div style="margin-left: 5px">
				' . $subPage['page_indent'] . '<a href="' . XenForo_Template_Helper_Core::link('wiki', $subPage, array()) . '">' . htmlspecialchars($subPage['page_name'], ENT_QUOTES, 'UTF-8') . '</a>
			</div>
		';
}
$__compilerVar11 .= '
		';
if (trim($__compilerVar11) !== '')
{
$__compilerVar10 .= '
	<div class="secondaryContent">
		' . $__compilerVar11 . '
	</div>
	';
}
unset($__compilerVar11);
$__compilerVar10 .= '

	<div class="wikiContent primaryContent">
		' . $history['HTML'] . '
	</div>

	<div class="sectionFooter">
		' . 'Applied By' . ' ' . htmlspecialchars($history['username'], ENT_QUOTES, 'UTF-8') . ': ' . '' . XenForo_Template_Helper_Core::date($history['history_date'], '') . ' lúc ' . XenForo_Template_Helper_Core::time($history['history_date'], '') . '' . '
	</div>
</div>

<div class="sectionMain" style="padding-right: 18px; padding-bottom: 5px;">
	<textarea name="history_content" style="height:260px; width:100%;" class="textCtrl">' . $history['history_content'] . '</textarea>
</div>

';
$__compilerVar12 = '';
if ($sidebar)
{
$__compilerVar12 .= '
';
$this->addRequiredExternal('css', 'member_list');
$__compilerVar12 .= '

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
$__compilerVar13 = '';
$__compilerVar13 .= '
				';
foreach ($sidebar['pages'] AS $subPage)
{
$__compilerVar13 .= '
					<li>
						';
if ($page['page_slug'] != $subPage['page_slug'])
{
$__compilerVar13 .= '
							<a href="' . XenForo_Template_Helper_Core::link('wiki', $subPage, array()) . '">' . htmlspecialchars($subPage['page_name'], ENT_QUOTES, 'UTF-8') . '</a>
						';
}
else
{
$__compilerVar13 .= '
							<b>' . htmlspecialchars($subPage['page_name'], ENT_QUOTES, 'UTF-8') . '</b>
						';
}
$__compilerVar13 .= '
					</li>
				';
}
$__compilerVar13 .= '
				';
if (trim($__compilerVar13) !== '')
{
$__extraData['sidebar'] .= '
			<ul>
				' . $__compilerVar13 . '
			</ul>
			';
}
unset($__compilerVar13);
$__extraData['sidebar'] .= '

			<div style="margin-top: 10px;" class="findMember">
				<form action="' . XenForo_Template_Helper_Core::link('search/search', false, array()) . '" method="post" class="AutoValidator" data-optInOut="optIn" data-redirect="true">
					<input type="search" name="keywords" class="textCtrl" placeholder="' . 'Search Wiki' . '..." results="0" title="' . 'Nhập từ khóa và ấn Enter' . '" id="searchBar_keywords" value="' . htmlspecialchars($search['keywords'], ENT_QUOTES, 'UTF-8') . '" />
					<input type="hidden" name="type" value="wiki" />
					<input type="hidden" name="_xfToken" value="' . htmlspecialchars($visitor['csrf_token_page'], ENT_QUOTES, 'UTF-8') . '" />
				</form>
			</div>
		</div>
	</div>

	';
$__compilerVar14 = '';
$__compilerVar14 .= XenForo_Template_Helper_Core::link('canonical:wiki', $page, array());
$__compilerVar15 = '';
$__compilerVar16 = '';
$__compilerVar16 .= '
				';
$__compilerVar17 = '';
$__compilerVar17 .= '
				';
if ($xenOptions['tweet']['enabled'])
{
$__compilerVar17 .= '
					<div class="tweet shareControl">
						<a href="https://twitter.com/share" class="twitter-share-button" data-count="horizontal"
							data-lang="' . XenForo_Template_Helper_Core::callHelper('twitterLang', array(
'0' => $visitorLanguage['language_code']
)) . '"
							data-url="' . htmlspecialchars($__compilerVar14, ENT_QUOTES, 'UTF-8') . '"
							' . (($xenOptions['tweet']['via']) ? ('data-via="' . htmlspecialchars($xenOptions['tweet']['via'], ENT_QUOTES, 'UTF-8') . '"') : ('')) . '
							' . (($xenOptions['tweet']['related']) ? ('data-related="' . htmlspecialchars($xenOptions['tweet']['related'], ENT_QUOTES, 'UTF-8') . '"') : ('')) . '>' . 'Tweet' . '</a>
					</div>
				';
}
$__compilerVar17 .= '		
				';
if ($xenOptions['facebookLike'])
{
$__compilerVar17 .= '
					<div class="facebookLike shareControl">
						';
$__extraData['facebookSdk'] = '';
$__extraData['facebookSdk'] .= '1';
$__compilerVar17 .= '
						<div class="fb-like-box" data-href="https://www.facebook.com/pages/H%E1%BB%99i-nh%E1%BB%AFng-ng%C6%B0%E1%BB%9Di-kh%C3%B4ng-th%E1%BB%83-s%E1%BB%91ng-thi%E1%BA%BFu-Mobile/1437174653239569?ref=bookmarks" data-width="235" data-colorscheme="light" data-show-faces="true" data-header="false" data-stream="false" data-show-border="false"></div>
					</div>
				';
}
$__compilerVar17 .= '
				';
if ($xenOptions['plusone'])
{
$__compilerVar17 .= '
					<div class="plusone shareControl">
						<div class="g-plusone" data-size="medium" data-count="true" data-href="' . htmlspecialchars($__compilerVar14, ENT_QUOTES, 'UTF-8') . '"></div>
					</div>
				';
}
$__compilerVar17 .= '	
				';
$__compilerVar16 .= $this->callTemplateHook('sidebar_share_page_options', $__compilerVar17, array());
unset($__compilerVar17);
$__compilerVar16 .= '		
			';
if (trim($__compilerVar16) !== '')
{
$__compilerVar15 .= '	
	';
$this->addRequiredExternal('css', 'sidebar_share_page');
$__compilerVar15 .= '
	<div class="section infoBlock sharePage">
		<div class="secondaryContent">
			<h3>' . 'Chia sẻ trang này' . '</h3>
			' . $__compilerVar16 . '
		</div>
	</div>
';
}
unset($__compilerVar16);
$__extraData['sidebar'] .= $__compilerVar15;
unset($__compilerVar14, $__compilerVar15);
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
					<dt>' . 'Thích' . ':</dt>
					<dd>' . XenForo_Template_Helper_Core::numberFormat($sidebar['likes'], '0') . '</dd>
				</dl>
				<dl>
					<dt>' . 'Đọc' . ':</dt>
					<dd>' . XenForo_Template_Helper_Core::numberFormat($sidebar['views'], '0') . '</dd>
				</dl>
				<dl>
					<dt>' . 'Các file đính kèm' . ':</dt>
					<dd>' . XenForo_Template_Helper_Core::numberFormat($sidebar['files']['count'], '0') . ' (' . XenForo_Template_Helper_Core::numberFormat($sidebar['files']['size'], 'size') . ')</dd>
				</dl>
			</div>
		</div>
	</div>

';
$__compilerVar12 .= '

';
}
$__compilerVar10 .= $__compilerVar12;
unset($__compilerVar12);
$__compilerVar10 .= '
';
$__compilerVar18 = '';
$__compilerVar18 .= '<div class="cartaCopy copyright muted">
	<a href="http://xenforo.com/community/resources/98/">XenCarta</a>
	&copy; Jason Axelrod from <a href="http://8wayrun.com/">8WAYRUN.COM</a>
</div>';
$__compilerVar10 .= $__compilerVar18;
unset($__compilerVar18);
$__output .= $__compilerVar10;
unset($__compilerVar10);
