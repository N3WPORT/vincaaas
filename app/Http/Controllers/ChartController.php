<?php

namespace App\Http\Controllers;

use App\Models\GrowthRecord;

class ChartController extends Controller
{
    public function index()
    {
        /*
        |--------------------------------------------------------------------------
        | Ambil data pertumbuhan
        |--------------------------------------------------------------------------
        */

        $records = GrowthRecord::orderBy('measurement_date')
            ->get();

        /*
        |--------------------------------------------------------------------------
        | Format Data Chart
        |--------------------------------------------------------------------------
        */

        $labels = [];

        $weights = [];

        $heights = [];

        foreach ($records as $record) {

            $labels[] = $record->measurement_date;

            $weights[] = (float) $record->weight;

            $heights[] = (float) $record->height;
        }

        return view('charts.index', compact(
            'labels',
            'weights',
            'heights'
        ));
    }
}