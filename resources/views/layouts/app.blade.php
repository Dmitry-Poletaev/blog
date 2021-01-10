<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Blog Home - Start Bootstrap Template</title>

  <!-- Bootstrap core CSS -->
  <link href="{{ asset('blog/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="{{ asset('blog/css/blog-home.css') }}" rel="stylesheet">
  <link href="{{ asset('blog/css/blog-post.css') }}" rel="stylesheet">
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">

 <style>
    .create_form {
      margin-top: 150px;
      margin-bottom: 250px;
    }
  </style>

</head>

<body>


  @include('layouts.navbar')

  @yield('content')

  @include('layouts.footer')

  <!-- Bootstrap core JavaScript -->
  <script src="{{ asset('blog/vendor/jquery/jquery.min.js') }}"></script>
  <script src="{{ asset('blog/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
  <script>
    $(document).ready(function() {
        $('#summernote').summernote();
    });
  </script>

  
</body>

</html>
