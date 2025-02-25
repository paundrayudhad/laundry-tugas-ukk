@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Buat users</h1>
        </div>

        <div class="section-body">

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <form class="form-horizontal" method="post" action="{{route('users.store')}}">
                                @csrf
                                <div class="form-group">
                                    <label>Nama users</label>
                                    <input type="name" class="form-control" name="name" required>
                                </div>
                                <div class="form-group">
                                    <label>E-Mail</label>
                                    <input type="email" class="form-control" name="email" required>
                                </div>
                                <div class="form-group">
                                    <label>Password</label>
                                    <input type="password" class="form-control" name="password" required>
                                </div>
                                <div class="form-group">
                                    <label>Pilih Cabang</label>
                                    <select class="custom-select" name="cabang_id">
                                        <option selected>Pilih Cabang</option>
                                        @foreach ($cabangs as $cabang)
                                        <option value="{{$cabang->id}}">{{$cabang->nama}}</option>
                                        @endforeach
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
