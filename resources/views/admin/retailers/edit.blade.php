<form id="edit_retialer_form" action="{{route('admin.retailer.update')}}" enctype="multipart/form-data">
  @csrf
  <input type="hidden" name="retailer_id" value="{{base64_encode($data->id)}}">
  <div class="modal-header">
    <h4 class="modal-title">Edit Retailer</h4>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
  <div class="modal-body">
    <div class="row">
      <div class="col-md-12">

        <div class="edit_retailer-image-wrapper file-set" style="background-image: url({{URL::to('/public/storage/retailers/'.$data->logo)}});">
          <input type="file" name="edit_retailer_image" accept="image/*"/>
          <div class="close-btn">×</div>
        </div>
        <br>
        <div class="form-group">
          <label>Name</label>
          <input type="text" class="form-control editRetailerName" value="{{$data->name}}" name="name" required>
        </div>
        <div class="form-group">
          <label>Slug <span>{{env('APP_DOMAIN')}}store/<strong>"slug-here"</strong></span></label>
          <input type="text" class="form-control editRetailerSlug" value="{{$data->slug}}" name="slug" required>
        </div>
        <div class="form-group">
          <label>Operational Countries</label>
          <select class="form-control" name="country[]" multiple required>
            @foreach($countries as $val)
              <option value="{{$val->id}}"
                @foreach($data->countries as $cval)
                  @if($cval->country_id == $val->id)
                    selected
                  @endif
                @endforeach
              >{{$val->shortname}}</option>
            @endforeach
          </select>
        </div>
        <div class="form-group">
          <label>Online Store Link# <small>(Optional)</small></label>
          <input type="url" class="form-control" name="store_link" value="{{$data->store_link}}">
        </div>
        <div class="form-group">
          <label>Discount Upto %</label>
          <input type="number" class="form-control" name="discount_upto" value="{{$data->discount_upto}}" required>
        </div>
        <div class="form-group">
          <label>Discount Tags</label>
          <input type="text" class="form-control" name="discount_tags" value="{{$data->discount_tags}}" required>
        </div>
      </div>
    </div>
  </div>
  <div class="modal-footer justify-content-between">
    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
    <button type="submit" class="btn btn-primary">Save changes</button>
  </div>
</form>