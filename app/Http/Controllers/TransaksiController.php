<?php

namespace App\Http\Controllers;

use App\Models\Layanan;
use Illuminate\Support\Facades\Auth;
use App\Models\Transaksi;
use PDF;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $datas = Transaksi::with('cabang','user')
                ->where('user_id', Auth::id())
                ->latest()
                ->paginate(10);
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
        $layanans = Layanan::all();
        return view('transaksi.create', compact('layanans'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    $messages = [
        'id_layanan.*.required' => 'Layanan wajib dipilih!',
        'id_layanan.*.exists' => 'Layanan tidak valid!',
        'jumlah.*.required' => 'Jumlah wajib diisi!',
        'jumlah.*.integer' => 'Jumlah harus angka!',
        'jumlah.*.min' => 'Jumlah minimal 1!',
    ];

    $request->validate([
        'id_layanan' => 'required|array',
        'id_layanan.*' => 'required|exists:layanan,id',
        'jumlah' => 'required|array',
        'jumlah.*' => 'required|integer|min:1',
        'nama_penerima' => 'required|string|max:255',
        'alamat' => 'required|string',
<<<<<<< HEAD
=======
        'tanggal_pengambilan' => 'required'
>>>>>>> eadfbc5 (dsfs)
    ], $messages);

    $totalHarga = 0;
    $details = [];

    foreach ($request->id_layanan as $index => $layanan_id) {
        $layanan = Layanan::findOrFail($layanan_id);
        $jumlah = $request->jumlah[$index];
        $hargaSatuan = $layanan->harga_layanan;
        $subtotal = $hargaSatuan * $jumlah;

        $details[] = [
            'id_layanan' => $layanan_id,
            'jumlah' => $jumlah,
            'harga_satuan' => $hargaSatuan,
            'total_harga' => $subtotal,
        ];

        $totalHarga += $subtotal;
    }

    $transaksi = Transaksi::create([
        'user_id' => Auth::id(),
        'cabang_id' => Auth::user()->cabang_id,
        'nama_penerima' => $request->nama_penerima,
        'alamat' => $request->alamat,
<<<<<<< HEAD
=======
        'tanggal_pengambilan' => $request->tanggal_pengambilan,
>>>>>>> eadfbc5 (dsfs)
        'status' => 'pending',
        'total_harga' => $totalHarga,
    ]);

    foreach ($details as $detail) {
        $transaksi->details()->create($detail);
    }

    return redirect()->route('transaksi.index')->with('success', 'Transaksi berhasil ditambahkan!');
}
    

    /**
     * Display the specified resource.
     */
    public function show($id)
{
    $transaksi = Transaksi::with(['details.layanan', 'cabang'])->findOrFail($id);

    // Cek apakah request berasal dari AJAX
    if (request()->ajax()) {
        return view('transaksi.show', compact('transaksi'))->render();
    }

    return view('transaksi.show', compact('transaksi'));
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

    public function cetakStruk($id)
    {
        $transaksi = Transaksi::with('cabang', 'user')->findOrFail($id);

        $pdf = PDF::loadView('pdf.struk', compact('transaksi'));

        return $pdf->stream('struk_transaksi.pdf');
    }
}
