@extends('admin.layout.main')
@section('title', 'Countries')
@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Countries</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Home</a></li>
              <li class="breadcrumb-item active">Countries</li>
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
                    <div class="col-md-9 searchbar">
                    </div>
                    <div class="col-md-3">
                      <a href="javascript:void(0)" class="btn btn-primary pull-right" title="Add Category" data-toggle="modal" data-target="#addCountryFormModal"><i class="fas fa-plus"></i> Add Country</a>
                    </div>
                  </div>
              </div>
            </div>
            <div class="card">
              <!-- /.card-header -->
              <div class="card-body">
                <table id="countriesTable" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th width="5%">#</th>
                    <th width="30%">Name</th>
                    <th width="15%">Shortname</th>
                    <th width="15%" class="text-right">Action</th>
                  </tr>
                  </thead>
                  <tbody id="countriesTableBody">
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Shortname</th>
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


<div class="modal fade" id="addCountryFormModal">
  <div class="modal-dialog">
    <div class="modal-content">
      <form id="add_country_form" action="{{route('admin.countries.create')}}">
        @csrf
        <div class="modal-header">
          <h4 class="modal-title">Add Country</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <label>Name</label>
                <input type="text" class="form-control" name="name" required>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <label>Short Name</label>
                <input type="text" class="form-control" name="shortname" required>
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



<div class="modal fade" id="editCountryFormModal">
  <div class="modal-dialog">
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

<script>
  $(function () {
    loadCountries();


    $(document).on('submit', "#add_country_form", function (event) {
      var form=$(this);
      var formData = new FormData($("#add_country_form")[0]);
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
          $('#addCountryFormModal').modal('hide');
          loadCountries();
        }else{
          Toast.fire({
            icon: 'error',
            title: data.errors
          });
        }
      });

      event.preventDefault();
    });


    $(document).on('submit', "#edit_category_form", function (event) {
      var form=$(this);
      var formData = new FormData($("#edit_category_form")[0]);
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
          $('.close-btn').click();
          form.trigger("reset");
          $('#editCategoryFormModal').modal('hide');
          loadCountries();
        }else{
          Toast.fire({
            icon: 'error',
            title: data.errors
          });
        }
      });

      event.preventDefault();
    });



    $(document).on('click', '.deleteCountry', function(){
      var id = $(this).data('id');

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
          $.get("{{URL::to('/admin/countries/delete')}}/"+id, function(data){
              console.log(data);
              if(data == 'success'){
                Toast.fire({
                  icon: 'success',
                  title: 'Success! Country Successfully Deleted.'
                });
                loadCountries();
              }
          });
        }
      });
    });


    $(document).on('click', '.editCountry', function(){
      var id = $(this).data('id');
      $('#editCountryFormModal .modal-content').html('<img src="{{URL::to('/public/loader.gif')}}" height="50px" style="margin:150px auto;">');
      $('#editCountryFormModal').modal('show');
      $.get("{{URL::to('/admin/countries/edit')}}/"+id, function(data){
        $('#editCountryFormModal .modal-content').html(data);
      });
    });

  });




  function loadCountries(){
    var url = "{{route('admin.countries.load')}}";

    $('#countriesTableBody').html('<tr class="text-center"><td colspan="4"><img src="{{URL::to('/public/loader.gif')}}" height="30px"></td></tr>');
    $.get(url, function(data){
      $('#countriesTableBody').html(data);
      //$('#categoryTable').DataTable();
    });
  }
</script>

@endsection