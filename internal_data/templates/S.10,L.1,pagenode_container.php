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
$__compilerVar1 = '';
$__compilerVar1 .= XenForo_Template_Helper_Core::link('canonical:pages', $page, array());
$__compilerVar2 = '';
$__compilerVar2 .= htmlspecialchars($page['title'], ENT_QUOTES, 'UTF-8');
$__compilerVar3 = '';
$__compilerVar3 .= XenForo_Template_Helper_Core::callHelper('stripHtml', array(
'0' => $page['description']
));
$__compilerVar4 = '';
if ($xenOptions['facebookAppId'] OR $xenOptions['facebookAdmins'])
{
$__compilerVar4 .= '
	<meta property="og:site_name" content="' . htmlspecialchars($xenOptions['boardTitle'], ENT_QUOTES, 'UTF-8') . '" />
	';
if ($avatar)
{
$__compilerVar4 .= '<meta property="og:image" content="' . htmlspecialchars($avatar, ENT_QUOTES, 'UTF-8') . '" />';
}
$__compilerVar4 .= '
	<meta property="og:image" content="';
$__compilerVar5 = '';
$__compilerVar5 .= XenForo_Template_Helper_Core::callHelper('fullurl', array(
'0' => XenForo_Template_Helper_Core::styleProperty('ogLogoPath'),
'1' => '1'
));
$__compilerVar4 .= $this->callTemplateCallback('OpenGraphImage_Callback', 'getImage', $__compilerVar5, array());
unset($__compilerVar5);
$__compilerVar4 .= '" />
	<meta property="og:type" content="' . (($ogType) ? (htmlspecialchars($ogType, ENT_QUOTES, 'UTF-8')) : ('article')) . '" />
	<meta property="og:url" content="' . $__compilerVar1 . '" />
	<meta property="og:title" content="' . $__compilerVar2 . '" />
	';
if ($__compilerVar3)
{
$__compilerVar4 .= '<meta property="og:description" content="' . $__compilerVar3 . '" />';
}
$__compilerVar4 .= '
	' . $ogExtraHtml . '
	';
if ($xenOptions['facebookAppId'])
{
$__compilerVar4 .= '<meta property="fb:app_id" content="' . htmlspecialchars($xenOptions['facebookAppId'], ENT_QUOTES, 'UTF-8') . '" />';
}
$__compilerVar4 .= '
	';
if ($xenOptions['facebookAdmins'])
{
$__compilerVar4 .= '<meta property="fb:admins" content="' . XenForo_Template_Helper_Core::callHelper('implode', array(
'0' => $xenOptions['facebookAdmins'],
'1' => ','
)) . '" />';
}
$__compilerVar4 .= '
';
}
$__extraData['head']['openGraph'] .= $__compilerVar4;
unset($__compilerVar1, $__compilerVar2, $__compilerVar3, $__compilerVar4);
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
$__compilerVar6 = '';
$__compilerVar6 .= '
			
				';
if ($listSiblingNodes && $siblingNodes)
{
$__compilerVar6 .= '
				
					';
if ($parentNode)
{
$__compilerVar6 .= '<h3 class="parentNode"><a href="' . htmlspecialchars($parentNode['href'], ENT_QUOTES, 'UTF-8') . '"><span class="_depth0 depthPad">' . htmlspecialchars($parentNode['value'], ENT_QUOTES, 'UTF-8') . '</span></a></h3>';
}
$__compilerVar6 .= '
					
					<ol class="siblingNodes">
						';
foreach ($siblingNodes AS $node)
{
$__compilerVar6 .= '
							<li class="' . (($node['node_id'] == $page['node_id']) ? ('currentNode') : ('siblingNode')) . '">
								<a href="' . XenForo_Template_Helper_Core::link(htmlspecialchars($node['routePrefix'], ENT_QUOTES, 'UTF-8'), $node, array()) . '" class="' . (($node['node_id'] == $page['node_id']) ? ('selected') : ('')) . '">
									<span class="_depth1 depthPad">' . htmlspecialchars($node['title'], ENT_QUOTES, 'UTF-8') . '</span>
								</a>
								';
if ($listChildNodes && $childNodes && $node['node_id'] == $page['node_id'])
{
$__compilerVar6 .= '
									<ol class="childNodes">
									';
foreach ($childNodes AS $childNode)
{
$__compilerVar6 .= '
										<li class="childNode"><a href="' . XenForo_Template_Helper_Core::link(htmlspecialchars($childNode['routePrefix'], ENT_QUOTES, 'UTF-8'), $childNode, array()) . '">
											<span class="_depth2 depthPad">' . htmlspecialchars($childNode['title'], ENT_QUOTES, 'UTF-8') . '</span>
										</a></li>
									';
}
$__compilerVar6 .= '
									</ol>
								';
}
$__compilerVar6 .= '
							</li>
						';
}
$__compilerVar6 .= '
					</ol>
					
				';
}
else if ($listChildNodes && $childNodes)
{
$__compilerVar6 .= '
				
					<ol class="childNodes">
						';
foreach ($childNodes AS $childNode)
{
$__compilerVar6 .= '
							<li class="childNode"><a href="' . XenForo_Template_Helper_Core::link(htmlspecialchars($childNode['routePrefix'], ENT_QUOTES, 'UTF-8'), $childNode, array()) . '">
								<span class="_depth0 depthPad">' . htmlspecialchars($childNode['title'], ENT_QUOTES, 'UTF-8') . '</span>
							</a></li>
						';
}
$__compilerVar6 .= '
					</ol>
					
				';
}
$__compilerVar6 .= '
				
			';
if (trim($__compilerVar6) !== '')
{
$__output .= '
		<div id="pageNodeNavigation" class="secondaryContent">
			<div class="blockLinksList">
			' . $__compilerVar6 . '
			</div>
		</div>
	';
}
unset($__compilerVar6);
$__output .= '

	';
$__compilerVar7 = '';
$__compilerVar7 .= '
	<article>' . $templateHtml . '</article>
	';
$__output .= $this->callTemplateHook('pagenode_container_article', $__compilerVar7, array());
unset($__compilerVar7);
$__output .= '
	
	<div class="bottomContent">

		';
if ($page['log_visits'])
{
$__output .= '
			<div class="pageCounter">
				<dl class="pairsInline pageStats">
					<dt>' . 'Published' . ':</dt> <dd>' . XenForo_Template_Helper_Core::date($page['publish_date'], '') . '</dd>
					<dt>' . 'Page Views' . ':</dt> <dd>' . XenForo_Template_Helper_Core::numberFormat($page['view_count'], '0') . '</dd>
				</dl>
			</div>
		';
}
$__output .= '
	
		';
$__compilerVar8 = '';
$__compilerVar8 .= XenForo_Template_Helper_Core::link('canonical:pages', $page, array());
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
					<a href="https://twitter.com/share" class="twitter-share-button"
						data-count="horizontal"
						data-lang="' . XenForo_Template_Helper_Core::callHelper('twitterLang', array(
'0' => $visitorLanguage['language_code']
)) . '"
						data-url="' . htmlspecialchars($__compilerVar8, ENT_QUOTES, 'UTF-8') . '"
						' . (($thread['title']) ? ('data-text="' . XenForo_Template_Helper_Core::callHelper('threadPrefix', array(
'0' => $thread,
'1' => 'escaped'
)) . htmlspecialchars($thread['title'], ENT_QUOTES, 'UTF-8') . '"') : ('')) . '
						' . (($xenOptions['tweet']['via']) ? ('data-via="' . htmlspecialchars($xenOptions['tweet']['via'], ENT_QUOTES, 'UTF-8') . '"') : ('')) . '
						' . (($xenOptions['tweet']['related']) ? ('data-related="' . htmlspecialchars($xenOptions['tweet']['related'], ENT_QUOTES, 'UTF-8') . '"') : ('')) . '>' . 'Tweet' . '</a>
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
if ($xenOptions['facebookLike'])
{
$__compilerVar11 .= '
				<div class="facebookLike shareControl">
					';
$__extraData['facebookSdk'] = '';
$__extraData['facebookSdk'] .= '1';
$__compilerVar11 .= '
					<fb:like href="' . htmlspecialchars($__compilerVar8, ENT_QUOTES, 'UTF-8') . '" show_faces="true" width="400" action="' . htmlspecialchars($xenOptions['facebookLikeAction'], ENT_QUOTES, 'UTF-8') . '" font="trebuchet ms" colorscheme="' . XenForo_Template_Helper_Core::styleProperty('fbColorScheme') . '"></fb:like>
				</div>
			';
}
$__compilerVar11 .= '
			';
$__compilerVar10 .= $this->callTemplateHook('share_page_options', $__compilerVar11, array());
unset($__compilerVar11);
$__compilerVar10 .= '
		';
if (trim($__compilerVar10) !== '')
{
$__compilerVar9 .= '
	';
$this->addRequiredExternal('css', 'share_page');
$__compilerVar9 .= '

	<div class="sharePage">
		<h3 class="textHeading larger">' . 'Share This Page' . '</h3>
		' . $__compilerVar10 . '
	</div>
';
}
unset($__compilerVar10);
$__output .= $__compilerVar9;
unset($__compilerVar8, $__compilerVar9);
$__output .= '
	
	</div>
	
</div>';
