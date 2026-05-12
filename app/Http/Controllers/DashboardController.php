<?php

namespace App\Http\Controllers;

use App\Models\Child;
use App\Models\Mother;
use App\Models\GrowthRecord;

class DashboardController extends Controller
{
    public function index()
    {
        /*
        |--------------------------------------------------------------------------
        | Statistik
        |--------------------------------------------------------------------------
        */

        $totalChildren = Child::count();

        $totalMothers = Mother::count();

        $totalGrowthRecords = GrowthRecord::count();

        /*
        |--------------------------------------------------------------------------
        | Chart Data
        |--------------------------------------------------------------------------
        */

        $records = GrowthRecord::orderBy('measurement_date')
            ->get();

        $labels = [];

        $weights = [];

        foreach ($records as $record) {

            $labels[] = $record->measurement_date;

            $weights[] = (float) $record->weight;
        }

        return view('dashboard', compact(

            'totalChildren',
            'totalMothers',
            'totalGrowthRecords',
            'labels',
            'weights'

        ));
    }
}