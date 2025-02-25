<?php

namespace App\Http\Controllers;

use App\Models\Cabang;
use Illuminate\Http\Request;

class CabangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cabangs = Cabang::all();
        return view('cabang.index', compact('cabangs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('cabang.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|max:255|string',
            'alamat' => 'required|string',
            'no_hp' => 'required|integer'
        ]);
        if(Cabang::create($validated)){
            return redirect()->route('cabang.index')->with('success', 'Cabang Berhasil dibuat');
        } else {
            return redirect()->route('cabang.create')->with('error', 'Cabang Gagal dibuat'); 
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Cabang $cabang)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Cabang $cabang)
    {
        //
        return view('cabang.edit', compact('cabang'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Cabang $cabang)
    {
        //
        $validated = $request->validate([
            'nama' => 'required|max:255|string',
            'alamat' => 'required|string',
            'no_hp' => 'required|integer'
        ]);
        if($cabang->update($validated)){
            return redirect()->route('cabang.index')->with('success', 'Cabang Berhasil dibuat');
        } else {
            return redirect()->route('cabang.create')->with('error', 'Cabang Gagal dibuat'); 
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cabang $cabang)
    {
            
            if($cabang->delete()){
                return back()->with('success', 'Berhasil dihapus');
            } else {
                return back()->with('error', 'Cabang Gagal dihapus');
            }
    }
}
