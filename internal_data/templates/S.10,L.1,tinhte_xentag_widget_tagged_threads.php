<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__compilerVar1 = '';
$__compilerVar2 = '';
$__compilerVar2 .= '
                ';
foreach ($threads AS $thread)
{
$__compilerVar2 .= '
					';
$__compilerVar3 = '';
$__compilerVar3 .= '
							';
$__compilerVar4 = '';
$__compilerVar4 .= '
									' . '' . '<a href="' . XenForo_Template_Helper_Core::link('members', $thread, array()) . '">' . htmlspecialchars($thread['username'], ENT_QUOTES, 'UTF-8') . '</a>' . ' posted' . ' ' . XenForo_Template_Helper_Core::callHelper('datetimehtml', array($thread['post_date'],array(
'time' => htmlspecialchars($thread['post_date'], ENT_QUOTES, 'UTF-8')
))) . '
								';
$__compilerVar5 = '';
$__compilerVar5 .= '<li class="thread-' . htmlspecialchars($thread['thread_id'], ENT_QUOTES, 'UTF-8') . ' thread-node-' . htmlspecialchars($thread['node_id'], ENT_QUOTES, 'UTF-8') . (($thread['isNew']) ? (' unread') : ('')) . '">
	' . XenForo_Template_Helper_Core::callHelper('avatarhtml', array($thread,(true),array(
'user' => '$thread',
'size' => 's',
'img' => 'true'
),'')) . '

	';
if (XenForo_Template_Helper_Core::styleProperty('wf_threads_showPrefix'))
{
$__compilerVar5 .= XenForo_Template_Helper_Core::callHelper('threadprefix', array(
'0' => $thread
));
}
$__compilerVar5 .= '

	<a ' . (($thread['title'] != XenForo_Template_Helper_Core::callHelper('snippet', array(
'0' => $thread['title'],
'1' => XenForo_Template_Helper_Core::styleProperty('wf_threads_titleMaxLength')
))) ? ('title="' . htmlspecialchars($thread['title'], ENT_QUOTES, 'UTF-8') . '" class="Tooltip"') : ('')) . '
		href="' . (($_threadLink) ? ($_threadLink) : (XenForo_Template_Helper_Core::link('threads', $thread, array()))) . '">
		' . XenForo_Template_Helper_Core::callHelper('snippet', array(
'0' => $thread['title'],
'1' => XenForo_Template_Helper_Core::styleProperty('wf_threads_titleMaxLength')
)) . '
	</a>

	<div class="userTitle">' . $__compilerVar4 . '</div>
	
	';
if ($thread['messageHtml'])
{
$__compilerVar5 .= '<div>' . XenForo_Template_Helper_Core::callHelper('WidgetFramework_snippet', array(
'0' => $thread['messageHtml'],
'1' => XenForo_Template_Helper_Core::styleProperty('wf_threads_snippetMaxLength')
)) . '</div>';
}
$__compilerVar5 .= '
</li>
';
$__compilerVar3 .= $__compilerVar5;
unset($__compilerVar4, $__compilerVar5);
$__compilerVar3 .= '
						';
if (trim($__compilerVar3) !== '')
{
$__compilerVar2 .= '
						
						' . $__compilerVar3 . '
					';
}
else
{
$__compilerVar2 .= '
						
						<li>
							' . XenForo_Template_Helper_Core::callHelper('avatarhtml', array($thread,(true),array(
'user' => '$thread',
'size' => 's',
'img' => 'true'
),'')) . '
							' . '
							<div class="userTitle">' . '' . '<a href="' . XenForo_Template_Helper_Core::link('members', $thread, array()) . '">' . htmlspecialchars($thread['username'], ENT_QUOTES, 'UTF-8') . '</a>' . ' posted' . ' ' . XenForo_Template_Helper_Core::callHelper('datetimehtml', array($thread['post_date'],array(
'time' => htmlspecialchars($thread['post_date'], ENT_QUOTES, 'UTF-8')
))) . '</div>
						</li>
					';
}
unset($__compilerVar3);
$__compilerVar2 .= '
            	';
}
$__compilerVar2 .= '
            ';
if (trim($__compilerVar2) !== '')
{
$__compilerVar1 .= '
    <div class="avatarList">
        <ul>
            ' . $__compilerVar2 . '
        </ul>
    </div>
';
}
unset($__compilerVar2);
$__output .= $__compilerVar1;
unset($__compilerVar1);
