<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$this->addRequiredExternal('css', 'account_avatar_gallery');
$__output .= '

';
$__extraData['title'] = '';
$__extraData['title'] .= 'Avatar Editor';
$__output .= '

';
$__extraData['navigation'] = array();
$__extraData['navigation'][] = array('href' => XenForo_Template_Helper_Core::link('full:account/personal-details', false, array()), 'value' => 'Personal Details');
$__output .= '

<form action="' . XenForo_Template_Helper_Core::link('account/avatar-upload', false, array()) . '" method="post" enctype="multipart/form-data" class="xenForm">

	';
$__compilerVar1 = '';
$__compilerVar1 .= '
	
	';
if ($visitor['avatar_date'])
{
$__compilerVar1 .= '
		<fieldset>
			<dl class="ctrlUnit">
				<dt><label>' . 'Current Avatar' . ':</label></dt>
				<dd>' . XenForo_Template_Helper_Core::callHelper('avatarhtml', array($visitor,false,array(
'user' => '$visitor',
'size' => 'm',
'class' => 'NoOverlay'
),'')) . '</dd>
			</dl>

			<dl class="ctrlUnit">
				<dt></dt>
				<dd><label for="ctrl_delete"><input type="checkbox" name="delete" value="1" id="ctrl_delete" /> ' . 'Delete current avatar?' . '</label></dd>
			</dl>
		</fieldset>
	';
}
$__compilerVar1 .= '
	
	<!-- slot: after_avatar_date -->

	<dl class="ctrlUnit">
		<dt><label>' . 'Upload Avatar' . ':</label></dt>
		<dd><input type="file" name="avatar" /></dd>
	</dl>
	
	<!-- slot: after_upload_avatar -->

	';
if ($xenOptions['gravatarEnable'])
{
$__compilerVar1 .= '
		<dl class="ctrlUnit">
			<dt><label for="ctrl_use_gravatar">' . 'Use Gravatar' . ':</label></dt>
			<dd><input type="checkbox" name="use_gravatar" value="1" class="Disabler" id="ctrl_use_gravatar"' . (($visitor['gravatar']) ? ' checked="checked"' : '') . ' />
				<span id="ctrl_use_gravatar_Disabler">
					<input type="text" name="gravatar" value="' . htmlspecialchars($visitor['gravatar'], ENT_QUOTES, 'UTF-8') . '" class="textCtrl" />
				</span>
			</dd>
		</dl>
	';
}
$__compilerVar1 .= '

	';
if ($xenOptions['avatarGalleryEnable'])
{
$__compilerVar1 .= '
		<dl class="ctrlUnit avatarGallery">
			<ul>
				';
foreach ($avatars AS $avatar)
{
$__compilerVar1 .= '
					<li>
						<input type="radio" name="chosen_avatar" value="' . htmlspecialchars($avatar, ENT_QUOTES, 'UTF-8') . '" id="' . htmlspecialchars($avatar, ENT_QUOTES, 'UTF-8') . '"/>
						<label for="' . htmlspecialchars($avatar, ENT_QUOTES, 'UTF-8') . '">
							<img src="' . htmlspecialchars($xenOptions['boardUrl'], ENT_QUOTES, 'UTF-8') . htmlspecialchars($xenOptions['avatarGalleryPath'], ENT_QUOTES, 'UTF-8') . '/' . htmlspecialchars($avatar, ENT_QUOTES, 'UTF-8') . '"/>
						</label>
					</li>
				';
}
$__compilerVar1 .= '
			</ul>
		</dl>
	';
}
$__compilerVar1 .= '
	
	';
$__output .= $this->callTemplateHook('account_avatar', $__compilerVar1, array());
unset($__compilerVar1);
$__output .= '

	<dl class="ctrlUnit submitUnit">
		<dt></dt>
		<dd><input type="submit" value="' . 'Modify Avatar' . '" accesskey="s" class="button primary" /></dd>
	</dl>

	<input type="hidden" name="_xfToken" value="' . htmlspecialchars($visitor['csrf_token_page'], ENT_QUOTES, 'UTF-8') . '" />
</form>';
