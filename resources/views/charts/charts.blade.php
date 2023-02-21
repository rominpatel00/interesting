<!doctype html>
<html lang="en">

<!-- Mirrored from themesbrand.com/minible/layouts/pages-starter.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 19 May 2022 07:26:01 GMT -->

<head>

    <meta charset="utf-8" />
    @if (session()->has('message'))
    <div class="alert alert-success">
        {{ session('message') }}
    </div>
    @endif
    <title>Chart View</title>
    <div id="myModal" class="modal fade">
        <div class="modal-dialog modal-confirm">
            <div class="modal-content">
                <div class="modal-header flex-column">
                    <h4 class="modal-title w-100">Are you sure?</h4>
                </div>
                <div class="modal-body">
                    <p>Do you really want to delete this record? This process cannot be undone.</p>
                </div>
                <div class="modal-footer justify-content-center">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <a id="deleteconfirm" type="button" class="btn btn-danger">Delete</a>
                </div>
            </div>
        </div>
    </div>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesbrand" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="assets/images/otus_logo_sm.ico">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

    <!-- Bootstrap Css -->
    <link href="assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />
    <link href="assets/css/pagination.css" id="app-style" rel="stylesheet" type="text/css" />

    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

    <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
    <script src="http://code.jquery.com/ui/1.11.0/jquery-ui.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <style type="text/css">
        html,
        body,
        #container {
            width: 100%;
            height: 500px;
            margin-top: 0px;
            padding: 0;
        }
    </style>
</head>


<body>

    <!-- <body data-layout="horizontal" data-topbar="colored"> -->

    <!-- Begin page -->
    <div id="layout-wrapper">
        @include('header/header');
        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="main-content">

            <div class="page-content">
                <div class="container-fluid">

                    <!-- start page title -->
                    <div class="row">
                        <div class="col-12 row">
                            <div class="page-title-box d-flex align-items-center justify-content-between col-10">
                                <h4 class="mb-0">Charts</h4>
                            </div>

                        </div>
                    </div>
                    <div class="row col-lg-12">
                        <div class=" mb-4 col-lg-2">
                            <label for="horizontal-email-input" class="col-sm-3 col-form-label">Provider</label>
                            <div class="col-sm-9" style="padding: 0;">
                                <select class="form-control" name="provider" id="provider">
                                    <option selected value="">Select Provider</option>
                                    @foreach ($providers as $provider)
                                    <option value="{{$provider->id}}">{{$provider->username}}</option>
                                    @endforeach

                                </select>
                                <span class="text-danger"></span>
                            </div>
                        </div>
                        <div class=" mb-4 col-lg-2">
                            <label for="horizontal-email-input" class="col-sm-3 col-form-label">Refference</label>
                            <div style="padding: 0;" class="col-sm-9">
                                <select class="form-control" name="refference" id="refference">
                                    <option selected value="">Select Refference</option>
                                    @foreach ($refferences as $refference)
                                    <option value="{{$refference->id}}">{{$refference->username}}</option>
                                    @endforeach
                                </select>
                                <span class="text-danger"></span>
                            </div>
                        </div>
                        <div class=" mb-4 col-lg-2">
                            <label for="horizontal-email-input" class="col-sm-3 col-form-label">Taker</label>
                            <div class="col-sm-9" style="padding: 0;">
                                <select class="form-control" name="taker" id="taker">
                                    <option selected value="">Select Taker</option>

                                    @foreach ($takers as $taker)
                                    <option value="{{$taker->id}}">{{$taker->username}}</option>
                                    @endforeach
                                </select>
                                <span class="text-danger"></span>
                            </div>
                        </div>
                        <div class=" mb-4 col-lg-2">
                            <label for="horizontal-email-input" class="col-sm-3 col-form-label">Year</label>
                            <div class="col-sm-9 " style="padding: 0;">
                                <select class="form-control" name="year" id="year">
                                    <option selected value="">Select Year</option>
                                    @foreach ($years as $year)
                                    <option value="{{$year->year}}">{{$year->year}}</option>
                                    @endforeach
                                </select>
                                <span class="text-danger"></span>
                            </div>
                        </div>
                        <div class=" mb-4 col-lg-2">
                            <label for="horizontal-email-input" class="col-sm-3 col-form-label">Month</label>
                            <div class="col-sm-9 " style="padding: 0;">
                                <select class="form-control" name="month" id="month">
                                    <option selected value="">Select Month</option>
                                    @foreach ($months as $month)
                                    <option value="{{$month->month}}">{{$month->month}}</option>
                                    @endforeach
                                </select>
                                <span class="text-danger"></span>
                            </div>
                        </div>
                        <div class=" mb-4 col-lg-2">
                            <label for="horizontal-email-input" class="col-sm-3 col-lg-12 col-form-label">Custom Date</label>
                            <div class="col-sm-9 " style="padding: 0;">
                                <input type="text" name="datetimes" class="customdate" style="width:105%" id="litepicker" />
                                <span class="text-danger"></span>
                            </div>
                        </div>
                        <div id="container">

                        </div>
                    </div>
                </div>
            </div>

            @include('footer/footer')
        </div>
        <!-- end main content-->

    </div>
    <!-- END layout-wrapper -->

    <!-- JAVASCRIPT -->
    <script src="assets/libs/jquery/jquery.min.js"></script>
    <script src="assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/libs/metismenu/metisMenu.min.js"></script>
    <script src="assets/libs/simplebar/simplebar.min.js"></script>
    <script src="assets/libs/node-waves/waves.min.js"></script>
    <script src="assets/libs/waypoints/lib/jquery.waypoints.min.js"></script>
    <script src="assets/libs/jquery.counterup/jquery.counterup.min.js"></script>

    <!-- Required datatable js -->
    <script src="assets/libs/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
    <!-- Buttons examples -->
    <script src="assets/libs/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="assets/libs/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js"></script>
    <script src="assets/libs/jszip/jszip.min.js"></script>
    <script src="assets/libs/pdfmake/build/pdfmake.min.js"></script>
    <script src="assets/libs/pdfmake/build/vfs_fonts.js"></script>
    <script src="assets/libs/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="assets/libs/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="assets/libs/datatables.net-buttons/js/buttons.colVis.min.js"></script>

    <!-- Responsive examples -->
    <script src="assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="assets/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js"></script>

    <!-- Datatable init js -->
    <script src="assets/js/pages/datatables.init.js"></script>

    <!-- App js -->
    <script src="assets/js/app.js"></script>
    <script src="assets/js/charts/chart.js"></script>
    <script src="assets/js/charts/draw.js"></script>
    <script src="assets/js/intrest/total.js"></script>

    <script src="assets/js/charts/litepicker.js"></script>
    <script src="assets/js/pagination.js"></script>
    <script>
        let input = document.getElementById('litepicker');
        let now = new Date();
        let picker = new Litepicker({
            element: input,
            // format: 'DD/MM/YYYY',
            format: 'DD MMM YYYY',
            singleMode: false,
            numberOfMonths: 2,
            numberOfColumns: 2,
            showTooltip: true,
            scrollToDate: true,
            startDate: new Date(now).setDate(now.getDate() - 1),
            endDate: new Date(now),
            // minDate: new Date(now).setDate(now.getDate() - 7),
            // maxDate: new Date(now).setDate(now.getDate() + 7),
            setup: function(picker) {
                picker.on('selected', function(date1, date2) {
                    console.log(`${date1.toDateString()}, ${date2.toDateString()}`)
                })
            }
        });
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <div class="text-center">
        <script>
            // All the code for the JS line chart will come here
            function getData() {
                return [
                    ['1990', 16.9, 12.2],
                    ['1991', 17, 17.8],
                    ['1993', 26.5, 23.8],
                    ['1994', 28.7, 22],
                    ['1996', 35.7, 24],
                    ['1998', 37.2, 24.6],
                    ['2000', 36.5, 26.2],

                ];
            }



            let year;
            let month;
            let provider;
            let taker;
            let refference;
            let customdate;
            let data = [];
            var csrf_token = "{{csrf_token()}}";
            $("select").change(function() {

                provider = $("#provider").val();
                refference = $("#refference").val();
                taker = $("#taker").val();
                year = $("#year").val();
                month = $("#month").val();
                if ($("#provider").val()) {
                };
                if ($("#refference").val()) {
                };
                if ($("#taker").val()) {
                };
                if ($("#year").val()) {
                };
                if ($("#month").val()) {
                };
              
                $.ajax({
                    type: "POST",
                    url: '/charts/getdetails',

                    data: {
                        provider: provider,
                        taker: taker,
                        refference: refference,
                        year: year,
                        month: month,
                        _token: csrf_token
                    },
                    dataType: "json",
                    success: function(response) {
                        if (response) {
                            draw(response)
                        } else {

                        }
                    },
                });



            });
        </script>
</body>

<!-- Mirrored from themesbrand.com/minible/layouts/pages-starter.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 19 May 2022 07:26:01 GMT -->

</html>