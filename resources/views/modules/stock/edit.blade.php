@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <h2>Create Stock</h2>
        <div class="panel panel-default">
            <div class="panel-body">
                <form action="{{ route('stock.update', $stock->id) }}" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <input type="hidden" name="_method" type="hidden" value="PUT">
                    <input type="hidden" name="id" value="{{$stock->id}}">
                    <div class="row">
                        <div class="col s12">
                            <center>
                                <img src="{{ $stock->image === 'dummy.jpg' ? asset('images/'.$stock->image) : $stock->image }}" alt="avatar" id="avatar" height="300" width="300">
                                <input type="file" name="img_src" id="img_src" class="hide"  accept="image/x-png,image/gif,image/jpeg">
                            </center>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="type">Type</label>
                                <select name="type" class="form-control" id="type">
                                    <option value="" disabled="">Select Type</option>
                                    <option value="motor" {{ $stock === "motor" ? "selected" : null }}>Motor</option>
                                    <option value="part"  {{ $stock === "part" ? "selected" : null }}>Part</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" class="form-control" id="name" value="{{$stock->name}}" name="name">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="part_no">Part No</label>
                                <input disabled type="text" class="form-control" value="{{$stock->part_no}}" id="part_no" name="part_no">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="model_no">Model No</label>
                                <input disabled type="text" class="form-control" value="{{$stock->model_no}}" id="model_no" name="model_no">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="engine_no">Engine No</label>
                                <input disabled type="text" class="form-control" value="{{$stock->engine_no}}" id="engine_no" name="engine_no">
                            </div>
                        </div>
{{--                         <div class="col-md-4">
                            <div class="form-group">
                                <label for="frame_no">Frame No</label>
                                <input disabled type="text" class="form-control" value="{{$stock->frame_no}}" id="frame_no" name="frame_no">
                            </div>
                        </div> --}}
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="color">Color</label>
                                <input disabled type="text" class="form-control" value="{{$stock->color}}" id="color" name="color">
                            </div>
                        </div>
       {{--                  <div class="col-md-4">
                            <div class="form-group">
                                <label for="quantity">Quantity</label>
                                <input type="text" class="form-control" value="{{$stock->quantity}}" id="quantity" name="quantity">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="initial_quantity">Initial Quantity</label>
                                <input type="text" class="form-control" value="{{$stock->initial_quantity}}" id="initial_quantity" name="initial_quantity">
                            </div>
                        </div> --}}
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="price">Price</label>
                                <input type="text" class="form-control" value="{{$stock->price}}" id="price" name="price">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="initial_price">Initial Price</label>
                                <input type="text" class="form-control" value="{{$stock->initial_price}}" id="initial_price" name="initial_price">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="discount">Discount (%)</label>
                                <input type="text" class="form-control" value="{{$stock->discount}}" id="discount" name="discount">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="remarks">Remarks</label>
                                <textarea style="resize: none;" class="form-control" rows="5" id="remarks" name="remarks">{{$stock->remarks}}</textarea>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <button class="btn btn-success form-control">Save</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
<script>
$('#type').on('change',function(){
    var type = $('#type').val();
    if (type === 'motor') {
        $('#model_no').prop( "disabled", false);
        $('#engine_no').prop( "disabled", false);
        $('#frame_no').prop( "disabled", false);
        $('#color').prop( "disabled", false);
        $('#part_no').prop( "disabled", true).val('');
    }else{
        $('#model_no').prop( "disabled", true).val('');
        $('#engine_no').prop( "disabled", true).val('');
        $('#frame_no').prop( "disabled", true).val('');
        $('#color').prop( "disabled", true).val('');
        $('#part_no').prop( "disabled", false);
    }
});


$('#avatar').on('click',function(){
    $('#img_src').click();
});

function readURL(input) {

  if (input.files && input.files[0]) {
    var reader = new FileReader();

    reader.onload = function(e) {
      $('#avatar').attr('src', e.target.result);
    }

    reader.readAsDataURL(input.files[0]);
  }
}

$("#img_src").change(function() {
  readURL(this);
});
</script>
@endsection
