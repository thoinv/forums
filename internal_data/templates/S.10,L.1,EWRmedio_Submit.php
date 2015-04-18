<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__extraData['title'] = '';
$__extraData['title'] .= 'Submit Media';
$__output .= '
';
$__extraData['h1'] = '';
$__extraData['h1'] .= 'Submit Media';
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
	<form action="' . XenForo_Template_Helper_Core::link('media/submit', false, array()) . '" method="post" class="xenForm" style="text-align: center; width: auto;">
		<b>' . 'Media URL' . ':</b> &nbsp; &nbsp;
		<input type="text" name="source" class="textCtrl" id="ctrl_source" value="' . htmlspecialchars($media['service_url'], ENT_QUOTES, 'UTF-8') . '" style="width: 300px;" /> &nbsp; &nbsp;
		<input type="submit" value="' . 'Retrieve Information' . '" name="submit" accesskey="s" class="button primary" />
		<input type="hidden" name="_xfToken" value="' . htmlspecialchars($visitor['csrf_token_page'], ENT_QUOTES, 'UTF-8') . '" />
	</form>
</div>

';
if ($media['error'])
{
$__output .= '
<div class="sectionMain">
	<div class="primaryContent" style="text-align: center; font-size: 1.5em;"><b>' . htmlspecialchars($media['error'], ENT_QUOTES, 'UTF-8') . '</b></div>
</div>
';
}
$__output .= '

';
if ($media['media_thumb'])
{
$__output .= '
<div class="sectionMain">
	<form action="' . XenForo_Template_Helper_Core::link('media/submit', false, array()) . '" method="post" class="xenForm AutoValidator" data-redirect="true">
		<div style="text-align: center;">
			';
$__compilerVar1 = '';
$__compilerVar1 .= '<div style="text-align: center;">
<div id="embed_player">
	';
if ($media['service_movie'])
{
$__compilerVar1 .= '
		<object type="application/x-shockwave-flash" width="' . htmlspecialchars($media['service_width'], ENT_QUOTES, 'UTF-8') . '" height="' . htmlspecialchars($media['service_height'], ENT_QUOTES, 'UTF-8') . '" data="' . htmlspecialchars($media['service_movie'], ENT_QUOTES, 'UTF-8') . '">
			<param name="movie" value="' . htmlspecialchars($media['service_movie'], ENT_QUOTES, 'UTF-8') . '" />
			<param name="allowfullscreen" value="true" />
			<param name="allowscriptaccess" value="true" />
			<param name="wmode" value="transparent" />
			<param name="flashvars" value="' . htmlspecialchars($media['service_flashvars'], ENT_QUOTES, 'UTF-8') . '" />
			' . $media['service_parameters'] . '
		</object>
	';
}
else
{
$__compilerVar1 .= '
		' . $media['service_parameters'] . '
	';
}
$__compilerVar1 .= '
</div>
</div>';
$__output .= $__compilerVar1;
unset($__compilerVar1);
$__output .= '
		</div>

		<fieldset style="position: relative;">
			<div style="position: absolute; top: 10px; left: 40px;"><img src="' . htmlspecialchars($media['media_thumb'], ENT_QUOTES, 'UTF-8') . '" height="70" /></div>

			<dl class="ctrlUnit">
				<dt><label for="ctrl_title">' . 'Title' . ':</label></dt>
				<dd><input type="text" name="media_title" class="textCtrl" id="ctrl_title" value="' . htmlspecialchars($media['media_title'], ENT_QUOTES, 'UTF-8') . '" /></dd>
			</dl>

			<dl class="ctrlUnit">
				<dt><label for="ctrl_category">' . 'Category' . ':</label></dt>
				<dd><select name="category_id" id="ctrl_category" class="textCtrl autoSize">
					<option value="0">(' . 'unspecified' . ')</option>
					';
foreach ($fullList AS $list)
{
$__output .= '
						<option value="' . htmlspecialchars($list['category_id'], ENT_QUOTES, 'UTF-8') . '" ' . (($list['category_disabled']) ? ('disabled') : ('')) . '>
						&nbsp; &nbsp; ' . $list['category_indent'] . $list['category_name'] . '</option>
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
				<dt><label for="ctrl_minutes">' . 'Duration' . ':</label></dt>
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
						<input type="text" name="media_hours" class="textCtrl" maxlength="2" id="ctrl_hours" value="' . htmlspecialchars($media['media_hours'], ENT_QUOTES, 'UTF-8') . '" style="width: 18px; text-align: right;" />&nbsp; ' . '' . '' . ' hours' . ' &nbsp;
						<input type="text" name="media_minutes" class="textCtrl" maxlength="2" id="ctrl_minutes" value="' . htmlspecialchars($media['media_minutes'], ENT_QUOTES, 'UTF-8') . '" style="width: 18px; text-align: right;" />&nbsp; ' . '' . '' . ' minutes' . ' &nbsp;
						<input type="text" name="media_seconds" class="textCtrl" maxlength="2" id="ctrl_seconds" value="' . htmlspecialchars($media['media_seconds'], ENT_QUOTES, 'UTF-8') . '" style="width: 18px; text-align: right;" />&nbsp; ' . '' . '' . ' seconds' . '
					';
}
$__output .= '
				</dd>
			</dl>
		</fieldset>

		';
$__compilerVar2 = '';
$__compilerVar2 .= '
			';
foreach ($customs AS $customID => $custom)
{
$__compilerVar2 .= '
				';
$__compilerVar3 = '';
$__compilerVar3 .= 'ctrl_' . htmlspecialchars($customID, ENT_QUOTES, 'UTF-8');
$__compilerVar4 = '';
$__compilerVar4 .= 'media_' . htmlspecialchars($customID, ENT_QUOTES, 'UTF-8');
$__compilerVar5 = '';
if ($custom['type'] == ('textbox'))
{
$__compilerVar5 .= '
	<dl class="ctrlUnit">
		<dt><label for="' . htmlspecialchars($__compilerVar3, ENT_QUOTES, 'UTF-8') . '">' . htmlspecialchars($custom['name'], ENT_QUOTES, 'UTF-8') . ':</label></dt>
		<dd><input type="text" name="' . htmlspecialchars($__compilerVar4, ENT_QUOTES, 'UTF-8') . '[]" class="textCtrl" id="' . htmlspecialchars($__compilerVar3, ENT_QUOTES, 'UTF-8') . '" value="' . htmlspecialchars($custom['value'], ENT_QUOTES, 'UTF-8') . '" /></dd>
	</dl>
';
}
else if ($custom['type'] == ('spinbox'))
{
$__compilerVar5 .= '
	<dl class="ctrlUnit">
		<dt><label for="' . htmlspecialchars($__compilerVar3, ENT_QUOTES, 'UTF-8') . '">' . htmlspecialchars($custom['name'], ENT_QUOTES, 'UTF-8') . ':</label></dt>
		<dd><input type="text" size="1" name="' . htmlspecialchars($__compilerVar4, ENT_QUOTES, 'UTF-8') . '[]" value="' . htmlspecialchars($custom['value'], ENT_QUOTES, 'UTF-8') . '" class="textCtrl autoSize SpinBox"
			id="' . htmlspecialchars($__compilerVar3, ENT_QUOTES, 'UTF-8') . '" step="' . htmlspecialchars($custom['params']['step'], ENT_QUOTES, 'UTF-8') . '" min="' . htmlspecialchars($custom['params']['min'], ENT_QUOTES, 'UTF-8') . '" max="' . htmlspecialchars($custom['params']['max'], ENT_QUOTES, 'UTF-8') . '" /></dd>
	</dl>
';
}
else if ($custom['type'] == ('onoff'))
{
$__compilerVar5 .= '
	<dl class="ctrlUnit">
		<dt></dt>
		<dd><label for="' . htmlspecialchars($__compilerVar3, ENT_QUOTES, 'UTF-8') . '"><input type="checkbox" name="' . htmlspecialchars($__compilerVar4, ENT_QUOTES, 'UTF-8') . '[]" value="1" id="' . htmlspecialchars($__compilerVar3, ENT_QUOTES, 'UTF-8') . '"
			' . (($custom['value']) ? ' checked="checked"' : '') . ' /> ' . htmlspecialchars($custom['name'], ENT_QUOTES, 'UTF-8') . '</label></dd>
	</dl>
';
}
else if ($custom['type'] == ('radio'))
{
$__compilerVar5 .= '
	<dl class="ctrlUnit">
		<dt>' . htmlspecialchars($custom['name'], ENT_QUOTES, 'UTF-8') . ':</dt>
		<dd><label for="ctrl_unspecified"><input type="radio" name="' . htmlspecialchars($__compilerVar4, ENT_QUOTES, 'UTF-8') . '[]" value="" id="ctrl_unspecified" /> (' . 'unspecified' . ')</label><br />
			';
foreach ($custom['params'] AS $radio)
{
$__compilerVar5 .= '
				<label for="ctrl_' . htmlspecialchars($radio['id'], ENT_QUOTES, 'UTF-8') . '"><input type="radio" name="' . htmlspecialchars($__compilerVar4, ENT_QUOTES, 'UTF-8') . '[]" value="' . htmlspecialchars($radio['id'], ENT_QUOTES, 'UTF-8') . '" id="ctrl_' . htmlspecialchars($radio['id'], ENT_QUOTES, 'UTF-8') . '"
					' . (($radio['id'] == $custom['value']) ? ' checked="checked"' : '') . ' /> ' . htmlspecialchars($radio['val'], ENT_QUOTES, 'UTF-8') . '</label><br />
			';
}
$__compilerVar5 .= '</dd>
	</dl>
';
}
else if ($custom['type'] == ('select'))
{
$__compilerVar5 .= '
	<dl class="ctrlUnit">
		<dt><label for="' . htmlspecialchars($__compilerVar3, ENT_QUOTES, 'UTF-8') . '">' . htmlspecialchars($custom['name'], ENT_QUOTES, 'UTF-8') . ':</label></dt>
		<dd><select name="' . htmlspecialchars($__compilerVar4, ENT_QUOTES, 'UTF-8') . '[]" id="' . htmlspecialchars($__compilerVar3, ENT_QUOTES, 'UTF-8') . '" class="textCtrl autoSize">
			<option value="">(' . 'unspecified' . ')</option>' . htmlspecialchars($custom['value'], ENT_QUOTES, 'UTF-8') . '
			';
foreach ($custom['params'] AS $select)
{
$__compilerVar5 .= '
				<option value="' . htmlspecialchars($select['id'], ENT_QUOTES, 'UTF-8') . '" ' . (($custom['value'] == $select['id']) ? ' selected="selected"' : '') . '>' . htmlspecialchars($select['val'], ENT_QUOTES, 'UTF-8') . '</option>
			';
}
$__compilerVar5 .= '
		</select></dd>
	</dl>
';
}
else if ($custom['type'] == ('checkbox'))
{
$__compilerVar5 .= '
	<dl class="ctrlUnit">
		<dt>' . htmlspecialchars($custom['name'], ENT_QUOTES, 'UTF-8') . ':</dt>
		<dd>';
foreach ($custom['params'] AS $check)
{
$__compilerVar5 .= '
			<label for="ctrl_' . htmlspecialchars($check['id'], ENT_QUOTES, 'UTF-8') . '"><input type="checkbox" name="' . htmlspecialchars($__compilerVar4, ENT_QUOTES, 'UTF-8') . '[]" value="' . htmlspecialchars($check['id'], ENT_QUOTES, 'UTF-8') . '" id="ctrl_' . htmlspecialchars($check['id'], ENT_QUOTES, 'UTF-8') . '"
				' . (($check['checked']) ? ' checked="checked"' : '') . ' /> ' . htmlspecialchars($check['val'], ENT_QUOTES, 'UTF-8') . '</label><br />
		';
}
$__compilerVar5 .= '</dd>
	</dl>
';
}
$__compilerVar2 .= $__compilerVar5;
unset($__compilerVar3, $__compilerVar4, $__compilerVar5);
$__compilerVar2 .= '
			';
}
$__compilerVar2 .= '
			';
if (trim($__compilerVar2) !== '')
{
$__output .= '
		<fieldset>
			' . $__compilerVar2 . '			
		</fieldset>
		';
}
unset($__compilerVar2);
$__output .= '

		<fieldset>
			';
if ($xenOptions['EWRmedio_newkeywords'])
{
$__output .= '
				<dl class="ctrlUnit">
					<dt><label for="ctrl_keywords">' . 'Keywords' . ':</label></dt>
					<dd><input type="text" name="media_keywords" class="textCtrl KeywordEdit" id="ctrl_keywords" value="' . htmlspecialchars($media['media_keywords'], ENT_QUOTES, 'UTF-8') . '" />
						<li><p class="hint">' . 'Each keyword should be separated with a comma. ( , )' . '</p></li>
					</dd>
				</dl>
			';
}
else
{
$__output .= '
				';
$__compilerVar6 = '';
$__compilerVar6 .= '
						';
foreach ($keywords AS $keyword)
{
$__compilerVar6 .= '
							<li>
								<label for="ctrl_keyarray[' . htmlspecialchars($keyword['keyword_id'], ENT_QUOTES, 'UTF-8') . ']">
									<input type="checkbox" name="media_keyarray[' . htmlspecialchars($keyword['keyword_id'], ENT_QUOTES, 'UTF-8') . ']" value="' . htmlspecialchars($keyword['keyword_text'], ENT_QUOTES, 'UTF-8') . '" id="ctrl_keyarray[' . htmlspecialchars($keyword['keyword_id'], ENT_QUOTES, 'UTF-8') . ']">
									' . htmlspecialchars($keyword['keyword_text'], ENT_QUOTES, 'UTF-8') . '
								</label>
							</li>
						';
}
$__compilerVar6 .= '
						';
if (trim($__compilerVar6) !== '')
{
$__output .= '
				<dl class="ctrlUnit fullWidth mediaKeywords">
					<dt></dt>
					<dd>
						<ul>
						' . $__compilerVar6 . '
						</ul>
					</dd>
				</dl>
				';
}
unset($__compilerVar6);
$__output .= '
				<input type="hidden" name="media_keywords" id="ctrl_keywords" value=""  />
			';
}
$__output .= '
		</fieldset>

		';
$__compilerVar7 = '';
if ($captcha)
{
$__compilerVar7 .= '
	<dl class="ctrlUnit">
		<dt>' . 'Verification' . ':</dt>
		<dd>' . $captcha . '</dd>
	</dl>
';
}
$__output .= $__compilerVar7;
unset($__compilerVar7);
$__output .= '

		<dl class="ctrlUnit submitUnit">
			<dt></dt>
			<dd>
				<input type="submit" value="' . 'Save Media' . '" name="submit" accesskey="s" class="button primary" />
			</dd>
		</dl>

		';
$__compilerVar8 = '';
$__compilerVar8 .= '
										';
foreach ($forums AS $forum)
{
$__compilerVar8 .= '
											<option value="' . htmlspecialchars($forum['node_id'], ENT_QUOTES, 'UTF-8') . '" ' . (($selected == $forum['node_id']) ? ('selected') : ('')) . '>' . htmlspecialchars($forum['title'], ENT_QUOTES, 'UTF-8') . '</option>
										';
}
$__compilerVar8 .= '
									';
if (trim($__compilerVar8) !== '')
{
$__output .= '
		<fieldset>
			<dl class="ctrlUnit">
				<dt>' . 'Options' . ':</dt>
				<dd><ul>
					<li><label for="ctrl_thread"><input type="checkbox" name="create_thread" value="1" id="ctrl_thread" class="Disabler" ' . htmlspecialchars($checked, ENT_QUOTES, 'UTF-8') . ' /> ' . 'Create Media Thread' . ':</label>
						<ul id="ctrl_thread_Disabler">
							<li>
								<select name="media_node" class="textCtrl autoSize">
									' . $__compilerVar8 . '
								</select>
							</li>
						</ul>
					</li>
				</ul></dd>
			</dl>
		</fieldset>
		';
}
unset($__compilerVar8);
$__output .= '

		<input type="hidden" name="service_id" value="' . htmlspecialchars($media['service_id'], ENT_QUOTES, 'UTF-8') . '" />
		<input type="hidden" name="service_value" value="' . htmlspecialchars($media['service_value'], ENT_QUOTES, 'UTF-8') . '" />
		<input type="hidden" name="service_value2" value="' . htmlspecialchars($media['service_value2'], ENT_QUOTES, 'UTF-8') . '" />
		<input type="hidden" name="media_thumb" value="' . htmlspecialchars($media['media_thumb'], ENT_QUOTES, 'UTF-8') . '" />
		<input type="hidden" name="_xfToken" value="' . htmlspecialchars($visitor['csrf_token_page'], ENT_QUOTES, 'UTF-8') . '" />
	</form>
</div>
';
}
$__output .= '

';
$__compilerVar9 = '';
$__compilerVar9 .= '<div class="medioCopy copyright muted">
	<a href="http://xenforo.com/community/resources/97/">XenMedio</a>
	&copy; Jason Axelrod from <a href="http://8wayrun.com/">8WAYRUN.COM</a>
</div>';
$__output .= $__compilerVar9;
unset($__compilerVar9);
