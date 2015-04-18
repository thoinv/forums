<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__extraData['title'] = '';
$__extraData['title'] .= htmlspecialchars($playlist['playlist_name'], ENT_QUOTES, 'UTF-8');
$__output .= '
';
$__extraData['h1'] = '';
$__extraData['h1'] .= htmlspecialchars($playlist['playlist_name'], ENT_QUOTES, 'UTF-8');
$__output .= '

';
$__extraData['navigation'] = array();
$__extraData['navigation'][] = array('href' => XenForo_Template_Helper_Core::link('full:media/user', $playlist, array()), 'value' => htmlspecialchars($playlist['username'], ENT_QUOTES, 'UTF-8'));
$__extraData['navigation'][] = array('href' => XenForo_Template_Helper_Core::link('full:media/user/playlists', $playlist, array()), 'value' => 'Playlists');
$__output .= '

';
$this->addRequiredExternal('css', 'EWRmedio');
$__output .= '

<div class="sectionMain mediaPlayList">
	<div class="subHeading">
		<div style="float: right;">
			';
if ($perms['mod'] || $playlist['user_id'] == $visitor['user_id'])
{
$__output .= '
				(<a href="' . XenForo_Template_Helper_Core::link('media/playlist/edit', $playlist, array()) . '">' . 'Sửa' . '</a>)
			';
}
$__output .= '
		</div>
		' . htmlspecialchars($playlist['playlist_name'], ENT_QUOTES, 'UTF-8') . '
	</div>

	';
if ($mediaList)
{
$__output .= '
		<ul>
		';
foreach ($mediaList AS $subMedia)
{
$__output .= '
			';
$__compilerVar8 = '';
$__compilerVar8 .= '<li>
	<div class="secondaryContent">

		';
if ($viewLast)
{
$__compilerVar8 .= '
			<div class="lastPost">
				';
if (XenForo_Template_Helper_Core::callHelper('isIgnored', array(
'0' => $subMedia['lastCommentInfo']['user_id']
)))
{
$__compilerVar8 .= 'Ignored Member';
}
else
{
$__compilerVar8 .= XenForo_Template_Helper_Core::callHelper('usernamehtml', array($subMedia['lastCommentInfo'],'',false,array()));
}
$__compilerVar8 .= '<br />
				<span class="muted"><a href="' . XenForo_Template_Helper_Core::link('media', $subMedia, array()) . '" class="dateTime">' . XenForo_Template_Helper_Core::callHelper('datetimehtml', array($subMedia['lastCommentInfo']['post_date'],array(
'time' => '$subMedia.lastCommentInfo.post_date',
'title' => 'Go to last message'
))) . '</a></span>
			</div>
		';
}
$__compilerVar8 .= '

		<div class="views">
			<b>' . htmlspecialchars($subMedia['media_views'], ENT_QUOTES, 'UTF-8') . '</b><br />
			' . 'Đọc' . '
		</div>

		';
if ($subscribeOptions)
{
$__compilerVar8 .= '
			<div class="subscribeOptions">
				<input type="checkbox" name="media_ids[]" value="' . htmlspecialchars($subMedia['media_id'], ENT_QUOTES, 'UTF-8') . '" />
			</div>
		';
}
$__compilerVar8 .= '

		<div class="thumb">
			<div class="overlays" style="bottom: 8px; left: 5px; padding: 0px;">
				<div class="oControl oComms"></div>
				<div class="overlays oNumbs"><b>' . htmlspecialchars($subMedia['media_comments'], ENT_QUOTES, 'UTF-8') . '</b></div>
				<div class="oControl oLikes"></div>
				<div class="overlays oNumbs"><b>' . htmlspecialchars($subMedia['media_likes'], ENT_QUOTES, 'UTF-8') . '</b></div>
			</div>

			';
if ($subMedia['service_media'] == ('gallery'))
{
$__compilerVar8 .= '
				<div class="overlays" style="top: 5px; left: 5px;"><b>' . '' . htmlspecialchars($subMedia['media_duration'], ENT_QUOTES, 'UTF-8') . ' images' . '</b></div>
			';
}
else
{
$__compilerVar8 .= '
				<div class="overlays" style="bottom: 8px; right: 5px;"><b>';
if ($subMedia['media_hours'])
{
$__compilerVar8 .= htmlspecialchars($subMedia['media_hours'], ENT_QUOTES, 'UTF-8') . ':';
}
$__compilerVar8 .= htmlspecialchars($subMedia['media_minutes'], ENT_QUOTES, 'UTF-8') . ':' . htmlspecialchars($subMedia['media_seconds'], ENT_QUOTES, 'UTF-8') . '</b></div>
			';
}
$__compilerVar8 .= '
			<a href="' . XenForo_Template_Helper_Core::link('media', $subMedia, array()) . htmlspecialchars($playlist['playlist_id'], ENT_QUOTES, 'UTF-8') . '"><img src="' . XenForo_Template_Helper_Core::callHelper('medio', array(
'0' => $subMedia
)) . '" border="0" alt="' . htmlspecialchars($subMedia['media_title'], ENT_QUOTES, 'UTF-8') . '" /></a>
		</div>

		<div class="info">
			<a href="' . XenForo_Template_Helper_Core::link('media', $subMedia, array()) . htmlspecialchars($playlist['playlist_id'], ENT_QUOTES, 'UTF-8') . '"><b>' . htmlspecialchars($subMedia['media_title'], ENT_QUOTES, 'UTF-8') . '</b></a><br />
			<div class="muted">' . XenForo_Template_Helper_Core::callHelper('snippet', array(
'0' => $subMedia['media_description'],
'1' => '200'
)) . '</div>
		</div>
	</div>
</li>';
$__output .= $__compilerVar8;
unset($__compilerVar8);
$__output .= '
		';
}
$__output .= '
		</ul>
	';
}
else
{
$__output .= '
		<div style="text-align: center; padding: 50px 0px;">' . 'There has not yet been any media added to this playlist...' . '</div>
	';
}
$__output .= '
</div>

';
$__compilerVar9 = '';
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
$__compilerVar10 = '';
$__compilerVar10 .= XenForo_Template_Helper_Core::link('canonical:media_playlist', $playlist, array());
$__compilerVar11 = '';
$__compilerVar12 = '';
$__compilerVar12 .= '
				';
$__compilerVar13 = '';
$__compilerVar13 .= '
				';
if ($xenOptions['tweet']['enabled'])
{
$__compilerVar13 .= '
					<div class="tweet shareControl">
						<a href="https://twitter.com/share" class="twitter-share-button" data-count="horizontal"
							data-lang="' . XenForo_Template_Helper_Core::callHelper('twitterLang', array(
'0' => $visitorLanguage['language_code']
)) . '"
							data-url="' . htmlspecialchars($__compilerVar10, ENT_QUOTES, 'UTF-8') . '"
							' . (($xenOptions['tweet']['via']) ? ('data-via="' . htmlspecialchars($xenOptions['tweet']['via'], ENT_QUOTES, 'UTF-8') . '"') : ('')) . '
							' . (($xenOptions['tweet']['related']) ? ('data-related="' . htmlspecialchars($xenOptions['tweet']['related'], ENT_QUOTES, 'UTF-8') . '"') : ('')) . '>' . 'Tweet' . '</a>
					</div>
				';
}
$__compilerVar13 .= '		
				';
if ($xenOptions['facebookLike'])
{
$__compilerVar13 .= '
					<div class="facebookLike shareControl">
						';
$__extraData['facebookSdk'] = '';
$__extraData['facebookSdk'] .= '1';
$__compilerVar13 .= '
						<div class="fb-like-box" data-href="https://www.facebook.com/pages/H%E1%BB%99i-nh%E1%BB%AFng-ng%C6%B0%E1%BB%9Di-kh%C3%B4ng-th%E1%BB%83-s%E1%BB%91ng-thi%E1%BA%BFu-Mobile/1437174653239569?ref=bookmarks" data-width="235" data-colorscheme="light" data-show-faces="true" data-header="false" data-stream="false" data-show-border="false"></div>
					</div>
				';
}
$__compilerVar13 .= '
				';
if ($xenOptions['plusone'])
{
$__compilerVar13 .= '
					<div class="plusone shareControl">
						<div class="g-plusone" data-size="medium" data-count="true" data-href="' . htmlspecialchars($__compilerVar10, ENT_QUOTES, 'UTF-8') . '"></div>
					</div>
				';
}
$__compilerVar13 .= '	
				';
$__compilerVar12 .= $this->callTemplateHook('sidebar_share_page_options', $__compilerVar13, array());
unset($__compilerVar13);
$__compilerVar12 .= '		
			';
if (trim($__compilerVar12) !== '')
{
$__compilerVar11 .= '	
	';
$this->addRequiredExternal('css', 'sidebar_share_page');
$__compilerVar11 .= '
	<div class="section infoBlock sharePage">
		<div class="secondaryContent">
			<h3>' . 'Chia sẻ trang này' . '</h3>
			' . $__compilerVar12 . '
		</div>
	</div>
';
}
unset($__compilerVar12);
$__extraData['sidebar'] .= $__compilerVar11;
unset($__compilerVar10, $__compilerVar11);
$__extraData['sidebar'] .= '

';
$__output .= $__compilerVar9;
unset($__compilerVar9);
$__output .= '
';
$__compilerVar14 = '';
$__compilerVar14 .= '<div class="medioCopy copyright muted">
	<a href="http://xenforo.com/community/resources/97/">XenMedio</a>
	&copy; Jason Axelrod from <a href="http://8wayrun.com/">8WAYRUN.COM</a>
</div>';
$__output .= $__compilerVar14;
unset($__compilerVar14);
