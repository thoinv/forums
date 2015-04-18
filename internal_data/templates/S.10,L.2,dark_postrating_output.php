<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$this->addRequiredExternal('css', 'dark_postrating');
$__output .= '
';
$this->addRequiredExternal('js', 'js/dark/postrating.js?' . $postrating_js_modification);
$__output .= '    
';
if ($postrating_hide_post)
{
$__output .= '
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
$__output .= '
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
$__output .= '
	' . $__compilerVar2 . '
	';
if ($postrating_can_list)
{
$__output .= '
		<li> <a href="' . XenForo_Template_Helper_Core::link('posts/ratings', $post, array()) . '" class="dark_postrating_list OverlayTrigger" data-cacheOverlay="false">' . 'List' . '</a></li>
	';
}
$__output .= '
';
}
unset($__compilerVar2);
$__output .= '
	</ul>';
