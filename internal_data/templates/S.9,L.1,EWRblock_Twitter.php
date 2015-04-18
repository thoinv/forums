<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__output .= '<div class="section">
	<div class="secondaryContent" id="twitter">
		<h3>' . 'Twitter Feed' . '</h3>

		<a class="twitter-timeline" href="http://twitter.com" height="' . htmlspecialchars($option['height'], ENT_QUOTES, 'UTF-8') . '"
			data-dnt="true"
			data-theme="' . XenForo_Template_Helper_Core::styleProperty('fbColorScheme') . '"
			data-widget-id="' . htmlspecialchars($option['widgetid'], ENT_QUOTES, 'UTF-8') . '"
			data-related="' . htmlspecialchars($option['related'], ENT_QUOTES, 'UTF-8') . '"
			data-chrome="' . htmlspecialchars($option['features'], ENT_QUOTES, 'UTF-8') . '">
			' . 'Twitter Feed' . '
		</a>
		<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?\'http\':\'https\';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
	</div>
</div>';
