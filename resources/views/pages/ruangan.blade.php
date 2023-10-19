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
                    <div class="d-sm-flex align-items-center justify-content-between pt-2 mt-4">
                        <h1 class="h6 mb-0 font-weight-bold" style="color: black">List Ruangan</h1>
                    </div>

                    <div class="d-sm-flex align-items-center justify-content-between pt-2  mb-2">
                        <div class="form-group has-search align-items-center pt-2 mb-2">
                            <span class="fa fa-search form-control-feedback"></span>
                            <input type="text" class="form-control filter border-0" placeholder="Cari Ruangan"
                                style="background-color: #FAFAFA">
                        </div>
                        {{-- <button class="btn btn-primary">Tambah Ruangan</button> --}}
                        <a href="{{ route('tambah_ruangan') }}" class="btn btn-primary">Tambah Ruangan</a>
                    </div>

                    <div class="row">

                        <div class="col">

                            <div class="row">
                                <div class="col">

                                    <div class="card-deck">

                                        <div class="cardContainer">
                                            @foreach ($ruangan->chunk(4) as $chunk)
                                                <div class="card-deck">

                                                    @foreach ($chunk as $item)
                                                        <div class="card card-animation mb-4 card-filter"
                                                            data-string="{{ $item->name }}">
                                                            <img class="card-img-top-custom rounded img-fluid"
                                                                @if ($item->image != null) {{-- src="{{ asset('img/' . $item->image) }}" --}}
                                                                    src="{{ asset('public/img/' . $item->image) }}"
                                                                @else
                                                                    src="{{ asset('img/room-1.jpeg') }}" @endif
                                                                alt="Card image cap">
                                                            <div
                                                                class="card-body card-body-animation card-body card-body-animation-animation">
                                                                <h4 class="h6 font-weight-bold card-title mb-0"
                                                                    style="color: black">{{ $item->name }}
                                                                </h4>
                                                                <p class="card-text">{{ $item->type }}</p>
                                                                <h1 class="h5 font-weight-bold" style="color: #3974FE">
                                                                    Rp{{ number_format($item->price, 0, ',', '.') }}<small
                                                                        class="">/Hari</small>
                                                                </h1>
                                                                <div class="d-sm-flex">
                                                                    <p class="pr-2"><small class="text-muted">9
                                                                            sq.m</small></p>
                                                                    <p class="pr-2"><small
                                                                            class="text-muted">{{ $item->bed }}
                                                                            Kasur</small></p>
                                                                    <p class="pr-2"><small
                                                                            class="text-muted">{{ $item->bathroom }} Km.
                                                                            Mandi</small></p>
                                                                </div>
                                                                <div>
                                                                    <span
                                                                        @php
                                                                    /* check if ruangan booked or not */
                                                                    /* if there any ruangan in booking with status = 'upcoming' that mean is booked */
                                                                    $upcomingBooking = $booking->where('room_id', $item->id)
                                                                        ->where('status', 'upcoming')
                                                                        ->where('isDeleted', 0)
                                                                        ->first();
                                                                    $inhouseBooking =$booking->where('room_id', $item->id)
                                                                        ->where('status', 'inhouse')
                                                                        ->where('isDeleted', 0)
                                                                        ->first();
                                                                    if ($upcomingBooking) {
                                                                        echo 'class = "badge badge-warning"';
                                                                    } else if ($inhouseBooking) {
                                                                        echo 'class = "badge badge-danger"';
                                                                    } else {
                                                                        echo 'class = "badge badge-success"';
                                                                    } @endphp>
                                                                        @php
                                                                            /* check if ruangan booked or not */
                                                                            /* if there any ruangan in booking with status = 'upcoming' that mean is booked */
                                                                            $upcomingBooking = $booking->where('room_id', $item->id)
                                                                                ->where('status', 'upcoming')
                                                                                ->where('isDeleted', 0)
                                                                                ->first();
                                                                            $inhouseBooking = $booking->where('room_id', $item->id)
                                                                                ->where('status', 'inhouse')
                                                                                ->where('isDeleted', 0)
                                                                                ->first();
                                                                            if ($upcomingBooking) {
                                                                                echo 'Booked';
                                                                            } elseif ($inhouseBooking) {
                                                                                echo 'In House';
                                                                            } else {
                                                                                echo 'Available';
                                                                            }
                                                                        @endphp
                                                                    </span>
                                                                </div>
                                                                {{-- <a href="{{ route('ruangan_detail') }}"
                                                                        class="stretched-link"></a> --}}
                                                                {{-- working ruangan detail with $id --}}
                                                                <a href="{{ route('ruangan_detail', $item->id) }}"
                                                                    class="stretched-link"></a>

                                                            </div>
                                                        </div>
                                                    @endforeach

                                                </div>
                                            @endforeach
                                        </div>

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
