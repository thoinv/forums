<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__extraData['title'] = '';
$__extraData['title'] .= 'Playlists';
$__output .= '
';
$__extraData['h1'] = '';
$__extraData['h1'] .= 'Playlists';
$__output .= '
';
$this->addRequiredExternal('css', 'EWRmedio');
$__output .= '

' . XenForo_Template_Helper_Core::callHelper('pagenavhtml', array('public', htmlspecialchars($stop, ENT_QUOTES, 'UTF-8'), htmlspecialchars($count, ENT_QUOTES, 'UTF-8'), htmlspecialchars($start, ENT_QUOTES, 'UTF-8'), 'media/playlists', false, array(), false, array())) . '

<div class="sectionMain mediaPlayList mediaPlayLists">
	<div class="subHeading">' . 'Playlists' . '</div>

	';
if ($playlists)
{
$__output .= '
		<ul>
		';
foreach ($playlists AS $playlist)
{
$__output .= '
			';
$__compilerVar1 = '';
$__compilerVar1 .= '<li>
	<div class="secondaryContent">
		<div class="views">
			<b>' . htmlspecialchars($playlist['count'], ENT_QUOTES, 'UTF-8') . '</b><br />
			' . 'videos' . '
		</div>

		<div class="thumb">
			<a href="' . XenForo_Template_Helper_Core::link('media/playlist', $playlist, array()) . '"><img src="' . XenForo_Template_Helper_Core::callHelper('medio', array(
'0' => $playlist
)) . '" border="0" alt="' . htmlspecialchars($playlist['playlist_name'], ENT_QUOTES, 'UTF-8') . '" /></a>
		</div>

		<div class="info">
			<a href="' . XenForo_Template_Helper_Core::link('media/playlist', $playlist, array()) . '"><b>' . htmlspecialchars($playlist['playlist_name'], ENT_QUOTES, 'UTF-8') . '</b></a><br />
			<div class="muted">
				' . 'Playlist by ' . '<a href="' . XenForo_Template_Helper_Core::link('media/user', $playlist, array()) . '">' . htmlspecialchars($playlist['username'], ENT_QUOTES, 'UTF-8') . '</a>' . '' . ' &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
				' . 'Last updated:' . ': ';
if ($playlist['playlist_date'])
{
$__compilerVar1 .= XenForo_Template_Helper_Core::datetime($playlist['playlist_date'], '');
}
else
{
$__compilerVar1 .= 'Never';
}
$__compilerVar1 .= '
			</div>
		</div>
	</div>
</li>';
$__output .= $__compilerVar1;
unset($__compilerVar1);
$__output .= '
		';
}
$__output .= '
		</ul>
	';
}
else
{
$__output .= '
		<div style="text-align: center; padding: 50px 0px;">' . 'There has not yet been any media added to this category...' . '</div>
	';
}
$__output .= '
</div>

' . XenForo_Template_Helper_Core::callHelper('pagenavhtml', array('public', htmlspecialchars($stop, ENT_QUOTES, 'UTF-8'), htmlspecialchars($count, ENT_QUOTES, 'UTF-8'), htmlspecialchars($start, ENT_QUOTES, 'UTF-8'), 'media/playlists', false, array(), false, array())) . '

';
if ($perms['playlist'])
{
$__output .= '
<div class="sectionMain">
	<div class="subHeading">' . 'Create New Playlist' . '</div>

	<div class="section" style="text-align: center;">
		<a href="' . XenForo_Template_Helper_Core::link('media/playlist/create', false, array()) . '" class="button">' . 'Create New Playlist' . '</a>
	</div>
</div>
';
}
$__output .= '

';
$__compilerVar2 = '';
$this->addRequiredExternal('css', 'member_list');
$__compilerVar2 .= '

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
					<input type="search" name="keywords" class="textCtrl" placeholder="' . 'Search Media' . '..." results="0" title="' . 'Enter your search and hit enter' . '" id="searchBar_keywords" value="' . htmlspecialchars($search['keywords'], ENT_QUOTES, 'UTF-8') . '" />
					<input type="hidden" name="type" value="media" />
					<input type="hidden" name="_xfToken" value="' . htmlspecialchars($visitor['csrf_token_page'], ENT_QUOTES, 'UTF-8') . '" />
				</form>
			</div>
		</div>
	</div>

';
$__compilerVar3 = '';
if ($sidebar['keywords'])
{
$__compilerVar3 .= '
	<div class="section mediaCloud">
		<div class="secondaryContent" id="Cloud">
			<h3>' . 'Keyword Cloud' . '</h3>

			<div id="keywordCloud">
				<ul id="textCloud">
				';
foreach ($sidebar['keywords'] AS $subWord)
{
$__compilerVar3 .= '
					<li style="font-size:' . htmlspecialchars($subWord['keyword_size'], ENT_QUOTES, 'UTF-8') . 'px;" title="' . htmlspecialchars($subWord['keyword_count'], ENT_QUOTES, 'UTF-8') . '">
						<a href="' . XenForo_Template_Helper_Core::link('media/keyword', $subWord, array()) . '">' . htmlspecialchars($subWord['keyword_text'], ENT_QUOTES, 'UTF-8') . '</a>
					</li>
				';
}
$__compilerVar3 .= '
				</ul>
			</div>

			';
if ($sidebar['animated'])
{
$__compilerVar3 .= '
				';
$this->addRequiredExternal('js', 'js/8wayrun/swfobject.js');
$__compilerVar3 .= '
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
$__compilerVar3 .= '
		</div>
	</div>
';
}
$__extraData['sidebar'] .= $__compilerVar3;
unset($__compilerVar3);
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
$__compilerVar4 = '';
$__compilerVar4 .= '<!--';
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
							data-url="' . htmlspecialchars($url, ENT_QUOTES, 'UTF-8') . '"
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
						<fb:like href="' . htmlspecialchars($url, ENT_QUOTES, 'UTF-8') . '" layout="button_count" action="' . htmlspecialchars($xenOptions['facebookLikeAction'], ENT_QUOTES, 'UTF-8') . '" font="trebuchet ms" colorscheme="' . XenForo_Template_Helper_Core::styleProperty('fbColorScheme') . '"></fb:like>
					</div>
				';
}
$__compilerVar6 .= '
				';
if ($xenOptions['plusone'])
{
$__compilerVar6 .= '
					<div class="plusone shareControl">
						<div class="g-plusone" data-size="medium" data-count="true" data-href="' . htmlspecialchars($url, ENT_QUOTES, 'UTF-8') . '"></div>
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
$__compilerVar4 .= '-->';
$__extraData['sidebar'] .= $__compilerVar4;
unset($__compilerVar4);
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
$__output .= $__compilerVar2;
unset($__compilerVar2);
$__output .= '
';
$__compilerVar7 = '';
$__compilerVar7 .= '<div class="medioCopy copyright muted">
	<a href="http://xenforo.com/community/resources/97/">XenMedio</a>
	&copy; Jason Axelrod from <a href="http://8wayrun.com/">8WAYRUN.COM</a>
</div>';
$__output .= $__compilerVar7;
unset($__compilerVar7);
