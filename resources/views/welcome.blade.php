@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col-md-3">
        <h4>Products</h4>
        <div class="list-group">
            <a href="#" class="list-group-item">Motorcycles</a>
            <a href="#" class="list-group-item">Parts / Accessories</a>
        </div>
        <h4>Brands</h4>
        <div class="list-group">
            <a href="#" class="list-group-item">Honda</a>
            <a href="#" class="list-group-item">Kawasaki</a>
            <a href="#" class="list-group-item">Suzuki</a>
            <a href="#" class="list-group-item">Yamaha</a>
        </div>
    </div>
    <div class="col-md-9">
        <div class="jumbotron">
            <h1>GM Cycle</h1>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua</p>
        </div>
    </div>
</div>
<div class="row">
    @foreach($motors as $coun => $motor)
            {{-- @if($coun < 3) --}}
                <div class="col-md-3 {{$coun == 0 ? "col-md-offset-3": null}}">
                    <div class="thumbnail">
                        <div class="well">{{$motor->name}}</div>
                        @if($motor->discount != "0")
                        <div class="alert alert-info">
                          <strong>SALE!</strong>
                        </div>
                        @endif
                        <img src="{{ asset('images/dummy.jpg') }}" alt="X" height="231" width="231" class="img-thumbnail img-responsive">
                        <div class="caption">
                            @if(\Auth::guest())
                            <a href="{{url('login')}}" class="btn btn-success form-control">Reserve</a>
                            @else
                            <button class="btn form-control {{ \Auth::user()->orders()->where('stock_id', $motor->id)->count() ? "btn-success":"btn-info" }}" data-id="{{$motor->id}}" id="btn_reserve">Reserve</button>
                            @endif
                        </div>
                    </div>
                </div>
            {{-- @endif --}}
    @endforeach
</div>
{{ csrf_field() }}
@endsection
@section('script')
@if(!\Auth::guest())
<script>
    $(document).on('click','[id=btn_reserve]', function(){
        var id = $(this).data('id');
        var clas = $(this).attr('class').toString();
        if (clas === "btn form-control btn-info") {
            var route = "{{url('add/order/stock')}}";
                $(this).removeClass('btn-info');
                $(this).addClass('btn-success');
                swal(
                    'Added!',
                    'Your item added from wishlist',
                    'success'
                )
        }else{
            var route = "{{url('remove/order/stock')}}";
                $(this).removeClass('btn-success');
                $(this).addClass('btn-info');
                swal(
                    'Removed!',
                    'Your item removed from wishlist',
                    'success'
                )
        }
        $.ajax({
        method: 'post',
        url: route,
        data:{
            '_token': $('input[name=_token]').val(),
            'id': id
            },
        jsonp: false,
        success: function(data){
        }
        });
    });
</script>
@endif
@endsection
