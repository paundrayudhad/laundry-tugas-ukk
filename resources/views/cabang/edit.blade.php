@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Edit Cabang</h1>
        </div>

        <div class="section-body">

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <form class="form-horizontal" method="post" action="{{route('cabang.update', $cabang->id)}}">
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                    <label>Nama Cabang</label>
                                    <input type="text" class="form-control" name="nama" required value="{{$cabang->nama}}">
                                </div>
                                <div class="form-group">
                                    <label>Alamat Cabang</label>
                                    <textarea class="form-control" name="alamat">{{$cabang->alamat}}</textarea>
                                </div>
                                <div class="form-group">
                                    <label>Nomor Telepon Cabang</label>
                                    <input type="number" class="form-control" name="no_hp" value="{{$cabang->no_hp}}" required>
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
