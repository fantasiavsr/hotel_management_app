<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

use App\Models\ruangan;
use App\Models\hotels;
use App\Models\pelanggan;
use App\Models\booking;
use App\Models\transaksi;
use PHPUnit\Event\Code\Test;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function dashboard()
    {
        $hotels = hotels::where('user_id', Auth::user()->id)->first();

        /* chekc if hotels not found */
        if ($hotels == null) {
            $hotels = hotels::where('user_id', 2)->first();
        }

        /* dd($hotels) ; */
        /* dd($hotels->name) ; */

        /* total ruangan where */
        $total_ruangan = ruangan::where('user_id', Auth::user()->id)->where('isDeleted', 0)->count();
        /* terakhir kali kapan ruangan ditambahkan */
        $ruangan_last_update = ruangan::where('user_id', Auth::user()->id)->where('isDeleted', 0)->orderBy('created_at', 'desc')->first();
        /* total booking minggu ini where */
        $total_booking = booking::where('user_id', Auth::user()->id)->where('isDeleted', 0)->whereBetween('created_at', [now()->startOfWeek(), now()->endOfWeek()])->count();
        /* perhitungan tambah berapa booking minggu ini dari minggu lalu */
        $added_booking_from_last_week = booking::where('user_id', Auth::user()->id)->where('isDeleted', 0)->whereBetween('created_at', [now()->startOfWeek(), now()->endOfWeek()])->count() - booking::where('user_id', Auth::user()->id)->where('isDeleted', 0)->whereBetween('created_at', [now()->subWeek()->startOfWeek(), now()->subWeek()->endOfWeek()])->count();
        /* total pelanggan */
        $total_pelanggan = pelanggan::where('user_id', Auth::user()->id)->where('isDeleted', 0)->whereBetween('created_at', [now()->startOfWeek(), now()->endOfWeek()])->count();
        /* perhitungan tambah berapa pelanggan minggu ini dari minggu lalu  */
        $added_pelanggan_from_last_week = pelanggan::where('user_id', Auth::user()->id)->where('isDeleted', 0)->whereBetween('created_at', [now()->startOfWeek(), now()->endOfWeek()])->count() - pelanggan::where('user_id', Auth::user()->id)->where('isDeleted', 0)->whereBetween('created_at', [now()->subWeek()->startOfWeek(), now()->subWeek()->endOfWeek()])->count();

        /* total booking */
        /* $total_booking_all = booking::where('user_id', Auth::user()->id)->count(); */
        $total_booking_all = booking::where('user_id', Auth::user()->id)->where('isDeleted', 0)->count();
        /* total price transaksi yang status = "success" */
        $total_transaksi = transaksi::where('user_id', Auth::user()->id)->where('isDeleted', 0)->where('status', 'success')->sum('price');
        /* total berapa hari hotel telah dibuat */
        $total_hari = hotels::where('user_id', Auth::user()->id)->first();
        $total_hari = $total_hari->created_at->diffInDays(now());

        $pelanggan_active = pelanggan::where('user_id', Auth::user()->id)->where('isDeleted', 0)->where('status', 'active')->get();
        /* dd($pelanggan_active); */

        /* data for statistik bulanan pelanggan tahun ini */
        $jan = pelanggan::where('user_id', Auth::user()->id)->where('isDeleted', 0)->whereMonth('created_at', '01')->count();
        $feb = pelanggan::where('user_id', Auth::user()->id)->where('isDeleted', 0)->whereMonth('created_at', '02')->count();
        $mar = pelanggan::where('user_id', Auth::user()->id)->where('isDeleted', 0)->whereMonth('created_at', '03')->count();
        $apr = pelanggan::where('user_id', Auth::user()->id)->where('isDeleted', 0)->whereMonth('created_at', '04')->count();
        $mei = pelanggan::where('user_id', Auth::user()->id)->where('isDeleted', 0)->whereMonth('created_at', '05')->count();
        $jun = pelanggan::where('user_id', Auth::user()->id)->where('isDeleted', 0)->whereMonth('created_at', '06')->count();
        $jul = pelanggan::where('user_id', Auth::user()->id)->where('isDeleted', 0)->whereMonth('created_at', '07')->count();
        $aug = pelanggan::where('user_id', Auth::user()->id)->where('isDeleted', 0)->whereMonth('created_at', '08')->count();
        $sep = pelanggan::where('user_id', Auth::user()->id)->where('isDeleted', 0)->whereMonth('created_at', '09')->count();
        $oct = pelanggan::where('user_id', Auth::user()->id)->where('isDeleted', 0)->whereMonth('created_at', '10')->count();
        $nov = pelanggan::where('user_id', Auth::user()->id)->where('isDeleted', 0)->whereMonth('created_at', '11')->count();
        $dec = pelanggan::where('user_id', Auth::user()->id)->where('isDeleted', 0)->whereMonth('created_at', '12')->count();

        /* raungan yang baru ditambahkan */
        $ruangan_new = ruangan::where('user_id', Auth::user()->id)->where('isDeleted', 0)->orderBy('created_at', 'desc')->take(3)->get();

        return view('pages/dashboard', [
            'title' => "dashboard",
            'hotels' => $hotels,

            'total_ruangan' => $total_ruangan,
            'ruangan_last_update' => $ruangan_last_update,
            'total_booking' => $total_booking,
            'added_booking_from_last_week' => $added_booking_from_last_week,
            'total_pelanggan' => $total_pelanggan,
            'added_pelanggan_from_last_week' => $added_pelanggan_from_last_week,

            'total_booking_all' => $total_booking_all,
            'total_transaksi' => $total_transaksi,
            'total_hari' => $total_hari,

            'pelanggan_active' => $pelanggan_active,

            'jan' => $jan,
            'feb' => $feb,
            'mar' => $mar,
            'apr' => $apr,
            'mei' => $mei,
            'jun' => $jun,
            'jul' => $jul,
            'aug' => $aug,
            'sep' => $sep,
            'oct' => $oct,
            'nov' => $nov,
            'dec' => $dec,

            'ruangan_new' => $ruangan_new,
        ]);
    }

    public function ruangan()
    {

        /* check ruangan where user_id = auth user */
        /* $ruangan = ruangan::where('user_id', Auth::user()->id)->get(); */

        /* check ruangan where user_id = auth user and isDeleted = 0 */
        $ruangan = ruangan::where('user_id', Auth::user()->id)->where('isDeleted', 0)->get();

        /*  dd($ruangan); */

        return view('pages/ruangan', [
            'title' => "ruangan",
            'ruangan' => $ruangan,
        ]);
    }

    public function pelanggan()
    {
        /* $pelanggan = pelanggan::where('user_id', Auth::user()->id)->get(); */
        /* where isDeleted=0 */
        $pelanggan = pelanggan::where('user_id', Auth::user()->id)->where('isDeleted', 0)->get();

        return view('pages/pelanggan', [
            'title' => "pelanggan",
            'pelanggan' => $pelanggan,
        ]);
    }

    public function booking()
    {
        /* $booking = booking::where('user_id', Auth::user()->id)->get(); */

        /* booking where isDeleted=0 */
        $booking = booking::where('user_id', Auth::user()->id)->where('isDeleted', 0)->get();
        $allruangan = ruangan::where('user_id', Auth::user()->id)->get();

        return view('pages/booking', [
            'title' => "booking",
            'booking' => $booking,
            'allruangan' => $allruangan,
        ]);
    }

    public function transaksi()
    {

        /* $transaksi = transaksi::where('user_id', Auth::user()->id)->get(); */

        /* transaksi where isDeleted=0 */
        $transaksi = transaksi::where('user_id', Auth::user()->id)->where('isDeleted', 0)->get();

        return view('pages/transaksi', [
            'title' => "transaksi",
            'transaksi' => $transaksi,
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

        /* check if user update image with hasFile */
        if ($request->hasFile('image')) {

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

    public function hotel_detail($id)
    {

        $hotels = hotels::findOrFail($id);

        return view('pages/hotel/hotel_detail_edit', [
            'title' => "hotel_detail",
            'hotels' => $hotels,
        ]);
    }

    public function hotel_detail_update(Request $request)
    {

        /* dd(request()->all()); */
        $flight = hotels::findOrFail(request('id'));

        $flight->name = request('name');
        $flight->address = request('address');
        $flight->desc = request('desc');

        /* check if user update image */
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

        return redirect()->route('dashboard');
    }

    public function tambah_pelanggan()
    {

        return view('pages/pelanggan/tambah_pelanggan', [
            'title' => "tambah_pelanggan",
        ]);
    }

    public function tambah_pelanggan_store(Request $request)
    {
        /* dd(request()->all()); */

        $flight = new pelanggan();

        $flight->user_id = Auth::user()->id;
        /* $flight->customer_id = $request->customer_id; */
        $flight->name = $request->name;
        $flight->nohp = $request->nohp;
        $flight->nik = $request->nik;
        $flight->address = $request->address;
        $flight->status = $request->status;

        $flight->save();

        return redirect()->route('pelanggan');
    }

    public function pelanggan_detail($id)
    {

        $pelanggan = pelanggan::findOrFail($id);

        return view('pages/pelanggan/pelanggan_detail_edit', [
            'title' => "pelanggan_detail",
            'pelanggan' => $pelanggan,
        ]);
    }

    public function pelanggan_detail_update(Request $request)
    {

        /* dd(request()->all()); */
        $flight = pelanggan::findOrFail(request('id'));

        $flight->name = request('name');
        $flight->nohp = request('nohp');
        $flight->nik = request('nik');
        $flight->address = request('address');
        $flight->status = request('status');

        $flight->save();

        return redirect()->route('pelanggan');
    }

    public function tambah_booking()
    {
        $hotel = hotels::where('user_id', Auth::user()->id)->first();
        /* where isDeleted = 0 */
        $pelanggan  = pelanggan::where('user_id', Auth::user()->id)->where('isDeleted', 0)->get();
        $ruangan  = ruangan::where('user_id', Auth::user()->id)->where('isDeleted', 0)->get();
        return view('pages/booking/tambah_booking', [
            'title' => "tambah_booking",
            'hotel' => $hotel,
            'pelanggan' => $pelanggan,
            'ruangan' => $ruangan,
        ]);
    }

    public function tambah_booking_pelanggan($id)
    {
        $hotel = hotels::where('user_id', Auth::user()->id)->first();
        /* $pelanggan  = pelanggan::where('user_id', Auth::user()->id)->get();
        $ruangan  = ruangan::where('user_id', Auth::user()->id)->get(); */
        /* where isDeleted = 0 */
        $pelanggan  = pelanggan::where('user_id', Auth::user()->id)->where('isDeleted', 0)->get();
        $ruangan  = ruangan::where('user_id', Auth::user()->id)->where('isDeleted', 0)->get();
        $selected_pelanggan = pelanggan::findOrFail($id);
        /* dd($selected_pelanggan); */
        return view('pages/booking/tambah_booking_pelanggan', [
            'title' => "tambah_booking_pelanggan",
            'hotel' => $hotel,
            'pelanggan' => $pelanggan,
            'ruangan' => $ruangan,
            'selected_pelanggan' => $selected_pelanggan,
        ]);
    }

    public function tambah_booking_store(Request $request)
    {
        /* dd(request()->all()); */

        /* convert datepicker to mysql datetime format */
        $checkin = date('Y-m-d', strtotime(request('checkin')));
        $checkout = date('Y-m-d', strtotime(request('checkout')));

        /* dd($checkin); */

        /* if visitor_id not null get name and nohp form user */
        if (request('visitor_id') != null) {
            $visitor = pelanggan::findOrFail(request('visitor_id'));
            $visitor_name = $visitor->name;
            $visitor_nohp = $visitor->nohp;
        } else {
            $visitor_name = request('visitor_name');
            $visitor_nohp = request('visitor_nohp');
        }

        /* dd($visitor_name); */

        $flight = new booking();

        $flight->user_id = Auth::user()->id;
        $flight->visitor_id = request('visitor_id');
        $flight->hotel_id = request('hotel_id');
        $flight->room_id = request('room_id');
        $flight->visitor_name = $visitor_name;
        $flight->visitor_nohp = $visitor_nohp;
        $flight->total_visitor = request('total_visitor');
        $flight->checkin = $checkin;
        $flight->checkout = $checkout;
        $flight->status = request('status');
        $flight->price = request('price');
        $flight->note = request('note');

        $flight->save();

        return redirect()->route('booking');
    }

    public function booking_detail($id)
    {

        $booking = booking::findOrFail($id);
        $hotel = hotels::where('user_id', Auth::user()->id)->first();
        $pelanggan  = pelanggan::where('user_id', Auth::user()->id)->get();
        $ruangan  = ruangan::where('user_id', Auth::user()->id)->get();

        return view('pages/booking/booking_detail_edit', [
            'title' => "booking_detail",
            'booking' => $booking,
            'hotel' => $hotel,
            'pelanggan' => $pelanggan,
            'ruangan' => $ruangan,
        ]);
    }

    public function booking_detail_update(Request $request)
    {

        /* dd(request()->all()); */

        /* convert datepicker to mysql datetime format */
        $checkin = date('Y-m-d', strtotime(request('checkin')));
        $checkout = date('Y-m-d', strtotime(request('checkout')));

        /* dd($checkin); */

        /* dd($visitor_name); */

        $flight = booking::findOrFail(request('id'));

        $flight->user_id = Auth::user()->id;
        $flight->visitor_id = request('visitor_id');
        $flight->hotel_id = request('hotel_id');
        $flight->room_id = request('room_id');
        $flight->total_visitor = request('total_visitor');
        $flight->checkin = $checkin;
        $flight->checkout = $checkout;
        $flight->status = request('status');
        $flight->price = request('price');
        $flight->note = request('note');

        $flight->save();

        return redirect()->route('booking');
    }


    public function tambah_transaksi()
    {
        /* $booking = booking::where('user_id', Auth::user()->id)->get(); */

        /* booking where isDeleted=0 */
        $booking = booking::where('user_id', Auth::user()->id)->where('isDeleted', 0)->get();

        return view('pages/transaksi/tambah_transaksi', [
            'title' => "tambah_transaksi",
            'booking' => $booking,
        ]);
    }

    public function tambah_transaksi_store(Request $request)
    {
        /* dd(request()->all()); */

        /* if visitor_id not null get name and nohp form user */
        if (request('booking_id') != null) {
            $booking = booking::findOrFail(request('booking_id'));
            /* dd($booking); */
            $visitor_name = $booking->visitor_name;
            $visitor_nohp = $booking->visitor_nohp;
            /* dd($visitor_name); */
        } else {
            $visitor_name = request('visitor_name');
            $visitor_nohp = request('visitor_nohp');
        }

        /* dd($visitor_name); */

        $flight = new transaksi();

        $flight->user_id = Auth::user()->id;
        $flight->booking_id = request('booking_id');
        $flight->visitor_name = $visitor_name;
        $flight->visitor_nohp = $visitor_nohp;
        $flight->payment = request('payment');

        /* if payment = 'tunai. bank = '-' */
        if (request('payment') == 'tunai') {
            $flight->bank = '-';
        } else {
            $flight->bank = request('bank');
        }

        $flight->price = request('price');
        $flight->status = request('status');

        /*  dd($flight); */

        $flight->save();

        return redirect()->route('transaksi');
    }

    public function transaksi_detail($id)
    {
        $transaksi = transaksi::findOrFail($id);
        $booking = booking::where('user_id', Auth::user()->id)->get();
        $hotel = hotels::where('user_id', Auth::user()->id)->first();
        $pelanggan = pelanggan::where('user_id', Auth::user()->id)->get();
        $ruangan  = ruangan::where('user_id', Auth::user()->id)->get();

        return view('pages/transaksi/transaksi_detail_edit', [
            'title' => "booking_detail",
            'booking' => $booking,
            'hotel' => $hotel,
            'pelanggan' => $pelanggan,
            'ruangan' => $ruangan,
            'transaksi' => $transaksi,
        ]);
    }

    public function transaksi_detail_update(Request $request)
    {

        /* dd(request()->all()); */

        $flight = transaksi::findOrFail(request('id'));

        $flight->user_id = Auth::user()->id;
        $flight->payment = request('payment');
        /* if payment = 'tunai. bank = '-' */
        if (request('payment') == 'tunai') {
            $flight->bank = '-';
        } else {
            $flight->bank = request('bank');
        }
        $flight->price = request('price');
        $flight->status = request('status');

        $flight->save();

        return redirect()->route('transaksi');
    }

    /* delete ruangan */
    public function ruangan_del()
    {

        $ruangan = ruangan::findOrFail(request('id'));

        /* $ruangan->delete(); */

        /* change isDelete value to 1 */
        $ruangan->isDeleted = 1;
        $ruangan->save();

        return redirect()->route('ruangan');

        /* SELECT * FROM `ruangans` WHERE isDeleted = 1
        DELETE FROM `ruangans` WHERE isDeleted = 1 */
    }

    /* delete pelanggan */
    public function pelanggan_del()
    {

        $pelanggan = pelanggan::findOrFail(request('id'));

        /* $pelanggan->delete(); */

        /* change isDelete value to 1 */
        $pelanggan->isDeleted = 1;
        $pelanggan->save();

        return redirect()->route('pelanggan');
    }

    /* delete booking */
    public function booking_del()
    {

        $booking = booking::findOrFail(request('id'));

        /* $booking->delete(); */

        /* change isDelete value to 1 */
        $booking->isDeleted = 1;
        $booking->save();

        return redirect()->route('booking');
    }

    /* delete transaksi */
    public function transaksi_del()
    {

        $transaksi = transaksi::findOrFail(request('id'));

        /* $transaksi->delete(); */

        /* change isDelete value to 1 */
        $transaksi->isDeleted = 1;
        $transaksi->save();

        return redirect()->route('transaksi');
    }

    /* get room price */
    public function getRoomPrice($id)
    {
        $ruangan = ruangan::findOrFail($id);
        /*  dd($ruangan); */
        return response()->json([
            'price' => $ruangan->price,
        ]);
    }

    /* get booking  price */
    public function getBookingPrice($id)
    {
        $booking = booking::findOrFail($id);
        /*  dd($ruangan); */
        return response()->json([
            'price' => $booking->price,
        ]);
    }
}
