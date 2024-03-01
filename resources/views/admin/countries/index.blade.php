@extends('admin.layout.main')
@section('title', 'Countries')
@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
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
          <div class="col-lg-6">
            <!-- /.card -->

            <div class="card">
              <div class="card-header">
                  <div class="row">
                    <div class="col-md-9">
                      <h3 class="m-0">Countries</h3>
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

          <div class="col-lg-6">
            <!-- /.card -->

            <div class="card">
              <div class="card-header">
                  <div class="row">
                    <div class="col-md-9">
                      <h3 class="m-0">States</h3>
                    </div>
                    <div class="col-md-3">
                      <a href="javascript:void(0)" class="btn btn-primary pull-right" title="Add Category" data-toggle="modal" data-target="#addStateFormModal"><i class="fas fa-plus"></i> Add State</a>
                    </div>
                  </div>
              </div>
            </div>
            <div class="card">
              <!-- /.card-header -->
              <div class="card-body">
                <table id="statesTable" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th width="5%">#</th>
                    <th width="15%">Image</th>
                    <th width="30%">Name</th>
                    <th width="15%">Shortname</th>
                    <th width="15%">Country</th>
                    <th width="15%" class="text-right">Action</th>
                  </tr>
                  </thead>
                  <tbody id="statesTableBody">
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>#</th>
                    <th>Image</th>
                    <th>Name</th>
                    <th>Shortname</th>
                    <th>Country</th>
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

<div class="modal fade" id="addStateFormModal">
  <div class="modal-dialog">
    <div class="modal-content">
      <form id="add_state_form" action="{{route('admin.states.create')}}">
        @csrf
        <div class="modal-header">
          <h4 class="modal-title">Add State</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="row">
            <div class="col-md-12">
              <div class="category-image-wrapper">
                <input type="file" name="category_image" accept="image/*" required />
                <div class="close-btn">×</div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <label>Country</label>
                <select class="form-control" name="country_id" required>
                  @foreach($countries as $val)
                    <option value="{{$val->id}}">{{$val->name}}</option>
                  @endforeach
                </select>
              </div>
            </div>
          </div>
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
    loadStates();

    $('input[name="category_image"]').on('change', function() {
      readURL(this, $('.category-image-wrapper')); //Change the image
    });
    $(document).on('change', 'input[name="edit_category_image"]', function() {
      readURL(this, $('.edit_category-image-wrapper')); //Change the image
    });

    $(document).on('click', '.close-btn', function() { //Unset the image
      let file = $('input[name="category_image"]');
      $('.category-image-wrapper').css('background-image', 'unset');
      $('.category-image-wrapper').removeClass('file-set');
      file.replaceWith(file = file.clone(true));

      let file2 = $('input[name="edit_category_image"]');
      $('.edit_category-image-wrapper').css('background-image', 'unset');
      $('.edit_category-image-wrapper').removeClass('file-set');
      file2.replaceWith(file2 = file2.clone(true));
    });


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


    $(document).on('submit', "#edit_country_form", function (event) {
      var form=$(this);
      var formData = new FormData($("#edit_country_form")[0]);
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
          $('#editCountryFormModal').modal('hide');
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

    $(document).on('submit', "#add_state_form", function (event) {
      var form=$(this);
      var formData = new FormData($("#add_state_form")[0]);
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
          $('#addStateFormModal').modal('hide');
          loadStates();
        }else{
          Toast.fire({
            icon: 'error',
            title: data.errors
          });
        }
      });

      event.preventDefault();
    });



    $(document).on('submit', "#edit_state_form", function (event) {
      var form=$(this);
      var formData = new FormData($("#edit_state_form")[0]);
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
          $('#editCountryFormModal').modal('hide');
          loadStates();
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




    $(document).on('click', '.editState', function(){
      var id = $(this).data('id');
      $('#editCountryFormModal .modal-content').html('<img src="{{URL::to('/public/loader.gif')}}" height="50px" style="margin:150px auto;">');
      $('#editCountryFormModal').modal('show');
      $.get("{{URL::to('/admin/states/edit')}}/"+id, function(data){
        $('#editCountryFormModal .modal-content').html(data);
      });
    });



    $(document).on('click', '.deleteState', function(){
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
          $.get("{{URL::to('/admin/states/delete')}}/"+id, function(data){
              console.log(data);
              if(data == 'success'){
                Toast.fire({
                  icon: 'success',
                  title: 'Success! State Successfully Deleted.'
                });
                loadStates();
              }
          });
        }
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


  function loadStates(){
    var url = "{{route('admin.states.load')}}";

    $('#statesTableBody').html('<tr class="text-center"><td colspan="6"><img src="{{URL::to('/public/loader.gif')}}" height="30px"></td></tr>');
    $.get(url, function(data){
      $('#statesTableBody').html(data);
      //$('#categoryTable').DataTable();
    });
  }

  //FILE
  function readURL(input, obj) {
    if (input.files && input.files[0]) {
      var reader = new FileReader();
      reader.onload = function(e) {
        obj.css('background-image', 'url(' + e.target.result + ')');
        obj.addClass('file-set');
      }
      reader.readAsDataURL(input.files[0]);
    }
  };
</script>

@endsection