<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__extraData['title'] = '';
$__extraData['title'] .= htmlspecialchars($page['title'], ENT_QUOTES, 'UTF-8');
$__output .= '

';
$__extraData['navigation'] = array();
$__extraData['navigation'] = XenForo_Template_Helper_Core::appendBreadCrumbs($__extraData['navigation'], $nodeBreadCrumbs);
$__output .= '

';
$__extraData['head']['openGraph'] = '';
$__extraData['head']['openGraph'] .= '
	';
$__compilerVar12 = '';
$__compilerVar12 .= XenForo_Template_Helper_Core::link('canonical:pages', $page, array());
$__compilerVar13 = '';
$__compilerVar13 .= htmlspecialchars($page['title'], ENT_QUOTES, 'UTF-8');
$__compilerVar14 = '';
$__compilerVar14 .= XenForo_Template_Helper_Core::callHelper('stripHtml', array(
'0' => $page['description']
));
$__compilerVar15 = '';
if ($xenOptions['facebookAppId'] OR $xenOptions['facebookAdmins'])
{
$__compilerVar15 .= '
	<meta property="og:site_name" content="' . htmlspecialchars($xenOptions['boardTitle'], ENT_QUOTES, 'UTF-8') . '" />
	';
if ($avatar)
{
$__compilerVar15 .= '<meta property="og:image" content="' . htmlspecialchars($avatar, ENT_QUOTES, 'UTF-8') . '" />';
}
$__compilerVar15 .= '
	<meta property="og:image" content="';
$__compilerVar16 = '';
$__compilerVar16 .= XenForo_Template_Helper_Core::callHelper('fullurl', array(
'0' => XenForo_Template_Helper_Core::styleProperty('ogLogoPath'),
'1' => '1'
));
$__compilerVar15 .= $this->callTemplateCallback('OpenGraphImage_Callback', 'getImage', $__compilerVar16, array());
unset($__compilerVar16);
$__compilerVar15 .= '" />
	<meta property="og:type" content="' . (($ogType) ? (htmlspecialchars($ogType, ENT_QUOTES, 'UTF-8')) : ('article')) . '" />
	<meta property="og:url" content="' . $__compilerVar12 . '" />
	<meta property="og:title" content="' . $__compilerVar13 . '" />
	';
if ($__compilerVar14)
{
$__compilerVar15 .= '<meta property="og:description" content="' . $__compilerVar14 . '" />';
}
$__compilerVar15 .= '
	' . $ogExtraHtml . '
	';
if ($xenOptions['facebookAppId'])
{
$__compilerVar15 .= '<meta property="fb:app_id" content="' . htmlspecialchars($xenOptions['facebookAppId'], ENT_QUOTES, 'UTF-8') . '" />';
}
$__compilerVar15 .= '
	';
if ($xenOptions['facebookAdmins'])
{
$__compilerVar15 .= '<meta property="fb:admins" content="' . XenForo_Template_Helper_Core::callHelper('implode', array(
'0' => $xenOptions['facebookAdmins'],
'1' => ','
)) . '" />';
}
$__compilerVar15 .= '
';
}
$__extraData['head']['openGraph'] .= $__compilerVar15;
unset($__compilerVar12, $__compilerVar13, $__compilerVar14, $__compilerVar15);
$__extraData['head']['openGraph'] .= '
';
$__output .= '

';
$__extraData['quickNavSelected'] = '';
$__extraData['quickNavSelected'] .= 'node-' . htmlspecialchars($page['node_id'], ENT_QUOTES, 'UTF-8');
$__output .= '

';
$__extraData['bodyClasses'] = '';
$__extraData['bodyClasses'] .= XenForo_Template_Helper_Core::callHelper('nodeClasses', array(
'0' => $nodeBreadCrumbs,
'1' => $page
));
$__output .= '

';
$__extraData['head']['canonical'] = '';
$__extraData['head']['canonical'] .= '
	<link rel="canonical" href="' . XenForo_Template_Helper_Core::link('canonical:pages', $page, array()) . '" />';
$__output .= '

';
if ($page['description'])
{
$__output .= '
	';
$__extraData['pageDescription'] = array(
'class' => 'baseHtml'
);
$__extraData['pageDescription']['content'] = '';
$__extraData['pageDescription']['content'] .= $page['description'];
$__output .= '
';
}
$__output .= '

';
$this->addRequiredExternal('css', 'pagenode');
$__output .= '

<div id="pageNodeContent">

	';
$__compilerVar17 = '';
$__compilerVar17 .= '
			
				';
if ($listSiblingNodes && $siblingNodes)
{
$__compilerVar17 .= '
				
					';
if ($parentNode)
{
$__compilerVar17 .= '<h3 class="parentNode"><a href="' . htmlspecialchars($parentNode['href'], ENT_QUOTES, 'UTF-8') . '"><span class="_depth0 depthPad">' . htmlspecialchars($parentNode['value'], ENT_QUOTES, 'UTF-8') . '</span></a></h3>';
}
$__compilerVar17 .= '
					
					<ol class="siblingNodes">
						';
foreach ($siblingNodes AS $node)
{
$__compilerVar17 .= '
							<li class="' . (($node['node_id'] == $page['node_id']) ? ('currentNode') : ('siblingNode')) . '">
								<a href="' . XenForo_Template_Helper_Core::link(htmlspecialchars($node['routePrefix'], ENT_QUOTES, 'UTF-8'), $node, array()) . '" class="' . (($node['node_id'] == $page['node_id']) ? ('selected') : ('')) . '">
									<span class="_depth1 depthPad">' . htmlspecialchars($node['title'], ENT_QUOTES, 'UTF-8') . '</span>
								</a>
								';
if ($listChildNodes && $childNodes && $node['node_id'] == $page['node_id'])
{
$__compilerVar17 .= '
									<ol class="childNodes">
									';
foreach ($childNodes AS $childNode)
{
$__compilerVar17 .= '
										<li class="childNode"><a href="' . XenForo_Template_Helper_Core::link(htmlspecialchars($childNode['routePrefix'], ENT_QUOTES, 'UTF-8'), $childNode, array()) . '">
											<span class="_depth2 depthPad">' . htmlspecialchars($childNode['title'], ENT_QUOTES, 'UTF-8') . '</span>
										</a></li>
									';
}
$__compilerVar17 .= '
									</ol>
								';
}
$__compilerVar17 .= '
							</li>
						';
}
$__compilerVar17 .= '
					</ol>
					
				';
}
else if ($listChildNodes && $childNodes)
{
$__compilerVar17 .= '
				
					<ol class="childNodes">
						';
foreach ($childNodes AS $childNode)
{
$__compilerVar17 .= '
							<li class="childNode"><a href="' . XenForo_Template_Helper_Core::link(htmlspecialchars($childNode['routePrefix'], ENT_QUOTES, 'UTF-8'), $childNode, array()) . '">
								<span class="_depth0 depthPad">' . htmlspecialchars($childNode['title'], ENT_QUOTES, 'UTF-8') . '</span>
							</a></li>
						';
}
$__compilerVar17 .= '
					</ol>
					
				';
}
$__compilerVar17 .= '
				
			';
if (trim($__compilerVar17) !== '')
{
$__output .= '
		<div id="pageNodeNavigation" class="secondaryContent">
			<div class="blockLinksList">
			' . $__compilerVar17 . '
			</div>
		</div>
	';
}
unset($__compilerVar17);
$__output .= '

	';
$__compilerVar18 = '';
$__compilerVar18 .= '
	<article>' . $templateHtml . '</article>
	';
$__output .= $this->callTemplateHook('pagenode_container_article', $__compilerVar18, array());
unset($__compilerVar18);
$__output .= '
	
	<div class="bottomContent">

		';
if ($page['log_visits'])
{
$__output .= '
			<div class="pageCounter">
				<dl class="pairsInline pageStats">
					<dt>' . 'Published' . ':</dt> <dd>' . XenForo_Template_Helper_Core::date($page['publish_date'], '') . '</dd>
					<dt>' . 'Page views' . ':</dt> <dd>' . XenForo_Template_Helper_Core::numberFormat($page['view_count'], '0') . '</dd>
				</dl>
			</div>
		';
}
$__output .= '
	
		';
$__compilerVar19 = '';
$__compilerVar19 .= XenForo_Template_Helper_Core::link('canonical:pages', $page, array());
$__compilerVar20 = '';
$__compilerVar21 = '';
$__compilerVar21 .= '
			';
$__compilerVar22 = '';
$__compilerVar22 .= '
			';
if ($xenOptions['tweet']['enabled'])
{
$__compilerVar22 .= '
				<div class="tweet shareControl">
					<a href="https://twitter.com/share" class="twitter-share-button"
						data-count="horizontal"
						data-lang="' . XenForo_Template_Helper_Core::callHelper('twitterLang', array(
'0' => $visitorLanguage['language_code']
)) . '"
						data-url="' . htmlspecialchars($__compilerVar19, ENT_QUOTES, 'UTF-8') . '"
						' . (($thread['title']) ? ('data-text="' . XenForo_Template_Helper_Core::callHelper('threadPrefix', array(
'0' => $thread,
'1' => 'escaped'
)) . htmlspecialchars($thread['title'], ENT_QUOTES, 'UTF-8') . '"') : ('')) . '
						' . (($xenOptions['tweet']['via']) ? ('data-via="' . htmlspecialchars($xenOptions['tweet']['via'], ENT_QUOTES, 'UTF-8') . '"') : ('')) . '
						' . (($xenOptions['tweet']['related']) ? ('data-related="' . htmlspecialchars($xenOptions['tweet']['related'], ENT_QUOTES, 'UTF-8') . '"') : ('')) . '>' . 'Tweet' . '</a>
				</div>
			';
}
$__compilerVar22 .= '
			';
if ($xenOptions['plusone'])
{
$__compilerVar22 .= '
				<div class="plusone shareControl">
					<div class="g-plusone" data-size="medium" data-count="true" data-href="' . htmlspecialchars($__compilerVar19, ENT_QUOTES, 'UTF-8') . '"></div>
				</div>
			';
}
$__compilerVar22 .= '
			';
if ($xenOptions['facebookLike'])
{
$__compilerVar22 .= '
				<div class="facebookLike shareControl">
					';
$__extraData['facebookSdk'] = '';
$__extraData['facebookSdk'] .= '1';
$__compilerVar22 .= '
					<fb:like href="' . htmlspecialchars($__compilerVar19, ENT_QUOTES, 'UTF-8') . '" show_faces="true" width="400" action="' . htmlspecialchars($xenOptions['facebookLikeAction'], ENT_QUOTES, 'UTF-8') . '" font="trebuchet ms" colorscheme="' . XenForo_Template_Helper_Core::styleProperty('fbColorScheme') . '"></fb:like>
				</div>
			';
}
$__compilerVar22 .= '
			';
$__compilerVar21 .= $this->callTemplateHook('share_page_options', $__compilerVar22, array());
unset($__compilerVar22);
$__compilerVar21 .= '
		';
if (trim($__compilerVar21) !== '')
{
$__compilerVar20 .= '
	';
$this->addRequiredExternal('css', 'share_page');
$__compilerVar20 .= '

	<div class="sharePage">
		<h3 class="textHeading larger">' . 'Chia sẻ trang này' . '</h3>
		' . $__compilerVar21 . '
	</div>
';
}
unset($__compilerVar21);
$__output .= $__compilerVar20;
unset($__compilerVar19, $__compilerVar20);
$__output .= '
	
	</div>
	
</div>';
