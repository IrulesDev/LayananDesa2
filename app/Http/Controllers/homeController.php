<?php

namespace App\Http\Controllers;

use App\Models\keluarga;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function nik(){
        
        $keluargas = DB::table('keluargas')->orderBy('id')->paginate(30);

        $allKeluarga = keluarga::all();

        return view('dashboard', ['data'=>$keluargas, 'allData'=>$allKeluarga]);

    }

    // public function nik(){
        
    //     $keluargas = DB::table('keluargas')->orderBy('id');

    //     $allKeluarga = keluarga::all();

    //     return view('dashboard', ['keluargas'=>$keluargas, 'allKeluarga'=>$allKeluarga]);
    // }

}
