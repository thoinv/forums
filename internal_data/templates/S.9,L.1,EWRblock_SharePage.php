<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$this->addRequiredExternal('css', 'EWRblock_SharePage');
$__output .= '

';
if ($position == ('top-left') OR $position == ('mid-left') OR $position == ('btm-left') OR $position == ('sidebar'))
{
$__output .= '
	';
$__compilerVar1 = '';
$__compilerVar2 = '';
$__compilerVar3 = '';
$__compilerVar3 .= '
				';
$__compilerVar4 = '';
$__compilerVar4 .= '
				';
if ($xenOptions['tweet']['enabled'])
{
$__compilerVar4 .= '
					<div class="tweet shareControl">
						<a href="https://twitter.com/share" class="twitter-share-button" data-count="horizontal"
							data-lang="' . XenForo_Template_Helper_Core::callHelper('twitterLang', array(
'0' => $visitorLanguage['language_code']
)) . '"
							data-url="' . htmlspecialchars($__compilerVar1, ENT_QUOTES, 'UTF-8') . '"
							' . (($xenOptions['tweet']['via']) ? ('data-via="' . htmlspecialchars($xenOptions['tweet']['via'], ENT_QUOTES, 'UTF-8') . '"') : ('')) . '
							' . (($xenOptions['tweet']['related']) ? ('data-related="' . htmlspecialchars($xenOptions['tweet']['related'], ENT_QUOTES, 'UTF-8') . '"') : ('')) . '>' . 'Tweet' . '</a>
					</div>
				';
}
$__compilerVar4 .= '		
				';
if ($xenOptions['facebookLike'])
{
$__compilerVar4 .= '
					<div class="facebookLike shareControl">
						';
$__extraData['facebookSdk'] = '';
$__extraData['facebookSdk'] .= '1';
$__compilerVar4 .= '
						<div class="fb-like-box" data-href="https://www.facebook.com/pages/H%E1%BB%99i-nh%E1%BB%AFng-ng%C6%B0%E1%BB%9Di-kh%C3%B4ng-th%E1%BB%83-s%E1%BB%91ng-thi%E1%BA%BFu-Mobile/1437174653239569?ref=bookmarks" data-width="235" data-colorscheme="light" data-show-faces="true" data-header="false" data-stream="false" data-show-border="false"></div>
					</div>
				';
}
$__compilerVar4 .= '
				';
if ($xenOptions['plusone'])
{
$__compilerVar4 .= '
					<div class="plusone shareControl">
						<div class="g-plusone" data-size="medium" data-count="true" data-href="' . htmlspecialchars($__compilerVar1, ENT_QUOTES, 'UTF-8') . '"></div>
					</div>
				';
}
$__compilerVar4 .= '	
				';
$__compilerVar3 .= $this->callTemplateHook('sidebar_share_page_options', $__compilerVar4, array());
unset($__compilerVar4);
$__compilerVar3 .= '		
			';
if (trim($__compilerVar3) !== '')
{
$__compilerVar2 .= '	
	';
$this->addRequiredExternal('css', 'sidebar_share_page');
$__compilerVar2 .= '
	<div class="section infoBlock sharePage">
		<div class="secondaryContent">
			<h3>' . 'Share This Page' . '</h3>
			' . $__compilerVar3 . '
		</div>
	</div>
';
}
unset($__compilerVar3);
$__output .= $__compilerVar2;
unset($__compilerVar1, $__compilerVar2);
$__output .= '
';
}
else
{
$__output .= '
	<div class="section"><div class="secondaryContent">
		';
$__compilerVar5 = '';
$__compilerVar6 = '';
$__compilerVar7 = '';
$__compilerVar7 .= '
			';
$__compilerVar8 = '';
$__compilerVar8 .= '
			';
if ($xenOptions['tweet']['enabled'])
{
$__compilerVar8 .= '
				<div class="tweet shareControl">
					<a href="https://twitter.com/share" class="twitter-share-button"
						data-count="horizontal"
						data-lang="' . XenForo_Template_Helper_Core::callHelper('twitterLang', array(
'0' => $visitorLanguage['language_code']
)) . '"
						data-url="' . htmlspecialchars($__compilerVar5, ENT_QUOTES, 'UTF-8') . '"
						' . (($thread['title']) ? ('data-text="' . XenForo_Template_Helper_Core::callHelper('threadPrefix', array(
'0' => $thread,
'1' => 'escaped'
)) . htmlspecialchars($thread['title'], ENT_QUOTES, 'UTF-8') . '"') : ('')) . '
						' . (($xenOptions['tweet']['via']) ? ('data-via="' . htmlspecialchars($xenOptions['tweet']['via'], ENT_QUOTES, 'UTF-8') . '"') : ('')) . '
						' . (($xenOptions['tweet']['related']) ? ('data-related="' . htmlspecialchars($xenOptions['tweet']['related'], ENT_QUOTES, 'UTF-8') . '"') : ('')) . '>' . 'Tweet' . '</a>
				</div>
			';
}
$__compilerVar8 .= '
			';
if ($xenOptions['plusone'])
{
$__compilerVar8 .= '
				<div class="plusone shareControl">
					<div class="g-plusone" data-size="medium" data-count="true" data-href="' . htmlspecialchars($__compilerVar5, ENT_QUOTES, 'UTF-8') . '"></div>
				</div>
			';
}
$__compilerVar8 .= '
			';
if ($xenOptions['facebookLike'])
{
$__compilerVar8 .= '
				<div class="facebookLike shareControl">
					';
$__extraData['facebookSdk'] = '';
$__extraData['facebookSdk'] .= '1';
$__compilerVar8 .= '
					<fb:like href="' . htmlspecialchars($__compilerVar5, ENT_QUOTES, 'UTF-8') . '" show_faces="true" width="400" action="' . htmlspecialchars($xenOptions['facebookLikeAction'], ENT_QUOTES, 'UTF-8') . '" font="trebuchet ms" colorscheme="' . XenForo_Template_Helper_Core::styleProperty('fbColorScheme') . '"></fb:like>
				</div>
			';
}
$__compilerVar8 .= '
			';
$__compilerVar7 .= $this->callTemplateHook('share_page_options', $__compilerVar8, array());
unset($__compilerVar8);
$__compilerVar7 .= '
		';
if (trim($__compilerVar7) !== '')
{
$__compilerVar6 .= '
	';
$this->addRequiredExternal('css', 'share_page');
$__compilerVar6 .= '

	<div class="sharePage">
		<h3 class="textHeading larger">' . 'Share This Page' . '</h3>
		' . $__compilerVar7 . '
	</div>
';
}
unset($__compilerVar7);
$__output .= $__compilerVar6;
unset($__compilerVar5, $__compilerVar6);
$__output .= '
	</div></div>
';
}
