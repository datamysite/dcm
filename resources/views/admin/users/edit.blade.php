<form id="edit_users_form" action="{{route('admin.users.update')}}" enctype="multipart/form-data">
  @csrf
  <input type="hidden" name="user_id" value="{{base64_encode($data->id)}}">
  <div class="modal-header">
    <h4 class="modal-title">Edit User</h4>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
  <div class="modal-body">
    <div class="row">
      <div class="col-md-12">
        <div class="edit_profile-image-wrapper file-set" style="background-image: url({{URL::to('/public/storage/users/'.$data->image)}});">
          <input type="file" name="edit_profile_image" accept="image/*" />
          <div class="close-btn">×</div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-6">
        <div class="form-group">
          <label>Name</label>
          <input type="text" class="form-control" name="name" value="{{$data->fullname}}" required>
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group">
          <label>Username</label>
          <input type="text" class="form-control" name="username" value="{{$data->username}}" readonly>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <div class="form-group">
          <label>Access Role</label>
          <select class="form-control" name="designation" required>
            <option value="">Select</option>
            <option value="admin" {{$data->designation == 'admin' ? 'selected' : ''}}>Administrator</option>
            <option value="seo_support" {{$data->designation == 'seo_support' ? 'selected' : ''}}>SEO Support</option>
          </select>
        </div>
      </div>
    </div>
  </div>
  <div class="modal-footer justify-content-between">
    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
    <button type="submit" class="btn btn-primary">Save changes</button>
  </div>
</form>