@extends('layouts.app2')

@section('content')
    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        @include('Partials.sidebar')
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column " style="background-color: white;">

            <!-- Main Content -->
            <div id="content">
                <!-- Topbar -->
                @include('Partials.topbar')
                <!-- End of Topbar -->

                <div class="container-fluid">

                    {{-- Sub Title --}}
                    <div class="d-sm-flex align-items-center justify-content-between pt-2 mt-4 mb-4">
                        <h1 class="h6 mb-0 font-weight-bold" style="color: black">Detail Ruangan</h1>
                        <div class="row px-2 py-2">
                            <a href="{{ url()->previous() }}" class="btn btn-outline-dark">Kembali</a>
                            <button class="btn btn-primary mx-2">Edit Detail</button>
                        </div>
                    </div>

                    {{-- <div class="d-sm-flex align-items-center justify-content-between pt-2  mb-2">
                        <div class="form-group has-search align-items-center pt-2 mb-2">
                            <span class="fa fa-search form-control-feedback"></span>
                            <input type="text" class="form-control filter border-0" placeholder="Cari Ruangan" style="background-color: #FAFAFA">
                        </div>
                        <button class="btn btn-primary">Tambah Ruangan</button>
                    </div> --}}

                    <div class="row">

                        <div class="col-sm-6">
                            <div class="row mb-3">
                                <div class="col mb-3">
                                    <img class="card-img-top rounded img-fluid" src="{{ asset('img/room-7.jpeg') }}"
                                        alt="Card image cap">
                                </div>
                                {{-- <div class="col-sm-2 card-deck">

                                    <div class="row mb-3">
                                        <div class="col">
                                            <div class="card border-0">
                                                <img class="card-img" src="{{ asset('img/room-1.jpeg') }}"
                                                    alt="Card image cap">
                                                <div class="card-img-overlay">
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div> --}}
                            </div>

                            <div class="row">
                                <div class="col d-flex">
                                    <div class="card border-1 mb-4" style="width: 100%; background-color: #FAFAFA;">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col">
                                                    <h1 class="h4 font-weight-bold mb-2" style="color: black">No. 101
                                                    </h1>
                                                    <p class="font-weight-bold" style="opacity: 75%">Kamar Besar Lt.2
                                                    </p>
                                                </div>
                                                <div class="col text-right">
                                                    <p class="font-weight-bold mb-0" style="opacity: 75%">Harga
                                                    </p>
                                                    <h1 class="h4 font-weight-bold" style="color: #3974FE">Rp.800.000
                                                    </h1>
                                                </div>
                                            </div>

                                            <div class="row px-2">
                                                <div class="col col-xl-2 align-item-center pt-3 mr-2 mb-3"
                                                    style="background-color: #F0F0F0">
                                                    <h1 class="h5 font-weight-bold" style="color: black">2</h5>
                                                        <p class="font-weight-bold" style="opacity: 75%; font-size: 10pt">
                                                            Kasur</p>
                                                </div>
                                                <div class="col col-xl-2 align-item-center pt-3 mr-2 mb-3"
                                                    style="background-color: #F0F0F0">
                                                    <h1 class="h5 font-weight-bold" style="color: black">1</h5>
                                                        <p class="font-weight-bold" style="opacity: 75%; font-size: 10pt">
                                                            Km. Mandi</p>
                                                </div>
                                                <div class="col col-xl-2 align-item-center pt-3 mb-3"
                                                    style="background-color: #F0F0F0">
                                                    <h1 class="h5 font-weight-bold" style="color: black">3x3</h5>
                                                        <p class="font-weight-bold" style="opacity: 75%; font-size: 10pt">
                                                            Sq.m</p>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col">
                                                    <h1 class="h6 font-weight-bold" style="color: black">Tentang</h5>
                                                        <p>Dengan tempat tidur queen-size yang nyaman, balkon pribadi yang
                                                            menawarkan pemandangan taman yang indah, dan fasilitas modern
                                                            seperti AC, TV LCD 32 inci, serta akses Wi-Fi gratis, Anda akan
                                                            merasa seperti di rumah. Kamar mandi dalam dilengkapi dengan
                                                            fasilitas shower dan perlengkapan mandi gratis. Dengan harga
                                                            yang terjangkau, ruangan ini adalah tempat yang ideal untuk
                                                            tinggal selama kunjungan Anda.</p>
                                                </div>
                                            </div>
                                        </div>

                                        {{-- <div class="card-footer flex-row align-items-center text-center">
                                            this is card footer
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
                                                <div class="col-auto">
                                                    <img src="{{ asset('img/instant_mix.svg') }}" alt=""
                                                        class="img-fluid rounded-circle" style="height: 42px">
                                                </div>
                                                <div class="col ">
                                                    <h1 class="h5 font-weight-bold mb-0" style="color: black">Utilities
                                                    </h1>
                                                    <p class="" style="opacity: 75%">Renter responsible for all
                                                        utilities
                                                    </p>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-auto">
                                                    <img src="{{ asset('img/pets.svg') }}" alt=""
                                                        class="img-fluid rounded-circle" style="height: 42px">
                                                </div>
                                                <div class="col ">
                                                    <h1 class="h5 font-weight-bold mb-0" style="color: black">Pet Policies
                                                    </h1>
                                                    <p class="" style="opacity: 75%">Pets Allowed
                                                    </p>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-auto">
                                                    <img src="{{ asset('img/credit_card.svg') }}" alt=""
                                                        class="img-fluid rounded-circle" style="height: 42px">
                                                </div>
                                                <div class="col ">
                                                    <h1 class="h5 font-weight-bold mb-0" style="color: black">Properties
                                                        details & fees
                                                    </h1>
                                                    <p class="" style="opacity: 75%">Must have 3x the rent in total
                                                        household income (before taxes)
                                                    </p>
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
                                            <p class="font-weight-bold" style="opacity: 75%">Riwayat Pelanggan</p>
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
                                                                <div class="row">
                                                                    <div class="col-auto">
                                                                        <img class="avatar rounded-circle"
                                                                            src="{{ asset('img/item-sample3.png') }}"
                                                                            alt=""
                                                                            style="width:32px; height:32px">
                                                                    </div>
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
                                                                <div class="row">
                                                                    <div class="col-auto">
                                                                        <img class="avatar rounded-circle"
                                                                            src="{{ asset('img/item-sample2.png') }}"
                                                                            alt=""
                                                                            style="width:32px; height:32px">
                                                                    </div>
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
                                                                </div>
                                                            </td>
                                                            <td class="text-right pr-3">
                                                                <a class="link-info" href="#"><i
                                                                        class="fa-solid fa-chevron-right"></i></a>
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <td>
                                                                <div class="row">
                                                                    <div class="col-auto">
                                                                        <img class="avatar rounded-circle"
                                                                            src="{{ asset('img/item-sample1.png') }}"
                                                                            alt=""
                                                                            style="width:32px; height:32px">
                                                                    </div>
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
                                                                </div>
                                                            </td>
                                                            <td class="text-right pr-3">
                                                                <a class="link-info" href="#"><i
                                                                        class="fa-solid fa-chevron-right"></i></a>
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <td>
                                                                <div class="row">
                                                                    <div class="col-auto">
                                                                        <img class="avatar rounded-circle"
                                                                            src="{{ asset('img/item-sample3.png') }}"
                                                                            alt=""
                                                                            style="width:32px; height:32px">
                                                                    </div>
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
        @include('Partials.scrolltotop')
    </div>
    <!-- End of Page Wrapper -->
@endsection
