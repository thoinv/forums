<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$this->addRequiredExternal('css', 'bb_code');
$__output .= '


<div class="bbCodeBlock bbCodeQuote' . (($ignored) ? (' ignored') : ('')) . '"' . (($nameHtml) ? (' data-author="' . htmlspecialchars($nameHtml, ENT_QUOTES, 'UTF-8') . '"') : ('')) . '>
	<aside>
		';
if ($nameHtml)
{
$__output .= '
			<div class="attribution type">' . '' . $nameHtml . ' nói' . ':
				';
if ($source)
{
$__output .= '
					<a href="' . XenForo_Template_Helper_Core::link('goto/' . htmlspecialchars($source['type'], ENT_QUOTES, 'UTF-8'), '', array(
'id' => $source['id']
)) . '#' . htmlspecialchars($source['type'], ENT_QUOTES, 'UTF-8') . '-' . htmlspecialchars($source['id'], ENT_QUOTES, 'UTF-8') . '" class="AttributionLink">&uarr;</a>
				';
}
$__output .= '
			</div>
		';
}
$__output .= '
		<blockquote class="quoteContainer"><div class="quote">' . $content . '</div><div class="quoteExpand">' . 'Click to expand...' . '</div></blockquote>
	</aside>
</div>';
