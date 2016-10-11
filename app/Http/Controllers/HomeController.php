<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use Cornford\Googlmapper\Facades\MapperFacade as Mapper;

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
        $mapper = Mapper::map(37.3, -121.8);
        return view('home')->with('mapper', $mapper);
    }

    public function getAccount()
    {
        return view('account.account');
    }
}
