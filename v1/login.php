<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

function login() {
    $app = new \Slim\App;
    $app->get('/profile/{id}', function (Request $request, Response $response) {

        $id = $request->getAttribute('id');

        $fb = new Facebook\Facebook([
            'app_id' => FB_APP_ID,
            'app_secret' => FB_APP_SECRET,
            'default_graph_version' => FB_GRAPH_VERSION,
        ]);

        $helper = $fb->getRedirectLoginHelper();

        $loginUrl = $helper->getLoginUrl(APP_PATH . "/index.php?profileId=$id");

        echo '<a href="' . htmlspecialchars($loginUrl) . '">Log in with Facebook!</a>';

        return $response;
    });
    $app->run();
}
