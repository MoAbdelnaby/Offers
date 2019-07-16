<?php

namespace App\Http\Controllers\Front;

use App\Front\Add;
use App\Model\Offer;
use App\Model\Department;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
     public function index($id) {
     	$department = Department::where('id', $id)->first()->dep_name_ar;
     	
        $offers = Add::where('department_id', $id)->get();

        $stars = Offer::where('department_id', $id)->get();
        
        return view('style.offers', compact('offers','department','stars'));
    }
}

