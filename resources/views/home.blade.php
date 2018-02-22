@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col-md-3">
        <h4>Products</h4>
        <div class="list-group">
            <a href="{{ url('/motorcycles')}}" class="list-group-item">Motorcycles</a>
            <a href="{{ url('/parts')}}" class="list-group-item">Parts / Accessories</a>
        </div>
    </div>
    <div class="col-md-9">
        <div class="jumbotron">
            <h1>GM Cycle</h1>
        </div>
    </div>
</div>
<div class="row">

</div>
@endsection
