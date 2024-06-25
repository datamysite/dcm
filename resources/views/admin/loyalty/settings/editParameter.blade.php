<form method="post" action="{{route('admin.loyalty.settings.eligibility.update')}}">
  @csrf
  <input type="hidden" name="type_id" value="{{$id}}">
  <div class="modal-header">
    <h4 class="modal-title">Edit Eligibility Parameter</h4>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
  <div class="modal-body">

    <div class="row">
      <div class="col-md-12">
        <div class="form-group">
          <label>Country</label>
          <input type="text" class="form-control" name="type" value="{{$type->type}}" readonly>
            
        </div>
      </div>
      <div class="col-md-12">
        <div class="form-group">
          <label>Eligibility <small>(Min)</small></label>
          <input type="number" step="any" class="form-control" name="eligibility"  value="{{$type->eligibility}}" required>
        </div>
      </div>
    </div>


  </div>
  <div class="modal-footer justify-content-between">
    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
    <button type="submit" class="btn btn-primary">Save changes</button>
  </div>
</form>