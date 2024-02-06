<form id="edit_category_form" action="{{route('admin.countries.create')}}" enctype="multipart/form-data">
  @csrf
  <input type="hidden" name="country_id" value="{{base64_encode($data->id)}}">
  <div class="modal-header">
    <h4 class="modal-title">Edit Country</h4>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
  <div class="modal-body">
    <div class="row">
      <div class="col-md-12">
        <div class="form-group">
          <label>Name</label>
          <input type="text" class="form-control" name="name" value="{{$data->name}}" required>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <div class="form-group">
          <label>Shortname</label>
          <input type="text" class="form-control" value="{{$data->shortname}}" name="shortname" required>
        </div>
      </div>
    </div>
  </div>
  <div class="modal-footer justify-content-between">
    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
    <button type="submit" class="btn btn-primary">Save changes</button>
  </div>
</form>