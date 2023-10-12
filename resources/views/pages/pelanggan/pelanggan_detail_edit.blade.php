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
                        <h1 class="h3 mb-0 font-weight-bold" style="color: black">Edit Pelanggan</h1>
                        <div class="row px-2 py-2">
                            {{-- <a href="{{ url()->previous() }}" class="btn btn-outline-dark">Kembali</a> --}}
                            {{-- <button class="btn btn-primary mx-2">Simpan</button> --}}
                            <form action="{{ route('pelanggan_delete', $pelanggan->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger mx-2">Hapus</button>
                            </form>
                        </div>
                    </div>

                    <div class="mb-5">
                        {{--  <form action="{{ route('ruangan_detail_update') }}" method="POST"> --}}
                        <form action="{{ route('pelanggan_detail_update') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <input type="hidden" name="id" value="{{ $pelanggan->id }}">
                            <div class="row">
                                <div class="col-xl-3 mb-3">
                                    <h1 class="h5 mb-0 font-weight-bold" style="color: black">Informasi Umum</h1>
                                </div>
                                <div class="col">

                                    <div class="row">
                                        <div class="col form-outline mb-4">
                                            <label class="form-label">Nama</label>
                                            <input type="text" name="name" value="{{ $pelanggan->name }}"
                                                class="form-control" autofocus required style="background-color: #FAFAFA">
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col form-outline mb-4">
                                            <label class="form-label">No HP</label>
                                            <input type="text" name="nohp" value="{{ $pelanggan->nohp }}"
                                                class="form-control" autofocus required style="background-color: #FAFAFA">
                                        </div>
                                        <div class="col form-outline mb-4">
                                            <label class="form-label">NIK</label>
                                            <input type="text" name="nik" value="{{ $pelanggan->nik }}"
                                                class="form-control" autofocus required style="background-color: #FAFAFA">
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col form-outline mb-4">
                                            <label class="form-label">Alamat</label>
                                            <input type="text" name="address" value="{{ $pelanggan->address }}"
                                                class="form-control" autofocus required style="background-color: #FAFAFA">
                                        </div>
                                    </div>

                                </div>
                            </div>

                            <div class="row">
                                <div class="col-xl-3 mb-3">
                                    <h1 class="h5 mb-0 font-weight-bold" style="color: black">Status</h1>
                                </div>
                                <div class="col">

                                    <div class="row">
                                        <div class="col form-outline mb-4">
                                            <label class="form-label">Status</label>
                                            <select id="status" name="status" class="form-control"
                                                style="background-color: #FAFAFA">
                                                {{-- <option selected value="active">Aktif</option>
                                                    <option value="deactive">Tidak Aktif</option> --}}
                                                @if ($pelanggan->status == 'active')
                                                    <option selected value="active">Aktif</option>
                                                    <option value="deactive">Tidak Aktif</option>
                                                @else
                                                    <option value="active">Ya</option>
                                                    <option selected value="deactive">Tidak</option>
                                                @endif
                                            </select>
                                        </div>
                                    </div>

                                </div>
                            </div>

                            {{-- button submit --}}
                            <div class="row">
                                <div class="col text-right">
                                    <a href="{{ url()->previous() }}" class="btn btn-outline-dark">Kembali</a>
                                    <button type="submit" class="btn btn-primary" style="min-width: 240px">Simpan</button>

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
