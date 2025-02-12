<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class homeController extends Controller
{
    public function username(){

        $data = DB::table('users')->orderBy('id')->paginate(10);

        $allData = User::all();

        return view('dashboard',['data'=>$data,'allData'=>$allData]);
    }


}
