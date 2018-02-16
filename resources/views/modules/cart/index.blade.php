@extends('layouts.app')
@section('content')
<h2>Cart</h2>
<div class="table-responsive">
    <table class="table-bordered" id="order-table">
        <thead>
            <tr>
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
                <td>{{ $order['type'] }}</td>
                <td>{{ $order['name'] }}</td>
                <td>{{ $order['price'] }}</td>
                <td>{{ $order['discount'] }}</td>
                <td>{{ $order['status'] }}</td>
                <td>
                    {{-- <form action="{{ route('order.destroy', $order['order_id']) }}" method="POST">
                        {{ csrf_field() }}
                        <input type="hidden" name="_method" value="DELETE" />
                        <button type="submit" class="btn btn-default">
                        <i class="fa fa-remove" aria-hidden="true"></i>
                        </button>
                    </form> --}}

                    <a href="{{ url('billing/edit/'. $order['order_id']) }}">
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
