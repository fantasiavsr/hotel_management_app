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
                                            <h1 class="h3 font-weight-bold" style="color: black">102</h5>
                                                <p class="" style="opacity: 75%"><span>terakhir diupdate</span> <span
                                                        style="color: black">10/9/2023</span></p>
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
                                            <h1 class="h3 font-weight-bold" style="color: black">52</h5>
                                                <p class="" style="opacity: 75%; color: #F0382C"><i
                                                        class="fa-solid fa-arrow-trend-down"></i> <span>10</span> <span
                                                        style="color: black">dari minggu lalu</span></p>
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
                                            <h1 class="h3 font-weight-bold" style="color: black">110</h5>
                                                <p class="" style="opacity: 75%; color: #2FB364"><i
                                                        class="fa-solid fa-arrow-trend-up"></i> <span>17</span> <span
                                                        style="color: black">dari minggu lalu</span></p>
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
                                <h1 class="h6 mb-0 font-weight-bold" style="color: black">Ruangan yang Terakhir Dipesan</h1>
                            </div>

                            <div class="row">
                                <div class="col">

                                    <div class="card-deck">
                                        <div class="card mb-4 border-0">
                                            {{-- <img class="card-img-top rounded img-fluid" src="{{ asset('img/room-1.jpeg') }}"
                                                alt="Card image cap"> --}}
                                            <img class="card-img-top rounded img-fluid" src="{{ asset('storage/img/room-1.jpeg') }}"
                                                alt="Card image cap">
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
                                                    <a href="{{ route('ruangan_detail') }}" class="stretched-link"></a>
                                            </div>
                                        </div>

                                        <div class="card mb-4 border-0">

                                            <img class="card-img-top rounded img-fluid" src="{{ asset('img/room-2.jpeg') }}"
                                                alt="Card image cap">
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
                                                    <a href="{{ route('ruangan_detail') }}" class="stretched-link"></a>
                                            </div>
                                        </div>

                                        <div class="w-100 d-none d-sm-block d-md-none"><!-- wrap every 2 on sm--></div>

                                        <div class="card mb-4 border-0">

                                            <img class="card-img-top rounded img-fluid"
                                                src="{{ asset('img/room-3.jpg') }}" alt="Card image cap">

                                            <div class="card-body card-body-animation px-0">
                                                <h4 class="h6 font-weight-bold card-title mb-0" style="color: black">No.
                                                    101</h4>
                                                <p class="card-text">Kamar Besar Lt. 2</p>
                                                <h1 class="h5 font-weight-bold" style="color: #3974FE">800rb / bln</h5>
                                                    <div class="d-sm-flex">
                                                        <p class="pr-2"><small class="text-muted">9 sq.m</small></p>
                                                        <p class="pr-2"><small class="text-muted">3 Kasur</small></p>
                                                        <p class="pr-2"><small class="text-muted">1 Km. Mandi</small>
                                                        </p>
                                                    </div>
                                                    <a href="{{ route('ruangan_detail') }}" class="stretched-link"></a>
                                            </div>
                                        </div>

                                        <div class="w-100 d-none d-md-block d-lg-none"><!-- wrap every 3 on md--></div>

                                        <div class="card mb-4 border-0">
                                            <img class="card-img-top rounded img-fluid"
                                                src="{{ asset('img/room-5.jpeg') }}" alt="Card image cap">
                                            <div class="card-body card-body-animation px-0">
                                                <h4 class="h6 font-weight-bold card-title mb-0" style="color: black">No.
                                                    101</h4>
                                                <p class="card-text">Kamar Besar Lt. 2</p>
                                                <h1 class="h5 font-weight-bold" style="color: #3974FE">800rb / bln</h5>
                                                    <div class="d-sm-flex">
                                                        <p class="pr-2"><small class="text-muted">9 sq.m</small></p>
                                                        <p class="pr-2"><small class="text-muted">3 Kasur</small></p>
                                                        <p class="pr-2"><small class="text-muted">1 Km. Mandi</small>
                                                        </p>
                                                    </div>
                                                    <a href="{{ route('ruangan_detail') }}" class="stretched-link"></a>
                                            </div>
                                        </div>
                                        <div class="w-100 d-none d-lg-block d-xl-none"><!-- wrap every 4 on lg--></div>
                                        <div class="w-100 d-none d-sm-block d-md-none"><!-- wrap every 2 on sm--></div>
                                        <div class="w-100 d-none d-lg-block d-xl-none"><!-- wrap every 4 on lg--></div>
                                        {{-- <div class="card mb-4 border-0">
                                            <img class="card-img-top img-fluid" src="//placehold.it/500x280"
                                                alt="Card image cap">
                                            <div class="card-body card-body-animation px-0">
                                                <h4 class="h6 font-weight-bold card-title mb-0" style="color: black">No.
                                                    101
                                                </h4>
                                                <p class="card-text">Kamar Besar Lt. 2</p>
                                                <h1 class="h5 font-weight-bold" style="color: #3974FE">800rb / bln</h5>
                                                    <div class="d-sm-flex">
                                                        <p class="pr-2"><small class="text-muted">9 sq.m</small></p>
                                                        <p class="pr-2"><small class="text-muted">3 Kasur</small></p>
                                                        <p class="pr-2"><small class="text-muted">1 Km. Mandi</small>
                                                        </p>
                                                    </div>
                                                    <a href="{{ route('ruangan_detail') }}" class="stretched-link"></a>
                                            </div>
                                        </div>
                                        <div class="w-100 d-none d-xl-block"><!-- wrap every 5 on xl--></div>
                                        <div class="card mb-4 border-0">
                                            <img class="card-img-top img-fluid" src="//placehold.it/500x300"
                                                alt="Card image cap">
                                            <div class="card-body card-body-animation px-0">
                                                <h4 class="h6 font-weight-bold card-title mb-0" style="color: black">No.
                                                    101</h4>
                                                <p class="card-text">Kamar Besar Lt. 2</p>
                                                <h1 class="h5 font-weight-bold" style="color: #3974FE">800rb / bln</h5>
                                                    <div class="d-sm-flex">
                                                        <p class="pr-2"><small class="text-muted">9 sq.m</small></p>
                                                        <p class="pr-2"><small class="text-muted">3 Kasur</small></p>
                                                        <p class="pr-2"><small class="text-muted">1 Km. Mandi</small>
                                                        </p>
                                                    </div>
                                                    <a href="{{ route('ruangan_detail') }}" class="stretched-link"></a>
                                            </div>
                                        </div>
                                        <div class="w-100 d-none d-sm-block d-md-none"><!-- wrap every 2 on sm--></div>
                                        <div class="w-100 d-none d-md-block d-lg-none"><!-- wrap every 3 on md--></div>
                                        <div class="card mb-4 border-0">
                                            <img class="card-img-top img-fluid" src="//placehold.it/500x270"
                                                alt="Card image cap">
                                            <div class=" card-body card-body-animation px-0">
                                                <h4 class="h6 font-weight-bold card-title mb-0" style="color: black">No.
                                                    101
                                                </h4>
                                                <p class="card-text">Kamar Besar Lt. 2</p>
                                                <h1 class="h5 font-weight-bold" style="color: #3974FE">800rb / bln</h5>
                                                    <div class="d-sm-flex">
                                                        <p class="pr-2"><small class="text-muted">9 sq.m</small></p>
                                                        <p class="pr-2"><small class="text-muted">3 Kasur</small></p>
                                                        <p class="pr-2"><small class="text-muted">1 Km. Mandi</small>
                                                        </p>
                                                    </div>
                                                    <a href="{{ route('ruangan_detail') }}" class="stretched-link"></a>
                                            </div>
                                        </div>
                                        <div class="card mb-4 border-0">
                                            <img class="card-img-top img-fluid" src="//placehold.it/500x300"
                                                alt="Card image cap">
                                            <div class=" card-body card-body-animation px-0">
                                                <h4 class="h6 font-weight-bold card-title mb-0" style="color: black">No.
                                                    101
                                                </h4>
                                                <p class="card-text">Kamar Besar Lt. 2</p>
                                                <h1 class="h5 font-weight-bold" style="color: #3974FE">800rb / bln</h5>
                                                    <div class="d-sm-flex">
                                                        <p class="pr-2"><small class="text-muted">9 sq.m</small></p>
                                                        <p class="pr-2"><small class="text-muted">3 Kasur</small></p>
                                                        <p class="pr-2"><small class="text-muted">1 Km. Mandi</small>
                                                        </p>
                                                    </div>
                                                    <a href="{{ route('ruangan_detail') }}" class="stretched-link"></a>
                                            </div>
                                        </div>
                                        <div class="w-100 d-none d-sm-block d-md-none"><!-- wrap every 2 on sm--></div>
                                        <div class="w-100 d-none d-lg-block d-xl-none"><!-- wrap every 4 on lg--></div>
                                        <div class="card mb-4 border-0">
                                            <img class="card-img-top img-fluid" src="//placehold.it/500x270"
                                                alt="Card image cap">
                                            <div class=" card-body card-body-animation px-0">
                                                <h4 class="h6 font-weight-bold card-title mb-0" style="color: black">No.
                                                    101
                                                </h4>
                                                <p class="card-text">Kamar Besar Lt. 2</p>
                                                <h1 class="h5 font-weight-bold" style="color: #3974FE">800rb / bln</h5>
                                                    <div class="d-sm-flex">
                                                        <p class="pr-2"><small class="text-muted">9 sq.m</small></p>
                                                        <p class="pr-2"><small class="text-muted">3 Kasur</small></p>
                                                        <p class="pr-2"><small class="text-muted">1 Km. Mandi</small>
                                                        </p>
                                                    </div>
                                                    <a href="{{ route('ruangan_detail') }}" class="stretched-link"></a>
                                            </div>
                                        </div>
                                        <div class="w-100 d-none d-md-block d-lg-none"><!-- wrap every 3 on md--></div>
                                        <div class="card mb-4 border-0">
                                            <img class="card-img-top img-fluid" src="//placehold.it/500x270"
                                                alt="Card image cap">
                                            <div class=" card-body card-body-animation px-0">
                                                <h4 class="h6 font-weight-bold card-title mb-0" style="color: black">No.
                                                    101
                                                </h4>
                                                <p class="card-text">Kamar Besar Lt. 2</p>
                                                <h1 class="h5 font-weight-bold" style="color: #3974FE">800rb / bln</h5>
                                                    <div class="d-sm-flex">
                                                        <p class="pr-2"><small class="text-muted">9 sq.m</small></p>
                                                        <p class="pr-2"><small class="text-muted">3 Kasur</small></p>
                                                        <p class="pr-2"><small class="text-muted">1 Km. Mandi</small>
                                                        </p>
                                                    </div>
                                                    <a href="{{ route('ruangan_detail') }}" class="stretched-link"></a>
                                            </div>
                                        </div> --}}

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
                                                {{--  <div class="col-3">
                                                    <img src="{{ asset('img/item-sample1.png') }}" alt=""
                                                        class="img-fluid rounded-circle">
                                                </div> --}}
                                                <div class="col mb-2">
                                                    <h1 class="h4 font-weight-bold mb-2" style="color: black">Hotel Saya
                                                        <i class="fa-solid fa-layer-group" style="color: #3974FE"></i>
                                                    </h1>
                                                    <p class="font-weight-bold" style="opacity: 75%">Jl. Menur No 4,
                                                        Malang
                                                    </p>
                                                </div>

                                            </div>
                                            <div class="row">
                                                <div class="col align-item-center text-center">
                                                    <h1 class="h5 font-weight-bold" style="color: black">1.2rb</h5>
                                                        <p class="font-weight-bold" style="opacity: 75%; font-size: 10pt">
                                                            Pengunjung</p>
                                                </div>
                                                <div class="col align-item-center text-center">
                                                    <h1 class="h5 font-weight-bold" style="color: black">28.2jt</h5>
                                                        <p class="font-weight-bold" style="opacity: 75%; font-size: 10pt">
                                                            Penghasilan</p>
                                                </div>
                                                <div class="col align-item-center text-center">
                                                    <h1 class="h5 font-weight-bold" style="color: black">5thn</h5>
                                                        <p class="font-weight-bold" style="opacity: 75%; font-size: 10pt">
                                                            Lama Buka</p>
                                                </div>
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
                                                        {{--  @foreach ($portofolio->slice(0, 3) as $item) --}}
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
                                                                            style="color: black">Alif Rizki</h1>
                                                                    </div>
                                                                    <div class="row ">
                                                                        <p class="font-weight-bold"
                                                                            style="opacity: 75%; font-size: 10pt">
                                                                            Check in 10/9/2023</p>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td class="text-right pr-3">
                                                                <a class="link-info" href="#"><i
                                                                        class="fa-solid fa-chevron-right"></i></a>
                                                            </td>
                                                        </tr>
                                                        {{-- @endforeach --}}

                                                        <tr>
                                                            <td>
                                                                <img class="avatar rounded-circle"
                                                                    src="{{ asset('img/item-sample3.png') }}"
                                                                    alt="" style="width:32px; height:32px">
                                                            </td>
                                                            <td>
                                                                <div class="col">
                                                                    <div class="row">
                                                                        <h1 class="h6 font-weight-bold mb-0"
                                                                            style="color: black">Alif Rizki</h1>
                                                                    </div>
                                                                    <div class="row ">
                                                                        <p class="font-weight-bold"
                                                                            style="opacity: 75%; font-size: 10pt">
                                                                            Check in 10/9/2023</p>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td class="text-right pr-3">
                                                                <a class="link-info" href="#"><i
                                                                        class="fa-solid fa-chevron-right"></i></a>
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <td>
                                                                <img class="avatar rounded-circle"
                                                                    src="{{ asset('img/item-sample1.png') }}"
                                                                    alt="" style="width:32px; height:32px">
                                                            </td>
                                                            <td>
                                                                <div class="col">
                                                                    <div class="row">
                                                                        <h1 class="h6 font-weight-bold mb-0"
                                                                            style="color: black">Alif Rizki</h1>
                                                                    </div>
                                                                    <div class="row ">
                                                                        <p class="font-weight-bold"
                                                                            style="opacity: 75%; font-size: 10pt">
                                                                            Check in 10/9/2023</p>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td class="text-right pr-3">
                                                                <a class="link-info" href="#"><i
                                                                        class="fa-solid fa-chevron-right"></i></a>
                                                            </td>
                                                        </tr>

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
                                                                            style="color: black">Alif Rizki</h1>
                                                                    </div>
                                                                    <div class="row ">
                                                                        <p class="font-weight-bold"
                                                                            style="opacity: 75%; font-size: 10pt">
                                                                            Check in 10/9/2023</p>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td class="text-right pr-3">
                                                                <a class="link-info" href="#"><i
                                                                        class="fa-solid fa-chevron-right"></i></a>
                                                            </td>
                                                        </tr>

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
                                                                            style="color: black">Alif Rizki</h1>
                                                                    </div>
                                                                    <div class="row ">
                                                                        <p class="font-weight-bold"
                                                                            style="opacity: 75%; font-size: 10pt">
                                                                            Check in 10/9/2023</p>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td class="text-right pr-3">
                                                                <a class="link-info" href="#"><i
                                                                        class="fa-solid fa-chevron-right"></i></a>
                                                            </td>
                                                        </tr>

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
                                                                            style="color: black">Alif Rizki</h1>
                                                                    </div>
                                                                    <div class="row ">
                                                                        <p class="font-weight-bold"
                                                                            style="opacity: 75%; font-size: 10pt">
                                                                            Check in 10/9/2023</p>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td class="text-right pr-3">
                                                                <a class="link-info" href="#"><i
                                                                        class="fa-solid fa-chevron-right"></i></a>
                                                            </td>
                                                        </tr>

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
                                                                            style="color: black">Alif Rizki</h1>
                                                                    </div>
                                                                    <div class="row ">
                                                                        <p class="font-weight-bold"
                                                                            style="opacity: 75%; font-size: 10pt">
                                                                            Check in 10/9/2023</p>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td class="text-right pr-3">
                                                                <a class="link-info" href="#"><i
                                                                        class="fa-solid fa-chevron-right"></i></a>
                                                            </td>
                                                        </tr>
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
