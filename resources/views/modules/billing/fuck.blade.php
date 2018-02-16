@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <h2>Statement of Account</h2>
        <div class="panel panel-default">
            <div class="panel-body">
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
                            <span class="form-control">{{$order->stock()->first()->price}}</span>
                        </div>
                    </div>
                    <div class="col-md-6 col-md-offset-6">
                        <div class="form-group">
                            <label for="price">Remaining Balance</label>
                            @if($order->status === "completed")
                            <span class="form-control" id="total_amount">0.00</span>
                            @else
                            <span class="form-control" id="total_amount">{{ $price }}</span>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
        <div class="row">
            <hr>
            <div class="panel panel-default">
                <div class="panel-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Amount Received</th>
                                <th>Remaining Balance</th>
                                <th>Date Transaction</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($transactions as $t)
                            <tr>
                                <td>{{ $t->amount_received }}</td>
                                <td>{{ $t->total }}</td>
                                <td>{{ $t->date_transaction }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    @endsection
    @section('script')
    <script>
    $(document).ready(function(){
        $('#billing-table').DataTable({
            'iDisplayLength': 100
        });
    });
    window.print();
    </script>
    @endsection
