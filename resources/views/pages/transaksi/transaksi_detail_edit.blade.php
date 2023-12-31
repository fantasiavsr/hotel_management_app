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
                        <h1 class="h3 mb-0 font-weight-bold" style="color: black">Edit Transaksi</h1>
                        <div class="row px-2 py-2">
                            {{-- <a href="{{ url()->previous() }}" class="btn btn-outline-dark">Kembali</a> --}}
                            {{-- <button class="btn btn-primary mx-2">Simpan</button> --}}
                            {{-- button delete with action delete --}}
                            <form action="{{ route('transaksi_del') }}" method="POST" id="deleteForm">
                                @csrf
                                {{-- @method('DELETE') --}}
                                 <input type="hidden" name="id" value="{{ $transaksi->id }}">
                                <button type="submit" class="btn btn-danger mx-2">Hapus</button>
                            </form>
                        </div>
                    </div>

                    <div class="mb-5">
                        <form action="{{ route('transaksi_detail_update') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            {{-- <input type="hidden" name="id" value="{{ $user->id }}"> --}}
                            <input type="hidden" name="id" value="{{ $transaksi->id }}">
                            <div class="row">
                                <div class="col-xl-3 mb-3">
                                    <h1 class="h5 mb-0 font-weight-bold" style="color: black">Informasi Umum</h1>
                                </div>
                                <div class="col">

                                    <div class="row">
                                        <div class="col form-outline mb-4">
                                            <label class="form-label">Booking</label>
                                            {{-- <input type="number" name="visitor_id" class="form-control" autofocus required
                                                style="background-color: #FAFAFA"> --}}
                                            <select id="booking_id" name="booking_id" class="form-control"
                                                style="background-color: #F0F0F0" disabled>
                                                <option>{{ $transaksi->visitor_name }}</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col form-outline mb-4">
                                            <label class="form-label">Nama</label>
                                            <input id="visitor_name" type="string" name="visitor_name" class="form-control"
                                                autofocus required style="background-color: #F0F0F0"
                                                value="{{ $transaksi->visitor_name }}" disabled>
                                        </div>
                                        <div class="col form-outline mb-4">
                                            <label class="form-label">No HP</label>
                                            <input id="visitor_nohp" type="text" name="visitor_nohp" class="form-control"
                                                autofocus required style="background-color: #F0F0F0"
                                                value="{{ $transaksi->visitor_nohp }}" disabled>
                                        </div>
                                    </div>

                                </div>
                            </div>

                            <div class="row">
                                <div class="col-xl-3 mb-3">
                                    <h1 class="h5 mb-0 font-weight-bold" style="color: black">Informasi Pembayaran</h1>
                                </div>
                                <div class="col">

                                    <div class="row">
                                        <div class="col-xl-4 form-outline mb-4">
                                            <label class="form-label">Payment</label>
                                            <select id="payment" name="payment" class="form-control"
                                                style="background-color: #FAFAFA">
                                                {{-- <option value="tunai">Tunai</option>
                                                <option value="bank">Bank</option> --}}
                                                @if ($transaksi->payment == 'tunai')
                                                    <option value="tunai" selected>Tunai</option>
                                                    <option value="bank">Bank</option>
                                                @elseif ($transaksi->payment == 'bank')
                                                    <option value="tunai">Tunai</option>
                                                    <option value="bank" selected>Bank</option>
                                                @endif
                                            </select>
                                            {{-- <input type="text" name="payment" class="form-control" autofocus required
                                                style="background-color: #FAFAFA"> --}}
                                        </div>
                                        <div class="col-xl-4 form-outline mb-4">
                                            <label id="banklabel" class="form-label">Pilih Rekening</label>
                                            <select id="bank" name="bank" class="form-control"
                                                style="background-color: #FAFAFA">
                                                {{-- <option value="BCA">BCA</option>
                                                <option value="BRI">BRI</option> --}}
                                                @if ($transaksi->bank == 'BCA')
                                                    <option value="BCA" selected>BCA</option>
                                                    <option value="BRI">BRI</option>
                                                @elseif ($transaksi->bank == 'BRI')
                                                    <option value="BCA">BCA</option>
                                                    <option value="BRI" selected>BRI</option>
                                                @elseif ($transaksi->bank == '-')
                                                    <option value="" selected disabled hidden>Pilih Rekening</option>
                                                    <option value="BCA">BCA</option>
                                                    <option value="BRI">BRI</option>
                                                @endif
                                            </select>
                                            {{-- <input type="text" name="payment" class="form-control" autofocus required
                                                style="background-color: #FAFAFA"> --}}
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col form-outline mb-4">
                                            <label class="form-label">Harga</label>
                                            <input type="number" name="price" class="form-control" autofocus
                                                style="background-color: #FAFAFA" value="{{ $transaksi->price }}">
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
                                                {{-- <option value="pending">Pending</option>
                                                <option value="success">Success</option>
                                                <option value="cancel">Cancel</option> --}}

                                                @if ($transaksi->status == 'pending')
                                                    <option value="pending" selected>Pending</option>
                                                    <option value="success">Success</option>
                                                    <option value="cancel">Cancel</option>
                                                @elseif ($transaksi->status == 'success')
                                                    <option value="pending">Pending</option>
                                                    <option value="success" selected>Success</option>
                                                    <option value="cancel">Cancel</option>
                                                @elseif ($transaksi->status == 'cancel')
                                                    <option value="pending">Pending</option>
                                                    <option value="success">Success</option>
                                                    <option value="cancel" selected>Cancel</option>
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
            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    var pelangganSelect = document.getElementById('booking_id');
                    var namaInput = document.getElementById('visitor_name');
                    var nohpInput = document.getElementById('visitor_nohp');

                    var paymentSelect = document.getElementById('payment');
                    var labelBank = document.getElementById('banklabel');
                    var bankSelect = document.getElementById('bank');

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
                            namaInput.placeholder = "Nama : " + pelangganSelect.options[pelangganSelect
                                .selectedIndex].text;
                            nohpInput.placeholder = "Load from db booking";

                            /* isi value berdasarkan $pelanggan where $item1 id berdsarkan document.getElementById('visitor_id') */
                            /* namaInput.value = pelangganSelect.options[pelangganSelect.selectedIndex].text; */
                            /* text setelah tanda : */
                            var text = pelangganSelect.options[pelangganSelect.selectedIndex].text;
                            /* split text berdasarkan tanda : */
                            var split = text.split(":");
                            /* isi value berdasarkan split[1] */
                            namaInput.value = split[1];
                            nohpInput.value = "Load from db pelanggan";

                        }
                    });

                    $(document).ready(function() {
                        // Ketika pilihan pada room_id berubah
                        $('#booking_id').on('change', function() {
                            var bookId = $(this).val(); // Mendapatkan ID ruangan yang dipilih

                            if (bookId === '') {
                                $('#booking_price').val(
                                    ''); // Kosongkan input harga jika "Pilih Ruangan" dipilih
                            } else {
                                // Melakukan permintaan AJAX untuk mengambil harga ruangan
                                $.ajax({
                                    type: 'GET',
                                    url: '/get-booking-price/' +
                                        bookId, // Ganti dengan URL yang sesuai
                                    /* url: 'test/get-room-price/' +
                                        roomId, */
                                    success: function(data) {
                                        $('#booking_price').val(data
                                            .price
                                        ); // Mengisi input dengan harga yang diterima dari server
                                    },
                                    error: function(err) {
                                        // Handle error jika ada, tampilkan error apa
                                        console.log(err);
                                    }
                                });
                            }
                        });
                    });

                    // Sembunyikan label dan input bank saat halaman dimuat
                    if (paymentSelect.value === 'tunai') {
                        bankSelect.style.display = 'none';
                        labelBank.style.display = 'none';
                    } else {
                        bankSelect.style.display = 'block';
                        labelBank.style.display = 'block';
                    }
                    /* bankSelect.style.display = 'none';
                    labelBank.style.display = 'none'; */

                    // Tambahkan event listener untuk perubahan pemilihan dalam input "payment"
                    paymentSelect.addEventListener('change', function() {
                        if (paymentSelect.value === 'tunai') {
                            // Jika pilihan "Tunai" dipilih, sembunyikan input "bank"
                            bankSelect.style.display = 'none';
                            labelBank.style.display = 'none';
                        } else {
                            // Jika pilihan "Bank" dipilih, tampilkan input "bank"
                            bankSelect.style.display = 'block';
                            labelBank.style.display = 'block';
                        }
                    });
                });
            </script>
            <script>
                document.getElementById('deleteForm').addEventListener('submit', function(e) {
                    e.preventDefault();
                    if (confirm('Apakah Anda yakin ingin menghapus ini?')) {
                        this.submit();
                    }
                });
            </script>
        @endsection
