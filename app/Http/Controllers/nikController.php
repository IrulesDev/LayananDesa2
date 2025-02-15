<?php

namespace App\Http\Controllers;

use App\Models\keluarga;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class nikController extends Controller
{
    public function nik(){
        
        $keluargas = DB::table('keluargas')->orderBy('id');

        $allKeluarga = keluarga::all();

        return view('dashboard', ['keluargas'=>$keluargas, 'allKeluarga'=>$allKeluarga]);
    }
}
