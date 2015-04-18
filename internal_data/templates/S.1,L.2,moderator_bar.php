<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$this->addRequiredExternal('css', 'moderator_bar');
$__output .= '

';
$__compilerVar3 = '';
$__compilerVar3 .= '
			';
if ($visitor['is_admin'])
{
$__compilerVar3 .= '			
				<a href="admin.php" class="acp adminLink"><span class="itemLabel">' . 'Admin' . '</span></a>
				
				';
if ($session['permissionTest'])
{
$__compilerVar3 .= '
					<a href="' . XenForo_Template_Helper_Core::link('misc/reset-permissions', false, array()) . '" class="permissionTest adminLink OverlayTrigger">
						<span class="itemLabel">' . 'Permissions from ' . htmlspecialchars($session['permissionTest']['username'], ENT_QUOTES, 'UTF-8') . '' . '</span>
					</a>
				';
}
$__compilerVar3 .= '
			';
}
$__compilerVar3 .= '
			
			';
if ($visitor['is_moderator'] AND $session['moderationCounts']['total'])
{
$__compilerVar3 .= '
				<a href="' . XenForo_Template_Helper_Core::link('moderation-queue', false, array()) . '" class="moderationQueue modLink">
					<span class="itemLabel">' . 'Moderation' . ':</span>
					<span class="itemCount ' . (($session['moderationCounts']['total']) ? ('alert') : ('')) . '">' . htmlspecialchars($session['moderationCounts']['total'], ENT_QUOTES, 'UTF-8') . '</span>
				</a>
			';
}
$__compilerVar3 .= '
			
			';
if ($visitor['is_moderator'] && !$xenOptions['reportIntoForumId'])
{
$__compilerVar3 .= '
				<a href="' . XenForo_Template_Helper_Core::link('reports', false, array()) . '" class="reportedItems modLink">
					<span class="itemLabel">' . 'Báo cáo ' . ':</span>
					<span class="itemCount ' . ((($session['reportCounts']['total'] AND $session['reportCounts']['lastUpdate'] > $session['reportLastRead']) OR $session['reportCounts']['assigned']) ? ('alert') : ('')) . '" title="' . (($session['reportCounts']['lastUpdate']) ? ('Last Report Update' . ': ' . XenForo_Template_Helper_Core::datetime($session['reportCounts']['lastUpdate'], '')) : ('')) . '">';
if ($session['reportCounts']['assigned'])
{
$__compilerVar3 .= htmlspecialchars($session['reportCounts']['assigned'], ENT_QUOTES, 'UTF-8') . ' / ' . htmlspecialchars($session['reportCounts']['total'], ENT_QUOTES, 'UTF-8');
}
else
{
$__compilerVar3 .= htmlspecialchars($session['reportCounts']['total'], ENT_QUOTES, 'UTF-8');
}
$__compilerVar3 .= '</span>
				</a>
			';
}
$__compilerVar3 .= '
			
			';
if ($visitor['is_admin'] AND $session['canAdminUsers'] AND $session['userModerationCounts']['total'])
{
$__compilerVar3 .= '
				<a href="admin.php?users/moderated" class="userModerationQueue modLink">
					<span class="itemLabel">' . 'Users' . ':</span>
					<span class="itemCount ' . (($session['userModerationCounts']['total']) ? ('alert') : ('')) . '">' . htmlspecialchars($session['userModerationCounts']['total'], ENT_QUOTES, 'UTF-8') . '</span>
				</a>
			';
}
$__compilerVar3 .= '

			';
$__compilerVar4 = '';
$__compilerVar3 .= $this->callTemplateHook('moderator_bar', $__compilerVar4, array());
unset($__compilerVar4);
$__compilerVar3 .= '
		';
if (trim($__compilerVar3) !== '')
{
$__output .= '
<fieldset id="moderatorBar">
	<div class="pageWidth">
		<div class="pageContent">
		' . $__compilerVar3 . '
			
			<span class="helper"></span>
		</div>
	</div>
</fieldset>
';
}
unset($__compilerVar3);
