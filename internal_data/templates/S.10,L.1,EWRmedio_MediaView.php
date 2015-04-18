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
				(<a href="' . XenForo_Template_Helper_Core::link('media/like', $media, array()) . '" class="LikeLink item control ' . (($media['like_date']) ? ('unlike') : ('like')) . '" data-container="#likes-media-' . htmlspecialchars($media['media_id'], ENT_QUOTES, 'UTF-8') . '"><span></span><span class="LikeLabel">' . (($media['like_date']) ? ('Unlike') : ('Like')) . '</span></a>)
			';
}
$__output .= '
			';
if ($perms['report'] && $media['user_id'] !== $visitor['user_id'])
{
$__output .= '
				(<a href="' . XenForo_Template_Helper_Core::link('media/report', $media, array()) . '" class="OverlayTrigger item">' . 'Report' . '</a>)
			';
}
$__output .= '
			';
if ($perms['mod'] || $media['user_id'] === $visitor['user_id'])
{
$__output .= '
				(<a href="' . XenForo_Template_Helper_Core::link('media/edit', $media, array()) . '">' . 'Edit' . '</a>)
			';
}
$__output .= '
		</div>
		' . htmlspecialchars($media['media_title'], ENT_QUOTES, 'UTF-8') . '
	</div>

	<div class="secondaryContent">
		';
$__compilerVar1 = '';
$__compilerVar1 .= '<div style="text-align: center;">
<div id="embed_player">
	';
if ($media['service_movie'])
{
$__compilerVar1 .= '
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
$__compilerVar1 .= '
		' . $media['service_parameters'] . '
	';
}
$__compilerVar1 .= '
</div>
</div>';
$__output .= $__compilerVar1;
unset($__compilerVar1);
$__output .= '
	</div>

	<div id="likes-media-' . htmlspecialchars($media['media_id'], ENT_QUOTES, 'UTF-8') . '">
		';
if ($media['media_likes'])
{
$__output .= '
			';
$__compilerVar2 = '';
$__compilerVar2 .= XenForo_Template_Helper_Core::link('media/likes', $media, array());
$__compilerVar3 = '';
if ($media['likes'])
{
$__compilerVar3 .= '
	';
$this->addRequiredExternal('css', 'likes_summary');
$__compilerVar3 .= '
	<div class="likesSummary secondaryContent">
		<span class="LikeText">
			' . XenForo_Template_Helper_Core::callHelper('likeshtml', array($media['likes'],$__compilerVar2,$media['like_date'],$media['likeUsers'])) . '
		</span>
	</div>
';
}
$__output .= $__compilerVar3;
unset($__compilerVar2, $__compilerVar3);
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
$__output .= '<input type="text" name="username" class="textCtrl" placeholder="' . 'Guest' . '..." />';
}
$__output .= '
			<textarea name="message" class="textCtrl Elastic OptOut" placeholder="' . 'Post Comment' . '..." rows="3" cols="50"></textarea>
			<div style="margin-top: 8px; float: left;" id="CommentStatus"></div>
			<div class="submitUnit">
				<input type="hidden" name="_xfToken" value="' . htmlspecialchars($visitor['csrf_token_page'], ENT_QUOTES, 'UTF-8') . '" />
				<input type="submit" class="button primary" value="' . 'Post' . '" accesskey="s" />
			</div>
		</div>
	</form>
	';
}
$__output .= '

	';
$__compilerVar4 = '';
$this->addRequiredExternal('css', 'message_simple');
$__compilerVar4 .= '
';
$this->addRequiredExternal('js', 'js/8wayrun/EWRmedio_ajax.js');
$__compilerVar4 .= '

<div id="mediaComments">
	';
if ($count > $stop)
{
$__compilerVar4 .= '
	<div class="pageNavLinkGroup primaryContent" style="margin-top: 0px;" id="CommentFeed">
		<div class="linkGroup SelectionCountContainer"></div>
		' . XenForo_Template_Helper_Core::callHelper('pagenavhtml', array('public', htmlspecialchars($stop, ENT_QUOTES, 'UTF-8'), htmlspecialchars($count, ENT_QUOTES, 'UTF-8'), htmlspecialchars($start, ENT_QUOTES, 'UTF-8'), 'media/comments', $media, array(), false, array())) . '
	</div>
	';
}
$__compilerVar4 .= '

	';
if ($comments)
{
$__compilerVar4 .= '
	<ol class="messageSimpleList">
		';
foreach ($comments AS $comment)
{
$__compilerVar4 .= '
			';
$__compilerVar5 = '';
$__compilerVar5 .= '<li id="' . htmlspecialchars($comment['comment_id'], ENT_QUOTES, 'UTF-8') . '" class="primaryContent messageSimple">
	' . XenForo_Template_Helper_Core::callHelper('avatarhtml', array($comment,false,array(
'user' => '$comment',
'size' => 's'
),'')) . '
	
	<div class="messageInfo">
		<div class="messageContent">
			';
if ($comment['userValid'])
{
$__compilerVar5 .= '
				<a href="' . XenForo_Template_Helper_Core::link('members', $comment, array()) . '" class="poster username">' . htmlspecialchars($comment['username'], ENT_QUOTES, 'UTF-8') . '</a>
			';
}
else
{
$__compilerVar5 .= '
				<b>' . htmlspecialchars($comment['username'], ENT_QUOTES, 'UTF-8') . '</b>
			';
}
$__compilerVar5 .= '
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
$__compilerVar5 .= '
					<a href="' . XenForo_Template_Helper_Core::link('media/comment/edit', $comment, array()) . '" class="OverlayTrigger item">' . 'Edit' . '</a>
					<a href="' . XenForo_Template_Helper_Core::link('media/comment/delete', $comment, array()) . '" class="OverlayTrigger item">' . 'Delete' . '</a>
					<a href="' . XenForo_Template_Helper_Core::link('media/comment/ip', $comment, array()) . '" class="OverlayTrigger item">' . 'IP' . '</a>
				';
}
$__compilerVar5 .= '
				';
if ($perms['report'])
{
$__compilerVar5 .= '
					<a href="' . XenForo_Template_Helper_Core::link('media/comment/report', $comment, array()) . '" class="OverlayTrigger item">' . 'Report' . '</a>
				';
}
$__compilerVar5 .= '
			</div>
		</div>
	</div>
</li>';
$__compilerVar4 .= $__compilerVar5;
unset($__compilerVar5);
$__compilerVar4 .= '
		';
}
$__compilerVar4 .= '
	</ol>
	';
}
$__compilerVar4 .= '
</div>';
$__output .= $__compilerVar4;
unset($__compilerVar4);
$__output .= '
</div>
';
}
$__output .= '

';
$__compilerVar6 = '';
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
						<b>' . 'Next' . ' &raquo;</b>
					</div>
				</li>
			';
}
else
{
$__extraData['sidebar'] .= '
				<li><div class="mediaContent">
					<img src="styles/8wayrun/media_blank.png" border="0" style="width: 100%;" alt="" /><br />
					<span class="muted"><b>' . 'Next' . ' &raquo;</b></span>
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
						(<a href="' . XenForo_Template_Helper_Core::link('media/edit', $media, array()) . '">' . 'Edit' . '</a>)
					';
}
$__extraData['sidebar'] .= '
				</div>
			</h3>

			<div style="text-align: center;">
				<span style="font-size: 1.4em"><b>' . '' . XenForo_Template_Helper_Core::date($media['media_date'], '') . ' at ' . XenForo_Template_Helper_Core::time($media['media_date'], '') . '' . '</b></span><br />
				' . 'Posted By' . ' <a href="' . XenForo_Template_Helper_Core::link('media/user', $media, array()) . '">' . htmlspecialchars($media['username'], ENT_QUOTES, 'UTF-8') . '</a><br />
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
				' . 'Comments' . ': ' . htmlspecialchars($media['media_comments'], ENT_QUOTES, 'UTF-8') . ' - ' . 'Likes' . ': ' . htmlspecialchars($media['media_likes'], ENT_QUOTES, 'UTF-8') . ' - ' . 'Views' . ': ' . htmlspecialchars($media['media_views'], ENT_QUOTES, 'UTF-8') . '<br />
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
			<h3>' . 'Share This Page' . '</h3>
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
$__output .= $__compilerVar6;
unset($__compilerVar6);
$__output .= '
';
$__compilerVar13 = '';
$__compilerVar13 .= '<div class="medioCopy copyright muted">
	<a href="http://xenforo.com/community/resources/97/">XenMedio</a>
	&copy; Jason Axelrod from <a href="http://8wayrun.com/">8WAYRUN.COM</a>
</div>';
$__output .= $__compilerVar13;
unset($__compilerVar13);
