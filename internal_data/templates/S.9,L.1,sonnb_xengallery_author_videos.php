<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__extraData['title'] = '';
$__extraData['title'] .= '' . htmlspecialchars($user['username'], ENT_QUOTES, 'UTF-8') . '\'s videos' . ' ' . XenForo_Template_Helper_Core::callHelper('pagenumber', array(
'0' => $page
));
$__output .= '
';
$__extraData['h1'] = '';
$__extraData['h1'] .= '' . htmlspecialchars($user['username'], ENT_QUOTES, 'UTF-8') . '\'s videos';
$__output .= '
';
$__extraData['pageDescription'] = array();
$__extraData['pageDescription']['content'] = '';
$__extraData['pageDescription']['content'] .= 'All videos that ' . htmlspecialchars($user['username'], ENT_QUOTES, 'UTF-8') . ' has uploaded to gallery at ' . htmlspecialchars($xenOptions['boardTitle'], ENT_QUOTES, 'UTF-8') . '';
$__output .= '

';
$__extraData['head']['canonical'] = '';
$__extraData['head']['canonical'] .= '
	<link rel="canonical" href="' . XenForo_Template_Helper_Core::link('canonical:gallery/authors/videos', $user, array(
'page' => $page
)) . '" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no" />
	<meta name="apple-mobile-web-app-capable" content="yes" />
';
$__output .= '

';
$__extraData['navigation'] = array();
$__extraData['navigation'] = XenForo_Template_Helper_Core::appendBreadCrumbs($__extraData['navigation'], $breadCrumbs);
$__output .= '

';
$this->addRequiredExternal('js', 'js/sonnb/XenGallery/gallery.mobile.js');
$__output .= '

';
$this->addRequiredExternal('css', 'sonnb_xengallery_album_list');
$__output .= '
';
$this->addRequiredExternal('css', 'sonnb_xengallery_album_list_item');
$__output .= '
';
$this->addRequiredExternal('css', 'sonnb_xengallery_author_view');
$__output .= '

<!--[if IE]>
';
$this->addRequiredExternal('css', 'sonnb_xengallery_author_view_ie');
$__output .= '
<![endif]-->

';
$this->addRequiredExternal('js', 'js/sonnb/XenGallery/jquery.masonry.min.js');
$__output .= '
';
$this->addRequiredExternal('js', 'js/sonnb/XenGallery/jquery.infinitescroll.min.js');
$__output .= '
';
$this->addRequiredExternal('js', 'js/sonnb/XenGallery/modernizr.min.js');
$__output .= '
';
$this->addRequiredExternal('js', 'js/sonnb/XenGallery/gallery.js');
$__output .= '

';
if (XenForo_Template_Helper_Core::styleProperty('sonnbXG_enableOverlay'))
{
$__output .= '
	';
$this->addRequiredExternal('css', 'sonnb_xengallery_photo_view');
$__output .= '
	';
$this->addRequiredExternal('js', 'js/sonnb/XenGallery/gallery.overlay.js');
$__output .= '
';
}
$__output .= '

<div class="userCover">
	';
$__compilerVar1 = '';
if ($canManageCover)
{
$__compilerVar1 .= '
	';
$this->addRequiredExternal('js', 'js/sonnb/XenGallery/gallery.cover.js');
$__compilerVar1 .= '

	<ul class="controls">
		<li title="' . 'Delete Cover' . '" class="button delete" style="' . ((empty($user['sonnb_xengallery_cover'])) ? ('display: none;') : ('')) . '"><span class="icon delete"></span></li>
		<li title="' . 'Upload Cover Image' . '" class="button upload">
			<form action="' . XenForo_Template_Helper_Core::link('gallery/authors/cover-upload', $user, array()) . '" method="post" enctype="multipart/form-data"
				class="AutoInlineUploader formOverlay">
				<input type="file" name="cover" class="textCtrl" onchange="this.blur()" id="ctrl_cover" title="' . 'Supported formats: JPEG, PNG, GIF' . '" />
				<span class="icon upload"></span>
			
				<input type="hidden" name="crop_x" value="" autocomplete="off" />
				<input type="hidden" name="crop_y" value="" autocomplete="off" />
				<input type="hidden" name="width" value="" autocomplete="off" />
				<input type="hidden" name="height" value="" autocomplete="off" />
				<input type="hidden" name="delete" value="" autocomplete="off" />
				<input type="hidden" name="_xfToken" value="' . htmlspecialchars($visitor['csrf_token_page'], ENT_QUOTES, 'UTF-8') . '" autocomplete="off" />
			</form>
		</li>
		<li title="' . 'Change Cover Position' . '" class="button edit"><span class="icon edit"></span></li>
	</ul>
';
}
$__compilerVar1 .= '

<label class="CoverCropControl" style="' . ((empty($user['sonnb_xengallery_cover'])) ? ('display: none;') : ('')) . '"><img class="coverImage" src="' . XenForo_Template_Helper_Core::callHelper('sonnb_xengallery_cover', array(
'0' => $user
)) . '" /></label>
<a class="avatar Av6m">
	<span style="background-image: url(\'' . XenForo_Template_Helper_Core::callHelper('avatar', array(
'0' => $user,
'1' => 'm'
)) . '\')" class="img m"></span>
</a>
<div class="person">
	<h1><span class="character-name-holder">' . htmlspecialchars($user['username'], ENT_QUOTES, 'UTF-8') . '</span></h1>
</div>
<div class="stats">
	<div class="stat statcount">
		<h1>' . htmlspecialchars($user['sonnb_xengallery_album_count'], ENT_QUOTES, 'UTF-8') . '</h1>
		<h2>' . 'Albums' . '</h2>
	</div>
	<div class="stat statcount">
		<h1>' . htmlspecialchars($user['sonnb_xengallery_photo_count'], ENT_QUOTES, 'UTF-8') . '</h1>
		<h2>' . 'Photos' . '</h2>
	</div>
	<div class="stat statcount">
		<h1>' . htmlspecialchars($user['sonnb_xengallery_video_count'], ENT_QUOTES, 'UTF-8') . '</h1>
		<h2>' . 'Videos' . '</h2>
	</div>
</div>';
$__output .= $__compilerVar1;
unset($__compilerVar1);
$__output .= '
	<div class="subnav-holder">
		<ul class="tabs mainTabs">
			<li><a href="' . XenForo_Template_Helper_Core::link('gallery/authors', $user, array()) . '">' . 'Albums' . '</a></li>
			<li><a href="' . XenForo_Template_Helper_Core::link('gallery/authors/photos', $user, array()) . '">' . 'Photos' . '</a></li>
			<li class="active"><a href="' . htmlspecialchars($requestPaths['requestUri'], ENT_QUOTES, 'UTF-8') . '#">' . 'Videos' . '</a></li>
			<li><a href="' . XenForo_Template_Helper_Core::link('gallery/authors/tags', $user, array()) . '">' . 'Tagged Photos' . '</a></li>
			<li class="profileTab"><a href="' . XenForo_Template_Helper_Core::link('members', $user, array()) . '">' . 'Profile Page' . '</a></li>
		</ul>
	</div>
</div>

';
$__compilerVar2 = '';
$__output .= $this->callTemplateHook('ad_author_view_above_photo_list', $__compilerVar2, array());
unset($__compilerVar2);
$__output .= '

<form action="' . XenForo_Template_Helper_Core::link('gallery/inline-mod-content/switch', false, array()) . '" method="post"
	class="InlineModForm"
	data-cookieName="sxgcontents"
	data-overlayId="InlineModOverlayContent"
	data-controls="#InlineModControlsContent"
	data-imodOptions="#ModerationSelectContent">
	<div class="clearfix masonryContainer" ' . ((XenForo_Template_Helper_Core::styleProperty('sonnbXenGalleryDisableAutoScroll')) ? ('data-noAutoScroll="1"') : ('')) . ' data-loading="' . 'Loading Photos' . '..." data-finish="' . 'There are no more photos to be loaded.' . '" data-ajax="' . XenForo_Template_Helper_Core::styleProperty('imagePath') . '/xenforo/widgets/ajaxload.info_B4B4DC_facebook.gif">
		';
if ($videos)
{
$__output .= '
			';
$__compilerVar3 = '';
$__compilerVar3 .= '
			';
foreach ($videos AS $video)
{
$__compilerVar3 .= '
				';
$__compilerVar4 = '';
$this->addRequiredExternal('css', 'sonnb_xengallery_album_list_item');
$__compilerVar4 .= '
';
if (XenForo_Template_Helper_Core::styleProperty('sonnbXenGalleryPhotoHover'))
{
$__compilerVar4 .= '
	';
$this->addRequiredExternal('css', 'sonnb_xengallery_album_list_item_hover');
$__compilerVar4 .= '
';
}
$__compilerVar4 .= '

<div class="itemGallery photo video" id="content_' . htmlspecialchars($video['content_id'], ENT_QUOTES, 'UTF-8') . '">
	';
$imageHeight = '';
if ($video['medium_width'] < XenForo_Template_Helper_Core::styleProperty('sonnb_xengallery_itemwidth'))
{
$imageHeight .= htmlspecialchars($video['medium_height'], ENT_QUOTES, 'UTF-8');
}
else
{
$imageHeight .= ($video['medium_height'] * (XenForo_Template_Helper_Core::styleProperty('sonnb_xengallery_itemwidth') / $video['medium_width']));
}
$__compilerVar4 .= '
	';
$imageHeightReal = '';
if (($imageHeight - 110) < 0)
{
$imageHeightReal .= '110';
}
else
{
$imageHeightReal .= htmlspecialchars($imageHeight, ENT_QUOTES, 'UTF-8');
}
$__compilerVar4 .= '
	
	';
if ($video['canInlineMod'])
{
$__compilerVar4 .= '
		<div class="inlineMod">
			<input type="checkbox" value="' . htmlspecialchars($video['content_id'], ENT_QUOTES, 'UTF-8') . '" class="InlineModCheck" id="inlineModCheck-content-' . htmlspecialchars($video['content_id'], ENT_QUOTES, 'UTF-8') . '" data-target="#content_' . htmlspecialchars($video['content_id'], ENT_QUOTES, 'UTF-8') . '" title="' . 'Select video' . ': \'' . htmlspecialchars($video['title'], ENT_QUOTES, 'UTF-8') . '\'" name="sxgcontents" autocomplete="off" />
		</div>
	';
}
$__compilerVar4 .= '
	<div class="photoDate">
		';
if ($video['content_updated_date'])
{
$__compilerVar4 .= '
			' . XenForo_Template_Helper_Core::callHelper('datetimehtml', array($video['content_updated_date'],array(
'time' => htmlspecialchars($video['content_updated_date'], ENT_QUOTES, 'UTF-8')
))) . '
		';
}
else
{
$__compilerVar4 .= '
			' . XenForo_Template_Helper_Core::callHelper('datetimehtml', array($video['content_date'],array(
'time' => htmlspecialchars($video['content_date'], ENT_QUOTES, 'UTF-8')
))) . '
		';
}
$__compilerVar4 .= '
		<span class="bg">&nbsp;</span>
	</div>
	<div class="img" data-height="' . htmlspecialchars($video['medium_height'], ENT_QUOTES, 'UTF-8') . '" data-width="' . htmlspecialchars($video['medium_width'], ENT_QUOTES, 'UTF-8') . '"> 
		<a class="' . ((XenForo_Template_Helper_Core::styleProperty('sonnbXG_enableOverlay')) ? ('hasOverlay') : ('')) . '" href="' . XenForo_Template_Helper_Core::link('gallery/videos', $video, array()) . '"
			title="' . (($video['title']) ? (htmlspecialchars($video['title'], ENT_QUOTES, 'UTF-8')) : (XenForo_Template_Helper_Core::callHelper('wordTrim', array(
'0' => $video['description'],
'1' => '100'
)))) . '"
			data-cacheOverlay="false" data-overlayOptions="{&quot;fixed&quot;:false}" style="width:220px; height: ' . htmlspecialchars($imageHeightReal, ENT_QUOTES, 'UTF-8') . 'px; max-height:' . htmlspecialchars($imageHeightReal, ENT_QUOTES, 'UTF-8') . 'px;">
			<img class="lazy" alt="' . (($video['title']) ? (htmlspecialchars($video['title'], ENT_QUOTES, 'UTF-8')) : (XenForo_Template_Helper_Core::callHelper('wordTrim', array(
'0' => $video['description'],
'1' => '100'
)))) . '" title="' . (($video['title']) ? (htmlspecialchars($video['title'], ENT_QUOTES, 'UTF-8')) : (XenForo_Template_Helper_Core::callHelper('wordTrim', array(
'0' => $video['description'],
'1' => '100'
)))) . '" data-src="' . htmlspecialchars($video['thumbnailUrl'], ENT_QUOTES, 'UTF-8') . '" />
			<noscript><img alt="' . (($video['title']) ? (htmlspecialchars($video['title'], ENT_QUOTES, 'UTF-8')) : (XenForo_Template_Helper_Core::callHelper('wordTrim', array(
'0' => $video['description'],
'1' => '100'
)))) . '" title="' . (($video['title']) ? (htmlspecialchars($video['title'], ENT_QUOTES, 'UTF-8')) : (XenForo_Template_Helper_Core::callHelper('wordTrim', array(
'0' => $video['description'],
'1' => '100'
)))) . '" src="' . htmlspecialchars($video['thumbnailUrl'], ENT_QUOTES, 'UTF-8') . '" /></noscript>
			<i class="icon video"></i>
		</a>
	</div>
	';
if (!XenForo_Template_Helper_Core::styleProperty('sonnbXenGalleryPhotoHover'))
{
$__compilerVar4 .= '
		<div class="infoAlbum clearfix">
			<div class="titleAlbum">
				<h3 style="text-align: left;">
					<a href="' . XenForo_Template_Helper_Core::link('gallery/videos', $video, array()) . '">' . htmlspecialchars($video['title'], ENT_QUOTES, 'UTF-8') . '</a>
				</h3>
			</div>
			<div class="userInfo">
				<a title="' . htmlspecialchars($video['username'], ENT_QUOTES, 'UTF-8') . '" href="' . ((XenForo_Template_Helper_Core::styleProperty('sonnbXG_showUserPage')) ? (XenForo_Template_Helper_Core::link('gallery/authors', $video, array())) : (XenForo_Template_Helper_Core::link('members', $video, array()))) . '" class="' . ((!XenForo_Template_Helper_Core::styleProperty('sonnbXG_showUserPage')) ? ('username') : ('')) . '">' . htmlspecialchars($video['username'], ENT_QUOTES, 'UTF-8') . '</a>
				
			</div>
			<div class="dateInfo">
				' . XenForo_Template_Helper_Core::callHelper('datetimehtml', array($video['content_updated_date'],array(
'time' => htmlspecialchars($video['content_updated_date'], ENT_QUOTES, 'UTF-8')
))) . '
			</div>
			';
if ($video['isDeleted'])
{
$__compilerVar4 .= '
				<h3 class="deleteNotice">' . 'This photo has been deleted.' . '</h3>
			';
}
$__compilerVar4 .= '
			';
if ($video['isModerated'])
{
$__compilerVar4 .= '
				<h3 class="deleteNotice">' . 'Awaiting Approval' . '</h3>
			';
}
$__compilerVar4 .= '
		</div>
	';
}
$__compilerVar4 .= '
	<ul class="toolAlbum">
		<li class="likeAlbum">
			<a data-container="#likeCount_' . htmlspecialchars($video['content_id'], ENT_QUOTES, 'UTF-8') . '" class="control ' . (($video['canLike']) ? ('like') : ('')) . ' ' . (($video['like_date']) ? ('active') : ('')) . '" title="' . (($video['canLike'] && $video['like_date']) ? ('Unlike this video') : ('Like this video')) . '"
				href="' . (($video['canLike']) ? (XenForo_Template_Helper_Core::link('gallery/videos/like', $video, array())) : ('javascript:void(0);')) . '"><i></i><span id="likeCount_' . htmlspecialchars($video['content_id'], ENT_QUOTES, 'UTF-8') . '">' . htmlspecialchars($video['likes'], ENT_QUOTES, 'UTF-8') . '</span></a>
		</li>
		<li class="commentAlbum">
			<a title="' . 'Leave a comment' . '" class="CommentLink control comment ' . (($video['comment_count']) ? ('hasComment') : ('')) . '" href="' . (($video['canComment']) ? (XenForo_Template_Helper_Core::link('gallery/videos', $video, array()) . '#commentVideo' . htmlspecialchars($video['content_id'], ENT_QUOTES, 'UTF-8')) : ('javascript:void(0);')) . '"><i></i>' . htmlspecialchars($video['comment_count'], ENT_QUOTES, 'UTF-8') . '</a>
		</li>
		<li class="viewAlbum">
			<a><i></i>' . htmlspecialchars($video['view_count'], ENT_QUOTES, 'UTF-8') . '</a>
		</li>
	</ul>
</div>';
$__compilerVar3 .= $__compilerVar4;
unset($__compilerVar4);
$__compilerVar3 .= '
			';
}
$__compilerVar3 .= '
			';
$__output .= $this->callTemplateHook('author_video_list', $__compilerVar3, array());
unset($__compilerVar3);
$__output .= '
			<div id="infscr-loading">
				<img src="' . XenForo_Template_Helper_Core::styleProperty('imagePath') . '/xenforo/widgets/ajaxload.info_FFFFFF_facebook.gif" 
					alt="' . 'Loading Photos' . '......" />
				<div><em>' . 'Loading Photos' . '......</em></div>
			</div>
		';
}
else
{
$__output .= '
			<div class="noData">' . '' . htmlspecialchars($user['username'], ENT_QUOTES, 'UTF-8') . ' has not uploaded any video yet.' . '</div>
		';
}
$__output .= '
	</div>

	';
if ($inlineModOptions)
{
$__output .= '
		';
$__compilerVar5 = '';
$__compilerVar6 = '';
$__compilerVar6 .= 'InlineModControlsContent';
$__compilerVar7 = '';
$__compilerVar7 .= 'ModerationSelectContent';
$__compilerVar8 = '';
$__compilerVar8 .= 'Content Moderation';
$__compilerVar9 = '';
$__compilerVar9 .= '
		';
if ($inlineModOptions['delete'])
{
$__compilerVar9 .= '<option value="delete">' . 'Delete Contents' . '...</option>';
}
$__compilerVar9 .= '
		';
if ($inlineModOptions['undelete'])
{
$__compilerVar9 .= '<option value="undelete">' . 'Undelete Contents' . '</option>';
}
$__compilerVar9 .= '
		';
if ($inlineModOptions['approve'])
{
$__compilerVar9 .= '<option value="approve">' . 'Approve Contents' . '</option>';
}
$__compilerVar9 .= '
		';
if ($inlineModOptions['unapprove'])
{
$__compilerVar9 .= '<option value="unapprove">' . 'Unapprove Contents' . '</option>';
}
$__compilerVar9 .= '
		';
if ($inlineModOptions['move'])
{
$__compilerVar9 .= '<option value="move">' . 'Move Contents' . '...</option>';
}
$__compilerVar9 .= '
		<option value="deselect">' . 'Deselect Contents' . '</option>
	';
$__compilerVar10 = '';
$__compilerVar10 .= 'sonnb_xengallery_select_deselect_all_loaded_contents';
$__compilerVar11 = '';
$__compilerVar11 .= 'Contents';
$__compilerVar12 = '';
$this->addRequiredExternal('css', 'sonnb_xengallery_inline_mod_controls');
$__compilerVar12 .= '
';
$this->addRequiredExternal('js', 'js/sonnb/XenGallery/gallery.inlinemod.js');
$__compilerVar12 .= '

<span id="' . (($__compilerVar6) ? (htmlspecialchars($__compilerVar6, ENT_QUOTES, 'UTF-8')) : ('InlineModControls')) . '" class="InlineModControls">
	<span class="selectionControl secondaryContent">
		<label for="ModerationCheck">
			' . 'Select All' . ' <input type="checkbox" id="ModerationCheck" title="' . htmlspecialchars($__compilerVar10, ENT_QUOTES, 'UTF-8') . '" />
		</label>

		<input type="button" class="button ClickNext" value="&darr;" title="' . 'Move down' . '" />
		<input type="button" class="button ClickPrev" value="&uarr;" title="' . 'Move up' . '" />
		<a class="SelectionCount">' . htmlspecialchars($__compilerVar11, ENT_QUOTES, 'UTF-8') . ': <em class="InlineModCheckedTotal">0</em></a>
	</span>

	<span class="actionControl sectionFooter">
		<span class="commonActions">
			';
if ($inlineModOptions['delete'])
{
$__compilerVar12 .= '<input type="submit" class="button" value="' . 'Delete' . '..." name="delete" />';
}
$__compilerVar12 .= '
			';
if ($inlineModOptions['approve'])
{
$__compilerVar12 .= '<input type="submit" class="button" value="' . 'Approve' . '" name="approve" />';
}
$__compilerVar12 .= '
		</span>

		<span class="otherActions">
			<select name="a" id="' . (($__compilerVar7) ? (htmlspecialchars($__compilerVar7, ENT_QUOTES, 'UTF-8')) : ('ModerationSelect')) . '" class="textCtrl ModerationSelect">
				<option value="">' . 'Other Action' . '...</option>
				<optgroup label="' . 'Moderation Actions' . '">
					' . $__compilerVar9 . '
				</optgroup>
				<option value="closeOverlay">' . 'Close This Overlay' . '</option>
			</select>

			<input type="submit" class="button primary" value="' . 'Go' . '" />
			<input type="reset" class="button OverlayCloser overylayOnly" value="X" title="' . 'Cancel and close these controls' . '" />
		</span>
	</span>
</span>';
$__compilerVar5 .= $__compilerVar12;
unset($__compilerVar6, $__compilerVar7, $__compilerVar8, $__compilerVar9, $__compilerVar10, $__compilerVar11, $__compilerVar12);
$__output .= $__compilerVar5;
unset($__compilerVar5);
$__output .= '
	';
}
$__output .= '
	
	<input type="hidden" name="_xfToken" value="' . htmlspecialchars($visitor['csrf_token_page'], ENT_QUOTES, 'UTF-8') . '" />
</form>
	
<div class="pageNavLinkGroup xengallery">
	' . XenForo_Template_Helper_Core::callHelper('pagenavhtml', array('public', htmlspecialchars($videosPerPage, ENT_QUOTES, 'UTF-8'), htmlspecialchars($totalVideos, ENT_QUOTES, 'UTF-8'), htmlspecialchars($page, ENT_QUOTES, 'UTF-8'), 'gallery/authors/videos', $user, $pageNavParams, false, array())) . '
</div>
';
$__compilerVar13 = '';
$__output .= $this->callTemplateHook('sonnb_cr_information', $__compilerVar13, array());
unset($__compilerVar13);
$__output .= '

';
if ($profileCall)
{
$__output .= '
	<script type="text/javascript">
		!function($, window, document, _undefined) {
			setTimeout(function(){
				new XenForo.XenGalleryContainer($(\'.masonryContainer\'));
			}, 500);
		}(jQuery, this, document);
	</script>
';
}
