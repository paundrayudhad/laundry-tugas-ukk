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
                    <th scope="col">#</th>
                    <th scope="col">Layanan</th>
                    <th scope="col">Nama Penerima</th>
                    <th scope="col">Alamat</th>
                    <th scope="col">Berat</th>
                    <th scope="col">Total Harga</th>
                    <th scope="col">Status</th>
                    <th scope="col">Tanggal Dibuat</th>
                    <th scope="col">Tanggal Diupdate</th>
                    <th scope="col">Cabang</th>
                    <th scope="col">Aksi</th>
                  </tr>
                </thead>
                <tbody>
                    @php
                    $no = 1
                    @endphp
                    @foreach ($datas as $data)
                    <tr>
                        <th scope="row">{{$no++}}</th>
                        <td>{{$data->layanan->nama_layanan}}</td>
                        <td>{{$data->nama_penerima}}</td>
                        <td>{{$data->alamat}}</td>
                        <td>{{$data->jumlah}}</td> 
                        <td>{{$data->total_harga}}</td>   
                        <td>{{$data->status}}</td>
                        <td>{{$data->created_at}}</td> 
                        <td>{{$data->updated_at}}</td>  
                        <td>{{$data->cabang->nama}}</td> 
                        <td>
                            <a class="btn btn-warning text-white mr-1" href="{{route('transaksi.edit', $data->id)}}">Edit</a>
                            <form action="{{route('transaksi.destroy', $data->id)}}" method="post" onsubmit="return confirm('apakah anda ingin menghapus?')">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger" type="submit">Delete</button>
                            </form>
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
