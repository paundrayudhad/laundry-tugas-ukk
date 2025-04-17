@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Buat Transaksi</h1>
        </div>

        <div class="section-body">

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <form method="post" action="{{route('transaksi.store')}}">
                                @csrf
                                <div id="layanan-container">
                                    <div class="layanan-group">
                                        <label>Pilih Layanan</label>
                                        <select class="custom-select" name="id_layanan[]">
                                            <option selected>Pilih Layanan</option>
                                            @foreach ($layanans as $layanan)
                                            <option value="{{$layanan->id}}" data-harga="{{$layanan->harga_layanan}}">
                                                {{$layanan->nama_layanan}} - Rp {{ number_format($layanan->harga_layanan) }}
                                            </option>
                                            @endforeach
                                        </select>
                                        <input type="number" class="form-control mt-2" name="jumlah[]" placeholder="Jumlah" required>
                                    </div>
                                </div>
                                
                                <button type="button" id="add-layanan" class="btn btn-success mt-2">Tambah Layanan</button>
                            
                                <div class="form-group mt-3">
                                    <label>Nama Pelanggan</label>
                                    <input type="text" class="form-control" name="nama_penerima" required>
                                </div>
                                <div class="form-group">
                                    <label>Alamat</label>
                                    <textarea class="form-control" name="alamat" required></textarea>
                                </div>
<<<<<<< HEAD
                            
=======
                                <div class="form-group mt-3">
                                    <label>Tanggal Pengambilan</label>
                                    <input type="date" class="form-control" name="tanggal_pengambilan" required>
                                </div>
>>>>>>> eadfbc5 (dsfs)
                                <div class="card-footer text-right">
                                    <button class="btn btn-primary" type="submit">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
    </section>
    <script>
        document.getElementById('add-layanan').addEventListener('click', function() {
            let container = document.getElementById('layanan-container');
            let newGroup = document.createElement('div');
            newGroup.classList.add('layanan-group');
            newGroup.innerHTML = `
                <label>Pilih Layanan</label>
                <select class="custom-select" name="id_layanan[]">
                    <option selected>Pilih Layanan</option>
                    @foreach ($layanans as $layanan)
                    <option value="{{$layanan->id}}" data-harga="{{$layanan->harga_layanan}}">
                        {{$layanan->nama_layanan}} - Rp {{ number_format($layanan->harga_layanan) }}
                    </option>
                    @endforeach
                </select>
                <input type="number" class="form-control mt-2" name="jumlah[]" placeholder="Jumlah" required>
            `;
            container.appendChild(newGroup);
        });
        </script>
@endsection

