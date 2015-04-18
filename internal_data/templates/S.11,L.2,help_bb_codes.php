<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__extraData['title'] = '';
$__extraData['title'] .= 'BB Codes';
$__output .= '

';
$__extraData['navigation'] = array();
$__extraData['navigation'][] = array('href' => XenForo_Template_Helper_Core::link('help', false, array()), 'value' => 'Trợ giúp');
$__output .= '

';
$this->addRequiredExternal('css', 'help_bb_codes');
$__output .= '

<ul class="section">
	';
$__compilerVar31 = '';
$__compilerVar31 .= '
	
	<li class="primaryContent">
		<div class="bbCode">
			<h3 class="title">' . '[B], [I], [U], [S] - Bold, Italics, Underline, and Strike-through' . '</h3>
			<p class="description">' . 'Làm cho vùng chữ được bôi trở thành in đậm, in nghiêng, gạch chân hoặc gạch ngang.' . '</p>
			
			';
$__compilerVar32 = '';
$__compilerVar32 .= 'This is [B]bold[/B] text.
This is [I]italic[/I] text.
This is [U]underlined[/U] text.
This is [S]struck-through[/S] text.';
$__compilerVar33 = '';
$__compilerVar33 .= '<dl class="example">
	<dt>' . 'Ví dụ' . ':</dt>
	<dd>' . XenForo_Template_Helper_Core::string('nl2br', array(
'0' => (($bbCodeExampleHtml) ? ($bbCodeExampleHtml) : (htmlspecialchars($__compilerVar32, ENT_QUOTES, 'UTF-8')))
)) . '</dd>
</dl>
<dl class="output">
	<dt>' . 'Hiển thị' . ':</dt>
	<dd class="baseHtml">' . XenForo_Template_Helper_Core::callHelper('bbCode', array(
'0' => $bbCodeParser,
'1' => $__compilerVar32
)) . '</dd>
</dl>';
$__compilerVar31 .= $__compilerVar33;
unset($__compilerVar32, $__compilerVar33);
$__compilerVar31 .= '
		</div>
	</li>
	
	<!-- slot: after_b_i_u_s -->
	
	<li class="primaryContent">
		<div class="bbCode">
			<h3 class="title">' . '[COLOR=<span class="option">color</span>], [FONT=<span class="option">name</span>], [SIZE=<span class="option">size</span>] - Text Color, Font, and Size' . '</h3>
			<p class="description">' . 'Thay đổi màu sắc, phông chữ hoặc kích thước của ký tự được chọn.' . '</p>
			
			';
$__compilerVar34 = '';
$__compilerVar34 .= 'This is [COLOR=red]red[/COLOR] and [COLOR=#0000cc]blue[/COLOR] text.
This is [FONT=Courier New]Courier New[/FONT] text.
This is [SIZE=1]small[/SIZE] and [SIZE=7]big[/SIZE] text.';
$__compilerVar35 = '';
$__compilerVar35 .= '<dl class="example">
	<dt>' . 'Ví dụ' . ':</dt>
	<dd>' . XenForo_Template_Helper_Core::string('nl2br', array(
'0' => (($bbCodeExampleHtml) ? ($bbCodeExampleHtml) : (htmlspecialchars($__compilerVar34, ENT_QUOTES, 'UTF-8')))
)) . '</dd>
</dl>
<dl class="output">
	<dt>' . 'Hiển thị' . ':</dt>
	<dd class="baseHtml">' . XenForo_Template_Helper_Core::callHelper('bbCode', array(
'0' => $bbCodeParser,
'1' => $__compilerVar34
)) . '</dd>
</dl>';
$__compilerVar31 .= $__compilerVar35;
unset($__compilerVar34, $__compilerVar35);
$__compilerVar31 .= '
		</div>
	</li>
	
	<!-- slot: after_color_font_size -->
	
	<li class="primaryContent">
		<div class="bbCode">
			<h3 class="title">' . '[URL], [EMAIL] - Linking' . '</h3>
			<p class="description">' . 'Chèn liên kết tại Ký tự được bao quanh.' . '</p>
			
			';
$__compilerVar36 = '';
$__compilerVar36 .= '[URL]http://www.example.com[/URL]
[EMAIL]example@example.com[/EMAIL]';
$__compilerVar37 = '';
$__compilerVar37 .= '<dl class="example">
	<dt>' . 'Ví dụ' . ':</dt>
	<dd>' . XenForo_Template_Helper_Core::string('nl2br', array(
'0' => (($bbCodeExampleHtml) ? ($bbCodeExampleHtml) : (htmlspecialchars($__compilerVar36, ENT_QUOTES, 'UTF-8')))
)) . '</dd>
</dl>
<dl class="output">
	<dt>' . 'Hiển thị' . ':</dt>
	<dd class="baseHtml">' . XenForo_Template_Helper_Core::callHelper('bbCode', array(
'0' => $bbCodeParser,
'1' => $__compilerVar36
)) . '</dd>
</dl>';
$__compilerVar31 .= $__compilerVar37;
unset($__compilerVar36, $__compilerVar37);
$__compilerVar31 .= '
		</div>
	</li>
	
	<!-- slot: after_url_email -->
	
	<li class="primaryContent">
		<div class="bbCode">
			<h3 class="title">' . '[URL=<span class="option">link</span>], [EMAIL=<span class="option">address</span>] - Linking (Advanced)' . '</h3>
			<p class="description">' . 'Chèn liên kết cho trang web hoặc địa chỉ email cho vùng chọn.' . '</p>
			
			';
$__compilerVar38 = '';
$__compilerVar38 .= '[URL=http://www.example.com]Go to example.com[/URL]
[EMAIL=example@example.com]Email me[/EMAIL]';
$__compilerVar39 = '';
$__compilerVar39 .= '<dl class="example">
	<dt>' . 'Ví dụ' . ':</dt>
	<dd>' . XenForo_Template_Helper_Core::string('nl2br', array(
'0' => (($bbCodeExampleHtml) ? ($bbCodeExampleHtml) : (htmlspecialchars($__compilerVar38, ENT_QUOTES, 'UTF-8')))
)) . '</dd>
</dl>
<dl class="output">
	<dt>' . 'Hiển thị' . ':</dt>
	<dd class="baseHtml">' . XenForo_Template_Helper_Core::callHelper('bbCode', array(
'0' => $bbCodeParser,
'1' => $__compilerVar38
)) . '</dd>
</dl>';
$__compilerVar31 .= $__compilerVar39;
unset($__compilerVar38, $__compilerVar39);
$__compilerVar31 .= '
		</div>
	</li>
	
	<!-- slot: after_email_advanced -->

	<li class="primaryContent">
		<div class="bbCode">
			<h3 class="title">' . '[USER=<span class="option">ID</span>] - Profile Linking' . '</h3>
			<p class="description">' . 'Links to a user\'s profile. This is generally inserted automatically when tagging a user.' . '</p>
			
			';
$__compilerVar40 = '';
$__compilerVar40 .= '[USER=' . (($visitor['user_id']) ? (htmlspecialchars($visitor['user_id'], ENT_QUOTES, 'UTF-8')) : ('1')) . ']' . (($visitor['user_id']) ? (htmlspecialchars($visitor['username'], ENT_QUOTES, 'UTF-8')) : ('Tên tài khoản')) . '[/USER]';
$__compilerVar41 = '';
$__compilerVar41 .= '<dl class="example">
	<dt>' . 'Ví dụ' . ':</dt>
	<dd>' . XenForo_Template_Helper_Core::string('nl2br', array(
'0' => (($bbCodeExampleHtml) ? ($bbCodeExampleHtml) : (htmlspecialchars($__compilerVar40, ENT_QUOTES, 'UTF-8')))
)) . '</dd>
</dl>
<dl class="output">
	<dt>' . 'Hiển thị' . ':</dt>
	<dd class="baseHtml">' . XenForo_Template_Helper_Core::callHelper('bbCode', array(
'0' => $bbCodeParser,
'1' => $__compilerVar40
)) . '</dd>
</dl>';
$__compilerVar31 .= $__compilerVar41;
unset($__compilerVar40, $__compilerVar41);
$__compilerVar31 .= '
		</div>
	</li>
	
	<!-- slot: after_user -->
	
	<li class="primaryContent">
		<div class="bbCode">
			<h3 class="title">' . '[IMG] - Image' . '</h3>
			<p class="description">' . 'Hiển thị hình ảnh sử dụng vùng chọn như là 1 liên kết' . '</p>

			';
$__compilerVar42 = '';
$__compilerVar42 .= '[IMG]' . XenForo_Template_Helper_Core::callHelper('fullUrl', array(
'0' => '&#8203;' . XenForo_Template_Helper_Core::styleProperty('imagePath') . '&#8203;/xenforo/avatars/avatar_s.png',
'1' => '1'
)) . '[/IMG]';
$__compilerVar43 = '';
$__compilerVar43 .= '[IMG]' . XenForo_Template_Helper_Core::callHelper('fullUrl', array(
'0' => XenForo_Template_Helper_Core::styleProperty('imagePath') . '/xenforo/avatars/avatar_s.png',
'1' => '1'
)) . '[/IMG]';
$__compilerVar44 = '';
$__compilerVar44 .= '<dl class="example">
	<dt>' . 'Ví dụ' . ':</dt>
	<dd>' . XenForo_Template_Helper_Core::string('nl2br', array(
'0' => (($__compilerVar42) ? ($__compilerVar42) : (htmlspecialchars($__compilerVar43, ENT_QUOTES, 'UTF-8')))
)) . '</dd>
</dl>
<dl class="output">
	<dt>' . 'Hiển thị' . ':</dt>
	<dd class="baseHtml">' . XenForo_Template_Helper_Core::callHelper('bbCode', array(
'0' => $bbCodeParser,
'1' => $__compilerVar43
)) . '</dd>
</dl>';
$__compilerVar31 .= $__compilerVar44;
unset($__compilerVar42, $__compilerVar43, $__compilerVar44);
$__compilerVar31 .= '
		</div>
	</li>
	
	<!-- slot: after_img -->
	
	<li class="primaryContent">
		<div class="bbCode">
			<h3 class="title">' . '[MEDIA=<span class="option">site</span>] - Embedded Media' . '</h3>
			<p class="description">' . 'Chèn video, flash đa phương tiện từ trang web được phép vào nội dung bài viết. Bạn nên dùng nút MEDIA ở thanh công cụ soạn thảo của diễn đàn.' . ' ' . 'Approved sites' . ':
				';
$i = 0;
$totalSites = count($mediaSites);
foreach ($mediaSites AS $site)
{
$i++;
$__compilerVar31 .= '
					';
if ($site['supported'])
{
$__compilerVar31 .= '
						<a href="' . htmlspecialchars($site['site_url'], ENT_QUOTES, 'UTF-8') . '" target="_blank" rel="nofollow">' . htmlspecialchars($site['site_title'], ENT_QUOTES, 'UTF-8') . '</a>;
					';
}
$__compilerVar31 .= '
				';
}
$__compilerVar31 .= '
			</p>
			<dl class="example">
				<dt>' . 'Ví dụ' . ':</dt>
				<dd>
					[MEDIA=youtube]oHg5SJYRHA0[/MEDIA]
				</dd>
			</dl>
			<dl class="output">
				<dt>' . 'Hiển thị' . ':</dt>
				<dd class="baseHtml">
					<i>' . 'An embedded YouTube player would appear here.' . '</i>
				</dd>
			</dl>
		</div>
	</li>
	
	<!-- slot: after_media -->
	
	<li class="primaryContent">
		<div class="bbCode">
			<h3 class="title">' . '[LIST] - Lists' . '</h3>
			<p class="description">' . 'Hiển thị kiểu danh sách dấu chấm hoặc số.' . '</p>
			
			';
$__compilerVar45 = '';
$__compilerVar45 .= '[LIST]
[*]Bullet 1
[*]Bullet 2
[/LIST]
[LIST=1]
[*]Entry 1
[*]Entry 2
[/LIST]';
$__compilerVar46 = '';
$__compilerVar46 .= '<dl class="example">
	<dt>' . 'Ví dụ' . ':</dt>
	<dd>' . XenForo_Template_Helper_Core::string('nl2br', array(
'0' => (($bbCodeExampleHtml) ? ($bbCodeExampleHtml) : (htmlspecialchars($__compilerVar45, ENT_QUOTES, 'UTF-8')))
)) . '</dd>
</dl>
<dl class="output">
	<dt>' . 'Hiển thị' . ':</dt>
	<dd class="baseHtml">' . XenForo_Template_Helper_Core::callHelper('bbCode', array(
'0' => $bbCodeParser,
'1' => $__compilerVar45
)) . '</dd>
</dl>';
$__compilerVar31 .= $__compilerVar46;
unset($__compilerVar45, $__compilerVar46);
$__compilerVar31 .= '
		</div>
	</li>
	
	<!-- slot: after_list -->
	
	<li class="primaryContent">
		<div class="bbCode">
			<h3 class="title">' . '[LEFT], [CENTER], [RIGHT] - Text Alignment' . '</h3>
			<p class="description">' . 'Thay đổi kiểu căn lề của vùng chữ được chọn.' . '</p>
			
			';
$__compilerVar47 = '';
$__compilerVar47 .= '[LEFT]Left-aligned[/LEFT]
[CENTER]Center-aligned[/CENTER]
[RIGHT]Right-aligned[/RIGHT]';
$__compilerVar48 = '';
$__compilerVar48 .= '<dl class="example">
	<dt>' . 'Ví dụ' . ':</dt>
	<dd>' . XenForo_Template_Helper_Core::string('nl2br', array(
'0' => (($bbCodeExampleHtml) ? ($bbCodeExampleHtml) : (htmlspecialchars($__compilerVar47, ENT_QUOTES, 'UTF-8')))
)) . '</dd>
</dl>
<dl class="output">
	<dt>' . 'Hiển thị' . ':</dt>
	<dd class="baseHtml">' . XenForo_Template_Helper_Core::callHelper('bbCode', array(
'0' => $bbCodeParser,
'1' => $__compilerVar47
)) . '</dd>
</dl>';
$__compilerVar31 .= $__compilerVar48;
unset($__compilerVar47, $__compilerVar48);
$__compilerVar31 .= '
		</div>
	</li>
	
	<!-- slot: after_align -->
	
	<li class="primaryContent">
		<div class="bbCode">
			<h3 class="title">' . '[QUOTE] - Quoted Text' . '</h3>
			<p class="description">' . 'Hiển thị ký tự đã được trích từ nguồn khác. Bạn có thể đặt tên của nguồn.' . '</p>
			
			';
$__compilerVar49 = '';
$__compilerVar49 .= '[QUOTE]Quoted text[/QUOTE]
[QUOTE=A person]Something they said[/QUOTE]';
$__compilerVar50 = '';
$__compilerVar50 .= '<dl class="example">
	<dt>' . 'Ví dụ' . ':</dt>
	<dd>' . XenForo_Template_Helper_Core::string('nl2br', array(
'0' => (($bbCodeExampleHtml) ? ($bbCodeExampleHtml) : (htmlspecialchars($__compilerVar49, ENT_QUOTES, 'UTF-8')))
)) . '</dd>
</dl>
<dl class="output">
	<dt>' . 'Hiển thị' . ':</dt>
	<dd class="baseHtml">' . XenForo_Template_Helper_Core::callHelper('bbCode', array(
'0' => $bbCodeParser,
'1' => $__compilerVar49
)) . '</dd>
</dl>';
$__compilerVar31 .= $__compilerVar50;
unset($__compilerVar49, $__compilerVar50);
$__compilerVar31 .= '
			
		</div>
	</li>
	
	<!-- slot: after_quote -->
	
	<li class="primaryContent">
		<div class="bbCode">
			<h3 class="title">' . '[SPOILER] - Text Containing Spoilers' . '</h3>
			<p class="description">' . 'Hides text that may contain spoilers so that it must be clicked by the viewer to be seen.' . '</p>
			
			';
$__compilerVar51 = '';
$__compilerVar51 .= '[SPOILER]Simple spoiler[/SPOILER]
[SPOILER=Spoiler Title]Spoiler with a title[/SPOILER]';
$__compilerVar52 = '';
$__compilerVar52 .= '<dl class="example">
	<dt>' . 'Ví dụ' . ':</dt>
	<dd>' . XenForo_Template_Helper_Core::string('nl2br', array(
'0' => (($bbCodeExampleHtml) ? ($bbCodeExampleHtml) : (htmlspecialchars($__compilerVar51, ENT_QUOTES, 'UTF-8')))
)) . '</dd>
</dl>
<dl class="output">
	<dt>' . 'Hiển thị' . ':</dt>
	<dd class="baseHtml">' . XenForo_Template_Helper_Core::callHelper('bbCode', array(
'0' => $bbCodeParser,
'1' => $__compilerVar51
)) . '</dd>
</dl>';
$__compilerVar31 .= $__compilerVar52;
unset($__compilerVar51, $__compilerVar52);
$__compilerVar31 .= '
			
		</div>
	</li>
	
	<!-- slot: after_spoiler -->
	
	<li class="primaryContent">
		<div class="bbCode">
			<h3 class="title">' . '[CODE], [PHP], [HTML] - Programming Code Display' . '</h3>
			<p class="description">' . 'Hiển hị ký tự dưới dạng một số ngôn ngữ lập trình.' . '</p>
			
			';
$__compilerVar53 = '';
$__compilerVar53 .= '[CODE]General
code[/CODE]
[PHP]echo $hello . \'world\';[/PHP]';
$__compilerVar54 = '';
$__compilerVar54 .= '<dl class="example">
	<dt>' . 'Ví dụ' . ':</dt>
	<dd>' . XenForo_Template_Helper_Core::string('nl2br', array(
'0' => (($bbCodeExampleHtml) ? ($bbCodeExampleHtml) : (htmlspecialchars($__compilerVar53, ENT_QUOTES, 'UTF-8')))
)) . '</dd>
</dl>
<dl class="output">
	<dt>' . 'Hiển thị' . ':</dt>
	<dd class="baseHtml">' . XenForo_Template_Helper_Core::callHelper('bbCode', array(
'0' => $bbCodeParser,
'1' => $__compilerVar53
)) . '</dd>
</dl>';
$__compilerVar31 .= $__compilerVar54;
unset($__compilerVar53, $__compilerVar54);
$__compilerVar31 .= '
		</div>
	</li>
	
	<!-- slot: after_code -->
	
	<li class="primaryContent">
		<div class="bbCode">
			<h3 class="title">' . '[INDENT] - Text Indent' . '</h3>
			<p class="description">' . 'Indents the wrapped text. This can be nested for larger indentings.' . '</p>

			';
$__compilerVar55 = '';
$__compilerVar55 .= 'Regular text
[INDENT]Indented text
[INDENT]More indented[/INDENT]
[/INDENT]';
$__compilerVar56 = '';
$__compilerVar56 .= '<dl class="example">
	<dt>' . 'Ví dụ' . ':</dt>
	<dd>' . XenForo_Template_Helper_Core::string('nl2br', array(
'0' => (($bbCodeExampleHtml) ? ($bbCodeExampleHtml) : (htmlspecialchars($__compilerVar55, ENT_QUOTES, 'UTF-8')))
)) . '</dd>
</dl>
<dl class="output">
	<dt>' . 'Hiển thị' . ':</dt>
	<dd class="baseHtml">' . XenForo_Template_Helper_Core::callHelper('bbCode', array(
'0' => $bbCodeParser,
'1' => $__compilerVar55
)) . '</dd>
</dl>';
$__compilerVar31 .= $__compilerVar56;
unset($__compilerVar55, $__compilerVar56);
$__compilerVar31 .= '
		</div>
	</li>
	
	<!-- slot: after_indent -->
	
	<li class="primaryContent">
		<div class="bbCode">
			<h3 class="title">' . '[PLAIN] - Plain Text' . '</h3>
			<p class="description">' . 'Disables BB code translation on the wrapped text.' . '</p>

			';
$__compilerVar57 = '';
$__compilerVar57 .= '[PLAIN]This is not [B]bold[/B] text.[/PLAIN]';
$__compilerVar58 = '';
$__compilerVar58 .= '<dl class="example">
	<dt>' . 'Ví dụ' . ':</dt>
	<dd>' . XenForo_Template_Helper_Core::string('nl2br', array(
'0' => (($bbCodeExampleHtml) ? ($bbCodeExampleHtml) : (htmlspecialchars($__compilerVar57, ENT_QUOTES, 'UTF-8')))
)) . '</dd>
</dl>
<dl class="output">
	<dt>' . 'Hiển thị' . ':</dt>
	<dd class="baseHtml">' . XenForo_Template_Helper_Core::callHelper('bbCode', array(
'0' => $bbCodeParser,
'1' => $__compilerVar57
)) . '</dd>
</dl>';
$__compilerVar31 .= $__compilerVar58;
unset($__compilerVar57, $__compilerVar58);
$__compilerVar31 .= '
		</div>
	</li>
	
	<!-- slot: after_plain -->
	
	<li class="primaryContent">
		<div class="bbCode">
			<h3 class="title">' . '[ATTACH] - Attachment Insertion' . '</h3>
			<p class="description">' . 'Inserts an attachment at the specified point. If the attachment is an image, a thumbnail or full size version will be inserted. This will generally be inserted by clicking the appropriate button.' . '</p>
			<dl class="example">
				<dt>' . 'Ví dụ' . ':</dt>
				<dd>
					' . 'Hình thu nhỏ' . ': [ATTACH]123[/ATTACH]<br />
					' . 'Full Size' . ': [ATTACH=full]123[/ATTACH]
				</dd>
			</dl>
			<dl class="output">
				<dt>' . 'Hiển thị' . ':</dt>
				<dd class="baseHtml">
					<i>' . 'The contents of the attachments would appear here.' . '</i>
				</dd>
			</dl>
		</div>
	</li>

	<!-- slot: after_attach -->

	';
foreach ($bbCodes AS $bbCode)
{
$__compilerVar31 .= '
		<li class="primaryContent">
			<div class="bbCode">
				<h3 class="title">
					';
if ($bbCode['has_option'] == ('no') OR $bbCode['has_option'] == ('optional'))
{
$__compilerVar31 .= '[' . XenForo_Template_Helper_Core::string('strtoupper', array(
'0' => htmlspecialchars($bbCode['bb_code_id'], ENT_QUOTES, 'UTF-8')
)) . ']';
}
if ($bbCode['has_option'] == ('optional'))
{
$__compilerVar31 .= ', ';
}
$__compilerVar31 .= '
					';
if ($bbCode['has_option'] == ('yes') OR $bbCode['has_option'] == ('optional'))
{
$__compilerVar31 .= '[' . XenForo_Template_Helper_Core::string('strtoupper', array(
'0' => htmlspecialchars($bbCode['bb_code_id'], ENT_QUOTES, 'UTF-8')
)) . '=<span class="option">option</span>]';
}
$__compilerVar31 .= '
					- ' . htmlspecialchars($bbCode['title'], ENT_QUOTES, 'UTF-8') . '
				</h3>
				<p class="description">' . htmlspecialchars($bbCode['description'], ENT_QUOTES, 'UTF-8') . '</p>
				';
$__compilerVar59 = '';
$__compilerVar59 .= $bbCode['example'];
$__compilerVar60 = '';
$__compilerVar60 .= '<dl class="example">
	<dt>' . 'Ví dụ' . ':</dt>
	<dd>' . XenForo_Template_Helper_Core::string('nl2br', array(
'0' => (($bbCodeExampleHtml) ? ($bbCodeExampleHtml) : (htmlspecialchars($__compilerVar59, ENT_QUOTES, 'UTF-8')))
)) . '</dd>
</dl>
<dl class="output">
	<dt>' . 'Hiển thị' . ':</dt>
	<dd class="baseHtml">' . XenForo_Template_Helper_Core::callHelper('bbCode', array(
'0' => $bbCodeParser,
'1' => $__compilerVar59
)) . '</dd>
</dl>';
$__compilerVar31 .= $__compilerVar60;
unset($__compilerVar59, $__compilerVar60);
$__compilerVar31 .= '
			</div>
		</li>
	';
}
$__compilerVar31 .= '

	<!-- slot: after_custom -->
	
	';
$__output .= $this->callTemplateHook('help_bb_codes', $__compilerVar31, array());
unset($__compilerVar31);
$__output .= '
</ul>';
