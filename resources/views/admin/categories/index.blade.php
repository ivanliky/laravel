@extends('layouts.admin')


@section('content')

<h1>Categories</h1>

@if (Session::has('deleted_category'))

<p class="bg-danger">{{ session('deleted_category') }}</p>
    
 @endif

 @if (Session::has('created_category'))

    <p class="alert alert-success">{{ session('created_category') }}</p>
        
@endif

@if (Session::has('updated_category'))

<p class="alert alert-success">{{ session('updated_category') }}</p>
    
@endif

<div class="col-sm-6">

    {!!  Form::open([ 'method' => 'post', 'action' => 'AdminCategoriesController@store' ]) !!}
   
   
           <div class="form-group">
   
                  {!! Form::label('name' , 'Name:') !!}
   
                  {!! Form::text('name' , null , ['class' => 'form-control']) !!}
   
           </div>
   
           <div class="form-group">
   
           {!! Form::submit('Create Category' , ['class' => 'btn btn-primary']) !!}
   
           </div>
   
   
       {!! Form::close() !!}

</div>



<div class="col-sm-6">

        @if ($categories)
        

        <table class="table">
       
                 <thead>
       
                   <tr>
       
                     <th>Id</th>
                     <th>Name</th>
                     <th>Created date</th>
                     <th>Updated date</th>
       
                   </tr>
                   
                     </thead>
       
                 <tbody>
       
       @foreach ($categories as $category)
           
                   <tr>
       
                       <th>{{ $category->id }}</th>
                       <th><a href="{{ route('admin.categories.edit', $category->id) }}">{{ $category->name }}</a></th>
                       <th>{{ $category->created_at ? $category->created_at->diffForHumans() : 'No date' }}</th>
                       <th>{{ $category->updated_at ? $category->updated_at->diffForHumans() : 'No date' }}</th>
       
                   </tr>
       
       @endforeach
       
           </tbody>
       
        </table>
       
       
       
       
       @endif


    </div>



@endsection