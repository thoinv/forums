<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__extraData['title'] = '';
$__extraData['title'] .= 'Submit YouTube Channel';
$__output .= '
';
$__extraData['h1'] = '';
$__extraData['h1'] .= 'Submit YouTube Channel';
$__output .= '

';
$this->addRequiredExternal('css', 'EWRmedio');
$__output .= '

<div class="sectionMain">
	<form action="' . XenForo_Template_Helper_Core::link('media/submit-youtube', false, array()) . '" method="post" class="xenForm" style="text-align: center; width: auto;">
		<select name="gettype" class="textCtrl autoSize">
			<option value="channel" ' . (($input['gettype'] == ('channel')) ? ('selected') : ('')) . '>Channel</option>
			<option value="playlist" ' . (($input['gettype'] == ('playlist')) ? ('selected') : ('')) . '>Playlist ID</option>
		</select> :
		<input type="text" name="channel" class="textCtrl" id="ctrl_source" value="' . htmlspecialchars($input['channel'], ENT_QUOTES, 'UTF-8') . '" style="width: 150px;" /> &nbsp; &nbsp;
		<b>start:</b>
		<input type="text" size="1" name="startin" value="' . (($input['startin']) ? (htmlspecialchars($input['startin'], ENT_QUOTES, 'UTF-8')) : ('1')) . '" class="textCtrl autoSize SpinBox" step="50" max="951" min="1" /> &nbsp; &nbsp;
		<b>results:</b>
		<input type="text" size="1" name="results" value="' . (($input['results']) ? (htmlspecialchars($input['results'], ENT_QUOTES, 'UTF-8')) : ('25')) . '" class="textCtrl autoSize SpinBox" step="5" max="50" min="1" /> &nbsp; &nbsp;
		<input type="submit" value="' . 'Retrieve Information' . '" name="submit" accesskey="s" class="button primary" />
		<input type="hidden" name="_xfToken" value="' . htmlspecialchars($visitor['csrf_token_page'], ENT_QUOTES, 'UTF-8') . '" />
	</form>
</div>

';
if ($mediaList)
{
$__output .= '
<div class="sectionMain">
	<form action="' . XenForo_Template_Helper_Core::link('media/submit-youtube-feed', false, array()) . '" method="post" class="xenForm AutoValidator" data-redirect="true">

		<dl class="ctrlUnit">
			<dt><label for="ctrl_category">' . 'Category' . ':</label></dt>
			<dd><select name="category_id" id="ctrl_category" class="textCtrl autoSize">
				<option value="0">(' . 'Không xác định' . ')</option>
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

		';
$__compilerVar5 = '';
$__compilerVar5 .= '
			';
foreach ($customs AS $customID => $custom)
{
$__compilerVar5 .= '
				';
$__compilerVar6 = '';
$__compilerVar6 .= 'ctrl_' . htmlspecialchars($customID, ENT_QUOTES, 'UTF-8');
$__compilerVar7 = '';
$__compilerVar7 .= 'media_' . htmlspecialchars($customID, ENT_QUOTES, 'UTF-8');
$__compilerVar8 = '';
if ($custom['type'] == ('textbox'))
{
$__compilerVar8 .= '
	<dl class="ctrlUnit">
		<dt><label for="' . htmlspecialchars($__compilerVar6, ENT_QUOTES, 'UTF-8') . '">' . htmlspecialchars($custom['name'], ENT_QUOTES, 'UTF-8') . ':</label></dt>
		<dd><input type="text" name="' . htmlspecialchars($__compilerVar7, ENT_QUOTES, 'UTF-8') . '[]" class="textCtrl" id="' . htmlspecialchars($__compilerVar6, ENT_QUOTES, 'UTF-8') . '" value="' . htmlspecialchars($custom['value'], ENT_QUOTES, 'UTF-8') . '" /></dd>
	</dl>
';
}
else if ($custom['type'] == ('spinbox'))
{
$__compilerVar8 .= '
	<dl class="ctrlUnit">
		<dt><label for="' . htmlspecialchars($__compilerVar6, ENT_QUOTES, 'UTF-8') . '">' . htmlspecialchars($custom['name'], ENT_QUOTES, 'UTF-8') . ':</label></dt>
		<dd><input type="text" size="1" name="' . htmlspecialchars($__compilerVar7, ENT_QUOTES, 'UTF-8') . '[]" value="' . htmlspecialchars($custom['value'], ENT_QUOTES, 'UTF-8') . '" class="textCtrl autoSize SpinBox"
			id="' . htmlspecialchars($__compilerVar6, ENT_QUOTES, 'UTF-8') . '" step="' . htmlspecialchars($custom['params']['step'], ENT_QUOTES, 'UTF-8') . '" min="' . htmlspecialchars($custom['params']['min'], ENT_QUOTES, 'UTF-8') . '" max="' . htmlspecialchars($custom['params']['max'], ENT_QUOTES, 'UTF-8') . '" /></dd>
	</dl>
';
}
else if ($custom['type'] == ('onoff'))
{
$__compilerVar8 .= '
	<dl class="ctrlUnit">
		<dt></dt>
		<dd><label for="' . htmlspecialchars($__compilerVar6, ENT_QUOTES, 'UTF-8') . '"><input type="checkbox" name="' . htmlspecialchars($__compilerVar7, ENT_QUOTES, 'UTF-8') . '[]" value="1" id="' . htmlspecialchars($__compilerVar6, ENT_QUOTES, 'UTF-8') . '"
			' . (($custom['value']) ? ' checked="checked"' : '') . ' /> ' . htmlspecialchars($custom['name'], ENT_QUOTES, 'UTF-8') . '</label></dd>
	</dl>
';
}
else if ($custom['type'] == ('radio'))
{
$__compilerVar8 .= '
	<dl class="ctrlUnit">
		<dt>' . htmlspecialchars($custom['name'], ENT_QUOTES, 'UTF-8') . ':</dt>
		<dd><label for="ctrl_unspecified"><input type="radio" name="' . htmlspecialchars($__compilerVar7, ENT_QUOTES, 'UTF-8') . '[]" value="" id="ctrl_unspecified" /> (' . 'Không xác định' . ')</label><br />
			';
foreach ($custom['params'] AS $radio)
{
$__compilerVar8 .= '
				<label for="ctrl_' . htmlspecialchars($radio['id'], ENT_QUOTES, 'UTF-8') . '"><input type="radio" name="' . htmlspecialchars($__compilerVar7, ENT_QUOTES, 'UTF-8') . '[]" value="' . htmlspecialchars($radio['id'], ENT_QUOTES, 'UTF-8') . '" id="ctrl_' . htmlspecialchars($radio['id'], ENT_QUOTES, 'UTF-8') . '"
					' . (($radio['id'] == $custom['value']) ? ' checked="checked"' : '') . ' /> ' . htmlspecialchars($radio['val'], ENT_QUOTES, 'UTF-8') . '</label><br />
			';
}
$__compilerVar8 .= '</dd>
	</dl>
';
}
else if ($custom['type'] == ('select'))
{
$__compilerVar8 .= '
	<dl class="ctrlUnit">
		<dt><label for="' . htmlspecialchars($__compilerVar6, ENT_QUOTES, 'UTF-8') . '">' . htmlspecialchars($custom['name'], ENT_QUOTES, 'UTF-8') . ':</label></dt>
		<dd><select name="' . htmlspecialchars($__compilerVar7, ENT_QUOTES, 'UTF-8') . '[]" id="' . htmlspecialchars($__compilerVar6, ENT_QUOTES, 'UTF-8') . '" class="textCtrl autoSize">
			<option value="">(' . 'Không xác định' . ')</option>' . htmlspecialchars($custom['value'], ENT_QUOTES, 'UTF-8') . '
			';
foreach ($custom['params'] AS $select)
{
$__compilerVar8 .= '
				<option value="' . htmlspecialchars($select['id'], ENT_QUOTES, 'UTF-8') . '" ' . (($custom['value'] == $select['id']) ? ' selected="selected"' : '') . '>' . htmlspecialchars($select['val'], ENT_QUOTES, 'UTF-8') . '</option>
			';
}
$__compilerVar8 .= '
		</select></dd>
	</dl>
';
}
else if ($custom['type'] == ('checkbox'))
{
$__compilerVar8 .= '
	<dl class="ctrlUnit">
		<dt>' . htmlspecialchars($custom['name'], ENT_QUOTES, 'UTF-8') . ':</dt>
		<dd>';
foreach ($custom['params'] AS $check)
{
$__compilerVar8 .= '
			<label for="ctrl_' . htmlspecialchars($check['id'], ENT_QUOTES, 'UTF-8') . '"><input type="checkbox" name="' . htmlspecialchars($__compilerVar7, ENT_QUOTES, 'UTF-8') . '[]" value="' . htmlspecialchars($check['id'], ENT_QUOTES, 'UTF-8') . '" id="ctrl_' . htmlspecialchars($check['id'], ENT_QUOTES, 'UTF-8') . '"
				' . (($check['checked']) ? ' checked="checked"' : '') . ' /> ' . htmlspecialchars($check['val'], ENT_QUOTES, 'UTF-8') . '</label><br />
		';
}
$__compilerVar8 .= '</dd>
	</dl>
';
}
$__compilerVar5 .= $__compilerVar8;
unset($__compilerVar6, $__compilerVar7, $__compilerVar8);
$__compilerVar5 .= '
			';
}
$__compilerVar5 .= '
			';
if (trim($__compilerVar5) !== '')
{
$__output .= '
		<fieldset>
			' . $__compilerVar5 . '			
		</fieldset>
		';
}
unset($__compilerVar5);
$__output .= '

		';
foreach ($mediaList AS $media)
{
$__output .= '
			<fieldset style="position: relative;">
				';
if ($media['exists'])
{
$__output .= '
					<dl class="ctrlUnit">
						<dt>' . 'Tiêu đề' . ':</dt>
						<dd><span class="muted" style="text-decoration: line-through;"><a href="' . htmlspecialchars($media['source'], ENT_QUOTES, 'UTF-8') . '" target="_blank">' . htmlspecialchars($media['title'], ENT_QUOTES, 'UTF-8') . '</a></span></dd>
					</dl>
				';
}
else
{
$__output .= '
					<div style="position: absolute; top: 10px; left: 80px;"><img src="' . htmlspecialchars($media['thumb'], ENT_QUOTES, 'UTF-8') . '" height="60" /></div>

					<label for="ctrl_media[' . htmlspecialchars($media['id'], ENT_QUOTES, 'UTF-8') . ']"><dl class="ctrlUnit">
						<dt>' . 'Tiêu đề' . ':
							<div style="padding: 8px;"><input type="checkbox" name="media[' . htmlspecialchars($media['id'], ENT_QUOTES, 'UTF-8') . ']" value="' . htmlspecialchars($media['source'], ENT_QUOTES, 'UTF-8') . '" id="ctrl_media[' . htmlspecialchars($media['id'], ENT_QUOTES, 'UTF-8') . ']" checked="checked"></div>
						</dt>
						<dd><a href="' . htmlspecialchars($media['source'], ENT_QUOTES, 'UTF-8') . '" target="_blank">' . htmlspecialchars($media['title'], ENT_QUOTES, 'UTF-8') . '</a>
							<p class="hint">' . htmlspecialchars($media['desc'], ENT_QUOTES, 'UTF-8') . '</p>
						</dd>
					</dl></label>
				';
}
$__output .= '
			</fieldset>
		';
}
$__output .= '

		<dl class="ctrlUnit">
			<dt><label for="ctrl_playlist">' . 'Add To Playlist' . ':</label></dt>
			<dd><select name="playlist_id" id="ctrl_playlist" class="textCtrl autoSize">
				<option value="0">(' . 'Không xác định' . ')</option>
				';
if ($playlistList)
{
$__output .= '
					';
foreach ($playlistList AS $list)
{
$__output .= '
						<option value="' . htmlspecialchars($list['playlist_id'], ENT_QUOTES, 'UTF-8') . '">&nbsp; &nbsp; ' . $list['playlist_name'] . '</option>
					';
}
$__output .= '
				';
}
$__output .= '
			</select></dd>
		</dl>

		<dl class="ctrlUnit submitUnit">
			<dt></dt>
			<dd>
				<input type="submit" value="' . 'Save Media' . '" name="submit" accesskey="s" class="button primary" />
			</dd>
		</dl>

		<input type="hidden" name="_xfToken" value="' . htmlspecialchars($visitor['csrf_token_page'], ENT_QUOTES, 'UTF-8') . '" />
	</form>
</div>
';
}
