<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__extraData['title'] = '';
$__extraData['title'] .= 'Chọn giao diện';
$__output .= '

';
$__extraData['head']['metaNoindex'] = '';
$__extraData['head']['metaNoindex'] .= '<meta name="robots" content="noindex" />';
$__output .= '

';
$this->addRequiredExternal('css', 'chooser_overlay');
$__output .= '
';
$this->addRequiredExternal('css', 'style_chooser');
$__output .= '

<div class="section styleChooser" data-overlayClass="chooserOverlay">

	';
if ($targetStyle)
{
$__output .= '
		
		<div class="chooserConfirm">
			<h3 class="primaryContent chooserConfirm">
				' . 'Please confirm that you would like to change to the following style' . ':
				<strong>' . htmlspecialchars($targetStyle['title'], ENT_QUOTES, 'UTF-8') . '</strong>
			</h3>
			<div class="secondaryContent">
				<a href="' . XenForo_Template_Helper_Core::link('misc/style', '', array(
'style_id' => $targetStyle['style_id'],
'_xfToken' => $visitor['csrf_token_page'],
'redirect' => $redirect
)) . '" class="button primary">' . 'Use this style' . '</a>
			</div>
		</div>
		
	';
}
else
{
$__output .= '
		<h3 class="subHeading">' . 'Chọn giao diện bạn muốn sử dụng trên diễn đàn' . '</h3>
		
		<div class="secondaryContent"><a href="' . XenForo_Template_Helper_Core::link('misc/style', '', array(
'style_id' => '0',
'_xfToken' => $visitor['csrf_token_page'],
'redirect' => $redirect
)) . '">' . 'Dùng giao diện mặc định' . '</a></div>
	
		<ol class="primaryContent chooserColumns twoColumns overlayScroll">
	
			';
foreach ($styles AS $style)
{
$__output .= '
				';
if ($style['user_selectable'] OR $visitor['is_admin'])
{
$__output .= '
					<li class="' . ((!$style['user_selectable']) ? ('unselectable') : ('')) . '">
						<a href="' . XenForo_Template_Helper_Core::link('misc/style', '', array(
'style_id' => $style['style_id'],
'_xfToken' => $visitor['csrf_token_page'],
'redirect' => $redirect
)) . '">
							<span class="icon style' . htmlspecialchars($style['style_id'], ENT_QUOTES, 'UTF-8') . '"><span></span></span>
							<span class="title">' . htmlspecialchars($style['title'], ENT_QUOTES, 'UTF-8') . '</span>
							<span class="description">' . htmlspecialchars($style['description'], ENT_QUOTES, 'UTF-8') . '</span>
						</a>
					</li>
				';
}
$__output .= '
			';
}
$__output .= '
	
		</ol>
	';
}
$__output .= '

	<div class="sectionFooter overlayOnly"><a class="button primary OverlayCloser">' . 'Hủy bỏ' . '</a></div>
</div>';
