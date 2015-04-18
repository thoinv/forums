<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$this->addRequiredExternal('css', 'tinhte_xentag');
$__output .= '<a href="' . XenForo_Template_Helper_Core::link('tags', $tag, array()) . '" class="Tinhte_XenTag_TagLink"' . ((XenForo_Template_Helper_Core::callHelper('Tinhte_XenTag_getOption', array(
'0' => 'linkTargetBlank'
))) ? (' target="_blank"') : ('')) . '>' . htmlspecialchars($displayText, ENT_QUOTES, 'UTF-8') . '</a>';
