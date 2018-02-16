<div id="myModal-{{$item->id}}" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title" id="nameModal">Modal Header</h4>
      </div>
      <div class="modal-body">
        <center>
          <img id="imgModal" src="{{ $item->image === 'dummy.jpg' ? asset('images/'.$item->image) : $item->image }}" width="500">
        </center>
        <br>
          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b id="naModal">Name: {{ $item->name }}</b><br>
          @if(Request::url() == url('/parts'))
          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b id="partModal">Part No.: {{ $item->part_no }}</b><br>
          @endif
          @if(Request::url() == url('/motorcycles'))
          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b id="moModal">Model No.: {{ $item->model_no }}</b><br>
          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b id="enModal">Engine No.: {{ $item->engine_no }}</b><br>
          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b id="fnModal">Frame No.: {{ $item->frame_no }}</b><br>
          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b id="colorModal">Color: {{ $item->color }}</b><br>
          @endif
          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b id="prModal">Price: {{ $item->price }}</b><br>
          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b id="rmModal">Remarks: {{ $item->remarks }}</b><br>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
