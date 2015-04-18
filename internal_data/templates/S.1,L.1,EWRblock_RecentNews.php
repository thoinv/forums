<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$this->addRequiredExternal('css', 'message_user_info');
$__output .= '
';
$this->addRequiredExternal('css', 'bb_code');
$__output .= '
';
$this->addRequiredExternal('css', 'EWRblock_RecentNews');
$__output .= '

<div id="recentNews">
	';
foreach ($RecentNews AS $news)
{
$__output .= '
		<div class="section sectionMain recentNews" id="' . htmlspecialchars($news['thread_id'], ENT_QUOTES, 'UTF-8') . '">

			<div class="primaryContent ' . (($option['leftdate']) ? ('leftDate') : ('')) . '">
				<div class="subHeading">
					<div style="float: right; white-space: nowrap;">
						<a href="' . XenForo_Template_Helper_Core::link('threads', $news, array()) . '">' . XenForo_Template_Helper_Core::callHelper('datetimehtml', array($news['promote_date'],array(
'time' => '$news.promote_date'
))) . '</a>
						';
if ($visitor['permissions']['EWRporta']['canPromote'])
{
$__output .= '
							&nbsp; (<a href="' . XenForo_Template_Helper_Core::link('threads/edit', $news, array()) . '" class="OverlayTrigger">' . 'Edit' . '</a>)
						';
}
$__output .= '
					</div>

					<h2><a href="' . XenForo_Template_Helper_Core::link('threads', $news, array()) . '" class="newsTitle">' . XenForo_Template_Helper_Core::callHelper('threadPrefix', array(
'0' => $news
)) . htmlspecialchars($news['title'], ENT_QUOTES, 'UTF-8') . '</a></h2>
				</div>

				<div class="newsDate secondaryContent">
					<div class="newsMonth heading">' . htmlspecialchars($news['month'], ENT_QUOTES, 'UTF-8') . '</div>
					<div class="newsDay">' . htmlspecialchars($news['day'], ENT_QUOTES, 'UTF-8') . '</div>
				</div>

				';
if ($news['promote_icon'] != ('disabled'))
{
$__output .= '
				';
$__compilerVar1 = '';
$__compilerVar1 .= '
							';
if ($news['attach'])
{
$__compilerVar1 .= '
								<a href="' . XenForo_Template_Helper_Core::link('threads', $news, array()) . '"><img src="' . htmlspecialchars($news['attach']['thumbnailUrl'], ENT_QUOTES, 'UTF-8') . '" alt="' . htmlspecialchars($news['attach']['filename'], ENT_QUOTES, 'UTF-8') . '" /></a>
							';
}
else if ($news['medio'])
{
$__compilerVar1 .= '
								<div style="background: url(\'' . XenForo_Template_Helper_Core::callHelper('medio', array(
'0' => $news['medio']
)) . '\') no-repeat;">
									<a href="' . XenForo_Template_Helper_Core::link('full:media/media/popout', $news['medio'], array()) . '" class="OverlayTrigger"><img src="styles/8wayrun/EWRmedio_play.png" width="160" height="90" /></a>
								</div>
							';
}
else if ($news['image'])
{
$__compilerVar1 .= '
								<a href="' . XenForo_Template_Helper_Core::link('threads', $news, array()) . '"><img src="' . htmlspecialchars($news['image'], ENT_QUOTES, 'UTF-8') . '" alt="' . htmlspecialchars($news['image'], ENT_QUOTES, 'UTF-8') . '" style="max-height: 150px; max-width: 150px;" /></a>
							';
}
else
{
$__compilerVar1 .= '
								' . XenForo_Template_Helper_Core::callHelper('avatarhtml', array($news,false,array(
'user' => '$news',
'size' => 'm',
'itemprop' => 'photo'
),'')) . '
							';
}
$__compilerVar1 .= '
							';
if (trim($__compilerVar1) !== '')
{
$__output .= '
					<div class="messageUserBlock">
						<div class="avatarHolder">
							' . $__compilerVar1 . '
						</div>
					</div>
				';
}
unset($__compilerVar1);
$__output .= '
				';
}
$__output .= '

				<div class="messageContent baseHtml">
					<div class="postedBy">
						<span class="posted iconKey"><div class="sticky"></div>' . 'by ' . '<a href="' . XenForo_Template_Helper_Core::link('members', $news, array()) . '" class="username">' . htmlspecialchars($news['username'], ENT_QUOTES, 'UTF-8') . '</a>' . ' at ' . '<a href="' . XenForo_Template_Helper_Core::link('threads', $news, array()) . '">' . XenForo_Template_Helper_Core::time($news['post_date'], 'absolute') . '</a>' . '' . '</span>
						<span class="views">(' . XenForo_Template_Helper_Core::numberFormat($news['view_count'], '0') . ' ' . 'Views' . ' / ' . XenForo_Template_Helper_Core::numberFormat($news['first_post_likes'], '0') . ' ' . 'Likes' . ')</span>
						<span class="comments iconKey"><div class="new"></div><a href="' . XenForo_Template_Helper_Core::link('threads/unread', $news, array()) . '">' . XenForo_Template_Helper_Core::numberFormat($news['reply_count'], '0') . ' ' . 'Comments' . '</a></span>
					</div>

					<div class="newsText">' . $news['messageHtml'] . '</div>
					<div class="clearFix"></div>
				</div>

				<div class="sectionFooter">
					';
if ($option['social'])
{
$__output .= '
						';
$__compilerVar2 = '';
$__compilerVar2 .= '
									';
$__compilerVar3 = '';
$__compilerVar3 .= '
									';
if ($xenOptions['tweet']['enabled'])
{
$__compilerVar3 .= '
										<div class="tweet shareControl">
											<a href="http://twitter.com/share" class="twitter-share-button"
												data-count="horizontal"
												data-lang="' . XenForo_Template_Helper_Core::callHelper('twitterLang', array(
'0' => $visitorLanguage['language_code']
)) . '"
												data-url="' . XenForo_Template_Helper_Core::link('canonical:threads', $news, array()) . '"
												' . (($news['title']) ? ('data-text="' . htmlspecialchars($news['title'], ENT_QUOTES, 'UTF-8') . '"') : ('')) . '
												' . (($xenOptions['tweet']['via']) ? ('data-via="' . htmlspecialchars($xenOptions['tweet']['via'], ENT_QUOTES, 'UTF-8') . '"') : ('')) . '
												' . (($xenOptions['tweet']['related']) ? ('data-related="' . htmlspecialchars($xenOptions['tweet']['related'], ENT_QUOTES, 'UTF-8') . '"') : ('')) . '>' . 'Tweet' . '</a>
										</div>
									';
}
$__compilerVar3 .= '
									';
if ($xenOptions['plusone'])
{
$__compilerVar3 .= '
										<div class="plusone shareControl">
											<div class="g-plusone" data-size="medium" data-count="true" data-href="' . XenForo_Template_Helper_Core::link('canonical:threads', $news, array()) . '" data-lang="' . htmlspecialchars($visitorLanguage['language_code'], ENT_QUOTES, 'UTF-8') . '"></div>
										</div>
									';
}
$__compilerVar3 .= '
									';
if ($xenOptions['facebookLike'])
{
$__compilerVar3 .= '
										<div class="facebookLike shareControl">
											';
$__extraData['facebookSdk'] = '';
$__extraData['facebookSdk'] .= '1';
$__compilerVar3 .= '
											<fb:like href="' . XenForo_Template_Helper_Core::link('canonical:threads', $news, array()) . '" layout="button_count" action="' . htmlspecialchars($xenOptions['facebookLikeAction'], ENT_QUOTES, 'UTF-8') . '" font="trebuchet ms" colorscheme="' . XenForo_Template_Helper_Core::styleProperty('fbColorScheme') . '"></fb:like>
										</div>
									';
}
$__compilerVar3 .= '
									';
$__compilerVar2 .= $this->callTemplateHook('recentnews_share_page_options', $__compilerVar3, array(
'url' => XenForo_Template_Helper_Core::link('canonical:threads', $news, array(), false)
));
unset($__compilerVar3);
$__compilerVar2 .= '
								';
if (trim($__compilerVar2) !== '')
{
$__output .= '
							<div class="sharePage">
								';
$this->addRequiredExternal('css', 'share_page');
$__output .= '

								' . $__compilerVar2 . '
							</div>
						';
}
unset($__compilerVar2);
$__output .= '
					';
}
else
{
$__output .= '
						<div class="categories">
							<ul>
								';
if ($visitor['permissions']['EWRporta']['canPromote'])
{
$__output .= '
									<a href="' . XenForo_Template_Helper_Core::link('threads/category', $news, array()) . '" class="button OverlayTrigger">+</a>
								';
}
$__output .= '
								';
foreach ($news['categories'] AS $subCat)
{
$__output .= '
									<li><a href="' . XenForo_Template_Helper_Core::link('articles', $subCat, array()) . '" class="button">' . htmlspecialchars($subCat['category_name'], ENT_QUOTES, 'UTF-8') . '</a></li>
								';
}
$__output .= '
							</ul>
						</div>
					';
}
$__output .= '

					<div class="continue">
						<a class="iconKey button" href="' . XenForo_Template_Helper_Core::link('threads', $news, array()) . '">
							<div class="redirect"></div>
							' . 'Continue reading...' . '
						</a>
					</div>
				</div>
			</div>
		</div>
	';
}
$__output .= '

	';
$__compilerVar4 = '';
$__compilerVar4 .= '
		';
if ($option['pagenav'] && $option['count'] > $option['limit'])
{
$__compilerVar4 .= '
			' . XenForo_Template_Helper_Core::callHelper('pagenavhtml', array('public', htmlspecialchars($option['limit'], ENT_QUOTES, 'UTF-8'), htmlspecialchars($option['count'], ENT_QUOTES, 'UTF-8'), htmlspecialchars($page, ENT_QUOTES, 'UTF-8'), 'articles', $category, array(), false, array())) . '
		';
}
$__compilerVar4 .= '
		';
if (trim($__compilerVar4) !== '')
{
$__output .= '
	<div class="section sectionMain">
		' . $__compilerVar4 . '
	</div>
	';
}
unset($__compilerVar4);
$__output .= '
</div>';
