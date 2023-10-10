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
                     <div class="d-sm-flex align-items-center justify-content-between pt-2 mt-4">
                        <h1 class="h6 mb-0 font-weight-bold" style="color: black">List Ruangan</h1>
                    </div>

                    <div class="d-sm-flex align-items-center justify-content-between pt-2  mb-2">
                        <div class="form-group has-search align-items-center pt-2 mb-2">
                            <span class="fa fa-search form-control-feedback"></span>
                            <input type="text" class="form-control filter border-0" placeholder="Cari Ruangan" style="background-color: #FAFAFA">
                        </div>
                        <button class="btn btn-primary">Tambah Ruangan</button>
                    </div>

                    <div class="row">

                        <div class="col">

                            <div class="row">
                                <div class="col">

                                    <div class="card-deck">
                                        <div class="card card-animation mb-4 card-filter" data-string="No. 101" style="max-width:">
                                            <img class="card-img-top rounded img-fluid" src="{{ asset('img/room-7.jpeg') }}"
                                                alt="Card image cap">
                                            <div
                                                class="card-body card-body-animation card-body card-body-animation-animation">
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

                                        <div class="card card-animation mb-4 card-filter" data-string="No. 102">
                                            <img class="card-img-top rounded img-fluid" src="{{ asset('img/room-2.jpeg') }}"
                                                alt="Card image cap">
                                            <div class="card-body card-body-animation">
                                                <h4 class="h6 font-weight-bold card-title mb-0" style="color: black">No. 102
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

                                        <div class="card card-animation mb-4 card-filter" data-string="No. 103">

                                            <img class="card-img-top rounded img-fluid" src="{{ asset('img/room-3.jpg') }}"
                                                alt="Card image cap">

                                            <div class="card-body card-body-animation">
                                                <h4 class="h6 font-weight-bold card-title mb-0" style="color: black">No.
                                                    103</h4>
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

                                        <div class="card card-animation mb-4 card-filter" data-string="No. 104">
                                            <img class="card-img-top rounded img-fluid" src="{{ asset('img/room-5.jpeg') }}"
                                                alt="Card image cap">
                                            <div class="card-body card-body-animation">
                                                <h4 class="h6 font-weight-bold card-title mb-0" style="color: black">No.
                                                    104</h4>
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
                                        <div class="card card-animation mb-4 card-filter" data-string="No. 105A">
                                            <img class="card-img-top img-fluid" src="{{ asset('img/room-1.jpeg') }}"
                                                alt="Card image cap">
                                            <div class="card-body card-body-animation">
                                                <h4 class="h6 font-weight-bold card-title mb-0" style="color: black">No.
                                                    105A
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
                                        <div class="card card-animation mb-4 card-filter" data-string="No. 105B">
                                            <img class="card-img-top img-fluid" src="//placehold.it/500x300"
                                                alt="Card image cap">
                                            <div class="card-body card-body-animation">
                                                <h4 class="h6 font-weight-bold card-title mb-0" style="color: black">No.
                                                    105B</h4>
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
                                        <div class="card card-animation mb-4 card-filter" data-string="No. 105C">
                                            <img class="card-img-top img-fluid" src="//placehold.it/500x270"
                                                alt="Card image cap">
                                            <div class=" card-body card-body-animation">
                                                <h4 class="h6 font-weight-bold card-title mb-0" style="color: black">No.
                                                    105C
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
                                        <div class="card card-animation mb-4 card-filter" data-string="No. 105D">
                                            <img class="card-img-top img-fluid" src="//placehold.it/500x300"
                                                alt="Card image cap">
                                            <div class=" card-body card-body-animation">
                                                <h4 class="h6 font-weight-bold card-title mb-0" style="color: black">No.
                                                    105D
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
                                        <div class="card card-animation mb-4 card-filter" data-string="No. 105E">
                                            <img class="card-img-top img-fluid" src="//placehold.it/500x270"
                                                alt="Card image cap">
                                            <div class=" card-body card-body-animation">
                                                <h4 class="h6 font-weight-bold card-title mb-0" style="color: black">No.
                                                    105E
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
                                        <div class="card card-animation mb-4 card-filter" data-string="No. 105F">
                                            <img class="card-img-top img-fluid" src="//placehold.it/500x270"
                                                alt="Card image cap">
                                            <div class=" card-body card-body-animation">
                                                <h4 class="h6 font-weight-bold card-title mb-0" style="color: black">No.
                                                    105F
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
