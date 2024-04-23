<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>{{ config('app.name', 'Blog Admin') }}</title>
    <link rel="stylesheet" href="{{asset('assets/css/mdb.min.css')}}" />
    <style>
      .card{
        min-width:300px;
      }
    </style>
</head>
<body>
    <div class="wrapper d-flex justify-content-center align-items-center" style="height:100vh;">
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
    </div>
</body>

</html>