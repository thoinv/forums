<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$this->addRequiredExternal('css', 'dark_postrating');
$__output .= '

<div class="section">
	<h3 class="subHeading textWithCount">
		<span class="text">' . 'Post Ratings' . '</span>
	</h3>
	<div class="primaryContent" style="padding:0">
				
		<table class="dark_postrating_member">
			<tr>
				<th></th>
				<th>' . 'Received' . ':</th>
				<th>' . 'Given' . ':</th>
			</tr>
			
			';
foreach ($postrating_ratings_out AS $id => $rating)
{
$__output .= '
				';
if (!$rating['disabled'])
{
$__output .= '
					<tr>
						<td class=\'muted\'>';
if ($rating['name'])
{
if ($rating['sprite_mode'])
{
$__output .= '<img src="styles/default/xenforo/clear.png" alt="' . htmlspecialchars($rating['title'], ENT_QUOTES, 'UTF-8') . '" title="' . htmlspecialchars($rating['title'], ENT_QUOTES, 'UTF-8') . '" style="background: url(\'styles/dark/ratings/' . htmlspecialchars($rating['name'], ENT_QUOTES, 'UTF-8') . '\') no-repeat ' . htmlspecialchars($rating['sprite_params']['x'], ENT_QUOTES, 'UTF-8') . 'px ' . htmlspecialchars($rating['sprite_params']['y'], ENT_QUOTES, 'UTF-8') . 'px; width: ' . htmlspecialchars($rating['sprite_params']['w'], ENT_QUOTES, 'UTF-8') . 'px; height: ' . htmlspecialchars($rating['sprite_params']['h'], ENT_QUOTES, 'UTF-8') . 'px;" />';
}
else
{
$__output .= '<img src="styles/dark/ratings/' . htmlspecialchars($rating['name'], ENT_QUOTES, 'UTF-8') . '" alt="' . htmlspecialchars($rating['title'], ENT_QUOTES, 'UTF-8') . '" title="' . htmlspecialchars($rating['title'], ENT_QUOTES, 'UTF-8') . '" />';
}
}
else
{
$__output .= htmlspecialchars($rating['title'], ENT_QUOTES, 'UTF-8');
}
$__output .= '</td>
																																																			
<td';
if ($rating['type'] == 1)
{
$__output .= ' class="dark_postrating_positive"';
}
if ($rating['type'] == 0)
{
$__output .= ' class="dark_postrating_neutral"';
}
if ($rating['type'] == -1)
{
$__output .= ' class="dark_postrating_negative"';
}
$__output .= '>' . XenForo_Template_Helper_Core::numberFormat($rating['received'], '0') . '</td>
<td';
if ($rating['type'] == 1)
{
$__output .= ' class="dark_postrating_positive"';
}
if ($rating['type'] == 0)
{
$__output .= ' class="dark_postrating_neutral"';
}
if ($rating['type'] == -1)
{
$__output .= ' class="dark_postrating_negative"';
}
$__output .= '>' . XenForo_Template_Helper_Core::numberFormat($rating['given'], '0') . '</td>
																															
					</tr>
				';
}
$__output .= '
			';
}
$__output .= '
			
		</table>
	</div>
</div>

';
