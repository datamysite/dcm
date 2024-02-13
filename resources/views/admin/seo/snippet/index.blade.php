@extends('admin.layout.main')
@section('title', 'Snippet Code | SEO Tools')
@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Snippet Code | SEO Tools</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Home</a></li>
              <li class="breadcrumb-item active">SEO Tools</li>
              <li class="breadcrumb-item active">Snippet Code</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <!-- /.card -->

            <div class="card">
              <div class="card-header">
                  <div class="row">
                    <div class="col-md-10 searchbar">
                    </div>
                    <div class="col-md-2">
                      <a href="javascript:void(0)" class="btn btn-primary pull-right" title="Add Snippet" data-toggle="modal" data-target="#addSnippetFormModal"><i class="fa fa-plus"></i>&nbsp;Add Snippet</a>
                    </div>
                  </div>
              </div>
            </div>


            <div class="card">
              <!-- /.card-header -->
              <div class="card-body">
                <table id="snippetTable" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th width="5%">#</th>
                    <th width="20%">Name</th>
                    <th width="40%">Page Link</th>
                    <th width="20%">Position</th>
                    <th width="15%" class="text-right">Action</th>
                  </tr>
                  </thead>
                  <tbody id="snippetTableBody">

                  </tbody>
                  <tfoot>
                  <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Page Link</th>
                    <th>Position</th>
                    <th class="text-right">Action</th>
                  </tr>
                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>


<div class="modal fade" id="addSnippetFormModal">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <form id="add_snippet_form" action="{{route('admin.seo.snippet.create')}}">
        @csrf
        <div class="modal-header">
          <h4 class="modal-title">Add Snippet</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label>Snippet Name</label>
                <input type="text" class="form-control" name="name" required>
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group">
                <label>Position</label>
                <select class="form-control" name="position" required>
                  <option>Head</option>
                  <option selected>Body</option>
                </select>
              </div>
            </div>
            <div class="col-md-3 stick-bottom">
              <div class="form-group form-radio-div">
                <div class="custom-control custom-radio">
                  <input class="custom-control-input pageCheck" type="radio" id="radio1" value="1" name="page_link" checked>
                  <label for="radio1" class="custom-control-label">All Pages</label>
                </div>
                &nbsp;&nbsp;&nbsp;&nbsp;
                <div class="custom-control custom-radio">
                  <input class="custom-control-input pageCheck" type="radio" id="radio2" value="0" name="page_link">
                  <label for="radio2" class="custom-control-label">Specific Page</label>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <label>Page URL</label>
                <input type="url" class="form-control pageURL" name="page_url" disabled>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <label>Snippet Code</label>
                <textarea class="form-control code-snippet" name="snippet_code" placeholder="Paste code here..." required rows="30"></textarea>
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Save changes</button>
        </div>
      </form>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>



<div class="modal fade" id="editSnippetFormModal">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>

@endsection
@section('addStyle')

@endsection
@section('addScript')

<script type="text/javascript">
  $(document).ready(function (){
    loadSnippet();

    $('.pageCheck').change(function() {
        if (this.value == '1') {
          $('.pageURL').removeAttr('required');
          $('.pageURL').prop('disabled', true);
        }
        else if (this.value == '0') {
          $('.pageURL').removeAttr('disabled');
          $('.pageURL').prop('required', true);
        }
    });

    $(document).on('change', '.epageCheck', function() {
        if (this.value == '1') {
          $('.epageURL').val('');
          $('.epageURL').removeAttr('required');
          $('.epageURL').prop('disabled', true);
        }
        else if (this.value == '0') {
          $('.epageURL').removeAttr('disabled');
          $('.epageURL').prop('required', true);
        }
    });



    $(document).on('submit', "#add_snippet_form", function (event) {
      var form=$(this);
      var formData = new FormData($("#add_snippet_form")[0]);
      //console.log(formData);
      $.ajax({
        type: "POST",
        url: form.attr("action"),
        data: formData,
        dataType: "json",
        encode: true,
        processData: false,
        contentType: false,
      }).done(function (data) {
        if(data.success == 'success'){
          Toast.fire({
            icon: 'success',
            title: data.message
          });
          form.trigger("reset");
          $('.pageURL').removeAttr('required');
          $('.pageURL').prop('disabled', true);
          $('#addSnippetFormModal').modal('hide');
          loadSnippet();
        }else{
          Toast.fire({
            icon: 'error',
            title: data.errors
          });
        }
      });

      event.preventDefault();
    });




    $(document).on('click', '.deleteSnippet', function(){
      var id = $(this).data('id');
      console.log(id);
      Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
      }).then((result) => {
        if (result.isConfirmed) {
          $.get("{{URL::to('/admin/seo/snippet/delete')}}/"+id, function(data){
              console.log(data);
              if(data == 'success'){
                Toast.fire({
                  icon: 'success',
                  title: 'Success! Snippet Code Successfully Deleted.'
                });
                loadSnippet();
              }
          });
        }
      });
    });


    $(document).on('click', '.editSnippet', function(){
      var id = $(this).data('id');
      $('#editSnippetFormModal .modal-content').html('<img src="{{URL::to('/public/loader.gif')}}" height="50px" style="margin:150px auto;">');
      $('#editSnippetFormModal').modal('show');
      $.get("{{URL::to('/admin/seo/snippet/edit')}}/"+id, function(data){
        $('#editSnippetFormModal .modal-content').html(data);
      });
    });

    $(document).on('submit', "#edit_snippet_form", function (event) {
      var form=$(this);
      var formData = new FormData($("#edit_snippet_form")[0]);
      //console.log(formData);
      $.ajax({
        type: "POST",
        url: form.attr("action"),
        data: formData,
        dataType: "json",
        encode: true,
        processData: false,
        contentType: false,
      }).done(function (data) {
        if(data.success == 'success'){
          Toast.fire({
            icon: 'success',
            title: data.message
          });
          form.trigger("reset");
          $('#editSnippetFormModal').modal('hide');
          loadSnippet();
        }else{
          Toast.fire({
            icon: 'error',
            title: data.errors
          });
        }
      });

      event.preventDefault();
    });

  });

  function loadSnippet(){
    var url = "{{route('admin.seo.snippet.load')}}";

    $('#snippetTableBody').html('<tr class="text-center"><td colspan="5"><img src="{{URL::to('/public/loader.gif')}}" height="30px"></td></tr>');
    $.get(url, function(data){
      $('#snippetTableBody').html(data);
      //$('#categoryTable').DataTable();
    });
  }
</script>

@endsection