<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
if ($message['position'] == 0 and $morethread['samecat'])
{
$__output .= '
';
$this->addRequiredExternal('css', 'MoreThread_main');
$__output .= '
<div class="clear"></div>
<div class="vietxf_MoreThread">
    <div class="section">
        <h4 class="heading">' . '[VietXf] More Threads in same category' . '</h4>
        <ul class="secondaryContent">
            ';
foreach ($morethread['samecat'] AS $thread)
{
$__output .= '
            <li><a href="' . XenForo_Template_Helper_Core::link('threads', $thread, array()) . '">' . htmlspecialchars($thread['title'], ENT_QUOTES, 'UTF-8') . '</a><span class="morethread_time">' . htmlspecialchars($thread['post_date'], ENT_QUOTES, 'UTF-8') . '</span></li>
            ';
}
$__output .= '
        </ul>
    </div>
</div>
<div class="clear"></div>
';
}
$__output .= '
';
