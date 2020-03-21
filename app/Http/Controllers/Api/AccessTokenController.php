<?php
/**
 * Created by PhpStorm.
 * AdminQuery: JeffreyBool
 * Date: 2019/11/11
 * Time: 14:44
 */

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Traits\PassportToken;
use Psr\Http\Message\ServerRequestInterface;
use League\OAuth2\Server\AuthorizationServer;
use Laminas\Diactoros\Response as Psr7Response;
use League\OAuth2\Server\Exception\OAuthServerException;
use League\OAuth2\Server\RequestTypes\AuthorizationRequest;

class AccessTokenController extends BaseController
{
    use PassportToken;

    const grantType = "password";

    /**
     * get token.
     * @param AuthorizationRequest   $originRequest
     * @param AuthorizationServer    $server
     * @param ServerRequestInterface $serverRequest
     * @param Request                $request
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function authorizations(
        AuthorizationRequest $originRequest,
        AuthorizationServer $server,
        ServerRequestInterface $serverRequest,
        Request $request
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
            $this->response->errorUnauthorized($e->getMessage());
        }
    }
}
