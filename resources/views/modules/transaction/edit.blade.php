@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <h2>Create Stock</h2>
        <div class="panel panel-default">
            <div class="panel-body">
                <form action="" method="POST">
                    {{ csrf_field() }}
                    <input type="hidden" name="order_id" value="{{$order->id}}">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="type">User</label>
                                <span class="form-control">{{ $order->user()->first()->first_name }} {{ $order->user()->first()->middle_name }} {{ $order->user()->first()->last_name }}</span>
                                <input type="hidden" name="user_id" value="{{$order->user()->first()->id}}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="name">Name</label>
                                <span class="form-control">{{ $order->stock()->first()->name }}</span>
                                <input type="hidden" name="stock_id" value="{{ $order->stock()->first()->id }}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="quantity">Quantity</label>
                                <span class="form-control">{{ $order->quantity }}</span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="price">Price</label>
                                <span class="form-control">{{ $order->stock()->first()->price }}</span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="amount_received">Amount Received</label>
                                <input type="text" class="form-control" value="" id="amount_received" name="amount_received">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="total">Total</label>
                                <input type="text" class="form-control" value="" id="total" name="total">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="date_transaction">Date Transaction</label>
                                <input type="date" class="form-control"  id="date_transaction" name="date_transaction">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <button class="btn btn-success form-control">Submit Transaction</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
