<!doctype html>
<html lang="en">


<!-- Mirrored from themesbrand.com/minible/layouts/pages-starter.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 19 May 2022 07:26:01 GMT -->

<head>

    <meta charset="utf-8" />
    <title>Update User Details</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesbrand" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="assets/images/otus_logo_sm.ico">

    <!-- Bootstrap Css -->
    <link href="{{url('/')}}/assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="{{url('/')}}/assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="{{url('/')}}/assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />
    <link href="{{url('/')}}/assets/css/pagination.css" id="app-style" rel="stylesheet" type="text/css" />

</head>


<body>

    <!-- <body data-layout="horizontal" data-topbar="colored"> -->

    <!-- Begin page -->
    <div id="layout-wrapper">
        @include('header/innerheader');
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
                                <h4 class="mb-0"><a href="/users" class="">Transactions >></a>&nbsp Update Transaction Details</h4>
                            </div>

                        </div>
                    </div>

                    <!-- end page title -->
                    <div class="row main-div">
                        <div class="col-lg-1"></div>
                        <div class="col-lg-10">
                            <div class="mt-5 mt-lg-4">
                                <form action="{{url('/')}}/transaction/update/{{ $transaction->id}}" method="POST">

                                    @csrf
                                    @method('PUT')
                                    <div class="row mb-4">
                                        <label for="horizontal-Fullname-input" class="col-sm-3 col-form-label">Transaction ID</label>
                                        <div class="col-sm-9">
                                            <input type="text" value="{{ $transaction->id }}" name="id" class="form-control" id="horizontal-Fullname-input" placeholder="Enter User ID" disabled>
                                        </div>
                                    </div>
                                    <div class="row mb-4">
                                        <label for="horizontal-email-input" class="col-sm-3 col-form-label">Provider*</label>
                                        <div class="col-sm-9">
                                            <select class="form-control" name="provider" disabled>

                                                <option selected value="{{$transaction->provider}}">{{$transaction->providername}}</option>

                                            </select> <span class="text-danger">
                                                @error('provider')
                                                {{$message}}
                                                @enderror
                                            </span>
                                        </div>
                                    </div>

                                    <div class="row mb-4">
                                        <label for="horizontal-email-input" class="col-sm-3 col-form-label">Refference*</label>
                                        <div class="col-sm-9">
                                            <select class="form-control" name="refference">
                                                <option selected>Select Answer</option>

                                                @foreach ($refferences as $refference)

                                                @if( $transaction->refference == $refference->id )
                                                <option selected value="{{$transaction->refference}}">{{$transaction->refferencename}}</option>
                                                @else
                                                <option value="{{$refference->id}}">{{$refference->username}}</option>
                                                @endif
                                                @endforeach

                                            </select> <span class="text-danger">
                                                @error('refference')
                                                {{$message}}
                                                @enderror
                                            </span>
                                        </div>
                                    </div>
                                    <div class="row mb-4">
                                        <label for="horizontal-email-input" class="col-sm-3 col-form-label">Taker*</label>
                                        <div class="col-sm-9">
                                            <select class="form-control" name="taker" disabled>

                                                <option selected value="{{$transaction->taker}}">{{$transaction->takername}}</option>

                                            </select> <span class="text-danger">
                                                @error('taker')
                                                {{$message}}
                                                @enderror
                                            </span>
                                        </div>
                                    </div>
                                    <div class="row mb-4">
                                        <label for="horizontal-Fullname-input" class="col-sm-3 col-form-label">Amount*</label>
                                        <div class="col-sm-9">
                                            @if(old('amount'))
                                            <input type="text" value="{{ old('amount') }}" name="amount" class="form-control" id="horizontal-Fullname-input" placeholder="Enter User name">

                                            @else
                                            <input type="text" value="{{ $transaction->amount }}" name="amount" class="form-control" id="horizontal-Fullname-input" placeholder="Enter User name">

                                            @endif
                                            <span class="text-danger">
                                                @error('amount')
                                                {{$message}}
                                                @enderror
                                            </span>
                                        </div>
                                    </div>
                                    <div class="row mb-4">
                                        <label for="horizontal-Fullname-input" class="col-sm-3 col-form-label">Percentage*</label>
                                        <div class="col-sm-9">
                                            @if(old('percent'))
                                            <input type="text" value="{{ old('percent') }}" name="percent" class="form-control" id="horizontal-Fullname-input" placeholder="Enter User name">

                                            @else
                                            <input type="text" value="{{ $transaction->percent }}" name="percent" class="form-control" id="horizontal-Fullname-input" placeholder="Enter User name">

                                            @endif
                                            <span class="text-danger">
                                                @error('percent')
                                                {{$message}}
                                                @enderror
                                            </span>
                                        </div>
                                    </div>
                                    <div class="row mb-4">
                                        <label for="horizontal-Fullname-input" class="col-sm-3 col-form-label">Duration*</label>
                                        <div class="col-sm-9">
                                            @if(old('duration'))
                                            <input type="text" value="{{ old('duration') }}" name="duration" class="form-control" id="horizontal-Fullname-input" placeholder="Enter User name">

                                            @else
                                            <input type="text" value="{{ $transaction->duration }}" name="duration" class="form-control" id="horizontal-Fullname-input" placeholder="Enter User name">

                                            @endif
                                            <span class="text-danger">
                                                @error('duration')
                                                {{$message}}
                                                @enderror
                                            </span>
                                        </div>
                                    </div>
                                    <div class="row mb-4">
                                        <label for="horizontal-Fullname-input" class="col-sm-3 col-form-label">Intrest Lap*</label>
                                        <div class="col-sm-9">
                                            @if(old('intrest_lap'))
                                            <input type="text" value="{{ old('intrest_lap') }}" name="intrest_lap" class="form-control" id="horizontal-Fullname-input" placeholder="Enter User name">

                                            @else
                                            <input type="text" value="{{ $transaction->intrest_lap }}" name="intrest_lap" class="form-control" id="horizontal-Fullname-input" placeholder="Enter User name">

                                            @endif
                                            <span class="text-danger">
                                                @error('intrest_lap')
                                                {{$message}}
                                                @enderror
                                            </span>
                                        </div>
                                    </div>
                                    <div class="row mb-4">
                                        <label for="horizontal-Fullname-input" class="col-sm-3 col-form-label">Date*</label>
                                        <div class="col-sm-9">
                                            @if(old('date'))
                                            <input type="text" value="{{ old('date') }}" name="date" class="form-control" id="horizontal-Fullname-input" placeholder="Enter User name">

                                            @else
                                            <input type="date" value="{{ $transaction->date }}" name="date" class="form-control" id="horizontal-Fullname-input" placeholder="Enter User name">

                                            @endif
                                            <span class="text-danger">
                                                @error('date')
                                                {{$message}}
                                                @enderror
                                            </span>
                                        </div>
                                    </div>
                                    <div class="row justify-content-end col-lg-12">
                                        <div class="d-flex justify-content-center flex-wrap gap-3 col-lg-12">
                                            <button type="submit" class="btn btn-primary waves-effect waves-light w-md">Update</button>
                                            <a type="reset" href="/transaction" class="btn btn-outline-danger waves-effect waves-light w-md">Cancle</a>
                                        </div>
                                    </div>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-lg-1"></div>
            </div> <!-- container-fluid -->
        </div>
        <!-- End Page-content -->
        @include('footer/footer')
    </div>
    <!-- end main content-->

    </div>
    <!-- END layout-wrapper -->

    <!-- JAVASCRIPT -->
    <script src="{{url('/')}}/assets/libs/jquery/jquery.min.js"></script>
    <script src="{{url('/')}}/assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="{{url('/')}}/assets/libs/metismenu/metisMenu.min.js"></script>
    <script src="{{url('/')}}/assets/libs/simplebar/simplebar.min.js"></script>
    <script src="{{url('/')}}/assets/libs/node-waves/waves.min.js"></script>
    <script src="{{url('/')}}/assets/libs/waypoints/lib/jquery.waypoints.min.js"></script>
    <script src="{{url('/')}}/assets/libs/jquery.counterup/jquery.counterup.min.js"></script>
    <!-- <link rel="stylesheet" href="https://cdn.datatables.net/1.10.2/css/jquery.dataTables.min.css"> -->
    <!-- <script type="text/javascript" src="https://cdn.datatables.net/1.10.2/js/jquery.dataTables.min.js"></script> -->

    <!-- App js -->
    <script src="{{url('/')}}/assets/js/app.js"></script>
    <script src="{{url('/')}}/assets/js/pagination.js"></script>

</body>

<!-- Mirrored from themesbrand.com/minible/layouts/pages-starter.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 19 May 2022 07:26:01 GMT -->

</html>