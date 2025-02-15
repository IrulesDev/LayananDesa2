<?php

namespace App\Http\Controllers;

use App\Models\keluarga;
use App\Models\User;
use Dotenv\Exception\ValidationException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KeluargaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $keluarga = keluarga::all();
        return response()->json($keluarga);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try{
            $request->validate([
                'no_kk' => 'required'
            ]);
        } catch (ValidationException $e){
            return response()->json([
                'eroro_massage' => $e->getMessage()
            ], 400);
        }

        $keluarga = keluarga::create([
            'no_kk' => $request->no_kk
        ]);

        return response()->json([
            'message' => 'Data' . $keluarga->no_kk . ' berhasil disimpan',
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $keluarga = keluarga::findOrFail($id);

        if(!$keluarga){
            return response()->json(['message' => 'Data empty']);
        }

        return response()->json($keluarga);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = User::findOrFail($id);

        if (!$user) {
            return response()->json(['message' => 'User not found'], 404);
        }

       try {
            $dataUser = $request->validate([
                'pondok_id' => 'nullable',
                'email' => 'nullable',
                'name' => 'nullable',
                'password' => 'nullable'
            ]);
        } catch (ValidationException $e) {
            return response()->json([
               'error_message' => $e->getMessage()
            ]);
        }
        $user->update($dataUser);

        return response()->json([
            'message' => 'Data ' . $user->name . ' Berhasil Update',
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::findOrFail($id);

        if (!$user) {
            return response()->json(['message' => 'User not found'], 404);
        }

        $user->delete();

        return response()->json(['message' => $user->name .' deleted successfully']);
    }
    public function dashboard(){
        return view('dashboard', ['user' => Auth::keluargas()]);
    }
}
