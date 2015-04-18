<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
if ($sidebar['keywords'])
{
$__output .= '
	<div class="section mediaCloud">
		<div class="secondaryContent" id="Cloud">
			<h3>' . 'Keyword Cloud' . '</h3>

			<div id="keywordCloud">
				<ul id="textCloud">
				';
foreach ($sidebar['keywords'] AS $subWord)
{
$__output .= '
					<li style="font-size:' . htmlspecialchars($subWord['keyword_size'], ENT_QUOTES, 'UTF-8') . 'px;" title="' . htmlspecialchars($subWord['keyword_count'], ENT_QUOTES, 'UTF-8') . '">
						<a href="' . XenForo_Template_Helper_Core::link('media/keyword', $subWord, array()) . '">' . htmlspecialchars($subWord['keyword_text'], ENT_QUOTES, 'UTF-8') . '</a>
					</li>
				';
}
$__output .= '
				</ul>
			</div>

			';
if ($sidebar['animated'])
{
$__output .= '
				';
$this->addRequiredExternal('js', 'js/8wayrun/swfobject.js');
$__output .= '
				<script type="text/javascript">
					var so = new SWFObject("styles/8wayrun/tagcloud.swf", "tagcloud", "100%", "240", "7");
					so.addParam("wmode", "transparent");
					so.addVariable("tcolor", "0x000000");
					so.addVariable("tcolor2", "0x1061B3");
					so.addVariable("hicolor", "0xFF0000");
					so.addVariable("mode", "tags");
					so.addVariable("distr", "true");
					so.addVariable("tspeed", "200");
					so.addVariable("tagcloud", "<tags>' . htmlspecialchars($sidebar['animated'], ENT_QUOTES, 'UTF-8') . '</tags>");
					so.write("keywordCloud");
				</script>
			';
}
$__output .= '
		</div>
	</div>
';
}
