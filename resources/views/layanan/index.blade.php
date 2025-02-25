@extends('layouts.app')

@section('content')
<section class="section">
    <div class="section-header">
      <h1>Kelola layanan</h1>
    </div>

    <div class="section-body">

      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <a href="{{route('layanan.create')}}" class="btn btn-primary">Buat layanan</a>
            </div>
            <div class="card-body">
              <table class="table">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nama layanan</th>
                    <th scope="col">Harga Layanan</th>
                    <th scope="col">Aksi</th>
                  </tr>
                </thead>
                <tbody>
                    @php
                    $no = 1
                    @endphp
                    @foreach ($layanans as $layanan)
                    <tr>
                        <th scope="row">{{$no++}}</th>
                        <td>{{$layanan->nama_layanan}}</td>
                        <td>{{$layanan->harga_layanan}}</td>
                        <td>
                            <a class="btn btn-warning text-white mr-1" href="{{route('layanan.edit', $layanan->id)}}">Edit</a>
                            <form action="{{route('layanan.destroy', $layanan->id)}}" method="post" onsubmit="return confirm('apakah anda ingin menghapus?')">
                                @csrf
                                @method('DELETE')
                            <button class="btn btn-danger" type="submit">Delete</button>
                            </form>
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
