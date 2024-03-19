<form id="edit_about_form" action="{{route('admin.about.create')}}" enctype="multipart/form-data">
  @csrf
  <input type="hidden" name="about_id" value="{{base64_encode($data['about_data']->id)}}">
  <div class="modal-header">
    <h4 class="modal-title">Edit About Content</h4>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
  <div class="modal-body">

    <div class="row">
      <div class="col-md-12">
        <div class="form-group">
          <label>Section</label>
          <select class="form-control" name="about_section" required="required" id="about-section-select">
          <option value="1" {{ $data['about_data']->section_number == 1 ? 'selected' : '' }}>1st Section</option>
            <option value="2" {{ $data['about_data']->section_number  == 2 ? 'selected' : '' }}>2nd Section</option>
          </select>
        </div>
      </div>
    </div>

    
    <div class="row">
      <div class="col-md-12">
        <div class="form-group">
          <label>Title</label>
          <input type="text" class="form-control" name="about_title" value="{{$data['about_data']->title}}" required>
        </div>
      </div>
    </div>

    
    <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <label>Description</label>
                <textarea class="form-control" name="about_description" id="content2" placeholder="Enter Description" cols="10" rows="10" required>{{$data['about_data']->desc}}</textarea>
              </div>
            </div>
          </div>

    <div class="row" id="about-image-row">
      <div class="col-md-12">
        <div class="edit_category-image-wrapper file-set" style="background-image: url({{URL::to('/public/storage/about/'.$data['about_data']->img)}});">
          <input type="file" name="edit_about_image" accept="image/*" />
          <div class="close-btn">×</div>
        </div>
      </div>
    </div>



  </div>
  <div class="modal-footer justify-content-between">
    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
    <button type="submit" class="btn btn-primary">Save changes</button>
  </div>
</form>