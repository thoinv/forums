<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$this->addRequiredExternal('css', 'EWRblock_FaceBook');
$__output .= '

<div class="section">
			<!--<div class="fb-like-box" data-href="' . htmlspecialchars($option['profile'], ENT_QUOTES, 'UTF-8') . '" data-width="232" data-height="280" data-show-border="false" data-show-faces="true" data-colorscheme="' . XenForo_Template_Helper_Core::styleProperty('fbColorScheme') . '" data-stream="false" data-header="false" data-footer="false"></div>-->

      <div class="fb-page" data-href="' . htmlspecialchars($option['profile'], ENT_QUOTES, 'UTF-8') . '" data-width="230" data-hide-cover="false" data-show-facepile="true" data-show-posts="false" colorscheme="' . XenForo_Template_Helper_Core::styleProperty('fbColorScheme') . '"></div>
</div>';
