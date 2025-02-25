@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Edit User</h1>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <form class="form-horizontal" method="POST" action="{{ route('users.update', $user->id) }}">
                                @csrf
                                @method('PUT')

                                <div class="form-group">
                                    <label>Nama User</label>
                                    <input type="text" class="form-control" name="name" required 
                                           value="{{ old('name', $user->name) }}">
                                </div>

                                <div class="form-group">
                                    <label>E-Mail</label>
                                    <input type="email" class="form-control" name="email" required 
                                           value="{{ old('email', $user->email) }}">
                                </div>

                                <div class="form-group">
                                    <label>Password</label>
                                    <input type="password" class="form-control" name="password" 
                                           placeholder="Isi jika ingin update password">
                                </div>

                                <div class="form-group">
                                    <label>Pilih Cabang</label>
                                    <select class="custom-select" name="cabang_id">
                                        <option value="{{ $user->cabang->id }}" selected>
                                            {{ $user->cabang->nama }} (Saat ini)
                                        </option>
                                        @foreach ($cabangs as $cabangz)
                                            @if ($cabangz->id != $user->cabang->id)
                                                <option value="{{ $cabangz->id }}">
                                                    {{ $cabangz->nama }}
                                                </option>
                                            @endif
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
        </div>
    </section>
@endsection
