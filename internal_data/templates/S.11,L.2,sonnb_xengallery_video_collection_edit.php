<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__extraData['title'] = '';
$__extraData['title'] .= (($content['collection_id']) ? ('Edit Video Collection') : ('sonnb_xengallery_add_video_to_a_collection'));
$__output .= '

<form action="' . XenForo_Template_Helper_Core::link('gallery/videos/collection-edit', $content, array()) . '" method="post" class="xenForm formOverlay AutoValidator">

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
					<option value="' . htmlspecialchars($_col['collection_id'], ENT_QUOTES, 'UTF-8') . '" ' . (($_col['collection_id'] == $content['collection_id']) ? ' selected="selected"' : '') . '>' . htmlspecialchars($_col['title'], ENT_QUOTES, 'UTF-8') . '</option>
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
			<input type="submit" value="' . 'Lưu' . '" class="button primary" />
			';
if ($content['collection_id'])
{
$__output .= '
				<a class="button primary OverlayTrigger" href="' . XenForo_Template_Helper_Core::link('gallery/videos/collection-remove', $content, array()) . '">' . 'Remove From Collection' . '</a>
			';
}
$__output .= '
		</dd>
	</dl>

	<input type="hidden" name="_xfToken" value="' . htmlspecialchars($visitor['csrf_token_page'], ENT_QUOTES, 'UTF-8') . '" />
	<input type="hidden" name="_xfConfirm" value="1" />
</form>';
