<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__extraData['title'] = '';
$__extraData['title'] .= 'Administrate Services';
$__output .= '
';
$__extraData['h1'] = '';
$__extraData['h1'] .= 'Administrate Services';
$__output .= '

';
if ($isPremium)
{
$__output .= '
	';
$__extraData['topctrl'] = '';
$__extraData['topctrl'] .= '<a href="' . XenForo_Template_Helper_Core::link('media/admin/rebuild', false, array()) . '" class="callToAction"><span>' . 'Rebuild Services' . '</span></a>';
$__output .= '
';
}
$__output .= '

';
$this->addRequiredExternal('css', 'EWRmedio');
$__output .= '

<div class="sectionMain mediaList">
	<div class="subHeading">' . 'Administrate Services' . '</div>

	';
foreach ($srvList AS $service)
{
$__output .= '
		<div class="primaryContent">
			<div style="float: right;">
				';
if ($isPremium)
{
$__output .= '(<a href="' . XenForo_Template_Helper_Core::link('media/service/export', $service, array()) . '">' . 'Export' . '</a>)';
}
$__output .= '
				(<a href="' . XenForo_Template_Helper_Core::link('media/service/edit', $service, array()) . '">' . 'Sửa' . '</a>)
			</div>
			<span style="display: inline-block; width: 150px;">
				<a href="' . XenForo_Template_Helper_Core::link('media/service', $service, array()) . '">' . htmlspecialchars($service['service_name'], ENT_QUOTES, 'UTF-8') . '</a>
			</span>
			<span class="muted" style="display: inline-block; width: 500px;">
				' . htmlspecialchars($service['service_url'], ENT_QUOTES, 'UTF-8') . '
			</span>
			<span class="muted" style="display: inline-block;">
				' . htmlspecialchars($service['service_media'], ENT_QUOTES, 'UTF-8') . ' - ' . htmlspecialchars($service['service_type'], ENT_QUOTES, 'UTF-8') . '
			</span>
		</div>
	';
}
$__output .= '
</div>

';
if ($isPremium)
{
$__output .= '
<div class="sectionMain">
	<div class="subHeading">
		' . 'Import Service' . '
	</div>

	<form action="' . XenForo_Template_Helper_Core::link('media/admin/import', false, array()) . '" method="post" enctype="multipart/form-data">
		<div class="primaryContent" style="text-align: center;">
			<input type="file" name="upload_file" />
			<input type="submit" value="' . 'Import Service' . '" name="submit" accesskey="s" class="button primary" />
		</div>

		<input type="hidden" name="_xfToken" value="' . htmlspecialchars($visitor['csrf_token_page'], ENT_QUOTES, 'UTF-8') . '" />
	</form>
</div>
';
}
$__output .= '

';
$__compilerVar2 = '';
$__compilerVar2 .= '<div class="medioCopy copyright muted">
	<a href="http://xenforo.com/community/resources/97/">XenMedio</a>
	&copy; Jason Axelrod from <a href="http://8wayrun.com/">8WAYRUN.COM</a>
</div>';
$__output .= $__compilerVar2;
unset($__compilerVar2);
