<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$this->addRequiredExternal('css', 'sonnb_xengallery_bbcode_album');
$__output .= '

<div class="bbcodeAlbum">
	<div class="clearfix">
		<a class="thumbnail" href="' . XenForo_Template_Helper_Core::link('gallery/albums', $album, array()) . '" title="' . htmlspecialchars($album['title'], ENT_QUOTES, 'UTF-8') . '">
			<img src="' . (($thumbnail) ? (htmlspecialchars($thumbnail, ENT_QUOTES, 'UTF-8')) : (XenForo_Template_Helper_Core::styleProperty('sonnbXG_albumEmpty'))) . '" alt="' . htmlspecialchars($album['title'], ENT_QUOTES, 'UTF-8') . '"/>
		</a>
		<div class="detail">
			<div class="title">
				<a href="' . XenForo_Template_Helper_Core::link('gallery/albums', $album, array()) . '" title="' . htmlspecialchars($album['title'], ENT_QUOTES, 'UTF-8') . '">' . 'Album: ' . htmlspecialchars($album['title'], ENT_QUOTES, 'UTF-8') . '' . '</a>
			</div>
			<span class="caption">' . 'by ' . XenForo_Template_Helper_Core::callHelper('username', array(
'0' => $album
)) . '' . '</span>
			<div class="description muted">' . XenForo_Template_Helper_Core::callHelper('wordTrim', array(
'0' => $album['description'],
'1' => '200'
)) . '</div>
		</div>
	</div>
</div>';
