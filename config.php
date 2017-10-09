<?php

require_once '../libs/Facebook/autoload.php';
require_once '../libs/Slim/autoload.php';
require_once 'login.php';
require_once 'profile.php';

define('APP_PATH', 'http://' . $_SERVER['HTTP_HOST'] . '/restapi/v1');

define('FB_APP_ID','236994109702857');
define('FB_APP_SECRET', 'cc7cb3003157f41703df1c658286a71a');
define('FB_GRAPH_VERSION', 'v2.6');
