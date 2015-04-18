<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$this->addRequiredExternal('js', 'js/waindigo/tabs/existing_tab.js');
$__output .= '

';
$this->addRequiredExternal('css', 'waindigo_select_existing_tabs');
$__output .= '

<div id="TabsMediaIdSelect">
	<dl class="ctrlUnit">
		<dt><label for="ctrl_content_id2">' . 'xengallery_media' . ':</label></dt>
		<dd>
			<div class="browserSection">
				<div class="gridSection gridGroup">
					';
foreach ($media AS $item)
{
$__output .= '
						<div class="gridCol gridSpan">
							<label>
								';
if ($tabRuleId)
{
$__output .= '
									<input type="radio" name="extra_tab_data[' . htmlspecialchars($tabRuleId, ENT_QUOTES, 'UTF-8') . '][existing_content_id]" value="' . htmlspecialchars($item['media_id'], ENT_QUOTES, 'UTF-8') . '" id="ctrl_extra_tab_data' . htmlspecialchars($tabRuleId, ENT_QUOTES, 'UTF-8') . 'existing_content_id_' . htmlspecialchars($item['media_id'], ENT_QUOTES, 'UTF-8') . '" />
								';
}
else
{
$__output .= '
									<input type="radio" name="content_id2" value="' . htmlspecialchars($item['media_id'], ENT_QUOTES, 'UTF-8') . '" id="ctrl_content_id2_' . htmlspecialchars($item['media_id'], ENT_QUOTES, 'UTF-8') . '" />
								';
}
$__output .= '
								<img src="' . htmlspecialchars($item['thumbnailUrl'], ENT_QUOTES, 'UTF-8') . '?' . htmlspecialchars($item['last_edit_date'], ENT_QUOTES, 'UTF-8') . '" class="thumbImage Thumb" />
							</label>
						</div>
					';
}
$__output .= '
				</div>
			</div>
		</dd>
	</dl>
</div>';
