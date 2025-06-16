<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    //

    public function dashboard(){
        $users= DB::select('select * from users');
       
        return view('admin.home',['users'=>$users]);

    }
}
