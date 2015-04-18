<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$this->addRequiredExternal('css', 'EWRmedio');
$__output .= '

<div class="medioBBc" ' . (($float) ? ('style="float: ' . htmlspecialchars($float, ENT_QUOTES, 'UTF-8') . ';"') : ('')) . '>
	<div class="bbCodeBlock bbCodeQuote">
		<div class="attribution type">' . htmlspecialchars($media['media_title'], ENT_QUOTES, 'UTF-8') . '</div>
		<blockquote>
			<div class="bbCodeMedio" style="background: url(\'' . XenForo_Template_Helper_Core::callHelper('medio', array(
'0' => $media
)) . '\') no-repeat;">
				<a href="' . XenForo_Template_Helper_Core::link('media/popout', $media, array()) . '" class="OverlayTrigger">
					<img src="styles/8wayrun/EWRmedio_play.png" />
				</a>
			</div>
		</blockquote>
	</div>
</div>';
