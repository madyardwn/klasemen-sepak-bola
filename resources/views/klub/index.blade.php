@extends('layout')

@section('content')
    <h1>Daftar Klub</h1>
    <div class="d-flex justify-content-between align-items-center mb-3">
        <form action="{{ route('klub.store') }}" method="post">
            @csrf
            <div class="row">
                <div class="col-4">
                    <div class="d-flex">
                        <label for="name" class="me-2 mt-2">Nama:</label>
                        <input type="text" class="form-control" placeholder="Nama Klub" name="name">
                    </div>
                    @error('name')
                        <div class="w-100">
                            <p class="text-danger mb-0 small">* {{ $message }}</p>
                        </div>
                    @enderror
                </div>
                <div class="col-4">
                    <div class="d-flex">
                        <label for="city" class="me-2 mt-2">Kota:</label>
                        <input type="text" class="form-control" placeholder="Asal Kota Club" name="city">
                    </div>
                    @error('city')
                        <div class="w-100">
                            <p class="text-danger mb-0 small">* {{ $message }}</p>
                        </div>
                    @enderror
                </div>
                <div class="col-4">
                    <button type="submit" class="btn btn-primary">Tambah Klub</button>
                </div>
            </div>
        </form>
    </div>

    <table class="table table-hover table-striped mt-4">
        <thead class="table-dark">
            <tr class="d-flex text-center">
                <th class="col-1 text-center">No</th>
                <th class="col-7">Klub</th>
                <th class="col-2 text-center">Kota</th>
                <th class="col-2" text-center>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($klubs as $index => $klub)
                <tr class="d-flex">
                    <td class="col-1 text-center">{{ $index + 1 }}</td>
                    <td class="col-7">{{ $klub->name }}</td>
                    <td class="col-2">{{ $klub->city }}</td>
                    <td class="col-2 text-center">
                        <button type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal"
                            data-bs-target="#klubModal" data-id="{{ $klub->id }}">
                            Edit
                        </button>
                        <form action="{{ route('klub.destroy', $klub->id) }}" method="post"
                            class="d-inline swal_confirm_delete">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    @include('klub._edit')
@endsection
