<?php

namespace App\Services;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use League\CommonMark\Node\Block\Document;
use Illuminate\Support\Facades\Http;


class LoginSintaService
{
    public static function LoginSinta(Request $request) {
        $theUrl     = config('app.guzzle_test_url').'/consumer/login';
        $response= Http::post($theUrl, [
                        'username'=> 'TELKOM-U',
                        'password'=>  '2023TELKomJoinAp1Sint@'
                   ]);

        $token = json_decode($response->getBody(), true);
        $token = $token['token'];
        return $token;
    }
}