<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
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
							data-url="' . htmlspecialchars($url, ENT_QUOTES, 'UTF-8') . '"
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
						<div class="g-plusone" data-size="medium" data-count="true" data-href="' . htmlspecialchars($url, ENT_QUOTES, 'UTF-8') . '"></div>
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
$__compilerVar1 .= $__compilerVar2;
unset($__compilerVar2);
if (trim($__compilerVar1) !== '')
{
$__output .= '
	';
$this->addRequiredExternal('css', 'wf_default');
$__output .= '

	<div class="widget ' . htmlspecialchars($widget['class'], ENT_QUOTES, 'UTF-8') . '" id="widget-' . htmlspecialchars($widget['widget_id'], ENT_QUOTES, 'UTF-8') . '">
		' . $__compilerVar1 . '
	</div>
';
}
unset($__compilerVar1);
