<?php

namespace App\Http\Controllers;

use App\Models\PengajuanLayanan;
use Illuminate\Http\Request;

class PengajuanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pengajuan = PengajuanLayanan::all();
        return response()->json($pengajuan);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $pengajuan = PengajuanLayanan::create($request->all());

        return response()->json([
            'message' => 'Pengajuan created successfully',
            'data' => $pengajuan
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $pengajuan = PengajuanLayanan::findOrFail($id);

        return response()->json($pengajuan);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $pengajuan = PengajuanLayanan::findOrFail($id);

        $request->validate([
            'name' => 'sometimes|required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $pengajuan->update($request->all());

        return response()->json([
            'message' => 'Pengajuan updated successfully',
            'data' => $pengajuan
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $pengajuan = PengajuanLayanan::findOrFail($id);
        $pengajuan->delete();

        return response()->json([
            'message' => 'Pengajuan deleted successfully'
        ]);
    }
}
