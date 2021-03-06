<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__extraData['title'] = '';
$__extraData['title'] .= htmlspecialchars($media['media_title'], ENT_QUOTES, 'UTF-8') . ' - ' . 'Sửa';
$__output .= '
';
$__extraData['h1'] = '';
$__extraData['h1'] .= htmlspecialchars($media['media_title'], ENT_QUOTES, 'UTF-8') . ' - ' . 'Sửa';
$__output .= '

';
$__extraData['navigation'] = array();
$__extraData['navigation'] = XenForo_Template_Helper_Core::appendBreadCrumbs($__extraData['navigation'], $breadCrumbs);
$__extraData['navigation'][] = array('href' => XenForo_Template_Helper_Core::link('full:media', $media, array()), 'value' => htmlspecialchars($media['media_title'], ENT_QUOTES, 'UTF-8'));
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

';
if ($perms['alter'])
{
$__output .= '
	<div class="sectionMain">
		<form action="' . XenForo_Template_Helper_Core::link('media/alter', $media, array()) . '" method="post" class="xenForm AutoValidator" data-redirect="true" style="text-align: center; width: auto;">
			<b>' . 'Service' . ':</b>
				<select name="service_id" id="ctrl_category" class="textCtrl autoSize">
					';
foreach ($services AS $service)
{
$__output .= '
						<option value="' . htmlspecialchars($service['service_id'], ENT_QUOTES, 'UTF-8') . '" ' . (($service['service_id'] == $media['service_id']) ? ('selected') : ('')) . '>' . htmlspecialchars($service['service_name'], ENT_QUOTES, 'UTF-8') . '</option>
					';
}
$__output .= '
				</select> &nbsp;
			<b>' . 'serviceVAL' . ':</b>
				<input type="text" name="service_value" class="textCtrl" value="' . htmlspecialchars($media['service_value'], ENT_QUOTES, 'UTF-8') . '" style="width: 100px;" /> &nbsp;
			<b>' . 'serviceVAL2' . ':</b>
				<input type="text" name="service_value2" class="textCtrl" value="' . htmlspecialchars($media['service_value2'], ENT_QUOTES, 'UTF-8') . '" style="width: 100px;" /> &nbsp;
			<input type="submit" value="' . 'Save Media' . '" name="submit" accesskey="s" class="button primary" />
			<input type="hidden" name="_xfToken" value="' . htmlspecialchars($visitor['csrf_token_page'], ENT_QUOTES, 'UTF-8') . '" />
		</form>
	</div>
';
}
$__output .= '

<div class="sectionMain">
	<form action="' . XenForo_Template_Helper_Core::link('media/edit', $media, array()) . '" method="post" class="xenForm AutoValidator" data-redirect="true">
		<fieldset>
			<dl class="ctrlUnit">
				<dt><label for="ctrl_title">' . 'Tiêu đề' . ':</label></dt>
				<dd><input type="text" name="media_title" class="textCtrl" id="ctrl_title" value="' . htmlspecialchars($media['media_title'], ENT_QUOTES, 'UTF-8') . '" /></dd>
			</dl>

			<dl class="ctrlUnit">
				<dt><label for="ctrl_category">' . 'Category' . ':</label></dt>
				<dd><select name="category_id" id="ctrl_category" class="textCtrl autoSize">
					<option value="0">(' . 'Không xác định' . ')</option>
					';
foreach ($fullList AS $list)
{
$__output .= '
						<option value="' . htmlspecialchars($list['category_id'], ENT_QUOTES, 'UTF-8') . '"
						' . (($list['category_id'] == $media['category_id']) ? ('selected') : ('')) . '
						' . (($list['category_disabled']) ? ('disabled') : ('')) . '>
						&nbsp; &nbsp; ' . $list['category_indent'] . $list['category_name'] . '
						</option>
					';
}
$__output .= '
				</select></dd>
			</dl>

			<dl class="ctrlUnit fullWidth">
				<dt></dt>
				<dd>' . $editorTemplate . '</dd>
			</dl>

			<dl class="ctrlUnit">
				<dt><label for="ctrl_seconds">' . 'Duration' . ':</label></dt>
				<dd>
					';
if ($media['service_media'] == ('gallery'))
{
$__output .= '
						<input type="text" name="media_seconds" class="textCtrl" maxlength="5" id="ctrl_seconds" value="' . htmlspecialchars($media['media_duration'], ENT_QUOTES, 'UTF-8') . '" style="width: 40px; text-align: right;" />&nbsp; ' . '' . '' . ' images' . '
					';
}
else
{
$__output .= '
						<input type="text" name="media_hours" class="textCtrl" maxlength="2" id="ctrl_hours" value="' . htmlspecialchars($media['media_hours'], ENT_QUOTES, 'UTF-8') . '" style="width: 18px; text-align: right;" />&nbsp; ' . '' . '' . ' giờ' . ' &nbsp;
						<input type="text" name="media_minutes" class="textCtrl" maxlength="2" id="ctrl_minutes" value="' . htmlspecialchars($media['media_minutes'], ENT_QUOTES, 'UTF-8') . '" style="width: 18px; text-align: right;" />&nbsp; ' . '' . '' . ' phút' . ' &nbsp;
						<input type="text" name="media_seconds" class="textCtrl" maxlength="2" id="ctrl_seconds" value="' . htmlspecialchars($media['media_seconds'], ENT_QUOTES, 'UTF-8') . '" style="width: 18px; text-align: right;" />&nbsp; ' . '' . '' . ' seconds' . '
					';
}
$__output .= '
				</dd>
			</dl>
		</fieldset>

		';
$__compilerVar9 = '';
$__compilerVar9 .= '
			';
foreach ($customs AS $customID => $custom)
{
$__compilerVar9 .= '
				';
$__compilerVar10 = '';
$__compilerVar10 .= 'ctrl_' . htmlspecialchars($customID, ENT_QUOTES, 'UTF-8');
$__compilerVar11 = '';
$__compilerVar11 .= 'media_' . htmlspecialchars($customID, ENT_QUOTES, 'UTF-8');
$__compilerVar12 = '';
if ($custom['type'] == ('textbox'))
{
$__compilerVar12 .= '
	<dl class="ctrlUnit">
		<dt><label for="' . htmlspecialchars($__compilerVar10, ENT_QUOTES, 'UTF-8') . '">' . htmlspecialchars($custom['name'], ENT_QUOTES, 'UTF-8') . ':</label></dt>
		<dd><input type="text" name="' . htmlspecialchars($__compilerVar11, ENT_QUOTES, 'UTF-8') . '[]" class="textCtrl" id="' . htmlspecialchars($__compilerVar10, ENT_QUOTES, 'UTF-8') . '" value="' . htmlspecialchars($custom['value'], ENT_QUOTES, 'UTF-8') . '" /></dd>
	</dl>
';
}
else if ($custom['type'] == ('spinbox'))
{
$__compilerVar12 .= '
	<dl class="ctrlUnit">
		<dt><label for="' . htmlspecialchars($__compilerVar10, ENT_QUOTES, 'UTF-8') . '">' . htmlspecialchars($custom['name'], ENT_QUOTES, 'UTF-8') . ':</label></dt>
		<dd><input type="text" size="1" name="' . htmlspecialchars($__compilerVar11, ENT_QUOTES, 'UTF-8') . '[]" value="' . htmlspecialchars($custom['value'], ENT_QUOTES, 'UTF-8') . '" class="textCtrl autoSize SpinBox"
			id="' . htmlspecialchars($__compilerVar10, ENT_QUOTES, 'UTF-8') . '" step="' . htmlspecialchars($custom['params']['step'], ENT_QUOTES, 'UTF-8') . '" min="' . htmlspecialchars($custom['params']['min'], ENT_QUOTES, 'UTF-8') . '" max="' . htmlspecialchars($custom['params']['max'], ENT_QUOTES, 'UTF-8') . '" /></dd>
	</dl>
';
}
else if ($custom['type'] == ('onoff'))
{
$__compilerVar12 .= '
	<dl class="ctrlUnit">
		<dt></dt>
		<dd><label for="' . htmlspecialchars($__compilerVar10, ENT_QUOTES, 'UTF-8') . '"><input type="checkbox" name="' . htmlspecialchars($__compilerVar11, ENT_QUOTES, 'UTF-8') . '[]" value="1" id="' . htmlspecialchars($__compilerVar10, ENT_QUOTES, 'UTF-8') . '"
			' . (($custom['value']) ? ' checked="checked"' : '') . ' /> ' . htmlspecialchars($custom['name'], ENT_QUOTES, 'UTF-8') . '</label></dd>
	</dl>
';
}
else if ($custom['type'] == ('radio'))
{
$__compilerVar12 .= '
	<dl class="ctrlUnit">
		<dt>' . htmlspecialchars($custom['name'], ENT_QUOTES, 'UTF-8') . ':</dt>
		<dd><label for="ctrl_unspecified"><input type="radio" name="' . htmlspecialchars($__compilerVar11, ENT_QUOTES, 'UTF-8') . '[]" value="" id="ctrl_unspecified" /> (' . 'Không xác định' . ')</label><br />
			';
foreach ($custom['params'] AS $radio)
{
$__compilerVar12 .= '
				<label for="ctrl_' . htmlspecialchars($radio['id'], ENT_QUOTES, 'UTF-8') . '"><input type="radio" name="' . htmlspecialchars($__compilerVar11, ENT_QUOTES, 'UTF-8') . '[]" value="' . htmlspecialchars($radio['id'], ENT_QUOTES, 'UTF-8') . '" id="ctrl_' . htmlspecialchars($radio['id'], ENT_QUOTES, 'UTF-8') . '"
					' . (($radio['id'] == $custom['value']) ? ' checked="checked"' : '') . ' /> ' . htmlspecialchars($radio['val'], ENT_QUOTES, 'UTF-8') . '</label><br />
			';
}
$__compilerVar12 .= '</dd>
	</dl>
';
}
else if ($custom['type'] == ('select'))
{
$__compilerVar12 .= '
	<dl class="ctrlUnit">
		<dt><label for="' . htmlspecialchars($__compilerVar10, ENT_QUOTES, 'UTF-8') . '">' . htmlspecialchars($custom['name'], ENT_QUOTES, 'UTF-8') . ':</label></dt>
		<dd><select name="' . htmlspecialchars($__compilerVar11, ENT_QUOTES, 'UTF-8') . '[]" id="' . htmlspecialchars($__compilerVar10, ENT_QUOTES, 'UTF-8') . '" class="textCtrl autoSize">
			<option value="">(' . 'Không xác định' . ')</option>' . htmlspecialchars($custom['value'], ENT_QUOTES, 'UTF-8') . '
			';
foreach ($custom['params'] AS $select)
{
$__compilerVar12 .= '
				<option value="' . htmlspecialchars($select['id'], ENT_QUOTES, 'UTF-8') . '" ' . (($custom['value'] == $select['id']) ? ' selected="selected"' : '') . '>' . htmlspecialchars($select['val'], ENT_QUOTES, 'UTF-8') . '</option>
			';
}
$__compilerVar12 .= '
		</select></dd>
	</dl>
';
}
else if ($custom['type'] == ('checkbox'))
{
$__compilerVar12 .= '
	<dl class="ctrlUnit">
		<dt>' . htmlspecialchars($custom['name'], ENT_QUOTES, 'UTF-8') . ':</dt>
		<dd>';
foreach ($custom['params'] AS $check)
{
$__compilerVar12 .= '
			<label for="ctrl_' . htmlspecialchars($check['id'], ENT_QUOTES, 'UTF-8') . '"><input type="checkbox" name="' . htmlspecialchars($__compilerVar11, ENT_QUOTES, 'UTF-8') . '[]" value="' . htmlspecialchars($check['id'], ENT_QUOTES, 'UTF-8') . '" id="ctrl_' . htmlspecialchars($check['id'], ENT_QUOTES, 'UTF-8') . '"
				' . (($check['checked']) ? ' checked="checked"' : '') . ' /> ' . htmlspecialchars($check['val'], ENT_QUOTES, 'UTF-8') . '</label><br />
		';
}
$__compilerVar12 .= '</dd>
	</dl>
';
}
$__compilerVar9 .= $__compilerVar12;
unset($__compilerVar10, $__compilerVar11, $__compilerVar12);
$__compilerVar9 .= '
			';
}
$__compilerVar9 .= '
			';
if (trim($__compilerVar9) !== '')
{
$__output .= '
		<fieldset>
			' . $__compilerVar9 . '			
		</fieldset>
		';
}
unset($__compilerVar9);
$__output .= '

		<fieldset>
			';
$__compilerVar13 = '';
$__compilerVar13 .= '
					';
foreach ($keylinks AS $keylink)
{
$__compilerVar13 .= '
						<li>
							<label for="ctrl_keylinks[' . htmlspecialchars($keylink['keylink_id'], ENT_QUOTES, 'UTF-8') . ']">
								<input type="checkbox" name="media_keylinks[' . htmlspecialchars($keylink['keylink_id'], ENT_QUOTES, 'UTF-8') . ']" value="' . htmlspecialchars($keylink['keyword_text'], ENT_QUOTES, 'UTF-8') . '" id="ctrl_keylinks[' . htmlspecialchars($keylink['keylink_id'], ENT_QUOTES, 'UTF-8') . ']" checked="checked">
								<input type="hidden" name="media_oldlinks[' . htmlspecialchars($keylink['keylink_id'], ENT_QUOTES, 'UTF-8') . ']" value="' . htmlspecialchars($keylink['keyword_text'], ENT_QUOTES, 'UTF-8') . '">
								' . htmlspecialchars($keylink['keyword_text'], ENT_QUOTES, 'UTF-8') . '
							</label>
						</li>
					';
}
$__compilerVar13 .= '
					';
if (trim($__compilerVar13) !== '')
{
$__output .= '
			<dl class="ctrlUnit fullWidth mediaKeywords">
				<dt></dt>
				<dd>
					<ul>
					' . $__compilerVar13 . '
					</ul>
				</dd>
			</dl>
			';
}
unset($__compilerVar13);
$__output .= '

			';
if ($xenOptions['EWRmedio_newkeywords'])
{
$__output .= '
				<dl class="ctrlUnit">
					<dt><label for="ctrl_keywords">' . 'Keywords' . ':</label></dt>
					<dd><input type="text" name="media_keywords" class="textCtrl KeywordEdit" id="ctrl_keywords" value="" />
						<li><p class="hint">' . 'Each keyword should be separated with a comma. ( , )' . '</p></li>
					</dd>
				</dl>
			';
}
else
{
$__output .= '
				';
$__compilerVar14 = '';
$__compilerVar14 .= '
						';
foreach ($keywords AS $keyword)
{
$__compilerVar14 .= '
							<li>
								<label for="ctrl_keyarray[' . htmlspecialchars($keyword['keyword_id'], ENT_QUOTES, 'UTF-8') . ']">
									<input type="checkbox" name="media_keyarray[' . htmlspecialchars($keyword['keyword_id'], ENT_QUOTES, 'UTF-8') . ']" value="' . htmlspecialchars($keyword['keyword_text'], ENT_QUOTES, 'UTF-8') . '" id="ctrl_keyarray[' . htmlspecialchars($keyword['keyword_id'], ENT_QUOTES, 'UTF-8') . ']">
									' . htmlspecialchars($keyword['keyword_text'], ENT_QUOTES, 'UTF-8') . '
								</label>
							</li>
						';
}
$__compilerVar14 .= '
						';
if (trim($__compilerVar14) !== '')
{
$__output .= '
				<dl class="ctrlUnit fullWidth mediaKeywords">
					<dt></dt>
					<dd>
						<ul>
						' . $__compilerVar14 . '
						</ul>
					</dd>
				</dl>
				';
}
unset($__compilerVar14);
$__output .= '
				<input type="hidden" name="media_keywords" id="ctrl_keywords" value=""  />
			';
}
$__output .= '
		</fieldset>

		';
$__compilerVar15 = '';
if ($captcha)
{
$__compilerVar15 .= '
	<dl class="ctrlUnit">
		<dt>' . 'Mã xác nhận' . ':</dt>
		<dd>' . $captcha . '</dd>
	</dl>
';
}
$__output .= $__compilerVar15;
unset($__compilerVar15);
$__output .= '

		<dl class="ctrlUnit submitUnit">
			<dt></dt>
			<dd>
				<input type="submit" value="' . 'Save Media' . '" name="submit" accesskey="s" class="button primary" />
				<a href="' . XenForo_Template_Helper_Core::link('media/delete', $media, array()) . '" type="button" class="button OverlayTrigger">' . 'Delete Media' . '...</a>
			</dd>
		</dl>

		<input type="hidden" name="_xfToken" value="' . htmlspecialchars($visitor['csrf_token_page'], ENT_QUOTES, 'UTF-8') . '" />
	</form>
</div>

<div class="sectionMain">
	<form action="' . XenForo_Template_Helper_Core::link('media/thumb', $media, array()) . '" method="post" class="xenForm" enctype="multipart/form-data">
		<dl class="ctrlUnit">
			<dt><img src="' . XenForo_Template_Helper_Core::callHelper('medio', array(
'0' => $media
)) . '" border="0" alt="' . htmlspecialchars($media['media_title'], ENT_QUOTES, 'UTF-8') . '" /></dt>
			<dd><br /><input type="file" name="upload_file" class="textCtrl" /><br />
			<br /><input type="submit" value="' . 'Upload New Thumbnail' . '" name="submit" accesskey="s" class="button primary" /></dd>
		</dl>

		<input type="hidden" name="_xfToken" value="' . htmlspecialchars($visitor['csrf_token_page'], ENT_QUOTES, 'UTF-8') . '" />
	</form>
</div>

';
$__compilerVar16 = '';
$__compilerVar16 .= '<div class="medioCopy copyright muted">
	<a href="http://xenforo.com/community/resources/97/">XenMedio</a>
	&copy; Jason Axelrod from <a href="http://8wayrun.com/">8WAYRUN.COM</a>
</div>';
$__output .= $__compilerVar16;
unset($__compilerVar16);
