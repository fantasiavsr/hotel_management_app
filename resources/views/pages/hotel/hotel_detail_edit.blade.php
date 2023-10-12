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
                        <h1 class="h3 mb-0 font-weight-bold" style="color: black">Edit Hotel</h1>
                        <div class="row px-2 py-2">
                            {{-- <a href="{{ url()->previous() }}" class="btn btn-outline-dark">Kembali</a> --}}
                            {{-- <button class="btn btn-primary mx-2">Simpan</button> --}}
                        </div>
                    </div>

                    <div class="mb-5">
                        {{--  <form action="{{ route('ruangan_detail_update') }}" method="POST"> --}}
                        <form action="{{ route('hotel_detail_update') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="id" value="{{ $hotels->id }}">
                            <div class="row">
                                <div class="col-xl-3 mb-3">
                                    <h1 class="h5 mb-0 font-weight-bold" style="color: black">Infromasi Umum</h1>
                                </div>
                                <div class="col">
                                    <div class="row">
                                        <div class="col form-outline mb-4">
                                            <label class="form-label">Nama{{-- <span>
                                                    <p class="text-danger" style="font-size: 12px">*Required</p>
                                                </span> --}}</label>
                                            <input type="text" name="name" class="form-control" autofocus required
                                                style="background-color: #FAFAFA" value="{{ $hotels->name }}">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col form-outline mb-4">
                                            <label class="form-label">Alamat</label>
                                            <input type="text" name="address" class="form-control" autofocus required
                                                style="background-color: #FAFAFA" value="{{ $hotels->address }}">
                                        </div>
                                    </div>

                                    <label class="form-label">Gambar: {{ $hotels->image }}</label>
                                    <div class="row d-flex">
                                        <div class="col-sm form-outline mb-4">
                                            <input type="file" name="image" class="form-input" autofocus>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xl-3 mb-3">
                                    <h1 class="h5 mb-0 font-weight-bold" style="color: black">Infromasi Tambahan</h1>
                                </div>
                                <div class="col">
                                    <div class="row">
                                        <div class="col form-outline mb-4">
                                            <label class="form-label">Deskripsi</label>
                                            <input type="text" name="desc" class="form-control" autofocus
                                                style="background-color: #FAFAFA" value="{{ $hotels->desc }}">
                                        </div>
                                    </div>

                                </div>
                            </div>

                            {{-- button submit --}}
                            <div class="row">
                                <div class="col text-right">
                                    <a href="{{ url()->previous() }}" class="btn btn-outline-dark">Kembali</a>
                                    <button type="submit" class="btn btn-primary"
                                        style="min-width: 240px">Simpan</button>

                                </div>
                            </div>
                        </form>
                    </div>
                    <!-- End of Main Content -->

                </div>
                <!-- End of Content Wrapper -->

                <!-- Scroll to Top Button-->
                @include('partials.scrolltotop')
            </div>
            <!-- End of Page Wrapper -->
        @endsection
