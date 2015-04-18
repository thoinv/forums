<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$this->addRequiredExternal('css', 'sedo_adv_slider');
$__output .= '
';
$this->addRequiredExternal('js', 'js/sedo/advtoolbar/jqt_slider.js');
$__output .= '

';
if ($xenOptions['AdvBBcodeBar_debug_devmode'])
{
$__output .= '
	';
$this->addRequiredExternal('js', 'js/sedo/advtoolbar/src/advbar_allinone.src.js');
$__output .= '	
';
}
else
{
$__output .= '
	';
$this->addRequiredExternal('js', 'js/sedo/advtoolbar/advbar_allinone.js');
$__output .= '
';
}
$__output .= '

<div 	id="' . htmlspecialchars($options['uniqid'], ENT_QUOTES, 'UTF-8') . '"
	class="JsOnly adv_slider_wrapper ' . (($options['layout'] == ('inside')) ? ('inner') : ('')) . ' ' . htmlspecialchars($options['blockAlign'], ENT_QUOTES, 'UTF-8') . ' ' . (($options['responsiveMode']) ? ('responsive') : ('')) . '"
	style="width:' . htmlspecialchars($options['width'], ENT_QUOTES, 'UTF-8') . htmlspecialchars($options['widthType'], ENT_QUOTES, 'UTF-8') . ';height:' . htmlspecialchars($options['height'], ENT_QUOTES, 'UTF-8') . 'px"
	data-autodiff="' . htmlspecialchars($options['autodiff'], ENT_QUOTES, 'UTF-8') . '"
	data-noclick="' . htmlspecialchars($options['noclick'], ENT_QUOTES, 'UTF-8') . '"
	' . (($options['autoplay']) ? ('data-autoplay="' . htmlspecialchars($options['autoplay'], ENT_QUOTES, 'UTF-8') . '"') : ('')) . '
	' . (($options['interval']) ? ('data-interval="' . htmlspecialchars($options['interval'], ENT_QUOTES, 'UTF-8') . '"') : ('')) . '
>
	<a class="adv_backward adv_slider_navig" style="margin-top:' . ($options['height'] / 2 - 10) . 'px">«</a>
	<a class="adv_forward adv_slider_navig" style="margin-top:' . ($options['height'] / 2 - 10) . 'px">»</a>

	<div class="advslides ' . htmlspecialchars($options['autowidth'], ENT_QUOTES, 'UTF-8') . '" style="width:' . htmlspecialchars($options['innerwidth'], ENT_QUOTES, 'UTF-8') . ';height:100%;position:relative">
		';
$i = 0;
$total = count($options['slides']);
foreach ($options['slides'] AS $slide)
{
$i++;
$__output .= '
			<div id="' . htmlspecialchars($options['uniqid'], ENT_QUOTES, 'UTF-8') . '_' . htmlspecialchars($i, ENT_QUOTES, 'UTF-8') . '"
			     class="' . (($options['layout'] == ('inside')) ? ('inner') : ('outside')) . ' ' . (($slide['image']) ? ('imageMode') : ('')) . '" 
			     style="height:' . (($slide['image']) ? (htmlspecialchars($options['height'], ENT_QUOTES, 'UTF-8')) : (($options['height'] - 50))) . 'px;"
			>
				';
if ($slide['title'])
{
$__output .= '				
					<div class="adv_slides_title' . (($slide['absoluteTitle']) ? ('_abs') : ('')) . ' ' . htmlspecialchars($slide['absoluteTitle'], ENT_QUOTES, 'UTF-8') . (($options['num'] AND $slide['absoluteTitle']) ? ('_num') : ('')) . '" ' . (($slide['align'] != ('left')) ? ('style="text-align:' . htmlspecialchars($slide['align'], ENT_QUOTES, 'UTF-8') . '"') : ('')) . '>
						<span>' . $slide['title'] . '</span>
					</div>
				';
}
$__output .= '
				';
if ($slide['image'])
{
$__output .= '
					<div class="adv_slide_mask" style="width:' . (($options['widthType'] == ('%')) ? ('100%') : (htmlspecialchars($options['width'], ENT_QUOTES, 'UTF-8') . 'px')) . '">
						';
if (($slide['attachParams']['canView'] OR $xenAddOns['Tinhte_AIO']) AND $slide['attachParams']['validAttachment'])
{
$__output .= '
							<span>' . 'Loading...' . '</span>
						';
}
else if (!$slide['attachParams']['validAttachment'] AND $xenOptions['AdvBBcodeBar_fallbackperms'])
{
$__output .= '
							<span>' . 'Attachment not valid' . '</span>
						';
}
else if (!$slide['attachParams']['canView'])
{
$__output .= '						
							<span>' . 'No permission to display the image' . '</span>
						';
}
else
{
$__output .= '
							<span>' . 'Attachment not valid' . '</span>						
						';
}
$__output .= '
					</div>

					<div class="adv_slide_image">
						';
if ($slide['attachParams']['canView'] OR $xenAddOns['Tinhte_AIO'])
{
$__output .= '
							<img class="advSliderImage ' . htmlspecialchars($slide['fullClass'], ENT_QUOTES, 'UTF-8') . '" style="width:100%" src="' . $slide['attachParams']['url'] . '" alt="" />
						';
}
else if ($slide['attachParams']['attachment']['thumbnailUrl'])
{
$__output .= '
							<img class="advSliderImage ' . htmlspecialchars($slide['fullClass'], ENT_QUOTES, 'UTF-8') . '" style="width:100%" src="' . $slide['attachParams']['attachment']['thumbnailUrl'] . '" alt="" />
						';
}
else
{
$__output .= '
							' . 'No permission to display the image' . '
						';
}
$__output .= '
					</div>
				';
}
else
{
$__output .= '
					<div class="adv_slide_content">' . $slide['content'] . '</div>
				';
}
$__output .= '
			</div>
		';
}
$__output .= '
	</div>

	<div class="advslidestabs ' . (($options['layout'] == ('inside')) ? ('inner_') : ('outside_')) . (($options['num']) ? ('num') : ('bullet')) . '">
		';
$i = 0;
$total = count($options['slides']);
foreach ($options['slides'] AS $slide)
{
$i++;
$__output .= '
			';
if ($options['num'])
{
$__output .= '
				<a class="num ' . (($slide['open']) ? ('open') : ('')) . '"  href="#">' . htmlspecialchars($i, ENT_QUOTES, 'UTF-8') . '</a>
			';
}
else
{
$__output .= '
				<a class="bullet ' . (($slide['open']) ? ('open') : ('')) . '" href="#">•</a>
			';
}
$__output .= '
		';
}
$__output .= '
		';
if ($options['cmd'])
{
$__output .= '
			<span class="cmd play button">►</span>
			<span class="cmd pause button">▌▌</span>
		';
}
$__output .= '
	</div>
</div>

<noscript>
	<div id="' . htmlspecialchars($options['uniqid'], ENT_QUOTES, 'UTF-8') . '_noscript" class="adv_slider_wrapper noscript ' . htmlspecialchars($options['blockAlign'], ENT_QUOTES, 'UTF-8') . '"	style="width:' . htmlspecialchars($options['width'], ENT_QUOTES, 'UTF-8') . htmlspecialchars($options['widthType'], ENT_QUOTES, 'UTF-8') . ';height:' . htmlspecialchars($options['height'], ENT_QUOTES, 'UTF-8') . 'px">
		';
$i = 0;
$total = count($options['slides']);
foreach ($options['slides'] AS $slide)
{
$i++;
$__output .= '
			<div id="' . htmlspecialchars($options['uniqid'], ENT_QUOTES, 'UTF-8') . '_' . htmlspecialchars($i, ENT_QUOTES, 'UTF-8') . '" class="adv_slides_noscript">
				<div class="adv_slider_noscript_title" style="text-align:' . htmlspecialchars($slide['align'], ENT_QUOTES, 'UTF-8') . '">' . (($slide['title']) ? ($slide['title']) : ('Tab ' . htmlspecialchars($i, ENT_QUOTES, 'UTF-8'))) . '</div>

				';
if ($slide['image'])
{
$__output .= '
					<div class="adv_slider_noscript_content" style="height:' . htmlspecialchars($options['height'], ENT_QUOTES, 'UTF-8') . 'px;">' . (($slide['attachParams']['canView'] OR $slide['attachParams']['validAttachment']) ? ('<img style="width:100%" src="' . $slide['content'] . '" alt="" />') : ('No permission to display the image')) . '</div>
				';
}
else
{
$__output .= '
					<div class="adv_slider_noscript_content" style="height:' . htmlspecialchars($options['height'], ENT_QUOTES, 'UTF-8') . 'px;">' . XenForo_Template_Helper_Core::callHelper('bbm_strip_noscript', array(
'0' => $slide['content']
)) . '</div>
				';
}
$__output .= '
			</div>
		';
}
$__output .= '
	</div>
</noscript>';
