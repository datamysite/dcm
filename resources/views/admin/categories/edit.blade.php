<form id="edit_category_form" action="{{route('admin.categories.create')}}" enctype="multipart/form-data">
  @csrf
  <input type="hidden" name="cat_id" value="{{base64_encode($data->id)}}">
  <div class="modal-header">
    <h4 class="modal-title">Edit Category</h4>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
  <div class="modal-body">
    <div class="row">
      <div class="col-md-12">
        <div class="edit_category-image-wrapper file-set" style="background-image: url({{URL::to('/public/storage/categories/'.$data->image)}});">
          <input type="file" name="edit_category_image" accept="image/*" />
          <div class="close-btn">×</div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <div class="form-group">
          <label>Name</label>
          <input type="text" class="form-control" name="name" value="{{$data->name}}" required>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <div class="form-group">
          <label>AR Name</label>
          <input type="text" class="form-control" name="name_ar" value="{{$data->name_ar}}" required>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <div class="form-group">
          <label>Parent Category</label>

          <select class="form-control" name="parent_id">
            <option value="">Select</option>
            @foreach ($parent_categories as $parent_category)
            @if ($parent_category->id != $data->id)
            <option value="{{ $parent_category->id }}" {{$data->parent_id == $parent_category->id ? 'selected' : ''}}>{{ $parent_category->name }}</option>
            @endif
            @endforeach
          </select>

        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <div class="form-group text-center">
          <input type="radio" id="category_type" name="category_type" value="1" {{ $data->type  == 1 ? 'checked' : '' }}><label style="padding-left: 5px;">Online</label>
          <input type="radio" id="category_type" name="category_type" value="2" {{ $data->type  == 2 ? 'checked' : '' }}><label style="padding-left: 5px;">Retail</label>
          <input type="radio" id="category_type" name="category_type" value="3" {{ $data->type  == 3 ? 'checked' : '' }}><label style="padding-left: 5px;">Both</label>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <div class="form-group">
          <label>Max. Discount %</label>
          <input type="number" class="form-control" step="any" value="{{$data->max_discount}}" name="max_discount" required>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <div class="form-group">
          <label>Order on Main Menu</label>
          <input type="number" class="form-control" value="{{$data->order}}" name="category_order" required>
        </div>
      </div>
    </div>
  </div>
  <div class="modal-footer justify-content-between">
    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
    <button type="submit" class="btn btn-primary">Save changes</button>
  </div>
</form>