<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
if ($post['position'] == 0 && $post['post_id'] == $thread['first_post_id'])
{
$__output .= '
       ';
$__compilerVar7 = '';
$this->addRequiredExternal('css', 'BRETI_extra_thread');
$__compilerVar7 .= '  
';
if ($extraThreadItems['olderThreads'])
{
$__compilerVar7 .= '            
	<div  class="bretiExtraThread secondaryContent">
		<a class="menuHeader">' . 'Older Threads' . '</a>
		<ul>
			';
foreach ($extraThreadItems['olderThreads'] AS $_extraThread)
{
$__compilerVar7 .= '
				';
$__compilerVar8 = '';
$__compilerVar8 .= '<li><a href="' . XenForo_Template_Helper_Core::link('threads', $_extraThread, array()) . '" title="" class="' . (($_extraThread['hasPreview']) ? ('PreviewTooltip') : ('')) . '" 
	data-previewUrl="' . (($_extraThread['hasPreview']) ? (XenForo_Template_Helper_Core::link('threads/preview', $_extraThread, array())) : ('')) . '"
	>' . htmlspecialchars($_extraThread['title'], ENT_QUOTES, 'UTF-8') . '</a> - <span class="bretiDate">' . XenForo_Template_Helper_Core::datetime($_extraThread['post_date'], '') . '</span></li>';
$__compilerVar7 .= $__compilerVar8;
unset($__compilerVar8);
$__compilerVar7 .= '
			';
}
$__compilerVar7 .= '
		</ul>
	</div>
';
}
$__compilerVar7 .= '
';
if ($extraThreadItems['newerThreads'])
{
$__compilerVar7 .= '            
	<div  class="bretiExtraThread secondaryContent">
		<a class="menuHeader">' . 'Newer Threads' . '</a>
		<ul>
			';
foreach ($extraThreadItems['newerThreads'] AS $_extraThread)
{
$__compilerVar7 .= '
				';
$__compilerVar9 = '';
$__compilerVar9 .= '<li><a href="' . XenForo_Template_Helper_Core::link('threads', $_extraThread, array()) . '" title="" class="' . (($_extraThread['hasPreview']) ? ('PreviewTooltip') : ('')) . '" 
	data-previewUrl="' . (($_extraThread['hasPreview']) ? (XenForo_Template_Helper_Core::link('threads/preview', $_extraThread, array())) : ('')) . '"
	>' . htmlspecialchars($_extraThread['title'], ENT_QUOTES, 'UTF-8') . '</a> - <span class="bretiDate">' . XenForo_Template_Helper_Core::datetime($_extraThread['post_date'], '') . '</span></li>';
$__compilerVar7 .= $__compilerVar9;
unset($__compilerVar9);
$__compilerVar7 .= '
			';
}
$__compilerVar7 .= '
		</ul>
	</div>
';
}
$__compilerVar7 .= '
';
if ($extraThreadItems['latestThreads'])
{
$__compilerVar7 .= '            
	<div  class="bretiExtraThread secondaryContent">
		<a class="menuHeader">' . 'Latest Threads' . '</a>
		<ul>
			';
foreach ($extraThreadItems['latestThreads'] AS $_extraThread)
{
$__compilerVar7 .= '
				';
$__compilerVar10 = '';
$__compilerVar10 .= '<li><a href="' . XenForo_Template_Helper_Core::link('threads', $_extraThread, array()) . '" title="" class="' . (($_extraThread['hasPreview']) ? ('PreviewTooltip') : ('')) . '" 
	data-previewUrl="' . (($_extraThread['hasPreview']) ? (XenForo_Template_Helper_Core::link('threads/preview', $_extraThread, array())) : ('')) . '"
	>' . htmlspecialchars($_extraThread['title'], ENT_QUOTES, 'UTF-8') . '</a> - <span class="bretiDate">' . XenForo_Template_Helper_Core::datetime($_extraThread['post_date'], '') . '</span></li>';
$__compilerVar7 .= $__compilerVar10;
unset($__compilerVar10);
$__compilerVar7 .= '
			';
}
$__compilerVar7 .= '
		</ul>
	</div>
';
}
$__compilerVar7 .= '
';
if ($extraThreadItems['relatedThreads'])
{
$__compilerVar7 .= '            
	<div  class="bretiExtraThread secondaryContent">
		<a class="menuHeader">' . 'Related Threads' . '</a>
		<ul>
			';
foreach ($extraThreadItems['relatedThreads'] AS $_extraThread)
{
$__compilerVar7 .= '
				';
$__compilerVar11 = '';
$__compilerVar11 .= '<li><a href="' . XenForo_Template_Helper_Core::link('threads', $_extraThread, array()) . '" title="" class="' . (($_extraThread['hasPreview']) ? ('PreviewTooltip') : ('')) . '" 
	data-previewUrl="' . (($_extraThread['hasPreview']) ? (XenForo_Template_Helper_Core::link('threads/preview', $_extraThread, array())) : ('')) . '"
	>' . htmlspecialchars($_extraThread['title'], ENT_QUOTES, 'UTF-8') . '</a> - <span class="bretiDate">' . XenForo_Template_Helper_Core::datetime($_extraThread['post_date'], '') . '</span></li>';
$__compilerVar7 .= $__compilerVar11;
unset($__compilerVar11);
$__compilerVar7 .= '
			';
}
$__compilerVar7 .= '
		</ul>
	</div>
';
}
$__compilerVar7 .= '
';
$__compilerVar12 = '';
$__compilerVar12 .= '<div id="PreviewTooltip">
	<span class="arrow"><span></span></span>
	
	<div class="section">
		<div class="primaryContent previewContent">
			<span class="PreviewContents">' . 'Đang tải' . '...</span>
		</div>
	</div>
</div>';
$__compilerVar7 .= $__compilerVar12;
unset($__compilerVar12);
$__compilerVar7 .= '
';
if ($extraThreadItems['suggestedThreads'])
{
$__compilerVar7 .= '  
<div  class="bretiRandomThread">
	<a class="menuHeader">' . 'Suggested Thread' . '<span class="close">X</span></a>
	<ul>
		';
foreach ($extraThreadItems['suggestedThreads'] AS $_extraThread)
{
$__compilerVar7 .= '
			<li>
				<div class="thumbnail">
					<a class="threadThumbnail" href="' . XenForo_Template_Helper_Core::link('members', $_extraThread, array()) . '">
						<img src="' . XenForo_Template_Helper_Core::callHelper('avatar', array(
'0' => $_extraThread,
'1' => 's'
)) . '" alt="" />
					</a>
				</div>
				<div class="threadDetail">
				<a href="' . XenForo_Template_Helper_Core::link('threads', $_extraThread, array()) . '" class="threadTitle" title="" class="' . (($_extraThread['hasPreview']) ? ('PreviewTooltip') : ('')) . '" 
				data-previewUrl="' . (($_extraThread['hasPreview']) ? (XenForo_Template_Helper_Core::link('threads/preview', $_extraThread, array())) : ('')) . '"
				>' . htmlspecialchars($_extraThread['title'], ENT_QUOTES, 'UTF-8') . '</a>
				<span class="bretiDate">' . XenForo_Template_Helper_Core::datetime($_extraThread['post_date'], '') . '</span>
				</div>
			</li>
		';
}
$__compilerVar7 .= '
	</ul>
</div>
<script>
	$(".bretiRandomThread").appendTo(\'body\');
	$triggered = false;
	$(\'.bretiRandomThread .close\').click(function(){
		$(".bretiRandomThread").remove();
	});
	if($(document).scrollTop() > ($(document).height() - $(window).height()-500)){
		$triggered = true;
		$(".bretiRandomThread").stop(true,true).xfFadeIn(XenForo.speed.normal);
		$(".bretiRandomThread > ul > li").hide();
		$newLi = $(".bretiRandomThread > ul > li:eq(" + Math.floor(Math.random()*$(\'.bretiRandomThread > ul > li\').length) + ")").stop(true,true).show();
	}
	$(document).on(\'scroll\', function(){
		if($(this).scrollTop() > ($(this).height() - $(window).height()-500)){
			if(!$triggered){
				$triggered = true;
				$(".bretiRandomThread").stop(true,true).xfFadeIn(XenForo.speed.normal);
				$(".bretiRandomThread > ul > li").hide();
				$newLi = $(".bretiRandomThread > ul > li:eq(" + Math.floor(Math.random()*$(\'.bretiRandomThread > ul > li\').length) + ")").stop(true,true).show();
			}
		}else{
			if($triggered){
				$triggered = false;
				$(".bretiRandomThread").stop(true,true).xfFadeOut(XenForo.speed.normal);
			}
		}
	});
</script>

';
}
$__compilerVar7 .= '
';
$__output .= $__compilerVar7;
unset($__compilerVar7);
$__output .= '
';
}
