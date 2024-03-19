<form id="edit_about_form" action="{{route('admin.footer.create')}}" enctype="multipart/form-data">
  @csrf
  <input type="hidden" name="footer_id" value="{{base64_encode($data['footer_data']->id)}}">
  <input type="hidden" name="section_id" value="{{$data['footer_data']->section_id}}">




  <div class="modal-header">
    <h4 class="modal-title">Edit Footer Content</h4>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
  <div class="modal-body">



    @if ($data['footer_data']->section_id == 1)

    <input type="hidden" name="category_id" value="{{$data['footer_data']->category_id}}">
    <input type="hidden" name="retailer_id" value="{{$data['footer_data']->retailer_id}}">

      <div class="row" id="page_row" style="display: block;">
        <div class="col-md-12">
          <div class="form-group">
            <label>Page Name</label>
            <input type="text" class="form-control" id="page_name" name="page_name" placeholder="Page Name" value="{{$data['footer_data']->page_name}}">
          </div>
        </div>
      </div>
      @endif

      @if ($data['footer_data']->section_id == 2)

      <input type="hidden" name="category_id" value="{{$data['footer_data']->category_id}}">
      <input type="hidden" name="page_name" value="{{$data['footer_data']->page_name}}">

      <div class="row" id="retailer_row" style="display: block;">
        <div class="col-md-12">
          <div class="form-group">
            <label>Retailer/Store</label>
            <select class="form-control" name="retailer_id" id="retailer_id">
              @foreach ($data['stores'] as $store)
              @if ($store->id == $data['footer_data']->retailer_id)
              <option value="{{ $store->id }}" selected>{{ $store->name }}</option>
              @else
              <option value="{{ $store->id }}">{{ $store->name }}</option>
              @endif
              @endforeach
            </select>
          </div>
        </div>
      </div>
      @endif

      @if ($data['footer_data']->section_id == 3)

      <input type="hidden" name="retailer_id" value="{{$data['footer_data']->retailer_id}}">
      <input type="hidden" name="page_name" value="{{$data['footer_data']->page_name}}">

      <div class="row" id="categoires_row" style="display: block;">
        <div class="col-md-12">
          <div class="form-group">
            <label>Categoires</label>
            <select class="form-control" name="category_id" id="category_id">
              @foreach ($data['categories'] as $category)
              @if ($category->id == $data['footer_data']->category_id)
              <option value="{{ $category->id }}" selected>{{ $category->name }}</option>
              @else
              <option value="{{ $category->id }}">{{ $category->name }}</option>
              @endif
              @endforeach
            </select>
          </div>
        </div>
      </div>
      @endif

      <div class="row">
        <div class="col-md-12">
          <div class="form-group">
            <label>URL</label>
            <input type="text" class="form-control" name="page_url" placeholder="URL" value="{{$data['footer_data']->page_url}}" required>
          </div>
        </div>
      </div>


  </div>
  <div class="modal-footer justify-content-between">
    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
    <button type="submit" class="btn btn-primary">Save changes</button>
  </div>
</form>