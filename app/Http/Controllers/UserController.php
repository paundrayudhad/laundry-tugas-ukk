<?php

namespace App\Http\Controllers;

use App\Models\Cabang;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $users = User::with('cabang')->paginate(10);
        return view('users.index', compact('users'));
    }

    /**
     * Show the form for creati ng a new resource.
     */
    public function create()
    {
        //
        $cabangs = Cabang::all();
        return view('users.create', compact('cabangs'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->all();
        if (User::create($validated)) {
            return redirect()->route('users.index')->with('success', 'User Berhasil dibuat');
        }

        return back()->with('error', 'Gagal membuat user, coba lagi.');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        //
        $cabangs = Cabang::all();
        return view('users.edit', compact('user', 'cabangs'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        // Validasi input data
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'password' => 'nullable|min:6|confirmed',
            'cabang_id' => 'required|exists:cabangs,id',
        ]);

        // Jika password diisi, hash password tersebut
        if (!empty($validated['password'])) {
            $validated['password'] = bcrypt($validated['password']);
        } else {
            unset($validated['password']);
        }

        // Update data user
        if ($user->update($validated)) {
            return redirect()->route('users.index')->with('success', 'User berhasil diperbarui');
        }

        return redirect()->back()->with('error', 'Gagal memperbarui user, coba lagi.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        if ($user->delete()) {
            return back()->with('success', 'Berhasil dihapus');
        } else {
            return back()->with('error', 'Cabang Gagal dihapus');
        }
    }
}
