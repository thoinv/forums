<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
if ($users)
{
$__output .= '
    ';
$this->addRequiredExternal('css', 'wf_default');
$__output .= '
    
    <div class="avatarList">
        <ul>
        	';
foreach ($users AS $user)
{
$__output .= '
			<li class="user-' . htmlspecialchars($user['user_id'], ENT_QUOTES, 'UTF-8') . ' user-profile-post-' . htmlspecialchars($user['status_profile_post_id'], ENT_QUOTES, 'UTF-8') . '">
        		' . XenForo_Template_Helper_Core::callHelper('avatarhtml', array($user,(true),array(
'user' => '$user',
'size' => 's',
'img' => 'true'
),'')) . '
        		<div class="WidgetFramework_nextToAvatar">
        			' . XenForo_Template_Helper_Core::callHelper('usernamehtml', array($user,'',(true),array())) . '
					<div class="status">' . XenForo_Template_Helper_Core::callHelper('bodyText', array(
'0' => $user['status']
)) . '</div>
        			<a href="' . XenForo_Template_Helper_Core::link('profile-posts', array(
'profile_post_id' => $user['status_profile_post_id']
), array()) . '" class="userTitle">' . XenForo_Template_Helper_Core::callHelper('datetimehtml', array($user['status_date'],array(
'time' => '$user.status_date'
))) . '</a>
        		</div>
        	</li>
        	';
}
$__output .= '
        </ul>

        
        ';
if ($canUpdateStatus)
{
$__output .= '
        	<form action="LINK_MEMBER_POST_VISITOR" method="post" class="statusPoster AutoValidator" data-optInOut="OptIn">
        		<textarea name="message" class="textCtrl StatusEditor Elastic" placeholder="' . 'Cập nhật trạng thái' . '..." rows="1" cols="40" style="height:14px" data-statusEditorCounter="#visMenuSEdCount-' . htmlspecialchars($widget['widget_id'], ENT_QUOTES, 'UTF-8') . '" data-nofocus="true"></textarea>
        		<div class="submitUnit">
        			<span id="visMenuSEdCount-' . htmlspecialchars($widget['widget_id'], ENT_QUOTES, 'UTF-8') . '" title="' . 'Số ký tự còn lại' . '"></span>
        			<input type="submit" class="button primary MenuCloser" value="' . 'Đăng' . '" accesskey="s" />
        			<input type="hidden" name="_xfToken" value="CSRF_TOKEN_PAGE" />
        			<input type="hidden" name="return" value="1" /> 
        		</div>
        	</form>
        ';
}
$__output .= '
    </div>
';
}
