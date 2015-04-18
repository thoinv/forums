<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$this->addRequiredExternal('css', 'sonnb_LiveThread_facebook_comment');
$__output .= '

<fb:comments href="' . XenForo_Template_Helper_Core::link('canonical:posts', $post, array()) . '" class="fb-comments" width="' . htmlspecialchars($options['width'], ENT_QUOTES, 'UTF-8') . '" colorscheme="' . htmlspecialchars($options['colorscheme'], ENT_QUOTES, 'UTF-8') . '" numposts="' . htmlspecialchars($options['num_posts'], ENT_QUOTES, 'UTF-8') . '"></fb:comments>
';
if ($ajaxCall)
{
$__output .= '
	<script type="text/javascript">
		/** @param {jQuery} $ jQuery Object */
		!function($, window, document, _undefined)
		{
			if (typeof window.FB !== "undefined") 
			{
				setTimeout(function(){
					window.FB.XFBML.parse(document.getElementById(\'post-' . htmlspecialchars($post['post_id'], ENT_QUOTES, 'UTF-8') . '\'));
				}, 1000);
			}
		}
		(jQuery, this, document);
	</script>
';
}
