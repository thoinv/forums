<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__output .= '<label><input type="checkbox" name="tinhte_xentag_tags_text_no_include" value="' . htmlspecialchars($tag['tag_text'], ENT_QUOTES, 'UTF-8') . '"
	id="search_bar_tag" class="Disabler AutoChecker" checked="checked"
	/> ' . 'Search threads tagged with ' . htmlspecialchars($tag['tag_text'], ENT_QUOTES, 'UTF-8') . ' only' . '</label>
	<ul id="search_bar_tag_Disabler">
		<li><label><input type="checkbox" name="type[post][group_discussion]" value="1"
			id="search_bar_group_discussion" class="AutoChecker"
			/> ' . 'Hiển thị kết quả dạng Chủ đề' . '</label></li>
	</ul>
<input type="hidden" name="type" value="post" />';
