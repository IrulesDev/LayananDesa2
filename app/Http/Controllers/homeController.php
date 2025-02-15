<?php

namespace App\Http\Controllers;

use App\Models\keluarga;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class homeController extends Controller
{
    public function username(){

        $data = DB::table('users')->orderBy('id')->paginate(30);

        $allData = User::all();

        return view('dashboard',['data'=>$data,'allData'=>$allData]);
    }

    public function nik(){
        
        $keluargas = DB::table('keluargas')->orderBy('id');

        $allKeluarga = keluarga::all();

        return view('dashboard', ['keluargas'=>$keluargas, 'allKeluarga'=>$allKeluarga]);
    }

}
