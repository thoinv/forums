<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
if ($xenOptions['addThis']['enabled'])
{
$__output .= '
<!-- AddThis Button BEGIN -->
<div class="addthis_toolbox addthis_default_style addthis_32x32_style">
	<a class="addthis_button_preferred_1"></a>
	<a class="addthis_button_preferred_2"></a>
	<a class="addthis_button_preferred_3"></a>
	<a class="addthis_button_preferred_4"></a>
	<a class="addthis_button_preferred_5"></a>
	<a class="addthis_button_preferred_6"></a>
	<a class="addthis_button_preferred_7"></a>
	<a class="addthis_button_compact"></a>
	<a class="addthis_counter addthis_bubble_style"></a>
</div>

<script type="text/javascript">

var addthis_share = {
	url: "' . XenForo_Template_Helper_Core::jsEscape(htmlspecialchars($url, ENT_QUOTES, 'UTF-8'), 'double') . '",
	templates: {
		twitter: "{{title}} {{url}}' . (($xenOptions['tweet']['via']) ? (' via @' . htmlspecialchars($xenOptions['tweet']['via'], ENT_QUOTES, 'UTF-8')) : ('')) . '"
	}
};
var addthis_config = {
	services_exclude: \'print\'
};

// handle AddThis on AJAX-loaded page			
if (!window.addthis)
{
	XenForo.loadJs("//s7.addthis.com/js/250/addthis_widget.js#domready=1' . (($xenOptions['addThis']['pubId']) ? ('&pubid=' . XenForo_Template_Helper_Core::jsEscape(htmlspecialchars($xenOptions['addThis']['pubId'], ENT_QUOTES, 'UTF-8'), 'double')) : ('')) . '");
}
else
{
	addthis.toolbox($(\'.addthis_toolbox\').get());
}

</script>
<!-- AddThis Button END -->
';
}
