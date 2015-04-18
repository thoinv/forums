<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
if ($xenOptions['dpSocialBarIncludeJs'])
{
$this->addRequiredExternal('js', 'js/digitalpoint/social_bar.js');
}
$__output .= '
<div class="socialBar" data-slug="' . htmlspecialchars($twitter_slug, ENT_QUOTES, 'UTF-8') . '"><div class="attribution"><div><a href="https://marketplace.digitalpoint.com/digital-point-social-bar.2618/item" target="_blank">Social Bar</a> by <a href="https://www.digitalpoint.com/" target="_blank">Digital Point</a></div></div><div class="breadcrumb socialInner"><div class="buttons">';
if ($xenOptions['dpSocialButtons'] == 1)
{
$__output .= '<a class="dp-att" href="https://tools.digitalpoint.com/social-buttons" data-url="' . htmlspecialchars($url, ENT_QUOTES, 'UTF-8') . '" data-username="' . htmlspecialchars($xenOptions['dpTwitterUsername'], ENT_QUOTES, 'UTF-8') . '">Social Buttons</a>';
}
else
{
$__output .= '<div class="a2a_kit a2a_kit_size_32 a2a_default_style" data-url="' . htmlspecialchars($url, ENT_QUOTES, 'UTF-8') . '"><a class="a2a_button_facebook"></a><a class="a2a_button_twitter"></a><a class="a2a_button_google_plus"></a></div>';
}
$__output .= '</div><div class="tweets"><div class="tweetContent"></div></div></div></div>';
