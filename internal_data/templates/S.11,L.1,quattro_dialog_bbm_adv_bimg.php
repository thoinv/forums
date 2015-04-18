<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$this->addRequiredExternal('css', 'quattro_dialog');
$__output .= '
';
$this->addRequiredExternal('css', 'quattro_dialog_bbm_adv_bimg');
$__output .= '
';
$this->addRequiredExternal('js', 'js/sedo/advtoolbar/tinyquattro/bimg.js');
$__output .= '

<div class="mceTitle" data-width="500">' . 'Bimg Insertion Panel' . '</div>

<div class="mceTabs">
	<div id="xentabs_bimg_general">' . 'Image options' . '</div>
	<div id="xentabs_bimg_caption">' . 'Caption options' . '</div>
	<div id="xentabs_bimg_extra">' . ' + ' . '</div>
	';
if ($imgAttachments)
{
$__output .= '
		<div id="xentabs_bimg_attach">' . 'Attachments' . '</div>
	';
}
$__output .= '
</div>

<div class="mcePanes">
	<div id="xenpane_bimg_general">
		<dl class="xenmce_inline">
			<dt id="adv_bimg_url_phrase">' . 'URL:' . '</dt>
			<dd><input 	id="adv_bimg_src"
					name="src"
					type="text"
					size="35"
					class="mce-textbox mceFocus"
					value="' . htmlspecialchars($selection['text'], ENT_QUOTES, 'UTF-8') . '"
				/>
			</dd>
			<dt style="margin-left:5px">' . 'Width:' . '</dt>
			<dd><input 	id="adv_bimg_width"
					name="width"
					type="text"
					style="width:50px"
					class="mce-textbox"
					value="' . 'Auto' . '"
				/>
			</dd>
			<dt></dt>
			<dd><input 	id="adv_bimg_width_type"
					name="widthType"
					type="text"
					class="mce-textbox"
					style="width:20px"
					readonly="true"
					value="px" 
				/>
			</dd>
		</dl>

		<div id="adv_bimg_options_float">
			<ul id="adv_bimg_float_select">
				<li id="adv_bimg_normal_select" class="normal active">
					<div class="img"></div>
					<span id="adv_bimg_normalText">' . 'Normal left' . '</span>
					<span id="adv_bimg_centerText" class="hidden">' . 'Normal center' . '</span>
					<span id="adv_bimg_rightText" class="hidden">' . 'Normal right' . '</span>
				</li>
				<li class="fleft">
					<div class="img"></div>
					<span>' . 'Float Left' . '</span>
				</li>
				<li class="fright">
					<div class="img"></div>
					<span>' . 'Float Right' . '</span>
				</li>
			</ul>
			<p class="info mce-xen-content">' . 'Information:' . ' <span>' . 'When using a float block, this block element (bbcode) must be inserted before the text block.' . '</span></p>
			<input id="adv_bimg_float_input" name="_float" type="hidden" value="normal"/>
		</div>		
	</div>

	<div id="xenpane_bimg_caption">
		<dl class="caption_align">
			<dt>' . 'Text-align:' . '</dt>
			<dd>
				<select id="adv_bimg_caption_align_select" name="captionAlign" class="mce-textbox">
					<option value="left">' . 'Left' . '</option>
					<option value="center">' . 'Center' . '</option>
					<option value="right">' . 'Right' . '</option>
				</select>
			</dd>
		</dl>
		<dl class="caption_text">
			<dt>' . 'Type your caption here:' . '</dt>
			<dd><textarea	id="adv_bimg_caption_textarea"
					name="caption"
					type="text"
					class="mce-textbox"
				/>
			</dd>
		</dl>
		<div id="adv_bimg_caption_position">
			<ul id="adv_bimg_caption_select">
				<li class="bottom_out active">
					<div class="img"></div>
					<span>' . 'Bottom out' . '</span>
				</li>
				<li class="top_out">
					<div class="img"></div>
					<span>' . 'Top out' . '</span>
				</li>
				<li class="bottom_in">
					<div class="img"></div>
					<span>' . 'Bottom in' . '</span>
				</li>
				<li class="top_in">
					<div class="img"></div>
					<span>' . 'Top in' . '</span>
				</li>
			</ul>

			<input id="adv_bimg_caption_position_input" name="captionPosition" type="hidden" value="bottom_out"/>
		</div>
	</div>

	<div id="xenpane_bimg_extra">
		<dl class="xenmce_inline">
			<dt>' . 'External link' . '</dt>
			<dd><input 	id="adv_bimg_extra_link"
					name="blink"
					type="text"
					size="25"
					class="mce-textbox"
					value=""
				/>
			</dd> -	
			<dt>' . 'No lightbox' . '</dt>
			<dd>
	  			<div 	class="xenCheckBox nolightbox" 
		  			data-inputname="nolightbox"
				></div>
		  	</dd>
		</dl>
		<hr>
		<dl>
			<dt>' . 'Compared image url (or attachment id)' . '</dt>
			<dd class="dd_inline"><input id="adv_bimg_extra_src"
					name="bsrc"
					type="text"
					size="25"
					class="mce-textbox"
					value=""
				/>' . 'Vertical' . ' <div class="xenCheckBox diff_vertical" 
		  			data-inputname="diff_v"
				></div> 

				' . 'Cursor position' . '
				<select id="adv_bimg_diff_pos" name="diff_pos" class="mce-textbox" size="4">
					<option value="0.1">0.1</option>
					<option value="0.2">0.2</option>
					<option value="0.3">0.3</option>
					<option value="0.4">0.4</option>
					<option value="0.5" selected="selected">0.5</option>
					<option value="0.6">0.6</option>
					<option value="0.7">0.6</option>
					<option value="0.8">0.8</option>
					<option value="0.9">0.9</option>
					<option value="1">1</option>
				</select>
			</dd>
		</dl>
	</div>

	';
if ($imgAttachments)
{
$__output .= '
		<div id="xenpane_bimg_attach">
			<div class="quattro_bimg_attach_wrapper">
				 ';
foreach ($imgAttachments AS $attachment)
{
$__output .= '
				 	<div class="quattro_bimg_attach">
						<img src="' . htmlspecialchars($attachment['thumbnailUrl'], ENT_QUOTES, 'UTF-8') . '" data-attachid="' . htmlspecialchars($attachment['attachment_id'], ENT_QUOTES, 'UTF-8') . '" alt="' . htmlspecialchars($attachment['attachment_id'], ENT_QUOTES, 'UTF-8') . '" />
						<div class="attach_id">' . 'id' . ': ' . htmlspecialchars($attachment['attachment_id'], ENT_QUOTES, 'UTF-8') . '</div>
					</div>			 	
				 ';
}
$__output .= '
			</div>
		</div>
	';
}
$__output .= '
</div>';
