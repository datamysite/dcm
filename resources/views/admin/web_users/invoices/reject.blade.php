<form method="post" action="{{route('admin.users.withdraw.reject')}}" enctype="multipart/form-data">
  @csrf
  <input type="hidden" name="request_id" value="{{base64_encode($request->id)}}">
  <div class="modal-header">
    <h4 class="modal-title">Reject Withdraw Request</h4>
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
          <label>Reason of Rejection</label>
          <textarea class="form-control" name="reason" rows="5" id="rejectReason" required></textarea>
        </div>
      </div>
    </div>
  </div>
  <div class="modal-footer justify-content-between">
    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
    <button type="submit" class="btn btn-danger">Reject</button>
  </div>
</form>