<form id="edit_slider_form" action="{{route('admin.home.slider.create')}}" enctype="multipart/form-data">
  @csrf
  <input type="hidden" name="slider_id" value="{{base64_encode($data['slider_data']->id)}}">
  <input type="hidden" name="img_name" value="{{$data['slider_data']->img_name}}">

  <div class="modal-header">
    <h4 class="modal-title">Edit Slider</h4>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
  <div class="modal-body">

    <div class="row">
      <div class="col-md-12">
        <div class="form-group">
          <label>Select Language</label>
          <select class="form-control" name="lang_id" required="required">
            <option value="en" {{ $data['slider_data']->lang == 'en' ? 'selected' : '' }} >English</option>
            <option value="ar" {{ $data['slider_data']->lang  == 'ar' ? 'selected' : '' }} >Arabic</option>
          </select>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-md-12">
        <div class="edit_category-image-wrapper file-set" style="background-image: url({{URL::to('/public/storage/slider/'.$data['slider_data']->img_name)}});">
          <input type="file" name="edit_slider_image" accept="image/*" />
          <div class="close-btn">×</div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <div class="form-group">
          <label>URL</label>
          <input type="text" class="form-control" name="img_url" value="{{$data['slider_data']->img_url}}" required>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <div class="form-group">
          <label>Order On Slider</label>
          <input type="number" class="form-control" name="img_order" value="{{$data['slider_data']->img_order}}" required>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-md-12">
        <div class="form-group">
          <label>Country</label>
          <select class="form-control" name="country_id" required>
            <option value="">Select</option>
            @foreach ($data['country_data'] as $country)
            @if ($country->id == $data['slider_data']->country_id)
            <option value="{{ $country->id }}" selected>{{ $country->name }}</option>
            @else
            <option value="{{ $country->id }}">{{ $country->name }}</option>
            @endif
            @endforeach
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