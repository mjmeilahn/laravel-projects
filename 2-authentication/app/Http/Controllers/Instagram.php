<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class Instagram extends Controller
{
    private $clientID;
    private $clientSecret;
    private $redirectURI;
    private $token;


    function show() 
    {
        $token = 'bogus';
        $url = "https://api.instagram.com/v1/users/self/media/recent/?access_token=$token";

        $client = new Client();
        $send = $client->request('GET', $url);

        $request = json_decode($send->getBody());
        //dd($request->data);

        $results = $request->data;

        return view('welcome')->with('results', $results);
    }


    function callback(Request $request)
    {
        $clientID = 'a_bogus_string_here';
        $clientSecret = 'a_bogus_string_here';
        $redirectURI = 'https://meilahn-instagram-auth-example.herokuapp.com/auth/callback';
        $code = $request->input('code');
        $url = 'https://api.instagram.com/oauth/access_token';

        $client = new Client();
        $response = $client->request('POST', $url, [
            'form_params' => [
                'client_id' => $clientID,
                'client_secret' => $clientSecret,
                'grant_type' => 'authorization_code',
                'redirect_uri' => $redirectURI,
                'code' => $code
            ]
        ]);

        $data = json_decode($response->getBody());
        dd($data);
    }


    function auth()
    {
        // Implicit Auth
        // $url = "https://api.instagram.com/oauth/authorize/?client_id=$clientID&redirect_uri=$redirectURI&response_type=token";

        // Explicit Auth ( secure )
        // https://api.instagram.com/oauth/authorize/?client_id=CLIENT-ID&redirect_uri=REDIRECT-URI&response_type=code&scopes=basic

        $clientID = 'a_bogus_string';
        $redirectURI = 'https://meilahn-instagram-auth-example.herokuapp.com/auth/callback/auth/callback';
        $url = "https://api.instagram.com/oauth/authorize/?client_id=$clientID&redirect_uri=$redirectURI&response_type=code&scopes=basic+public_content";

        // Redirect to OAuth URL
        return redirect()->away($url);
    }
}
