<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Struk Transaksi</title>
    <style>
        body { font-family: Arial, sans-serif; }
        .container { width: 100%; max-width: 600px; margin: 0 auto; }
        h2 { text-align: center; margin-bottom: 20px; }
        table { width: 100%; border-collapse: collapse; margin-bottom: 20px; }
        th, td { border: 1px solid black; padding: 8px; text-align: left; }
        th { background-color: #f8f9fa; }
        .text-center { text-align: center; }
        .text-success { color: green; font-weight: bold; }
        .text-warning { color: orange; font-weight: bold; }
        .badge { padding: 4px 8px; border-radius: 4px; font-weight: bold; }
        .badge-success { background-color: green; color: white; }
        .badge-warning { background-color: orange; color: white; }
<<<<<<< HEAD
=======
        .badge-info { background-color: royalblue; color: white; }
>>>>>>> eadfbc5 (dsfs)
    </style>
</head>
<body>
    <div class="container">
<<<<<<< HEAD
        <h2>Struk Transaksi</h2>
=======
        <h2>Struk {{ env('APP_NAME') }} </h2>
>>>>>>> eadfbc5 (dsfs)

        <table>
            <tbody>
                <tr>
                    <th class="w-50">Nama Penerima</th>
                    <td>{{ $transaksi->nama_penerima }}</td>
                </tr>
                <tr>
                    <th>Alamat</th>
                    <td>{{ $transaksi->alamat }}</td>
                </tr>
                <tr>
                    <th>Total Harga</th>
                    <td class="text-success">Rp {{ number_format($transaksi->total_harga, 0, ',', '.') }}</td>
                </tr>
                <tr>
                    <th>Status</th>
                    <td>
<<<<<<< HEAD
                        <span class="badge badge-{{ $transaksi->status == 'selesai' ? 'success' : 'warning' }}">
=======
                        @php
                            if ($transaksi->status == 'pending'){
                                $badge = 'warning';
                            } else if ($transaksi->status == 'success'){
                                $badge = 'success';
                            } else {
                                $badge = 'info';
                            }
                        @endphp
                        <span class="badge badge-{{ $badge }}">
>>>>>>> eadfbc5 (dsfs)
                            {{ ucfirst($transaksi->status) }}
                        </span>
                    </td>
                </tr>
                <tr>
                    <th>Tanggal Dibuat</th>
<<<<<<< HEAD
                    <td>{{ $transaksi->created_at->format('d M Y, H:i') }}</td>
                </tr>
                <tr>
                    <th>Tanggal Diupdate</th>
                    <td>{{ $transaksi->updated_at->format('d M Y, H:i') }}</td>
=======
                    <td>{{ \Carbon\Carbon::parse($transaksi->created_at)->translatedFormat('d F Y') }}</td>
                </tr>
                <tr>
                    <th>Tanggal Diambil</th>
                    <td>{{ \Carbon\Carbon::parse($transaksi->tanggal_pengambilan)->translatedFormat('d F Y') }}</td>
>>>>>>> eadfbc5 (dsfs)
                </tr>
                <tr>
                    <th>Cabang</th>
                    <td>{{ $transaksi->cabang->nama }}</td>
                </tr>
<<<<<<< HEAD
=======
                <tr>
                    <th>Nama Karyawan</th>
                    <td>{{ $transaksi->user->name }}</td>
                </tr>
>>>>>>> eadfbc5 (dsfs)
            </tbody>
        </table>

        <h4>Layanan yang Dipesan</h4>
        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Layanan</th>
                    <th>Jumlah</th>
                    <th>Total Harga</th>
                </tr>
            </thead>
            <tbody>
                @foreach($transaksi->details as $index => $detail)
                <tr>
                    <td class="text-center">{{ $index + 1 }}</td>
                    <td>{{ $detail->layanan->nama_layanan }}</td>
                    <td class="text-center">{{ $detail->jumlah }}x</td>
                    <td class="text-warning">Rp {{ number_format($detail->total_harga, 0, ',', '.') }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <p class="text-center">Terima kasih telah bertransaksi dengan kami!</p>
    </div>
</body>
</html>
