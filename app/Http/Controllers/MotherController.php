<?php

namespace App\Http\Controllers;

use App\Models\Mother;
use Illuminate\Http\Request;

class MotherController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        /*
        |--------------------------------------------------------------------------
        | Ambil semua data ibu
        |--------------------------------------------------------------------------
        */

        $mothers = Mother::latest()->get();

        return view('mothers.index', compact('mothers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('mothers.create');
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

            'name' => 'required|max:255',

            'nik' => 'required|unique:mothers,nik',

            'phone' => 'nullable|max:20',

        ]);

        /*
        |--------------------------------------------------------------------------
        | Simpan Data
        |--------------------------------------------------------------------------
        */

        Mother::create([

            'name' => $request->name,

            'nik' => $request->nik,

            'phone' => $request->phone,

        ]);

        /*
        |--------------------------------------------------------------------------
        | Redirect
        |--------------------------------------------------------------------------
        */

        return redirect('/mothers')
            ->with('success', 'Data ibu berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Mother $mother)
    {
        /*
        |--------------------------------------------------------------------------
        | Load relasi anak
        |--------------------------------------------------------------------------
        */

        $mother->load('children');

        return view('mothers.show', compact('mother'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Mother $mother)
    {
        return view('mothers.edit', compact('mother'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Mother $mother)
    {
        /*
        |--------------------------------------------------------------------------
        | Validasi
        |--------------------------------------------------------------------------
        */

        $request->validate([

            'name' => 'required|max:255',

            'nik' => 'required|unique:mothers,nik,' . $mother->id,

            'phone' => 'nullable|max:20',

        ]);

        /*
        |--------------------------------------------------------------------------
        | Update Data
        |--------------------------------------------------------------------------
        */

        $mother->update([

            'name' => $request->name,

            'nik' => $request->nik,

            'phone' => $request->phone,

        ]);

        /*
        |--------------------------------------------------------------------------
        | Redirect
        |--------------------------------------------------------------------------
        */

        return redirect('/mothers')
            ->with('success', 'Data ibu berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Mother $mother)
    {
        /*
        |--------------------------------------------------------------------------
        | Hapus Data
        |--------------------------------------------------------------------------
        */

        $mother->delete();

        /*
        |--------------------------------------------------------------------------
        | Redirect
        |--------------------------------------------------------------------------
        */

        return redirect('/mothers')
            ->with('success', 'Data ibu berhasil dihapus');
    }
}