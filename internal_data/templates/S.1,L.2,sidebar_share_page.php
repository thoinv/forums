<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__output .= '<!--';
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
						<fb:like href="' . htmlspecialchars($url, ENT_QUOTES, 'UTF-8') . '" layout="button_count" action="' . htmlspecialchars($xenOptions['facebookLikeAction'], ENT_QUOTES, 'UTF-8') . '" font="trebuchet ms" colorscheme="' . XenForo_Template_Helper_Core::styleProperty('fbColorScheme') . '"></fb:like>
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
$__output .= '	
	';
$this->addRequiredExternal('css', 'sidebar_share_page');
$__output .= '
	<div class="section infoBlock sharePage">
		<div class="secondaryContent">
			<h3>' . 'Chia sẻ trang này' . '</h3>
			' . $__compilerVar3 . '
		</div>
	</div>
';
}
unset($__compilerVar3);
$__output .= '-->';
