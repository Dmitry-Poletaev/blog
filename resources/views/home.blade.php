@extends('layouts.app')


@section('content') 
<!-- Page Content -->
<div class="container">

    <div class="row">

      <!-- Blog Entries Column -->
      <div class="col-md-8">
        <h1 class="my-4">Все посты
        </h1>

        @foreach ($posts as $post)
        <!-- Blog Post -->
        <div class="card mb-4">
          <div class="card-body">
            <h2 class="card-title">{{ $post->title }}</h2>
            <p class="card-text">{{ substr(strip_tags($post->body), 0, 250) }}{{ strlen(strip_tags($post->body)) > 250 ? "..." : "" }}</p>
            <a href="{{ route('posts.show', $post->slug) }}" class="btn btn-primary">Read More &rarr;</a>
          </div>
          <div class="card-footer text-muted">
            Опубликовано {{ date('M j, Y', strtotime($post->created_at)) }}
            <a href="#">{{ $post->author }}</a>
          </div>
        </div>
        @endforeach

        <!-- Pagination -->
        <ul class="pagination justify-content-center mb-4">
          <li class="page-item">
            <a class="page-link" href="#">&larr; Older</a>
          </li>
          <li class="page-item disabled">
            <a class="page-link" href="#">Newer &rarr;</a>
          </li>
        </ul>

      </div>

      <!-- Sidebar Widgets Column -->
      <div class="col-md-4">
        <br>
        <br>
        <!-- Search Widget -->
        <div class="card my-4">
          <a class="btn btn-primary btn-lg" href="{{route('posts.create') }}">Добавить пост</a>
        </div>


      </div>

    </div>
    <!-- /.row -->

  </div>
  <!-- /.container -->

@endsection