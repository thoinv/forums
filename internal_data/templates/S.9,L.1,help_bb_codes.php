<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__extraData['title'] = '';
$__extraData['title'] .= 'BB Codes';
$__output .= '

';
$__extraData['navigation'] = array();
$__extraData['navigation'][] = array('href' => XenForo_Template_Helper_Core::link('help', false, array()), 'value' => 'Help');
$__output .= '

';
$this->addRequiredExternal('css', 'help_bb_codes');
$__output .= '

<ul class="section">
	';
$__compilerVar1 = '';
$__compilerVar1 .= '
	
	<li class="primaryContent">
		<div class="bbCode">
			<h3 class="title">' . '[B], [I], [U], [S] - Bold, Italics, Underline, and Strike-through' . '</h3>
			<p class="description">' . 'Makes the wrapped text bold, italic, underlined, or struck-through.' . '</p>
			
			';
$__compilerVar2 = '';
$__compilerVar2 .= 'This is [B]bold[/B] text.
This is [I]italic[/I] text.
This is [U]underlined[/U] text.
This is [S]struck-through[/S] text.';
$__compilerVar3 = '';
$__compilerVar3 .= '<dl class="example">
	<dt>' . 'Example' . ':</dt>
	<dd>' . XenForo_Template_Helper_Core::string('nl2br', array(
'0' => (($bbCodeExampleHtml) ? ($bbCodeExampleHtml) : (htmlspecialchars($__compilerVar2, ENT_QUOTES, 'UTF-8')))
)) . '</dd>
</dl>
<dl class="output">
	<dt>' . 'Output' . ':</dt>
	<dd class="baseHtml">' . XenForo_Template_Helper_Core::callHelper('bbCode', array(
'0' => $bbCodeParser,
'1' => $__compilerVar2
)) . '</dd>
</dl>';
$__compilerVar1 .= $__compilerVar3;
unset($__compilerVar2, $__compilerVar3);
$__compilerVar1 .= '
		</div>
	</li>
	
	<!-- slot: after_b_i_u_s -->
	
	<li class="primaryContent">
		<div class="bbCode">
			<h3 class="title">' . '[COLOR=<span class="option">color</span>], [FONT=<span class="option">name</span>], [SIZE=<span class="option">size</span>] - Text Color, Font, and Size' . '</h3>
			<p class="description">' . 'Changes the color, font, or size of the wrapped text.' . '</p>
			
			';
$__compilerVar4 = '';
$__compilerVar4 .= 'This is [COLOR=red]red[/COLOR] and [COLOR=#0000cc]blue[/COLOR] text.
This is [FONT=Courier New]Courier New[/FONT] text.
This is [SIZE=1]small[/SIZE] and [SIZE=7]big[/SIZE] text.';
$__compilerVar5 = '';
$__compilerVar5 .= '<dl class="example">
	<dt>' . 'Example' . ':</dt>
	<dd>' . XenForo_Template_Helper_Core::string('nl2br', array(
'0' => (($bbCodeExampleHtml) ? ($bbCodeExampleHtml) : (htmlspecialchars($__compilerVar4, ENT_QUOTES, 'UTF-8')))
)) . '</dd>
</dl>
<dl class="output">
	<dt>' . 'Output' . ':</dt>
	<dd class="baseHtml">' . XenForo_Template_Helper_Core::callHelper('bbCode', array(
'0' => $bbCodeParser,
'1' => $__compilerVar4
)) . '</dd>
</dl>';
$__compilerVar1 .= $__compilerVar5;
unset($__compilerVar4, $__compilerVar5);
$__compilerVar1 .= '
		</div>
	</li>
	
	<!-- slot: after_color_font_size -->
	
	<li class="primaryContent">
		<div class="bbCode">
			<h3 class="title">' . '[URL], [EMAIL] - Linking' . '</h3>
			<p class="description">' . 'Creates a link using the wrapped text as the target.' . '</p>
			
			';
$__compilerVar6 = '';
$__compilerVar6 .= '[URL]http://www.example.com[/URL]
[EMAIL]example@example.com[/EMAIL]';
$__compilerVar7 = '';
$__compilerVar7 .= '<dl class="example">
	<dt>' . 'Example' . ':</dt>
	<dd>' . XenForo_Template_Helper_Core::string('nl2br', array(
'0' => (($bbCodeExampleHtml) ? ($bbCodeExampleHtml) : (htmlspecialchars($__compilerVar6, ENT_QUOTES, 'UTF-8')))
)) . '</dd>
</dl>
<dl class="output">
	<dt>' . 'Output' . ':</dt>
	<dd class="baseHtml">' . XenForo_Template_Helper_Core::callHelper('bbCode', array(
'0' => $bbCodeParser,
'1' => $__compilerVar6
)) . '</dd>
</dl>';
$__compilerVar1 .= $__compilerVar7;
unset($__compilerVar6, $__compilerVar7);
$__compilerVar1 .= '
		</div>
	</li>
	
	<!-- slot: after_url_email -->
	
	<li class="primaryContent">
		<div class="bbCode">
			<h3 class="title">' . '[URL=<span class="option">link</span>], [EMAIL=<span class="option">address</span>] - Linking (Advanced)' . '</h3>
			<p class="description">' . 'Links the wrapped text to the specified web page or email address.' . '</p>
			
			';
$__compilerVar8 = '';
$__compilerVar8 .= '[URL=http://www.example.com]Go to example.com[/URL]
[EMAIL=example@example.com]Email me[/EMAIL]';
$__compilerVar9 = '';
$__compilerVar9 .= '<dl class="example">
	<dt>' . 'Example' . ':</dt>
	<dd>' . XenForo_Template_Helper_Core::string('nl2br', array(
'0' => (($bbCodeExampleHtml) ? ($bbCodeExampleHtml) : (htmlspecialchars($__compilerVar8, ENT_QUOTES, 'UTF-8')))
)) . '</dd>
</dl>
<dl class="output">
	<dt>' . 'Output' . ':</dt>
	<dd class="baseHtml">' . XenForo_Template_Helper_Core::callHelper('bbCode', array(
'0' => $bbCodeParser,
'1' => $__compilerVar8
)) . '</dd>
</dl>';
$__compilerVar1 .= $__compilerVar9;
unset($__compilerVar8, $__compilerVar9);
$__compilerVar1 .= '
		</div>
	</li>
	
	<!-- slot: after_email_advanced -->

	<li class="primaryContent">
		<div class="bbCode">
			<h3 class="title">' . '[USER=<span class="option">ID</span>] - Profile Linking' . '</h3>
			<p class="description">' . 'Links to a user\'s profile. This is generally inserted automatically when tagging a user.' . '</p>
			
			';
$__compilerVar10 = '';
$__compilerVar10 .= '[USER=' . (($visitor['user_id']) ? (htmlspecialchars($visitor['user_id'], ENT_QUOTES, 'UTF-8')) : ('1')) . ']' . (($visitor['user_id']) ? (htmlspecialchars($visitor['username'], ENT_QUOTES, 'UTF-8')) : ('User Name')) . '[/USER]';
$__compilerVar11 = '';
$__compilerVar11 .= '<dl class="example">
	<dt>' . 'Example' . ':</dt>
	<dd>' . XenForo_Template_Helper_Core::string('nl2br', array(
'0' => (($bbCodeExampleHtml) ? ($bbCodeExampleHtml) : (htmlspecialchars($__compilerVar10, ENT_QUOTES, 'UTF-8')))
)) . '</dd>
</dl>
<dl class="output">
	<dt>' . 'Output' . ':</dt>
	<dd class="baseHtml">' . XenForo_Template_Helper_Core::callHelper('bbCode', array(
'0' => $bbCodeParser,
'1' => $__compilerVar10
)) . '</dd>
</dl>';
$__compilerVar1 .= $__compilerVar11;
unset($__compilerVar10, $__compilerVar11);
$__compilerVar1 .= '
		</div>
	</li>
	
	<!-- slot: after_user -->
	
	<li class="primaryContent">
		<div class="bbCode">
			<h3 class="title">' . '[IMG] - Image' . '</h3>
			<p class="description">' . 'Display an image, using the wrapped text as the URL.' . '</p>

			';
$__compilerVar12 = '';
$__compilerVar12 .= '[IMG]' . XenForo_Template_Helper_Core::callHelper('fullUrl', array(
'0' => '&#8203;' . XenForo_Template_Helper_Core::styleProperty('imagePath') . '&#8203;/xenforo/avatars/avatar_s.png',
'1' => '1'
)) . '[/IMG]';
$__compilerVar13 = '';
$__compilerVar13 .= '[IMG]' . XenForo_Template_Helper_Core::callHelper('fullUrl', array(
'0' => XenForo_Template_Helper_Core::styleProperty('imagePath') . '/xenforo/avatars/avatar_s.png',
'1' => '1'
)) . '[/IMG]';
$__compilerVar14 = '';
$__compilerVar14 .= '<dl class="example">
	<dt>' . 'Example' . ':</dt>
	<dd>' . XenForo_Template_Helper_Core::string('nl2br', array(
'0' => (($__compilerVar12) ? ($__compilerVar12) : (htmlspecialchars($__compilerVar13, ENT_QUOTES, 'UTF-8')))
)) . '</dd>
</dl>
<dl class="output">
	<dt>' . 'Output' . ':</dt>
	<dd class="baseHtml">' . XenForo_Template_Helper_Core::callHelper('bbCode', array(
'0' => $bbCodeParser,
'1' => $__compilerVar13
)) . '</dd>
</dl>';
$__compilerVar1 .= $__compilerVar14;
unset($__compilerVar12, $__compilerVar13, $__compilerVar14);
$__compilerVar1 .= '
		</div>
	</li>
	
	<!-- slot: after_img -->
	
	<li class="primaryContent">
		<div class="bbCode">
			<h3 class="title">' . '[MEDIA=<span class="option">site</span>] - Embedded Media' . '</h3>
			<p class="description">' . 'Embeds media from approved sites into your message. It is recommended that you use the media button in the editor tool bar.' . ' ' . 'Approved sites' . ':
				';
$i = 0;
$totalSites = count($mediaSites);
foreach ($mediaSites AS $site)
{
$i++;
$__compilerVar1 .= '
					';
if ($site['supported'])
{
$__compilerVar1 .= '
						<a href="' . htmlspecialchars($site['site_url'], ENT_QUOTES, 'UTF-8') . '" target="_blank" rel="nofollow">' . htmlspecialchars($site['site_title'], ENT_QUOTES, 'UTF-8') . '</a>;
					';
}
$__compilerVar1 .= '
				';
}
$__compilerVar1 .= '
			</p>
			<dl class="example">
				<dt>' . 'Example' . ':</dt>
				<dd>
					[MEDIA=youtube]oHg5SJYRHA0[/MEDIA]
				</dd>
			</dl>
			<dl class="output">
				<dt>' . 'Output' . ':</dt>
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
			<p class="description">' . 'Displays a bulleted or numbered list.' . '</p>
			
			';
$__compilerVar15 = '';
$__compilerVar15 .= '[LIST]
[*]Bullet 1
[*]Bullet 2
[/LIST]
[LIST=1]
[*]Entry 1
[*]Entry 2
[/LIST]';
$__compilerVar16 = '';
$__compilerVar16 .= '<dl class="example">
	<dt>' . 'Example' . ':</dt>
	<dd>' . XenForo_Template_Helper_Core::string('nl2br', array(
'0' => (($bbCodeExampleHtml) ? ($bbCodeExampleHtml) : (htmlspecialchars($__compilerVar15, ENT_QUOTES, 'UTF-8')))
)) . '</dd>
</dl>
<dl class="output">
	<dt>' . 'Output' . ':</dt>
	<dd class="baseHtml">' . XenForo_Template_Helper_Core::callHelper('bbCode', array(
'0' => $bbCodeParser,
'1' => $__compilerVar15
)) . '</dd>
</dl>';
$__compilerVar1 .= $__compilerVar16;
unset($__compilerVar15, $__compilerVar16);
$__compilerVar1 .= '
		</div>
	</li>
	
	<!-- slot: after_list -->
	
	<li class="primaryContent">
		<div class="bbCode">
			<h3 class="title">' . '[LEFT], [CENTER], [RIGHT] - Text Alignment' . '</h3>
			<p class="description">' . 'Changes the alignment of the wrapped text.' . '</p>
			
			';
$__compilerVar17 = '';
$__compilerVar17 .= '[LEFT]Left-aligned[/LEFT]
[CENTER]Center-aligned[/CENTER]
[RIGHT]Right-aligned[/RIGHT]';
$__compilerVar18 = '';
$__compilerVar18 .= '<dl class="example">
	<dt>' . 'Example' . ':</dt>
	<dd>' . XenForo_Template_Helper_Core::string('nl2br', array(
'0' => (($bbCodeExampleHtml) ? ($bbCodeExampleHtml) : (htmlspecialchars($__compilerVar17, ENT_QUOTES, 'UTF-8')))
)) . '</dd>
</dl>
<dl class="output">
	<dt>' . 'Output' . ':</dt>
	<dd class="baseHtml">' . XenForo_Template_Helper_Core::callHelper('bbCode', array(
'0' => $bbCodeParser,
'1' => $__compilerVar17
)) . '</dd>
</dl>';
$__compilerVar1 .= $__compilerVar18;
unset($__compilerVar17, $__compilerVar18);
$__compilerVar1 .= '
		</div>
	</li>
	
	<!-- slot: after_align -->
	
	<li class="primaryContent">
		<div class="bbCode">
			<h3 class="title">' . '[QUOTE] - Quoted Text' . '</h3>
			<p class="description">' . 'Displays text that has been quoted from another source. You may also attribute the name of the source.' . '</p>
			
			';
$__compilerVar19 = '';
$__compilerVar19 .= '[QUOTE]Quoted text[/QUOTE]
[QUOTE=A person]Something they said[/QUOTE]';
$__compilerVar20 = '';
$__compilerVar20 .= '<dl class="example">
	<dt>' . 'Example' . ':</dt>
	<dd>' . XenForo_Template_Helper_Core::string('nl2br', array(
'0' => (($bbCodeExampleHtml) ? ($bbCodeExampleHtml) : (htmlspecialchars($__compilerVar19, ENT_QUOTES, 'UTF-8')))
)) . '</dd>
</dl>
<dl class="output">
	<dt>' . 'Output' . ':</dt>
	<dd class="baseHtml">' . XenForo_Template_Helper_Core::callHelper('bbCode', array(
'0' => $bbCodeParser,
'1' => $__compilerVar19
)) . '</dd>
</dl>';
$__compilerVar1 .= $__compilerVar20;
unset($__compilerVar19, $__compilerVar20);
$__compilerVar1 .= '
			
		</div>
	</li>
	
	<!-- slot: after_quote -->
	
	<li class="primaryContent">
		<div class="bbCode">
			<h3 class="title">' . '[SPOILER] - Text Containing Spoilers' . '</h3>
			<p class="description">' . 'Hides text that may contain spoilers so that it must be clicked by the viewer to be seen.' . '</p>
			
			';
$__compilerVar21 = '';
$__compilerVar21 .= '[SPOILER]Simple spoiler[/SPOILER]
[SPOILER=Spoiler Title]Spoiler with a title[/SPOILER]';
$__compilerVar22 = '';
$__compilerVar22 .= '<dl class="example">
	<dt>' . 'Example' . ':</dt>
	<dd>' . XenForo_Template_Helper_Core::string('nl2br', array(
'0' => (($bbCodeExampleHtml) ? ($bbCodeExampleHtml) : (htmlspecialchars($__compilerVar21, ENT_QUOTES, 'UTF-8')))
)) . '</dd>
</dl>
<dl class="output">
	<dt>' . 'Output' . ':</dt>
	<dd class="baseHtml">' . XenForo_Template_Helper_Core::callHelper('bbCode', array(
'0' => $bbCodeParser,
'1' => $__compilerVar21
)) . '</dd>
</dl>';
$__compilerVar1 .= $__compilerVar22;
unset($__compilerVar21, $__compilerVar22);
$__compilerVar1 .= '
			
		</div>
	</li>
	
	<!-- slot: after_spoiler -->
	
	<li class="primaryContent">
		<div class="bbCode">
			<h3 class="title">' . '[CODE], [PHP], [HTML] - Programming Code Display' . '</h3>
			<p class="description">' . 'Displays text in one of several programming languages, highlighting the syntax where possible.' . '</p>
			
			';
$__compilerVar23 = '';
$__compilerVar23 .= '[CODE]General
code[/CODE]
[PHP]echo $hello . \'world\';[/PHP]';
$__compilerVar24 = '';
$__compilerVar24 .= '<dl class="example">
	<dt>' . 'Example' . ':</dt>
	<dd>' . XenForo_Template_Helper_Core::string('nl2br', array(
'0' => (($bbCodeExampleHtml) ? ($bbCodeExampleHtml) : (htmlspecialchars($__compilerVar23, ENT_QUOTES, 'UTF-8')))
)) . '</dd>
</dl>
<dl class="output">
	<dt>' . 'Output' . ':</dt>
	<dd class="baseHtml">' . XenForo_Template_Helper_Core::callHelper('bbCode', array(
'0' => $bbCodeParser,
'1' => $__compilerVar23
)) . '</dd>
</dl>';
$__compilerVar1 .= $__compilerVar24;
unset($__compilerVar23, $__compilerVar24);
$__compilerVar1 .= '
		</div>
	</li>
	
	<!-- slot: after_code -->
	
	<li class="primaryContent">
		<div class="bbCode">
			<h3 class="title">' . '[INDENT] - Text Indent' . '</h3>
			<p class="description">' . 'Indents the wrapped text. This can be nested for larger indentings.' . '</p>

			';
$__compilerVar25 = '';
$__compilerVar25 .= 'Regular text
[INDENT]Indented text
[INDENT]More indented[/INDENT]
[/INDENT]';
$__compilerVar26 = '';
$__compilerVar26 .= '<dl class="example">
	<dt>' . 'Example' . ':</dt>
	<dd>' . XenForo_Template_Helper_Core::string('nl2br', array(
'0' => (($bbCodeExampleHtml) ? ($bbCodeExampleHtml) : (htmlspecialchars($__compilerVar25, ENT_QUOTES, 'UTF-8')))
)) . '</dd>
</dl>
<dl class="output">
	<dt>' . 'Output' . ':</dt>
	<dd class="baseHtml">' . XenForo_Template_Helper_Core::callHelper('bbCode', array(
'0' => $bbCodeParser,
'1' => $__compilerVar25
)) . '</dd>
</dl>';
$__compilerVar1 .= $__compilerVar26;
unset($__compilerVar25, $__compilerVar26);
$__compilerVar1 .= '
		</div>
	</li>
	
	<!-- slot: after_indent -->
	
	<li class="primaryContent">
		<div class="bbCode">
			<h3 class="title">' . '[PLAIN] - Plain Text' . '</h3>
			<p class="description">' . 'Disables BB code translation on the wrapped text.' . '</p>

			';
$__compilerVar27 = '';
$__compilerVar27 .= '[PLAIN]This is not [B]bold[/B] text.[/PLAIN]';
$__compilerVar28 = '';
$__compilerVar28 .= '<dl class="example">
	<dt>' . 'Example' . ':</dt>
	<dd>' . XenForo_Template_Helper_Core::string('nl2br', array(
'0' => (($bbCodeExampleHtml) ? ($bbCodeExampleHtml) : (htmlspecialchars($__compilerVar27, ENT_QUOTES, 'UTF-8')))
)) . '</dd>
</dl>
<dl class="output">
	<dt>' . 'Output' . ':</dt>
	<dd class="baseHtml">' . XenForo_Template_Helper_Core::callHelper('bbCode', array(
'0' => $bbCodeParser,
'1' => $__compilerVar27
)) . '</dd>
</dl>';
$__compilerVar1 .= $__compilerVar28;
unset($__compilerVar27, $__compilerVar28);
$__compilerVar1 .= '
		</div>
	</li>
	
	<!-- slot: after_plain -->
	
	<li class="primaryContent">
		<div class="bbCode">
			<h3 class="title">' . '[ATTACH] - Attachment Insertion' . '</h3>
			<p class="description">' . 'Inserts an attachment at the specified point. If the attachment is an image, a thumbnail or full size version will be inserted. This will generally be inserted by clicking the appropriate button.' . '</p>
			<dl class="example">
				<dt>' . 'Example' . ':</dt>
				<dd>
					' . 'Thumbnail' . ': [ATTACH]123[/ATTACH]<br />
					' . 'Full Size' . ': [ATTACH=full]123[/ATTACH]
				</dd>
			</dl>
			<dl class="output">
				<dt>' . 'Output' . ':</dt>
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
$__compilerVar1 .= '
		<li class="primaryContent">
			<div class="bbCode">
				<h3 class="title">
					';
if ($bbCode['has_option'] == ('no') OR $bbCode['has_option'] == ('optional'))
{
$__compilerVar1 .= '[' . XenForo_Template_Helper_Core::string('strtoupper', array(
'0' => htmlspecialchars($bbCode['bb_code_id'], ENT_QUOTES, 'UTF-8')
)) . ']';
}
if ($bbCode['has_option'] == ('optional'))
{
$__compilerVar1 .= ', ';
}
$__compilerVar1 .= '
					';
if ($bbCode['has_option'] == ('yes') OR $bbCode['has_option'] == ('optional'))
{
$__compilerVar1 .= '[' . XenForo_Template_Helper_Core::string('strtoupper', array(
'0' => htmlspecialchars($bbCode['bb_code_id'], ENT_QUOTES, 'UTF-8')
)) . '=<span class="option">option</span>]';
}
$__compilerVar1 .= '
					- ' . htmlspecialchars($bbCode['title'], ENT_QUOTES, 'UTF-8') . '
				</h3>
				<p class="description">' . htmlspecialchars($bbCode['description'], ENT_QUOTES, 'UTF-8') . '</p>
				';
$__compilerVar29 = '';
$__compilerVar29 .= $bbCode['example'];
$__compilerVar30 = '';
$__compilerVar30 .= '<dl class="example">
	<dt>' . 'Example' . ':</dt>
	<dd>' . XenForo_Template_Helper_Core::string('nl2br', array(
'0' => (($bbCodeExampleHtml) ? ($bbCodeExampleHtml) : (htmlspecialchars($__compilerVar29, ENT_QUOTES, 'UTF-8')))
)) . '</dd>
</dl>
<dl class="output">
	<dt>' . 'Output' . ':</dt>
	<dd class="baseHtml">' . XenForo_Template_Helper_Core::callHelper('bbCode', array(
'0' => $bbCodeParser,
'1' => $__compilerVar29
)) . '</dd>
</dl>';
$__compilerVar1 .= $__compilerVar30;
unset($__compilerVar29, $__compilerVar30);
$__compilerVar1 .= '
			</div>
		</li>
	';
}
$__compilerVar1 .= '

	<!-- slot: after_custom -->
	
	';
$__output .= $this->callTemplateHook('help_bb_codes', $__compilerVar1, array());
unset($__compilerVar1);
$__output .= '
</ul>';
