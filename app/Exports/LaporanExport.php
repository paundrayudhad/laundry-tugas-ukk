<?php

namespace App\Exports;

use App\Models\Transaksi;
use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LaporanExport implements FromCollection, WithHeadings
{
    protected $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function collection()
    {
        $query = Transaksi::with('cabang', 'user')
            ->leftJoin('transaksi_details', 'transaksi_details.transaksi_id', '=', 'transaksi.id')
            ->select([
                'transaksi.nama_penerima',
                'transaksi.alamat',
                DB::raw('SUM(transaksi_details.jumlah) as total_jumlah'),
                'transaksi.total_harga',
                'transaksi.status',
                'transaksi.created_at',
                'transaksi.updated_at'
            ])
            ->groupBy('transaksi.id');
    
        if ($this->request->filled('status') && $this->request->status != 'all') {
            $query->where('transaksi.status', $this->request->status);
        }
    
        if ($this->request->filled('start_date') && $this->request->filled('end_date')) {
            $query->whereBetween('transaksi.created_at', [$this->request->start_date, $this->request->end_date]);
        }
    
        $data = $query->get();
    
        // Ubah format tanggal sebelum dikembalikan
        return $data->map(function ($item) {
            return [
                'nama_penerima' => $item->nama_penerima,
                'alamat' => $item->alamat,
                'total_jumlah' => $item->total_jumlah,
                'total_harga' => $item->total_harga,
                'status' => $item->status,
                'created_at' => Carbon::parse($item->created_at)->format('d-m-Y H:i:s'),
                'updated_at' => Carbon::parse($item->updated_at)->format('d-m-Y H:i:s'),
            ];
        });
    }
    


    public function headings(): array
    {
        return [
            'Nama Penerima', 'Alamat', 'Total Jumlah', 'Total Harga', 'Status', 'Tanggal Dibuat', 'Tanggal Diupdate'
        ];
    }
}
