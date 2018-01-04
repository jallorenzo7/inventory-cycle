@extends('layouts.app')
@section('content')
<h2>Transactions</h2>
<div class="table-responsive">
    <table class="table-bordered" id="order-table">
        <thead>
            <tr>
                <th>User</th>
                <th>Type</th>
                <th>Name</th>
                <th>Price</th>
                <th>Discount</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($orders as $order)
            <tr>
                <td>{{ $order->user()->first()->first_name }} {{ $order->user()->first()->middle_name }} {{ $order->user()->first()->last_name }}</td>
                <td>{{ $order->stock()->first()->type }}</td>
                <td>{{ $order->stock()->first()->name }}</td>
                <td>{{ $order->stock()->first()->price }}</td>
                <td>{{ $order->stock()->first()->discount }}</td>
                <td>{{ $order->status }}</td>
                <td>
                    <a href="{{ url('billing/edit/'. $order->id) }}">
                    <button class="btn btn-default">
                        <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                    </button>
                    </a>
                </td>
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
