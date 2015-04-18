<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__extraData['title'] = '';
$__extraData['title'] .= XenForo_Template_Helper_Core::callHelper('resourcePrefix', array(
'0' => $resource,
'1' => 'escaped'
)) . htmlspecialchars($resource['title'], ENT_QUOTES, 'UTF-8') . ' - ' . 'Version History';
$__output .= '

';
$this->addRequiredExternal('css', 'resource_view');
$__output .= '

';
$__extraData['head']['canonical'] = '';
$__extraData['head']['canonical'] .= '
	<link rel="canonical" href="' . XenForo_Template_Helper_Core::link('canonical:resources/history', $resource, array()) . '" />';
$__output .= '

<table class="dataTable resourceHistory">
<tr class="dataRow">
	<th class="version">' . 'Version' . '</th>
	<th class="releaseDate">' . 'Release Date' . '</th>
	';
if (!$resource['is_fileless'])
{
$__output .= '<th class="downloads">' . 'Downloads' . '</th>';
}
$__output .= '
	<th class="rating">' . 'Average Rating' . '</th>
	';
if ($resource['canDownload'] AND !$resource['is_fileless'])
{
$__output .= '<th class="download">&nbsp;</th>';
}
$__output .= '
	';
if ($canDelete)
{
$__output .= '<th class="deleteVersion">&nbsp;</th>';
}
$__output .= '
</tr>
';
foreach ($versions AS $version)
{
$__output .= '
<tr class="dataRow ' . (($version['version_state'] == ('deleted')) ? ('resourceVersionDeleted') : ('')) . ' ' . (($version['version_state'] == ('moderated')) ? ('resourceVersionModerated') : ('')) . '">
	<td class="version">' . htmlspecialchars($version['version_string'], ENT_QUOTES, 'UTF-8') . '</td>
	<td class="releaseDate">' . XenForo_Template_Helper_Core::callHelper('datetimehtml', array($version['release_date'],array(
'time' => htmlspecialchars($version['release_date'], ENT_QUOTES, 'UTF-8')
))) . '</td>
	';
if (!$resource['is_fileless'])
{
$__output .= '<td class="downloads">' . XenForo_Template_Helper_Core::numberFormat($version['download_count'], '0') . '</td>';
}
$__output .= '
	<td class="rating">';
$__compilerVar1 = '';
$__compilerVar1 .= (($version['rating_count']) ? (($version['rating_sum'] / $version['rating_count'])) : ('0'));
$__compilerVar2 = '';
$__compilerVar2 .= (($version['rating_count'] == 1) ? ('1 vote') : ('' . htmlspecialchars($version['rating_count'], ENT_QUOTES, 'UTF-8') . ' votes'));
$__compilerVar3 = '';
$this->addRequiredExternal('css', 'rating');
$__compilerVar3 .= '

';
if ($action)
{
$__compilerVar3 .= '
	';
$this->addRequiredExternal('js', 'js/xenforo/rating.js');
$__compilerVar3 .= '

	<form action="' . htmlspecialchars($action, ENT_QUOTES, 'UTF-8') . '" method="post" class="rating RatingWidget" ' . (($microdata) ? ('itemscope="itemscope" itemtype="http://data-vocabulary.org/Rating"') : ('')) . '>
		<dl>
			<dt class="prompt muted">' . $prompt . '</dt>
			<dd>
				<span class="ratings">
					 <button type="submit" name="rating" value="1" class="star ' . (($__compilerVar1 >= 1) ? ('Full') : ('')) . (($__compilerVar1 >= 0.5 AND $__compilerVar1 < 1) ? ('Half') : ('')) . '" title="' . 'Terrible' . '">1</button
					><button type="submit" name="rating" value="2" class="star ' . (($__compilerVar1 >= 2) ? ('Full') : ('')) . (($__compilerVar1 >= 1.5 AND $__compilerVar1 < 2) ? ('Half') : ('')) . '" title="' . 'Poor' . '">2</button
					><button type="submit" name="rating" value="3" class="star ' . (($__compilerVar1 >= 3) ? ('Full') : ('')) . (($__compilerVar1 >= 2.5 AND $__compilerVar1 < 3) ? ('Half') : ('')) . '" title="' . 'Average' . '">3</button
					><button type="submit" name="rating" value="4" class="star ' . (($__compilerVar1 >= 4) ? ('Full') : ('')) . (($__compilerVar1 >= 3.5 AND $__compilerVar1 < 4) ? ('Half') : ('')) . '" title="' . 'Good' . '">4</button
					><button type="submit" name="rating" value="5" class="star ' . (($__compilerVar1 >= 5) ? ('Full') : ('')) . (($__compilerVar1 >= 4.5 AND $__compilerVar1 < 5) ? ('Half') : ('')) . '" title="' . 'Excellent' . '">5</button>
				</span>
			
				<span class="RatingValue"><span class="Number" itemprop="average">' . htmlspecialchars($__compilerVar1, ENT_QUOTES, 'UTF-8') . '</span>/<span itemprop="best">5</span>,</span>
				';
if ($threadrating['whoRated'] AND $controllerName == ('XenForo_ControllerPublic_Thread') AND $thread['thread_rate_count'] > 0)
{
$__compilerVar3 .= '
					<a href="' . XenForo_Template_Helper_Core::link('threads/whoRated', $thread, array()) . '" title="' . 'Who has rated this thread?' . '" class="OverlayTrigger"><span class="Hint">' . $__compilerVar2 . '</span></a>
				';
}
else
{
$__compilerVar3 .= '
				<span class="Hint">' . $__compilerVar2 . '</span>
				';
}
$__compilerVar3 .= '
			</dd>
		</dl>
		
		<input type="hidden" name="_xfToken" value="' . htmlspecialchars($visitor['csrf_token_page'], ENT_QUOTES, 'UTF-8') . '" />
	</form>
	
';
}
else
{
$__compilerVar3 .= '
	
	<div class="rating ';
if ($xenOptions['threadrating_greyedout'])
{
$__compilerVar3 .= 'tr_greyedout';
}
$__compilerVar3 .= '">
		<dl>
			<dt class="prompt muted">' . $prompt . '</dt>
			<dd>		
				<span class="ratings" title="' . XenForo_Template_Helper_Core::numberFormat($__compilerVar1, '2') . '">
					 <span class="star ' . (($__compilerVar1 >= 1) ? ('Full') : ('')) . (($__compilerVar1 >= 0.5 AND $__compilerVar1 < 1) ? ('Half') : ('')) . '"></span
					><span class="star ' . (($__compilerVar1 >= 2) ? ('Full') : ('')) . (($__compilerVar1 >= 1.5 AND $__compilerVar1 < 2) ? ('Half') : ('')) . '"></span
					><span class="star ' . (($__compilerVar1 >= 3) ? ('Full') : ('')) . (($__compilerVar1 >= 2.5 AND $__compilerVar1 < 3) ? ('Half') : ('')) . '"></span
					><span class="star ' . (($__compilerVar1 >= 4) ? ('Full') : ('')) . (($__compilerVar1 >= 3.5 AND $__compilerVar1 < 4) ? ('Half') : ('')) . '"></span
					><span class="star ' . (($__compilerVar1 >= 5) ? ('Full') : ('')) . (($__compilerVar1 >= 4.5 AND $__compilerVar1 < 5) ? ('Half') : ('')) . '"></span>
				</span>
				
				<span class="RatingValue"><span class="Number" itemprop="average">' . htmlspecialchars($__compilerVar1, ENT_QUOTES, 'UTF-8') . '</span>/<span itemprop="best">5</span>,</span>
				';
if ($threadrating['whoRated'] AND $controllerName == ('XenForo_ControllerPublic_Thread') AND $thread['thread_rate_count'] > 0)
{
$__compilerVar3 .= '
					<a href="' . XenForo_Template_Helper_Core::link('threads/whoRated', $thread, array()) . '" title="' . 'Who has rated this thread?' . '" class="OverlayTrigger"><span class="Hint">' . $__compilerVar2 . '</span></a>
				';
}
else
{
$__compilerVar3 .= '
				<span class="Hint">' . $__compilerVar2 . '</span>
				';
}
$__compilerVar3 .= '
			</dd>
		</dl>	
	</div>

';
}
$__output .= $__compilerVar3;
unset($__compilerVar1, $__compilerVar2, $__compilerVar3);
$__output .= '</td>
	';
if ($resource['canDownload'] AND !$resource['is_fileless'])
{
$__output .= '<td class="dataOptions download"><a href="' . XenForo_Template_Helper_Core::link('resources/download', $resource, array(
'version' => $version['resource_version_id']
)) . '" class="secondaryContent">' . 'Download' . '</a></td>';
}
$__output .= '
	';
if ($canDelete)
{
$__output .= '
		';
if ($version['canDelete'])
{
$__output .= '
			<td class="delete deleteVersion"><a href="' . XenForo_Template_Helper_Core::link('resources/delete-version', $resource, array(
'resource_version_id' => $version['resource_version_id']
)) . '" class="OverlayTrigger">' . 'Delete' . '</a></td>
		';
}
else
{
$__output .= '
			<td class="delete deleteVersion">&nbsp;</td>
		';
}
$__output .= '
	';
}
$__output .= '
</tr>
';
}
$__output .= '
</table>';
