@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-3">
            <h4>Products</h4>
            <div class="list-group">
                <a href="#" class="list-group-item">Motorcycles</a>
                <a href="#" class="list-group-item">Parts / Accessories</a>
            </div>
            <h4>Brands</h4>
            <div class="list-group">
                <a href="#" class="list-group-item">Honda</a>
                <a href="#" class="list-group-item">Kawasaki</a>
                <a href="#" class="list-group-item">Suzuki</a>
                <a href="#" class="list-group-item">Yamaha</a>
            </div>
        </div>
        <div class="col-md-9">
            <div class="jumbotron">
                <h1>DM Cycle</h1>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua</p>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-3 col-md-offset-3">
            <div class="thumbnail">
                <div class="well">Yamaha 32-A2</div>
                <img src="{{ asset('images/dummy.jpg') }}" alt="X" height="231" width="231" class="img-thumbnail img-responsive">
                <div class="caption">
                    <button class="btn btn-success form-control">Reserve</button>
                </div>
            </div>
        </div>
           <div class="col-md-3">
            <div class="thumbnail">
                <div class="well">Suzuki X2ACF</div>
                <img src="{{ asset('images/dummy.jpg') }}" alt="X" height="231" width="231" class="img-thumbnail img-responsive">
                <div class="caption">
                    <button class="btn btn-success form-control">Reserve</button>
                </div>
            </div>
        </div>
           <div class="col-md-3">
            <div class="thumbnail">
                <div class="well">Kawazaki C31AF-2A</div>
                <img src="{{ asset('images/dummy.jpg') }}" alt="X" height="231" width="231" class="img-thumbnail img-responsive">
                <div class="caption">
                    <button class="btn btn-success form-control">Reserve</button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
