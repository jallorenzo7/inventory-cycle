@extends('layouts.app')
@section('content')
<div class="row">
    <a href="{{ route('stock.index')}}">
        <div class="col-md-4">
            <div class="well">
                <i class="fa fa-shopping-cart fa-4x fa-fw" aria-hidden="true"></i>
                <div class="text">
                    <h3>Stocks</h3>
                    <p>Items : {{ $stock_count }}</p>
                </div>
            </div>
        </div>
    </a>
    <a href="{{url('billing')}}">
        <div class="col-md-4">
            <div class="well">
                <i class="fa fa-shopping-basket fa-4x fa-fw" aria-hidden="true"></i>
                <div class="text">
                    <h3>Orders</h3>
                    <p>Total transaction : {{ $order_count }}</p>
                </div>
            </div>
        </div>
    </a>
    <a href="{{url('transactions')}}">
        <div class="col-md-4">
            <div class="well">
                <i class="fa fa-exchange fa-4x fa-fw" aria-hidden="true"></i>
                <div class="text">
                    <h3>Transaction</h3>
                    <p>Total transaction : {{ $transaction_count }}</p>
                </div>
            </div>
        </div>
    </a>
</div>
@endsection
@section('style')
<style type="text/css">
.text {
    display:inline-block;
}
</style>
@endsection
