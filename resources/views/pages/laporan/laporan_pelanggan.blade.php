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
                        <h1 class="h6 mb-0 font-weight-bold" style="color: black">List Pelanggan</h1>
                        {{-- <a href="#" class="btn btn-success my-3" id="exportExcel">EXPORT EXCEL</a> --}}
                        <button id="sheetjsexport" class="btn btn-success">Export as XLSX</button>
                    </div>

                    <div class="d-sm-flex align-items-center justify-content-between pt-2  mb-2">
                    </div>

                    <div class="row">

                        <div class="col">

                            <div class="row">
                                <div class="col">
                                    <div class="table-responsive">
                                        <table class="table table-hover" id="dataTable" width="100%" cellspacing="0"
                                            style="">
                                            <thead>
                                                <tr>
                                                    <th>ID</th>
                                                    <th>Customer ID</th>
                                                    <th>Name</th>
                                                    <th>No HP</th>
                                                    <th>NIK</th>
                                                    <th>Address</th>
                                                    <th>Status</th>
                                                    <th>Created At</th>
                                                    <th>Updated At</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($pelanggan as $item)
                                                    <tr>
                                                        <td>{{ $item->id }}</td>
                                                        <td>{{ $item->customer_id }}</td>
                                                        <td>{{ $item->name }}</td>
                                                        <td>{{ $item->nohp }}</td>
                                                        <td>{{ $item->nik }}</td>
                                                        <td>{{ $item->address }}</td>
                                                        <td>{{ $item->status }}</td>
                                                        <td>{{ $item->created_at }}</td>
                                                        <td>{{ $item->updated_at }}</td>
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
    <script src="https://cdn.sheetjs.com/xlsx-0.20.0/package/dist/xlsx.full.min.js"></script>

    <script>
        document.getElementById("sheetjsexport").addEventListener('click', function() {
            /* Create worksheet from HTML DOM TABLE */
            var wb = XLSX.utils.table_to_book(document.getElementById("dataTable"));
            /* Export to file (start a download) */
            XLSX.writeFile(wb, "SheetJSTable.xlsx");
        });
    </script>
@endsection
