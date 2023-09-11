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
            return view('auth.login');
        }
    }

    public function register_ui(){
        return view('auth.register');
    }

    public function register(Request $request){

        $validator = Validator::make($request->all(), [
            'name'=> 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8|regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*#?&])[A-Za-z\d@$!%*#?&]+$/'
        ],[
            'name.required' => 'Der Name ist erforderlich.',
            'email.required' => 'Die E-Mail-Adresse ist erforderlich.',
            'email.email' => 'Bitte geben Sie eine gültige E-Mail-Adresse ein.',
            'email.unique' => 'Diese E-Mail-Adresse ist bereits vergeben.',
            'password.required' => 'Das Passwort ist erforderlich.',
            'password.min' => 'Das Passwort muss mindestens 8 Zeichen lang sein.',
            'password.regex' => 'Das Passwort muss mindestens einen Kleinbuchstaben, einen Großbuchstaben, eine Ziffer, und ein Sonderzeichen enthalten.'
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

        $request->session()->flash('success','Registrierung erfolgreich. Bitte überprüfen Sie Ihre E-Mail, um Ihr Konto zu bestätigen.');
        return redirect()->route('homepage');
    }

    public function login_view(){
        if(auth()->user()) return redirect()->route('user.dashboard');
        return view('auth.login');
    }

    public function forgot_password_view(){
        return view('auth.forgot_password');
    }

    public function login(Request $request){
        
        //* Redirect Back from checkout only
        $previousUrl = url()->previous();
        $urlComponents = parse_url($previousUrl);
        if (isset($urlComponents['query'])) {
            parse_str($urlComponents['query'], $queryParameters);
            if (isset($queryParameters['redirect'])) {
                $redirectParameter = $queryParameters['redirect'];
            }else
            {
                $redirectParameter = '';
            }
        }

        if(auth()->user()) return redirect()->route('user.dashboard');

        $validator = Validator::make($request->all(), [
            'email' => 'required',
            'password' => 'required'
        ],
        [
            'email.required' => 'Das E-Mail-Feld ist erforderlich.',
            'password.required' => 'Das Passwort-Feld ist erforderlich.',
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
            $request->session()->flash('error', 'Ihre E-Mail-Adresse ist nicht verifiziert. Bitte prüfen Sie Ihren Posteingang auf eine Verifizierungs-E-Mail oder klicken Sie auf den Link "Verifizierungs-E-Mail erneut senden".');
            return redirect()->back();
        }

        if(auth()->attempt($validator->validated()) && auth()->user()->is_admin == 1){

            $request->session()->regenerateToken();
            $request->session()->flash('success', 'Anmeldung erfolgreich');

            $carts = session()->get('cart');
            if($carts != null){
                foreach($carts as $key => $cart){
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
            if(!empty($redirectParameter)) return redirect()->route($redirectParameter);
            return redirect()->route('admin');

        }elseif(auth()->attempt($validator->validated()) && auth()->user()->is_admin == 0){
            $request->session()->regenerateToken();
            $request->session()->flash('success', 'Anmeldung erfolgreich');
            if(!empty($redirectParameter)) return redirect()->route($redirectParameter);
            
            return redirect()->route('user.dashboard');

        }else{
            $request->session()->flash('error', 'Login fehlgeschlagen! Ungültige E-Mail oder ungültiges Passwort.');
            return redirect()->back();
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/')->with('success', 'Erfolgreich abmelden');
    }

    // change password

    public function changePassword(Request $request)
    {

        $validator = Validator::make($request->all(),[
            'current_password' => 'required',
            'new_password' => 'required|min:8|confirmed',
        ],[
            'current_password.required' => 'Das aktuelle Passwort ist erforderlich.',
            'new_password.required' => 'Das neue Passwort ist erforderlich.',
            'new_password.min' => 'Das neue Passwort muss mindestens 8 Zeichen lang sein.',
            'new_password.confirmed' => 'Die Bestätigung des neuen Passworts stimmt nicht überein.',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $user = auth()->user();

        if (!Hash::check($request->current_password, $user->password)) {
            $request->session()->flash('error', 'Das aktuelle Passwort ist falsch.');
            return back()->withErrors(['current_password' => 'Das aktuelle Passwort ist falsch.']);
        }

        $user->password = Hash::make($request->new_password);

        $user->save();
        $request->session()->flash('success', 'Passwort erfolgreich geändert.');
        return redirect()->route('user.account')->with('succeuser.accountss', 'Passwort erfolgreich geändert.');
    }

    // verify email
    public function verifyEmail($token,Request $request)
    {
        $user = User::where('verification_token', $token)->first();

        if (!$user) {
            $request->session()->flash('error', 'Ihr Verifizierungslink ist abgelaufen!');
            return redirect()->route('homepage');
        }

        if($user->password == null){
            $request->request->add(['email' => $user->email]);

            $this->forgetPassword($request);
        }

        $user->verification_token = null;
        $user->email_verified_at = now();
        $user->save();
        $request->session()->flash('success', 'E-Mail erfolgreich verifiziert.');
        return redirect()->route('login');
    }


    // resend verification link
    public function resendVerificationEmail(Request $request)
    {
        $user = User::where('email', $request->email)->first();
        if ($user && $user->email_verified_at == null) {
            $verificationLink = route('verify', $user->verification_token);
            Mail::to($user->email)->send(new VerificationEmail($user, $verificationLink));
            $request->session()->flash('success', 'Die Verifizierungs-E-Mail wurde erneut gesendet. Bitte überprüfen Sie Ihre E-Mail, um Ihr Konto zu verifizieren.');
            return redirect()->back();
        }
        
        return redirect()->route('login')->with('error', 'Die Verifizierungs-E-Mail kann nicht erneut gesendet werden.');
    }

    public function forgetPassword(Request $request){

        $validator = Validator::make($request->all(),[
            'email' => 'required',
        ],
        ['email.required' => 'Das E-Mail-Feld ist erforderlich.']
        );

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
                $request->session()->flash('success', 'Passwort zurücksetzen Erfolg senden ! prüfen Sie Ihre Mail ');
                return redirect()->route('homepage');
        }else{
            $request->session()->flash('error', 'Benutzer nicht gefunden!');
            return redirect()->back();
        }
    }

    public function resetPasswordLoad(Request $request){
        $resetData = PasswordReset::where('token',$request->token)->get();

        if(isset($request->token)  && count($resetData) > 0){
            $user = User::where('email',$resetData[0]['email'])->get();
            return view('auth.reset-password',compact('user'));
        }else{
            $request->session()->flash('error', 'Ungültiges Token!');
            return redirect()->route('homepage');
        }

    }

    public function resetPassword(Request $request){
        // print_r($request->all());die;
        $validator = Validator::make($request->all(), [
            'password' => 'required|confirmed|min:8|regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*#?&])[A-Za-z\d@$!%*#?&]+$/',
        ],[
            'password.required' => 'Das Passwort ist erforderlich.',
            'password.confirmed' => 'Die Bestätigung des Passworts stimmt nicht überein.',
            'password.min' => 'Das Passwort muss mindestens 8 Zeichen lang sein.',
            'password.regex' => 'Das Passwort muss mindestens einen Kleinbuchstaben, einen Großbuchstaben, eine Ziffer, und ein Sonderzeichen enthalten.',
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

            $request->session()->flash('success','Passwort erfolgreich zurückgesetzt.');
            return redirect()->route('login');
        }else{
            return redirect()->route('homepage');
        }

    }

}

