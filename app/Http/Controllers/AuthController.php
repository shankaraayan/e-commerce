<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use App\Mail\VerificationEmail;
use App\Mail\PasswordResetMail;
use App\Models\User;
use App\Models\PasswordReset;
use Carbon\Carbon;
use Exception;
use App\Mail\MyTestMail;
use App\Models\Cart;

class AuthController extends Controller
{

    public function index(){

        if(auth()->user()){
            return redirect()->route('user.dashboard');
        }
        else{
            return view('pages.login');
        }
    }

    public function register_ui(){
        return view('pages.register');
    }

    public function register(Request $request){

        $validator = Validator::make($request->all(), [
            'name'=> 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8|regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*#?&])[A-Za-z\d@$!%*#?&]+$/'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->with('signup_error','signup')->withErrors($validator)->withInput();
        }
        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;

        $user->password = Hash::make($request->password);
        $user->verification_token = Str::random(40);
        $user->save();

        $verificationLink = route('verify',['token' => $user->verification_token]);
             $details = [];
             $details['template'] = 'verification';
             $details['subject'] = 'Verify Your Email Address';
             $details['email'] = $user->email;
             $details['data'] = $verificationLink;
            //  return view('emails.verification',compact('details'));die;

             Mail::to($details['email'])->send(new MyTestMail($details));


        // Mail::to($user->email)->send(new VerificationEmail($user,$verificationLink));

        $request->session()->flash('success','Registration successful. Please check your email to verify your account.');
        return redirect()->route('homepage');

        // if(auth()->attempt(['email'=>$request->email,'password'=>$request->password])){
        //     $request->session()->regenerateToken();
        //     $request->session()->flash('success', 'Registration Successfully');
        //     // Redirect to a specific route or page
        //     return redirect()->route('user.dashboard');
        // }else{
        //     $request->session()->flash('error', 'Registration faild !');
        //     return redirect()->back();
        // }

    }

    public function login_view(){
        return view('pages.login');
    }

    public function forgot_password_view(){
        return view('pages.forgot_password');
    }

    public function login(Request $request){

        $validator = Validator::make($request->all(), [
            'email' => 'required',
            'password' => 'required'
        ]);

        if ($validator->fails()) {

            return redirect()->back()->with('login_error','login')->withErrors($validator)->withInput();
        }

        $user = User::where('email', $request['email'])->first();
        if ($user && $user->email_verified_at == null) {
            $verificationLink = route('verify',['token' => $user->verification_token]);
             $details = [];
             $details['template'] = 'verification';
             $details['subject'] = 'Verify Your Email Address';
             $details['email'] = $user->email;
             $details['data'] = $verificationLink;
            //  return view('emails.verification',compact('details'));die;
             Mail::to($details['email'])->send(new MyTestMail($details));
            $request->session()->flash('error', 'Your email address is not verified. Please check your inbox for a verification email or click on the "Resend Verification Email" link.');
            return redirect()->back();
        }

        if(auth()->attempt($validator->validated()) && auth()->user()->is_admin == 1){

            $request->session()->regenerateToken();
            $request->session()->flash('success', 'Login successfully');

            $carts = session()->get('cart');
            if($carts != null){
                foreach($carts as $key => $cart){
                    // dd($cart,$key);
                    Cart::updateOrCreate(
                        [
                            'cart_id' => $key,
                            'user_id' => auth()->user()->id,
                        ],[
                            'cart_id' => $key,
                            'user_id' => auth()->user()->id,
                            'cart_array' => $cart,
                        ]
                    );
                }
            }elseif($cartItem = Cart::where('user_id',auth()->user()->id)){
                if($cartItem->exists()){

                    $items = $cartItem->get();
                    foreach($items as $item){
                        $cart[$item->cart_id] = $item['cart_array'];
                    }
                    session()->put('cart', $cart);
                }
            }

            return redirect()->route('admin');

        }elseif(auth()->attempt($validator->validated()) && auth()->user()->is_admin == 0){
            $request->session()->regenerateToken();
            $request->session()->flash('success', 'Login successfully');

            // Redirect to a specific route or page
           return redirect()->route('user.dashboard');
        }else{
            $request->session()->flash('error', 'Login faild ! Invalid email or password.');
            return redirect()->back();
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        $request->session()->flash('success', 'Logout Success');
        return redirect('/');
    }

    // change password

    public function changePassword(Request $request)
    {

        $validator = Validator::make($request->all(),[
            'current_password' => 'required',
            'new_password' => 'required|min:8|confirmed',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $user = auth()->user();

        if (!Hash::check($request->current_password, $user->password)) {
            $request->session()->flash('error', 'The current password is incorrect.');
            return back()->withErrors(['current_password' => 'The current password is incorrect.']);
        }

        $user->password = Hash::make($request->new_password);

        $user->save();
        $request->session()->flash('success', 'Password changed successfully.');
        return redirect()->route('user.account')->with('succeuser.accountss', 'Password changed successfully.');
    }

    // verify email
    public function verifyEmail($token,Request $request)
    {
        $user = User::where('verification_token', $token)->first();

        if (!$user) {
            $request->session()->flash('error', 'Your verification link has expired !');
            return redirect()->route('homepage');
        }

        if($user->password == null){
            $request->request->add(['email' => $user->email]);

            $this->forgetPassword($request);
        }

        $user->verification_token = null;
        $user->email_verified_at = now();
        $user->save();
        $request->session()->flash('success', 'Email verified successfully.');
        return redirect()->route('login');
    }


    // resend verification link
    public function resendVerificationEmail(Request $request)
    {
        $user = User::where('email', $request->email)->first();
        if ($user && $user->email_verified_at == null) {
            $verificationLink = route('verify', $user->verification_token);
            Mail::to($user->email)->send(new VerificationEmail($user, $verificationLink));
            $request->session()->flash('success', 'Verification email has been resent. Please check your email to verify your account.');
            return redirect()->back();
        }
        
        return redirect()->route('login')->with('error', 'Unable to resend verification email.');
    }

    public function forgetPassword(Request $request){

        $validator = Validator::make($request->all(),[
            'email' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $user = User::where('email', $request->email)->first();
        $token = Str::random(40);

        if($user){
            $resetPasswordLink = route('reset-password',['token' => $token]);
             $details = [];
             $details['template'] = 'reset_password';
             $details['subject'] = 'Password Reset';
             $details['email'] = $user->email;
             $details['data'] = $resetPasswordLink;
            //  return view('emails.reset_password',compact('details'));die;
             Mail::to($details['email'])->send(new MyTestMail($details));

            // Mail::to($user->email)->send(new PasswordResetMail($user,$resetPasswordLink));
            $datetime = Carbon::now()->format('Y-m-d H:i:s');
            PasswordReset::updateOrCreate(
                ['email'=>$request->email],
                [
                    'email' =>$request->email,
                    'token' =>$token,
                    'created_at' => $datetime
                ]
                );
                $request->session()->flash('success', 'Reset Password Send Success ! check your mail !');
                return redirect()->route('homepage');
        }else{
            $request->session()->flash('error', 'User not found !');
            return redirect()->back();
        }
    }

    public function resetPasswordLoad(Request $request){
        $resetData = PasswordReset::where('token',$request->token)->get();

        if(isset($request->token)  && count($resetData) > 0){
            $user = User::where('email',$resetData[0]['email'])->get();
            return view('pages.reset-password',compact('user'));
        }else{
            $request->session()->flash('error', 'Invalid token !');
            return redirect()->route('homepage');
        }

    }

    public function resetPassword(Request $request){
        // print_r($request->all());die;
        $validator = Validator::make($request->all(), [
            'password' => 'required|confirmed|min:8|regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*#?&])[A-Za-z\d@$!%*#?&]+$/',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $user = User::find($request->id);
        if($user){
            $user->password =  Hash::make($request->password);
            $user->save();

            $reset = PasswordReset::where('email',$user->email)->first();

            $reset->delete();

            $request->session()->flash('success','Password Reset successfully.');
            return redirect()->route('login');
        }else{
            return redirect()->route('homepage');
        }

    }

}

