<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
/* use carbon */
use Carbon\Carbon;

use App\Models\ruangan;
use App\Models\hotels;
use App\Models\pelanggan;
use App\Models\booking;
use App\Models\transaksi;
use App\Models\checkin;
use App\Models\checkout;
use App\Models\charge;
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

        /* availabe ruangan */
        $availableRuangan = DB::table('ruangans')
            ->where('ruangans.user_id', '=', Auth::user()->id)
            ->where('ruangans.isDeleted', '=', 0)
            ->whereNotIn('ruangans.id', function ($query) {
                $query->select('bookings.room_id')
                    ->from('bookings')
                    ->where(function ($subquery) {
                        $subquery->where('bookings.status', '=', 'inhouse')
                            ->orWhere('bookings.status', '=', 'upcoming');
                    });
            })
            ->get();


        /* booked ruangan */
        $bookedRuangan = DB::table('ruangans')
            ->where('ruangans.user_id', '=', Auth::user()->id)
            ->where('ruangans.isDeleted', '=', 0)
            ->whereIn('ruangans.id', function ($query) {
                $query->select('bookings.room_id')
                    ->from('bookings')
                    ->where('bookings.status', '=', 'upcoming');
            })
            ->get();

        /* inhouse ruangan */
        $inhouseRuangan = DB::table('ruangans')
            ->where('ruangans.user_id', '=', Auth::user()->id)
            ->where('ruangans.isDeleted', '=', 0)
            ->whereIn('ruangans.id', function ($query) {
                $query->select('bookings.room_id')
                    ->from('bookings')
                    ->where('bookings.status', '=', 'inhouse');
            })
            ->get();

        /*  dd($ruangan); */

        $booking = booking::where('user_id', Auth::user()->id)->get();

        return view('pages/ruangan', [
            'title' => "ruangan",
            'availableRuangan' => $availableRuangan,
            'bookedRuangan' => $bookedRuangan,
            'inhouseRuangan' => $inhouseRuangan,
            'ruangan' => $ruangan,
            'booking' => $booking,
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
        /* check join ruangan with table booking with status = 'upcoming' that mean is booked dont show ruangan that booked */
        $ruangan = DB::table('ruangans')
            ->where('ruangans.user_id', '=', Auth::user()->id)
            ->where('ruangans.isDeleted', '=', 0)
            ->whereNotIn('ruangans.id', function ($query) {
                $query->select('bookings.room_id')
                    ->from('bookings')
                    ->where('bookings.isDeleted', '=', 0)
                    ->where('bookings.status', '=', 'inhouse');
            })
            ->get();

        /* dd($ruangan); */

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
        $checkin = date('Y-m-d H:i:s', strtotime(request('checkin')));
        $checkout = date('Y-m-d H:i:s', strtotime(request('checkout')));

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

        $booking = new booking();

        $booking->user_id = Auth::user()->id;
        $booking->visitor_id = request('visitor_id');
        $booking->hotel_id = request('hotel_id');
        $booking->room_id = request('room_id');
        $booking->visitor_name = $visitor_name;
        $booking->visitor_nohp = $visitor_nohp;
        $booking->total_visitor = request('total_visitor');
        $booking->checkin = $checkin;
        $booking->checkout = $checkout;
        $booking->status = request('status');
        $booking->price = request('price');
        $booking->note = request('note');

        $booking->save();

        $checkin = new checkin();

        $checkin->user_id = Auth::user()->id;
        $checkin->booking_id = $booking->id;

        $checkin->save();

        /* dd($checkin); */

        /* $checkout = new checkout();

        $checkout->user_id = Auth::user()->id;
        $checkout->booking_id = $booking->id;

        $checkout->save(); */

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
        $checkin = date('Y-m-d H:i:s', strtotime(request('checkin')));
        $checkout = date('Y-m-d H:i:s', strtotime(request('checkout')));

        /* dd($checkin); */

        /* dd($visitor_name); */

        $flight = booking::findOrFail(request('id'));

        $flight->user_id = Auth::user()->id;
        /* $flight->visitor_id = request('visitor_id'); */
        /* $flight->hotel_id = request('hotel_id'); */
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

        $checkin = checkin::where('booking_id', request('id'))->first();
        if ($checkin != null) {
            $checkin->isDeleted = 1;
            $checkin->save();
        }

        $checkout = checkout::where('booking_id', request('id'))->first();
        if ($checkout != null) {
            $checkout->isDeleted = 1;
            $checkout->save();
        }

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

    public function laporanRuangan()
    {
        $ruangan = ruangan::where('user_id', Auth::user()->id)->where('isDeleted', 0)->get();
        return view('pages/laporan/laporan_ruangan', [
            'title' => "laporan_ruangan",
            'ruangan' => $ruangan,
        ]);
    }

    public function laporanPelanggan()
    {
        $pelanggan = pelanggan::where('user_id', Auth::user()->id)->where('isDeleted', 0)->get();
        return view('pages/laporan/laporan_pelanggan', [
            'title' => "laporan_pelanggan",
            'pelanggan' => $pelanggan,
        ]);
    }

    public function laporanBooking()
    {
        $booking = booking::where('user_id', Auth::user()->id)->where('isDeleted', 0)->get();

        /* booking where status = upcoming */
        $booking_upcoming = booking::where('user_id', Auth::user()->id)->where('isDeleted', 0)->where('status', 'upcoming')->get();

        /* booking where status = inhouse */
        $booking_inhouse = booking::where('user_id', Auth::user()->id)->where('isDeleted', 0)->where('status', 'inhouse')->get();

        /* booking where status = completed */
        $booking_completed = booking::where('user_id', Auth::user()->id)->where('isDeleted', 0)->where('status', 'completed')->get();

        /* booking where status = cancel */
        $booking_cancel = booking::where('user_id', Auth::user()->id)->where('isDeleted', 0)->where('status', 'cancel')->get();

        return view('pages/laporan/laporan_booking', [
            'title' => "laporan_booking",
            'booking' => $booking_upcoming,
            'booking_upcoming' => $booking_upcoming,
            'booking_inhouse' => $booking_inhouse,
            'booking_completed' => $booking_completed,
            'booking_cancel' => $booking_cancel,
        ]);
    }

    public function laporanBookingUpcoming()
    {
        $booking = booking::where('user_id', Auth::user()->id)->where('isDeleted', 0)->where('status', 'upcoming')->get();
        return view('pages/laporan/laporan_booking_upcoming', [
            'title' => "laporan_booking_upcoming",
            'booking' => $booking,
        ]);
    }

    public function laporanBookingInhouse()
    {
        $booking = booking::where('user_id', Auth::user()->id)->where('isDeleted', 0)->where('status', 'inhouse')->get();
        return view('pages/laporan/laporan_booking_inhouse', [
            'title' => "laporan_booking_inhouse",
            'booking' => $booking,
        ]);
    }

    public function laporanBookingCompleted()
    {
        $booking = booking::where('user_id', Auth::user()->id)->where('isDeleted', 0)->where('status', 'completed')->get();
        return view('pages/laporan/laporan_booking_completed', [
            'title' => "laporan_booking_completed",
            'booking' => $booking,
        ]);
    }

    public function laporanBookingCancel()
    {
        $booking = booking::where('user_id', Auth::user()->id)->where('isDeleted', 0)->where('status', 'cancel')->get();
        return view('pages/laporan/laporan_booking_cancel', [
            'title' => "laporan_booking_cancel",
            'booking' => $booking,
        ]);
    }

    public function laporanTransaksi()
    {
        $transaksi = transaksi::where('user_id', Auth::user()->id)->where('isDeleted', 0)->get();
        return view('pages/laporan/laporan_transaksi', [
            'title' => "laporan_transaksi",
            'transaksi' => $transaksi,
        ]);
    }

    public function checkin()
    {
        $checkin = checkin::where('user_id', Auth::user()->id)->where('isDeleted', 0)->get();
        $booking = booking::where('user_id', Auth::user()->id)->where('isDeleted', 0)->get();
        $pelanggan = pelanggan::where('user_id', Auth::user()->id)->where('isDeleted', 0)->get();
        $ruangan = ruangan::where('user_id', Auth::user()->id)->where('isDeleted', 0)->get();

        /* dd($checkin); */
        return view('pages/checkin', [
            'title' => "checkin",
            'booking' => $booking,
            'checkin' => $checkin,
            'pelanggan' => $pelanggan,
            'ruangan' => $ruangan,
        ]);
    }

    public function checkinUpdate($id)
    {
        $checkin = checkin::findOrFail($id);

        /* update checkin datetime to now */
        $checkin->time = Carbon::now();

        /* dd($checkin->time); */

        $checkin->save();

        /* update booking status to 'inhouse' */
        $booking = booking::findOrFail($checkin->booking_id);

        $booking->status = 'inhouse';

        $booking->save();

        $checkout = new checkout();

        $checkout->user_id = Auth::user()->id;
        $checkout->booking_id = $booking->id;

        $checkout->save();

        /* check if early or late checkin */
        $checkin_time =  strtotime($checkin->time);
        $booking_checkin = strtotime($booking->checkin);

        $diff = $checkin_time - $booking_checkin; // Selisih waktu checkin dengan waktu booking

        $hourDiff = $diff / (60 * 60); // Menghitung selisih jam, termasuk tanggal
        $hourDiff = $diff / (60 * 60); // Menghitung selisih jam dalam desimal
        $hourDiff = round($hourDiff, 1); // Pembulatan selisih jam ke angka desimal dengan 1 angka di belakang koma

        if ($hourDiff > 6) {
            $charge_type = 'Check in Terlambat (' . $hourDiff . ' jam)';
            $percentage = 0.5;
        } elseif ($hourDiff < -6) {
            $charge_type = 'Check in Terlalu awal (' . $hourDiff . ' jam)';
            $percentage = 0.5; // 50% biaya
        } elseif ($hourDiff > 3) {
            $charge_type = 'Check in Terlambat (' . $hourDiff . ' jam)';
            $percentage = 0.25; // 25% biaya
        } elseif ($hourDiff < -3) {
            $charge_type = 'Check in Terlalu Awal (' . $hourDiff . ' jam)';
            $percentage = 0.25; // 25% biaya
        } elseif ($hourDiff > 1) {
            $charge_type = 'Check in Terlambat (' . $hourDiff . ' jam)';
            $percentage = 0.1; // 10% biaya
        } elseif ($hourDiff < -1) {
            $charge_type = 'Check in Terlalu Awal (' . $hourDiff . ' jam)';
            $percentage = 0.1; // 10% biaya
        } else {
            $charge_type = 'Check in Tepat Waktu';
            $percentage = 0; // 0% biaya (tidak terlambat atau terlalu awal)
        }

        $charge = new charge();

        $charge->user_id = Auth::user()->id;
        $charge->booking_id = $booking->id;
        $charge->charge_type = $charge_type;
        $charge->percentage = $percentage;

        $charge->save();

        return redirect()->route('checkin');
    }

    public function checkinUndo($id)
    {
        $checkin = checkin::findOrFail($id);

        /* update checkin datetime to null */
        $checkin->time = null;

        /* dd($checkin->time); */

        $checkin->save();

        /* update booking status to 'upcoming' */
        $booking = booking::findOrFail($checkin->booking_id);

        $booking->status = 'upcoming';

        $booking->save();

        $checkout = checkout::findOrFail('booking_id', $booking->id)->first();

        $checkout->delete();

        $charge = charge::findOrFail('booking_id', $booking->id)->first();

        $charge->delete();

        return redirect()->route('checkin');
    }

    public function checkout()
    {
        $checkout = checkout::where('user_id', Auth::user()->id)->where('isDeleted', 0)->get();
        $booking = booking::where('user_id', Auth::user()->id)->where('isDeleted', 0)->get();
        $pelanggan = pelanggan::where('user_id', Auth::user()->id)->where('isDeleted', 0)->get();
        $ruangan = ruangan::where('user_id', Auth::user()->id)->where('isDeleted', 0)->get();

        /* dd($booking); */
        /* dd($checkin); */
        return view('pages/checkout', [
            'title' => "checkout",
            'booking' => $booking,
            'checkout' => $checkout,
            'pelanggan' => $pelanggan,
            'ruangan' => $ruangan,
        ]);
    }

    public function checkoutUpdate($id)
    {
        $checkout = checkout::findOrFail($id);

        /* update checkin datetime to now */
        $checkout->time = Carbon::now();

        /* dd($checkin->time); */

        $checkout->save();

        /* update booking status to 'inhouse' */
        $booking = booking::findOrFail($checkout->booking_id);

        $booking->status = 'complete';

        $booking->save();

        //* check if early or late checkin */
        $checkout_time =  strtotime($checkout->time);
        $booking_checkout = strtotime($booking->checkout);

        $diff = $checkout_time - $booking_checkout; // Selisih waktu checkin dengan waktu booking

        $hourDiff = $diff / (60 * 60); // Menghitung selisih jam, termasuk tanggal
        $hourDiff = $diff / (60 * 60); // Menghitung selisih jam dalam desimal
        $hourDiff = round($hourDiff, 1); // Pembulatan selisih jam ke angka desimal dengan 1 angka di belakang koma

        if ($hourDiff > 6) {
            $charge_type = 'Check Out Terlambat (' . $hourDiff . ' jam)';
            $percentage = 0.5;
        } elseif ($hourDiff > 3) {
            $charge_type = 'Check Out Terlambat (' . $hourDiff . ' jam)';
            $percentage = 0.25; // 25% biaya
        } elseif ($hourDiff > 1) {
            $charge_type = 'Check Out Terlambat (' . $hourDiff . ' jam)';
            $percentage = 0.1; // 10% biaya
        } else {
            $charge_type = 'Check Out Tepat Waktu';
            $percentage = 0; // 0% biaya (tidak terlambat atau terlalu awal)
        }

        $charge = new charge();

        $charge->user_id = Auth::user()->id;
        $charge->booking_id = $booking->id;
        $charge->charge_type = $charge_type;
        $charge->percentage = $percentage;

        $charge->save();



        return redirect()->route('checkout');
    }

    public function checkoutUndo($id)
    {
        $checkout = checkout::findOrFail($id);

        /* update checkin datetime to null */
        $checkout->time = null;

        /* dd($checkin->time); */

        $checkout->save();

        /* update booking status to 'upcoming' */
        $booking = booking::findOrFail($checkout->booking_id);

        $booking->status = 'inhouse';

        $booking->save();

        return redirect()->route('checkout');
    }

    public function getBookingCharge($id)
    {
        $charge = charge::where('booking_id', $id)->get();
        /*  dd($ruangan); */

        return response()->json([
            'charge' => $charge,
        ]);
    }
}
