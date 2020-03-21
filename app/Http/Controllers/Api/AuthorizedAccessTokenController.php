<?php

namespace App\Http\Controllers\Api;

class AuthorizedAccessTokenController extends BaseController
{

    /**
     * remove token.
     * @return \Dingo\Api\Http\Response
     */
    public function destroy()
    {
        if(!auth()->check()) {
            $this->response->errorUnauthorized('Unable to authenticate with invalid API key and token');
        }
        $accessToken = auth()->user()->token();
        app('db')->table('oauth_refresh_tokens')->where('access_token_id',
            $accessToken->id)->update(['revoked' => true]);
        $accessToken->revoke();
        return $this->response->noContent();
    }
}
