<?php
/**
 * Created by PhpStorm.
 * AdminQuery: JeffreyBool
 * Date: 2019/11/11
 * Time: 14:44
 */

namespace App\Http\Controllers\Api;

use App\Traits\PassportToken;
use Zend\Diactoros\Response as Psr7Response;
use Psr\Http\Message\ServerRequestInterface;
use League\OAuth2\Server\AuthorizationServer;
use League\OAuth2\Server\Exception\OAuthServerException;
use League\OAuth2\Server\RequestTypes\AuthorizationRequest;

class AccessTokenController extends Controller
{
    use PassportToken;

    const grantType = "password";

    /**
     * 获取token
     * @param AuthorizationRequest   $originRequest
     * @param AuthorizationServer    $server
     * @param ServerRequestInterface $serverRequest
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function authorizations(
        AuthorizationRequest $originRequest,
        AuthorizationServer $server,
        ServerRequestInterface $serverRequest
    ) {
        $defaultParams = [
            'grant_type'    => AccessTokenController::grantType,
            'client_id'     => env('PASSPORT_CLIENT_ID'),
            'client_secret' => env('PASSPORT_CLIENT_SECRET'),
        ];
        $defaultParams = array_merge($defaultParams, $serverRequest->getParsedBody());
        $serverRequest = $serverRequest->withParsedBody($defaultParams);
        try {
            return $server->respondToAccessTokenRequest($serverRequest, new Psr7Response)->withStatus(201);
        } catch (OAuthServerException $e) {
            $this->errorUnauthorized();
        }
    }


}