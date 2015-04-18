<?php

$config['db']['host'] = 'localhost';

$config['db']['port'] = '3306';

$config['db']['username'] = 'root';

$config['db']['password'] = '';

$config['db']['dbname'] = 'gam5a280_xenforo';

$config['superAdmins'] = '1';
$config['debug'] = true;
$config['cache']['enabled'] = true;
$config['cache']['frontend'] = 'Core';
$config['cache']['frontendOptions'] = array(
'caching'                   => true,
'automatic_serialization'   => true,
'lifetime'                  => 3600,
'cache_id_prefix'           => 'xf_'
);