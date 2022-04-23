@php
$name = Session::get('user')['name'];
@endphp
@extends('master')
@section('content')
    <div class="container">
        <br>
        <h1 class="text-center">{{ $name }} your Cart list is..</h1>
        <br>
        <br>
        <a href="/ordernow" class="btn btn-success">Order Now</a>
        <br>
        <br>
        <table class="table table-striped table-hover table-reflow">
            <thead>
                <tr>
                    <th><strong> Image </strong></th>
                    <th><strong> Name: </strong></th>
                    <th><strong> Price: </strong></th>
                    <th><strong> Category: </strong></th>
                    <th><strong> Description: </strong></th>
                    <th><strong> Cart Adding Time: </strong></th>
                    <th><strong> Remove from cart </strong></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($cart_list as $item)
                    <tr>
                        <td> <img src="{{ $item->gallery }}" style="width: 200px" class="detail-img"> </td>
                        <td> {{ $item->name }} </td>
                        <td> {{ $item->price }} </td>
                        <td> {{ $item->category }} </td>
                        <td> {{ $item->description }} </td>
                        <td> {{ date('d-m-Y', strtotime($item->updated_at)) }} </td>
                        <td> <a href="/remove-from-cart/{{ $item->id }}" class="btn btn-warning">Remove</a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <br>
            <a href="/ordernow" class="btn btn-success float-right">Order Now</a>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
    </div>


@endsection
