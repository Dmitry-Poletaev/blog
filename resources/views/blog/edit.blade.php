@extends('layouts.app')

@section('content') 
<div class="container">

<div class="row">
    <div class="col-md-8">
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
    <div class="create_form">
    <form action="{{route('posts.update', $post->id) }}" method="POST">
        @csrf
        @method('PATCH')
        <div class="form-group">
            <label for="exampleFormControlInput1">Автор</label>
            <input type="text" class="form-control" id="exampleFormControlInput1" name="author" value="{{ $post->author }}">
        </div>
        <div class="form-group">
        <label for="exampleFormControlInput1">Заголовок</label>
        <input type="text" class="form-control" name="title" id="exampleFormControlInput1" placeholder="Автор" value="{{ $post->title }}">
        </div>
        <div class="form-group">
            <label class="form-control-label">Текст: <span class="tx-danger">*</span></label>
            <textarea class="form-control" id="summernote" name="body">
                {{ $post->body }}
            </textarea>
        </div>
        <button type="submit" class="btn btn-primary btn-lg">Сохранить</button>
        <a href="{{ route('posts.destroy', $post->id) }}" type="button" class="btn btn-primary btn-lg">Удалить</a>
    </form>
    
    </div>
</div>
</div>
</div>

@endsection