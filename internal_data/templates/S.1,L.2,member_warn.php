<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__extraData['title'] = '';
$__extraData['title'] .= 'Cảnh cáo thành viên' . ': ' . htmlspecialchars($user['username'], ENT_QUOTES, 'UTF-8');
$__output .= '
';
$__extraData['h1'] = '';
$__extraData['h1'] .= 'Cảnh cáo thành viên' . ': <em>' . htmlspecialchars($user['username'], ENT_QUOTES, 'UTF-8') . '</em>';
$__output .= '

';
$__extraData['navigation'] = array();
$__extraData['navigation'][] = array('href' => XenForo_Template_Helper_Core::link('full:members', $user, array()), 'value' => htmlspecialchars($user['username'], ENT_QUOTES, 'UTF-8'));
$__output .= '

';
$this->addRequiredExternal('js', 'js/xenforo/form_filler.js');
$__output .= '
';
$this->addRequiredExternal('css', 'member_warn');
$__output .= '

<form action="' . XenForo_Template_Helper_Core::link('members/warn', $user, array()) . '" method="post" class="xenForm" data-form-filler-url="' . XenForo_Template_Helper_Core::link('members/warn', $user, array(
'fill' => '1',
'content_type' => $contentType,
'content_id' => $contentId
)) . '">
	
	<div class="warningHeader">
		' . XenForo_Template_Helper_Core::callHelper('avatarhtml', array($user,false,array(
'user' => '$user',
'size' => 's'
),'')) . '
		<dl>
			<dt>' . 'Nội dung' . ':</dt>
			<dd><h2><a href="' . htmlspecialchars($contentUrl, ENT_QUOTES, 'UTF-8') . '">' . htmlspecialchars($contentTitle, ENT_QUOTES, 'UTF-8') . '</a></h2></dd>
		</dl>
	</div>

	<ul class="tabs Tabs" data-panes="#warningPanes > li">
		<li class="active"><a>' . 'Thông tin cảnh cáo' . '</a></li>
		<li><a>' . 'Nhắc nhở thành viên' . '</a></li>
		';
if ($canDeleteContent OR $canWarnPublicly)
{
$__output .= '
			
			<li><a>' . 'Thực hiện với nội dung này' . '</a></li>
		';
}
$__output .= '
		';
if ($warningCount)
{
$__output .= '<li><a href="' . htmlspecialchars($requestPaths['requestUri'], ENT_QUOTES, 'UTF-8') . '#warnings">' . 'Warnings' . ' (' . XenForo_Template_Helper_Core::numberFormat($warningCount, '0') . ')</a></li>';
}
$__output .= '
	</ul>

	<ul id="warningPanes">
		<li>
			<dl class="ctrlUnit">
				<dt>' . 'Kiểu cảnh cáo' . ':</dt>
				<dd>
					<ul>
						';
foreach ($warnings AS $warning)
{
$__output .= '
							<li><label><input type="radio" name="warning_definition_id" class="FormFiller" value="' . htmlspecialchars($warning['warning_definition_id'], ENT_QUOTES, 'UTF-8') . '" /> ' . htmlspecialchars($warning['title'], ENT_QUOTES, 'UTF-8') . '</label></li>
						';
}
$__output .= '
						<li><label><input type="radio" name="warning_definition_id" class="FormFiller Disabler" value="0" id="customWarning" checked="checked" /> ' . 'Cảnh cáo khác' . ':</label>
							<ul id="customWarning_Disabler">
								<li><input type="text" name="title" class="textCtrl" placeholder="' . 'Cảnh cáo khác' . '..." maxlength="255" /></li>
							</ul>
						</li>
					</ul>
				</dd>
			</dl>
			
			<fieldset id="WarningEditableFields">
				<dl class="ctrlUnit">
					<dt>' . 'Điểm cảnh cáo' . ':</dt>
					<dd>
						<ul>
							<li><label><input type="checkbox" id="applyPoints" name="points_enable" value="1" class="Disabler" checked="checked" /> ' . 'Kèm điểm cảnh cáo' . ':</label>
								<ul id="applyPoints_Disabler">
									<li><input type="number" name="points" value="1" class="textCtrl SpinBox number autoSize" min="0" step="1" /></li>
								</ul>
							</li>
						</ul>
					</dd>
				</dl>
				
				<dl class="ctrlUnit">
					<dt>' . 'Điểm hết hạn vào' . ':</dt>
					<dd>
						<ul>
							<li><label><input type="checkbox" id="expirePoints" name="expiry_enable" value="1" class="Disabler" checked="checked" /> ' . 'Điểm hết hạn sau' . ':</label>
								<ul id="expirePoints_Disabler">
									<li>
										<input type="number" name="expiry_value" value="1" class="textCtrl SpinBox number autoSize" min="0" step="1" />
										<select name="expiry_unit" class="textCtrl autoSize">
											<option value="days">' . 'Ngày' . '</option>
											<option value="weeks">' . 'Tuần' . '</option>
											<option value="months" selected="selected">' . 'Tháng' . '</option>
											<option value="years">' . 'Năm' . '</option>
										</select>
									</li>
								</ul>
							</li>
						</ul>
					</dd>
				</dl>
			</fieldset>
				
			<fieldset>
				<dl class="ctrlUnit">
					<dt>' . 'Lưu ý' . ':</dt>
					<dd>
						<textarea name="notes" rows="2" class="Elastic textCtrl"></textarea>
						<p class="explain">' . 'Mục này sẽ không hiển thị với thành viên bị cảnh cáo.' . '</p>
					</dd>
				</dl>
			</fieldset>
		</li>
		
		
		<li>
			<dl class="ctrlUnit">
				<dt>' . 'Nhắc nhở thành viên' . ':</dt>
				<dd>
					<ul>
						<li><label><input type="checkbox" id="startConversation" class="Disabler" checked="checked" /> ' . 'Bắt đầu đối thoại với ' . htmlspecialchars($user['username'], ENT_QUOTES, 'UTF-8') . '' . ':</label>
							<ul id="startConversation_Disabler">
								<li><input type="text" name="conversation_title" value="" class="textCtrl" id="ctrl_conversation_title" placeholder="' . 'Tiêu đề đối thoại' . '" /></li>
								<li><label for="ctrl_conversation_message">' . 'Nội dung' . ':</label>
									<textarea name="conversation_message" class="textCtrl Elastic" id="ctrl_conversation_message" rows="2"></textarea>
									<p class="explain">' . 'Mục này sẽ chỉ hiển thị với bạn và thành viên này.' . '</p></li>
								<li><label><input type="checkbox" name="open_invite" value="1" /> ' . 'Cho phép ' . htmlspecialchars($user['username'], ENT_QUOTES, 'UTF-8') . ' mời người khác tham gia đối thoại này' . '</label></li>
								<li><label><input type="checkbox" name="conversation_locked" value="1" /> ' . 'Khóa đối thoại (không cho phép trả lời)' . '</label></li>
							</ul>
						</li>
					</ul>
				</dd>
			</dl>
		</li>
		
		';
$__compilerVar2 = '';
$__compilerVar2 .= '
						';
if ($canDeleteContent)
{
$__compilerVar2 .= '
						<li><label><input type="radio" name="content_action" value="delete_content" id="deleteContent" class="Disabler" /> ' . 'Xóa nội dung' . '</label>
							<ul id="deleteContent_Disabler">
								<li><input type="text" name="delete_reason" placeholder="' . 'Lý do xóa bỏ' . '" class="textCtrl" />
									<p class="explain">' . 'Bài viết sẽ vẫn xem được bởi quản lý và có thể khôi phục sau này.' . '</p></li>
							</ul>
						</li>
						';
}
$__compilerVar2 .= '
						';
if ($canWarnPublicly)
{
$__compilerVar2 .= '
						<li><label><input type="radio" name="content_action" value="public_warning" id="publicWarning" class="Disabler" /> ' . 'Cảnh cáo công khai' . ':</label>
							<ul id="publicWarning_Disabler">
								<li><input type="text" name="public_warning" class="textCtrl" id="ctrl_public_warning" placeholder="' . 'Nội dung cảnh cáo công khai' . '" maxlength="255" />
									<p class="explain">' . 'Điều này sẽ hiện với tất cả mọi người có thể thấy nội dung này.' . '</p></li>
							</ul>
						</li>
						';
}
$__compilerVar2 .= '
						';
if (trim($__compilerVar2) !== '')
{
$__output .= '
		<li>
			<dl class="ctrlUnit">
				<dt>' . 'Thực hiện với nội dung này' . ':</dt>
				<dd>
					<ul>
						<li><label><input type="radio" name="content_action" value="" checked="checked" /> ' . 'Không làm gì' . '</label></li>
						' . $__compilerVar2 . '
					</ul>
				</dd>
			</dl>
		</li>
		';
}
unset($__compilerVar2);
$__output .= '
		
		';
if ($warningCount)
{
$__output .= '
			<li id="warnings" class="profileContent" data-loadUrl="' . XenForo_Template_Helper_Core::link('members/warnings', $user, array()) . '">
				' . 'Đang tải' . '...
				<noscript><a href="' . XenForo_Template_Helper_Core::link('members/warnings', $user, array()) . '">' . 'Xem' . '</a></noscript>
			</li>
		';
}
$__output .= '
	</ul>
	
	<dl class="ctrlUnit submitUnit">
		<dt></dt>
		<dd><input type="submit" value="' . 'Cảnh cáo thành viên' . '" class="button" accesskey="s" /></dd>
	</dl>

	<input type="hidden" name="content_type" value="' . htmlspecialchars($contentType, ENT_QUOTES, 'UTF-8') . '" />
	<input type="hidden" name="content_id" value="' . htmlspecialchars($contentId, ENT_QUOTES, 'UTF-8') . '" />
	<input type="hidden" name="redirect" value="' . htmlspecialchars($redirect, ENT_QUOTES, 'UTF-8') . '" />
	<input type="hidden" name="_xfToken" value="' . htmlspecialchars($visitor['csrf_token_page'], ENT_QUOTES, 'UTF-8') . '" />
	
	<input type="checkbox" id="WarningEditableInput" value="1" checked="checked" style="display:none" />
	<script>
		$(function() {
			var $input = $(\'#WarningEditableInput\'), $fields = $(\'#WarningEditableFields\');
			$input.click(function() {
				if (!$input.is(\':checked\'))
				{
					setTimeout(function() { $fields.find(\'input, textarea, select\').attr(\'disabled\', true).addClass(\'disabled\'); }, 0);
				}
				else
				{
					$fields.find(\'input, textarea, select\').attr(\'disabled\', false).removeClass(\'disabled\');
				}
			});
		});
	</script>
</form>';
