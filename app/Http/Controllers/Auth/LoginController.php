<?php
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Symfony\Component\Console\Input\Input;
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
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    public function loginadmin(Request $request){
  $email = $request->input('email');
        $password = $request->input('password');
            if (Auth::attempt(['email' =>$email, 'password' => $password])){
                $role= Auth::user()->role;
                if ($role == 'admin'){
                    return redirect()->route('main');
                }else{
                    return redirect()->route('sellermain');
                }
                          }
            else {
                return "الحساب غير مسجل";
            }

        }
        public function logoutadmin(){
            Auth::logout();
            Session::flush();
            return redirect('login');
                  }


                  public function getLogout()
                  {
                      Auth::logout();
                      Session::flush();
                      return redirect('/login');
                  }
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('getLogout');
    }
}
