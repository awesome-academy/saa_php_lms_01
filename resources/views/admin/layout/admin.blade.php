<html>
<head>
    <title> @yield('title') </title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <!-- Custom fonts for this template -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <script src="https://kit.fontawesome.com/7648a236bf.js" crossorigin="anonymous"></script>
  <!-- Custom styles for this template -->
    <link href="{{ mix('css/admin.css')}}" rel="stylesheet">

</head>
<body id="app">


 <!-- Page Wrapper -->
 <div id="wrapper">

<!-- Sidebar -->
@include('admin/shared/sidebar')
<!-- End of Sidebar -->

<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">

  <!-- Main Content -->
  <div id="content">

    <!-- Topbar -->
    @include('admin/shared/navbar')
    <!-- End of Topbar -->

    <!-- Begin Page Content -->
    <div class="container-fluid">
      <div class="admin-container-content">
        @yield('content')
      </div>
      <!-- Page Heading -->
     


    </div>
    <!-- /.container-fluid -->

  </div>
  <!-- End of Main Content -->

  <!-- Footer -->
  @include('admin/shared/footer')
  <!-- End of Footer -->

</div>
<!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
  <i class="fas fa-angle-up"></i>
  </a>



  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  @yield('javascript')
</body>
</html>