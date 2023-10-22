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
                        <h1 class="h3 mb-0 font-weight-bold" style="color: black">Tambah Transaksi</h1>
                        <div class="row px-2 py-2">
                            {{-- <a href="{{ url()->previous() }}" class="btn btn-outline-dark">Kembali</a> --}}
                            {{-- <button class="btn btn-primary mx-2">Simpan</button> --}}
                        </div>
                    </div>

                    <div class="mb-5">
                        <form action="{{ route('tambah_transaksi_store') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            {{-- <input type="hidden" name="id" value="{{ $user->id }}"> --}}
                            {{-- <input type="hidden" name="hotel_id" value="{{ $hotel->id }}"> --}}
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
                                                style="background-color: #FAFAFA">
                                                <option value="">Isikan Nama di bawah / Pilih Booking</option>
                                                @foreach ($booking as $item1)
                                                    <option value="{{ $item1->id }}">{{ $item1->id }} :
                                                        {{ $item1->visitor_name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col form-outline mb-4">
                                            <label class="form-label">Nama</label>
                                            <input id="visitor_name" type="string" name="visitor_name" class="form-control"
                                                autofocus required style="background-color: #FAFAFA">
                                        </div>
                                        <div class="col form-outline mb-4">
                                            <label class="form-label">No HP</label>
                                            <input id="visitor_nohp" type="text" name="visitor_nohp" class="form-control"
                                                autofocus required style="background-color: #FAFAFA">
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
                                                <option value="tunai">Tunai</option>
                                                <option value="bank">Bank</option>
                                            </select>
                                            {{-- <input type="text" name="payment" class="form-control" autofocus required
                                                style="background-color: #FAFAFA"> --}}
                                        </div>
                                        <div class="col-xl-4 form-outline mb-4">
                                            <label id="banklabel" class="form-label">Pilih Rekening</label>
                                            <select id="bank" name="bank" class="form-control"
                                                style="background-color: #FAFAFA">
                                                <option value="BCA">BCA</option>
                                                <option value="BRI">BRI</option>
                                            </select>
                                            {{-- <input type="text" name="payment" class="form-control" autofocus required
                                                style="background-color: #FAFAFA"> --}}
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col form-outline mb-4">
                                            <label class="form-label">Harga Booking</label>

                                            {{-- tampilkan perulangan span class badge danger --}}

                                            <input id="booking_price1" type="number" name="" class="form-control"
                                                autofocus style="background-color: #FAFAFA">
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col form-outline mb-4">
                                            <label class="form-label">Harga Total</label>

                                            {{-- tampilkan perulangan span class badge danger --}}

                                            <input id="booking_price" type="number" name="price" class="form-control"
                                                autofocus style="background-color: #FAFAFA">
                                            <div id="charge_info"></div>
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
                        // Ketika pilihan pada booking_id berubah
                        $('#booking_id').on('change', function() {
                            var bookId = $(this).val();

                            if (bookId === '') {
                                $('#booking_price').val('');
                                $('#booking_price1').val('');
                                $('#charge_info').empty();
                            } else {
                                // Melakukan permintaan AJAX untuk mengambil harga booking berdasarkan booking_id
                                $.ajax({
                                    type: 'GET',
                                    url: '/get-booking-price/' + bookId,
                                    success: function(bookingData) {
                                        // Mengambil harga booking
                                        var bookingPrice = parseFloat(bookingData.price);

                                        $('#booking_price1').val(
                                        bookingPrice); // Mengisi input harga booking awal

                                        // Melakukan permintaan AJAX untuk mengambil data charge berdasarkan booking_id
                                        $.ajax({
                                            type: 'GET',
                                            url: '/get-booking-charge/' + bookId,
                                            success: function(chargeData) {
                                                // Menghapus badge yang mungkin ada sebelumnya
                                                $('#charge_info').empty();

                                                // Mengambil data charge
                                                var charge = chargeData.charge;

                                                // Menghitung total charge
                                                var totalCharge = 0;
                                                charge.forEach(function(item) {
                                                    var percentage =
                                                        parseFloat(item
                                                            .percentage);
                                                    totalCharge += (
                                                        bookingPrice *
                                                        percentage);

                                                    // Periksa apakah percentage adalah 0, jika ya, tambahkan kelas "badge-success"
                                                    var badgeClass =
                                                        percentage === 0 ?
                                                        'badge-success' :
                                                        'badge-danger';

                                                    // Menampilkan charge_type dan percentage dalam elemen span badge
                                                    var chargeInfo =
                                                        '<span class="badge ' +
                                                        badgeClass +
                                                        ' mr-2">' +
                                                        item.charge_type +
                                                        ' (' + (percentage *
                                                            100) +
                                                        '%)</span>';

                                                    $('#charge_info')
                                                        .append(chargeInfo);
                                                });

                                                // Mengisi input harga dengan total harga dan charge
                                                $('#booking_price').val(
                                                    bookingPrice + totalCharge);
                                            },
                                            error: function(err) {
                                                // Handle error jika ada, tampilkan pesan kesalahan
                                                console.log(err);
                                            }
                                        });
                                    },
                                    error: function(err) {
                                        // Handle error jika ada, tampilkan pesan kesalahan
                                        console.log(err);
                                    }
                                });
                            }
                        });
                    });



                    // Sembunyikan label dan input bank saat halaman dimuat
                    bankSelect.style.display = 'none';
                    labelBank.style.display = 'none';

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
        @endsection
