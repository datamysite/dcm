<form id="edit_state_form" action="{{route('admin.states.create')}}">
    @csrf
    <input type="hidden" name="state_id" value="{{base64_encode($data->id)}}">
    <div class="modal-header">
      <h4 class="modal-title">Edit State</h4>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    <div class="modal-body">
      <div class="row">
        <div class="col-md-12">
          <div class="edit_category-image-wrapper file-set" style="background-image: url({{URL::to('/public/storage/states/'.$data->image)}});">
            <input type="file" name="edit_category_image" accept="image/*" />
            <div class="close-btn">×</div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="form-group">
            <label>Country</label>
            <select class="form-control" name="country_id" required>
              @foreach($countries as $val)
                <option value="{{$val->id}}" {{$data->country_id == $val->id ? 'selected' : ''}}>{{$val->name}}</option>
              @endforeach
            </select>
          </div>
        </div>
      </div>
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
            <label>Short Name</label>
            <input type="text" class="form-control" name="shortname" value="{{$data->shortname}}" required>
          </div>
        </div>
      </div>
    </div>
    <div class="modal-footer justify-content-between">
      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      <button type="submit" class="btn btn-primary">Save changes</button>
    </div>
  </form>