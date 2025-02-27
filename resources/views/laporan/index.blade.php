@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Laporan Transaksi</h1>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                          <form class="form-horizontal" method="get" action="{{ route('laporan.index') }}">
                            @csrf
                            <div class="form-group">
                                <label>Status</label>
                                <select class="custom-select" name="status" onchange="this.form.submit();">
                                    <option value="all" {{ request('status') == 'all' ? 'selected' : '' }}>Semua</option>
                                    <option value="pending" {{ request('status') == 'pending' ? 'selected' : '' }}>Pending</option>
                                    <option value="proses" {{ request('status') == 'proses' ? 'selected' : '' }}>Proses</option>
                                    <option value="selesai" {{ request('status') == 'selesai' ? 'selected' : '' }}>Selesai</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Dari Tanggal</label>
                                <input type="date" name="start_date" class="form-control" value="{{ request('start_date') }}">
                            </div>
                            
                            <div class="form-group">
                                <label>Sampai Tanggal</label>
                                <input type="date" name="end_date" class="form-control" value="{{ request('end_date') }}">
                            </div>
                            <button type="submit" class="btn btn-primary">Filter</button>
                            <a href="{{ route('laporan.download', request()->all()) }}" class="btn btn-success">Unduh Laporan</a>
                        </form>
                        
                            <div class="table-responsive">
                                <table class="table table-hover table-striped">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Nama Penerima</th>
                                            <th scope="col">Alamat</th>
                                            <th scope="col">Total Harga</th>
                                            <th scope="col">Status</th>
                                            <th scope="col">Tanggal Dibuat</th>
                                            <th scope="col">Tanggal Diupdate</th>
                                            <th scope="col">Cabang</th>
                                            <th scope="col">Pembuat</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $no = 1;
                                        @endphp
                                        @foreach ($datas as $data)
                                            <tr>
                                                <th scope="row">{{ $no++ }}</th>
                                                <td>{{ $data->nama_penerima }}</td>
                                                <td>{{ $data->alamat }}</td>
                                                <td>Rp {{ number_format($data->total_harga, 0, ',', '.') }}</td>
                                                <td>
                                                    <div class="badge badge-info">{{ $data->status }}</div>
                                                </td>
                                                <td>{{ \Carbon\Carbon::parse($data->created_at)->translatedFormat('d F Y, H:i:s') }}</td>
                                                <td>{{ \Carbon\Carbon::parse($data->updated_at)->translatedFormat('d F Y, H:i:s') }}</td>
                                                <td>{{ $data->cabang->nama }}</td>
                                                <td>{{ $data->user->name }}</td>
                                                <td> 
                                                    <button class="btn btn-info btn-icon" onclick="fetchDetail({{ $data->id }})">
                                                        <i class="fas fa-eye"></i>
                                                    </button>     
                                                    </td>
                                            </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                                {{ $datas->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </section>
@endsection
@include('components.modal')
<script>
  function fetchDetail(transaksiId) {
    console.log("Fetching transaksi ID:", transaksiId);
    fetch(`/transaksi/${transaksiId}`)
        .then(response => response.text())
        .then(data => {
            console.log("Response received:", data);
            window.dispatchEvent(new CustomEvent('open-modal', { detail: data }));
        })
        .catch(error => console.error("Fetch error:", error));
}
$('#transaksiModal').on('hidden.bs.modal', function () {
        window.dispatchEvent(new CustomEvent('open-modal', { detail: '' }));
    });
    function printDetail() {
    var printContent = document.getElementById("printArea").innerHTML;
    var originalContent = document.body.innerHTML;
    
    document.body.innerHTML = printContent;
    window.print();
    
    document.body.innerHTML = originalContent;
    location.reload(); // Refresh halaman setelah cetak
}
  </script>