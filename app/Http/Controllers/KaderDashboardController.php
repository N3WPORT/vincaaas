<?php

namespace App\Http\Controllers;

use App\Models\Child;
use App\Models\GrowthRecord;

class KaderDashboardController extends Controller
{
    public function index()
    {
        $children = Child::count();

        $growthRecords = GrowthRecord::count();

        return view('kader.dashboard', compact(

            'children',
            'growthRecords'

        ));
    }
}