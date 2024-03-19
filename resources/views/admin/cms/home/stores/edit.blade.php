<form id="edit_form" action="{{route('admin.home.stores.create')}}" enctype="multipart/form-data">
  @csrf
  <input type="hidden" name="homestore_id" value="{{base64_encode($data['stores_data']->id)}}">

  <div class="modal-header">
    <h4 class="modal-title">Edit</h4>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
  <div class="modal-body">


    <div class="row">
      <div class="col-md-12">
        <div class="form-group">
          <label>Type</label>
          <select class="form-control" name="retailer_type" required="required">

            <option value="1" {{ $data['stores_data']->retailer_type == 1 ? 'selected' : '' }}>Online Stores</option>
            <option value="2" {{ $data['stores_data']->retailer_type  == 2 ? 'selected' : '' }}>Retiler Stores</option>
            <option value="3" {{ $data['stores_data']->retailer_type  == 3 ? 'selected' : '' }}>All Stores</option>

          </select>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-md-12">
        <div class="form-group">
          <label>Store/Retailer</label>
          <select class="form-control" name="retailer_id" required>

            @foreach ($data['retailers_data'] as $retailer)
            @if ($retailer->id == $data['stores_data']->retailer_id)
            <option value="{{ $retailer->id }}" selected>{{ $retailer->name }}</option>
            @else
            <option value="{{ $retailer->id }}">{{ $retailer->name }}</option>
            @endif
            @endforeach
          </select>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-md-12">
        <div class="form-group">
          <label>Status</label>
          <select class="form-control" name="status" required="required" id="retailer_type">
            <option value="">Select Status</option>

            <option value="1" {{ $data['stores_data']->status == 1 ? 'selected' : '' }}>Active</option>
            <option value="2" {{ $data['stores_data']->status  == 2 ? 'selected' : '' }}>Not Active</option>

          </select>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-md-12">
        <div class="form-group">
          <label>Order</label>
          <input type="number" class="form-control" name="retailer_order" placeholder="Enter Order Number" value="{{$data['stores_data']->retailer_order}}" required>
        </div>
      </div>
    </div>


    @if($data['stores_data']->retailer_type != '3')
      <div class="row" style="display: block;" id="retailer_title">
        <div class="col-md-12">
          <div class="form-group">
            <label>Title</label>
            <input type="text" class="form-control" name="retailer_title" value="{{$data['stores_data']->retailer_title}}" placeholder="Enter Title" required>
          </div>
        </div>
      </div>
      
      <div class="row" style="display: block;" id="retailer_title">
        <div class="col-md-12">
          <div class="form-group">
            <label>Arabic Title</label>
            <input type="text" class="form-control" name="retailer_title_ar" value="{{$data['stores_data']->retailer_title_ar}}" placeholder="Enter Arabic Title" required>
          </div>
        </div>
      </div>

      <div class="row" style="display: block;" id="retailer_desc">
        <div class="col-md-12">
          <div class="form-group">
            <label>Description</label>
            <textarea class="form-control" name="retailer_desc" onKeyDown="charLimit(this.form.retailer_desc,this.form.countdown,125);" placeholder="Enter Description , 125 Char is max string limit !" placeholder="Enter Description" cols="10" rows="10">{{$data['stores_data']->retailer_desc}}</textarea>
          </div>
        </div>
      </div>

      <div class="row" style="display: block;" id="retailer_desc">
        <div class="col-md-12">
          <div class="form-group">
            <label>Arabic Description</label>
            <textarea class="form-control" name="retailer_desc_ar" onKeyDown="charLimit(this.form.retailer_desc,this.form.countdown,125);" placeholder="Enter Arabic Description , 125 Char is max string limit !" placeholder="Enter Description" cols="10" rows="10">{{$data['stores_data']->retailer_desc_ar}}</textarea>
          </div>
        </div>
      </div>
    @endif




  </div>
  <div class="modal-footer justify-content-between">
    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
    <button type="submit" class="btn btn-primary">Save changes</button>
  </div>
</form>

@section('addScript')

<script>
  function charLimit(limitField, limitCount, limitNum) {
    if (limitField.value.length > limitNum) {
      limitField.value = limitField.value.substring(0, limitNum);
    } else {
      limitCount.value = limitNum - limitField.value.length;
    }
  }


  //--Show-Hide Title-Description--//
  $(document).ready(function() {
    $('#retailer_type').change(function() {
      var selectedSection = $(this).val();

      if (selectedSection === "3") {
        $('#retailer_title').hide();
        $('#retailer_desc').hide();

      } else if (selectedSection === "1" || selectedSection === "2") {
        $('#retailer_title').show();
        $('#retailer_desc').show();
      }
    });
  });
</script>

@endsection