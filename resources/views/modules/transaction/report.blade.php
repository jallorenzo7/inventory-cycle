@extends('layouts.app')
@section('content')
<h2>Transactions: From {{date("M jS, Y", strtotime($date['from']))}} - To {{date("M jS, Y", strtotime($date['to']))}}</h2>
<div class="table-responsive">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Product</th>
                <th>Amount Received</th>
            </tr>
        </thead>
        <tbody>
            @foreach($transactions as $x)
            <tr>
                <td>{{ $x->id }}</td>
                <td>{{ $x->user()->first()->first_name }} {{ $x->user()->first()->last_name }}</td>
                <td>{{ $x->stock()->first()->name }}</td>
                <td>{{ $x->amount_received }}</td>
            </tr>
            @endforeach
            <tr>
                <td></td>
                <td></td>
                <td><b>TOTAL AMOUNT RECEIVED</b></td>
                <td><b>{{ $total_amount_recevied }}</b></td>
            </tr>
        </tbody>
    </table>
</div>
@endsection
@section('script')
<script>
    window.print();
</script>
@endsection
