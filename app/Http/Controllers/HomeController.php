<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Products; //Import Products to Controller

use Illuminate\Support\Facades\Auth;//Needed to use Auth::
use Illuminate\Support\Facades\Hash;//Needed to use Auth::

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Products::all();
        return view('home', ['products' => $products]);
    }

    public function getAccount()
    {
        return view('account.account');
    }

    public function updateAccountDetails(Request $request){
        /*  Change Password
        *   check if Change Password fields are not blank.
        */  
        if($request['currentPassword'] != "" || $request['newPassword'] != "" || $request['confirmNewPassword'] != ""){
             $this->validate($request, [
                'currentPassword' => 'required|min:6',
                'newPassword' => 'required|min:6|same:confirmNewPassword',
                'confirmNewPassword' => 'required|min:6',
            ]);

            $currentPw = $request['currentPassword'];
            $newPw = Hash::make($request['newPassword']);

            //Check if current password matches account password
            if( !Hash::check($currentPw,Auth::user()->password) ){
                $status = "Your current password did not match your account password.";
                return redirect('edit')->with('alert', $status);
            }
            //rehash if made dirty?
            if(Hash::needsRehash($newPw)){
                $newPw = Hash::make($request['newPassword']);
            }
            $user = Auth::user();
            $user->password = $newPw;
            $user->save();
            $status = "Your Password has been updated.";
            return redirect('edit')->with('success', $status);
        }
        /*  Change E-mail
        *   Check if Change E-mail field is not blank.
        */
        if( $request['email'] != ""){
             $this->validate($request, [
                'email' => 'required|email|max:255|unique:users',
            ]);
            $user = Auth::user();
            $user->email = $request['email'];
            $user->save();
            $status = "Your E-mail has been updated.";
            return redirect('edit')->with('success', $status);
        }
        if( $request['fullName'] != ""){
             $this->validate($request, [
                'fullName' => 'required|max:255',
            ]);
            $user = Auth::user();
            $user->name = $request['fullName'];
            $user->save();
            $status = "Your Name has been updated.";
            return redirect('edit')->with('success', $status);
        }
        $status = "No Input Detected.";
        return redirect('edit')->with('alert', $status);
    }
}
