<form id="edit_blog_form" action="{{route('admin.blog.update')}}">
  @csrf
  <input type="hidden" name="blog_id" value="{{base64_encode($data->id)}}">
  <div class="modal-header">
    <h4 class="modal-title">Edit Blog</h4>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
  <div class="modal-body">
    <div class="row">
      <div class="col-md-8">
        <div class="edit-mblog-image-wrapper file-set" style="background-image: url({{URL::to('/public/storage/blogs/'.$data->banner)}});">
          <input type="file" name="edit_mblog_image" accept="image/*" />
          <div class="close-btn">×</div>
        </div>
      </div>
      <div class="col-md-4 blog-img-alt">
        <div class="form-group">
          <label>Image alt:</label>
          <input type="text" class="form-control" name="banner_alt" value="{{$data->banner_alt}}" required>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-6">
        <div class="form-group">
          <label>Heading</label>
          <input type="text" class="form-control eblogHeading" value="{{$data->heading}}" name="heading" required>
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group slug-field">
          <label>Slug</label>
          <div class="form-control">
            <span>{{env('APP_DOMAIN')}}blogs/</span>
            <input type="text" class="eblogSlug" name="slug" value="{{$data->slug}}" required>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <div class="form-group">
          <label>Short Description</label>
          <textarea class="form-control" name="short_description" rows="3">{{$data->short_description}}</textarea>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <div class="form-group">
          <label>Description</label>
          <textarea class="form-control" name="description" id="content2" rows="10">{{$data->description}}</textarea>
        </div>
      </div>
    </div>
  </div>
  <div class="modal-footer justify-content-between">
    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
    <button type="submit" class="btn btn-primary">Save changes</button>
  </div>
</form>