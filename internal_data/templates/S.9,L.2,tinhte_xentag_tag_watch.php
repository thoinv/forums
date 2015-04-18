<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
if ($tagWatch)
{
$__output .= '
	';
$__extraData['title'] = '';
$__extraData['title'] .= 'Unwatch Tag' . ' - ' . (($tag['tag_title']) ? (htmlspecialchars($tag['tag_title'], ENT_QUOTES, 'UTF-8')) : (htmlspecialchars($tag['tag_text'], ENT_QUOTES, 'UTF-8')));
$__output .= '
	';
$__extraData['h1'] = '';
$__extraData['h1'] .= 'Unwatch Tag';
$__output .= '
';
}
else
{
$__output .= '
	';
$__extraData['title'] = '';
$__extraData['title'] .= 'Watch Tag' . ' - ' . (($tag['tag_title']) ? (htmlspecialchars($tag['tag_title'], ENT_QUOTES, 'UTF-8')) : (htmlspecialchars($tag['tag_text'], ENT_QUOTES, 'UTF-8')));
$__output .= '
	';
$__extraData['h1'] = '';
$__extraData['h1'] .= 'Watch Tag';
$__output .= '
';
}
$__output .= '

';
$__extraData['navigation'] = array();
$__extraData['navigation'][] = array('href' => XenForo_Template_Helper_Core::link('tags', false, array()), 'value' => 'Tags');
$__extraData['navigation'][] = array('href' => XenForo_Template_Helper_Core::link('tags', $tag, array()), 'value' => (($tag['tag_title']) ? (htmlspecialchars($tag['tag_title'], ENT_QUOTES, 'UTF-8')) : (htmlspecialchars($tag['tag_text'], ENT_QUOTES, 'UTF-8'))));
$__output .= '

';
$__extraData['searchBar']['tinhte_xentag'] = '';
$__compilerVar2 = '';
$__compilerVar2 .= '<label><input type="checkbox" name="tinhte_xentag_tags_text_no_include" value="' . htmlspecialchars($tag['tag_text'], ENT_QUOTES, 'UTF-8') . '"
	id="search_bar_tag" class="Disabler AutoChecker" checked="checked"
	/> ' . 'Search threads tagged with ' . htmlspecialchars($tag['tag_text'], ENT_QUOTES, 'UTF-8') . ' only' . '</label>
	<ul id="search_bar_tag_Disabler">
		<li><label><input type="checkbox" name="type[post][group_discussion]" value="1"
			id="search_bar_group_discussion" class="AutoChecker"
			/> ' . 'Hiển thị kết quả dạng Chủ đề' . '</label></li>
	</ul>
<input type="hidden" name="type" value="post" />';
$__extraData['searchBar']['tinhte_xentag'] .= $__compilerVar2;
unset($__compilerVar2);
$__output .= '

<form action="' . XenForo_Template_Helper_Core::link('tags/watch', $tag, array()) . '" method="post" class="xenForm formOverlay AutoValidator">

	';
if ($tagWatch)
{
$__output .= '
		<dl class="ctrlUnit submitUnit">
			<dt></dt>
			<dd>
				<input type="hidden" name="stop" value="stop" />
				<input type="submit" value="' . 'Unwatch Tag' . '" class="button primary" />
			</dd>
		</dl>
	';
}
else
{
$__output .= '
		<dl class="ctrlUnit">
			<dt>' . 'Gửi các thông báo qua' . ':</dt>
			<dd>
				<ul>
					<li>
						<label>
							<input type="checkbox" name="send_alert" value="1" checked="checked" />
							' . 'Thông báo' . '
						</label>
					</li>
					<li>
						<label>
							<input type="checkbox" name="send_email" value="1" />
							' . 'Emails' . '
						</label>
					</li>
				</ul>
			</dd>
		</dl>

		<dl class="ctrlUnit submitUnit">
			<dt></dt>
			<dd>
				<input type="submit" value="' . 'Watch Tag' . '" class="button primary" />
			</dd>
		</dl>
	';
}
$__output .= '

	<input type="hidden" name="_xfToken" value="' . htmlspecialchars($visitor['csrf_token_page'], ENT_QUOTES, 'UTF-8') . '" />
	<input type="hidden" name="_xfConfirm" value="1" />
</form>';
