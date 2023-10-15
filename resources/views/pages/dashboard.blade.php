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
                    <div class="d-sm-flex align-items-center justify-content-between pt-2 mt-4 mb-2">
                        <h1 class="h6 mb-0 font-weight-bold" style="color: black">Dashboard Utama</h1>
                    </div>

                    <div class="row">
                        <div class="col-xl-9">

                            <div class="row">
                                <div class="col d-flex">
                                    <div class="card border-1 mb-4" style="width: 100%; background-color: #FAFAFA">
                                        <div class="card-body">
                                            <p class="font-weight-bold" style="opacity: 75%">Total Ruangan</p>
                                            <h1 class="h3 font-weight-bold" style="color: black">{{ $total_ruangan }}</h5>
                                                <p class="" style="opacity: 75%"><span>terakhir diupdate</span> <span
                                                        style="color: black">
                                                        @if (isset($ruangan_last_update->created_at))
                                                            @if ($ruangan_last_update->created_at->format('m/d/Y') == date('m/d/Y'))
                                                                Hari Ini
                                                            @else
                                                                {{ $ruangan_last_update->created_at->format('m/d/Y') }}
                                                            @endif
                                                        @else
                                                            -
                                                        @endif
                                                    </span>
                                                </p>
                                        </div>

                                        {{-- <div class="card-footer flex-row align-items-center text-center">
                                            this is card footer
                                        </div> --}}
                                    </div>
                                </div>

                                <div class="col d-flex">
                                    <div class="card border-1 mb-4" style="width: 100%; background-color: #FAFAFA">
                                        <div class="card-body">
                                            <p class="font-weight-bold" style="opacity: 75%">Ruangan Dipesan Minggu Ini</p>
                                            <h1 class="h3 font-weight-bold" style="color: black">{{ $total_booking }}</h1>
                                            <p class="" {{-- style="opacity: 75%; color: #F0382C" --}}
                                                @if ($added_booking_from_last_week > 0) style="opacity: 75%; color: #2FB364"
                                                @else
                                                    style="opacity: 75%; color: #F0382C" @endif>
                                                {{-- <i class="fa-solid fa-arrow-trend-down"></i>  --}}
                                                @if ($added_booking_from_last_week > 0)
                                                    <i class="fa-solid fa-arrow-trend-up"></i>
                                                @else
                                                    <i class="fa-solid fa-arrow-trend-down"></i>
                                                @endif
                                                <span>{{ $added_booking_from_last_week }}</span> <span
                                                    style="color: black">dari minggu lalu</span>
                                            </p>
                                        </div>

                                        {{-- <div class="card-footer flex-row align-items-center text-center">
                                            this is card footer
                                        </div> --}}
                                    </div>
                                </div>

                                <div class="col d-flex">
                                    <div class="card border-1 mb-4" style="width: 100%; background-color: #FAFAFA">
                                        <div class="card-body">
                                            <p class="font-weight-bold" style="opacity: 75%">Pelanggan Minggu Ini</p>
                                            <h1 class="h3 font-weight-bold" style="color: black">{{ $total_pelanggan }}</h5>
                                                <p class="" {{-- style="opacity: 75%; color: #F0382C" --}}
                                                    @if ($added_pelanggan_from_last_week > 0) style="opacity: 75%; color: #2FB364"
                                                @else
                                                    style="opacity: 75%; color: #F0382C" @endif>
                                                    {{-- <i class="fa-solid fa-arrow-trend-down"></i>  --}}
                                                    @if ($added_pelanggan_from_last_week > 0)
                                                        <i class="fa-solid fa-arrow-trend-up"></i>
                                                    @else
                                                        <i class="fa-solid fa-arrow-trend-down"></i>
                                                    @endif
                                                    <span>{{ $added_pelanggan_from_last_week }}</span> <span
                                                        style="color: black">dari minggu lalu</span>
                                                </p>
                                        </div>

                                        {{-- <div class="card-footer flex-row align-items-center text-center">
                                            this is card footer
                                        </div> --}}
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col">
                                    <div class="card border-1 mb-4" style="width: 100%; background-color: #FAFAFA">
                                        <!-- Card Body -->
                                        <div class="card-body">
                                            <p class="font-weight-bold" style="opacity: 100%; color:black">Statistik
                                                Pelanggan</p>
                                            <div class="chart-area">
                                                <canvas id="myAreaChart"></canvas>
                                            </div>
                                        </div>
                                        {{-- <!-- Card Footer -->
                                        <div class="card-footer flex-row align-items-center text-center">
                                            <a href="#">Lihat Semua</a>
                                        </div> --}}
                                    </div>
                                </div>
                            </div>

                            {{-- Sub Title --}}
                            <div class="d-sm-flex align-items-center justify-content-between mt-2 mb-3">
                                <h1 class="h6 mb-0 font-weight-bold" style="color: black">Ruangan yang Baru ditambahkan</h1>
                            </div>

                            <div class="row">
                                <div class="col">

                                    <div class="card-deck">
                                        {{-- <div class="card mb-4 border-0">
                                            <img class="card-img-top rounded img-fluid"
                                                src="{{ asset('/img/room-1.jpeg') }}" alt="Card image cap">
                                            <div class="card-body card-body-animation px-0">
                                                <h4 class="h6 font-weight-bold card-title mb-0" style="color: black">No. 101
                                                </h4>
                                                <p class="card-text">Kamar Besar Lt. 2</p>
                                                <h1 class="h5 font-weight-bold" style="color: #3974FE">800rb / bln</h5>
                                                    <div class="d-sm-flex">
                                                        <p class="pr-2"><small class="text-muted">9 sq.m</small></p>
                                                        <p class="pr-2"><small class="text-muted">3 Kasur</small></p>
                                                        <p class="pr-2"><small class="text-muted">1 Km. Mandi</small></p>
                                                    </div>
                                                    <a href="#" class="stretched-link"></a>
                                            </div>
                                        </div> --}}

                                        @foreach ($ruangan_new as $item)
                                            <div class="card mb-4 border-0 card-filter">
                                                <img class="card-img-top-custom rounded img-fluid"
                                                    @if ($item->image != null) src="{{ asset('img/' . $item->image) }}"
                                                @else
                                                    src="{{ asset('img/room-1.jpeg') }}" @endif
                                                    alt="Card image cap">
                                                <div class="card-body card-body-animation px-0">
                                                    <h4 class="h6 font-weight-bold card-title mb-0" style="color: black">
                                                        {{ $item->name }}</h4>
                                                    <p class="card-text">{{ $item->description }}</p>
                                                    <h1 class="h5 font-weight-bold" style="color: #3974FE">
                                                        {{ $item->price }}rb / bln</h5>
                                                        <div class="d-sm-flex">
                                                            <p class="pr-2"><small class="text-muted">{{ $item->area }}
                                                                    sq.m</small></p>
                                                            <p class="pr-2"><small class="text-muted">{{ $item->bed }}
                                                                    Kasur</small></p>
                                                            <p class="pr-2"><small
                                                                    class="text-muted">{{ $item->bathroom }}
                                                                    Km. Mandi</small></p>
                                                        </div>
                                                        <a href="{{ route('ruangan_detail', $item->id) }}"
                                                            class="stretched-link"></a>
                                                </div>
                                            </div>
                                        @endforeach

                                        @if (count($ruangan_new) == 0)
                                            <div class="card mb-4 border-0">
                                                <div class="card-body card-body-animation px-0">
                                                    <p class="card-text">Belum ada ruangan yang ditambahkan</p>
                                                </div>
                                            </div>
                                        @endif
                                    </div>

                                </div>
                            </div>

                        </div>

                        <div class="col">

                            <div class="row">
                                <div class="col d-flex">
                                    <div class="card border-1 mb-4" style="width: 100%; background-color: #FAFAFA;">
                                        <div class="card-body">
                                            <div class="row">
                                                {{-- img hotel profile --}}
                                                <div class="col-auto">
                                                    <img @if ($hotels->image != null) src="{{ asset('img/' . $hotels->image) }}"
                                                @else
                                                    src="{{ asset('img/room-1.jpeg') }}" @endif
                                                        alt="" class="img-fluid rounded"
                                                        style="width: 60px; height: 60px; object-fit: cover !important;">
                                                </div>
                                                <div class="col mb-2">
                                                    <h1 class="h4 font-weight-bold mb-1" style="color: black">
                                                        {{ $hotels->name }}

                                                    </h1>
                                                    <p class="font-weight-bold" style="opacity: 75%"">
                                                        {{ $hotels->address }}
                                                    </p>
                                                </div>

                                            </div>
                                            <div class="row">
                                                <div class="col align-item-center text-center">
                                                    <h1 class="h5 font-weight-bold" style="color: black">
                                                        {{ /* $total_booking_all */
                                                            /* bedakan ribu, juta dan miliar */
                                                            $total_booking_all > 999999999
                                                                ? round($total_booking_all / 1000000000, 2) . 'M'
                                                                : ($total_booking_all > 999999
                                                                    ? round($total_booking_all / 1000000, 2) . 'M'
                                                                    : ($total_booking_all > 999
                                                                        ? round($total_booking_all / 1000, 2) . 'K'
                                                                        : $total_booking_all)) }}
                                                        </h5>
                                                        <p class="font-weight-bold" style="opacity: 75%; font-size: 10pt">
                                                            Pengunjung</p>
                                                </div>
                                                <div class="col align-item-center text-center">
                                                    <h1 class="h5 font-weight-bold" style="color: black">
                                                        {{ /* $total_transaksi  */
                                                            /* bedakan ribu, juta, dan miliar */
                                                            $total_transaksi > 999999999
                                                                ? round($total_transaksi / 1000000000, 2) . 'M'
                                                                : ($total_transaksi > 999999
                                                                    ? round($total_transaksi / 1000000, 2) . 'M'
                                                                    : ($total_transaksi > 999
                                                                        ? round($total_transaksi / 1000, 2) . 'K'
                                                                        : $total_transaksi)) }}
                                                        </h5>
                                                        <p class="font-weight-bold" style="opacity: 75%; font-size: 10pt">
                                                            Penghasilan</p>
                                                </div>
                                                <div class="col align-item-center text-center">
                                                    <h1 class="h5 font-weight-bold" style="color: black">
                                                        {{ $total_hari }}d</h5>
                                                        <p class="font-weight-bold" style="opacity: 75%; font-size: 10pt">
                                                            Lama Buka</p>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <a href="{{ route('hotel_detail', $hotels->id) }}"
                                                    class="btn btn-primary btn-block mx-2">Edit Informasi
                                                    Hotel</a>
                                            </div>
                                        </div>

                                        {{-- <div class="card-footer flex-row align-items-center text-center">
                                            this is card footer
                                        </div> --}}
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col d-flex">
                                    <div class="card border-1 mb-4" style="width: 100%; background-color: #FAFAFA">
                                        <div class="card-body">
                                            <p class="font-weight-bold" style="opacity: 75%">Pelanggan Aktif</p>
                                            <div class="table-responsive">

                                                <table class="table table-hover table-borderless" id="dataTable"
                                                    width="100%" cellspacing="0" style="">
                                                    {{-- <thead>
                                                    <tr>
                                                        <th>Data</th>
                                                        <th>Data</th>
                                                        <th>Data</th>
                                                    </tr>
                                                </thead> --}}
                                                    <tbody>
                                                        @foreach ($pelanggan_active as $item)
                                                            <tr>
                                                                <td>
                                                                    <img class="avatar rounded-circle"
                                                                        src="{{ asset('img/item-sample2.png') }}"
                                                                        alt="" style="width:32px; height:32px">
                                                                </td>
                                                                <td>
                                                                    <div class="col">
                                                                        <div class="row">
                                                                            <h1 class="h6 font-weight-bold mb-0"
                                                                                style="color: black">{{ $item->name }}
                                                                            </h1>
                                                                        </div>
                                                                        <div class="row ">
                                                                            <p class="font-weight-bold"
                                                                                style="opacity: 75%; font-size: 10pt">
                                                                                {{ $item->nohp }}</p>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                                <td class="text-right pr-3">
                                                                    <a class="link-info"
                                                                        href="{{ route('pelanggan_detail', $item->id) }}"><i
                                                                            class="fa-solid fa-chevron-right"></i></a>
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                        @if (count($pelanggan_active) == 0)
                                                            <tr>
                                                                <td colspan="3" class="text-center">
                                                                    <p class="font-weight-bold"
                                                                        style="opacity: 75%; font-size: 10pt">
                                                                        Belum ada pelanggan aktif</p>
                                                                </td>
                                                            </tr>
                                                        @endif
                                                    </tbody>
                                                </table>

                                            </div>
                                        </div>

                                        {{-- <div class="card-footer flex-row align-items-center text-center">
                                            this is card footer
                                        </div> --}}
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
