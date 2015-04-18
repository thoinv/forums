<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__extraData['title'] = '';
$__extraData['title'] .= htmlspecialchars($service['service_name'], ENT_QUOTES, 'UTF-8') . ' - ' . 'Edit';
$__output .= '
';
$__extraData['h1'] = '';
$__extraData['h1'] .= htmlspecialchars($service['service_name'], ENT_QUOTES, 'UTF-8') . ' - ' . 'Edit';
$__output .= '

';
$__extraData['navigation'] = array();
$__extraData['navigation'][] = array('href' => XenForo_Template_Helper_Core::link('full:media/admin/services', false, array()), 'value' => 'Administrate Services');
$__extraData['navigation'][] = array('href' => XenForo_Template_Helper_Core::link('full:media/service', $service, array()), 'value' => htmlspecialchars($service['service_name'], ENT_QUOTES, 'UTF-8'));
$__output .= '

';
$this->addRequiredExternal('css', 'EWRmedio');
$__output .= '
';
$this->addRequiredExternal('js', 'js/8wayrun/slugit.js');
$__output .= '
';
$this->addRequiredExternal('js', 'js/8wayrun/EWRmedio_ajax.js');
$__output .= '

<div class="sectionMain">
	<form action="' . XenForo_Template_Helper_Core::link('media/service/edit', $service, array()) . '" method="post" class="xenForm AutoValidator" data-redirect="true">
		<fieldset>
			<dl class="ctrlUnit">
				<dt><label for="ctrl_name">' . 'service_name' . ':</label></dt>
				<dd><input type="text" name="service_name" class="textCtrl SlugIn" id="ctrl_name" value="' . htmlspecialchars($service['service_name'], ENT_QUOTES, 'UTF-8') . '" /></dd>
			</dl>

			<dl class="ctrlUnit">
				<dt><label for="ctrl_slug">' . 'Link URL' . ':</label></dt>
				<dd><input type="text" name="service_newslug" class="textCtrl SlugEdit SlugOut" id="ctrl_slug" value="' . htmlspecialchars($service['service_slug'], ENT_QUOTES, 'UTF-8') . '" /></dd>
			</dl>

			<dl class="ctrlUnit">
				<dt><label for="ctrl_url">' . 'Trackback URL' . ':</label></dt>
				<dd><input type="text" name="service_url" class="textCtrl" id="ctrl_url" value="' . htmlspecialchars($service['service_url'], ENT_QUOTES, 'UTF-8') . '" /></dd>
			</dl>

			<dl class="ctrlUnit">
				<dt><label for="ctrl_regex">' . 'Regular expression' . ':</label></dt>
				<dd><textarea name="service_regex" id="ctrl_regex" class="textCtrl" rows="3">' . htmlspecialchars($service['service_regex'], ENT_QUOTES, 'UTF-8') . '</textarea></dd>
			</dl>

			<dl class="ctrlUnit">
				<dt><label for="ctrl_type">' . 'Data Type' . ':</label></dt>
				<dd><select name="service_type" id="ctrl_type" class="textCtrl autoSize">
					<option value="mrss" ' . (($service['service_type'] == ('mrss')) ? ('selected') : ('')) . '>' . 'MRSS' . '</option>
					<option value="json" ' . (($service['service_type'] == ('json')) ? ('selected') : ('')) . '>' . 'JSON' . '</option>
					<option value="html" ' . (($service['service_type'] == ('html')) ? ('selected') : ('')) . '>' . 'HTML' . '</option>
				</select></dd>
			</dl>

			<dl class="ctrlUnit">
				<dt><label for="ctrl_feed">' . 'Data Feed URL' . ':</label></dt>
				<dd><input type="text" name="service_feed" class="textCtrl" id="ctrl_feed" value="' . htmlspecialchars($service['service_feed'], ENT_QUOTES, 'UTF-8') . '" /></dd>
			</dl>
		</fieldset>

		<fieldset>
			<dl class="ctrlUnit">
				<dt><label for="ctrl_value2">' . 'serviceVAL2' . ': <span style="display: inline-block; width: 50px;">$val2 =</span></label></dt>
				<dd><input type="text" name="service_value2" class="textCtrl" id="ctrl_value2" value="' . htmlspecialchars($service['service_value2'], ENT_QUOTES, 'UTF-8') . '" /></dd>
			</dl>

			<dl class="ctrlUnit">
				<dt><label for="ctrl_thumb">' . 'Thumbnail' . ': <span style="display: inline-block; width: 50px;">$thum =</span></label></dt>
				<dd><input type="text" name="service_thumb" class="textCtrl" id="ctrl_thumb" value="' . htmlspecialchars($service['service_thumb'], ENT_QUOTES, 'UTF-8') . '" /></dd>
			</dl>

			<dl class="ctrlUnit">
				<dt><label for="ctrl_title">' . 'Title' . ': <span style="display: inline-block; width: 50px;">$titl =</span></label></dt>
				<dd><input type="text" name="service_title" class="textCtrl" id="ctrl_title" value="' . htmlspecialchars($service['service_title'], ENT_QUOTES, 'UTF-8') . '" /></dd>
			</dl>

			<dl class="ctrlUnit">
				<dt><label for="ctrl_description">' . 'Description' . ': <span style="display: inline-block; width: 50px;">$desc =</span></label></dt>
				<dd><input type="text" name="service_description" class="textCtrl" id="ctrl_description" value="' . htmlspecialchars($service['service_description'], ENT_QUOTES, 'UTF-8') . '" /></dd>
			</dl>

			<dl class="ctrlUnit">
				<dt><label for="ctrl_duration">' . 'Duration' . ': <span style="display: inline-block; width: 50px;">$dura =</span></label></dt>
				<dd><input type="text" name="service_duration" class="textCtrl" id="ctrl_duration" value="' . htmlspecialchars($service['service_duration'], ENT_QUOTES, 'UTF-8') . '" /></dd>
			</dl>

			<dl class="ctrlUnit">
				<dt><label for="ctrl_keywords">' . 'Keywords' . ': <span style="display: inline-block; width: 50px;">$keyw =</span></label></dt>
				<dd><input type="text" name="service_keywords" class="textCtrl" id="ctrl_keywords" value="' . htmlspecialchars($service['service_keywords'], ENT_QUOTES, 'UTF-8') . '" /></dd>
			</dl>

			<dl class="ctrlUnit">
				<dt><label for="ctrl_errors">' . 'Error Info' . ': <span style="display: inline-block; width: 50px;">$errs =</span></label></dt>
				<dd><input type="text" name="service_errors" class="textCtrl" id="ctrl_errors" value="' . htmlspecialchars($service['service_errors'], ENT_QUOTES, 'UTF-8') . '" /></dd>
			</dl>
		</fieldset>

		<fieldset>
			<dl class="ctrlUnit">
				<dt><label for="ctrl_media">' . 'Data Type' . ':</label></dt>
				<dd><select name="service_media" id="ctrl_media" class="textCtrl autoSize">
					<option value="video" ' . (($service['service_media'] == ('video')) ? ('selected') : ('')) . '>' . 'Video' . '</option>
					<option value="gallery" ' . (($service['service_media'] == ('gallery')) ? ('selected') : ('')) . '>' . 'Gallery' . '</option>
				</select></dd>
			</dl>

			<dl class="ctrlUnit">
				<dt><label for="ctrl_movie">' . 'Embed Movie' . ':</label></dt>
				<dd><input type="text" name="service_movie" class="textCtrl" id="ctrl_movie" value="' . htmlspecialchars($service['service_movie'], ENT_QUOTES, 'UTF-8') . '" /></dd>
			</dl>

			<dl class="ctrlUnit">
				<dt><label for="ctrl_height">' . 'Width' . ' x ' . 'Height' . ':</label></dt>
				<dd><input type="text" name="service_width" class="textCtrl" id="ctrl_width" value="' . htmlspecialchars($service['service_width'], ENT_QUOTES, 'UTF-8') . '" style="width: 35px; text-align: right" /> x
					<input type="text" name="service_height" class="textCtrl" id="ctrl_height" value="' . htmlspecialchars($service['service_height'], ENT_QUOTES, 'UTF-8') . '" style="width: 35px;" /</dd>
			</dl>

			<dl class="ctrlUnit fullWidth">
				<dt></dt>
				<dd><textarea name="service_parameters" id="ctrl_parameters" class="textCtrl" rows="10">' . htmlspecialchars($service['service_parameters'], ENT_QUOTES, 'UTF-8') . '</textarea></dd>
			</dl>
		</fieldset>

		<dl class="ctrlUnit submitUnit">
			<dt></dt>
			<dd>
				<input type="submit" value="' . 'Save Service' . '" name="submit" accesskey="s" class="button primary" />
				<input type="submit" value="' . 'Save and Reload' . '" name="reload" class="button" />
			</dd>
		</dl>

		<input type="hidden" name="_xfToken" value="' . htmlspecialchars($visitor['csrf_token_page'], ENT_QUOTES, 'UTF-8') . '" />
	</form>
</div>

';
$__compilerVar1 = '';
$__compilerVar1 .= '<div class="medioCopy copyright muted">
	<a href="http://xenforo.com/community/resources/97/">XenMedio</a>
	&copy; Jason Axelrod from <a href="http://8wayrun.com/">8WAYRUN.COM</a>
</div>';
$__output .= $__compilerVar1;
unset($__compilerVar1);
