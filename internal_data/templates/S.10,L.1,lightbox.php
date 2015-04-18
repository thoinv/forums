<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$this->addRequiredExternal('css', 'lightbox');
$__output .= '
';
$this->addRequiredExternal('js', 'js/xenforo/lightbox.js');
$__output .= '

<div class="formOverlay" data-overlayClass="lightBox" id="LightBox">

	<div class="userInfo" id="LbUpper">
		<span class="avatar" id="LbAvatar"><img alt="" /></span>
		
		<div class="userText">			
			<div class="userTextUpper">
				<h2 id="LbUsername">' . 'N/A' . '</h2>
				<div class="gadgets">
					<a id="LbNewWindow" target="_blank" title="' . 'Open in new window' . '"><span>&uarr;</span></a>
					<a class="OverlayCloser" title="' . 'Close' . '"><span>X</span></a>
				</div>
			</div>
			
			<div class="userTextLower muted">
				<a id="LbDateTime" class="OverlayCloser">' . 'N/A' . '</a>
				<a id="LbContentLink" class="OverlayCloser">' . 'Show in original location' . '</a>
			</div>
		</div>
	</div>	
	
	<div class="imageContainer">
		<img id="LbImg" class="LbImg" alt="" />
		<a class="imageNav" id="LbPrev"><span class="ctrl"><span>&lt;</span></span></a>
		<a class="imageNav" id="LbNext"><span class="ctrl"><span>&gt;</span></span></a>
		<div class="imageCount"><span id="LbSelectedImage">1</span>/<span id="LbTotalImages">1</span></div>
	</div>
	
	<div class="nav" id="LbLower">
		<div class="thumbsContainer">
			<ul id="LbThumbs" data-thumbheight="65">
				<li id="LbThumbTemplate"><a class="LightboxThumb"><img alt="" /></a></li>
			</ul>
			<div id="LbReveal"></div>
		</div>
	</div>
	
	<!--<a class="close"></a>-->

</div>';
