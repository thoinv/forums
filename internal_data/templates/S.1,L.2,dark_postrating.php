<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
if ($postrating_has_ratings OR $postrating_can_rate)
{
$__output .= '
<div class="dark_postrating ' . (($postrating_has_ratings) ? ('likesSummary secondaryContent') : ('')) . '">
	<div class="dark_postrating_container">
			';
$__compilerVar4 = '';
$this->addRequiredExternal('css', 'dark_postrating');
$__compilerVar4 .= '
';
$this->addRequiredExternal('js', 'js/dark/postrating.js?' . $postrating_js_modification);
$__compilerVar4 .= '    
';
if ($postrating_hide_post)
{
$__compilerVar4 .= '
	<div class=\'dark_postrating_hide_post\'>
		<div class="placeholderContent">
			' . XenForo_Template_Helper_Core::callHelper('avatarhtml', array($message,(true),array(
'user' => '$message',
'size' => 's',
'img' => 'true'
),'')) . '			
			<div class="messageInfo primaryContent">
				<div>
					' . 'This message by ' . XenForo_Template_Helper_Core::callHelper('username', array(
'0' => $message
)) . ' has been hidden due to negative ratings.' . ' (<a href=\'#\' class=\'dark_postrating_show_post\'>' . 'Show message' . '</a>)					
				</div>
				
			</div>			
		</div>
	</div>
';
}
$__compilerVar4 .= '
<ul class="dark_postrating_outputlist">
';
$__compilerVar5 = '';
$__compilerVar5 .= '
		';
foreach ($postrating_ratings_out AS $id => $rating)
{
$__compilerVar5 .= '
			<li>
				';
if ($rating['name'])
{
if ($rating['sprite_mode'])
{
$__compilerVar5 .= '<img src="styles/default/xenforo/clear.png" alt="' . htmlspecialchars($rating['title'], ENT_QUOTES, 'UTF-8') . '" title="' . htmlspecialchars($rating['title'], ENT_QUOTES, 'UTF-8') . '" style="background: url(\'styles/dark/ratings/' . htmlspecialchars($rating['name'], ENT_QUOTES, 'UTF-8') . '\') no-repeat ' . htmlspecialchars($rating['sprite_params']['x'], ENT_QUOTES, 'UTF-8') . 'px ' . htmlspecialchars($rating['sprite_params']['y'], ENT_QUOTES, 'UTF-8') . 'px; width: ' . htmlspecialchars($rating['sprite_params']['w'], ENT_QUOTES, 'UTF-8') . 'px; height: ' . htmlspecialchars($rating['sprite_params']['h'], ENT_QUOTES, 'UTF-8') . 'px;" />';
}
else
{
$__compilerVar5 .= '<img src="styles/dark/ratings/' . htmlspecialchars($rating['name'], ENT_QUOTES, 'UTF-8') . '" alt="' . htmlspecialchars($rating['title'], ENT_QUOTES, 'UTF-8') . '" title="' . htmlspecialchars($rating['title'], ENT_QUOTES, 'UTF-8') . '" />';
}
}
if (!$postrating_ratings_lots || !$rating['name'])
{
$__compilerVar5 .= ' ' . htmlspecialchars($rating['title'], ENT_QUOTES, 'UTF-8') . ' ';
}
$__compilerVar5 .= ' x <strong>' . XenForo_Template_Helper_Core::numberFormat($rating['count'], '0') . '</strong>
			</li>
		';
}
$__compilerVar5 .= '
	';
if (trim($__compilerVar5) !== '')
{
$__compilerVar4 .= '
	' . $__compilerVar5 . '
	';
if ($postrating_can_list)
{
$__compilerVar4 .= '
		<li> <a href="' . XenForo_Template_Helper_Core::link('posts/ratings', $post, array()) . '" class="dark_postrating_list OverlayTrigger" data-cacheOverlay="false">' . 'List' . '</a></li>
	';
}
$__compilerVar4 .= '
';
}
unset($__compilerVar5);
$__compilerVar4 .= '
	</ul>';
$__output .= $__compilerVar4;
unset($__compilerVar4);
$__output .= '
			';
$__compilerVar6 = '';
$this->addRequiredExternal('css', 'dark_postrating');
$__compilerVar6 .= '
';
$this->addRequiredExternal('js', 'js/dark/postrating.js?' . $postrating_js_modification);
$__compilerVar6 .= '    

<script type="text/javascript">
var dark_postrating_minimum_opacity = ' . htmlspecialchars($postrating_minimum_opacity, ENT_QUOTES, 'UTF-8') . ';
</script>

<ul class="dark_postrating_inputlist ' . (($postrating_has_rated) ? ('dark_postrating_inputlist_undo') : ('')) . '">
	';
if ($postrating_can_rate)
{
$__compilerVar6 .= '
		';
if ($postrating_has_rated)
{
$__compilerVar6 .= '
			<li><a href="' . XenForo_Template_Helper_Core::link('posts/rate', $post, array(
'rating' => 'del',
'_xfToken' => $visitor['csrf_token_page']
)) . '">' . 'Undo Rating' . '</a></li>
		';
}
else
{
$__compilerVar6 .= '
			';
foreach ($postrating_ratings AS $id => $rating)
{
$__compilerVar6 .= '
				';
if (!$rating['disabled'])
{
$__compilerVar6 .= '
					';
if ($rating['name'])
{
$__compilerVar6 .= '											
						<li><a href="' . XenForo_Template_Helper_Core::link('posts/rate', $post, array(
'rating' => $id,
'_xfToken' => $visitor['csrf_token_page']
)) . '" class="Tooltip" data-offsetY="-13" data-offsetX="-8" title="' . htmlspecialchars($rating['title'], ENT_QUOTES, 'UTF-8') . '">';
if ($rating['sprite_mode'])
{
$__compilerVar6 .= '<img src="styles/default/xenforo/clear.png" alt="' . htmlspecialchars($rating['title'], ENT_QUOTES, 'UTF-8') . '" style="background: url(\'styles/dark/ratings/' . htmlspecialchars($rating['name'], ENT_QUOTES, 'UTF-8') . '\') no-repeat ' . htmlspecialchars($rating['sprite_params']['x'], ENT_QUOTES, 'UTF-8') . 'px ' . htmlspecialchars($rating['sprite_params']['y'], ENT_QUOTES, 'UTF-8') . 'px; width: ' . htmlspecialchars($rating['sprite_params']['w'], ENT_QUOTES, 'UTF-8') . 'px; height: ' . htmlspecialchars($rating['sprite_params']['h'], ENT_QUOTES, 'UTF-8') . 'px;" />';
}
else
{
$__compilerVar6 .= '<img src="styles/dark/ratings/' . htmlspecialchars($rating['name'], ENT_QUOTES, 'UTF-8') . '" alt="' . htmlspecialchars($rating['title'], ENT_QUOTES, 'UTF-8') . '" />';
}
$__compilerVar6 .= '</a></li>
					';
}
else
{
$__compilerVar6 .= '
						<li class=\'dark_postrating_textonly\'><a href="' . XenForo_Template_Helper_Core::link('posts/rate', $post, array(
'rating' => $id,
'_xfToken' => $visitor['csrf_token_page']
)) . '">' . htmlspecialchars($rating['title'], ENT_QUOTES, 'UTF-8') . '</a></li>
					';
}
$__compilerVar6 .= '
				';
}
$__compilerVar6 .= '
			';
}
$__compilerVar6 .= '
		';
}
$__compilerVar6 .= '
	';
}
$__compilerVar6 .= '
</ul>
';
$__output .= $__compilerVar6;
unset($__compilerVar6);
$__output .= '
	</div>
	<div style="clear: right;"></div>
</div>
';
}
