<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$this->addRequiredExternal('css', 'dark_postrating');
$__output .= '
';
$this->addRequiredExternal('js', 'js/dark/postrating.js?' . $postrating_js_modification);
$__output .= '    

<script type="text/javascript">
var dark_postrating_minimum_opacity = ' . htmlspecialchars($postrating_minimum_opacity, ENT_QUOTES, 'UTF-8') . ';
</script>

<ul class="dark_postrating_inputlist ' . (($postrating_has_rated) ? ('dark_postrating_inputlist_undo') : ('')) . '">
	';
if ($postrating_can_rate)
{
$__output .= '
		';
if ($postrating_has_rated)
{
$__output .= '
			<li><a href="' . XenForo_Template_Helper_Core::link('posts/rate', $post, array(
'rating' => 'del',
'_xfToken' => $visitor['csrf_token_page']
)) . '">' . 'Undo Rating' . '</a></li>
		';
}
else
{
$__output .= '
			';
foreach ($postrating_ratings AS $id => $rating)
{
$__output .= '
				';
if (!$rating['disabled'])
{
$__output .= '
					';
if ($rating['name'])
{
$__output .= '											
						<li><a href="' . XenForo_Template_Helper_Core::link('posts/rate', $post, array(
'rating' => $id,
'_xfToken' => $visitor['csrf_token_page']
)) . '" class="Tooltip" data-offsetY="-13" data-offsetX="-8" title="' . htmlspecialchars($rating['title'], ENT_QUOTES, 'UTF-8') . '">';
if ($rating['sprite_mode'])
{
$__output .= '<img src="styles/default/xenforo/clear.png" alt="' . htmlspecialchars($rating['title'], ENT_QUOTES, 'UTF-8') . '" style="background: url(\'styles/dark/ratings/' . htmlspecialchars($rating['name'], ENT_QUOTES, 'UTF-8') . '\') no-repeat ' . htmlspecialchars($rating['sprite_params']['x'], ENT_QUOTES, 'UTF-8') . 'px ' . htmlspecialchars($rating['sprite_params']['y'], ENT_QUOTES, 'UTF-8') . 'px; width: ' . htmlspecialchars($rating['sprite_params']['w'], ENT_QUOTES, 'UTF-8') . 'px; height: ' . htmlspecialchars($rating['sprite_params']['h'], ENT_QUOTES, 'UTF-8') . 'px;" />';
}
else
{
$__output .= '<img src="styles/dark/ratings/' . htmlspecialchars($rating['name'], ENT_QUOTES, 'UTF-8') . '" alt="' . htmlspecialchars($rating['title'], ENT_QUOTES, 'UTF-8') . '" />';
}
$__output .= '</a></li>
					';
}
else
{
$__output .= '
						<li class=\'dark_postrating_textonly\'><a href="' . XenForo_Template_Helper_Core::link('posts/rate', $post, array(
'rating' => $id,
'_xfToken' => $visitor['csrf_token_page']
)) . '">' . htmlspecialchars($rating['title'], ENT_QUOTES, 'UTF-8') . '</a></li>
					';
}
$__output .= '
				';
}
$__output .= '
			';
}
$__output .= '
		';
}
$__output .= '
	';
}
$__output .= '
</ul>
';
