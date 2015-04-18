<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$this->addRequiredExternal('css', 'resource_view_header');
$__output .= '

<div class="resourceInfo">
';
$__compilerVar5 = '';
$__compilerVar5 .= '
	';
$__compilerVar6 = '';
$__compilerVar6 .= '
			';
if ($resource['external_purchase_url'])
{
$__compilerVar6 .= '
				<li><label class="downloadButton purchase">
					<a href="' . htmlspecialchars($resource['external_purchase_url'], ENT_QUOTES, 'UTF-8') . '" class="inner">
						' . 'Buy Now for ' . htmlspecialchars($resource['cost'], ENT_QUOTES, 'UTF-8') . '' . '
					</a>
				</label></li>
			';
}
else if (!$resource['is_fileless'])
{
$__compilerVar6 .= '
				<li><label class="downloadButton ' . ((!$resource['canDownload']) ? ('downloadDisabled') : ('')) . '">
					<a href="' . XenForo_Template_Helper_Core::link('resources/download', $resource, array(
'version' => $resource['current_version_id']
)) . '" class="inner">
						';
if ($resource['canDownload'])
{
$__compilerVar6 .= 'Download Now';
}
else
{
$__compilerVar6 .= 'Đăng Ký Để Download';
}
$__compilerVar6 .= '
						';
if ($resource['download_url'])
{
$__compilerVar6 .= '
							<small class="minorText">' . 'Via external site' . '</small>
						';
}
else
{
$__compilerVar6 .= '
							<small class="minorText">' . XenForo_Template_Helper_Core::numberFormat($resource['attachment']['file_size'], 'size') . ' .' . htmlspecialchars($resource['attachment']['extension'], ENT_QUOTES, 'UTF-8') . '</small>
						';
}
$__compilerVar6 .= '
					</a>
				</label></li>
			';
}
$__compilerVar6 .= '

			';
$__compilerVar7 = '';
$__compilerVar6 .= $this->callTemplateHook('resource_view_header_after_resource_buttons', $__compilerVar7, array());
unset($__compilerVar7);
$__compilerVar6 .= '
		';
if (trim($__compilerVar6) !== '')
{
$__compilerVar5 .= '
		<ul class="primaryLinks ' . (($resource['is_fileless'] AND !$resource['external_purchase_url']) ? ('noButton') : ('')) . '">
		' . $__compilerVar6 . '
		</ul>
	';
}
unset($__compilerVar6);
$__compilerVar5 .= '

	<div class="resourceImage">
		';
if ($xenOptions['resourceAllowIcons'])
{
$__compilerVar5 .= '
			<img src="' . XenForo_Template_Helper_Core::callHelper('resourceiconurl', array(
'0' => $resource
)) . '" alt="" class="resourceIcon" />
		';
}
else
{
$__compilerVar5 .= '
			' . XenForo_Template_Helper_Core::callHelper('avatarhtml', array($resource,(true),array(
'user' => '$resource',
'size' => 's',
'img' => 'true'
),'')) . '
		';
}
$__compilerVar5 .= '
	</div>

	<h1>';
if ($titleHtml AND $titleHtml != htmlspecialchars($resource['title'], ENT_QUOTES, 'UTF-8', true))
{
$__compilerVar5 .= $titleHtml;
}
else
{
$__compilerVar5 .= XenForo_Template_Helper_Core::callHelper('resourcePrefix', array(
'0' => $resource
)) . htmlspecialchars($resource['title'], ENT_QUOTES, 'UTF-8');
}
$__compilerVar5 .= ' ';
if (!$resource['isFilelessNoExternal'])
{
$__compilerVar5 .= '<span class="muted">' . htmlspecialchars($resource['version_string'], ENT_QUOTES, 'UTF-8') . '</span>';
}
$__compilerVar5 .= '</h1>
	';
if ($resource['tag_line'] OR $extraDescriptionHtml)
{
$__compilerVar5 .= '<p class="tagLine muted">' . htmlspecialchars($resource['tag_line'], ENT_QUOTES, 'UTF-8');
if ($resource['tag_line'] AND $extraDescriptionHtml)
{
$__compilerVar5 .= '<br />';
}
$__compilerVar5 .= $extraDescriptionHtml . '</p>';
}
$__compilerVar5 .= '
';
$__output .= $this->callTemplateHook('resource_view_header_info', $__compilerVar5, array());
unset($__compilerVar5);
$__output .= '
</div>

';
$__compilerVar8 = '';
$__output .= $this->callTemplateHook('resource_view_header_after_info', $__compilerVar8, array());
unset($__compilerVar8);
$__output .= '

';
if ($resource['resource_state'] != ('visible'))
{
$__output .= '
	<ul class="secondaryContent resourceAlerts">
	';
if ($resource['resource_state'] == ('deleted'))
{
$__output .= '
		<li class="deletedAlert">
			<span class="icon"></span>
			' . 'This resource has been deleted.' . '
			';
if ($resource['delete_user_id'])
{
$__output .= '
				' . 'Bị xóa bởi ' . XenForo_Template_Helper_Core::callHelper('username', array(
'0' => array(
'user_id' => $resource['delete_user_id'],
'username' => $resource['delete_username']
)
)) . '' . ', ' . XenForo_Template_Helper_Core::callHelper('datetimehtml', array($resource['delete_date'],array(
'time' => htmlspecialchars($resource['delete_date'], ENT_QUOTES, 'UTF-8')
)));
if ($resource['delete_reason'])
{
$__output .= ', ' . 'Lý do' . ': ' . htmlspecialchars($resource['delete_reason'], ENT_QUOTES, 'UTF-8');
}
$__output .= '.
			';
}
$__output .= '
		</li>
	';
}
$__output .= '
	';
if ($resource['resource_state'] == ('moderated'))
{
$__output .= '
		<li class="moderatedAlert">
			<span class="icon"></span>
			' . 'This resource is currently awaiting approval.' . '
		</li>
	';
}
$__output .= '
	</ul>
';
}
