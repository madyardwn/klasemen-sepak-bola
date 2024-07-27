@extends('layout')

@section('content')
    <div class="d-flex justify-content-between align-items-center">
        <h1>Klasemen</h1>
    </div>
    <table class="table table-hover table-striped mt-4">
        <thead class="table-dark">
            <tr class="d-flex text-center">
                <th class="col-1 text-center">No</th>
                <th class="col-4">Klub</th>
                <th class="col-1 text-center">Ma</th>
                <th class="col-1 text-center">Me</th>
                <th class="col-1 text-center">S</th>
                <th class="col-1 text-center">K</th>
                <th class="col-1 text-center">GM</th>
                <th class="col-1 text-center">GK</th>
                <th class="col-1 text-center">Point</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($klubs as $index => $klub)
                <tr class="d-flex">
                    <td class="col-1 text-center">{{ $index + 1 }}</td>
                    <td class="col-4">{{ $klub->name }}</td>
                    <td class="col-1 text-center">{{ $klub->matches_played }}</td>
                    <td class="col-1 text-center">{{ $klub->wins }}</td>
                    <td class="col-1 text-center">{{ $klub->draws }}</td>
                    <td class="col-1 text-center">{{ $klub->losses }}</td>
                    <td class="col-1 text-center">{{ $klub->goals_for }}</td>
                    <td class="col-1 text-center">{{ $klub->goals_against }}</td>
                    <td class="col-1 text-center">{{ $klub->points }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
