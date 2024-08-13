@extends('layouts.master')
@section('content')
    <form class="row g-3" action="{{ url('/register') }}" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="col-12">
            <label for="inputAddress" class="form-label">Name</label>
            <input type="text" name="name" class="form-control" id="inputAddress" placeholder="1234 Main St">
        </div>
        <div class="col-md-6">
            <label for="inputEmail4" class="form-label">Email</label>
            <input type="email" name="email" class="form-control" id="inputEmail4">
        </div>
        <div class="col-md-6">
            <label for="inputPassword4" class="form-label">Password</label>
            <input type="password" name="password" class="form-control" id="inputPassword4">
        </div>

        <div class="col-12">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" id="gridCheck">
                <label class="form-check-label" for="gridCheck">
                    Check me out
                </label>
            </div>
        </div>
        <div class="col-12">
            <button type="submit" class="btn btn-primary">Sign up</button>
        </div>
    </form>
@endsection
