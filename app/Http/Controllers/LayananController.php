<?php

namespace App\Http\Controllers;

use App\Models\Layanan;
use Illuminate\Http\Request;

class LayananController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $layanans = Layanan::all();
        return view('layanan.index', compact('layanans'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('layanan.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        {
            $validated = $request->all();
            if (Layanan::create($validated)) {
                return redirect()->route('layanan.index')->with('success', 'Layanan Berhasil dibuat');
            }
        
            return back()->with('error', 'Gagal membuat Layanan, coba lagi.');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Layanan $layanan)
    {
        //  
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Layanan $layanan)
    {
        //
        return view('layanan.edit', compact('layanan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Layanan $layanan)
    {
        //
            $validated = $request->all();
            if ($layanan->update($validated)) {
                return redirect()->route('layanan.index')->with('success', 'Layanan Berhasil dibuat');
            }
        
            return back()->with('error', 'Gagal membuat Layanan, coba lagi.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
        $layanan = Layanan::find($id);

        if($layanan->delete()){
            return redirect()->route('layanan.index')->with('success', 'Layanan Berhasil dihapus');
        } else {
            return redirect()->route('layanan.index')->with('error', 'Layanan Gagal dibuat');
        }
    }
}
