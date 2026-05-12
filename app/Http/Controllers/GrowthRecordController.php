<?php

namespace App\Http\Controllers;

use App\Models\Child;
use App\Models\GrowthRecord;
use Illuminate\Http\Request;

class GrowthRecordController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        /*
        |--------------------------------------------------------------------------
        | Ambil data pertumbuhan + relasi anak
        |--------------------------------------------------------------------------
        */

        $records = GrowthRecord::with('child')
            ->latest()
            ->get();

        return view('growth-records.index', compact('records'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        /*
        |--------------------------------------------------------------------------
        | Ambil data anak
        |--------------------------------------------------------------------------
        */

        $children = Child::latest()->get();

        return view('growth-records.create', compact('children'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        /*
        |--------------------------------------------------------------------------
        | Validasi
        |--------------------------------------------------------------------------
        */

        $request->validate([

            'child_id' => 'required|exists:children,id',

            'weight' => 'required|numeric',

            'height' => 'required|numeric',

            'measurement_date' => 'required|date',

        ]);

        /*
        |--------------------------------------------------------------------------
        | Simpan Data
        |--------------------------------------------------------------------------
        */

        GrowthRecord::create([

            'child_id' => $request->child_id,

            'weight' => $request->weight,

            'height' => $request->height,

            'measurement_date' => $request->measurement_date,

            'notes' => $request->notes,

        ]);

        /*
        |--------------------------------------------------------------------------
        | Redirect
        |--------------------------------------------------------------------------
        */

        return redirect('/growth-records')
            ->with('success', 'Data pertumbuhan berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(GrowthRecord $growthRecord)
    {
        return view('growth-records.show', compact('growthRecord'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(GrowthRecord $growthRecord)
    {
        /*
        |--------------------------------------------------------------------------
        | Ambil data anak
        |--------------------------------------------------------------------------
        */

        $children = Child::latest()->get();

        return view('growth-records.edit', compact(
            'growthRecord',
            'children'
        ));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, GrowthRecord $growthRecord)
    {
        /*
        |--------------------------------------------------------------------------
        | Validasi
        |--------------------------------------------------------------------------
        */

        $request->validate([

            'child_id' => 'required|exists:children,id',

            'weight' => 'required|numeric',

            'height' => 'required|numeric',

            'measurement_date' => 'required|date',

        ]);

        /*
        |--------------------------------------------------------------------------
        | Update Data
        |--------------------------------------------------------------------------
        */

        $growthRecord->update([

            'child_id' => $request->child_id,

            'weight' => $request->weight,

            'height' => $request->height,

            'measurement_date' => $request->measurement_date,

            'notes' => $request->notes,

        ]);

        /*
        |--------------------------------------------------------------------------
        | Redirect
        |--------------------------------------------------------------------------
        */

        return redirect('/growth-records')
            ->with('success', 'Data pertumbuhan berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(GrowthRecord $growthRecord)
    {
        /*
        |--------------------------------------------------------------------------
        | Hapus Data
        |--------------------------------------------------------------------------
        */

        $growthRecord->delete();

        /*
        |--------------------------------------------------------------------------
        | Redirect
        |--------------------------------------------------------------------------
        */

        return redirect('/growth-records')
            ->with('success', 'Data pertumbuhan berhasil dihapus');
    }
}