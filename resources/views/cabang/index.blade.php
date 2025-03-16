@extends('layouts.app')

@section('content')
<section class="section">
    <div class="section-header">
      <h1>Kelola Cabang</h1>
    </div>

    <div class="section-body">

      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <a href="{{route('cabang.create')}}" class="btn btn-primary">Buat Cabang</a>
            </div>
            <div class="card-body">
              <table class="table">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nama Cabang</th>
                    <th scope="col">Alamat</th>
                    <th scope="col">No HP</th>
                    <th scope="col">Aksi</th>
                  </tr>
                </thead>
                <tbody>
                    @php
                    $no = 1
                    @endphp
                    @foreach ($cabangs as $cabang)
                    <tr>
                        <th scope="row">{{$no++}}</th>
                        <td>{{$cabang->nama}}</td>
                        <td>{{$cabang->alamat}}</td>
                        <td>{{$cabang->no_hp}}</td>
                        <td>
                            <div class="d-flex align-items-center gap-2">
                            <a class="btn btn-warning text-white mr-1" href="{{route('cabang.edit', $cabang->id)}}">Edit</a>
                            <form action="{{route('cabang.destroy', $cabang->id)}}" method="post" onsubmit="return confirm('apakah anda ingin menghapus?')">
                                @csrf
                                @method('DELETE')
                            <button class="btn btn-danger" type="submit">Delete</button>
                            </form>
                            </div>
                        </td>
                      </tr>
                    @endforeach

                </tbody>
              </table>
            </div>
          </div>
      </div>
    </div>
  </section>
@endsection
