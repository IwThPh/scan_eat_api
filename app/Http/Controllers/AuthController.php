<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Laravel\Passport\Client;
use Laravel\Passport\Http\Controllers\AccessTokenController;
use Laravel\Passport\Token;
use Laravel\Passport\TokenRepository;
use Lcobucci\JWT\Parser as JWTParser;
use League\OAuth2\Server\AuthorizationServer;
use Psr\Http\Message\ServerRequestInterface;

class AuthController extends AccessTokenController
{
    public function __construct(AuthorizationServer $server, TokenRepository $tokens, JWTParser $jwt)
    {
        parent::__construct($server, $tokens, $jwt);
    }

    /**
     * Provides an access token and refresh token for the user.
     */
    public function token(ServerRequestInterface $request)
    {
        $data = $request->getParsedBody();
        $client_id = env('PASSWORD_GRANT_ID', 2);

        $data = Arr::add($data, 'grant_type', 'password');
        $data = Arr::add($data, 'client_id', $client_id);
        $data = Arr::add($data, 'client_secret', Client::findOrFail($client_id)->secret);

        return $this->issueToken($request->withParsedBody($data));
    }

    /**
     * Registers a user and returns an access token.
     */
    public function register(Request $request)
    {
        $validator = validator($request->only('email', 'name', 'password', 'confirm_password'), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|same:confirm_password',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors()->all(), 400);
        }

        $data = request()->only('email', 'name', 'password');

        $user = \App\User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);

        //Set Username attribute on request.
        $request->request->add([
            'username' => $data['email'],
        ]);

        //Call token endpoint through proxy.
        $proxy = Request::create(
            'api/auth/token',
            'POST'
        );

        return \Route::dispatch($proxy);
    }

    /**
     * revokes the provided bearer token.
     */
    public function revoke(Request $request)
    {
        $token = $request->bearerToken();
        $token = Token::findOrFail($token);

        if ($token->revoke()) {
            return response()->json('Token Revoked', 200);
        }

        return response()->json('Couldn\'t Revoke Token', 500);
    }

    /**
     * Refresh access token for associated user.
     */
    protected function refresh(Request $request)
    {
        $client_id = env('PASSWORD_GRANT_ID', 2);

        $request->request->add([
            'grant_type' => 'refresh_token',
            'refresh_token' => $request->refresh_token,
            'client_id' => $client_id,
            'client_secret' => Client::findOrFail($client_id)->secret,
            'scope' => '',
        ]);

        return $this->issueToken($request);
    }
}
