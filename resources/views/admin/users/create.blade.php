@extends('layouts.admin')

@section('content')

    <h1>Create Users</h1>

     {!!  Form::open([ 'method' => 'post', 'action' => 'AdminUsersController@store' ]) !!}
    
    
            <div class="form-group">
    
                   {!! Form::label('user' , 'User:') !!}
    
                   {!! Form::text('user' , null , ['class' => 'form-control']) !!}
    
            </div>
    
            <div class="form-group">
    
            {!! Form::submit('Create User' , ['class' => 'btn btn-primary']) !!}
    
            </div>
    
    
        {!! Form::close() !!}


@endsection
