<form id="edit_author_form" action="{{route('admin.author.create')}}" enctype="multipart/form-data">
  @csrf
  <input type="hidden" name="author_id" value="{{base64_encode($data->id)}}">
  <div class="modal-header">
    <h4 class="modal-title">Edit Author</h4>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
  <div class="modal-body">
    <div class="row">
      <div class="col-md-12">
        <div class="edit_category-image-wrapper file-set" style="background-image: url({{URL::to('/public/storage/authors/'.$data->image)}});">
          <input type="file" name="edit_author_image" accept="image/*" />
          <div class="close-btn">×</div>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-md-6">
        <div class="form-group">
          <label>Author Full Name</label>
          <input type="text" class="form-control eauthorName" name="name" value="{{$data->name}}" required>
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group">
          <label>Slug</label>
          <input type="text" class="form-control eauthorSlug" name="slug" required readonly="readonly" value="{{$data->slug}}" >
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-md-12">
        <div class="form-group">
          <label>About Author</label>
          <textarea class="form-control" name="about" id="content2" rows="10">{{$data->about}}</textarea>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-md-4">
        <div class="form-group">
          <label>LinkedIn URL</label>
          <input type="text" class="form-control" name="linkedin_url" value="{{$data->linkedin_url}}" >
        </div>
      </div>
      <div class="col-md-4">
        <div class="form-group">
          <label>X (Twitter) URL</label>
          <input type="text" class="form-control" name="x_url" value="{{$data->x_url}}" >
        </div>
      </div>
      <div class="col-md-4">
        <div class="form-group">
          <label>Facebook URL</label>
          <input type="text" class="form-control" name="facebook_url" value="{{$data->facebook_url}}" >
        </div>
      </div>
    </div>

  </div>
  <div class="modal-footer justify-content-between">
    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
    <button type="submit" class="btn btn-primary">Save changes</button>
  </div>
</form>