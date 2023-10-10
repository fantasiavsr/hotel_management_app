<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function dashboard()
    {

        return view('pages/dashboard', [
            'title' => "Dashboard",
        ]);
    }

    public function ruangan()
    {

        return view('pages/ruangan', [
            'title' => "Ruangan",
        ]);
    }
}
