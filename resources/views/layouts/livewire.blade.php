<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=.3, shrink-to-fit=no" />
    <title>{{ config('app.name', 'Blog Admin') }}</title>
    <link rel="stylesheet" href="{{asset('assets/css/mdb.min.css')}}" />
    @livewireStyles
</head>
<body>
      <div class="wrapper">
           @yield("content")
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
    @livewireScripts
</body>
</html>