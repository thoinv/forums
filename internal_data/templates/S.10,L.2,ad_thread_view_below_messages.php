<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__compilerVar2 = '';
$__output .= $this->callTemplateHook('ad_thread_view_below_messages', $__compilerVar2, array());
unset($__compilerVar2);
$__output .= '
<li id="' . htmlspecialchars($messageId, ENT_QUOTES, 'UTF-8') . '" class="message ' . (($message['isDeleted']) ? ('deleted') : ('')) . ' ' . (($message['is_admin'] OR $message['is_moderator']) ? ('staff') : ('')) . ' ' . (($message['isIgnored']) ? ('ignored') : ('')) . '" data-author="' . htmlspecialchars($message['username'], ENT_QUOTES, 'UTF-8') . '">
<div class="comment_fbdiv" ></div>
<div id="fb-root"></div>
<h4 class="threadinfohead blockhead" style="background-color: #45619D;margin:-1px;padding:10px">Bình Luận Bằng Facebook</h4>
<div class="fb-comments" data-href="http://techlife.com.vn/' . XenForo_Template_Helper_Core::link('threads', $thread, array()) . '" data-num-posts="10" data-width="1200"></div>
</li>';
