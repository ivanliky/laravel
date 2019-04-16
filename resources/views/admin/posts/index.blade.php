@extends('layouts.admin')


@section('content')

<h1>Posts</h1>
 


<table class="table">
      <thead>
        <tr>
          <th>Id</th>
          <th>Photo</th>
          <th>Owner</th>
          <th>Category</th>
          <th>Title</th>
          <th>Body</th>
          <th>Post</th>
          <th>Comments</th>
          <th>Created</th>
          <th>Updated</th>
        </tr>
      </thead>
      <tbody>
  
@if ($posts)
            
        @foreach ($posts as $post)
      
        <tr>
          <td>{{ $post->id }}</td>
          <td><a href="{{ route('admin.posts.edit', $post->id) }}"><img height = 100 
            src="{{ $post->photo ? $post->photo->file : 'http://placehold.it/400x400'  }}" alt=""></a></td>
          <td><a href="{{ route('admin.posts.edit', $post->id) }}">{{ $post->user->name }}</a></td>
          <td>{{ $post->category ? $post->category->name : 'Uncategorized' }}</td>
          <td>{{ $post->title }}</td>
          <td>{{ str_limit($post->body, 20) }}</td>
          <td><a href="{{ route('home.post' , $post->id)}}">View post</a></td>
          <td><a href="{{ route('admin.comments.show' , $post->id)}}">View comments</a></td>
          <td>{{ $post->created_at->diffForhumans() }}</td>
          <td>{{ $post->updated_at->diffForhumans() }}</td>
        </tr>

        @endforeach

 @endif

      </tbody>
    </table>

@endsection