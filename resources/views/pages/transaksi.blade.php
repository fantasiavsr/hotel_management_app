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
                        <h1 class="h6 mb-0 font-weight-bold" style="color: black">List Transaksi</h1>
                        <a href="{{ route('tambah_transaksi') }}" class="btn btn-primary">Tambah Transaksi</a>
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
                                                    <th>ID Transaksi</th>
                                                    <th>ID Booking</th>
                                                    <th>Nama Pelanggan</th>
                                                    <th>Metode Pembayaran</th>
                                                    <th>Bank</th>
                                                    <th>Total Pembayaran</th>
                                                    <th>Tanggal</th>
                                                    <th>Status</th>
                                                    <th>Detail</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($transaksi as $item)
                                                    <tr>
                                                        <td>
                                                            {{ $item->id }}
                                                        </td>
                                                        <td>
                                                            {{ $item->booking_id }}
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
                                                                            {{ $item->visitor_name }}
                                                                        </h1>
                                                                    </div>
                                                                    <div class="row ">
                                                                        <p class=""
                                                                            style="opacity: 75%; font-size: 10pt">
                                                                            {{ $item->visitor_nohp }}</p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            {{ $item->payment }}
                                                        </td>
                                                        <td>
                                                            {{ $item->bank }}
                                                        </td>
                                                        <td>
                                                            {{ $item->price }}
                                                        </td>
                                                        <td>
                                                            {{ $item->created_at }}
                                                        </td>
                                                        <td>
                                                            {{ $item->status }}
                                                        </td>
                                                        <td>
                                                            <a href="{{ route('transaksi_detail', ['id' => $item->id]) }}"
                                                                class="btn btn-primary btn-sm">Edit</a>
                                                        </td>
                                                    </tr>
                                                @endforeach
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
