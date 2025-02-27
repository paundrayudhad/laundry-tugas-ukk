@extends('layouts.app')

@section('content')
<section class="section">
    <div class="section-header">
        <h1>Data Pengguna</h1>
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
                                        <th scope="col">Nama</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Role</th>
                                        <th scope="col">Cabang</th>
                                        <th scope="col">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                    $no = 1
                                    @endphp
                                    @foreach ($users as $user)
                                    <tr>
                                        <th scope="row">{{ $no++ }}</th>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ ucfirst($user->role) }}</td>
                                        <td>{{ $user->cabang->nama ?? '-' }}</td> 
                                        <td>
                                            <a class="btn btn-warning text-white mr-1" href="{{ route('users.edit', $user->id) }}">Edit</a>
                                            <form action="{{ route('users.destroy', $user->id) }}" method="post" onsubmit="return confirm('Apakah Anda ingin menghapus pengguna ini?')" style="display: inline-block;">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-danger" type="submit">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            {{ $users->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
