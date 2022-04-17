@extends('master')
@section('content')
    <div class="container login">
        <div class="row">
            <div class="col-sm-4 mx-auto">
                <form action="login" method="POST">
                @csrf
                    <div class="form-group">
                        <label for="exampleInputEmail1">Email address</label>
                        <input type="email" class="form-control" name="email" id="exampleInputEmail1" aria-describedby="emailHelp"
                            placeholder="Enter email">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Password</label>
                        <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                    </div>
                    <button type="submit" class="btn btn-success">Log In</button>
                </form>
            </div>
        </div>
    </div>
@endsection
