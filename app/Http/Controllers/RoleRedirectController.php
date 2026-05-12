<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RoleRedirectController extends Controller
{
    /**
     * Redirect dashboard berdasarkan role
     */
    public function index()
    {
        /*
        |--------------------------------------------------------------------------
        | Ambil role user
        |--------------------------------------------------------------------------
        */

        $role = auth()->user()->role;

        /*
        |--------------------------------------------------------------------------
        | Redirect berdasarkan role
        |--------------------------------------------------------------------------
        */

        if ($role === 'admin') {

            return redirect('/admin/dashboard');

        }

        if ($role === 'kader') {

            return redirect('/kader/dashboard');

        }

        if ($role === 'ibu') {

            return redirect('/ibu/dashboard');

        }

        /*
        |--------------------------------------------------------------------------
        | Default forbidden
        |--------------------------------------------------------------------------
        */

        abort(403, 'ROLE TIDAK VALID');
    }
}