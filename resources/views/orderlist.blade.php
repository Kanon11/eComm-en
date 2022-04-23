@php
$name = Session::get('user')['name'];
@endphp
@extends('master')
@section('content')
    <div class="container detail">
        <br>
        <h1 class="text-center">{{ $name }} your Order list is..</h1>
        <br>
        <br>
        @foreach ($orders as $item)
            <div class="row">
                <div class="col-sm-4">
                    <img src="{{ $item->gallery }}" style="width: 200px" class="detail-img">
                </div>
                <div class="com-sm-8">
                    <h2>{{ $item->name }}</h2>
                    <p>Delivary Status: {{ $item->status }}</p>
                    <p>Address: {{ $item->address }}</p>
                    <p>Payment Status: {{ $item->payment_status }}</p>
                    <p>Payment Method: {{ $item->payment_method }}</p>
                </div>
            </div>

            <br>
            <hr>
            <br>
        @endforeach
        <br>
        <br> <br>
        <br>
    </div>
@endsection
