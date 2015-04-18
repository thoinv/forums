<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__extraData['title'] = '';
$__extraData['title'] .= (($tag['tag_title']) ? (htmlspecialchars($tag['tag_title'], ENT_QUOTES, 'UTF-8') . ' - ' . htmlspecialchars($tag['tag_text'], ENT_QUOTES, 'UTF-8')) : (htmlspecialchars($tag['tag_text'], ENT_QUOTES, 'UTF-8'))) . XenForo_Template_Helper_Core::callHelper('pagenumber', array(
'0' => $page
));
$__output .= '
';
$__extraData['h1'] = '';
$__extraData['h1'] .= (($tag['tag_title']) ? (htmlspecialchars($tag['tag_title'], ENT_QUOTES, 'UTF-8')) : (htmlspecialchars($tag['tag_text'], ENT_QUOTES, 'UTF-8')));
$__output .= '
';
$__extraData['pageDescription'] = array();
$__extraData['pageDescription']['content'] = '';
$__extraData['pageDescription']['content'] .= '
	' . htmlspecialchars($tag['tag_description'], ENT_QUOTES, 'UTF-8') . '
	' . ((!$tag['tag_description']) ? ('These are all contents from ' . htmlspecialchars($xenOptions['boardTitle'], ENT_QUOTES, 'UTF-8') . ' tagged ' . htmlspecialchars($tag['tag_text'], ENT_QUOTES, 'UTF-8') . '.') : ('')) . '
	' . (($page > 1) ? ('Page ' . htmlspecialchars($page, ENT_QUOTES, 'UTF-8') . '.') : ('')) . '
';
$__output .= '

';
$__extraData['navigation'] = array();
$__extraData['navigation'][] = array('href' => XenForo_Template_Helper_Core::link('tags', false, array()), 'value' => 'Tags');
$__output .= '

';
$__extraData['head']['canonical'] = '';
$__extraData['head']['canonical'] .= '
	<link rel="canonical" href="' . XenForo_Template_Helper_Core::link('canonical:tags', $tag, array(
'page' => $page
)) . '" />';
$__output .= '

';
$__extraData['head']['rss'] = '';
$__extraData['head']['rss'] .= '
	<link rel="alternate" type="application/rss+xml" title="' . 'RSS feed for ' . htmlspecialchars($tag['tag_text'], ENT_QUOTES, 'UTF-8') . '' . '" href="' . XenForo_Template_Helper_Core::link('tags.rss', $tag, array()) . '" />';
$__output .= '

';
$__extraData['searchBar']['tinhte_xentag'] = '';
$__compilerVar1 = '';
$__compilerVar1 .= '<label><input type="checkbox" name="tinhte_xentag_tags_text_no_include" value="' . htmlspecialchars($tag['tag_text'], ENT_QUOTES, 'UTF-8') . '"
	id="search_bar_tag" class="Disabler AutoChecker" checked="checked"
	/> ' . 'Search threads tagged with ' . htmlspecialchars($tag['tag_text'], ENT_QUOTES, 'UTF-8') . ' only' . '</label>
	<ul id="search_bar_tag_Disabler">
		<li><label><input type="checkbox" name="type[post][group_discussion]" value="1"
			id="search_bar_group_discussion" class="AutoChecker"
			/> ' . 'Display results as threads' . '</label></li>
	</ul>
<input type="hidden" name="type" value="post" />';
$__extraData['searchBar']['tinhte_xentag'] .= $__compilerVar1;
unset($__compilerVar1);
$__output .= '

';
if ($canEdit)
{
$__output .= '
	';
$editButton = '';
$editButton .= '<a href="' . XenForo_Template_Helper_Core::link('tags/edit', $tag, array()) . '" class="callToAction OverlayTrigger"><span>' . 'Edit Tag' . '</span></a>';
$__output .= '
';
}
$__output .= '

';
$__extraData['topctrl'] = '';
$__extraData['topctrl'] .= $editButton;
$__output .= '

';
$this->addRequiredExternal('css', 'search_results');
$__output .= '
	
<div class="pageNavLinkGroup">
	<div class="linkGroup">
		';
if ($canWatch)
{
$__output .= '
			<a href="' . XenForo_Template_Helper_Core::link('tags/watch-confirm', $tag, array()) . '" class="OverlayTrigger" data-cacheOverlay="false">' . (($tag['tag_is_watched']) ? ('Unwatch Tag') : ('Watch Tag')) . '</a>
		';
}
$__output .= '
		';
if ($canReport)
{
$__output .= '
			<a href="' . XenForo_Template_Helper_Core::link('tags/report', $tag, array()) . '" class="OverlayTrigger">' . 'Report' . '</a>
		';
}
$__output .= '
	</div>

	' . XenForo_Template_Helper_Core::callHelper('pagenavhtml', array('public', htmlspecialchars($perPage, ENT_QUOTES, 'UTF-8'), htmlspecialchars($totalThreads, ENT_QUOTES, 'UTF-8'), htmlspecialchars($page, ENT_QUOTES, 'UTF-8'), 'tags', $tag, $linkParams, false, array())) . '
</div>

<div class="section sectionMain searchResults">
	<form action="" method="post">

		<ol class="searchResultsList">
			';
$i = 0;
foreach ($results AS $result)
{
$i++;
$__output .= '
				' . $result . '
			';
}
$__output .= '
		</ol>
		
		<div class="sectionFooter searchResultSummary">
			<span class="resultCount">' . 'Showing results ' . XenForo_Template_Helper_Core::numberFormat($resultStartOffset, '0') . ' to ' . XenForo_Template_Helper_Core::numberFormat($resultEndOffset, '0') . ' of ' . XenForo_Template_Helper_Core::numberFormat($totalResults, '0') . '' . '</span>
		</div>

	</form>
</div>


<div class="pageNavLinkGroup">
	<div class="linkGroup"' . ((!$ignoredNames) ? (' style="display: none"') : ('')) . '><a href="javascript:" class="muted jsOnly DisplayIgnoredContent Tooltip" title="' . 'Show hidden content by ' . XenForo_Template_Helper_Core::callHelper('implode', array(
'0' => $ignoredNames,
'1' => ', '
)) . '' . '">' . 'Show Ignored Content' . '</a></div>

	' . XenForo_Template_Helper_Core::callHelper('pagenavhtml', array('public', htmlspecialchars($perPage, ENT_QUOTES, 'UTF-8'), htmlspecialchars($totalResults, ENT_QUOTES, 'UTF-8'), htmlspecialchars($page, ENT_QUOTES, 'UTF-8'), 'tags', $tag, $linkParams, false, array())) . '
</div>

';
$__compilerVar2 = '';
$__compilerVar2 .= XenForo_Template_Helper_Core::link('canonical:tags', $tag, array());
$__compilerVar3 = '';
$__compilerVar4 = '';
$__compilerVar4 .= '
			';
$__compilerVar5 = '';
$__compilerVar5 .= '
			';
if ($xenOptions['tweet']['enabled'])
{
$__compilerVar5 .= '
				<div class="tweet shareControl">
					<a href="https://twitter.com/share" class="twitter-share-button"
						data-count="horizontal"
						data-lang="' . XenForo_Template_Helper_Core::callHelper('twitterLang', array(
'0' => $visitorLanguage['language_code']
)) . '"
						data-url="' . htmlspecialchars($__compilerVar2, ENT_QUOTES, 'UTF-8') . '"
						' . (($thread['title']) ? ('data-text="' . XenForo_Template_Helper_Core::callHelper('threadPrefix', array(
'0' => $thread,
'1' => 'escaped'
)) . htmlspecialchars($thread['title'], ENT_QUOTES, 'UTF-8') . '"') : ('')) . '
						' . (($xenOptions['tweet']['via']) ? ('data-via="' . htmlspecialchars($xenOptions['tweet']['via'], ENT_QUOTES, 'UTF-8') . '"') : ('')) . '
						' . (($xenOptions['tweet']['related']) ? ('data-related="' . htmlspecialchars($xenOptions['tweet']['related'], ENT_QUOTES, 'UTF-8') . '"') : ('')) . '>' . 'Tweet' . '</a>
				</div>
			';
}
$__compilerVar5 .= '
			';
if ($xenOptions['plusone'])
{
$__compilerVar5 .= '
				<div class="plusone shareControl">
					<div class="g-plusone" data-size="medium" data-count="true" data-href="' . htmlspecialchars($__compilerVar2, ENT_QUOTES, 'UTF-8') . '"></div>
				</div>
			';
}
$__compilerVar5 .= '
			';
if ($xenOptions['facebookLike'])
{
$__compilerVar5 .= '
				<div class="facebookLike shareControl">
					';
$__extraData['facebookSdk'] = '';
$__extraData['facebookSdk'] .= '1';
$__compilerVar5 .= '
					<fb:like href="' . htmlspecialchars($__compilerVar2, ENT_QUOTES, 'UTF-8') . '" show_faces="true" width="400" action="' . htmlspecialchars($xenOptions['facebookLikeAction'], ENT_QUOTES, 'UTF-8') . '" font="trebuchet ms" colorscheme="' . XenForo_Template_Helper_Core::styleProperty('fbColorScheme') . '"></fb:like>
				</div>
			';
}
$__compilerVar5 .= '
			';
$__compilerVar4 .= $this->callTemplateHook('share_page_options', $__compilerVar5, array());
unset($__compilerVar5);
$__compilerVar4 .= '
		';
if (trim($__compilerVar4) !== '')
{
$__compilerVar3 .= '
	';
$this->addRequiredExternal('css', 'share_page');
$__compilerVar3 .= '

	<div class="sharePage">
		<h3 class="textHeading larger">' . 'Share This Page' . '</h3>
		' . $__compilerVar4 . '
	</div>
';
}
unset($__compilerVar4);
$__output .= $__compilerVar3;
unset($__compilerVar2, $__compilerVar3);
$__output .= '

';
$__compilerVar6 = '';
$__compilerVar6 .= '

';
$this->addRequiredExternal('css', 'tinhte_xentag');
$__compilerVar6 .= '

<div class="Tinhte_XenTag_Copyright">
	XenTag by <a href="http://www.tinhte.vn" target="_blank">Tinhte.vn</a>
</div>';
$__output .= $__compilerVar6;
unset($__compilerVar6);
