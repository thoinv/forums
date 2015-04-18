<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__compilerVar6 = '';
$__compilerVar7 = '';
$__compilerVar7 .= '
                ';
foreach ($threads AS $thread)
{
$__compilerVar7 .= '
					';
$__compilerVar8 = '';
$__compilerVar8 .= '
							';
$__compilerVar9 = '';
$__compilerVar9 .= '
									' . '' . '<a href="' . XenForo_Template_Helper_Core::link('members', $thread, array()) . '">' . htmlspecialchars($thread['username'], ENT_QUOTES, 'UTF-8') . '</a>' . ' posted' . ' ' . XenForo_Template_Helper_Core::callHelper('datetimehtml', array($thread['post_date'],array(
'time' => htmlspecialchars($thread['post_date'], ENT_QUOTES, 'UTF-8')
))) . '
								';
$__compilerVar10 = '';
$__compilerVar10 .= '<li class="thread-' . htmlspecialchars($thread['thread_id'], ENT_QUOTES, 'UTF-8') . ' thread-node-' . htmlspecialchars($thread['node_id'], ENT_QUOTES, 'UTF-8') . (($thread['isNew']) ? (' unread') : ('')) . '">
	' . XenForo_Template_Helper_Core::callHelper('avatarhtml', array($thread,(true),array(
'user' => '$thread',
'size' => 's',
'img' => 'true'
),'')) . '

	';
if (XenForo_Template_Helper_Core::styleProperty('wf_threads_showPrefix'))
{
$__compilerVar10 .= XenForo_Template_Helper_Core::callHelper('threadprefix', array(
'0' => $thread
));
}
$__compilerVar10 .= '

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

	<div class="userTitle">' . $__compilerVar9 . '</div>
	
	';
if ($thread['messageHtml'])
{
$__compilerVar10 .= '<div>' . XenForo_Template_Helper_Core::callHelper('WidgetFramework_snippet', array(
'0' => $thread['messageHtml'],
'1' => XenForo_Template_Helper_Core::styleProperty('wf_threads_snippetMaxLength')
)) . '</div>';
}
$__compilerVar10 .= '
</li>
';
$__compilerVar8 .= $__compilerVar10;
unset($__compilerVar9, $__compilerVar10);
$__compilerVar8 .= '
						';
if (trim($__compilerVar8) !== '')
{
$__compilerVar7 .= '
						
						' . $__compilerVar8 . '
					';
}
else
{
$__compilerVar7 .= '
						
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
unset($__compilerVar8);
$__compilerVar7 .= '
            	';
}
$__compilerVar7 .= '
            ';
if (trim($__compilerVar7) !== '')
{
$__compilerVar6 .= '
    <div class="avatarList">
        <ul>
            ' . $__compilerVar7 . '
        </ul>
    </div>
';
}
unset($__compilerVar7);
$__output .= $__compilerVar6;
unset($__compilerVar6);
