<?php

namespace App\Http\Controllers\Api;

use Illuminate\Support\Facades\Auth;

class AuthorizedAccessTokenController extends Controller
{
    public function destroy()
    {
        if(!Auth::check()) {
           $this->errorUnauthorized('Unable to authenticate with invalid API key and token');
        }
        $accessToken = auth()->user()->token();
        app('db')->table('oauth_refresh_tokens')->where('access_token_id',
            $accessToken->id)->update(['revoked' => true]);
        $accessToken->revoke();
        return $this->noContent();
    }
}
