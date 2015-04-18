<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$this->addRequiredExternal('css', 'EWRmedio');
$__output .= '

<div style="text-align: center">
	<a href="' . XenForo_Template_Helper_Core::link('media', $media, array()) . '"><span style="font-size: large"><b>' . htmlspecialchars($media['media_title'], ENT_QUOTES, 'UTF-8') . '</b></span></a><br>
	(<a href="' . XenForo_Template_Helper_Core::link('media', $media, array()) . '">click here to watch and comment</a>)<br>

	';
$__compilerVar3 = '';
$this->addRequiredExternal('css', 'EWRmedio');
$__compilerVar3 .= '

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
$__output .= $__compilerVar3;
unset($__compilerVar3);
$__output .= '

	' . 'Duration' . ': ' . '' . htmlspecialchars($media['media_minutes'], ENT_QUOTES, 'UTF-8') . ' phút' . ' ' . '' . htmlspecialchars($media['media_seconds'], ENT_QUOTES, 'UTF-8') . ' seconds' . '<br>
	Uploaded on ' . '' . XenForo_Template_Helper_Core::date($media['media_date'], '') . ' lúc ' . XenForo_Template_Helper_Core::time($media['media_date'], '') . '' . ' by <a href="' . XenForo_Template_Helper_Core::link('media/user', $media, array()) . '">' . htmlspecialchars($media['username'], ENT_QUOTES, 'UTF-8') . '</a><br>
	<a href="' . XenForo_Template_Helper_Core::link('media/category', $media, array()) . '">' . htmlspecialchars($media['category_name'], ENT_QUOTES, 'UTF-8') . '</a> - <a href="' . XenForo_Template_Helper_Core::link('media/service', $media, array()) . '">' . htmlspecialchars($media['service_name'], ENT_QUOTES, 'UTF-8') . '</a>

	';
$__compilerVar4 = '';
$this->addRequiredExternal('css', 'bb_code');
$__compilerVar4 .= '


<div class="bbCodeBlock bbCodeQuote' . (($ignored) ? (' ignored') : ('')) . '"' . (($nameHtml) ? (' data-author="' . htmlspecialchars($nameHtml, ENT_QUOTES, 'UTF-8') . '"') : ('')) . '>
	<aside>
		';
if ($nameHtml)
{
$__compilerVar4 .= '
			<div class="attribution type">' . '' . $nameHtml . ' nói' . ':
				';
if ($source)
{
$__compilerVar4 .= '
					<a href="' . XenForo_Template_Helper_Core::link('goto/' . htmlspecialchars($source['type'], ENT_QUOTES, 'UTF-8'), '', array(
'id' => $source['id']
)) . '#' . htmlspecialchars($source['type'], ENT_QUOTES, 'UTF-8') . '-' . htmlspecialchars($source['id'], ENT_QUOTES, 'UTF-8') . '" class="AttributionLink">&uarr;</a>
				';
}
$__compilerVar4 .= '
			</div>
		';
}
$__compilerVar4 .= '
		<blockquote class="quoteContainer"><div class="quote">' . $media['media_description'] . '</div><div class="quoteExpand">' . 'Click to expand...' . '</div></blockquote>
	</aside>
</div>';
$__output .= $__compilerVar4;
unset($__compilerVar4);
$__output .= '

	<b>' . 'Keywords' . '</b>: ' . $media['media_keywords'] . '
</div>';
