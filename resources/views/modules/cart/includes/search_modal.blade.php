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
        <b id="naModal">Name: {{ $item->name }}</b><br>
        @if(Request::url() == url('/parts'))
        <b id="partModal">Part No.: {{ $item->part_no }}</b><br>
        @endif
        @if(Request::url() == url('/motorcycles'))
        <b id="moModal">Model No.: {{ $item->model_no }}</b><br>
        <b id="enModal">Engine No.: {{ $item->engine_no }}</b><br>
        <b id="fnModal">Frame No.: {{ $item->frame_no }}</b><br>
        <b id="colorModal">Color: {{ $item->color }}</b><br>
        @endif
        <b id="prModal">Price: {{ $item->price }}</b><br>
        <b id="rmModal">Remarks: {{ $item->remarks }}</b><br>
        <hr>
        <h3>Reviews</h3>
        <hr>
        @foreach($item->comments()->get() as $com)
        <button type="submit" class="btn btn-default" form="fuck-{{$com->id}}">
        <i class="fa fa-remove" aria-hidden="true"></i>
        </button>&nbsp;<b>{{$com->user()->first()->first_name}} {{$com->user()->first()->last_name}}:</b> {{$com->comment}}
        @if(\Auth::id() == $com->user_id)
        <form id="fuck-{{$com->id}}" onsubmit="return confirm('Do you want to delete this comment?')" action="{{ url('/add/delete') }}" method="POST">
          {{ csrf_field() }}
          <input type="hidden" name="id" value="{{$com->id}}">
        </form>
        @endif
        <hr>
        @endforeach
        @if(!\Auth::guest())
        <div class="form-group">
          <form action="{{ url('/add/comment') }}" method="post">
            {{ csrf_field() }}
            <input type="hidden" name="user_id" value="{{\Auth::id()}}">
            <input type="hidden" name="product_id" value="{{$item->id}}">
            <label for="comment">Review</label>
            <textarea id="comment" name="comment" class="form-control" noresize></textarea><br>
            <input type="submit" class="btn btn-primary form-control" name="">
          </form>
        </div>
        @endif
      </div>
    </div>
  </div>
</div>
