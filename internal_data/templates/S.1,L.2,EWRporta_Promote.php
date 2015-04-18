<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__extraData['title'] = '';
$__extraData['title'] .= 'Promote Thread' . ': ' . htmlspecialchars($thread['title'], ENT_QUOTES, 'UTF-8');
$__output .= '

';
$__extraData['navigation'] = array();
$__extraData['navigation'] = XenForo_Template_Helper_Core::appendBreadCrumbs($__extraData['navigation'], $nodeBreadCrumbs);
$__extraData['navigation'][] = array('href' => XenForo_Template_Helper_Core::link('full:threads', $thread, array()), 'value' => htmlspecialchars($thread['title'], ENT_QUOTES, 'UTF-8'));
$__output .= '

';
$this->addRequiredExternal('css', 'EWRporta');
$__output .= '

<form action="' . XenForo_Template_Helper_Core::link('threads/promote', $thread, array()) . '" method="post" class="xenForm formOverlay">

	<dl class="ctrlUnit">
		<dt><label>' . 'Promotion Icon' . ':</label></dt>
		<dd><ul>
			<li>
				<label for="ctrl_default"><input type="radio" name="promote_icon" value="default" id="ctrl_default" ' . (($threadPromote['promote_icon'] == ('default')) ? ' checked="checked"' : '') . ' /> ' . 'Default Promotion Hierarchy

' . '</label>
			</li>
			<li>
				<label for="ctrl_avatar"><input type="radio" name="promote_icon" value="avatar" id="ctrl_avatar" ' . (($threadPromote['promote_icon'] == ('avatar')) ? ' checked="checked"' : '') . ' /> ' . 'Avatar' . ': ' . XenForo_Template_Helper_Core::callHelper('usernamehtml', array($thread,'',false,array())) . '</label>
			</li>

			';
$__compilerVar4 = '';
$__compilerVar4 .= '
							';
foreach ($icons['attachments'] AS $attach)
{
$__compilerVar4 .= '
								<option value="' . htmlspecialchars($attach['attachment_id'], ENT_QUOTES, 'UTF-8') . '" ' . (($threadPromote['promote_data'] == $attach['attachment_id']) ? ('selected=selected') : ('')) . '>' . htmlspecialchars($attach['attachment_id'], ENT_QUOTES, 'UTF-8') . ' -> ' . htmlspecialchars($attach['filename'], ENT_QUOTES, 'UTF-8') . '</option>
							';
}
$__compilerVar4 .= '
							';
if (trim($__compilerVar4) !== '')
{
$__output .= '
			<li><label for="ctrl_attach"><input type="radio" name="promote_icon" value="attach" class="Disabler" id="ctrl_attach" ' . (($threadPromote['promote_icon'] == ('attach')) ? ' checked="checked"' : '') . ' /> ' . 'Các file đính kèm' . ':</label>
				<ul id="ctrl_attach_Disabler">
					<li>
						<select name="attach_data" class="textCtrl autoSize">
							' . $__compilerVar4 . '
						</select>
					</li>
				</ul>
			</li>
			';
}
unset($__compilerVar4);
$__output .= '

			';
$__compilerVar5 = '';
$__compilerVar5 .= '
							';
foreach ($icons['imageEmbeds'] AS $image)
{
$__compilerVar5 .= '
								<option value="' . htmlspecialchars($image['imageurl'], ENT_QUOTES, 'UTF-8') . '" ' . (($threadPromote['promote_data'] == $image['imageurl']) ? ('selected=selected') : ('')) . '>' . htmlspecialchars($image['server'], ENT_QUOTES, 'UTF-8') . ' -> ' . htmlspecialchars($image['filename'], ENT_QUOTES, 'UTF-8') . '</option>
							';
}
$__compilerVar5 .= '
							';
if (trim($__compilerVar5) !== '')
{
$__output .= '
			<li><label for="ctrl_image"><input type="radio" name="promote_icon" value="image" class="Disabler" id="ctrl_image" ' . (($threadPromote['promote_icon'] == ('image')) ? ' checked="checked"' : '') . ' /> ' . 'Embedded Images' . ':</label>
				<ul id="ctrl_image_Disabler">
					<li>
						<select name="image_data" class="textCtrl autoSize">
							' . $__compilerVar5 . '
						</select>
					</li>
				</ul>
			</li>
			';
}
unset($__compilerVar5);
$__output .= '

			';
$__compilerVar6 = '';
$__compilerVar6 .= '
							';
foreach ($icons['medioEmbeds'] AS $media)
{
$__compilerVar6 .= '
								<option value="' . htmlspecialchars($media['media_id'], ENT_QUOTES, 'UTF-8') . '" ' . (($threadPromote['promote_data'] == $media['media_id']) ? ('selected=selected') : ('')) . '>' . htmlspecialchars($media['media_id'], ENT_QUOTES, 'UTF-8') . ' -> ' . htmlspecialchars($media['media_title'], ENT_QUOTES, 'UTF-8') . '</option>
							';
}
$__compilerVar6 .= '
							';
if (trim($__compilerVar6) !== '')
{
$__output .= '
			<li><label for="ctrl_medio"><input type="radio" name="promote_icon" value="medio" class="Disabler" id="ctrl_medio" ' . (($threadPromote['promote_icon'] == ('medio')) ? ' checked="checked"' : '') . ' /> XenMedio ' . 'Media' . ':</label>
				<ul id="ctrl_medio_Disabler">
					<li>
						<select name="medio_data" class="textCtrl autoSize">
							' . $__compilerVar6 . '
						</select>
					</li>
				</ul>
			</li>
			';
}
unset($__compilerVar6);
$__output .= '

			<li>
				<label for="ctrl_disabled"><input type="radio" name="promote_icon" value="disabled" id="ctrl_disabled" ' . (($threadPromote['promote_icon'] == ('disabled')) ? ' checked="checked"' : '') . ' /> ' . 'Disable Promotion Icon' . '</label>
			</li>
		</ul></dd>
	</dl>

	<dl class="ctrlUnit">
		<dt><label>' . 'Promotion Date' . ':</label></dt>
		<dd>
			<input type="hidden" name="zone" value="' . htmlspecialchars($datetime['zone'], ENT_QUOTES, 'UTF-8') . '" />
			<input type="date" size="10" name="date" class="textCtrl autoSize" value="' . htmlspecialchars($datetime['date'], ENT_QUOTES, 'UTF-8') . '" />

			<select name="hour" class="textCtrl autoSize">
				<option value="12" ' . (($datetime['hour'] == ('12')) ? ' selected="selected"' : '') . '>12</option>
				<option value="01" ' . (($datetime['hour'] == ('01')) ? ' selected="selected"' : '') . '>01</option>
				<option value="02" ' . (($datetime['hour'] == ('02')) ? ' selected="selected"' : '') . '>02</option>
				<option value="03" ' . (($datetime['hour'] == ('03')) ? ' selected="selected"' : '') . '>03</option>
				<option value="04" ' . (($datetime['hour'] == ('04')) ? ' selected="selected"' : '') . '>04</option>
				<option value="05" ' . (($datetime['hour'] == ('05')) ? ' selected="selected"' : '') . '>05</option>
				<option value="06" ' . (($datetime['hour'] == ('06')) ? ' selected="selected"' : '') . '>06</option>
				<option value="07" ' . (($datetime['hour'] == ('07')) ? ' selected="selected"' : '') . '>07</option>
				<option value="08" ' . (($datetime['hour'] == ('08')) ? ' selected="selected"' : '') . '>08</option>
				<option value="09" ' . (($datetime['hour'] == ('09')) ? ' selected="selected"' : '') . '>09</option>
				<option value="10" ' . (($datetime['hour'] == ('10')) ? ' selected="selected"' : '') . '>10</option>
				<option value="11" ' . (($datetime['hour'] == ('11')) ? ' selected="selected"' : '') . '>11</option>
			</select>:<input type="text" size="1" name="mins" value="' . htmlspecialchars($datetime['mins'], ENT_QUOTES, 'UTF-8') . '" class="textCtrl autoSize SpinBox" step="15" max="59" min="0" />

			<select name="ampm" class="textCtrl autoSize">
				<option value="AM" ' . (($datetime['meri'] == ('AM')) ? ' selected="selected"' : '') . '>AM</option>
				<option value="PM" ' . (($datetime['meri'] == ('PM')) ? ' selected="selected"' : '') . '>PM</option>
			</select>

			' . htmlspecialchars($datetime['zone'], ENT_QUOTES, 'UTF-8') . '

			<p class="explain">' . 'Promotions are ordered by the time of their promotion.' . '</p>
		</dd>
	</dl>

	<dl class="ctrlUnit submitUnit">
		<dt></dt>
		<dd>
			<input type="submit" value="' . 'Promote Thread' . '" class="button primary" />

			';
if ($threadPromote)
{
$__output .= '
				<input type="submit" value="' . 'Delete Promotion' . '" name="delete" class="button" />
			';
}
$__output .= '
		</dd>
	</dl>

	<input type="hidden" name="_xfToken" value="' . htmlspecialchars($visitor['csrf_token_page'], ENT_QUOTES, 'UTF-8') . '" />
</form>';
