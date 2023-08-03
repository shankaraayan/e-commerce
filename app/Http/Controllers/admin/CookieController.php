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
        $cookieValue = 'Disclaimer accepted on website.';
        $cookieDuration = 60*24; //*minutes

        // Create a new response with the cookie
        $response = new Response('Cookie set successfully');
        $response->cookie($cookieName, $cookieValue, $cookieDuration);

        return $response;

    }
}
