@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col-md-3">
        <h4>Products</h4>
        <div class="list-group">
            <a href="{{url('/motorcycles')}}" class="list-group-item">Motorcycles</a>
            <a href="{{url('/parts')}}" class="list-group-item">Parts / Accessories</a>
        </div>
    </div>
    <div class="col-md-9">
        <div class="jumbotron">
            <h1>GM Cycle</h1>
        </div>
    </div>
</div>
<div class="row">
    @foreach($motors as $coun => $motor)
            {{-- @if($coun < 3) --}}
                <div class="col-md-3 {{$coun == 0 ? "col-md-offset-3": null}}">
                    <div class="thumbnail">
                        <div class="well">{{$motor->name}}</div>
                        <img src="{{ asset('images/dummy.jpg') }}" alt="X" height="231" width="231" class="img-thumbnail img-responsive">
                        <div class="caption">
                            @if(\Auth::guest())
                            <a href="{{url('login')}}" class="btn btn-success form-control">Reserve</a>
                            @else
                            <button class="btn form-control {{ \Auth::user()->orders()->where('stock_id', $motor->id)->count() ? "btn-danger":"btn-success" }}" data-id="{{$motor->id}}" id="btn_reserve">
                            {{ \Auth::user()->orders()->where('stock_id', $motor->id)->count() ? "Remove from Wishlist": "Reserve" }}
                            </button>
                            @endif
                        </div>
                    </div>
                </div>
            {{-- @endif --}}
    @endforeach
</div>
<div class="row">
    @foreach($parts as $part)
            {{-- @if($coun < 3) --}}
                <div class="col-md-3 {{$coun == 0 ? "col-md-offset-3": null}}">
                    <div class="thumbnail">
                        <div class="well">{{$part->name}}</div>
                        <img src="{{ asset('images/dummy.jpg') }}" alt="X" height="231" width="231" class="img-thumbnail img-responsive">
                        <div class="caption">
                            @if(\Auth::guest())
                            <a href="{{url('login')}}" class="btn btn-success form-control">Reserve</a>
                            @else
                            <button class="btn form-control {{ \Auth::user()->orders()->where('stock_id', $part->id)->count() ? "btn-danger":"btn-success" }}" data-id="{{$part->id}}" id="btn_reserve">
                            {{ \Auth::user()->orders()->where('stock_id', $part->id)->count() ? "Remove from Wishlist": "Reserve" }}
                            </button>
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
        if (clas === "btn form-control btn-success") {
            var route = "{{url('add/order/stock')}}";
                $(this).removeClass('btn-success');
                $(this).addClass('btn-danger');
                $(this).html("Remove from Wishlist");
                swal(
                    'Added!',
                    'Your item added from wishlist',
                    'success'
                )
        }else{
            var route = "{{url('remove/order/stock')}}";
                $(this).removeClass('btn-danger');
                $(this).addClass('btn-success');
                $(this).html("Reserve");
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
