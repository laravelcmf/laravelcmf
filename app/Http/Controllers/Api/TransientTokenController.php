<?php

namespace App\Http\Controllers\Api;

use GuzzleHttp\Psr7\Response;
use Psr\Http\Message\ServerRequestInterface;
use League\OAuth2\Server\AuthorizationServer;
use League\OAuth2\Server\Exception\OAuthServerException;

class TransientTokenController extends Controller
{
    const grantType = "refresh_token";

    /**
     * 刷新 token
     * @param AuthorizationServer    $server
     * @param ServerRequestInterface $serverRequest
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function refresh(AuthorizationServer $server, ServerRequestInterface $serverRequest)
    {
        $defaultParams = [
            'grant_type'    => TransientTokenController::grantType,
            'client_id'     => env('PASSPORT_CLIENT_ID'),
            'client_secret' => env('PASSPORT_CLIENT_SECRET'),
        ];
        $defaultParams = array_merge($defaultParams, $serverRequest->getParsedBody());
        $serverRequest = $serverRequest->withParsedBody($defaultParams);
        try {
           return $server->respondToAccessTokenRequest($serverRequest, new Response());
        } catch (OAuthServerException $e) {
            $this->errorUnauthorized($e->getMessage());
        }
    }
}
