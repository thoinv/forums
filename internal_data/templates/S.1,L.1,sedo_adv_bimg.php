<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
if ($options['diffMode'])
{
$__output .= '
	';
if ($xenOptions['AdvBBcodeBar_bimg_moveev_load'] != 2)
{
$__output .= '
		
		';
if ($xenOptions['AdvBBcodeBar_debug_devmode'])
{
$__output .= '
			';
$this->addRequiredExternal('js', 'js/sedo/advtoolbar/twentytwenty/src/xen.twenty.single.js');
$__output .= '
		';
}
else
{
$__output .= '
			';
$this->addRequiredExternal('js', 'js/sedo/advtoolbar/twentytwenty/xen.twenty.single.js');
$__output .= '
		';
}
$__output .= '
	';
}
else
{
$__output .= '	
		';
if ($xenOptions['AdvBBcodeBar_debug_devmode'])
{
$__output .= '
			';
$this->addRequiredExternal('js', 'js/sedo/advtoolbar/twentytwenty/src/xen.twenty.full.js');
$__output .= '
		';
}
else
{
$__output .= '
			';
$this->addRequiredExternal('js', 'js/sedo/advtoolbar/twentytwenty/xen.twenty.full.js');
$__output .= '
		';
}
$__output .= '
	';
}
$__output .= '

	';
$this->addRequiredExternal('css', 'sedo_adv_bimg_twenty');
$__output .= '
';
}
$__output .= '

';
$this->addRequiredExternal('css', 'sedo_adv_bimg');
$__output .= '

<div class="adv_bimg_block ' . (($options['responsiveMode']) ? ('responsive') : ('')) . '">
	<div class="adv_bimg ' . htmlspecialchars($options['blockAlign'], ENT_QUOTES, 'UTF-8') . ' ' . ((!$options['hasCaption']) ? ('text_center') : ('')) . '" style="width:' . htmlspecialchars($options['width'], ENT_QUOTES, 'UTF-8') . htmlspecialchars($options['widthType'], ENT_QUOTES, 'UTF-8') . ';">
		';
if ($options['hasCaption'] AND $options['caption']['position'] == ('top'))
{
$__output .= '
			';
if ($options['caption']['type'] == ('inside'))
{
$__output .= '
				<div class="adv_caption caption_inside" style="width:' . htmlspecialchars($options['width'], ENT_QUOTES, 'UTF-8') . htmlspecialchars($options['widthType'], ENT_QUOTES, 'UTF-8') . ';">
					<div class="caption_txt caption_txt_inside" style="text-align:' . htmlspecialchars($options['caption']['align'], ENT_QUOTES, 'UTF-8') . ';">' . $options['caption']['text'] . '</div>
				</div>
			';
}
else
{
$__output .= '
				<div class="caption_txt" style="text-align:' . htmlspecialchars($options['caption']['align'], ENT_QUOTES, 'UTF-8') . ';">' . $options['caption']['text'] . '</div>
			';
}
$__output .= '
		';
}
$__output .= '
		';
if ($options['noLightbox'])
{
$__output .= '
			';
if ($options['parentUrl'])
{
$__output .= '
				<a class="externalLink adv_bimg_nolb" target="_blank" href="' . htmlspecialchars($options['parentUrl'], ENT_QUOTES, 'UTF-8') . '">
					';
if ($options['diffMode'])
{
$__output .= '
						<div class="AdvBimgDiff ' . (($options['diffVertical']) ? ('DiffV') : ('')) . ' twentytwenty-container" 
							style="width:' . htmlspecialchars($options['widthImg'], ENT_QUOTES, 'UTF-8') . '"
							' . (($options['diffPos']) ? ('data-diff-pos="' . htmlspecialchars($options['diffPos'], ENT_QUOTES, 'UTF-8') . '"') : ('')) . '
							data-width="' . htmlspecialchars($options['diffWidestWidth'], ENT_QUOTES, 'UTF-8') . '"
						>
							<img src="' . $options['diffModeData']['img_1']['url'] . '" 
								data-width="' . htmlspecialchars($options['diffWidestWidth'], ENT_QUOTES, 'UTF-8') . '" 
							/>
							<img src="' . $options['diffModeData']['img_2']['url'] . '" 
								data-width="' . htmlspecialchars($options['diffWidestWidth'], ENT_QUOTES, 'UTF-8') . '" 
							/>
						</div>
					';
}
else
{
$__output .= '
						<img class="bbCodeImage" src="' . $content . '" style="width:' . htmlspecialchars($options['widthImg'], ENT_QUOTES, 'UTF-8') . '" />
					';
}
$__output .= '
				</a>
			';
}
else
{
$__output .= '
      				';
if ($options['diffMode'])
{
$__output .= '
					<div class="AdvBimgDiff ' . (($options['diffVertical']) ? ('DiffV') : ('')) . ' twentytwenty-container" 
							style="width:' . htmlspecialchars($options['widthImg'], ENT_QUOTES, 'UTF-8') . '"
							data-width="' . htmlspecialchars($options['diffWidestWidth'], ENT_QUOTES, 'UTF-8') . '"
							' . (($options['diffPos']) ? ('data-diff-pos="' . htmlspecialchars($options['diffPos'], ENT_QUOTES, 'UTF-8') . '"') : ('')) . '
						>
      						<img src="' . $options['diffModeData']['img_1']['url'] . '" 
      							data-width="' . htmlspecialchars($options['diffModeData']['img_1']['width'], ENT_QUOTES, 'UTF-8') . '" 
      						/>
      						<img src="' . $options['diffModeData']['img_2']['url'] . '" 
      							data-width="' . htmlspecialchars($options['diffModeData']['img_2']['width'], ENT_QUOTES, 'UTF-8') . '" 
      						/>
      					</div>
      				';
}
else
{
$__output .= '
      					<img class="bbCodeImage" src="' . $content . '" style="width:' . htmlspecialchars($options['widthImg'], ENT_QUOTES, 'UTF-8') . '" />
      				';
}
$__output .= '
			';
}
$__output .= '
		';
}
else
{
$__output .= '
			<a href="' . $content . '" target="_blank" class="LbTrigger" data-href="index.php?misc/lightbox">
				<img class="bbCodeImage LbImage" src="' . $content . '" style="width:' . htmlspecialchars($options['widthImg'], ENT_QUOTES, 'UTF-8') . '" data-src="' . $content . '" />
			</a>
		';
}
$__output .= '
		<br />
		';
if ($options['hasCaption'] AND $options['caption']['position'] == ('bottom'))
{
$__output .= '
			';
if ($options['caption']['type'] == ('inside'))
{
$__output .= '
				<div class="adv_caption caption_inside" style="width:' . htmlspecialchars($options['width'], ENT_QUOTES, 'UTF-8') . htmlspecialchars($options['widthType'], ENT_QUOTES, 'UTF-8') . '; bottom:' . (($options['isBadIE']) ? ('0') : ('5px')) . '">
					<div class="caption_txt caption_txt_inside" style="text-align:' . htmlspecialchars($options['caption']['align'], ENT_QUOTES, 'UTF-8') . ';">' . $options['caption']['text'] . '</div>
				</div>
			';
}
else
{
$__output .= '
				<div class="caption_txt" style="text-align:' . htmlspecialchars($options['caption']['align'], ENT_QUOTES, 'UTF-8') . ';">' . $options['caption']['text'] . '</div>
			';
}
$__output .= '
		';
}
$__output .= '
		';
if (!$options['hasCaption'] AND !$options['noLightbox'] AND $xenOptions['AdvBBcodeBar_bimg_caption_fallback'])
{
$__output .= '
			<span><a 
				href="' . $content . '" 
				target="_blank"
				class="LbTrigger" 
				data-href="index.php?misc/lightbox"><img 
					style="width:' . htmlspecialchars($options['widthImg'], ENT_QUOTES, 'UTF-8') . ';display:none;"
					class="bbCodeImage LbImage" 
					src="' . $content . '"
					data-src="' . $content . '" 
				/>' . ((!$visitor['permissions']['forum']['viewAttachment'] AND !$xenAddOns['Tinhte_AIO'] AND !$options['directUrl']) ? ('Sorry, you don\'t have access to the image') : ('Click for original size')) . '</a></span>
		';
}
$__output .= '
	</div>
</div>';
