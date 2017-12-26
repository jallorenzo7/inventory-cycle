@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <h2>Stocks</h2>
        <a href="{{ route('stock.create') }}" class="btn btn-primary">New Stock</a>
        <br>
        <br>
        <div class="table-responsive">
            <table class="table" id="stock-table">
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
                            <button class="btn btn-warning">Edit</button>
                            <button class="btn btn-danger" id="stock-delete" data-id="{{ $stock->id }}">Delete</button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
@section('script')
<script>
    $(document).ready(function(){
        $('#stock-table').DataTable();
    });
    $(document).on('click','[id=stock-delete]', function(){
        var id = $(this).data('id');
        var route = '{{ url('stock') }}' + '/' + id;
        swal({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
            if (result.value) {
                $.ajax({
                    method: 'post',
                    url: route,
                    data:{
                        '_token': $('input[name=_token]').val(),
                        '_method': 'DELETE',
                    },
                    jsonp: false,
                    success: function(data){
                        swal(
                            'Deleted!',
                            'Your file has been deleted.',
                            'success'
                        )
                        location.reload();
                    }
                });
            }
        })
    });
</script>
@endsection
