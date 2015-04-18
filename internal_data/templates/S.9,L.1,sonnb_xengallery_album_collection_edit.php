<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__extraData['title'] = '';
$__extraData['title'] .= (($album['collection_id']) ? ('Edit album\'s collection') : ('Add album to a Collection'));
$__output .= '

';
$__extraData['head']['robots'] = '';
$__extraData['head']['robots'] .= '
	<meta name="robots" content="noindex" />
';
$__output .= '

<form action="' . XenForo_Template_Helper_Core::link('gallery/albums/collection-edit', $album, array()) . '" method="post" class="xenForm formOverlay AutoValidator">

	<dl class="ctrlUnit">
		<dt>' . 'Collection' . '</dt>
		<dd>
			';
if ($collections)
{
$__output .= '
			<select class="textCtrl" name="collection_id">
				<option value="0"></option>
				';
foreach ($collections AS $_col)
{
$__output .= '
					<option value="' . htmlspecialchars($_col['collection_id'], ENT_QUOTES, 'UTF-8') . '" ' . (($_col['collection_id'] == $album['collection_id']) ? ' selected="selected"' : '') . '>' . htmlspecialchars($_col['title'], ENT_QUOTES, 'UTF-8') . '</option>
				';
}
$__output .= '
			</select>
			';
}
else
{
$__output .= '
				<p>' . 'You need to create a collection first.' . '</p>
			';
}
$__output .= '
		</dd>
	</dl>
	
	<dl class="ctrlUnit submitUnit">
		<dt></dt>
		<dd>
			<input type="submit" value="' . 'Save' . '" class="button primary" />
			';
if ($album['collection_id'])
{
$__output .= '
				<a class="button primary OverlayTrigger" href="' . XenForo_Template_Helper_Core::link('gallery/albums/collection-remove', $album, array()) . '">' . 'Remove From Collection' . '</a>
			';
}
$__output .= '
		</dd>
	</dl>

	<input type="hidden" name="_xfToken" value="' . htmlspecialchars($visitor['csrf_token_page'], ENT_QUOTES, 'UTF-8') . '" />
	<input type="hidden" name="_xfConfirm" value="1" />
</form>';
