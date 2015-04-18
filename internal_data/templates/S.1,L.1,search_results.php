<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
if ($search['search_query'])
{
$__output .= '
	';
$__extraData['title'] = '';
$__extraData['title'] .= 'Search Results for Query' . ': ' . htmlspecialchars($search['search_query'], ENT_QUOTES, 'UTF-8');
$__output .= '
	';
$__extraData['h1'] = '';
$__extraData['h1'] .= 'Search Results for Query' . ': <a href="' . XenForo_Template_Helper_Core::link('search', $search, array(
'searchform' => '1'
)) . '"><em>' . htmlspecialchars($search['search_query'], ENT_QUOTES, 'UTF-8') . '</em></a>';
$__output .= '
';
}
else
{
$__output .= '
	';
$__extraData['title'] = '';
$__extraData['title'] .= 'Search Results';
$__output .= '
';
}
$__output .= '

';
$__extraData['navigation'] = array();
$__extraData['navigation'][] = array('href' => XenForo_Template_Helper_Core::link('full:search', false, array()), 'value' => 'Search');
$__output .= '

';
$__extraData['head']['robots'] = '';
$__extraData['head']['robots'] .= '
	<meta name="robots" content="noindex" />';
$__output .= '

';
$this->addRequiredExternal('css', 'search_results');
$__output .= '

';
if ($search['searchWarnings'])
{
$__output .= '
	<ol class="searchWarnings">
	';
foreach ($search['searchWarnings'] AS $warning)
{
$__output .= '
		<li>' . htmlspecialchars($warning, ENT_QUOTES, 'UTF-8', (false)) . '</li>
	';
}
$__output .= '
	</ol>
';
}
$__output .= '

';
if ($search['users'])
{
$__output .= '
	';
$__extraData['sidebar'] = '';
$__extraData['sidebar'] .= '
		<div class="section userResults avatarList">
			<div class="secondaryContent">
				<h3>' . 'Matched Users' . '</h3>
				<ul>
					';
foreach ($search['users'] AS $user)
{
$__extraData['sidebar'] .= '
							<li class="userResult">
								' . XenForo_Template_Helper_Core::callHelper('avatarhtml', array($user,(true),array(
'user' => '$user',
'size' => 's',
'img' => 'true'
),'')) . '
								' . XenForo_Template_Helper_Core::callHelper('usernamehtml', array($user,'',(true),array())) . '
								<div class="userTitle">' . XenForo_Template_Helper_Core::callHelper('userTitle', array(
'0' => $user
)) . '</div>
							</li>
					';
}
$__extraData['sidebar'] .= '
				</ul>
			</div>
		</div>
	';
$__output .= '
';
}
$__output .= '

<div class="pageNavLinkGroup">
	<div class="linkGroup SelectionCountContainer">
		<a href="' . XenForo_Template_Helper_Core::link('search', $search, array(
'searchform' => '1'
)) . '">' . 'Search Again' . '</a>

		';
if ($supportedInlineModTypes)
{
$__output .= '
			<div class="Popup">
				<a rel="Menu">' . 'Moderator Tools' . '</a>
				<div class="Menu">
					<div class="primaryContent menuHeader">
						<h3>' . 'Enable Moderation' . '</h3>
					</div>
					<ul class="secondaryContent blockLinksList">
					';
foreach ($supportedInlineModTypes AS $inlineModType => $inlineMod)
{
$__output .= '
						<li><a href="' . XenForo_Template_Helper_Core::link('search', $search, array(
'mod' => $inlineModType,
'page' => (($page > 1) ? ($page) : (''))
)) . '" class="' . (($modType == $inlineModType) ? ('selected') : ('')) . '">' . htmlspecialchars($inlineMod['name'], ENT_QUOTES, 'UTF-8') . '</a></li>
					';
}
$__output .= '
					';
if ($modType)
{
$__output .= '
						<li><a href="' . XenForo_Template_Helper_Core::link('search', $search, array(
'page' => (($page > 1) ? ($page) : (''))
)) . '">' . 'Disable' . '</a></li>
					';
}
$__output .= '
					</ul>
				</div>
			</div>
		';
}
$__output .= '
	</div>

	' . XenForo_Template_Helper_Core::callHelper('pagenavhtml', array('public', htmlspecialchars($perPage, ENT_QUOTES, 'UTF-8'), htmlspecialchars($totalResults, ENT_QUOTES, 'UTF-8'), htmlspecialchars($page, ENT_QUOTES, 'UTF-8'), 'search', $search, array(
'mod' => $modType
), false, array())) . '
</div>

<div class="section sectionMain searchResults">
	<form action="' . (($activeInlineMod) ? (XenForo_Template_Helper_Core::link(htmlspecialchars($activeInlineMod['route'], ENT_QUOTES, 'UTF-8'), false, array())) : ('')) . '" method="post"
		class="InlineModForm"
		data-cookieName="' . htmlspecialchars($activeInlineMod['cookie'], ENT_QUOTES, 'UTF-8') . '"
		data-controls="#InlineModControls"
		data-imodOptions="#ModerationSelect option"
	>

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
		
		';
if ($userSearchMaxDate)
{
$__output .= '
			<div class="secondaryContent olderMessages">
				<a href="' . XenForo_Template_Helper_Core::link('search/member', '', array(
'user_id' => $search['searchConstraints']['user_id'],
'content' => $search['searchConstraints']['content'],
'before' => $userSearchMaxDate
)) . '">' . 'Find older messages' . '</a>
			</div>
		';
}
$__output .= '
		
		<div class="sectionFooter searchResultSummary">
			<span class="resultCount">' . 'Showing results ' . XenForo_Template_Helper_Core::numberFormat($resultStartOffset, '0') . ' to ' . XenForo_Template_Helper_Core::numberFormat($resultEndOffset, '0') . ' of ' . XenForo_Template_Helper_Core::numberFormat($totalResults, '0') . '' . '</span>
			';
if ($nextPage)
{
$__output .= '<a href="' . XenForo_Template_Helper_Core::link('search', $search, array(
'page' => $nextPage
)) . '" class="nextLink">' . 'Next' . ' &gt;</a>';
}
$__output .= '
			
			' . $inlineModControlsHtml . '
		</div>

	</form>
</div>

<div class="pageNavLinkGroup">
	<div class="linkGroup">
		';
if ($ignoredNames)
{
$__output .= '
			<a href="javascript:" class="muted JsOnly DisplayIgnoredContent Tooltip" title="' . 'Show hidden content by ' . XenForo_Template_Helper_Core::callHelper('implode', array(
'0' => $ignoredNames,
'1' => ', '
)) . '' . '">' . 'Show Ignored Content' . '</a>
		';
}
$__output .= '
		<a href="' . XenForo_Template_Helper_Core::link('search', $search, array(
'searchform' => '1'
)) . '">' . 'Search Again' . '</a>
	</div>

	' . XenForo_Template_Helper_Core::callHelper('pagenavhtml', array('public', htmlspecialchars($perPage, ENT_QUOTES, 'UTF-8'), htmlspecialchars($totalResults, ENT_QUOTES, 'UTF-8'), htmlspecialchars($page, ENT_QUOTES, 'UTF-8'), 'search', $search, array(
'mod' => $modType
), false, array())) . '
</div>';
