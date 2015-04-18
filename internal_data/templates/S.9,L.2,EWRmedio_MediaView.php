<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__extraData['title'] = '';
$__extraData['title'] .= htmlspecialchars($media['media_title'], ENT_QUOTES, 'UTF-8');
$__output .= '
';
$__extraData['h1'] = '';
$__extraData['h1'] .= htmlspecialchars($media['media_title'], ENT_QUOTES, 'UTF-8');
$__output .= '

';
$__extraData['head']['media'] = '';
$__extraData['head']['media'] .= '
	<link rel="canonical" href="' . XenForo_Template_Helper_Core::link('canonical:media', $media, array()) . '" />
	<link rel="image_src" href="' . XenForo_Template_Helper_Core::callHelper('medio', array(
'0' => $media
)) . '" />
	<meta name="title" content="' . htmlspecialchars($media['media_title'], ENT_QUOTES, 'UTF-8') . '" />
	<meta name="description" content="' . htmlspecialchars($media['TEXT'], ENT_QUOTES, 'UTF-8') . '" />
	<meta name="keywords" content="' . htmlspecialchars($media['media_keywords'], ENT_QUOTES, 'UTF-8') . '" />

	<meta property="og:url" content="' . XenForo_Template_Helper_Core::link('canonical:media', $media, array()) . '" />
	<meta property="og:image" content="' . XenForo_Template_Helper_Core::callHelper('medio', array(
'0' => $media
)) . '" />
	<meta property="og:title" content="' . htmlspecialchars($media['media_title'], ENT_QUOTES, 'UTF-8') . '" />
	<meta property="og:description" content="' . htmlspecialchars($media['TEXT'], ENT_QUOTES, 'UTF-8') . '" />
	<meta property="og:keywords" content="' . htmlspecialchars($media['media_keywords'], ENT_QUOTES, 'UTF-8') . '" />
';
$__output .= '

';
$__extraData['navigation'] = array();
$__extraData['navigation'] = XenForo_Template_Helper_Core::appendBreadCrumbs($__extraData['navigation'], $breadCrumbs);
$__output .= '

';
$this->addRequiredExternal('css', 'EWRmedio');
$__output .= '


';
if ($media['media_state'] == ('moderated'))
{
$__output .= '<p class="importantMessage">' . 'This media is currently in the moderation queue. Only people who know the link will be able to view it.<br />
This media will not appear in any public spaces until it has been reviewed and approved by a moderator.' . '</p>';
}
$__output .= '

<div class="sectionMain">
	<div class="subHeading">
		<div style="float: right;">
			';
if ($visitor['user_id'])
{
$__output .= '
				(<a href="' . XenForo_Template_Helper_Core::link('media/watch-confirm', $media, array()) . '" class="OverlayTrigger" data-cacheOverlay="false">' . (($media['media_is_watched']) ? ('Unwatch Media') : ('Watch Media')) . '</a>)
			';
}
$__output .= '
			';
if ($perms['like'] && $media['user_id'] !== $visitor['user_id'])
{
$__output .= '
				(<a href="' . XenForo_Template_Helper_Core::link('media/like', $media, array()) . '" class="LikeLink item control ' . (($media['like_date']) ? ('unlike') : ('like')) . '" data-container="#likes-media-' . htmlspecialchars($media['media_id'], ENT_QUOTES, 'UTF-8') . '"><span></span><span class="LikeLabel">' . (($media['like_date']) ? ('Không thích nữa') : ('Thích')) . '</span></a>)
			';
}
$__output .= '
			';
if ($perms['report'] && $media['user_id'] !== $visitor['user_id'])
{
$__output .= '
				(<a href="' . XenForo_Template_Helper_Core::link('media/report', $media, array()) . '" class="OverlayTrigger item">' . 'Báo cáo' . '</a>)
			';
}
$__output .= '
			';
if ($perms['mod'] || $media['user_id'] === $visitor['user_id'])
{
$__output .= '
				(<a href="' . XenForo_Template_Helper_Core::link('media/edit', $media, array()) . '">' . 'Sửa' . '</a>)
			';
}
$__output .= '
		</div>
		' . htmlspecialchars($media['media_title'], ENT_QUOTES, 'UTF-8') . '
	</div>

	<div class="secondaryContent">
		';
$__compilerVar14 = '';
$__compilerVar14 .= '<div style="text-align: center;">
<div id="embed_player">
	';
if ($media['service_movie'])
{
$__compilerVar14 .= '
		<object type="application/x-shockwave-flash" width="' . htmlspecialchars($media['service_width'], ENT_QUOTES, 'UTF-8') . '" height="' . htmlspecialchars($media['service_height'], ENT_QUOTES, 'UTF-8') . '" data="' . htmlspecialchars($media['service_movie'], ENT_QUOTES, 'UTF-8') . '">
			<param name="movie" value="' . htmlspecialchars($media['service_movie'], ENT_QUOTES, 'UTF-8') . '" />
			<param name="allowfullscreen" value="true" />
			<param name="allowscriptaccess" value="true" />
			<param name="wmode" value="transparent" />
			<param name="flashvars" value="' . htmlspecialchars($media['service_flashvars'], ENT_QUOTES, 'UTF-8') . '" />
			' . $media['service_parameters'] . '
		</object>
	';
}
else
{
$__compilerVar14 .= '
		' . $media['service_parameters'] . '
	';
}
$__compilerVar14 .= '
</div>
</div>';
$__output .= $__compilerVar14;
unset($__compilerVar14);
$__output .= '
	</div>

	<div id="likes-media-' . htmlspecialchars($media['media_id'], ENT_QUOTES, 'UTF-8') . '">
		';
if ($media['media_likes'])
{
$__output .= '
			';
$__compilerVar15 = '';
$__compilerVar15 .= XenForo_Template_Helper_Core::link('media/likes', $media, array());
$__compilerVar16 = '';
if ($media['likes'])
{
$__compilerVar16 .= '
	';
$this->addRequiredExternal('css', 'likes_summary');
$__compilerVar16 .= '
	<div class="likesSummary secondaryContent">
		<span class="LikeText">
			' . XenForo_Template_Helper_Core::callHelper('likeshtml', array($media['likes'],$__compilerVar15,$media['like_date'],$media['likeUsers'])) . '
		</span>
	</div>
';
}
$__output .= $__compilerVar16;
unset($__compilerVar15, $__compilerVar16);
$__output .= '
		';
}
$__output .= '
	</div>
</div>

';
if ($perms['comment'] || $comments)
{
$__output .= '
<div class="sectionMain">
	';
if ($perms['comment'])
{
$__output .= '
	<form action="' . XenForo_Template_Helper_Core::link('media/post-comment', $media, array()) . '" method="post" style="margin: 0px;" class="messageSimple primaryContent AutoValidator" id="CommentPoster">
		' . XenForo_Template_Helper_Core::callHelper('avatarhtml', array($visitor,false,array(
'user' => '$visitor',
'size' => 's'
),'')) . '
		<div class="messageInfo">
			';
if (!$visitor['user_id'])
{
$__output .= '<input type="text" name="username" class="textCtrl" placeholder="' . 'Khách' . '..." />';
}
$__output .= '
			<textarea name="message" class="textCtrl Elastic OptOut" placeholder="' . 'Đăng bình luận' . '..." rows="3" cols="50"></textarea>
			<div style="margin-top: 8px; float: left;" id="CommentStatus"></div>
			<div class="submitUnit">
				<input type="hidden" name="_xfToken" value="' . htmlspecialchars($visitor['csrf_token_page'], ENT_QUOTES, 'UTF-8') . '" />
				<input type="submit" class="button primary" value="' . 'Đăng' . '" accesskey="s" />
			</div>
		</div>
	</form>
	';
}
$__output .= '

	';
$__compilerVar17 = '';
$this->addRequiredExternal('css', 'message_simple');
$__compilerVar17 .= '
';
$this->addRequiredExternal('js', 'js/8wayrun/EWRmedio_ajax.js');
$__compilerVar17 .= '

<div id="mediaComments">
	';
if ($count > $stop)
{
$__compilerVar17 .= '
	<div class="pageNavLinkGroup primaryContent" style="margin-top: 0px;" id="CommentFeed">
		<div class="linkGroup SelectionCountContainer"></div>
		' . XenForo_Template_Helper_Core::callHelper('pagenavhtml', array('public', htmlspecialchars($stop, ENT_QUOTES, 'UTF-8'), htmlspecialchars($count, ENT_QUOTES, 'UTF-8'), htmlspecialchars($start, ENT_QUOTES, 'UTF-8'), 'media/comments', $media, array(), false, array())) . '
	</div>
	';
}
$__compilerVar17 .= '

	';
if ($comments)
{
$__compilerVar17 .= '
	<ol class="messageSimpleList">
		';
foreach ($comments AS $comment)
{
$__compilerVar17 .= '
			';
$__compilerVar18 = '';
$__compilerVar18 .= '<li id="' . htmlspecialchars($comment['comment_id'], ENT_QUOTES, 'UTF-8') . '" class="primaryContent messageSimple">
	' . XenForo_Template_Helper_Core::callHelper('avatarhtml', array($comment,false,array(
'user' => '$comment',
'size' => 's'
),'')) . '
	
	<div class="messageInfo">
		<div class="messageContent">
			';
if ($comment['userValid'])
{
$__compilerVar18 .= '
				<a href="' . XenForo_Template_Helper_Core::link('members', $comment, array()) . '" class="poster username">' . htmlspecialchars($comment['username'], ENT_QUOTES, 'UTF-8') . '</a>
			';
}
else
{
$__compilerVar18 .= '
				<b>' . htmlspecialchars($comment['username'], ENT_QUOTES, 'UTF-8') . '</b>
			';
}
$__compilerVar18 .= '
			<article><blockquote class="ugc baseHtml">' . XenForo_Template_Helper_Core::callHelper('bodyText', array(
'0' => $comment['comment_message']
)) . '</blockquote></article>
		</div>

		<div class="messageMeta">
			<div class="privateControls">
				<span class="item muted">' . XenForo_Template_Helper_Core::callHelper('datetimehtml', array($comment['comment_date'],array(
'time' => '$comment.comment_date'
))) . '</span>
				';
if ($perms['mod'])
{
$__compilerVar18 .= '
					<a href="' . XenForo_Template_Helper_Core::link('media/comment/edit', $comment, array()) . '" class="OverlayTrigger item">' . 'Sửa' . '</a>
					<a href="' . XenForo_Template_Helper_Core::link('media/comment/delete', $comment, array()) . '" class="OverlayTrigger item">' . 'Xóa' . '</a>
					<a href="' . XenForo_Template_Helper_Core::link('media/comment/ip', $comment, array()) . '" class="OverlayTrigger item">' . 'IP' . '</a>
				';
}
$__compilerVar18 .= '
				';
if ($perms['report'])
{
$__compilerVar18 .= '
					<a href="' . XenForo_Template_Helper_Core::link('media/comment/report', $comment, array()) . '" class="OverlayTrigger item">' . 'Báo cáo' . '</a>
				';
}
$__compilerVar18 .= '
			</div>
		</div>
	</div>
</li>';
$__compilerVar17 .= $__compilerVar18;
unset($__compilerVar18);
$__compilerVar17 .= '
		';
}
$__compilerVar17 .= '
	</ol>
	';
}
$__compilerVar17 .= '
</div>';
$__output .= $__compilerVar17;
unset($__compilerVar17);
$__output .= '
</div>
';
}
$__output .= '

';
$__compilerVar19 = '';
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
$__compilerVar20 = '';
$__compilerVar20 .= '
						';
foreach ($customs AS $custom)
{
$__compilerVar20 .= '
							<dl>
								<dt>' . htmlspecialchars($custom['name'], ENT_QUOTES, 'UTF-8') . ':</dt>
								<dd>' . htmlspecialchars($custom['value'], ENT_QUOTES, 'UTF-8') . '</dd>
							</dl>
						';
}
$__compilerVar20 .= '
						';
if (trim($__compilerVar20) !== '')
{
$__extraData['sidebar'] .= '
					<div class="pairsJustified" style="margin-left: 30px; margin-right: 30px;">
						' . $__compilerVar20 . '
					</div>
					<br />
				';
}
unset($__compilerVar20);
$__extraData['sidebar'] .= '

				';
$__compilerVar21 = '';
$__compilerVar21 .= '
						';
foreach ($keywords AS $keyword)
{
$__compilerVar21 .= '
							<li><a href="' . XenForo_Template_Helper_Core::link('media/keyword', $keyword, array()) . '">' . htmlspecialchars($keyword['keyword_text'], ENT_QUOTES, 'UTF-8') . '</a></li>
						';
}
$__compilerVar21 .= '
						';
if (trim($__compilerVar21) !== '')
{
$__extraData['sidebar'] .= '
					<span style="font-size: 1.4em"><b>' . 'Keywords' . '</b></span><br />
					<ul>
						' . $__compilerVar21 . '
					</ul>
					<br />
				';
}
unset($__compilerVar21);
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
$__compilerVar22 = '';
$__compilerVar22 .= XenForo_Template_Helper_Core::link('canonical:media', $media, array());
$__compilerVar23 = '';
$__compilerVar24 = '';
$__compilerVar24 .= '
				';
$__compilerVar25 = '';
$__compilerVar25 .= '
				';
if ($xenOptions['tweet']['enabled'])
{
$__compilerVar25 .= '
					<div class="tweet shareControl">
						<a href="https://twitter.com/share" class="twitter-share-button" data-count="horizontal"
							data-lang="' . XenForo_Template_Helper_Core::callHelper('twitterLang', array(
'0' => $visitorLanguage['language_code']
)) . '"
							data-url="' . htmlspecialchars($__compilerVar22, ENT_QUOTES, 'UTF-8') . '"
							' . (($xenOptions['tweet']['via']) ? ('data-via="' . htmlspecialchars($xenOptions['tweet']['via'], ENT_QUOTES, 'UTF-8') . '"') : ('')) . '
							' . (($xenOptions['tweet']['related']) ? ('data-related="' . htmlspecialchars($xenOptions['tweet']['related'], ENT_QUOTES, 'UTF-8') . '"') : ('')) . '>' . 'Tweet' . '</a>
					</div>
				';
}
$__compilerVar25 .= '		
				';
if ($xenOptions['facebookLike'])
{
$__compilerVar25 .= '
					<div class="facebookLike shareControl">
						';
$__extraData['facebookSdk'] = '';
$__extraData['facebookSdk'] .= '1';
$__compilerVar25 .= '
						<div class="fb-like-box" data-href="https://www.facebook.com/pages/H%E1%BB%99i-nh%E1%BB%AFng-ng%C6%B0%E1%BB%9Di-kh%C3%B4ng-th%E1%BB%83-s%E1%BB%91ng-thi%E1%BA%BFu-Mobile/1437174653239569?ref=bookmarks" data-width="235" data-colorscheme="light" data-show-faces="true" data-header="false" data-stream="false" data-show-border="false"></div>
					</div>
				';
}
$__compilerVar25 .= '
				';
if ($xenOptions['plusone'])
{
$__compilerVar25 .= '
					<div class="plusone shareControl">
						<div class="g-plusone" data-size="medium" data-count="true" data-href="' . htmlspecialchars($__compilerVar22, ENT_QUOTES, 'UTF-8') . '"></div>
					</div>
				';
}
$__compilerVar25 .= '	
				';
$__compilerVar24 .= $this->callTemplateHook('sidebar_share_page_options', $__compilerVar25, array());
unset($__compilerVar25);
$__compilerVar24 .= '		
			';
if (trim($__compilerVar24) !== '')
{
$__compilerVar23 .= '	
	';
$this->addRequiredExternal('css', 'sidebar_share_page');
$__compilerVar23 .= '
	<div class="section infoBlock sharePage">
		<div class="secondaryContent">
			<h3>' . 'Chia sẻ trang này' . '</h3>
			' . $__compilerVar24 . '
		</div>
	</div>
';
}
unset($__compilerVar24);
$__extraData['sidebar'] .= $__compilerVar23;
unset($__compilerVar22, $__compilerVar23);
$__extraData['sidebar'] .= '

';
$__output .= $__compilerVar19;
unset($__compilerVar19);
$__output .= '
';
$__compilerVar26 = '';
$__compilerVar26 .= '<div class="medioCopy copyright muted">
	<a href="http://xenforo.com/community/resources/97/">XenMedio</a>
	&copy; Jason Axelrod from <a href="http://8wayrun.com/">8WAYRUN.COM</a>
</div>';
$__output .= $__compilerVar26;
unset($__compilerVar26);
