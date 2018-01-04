@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <h2>Billing</h2>
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
                            <span class="form-control" id="total_amount">{{ $order->stock()->first()->price }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="panel panel-default">
            <form action="" method="POST">
                {{ csrf_field() }}
                <input type="hidden" name="user_id" value="{{ $order->user()->first()->id }}">
                <input type="hidden" name="stock_id" value="{{ $order->stock()->first()->name }}">
                <div class="panel-body">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="amount_received">Amount Received</label>
                            <input type="text" class="form-control" value="" id="amount_received" name="amount_received">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="total">Total</label>
                            <input type="text" class="form-control" disabled value="" id="total" name="total">
                        </div>
                    </div>
                    <div class="col-md-4">
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
    <div class="row">
        <div class="panel panel-default">
            <div class="panel-body">
                <table id="billing-table">
                    <thead>
                        <tr>
                            <th>Amount Received</th>
                            <th>Total</th>
                            <th>Date Transaction</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>jaskldjfs</td>
                            <td>jaskldjfs</td>
                            <td>jaskldjfs</td>
                        </tr>
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
        $('#billing-table').DataTable();
    });

    $('[id=amount_received]').on('keyup', function(){
        var amount = $(this).val();
        console.log(amount);
    });
</script>
@endsection