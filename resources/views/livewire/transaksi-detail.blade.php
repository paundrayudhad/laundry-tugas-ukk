<div wire:show="showModal" class="modal fade @if($showModal) show @endif" tabindex="-1" role="dialog" style="display: @if($showModal) block @else none @endif;">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Detail Transaksi</h5>
                <button type="button" class="close" wire:click="closeModal">&times;</button>
            </div>
            <div class="modal-body" style="max-height: 80vh; overflow-y: auto;">
                @if ($selectedTransaksi)
                <table class="table table-bordered">
                    <tbody>
                        <tr>
                            <th>Nama Penerima</th>
                            <td>{{ $selectedTransaksi->nama_penerima ?? 'Tidak tersedia' }}</td>
                        </tr>
                        <tr>
                            <th>Alamat</th>
                            <td>{{ $selectedTransaksi->alamat ?? 'Tidak tersedia' }}</td>
                        </tr>
                        <tr>
                            <th>Total Harga</th>
                            <td class="font-weight-bold text-success">Rp {{ number_format($selectedTransaksi->total_harga ?? 0, 0, ',', '.') }}</td>
                        </tr>
                        <tr>
                            <th>Status</th>
                            <td>
                                <span class="badge badge-{{ $selectedTransaksi->status == 'selesai' ? 'success' : 'warning' }}">
                                    {{ ucfirst($selectedTransaksi->status ?? 'Tidak tersedia') }}
                                </span>
                            </td>
                        </tr>
                        <tr>
                            <th>Tanggal Dibuat</th>
                            <td>{{ $selectedTransaksi->created_at ? $selectedTransaksi->created_at->format('d M Y, H:i') : 'Tidak tersedia' }}</td>
                        </tr>
                        <tr>
                            <th>Tanggal Diupdate</th>
                            <td>{{ $selectedTransaksi->updated_at ? $selectedTransaksi->updated_at->format('d M Y, H:i') : 'Tidak tersedia' }}</td>
                        </tr>
                        <tr>
                            <th>Cabang</th>
                            <td>{{ $selectedTransaksi->cabang->nama ?? 'Tidak tersedia' }}</td>
                        </tr>
                    </tbody>
                </table>

                @if (!empty($selectedTransaksi->details) && count($selectedTransaksi->details) > 0)
                <h4 class="mt-3 font-weight-bold">Layanan yang Dipesan</h4>
                <div class="table-responsive">
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
                            @foreach($selectedTransaksi->details as $index => $detail)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $detail->layanan->nama_layanan ?? 'Tidak tersedia' }}</td>
                                <td>{{ $detail->jumlah ?? 0 }}x</td>
                                <td class="font-weight-bold text-warning">Rp {{ number_format($detail->total_harga ?? 0, 0, ',', '.') }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                @else
                <p class="text-muted">Tidak ada layanan yang dipesan.</p>
                @endif
                @endif
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" wire:click="closeModal">Tutup</button>
            </div>
        </div>
    </div>
</div>
