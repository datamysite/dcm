<form id="edit_inquiry_form" action="{{route('inquiries.update')}}">
  @csrf
  <input type="hidden" name="inq_id" value="{{$inquiry->id}}">
  <div class="modal-header">
    <h4 class="modal-title">Edit Inquiry</h4>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
  <div class="modal-body">
    <div class="row">
      <div class="col-md-12">
        <p class="form-heading">Customer</p>
      </div>
      <div class="col-md-4">
        <div class="form-group">
          <label>Name</label>
          <select class="form-control form-control-lg select2" id="edit_customer_name_field" name="customer" style="width: 100%;">
            <option disabled selected>Select</option>
            @foreach($customers as $val)
              <option value="{{$val->id}}" {{$val->id == $inquiry->customer_id ? 'selected' : ''}}>{{$val->name.'  ( '.$val->contact_person.' - '.$val->contact_person_mobile.' )'}}</option>
            @endforeach
          </select>
        </div>
      </div>
      <div class="col-md-4">
        <div class="form-group">
          <label>Email</label>
          <input type="email" class="form-control" id="edit_customer_email" value="{{$inquiry->customer->email}}" disabled>
        </div>
      </div>
      <div class="col-md-4">
        <div class="form-group">
          <label>Phone</label>
          <input type="text" class="form-control" id="edit_customer_phone" value="{{$inquiry->customer->landline}}" disabled>
        </div>
      </div>
      <div class="col-md-12">
        <div class="form-group">
          <label>Address</label>
          <input type="text" class="form-control" id="edit_customer_address" value="{{$inquiry->customer->shop_no.', '.$inquiry->customer->building_floor.', '.$inquiry->customer->zone->name.', '.$inquiry->customer->state->name.', '.$inquiry->customer->country->name}}" disabled>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-md-12">
        <p class="form-heading">Products</p>
      </div>
      <div class="col-md-12" id="edit_customer_product_tray">
        @foreach($inquiry->products as $key => $val)
          @if($key == 0)
            <div class="row">
              <div class="col-md-4">
                <div class="form-group">
                  <label>Name</label>
                  <select class="form-control form-control-lg select2 edit_customer_add_product_name" style="width: 100%;" name="product[]" required>
                    <option selected="selected" disabled>Select</option>
                    @foreach($products as $pval)
                      <option value="{{$pval->id}}" {{$pval->id == $val->product_id ? 'selected' : ''}}>{{$pval->name}}</option>
                    @endforeach
                  </select>
                </div>
              </div>
              <div class="col-md-2">
                <div class="form-group">
                  <label>Brand</label>
                  <input type="text" class="form-control edit_customer_add_brand" value="{{$val->product->brand->name}}" disabled>
                </div>
              </div>
              <div class="col-md-2">
                <div class="form-group">
                  <label>Category</label>
                  <input type="text" class="form-control edit_customer_add_category" value="{{$val->product->category->name}}" disabled>
                </div>
              </div>
              <div class="col-md-1">
                <div class="form-group">
                  <label>Quantity</label>
                  <input type="number" class="form-control edit_customer_add_qty" value="{{$val->quantity}}" name="qty[]" required>
                </div>
              </div>
              <div class="col-md-2">
                <div class="form-group">
                  <label>Price</label>
                  <input type="text" class="form-control edit_customer_add_price" value="{{number_format($val->price, 2)}}" name="price[]" readonly>
                </div>
              </div>
              <div class="col-md-1">
                <div class="form-group">
                  <button type="button" class="btn btn-primary mt-23 pull-right edit_customer_add_product"><i class="fas fa-plus"></i></button>
                </div>
              </div>
            </div>
          @else
            <div class="row">
              <div class="col-md-4">
                <div class="form-group">
                  <select class="form-control form-control-lg select2 edit_customer_add_product_name" style="width: 100%;" name="product[]" required>
                    <option selected="selected" disabled>Select</option>
                    @foreach($products as $pval)
                      <option value="{{$pval->id}}" {{$pval->id == $val->product_id ? 'selected' : ''}}>{{$pval->name}}</option>
                    @endforeach
                  </select>
                </div>
              </div>
              <div class="col-md-2">
                <div class="form-group">
                  <input type="text" class="form-control edit_customer_add_brand" value="{{$val->product->brand->name}}" disabled>
                </div>
              </div>
              <div class="col-md-2">
                <div class="form-group">
                  <input type="text" class="form-control edit_customer_add_category" value="{{$val->product->category->name}}" disabled>
                </div>
              </div>
              <div class="col-md-1">
                <div class="form-group">
                  <input type="number" class="form-control edit_customer_add_qty" value="{{$val->quantity}}" name="qty[]" required>
                </div>
              </div>
              <div class="col-md-2">
                <div class="form-group">
                  <input type="text" class="form-control edit_customer_add_price" name="price[]" value="{{number_format($val->price, 2)}}" readonly>
                </div>
              </div>
              <div class="col-md-1">
                <div class="form-group">
                  <button type="button" class="btn btn-danger pull-right edit_customer_remove_product"><i class="fas fa-minus"></i></button>
                </div>
              </div>
            </div>
          @endif
        @endforeach
      </div>
    </div>

    <div class="row">
      <div class="col-md-12">
        <p class="form-heading">Additional Information</p>
      </div>
      <div class="col-md-6">
        <div class="form-group">
          <label>Description</label>
          <textarea class="form-control" name="description" rows="5">{{$inquiry->description}}</textarea>
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group">
          <label>Special Remarks</label>
          <textarea class="form-control" name="special_remarks" rows="5">{{$inquiry->special_remarks}}</textarea>
        </div>
      </div>
    </div>
  </div>
  <div class="modal-footer justify-content-between">
    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
    <button type="submit" class="btn btn-primary">Save changes</button>
  </div>
</form>