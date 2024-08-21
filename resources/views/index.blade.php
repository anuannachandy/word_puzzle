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
  <!-- <link rel="stylesheet" href="assets/vendors/datatables.net-bs4/dataTables.bootstrap4.css"> -->
  <!-- <link rel="stylesheet" href="assets/vendors/datatables.net-bs5/dataTables.bootstrap5.css"> -->
  <link rel="stylesheet" href="assets/vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" type="text/css" href="assets/js/select.dataTables.min.css">
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="assets/css/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="assets/images/favicon.png" />
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
            <a class="nav-link" href="/puzzle">
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
            <div class="col-md-12 grid-margin">
              <div class="row">
                <div class="col-12 col-xl-12 mb-4 mb-xl-0">
                  <div class="card">
                    <div class="card-body">
                      <h3 class=" card-title font-weight-bold text-primary">Welcome to the Word Puzzle Challenge!</h3>
                      <h6 class="font-weight-normal mb-0 P-2"><span>Dive into the ultimate word puzzle experience where every letter counts! Test your vocabulary skills by crafting the best words from a random mix of letters. Each word you create brings you closer to the top of the leaderboard. Whether you're looking for a quick brain workout or aiming to outscore your friends, our Word Puzzle Challenge offers endless fun and learning.</h6>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6 grid-margin stretch-card">
              <div class="card tale-bg">
                <div class="card-people mt-auto">
                  <img src="assets/images/dashboard/people.svg" alt="people">
                  <div class="weather-info">
                    <div class="d-flex">
                      <div>
                        <h2 class="mb-0 font-weight-normal"><i class="icon-sun me-2"></i>31<sup>C</sup></h2>
                      </div>
                      <div class="ms-2">
                        <h4 class="location font-weight-normal">Chicago</h4>
                        <h6 class="font-weight-normal">Illinois</h6>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-6 grid-margin transparent">
              <div class="row">
                <div class="col-md-6 mb-4 stretch-card transparent">
                  <div class="card card-tale">
                    <div class="card-body">
                      <p class="mb-4">Total Words</p>
                      <p class="fs-30 mb-2">{{$counts['total_words'] ?? 0}}</p>
                      <p><i class="ti-star"></i></p>
                    </div>
                  </div>
                </div>
                <div class="col-md-6 mb-4 stretch-card transparent">
                  <div class="card card-dark-blue">
                    <div class="card-body">
                      <p class="mb-4">Total Students</p>
                      <p class="fs-30 mb-2">{{$counts['total_students'] ?? 0}}</p>
                      <p><i class="ti-user"></i></p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6 mb-4 mb-lg-0 stretch-card transparent">
                  <div class="card card-light-blue">
                    <div class="card-body">
                      <p class="mb-4">Highest Score</p>
                      <p class="fs-30 mb-2">{{$counts['highest_score'][0]['student_name'] ?? '-----'}}</p>
                      <p>Score : {{$counts['highest_score'][0]['total_score'] ?? 0}}</p>
                    </div>
                  </div>
                </div>
                <div class="col-md-6 stretch-card transparent">
                  <div class="card card-light-danger">
                    <div class="card-body">
                      <p class="mb-4">Total Puzzles</p>
                      <p class="fs-30 mb-2">{{$counts['total_puzzles'] ?? 0}}</p>
                      <p><i class="ti-world"></i></p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          @include('leaderboard')
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
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="assets/js/custom.js"></script>
  <!-- End custom js for this page-->
</body>

</html>