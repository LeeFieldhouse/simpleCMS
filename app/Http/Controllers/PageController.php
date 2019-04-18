<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Company;

class PageController extends Controller
{
    public function index(){
        if(Auth::user()){
            return redirect()->route('home');
        }else{
            return view('index');
        }
    }

    public function home() {

        $companies = Company::all();

        return view('home')->with('companies', $companies);
    }
}
