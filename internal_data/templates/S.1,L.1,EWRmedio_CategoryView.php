<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__extraData['title'] = '';
$__extraData['title'] .= htmlspecialchars($category['category_name'], ENT_QUOTES, 'UTF-8');
$__output .= '
';
$__extraData['h1'] = '';
$__extraData['h1'] .= htmlspecialchars($category['category_name'], ENT_QUOTES, 'UTF-8');
$__output .= '
';
$__extraData['pageDescription'] = array();
$__extraData['pageDescription']['content'] = '';
$__extraData['pageDescription']['content'] .= $category['HTML'];
$__output .= '

';
$__extraData['head']['rss'] = '';
$__extraData['head']['rss'] .= '
	<link rel="alternate" type="application/rss+xml" title="' . 'RSS feed for ' . 'Media Library' . '' . '" href="' . XenForo_Template_Helper_Core::link('full:media/rss', false, array()) . '" />
	<link rel="alternate" type="application/rss+xml" title="' . 'RSS feed for ' . htmlspecialchars($category['category_name'], ENT_QUOTES, 'UTF-8') . '' . '" href="' . XenForo_Template_Helper_Core::link('full:media/category/rss', $category, array()) . '" />
';
$__output .= '

';
$__extraData['navigation'] = array();
$__extraData['navigation'] = XenForo_Template_Helper_Core::appendBreadCrumbs($__extraData['navigation'], $breadCrumbs);
$__output .= '

';
$this->addRequiredExternal('css', 'EWRmedio');
$__output .= '

' . XenForo_Template_Helper_Core::callHelper('pagenavhtml', array('public', htmlspecialchars($stop, ENT_QUOTES, 'UTF-8'), htmlspecialchars($count, ENT_QUOTES, 'UTF-8'), htmlspecialchars($start, ENT_QUOTES, 'UTF-8'), 'media/category', $category, array(), false, array())) . '

<div class="sectionMain mediaList">
	<div class="subHeading">
		<div style="float: right;">
			';
if ($perms['admin'])
{
$__output .= '
				(<a href="' . XenForo_Template_Helper_Core::link('media/category/edit', $category, array()) . '">' . 'Edit' . '</a>)
			';
}
$__output .= '
		</div>
		' . htmlspecialchars($category['category_name'], ENT_QUOTES, 'UTF-8') . '
	</div>

	';
if ($mediaList)
{
$__output .= '
		<ul>
		';
foreach ($mediaList AS $subMedia)
{
$__output .= '
			';
$__compilerVar1 = '';
$__compilerVar1 .= '<li>
	<div class="secondaryContent">
		<div style="position: relative;">
			<div class="overlays" style="top: 5px; right: 5px;"><b><a href="' . XenForo_Template_Helper_Core::link('media/service', $subMedia, array()) . '">' . htmlspecialchars($subMedia['service_name'], ENT_QUOTES, 'UTF-8') . '</a></b></div>
			<div class="overlays" style="bottom: 8px; left: 5px; padding: 0px;">
				<div class="oControl oComms"></div>
				<div class="overlays oNumbs"><b>' . htmlspecialchars($subMedia['media_comments'], ENT_QUOTES, 'UTF-8') . '</b></div>
				<div class="oControl oLikes"></div>
				<div class="overlays oNumbs"><b>' . htmlspecialchars($subMedia['media_likes'], ENT_QUOTES, 'UTF-8') . '</b></div>
				<div class="oControl oViews"></div>
				<div class="overlays oNumbs"><b>' . htmlspecialchars($subMedia['media_views'], ENT_QUOTES, 'UTF-8') . '</b></div>
			</div>

			';
if ($subMedia['service_media'] == ('gallery'))
{
$__compilerVar1 .= '
				<div class="overlays" style="top: 5px; left: 5px;"><b>' . '' . htmlspecialchars($subMedia['media_duration'], ENT_QUOTES, 'UTF-8') . ' images' . '</b></div>
			';
}
else
{
$__compilerVar1 .= '
				<div class="overlays" style="bottom: 8px; right: 5px;"><b>';
if ($subMedia['media_hours'])
{
$__compilerVar1 .= htmlspecialchars($subMedia['media_hours'], ENT_QUOTES, 'UTF-8') . ':';
}
$__compilerVar1 .= htmlspecialchars($subMedia['media_minutes'], ENT_QUOTES, 'UTF-8') . ':' . htmlspecialchars($subMedia['media_seconds'], ENT_QUOTES, 'UTF-8') . '</b></div>
			';
}
$__compilerVar1 .= '

			<a href="' . XenForo_Template_Helper_Core::link('media', $subMedia, array()) . '"><img src="' . XenForo_Template_Helper_Core::callHelper('medio', array(
'0' => $subMedia
)) . '" border="0" style="width: 100%;" alt="' . htmlspecialchars($subMedia['media_title'], ENT_QUOTES, 'UTF-8') . '" /></a>
		</div>

		<div style="height: 34px; overflow: hidden; margin-top: 10px;">
			<a href="' . XenForo_Template_Helper_Core::link('media', $subMedia, array()) . '"><b>' . htmlspecialchars($subMedia['media_title'], ENT_QUOTES, 'UTF-8') . '</b></a>
		</div>

		<div style="white-space: nowrap; overflow: hidden;">
			' . '' . XenForo_Template_Helper_Core::date($subMedia['media_date'], '') . ' at ' . XenForo_Template_Helper_Core::time($subMedia['media_date'], '') . '' . '<br />
			' . 'Posted By' . ' <a href="' . XenForo_Template_Helper_Core::link('media/user', $subMedia, array()) . '">' . htmlspecialchars($subMedia['username'], ENT_QUOTES, 'UTF-8') . '</a><br />
			<a href="' . XenForo_Template_Helper_Core::link('media/category', $subMedia, array()) . '">' . htmlspecialchars($subMedia['category_name'], ENT_QUOTES, 'UTF-8') . '</a>
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

' . XenForo_Template_Helper_Core::callHelper('pagenavhtml', array('public', htmlspecialchars($stop, ENT_QUOTES, 'UTF-8'), htmlspecialchars($count, ENT_QUOTES, 'UTF-8'), htmlspecialchars($start, ENT_QUOTES, 'UTF-8'), 'media/category', $category, array(), false, array())) . '

';
$__compilerVar2 = '';
if ($perms['submit'])
{
$__compilerVar2 .= '
<div class="sectionMain">
	<div class="subHeading">' . 'Submit Media' . '</div>

	<form action="' . XenForo_Template_Helper_Core::link('media/submit', false, array()) . '" method="post" class="xenForm" style="text-align: center; width: auto;">
		<b>' . 'Media URL' . ':</b> &nbsp; &nbsp;
		<input type="text" name="source" class="textCtrl" id="ctrl_source" value="" style="width: 300px;" /> &nbsp; &nbsp;
		<input type="submit" value="' . 'Retrieve Information' . '" name="submit" accesskey="s" class="button primary" />
		<input type="hidden" name="_xfToken" value="' . htmlspecialchars($visitor['csrf_token_page'], ENT_QUOTES, 'UTF-8') . '" />
	</form>
</div>
';
}
$__output .= $__compilerVar2;
unset($__compilerVar2);
$__output .= '
';
$__compilerVar3 = '';
$this->addRequiredExternal('css', 'member_list');
$__compilerVar3 .= '

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
$__compilerVar4 = '';
if ($sidebar['keywords'])
{
$__compilerVar4 .= '
	<div class="section mediaCloud">
		<div class="secondaryContent" id="Cloud">
			<h3>' . 'Keyword Cloud' . '</h3>

			<div id="keywordCloud">
				<ul id="textCloud">
				';
foreach ($sidebar['keywords'] AS $subWord)
{
$__compilerVar4 .= '
					<li style="font-size:' . htmlspecialchars($subWord['keyword_size'], ENT_QUOTES, 'UTF-8') . 'px;" title="' . htmlspecialchars($subWord['keyword_count'], ENT_QUOTES, 'UTF-8') . '">
						<a href="' . XenForo_Template_Helper_Core::link('media/keyword', $subWord, array()) . '">' . htmlspecialchars($subWord['keyword_text'], ENT_QUOTES, 'UTF-8') . '</a>
					</li>
				';
}
$__compilerVar4 .= '
				</ul>
			</div>

			';
if ($sidebar['animated'])
{
$__compilerVar4 .= '
				';
$this->addRequiredExternal('js', 'js/8wayrun/swfobject.js');
$__compilerVar4 .= '
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
$__compilerVar4 .= '
		</div>
	</div>
';
}
$__extraData['sidebar'] .= $__compilerVar4;
unset($__compilerVar4);
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
							data-url="' . htmlspecialchars($url, ENT_QUOTES, 'UTF-8') . '"
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
						<fb:like href="' . htmlspecialchars($url, ENT_QUOTES, 'UTF-8') . '" layout="button_count" action="' . htmlspecialchars($xenOptions['facebookLikeAction'], ENT_QUOTES, 'UTF-8') . '" font="trebuchet ms" colorscheme="' . XenForo_Template_Helper_Core::styleProperty('fbColorScheme') . '"></fb:like>
					</div>
				';
}
$__compilerVar7 .= '
				';
if ($xenOptions['plusone'])
{
$__compilerVar7 .= '
					<div class="plusone shareControl">
						<div class="g-plusone" data-size="medium" data-count="true" data-href="' . htmlspecialchars($url, ENT_QUOTES, 'UTF-8') . '"></div>
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
unset($__compilerVar5);
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
$__output .= $__compilerVar3;
unset($__compilerVar3);
$__output .= '
';
$__compilerVar8 = '';
$__compilerVar8 .= '<div class="medioCopy copyright muted">
	<a href="http://xenforo.com/community/resources/97/">XenMedio</a>
	&copy; Jason Axelrod from <a href="http://8wayrun.com/">8WAYRUN.COM</a>
</div>';
$__output .= $__compilerVar8;
unset($__compilerVar8);
