<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$this->addRequiredExternal('css', 'EWRblock_SharePage');
$__output .= '

';
if ($position == ('top-left') OR $position == ('mid-left') OR $position == ('btm-left') OR $position == ('sidebar'))
{
$__output .= '
	';
$__compilerVar9 = '';
$__compilerVar10 = '';
$__compilerVar10 .= '<!--';
$__compilerVar11 = '';
$__compilerVar11 .= '
				';
$__compilerVar12 = '';
$__compilerVar12 .= '
				';
if ($xenOptions['tweet']['enabled'])
{
$__compilerVar12 .= '
					<div class="tweet shareControl">
						<a href="https://twitter.com/share" class="twitter-share-button" data-count="horizontal"
							data-lang="' . XenForo_Template_Helper_Core::callHelper('twitterLang', array(
'0' => $visitorLanguage['language_code']
)) . '"
							data-url="' . htmlspecialchars($__compilerVar9, ENT_QUOTES, 'UTF-8') . '"
							' . (($xenOptions['tweet']['via']) ? ('data-via="' . htmlspecialchars($xenOptions['tweet']['via'], ENT_QUOTES, 'UTF-8') . '"') : ('')) . '
							' . (($xenOptions['tweet']['related']) ? ('data-related="' . htmlspecialchars($xenOptions['tweet']['related'], ENT_QUOTES, 'UTF-8') . '"') : ('')) . '>' . 'Tweet' . '</a>
					</div>
				';
}
$__compilerVar12 .= '		
				';
if ($xenOptions['facebookLike'])
{
$__compilerVar12 .= '
					<div class="facebookLike shareControl">
						';
$__extraData['facebookSdk'] = '';
$__extraData['facebookSdk'] .= '1';
$__compilerVar12 .= '
						<fb:like href="' . htmlspecialchars($__compilerVar9, ENT_QUOTES, 'UTF-8') . '" layout="button_count" action="' . htmlspecialchars($xenOptions['facebookLikeAction'], ENT_QUOTES, 'UTF-8') . '" font="trebuchet ms" colorscheme="' . XenForo_Template_Helper_Core::styleProperty('fbColorScheme') . '"></fb:like>
					</div>
				';
}
$__compilerVar12 .= '
				';
if ($xenOptions['plusone'])
{
$__compilerVar12 .= '
					<div class="plusone shareControl">
						<div class="g-plusone" data-size="medium" data-count="true" data-href="' . htmlspecialchars($__compilerVar9, ENT_QUOTES, 'UTF-8') . '"></div>
					</div>
				';
}
$__compilerVar12 .= '	
				';
$__compilerVar11 .= $this->callTemplateHook('sidebar_share_page_options', $__compilerVar12, array());
unset($__compilerVar12);
$__compilerVar11 .= '		
			';
if (trim($__compilerVar11) !== '')
{
$__compilerVar10 .= '	
	';
$this->addRequiredExternal('css', 'sidebar_share_page');
$__compilerVar10 .= '
	<div class="section infoBlock sharePage">
		<div class="secondaryContent">
			<h3>' . 'Chia sẻ trang này' . '</h3>
			' . $__compilerVar11 . '
		</div>
	</div>
';
}
unset($__compilerVar11);
$__compilerVar10 .= '-->';
$__output .= $__compilerVar10;
unset($__compilerVar9, $__compilerVar10);
$__output .= '
';
}
else
{
$__output .= '
	<div class="section"><div class="secondaryContent">
		';
$__compilerVar13 = '';
$__compilerVar14 = '';
$__compilerVar15 = '';
$__compilerVar15 .= '
			';
$__compilerVar16 = '';
$__compilerVar16 .= '
			';
if ($xenOptions['tweet']['enabled'])
{
$__compilerVar16 .= '
				<div class="tweet shareControl">
					<a href="https://twitter.com/share" class="twitter-share-button"
						data-count="horizontal"
						data-lang="' . XenForo_Template_Helper_Core::callHelper('twitterLang', array(
'0' => $visitorLanguage['language_code']
)) . '"
						data-url="' . htmlspecialchars($__compilerVar13, ENT_QUOTES, 'UTF-8') . '"
						' . (($thread['title']) ? ('data-text="' . XenForo_Template_Helper_Core::callHelper('threadPrefix', array(
'0' => $thread,
'1' => 'escaped'
)) . htmlspecialchars($thread['title'], ENT_QUOTES, 'UTF-8') . '"') : ('')) . '
						' . (($xenOptions['tweet']['via']) ? ('data-via="' . htmlspecialchars($xenOptions['tweet']['via'], ENT_QUOTES, 'UTF-8') . '"') : ('')) . '
						' . (($xenOptions['tweet']['related']) ? ('data-related="' . htmlspecialchars($xenOptions['tweet']['related'], ENT_QUOTES, 'UTF-8') . '"') : ('')) . '>' . 'Tweet' . '</a>
				</div>
			';
}
$__compilerVar16 .= '
			';
if ($xenOptions['plusone'])
{
$__compilerVar16 .= '
				<div class="plusone shareControl">
					<div class="g-plusone" data-size="medium" data-count="true" data-href="' . htmlspecialchars($__compilerVar13, ENT_QUOTES, 'UTF-8') . '"></div>
				</div>
			';
}
$__compilerVar16 .= '
			';
if ($xenOptions['facebookLike'])
{
$__compilerVar16 .= '
				<div class="facebookLike shareControl">
					';
$__extraData['facebookSdk'] = '';
$__extraData['facebookSdk'] .= '1';
$__compilerVar16 .= '
					<fb:like href="' . htmlspecialchars($__compilerVar13, ENT_QUOTES, 'UTF-8') . '" show_faces="true" width="400" action="' . htmlspecialchars($xenOptions['facebookLikeAction'], ENT_QUOTES, 'UTF-8') . '" font="trebuchet ms" colorscheme="' . XenForo_Template_Helper_Core::styleProperty('fbColorScheme') . '"></fb:like>
				</div>
			';
}
$__compilerVar16 .= '
			';
$__compilerVar15 .= $this->callTemplateHook('share_page_options', $__compilerVar16, array());
unset($__compilerVar16);
$__compilerVar15 .= '
		';
if (trim($__compilerVar15) !== '')
{
$__compilerVar14 .= '
	';
$this->addRequiredExternal('css', 'share_page');
$__compilerVar14 .= '

	<div class="sharePage">
		<h3 class="textHeading larger">' . 'Chia sẻ trang này' . '</h3>
		' . $__compilerVar15 . '
	</div>
';
}
unset($__compilerVar15);
$__output .= $__compilerVar14;
unset($__compilerVar13, $__compilerVar14);
$__output .= '
	</div></div>
';
}
