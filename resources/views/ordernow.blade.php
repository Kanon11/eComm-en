@php
$name = Session::get('user')['name'];
@endphp
@extends('master')
@section('content')
    <div class="container">
        <br>
        <h1 class="text-center">{{ $name }} your Order Details is..</h1>
        <br>
        <br>
        <table class="table table-striped table-hover table-reflow">
            <thead>
                <tr>
                    <th><strong> Menue: </strong></th>
                    <th><strong> Charge: </strong></th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td> Amount </td>
                    <td> {{ $total }} </td>
                </tr>
                <tr>
                    <td> Tax </td>
                    <td> 0 </td>
                </tr>
                <tr>
                    <td> Delivary Charge </td>
                    <td> 500 </td>
                </tr>
                <tr>
                    <td> Total Amount </td>
                    <td> {{ $total + 500 }} </td>
                </tr>
            </tbody>
        </table>
        <br>
        <br>
        <form action="/place-order" method="POST">
        @csrf
            <div class="form-group row">
                <label for="inputEmail3" class="col-sm-2 col-form-label">Address</label>
                <div class="col-sm-10">
                    <textarea name="address" cols="50" rows="5" placeholder="Put your address here"></textarea>
                </div>
            </div>
            <fieldset class="form-group">
                <div class="row">
                    <legend class="col-form-label col-sm-2 pt-0">Radios</legend>
                    <div class="col-sm-10">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="paymentradio"  value="online"
                                checked>
                            <label class="form-check-label" for="paymentradio">
                                Online Payment
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="paymentradio"  value="emi">
                            <label class="form-check-label" for="paymentradio">
                                EMI Payment
                            </label>
                        </div>
                        <div class="form-check disabled">
                            <input class="form-check-input" type="radio" name="paymentradio"  value="delivary">
                            <label class="form-check-label" for="paymentradio">
                                Cash On Delivary
                            </label>
                        </div>
                    </div>
                </div>
            </fieldset>
            <div class="form-group row">
                <div class="col-sm-10">
                    <button type="submit" class="btn btn-success">Shift now</button>
                </div>
            </div>
        </form>
        <br>
        <br>
        <br>
        <br>
    </div>
@endsection
