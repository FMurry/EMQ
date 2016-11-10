<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;//Needed to use Auth::
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\User;
use App\Order;
use App\Store;
use App\Products;



class AdminController extends Controller
{
    //
	public function __construct()
    {
        $this->middleware('auth');
    }

    /**
    *   Returns the admin management view as long as user is admin
    *   @return view either redirect home or return admin management
    */
    public function getAdminAccount()
    {
        // if(Auth::check()){
        //     echo "User is authed";
        //     if(Auth::user()->id == 1){
        //         return view('admin.management');
        //     }
        //     else{
        //         redirect('/home');
        //     }
        // }
        // else{
        //     echo "User is not authed";
        //     redirect('/home');
        // }
    	return view('admin.management');
    	
    	
    }

    /** 
    *   Returns a view that displays all of the users in the application
    *   @return view user view
    */
    public function getAllUsers()
    {
        $users = User::all();
        return view('admin.users', ['users' => $users]);
    }

    public function getUser($id)
    {
        $user = User::find($id);
        //return view('admin.admin');
    }

    /*
    *
    */
    public function searchUser($request)
    {
        $searchTerm = $request['searchTerm'];

        $user = Auth::user();
        if($request['searchBy'] == 0){
            $users = User::where('name',$user->name)->get();
        }
        //By email
        elseif ($request['searchBy'] == 1) {
            
        }
    }

    /**
    *   Returns the manage user order view
    *   @param $id The id of the user
    *   @return return the view
    */
    public function manageUserOrder($id)
    {

        $orders = Order::where('user_id', $id)->orderBy('id', 'DESC')->get();
        return view('admin.orders', ['orders' => $orders]);
    }

    public function changeUserEmail($id)
    {
        
    }

    /**
    *   Returns the view with all of the stores listed
    *   @return view store view
    */
    public function getStores()
    {
        $stores = Store::all();
        return view('admin.stores', ['stores' => $stores]);
    }

    public function getProducts()
    {
        $products = Products::all();
        return view('admin.products', ['products' => $products]);
    }

    public function getProduct($id)
    {
        $product = Products::find($id);
        return view('admin.product', ['product' => $product]);
    }
}
