<?php

namespace App\Http\Controllers;

use App\Models\Child;
use App\Models\Mother;
use Illuminate\Http\Request;

class ChildController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $children = Child::with('mother')
            ->latest()
            ->get();

        return view('children.index', compact('children'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        /*
        |--------------------------------------------------------------------------
        | Ambil data ibu
        |--------------------------------------------------------------------------
        */

        $mothers = Mother::latest()->get();

        return view('children.create', compact('mothers'));
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

            'mother_id' => 'required|exists:mothers,id',

            'name' => 'required|max:255',

            'gender' => 'required|in:L,P',

            'birth_date' => 'required|date',

            'birth_weight' => 'nullable|numeric',

        ]);

        /*
        |--------------------------------------------------------------------------
        | Simpan Data
        |--------------------------------------------------------------------------
        */

        Child::create([

            'mother_id' => $request->mother_id,

            'name' => $request->name,

            'gender' => $request->gender,

            'birth_date' => $request->birth_date,

            'birth_weight' => $request->birth_weight,

        ]);

        /*
        |--------------------------------------------------------------------------
        | Redirect
        |--------------------------------------------------------------------------
        */

        return redirect('/children')
            ->with('success', 'Data anak berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Child $child)
    {
        return view('children.show', compact('child'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Child $child)
    {
        /*
        |--------------------------------------------------------------------------
        | Ambil data ibu
        |--------------------------------------------------------------------------
        */

        $mothers = Mother::latest()->get();

        return view('children.edit', compact(
            'child',
            'mothers'
        ));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Child $child)
    {
        /*
        |--------------------------------------------------------------------------
        | Validasi
        |--------------------------------------------------------------------------
        */

        $request->validate([

            'mother_id' => 'required|exists:mothers,id',

            'name' => 'required|max:255',

            'gender' => 'required|in:L,P',

            'birth_date' => 'required|date',

            'birth_weight' => 'nullable|numeric',

        ]);

        /*
        |--------------------------------------------------------------------------
        | Update Data
        |--------------------------------------------------------------------------
        */

        $child->update([

            'mother_id' => $request->mother_id,

            'name' => $request->name,

            'gender' => $request->gender,

            'birth_date' => $request->birth_date,

            'birth_weight' => $request->birth_weight,

        ]);

        /*
        |--------------------------------------------------------------------------
        | Redirect
        |--------------------------------------------------------------------------
        */

        return redirect('/children')
            ->with('success', 'Data anak berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Child $child)
    {
        $child->delete();

        return redirect('/children')
            ->with('success', 'Data anak berhasil dihapus');
    }
}