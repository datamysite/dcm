<form id="edit_job_form" action="{{route('admin.careers.create')}}" enctype="multipart/form-data">
  @csrf
  <input type="hidden" name="vac_id" value="{{base64_encode($data->id)}}">
  <div class="modal-header">
    <h4 class="modal-title">Edit Job</h4>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
  <div class="modal-body">

    <div class="row">
      <div class="col-md-12">
        <div class="form-group">
          <label>Job Title</label>
          <input type="text" class="form-control" name="title" value="{{$data->title}}" required>
        </div>
      </div>
    </div>


    <div class="row">
      <div class="col-md-5">
        <div class="form-group">
          <label>Salary</label>
          <div class="input-group">
            <input type="text" class="form-control" name="salary_from" value="{{$data->salary_from}}" required>
            <input type="text" class="form-control" name="salary_to" value="{{$data->salary_to}}" required>
          </div>
        </div>
      </div>

      <div class="col-md-4">
        <div class="form-group">
          <label>Closing Date</label>
          <input type="date" class="form-control" step="any" name="end_date" value="{{$data->end_date}}" required="required">
        </div>
      </div>

      <div class="col-md-3">
        <div class="form-group">
          <label>Status</label>
          <select class="form-control" name="status" required="required">
            <option value="1" {{ $data->status == 1 ? 'selected' : '' }}>Active</option>
            <option value="2" {{ $data->status  == 2 ? 'selected' : '' }}>Not Active</option>
          </select>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-md-12">
        <div class="form-group">
          <label>Job Description</label>
          <textarea class="form-control" name="job_desc" id="job_desc_edit" placeholder="Enter Description" cols="10" rows="10">{{$data->desc}}</textarea>
        </div>
      </div>
    </div>


  </div>
  <div class="modal-footer justify-content-between">
    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
    <button type="submit" class="btn btn-primary">Save changes</button>
  </div>
</form>