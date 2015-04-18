<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
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
		<li>' . htmlspecialchars($warning, ENT_QUOTES, 'UTF-8') . '</li>
	';
}
$__output .= '
	</ol>
';
}
else
{
$__output .= '
	<ol class="searchWarnings">
		<li>' . 'No results found.' . '</li>
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

';
