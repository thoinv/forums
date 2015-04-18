<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$this->addRequiredExternal('css', 'sedo_adv_encadre');
$__output .= '

';
if ($options['skin2'])
{
$__output .= '
	<div class="advbbcodebar_encadre_skin2 ' . htmlspecialchars($options['floatClass'], ENT_QUOTES, 'UTF-8') . ' ' . (($options['responsiveMode']) ? ('responsive') : ('')) . '" style="width:' . htmlspecialchars($options['width'], ENT_QUOTES, 'UTF-8') . htmlspecialchars($options['widthType'], ENT_QUOTES, 'UTF-8') . ';">
		<div class="adv_enc_fieldset">
			<div class="adv_enc_title">' . (($options['title']) ? ($options['title']) : ('Text box:')) . '</div>
			<div class="adv_enc_content">' . $content . '</div>
		</div>
	</div>
';
}
else
{
$__output .= '
	<div class="advbbcodebar_encadre ' . htmlspecialchars($options['floatClass'], ENT_QUOTES, 'UTF-8') . ' ' . (($options['responsiveMode']) ? ('responsive') : ('')) . '" style="width:' . htmlspecialchars($options['width'], ENT_QUOTES, 'UTF-8') . htmlspecialchars($options['widthType'], ENT_QUOTES, 'UTF-8') . ';">
		<div class="adv_enc_abovefieldset">' . (($options['title']) ? ($options['title']) : ('Text box:')) . '</div>
		<div class="adv_enc_fieldset">
			<div class="adv_enc_content">' . $content . '</div>
		</div>
	</div>
';
}
