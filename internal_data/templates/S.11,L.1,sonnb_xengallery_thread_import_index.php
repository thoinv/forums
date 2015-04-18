<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__extraData['title'] = '';
$__extraData['title'] .= 'Import To Gallery';
$__output .= '

';
$__extraData['head']['robots'] = '';
$__extraData['head']['robots'] .= '
	<meta name="robots" content="noindex" />
';
$__output .= '

';
$this->addRequiredExternal('css', 'sonnb_xengallery_thread_import');
$__output .= '
';
$this->addRequiredExternal('css', 'attached_files');
$__output .= '

<form action="' . XenForo_Template_Helper_Core::link('threads/gallery-import', $thread, array()) . '" method="post"
	class="xenForm formOverlay" data-redirect="on">
	<p class="muted">' . 'You are going to import this thread into a gallery album. Please choose your attachments and options below.' . '</p>
		
	<ol class="overlayScroll importPhotoList attachmentList SquareThumbs">
	';
foreach ($attachments AS $attachment)
{
$__output .= '
		<li class="attachment' . (($attachment['thumbnailUrl']) ? (' image') : ('')) . '" title="' . htmlspecialchars($attachment['filename'], ENT_QUOTES, 'UTF-8') . '">
			<input type="checkbox" name="import_id[]" class="textCtrl" value="' . htmlspecialchars($attachment['attachment_id'], ENT_QUOTES, 'UTF-8') . '" />
			<div class="boxModelFixer primaryContent">
					<div class="thumbnail">
						';
if ($attachment['thumbnailUrl'] AND $canViewAttachments)
{
$__output .= '
							<a href="' . XenForo_Template_Helper_Core::link('attachments', $attachment, array()) . '" target="_blank"><img 
								src="' . htmlspecialchars($attachment['thumbnailUrl'], ENT_QUOTES, 'UTF-8') . '" alt="' . htmlspecialchars($attachment['filename'], ENT_QUOTES, 'UTF-8') . '" class="LbImage" /></a>
						';
}
else if ($attachment['thumbnailUrl'])
{
$__output .= '
							<a href="' . XenForo_Template_Helper_Core::link('attachments', $attachment, array()) . '" target="_blank"><img
								src="' . htmlspecialchars($attachment['thumbnailUrl'], ENT_QUOTES, 'UTF-8') . '" alt="' . htmlspecialchars($attachment['filename'], ENT_QUOTES, 'UTF-8') . '" /></a>
						';
}
else
{
$__output .= '
							<a href="' . XenForo_Template_Helper_Core::link('attachments', $attachment, array()) . '" target="_blank" class="genericAttachment"></a>
						';
}
$__output .= '
					</div>
					<div class="attachmentInfo pairsJustified">
						<h6 class="filename"><a href="' . XenForo_Template_Helper_Core::link('attachments', $attachment, array()) . '" target="_blank">' . htmlspecialchars($attachment['filename'], ENT_QUOTES, 'UTF-8') . '</a></h6>
						<dl><dt>' . 'File size' . ':</dt> <dd>' . XenForo_Template_Helper_Core::numberFormat($attachment['file_size'], 'size') . '</dd></dl>
						<dl><dt>' . 'Views' . ':</dt> <dd>' . XenForo_Template_Helper_Core::numberFormat($attachment['view_count'], '0') . '</dd></dl>
					</div>
				</div>
		</li>
	';
}
$__output .= '
	</ol>
	<div><label class="muted"><input type="checkbox" id="selectAllAttachment" /> <i>' . 'Select All' . '</i></label></div>
	<fieldset>
		<dl class="ctrlUnit">
			<dt style="width: 0px;"></dt>
			<dd style="width: 90%;">
				<label for="ctrl_use_existing">
					<input type="radio" name="target_album" value="existing" class="Disabler" id="ctrl_use_existing" /> 
					' . 'Add to an existing album' . '
				</label>				
				<div id="ctrl_use_existing_Disabler">
					<dl class="ctrlUnit">
						<dt><label for="ctrl_stream">' . 'Destination album' . ':</label></dt>
						<dd>
							<select name="album_id" class="textCtrl">
								';
foreach ($albums AS $album)
{
$__output .= '
									<option value="' . htmlspecialchars($album['album_id'], ENT_QUOTES, 'UTF-8') . '">' . htmlspecialchars($album['title'], ENT_QUOTES, 'UTF-8') . '</option>
								';
}
$__output .= '
							</select>
						</dd>
					</dl>
				</div>
				<label for="ctrl_use_new">
					<input type="radio" name="target_album" value="new" class="Disabler" id="ctrl_use_new" ' . ((true) ? ' checked="checked"' : '') . ' /> 
					' . 'Create a new album' . '
				</label>
				<div id="ctrl_use_new_Disabler">
					<dl class="ctrlUnit">
						<dt><label for="title">' . 'Album Title' . ':</label></dt>
						<dd>
							<input type="text" name="title" class="textCtrl" value="' . htmlspecialchars($thread['title'], ENT_QUOTES, 'UTF-8') . '" />
						</dd>
					</dl>
					';
if ($categories)
{
$__output .= '
						<dl class="ctrlUnit">
							<dt><label for="ctrl_stream">' . 'Target Category' . ':</label></dt>
							<dd>
								<select name="category_id" class="textCtrl">
									';
foreach ($categories AS $cat)
{
$__output .= '
										<option value="' . htmlspecialchars($cat['category_id'], ENT_QUOTES, 'UTF-8') . '">' . XenForo_Template_Helper_Core::string('repeat', array(
'0' => '&nbsp; ',
'1' => htmlspecialchars($cat['depth'], ENT_QUOTES, 'UTF-8')
)) . htmlspecialchars($cat['title'], ENT_QUOTES, 'UTF-8') . '</option>
									';
}
$__output .= '
								</select>
								<p class="explain">' . 'Your album would be posted into the selected category.' . '</p>
							</dd>
						</dl>
					';
}
$__output .= '
					<dl class="ctrlUnit" style="margin-left: 30px;">
						<dt></dt>
						<dd>
							<label for="ctrl_import_comment">
								<input id="ctrl_import_comment" type="checkbox" name="import_comment" value="1" />
								' . 'Import Comments' . '
							</label>
							<p class="explain">' . 'All posts would be imported as album\'s comments.' . '</p>
						</dd>
					</dl>
				</div>
			</dd>
		</dl>
		
	</fieldset>

	<dl class="ctrlUnit submitUnit">
		<dt></dt>
		<dd>
			<input type="submit" value="' . 'Import' . '" accesskey="s" class="button primary" />
		</dd>
	</dl>

	<input type="hidden" name="_xfConfirm" value="1" />
	<input type="hidden" name="_xfToken" value="' . htmlspecialchars($visitor['csrf_token_page'], ENT_QUOTES, 'UTF-8') . '" />
</form>
<script type="text/javascript">
$(function()
{
	$(\'#selectAllAttachment\').click(function(e)
	{
		$(\'.importPhotoList\').find(\'input[type="checkbox"]\').attr(\'checked\', this.checked);
	});
});
</script>';
