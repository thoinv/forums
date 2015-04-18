<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__extraData['sidebar'] = '';
$__extraData['sidebar'] .= '

	';
if ($playlist)
{
$__extraData['sidebar'] .= '
	<div class="section" id="Playlist">

		<div class="secondaryContent mediaSmall">
			<h3>' . 'Playlist Details' . '</h3>

			<div style="font-size: 1.3em; margin-bottom: 10px; text-align: center;">
				<b><a href="' . XenForo_Template_Helper_Core::link('media/playlist', $playlist, array()) . '">' . htmlspecialchars($playlist['playlist_name'], ENT_QUOTES, 'UTF-8') . '</a></b>
			</div>

			<ul>
			';
if ($playlist['prev'])
{
$__extraData['sidebar'] .= '
				<li>
					<div class="mediaContent">
						<div style="position: relative;" title="' . htmlspecialchars($playlist['prev']['media_title'], ENT_QUOTES, 'UTF-8') . '">
							<div class="overlays" style="bottom: 7px; right: 5px;"><b>' . htmlspecialchars($playlist['prev']['media_minutes'], ENT_QUOTES, 'UTF-8') . ':' . htmlspecialchars($playlist['prev']['media_seconds'], ENT_QUOTES, 'UTF-8') . '</b></div>
							<a href="' . XenForo_Template_Helper_Core::link('media', $playlist['prev'], array()) . htmlspecialchars($playlist['playlist_id'], ENT_QUOTES, 'UTF-8') . '"><img src="' . XenForo_Template_Helper_Core::callHelper('medio', array(
'0' => $playlist['prev']
)) . '" border="0" style="width: 100%;" alt="' . htmlspecialchars($playlist['prev']['media_title'], ENT_QUOTES, 'UTF-8') . '" /></a>
						</div>
						<b>&laquo; ' . 'Previous' . '</b>
					</div>
				</li>
			';
}
else
{
$__extraData['sidebar'] .= '
				<li><div class="mediaContent">
					<img src="styles/8wayrun/media_blank.png" border="0" style="width: 100%;" alt="" /><br />
					<span class="muted"><b>&laquo; ' . 'Previous' . '</b></span>
				</div></li>
			';
}
$__extraData['sidebar'] .= '

			';
if ($playlist['next'])
{
$__extraData['sidebar'] .= '
				<li>
					<div class="mediaContent">
						<div style="position: relative;" title="' . htmlspecialchars($playlist['next']['media_title'], ENT_QUOTES, 'UTF-8') . '">
							<div class="overlays" style="bottom: 7px; right: 5px;"><b>' . htmlspecialchars($playlist['next']['media_minutes'], ENT_QUOTES, 'UTF-8') . ':' . htmlspecialchars($playlist['next']['media_seconds'], ENT_QUOTES, 'UTF-8') . '</b></div>
							<a href="' . XenForo_Template_Helper_Core::link('media', $playlist['next'], array()) . htmlspecialchars($playlist['playlist_id'], ENT_QUOTES, 'UTF-8') . '"><img src="' . XenForo_Template_Helper_Core::callHelper('medio', array(
'0' => $playlist['next']
)) . '" border="0" style="width: 100%;" alt="' . htmlspecialchars($playlist['next']['media_title'], ENT_QUOTES, 'UTF-8') . '" /></a>
						</div>
						<b>' . 'Tiếp' . ' &raquo;</b>
					</div>
				</li>
			';
}
else
{
$__extraData['sidebar'] .= '
				<li><div class="mediaContent">
					<img src="styles/8wayrun/media_blank.png" border="0" style="width: 100%;" alt="" /><br />
					<span class="muted"><b>' . 'Tiếp' . ' &raquo;</b></span>
				</div></li>
			';
}
$__extraData['sidebar'] .= '
			</ul>

			';
if ($playlist['next'] && $playlist['next']['service_slug'] == ('youtube'))
{
$__extraData['sidebar'] .= '
				<div style="margin-top: 5px; text-align: center;">
					<label for="ctrl_autoplay">
						<input type="checkbox" name="autoplay" value="1" id="ctrl_autoplay" CHECKED>
						<span style="font-size: 1.1em;">' . 'Autoplay next item in playlist' . '</span>
						<p class="muted">' . 'Only supported by ' . 'YouTube' . '...' . '</p>
					</label>
				</div>

				<script language="javascript">
				  var tag = document.createElement(\'script\');
				  tag.src = "//www.youtube.com/iframe_api";
				  var firstScriptTag = document.getElementsByTagName(\'script\')[0];
				  firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);

				  function onYouTubeIframeAPIReady() {
					new YT.Player(\'ytplayer\', {
					  events: {
					  \'onStateChange\': onPlayerStateChange
					  }
					});
				  }

				  function onPlayerStateChange(event) {
					if (event.data == YT.PlayerState.ENDED && document.getElementById(\'ctrl_autoplay\').checked) {
					  window.location="' . XenForo_Template_Helper_Core::link('media', $playlist['next'], array()) . htmlspecialchars($playlist['playlist_id'], ENT_QUOTES, 'UTF-8') . '";
					}
				  }
				</script>
			';
}
$__extraData['sidebar'] .= '
		</div>
	</div>
	';
}
$__extraData['sidebar'] .= '

	<div class="section mediaDetails" id="Details">
		<div class="secondaryContent">
			<h3>
				' . 'Media Details' . '
				<div style="float: right;">
					';
if ($perms['mod'] || $media['user_id'] === $visitor['user_id'])
{
$__extraData['sidebar'] .= '
						(<a href="' . XenForo_Template_Helper_Core::link('media/edit', $media, array()) . '">' . 'Sửa' . '</a>)
					';
}
$__extraData['sidebar'] .= '
				</div>
			</h3>

			<div style="text-align: center;">
				<span style="font-size: 1.4em"><b>' . '' . XenForo_Template_Helper_Core::date($media['media_date'], '') . ' lúc ' . XenForo_Template_Helper_Core::time($media['media_date'], '') . '' . '</b></span><br />
				' . 'Đăng bởi' . ' <a href="' . XenForo_Template_Helper_Core::link('media/user', $media, array()) . '">' . htmlspecialchars($media['username'], ENT_QUOTES, 'UTF-8') . '</a><br />
				<br />
				' . $media['HTML'] . '<br />
				<br />

				';
$__compilerVar7 = '';
$__compilerVar7 .= '
						';
foreach ($customs AS $custom)
{
$__compilerVar7 .= '
							<dl>
								<dt>' . htmlspecialchars($custom['name'], ENT_QUOTES, 'UTF-8') . ':</dt>
								<dd>' . htmlspecialchars($custom['value'], ENT_QUOTES, 'UTF-8') . '</dd>
							</dl>
						';
}
$__compilerVar7 .= '
						';
if (trim($__compilerVar7) !== '')
{
$__extraData['sidebar'] .= '
					<div class="pairsJustified" style="margin-left: 30px; margin-right: 30px;">
						' . $__compilerVar7 . '
					</div>
					<br />
				';
}
unset($__compilerVar7);
$__extraData['sidebar'] .= '

				';
$__compilerVar8 = '';
$__compilerVar8 .= '
						';
foreach ($keywords AS $keyword)
{
$__compilerVar8 .= '
							<li><a href="' . XenForo_Template_Helper_Core::link('media/keyword', $keyword, array()) . '">' . htmlspecialchars($keyword['keyword_text'], ENT_QUOTES, 'UTF-8') . '</a></li>
						';
}
$__compilerVar8 .= '
						';
if (trim($__compilerVar8) !== '')
{
$__extraData['sidebar'] .= '
					<span style="font-size: 1.4em"><b>' . 'Keywords' . '</b></span><br />
					<ul>
						' . $__compilerVar8 . '
					</ul>
					<br />
				';
}
unset($__compilerVar8);
$__extraData['sidebar'] .= '

				<span style="font-size: 1.4em"><b><a href="' . XenForo_Template_Helper_Core::link('media/category', $media, array()) . '">' . htmlspecialchars($media['category_name'], ENT_QUOTES, 'UTF-8') . '</a></b></span><br />
				' . 'Bình luận' . ': ' . htmlspecialchars($media['media_comments'], ENT_QUOTES, 'UTF-8') . ' - ' . 'Thích' . ': ' . htmlspecialchars($media['media_likes'], ENT_QUOTES, 'UTF-8') . ' - ' . 'Đọc' . ': ' . htmlspecialchars($media['media_views'], ENT_QUOTES, 'UTF-8') . '<br />
				<br />

				<input type="text" name="media_url" value="' . XenForo_Template_Helper_Core::link('full:media', $media, array()) . '" readonly="readonly" class="textCtrl" style="width: 200px;" onclick="this.focus(); this.select()" /><br />
				<input type="text" name="bbcode" value="[medio]' . htmlspecialchars($media['media_id'], ENT_QUOTES, 'UTF-8') . '[/medio]" readonly="readonly" class="textCtrl" style="width: 200px;" onclick="this.focus(); this.select()" />
			</div>
		</div>
	</div>

	';
if ($perms['playlist'])
{
$__extraData['sidebar'] .= '
	<div class="section" id="Playlists">
		<div class="secondaryContent">
			<h3>' . 'Add To Playlist' . '</h3>

			<form action="' . XenForo_Template_Helper_Core::link('media/playlist/addto', false, array()) . '" method="post" style="text-align: center;">
				<select name="playlist_id" id="ctrl_playlist" class="textCtrl autoSize" style="margin-bottom: 10px;">
					<option value="0">(' . 'Create New Playlist' . ')</option>
					';
if ($playlistList)
{
$__extraData['sidebar'] .= '
						';
foreach ($playlistList AS $list)
{
$__extraData['sidebar'] .= '
							<option value="' . htmlspecialchars($list['playlist_id'], ENT_QUOTES, 'UTF-8') . '">' . $list['playlist_name'] . '</option>
						';
}
$__extraData['sidebar'] .= '
					';
}
$__extraData['sidebar'] .= '
				</select>

				<input type="submit" value="' . 'Add To Playlist' . '" name="submit" accesskey="s" class="button primary" />

				<input type="hidden" name="media_id" value="' . htmlspecialchars($media['media_id'], ENT_QUOTES, 'UTF-8') . '" />
				<input type="hidden" name="_xfToken" value="' . htmlspecialchars($visitor['csrf_token_page'], ENT_QUOTES, 'UTF-8') . '" />
			</form>
		</div>
	</div>
	';
}
$__extraData['sidebar'] .= '

	';
$__compilerVar9 = '';
$__compilerVar9 .= XenForo_Template_Helper_Core::link('canonical:media', $media, array());
$__compilerVar10 = '';
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
						<div class="fb-like-box" data-href="https://www.facebook.com/pages/H%E1%BB%99i-nh%E1%BB%AFng-ng%C6%B0%E1%BB%9Di-kh%C3%B4ng-th%E1%BB%83-s%E1%BB%91ng-thi%E1%BA%BFu-Mobile/1437174653239569?ref=bookmarks" data-width="235" data-colorscheme="light" data-show-faces="true" data-header="false" data-stream="false" data-show-border="false"></div>
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
$__extraData['sidebar'] .= $__compilerVar10;
unset($__compilerVar9, $__compilerVar10);
$__extraData['sidebar'] .= '

';
