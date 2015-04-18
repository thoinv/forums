<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$this->addRequiredExternal('css', 'wf_default');
$__output .= '
';
$this->addRequiredExternal('css', 'polls');
$__output .= '
';
$this->addRequiredExternal('js', 'js/xenforo/discussion.js');
$__output .= '

<div id="PollContainer" class="NoAutoHeader PollContainer widget-poll">
	<form action="' . XenForo_Template_Helper_Core::link('threads/poll/vote', $thread, array()) . '" method="post" class="pollBlock AutoValidator PollVoteForm"
		data-container="#PollContainer" data-max-votes="' . htmlspecialchars($poll['max_votes'], ENT_QUOTES, 'UTF-8') . '">

		<div class="pollContent">
			' . $options . '
		</div>

		<input type="hidden" name="_xfToken" value="' . htmlspecialchars($visitor['csrf_token_page'], ENT_QUOTES, 'UTF-8') . '" />
		<input type="hidden" name="_fromWidget" value="1" />
	</form>
</div>';
