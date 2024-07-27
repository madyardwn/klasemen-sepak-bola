<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePertandinganRequest;
use App\Models\Klub;
use App\Models\Pertandingan;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class PertandinganController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pertandingans = Pertandingan::with('homeKlub:id,name', 'awayKlub:id,name')->get();

        $klubs = Klub::all();

        return view('pertandingan.index', compact('pertandingans', 'klubs'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePertandinganRequest $request)
    {
        $pertandingan = $request->validated();

        $isUnique = Pertandingan::where('home_klub_id', $pertandingan['home_klub_id'])
            ->where('away_klub_id', $pertandingan['away_klub_id'])
            ->doesntExist();

        if (!$isUnique) {
            return redirect()->route('pertandingan.index')->with('error', 'Pertandingan sudah pernah dilakukan.');
        }

        if ($pertandingan['home_klub_id'] === $pertandingan['away_klub_id']) {
            return redirect()->route('pertandingan.index')->with('error', 'Pertandingan tidak boleh dengan klub yang sama.');
        }

        try {

            DB::transaction(function () use ($pertandingan) {
                Pertandingan::create($pertandingan);

                $homeKlub = Klub::find($pertandingan['home_klub_id']);
                $awayKlub = Klub::find($pertandingan['away_klub_id']);

                $homeKlub->matches_played += 1;
                $awayKlub->matches_played += 1;

                if ($pertandingan['home_klub_score'] > $pertandingan['away_klub_score']) {
                    $homeKlub->points += 3;
                    $homeKlub->wins += 1;
                    $awayKlub->losses += 1;
                } elseif ($pertandingan['home_klub_score'] < $pertandingan['away_klub_score']) {
                    $awayKlub->points += 3;
                    $awayKlub->wins += 1;
                    $homeKlub->losses += 1;
                } else {
                    $homeKlub->points += 1;
                    $awayKlub->points += 1;
                    $homeKlub->draws += 1;
                    $awayKlub->draws += 1;
                }

                $homeKlub->goals_for += $pertandingan['home_klub_score'];
                $homeKlub->goals_against += $pertandingan['away_klub_score'];
                $awayKlub->goals_for += $pertandingan['away_klub_score'];
                $awayKlub->goals_against += $pertandingan['home_klub_score'];

                $homeKlub->save();
                $awayKlub->save();
            });

            return redirect()->route('pertandingan.index')->with('success', 'Pertandingan berhasil disimpan.');
        } catch (\Exception $e) {
            Log::error($e->getMessage());

            return redirect()->route('pertandingan.index')->with('error', $e->getMessage());
        }
    }
}
