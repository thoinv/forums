<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__output .= '.section div.meta-data {
    display: inline-block;
    width: 100%;
}
.photo-meta {
    float: left;
    overflow: hidden;
    width: 260px;
    display: inline-block;
}
.photo-meta .photo_container a {
    max-height: 350px;
    overflow: hidden;
    display: inline-block;
}
.meta-info .explain {
    width: 230px; 
    margin: 5px 0 4px;
}


.photo-data {
    float: right;
    overflow: hidden;
    width: 370px;
    display: inline-block;
}
.photo-meta h2, .photo-data h2 {
    font-size: 18px;
    margin-bottom: 10px;
}
.photo-data h2.data-data {
    margin-top: 25px;
}

.photo-data h2 {
    margin-bottom: 20px;
}
.photo-data table th, .photo-data table td {
    border-bottom: 1px solid ' . XenForo_Template_Helper_Core::styleProperty('pageBackground') . ';
    color: ' . XenForo_Template_Helper_Core::styleProperty('contentText') . ';
    font-size: 12px;
    padding: 5px;
}
.photo-data table th {
    width: 40%;
}';
