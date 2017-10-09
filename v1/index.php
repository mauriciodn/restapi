<?php

require_once '../config.php';

session_start();

$fb = new Facebook\Facebook([
    'app_id' => FB_APP_ID,
    'app_secret' => FB_APP_SECRET,
    'default_graph_version' => FB_GRAPH_VERSION
]);

$helper = $fb->getRedirectLoginHelper();

if (!$accessToken = $helper->getAccessToken()) {
    login();
} else {
    $profile = new Profile($accessToken, $helper, $fb);
    echo $profile->getProfile();
}
