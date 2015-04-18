<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$this->addRequiredExternal('css', 'wf_default');
$__output .= '

';
$__compilerVar1 = '';
$__compilerVar1 .= '
			';
foreach ($entries AS $entry)
{
$__compilerVar1 .= '
				<li class="WidgetFramework_WidgetRenderer_FeedReader_Entry limitedHeight">
					';
if ($widget['options']['displayMode'] == ('titleOnly'))
{
$__compilerVar1 .= '
						<a href="' . $entry['link'] . '" target="_blank">' . htmlspecialchars($entry['title'], ENT_QUOTES, 'UTF-8') . '</a>
					';
}
else if ($widget['options']['displayMode'] == ('withContent'))
{
$__compilerVar1 .= '
						<a href="' . $entry['link'] . '" target="_blank">' . htmlspecialchars($entry['title'], ENT_QUOTES, 'UTF-8') . '</a>';
if ($entry['author'])
{
$__compilerVar1 .= ' ' . 'posted by' . ' ' . htmlspecialchars($entry['author'], ENT_QUOTES, 'UTF-8');
}
$__compilerVar1 .= '.
						' . XenForo_Template_Helper_Core::callHelper('snippet', array(
'0' => $entry['content'],
'1' => '200',
'2' => array(
'stripQuote' => '1'
)
)) . '
					';
}
else
{
$__compilerVar1 .= '
						';
if ($entry['bdImage_image'])
{
$__compilerVar1 .= '
							<a href="' . $entry['link'] . '" target="_blank">
								<img src="' . XenForo_Template_Helper_Core::callHelper('bdImage_thumbnail', array(
'0' => $entry['bdImage_image'],
'1' => '100'
)) . '" class="WidgetFramework_WidgetRenderer_FeedReader_Thumbnail limitedHeight" />
							</a>
						';
}
$__compilerVar1 .= '
						
						<a href="' . $entry['link'] . '" target="_blank">' . htmlspecialchars($entry['title'], ENT_QUOTES, 'UTF-8') . '</a>';
if ($entry['author'])
{
$__compilerVar1 .= ' ' . 'posted by' . ' ' . htmlspecialchars($entry['author'], ENT_QUOTES, 'UTF-8');
}
$__compilerVar1 .= '.
						' . XenForo_Template_Helper_Core::callHelper('snippet', array(
'0' => $entry['content'],
'1' => '200',
'2' => array(
'stripQuote' => '1'
)
)) . '
					';
}
$__compilerVar1 .= '
				</li>
			';
}
$__compilerVar1 .= '
		';
if (trim($__compilerVar1) !== '')
{
$__output .= '
	<ul class="WidgetFramework_WidgetRenderer_FeedReader_Entries">
		' . $__compilerVar1 . '
	</ul>
';
}
unset($__compilerVar1);
