@extends('master')
@section('content')
    <div class="container detail">
        <div class="row">
            <div class="col-sm-6">
                <img src="{{ $product['gallery'] }}" class="detail-img">
            </div>
            <div class="com-sm-6">
                <a href="/">Go Back</a>
                <h2>{{ $product['name'] }}</h2>
                <p>Price: {{ $product['price'] }}</p>
                <p>Description: {{ $product['description'] }}</p>
                <p>Category: {{ $product['category'] }}</p>
                <br>
                <form action="/add-to-cart" method="POST">
                    @csrf
                    <input type="hidden" name="product_id" value="{{$product['id'] }}">
                    <button class="btn btn-primary">Add to chart</button>
                </form>
                <br>
                <br>
                <button class="btn btn-success">Buy Now</button>
            </div>
        </div>
    </div>
@endsection
