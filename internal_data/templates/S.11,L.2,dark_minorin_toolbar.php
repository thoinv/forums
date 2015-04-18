<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
if ($minorin['enabled'])
{
$__output .= '
	';
$this->addRequiredExternal('css', 'dark_minorin');
$__output .= '
	';
$this->addRequiredExternal('js', 'js/dark/minorin.js?' . $minorin['js_modification']);
$__output .= '    

	<div id=\'minorin_toolbar_container\'>
		<div class=\'minorin_toolbar\'>
			';
if ($minorin['toolbar_bbcode'])
{
$__output .= '
				';
$this->addRequiredExternal('css', 'editor_ui');
$__output .= '
				';
foreach ($minorin['toolbar_bbcode'] AS $title => $code)
{
$__output .= '
					<button data-code=\'' . htmlspecialchars($code, ENT_QUOTES, 'UTF-8') . '\' class=\'button minorin_bbcode xenForoSkin\'>' . $title . '</button>
				';
}
$__output .= '
			';
}
$__output .= '

			';
if ($minorin['toolbar_smilies'])
{
$__output .= '
				<div class="minorin_Popup" id=\'minorin_smilies\' style=\'display: inline; top: -6px\'>
					<a rel="Menu"><img src=\'' . XenForo_Template_Helper_Core::styleProperty('imagePath') . '/xenforo/editor/smilie.png\' alt=\'Smilies\' title=\'Smilies\' style=\'vertical-align: middle\' /></a>
					<div class="Menu minorin_Menu">
						<div class="primaryContent menuHeader"><h3>' . 'Mặt cười' . '</h3></div>
						<ul class="secondaryContent blockLinksList minorin_smilies_list">
							';
foreach ($minorin['toolbar_smilies'] AS $id => $smilie)
{
$__output .= '
								';
if ($smilie['sprite_mode'])
{
$__output .= '
									<li><a href=\'javascript:;\' class=\'minorin_smilie mceSmilieSprite mceSmilie' . htmlspecialchars($smilie['smilie_id'], ENT_QUOTES, 'UTF-8') . '\' data-src=\'' . htmlspecialchars($smilie['image_url'], ENT_QUOTES, 'UTF-8') . '\' data-alt=\'' . htmlspecialchars($smilie['text'], ENT_QUOTES, 'UTF-8') . '\' data-title=\'' . htmlspecialchars($smilie['title'], ENT_QUOTES, 'UTF-8') . '\'></a></li>
								';
}
else
{
$__output .= '
									<li><a href=\'javascript:;\' class=\'minorin_smilie\' data-src=\'' . htmlspecialchars($smilie['image_url'], ENT_QUOTES, 'UTF-8') . '\' data-alt=\'' . htmlspecialchars($smilie['text'], ENT_QUOTES, 'UTF-8') . '\' data-title=\'' . htmlspecialchars($smilie['title'], ENT_QUOTES, 'UTF-8') . '\'></a></li>
								';
}
$__output .= '
							';
}
$__output .= '
						</ul>
					</div>
				</div>
			';
}
$__output .= '
		</div>
	</div>
';
}
