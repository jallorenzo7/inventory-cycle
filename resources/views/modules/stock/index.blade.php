@extends('layouts.app')
@section('content')
<h2>Stocks</h2>
<a href="{{ route('stock.create') }}" class="btn btn-default">New Stock</a>
<br>
<br>
<div class="table-responsive">
    <table class="table-bordered" id="stock-table">
        <thead>
            <tr>
                <th>Type</th>
                <th>Name</th>
                <th>Part No</th>
                <th>Model No</th>
                <th>Engine No</th>
                <th>Frame No</th>
                <th>Color</th>
                {{-- <th>Quantity</th>
                <th>Initial Quantity</th> --}}
                <th>Price</th>
                <th>Initial Price</th>
                <th>Discount</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($stocks as $stock)
            <tr>
                <td>{{ $stock->type }}</td>
                <td>{{ $stock->name }}</td>
                <td>{{ $stock->part_no }}</td>
                <td>{{ $stock->model_no }}</td>
                <td>{{ $stock->engine_no }}</td>
                <td>{{ $stock->frame_no }}</td>
                <td>{{ $stock->color }}</td>
                {{-- <td>{{ $stock->quantity }}</td>
                <td>{{ $stock->initial_quantity }}</td> --}}
                <td>{{ $stock->price }}</td>
                <td>{{ $stock->initial_price }}</td>
                <td>{{ $stock->discount }}</td>
                <td>
                    <a href="{{ route('stock.edit', $stock->id) }}">
                    <button class="btn btn-default">
                        <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                    </button>
                    </a>
                    <button class="btn btn-default" id="stock-delete" data-id="{{ $stock->id }}">
                        <i class="fa fa-trash" aria-hidden="true"></i>
                    </button>
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
                $.ajaxSetup({
                  headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                  }
                });
                $.ajax({
                    method: 'POST',
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
