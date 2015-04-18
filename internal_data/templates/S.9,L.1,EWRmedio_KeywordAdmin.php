<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__extraData['title'] = '';
$__extraData['title'] .= 'Administrate Keywords';
$__output .= '
';
$__extraData['h1'] = '';
$__extraData['h1'] .= 'Administrate Keywords';
$__output .= '

';
$this->addRequiredExternal('css', 'EWRmedio');
$__output .= '
';
$this->addRequiredExternal('js', 'js/8wayrun/slugit.js');
$__output .= '
';
$this->addRequiredExternal('js', 'js/8wayrun/EWRmedio_ajax.js');
$__output .= '

<div class="sectionMain adminKeywords">
	<div class="subHeading">' . 'Administrate Keywords' . '</div>

	<form action="' . XenForo_Template_Helper_Core::link('media/admin/keywords', false, array()) . '" method="post">

		<div class="primaryContent">
			<ul>
			';
foreach ($keyList AS $keyword)
{
$__output .= '
				<li>
					<div style="float: right; padding-right: 5px;" />
						(<a href="' . XenForo_Template_Helper_Core::link('media/keyword', $keyword, array()) . '"><b>' . htmlspecialchars($keyword['count'], ENT_QUOTES, 'UTF-8') . '</b></a>)
					</div>
					<label for="ctrl_keywords[' . htmlspecialchars($keyword['keyword_id'], ENT_QUOTES, 'UTF-8') . ']">
						<input type="checkbox" name="keywords[' . htmlspecialchars($keyword['keyword_id'], ENT_QUOTES, 'UTF-8') . ']" value="' . htmlspecialchars($keyword['keyword_id'], ENT_QUOTES, 'UTF-8') . '" id="ctrl_keywords[' . htmlspecialchars($keyword['keyword_id'], ENT_QUOTES, 'UTF-8') . ']">
						' . htmlspecialchars($keyword['keyword_text'], ENT_QUOTES, 'UTF-8') . '
					</label>
				</li>
			';
}
$__output .= '
			</ul>

		</div>

		<div class="secondaryContent">
			<div style="float: right;" />
				<input type="submit" value="' . 'Delete Keywords' . '" name="submit" class="button primary" />
			</div>
			' . XenForo_Template_Helper_Core::callHelper('pagenavhtml', array('public', htmlspecialchars($stop, ENT_QUOTES, 'UTF-8'), htmlspecialchars($count, ENT_QUOTES, 'UTF-8'), htmlspecialchars($start, ENT_QUOTES, 'UTF-8'), 'media/admin/keywords', false, array(), false, array())) . '

			<div style="clear: both;"></div>
		</div>

		<input type="hidden" name="_xfToken" value="' . htmlspecialchars($visitor['csrf_token_page'], ENT_QUOTES, 'UTF-8') . '" />
	</form>
</div>

<div class="sectionMain">
	<div class="subHeading">' . 'Create New Keywords' . '</div>

	<form action="' . XenForo_Template_Helper_Core::link('media/keyword/create', false, array()) . '" method="post" class="xenForm">
		<dl class="ctrlUnit">
			<dt><label for="ctrl_keywords">' . 'Keywords' . ':</label></dt>
			<dd><input type="text" name="media_keywords" class="textCtrl KeywordEdit" id="ctrl_keywords" value="" />
				<li><p class="hint">' . 'Each keyword should be separated with a comma. ( , )' . '</p></li>
			</dd>
		</dl>

		<dl class="ctrlUnit submitUnit">
			<dt></dt>
			<dd>
				<input type="submit" value="' . 'Save Keywords' . '" name="submit" accesskey="s" class="button primary" />
			</dd>
		</dl>

		<input type="hidden" name="_xfToken" value="' . htmlspecialchars($visitor['csrf_token_page'], ENT_QUOTES, 'UTF-8') . '" />
	</form>
</div>

';
$__compilerVar1 = '';
$__compilerVar1 .= '<div class="medioCopy copyright muted">
	<a href="http://xenforo.com/community/resources/97/">XenMedio</a>
	&copy; Jason Axelrod from <a href="http://8wayrun.com/">8WAYRUN.COM</a>
</div>';
$__output .= $__compilerVar1;
unset($__compilerVar1);
