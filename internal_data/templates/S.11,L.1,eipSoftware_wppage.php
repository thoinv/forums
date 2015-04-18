<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__extraData['title'] = '';
$__extraData['title'] .= htmlspecialchars($page['title'], ENT_QUOTES, 'UTF-8') . '
	<div style="font-size:60%;">
		<dl class="pairsInline pageStats">
			<dt>' . 'Posted By' . ':</dt> <dd>' . $htmlValue['wpuser'] . '</dd>
			<dt>' . 'Published' . ':</dt> <dd>' . $htmlValue['wpdate'] . '</dd>
			<dt>' . 'Last Modified' . ':</dt> <dd>' . $htmlValue['wpreviseddate'] . '</dd>
		</dl>
	</div>
';
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
if ($xenOptions['facebookAppId'] OR $xenOptions['facebookAdmins'])
{
$__compilerVar3 .= '
	<meta property="og:site_name" content="' . htmlspecialchars($xenOptions['boardTitle'], ENT_QUOTES, 'UTF-8') . '" />
	';
if ($avatar)
{
$__compilerVar3 .= '<meta property="og:image" content="' . htmlspecialchars($avatar, ENT_QUOTES, 'UTF-8') . '" />';
}
$__compilerVar3 .= '
	<meta property="og:image" content="';
$__compilerVar4 = '';
$__compilerVar4 .= XenForo_Template_Helper_Core::callHelper('fullurl', array(
'0' => XenForo_Template_Helper_Core::styleProperty('ogLogoPath'),
'1' => '1'
));
$__compilerVar3 .= $this->callTemplateCallback('OpenGraphImage_Callback', 'getImage', $__compilerVar4, array());
unset($__compilerVar4);
$__compilerVar3 .= '" />
	<meta property="og:type" content="' . (($ogType) ? (htmlspecialchars($ogType, ENT_QUOTES, 'UTF-8')) : ('article')) . '" />
	<meta property="og:url" content="' . $__compilerVar1 . '" />
	<meta property="og:title" content="' . $__compilerVar2 . '" />
	';
if ($description)
{
$__compilerVar3 .= '<meta property="og:description" content="' . $description . '" />';
}
$__compilerVar3 .= '
	' . $ogExtraHtml . '
	';
if ($xenOptions['facebookAppId'])
{
$__compilerVar3 .= '<meta property="fb:app_id" content="' . htmlspecialchars($xenOptions['facebookAppId'], ENT_QUOTES, 'UTF-8') . '" />';
}
$__compilerVar3 .= '
	';
if ($xenOptions['facebookAdmins'])
{
$__compilerVar3 .= '<meta property="fb:admins" content="' . XenForo_Template_Helper_Core::callHelper('implode', array(
'0' => $xenOptions['facebookAdmins'],
'1' => ','
)) . '" />';
}
$__compilerVar3 .= '
';
}
$__extraData['head']['openGraph'] .= $__compilerVar3;
unset($__compilerVar1, $__compilerVar2, $__compilerVar3);
$__extraData['head']['openGraph'] .= '
';
$__output .= '
';
$this->addRequiredExternal('css', 'pagenode');
$__output .= '
	';
$__compilerVar5 = '';
$__compilerVar5 .= '
			
				';
if ($listSiblingNodes && $siblingNodes)
{
$__compilerVar5 .= '
				
					';
if ($parentNode)
{
$__compilerVar5 .= '<h3 class="parentNode"><a href="' . htmlspecialchars($parentNode['href'], ENT_QUOTES, 'UTF-8') . '"><span class="_depth0 depthPad">' . htmlspecialchars($parentNode['value'], ENT_QUOTES, 'UTF-8') . '</span></a></h3>';
}
$__compilerVar5 .= '
					
					<ol class="siblingNodes">
						';
foreach ($siblingNodes AS $node)
{
$__compilerVar5 .= '
							<li class="' . (($node['node_id'] == $page['node_id']) ? ('currentNode') : ('siblingNode')) . '">
								<a href="' . XenForo_Template_Helper_Core::link(htmlspecialchars($node['routePrefix'], ENT_QUOTES, 'UTF-8'), $node, array()) . '" class="' . (($node['node_id'] == $page['node_id']) ? ('selected') : ('')) . '">
									<span class="_depth1 depthPad">' . htmlspecialchars($node['title'], ENT_QUOTES, 'UTF-8') . '</span>
								</a>
								';
if ($listChildNodes && $childNodes && $node['node_id'] == $page['node_id'])
{
$__compilerVar5 .= '
									<ol class="childNodes">
									';
foreach ($childNodes AS $childNode)
{
$__compilerVar5 .= '
										<li class="childNode"><a href="' . XenForo_Template_Helper_Core::link(htmlspecialchars($childNode['routePrefix'], ENT_QUOTES, 'UTF-8'), $childNode, array()) . '">
											<span class="_depth2 depthPad">' . htmlspecialchars($childNode['title'], ENT_QUOTES, 'UTF-8') . '</span>
										</a></li>
									';
}
$__compilerVar5 .= '
									</ol>
								';
}
$__compilerVar5 .= '
							</li>
						';
}
$__compilerVar5 .= '
					</ol>
					
				';
}
else if ($listChildNodes && $childNodes)
{
$__compilerVar5 .= '
				
					<ol class="childNodes">
						';
foreach ($childNodes AS $childNode)
{
$__compilerVar5 .= '
							<li class="childNode"><a href="' . XenForo_Template_Helper_Core::link(htmlspecialchars($childNode['routePrefix'], ENT_QUOTES, 'UTF-8'), $childNode, array()) . '">
								<span class="_depth0 depthPad">' . htmlspecialchars($childNode['title'], ENT_QUOTES, 'UTF-8') . '</span>
							</a></li>
						';
}
$__compilerVar5 .= '
					</ol>
					
				';
}
$__compilerVar5 .= '
				
			';
if (trim($__compilerVar5) !== '')
{
$__output .= '
		<div id="pageNodeNavigation" class="secondaryContent">
			<div class="blockLinksList">
			' . $__compilerVar5 . '
			</div>
		</div>
	';
}
unset($__compilerVar5);
$__output .= '


<div class="baseHtml">
	';
$__compilerVar6 = '';
$__compilerVar6 .= '
	<article>
		' . $htmlValue['wppost'] . '
	</article>
	';
$__output .= $this->callTemplateHook('pagenode_container_article', $__compilerVar6, array());
unset($__compilerVar6);
$__output .= '
</div>	
<div class="bottomContent">

	';
if ($page['log_visits'])
{
$__output .= '
		<div class="pageCounter">
			<dl class="pairsInline pageStats">
				<dt>' . 'Page Views' . ':</dt> <dd>' . XenForo_Template_Helper_Core::numberFormat($page['view_count'], '0') . '</dd>
			</dl>
		</div>
	';
}
$__output .= '

	';
$__compilerVar7 = '';
$__compilerVar7 .= XenForo_Template_Helper_Core::link('canonical:pages', $page, array());
$__compilerVar8 = '';
$__compilerVar9 = '';
$__compilerVar9 .= '
			';
$__compilerVar10 = '';
$__compilerVar10 .= '
			';
if ($xenOptions['tweet']['enabled'])
{
$__compilerVar10 .= '
				<div class="tweet shareControl">
					<a href="https://twitter.com/share" class="twitter-share-button"
						data-count="horizontal"
						data-lang="' . XenForo_Template_Helper_Core::callHelper('twitterLang', array(
'0' => $visitorLanguage['language_code']
)) . '"
						data-url="' . htmlspecialchars($__compilerVar7, ENT_QUOTES, 'UTF-8') . '"
						' . (($thread['title']) ? ('data-text="' . XenForo_Template_Helper_Core::callHelper('threadPrefix', array(
'0' => $thread,
'1' => 'escaped'
)) . htmlspecialchars($thread['title'], ENT_QUOTES, 'UTF-8') . '"') : ('')) . '
						' . (($xenOptions['tweet']['via']) ? ('data-via="' . htmlspecialchars($xenOptions['tweet']['via'], ENT_QUOTES, 'UTF-8') . '"') : ('')) . '
						' . (($xenOptions['tweet']['related']) ? ('data-related="' . htmlspecialchars($xenOptions['tweet']['related'], ENT_QUOTES, 'UTF-8') . '"') : ('')) . '>' . 'Tweet' . '</a>
				</div>
			';
}
$__compilerVar10 .= '
			';
if ($xenOptions['plusone'])
{
$__compilerVar10 .= '
				<div class="plusone shareControl">
					<div class="g-plusone" data-size="medium" data-count="true" data-href="' . htmlspecialchars($__compilerVar7, ENT_QUOTES, 'UTF-8') . '"></div>
				</div>
			';
}
$__compilerVar10 .= '
			';
if ($xenOptions['facebookLike'])
{
$__compilerVar10 .= '
				<div class="facebookLike shareControl">
					';
$__extraData['facebookSdk'] = '';
$__extraData['facebookSdk'] .= '1';
$__compilerVar10 .= '
					<fb:like href="' . htmlspecialchars($__compilerVar7, ENT_QUOTES, 'UTF-8') . '" show_faces="true" width="400" action="' . htmlspecialchars($xenOptions['facebookLikeAction'], ENT_QUOTES, 'UTF-8') . '" font="trebuchet ms" colorscheme="' . XenForo_Template_Helper_Core::styleProperty('fbColorScheme') . '"></fb:like>
				</div>
			';
}
$__compilerVar10 .= '
			';
$__compilerVar9 .= $this->callTemplateHook('share_page_options', $__compilerVar10, array());
unset($__compilerVar10);
$__compilerVar9 .= '
		';
if (trim($__compilerVar9) !== '')
{
$__compilerVar8 .= '
	';
$this->addRequiredExternal('css', 'share_page');
$__compilerVar8 .= '

	<div class="sharePage">
		<h3 class="textHeading larger">' . 'Share This Page' . '</h3>
		' . $__compilerVar9 . '
	</div>
';
}
unset($__compilerVar9);
$__output .= $__compilerVar8;
unset($__compilerVar7, $__compilerVar8);
$__output .= '
</div>';
