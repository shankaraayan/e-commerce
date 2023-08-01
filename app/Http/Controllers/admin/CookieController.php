<?php

namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CookieController extends Controller
{
    public function setCookie(Request $request)
    {
        $cookieName = 'disclaimer';
        $cookieValue = 'Hello, this is my cookie!';
        $cookieDuration = 30; // Cookie will be valid for 30 days

        $response = new Response('Cookie set successfully');
        $response->withCookie(cookie($cookieName, $cookieValue, $cookieDuration));

        return $response;
    }
}
