<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreKlubRequest;
use App\Http\Requests\UpdateKlubRequest;
use App\Models\Klub;
use Illuminate\Support\Facades\Log;

class KlubController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $klubs = Klub::all();

        return view('klub.index', compact('klubs'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreKlubRequest $request)
    {
        try {
            Klub::create($request->validated());

            return redirect()->route('klub.index')->with('success', 'Klub berhasil ditambahkan');
        } catch (\Exception $e) {
            Log::error($e->getMessage());

            return redirect()->route('klub.index')->with('error', 'Klub gagal ditambahkan');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateKlubRequest $request, Klub $klub)
    {
        try {
            $klub->update($request->validated());

            return response()->json(['success' => 'Klub berhasil diperbarui']);
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return response()->json(['error' => 'Klub gagal diperbarui'], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Klub $klub)
    {
        try {
            $klub->delete();

            return redirect()->route('klub.index')->with('success', 'Klub berhasil dihapus');
        } catch (\Exception $e) {
            Log::error($e->getMessage());

            return redirect()->route('klub.index')->with('error', 'Klub gagal dihapus, karena memiliki pertandingan');
        }
    }
}
