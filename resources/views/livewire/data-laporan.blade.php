<div>
    <div class="section-body">
        <div class="card">
            <div class="card-body">
                <form wire:submit.prevent="filterLaporan">
                    <div class="form-group">
                        <label>Status</label>
                        <select class="custom-select" wire:model="status">
                            <option value="all">Semua</option>
                            <option value="pending">Pending</option>
                            <option value="proses">Proses</option>
                            <option value="selesai">Selesai</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Cabang</label>
                        <select class="custom-select" wire:model="cabang">
                            <option value="all">Semua</option>
                            @foreach ($cabangs as $index => $data)
                                <option value="{{ $data->id }}">{{ $data->nama }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Dari Tanggal</label>
                        <input type="date" class="form-control" wire:model="start_date">
                    </div>

                    <div class="form-group">
                        <label>Sampai Tanggal</label>
                        <input type="date" class="form-control" wire:model="end_date">
                    </div>

                    <button type="submit" class="btn btn-primary">Terapkan Filter</button>
                    <a href="{{ route('laporan.download', request()->all()) }}" class="btn btn-success">Unduh Laporan</a>
                </form>



        <div class="table-responsive mt-4">
            <table class="table table-hover table-striped">
                <thead>
                    <tr>
                        <th>ID Transaksi</th>
                        <th>Nama Penerima</th>
                        <th>Alamat</th>
                        <th>Total Harga</th>
                        <th>Status</th>
                        <th>Tanggal Dibuat</th>
                        <th>Tanggal Diupdate</th>
                        <th>Cabang</th>
                        <th>Pembuat</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($datas as $index => $data)
                    @php
                    if ($data->status == 'pending'){
                        $warna = 'warning';
                    }else if($data->status == 'proses'){
                        $warna = 'info';
                    }else{
                        $warna = 'success';
                    }
                    @endphp
                         <tr wire:key="transaksi-{{ $data->id }}">
                            <th>{{ $data->id }}</th>
                            <td>{{ $data->nama_penerima }}</td>
                            <td>{{ $data->alamat }}</td>
                            <td>Rp {{ number_format($data->total_harga, 0, ',', '.') }}</td>
                            <td><span class="badge badge-{{$warna}}">{{ ucwords($data->status) }}</span></td>
                            <td>{{ $data->created_at->translatedFormat('d F Y, H:i:s') }}</td>
                            <td>{{ $data->updated_at->translatedFormat('d F Y, H:i:s') }}</td>
                            <td>{{ $data->cabang->nama }}</td>
                            <td>{{ $data->user->name }}</td>
                            <td>
                                <button class="btn btn-info btn-icon" wire:click="fetchDetail({{ $data->id }})">
                                    <i class="fas fa-eye"></i>
                                </button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $datas->links('vendor.pagination.bootstrap-5') }}
        </div>
    </div>
        </div>
    </div>
    <div wire:show="showModal">
        <div>
            <!-- Modal -->
            <div class="modal fade @if($showModal) show @endif" tabindex="-1" role="dialog"
                 style="display: @if($showModal) block @else none @endif;" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Detail Transaksi</h5>
                            <button type="button" class="close" wire:click="closeModal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
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
                                    <thead>
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

            <!-- Overlay -->
            <div class="modal-overlay @if($showModal) show @endif" wire:click="closeModal"></div>

            <style>
                .modal-overlay {
                    position: fixed;
                    top: 0;
                    left: 0;
                    width: 100%;
                    height: 100%;
                    background-color: rgba(0, 0, 0, 0.5);
                    z-index: 1040;
                    display: none;
                }
                .modal-overlay.show {
                    display: block;
                }
            </style>
        </div>
