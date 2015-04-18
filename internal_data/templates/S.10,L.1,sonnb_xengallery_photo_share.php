<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
if (!$include)
{
$__output .= '
	';
$__extraData['title'] = '';
$__extraData['title'] .= 'Share this photo with your friends.';
$__output .= '
	';
$__extraData['h1'] = '';
$__extraData['h1'] .= 'Share this photo with your friends.';
$__output .= '
	';
$__extraData['pageDescription'] = array();
$__extraData['pageDescription']['content'] = '';
if ($content['description'])
{
$__extraData['pageDescription']['content'] .= htmlspecialchars($content['description'], ENT_QUOTES, 'UTF-8');
}
else
{
$__extraData['pageDescription']['content'] .= htmlspecialchars($album['description'], ENT_QUOTES, 'UTF-8');
}
$__output .= '

	';
$__extraData['navigation'] = array();
$__extraData['navigation'] = XenForo_Template_Helper_Core::appendBreadCrumbs($__extraData['navigation'], $breadCrumbs);
$__output .= '
';
}
$__output .= '

';
$this->addRequiredExternal('css', 'sonnb_xengallery_photo_share');
$__output .= '
<div class="' . (($class) ? (htmlspecialchars($class, ENT_QUOTES, 'UTF-8')) : ('shareContainer')) . ' section">
	<div class="shareContent">
		<ul class="shareList">
			<li class="share-options">
				<div class="share-options-header">
					<span class="caret"></span>
					' . 'Share this via' . '...
				</div>
				<div class="share-options-inner">
					<ul class="share-services">
						<li class="share-service">
							<a class="share-action google" title="' . 'Share on ' . 'Google+' . '' . '" href="' . htmlspecialchars($requestPaths['requestUri'], ENT_QUOTES, 'UTF-8') . '#" data-url="' . XenForo_Template_Helper_Core::link('full:gallery/photos', $content, array()) . '" data-thumbnail="' . XenForo_Template_Helper_Core::callHelper('fullurl', array(
'0' => $content['contentUrl'],
'1' => '1'
)) . '">
								<span class="share-icon google"></span>
								<span class="service-name">Google+</span>
							</a>
						</li>
						<li class="share-service">
							<a class="share-action facebook" title="' . 'Share on ' . 'Facebook' . '' . '" href="' . htmlspecialchars($requestPaths['requestUri'], ENT_QUOTES, 'UTF-8') . '#" data-url="' . XenForo_Template_Helper_Core::link('full:gallery/photos', $content, array()) . '" data-thumbnail="' . XenForo_Template_Helper_Core::callHelper('fullurl', array(
'0' => $content['contentUrl'],
'1' => '1'
)) . '">
								<span class="share-icon facebook"></span>
								<span class="service-name">Facebook</span>
							</a>
						</li>
						<li class="share-service">
							<a class="share-action twitter" title="' . 'Share on ' . 'Twitter' . '' . '" href="' . htmlspecialchars($requestPaths['requestUri'], ENT_QUOTES, 'UTF-8') . '#" data-url="' . XenForo_Template_Helper_Core::link('full:gallery/photos', $content, array()) . '" data-thumbnail="' . XenForo_Template_Helper_Core::callHelper('fullurl', array(
'0' => $content['contentUrl'],
'1' => '1'
)) . '">
								<span class="share-icon twitter"></span>
								<span class="service-name">Twitter</span>
							</a>
						</li>
						<li class="share-service">
							<a class="share-action tumblr" title="' . 'Share on ' . 'Tumblr' . '' . '" href="' . htmlspecialchars($requestPaths['requestUri'], ENT_QUOTES, 'UTF-8') . '#" data-url="' . XenForo_Template_Helper_Core::link('full:gallery/photos', $content, array()) . '" data-thumbnail="' . XenForo_Template_Helper_Core::callHelper('fullurl', array(
'0' => $content['contentUrl'],
'1' => '1'
)) . '">
								<span class="share-icon tumblr"></span>
								<span class="service-name">Tumblr</span>
							</a>
						</li>
						<li class="share-service">
							<a class="share-action pinterest" title="' . 'Share on ' . 'Pinterest' . '' . '" href="' . htmlspecialchars($requestPaths['requestUri'], ENT_QUOTES, 'UTF-8') . '#" data-url="' . XenForo_Template_Helper_Core::link('full:gallery/photos', $content, array()) . '" data-thumbnail="' . XenForo_Template_Helper_Core::callHelper('fullurl', array(
'0' => $content['contentUrl'],
'1' => '1'
)) . '">
								<span class="share-icon pinterest"></span>
								<span class="service-name">Pinterest</span>
							</a>
						</li>
					</ul>

				</div>
			</li>
			<li class="share-options share-options-open">
				<div class="share-options-header">
					<span>' . 'Grab the link' . '</span>
				</div>
				<div class="share-options-inner">
					<p class="muted">' . 'Here\'s a link to this photo. Just copy and paste!' . '</p>
					<p>
						<input type="text" class="textCtrl" value="' . XenForo_Template_Helper_Core::link('full:gallery/photos', $content, array()) . '">
					</p>
					<p class="muted">' . 'Here is direct link of this photo' . '</p>
					<p>
						<input type="text" class="textCtrl" value="' . XenForo_Template_Helper_Core::callHelper('fullurl', array(
'0' => $content['contentUrl'],
'1' => '1'
)) . '">
					</p>
				</div>
			</li>
			<li class="share-options">
				<div class="share-options-header">
					<span>' . 'Grab the HTML/BBCode' . '</span>
				</div>
				<div class="share-options-inner">
					<p class="muted">' . 'Copy and paste the code below (' . 'HTML' . ')' . ':</p>
					<p>
						<textarea class="textCtrl html Elastic">' . '<a href="' . XenForo_Template_Helper_Core::link('full:gallery/photos', $content, array()) . '" title="' . htmlspecialchars($content['title'], ENT_QUOTES, 'UTF-8') . ' by ' . htmlspecialchars($content['username'], ENT_QUOTES, 'UTF-8') . ', on ' . htmlspecialchars($xenOptions['boardTitle'], ENT_QUOTES, 'UTF-8') . '"><img src="' . XenForo_Template_Helper_Core::callHelper('fullurl', array(
'0' => $content['contentUrl'],
'1' => '1'
)) . '" alt="' . htmlspecialchars($content['title'], ENT_QUOTES, 'UTF-8') . '" /></a>' . '</textarea>
					</p>
					<p class="muted">' . 'Copy and paste the code below (' . 'BBCode' . ')' . ':</p>
					<p>
						<textarea class="textCtrl bbcode Elastic">' . '[URL=' . XenForo_Template_Helper_Core::link('full:gallery/photos', $content, array()) . '][IMG]' . XenForo_Template_Helper_Core::callHelper('fullurl', array(
'0' => $content['contentUrl'],
'1' => '1'
)) . '[/IMG][/URL]
[URL=' . XenForo_Template_Helper_Core::link('full:gallery/photos', $content, array()) . ']' . htmlspecialchars($content['title'], ENT_QUOTES, 'UTF-8') . '[/URL] by [URL=' . XenForo_Template_Helper_Core::link('full:gallery/authors', $content, array()) . ']' . htmlspecialchars($content['username'], ENT_QUOTES, 'UTF-8') . '[/URL] on ' . htmlspecialchars($xenOptions['boardTitle'], ENT_QUOTES, 'UTF-8') . '' . '</textarea>
					</p>
				</div>
			</li>
		</ul>
		<div class="clearfix"></div>
	</div>
</div>';
