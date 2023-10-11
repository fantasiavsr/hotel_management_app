<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

use App\Models\ruangan;
use PHPUnit\Event\Code\Test;

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

    public function ruangan_detail_update(Request $request)
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
        $flight = ruangan::findOrFail(request('id'));

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

        $request->validate([
            'image' => 'required|image|max:5000',
        ]);

        $fileName = $request->image->getClientOriginalName();
        $request->image->move(public_path('img'), $fileName);
        /* $request->image->move('img', $fileName); // 'img' is the folder name in public folder */

        $flight->image = $fileName;

        $flight->save();

        return redirect()->route('ruangan');
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

        /* check if image empty change to room-7.jpeg */

        if (request('image') == null) {
            $image = 'room-7.jpeg';
            $flight->image = $image;
        } else {

            $request->validate([
                'image' => 'required|image|max:5000',
            ]);

            $fileName = $request->image->getClientOriginalName();
            $request->image->move(public_path('img'), $fileName);
            /* $request->image->move('img', $fileName); // 'img' is the folder name in public folder */
            $flight->image = $fileName;
        }

        $flight->save();

        return redirect()->route('ruangan');
    }
}
