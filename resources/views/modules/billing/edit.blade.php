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
        @if(Auth::user()->user_type === 'Admin' && $order->status !== "completed")
            <div class="panel panel-default">
                <div class="panel-body">
                    <form action="" method="POST">
                        {{ csrf_field() }}
                        <input type="hidden" name="order_id" value="{{$order->id}}">
                        <input type="hidden" name="user_id" value="{{ $order->user()->first()->id }}">
                        <input type="hidden" name="stock_id" value="{{ $order->stock()->first()->id }}">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="amount_received">Amount Received</label>
                                <input type="text" class="form-control" value="" oninput="validateNumber(this);" id="amount_received" name="amount_received">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="total">Remaining Balance</label>
                                <input type="text" class="form-control" readonly value="" id="total" name="total">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="date_transaction">Date Transaction</label>
                                <input type="date" class="form-control"  id="date_transaction" value="{{date('Y-m-d')}}" name="date_transaction">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <button class="btn btn-success form-control">Submit Transaction</button>
                            </div>
                        </div>
                    </form>
                    <form action="{{ url('/billing/discount') }}" method="POST">
                        {{ csrf_field() }}
                        <input type="hidden" name="order_id" value="{{$order->id}}">
                        <input type="hidden" name="user_id" value="{{ $order->user()->first()->id }}">
                        <input type="hidden" name="stock_id" value="{{ $order->stock()->first()->id }}">
                        <div class="col-md-12">
                            <div class="form-group">
                                <button class="btn btn-primary form-control">Pay in Full</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        @endif
    </div>
    <div class="row">
        <div class="panel panel-default">
            <div class="panel-body">
                <table id="billing-table">
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
        $('#billing-table').DataTable();
    });

    $('[id=amount_received]').on('keyup', function(){
        var amount = $(this).val();
        var tot = $('#total_amount').html();
        var amm = tot - amount;
        $('#total').val(amm.toFixed(2));
    });

    var validNumber = new RegExp(/^\d*\.?\d*$/);
    var lastValid = document.getElementById("amount_received").value;
    function validateNumber(elem) {
          if (validNumber.test(elem.value)) {
            lastValid = elem.value;
          } else {
            elem.value = lastValid;
          }
    }

</script>
@endsection
