
  <div class="modal-header">
    <h4 class="modal-title">Genie Wish Request</h4>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
  <div class="modal-body">
    <div class="row">
      <div class="col-md-12">
        <div class="user-profile-block">
          <p>
            <label>{{@$request->user->name}}</label>
            <span>{{@$request->user->email}}</span>
          </p>
          <span>Request No: <strong>{{sprintf("%05d", $request->id)}}</strong></span>
        </div>
        <hr>
      </div>
    </div>
    <div class="row">
      <div class="col-md-6">
        <div class="form-group">
          <label>Coins</label>
          <input type="text" class="form-control" value="{{number_format($request->coins)}}" disabled>
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group">
          <label>Amount</label>
          <input type="text" class="form-control" value="{{number_format($request->amount).' '.$request->curr}}" disabled>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <div class="form-group">
          <label>Reference link:</label>
          <p><a href="{{$request->link}}" target="_blank">{{$request->link}}</a></p>
        </div>
      </div>
      <div class="col-md-12">
        <div class="form-group">
          <label>Description:</label><hr>
          <p>{{$request->description}}</p>
        </div>
      </div>
    </div>
  </div>
