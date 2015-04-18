<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$this->addRequiredExternal('css', 'realtime');
$__output .= '
';
$this->addRequiredExternal('css', 'profile_post_list_simple');
$__output .= '

<div class="section popularThreads">
	<div class="secondaryContent">
		<h3>' . 'Popular Threads Right Now' . '</h3>
		<ul>
			';
foreach ($urls AS $url)
{
$__output .= '

				<li class="profilePostListItem" data-author="' . htmlspecialchars($url['username'], ENT_QUOTES, 'UTF-8') . '">
					' . XenForo_Template_Helper_Core::callHelper('avatarhtml', array($url,(true),array(
'user' => '$url',
'size' => 's',
'img' => 'true'
),'')) . '
					<a href="' . XenForo_Template_Helper_Core::link('threads', $url, array()) . '">

					<div class="messageInfo">
						<div class="messageContent">
						
							<div class="title">' . htmlspecialchars($url['title'], ENT_QUOTES, 'UTF-8') . '</div>
							<div class="snippet">' . XenForo_Template_Helper_Core::callHelper('snippet', array(
'0' => $url['message'],
'1' => '70',
'2' => array(
'stripQuote' => '1'
)
)) . '</div>
						</div>
					
					
						
						<div class="messageMeta muted">
							
							<div class="publicControls">
								' . 'Replies' . ': ' . XenForo_Template_Helper_Core::numberFormat($url['reply_count'], '0') . ', ' . 'Views' . ': ' . XenForo_Template_Helper_Core::numberFormat($url['view_count'], '0') . '
							</div>
						</div>

						
						
					</div>
					</a>
				</li>
				
			';
}
$__output .= '
		</ul>
	</div>
</div>';
