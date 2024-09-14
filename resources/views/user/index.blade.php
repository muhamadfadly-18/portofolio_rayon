@extends('layouts.template')

@section('content')
<br>
@if (Session::get('deleted'))
        <div class="alert alert-success">data berhasil di hapus</div>
        
@endif

<form action="{{ route('user.search') }}" method="get">
    <div class="input-group mb-5" style="width: 600px">
        <select name="search_role" class="form-control">
            <option selected disabled hidden>--Pilih Role--</option>
            <option value="admin" {{ request('search_role') == 'admin' ? 'selected' : '' }}>Admin</option>
            <option value="guru" {{ request('search_role') == 'guru' ? 'selected' : '' }}>Guru</option>
        </select>
        <select name="search_name" class="form-control">
            <option selected disabled hidden>--Pilih name--</option>
            <option value="gunar" {{ request('search_name') == 'gunar' ? 'selected' : '' }}>gunar</option>
            <option value="guru" {{ request('search_name') == 'guru' ? 'selected' : '' }}>Guru</option>
        </select>
        <input type="text" name="search_email" class="form-control" placeholder="Cari pembelian...">
        <button type="submit" class="btn btn-primary" style="margin-left: 3px">Cari</button>
        <a href="{{ route('user.index') }}" class="btn btn-secondary" style="margin-left: 3px">Kembali</a>
    </div>
</form>


<div class="d-grid gap-2 d-md-flex justify-content-md-end">
    <a href="{{route('user.create')}}" class="btn btn-primary me-md-2">Tambah User</a>
</div>
<table class="table table-bordered table-striped mt-3">
    <thead>
        <tr class="text-center">
            <th>No</th>
            <th>Nama</th>
            <th>Email</th>
            <th>Role</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @php
        $no = 1;
        @endphp
        @foreach ($user as $item)
        <tr class="text-center">
            <td>{{ $no++ }}</td>
            <td>{{ $item['name'] }}</td>
            <td>{{ $item['email'] }}</td>
            <td>{{ $item['role'] }}</td>
                <td class="d-flex justify-content-center">
                    <a href="{{route('user.edit', $item['id'])}}" class="btn btn-primary me-2">Edit</a>
                    
        </tr>
        @endforeach
    </tbody>
</table>
@endsection

