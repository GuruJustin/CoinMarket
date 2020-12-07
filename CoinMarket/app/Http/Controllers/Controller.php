<!-- <?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

use Auth;
use Hashids;
use Redirect;
use Request;
use Hash;

use App\Http\Requests;
use App\User;
use App\UserTypes;

class UserController extends BaseController {

    /**
    * Display Home page.
    *
    * @return Response
    */
    public function index(){
        if (Auth::user() == null){
            return view("auth.login");
        }else{
            return redirect('/home');
        }
    }

    /**
    * Function for Login.
    *
    * @return Response
    */
    public function userLogin(Request $request){

        $password = $request->input('password');
        $email = $request->input('email');

        if (Auth::attempt([ 'email'=> $email, 'password'  => $password ])) {

            echo json_encode(array(
                'loggedIn' => true
            ));
        }else{
            echo json_encode(array(
                'loggedIn' => false,
                'error' => "Wrong Email password Combinatoin."
            ));
        }
    }

    /**
    * Display the the Home page.
    *
    * @return Response
    */
    public function home(Request $request){

        if (Auth::user() != null){

            //Getting User information.
            $users = User::where('id', Auth::user()->id)->first();
            $users['mobile'] = substr($users['mobile'], -4);

            return view("myHome",compact('users'));
        }else{
            return redirect('/');
        }
    }

    /**
    * Function to log out User
    * @return Response
    */
    public function logout(){
        Auth::logout();
        return redirect('/');
    }
}
 -->