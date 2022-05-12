<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class transtypeController extends Controller
{
    public function index(){
        $companys = DB::table('m_company')->get();
        return view('dashboard.master.company.company')->with('company', $companys);
    }

}