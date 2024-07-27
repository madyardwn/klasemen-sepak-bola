@extends('layout')

@section('content')
    <h1>Daftar Pertandingan</h1>
    <div class="d-flex justify-content-between align-items-center mb-3">
        <form action="{{ route('pertandingan.store') }}" method="post">
            @csrf
            <div class="row">
                <div class="col-md-3">
                    <label for="home_klub_id" class="me-2 mt-2">Tuan Rumah</label>
                    <select name="home_klub_id" class="form-select">
                        <option value="">Pilih Klub</option>
                        @foreach ($klubs as $klub)
                            <option value="{{ $klub->id }}">{{ $klub->name }}</option>
                        @endforeach
                    </select>
                    @error('home_klub_id')
                        <div class="w-100">
                            <p class="text-danger mb-0 small">* {{ $message }}</p>
                        </div>
                    @enderror
                </div>
                <div class="col-md-3">
                    <label for="away_klub_id" class="me-2 mt-2">Tamu</label>
                    <select name="away_klub_id" class="form-select">
                        <option value="">Pilih Klub</option>
                        @foreach ($klubs as $klub)
                            <option value="{{ $klub->id }}">{{ $klub->name }}</option>
                        @endforeach
                    </select>
                    @error('away_klub_id')
                        <div class="w-100">
                            <p class="text-danger mb-0 small">* {{ $message }}</p>
                        </div>
                    @enderror
                </div>
                <div class="col-md-2">
                    <label for="home_klub_score" class="me-2 mt-2">Skor Tuan Rumah</label>
                    <input type="number" class="form-control" name="home_klub_score">
                    @error('home_klub_score')
                        <div class="w-100">
                            <p class="text-danger mb-0 small">* {{ $message }}</p>
                        </div>
                    @enderror
                </div>
                <div class="col-md-2">
                    <label for="away_klub_score" class="me-2 mt-2">Skor Tamu</label>
                    <input type="number" class="form-control" name="away_klub_score">
                    @error('away_klub_score')
                        <div class="w-100">
                            <p class="text-danger mb-0 small">* {{ $message }}</p>
                        </div>
                    @enderror
                </div>
                <div class="col-md-2 d-flex align-items-end">
                    <button type="submit" class="btn btn-primary">+ Pertandingan</button>
                </div>
            </div>
        </form>
    </div>

    <table class="table table-hover table-striped mt-4">
        <thead class="table-dark">
            <tr class="d-flex text-center">
                <th class="col-1 text-center">No</th>
                <th class="col-5 text-center">Tuan Rumah</th>
                <th class="col-5 text-center">Tamu</th>
                <th class="col-1 text-center">Skor</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pertandingans as $index => $pertandingan)
                <tr class="d-flex">
                    <td class="col-1 text-center">{{ $index + 1 }}</td>
                    <td class="col-5 text-center">{{ $pertandingan->homeKlub->name }}</td>
                    <td class="col-5 text-center">{{ $pertandingan->awayKlub->name }}</td>
                    <td class="col-1 text-center">{{ $pertandingan->home_klub_score }} -
                        {{ $pertandingan->away_klub_score }}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
