<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__extraData['title'] = '';
$__extraData['title'] .= 'Signature Picture Editor';
$__output .= '

';
$__extraData['navigation'] = array();
$__extraData['navigation'][] = array('href' => XenForo_Template_Helper_Core::link('full:account/signature', false, array()), 'value' => 'Chữ ký');
$__output .= '

<form action="' . XenForo_Template_Helper_Core::link('account/sigpic-upload', false, array()) . '" method="post" enctype="multipart/form-data" class="xenForm">
	
	';
if ($visitor['sigpic_date'])
{
$__output .= '
		<fieldset>
			<dl class="ctrlUnit">
				<dt><label>Current Signature Picture:</label></dt>
				<dd>' . XenForo_Template_Helper_Core::callHelper('sigpic', array(
'0' => $visitor
)) . '</dd>
			</dl>

			<dl class="ctrlUnit">
				<dt></dt>
				<dd><label for="ctrl_delete"><input type="checkbox" name="delete" value="1" id="ctrl_delete" /> Delete current Signature Picture?</label></dd>
			</dl>
		</fieldset>
	';
}
$__output .= '
	
	<dl class="ctrlUnit">
		<dt><label>Upload Signature Picture:</label></dt>
		<dd><input type="file" name="sigpic" /></dd>
	</dl>
	
	<dl class="ctrlUnit">
		<dt>Limits:</dt>
		<dd>
		  ';
if ($filesize)
{
$__output .= '<p class="explain">' . htmlspecialchars($filesize, ENT_QUOTES, 'UTF-8') . ' KB file size.</p>';
}
$__output .= '
		  ';
if ($width)
{
$__output .= '<p class="explain">' . htmlspecialchars($width, ENT_QUOTES, 'UTF-8') . ' pixels image width.</p>';
}
$__output .= '
		  ';
if ($height)
{
$__output .= '<p class="explain">' . htmlspecialchars($height, ENT_QUOTES, 'UTF-8') . ' pixels image height.</p>';
}
$__output .= '		  		  
		</dd>
	</dl>	

	<dl class="ctrlUnit submitUnit">
		<dt></dt>
		<dd><input type="submit" value="' . 'Lưu thay đổi' . '" accesskey="s" class="button primary" /></dd>
	</dl>

	<input type="hidden" name="_xfToken" value="' . htmlspecialchars($visitor['csrf_token_page'], ENT_QUOTES, 'UTF-8') . '" />
</form>';
