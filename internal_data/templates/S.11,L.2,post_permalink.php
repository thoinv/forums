<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__extraData['title'] = '';
$__extraData['title'] .= 'Permalink for Post #' . ($post['position'] + 1) . '';
$__output .= '

';
$this->addRequiredExternal('css', 'permalink');
$__output .= '

<form class="section permalinkInfo">

	<h3 class="subHeading">' . 'Chủ đề' . ': <a href="' . XenForo_Template_Helper_Core::link('threads/post-permalink', $thread, array(
'post' => $post
)) . '">' . htmlspecialchars($thread['title'], ENT_QUOTES, 'UTF-8') . '</a></h3>
	<div class="primaryContent">
		<input type="url" dir="ltr" class="textCtrl fillSpace permalink" value="' . XenForo_Template_Helper_Core::link('full:threads/post-permalink', $thread, array(
'post' => $post
)) . '" autofocus="on" />
		
		<ul class="Tabs tabs" data-panes="#IpPanes' . htmlspecialchars($post['post_id'], ENT_QUOTES, 'UTF-8') . ' > li">
			<li><a>' . 'BB Code Link Snippet' . '</a></li>
			<li><a>' . 'HTML Link Code' . '</a></li>
		</ul>
		
		<ul id="IpPanes' . htmlspecialchars($post['post_id'], ENT_QUOTES, 'UTF-8') . '">
			<li><label><input type="text" dir="ltr" class="textCtrl fillSpace" id="bb_code_link_snippet" value="[URL=&quot;' . XenForo_Template_Helper_Core::link('full:threads/post-permalink', $thread, array(
'post' => $post
)) . '&quot;]' . htmlspecialchars($thread['title'], ENT_QUOTES, 'UTF-8') . '[/URL]" />
				<span class="explain">' . 'Copy and paste this code to create a labeled link in a forum message.' . '</span></label></li>
			<li><label><input type="text" dir="ltr" class="textCtrl fillSpace" id="html_link_code" value="&lt;a href=&quot;' . XenForo_Template_Helper_Core::link('full:threads/post-permalink', $thread, array(
'post' => $post
)) . '&quot;&gt;' . htmlspecialchars($thread['title'], ENT_QUOTES, 'UTF-8') . '&lt;/a&gt;" />
				<span class="explain">' . 'Copy and paste this code to create a labeled link on a webpage.' . '</span></label></li>
		</ul>
	</div>
	';
$__compilerVar5 = '';
$__compilerVar5 .= '
				';
$__compilerVar6 = '';
$__compilerVar6 .= '
					';
$__compilerVar7 = '';
$__compilerVar7 .= XenForo_Template_Helper_Core::link('full:threads/post-permalink', $thread, array(
'post' => $post
));
$__compilerVar8 = '';
if ($xenOptions['addThis']['enabled'])
{
$__compilerVar8 .= '
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
	url: "' . XenForo_Template_Helper_Core::jsEscape(htmlspecialchars($__compilerVar7, ENT_QUOTES, 'UTF-8'), 'double') . '",
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
$__compilerVar6 .= $__compilerVar8;
unset($__compilerVar7, $__compilerVar8);
$__compilerVar6 .= '
				';
$__compilerVar5 .= $this->callTemplateHook('share_page_options', $__compilerVar6, array());
unset($__compilerVar6);
$__compilerVar5 .= '
			';
if (trim($__compilerVar5) !== '')
{
$__output .= '
		<div class="secondaryContent">		
			<h4 class="textHeading">' . 'Chia sẻ trang này' . '</h4>
			
			' . $__compilerVar5 . '
						
		</div>
	';
}
unset($__compilerVar5);
$__output .= '
	
	<div class="sectionFooter overlayOnly"><a class="button primary OverlayCloser">' . 'Đóng' . '</a></div>
</form>
';
