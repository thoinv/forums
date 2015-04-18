<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__extraData['title'] = '';
$__extraData['title'] .= 'Điều hướng nhanh';
$__output .= '

';
$this->addRequiredExternal('css', 'quick_navigation_menu');
$__output .= '

<div class="section">
	<div id="jumpMenu">
		<div class="jumpMenuColumn">
			<h3 class="primaryContent">' . 'Liên kết thường dùng' . '</h3>
			<div class="secondaryContent">
				<div class="blockLinksList">
					<ul>
						';
if ($homeLink)
{
$__output .= '<li><a href="' . htmlspecialchars($homeLink, ENT_QUOTES, 'UTF-8') . '">' . 'Trang chủ' . '</a></li>';
}
$__output .= '
						<li><a href="' . XenForo_Template_Helper_Core::link('forums', false, array()) . '">' . 'Diễn đàn' . '</a></li>
						<li><a href="' . XenForo_Template_Helper_Core::link('members', false, array()) . '">' . 'Thành viên tiêu biểu' . '</a></li>
						';
if ($xenOptions['enableNewsFeed'])
{
$__output .= '<li><a href="' . XenForo_Template_Helper_Core::link('recent-activity', false, array()) . '">' . 'Hoạt động gần đây' . '</a></li>';
}
$__output .= '
					</ul>
					<ul>
					';
if ($visitor['user_id'])
{
$__output .= '
						<li><a href="' . XenForo_Template_Helper_Core::link('members', $visitor, array()) . '">' . 'Trang cá nhân' . '</a></li>
						<li><a href="' . XenForo_Template_Helper_Core::link('account', false, array()) . '">' . 'Tài khoản của bạn' . '</a></li>
						<li><a href="' . XenForo_Template_Helper_Core::link('conversations', false, array()) . '">' . 'Đối thoại' . '</a></li>
						';
if ($xenOptions['enableNewsFeed'])
{
$__output .= '<li><a href="' . XenForo_Template_Helper_Core::link('account/news-feed', false, array()) . '">' . 'Thông tin bạn' . '</a></li>';
}
$__output .= '
					';
}
else
{
$__output .= '
						<li><a href="' . XenForo_Template_Helper_Core::link('login', false, array()) . '">' . (($xenOptions['registrationSetup']['enabled']) ? ('Đăng nhập | Đăng ký') : ('Đăng nhập')) . '</a></li>
					';
}
$__output .= '
					</ul>
					<ul>
						<li><a href="' . XenForo_Template_Helper_Core::link('help', false, array()) . '">' . 'Trợ giúp' . '</a></li>
					</ul>
				</div>
			</div>
		</div>
		<div class="jumpMenuColumn">
			<h3 class="primaryContent">' . 'Danh sách diễn đàn' . '</h3>
			<div class="secondaryContent nodeList">
				<ol class="blockLinksList">
					';
foreach ($nodes AS $node)
{
$__output .= '
						<li class="d' . htmlspecialchars($node['depth'], ENT_QUOTES, 'UTF-8') . ' ' . (($selected == ('node-' . $node['node_id'])) ? ('OverlayScroller') : ('')) . '">
							<a href="' . XenForo_Template_Helper_Core::link(htmlspecialchars($nodeTypes[$node['node_type_id']]['public_route_prefix'], ENT_QUOTES, 'UTF-8'), $node, array()) . '"
								class="' . (($node['node_type_id'] == ('Category')) ? ('OverlayCloser') : ('')) . ' ' . (($selected == ('node-' . $node['node_id'])) ? ('selected') : ('')) . '">
								<span class="_depth' . htmlspecialchars($node['depth'], ENT_QUOTES, 'UTF-8') . ' depthPad">' . htmlspecialchars($node['title'], ENT_QUOTES, 'UTF-8') . '</span>
							</a>
						</li>
					';
}
$__output .= '
				</ol>
			</div>
		</div>
	</div>
	<div class="sectionFooter overlayOnly"><a class="button primary OverlayCloser">' . 'Đóng' . '</a></div>
</div>';
