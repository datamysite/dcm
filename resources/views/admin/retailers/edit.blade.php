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
      <div class="col-md-6">
        <div class="edit_retailer-image-wrapper file-set" style="background-image: url({{URL::to('/public/storage/retailers/'.$data->logo)}});">
          <input type="file" name="edit_retailer_image" accept="image/*"/>
          <div class="close-btn">×</div>
        </div>
        <div class="form-group">
          <label>Image Alt Tag (En) - <small>(Optional)</small></label>
          <input type="text" class="form-control editImageAlt" value="{{$data->alt_tag}}" name="alt_tag">
        </div>
      </div>
      <div class="col-md-6">
        <div class="ar-edit_retailer-image-wrapper file-set" style="background-image: url({{URL::to('/public/storage/retailers/ar/'.$data->ar_logo)}});">
          <input type="file" name="ar-edit_retailer_image" accept="image/*"/>
          <div class="ar-close-btn">×</div>
        </div>
        <div class="form-group">
          <label>Image Alt Tag (Ar) - <small>(Optional)</small></label>
          <input type="text" class="form-control editImageAlt_ar" value="{{$data->alt_tag_ar}}" name="alt_tag_ar">
        </div>
      </div>
      <div class="col-md-12"><hr></div>
      <div class="col-md-6">
        <div class="form-group">
          <label>Heading (En) - <small>(Optional)</small></label>
          <input type="text" class="form-control editRetailerheading" value="{{$data->heading}}" name="heading">
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group">
          <label>Heading (Ar) - <small>(Optional)</small></label>
          <input type="text" class="form-control editRetailerheading_ar" value="{{$data->heading_ar}}" style="dir:rtl; text-align: right;" name="heading_ar">
        </div>
      </div>
      <div class="col-md-7">
        <div class="form-group">
          <label>Name</label>
          <input type="text" class="form-control editRetailerName" value="{{$data->name}}" name="name" required>
        </div>
        <div class="form-group">
          <label>Slug <span>{{env('APP_DOMAIN')}}en/<strong>"slug-here"</strong></span></label>
          <input type="text" class="form-control editRetailerSlug" value="{{$data->slug}}" name="slug" required>
        </div>
        <div class="form-group form-control type-radio">
          <div class="custom-radio">
            <input class="custom-control-input" type="radio" id="type4" name="type" value="1" {{$data->type == '1' ? 'checked' : ''}}>
            <label for="type4" class="custom-control-label">Online</label>
          </div>
          <div class="custom-radio">
            <input class="custom-control-input" type="radio" id="type5" name="type" value="2" {{$data->type == '2' ? 'checked' : ''}}>
            <label for="type5" class="custom-control-label">Retail</label>
          </div>
          <div class="custom-radio">
            <input class="custom-control-input" type="radio" id="type6" name="type" value="3" {{$data->type == '3' ? 'checked' : ''}}>
            <label for="type6" class="custom-control-label">Both</label>
          </div>
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
          <label>Operational States</label>
          <select class="form-control" name="states[]" multiple required>
            @foreach($states as $val)
              <option value="{{$val->id}}"
                @foreach($data->states as $cval)
                  @if($cval->state_id == $val->id)
                    selected
                  @endif
                @endforeach
              >{{$val->name}}</option>
            @endforeach
          </select>
        </div>
      </div>
      <div class="col-md-5">
        <div class="form-group retailerCategories">
          <label>Categories</label>
          <select class="form-control" name="categories[]" multiple required>
            @foreach($categories as $val)
              <option value="{{$val->id}}"
                @foreach($data->categories as $cval)
                  @if($cval->category_id == $val->id)
                    selected
                  @endif
                @endforeach
              >{{$val->name}}</option>
              @if(count($val->subCategories) != 0)
                <optgroup>
                  @foreach($val->subCategories as $sval)
                    <option value="{{$sval->id}}"
                      @foreach($data->categories as $cval)
                        @if($cval->category_id == $sval->id)
                          selected
                        @endif
                      @endforeach
                    >-&nbsp;&nbsp;{{$sval->name}}</option>
                  @endforeach
                </optgroup>
              @endif
            @endforeach
          </select>
        </div>
      </div>
      <div class="col-md-9">
        <div class="form-group">
          <label>Link# <small>(Optional)</small></label>
          <input type="url" class="form-control" name="store_link" value="{{$data->store_link}}">
        </div>
      </div>
      <div class="col-md-3">
        <div class="form-group">
          <label>Link Type </label>
          <select class="form-control" name="link_type">
            <option {{$data->link_type == 'Whatsapp' ? 'selected' : ''}}>Whatsapp</option>
            <option {{$data->link_type == 'Website' ? 'selected' : ''}}>Website</option>
          </select>
        </div>
      </div>
      <div class="col-md-4">
        <div class="form-group">
          <label>Discount Upto %</label>
          <input type="number" class="form-control" name="discount_upto" value="{{$data->discount_upto}}" required>
        </div>
      </div>
      <div class="col-md-8">
        <div class="form-group">
          <label>Discount Tags <small>(Optional)</small></label>
          <input type="text" class="form-control" name="discount_tags" value="{{$data->discount_tags}}">
        </div>
      </div>
    </div>
  </div>
  <div class="modal-footer justify-content-between">
    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
    <button type="submit" class="btn btn-primary">Save changes</button>
  </div>
</form>