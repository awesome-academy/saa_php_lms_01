@extends('admin.layout.admin')
@section('title', 'Dashboard')

@section('content')
    <div>Hello {{ Auth::user()->name }} </div>
@endsection