<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$this->addRequiredExternal('css', 'tinhte_xentag');
$__output .= '
';
$this->addRequiredExternal('js', 'js/Tinhte/XenTag/frontend.js');
$__output .= '

';
$__extraData['title'] = '';
$__extraData['title'] .= 'Tags';
$__output .= '
';
$__extraData['pageDescription'] = array();
$__extraData['pageDescription']['content'] = '';
$__extraData['pageDescription']['content'] .= '
	' . 'These are the ' . XenForo_Template_Helper_Core::numberFormat(count($tags), '0') . ' most used tags.' . '
';
$__output .= '

';
$__extraData['head']['canonical'] = '';
$__extraData['head']['canonical'] .= '
	<link rel="canonical" href="' . XenForo_Template_Helper_Core::link('canonical:tags', false, array()) . '" />';
$__output .= '

';
$__extraData['canSearch'] = '';
$__extraData['canSearch'] .= '0';
$__output .= '

<fieldset>
	<ul class="Tinhte_XenTag_TagCloud sectionMain cloud">
		';
foreach ($tags AS $tag)
{
$__output .= '
			<li class="Tinhte_XenTag_TagCloudTag Tinhte_XenTag_TagCloud_Level' . htmlspecialchars($tag['cloudLevel'], ENT_QUOTES, 'UTF-8') . '">
				<a href="' . XenForo_Template_Helper_Core::link('tags', $tag, array()) . '"
					' . (($tag['tag_title']) ? ('title="' . htmlspecialchars($tag['tag_title'], ENT_QUOTES, 'UTF-8') . '" class="Tooltip"') : ('')) . '>
					' . htmlspecialchars($tag['tag_text'], ENT_QUOTES, 'UTF-8') . '
				</a>
			</li>
		';
}
$__output .= '
	</ul>
</fieldset>

';
if ($trending)
{
$__output .= '
	<div class="titleBar">
		<h1>' . 'Trending' . '</h1>
		<p id="pageDescription" class="muted">' . 'These are ' . XenForo_Template_Helper_Core::numberFormat(count($trending), '0') . ' trending tags recently.' . '</p>
	</div>

	<ul class="Tinhte_XenTag_TagCloud sectionMain trending">
		';
foreach ($trending AS $tag)
{
$__output .= '
			<li class="Tinhte_XenTag_TagCloudTag Tinhte_XenTag_TagCloud_Level' . htmlspecialchars($tag['cloudLevel'], ENT_QUOTES, 'UTF-8') . '">
				<a href="' . XenForo_Template_Helper_Core::link('tags', $tag, array()) . '"
					' . (($tag['tag_title']) ? ('title="' . htmlspecialchars($tag['tag_title'], ENT_QUOTES, 'UTF-8') . '" class="Tooltip"') : ('')) . '>
					' . htmlspecialchars($tag['tag_text'], ENT_QUOTES, 'UTF-8') . '
				</a>
			</li>
		';
}
$__output .= '
	</ul>
';
}
$__output .= '

<form action="' . XenForo_Template_Helper_Core::link('tags/search', false, array()) . '" method="post" class="xenForm">
	<h3 class="textHeading">' . 'Search by tag' . '</h3>

	<dl class="ctrlUnit">
		<dt><label for="ctrl_tinhte_xentag_tags">' . 'Tags' . ':</label></dt>
		<dd>
			<input type="text"
				name="tinhte_xentag_tags_text"
				value=""
				id="ctrl_tinhte_xentag_tags"
				class="textCtrl AutoComplete AcSingle"
				data-acUrl="' . XenForo_Template_Helper_Core::link('tags/find', false, array()) . '"
				data-autoSubmit="yes"
				/>
			<input type="hidden" name="tinhte_xentag_included" value="1" />
		</dd>
	</dl>

	<dl class="ctrlUnit submitUnit">
		<dt></dt>
		<dd><input type="submit" value="' . 'Search' . '" class="button primary" /></dd>
	</dl>

	<input type="hidden" name="_xfToken" value="' . htmlspecialchars($visitor['csrf_token_page'], ENT_QUOTES, 'UTF-8') . '" />
</form>

';
$__compilerVar1 = '';
$__compilerVar1 .= '

';
$this->addRequiredExternal('css', 'tinhte_xentag');
$__compilerVar1 .= '

<div class="Tinhte_XenTag_Copyright">
	XenTag by <a href="http://www.tinhte.vn" target="_blank">Tinhte.vn</a>
</div>';
$__output .= $__compilerVar1;
unset($__compilerVar1);
