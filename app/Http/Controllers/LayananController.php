<?php

namespace App\Http\Controllers;

use App\Models\LayananDesa;
use Dotenv\Exception\ValidationException;
use Illuminate\Http\Request;

class LayananController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $layanan = LayananDesa::all();
        return response()->json($layanan);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $request->validate([
                'pengajuan_id' => 'required',
                'layanan' => 'nullable'
            ]);
        } catch (ValidationException $e) {
            return response()->json([
                'error_message' => $e->getMessage()
            ], 400);
        }

        $layanan = LayananDesa::create([
            'pengajuan_id' => $request->pengajuan_id,
            'layanan' => $request->layanan
        ]);

        return response()->json([
            'message' => 'Data ' . $layanan->pengajuan_id . ' berhasil disimpan',
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $layanan = LayananDesa::findOrFail($id);

        if (!$layanan) {
            return response()->json(['message' => 'Data empty']);
        }

        return response()->json($layanan);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $layanan = LayananDesa::findOrFail($id);

        if (!$layanan) {
            return response()->json(['message' => 'Layanan not found'], 404);
        }

        try {
            $dataLayanan = $request->validate([
                'pengajuan_id' => 'nullable',
                'layanan' => 'nullable'
            ]);
        } catch (ValidationException $e) {
            return response()->json([
                'error_message' => $e->getMessage()
            ], 400);
        }

        $layanan->update($dataLayanan);

        return response()->json([
            'message' => 'Layanan ' . $layanan->pengajuan_id . ' successfully updated',
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $layanan = LayananDesa::findOrFail($id);

        if (!$layanan) {
            return response()->json(['message' => 'Layanan not found'], 404);
        }

        $layanan->delete();

        return response()->json(['message' => 'Layanan ' . $layanan->pengajuan_id . ' successfully deleted']);
    }
}
