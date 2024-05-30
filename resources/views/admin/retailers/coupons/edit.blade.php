<form id="edit_retialer_coupon_form" action="{{route('admin.retailer.coupon.update')}}">
  @csrf
  <input type="hidden" name="coupon_id" value="{{base64_encode($data->id)}}">
  <div class="modal-header">
    <h4 class="modal-title">Edit Coupon</h4>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
  <div class="modal-body">
    <div class="row">
      <div class="col-md-12">
        <div class="edit_coupon-image-wrapper file-set" style="background-image: url({{URL::to('/public/storage/retailers/coupons/'.$data->banner)}});">
          <input type="file" name="edit_coupon_image" accept="image/*" />
          <div class="close-btn">×</div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-8">
        <div class="form-group">
          <label>Coupon Code</label>
          <input type="text" class="form-control" name="code" value="{{$data->code}}" required>
        </div>

        <div class="form-group">
          <label>Heading</label>
          <input type="text" class="form-control eheading_en" name="heading" value="{{$data->heading}}" required>
        </div>
        <div class="form-group">
          <label>Heading <small>(Ar)</small></label>
          <input type="text" class="form-control eheading_ar" dir="rtl" value="{{$data->heading_ar}}" name="heading_ar" required>
        </div>

        <div class="form-group">
          <label>Link# <small>(Optional)</small></label>
          <input type="link" class="form-control" value="{{$data->link}}" name="link">
        </div>
      </div>
      <div class="col-md-4">
        <div class="form-group retailerCategories">
          <label>Categories</label>
          <select class="form-control" name="categories[]" multiple required>
            @foreach($categories as $val)
              @php $check = 0; @endphp
              @foreach($data->categories as $cval)
                @php if($val->category_id == $cval->category_id){ $check = 1;} @endphp
              @endforeach
              @if($val->category->parent_id == 0)
                <option value="{{$val->category_id}}" {{$check == 1 ? 'selected' : ''}}>{{@$val->category->name}}</option>
              @else
                <optgroup>
                  <option value="{{$val->category_id}}" {{$check == 1 ? 'selected' : ''}}>-&nbsp;&nbsp;{{@$val->category->name}}</option>
                </optgroup>
              @endif
            @endforeach
          </select>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-3">
        <div class="form-group">
          <label>Discount %</label>
          <input type="number" class="form-control discountCalculate discount" value="{{$data->discount}}" min="1" max="100" name="discount" required>
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group">
          <label>Discount Tags <small>(Optional)</small></label>
          <input type="text" class="form-control" name="discount_tags" value="{{$data->discount_tags}}">
        </div>
      </div>
      <div class="col-md-3">
        <div class="form-group">
          <label>DCM Cashback % <small>(Optional)</small></label>
          <input type="number" class="form-control discountCalculate dcmCashback" value="{{$data->dcm_cashback}}" value="0" min="0" max="100" name="dcm_cashback">
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-3">
        <div class="form-group">
          <label>Total Discount %</label>
          <input type="number" class="form-control totalDiscount" min="1" max="100" value="{{$data->total_discount}}" name="total_discount" readonly>
        </div>
      </div>
      <div class="col-md-4">
        <div class="form-group">
          <label>People Used</label>
          <input type="number" class="form-control" name="people_used" value="{{$data->people_used}}" required>
        </div>
      </div>
      <div class="col-md-5">
        <div class="form-group">
          <label>Country</label>
          <select class="form-control" name="country" required>
            @foreach($country as $val)
              <option value="{{$val->id}}" {{$val->id == $data->country_id ? 'selected' : ''}}>{{$val->shortname}}</option>
            @endforeach
          </select>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <div class="form-group">
          <label>Description <small>(Optional)</small></label>
          <textarea class="form-control" name="description" rows="4">{{$data->description}}</textarea>
        </div>
      </div>
    </div>
  </div>
  <div class="modal-footer justify-content-between">
    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
    <button type="submit" class="btn btn-primary">Save changes</button>
  </div>
</form>