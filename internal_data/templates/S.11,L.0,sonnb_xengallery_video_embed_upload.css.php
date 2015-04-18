<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__output .= '.listInline ul, 
.listInline ol, 
.listInline li, 
.listInline dl, 
.listInline dt, 
.listInline dd {
	display: inline;
}

.commaImplode li:after, 
.commaElements > *:after {
	content: ", ";
}';
