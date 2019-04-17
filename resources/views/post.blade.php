@extends('layouts.blog-post')

@section('content')

        <!-- Blog Post -->

        <!-- Title -->
        <h1>{{ $post->title }}</h1>

        <!-- Author -->
        <p class="lead">
            by <a href="#">{{ $post->user->name }}</a>
        </p>

        <hr>

        <!-- Date/Time -->
        <p><span class="glyphicon glyphicon-time"></span> Posted {{ $post->created_at->diffForHumans() }}</p>

        <hr>

        <!-- Preview Image -->
        <img class="img-responsive" src="{{ $post->photo->file }}" alt="">

        <hr>

        <!-- Post Content -->
        <p> {{ $post->body }} </p>

            @if (Session::has('comment_message'))
        
            <p class="alert alert-success">{{ session('comment_message') }}</p>
                
            @endif
        
         <hr>

        <!-- Blog Comments -->

        @if (Auth::check())
            
        <!-- Comments Form -->
        <div class="well">
            <h4>Leave a Comment:</h4>

             {!!  Form::open([ 'method' => 'post', 'action' => 'PostCommentsController@store' ]) !!}
            
            
                    <div class="form-group">

                        <input type="hidden" name="post_id" value="{{ $post->id }}">
            
                           {!! Form::label('body' , 'Comment:') !!}
            
                           {!! Form::textarea('body' , null , ['class' => 'form-control', 'rows' => 5]) !!}
            
                    </div>
            
                    <div class="form-group">
            
                    {!! Form::submit('Submit comment' , ['class' => 'btn btn-primary']) !!}
            
                    </div>
            
            
                {!! Form::close() !!}
            
     
        </div>

        @endif

        <hr>

        <!-- Posted Comments -->

        @if (count($comments) > 0)

            @foreach ($comments as $comment)
                
        <!-- Comment -->
<div class="media">
<a class="pull-left" href="#">
<img height=64 class="media-object" src="{{ $comment->photo }}" alt="">
</a>
<div class="media-body">
<h4 class="media-heading">{{ $comment->author }}
    <small>{{ $comment->created_at->diffForHumans() }}</small>
</h4>
<p>{{ $comment->body }}</p>

@if (count($comment->replies) > 0)

    @foreach ($comment->replies as $reply)

<div id="nested-comment" class="media">
        <a class="pull-left" href="#">
            <img height = 64 class="media-object" src="{{ $reply->photo }}" alt="">
        </a>
        <div class="media-body">
            <h4 class="media-heading">{{ $reply->author }}
                <small>{{ $reply->created_at->diffForHumans() }}</small>
            </h4>
            <p>{{ $reply->body }}</p>
    
        </div>

            {!!  Form::open([ 'method' => 'post', 'action' => 'CommentRepliesController@createReply' ]) !!}
        
                <div class="form-group">

                        <input type="hidden" name="comment_id" value="{{ $comment->id }}">
    
                            <br>

                        {!! Form::textarea('body' , null , ['class' => 'form-control', 'rows' => 2]) !!}
        
                </div>
        
                <div class="form-group">
        
                {!! Form::submit('Reply' , ['class' => 'btn btn-primary']) !!}
        
                </div>
        
        
            {!! Form::close() !!}
    </div>
                 
                     @endforeach

                @endif



      
            </div>
        </div>

        @endforeach

        @endif

        <!-- Comment -->


 

@endsection

