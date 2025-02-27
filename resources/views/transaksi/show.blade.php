<div class="container">
    <!-- Informasi Transaksi -->
    <div id="printArea">
        <table class="table table-bordered">
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
                    <td class="font-weight-bold text-success">Rp {{ number_format($transaksi->total_harga, 0, ',', '.') }}</td>
                </tr>
                <tr>
                    <th>Status</th>
                    <td>
                        <span class="badge badge-{{ $transaksi->status == 'selesai' ? 'success' : 'warning' }}">
                            {{ ucfirst($transaksi->status) }}
                        </span>
                    </td>
                </tr>
                <tr>
                    <th>Tanggal Dibuat</th>
                    <td>{{ $transaksi->created_at->format('d M Y, H:i') }}</td>
                </tr>
                <tr>
                    <th>Tanggal Diupdate</th>
                    <td>{{ $transaksi->updated_at->format('d M Y, H:i') }}</td>
                </tr>
                <tr>
                    <th>Cabang</th>
                    <td>{{ $transaksi->cabang->nama }}</td>
                </tr>
            </tbody>
        </table>

        <!-- Layanan yang Dipesan -->
        <h4 class="mt-3 font-weight-bold">Layanan yang Dipesan</h4>
        <table class="table table-striped table-hover">
            <thead class="thead-dark">
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
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $detail->layanan->nama_layanan }}</td>
                    <td>{{ $detail->jumlah }}x</td>
                    <td class="font-weight-bold text-warning">Rp {{ number_format($detail->total_harga, 0, ',', '.') }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    
</div>

<!-- JavaScript untuk Cetak -->
<script>

</script>
