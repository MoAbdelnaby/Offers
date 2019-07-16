<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Department;
use App\Front\Add;
use App\Model\Offer;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
       // $this->middleware('guest');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $adds = Add::where('status', 'active')->orderBy('id', 'desc')->limit(5)->get();
        $offers = Offer::orderBy('id', 'desc')->limit(3)->get();



        return view('style.home',compact('adds','offers'));
    }

    public function show($id) {
        $offers = Offer::where('id', $id)->get();
        
        return view('style.offers.show', compact('offers'));
    }


}
