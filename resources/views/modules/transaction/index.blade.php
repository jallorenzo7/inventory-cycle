@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col-md-4">
        <div class="well">
            <h4>Transaction Reports</h4>
            <form action="{{ route('transaction.report') }}" method="get" target="_blank">
                <div class="row">
                    <div class="form-group">
                        <div class="col-md-6">
                            <label class="control-label" for="from">From:</label>
                            <input type="date" name="from" class="form-control" value="{{ date('Y-m-d') }}">
                        </div>
                        <div class="col-md-6">
                            <label class="control-label" for="to">To:</label>
                            <input type="date" name="to" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12">
                            <br>
                            <button class="form-control btn btn-primary">Submit</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<h2>Transactions</h2>
<div class="table-responsive">
    <table class="table-bordered" id="order-table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Product</th>
                <th>Amount Received</th>
                <th>Remaining Balance</th>
            </tr>
        </thead>
        <tbody>
            @foreach($transactions as $x)
            <tr>
                <td>{{ $x->id }}</td>
                <td>{{ $x->user()->first()->first_name }} {{ $x->user()->first()->last_name }}</td>
                <td>{{ $x->stock()->first()->name }}</td>
                <td>{{ $x->amount_received }}</td>
                <td>{{ $x->total }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
@section('script')
<script>
$(document).ready(function(){
$('#order-table').DataTable();
});
</script>
@endsection
