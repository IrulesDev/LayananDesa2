<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserWebController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // Cari user berdasarkan ID
        // $user = User::findOrFail($id);

        // Tampilkan view edit dengan data user
        // return view('user.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Validasi input
        // $request->validate([
        //     'name' => 'required|string|max:255',
        //     'email' => 'required|email|max:255|unique:users,email,'.$id,
        // ]);

        // Cari user dan update data
        // $user = User::findOrFail($id);
        // $user->update([
        //     'name' => $request->name,
        //     'email' => $request->email,
        // ]);

        // Redirect kembali dengan pesan sukses
        // return redirect()->route('UserWeb.edit', $id)->with('success', 'User berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        session()->flash('success', 'User ' . $user->name . ' deleted successfully.');
        return redirect()->route('home')->with('success', 'User ' . $user->email . ' deleted successfully.');
    }
}