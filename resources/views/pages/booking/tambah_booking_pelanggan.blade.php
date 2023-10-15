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
                        <h1 class="h3 mb-0 font-weight-bold" style="color: black">Tambah Booking</h1>
                        <div class="row px-2 py-2">
                            {{-- <a href="{{ url()->previous() }}" class="btn btn-outline-dark">Kembali</a> --}}
                            {{-- <button class="btn btn-primary mx-2">Simpan</button> --}}
                        </div>
                    </div>

                    <div class="mb-5">
                        <form action="{{ route('tambah_booking_store') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            {{-- <input type="hidden" name="id" value="{{ $user->id }}"> --}}
                            <input type="hidden" name="hotel_id" value="{{ $hotel->id }}">
                            <div class="row">
                                <div class="col-xl-3 mb-3">
                                    <h1 class="h5 mb-0 font-weight-bold" style="color: black">Informasi Umum</h1>
                                </div>
                                <div class="col">

                                    <div class="row">
                                        <div class="col form-outline mb-4">
                                            <label class="form-label">Pelanggan</label>
                                            {{-- <input type="number" name="visitor_id" class="form-control" autofocus required
                                                style="background-color: #FAFAFA"> --}}
                                            <select id="visitor_id" name="visitor_id" class="form-control"
                                                style="background-color: #FAFAFA">
                                                <option value="">Isikan Nama & No HP Manual di bawah / Pilih Pelanggan
                                                </option>
                                                @foreach ($pelanggan as $item1)
                                                    @if ($item1->id == $selected_pelanggan->id)
                                                        <option value="{{ $item1->id }}" selected>{{ $item1->name }}
                                                        </option>
                                                    @endif
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col form-outline mb-4">
                                            <label class="form-label">Nama</label>
                                            <input id="visitor_name" type="string" name="visitor_name" class="form-control"
                                                autofocus required style="background-color: #FAFAFA"
                                                value="{{ $selected_pelanggan->name }}" disabled>
                                        </div>
                                        <div class="col form-outline mb-4">
                                            <label class="form-label">No HP</label>
                                            <input id="visitor_nohp" type="text" name="visitor_nohp" class="form-control"
                                                autofocus required style="background-color: #FAFAFA"
                                                value="{{ $selected_pelanggan->nohp }}" disabled>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col form-outline mb-4">
                                            <label class="form-label">Ruangan</label>
                                            <select id="room_id" name="room_id" id="" class="form-control"
                                                required style="background-color: #FAFAFA">
                                                <option value="">Pilih Ruangan</option>
                                                @foreach ($ruangan as $item)
                                                    <option value="{{ $item->id }}">
                                                        {{ $item->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col form-outline mb-4">
                                            <label class="form-label">Harga Ruangan Perhari</label>
                                            <input id="room_price" type="number" name="visitor_nohp" class="form-control"
                                                autofocus required style="background-color: #FAFAFA">
                                        </div>
                                    </div>

                                </div>
                            </div>

                            <div class="row">
                                <div class="col-xl-3 mb-3">
                                    <h1 class="h5 mb-0 font-weight-bold" style="color: black">Informasi Detail</h1>
                                </div>
                                <div class="col">

                                    <div class="row">
                                        <div class="col-xl-4 form-outline mb-4">
                                            <label class="form-label">Berapa Orang</label>
                                            <input type="number" name="total_visitor" class="form-control" autofocus
                                                required style="background-color: #FAFAFA">
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col form-outline mb-4">
                                            <label class="form-label">Catatan</label>
                                            <input type="text" name="note" class="form-control" autofocus
                                                style="background-color: #FAFAFA">
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col form-outline mb-4">
                                            <label class="form-label">Check In</label>
                                            <input id="datepicker" type="text" name="checkin" class="form-control"
                                                autofocus required style="background-color: #FAFAFA"
                                                placeholder="{{ \Carbon\Carbon::now()->format('m/d/Y') }}">
                                        </div>
                                        <div class="col form-outline mb-4">
                                            <label class="form-label">Check Out</label>
                                            <input id="datepicker2" type="text" name="checkout" class="form-control"
                                                autofocus required style="background-color: #FAFAFA"
                                                placeholder="{{ /* get current date + 30 */
                                                    \Carbon\Carbon::now()->addDays(30)->format('m/d/Y') }}">
                                            {{-- <input id="datepicker" width="276" /> --}}
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-xl-4 form-outline mb-4">
                                            <label class="form-label">Harga</label>
                                            <input id="price" type="number" name="price" class="form-control"
                                                autofocus required style="background-color: #FAFAFA">
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
                                        <div class="col-xl-4 form-outline mb-4">
                                            <label class="form-label">Status</label>
                                            <select id="status" name="status" class="form-control"
                                                style="background-color: #FAFAFA">
                                                <option value="pending">Pending</option>
                                                <option value="success">Success</option>
                                                <option value="cancel">Cancel</option>
                                            </select>
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
            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    var pelangganSelect = document.getElementById('visitor_id');
                    var namaInput = document.getElementById('visitor_name');
                    var nohpInput = document.getElementById('visitor_nohp');
                    var roomSelect = document.getElementById('room_id');
                    var roomPriceInput = document.getElementById('room_price');

                    // Membuat event listener untuk perubahan pemilihan dalam elemen 'select'
                    pelangganSelect.addEventListener('change', function() {
                        if (pelangganSelect.value === '') {
                            namaInput.disabled = false;
                            nohpInput.disabled = false;
                            /* remove input placeholder and previous inputed text */
                            namaInput.placeholder = "";
                            nohpInput.placeholder = "";
                        } else {
                            namaInput.disabled = true;
                            nohpInput.disabled = true;
                            /* isi placeholder berdasarkan $pelanggan where $item1 id berdsarkan document.getElementById('visitor_id') */
                            namaInput.placeholder = document.getElementById('visitor_id').options[document
                                .getElementById('visitor_id').selectedIndex].text;
                            nohpInput.placeholder = "Load from db pelanggan";
                            /* add value */
                            namaInput.value = document.getElementById('visitor_id').options[document.getElementById(
                                'visitor_id').selectedIndex].text;
                            nohpInput.value = "Load from db pelanggan";
                        }
                    });

                    $(document).ready(function() {
                        // Ketika pilihan pada room_id berubah
                        $('#room_id').on('change', function() {
                            var roomId = $(this).val(); // Mendapatkan ID ruangan yang dipilih

                            if (roomId === '') {
                                $('#room_price').val(
                                ''); // Kosongkan input harga jika "Pilih Ruangan" dipilih
                            } else {
                                // Melakukan permintaan AJAX untuk mengambil harga ruangan
                                $.ajax({
                                    type: 'GET',
                                    url: '/get-room-price/' +
                                    roomId, // Ganti dengan URL yang sesuai
                                    success: function(data) {
                                        $('#room_price').val(data
                                        .price); // Mengisi input dengan harga yang diterima dari server
                                    },
                                    error: function(err) {
                                        // Handle error jika ada, tampilkan error apa
                                        console.log(err);
                                    }
                                });
                            }
                        });
                    });


                    $$(document).ready(function() {
                        // Fungsi untuk menghitung dan mengisi otomatis input harga
                        function updatePrice() {
                            var roomId = $('#room_id').val();
                            var checkinDate = $('#datepicker').val();
                            var checkoutDate = $('#datepicker2').val();
                            var roomPrice = parseFloat($('#room_price')
                                .val()); // Konversi harga ruangan menjadi float

                            if (roomId && checkinDate && checkoutDate && !isNaN(roomPrice)) {
                                // Hitung jumlah hari berdasarkan tanggal checkin dan checkout
                                var checkin = new Date(checkinDate);
                                var checkout = new Date(checkoutDate);
                                var numberOfDays = Math.ceil((checkout - checkin) / (1000 * 60 * 60 * 24));

                                // Hitung total harga
                                var totalPrice = roomPrice * numberOfDays;

                                // Isi otomatis input harga
                                $('#price').val(totalPrice);
                            }
                        }

                        // Ketika pilihan pada room_id berubah
                        $('#room_id').on('change', function() {
                            updatePrice(); // Panggil fungsi updatePrice ketika pemilihan ruangan berubah
                        });

                        // Ketika salah satu dari datepicker berubah
                        $('#datepicker, #datepicker2').on('change', function() {
                            updatePrice(); // Panggil fungsi updatePrice ketika salah satu dari datepicker berubah
                        });
                    });

                });
            </script>
        @endsection
