<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__extraData['title'] = '';
$__extraData['title'] .= 'Create New Playlist';
$__output .= '
';
$__extraData['h1'] = '';
$__extraData['h1'] .= 'Create New Playlist';
$__output .= '

';
$this->addRequiredExternal('css', 'EWRmedio');
$__output .= '

<div class="sectionMain">
	<form action="' . XenForo_Template_Helper_Core::link('media/playlist/create', false, array()) . '" method="post" class="xenForm">
		<fieldset>
			<dl class="ctrlUnit">
				<dt><label for="ctrl_title">' . 'Title' . ':</label></dt>
				<dd><input type="text" name="playlist_name" class="textCtrl" id="ctrl_name" value="" /></dd>
			</dl>

			<dl class="ctrlUnit fullWidth">
				<dt></dt>
				<dd>' . $editorTemplate . '</dd>
			</dl>
		</fieldset>

		<dl class="ctrlUnit submitUnit">
			<dt></dt>
			<dd>
				<input type="submit" value="' . 'Save Playlist' . '" name="submit" accesskey="s" class="button primary" />
			</dd>
		</dl>

		<input type="hidden" name="media_id" value="' . htmlspecialchars($mediaID, ENT_QUOTES, 'UTF-8') . '" />
		<input type="hidden" name="_xfToken" value="' . htmlspecialchars($visitor['csrf_token_page'], ENT_QUOTES, 'UTF-8') . '" />
	</form>
</div>

';
$__compilerVar1 = '';
$__compilerVar1 .= '<div class="medioCopy copyright muted">
	<a href="http://xenforo.com/community/resources/97/">XenMedio</a>
	&copy; Jason Axelrod from <a href="http://8wayrun.com/">8WAYRUN.COM</a>
</div>';
$__output .= $__compilerVar1;
unset($__compilerVar1);
