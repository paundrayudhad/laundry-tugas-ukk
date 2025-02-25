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
                            <form class="form-horizontal" method="post" action="{{route('transaksi.store')}}">
                                @csrf
                                <div class="form-group">
                                    <label>Pilih Layanan</label>
                                    <select class="custom-select" name="id_layanan">
                                        <option selected>Pilih Cabang</option>
                                        @foreach ($layanans as $layanan)
                                        <option value="{{$layanan->id}}">{{$layanan->nama_layanan}} - Rp {{ number_format($layanan->harga_layanan) }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Nama Penerima</label>
                                    <input type="name" class="form-control" name="nama_penerima" required>
                                </div>
                                <div class="form-group">
                                    <label>Alamat</label>
                                    <textarea type="address" class="form-control" name="alamat" required></textarea>
                                </div>
                                <div class="form-group">
                                    <label>Berat</label>
                                    <input type="number" class="form-control" name="jumlah" required>
                                </div>
                                <div class="card-footer text-right">
                                    <button class="btn btn-primary mr-1" type="submit">Submit</button>
                                    <button class="btn btn-secondary" type="reset">Reset</button>
                                  </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
    </section>
@endsection
