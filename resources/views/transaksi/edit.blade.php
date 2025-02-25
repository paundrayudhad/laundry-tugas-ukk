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
                            <form class="form-horizontal" method="post" action="{{route('transaksi.update', $transaksi->id)}}">
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                    <label>Nama Penerima</label>
                                    <input type="name" class="form-control" name="nama_penerima" required value="{{$transaksi->nama_penerima}}">
                                </div>
                                <div class="form-group">
                                    <label>Alamat</label>
                                    <textarea type="address" class="form-control" name="alamat" required>{{ $transaksi->alamat }}</textarea>
                                </div>
                                <div class="form-group">
                                    <label>Status</label>
                                    <select class="custom-select" name="status">
                                        <option>{{$transaksi->status}}</option>
                                        <option value="pending">Pending</option>
                                        <option value="proses">Proses</option>
                                        <option value="selesai">Selesai</option>
                                    </select>
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
