@extends('layouts.admin')

@section('content')


@if (count($comments) > 0)

    
<h1>Comments</h1>


<table class="table">
      <thead>
        <tr>
          <th>Id</th>
          <th>Author</th>
          <th>Email</th>
          <th>Comment</th>
          <th>Post</th>
          <th>Status</th>
          <th>Trash</th>
          <th>Created at</th>
        </tr>
      </thead>
      <tbody>
       @foreach ($comments as $comment)
        
       <tr>
        <td>{{  $comment->id  }}</td>
        <td>{{  $comment->author  }}</td>
        <td>{{  $comment->email  }}</td>
        <td>{{  $comment->body  }}</td>
        <td><a href="{{ route( 'home.post' , $comment->post->id )  }}">View post</a></td>
        
      <td>

     {!! Form::open(['method' => 'PATCH', 'action' => ['PostCommentsController@update', $comment->id]]) !!}

         <div class="form-group">

         @if($comment->is_active)

    {!! Form::submit('Un-approve', ['class' => 'btn btn-warning']) !!}

        <input type="hidden" name="is_active" value="0">

         @else

    {!! Form::submit('Approve', ['class' => 'btn btn-success']) !!}

        <input type="hidden" name="is_active" value="1">

         @endif

        </div>

    {!! Form::close() !!}

        </td>

        
        <td>

     {!!  Form::open([ 'method' => 'DELETE', 'action' => ['PostCommentsController@destroy', $comment->id ]]) !!}
    

            <div class="form-group">
    
            {!! Form::submit('Delete' , ['class' => 'btn btn-danger']) !!}
    
            </div>
    
    
        {!! Form::close() !!}
 
          </td>

          <td>{{  $comment->created_at->diffForHumans()  }}</td>

      </tr>

       @endforeach
       
      </tbody>
    </table>

    @else

     <h1 class="text-center">No comments</h1>
  
    @endif   

@endsection


