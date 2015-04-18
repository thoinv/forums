<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__output .= '.advbbcodebar_encadre.responsive,
.advbbcodebar_encadre_skin2.responsive {
	max-width: ' . htmlspecialchars($xenOptions['sedo_adv_responsive_maxwidth'], ENT_QUOTES, 'UTF-8') . 'px;
	margin-bottom: 10px;
}

.advbbcodebar_encadre.bleft,
.advbbcodebar_encadre_skin2.bleft {
	margin-right:auto;
}
.advbbcodebar_encadre.bcenter,
.advbbcodebar_encadre_skin2.bcenter {
	margin-left:auto;
	margin-right:auto;
}

.advbbcodebar_encadre.bright,
.advbbcodebar_encadre_skin2.bright {
	margin-left:auto;
}

.advbbcodebar_encadre.fright,
.advbbcodebar_encadre_skin2.fright{
	float:right;
}

.advbbcodebar_encadre.fleft{
	float:left;
	margin-left:' . XenForo_Template_Helper_Core::styleProperty('advbbcodebar_encadre_wrapper.margin-right') . ';
	margin-right:' . XenForo_Template_Helper_Core::styleProperty('advbbcodebar_encadre_wrapper.margin-left') . ';
}

.advbbcodebar_encadre_skin2.fleft{
	float:left;
	margin-left:' . XenForo_Template_Helper_Core::styleProperty('advbbcodebar_encadre_wrapper_skin2.margin-right') . ';
	margin-right:' . XenForo_Template_Helper_Core::styleProperty('advbbcodebar_encadre_wrapper_skin2.margin-left') . ';
}

.advbbcodebar_encadre{
	' . XenForo_Template_Helper_Core::styleProperty('advbbcodebar_encadre_wrapper') . '
}
.advbbcodebar_encadre .adv_enc_fieldset{
	' . XenForo_Template_Helper_Core::styleProperty('advbbcodebar_encadre') . '
}
.advbbcodebar_encadre .adv_enc_abovefieldset{
	' . XenForo_Template_Helper_Core::styleProperty('advbbcodebar_encadre_title') . '
}

.advbbcodebar_encadre_skin2{
	' . XenForo_Template_Helper_Core::styleProperty('advbbcodebar_encadre_wrapper_skin2') . '
}
.advbbcodebar_encadre_skin2 .adv_enc_fieldset{
	' . XenForo_Template_Helper_Core::styleProperty('advbbcodebar_encadre_skin2') . '
}

.advbbcodebar_encadre_skin2 .adv_enc_title{
	' . XenForo_Template_Helper_Core::styleProperty('advbbcodebar_encadre_title_skin2') . '
}';
