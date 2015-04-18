<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__output .= '


<div id="searchBar" class="pageWidth" style="display:none;">
	
	<fieldset id="QuickSearch" class="active">
		<form action="' . XenForo_Template_Helper_Core::link('search/search', false, array()) . '" method="post">
			
			

			
			<div class="primaryControls">
				<!-- block: primaryControls -->
				<input type="search" name="keywords" value="" class="textCtrl" placeholder="Tìm kiếm..." results="0" title="Nhập từ khóa và ấn Enter" id="QuickSearchQuery">				
				<!-- end block: primaryControls -->
			</div>
			
			<input type="hidden" name="_xfToken" value="' . htmlspecialchars($visitor['csrf_token_page'], ENT_QUOTES, 'UTF-8') . '" />
		</form>		
	</fieldset>
	
</div>



';
