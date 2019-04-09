@extends('layouts.admin')

@section('user')

{{ Auth::user()->name }}
    
@endsection

@section('content')


    <h1>Admin</h1>

@endsection
