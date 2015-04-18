<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__extraData['title'] = '';
$__extraData['title'] .= 'Streams Cloud';
$__output .= '
';
$__extraData['h1'] = '';
$__extraData['h1'] .= 'Streams Cloud';
$__output .= '
';
$__extraData['pageDescription'] = array();
$__extraData['pageDescription']['content'] = '';
$__extraData['pageDescription']['content'] .= 'The most active streams/keywords are being used at ' . htmlspecialchars($xenOptions['boardTitle'], ENT_QUOTES, 'UTF-8') . '';
$__output .= '

';
$__extraData['head']['canonical'] = '';
$__extraData['head']['canonical'] .= '
	<link rel="canonical" href="' . XenForo_Template_Helper_Core::link('canonical:gallery/streams', false, array()) . '" />	
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
';
$__output .= '

';
$this->addRequiredExternal('css', 'sonnb_xengallery_stream_index');
$__output .= '
';
$this->addRequiredExternal('js', 'js/sonnb/XenGallery/gallery.js');
$__output .= '

<div class="streamCloud sectionMain">
	';
if ($streams)
{
$__output .= '
		<ol class="cloud">
		';
foreach ($streams AS $stream)
{
$__output .= '
			<li class="streamItem">
				<a href="' . XenForo_Template_Helper_Core::link('gallery/streams', $stream, array()) . '" class="size' . htmlspecialchars($stream['streamClass'], ENT_QUOTES, 'UTF-8') . '">' . htmlspecialchars($stream['stream_name'], ENT_QUOTES, 'UTF-8') . '</a>
			</li>
		';
}
$__output .= '
		</ol>
	';
}
else
{
$__output .= '
		<div class="noData">' . 'There is no stream to display.' . '</div>
	';
}
$__output .= '
</div>
<div class="cloudForm">
	<form class="xenForm" method="post" action="' . XenForo_Template_Helper_Core::link('gallery/streams/jump', false, array()) . '">
		<fieldset></fieldset>
		<dl class="ctrlUnit">
			<dt>' . 'Jump to Stream' . ':</dt>
			<dd>
				<input type="text" data-autosubmit="yes" data-acurl="' . XenForo_Template_Helper_Core::link('gallery/streams/find', '', array(
'_xfResponseType' => 'json'
)) . '" class="textCtrl AutoComplete AcSingle" value="" name="stream_name" autocomplete="off">
			</dd>
		</dl>
		<dl class="ctrlUnit submitUnit">
			<dt></dt>
			<dd><input type="submit" class="button primary" value="' . 'Tới' . '"></dd>
		</dl>
		<input type="hidden" value="' . htmlspecialchars($visitor['csrf_token_page'], ENT_QUOTES, 'UTF-8') . '" name="_xfToken">
	</form>
	<div class="description">
		<h3 class="textHeading">' . 'What are streams?' . '</h3>
		';
if ($visitor['user_id'])
{
$__output .= '
			';
if ($limit > 0)
{
$__output .= '
				<p class="muted">' . 'You can give your uploads a "stream", which is like a keyword. Streams help you find things which have something in common. You can assign up to ' . htmlspecialchars($limit, ENT_QUOTES, 'UTF-8') . ' streams to each photo or album.' . '</p>
			';
}
else
{
$__output .= '
				<p class="muted">' . 'You can give your uploads a "stream", which is like a keyword. Streams help you find things which have something in common. You can assign unlimited streams to each photo or album.' . '</p>
			';
}
$__output .= '
		';
}
else
{
$__output .= '
			<p class="muted">' . 'You can give your uploads a "stream", which is like a keyword. Streams help you find things which have something in common.' . '</p>
		';
}
$__output .= '
	</div>
</div>
';
$__compilerVar6 = '';
$__compilerVar6 .= XenForo_Template_Helper_Core::link('canonical:gallery/streams', false, array());
$__compilerVar7 = '';
$__compilerVar8 = '';
$__compilerVar8 .= '
			';
$__compilerVar9 = '';
$__compilerVar9 .= '
			';
if ($xenOptions['tweet']['enabled'])
{
$__compilerVar9 .= '
				<div class="tweet shareControl">
					<a href="https://twitter.com/share" class="twitter-share-button"
						data-count="horizontal"
						data-lang="' . XenForo_Template_Helper_Core::callHelper('twitterLang', array(
'0' => $visitorLanguage['language_code']
)) . '"
						data-url="' . htmlspecialchars($__compilerVar6, ENT_QUOTES, 'UTF-8') . '"
						' . (($thread['title']) ? ('data-text="' . XenForo_Template_Helper_Core::callHelper('threadPrefix', array(
'0' => $thread,
'1' => 'escaped'
)) . htmlspecialchars($thread['title'], ENT_QUOTES, 'UTF-8') . '"') : ('')) . '
						' . (($xenOptions['tweet']['via']) ? ('data-via="' . htmlspecialchars($xenOptions['tweet']['via'], ENT_QUOTES, 'UTF-8') . '"') : ('')) . '
						' . (($xenOptions['tweet']['related']) ? ('data-related="' . htmlspecialchars($xenOptions['tweet']['related'], ENT_QUOTES, 'UTF-8') . '"') : ('')) . '>' . 'Tweet' . '</a>
				</div>
			';
}
$__compilerVar9 .= '
			';
if ($xenOptions['plusone'])
{
$__compilerVar9 .= '
				<div class="plusone shareControl">
					<div class="g-plusone" data-size="medium" data-count="true" data-href="' . htmlspecialchars($__compilerVar6, ENT_QUOTES, 'UTF-8') . '"></div>
				</div>
			';
}
$__compilerVar9 .= '
			';
if ($xenOptions['facebookLike'])
{
$__compilerVar9 .= '
				<div class="facebookLike shareControl">
					';
$__extraData['facebookSdk'] = '';
$__extraData['facebookSdk'] .= '1';
$__compilerVar9 .= '
					<fb:like href="' . htmlspecialchars($__compilerVar6, ENT_QUOTES, 'UTF-8') . '" show_faces="true" width="400" action="' . htmlspecialchars($xenOptions['facebookLikeAction'], ENT_QUOTES, 'UTF-8') . '" font="trebuchet ms" colorscheme="' . XenForo_Template_Helper_Core::styleProperty('fbColorScheme') . '"></fb:like>
				</div>
			';
}
$__compilerVar9 .= '
			';
$__compilerVar8 .= $this->callTemplateHook('share_page_options', $__compilerVar9, array());
unset($__compilerVar9);
$__compilerVar8 .= '
		';
if (trim($__compilerVar8) !== '')
{
$__compilerVar7 .= '
	';
$this->addRequiredExternal('css', 'share_page');
$__compilerVar7 .= '

	<div class="sharePage">
		<h3 class="textHeading larger">' . 'Chia sẻ trang này' . '</h3>
		' . $__compilerVar8 . '
	</div>
';
}
unset($__compilerVar8);
$__output .= $__compilerVar7;
unset($__compilerVar6, $__compilerVar7);
$__output .= '
';
$__compilerVar10 = '';
$__output .= $this->callTemplateHook('sonnb_cr_information', $__compilerVar10, array());
unset($__compilerVar10);
