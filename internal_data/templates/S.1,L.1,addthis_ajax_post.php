<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$this->addRequiredExternal('css', 'addthisPost');
$__output .= '
';
$url = '';
$url .= XenForo_Template_Helper_Core::link('full:threads/post-permalink', $thread, array(
'post' => $post
));
$__output .= '

<div class="addthisPost">
';
if ($xenOptions['addThis']['enabled'])
{
$__output .= '
<!-- AddThis Button BEGIN -->
<div class="addthis_toolbox addthis_default_style addthis_16x16_style">
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
if (window.addthis)
{
	window.addthis = null;
}

XenForo.loadJs("http://s7.addthis.com/js/250/addthis_widget.js#domready=1' . (($xenOptions['addThisPubId']) ? ('&pubid=' . XenForo_Template_Helper_Core::jsEscape(htmlspecialchars($xenOptions['addThis']['pubId'], ENT_QUOTES, 'UTF-8'), 'double')) : ('')) . '");

</script>
<!-- AddThis Button END -->
</div>
';
}
