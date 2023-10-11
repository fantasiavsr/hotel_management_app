<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

use App\Models\ruangan;

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

        /* check ruangan where user_id = auth user */
        $ruangan = ruangan::where('user_id', Auth::user()->id)->get();

       /*  dd($ruangan); */

        return view('pages/ruangan', [
            'title' => "ruangan",
            'ruangan' => $ruangan,
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

    /* public function ruangan_detail()
    {

        return view('pages/ruangan/ruangan_detail', [
            'title' => "ruangan_detail",
        ]);
    } */

    public function ruangan_detail($id)
    {

        $ruangan = ruangan::findOrFail($id);

        return view('pages/ruangan/ruangan_detail', [
            'title' => "ruangan_detail",
            'ruangan' => $ruangan,
        ]);
    }

    public function ruangan_detail_edit($id)
    {

        $ruangan = ruangan::findOrFail($id);

        return view('pages/ruangan/ruangan_detail_edit', [
            'title' => "ruangan_detail_edit",
            'ruangan' => $ruangan,
        ]);
    }

    public function ruangan_detail_update($id)
    {

        $ruangan = ruangan::findOrFail($id);

        $ruangan->update([
            'name' => request('name'),
            'type' => request('type'),
            'price' => request('price'),
            'bed' => request('bed'),
            'bathroom' => request('bathroom'),
            'size' => request('size'),
        ]);

        return redirect()->route('ruangan_detail', $ruangan->id);
    }

    public function ruangan_detail_delete($id)
    {

        $ruangan = ruangan::findOrFail($id);

        $ruangan->delete();

        return redirect()->route('ruangan');
    }

    public function tambah_ruangan()
    {

        return view('pages/ruangan/tambah_ruangan', [
            'title' => "tambah_ruangan",
        ]);
    }

    public function tambah_ruangan_store(Request $request)
    {
        /* dd(request()->all()); */

        /* check if desc and propsDetails is empty fill with ' - ' */
        if (request('desc') == null) {
            $desc = '-';
        } else {
            $desc = request('desc');
        }

        if (request('propsDetails') == null) {
            $propsDetails = '-';
        } else {
            $propsDetails = request('propsDetails');
        }

        if (request('image') == null) {
            $image = 'room-7.jpeg';
        } else {
            $image = request('image');
        }

        /* dd($desc); */
        $flight = new ruangan;

        $flight->user_id = Auth::user()->id;
        $flight->name = request('name');
        $flight->type = request('type');
        $flight->price = request('price');
        $flight->bed = request('bed');
        $flight->bathroom = request('bathroom');
        $flight->size = request('size');
        $flight->desc = $desc;
        $flight->utilsRespons = request('utilsRespons');
        $flight->pets = request('pets');
        $flight->propsDetails = $propsDetails;
        $flight->image = $image;

        $flight->save();

        return redirect()->route('ruangan');
    }
}
