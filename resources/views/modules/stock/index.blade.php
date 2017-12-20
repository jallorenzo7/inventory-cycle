@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <h2>Stocks</h2>
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>Model No</th>
                        <th>Engine No</th>
                        <th>Frame No</th>
                        <th>Color</th>
                        <th>Quantity</th>
                        <th>Initial Quantity</th>
                        <th>Price</th>
                        <th>Initial Price</th>
                        <th>Discount</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($stocks as $stock)
                    <tr>
                        <td>{{ $stock->model_no }}</td>
                        <td>{{ $stock->engine_no }}</td>
                        <td>{{ $stock->frame_no }}</td>
                        <td>{{ $stock->color }}</td>
                        <td>{{ $stock->quantity }}</td>
                        <td>{{ $stock->initial_quantity }}</td>
                        <td>{{ $stock->price }}</td>
                        <td>{{ $stock->initial_price }}</td>
                        <td>{{ $stock->discount }}</td>
                        <td>
                            <button class="btn btn-default">Edit</button>
                            <button class="btn btn-default">Delete</button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
