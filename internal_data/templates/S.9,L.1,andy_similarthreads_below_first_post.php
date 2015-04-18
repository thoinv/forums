<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
if ($similarThreads AND $showBelowFirstPost)
{
$__output .= '

    <div class="blueLine"></div>
    <br />

    <div class="sectionMain similarThreadsThreadView">
    
        <div class="primaryContent">
        ';
if ($xenOptions['similarThreadsShowSearchWords'] == 1)
{
$__output .= '
        	' . 'Similar Threads:' . ' ' . htmlspecialchars($searchWord1, ENT_QUOTES, 'UTF-8') . ' ' . htmlspecialchars($searchWord2, ENT_QUOTES, 'UTF-8') . '
        ';
}
$__output .= '
        ';
if ($xenOptions['similarThreadsShowSearchWords'] == 0)
{
$__output .= '
        	' . 'Similar Threads' . '
        ';
}
$__output .= '
        </div>
        
        <table class="dataTable">
        
        <tr class="dataRow">
        <th>' . 'Forum' . '</th>
        <th>' . 'Title' . '</th>
        <th>' . 'Date' . '</th>
        </tr>
        
        ';
foreach ($similarThreads AS $index => $similarThread)
{
$__output .= '
        
            <tr class="dataRow">
            <td>' . htmlspecialchars($similarThread['nodetitle'], ENT_QUOTES, 'UTF-8') . '</td>
            <td><a href="' . XenForo_Template_Helper_Core::link('threads', $similarThread, array()) . '" title="' . htmlspecialchars($similarThread['title'], ENT_QUOTES, 'UTF-8') . '">' . htmlspecialchars($similarThread['title'], ENT_QUOTES, 'UTF-8') . '</a></td>
            <td>' . XenForo_Template_Helper_Core::datetime($similarThread['post_date'], '') . '</td>
            </tr>
        
        ';
}
$__output .= '
        
        </table>

    </div>
    <br />

';
}
