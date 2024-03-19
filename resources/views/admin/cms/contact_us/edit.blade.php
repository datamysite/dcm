<form id="edit_form" action="{{route('admin.contact.create')}}" enctype="multipart/form-data">
  @csrf
  <input type="hidden" name="contact_id" value="{{base64_encode($data['contact_data']->id)}}">
  <div class="modal-header">
    <h4 class="modal-title">View Contact MSG</h4>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
  <div class="modal-body">


    <div class="row">
      <div class="col-md-12">
        <div class="form-group">
          <label>Name</label>
          <input type="text" value="{{$data['contact_data']->name}}" class="form-control" readonly="readonly" name="name">
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-md-12">
        <div class="form-group">
          <label>Phone</label>
          <input type="text" value="{{$data['contact_data']->phone}}" class="form-control" readonly="readonly" name="phone">
        </div>
      </div>
    </div>


    <div class="row">
      <div class="col-md-12">
        <div class="form-group">
          <label>Email</label>
          <input type="text" value="{{$data['contact_data']->email}}" class="form-control" readonly="readonly" name="email">
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-md-12">
        <div class="form-group">
          <label>Subject</label>
          <input type="text" value="{{$data['contact_data']->subject}}" class="form-control" readonly="readonly" name="subject">
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-md-12">
        <div class="form-group">
          <label>MSG</label>
          <textarea class="form-control" name="msg" placeholder="Enter Description" cols="10" rows="10" readonly="readonly" required>{{$data['contact_data']->msg}}</textarea>
        </div>
      </div>
    </div>

    <hr>

    <div class="row">
      <div class="col-md-12">
        <div class="form-group">
          <label>Reply</label>
          <textarea class="form-control" name="reply" placeholder="Enter Your Reply" cols="10" rows="10" required>@if($data['contact_data']->reply != ''){{$data['contact_data']->reply}}@endif
          </textarea>
        </div>
      </div>
    </div>

  </div>
  <div class="modal-footer justify-content-between">
    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
    <button type="submit" class="btn btn-primary">Reply</button>
  </div>
</form>