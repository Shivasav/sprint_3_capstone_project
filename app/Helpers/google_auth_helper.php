<?php

use Google\Client;

function getGoogleClient()
{
    $config = config('GoogleClient');
    
    $client = new Client();
    $client->setClientId($config->clientId);
    $client->setClientSecret($config->clientSecret);
    $client->setRedirectUri($config->redirectUri);
    $client->addScope('email');
    $client->addScope('profile');

    return $client;
}

function getAuthUrl($client)
{
    return $client->createAuthUrl();
}

function getGoogleUserInfo($client, $code)
{
    $token = $client->fetchAccessTokenWithAuthCode($code);
    $client->setAccessToken($token);

    $oauth2 = new \Google\Service\Oauth2($client);
    return $oauth2->userinfo->get();
}