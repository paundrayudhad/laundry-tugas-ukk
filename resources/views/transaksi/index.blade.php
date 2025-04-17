@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Data Transaksi</h1>
        </div>

        <div class="section-body">

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">ID Transaksi</th>
                                            <th scope="col">Nama Penerima</th>
                                            <th scope="col">Alamat</th>
                                            <th scope="col">Total Harga</th>
                                            <th scope="col">Status</th>
                                            <th scope="col">Dibuat pada</th>
<<<<<<< HEAD
                                            <th scope="col">Diperbarui pada</th>
=======
                                            <th scope="col">Diambil pada</th>
>>>>>>> eadfbc5 (dsfs)
                                            <th scope="col">Cabang</th>
                                            <th scope="col">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $no = 1;
                                        @endphp
                                        @foreach ($datas as $data)
                                            <tr>
                                                <th scope="row">{{ $data->id }}</th>
                                                <td>{{ $data->nama_penerima }}</td>
                                                <td>{{ $data->alamat }}</td>
                                                <td>Rp {{ number_format($data->total_harga, 0, ',', '.') }}</td>
                                                <td> <span
                                                        class="badge badge-{{ $data->status == 'selesai' ? 'success' : 'warning' }}">
                                                        {{ ucfirst($data->status) }}
                                                    </span></td>
                                                <td>{{ \Carbon\Carbon::parse($data->created_at)->translatedFormat('d F Y, H:i:s') }}
                                                </td>
<<<<<<< HEAD
                                                <td>{{ \Carbon\Carbon::parse($data->updated_at)->translatedFormat('d F Y, H:i:s') }}
=======
                                                <td>{{ \Carbon\Carbon::parse($data->tanggal_pengambilan)->translatedFormat('d F Y') }}
>>>>>>> eadfbc5 (dsfs)
                                                </td>



                                                <td>{{ $data->cabang->nama }}</td>
                                                <td>
                                                    <div class="d-flex align-items-center gap-2">
                                                        <!-- Tombol Lihat Detail -->
                                                        <button class="btn btn-info btn-icon"
                                                            onclick="fetchDetail({{ $data->id }})" title="Lihat Detail">
                                                            <i class="fas fa-eye"></i>
                                                        </button>

                                                        <!-- Tombol Edit -->
                                                        <a class="btn btn-warning btn-icon"
                                                            href="{{ route('transaksi.edit', $data->id) }}" title="Edit">
                                                            <i class="fas fa-edit"></i>
                                                        </a>

                                                        <!-- Form Hapus -->
                                                        <form action="{{ route('transaksi.destroy', $data->id) }}"
                                                            method="post"
                                                            onsubmit="return confirm('Apakah Anda ingin menghapus?')"
<<<<<<< HEAD
                                                            class="d-inline mt-3">
=======
                                                            class="d-inline">
>>>>>>> eadfbc5 (dsfs)
                                                            @csrf
                                                            @method('DELETE')
                                                            <button class="btn btn-danger btn-icon" title="Hapus">
                                                                <i class="fas fa-trash"></i>
                                                            </button>
                                                        </form>
                                                    </div>

                                                </td>


                                            </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                            </div>
                            {{ $datas->links() }}
                        </div>
                    </div>
                </div>
            </div>
    </section>
<<<<<<< HEAD
@endsection
@include('components.modal')
<script>
    function fetchDetail(transaksiId) {
        console.log("Fetching transaksi ID:", transaksiId);
        fetch(`/transaksi/${transaksiId}`)
            .then(response => response.text())
            .then(data => {
                console.log("Response received:", data);
                window.dispatchEvent(new CustomEvent('open-modal', {
                    detail: data
                }));
            })
            .catch(error => console.error("Fetch error:", error));
    }
    $('#transaksiModal').on('hidden.bs.modal', function() {
        window.dispatchEvent(new CustomEvent('open-modal', {
            detail: ''
        }));
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
=======
    <div x-data="{ open: false, content: '' }" 
     @open-modal.window="
        content = $event.detail;
        open = true;
        setTimeout(() => { 
            $('#transaksiModal').modal('show'); 
        }, 100);
     "
     x-ref="modal"
     x-cloak>

    <!-- Modal Bootstrap -->
    <div class="modal fade show" 
         tabindex="-1" 
         x-show="open"
         x-transition 
         x-init="$watch('open', value => value ? $('#transaksiModal').modal('show') : $('#transaksiModal').modal('hide'))"
         id="transaksiModal">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Detail Transaksi</h5>
                    <button type="button" class="close" data-dismiss="modal" @click="open = false">&times;</button>
                </div>
                <div class="modal-body">
                    <div x-html="content"></div>
                </div>
                <div class="modal-footer">                  
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>
</div>

    <script>
        function fetchDetail(transaksiId) {
            console.log("Fetching transaksi ID:", transaksiId);
            fetch(`/transaksi/${transaksiId}`)
                .then(response => response.text())
                .then(data => {
                    console.log("Response received:", data);
                    window.dispatchEvent(new CustomEvent('open-modal', {
                        detail: data
                    }));
                })
                .catch(error => console.error("Fetch error:", error));
        }
        $('#transaksiModal').on('hidden.bs.modal', function() {
            window.dispatchEvent(new CustomEvent('open-modal', {
                detail: ''
            }));
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
    
@endsection
>>>>>>> eadfbc5 (dsfs)
