@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col-md-4">
        <div class="well">
            <i class="fa fa-user fa-4x fa-fw" aria-hidden="true"></i>
            <div class="text">
                <h3>Users</h3>
                <p>Number of users : 201</p>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="well">
            <i class="fa fa-shopping-cart fa-4x fa-fw" aria-hidden="true"></i>
            <div class="text">
                <h3>Stocks</h3>
                <p>Items : 200</p>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="well">
            <i class="fa fa-exchange fa-4x fa-fw" aria-hidden="true"></i>
            <div class="text">
                <h3>Transcation</h3>
                <p>Total transaction : 201</p>
            </div>
        </div>
    </div>
</div>
@endsection
@section('style')
<style type="text/css">
.text {
    display:inline-block;
}
</style>
@endsection
