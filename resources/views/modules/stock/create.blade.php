@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <h2>Create Stock</h2>
        <div class="panel panel-default">
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="part_name">Part Name</label>
                            <input type="text" class="form-control" id="part_name" name="part_name">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="part_no">Part No</label>
                            <input type="text" class="form-control" id="part_no" name="part_no">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="model_no">Model No</label>
                            <input type="text" class="form-control" id="model_no" name="model_no">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="engine_no">Engine No</label>
                            <input type="text" class="form-control" id="engine_no" name="engine_no">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="frame_no">Frame No</label>
                            <input type="text" class="form-control" id="frame_no" name="frame_no">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="color">Color</label>
                            <input type="text" class="form-control" id="color" name="color">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="quantity">Quantity</label>
                            <input type="text" class="form-control" id="quantity" name="quantity">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="initial_quantity">Initial Quantity</label>
                            <input type="text" class="form-control" id="initial_quantity" name="initial_quantity">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="price">Price</label>
                            <input type="text" class="form-control" id="price" name="price">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="initial_price">Initial Price</label>
                            <input type="text" class="form-control" id="initial_price" name="initial_price">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="discount">Discount</label>
                            <input type="text" class="form-control" id="discount" name="discount">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="remarks">Remarks</label>
                            <textarea style="resize: none;" class="form-control" rows="5" id="remarks" name="remarks"></textarea>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <button class="btn btn-success form-control">Save</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection