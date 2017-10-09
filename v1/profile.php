<?php

class Profile
{
    protected $accessToken;
    protected $helper;
    protected $fb;

    public function __construct($accessToken, $helper, $fb)
    {
        $this->accessToken = $accessToken;
        $this->helper = $helper;
        $this->fb = $fb;
    }

    /**
     * Get basic profile user's data
     */
    public function getProfile()
    {
        $this->validateGraph();
        $this->validateAccessToken();

        try {
            $profileId = htmlspecialchars($_GET["profileId"]);
            $endpoint = "/$profileId?fields=id,name,email,cover,first_name,last_name,age_range,link,gender,locale,picture,timezone,updated_time,verified";
            // Returns a `Facebook\FacebookResponse` object
            $response = $this->fb->get($endpoint, $this->accessToken->getValue());
        } catch(Facebook\Exceptions\FacebookResponseException $e) {
            echo 'Graph returned an error: ' . $e->getMessage();
            exit;
        } catch(Facebook\Exceptions\FacebookSDKException $e) {
            echo 'Facebook SDK returned an error: ' . $e->getMessage();
            exit;
        }

        $user = $response->getGraphUser();

        $userData = [];
        foreach ($user as $key => $value) {
            $userData[$key] = $value;
        }

        return json_encode($userData);
    }

    /**
     * Validates Graph has no errors
     */
    public function validateGraph()
    {
        try {
        } catch(Facebook\Exceptions\FacebookResponseException $e) {
            echo 'Graph returned an error: ' . $e->getMessage() . '\n';
            exit;
        } catch(Facebook\Exceptions\FacebookSDKException $e) {
            echo 'Facebook SDK returned an error: ' . $e->getMessage() . '\n';
            exit;
        }
    }

    /**
     * Validates access token is ok
     */
    public function validateAccessToken()
    {
        if (!isset($this->accessToken)) {
            if ($this->helper->getError()) {
                header('HTTP/1.0 401 Unauthorized');
                echo "Error: " . $this->helper->getError() . "\n";
                echo "Error Code: " . $this->helper->getErrorCode() . "\n";
                echo "Error Reason: " . $this->helper->getErrorReason() . "\n";
                echo "Error Description: " . $this->helper->getErrorDescription() . "\n";
            } else {
                header('HTTP/1.0 400 Bad Request');
                echo 'Bad request';
            }
            exit;
        }
    }
}
