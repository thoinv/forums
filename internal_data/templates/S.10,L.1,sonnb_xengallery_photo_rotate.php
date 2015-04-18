<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__extraData['title'] = '';
$__extraData['title'] .= 'Edit photo "' . htmlspecialchars($content['title'], ENT_QUOTES, 'UTF-8') . '" in the album "' . htmlspecialchars($album['title'], ENT_QUOTES, 'UTF-8') . '"';
$__output .= '

';
if ($album['description'])
{
$__output .= '
	';
$__extraData['pageDescription'] = array(
'class' => 'baseHtml'
);
$__extraData['pageDescription']['content'] = '';
$__extraData['pageDescription']['content'] .= $album['description'];
$__output .= '
';
}
$__output .= '

';
$__extraData['navigation'] = array();
$__extraData['navigation'] = XenForo_Template_Helper_Core::appendBreadCrumbs($__extraData['navigation'], $breadCrumbs);
$__output .= '

';
$__extraData['head']['robots'] = '';
$__extraData['head']['robots'] .= '
	<meta name="robots" content="noindex" />
';
$__output .= '

';
$this->addRequiredExternal('css', 'sonnb_xengallery_photo_rotate');
$__output .= '
';
$this->addRequiredExternal('js', 'js/sonnb/XenGallery/jquery.rotate.min.js');
$__output .= '

<form action="' . XenForo_Template_Helper_Core::link('gallery/photos/rotate', $content, array()) . '" method="post"
	class="xenForm formOverlay ' . ((!$content['bdattachmentstore_engine']) ? ('AutoValidator') : ('')) . '" data-redirect="on">
	
	<dl class="ctrlUnit fullWidth rotateControl">
		<dt></dt>
		<dd>
			';
if ($pageIsRtl)
{
$__output .= '
				<a id="rotateRight" class="button primary" href="#"><span>' . 'Rotate Right' . '</span></a>
				<a id="rotateLeft" class="button primary" href="#"><span>' . 'Rotate Left' . '</span></a>
			';
}
else
{
$__output .= '
				<a id="rotateLeft" class="button primary" href="#"><span>' . 'Rotate Left' . '</span></a>
				<a id="rotateRight" class="button primary" href="#"><span>' . 'Rotate Right' . '</span></a>
			';
}
$__output .= '
		</dd>
	</dl>
	
	<dl class="ctrlUnit fullWidth" style="overflow:hidden;text-align:center;">
		<dt></dt>
		<dd>
			<img id="rotateImage" src="' . htmlspecialchars($content['thumbnailUrl'], ENT_QUOTES, 'UTF-8') . '" />
		</dd>
	</dl>
	
	<dl class="ctrlUnit submitUnit">
		<dt></dt>
		<dd>
			<input type="submit" value="' . 'Save' . '" accesskey="s" class="button primary" />
		</dd>
	</dl>
	
	<input id="rotateResult" type="hidden" name="angle" value="0" />
	<input type="hidden" name="_xfToken" value="' . htmlspecialchars($visitor['csrf_token_page'], ENT_QUOTES, 'UTF-8') . '" />
</form>

<script type="text/javascript">
!function($, window, document, _undefined) {	
	$(\'#rotateLeft\').click(function(){
		$angle = $(\'#rotateImage\').getRotateAngle();
		$angle = parseInt($angle) - 90;
		if (isNaN($angle))
		{
			$angle = -90;
		}
		if ($angle%90)
		{
			return false;
		}
		
		$(\'#rotateResult\').val($angle);
		$("#rotateImage").rotate({ animateTo:$angle });
		
		return false;
	});
	$(\'#rotateRight\').click(function(){
		$angle = $(\'#rotateImage\').getRotateAngle();
		$angle = parseInt($angle) + 90;
		if (isNaN($angle))
		{
			$angle = 90;
		}
		if ($angle%90)
		{
			return false;
		}
		
		$(\'#rotateResult\').val($angle);
		$("#rotateImage").rotate({ animateTo:$angle });
		
		return false;
	});
}(jQuery, this, document);
</script>';
