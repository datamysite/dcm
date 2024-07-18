<form id="edit_retialer_blog_form" action="{{route('admin.retailer.blog.update')}}">
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
      <div class="col-md-6">
        <div class="form-group">
          <label>Heading</label>
          <input type="text" class="form-control" name="heading" value="{{$data->heading}}" required>
        </div>
      </div>
      <div class="col-md-3">
        <div class="form-group">
          <label>Country</label>
          <select class="form-control" name="country" required>
            @foreach($country as $val)
            <option value="{{$val->id}}" {{$data->country_id == $val->id ? 'selected' : ''}}>{{$val->shortname}}</option>
            @endforeach
          </select>
        </div>
      </div>
      <div class="col-md-3">
        <div class="form-group">
          <label>Section</label>
          <select class="form-control" name="section_id" required>
 
            <option value="1" {{ $data->section_id == 1 ? 'selected' : '' }}>Header</option>
            <option value="2" {{ $data->section_id  == 2 ? 'selected' : '' }}>Footer</option>

          </select>
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