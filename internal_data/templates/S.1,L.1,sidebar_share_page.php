<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__output .= '<!--';
$__compilerVar1 = '';
$__compilerVar1 .= '
				';
$__compilerVar2 = '';
$__compilerVar2 .= '
				';
if ($xenOptions['tweet']['enabled'])
{
$__compilerVar2 .= '
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
$__compilerVar2 .= '		
				';
if ($xenOptions['facebookLike'])
{
$__compilerVar2 .= '
					<div class="facebookLike shareControl">
						';
$__extraData['facebookSdk'] = '';
$__extraData['facebookSdk'] .= '1';
$__compilerVar2 .= '
						<fb:like href="' . htmlspecialchars($url, ENT_QUOTES, 'UTF-8') . '" layout="button_count" action="' . htmlspecialchars($xenOptions['facebookLikeAction'], ENT_QUOTES, 'UTF-8') . '" font="trebuchet ms" colorscheme="' . XenForo_Template_Helper_Core::styleProperty('fbColorScheme') . '"></fb:like>
					</div>
				';
}
$__compilerVar2 .= '
				';
if ($xenOptions['plusone'])
{
$__compilerVar2 .= '
					<div class="plusone shareControl">
						<div class="g-plusone" data-size="medium" data-count="true" data-href="' . htmlspecialchars($url, ENT_QUOTES, 'UTF-8') . '"></div>
					</div>
				';
}
$__compilerVar2 .= '	
				';
$__compilerVar1 .= $this->callTemplateHook('sidebar_share_page_options', $__compilerVar2, array());
unset($__compilerVar2);
$__compilerVar1 .= '		
			';
if (trim($__compilerVar1) !== '')
{
$__output .= '	
	';
$this->addRequiredExternal('css', 'sidebar_share_page');
$__output .= '
	<div class="section infoBlock sharePage">
		<div class="secondaryContent">
			<h3>' . 'Share This Page' . '</h3>
			' . $__compilerVar1 . '
		</div>
	</div>
';
}
unset($__compilerVar1);
$__output .= '-->';
