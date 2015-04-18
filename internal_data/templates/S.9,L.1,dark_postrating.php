<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
if ($postrating_has_ratings OR $postrating_can_rate)
{
$__output .= '
<div class="dark_postrating ' . (($postrating_has_ratings) ? ('likesSummary secondaryContent') : ('')) . '">
	<div class="dark_postrating_container">
			';
$__compilerVar1 = '';
$this->addRequiredExternal('css', 'dark_postrating');
$__compilerVar1 .= '
';
$this->addRequiredExternal('js', 'js/dark/postrating.js?' . $postrating_js_modification);
$__compilerVar1 .= '    
';
if ($postrating_hide_post)
{
$__compilerVar1 .= '
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
$__compilerVar1 .= '
<ul class="dark_postrating_outputlist">
';
$__compilerVar2 = '';
$__compilerVar2 .= '
		';
foreach ($postrating_ratings_out AS $id => $rating)
{
$__compilerVar2 .= '
			<li>
				';
if ($rating['name'])
{
if ($rating['sprite_mode'])
{
$__compilerVar2 .= '<img src="styles/default/xenforo/clear.png" alt="' . htmlspecialchars($rating['title'], ENT_QUOTES, 'UTF-8') . '" title="' . htmlspecialchars($rating['title'], ENT_QUOTES, 'UTF-8') . '" style="background: url(\'styles/dark/ratings/' . htmlspecialchars($rating['name'], ENT_QUOTES, 'UTF-8') . '\') no-repeat ' . htmlspecialchars($rating['sprite_params']['x'], ENT_QUOTES, 'UTF-8') . 'px ' . htmlspecialchars($rating['sprite_params']['y'], ENT_QUOTES, 'UTF-8') . 'px; width: ' . htmlspecialchars($rating['sprite_params']['w'], ENT_QUOTES, 'UTF-8') . 'px; height: ' . htmlspecialchars($rating['sprite_params']['h'], ENT_QUOTES, 'UTF-8') . 'px;" />';
}
else
{
$__compilerVar2 .= '<img src="styles/dark/ratings/' . htmlspecialchars($rating['name'], ENT_QUOTES, 'UTF-8') . '" alt="' . htmlspecialchars($rating['title'], ENT_QUOTES, 'UTF-8') . '" title="' . htmlspecialchars($rating['title'], ENT_QUOTES, 'UTF-8') . '" />';
}
}
if (!$postrating_ratings_lots || !$rating['name'])
{
$__compilerVar2 .= ' ' . htmlspecialchars($rating['title'], ENT_QUOTES, 'UTF-8') . ' ';
}
$__compilerVar2 .= ' x <strong>' . XenForo_Template_Helper_Core::numberFormat($rating['count'], '0') . '</strong>
			</li>
		';
}
$__compilerVar2 .= '
	';
if (trim($__compilerVar2) !== '')
{
$__compilerVar1 .= '
	' . $__compilerVar2 . '
	';
if ($postrating_can_list)
{
$__compilerVar1 .= '
		<li> <a href="' . XenForo_Template_Helper_Core::link('posts/ratings', $post, array()) . '" class="dark_postrating_list OverlayTrigger" data-cacheOverlay="false">' . 'List' . '</a></li>
	';
}
$__compilerVar1 .= '
';
}
unset($__compilerVar2);
$__compilerVar1 .= '
	</ul>';
$__output .= $__compilerVar1;
unset($__compilerVar1);
$__output .= '
			';
$__compilerVar3 = '';
$this->addRequiredExternal('css', 'dark_postrating');
$__compilerVar3 .= '
';
$this->addRequiredExternal('js', 'js/dark/postrating.js?' . $postrating_js_modification);
$__compilerVar3 .= '    

<script type="text/javascript">
var dark_postrating_minimum_opacity = ' . htmlspecialchars($postrating_minimum_opacity, ENT_QUOTES, 'UTF-8') . ';
</script>

<ul class="dark_postrating_inputlist ' . (($postrating_has_rated) ? ('dark_postrating_inputlist_undo') : ('')) . '">
	';
if ($postrating_can_rate)
{
$__compilerVar3 .= '
		';
if ($postrating_has_rated)
{
$__compilerVar3 .= '
			<li><a href="' . XenForo_Template_Helper_Core::link('posts/rate', $post, array(
'rating' => 'del',
'_xfToken' => $visitor['csrf_token_page']
)) . '">' . 'Undo Rating' . '</a></li>
		';
}
else
{
$__compilerVar3 .= '
			';
foreach ($postrating_ratings AS $id => $rating)
{
$__compilerVar3 .= '
				';
if (!$rating['disabled'])
{
$__compilerVar3 .= '
					';
if ($rating['name'])
{
$__compilerVar3 .= '											
						<li><a href="' . XenForo_Template_Helper_Core::link('posts/rate', $post, array(
'rating' => $id,
'_xfToken' => $visitor['csrf_token_page']
)) . '" class="Tooltip" data-offsetY="-13" data-offsetX="-8" title="' . htmlspecialchars($rating['title'], ENT_QUOTES, 'UTF-8') . '">';
if ($rating['sprite_mode'])
{
$__compilerVar3 .= '<img src="styles/default/xenforo/clear.png" alt="' . htmlspecialchars($rating['title'], ENT_QUOTES, 'UTF-8') . '" style="background: url(\'styles/dark/ratings/' . htmlspecialchars($rating['name'], ENT_QUOTES, 'UTF-8') . '\') no-repeat ' . htmlspecialchars($rating['sprite_params']['x'], ENT_QUOTES, 'UTF-8') . 'px ' . htmlspecialchars($rating['sprite_params']['y'], ENT_QUOTES, 'UTF-8') . 'px; width: ' . htmlspecialchars($rating['sprite_params']['w'], ENT_QUOTES, 'UTF-8') . 'px; height: ' . htmlspecialchars($rating['sprite_params']['h'], ENT_QUOTES, 'UTF-8') . 'px;" />';
}
else
{
$__compilerVar3 .= '<img src="styles/dark/ratings/' . htmlspecialchars($rating['name'], ENT_QUOTES, 'UTF-8') . '" alt="' . htmlspecialchars($rating['title'], ENT_QUOTES, 'UTF-8') . '" />';
}
$__compilerVar3 .= '</a></li>
					';
}
else
{
$__compilerVar3 .= '
						<li class=\'dark_postrating_textonly\'><a href="' . XenForo_Template_Helper_Core::link('posts/rate', $post, array(
'rating' => $id,
'_xfToken' => $visitor['csrf_token_page']
)) . '">' . htmlspecialchars($rating['title'], ENT_QUOTES, 'UTF-8') . '</a></li>
					';
}
$__compilerVar3 .= '
				';
}
$__compilerVar3 .= '
			';
}
$__compilerVar3 .= '
		';
}
$__compilerVar3 .= '
	';
}
$__compilerVar3 .= '
</ul>
';
$__output .= $__compilerVar3;
unset($__compilerVar3);
$__output .= '
	</div>
	<div style="clear: right;"></div>
</div>
';
}
