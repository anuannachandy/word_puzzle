<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Word Tour, a word puzzle app</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="assets/vendors/feather/feather.css">
    <link rel="stylesheet" href="assets/vendors/ti-icons/css/themify-icons.css">
    <link rel="stylesheet" href="assets/vendors/css/vendor.bundle.base.css">
    <link rel="stylesheet" href="assets/vendors/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/vendors/mdi/css/materialdesignicons.min.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="assets/vendors/ti-icons/css/themify-icons.css">
    <link rel="stylesheet" type="text/css" href="assets/js/select.dataTables.min.css">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="assets/css/style.css">
    <!-- endinject -->
    <link rel="shortcut icon" href="assets/images/favicon.png" />
    <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css'>
    </link>
</head>

<body>
    <div class="container-scroller">
        @include('header')
        <div class="container-fluid page-body-wrapper">
            <!-- partial:partials/_sidebar.html -->
            <nav class="sidebar sidebar-offcanvas" id="sidebar">
                <ul class="nav">
                    <li class="nav-item">
                        <a class="nav-link" href="/">
                            <i class="icon-grid menu-icon"></i>
                            <span class="menu-title">Dashboard</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="collapse" href="/puzzle" aria-expanded="false" aria-controls="ui-basic">
                            <i class="icon-layout menu-icon"></i>
                            <span class="menu-title">Start Puzzle</span>
                        </a>
                    </li>
                </ul>
            </nav>
            <!-- partial -->
            <div class="main-panel">
                <div class="content-wrapper">
                    <div class="row">
                        <div class="col-md-12 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Let the wordplay begin!</h4>
                                    <div class="list-wrapper pt-2">

                                        <div class="row border rounded p-3 mb-2">
                                            <div class="col-md-6">
                                                <div class="form-check form-check-flat">
                                                    <label class="form-check-label">
                                                        <h3 class="text-primary" id="InputPuzzleStr"><strong>{{$string->puzzle_string}}</strong></h3>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-md-6 float-right">

                                                <button type="button" id="end_puzzle_btn" class="btn btn-primary btn-lg ms-auto d-block pull-right" style="width: auto;">
                                                    <i class="ti-user"></i> END PUZZLE </button>

                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="alert alert-success"><strong>Craft Your Own Unique Word and Submit It Here! <i class="ti-comments-smiley"></i></strong></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Create Words</h4>
                                    <p class="card-description"> Please Submit Your Words Here </p>
                                    <form class="forms-sample" id="wordForm">
                                        @csrf
                                        <input type="hidden" name="puzzle_id" value="{{ $string->id }}">
                                        <div class="form-group">
                                            <label for="InputStudentId">Student ID</label>
                                            <input type="text" class="form-control" id="InputStudentId" name="InputStudentId" placeholder="Student ID" autocomplete="off" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="Inputword">Word</label>
                                            <input type="text" class="form-control" id="Inputword" name="Inputword" placeholder="Valid Word" autocomplete="off" required>
                                        </div>
                                        <button type="button" class="btn btn-primary me-2" id="submitWordForm">Submit</button>
                                        <button class="btn btn-light">Cancel</button>
                                    </form>
                                    <div id="result" class="mt-2"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    @if($all_submited_words->isNotEmpty())
                                    <p class="card-title mb-0">Words List</p>
                                    <div class="table-responsive">
                                        <table class="table table-striped table-borderless">
                                            <thead>
                                                <tr>
                                                    <th>Student ID</th>
                                                    <th>Word</th>
                                                    <th>Date</th>
                                                    <th>Score</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($all_submited_words as $data)
                                                <tr>
                                                    <td>{{$data->Student->Student_ID}}</td>
                                                    <td class="font-weight-bold">{{$data->word}}</td>
                                                    <td>{{$data->created_at->format('d/m/Y')}}</td>
                                                    <td class="font-weight-medium">
                                                        <div class="badge badge-success">{{$data->score}}</div>
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                    @else
                                    <div class="alert alert-warning"><strong>Oops!!! <i class="ti-face-sad"></i> You haven't scored anything yet</strong></div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- content-wrapper ends -->
            </div>
            <!-- main-panel ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="assets/vendors/js/vendor.bundle.base.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.all.min.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page-->
    <script src="assets/js/custom.js"></script>
    <!-- End custom js for this page-->
</body>

</html>