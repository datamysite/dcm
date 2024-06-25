<form method="post" action="{{route('admin.loyalty.settings.conversionRate.update')}}">
  @csrf
  <input type="hidden" name="rate_id" value="{{$id}}">
  <div class="modal-header">
    <h4 class="modal-title">Edit Conversion Rate</h4>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
  <div class="modal-body">

    <div class="row">
      <div class="col-md-12">
        <div class="form-group">
          <label>Country</label>
          <select class="form-control" name="country_id" readonly>
            <option value="">Select</option>
            @foreach($countries as $val)
              <option value="{{$val->id}}" {{$val->id == $rate->country_id ? 'selected' : ''}}>{{$val->name}}</option>
            @endforeach
          </select>
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group">
          <label>Coins</label>
          <input type="number" step="any" class="form-control" name="coins"  value="{{$rate->coins}}" required>
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group">
          <label>Value</label>
          <input type="number" step="any" class="form-control" name="value"  value="{{$rate->value}}" required>
        </div>
      </div>
    </div>


  </div>
  <div class="modal-footer justify-content-between">
    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
    <button type="submit" class="btn btn-primary">Save changes</button>
  </div>
</form>