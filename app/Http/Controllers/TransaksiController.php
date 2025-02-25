<?php

namespace App\Http\Controllers;

use App\Models\Layanan;
use Illuminate\Support\Facades\Auth;
use App\Models\Transaksi;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $datas = Transaksi::with('cabang','layanan','users')->paginate(10);
        return view('transaksi.index', compact('datas'));
    }
    /**
     * Display a listing of the resource.
     */

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $layanans = Layanan::get();
        return view('transaksi.create', compact('layanans'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    // Custom pesan validasi
    $messages = [
        'id_layanan.required' => 'Layanan wajib dipilih!',
        'id_layanan.exists' => 'Layanan yang dipilih tidak valid!',
        'nama_penerima.required' => 'Nama penerima wajib diisi!',
        'nama_penerima.max' => 'Nama penerima maksimal 255 karakter!',
        'alamat.required' => 'Alamat wajib diisi!',
        'jumlah.required' => 'Jumlah wajib diisi!',
        'jumlah.integer' => 'Jumlah harus berupa angka!',
        'jumlah.min' => 'Jumlah minimal harus 1!',
    ];

    // Validasi input dengan pesan kustom
    $request->validate([
        'id_layanan' => 'required|exists:layanan,id',
        'nama_penerima' => 'required|string|max:255',
        'alamat' => 'required|string',
        'jumlah' => 'required|integer|min:1',
    ], $messages);

    // Ambil harga layanan
    $layanan = Layanan::findOrFail($request->id_layanan);
    $total_harga = $layanan->harga_layanan * $request->jumlah;

    // Simpan ke database
    Transaksi::create([
        'id_layanan' => $request->id_layanan,
        'nama_penerima' => $request->nama_penerima,
        'alamat' => $request->alamat,
        'jumlah' => $request->jumlah,
        'total_harga' => $total_harga,
        'status' => 'pending',
        'cabang_id' => Auth::user()->cabang_id,
        'user_id' => Auth::id()
    ]);

    return redirect()->route('transaksi.index')->with('success', 'Transaksi berhasil ditambahkan!');
}
    

    /**
     * Display the specified resource.
     */
    public function show(Transaksi $transaksi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Transaksi $transaksi)
    {
        //
        return view('transaksi.edit', compact('transaksi'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Transaksi $transaksi)
    {
        //
        $messages = [
            'nama_penerima.required' => 'Nama penerima wajib diisi!',
            'nama_penerima.max' => 'Nama penerima maksimal 255 karakter!',
            'alamat.required' => 'Alamat wajib diisi!'
        ];
    
        // Validasi input dengan pesan kustom
        $request->validate([
            'nama_penerima' => 'required|string|max:255',
            'alamat' => 'required|string',
        ], $messages);

        $transaksi->update([
            'nama_penerima' => $request->nama_penerima,
            'alamat' => $request->alamat,
            'status' => $request->status
        ]);
    
        return redirect()->route('transaksi.index')->with('success', 'Transaksi berhasil ditambahkan!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Transaksi $transaksi)
    {
        //
        $transaksi->delete();
        return back()->with('success', 'Berhasil dihapus');
    }
}
