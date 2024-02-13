<form id="edit_snippet_form" action="{{route('admin.seo.snippet.update')}}">
  @csrf
  <input type="hidden" name="snippet_id" value="{{base64_encode($data->id)}}">
  <div class="modal-header">
    <h4 class="modal-title">Edit Snippet</h4>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
  <div class="modal-body">
    <div class="row">
      <div class="col-md-6">
        <div class="form-group">
          <label>Snippet Name</label>
          <input type="text" class="form-control" name="name" value="{{$data->name}}" required>
        </div>
      </div>
      <div class="col-md-3">
        <div class="form-group">
          <label>Position</label>
          <select class="form-control" name="position" required>
            <option {{$data->position == 'Head' ? 'selected' : ''}}>Head</option>
            <option  {{$data->position == 'Body' ? 'selected' : ''}}>Body</option>
          </select>
        </div>
      </div>
      <div class="col-md-3 stick-bottom">
        <div class="form-group form-radio-div">
          <div class="custom-control custom-radio">
            <input class="custom-control-input epageCheck" type="radio" id="radio3" value="1" name="page_link"  {{empty($data->page_url) ? 'checked' : ''}}>
            <label for="radio3" class="custom-control-label">All Pages</label>
          </div>
          &nbsp;&nbsp;&nbsp;&nbsp;
          <div class="custom-control custom-radio">
            <input class="custom-control-input epageCheck" type="radio" id="radio4" value="0" name="page_link"   {{!empty($data->page_url) ? 'checked' : ''}}>
            <label for="radio4" class="custom-control-label">Specific Page</label>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <div class="form-group">
          <label>Page URL</label>
          <input type="url" class="form-control epageURL" value="{{@$data->page_url}}" name="page_url" {{empty($data->page_url) ? 'disabled' : 'required'}}>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <div class="form-group">
          <label>Snippet Code</label>
          <textarea class="form-control code-snippet" name="snippet_code" placeholder="Paste code here..." required rows="30">{{$data->snippet_code}}</textarea>
        </div>
      </div>
    </div>
  </div>
  <div class="modal-footer justify-content-between">
    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
    <button type="submit" class="btn btn-primary">Save changes</button>
  </div>
</form>