@extends('layouts.app')

@section('content') 
 <!-- Page Content -->
 <div class="container">

    <div class="row">

      <!-- Post Content Column -->
      <div class="col-lg-8">
        @if (Session::has('success'))
        <div class="alert alert-success" role="alert">
        <strong>Success:</strong> {{ Session::get('success') }}
        </div>
        @endif

        <!-- Title -->
        <h1 class="mt-4">{{ $post->title }} </h1>
        
        <!-- Author -->
        <p class="lead">
          by {{ $post->author }}        
        </p>

        <hr>

        <!-- Date/Time -->
        <p>{{ date('M j, Y', strtotime($post->created_at)) }}</p>

        <hr>

        <!-- Post Content -->
        <p class="card-text">{!! $post->body !!}</p>
        

        <hr>

        <!-- Comments Form -->
        <div class="card my-4">
          @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
          <h5 class="card-header">Оставить комментарий:</h5>
          <div class="card-body">
            <form action="{{route('comment.store') }}" method="POST">
              @csrf
              <input type="hidden"  name="post-id" value="{{ $post->id }}">
                <div class="form-group">
                    <label for="exampleInputEmail1">Имя</label>
                    <input type="text" class="form-control" name="name" id="exampleInputEmail1" placeholder="Имя">
                </div>
              <div class="form-group">
                <textarea class="form-control" rows="3" name="body"></textarea>
              </div>
              <button type="submit" class="btn btn-primary">Отправить</button>
            </form>
          </div>
        </div>
   <!-- Pagination -->

        @foreach ($comments as $comment)
        <div class="media mb-4">
          <img class="d-flex mr-3 rounded-circle" src="http://placehold.it/50x50" alt="">
          <div class="media-body">
            <h5 class="mt-0"> {{$comment->name}} <small>{{$comment->created_at}}</small></h5>
            {{$comment->body}}
          </div>
        </div>
        @endforeach
      </div>
      <div class="d-flex justify-content-center">
        {!! $posts->links() !!}
    </div>
    <!-- /.row -->

  </div>
</div>
  <!-- /.container -->
@endsection