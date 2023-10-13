<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>{{ $title }}</title>
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('img/gv-logo-box.png') }}">

    <!-- Custom fonts for this template-->
    <link href="{{ asset('demo/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    {{-- <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet"> --}}

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous"
        referrerpolicy="no-referrer" />

    <!-- Custom styles for this template-->
    <link href="{{ asset('demo/css/sb-admin-2.min.css') }}" rel="stylesheet">
    {{-- <link href="demo/css/sb-admin-2.min.css" rel="stylesheet"> --}}

    {{-- <link href="{{ asset('css/style.css') }}" rel="stylesheet"> --}}
    {{-- <link href="css/style.css" rel="stylesheet"> --}}

    <!-- Custom styles for DataTable-->
    <link href="{{ asset('demo/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
    {{-- <link href="demo/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet"> --}}

   {{--  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
        integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous"> --}}

    @include('css.css1')

    {{-- @include('css.sb-admin-2') --}}

    <link href="https://unpkg.com/gijgo@1.9.14/css/gijgo.min.css" rel="stylesheet" type="text/css" />
</head>

<body id="page-top">

    @yield('content')

    <!-- Bootstrap core JavaScript-->
    <script src="{{ asset('demo/vendor/jquery/jquery.min.js') }}"></script>
    {{-- <script src="demo/vendor/jquery/jquery.min.js"></script> --}}

    <script src="{{ asset('demo/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <script src="{{ asset('demo/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    {{-- <script src="demo/vendor/bootstrap/js/bootstrap.bundle.min.js"></script> --}}


    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <script>
        $(".filter").on("keyup", function() {
            var input = $(this).val().toUpperCase();

            $(".card").each(function() {
                if ($(this).data("string").toUpperCase().indexOf(input) < 0) {
                    $(this).hide();
                } else {
                    $(this).show();
                }
            })
        });
    </script>

    <!-- Core plugin JavaScript-->
    <script src="{{ asset('demo/vendor/jquery-easing/jquery.easing.min.js') }}"></script>
    {{-- <script src="demo/vendor/jquery-easing/jquery.easing.min.js"></script> --}}

    <!-- Custom scripts for all pages-->
    <script src="{{ asset('demo/js/sb-admin-2.min.js') }}"></script>
    {{-- <script src="demo/js/sb-admin-2.min.js"></script> --}}

    <!-- Page level plugins -->
    <script src="{{ asset('demo/vendor/chart.js/Chart.min.js') }}"></script>
    {{-- <script src="demo/vendor/chart.js/Chart.min.js"></script> --}}

    <!-- DataTables scripts -->
    <script src="{{ asset('demo/vendor/datatables/jquery.dataTables.min.js') }}"></script>
    {{-- <script src="demo/vendor/datatables/jquery.dataTables.min.js"></script> --}}

    <script src="{{ asset('demo/vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>
    {{-- <script src="demo/vendor/datatables/dataTables.bootstrap4.min.js"></script> --}}

    <script src="{{ asset('demo/js/demo/datatables-demo.js') }}""></script>
    {{-- <script src="demo/js/demo/datatables-demo.js"></script> --}}

    {{-- Custom DataTables --}}
    <script>
        $('table').dataTable({
            searching: true,
            paging: true,
            info: true,
            pageLength: 5,
            lengthMenu: [
                [5, 10, 25, 50, 100],
                [5, 10, 25, 50, 100]
            ]
        });
    </script>

    {{-- @if (!isset($charts) && isset($charttest)) --}}
    <script>
        // Set new default font family and font color to mimic Bootstrap's default styling
        Chart.defaults.global.defaultFontFamily = 'Nunito',
            '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
        Chart.defaults.global.defaultFontColor = '#858796';

        function number_format(number, decimals, dec_point, thousands_sep) {
            // *     example: number_format(1234.56, 2, ',', ' ');
            // *     return: '1 234,56'
            number = (number + '').replace(',', '').replace(' ', '');
            var n = !isFinite(+number) ? 0 : +number,
                prec = !isFinite(+decimals) ? 0 : Math.abs(decimals),
                sep = (typeof thousands_sep === 'undefined') ? ',' : thousands_sep,
                dec = (typeof dec_point === 'undefined') ? '.' : dec_point,
                s = '',
                toFixedFix = function(n, prec) {
                    var k = Math.pow(10, prec);
                    return '' + Math.round(n * k) / k;
                };
            // Fix for IE parseFloat(0.55).toFixed(0) = 0;
            s = (prec ? toFixedFix(n, prec) : '' + Math.round(n)).split('.');
            if (s[0].length > 3) {
                s[0] = s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, sep);
            }
            if ((s[1] || '').length < prec) {
                s[1] = s[1] || '';
                s[1] += new Array(prec - s[1].length + 1).join('0');
            }
            return s.join(dec);
        }

        // Area Chart Example
        var ctx = document.getElementById("myAreaChart");
        var myLineChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
                datasets: [{
                    label: "Pelanggan",
                    lineTension: 0.3,
                    backgroundColor: "rgba(57, 116, 254, 0.05)",
                    borderColor: "rgba(57, 116, 254, 1)",
                    pointRadius: 3,
                    pointBackgroundColor: "rgba(79, 190, 171, 1)",
                    pointBorderColor: "rgba(57, 116, 254, 1)",
                    pointHoverRadius: 3,
                    pointHoverBackgroundColor: "rgba(78, 115, 223, 1)",
                    pointHoverBorderColor: "rgba(78, 115, 223, 1)",
                    pointHitRadius: 10,
                    pointBorderWidth: 2,
                    data: [101, 102, 103,
                        104, 105, 106,
                        107, 108, 109,
                        110, 111, 112
                    ],
                }],
            },
            options: {
                maintainAspectRatio: false,
                layout: {
                    padding: {
                        left: 10,
                        right: 25,
                        top: 25,
                        bottom: 0
                    }
                },
                scales: {
                    xAxes: [{
                        time: {
                            unit: 'date'
                        },
                        gridLines: {
                            display: false,
                            drawBorder: false
                        },
                        ticks: {
                            maxTicksLimit: 7
                        }
                    }],
                    yAxes: [{
                        ticks: {
                            maxTicksLimit: 5,
                            padding: 10,
                            // Include a dollar sign in the ticks
                            callback: function(value, index, values) {
                                return '' + number_format(value) /* + '%' */ ;
                            }
                        },
                        gridLines: {
                            color: "rgb(234, 236, 244)",
                            zeroLineColor: "rgb(234, 236, 244)",
                            drawBorder: false,
                            borderDash: [2],
                            zeroLineBorderDash: [2]
                        }
                    }],
                },
                legend: {
                    display: false
                },
                tooltips: {
                    backgroundColor: "rgb(255,255,255)",
                    bodyFontColor: "#858796",
                    titleMarginBottom: 10,
                    titleFontColor: '#6e707e',
                    titleFontSize: 14,
                    borderColor: '#dddfeb',
                    borderWidth: 1,
                    xPadding: 15,
                    yPadding: 15,
                    displayColors: false,
                    intersect: false,
                    mode: 'index',
                    caretPadding: 10,
                    callbacks: {
                        label: function(tooltipItem, chart) {
                            var datasetLabel = chart.datasets[tooltipItem.datasetIndex].label || '';
                            return datasetLabel + ': ' + number_format(tooltipItem.yLabel) /* + '%' */ ;
                        }
                    }
                }
            }
        });
    </script>
    {{-- @endif --}}

    {{-- <script>
        $(document).ready(function() {
            var cards = $(".card-deck");
            var cardContainer = $("#cardContainer");
            var pagination = $("#pagination ul");

            var itemsPerPage = 8; // Jumlah kartu per halaman
            var currentPage = 1;

            showPage(currentPage);

            function showPage(page) {
                cards.hide();
                cards.slice((page - 1) * itemsPerPage, page * itemsPerPage).show();
            }

            var totalPages = Math.ceil(cards.length / itemsPerPage);

            for (var i = 1; i <= totalPages; i++) {
                pagination.append('<li class="page-item"><a class="page-link" href="#">' + i + '</a></li>');
            }

            pagination.find("li:first").addClass("active");

            pagination.find("a").on("click", function() {
                var newPage = $(this).text();
                pagination.find("li").removeClass("active");
                $(this).parent().addClass("active");
                showPage(newPage);
                currentPage = newPage;
            });
        });
    </script> --}}

    <script src="https://unpkg.com/gijgo@1.9.14/js/gijgo.min.js" type="text/javascript"></script>
    <script>
        $('#datepicker').datepicker({
            uiLibrary: 'bootstrap4'
        });
    </script>

    <script>
        $('#datepicker2').datepicker({
            uiLibrary: 'bootstrap4'
        });
    </script>
</body>

</html>
