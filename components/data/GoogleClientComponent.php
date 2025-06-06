<?php

namespace frontend\components\data;

use yii\base\Component;
use Google_Client;

class GoogleClientComponent extends Component
{
    public $clientId;
    public $clientSecret;
    public $redirectUri;

    private $_client;

    public function getClient()
    {
        if ($this->_client === null) {
            $client = new Google_Client();
            $client->setClientId($this->clientId);
            $client->setClientSecret($this->clientSecret);
            $client->setRedirectUri($this->redirectUri);
            $client->setScopes(['openid', 'email', 'profile']);
            $this->_client = $client;
        }
        return $this->_client;
    }
}