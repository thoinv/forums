<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$this->addRequiredExternal('css', 'dark_azucloud');
$__output .= '
';
$this->addRequiredExternal('css', 'node_list');
$__output .= '
';
if ($dark_azucloud_enable)
{
$__output .= '
	<div class="section sectionMain nodeList dark_azucloud">
		<div class="nodeInfo categoryNodeInfo categoryStrip">		
			<div class="categoryText">
				<h3 class="nodeTitle">' . 'Users found this page by searching for:' . '</h3>				
			</div>			
		</div>
		<div class=\'dark_azucloud_terms\'>
			<ol class=\'listInline\'>
				';
$i = 0;
foreach ($dark_azucloud_terms AS $term)
{
$i++;
$__output .= '
					<li><' . $term['tag'] . '>' . htmlspecialchars($term['value'], ENT_QUOTES, 'UTF-8') . '</' . $term['tag'] . '>';
if ($i < $dark_azucloud_count)
{
$__output .= ', ';
}
$__output .= '</li>
				';
}
$__output .= '
			</ol>
		</div>
	</div>
';
}
