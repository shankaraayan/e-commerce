<?php

namespace App\Http\Controllers;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AuthController extends Controller
{
    use ValidatesRequests;

    public function index(){

    }
    
    public function register(Request $request){
        $validated = $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email',
            'password'=>'required'
        ]);

        if($validated){
            $user = new User;
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $user->save();
        }
        if (Auth::attempt(['email'=>$request->email,'password'=>$request->password])) {
            $request->session()->regenerate();
            return redirect('/profile');
        }else{
            echo "login faild";
        }
        // return back()->withErrors([
        //     'email' => 'The provided credentials do not match our records.',
        // ]);
    }

    public function login(Request $request){
        if (Auth::attempt(['email'=>$request->email,'password'=>$request->password])) {
            $request->session()->regenerate();
            return redirect('/profile');
        }else{
            echo "login faild";
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
