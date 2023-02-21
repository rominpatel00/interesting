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
    <title>Income management</title>
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

  <script>
  
  </script>
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
                                <h4 class="mb-0">Income Management</h4>
                            </div>
                            <div class="col-2">
                                <a href="/income/create" class="btn btn-primary">Add Income</a>
                            </div>
                        </div>
                    </div>

                    <!-- end page title -->
                    <div class="row main-div">
                        <div class="container main-table">
                            <table id="example" class="table table-striped mb-0" style="width:100%">
                            
                                <thead>
                                    <tr>
                                        <th>Sr No.</th>
                                        <th>Provider</th>
                                        <th>Taker</th>
                                        <th>Amount</th>
                                        <th>Percent</th>
                                        <th>Date</th>
                                        <th>Intrest</th>
                                        <!-- <th>Actions</th> -->
                                    </tr>
                                </thead>
                                <tbody id="tbody">
                                    @php
                                        $i = 0;
                                    @endphp
                                    @foreach ($transacrions as $transacrion)
                                    <tr>
                                        <td>{{ $transacrion->id }}</td>
                                        <td>{{ $transacrion->providername }}</td>
                                        <td>{{ $transacrion->takername }}</td>
                                        <td class="amount{{$i}} amount" >{{ $transacrion->amount }}</td>
                                        <td class="per{{$i}} per">{{ $transacrion->percent }} %</td>
                                        <td class="date{{$i}} date">{{ $transacrion->date }}</td>
                                        <td class="intrest{{$i}} intrest"></td>
                                        <!-- <td><a href="/income/edit/{{ $transacrion->id }}"><i class="uil uil-pen font-size-18"></i> Edit </a>| <a href="#myModal" class="deletemodal trigger-btn" data-path="income" data-id="{{$transacrion->id}}" data-toggle="modal">Delete</a></td> -->
                                       
                                    </tr>
                                    @php
                                        $i++;
                                    @endphp
                                    @endforeach
                                </tbody>
                                <tbody>
                                    <tr>
                                        <th>Total</th>
                                        <th><input id="btn_tot" type="radio" name="clickradio" checked value="Total"><label for="html">Total</label></th>
                                        <th><input id="btn_this" type="radio" name="clickradio"  value="Total">This page only</th>
                                        <th class="total_amount"></th>
                                        <th></th>
                                        <th></th>
                                        <th class="total_intrest"></th>
                                    </tr>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Sr No.</th>
                                        <th>Provider</th>
                                        <th>Taker</th>
                                        <th>Amount</th>
                                        <th>Percent</th>
                                        <th>Date</th>
                                        <th>Intrest</th>
                                        <!-- <th>Actions</th> -->
                                    </tr>
                                </tfoot>
                               
                            </table>
                     
                        </div>
                    </div>
                </div> <!-- container-fluid -->
            </div>
            <!-- End Page-content -->
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
    <script src="assets/js/intrest/intrest.js"></script>
    <script src="assets/js/intrest/total.js"></script>

    <script src="assets/js/pagination.js"></script>
    <script>

    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <div class="text-center">

</body>

<!-- Mirrored from themesbrand.com/minible/layouts/pages-starter.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 19 May 2022 07:26:01 GMT -->

</html>