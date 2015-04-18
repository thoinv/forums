<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__extraData['title'] = '';
$__extraData['title'] .= 'Edit Signature';
$__output .= '

';
$this->addRequiredExternal('css', 'account');
$__output .= '

<form method="post" class="xenForm AutoValidator Preview"
	action="' . XenForo_Template_Helper_Core::link('account/signature-save', false, array()) . '"
	data-previewUrl="' . XenForo_Template_Helper_Core::link('account/signature-preview', false, array()) . '">

	<dl class="ctrlUnit fullWidth">
		<dt></dt>
		<dd>' . $signatureEditor . '</dd>
	</dl>

	<dl class="ctrlUnit submitUnit">
		<dt></dt>
		<dd>
			<input type="submit" name="save" value="' . 'Save Changes' . '" accesskey="s" class="button primary" />
			<input type="button" value="' . 'Preview' . '..." class="button PreviewButton JsOnly" />
		</dd>
	</dl>

	<input type="hidden" name="_xfToken" value="' . htmlspecialchars($visitor['csrf_token_page'], ENT_QUOTES, 'UTF-8') . '" />
';
if ($visitor['permissions']['signature']['sigpic'])
{
$__output .= '
<dl class="ctrlUnit">
  <dt>Signature Picture:</dt>
  <dd>
    ';
if ($visitor['sigpic_date'])
{
$__output .= '
      ' . XenForo_Template_Helper_Core::callHelper('sigpic', array(
'0' => $visitor
)) . '<br />
      <a href="' . XenForo_Template_Helper_Core::link('account/sigpic', false, array()) . '">Click to Edit</a>
    ';
}
else
{
$__output .= '
      <a href="' . XenForo_Template_Helper_Core::link('account/sigpic', false, array()) . '">Click to Upload</a>
    ';
}
$__output .= '
    <p class="explain">
      To insert your signature picture, add <i>[sigpic][/sigpic]</i> into the editor above.
    </p>
  </dd>
</dl>
';
}
$__output .= '
</form>';
