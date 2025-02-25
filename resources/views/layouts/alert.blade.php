@if (session('success'))
<div class="alert alert-success">
    <div class="alert-title">Success</div>
    {{ session('success') }}  
</div>
@endif {{-- Menampilkan pesan error jika ada --}}
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif