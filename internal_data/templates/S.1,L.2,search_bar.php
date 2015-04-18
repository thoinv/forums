<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__output .= '

<div id="searchBar" class="pageWidth">
	';
$__compilerVar2 = '';
$__compilerVar2 .= '
	<span id="QuickSearchPlaceholder" title="' . 'Tìm kiếm' . '">' . 'Tìm kiếm' . '</span>
	<fieldset id="QuickSearch">
		<form action="' . XenForo_Template_Helper_Core::link('search/search', false, array()) . '" method="post" class="formPopup">
			
			<div class="primaryControls">
				<!-- block: primaryControls -->
				<input type="search" name="keywords" value="" class="textCtrl" placeholder="' . 'Tìm kiếm' . '..." results="0" title="' . 'Nhập từ khóa và ấn Enter' . '" id="QuickSearchQuery" />				
				<!-- end block: primaryControls -->
			</div>
			
			<div class="secondaryControls">
				<div class="controlsWrapper">
				
					<!-- block: secondaryControls -->
					<dl class="ctrlUnit">
						<dt></dt>
						<dd><ul>
							<li><label><input type="checkbox" name="title_only" value="1"
								id="search_bar_title_only" class="AutoChecker"
								data-uncheck="#search_bar_thread" /> ' . 'Chỉ tìm trong tiêu đề' . '</label></li>
						</ul></dd>
					</dl>
				
					<dl class="ctrlUnit">
						<dt><label for="searchBar_users">' . 'Được gửi bởi thành viên' . ':</label></dt>
						<dd>
							<input type="text" name="users" value="" class="textCtrl AutoComplete" id="searchBar_users" />
							<p class="explain">' . 'Dãn cách tên bằng dấu phẩy(,).' . '</p>
						</dd>
					</dl>
				
					<dl class="ctrlUnit">
						<dt><label for="searchBar_date">' . 'Mới hơn ngày' . ':</label></dt>
						<dd><input type="date" name="date" value="" class="textCtrl" id="searchBar_date" /></dd>
					</dl>
					
					';
if ($searchBar)
{
$__compilerVar2 .= '
					<dl class="ctrlUnit">
						<dt></dt>
						<dd><ul>
								';
foreach ($searchBar AS $constraint)
{
$__compilerVar2 .= '
									<li>' . $constraint . '</li>
								';
}
$__compilerVar2 .= '
						</ul></dd>
					</dl>
					';
}
$__compilerVar2 .= '
				</div>
				<!-- end block: secondaryControls -->
				
				<dl class="ctrlUnit submitUnit">
					<dt></dt>
					<dd>
						<input type="submit" value="' . 'Tìm kiếm' . '" class="button primary Tooltip" title="' . 'Tìm ngay' . '" />
						<div class="Popup" id="commonSearches">
							<a rel="Menu" class="button NoPopupGadget Tooltip" title="' . 'Tìm kiếm hữu ích' . '" data-tipclass="flipped"><span class="arrowWidget"></span></a>
							<div class="Menu">
								<div class="primaryContent menuHeader">
									<h3>' . 'Tìm kiếm hữu ích' . '</h3>
								</div>
								<ul class="secondaryContent blockLinksList">
									<!-- block: useful_searches -->
									<li><a href="' . XenForo_Template_Helper_Core::link('find-new/posts', '', array(
'recent' => '1'
)) . '" rel="nofollow">' . 'Bài viết gần đây' . '</a></li>
									';
if ($visitor['user_id'])
{
$__compilerVar2 .= '
									<li><a href="' . XenForo_Template_Helper_Core::link('search/member', '', array(
'user_id' => $visitor['user_id'],
'content' => 'thread'
)) . '">' . 'Chủ đề của bạn' . '</a></li>
									<li><a href="' . XenForo_Template_Helper_Core::link('search/member', '', array(
'user_id' => $visitor['user_id'],
'content' => 'post'
)) . '">' . 'Bài viết của bạn' . '</a></li>
									<li><a href="' . XenForo_Template_Helper_Core::link('search/member', '', array(
'user_id' => $visitor['user_id'],
'content' => 'profile_post'
)) . '">' . 'Bài viết trong hồ sơ của bạn' . '</a></li>
									';
}
$__compilerVar2 .= '
									<!-- end block: useful_searches -->
								</ul>
							</div>
						</div>
						<a href="' . XenForo_Template_Helper_Core::link('search', false, array()) . '" class="button moreOptions Tooltip" title="' . 'Tìm nâng cao' . '">' . 'Thêm' . '...</a>
					</dd>
				</dl>
				
			</div>
			
			<input type="hidden" name="_xfToken" value="' . htmlspecialchars($visitor['csrf_token_page'], ENT_QUOTES, 'UTF-8') . '" />
		</form>		
	</fieldset>
	';
$__output .= $this->callTemplateHook('quick_search', $__compilerVar2, array());
unset($__compilerVar2);
$__output .= '
</div>';
