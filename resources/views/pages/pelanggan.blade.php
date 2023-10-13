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
                        <h1 class="h6 mb-0 font-weight-bold" style="color: black">List Pelanggan</h1>
                        <a href="{{ route('tambah_pelanggan') }}" class="btn btn-primary">Tambah Pelanggan</a>

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
                                                    <th>Nama</th>
                                                    <th>ID</th>
                                                    <th>Status</th>
                                                    <th>No HP</th>
                                                    <th>NIK</th>
                                                    <th>Alamat</th>
                                                    <th>Detail</th>
                                                    <th>Delete</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($pelanggan as $item)
                                                    <tr>
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
                                                                            {{ $item->name }}</h1>
                                                                    </div>
                                                                    <div class="row ">
                                                                        <p class=""
                                                                            style="opacity: 75%; font-size: 10pt">
                                                                            {{ $item->nohp }}</p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td>{{ $item->id }}</td>
                                                        <td>
                                                            {{ $item->status }}
                                                        </td>
                                                        <td>{{ $item->nohp }}</td>
                                                        <td>{{ $item->nik }}3</td>
                                                        <td>{{ $item->address }}</td>
                                                        <td>
                                                            <a href="{{ route('pelanggan_detail', $item->id) }}"
                                                                class="btn btn-primary btn-sm">Edit</a>
                                                        </td>
                                                        <td>
                                                            <form
                                                                action="{{ route('pelanggan_delete', ['id' => $item->id]) }}"
                                                                method="POST" onclick="return confirm('Are you sure?')">
                                                                @method('delete')
                                                                @csrf
                                                                <button type="submit"
                                                                    class="btn btn-sm btn-danger pr-4 pl-1">Delete</button>
                                                            </form>
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
