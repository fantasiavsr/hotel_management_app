@extends('layouts.app2')

@section('content')
    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        @include('partials.sidebar')
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column " style="background-color: white;">

            <!-- Main Content -->
            <div id="content">
                <!-- Topbar -->
                @include('partials.topbar')
                <!-- End of Topbar -->

                <div class="container-fluid">

                    {{-- Sub Title --}}
                    <div class="d-sm-flex align-items-center justify-content-between pt-2 mt-4 mb-4">
                        <h1 class="h6 mb-0 font-weight-bold" style="color: black">Aktivitas Check In</h1>
                        {{--  <a href="{{ route('tambah_booking') }}" class="btn btn-primary">Buat Booking Baru</a> --}}
                    </div>

                    {{-- <div class="d-sm-flex align-items-center justify-content-between pt-2  mb-2">
                        <div class="form-group has-search align-items-center pt-2 mb-2">
                            <span class="fa fa-search form-control-feedback"></span>
                            <input type="text" class="form-control filter border-0" placeholder="Cari Ruangan" style="background-color: #FAFAFA">
                        </div>
                        <button class="btn btn-primary">Tambah Ruangan</button>
                    </div> --}}

                    <div class="row">

                        <div class="col">

                            <div class="row">
                                <div class="col">
                                    <div class="table-responsive">

                                        <table class="table table-hover" id="dataTable" width="100%" cellspacing="0"
                                            style="">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>ID Booking</th>
                                                    <th>Nama Pelanggan</th>
                                                    <th>Booking Status</th>
                                                    <th>Booking Ruangan</th>
                                                    <th>Booking Check In</th>
                                                    <th>Checked In At</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @if (isset($checkin))
                                                    @foreach ($checkin as $item)
                                                        <tr>
                                                            <td>{{ /* auto increment number */ $loop->iteration }}
                                                            </td>
                                                            <td>
                                                                {{ /* booking id */ $booking->where('id', $item->booking_id)->first()->id }}
                                                            </td>
                                                            <td>
                                                                <div class="row">
                                                                    <div class="col-auto mb-2">
                                                                        <img class="avatar rounded-circle"
                                                                            src="{{ asset('img/item-sample1.png') }}"
                                                                            alt="" style="width:32px; height:32px">
                                                                    </div>
                                                                    <div class="col">
                                                                        <div class="row">
                                                                            <h1 class="h6 font-weight-bold mb-0"
                                                                                style="color: black">
                                                                                {{ $booking->where('id', $item->booking_id)->first()->visitor_name }}
                                                                            </h1>
                                                                        </div>
                                                                        <div class="row ">
                                                                            <p class=""
                                                                                style="opacity: 75%; font-size: 10pt">
                                                                                {{ $booking->where('id', $item->booking_id)->first()->visitor_nohp }}
                                                                            </p>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                {{ /* booking status */ $booking->where('id', $item->booking_id)->first()->status }}
                                                            </td>
                                                            <td>
                                                                {{ /* booking ruangan */ $ruangan->where('id', $booking->where('id', $item->booking_id)->first()->room_id)->first()->name }}
                                                            </td>
                                                            <td>
                                                                {{ /* booking checkin */ $booking->where('id', $item->booking_id)->first()->checkin }}
                                                            </td>
                                                            <td>
                                                                @if (isset($item->time))
                                                                    <div class="col">
                                                                        <div class="row">
                                                                            <h1 class="h6 mb-0" style="">
                                                                                {{ $item->time }}
                                                                            </h1>
                                                                        </div>
                                                                        <div class="row ">
                                                                            <p class="" style="">

                                                                                @if (isset($item->time))
                                                                                    @php
                                                                                        $checkin = strtotime($booking->where('id', $item->booking_id)->first()->checkin);
                                                                                        $time = strtotime($item->time);

                                                                                        $diff = $time - $checkin;

                                                                                        $hourDiff = $diff / (60 * 60); // Menghitung selisih jam, termasuk tanggal
                                                                                        $hourDiff = $diff / (60 * 60); // Menghitung selisih jam dalam desimal
                                                                                        $hourDiff = round($hourDiff, 1); // Pembulatan selisih jam ke angka desimal dengan 1 angka di belakang koma

                                                                                        if ($hourDiff > 6) {
                                                                                            $badge = 'Terlambat (' . $hourDiff . ' jam)';
                                                                                            $fee = 0.5; // 50% biaya
                                                                                        } elseif ($hourDiff < -6) {
                                                                                            $badge = 'Terlalu awal (' . $hourDiff . ' jam)';
                                                                                            $fee = 0.5; // 50% biaya
                                                                                        } elseif ($hourDiff > 3) {
                                                                                            $badge = 'Terlambat (' . $hourDiff . ' jam)';
                                                                                            $fee = 0.25; // 25% biaya
                                                                                        } elseif ($hourDiff < -3) {
                                                                                            $badge = 'Terlalu Awal (' . $hourDiff . ' jam)';
                                                                                            $fee = 0.25; // 25% biaya
                                                                                        } elseif ($hourDiff > 1) {
                                                                                            $badge = 'Terlambat (' . $hourDiff . ' jam)';
                                                                                            $fee = 0.1; // 10% biaya
                                                                                        } elseif ($hourDiff < -1) {
                                                                                            $badge = 'Terlalu Awal (' . $hourDiff . ' jam)';
                                                                                            $fee = 0.1; // 10% biaya
                                                                                        } else {
                                                                                            $badge = 'Tepat Waktu';
                                                                                            $fee = 0; // 0% biaya (tidak terlambat atau terlalu awal)
                                                                                        }

                                                                                    @endphp

                                                                                    <span
                                                                                        class="badge badge-{{ $badge == 'Tepat Waktu' ? 'success' : 'danger' }}">{{ $badge }}
                                                                                        (Charge {{ $fee * 100 }}%)
                                                                                    </span>
                                                                                @endif

                                                                            </p>
                                                                        </div>
                                                                    </div>
                                                                @else
                                                                    Belum check in
                                                                @endif
                                                            </td>
                                                            <td>
                                                                @if ($booking->where('id', $item->booking_id)->first()->status == 'complete')
                                                                    <button class="btn btn-secondary" disabled>Sudah
                                                                        Checkout</button>
                                                                @else
                                                                    @if (isset($item->time))
                                                                        <a href="{{ route('checkinUndo', $item->id) }}"
                                                                            class="btn btn-warning btn-sm">Undo Check in</a>
                                                                    @else
                                                                        <a href="{{ route('checkinUpdate', $item->id) }}"
                                                                            class="btn btn-success btn-sm">Check In</a>
                                                                    @endif
                                                                @endif
                                                                {{-- <a href="{{ route('booking_detail', $booking->where('id', $item->booking_id)->first()->id) }}"
                                                                class="btn btn-outline-dark btn-sm">Edit
                                                                Booking</a> --}}
                                                                @if (isset($item->time))
                                                                @else
                                                                    <a href="{{ route('booking_detail', $booking->where('id', $item->booking_id)->first()->id) }}"
                                                                        class="btn btn-outline-dark btn-sm">Edit
                                                                        Booking</a>
                                                                @endif
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                @else
                                                    <tr>
                                                        <td colspan="8" class="text-center">
                                                            <h1 class="h4 font-weight-bold mb-0" style="color: black">
                                                                Tidak ada data
                                                            </h1>
                                                        </td>
                                                @endif
                                            </tbody>
                                        </table>

                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>

                </div>
            </div>
            <!-- End of Main Content -->

        </div>
        <!-- End of Content Wrapper -->

        <!-- Scroll to Top Button-->
        @include('partials.scrolltotop')
    </div>
    <!-- End of Page Wrapper -->
@endsection
