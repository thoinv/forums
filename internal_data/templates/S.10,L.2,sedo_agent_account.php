<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__output .= '	<dl class="ctrlUnit">
		<dt></dt>
		<dd>
			<ul>
				<li>
					<label for="ctrl_allow_sedo_agent">
						<input type="checkbox" name="allow_sedo_agent" value="1" id="ctrl_allow_sedo_agent" ' . (($visitor['allow_sedo_agent']) ? ' checked="checked"' : '') . ' />
						' . 'Record and display your mobile device information' . '
						<p class="hint">' . 'This will allow other people to see if one of your posts has been sent from a mobile device' . '</p>
					</label>
				</li>
				';
if ($xenOptions['sedo_at_allowraz'])
{
$__output .= '
					<li><input type="button" name="mobile_info_raz" value="' . 'Delete recorded information about my mobile' . '" class="button OverlayTrigger" data-href="' . XenForo_Template_Helper_Core::link('account/raz_mobileinfo', false, array()) . '" /></li>
				';
}
$__output .= '
			</ul>
		</dd>
	</dl>';
