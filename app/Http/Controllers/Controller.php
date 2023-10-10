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
            'title' => "dashboard",
        ]);
    }

    public function ruangan()
    {

        return view('pages/ruangan', [
            'title' => "ruangan",
        ]);
    }

    public function pelanggan()
    {

        return view('pages/pelanggan', [
            'title' => "pelanggan",
        ]);
    }

    public function booking()
    {

        return view('pages/booking', [
            'title' => "booking",
        ]);
    }

    public function transaksi()
    {

        return view('pages/transaksi', [
            'title' => "transaksi",
        ]);
    }

    public function ruangan_detail()
    {

        return view('pages/ruangan/ruangan_detail', [
            'title' => "ruangan_detail",
        ]);
    }
}
