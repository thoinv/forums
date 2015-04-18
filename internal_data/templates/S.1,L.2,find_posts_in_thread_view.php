<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
foreach ($posts AS $post)
{
$__output .= '
      ';
if ($post['user_id'] == $visitor['user_id'])
{
$__output .= '
            ';
$hasPosted = '';
$hasPosted .= '1';
$__output .= '
      ';
}
$__output .= '
';
}
$__output .= '
';
if ($visitor['permissions']['findPostsInThread']['canFindPostsInThread'])
{
$__output .= '
';
if ($hasPosted)
{
$__output .= '
        <li><a href="' . XenForo_Template_Helper_Core::link('search/search', '', array(
'type' => 'post',
'thread_id' => $thread['thread_id'],
'users' => $visitor['username']
)) . '">' . 'Your Posts' . '</a></li>
';
}
$__output .= '
';
}
