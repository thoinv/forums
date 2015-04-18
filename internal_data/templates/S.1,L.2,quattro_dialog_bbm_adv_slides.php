<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$this->addRequiredExternal('css', 'quattro_dialog');
$__output .= '
';
$this->addRequiredExternal('css', 'quattro_dialog_bbm_adv_slides');
$__output .= '
';
$this->addRequiredExternal('js', 'js/sedo/advtoolbar/tinyquattro/slides.js');
$__output .= '

<div class="mceTitle" data-height="370">' . 'Slides Insertion Panel' . '</div>

<div id="adv_slides_wrapper">
	<div id="adv_slides_create" style="float:right">' . 'Add a slide' . '</div>

	<div class="mceTabs">
		<div id="xentabs_adv_slides_config">' . 'Configuration' . '</div>
		<div id="xentabs_adv_slides_builder">' . 'Slides' . '</div>
	</div>

	<div class="mcePanes">
		<div id="xenpane_adv_slides_configuration">
			<ul id="adv_slides_mode">
				<li class="adv_accordion active" data-mode="accordion">
					<div class="img"></div>
					<span>' . 'Accordion' . '</span>
				</li>
				<li class="adv_tabs" data-mode="tabs">
					<div class="img"></div>
					<span>' . 'Tabs' . '</span>
				</li>
				<li class="adv_slider" data-mode="slider">
					<div class="img"></div>
					<span>' . 'Slider' . '</span>
				</li>
			</ul>

			<input id="adv_slides_mode_input" name="mode" type="hidden" value="accordion"/>

			<dl class="xenmce_inline" style="margin-top:10px">
				<dt>' . 'Block width: ' . '</dt>
				<dd><input 	id="adv_sliders_width"
						name="globalWidth"
						type="text"
						style="width:50px;"
						class="mce-textbox"
						value="' . 'Auto' . '"
					/>
				</dd>
			
				<dt></dt>
				<dd><input 	id="adv_sliders_width_type"
						name="globalWidthType"
						type="text"
						class="mce-textbox"
						style="width:20px;margin-right:15px"
						readonly="true"
						value="px" 
					/>
				</dd>

				<dt>' . 'Slides height:' . '</dt>
				<dd><input 	id="adv_sliders_height"
						name="globalHeight"
						type="text"
						style="width:100px;"
						class="mce-textbox"
						data-auto="' . 'Auto' . '"
						data-fullheight="' . 'Full display' . '"
						value="' . 'Auto' . '"
					/>
				</dd>
				<dd><input 	id="adv_sliders_height_type"
						name="globalHeightType"
						type="text"
						class="mce-textbox disable"
						style="width:20px;margin-right:15px"
						readonly="true"
						value="px" 
					/>
				</dd>	
			</dl>
	
			<dl class="xenmce_inline">
				<dt>' . 'Block align:' . '</dt>
				<dd>
					<select name="blockalign" class="mce-textbox">
						<option value="bleft">' . 'Normal left' . '</option>
						<option value="bcenter">' . 'Normal center' . '</option>
						<option value="bright">' . 'Normal right' . '</option>
						<option value="fleft">' . 'Float left' . '</option>
						<option value="fright">' . 'Float right' . '</option>
					</select>
				</dd>
			</dl>
			<dl class="xenmce_inline advOnlySlider">
				<dt class="advOnlySlider">' . 'Layout' . ':</dt>
				<dd class="advOnlySlider">
					<select name="sliderLayout" class="mce-textbox">
						<option value="outside">' . 'Outside' . '</option>
						<option value="inside">' . 'Inside' . '</option>
					</select>
				</dd>

				<dt>' . 'Tabs' . ':</dt>
				<dd>
					<select name="sliderTabsStyle" class="mce-textbox">
						<option value="bullet">' . 'Bullet' . '</option>
						<option value="numeric">' . 'Numeric' . '</option>
					</select>
				</dd>
				
				<dt></dt>
				<dd>
		  			<div 	class="xenCheckBox slider_autoclick" 
			  			data-phrase="' . 'Auto-click' . '"
			  			data-inputname="sliderAutoclick"
			  			data-checked="checked">
			  		</div>
			  	</dd>
			</dl>

			<dl class="xenmce_inline advOnlySlider">
				<dt>' . 'Player' . ':</dt>
				<dd class="adv_slider_player">
					<select name="sliderPlayer" class="mce-textbox">
						<option value="no">' . 'No' . '</option>
						<option value="yes">' . 'Có' . '</option>
					</select>
				</dd>

				<dt>' . 'Interval' . ':</dt>
				<dd>
					<input 	id="adv_sliders_interval"
						name="sliderInterval"
						type="text"
						style="width:50px"
						class="mce-textbox"
						value="' . 'Auto' . '"
					/>
				</dd>
				<dt></dt>
				<dd>
					<input 	id="adv_sliders_interval_type"
						name="sliderIntervalType"
						type="text"
						class="mce-textbox disable"
						style="width:20px;"
						readonly="true"
						value="' . 'ms' . '" 
					/>
				</dd>

				<dt></dt>
				<dd>
		  			<div 	class="xenCheckBox slider_autoplay" 
			  			data-phrase="' . 'Autoplay' . '"
			  			data-inputname="sliderAutoplay">
			  		</div>
				</dd>
			</dl>
		</div>

		<div id="xenpane_slides_builder">

			<div class="advSlidesPanes">
				<div class="slidePane" data-order="1">
				  	<div class="slideDelete">X</div>
				  	<dl class="xenmce_inline">
				  		<dt>' . 'Title:' . '</dt>
				  		<dd><input 	name="slaveTitle"
				  				type="text"
				  				style="width:65px;"
				  				class="mce-textbox slave_title"
				  				value="' . 'Auto' . '"
				  			/>
				  		</dd>	
				
				  		<ul class="slave_align">
				  			<li><div class="align_left align_select_left" data-salign="left"></div></li>
				  			<li><div class="align_center" data-salign="center"></div></li>
				  			<li><div class="align_right" data-salign="right"></div></li>
				  		</ul>
				
				  		<input class="slaveAlignForm" name="slaveAlign" type="hidden" value="left" />
				
				  		<dt class="advOnlyAccordion heightGroup">' . 'Height:' . '</dt>
				  		<dd class="advOnlyAccordion heightGroup">
							<input 	name="slaveHeight"
				  				type="text"
				  				style="width:65px;"
				  				class="mce-textbox slave_height"
				  				data-auto="' . 'Auto' . '"
				  				data-fullheight="' . 'Full display' . '"
				  				value="' . 'Auto' . '"
				  			/>
				  		</dd>
				  		<dt class="advOnlyAccordion heightGroup"></dt>
				  		<dd class="advOnlyAccordion heightGroup">
							<input 	name="slaveHeightType"
				  				type="text"
				  				class="mce-textbox disable slave_height_type"
				  				style="width:20px;margin-right:15px"
				  				readonly="true"
				  				value="px" 
				  			/>
				  		</dd>	
				  
				  		<dt></dt>
				  		<dd>
				  			<div 	class="xenCheckBox slave_open" 
				  				data-phrase="' . 'Open?' . '"
				  				data-inputname="slaveOpen">
				  			</div>
				  		</dd>
				  	</dl>
				
				  	<dl class="xenmce_inline advOnlySlider advSlideHide">
						<dt class="advSlidesIdTrigger">Picture Mode</dt>
				  		<dd></dd>
				  		
						<dt>' . 'ID' . ':</dt>
				  		<dd><input 	name="slaveSliderId"
				  				type="text"
				  				style="width:50px;"
				  				class="mce-textbox slave_slider_id"
				  			/>
				  		</dd>

						<dt>' . 'Title position' . ':</dt>
						<dd>
							<select name="slaveSliderTitlePosition" class="mce-textbox slave_slider_title_position">
								<option value="top">' . 'Top' . '</option>
								<option value="bottom">' . 'Bottom' . '</option>
							</select>
						</dd>

				  		<dt></dt>
				  		<dd>
				  			<div 	class="xenCheckBox slave_slider_full" 
				  				data-phrase="' . 'Full mode' . '"
				  				data-inputname="slaveSliderFull">
				  			</div>
				  		</dd>
					</dl>
				  	
				  	<dl>
				  		<dt></dt>
				  		<dd><textarea	name="slaveContent"
				  				type="text"
				  				class="mce-textbox slave_content"
				  			></textarea>
				  		</dd>
				  	</dl>
				</div>
			</div>

			<div class="advSlidesTabs">
				<div class="slideTab" data-order="1">1</div>
			</div>
		</div>
	</div>
	<div id="quattro_slider_patterns">
		<div class="quattro_slides_attach">
			';
if ($attachments)
{
$__output .= '
				 ';
$i = 0;
foreach ($attachments AS $attachment)
{
$i++;
$__output .= '
				 	';
if ($attachment['thumbnailUrl'])
{
$__output .= '
				 		 ';
$imgAttach = '';
$imgAttach .= htmlspecialchars($i, ENT_QUOTES, 'UTF-8');
$__output .= '
					 	<div class="quattro_slide_attach"><img src="' . htmlspecialchars($attachment['thumbnailUrl'], ENT_QUOTES, 'UTF-8') . '" data-attachid="' . htmlspecialchars($attachment['attachment_id'], ENT_QUOTES, 'UTF-8') . '" alt="' . htmlspecialchars($attachment['attachment_id'], ENT_QUOTES, 'UTF-8') . '" /></div>			 	
				 	';
}
$__output .= '
				 ';
}
$__output .= '
			 	';
if (!$imgAttach)
{
$__output .= '
			 		<p>' . 'No image attachment has been found' . '</p>
			 	';
}
$__output .= '
			';
}
else
{
$__output .= '
				<p>' . 'No attachment has been found' . '</p>
			';
}
$__output .= '
		</div>
	</div>
	
	<input type="hidden" name="adv_tag_accordion" value="' . htmlspecialchars($xenOptions['AdvBBcodeBar_accordion_tag'], ENT_QUOTES, 'UTF-8') . '" />
	<input type="hidden" name="adv_tag_tabs" value="' . htmlspecialchars($xenOptions['AdvBBcodeBar_tabs_tag'], ENT_QUOTES, 'UTF-8') . '" />
	<input type="hidden" name="adv_tag_slider" value="' . htmlspecialchars($xenOptions['AdvBBcodeBar_slider_tag'], ENT_QUOTES, 'UTF-8') . '" />
</div>';
