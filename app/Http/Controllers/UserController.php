<?php

namespace App\Http\Controllers;

use App\Models\User;
use Dotenv\Exception\ValidationException;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all();
        return response()->json($users);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required',
                'email' => 'required|email',
                'password' => 'required'
            ]);
        } catch (ValidationException $e) {
            return response()->json([
                'error_message' => $e->getMessage()
            ], 400);
        }

        $user = User::create($request->all());

        return response()->json([
            'message' => 'User ' . $user->name . ' successfully created',
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user = User::findOrFail($id);

        if (!$user) {
            return response()->json(['message' => 'User not found'], 404);
        }

        return response()->json($user);
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
                'name' => 'nullable',
                'email' => 'nullable|email',
                'password' => 'nullable'
            ]);
        } catch (ValidationException $e) {
            return response()->json([
                'error_message' => $e->getMessage()
            ], 400);
        }

        $user->update($dataUser);

        return response()->json([
            'message' => 'User ' . $user->name . ' successfully updated',
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

        return response()->json(['message' => 'User ' . $user->name . ' successfully deleted']);
    }
}
