@extends('layouts.app')

@section('content')

<div class="card card-default">

    <div class="card-header">
        {{ isset($post) ? 'Edit Post':'Create Post' }}
    </div>
    <div class="card-body">
        @if($errors->any())
          <div class="alert alert-danger">
              <ul class="list-group">
                  @foreach($errors->all() as $error)
                  <li class="list-group-item text-danger">
                    {{ $error }}
                  </li>
                  @endforeach
              </ul>
          </div>
        @endif

        <form action="{{route("posts.store") }}" method="POST"  enctype="multipart/form-data">
            @csrf
            @if (isset($post))
                @method('PUT')
            @endif
         <div class="form-group">
                <label for="title">Title</label>
                <input type="text" class="form-control" name="title" id="title" value="{{ isset($post)? $post->title : ''}}">
         </div>
         <div class="form-group">
                <label for="description">Description</label>
        <textarea class="form-control" name="description" cols="5" rows="5" id="description"></textarea>
         </div>
           <div class="form-group">
                <label for="content">Content</label>
        <textarea class="form-control" name="content" cols="5" rows="5" id="content"></textarea>
         </div>
           <div class="form-group">
                <label for="published_at">Published_At</label>
                <input type="text" class="form-control" name="published_at" id="published_at" value="{{ isset($post)? $post->published_at : ''}}">
         </div>
            <div class="form-group">
                <label for="image">Image</label>
                <input type="file" class="form-control" name="image" id="image" value="{{ isset($post)? $post->image : ''}}">
         </div>
         <div class="form-group">
             <button type="submit" class="btn btn-success">
            {{ isset($post)? "Update post" : "Add post" }}
            </button>
         </div>
        </form>
    </div>
</div>

@endsection
