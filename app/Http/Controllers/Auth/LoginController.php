<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Laravel\Sanctum\HasApiTokens;






class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        //   return view ('clients.index')->with('clients', $clients);
        return $users->toJson(JSON_PRETTY_PRINT);
    }


    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    public function boot(Router $router){   
        if(Auth::check()){
            if (Auth::user()->role == 'Admin'){
                return $next($request);
    
         } elseif(Auth::user()->role == 'Client')
          {
            return  $redirectTo = RouteServiceProvider::CLIENT;

               // return redirect('/client')->with('message','Client ');
        }
        } elseif(Auth::user()->role == 'Personnel'){
            return $redirectTo = RouteServiceProvider::PERSONNEL;

       // return redirect('/personnel')->with('message','Personnel ');
    
        } else {
         //   return   $redirectTo = RouteServiceProvider::HOME;
          //  return redirect('/login')->with('message','u must login to access the site ');
        }
return $next($request);
}
 //   protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'Numtelephone' => ['required', 'string', 'min:8'],          
        ]);
    }


     /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
         /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    protected function LoginUser(Request $request)
    {
        try {
            $validatoruser = Validator::make($request->all(),
            [
                'email' => 'required' , 
                'password' => 'required'
            ]);

            if ($validatoruser->fails()){
                return response()->json([
                    'status'=> false ,
                    'message'=>'Validation error ',
                    'errors' => $validatoruser->errors()
                ] , 401);
            }

            if (!Auth::attempt($request->only(['email','password']))){
                return response()->json([
                    'status'=> false ,
                    'message'=>'Email and password dont match with our record',
                ] , 401);
            }
            $user = User::where('email',$request->email)->first();
            return response()->json([
                'status'=> true,
                'message'=>'User logged with succes ',
                'User'=>$user,
             //   'token' => $user->createToken["API TOKEN"]->plainTextToken
            ] , 200);

        } catch(\Throwable $th){
            return response()->json([
                'status'=> false ,
                'message'=>$th->getmessage()
            ] , 500);
        }
        /*
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'Numtelephone' => $data['Numtelephone'],

        ]);
        */
       
    }

}
