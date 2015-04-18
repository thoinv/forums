<?php

// if($_SERVER["HTTPS"] != "on")
// {
// header("Location: https://" . $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"]);
// exit();
// }

$startTime = microtime(true);

$fileDir = dirname(__FILE__);



require($fileDir . '/library/XenForo/Autoloader.php');

XenForo_Autoloader::getInstance()->setupAutoloader($fileDir . '/library');



XenForo_Application::initialize($fileDir . '/library', $fileDir);

XenForo_Application::set('page_start_time', $startTime);



$fc = new XenForo_FrontController(new XenForo_Dependencies_Public());

$fc->run();