<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__compilerVar2 = '';
$__compilerVar2 .= '
				';
if ($canLockUnlockThread)
{
$__compilerVar2 .= '
					<li>
						<label for="ctrl_discussion_open"><input type="checkbox" name="discussion_open" value="1" id="ctrl_discussion_open" ' . (($thread['discussion_open']) ? ' checked="checked"' : '') . ' /> ' . 'Mở' . '</label>
						<input type="hidden" name="_set[discussion_open]" value="1" />
						<p class="hint">' . 'Mọi người có thể trả lời chủ đề này' . '</p>
					</li>
				';
}
$__compilerVar2 .= '
				';
if ($canStickUnstickThread)
{
$__compilerVar2 .= '
					<li>
						<label for="ctrl_sticky"><input type="checkbox" name="sticky" value="1" id="ctrl_sticky" ' . (($thread['sticky']) ? ' checked="checked"' : '') . ' /> ' . 'Dán lên cao' . '</label>
						<input type="hidden" name="_set[sticky]" value="1" />
						<p class="hint">' . 'Chủ đề được dán lên cao hiển thị trên đầu của danh sách trang đầu tiên trong diễn đàn' . '</p>
					</li>
				';
}
$__compilerVar2 .= '
			
';
if ($canLockUnlockThread)
{
$__compilerVar2 .= '
	<li><label><input type="checkbox" name="block_adsense" value="1" class="SubmitOnChange" ' . (($thread['block_adsense']) ? ' checked="checked"' : '') . ' />
	' . 'Suppress AdSense' . '</label>
	<input type="hidden" name="_set[block_adsense]" value="1" />
	<p class="hint">' . 'If you select this option, AdSense will not be displayed on this thread.' . '</p></li>';
}
$__compilerVar2 .= '
';
if (trim($__compilerVar2) !== '')
{
$__output .= '
	<dl class="ctrlUnit ' . (($hideLabel) ? ('surplusLabel') : ('')) . '">
		<dt><label>' . 'Đặt trang thái chủ đề' . ':</label></dt>
		<dd>
			<ul>
			' . $__compilerVar2 . '
			</ul>
		</dd>
	</dl>
';
}
unset($__compilerVar2);
