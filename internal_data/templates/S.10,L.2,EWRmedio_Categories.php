<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__extraData['title'] = '';
$__extraData['title'] .= 'Categories';
$__output .= '
';
$__extraData['h1'] = '';
$__extraData['h1'] .= 'Categories';
$__output .= '

';
$this->addRequiredExternal('css', 'EWRmedio');
$__output .= '

<div class="sectionMain mediaList">
	<div class="subHeading">' . 'Categories' . '</div>

	';
foreach ($catList AS $list)
{
$__output .= '
		<div class="primaryContent">
			<div style="white-space: nowrap; overflow: hidden;">
				<a href="' . XenForo_Template_Helper_Core::link('media/category', $list, array()) . '">' . htmlspecialchars($list['category_name'], ENT_QUOTES, 'UTF-8') . '</a> (' . htmlspecialchars($list['count'], ENT_QUOTES, 'UTF-8') . ')
				<span class="muted" style="font-size: 0.8em">' . XenForo_Template_Helper_Core::callHelper('snippet', array(
'0' => $list['category_description'],
'1' => '150'
)) . '</span>
			</div>
		</div>
	';
}
$__output .= '
</div>

';
$__compilerVar7 = '';
$this->addRequiredExternal('css', 'member_list');
$__compilerVar7 .= '

';
$__extraData['sidebar'] = '';
$__extraData['sidebar'] .= '

	<div class="section mediaNav" id="Categories">
		<div class="secondaryContent">
			<h3><a href="' . XenForo_Template_Helper_Core::link('media/categories', false, array()) . '">' . 'Media Categories' . '</a></h3>

			<div class="pairsJustified">
			';
foreach ($sidebar['categories'] AS $subCat)
{
$__extraData['sidebar'] .= '
				<dl>
					<dt>
						';
if ($category['category_id'] != $subCat['category_id'])
{
$__extraData['sidebar'] .= '
							' . $subCat['category_indent'] . '<a href="' . XenForo_Template_Helper_Core::link('media/category', $subCat, array()) . '">' . htmlspecialchars($subCat['category_name'], ENT_QUOTES, 'UTF-8') . '</a>
						';
}
else
{
$__extraData['sidebar'] .= '
							' . $subCat['category_indent'] . '<b>' . htmlspecialchars($subCat['category_name'], ENT_QUOTES, 'UTF-8') . '</b>
						';
}
$__extraData['sidebar'] .= '
					</dt>
					<dd>(' . htmlspecialchars($subCat['count'], ENT_QUOTES, 'UTF-8') . ')</dd>
				</dl>
			';
}
$__extraData['sidebar'] .= '
			</div>
		</div>
	</div>

	<div class="section mediaNav">
		<div class="secondaryContent" id="Search">
			<h3>' . 'Search Media' . '</h3>

			<div class="findMember">
				<form action="' . XenForo_Template_Helper_Core::link('search/search', false, array()) . '" method="post" class="AutoValidator" data-optInOut="optIn" data-redirect="true">
					<input type="search" name="keywords" class="textCtrl" placeholder="' . 'Search Media' . '..." results="0" title="' . 'Nhập từ khóa và ấn Enter' . '" id="searchBar_keywords" value="' . htmlspecialchars($search['keywords'], ENT_QUOTES, 'UTF-8') . '" />
					<input type="hidden" name="type" value="media" />
					<input type="hidden" name="_xfToken" value="' . htmlspecialchars($visitor['csrf_token_page'], ENT_QUOTES, 'UTF-8') . '" />
				</form>
			</div>
		</div>
	</div>

';
$__compilerVar8 = '';
if ($sidebar['keywords'])
{
$__compilerVar8 .= '
	<div class="section mediaCloud">
		<div class="secondaryContent" id="Cloud">
			<h3>' . 'Keyword Cloud' . '</h3>

			<div id="keywordCloud">
				<ul id="textCloud">
				';
foreach ($sidebar['keywords'] AS $subWord)
{
$__compilerVar8 .= '
					<li style="font-size:' . htmlspecialchars($subWord['keyword_size'], ENT_QUOTES, 'UTF-8') . 'px;" title="' . htmlspecialchars($subWord['keyword_count'], ENT_QUOTES, 'UTF-8') . '">
						<a href="' . XenForo_Template_Helper_Core::link('media/keyword', $subWord, array()) . '">' . htmlspecialchars($subWord['keyword_text'], ENT_QUOTES, 'UTF-8') . '</a>
					</li>
				';
}
$__compilerVar8 .= '
				</ul>
			</div>

			';
if ($sidebar['animated'])
{
$__compilerVar8 .= '
				';
$this->addRequiredExternal('js', 'js/8wayrun/swfobject.js');
$__compilerVar8 .= '
				<script type="text/javascript">
					var so = new SWFObject("styles/8wayrun/tagcloud.swf", "tagcloud", "100%", "240", "7");
					so.addParam("wmode", "transparent");
					so.addVariable("tcolor", "0x000000");
					so.addVariable("tcolor2", "0x1061B3");
					so.addVariable("hicolor", "0xFF0000");
					so.addVariable("mode", "tags");
					so.addVariable("distr", "true");
					so.addVariable("tspeed", "200");
					so.addVariable("tagcloud", "<tags>' . htmlspecialchars($sidebar['animated'], ENT_QUOTES, 'UTF-8') . '</tags>");
					so.write("keywordCloud");
				</script>
			';
}
$__compilerVar8 .= '
		</div>
	</div>
';
}
$__extraData['sidebar'] .= $__compilerVar8;
unset($__compilerVar8);
$__extraData['sidebar'] .= '

';
if ($sidebar['users'])
{
$__extraData['sidebar'] .= '
	<div class="section mediaNav" id="Users">
		<div class="secondaryContent">
			<h3>' . 'Top Contributors' . '</h3>

			<div class="pairsJustified">
			';
foreach ($sidebar['users'] AS $subUser)
{
$__extraData['sidebar'] .= '
				<dl>
					<dt>
						';
if ($user['user_id'] != $subUser['user_id'])
{
$__extraData['sidebar'] .= '
							<a href="' . XenForo_Template_Helper_Core::link('media/user', $subUser, array()) . '">' . htmlspecialchars($subUser['username'], ENT_QUOTES, 'UTF-8') . '</a>
						';
}
else
{
$__extraData['sidebar'] .= '
							<b>' . htmlspecialchars($subUser['username'], ENT_QUOTES, 'UTF-8') . '</b>
						';
}
$__extraData['sidebar'] .= '
					</dt>
					<dd>(' . htmlspecialchars($subUser['count'], ENT_QUOTES, 'UTF-8') . ')</dd>
				</dl>
			';
}
$__extraData['sidebar'] .= '
			</div>
		</div>
	</div>
';
}
$__extraData['sidebar'] .= '

	';
$__compilerVar9 = '';
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
							data-url="' . htmlspecialchars($url, ENT_QUOTES, 'UTF-8') . '"
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
						<div class="fb-like-box" data-href="https://www.facebook.com/pages/H%E1%BB%99i-nh%E1%BB%AFng-ng%C6%B0%E1%BB%9Di-kh%C3%B4ng-th%E1%BB%83-s%E1%BB%91ng-thi%E1%BA%BFu-Mobile/1437174653239569?ref=bookmarks" data-width="235" data-colorscheme="light" data-show-faces="true" data-header="false" data-stream="false" data-show-border="false"></div>
					</div>
				';
}
$__compilerVar11 .= '
				';
if ($xenOptions['plusone'])
{
$__compilerVar11 .= '
					<div class="plusone shareControl">
						<div class="g-plusone" data-size="medium" data-count="true" data-href="' . htmlspecialchars($url, ENT_QUOTES, 'UTF-8') . '"></div>
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
			<h3>' . 'Chia sẻ trang này' . '</h3>
			' . $__compilerVar10 . '
		</div>
	</div>
';
}
unset($__compilerVar10);
$__extraData['sidebar'] .= $__compilerVar9;
unset($__compilerVar9);
$__extraData['sidebar'] .= '

	<div class="section">
		<div class="secondaryContent statsList" id="Statistics">
			<h3>' . 'Library Statistics' . '</h3>

			<div class="pairsJustified">
				<dl>
					<dt>' . 'Total Media' . ':</dt>
					<dd>' . XenForo_Template_Helper_Core::numberFormat($sidebar['stats']['media'], '0') . '</dd>
				</dl>
				<dl>
					<dt>' . 'Total Categories' . ':</dt>
					<dd>' . XenForo_Template_Helper_Core::numberFormat($sidebar['stats']['categories'], '0') . '</dd>
				</dl>
				<dl>
					<dt>' . 'Total Comments' . ':</dt>
					<dd>' . XenForo_Template_Helper_Core::numberFormat($sidebar['stats']['comments'], '0') . '</dd>
				</dl>
				<dl>
					<dt>' . 'Total Likes' . ':</dt>
					<dd>' . XenForo_Template_Helper_Core::numberFormat($sidebar['stats']['likes'], '0') . '</dd>
				</dl>
				<dl>
					<dt>' . 'Total Views' . ':</dt>
					<dd>' . XenForo_Template_Helper_Core::numberFormat($sidebar['stats']['views'], '0') . '</dd>
				</dl>
			</div>
		</div>
	</div>

';
$__output .= $__compilerVar7;
unset($__compilerVar7);
$__output .= '
';
$__compilerVar12 = '';
$__compilerVar12 .= '<div class="medioCopy copyright muted">
	<a href="http://xenforo.com/community/resources/97/">XenMedio</a>
	&copy; Jason Axelrod from <a href="http://8wayrun.com/">8WAYRUN.COM</a>
</div>';
$__output .= $__compilerVar12;
unset($__compilerVar12);
