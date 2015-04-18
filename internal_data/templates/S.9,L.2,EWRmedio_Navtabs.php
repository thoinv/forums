<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__output .= '<ul class="secondaryContent blockLinksList">
	<li><a href="' . XenForo_Template_Helper_Core::link('media/categories', false, array()) . '">' . 'Categories' . '</a></li>
	<li><a href="' . XenForo_Template_Helper_Core::link('media/playlists', false, array()) . '">' . 'Playlists' . '</a></li>
	';
if ($perms['view'])
{
$__output .= '
		<li><a href="' . XenForo_Template_Helper_Core::link('media/random', false, array()) . '">' . 'Random Media' . '</a></li>
	';
}
$__output .= '
	';
if ($perms['submit'])
{
$__output .= '
		<li><a href="' . XenForo_Template_Helper_Core::link('media/submit', false, array()) . '">' . 'Submit Media' . '</a></li>
	';
}
$__output .= '
	';
if ($perms['admin'] && $media)
{
$__output .= '
		<li style="width: 50px; height: 10px;"></li>
		<li><div class="Popup">
			<a rel="Menu">' . 'Administrate Media' . '</a>

			<div class="Menu">
				<div class="primaryContent menuHeader"><h3>' . 'Administrate Media' . '</h3></div>
				<ul class="secondaryContent blockLinksList">
					<li><a href="' . XenForo_Template_Helper_Core::link('media/admin/categories', false, array()) . '">' . 'Categories' . '</a></li>
					<li><a href="' . XenForo_Template_Helper_Core::link('media/admin/keywords', false, array()) . '">' . 'Keywords' . '</a></li>
					<li><a href="' . XenForo_Template_Helper_Core::link('media/admin/services', false, array()) . '">' . 'Services' . '</a></li>
				</ul>
			</div>
		</div></li>
	';
}
$__output .= '
</ul>';
