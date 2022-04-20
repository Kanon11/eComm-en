@extends('master')
@section('content')
<div class="container">
    <div class="custom-product">
        <div class="col-sm-6">
            <a href="">Filter</a>
        </div>
        <div class="col-sm-4">
            <div class="serch-wrapper">
                <h3>Result Products</h3>
                @foreach ($products as $item)
                    <a href="/detail/{{ $item['id'] }}">
                        <div class="search-item">
                            <img class="search-img" src="{{ $item['gallery'] }}">
                            <div class="">
                                <p>Name: {{ $item['name'] }}</p>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection
