<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=.3, shrink-to-fit=no" />
    <title>{{ config('app.name', 'Blog Admin') }}</title>
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset('assets/css/all.min.css')}}" />
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('assets/css/adminlte.min.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/css/mdb.min.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/css/sweetalert.css')}}" />
    @yield("css")
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}" />
    <link rel="shortcut icon" href="assets/images/favicon.png" />
    @livewireStyles
</head>
<body>
    <div class="wrapper">
      @include('inc/navbar')
     
      @include('inc/sidebar')

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- /.content-header -->
        <!-- Main content -->
        <section class="content">
          <div class="container-fluid">
            
            @yield("content")
            
          </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
      </div>
      <!-- /.content-wrapper -->
      <footer class="main-footer">
        <strong>Copyright &copy; 2014-2020 <a href="#">Adel Mahmoud</a>.</strong>
        All rights reserved.
        <div class="float-right d-none d-sm-inline-block">
          <b>Version</b> 1.0
        </div>
      </footer>
    </div>
    
    <script src="{{asset('assets/js/jquery.min.js')}}"></script>
    <script src="{{asset('assets/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('assets/js/sweetalert.min.js')}}"></script>
    <script src="{{asset('assets/js/adminlte.js')}}"></script>
    <script src="{{asset('assets/js/script.js')}}"></script>
    @livewireScripts
    @yield("js")
    @if (session('success'))
        <script>
            swal({
                text: "{{ session('success') }}",
                icon: "success",
            });
        </script>
    @endif
    
    @if (session('delete'))
        <script>
            swal({
                text: "{{ session('delete') }}",
                icon: "success",
            });
        </script>
    @endif
    
    @if (session('update'))
        <script>
            swal({
                text: "{{ session('update') }}",
                icon: "success",
            });
        </script>
    @endif
    <script>
      
       $(".formDelete").on("submit", function (e) {
            e.preventDefault();
            if (confirm("Do you want to delete?")) {
                $(this).unbind('submit').submit();
            }
        });

    </script>
    <!-- End custom js for this page -->
</body>

</html>