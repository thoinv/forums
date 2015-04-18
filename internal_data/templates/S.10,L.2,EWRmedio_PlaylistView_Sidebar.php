<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__extraData['sidebar'] = '';
$__extraData['sidebar'] .= '

	<div class="section" id="Details">
		<div class="secondaryContent">
			<h3>
				' . 'Playlist Details' . '
				<div style="float: right;">
					';
if ($perms['mod'] || $playlist['user_id'] == $visitor['user_id'])
{
$__extraData['sidebar'] .= '
						(<a href="' . XenForo_Template_Helper_Core::link('media/playlist/edit', $playlist, array()) . '">' . 'Sửa' . '</a>)
					';
}
$__extraData['sidebar'] .= '
				</div>
			</h3>

			<div style="text-align: center;">
				' . 'Đăng bởi' . ' <a href="' . XenForo_Template_Helper_Core::link('media/user', $playlist, array()) . '">' . htmlspecialchars($playlist['username'], ENT_QUOTES, 'UTF-8') . '</a><br />
				<br />
				' . $playlist['HTML'] . '<br />
				<br />
				<input type="text" name="media_url" value="' . XenForo_Template_Helper_Core::link('full:media/playlist', $playlist, array()) . '" readonly="readonly" class="textCtrl" style="width: 200px;" onclick="this.focus(); this.select()" /><br />
			</div>
		</div>
	</div>

	';
if ($perms['mod'] || $playlist['user_id'] == $visitor['user_id'])
{
$__extraData['sidebar'] .= '
	<div class="section" id="Playlists">
		<div class="secondaryContent">
			<h3>' . 'Add To Playlist' . '</h3>

			<form action="' . XenForo_Template_Helper_Core::link('media/playlist/addto', $playlist, array()) . '" method="post" style="text-align: center;">
				<input type="text" name="media_url"  placeholder="' . 'Media URL' . '..."class="textCtrl" style="width: 200px;" /><br />
				<br />
				<input type="submit" value="' . 'Add To Playlist' . '" name="submit" accesskey="s" class="button primary" />

				<input type="hidden" name="playlist_id" value="' . htmlspecialchars($playlist['playlist_id'], ENT_QUOTES, 'UTF-8') . '" />
				<input type="hidden" name="_xfToken" value="' . htmlspecialchars($visitor['csrf_token_page'], ENT_QUOTES, 'UTF-8') . '" />
			</form>
		</div>
	</div>
	';
}
$__extraData['sidebar'] .= '

	';
$__compilerVar5 = '';
$__compilerVar5 .= XenForo_Template_Helper_Core::link('canonical:media_playlist', $playlist, array());
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
						<a href="https://twitter.com/share" class="twitter-share-button" data-count="horizontal"
							data-lang="' . XenForo_Template_Helper_Core::callHelper('twitterLang', array(
'0' => $visitorLanguage['language_code']
)) . '"
							data-url="' . htmlspecialchars($__compilerVar5, ENT_QUOTES, 'UTF-8') . '"
							' . (($xenOptions['tweet']['via']) ? ('data-via="' . htmlspecialchars($xenOptions['tweet']['via'], ENT_QUOTES, 'UTF-8') . '"') : ('')) . '
							' . (($xenOptions['tweet']['related']) ? ('data-related="' . htmlspecialchars($xenOptions['tweet']['related'], ENT_QUOTES, 'UTF-8') . '"') : ('')) . '>' . 'Tweet' . '</a>
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
						<div class="fb-like-box" data-href="https://www.facebook.com/pages/H%E1%BB%99i-nh%E1%BB%AFng-ng%C6%B0%E1%BB%9Di-kh%C3%B4ng-th%E1%BB%83-s%E1%BB%91ng-thi%E1%BA%BFu-Mobile/1437174653239569?ref=bookmarks" data-width="235" data-colorscheme="light" data-show-faces="true" data-header="false" data-stream="false" data-show-border="false"></div>
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
$__compilerVar7 .= $this->callTemplateHook('sidebar_share_page_options', $__compilerVar8, array());
unset($__compilerVar8);
$__compilerVar7 .= '		
			';
if (trim($__compilerVar7) !== '')
{
$__compilerVar6 .= '	
	';
$this->addRequiredExternal('css', 'sidebar_share_page');
$__compilerVar6 .= '
	<div class="section infoBlock sharePage">
		<div class="secondaryContent">
			<h3>' . 'Chia sẻ trang này' . '</h3>
			' . $__compilerVar7 . '
		</div>
	</div>
';
}
unset($__compilerVar7);
$__extraData['sidebar'] .= $__compilerVar6;
unset($__compilerVar5, $__compilerVar6);
$__extraData['sidebar'] .= '

';
