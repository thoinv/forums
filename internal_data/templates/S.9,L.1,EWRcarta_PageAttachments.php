<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__extraData['title'] = '';
$__extraData['title'] .= htmlspecialchars($page['page_name'], ENT_QUOTES, 'UTF-8') . ' - ' . 'Attachments';
$__output .= '
';
$__extraData['h1'] = '';
$__extraData['h1'] .= htmlspecialchars($page['page_name'], ENT_QUOTES, 'UTF-8') . ' - ' . 'Attachments';
$__output .= '

';
$__extraData['quickNavSelected'] = '';
$__extraData['quickNavSelected'] .= 'wiki-' . htmlspecialchars($page['page_id'], ENT_QUOTES, 'UTF-8');
$__output .= '

';
$this->addRequiredExternal('css', 'EWRcarta');
$__output .= '

';
$__extraData['navigation'] = array();
$__extraData['navigation'] = XenForo_Template_Helper_Core::appendBreadCrumbs($__extraData['navigation'], $breadCrumbs);
$__output .= '

<div class="sectionMain">
	<div class="primaryContent wikiPage wikiAttachments" data-author="' . htmlspecialchars($xenOptions['boardTitle'], ENT_QUOTES, 'UTF-8') . '">
		<div style="display: none;">
			<a href="' . XenForo_Template_Helper_Core::link('wiki', false, array()) . '" class="avatar"><span class="img" style="background-image: url(\'' . XenForo_Template_Helper_Core::styleProperty('imagePath') . '/xenforo/logo.og.png\')"></span></a>
			' . XenForo_Template_Helper_Core::callHelper('datetimehtml', array($page['page_date'],array(
'time' => htmlspecialchars($page['page_date'], ENT_QUOTES, 'UTF-8')
))) . '
		</div>

		';
if ($page['attachments'])
{
$__output .= '
			';
$__compilerVar1 = '';
$this->addRequiredExternal('css', 'attached_files');
$__compilerVar1 .= '

<div class="attachedFiles">
	<h4 class="attachedFilesHeader">' . 'Attached Files' . ':</h4>
	<ul class="attachmentList SquareThumbs"
		data-thumb-height="' . ($xenOptions['attachmentThumbnailDimensions'] / 2) . '"
		data-thumb-selector="div.thumbnail > a">
		';
foreach ($page['attachments'] AS $attachment)
{
$__compilerVar1 .= '
			<li class="attachment' . (($attachment['thumbnailUrl']) ? (' image') : ('')) . '" title="' . htmlspecialchars($attachment['filename'], ENT_QUOTES, 'UTF-8') . '">
				<div class="boxModelFixer primaryContent">
					
					';
$__compilerVar2 = '';
$__compilerVar2 .= '
					<div class="thumbnail">
						';
if ($attachment['thumbnailUrl'] AND $canViewAttachments)
{
$__compilerVar2 .= '
							<a href="' . XenForo_Template_Helper_Core::link('attachments', $attachment, array()) . '" target="_blank" class="LbTrigger"
								data-href="' . XenForo_Template_Helper_Core::link('misc/lightbox', false, array()) . '"><img 
								src="' . htmlspecialchars($attachment['thumbnailUrl'], ENT_QUOTES, 'UTF-8') . '" alt="' . htmlspecialchars($attachment['filename'], ENT_QUOTES, 'UTF-8') . '" class="LbImage" /></a>
						';
}
else if ($attachment['thumbnailUrl'])
{
$__compilerVar2 .= '
							<a href="' . XenForo_Template_Helper_Core::link('attachments', $attachment, array()) . '" target="_blank"><img
								src="' . htmlspecialchars($attachment['thumbnailUrl'], ENT_QUOTES, 'UTF-8') . '" alt="' . htmlspecialchars($attachment['filename'], ENT_QUOTES, 'UTF-8') . '" /></a>
						';
}
else
{
$__compilerVar2 .= '
							<a href="' . XenForo_Template_Helper_Core::link('attachments', $attachment, array()) . '" target="_blank" class="genericAttachment"></a>
						';
}
$__compilerVar2 .= '
					</div>
					';
$__compilerVar1 .= $this->callTemplateHook('attached_file_thumbnail', $__compilerVar2, array(
'attachment' => $attachment
));
unset($__compilerVar2);
$__compilerVar1 .= '
					
					<div class="attachmentInfo pairsJustified">
						<h6 class="filename"><a href="' . XenForo_Template_Helper_Core::link('attachments', $attachment, array()) . '" target="_blank">' . htmlspecialchars($attachment['filename'], ENT_QUOTES, 'UTF-8') . '</a></h6>
						<dl><dt>' . 'File size' . ':</dt> <dd>' . XenForo_Template_Helper_Core::numberFormat($attachment['file_size'], 'size') . '</dd></dl>
						<dl><dt>' . 'Views' . ':</dt> <dd>' . XenForo_Template_Helper_Core::numberFormat($attachment['view_count'], '0') . '</dd></dl>
					</div>
				</div>
			</li>
		';
}
$__compilerVar1 .= '
	</ul>
</div>

';
$__output .= $__compilerVar1;
unset($__compilerVar1);
$__output .= '
		';
}
else
{
$__output .= '
			' . 'The requested attachment could not be found.' . '
		';
}
$__output .= '
	</div>
</div>

';
$__compilerVar3 = '';
$__compilerVar3 .= '<div class="cartaCopy copyright muted">
	<a href="http://xenforo.com/community/resources/98/">XenCarta</a>
	&copy; Jason Axelrod from <a href="http://8wayrun.com/">8WAYRUN.COM</a>
</div>';
$__output .= $__compilerVar3;
unset($__compilerVar3);
