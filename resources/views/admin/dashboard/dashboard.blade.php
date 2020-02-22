@extends('admin.layout.admin')
@section('title', 'Dashboard')

@section('content')
    <div>Đây là trang {{ Auth::user()->name }} </div>
@endsection