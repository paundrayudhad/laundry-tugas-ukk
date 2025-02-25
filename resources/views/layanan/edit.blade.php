@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Edit layanan</h1>
        </div>

        <div class="section-body">

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <form class="form-horizontal" method="post" action="{{route('layanan.update', $layanan->id)}}">
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                    <label>Nama layanan</label>
                                    <input type="text" class="form-control" name="nama_layanan" required value="{{$layanan->nama_layanan}}">
                                </div>
                                <div class="form-group">
                                    <label>Harga layanan</label>
                                    <input type="number" class="form-control" name="harga_layanan" required value="{{$layanan->harga_layanan}}">
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
