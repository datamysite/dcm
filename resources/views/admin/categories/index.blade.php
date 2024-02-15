@extends('admin.layout.main')
@section('title', 'Categories')
@section('content')

<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Categories</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Home</a></li>
            <li class="breadcrumb-item active">Categories</li>
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
                  <a href="javascript:void(0)" class="btn btn-primary pull-right" title="Add Category" data-toggle="modal" data-target="#addCategoryFormModal"><i class="fas fa-plus"></i> Add Category</a>
                </div>
              </div>
            </div>
          </div>
          <div class="card">
            <!-- /.card-header -->
            <div class="card-body">
              <table id="categoryTable" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th width="5%">#</th>
                    <th width="20%">Logo</th>
                    <th width="30%">Name</th>
                    <th width="30%">Parent Category</th>
                    <th width="30%">Category Type</th>
                    <th width="15%">Max. Discount %</th>
                    <th width="15%">No. of Brands</th>
                    <th width="15%" class="text-right">Action</th>
                  </tr>
                </thead>
                <tbody id="categoryTableBody">
                </tbody>
                <tfoot>
                  <tr>
                    <th>#</th>
                    <th>Logo</th>
                    <th>Name</th>
                    <th>Parent Category</th>
                    <th>Category Type</th>
                    <th>Max. Discount %</th>
                    <th>No. of Brands</th>
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


<div class="modal fade" id="addCategoryFormModal">
  <div class="modal-dialog">
    <div class="modal-content">
      <form id="add_category_form" action="{{route('admin.categories.create')}}" enctype="multipart/form-data">
        @csrf
        <div class="modal-header">
          <h4 class="modal-title">Add Category</h4>
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
                <label>Name</label>
                <input type="text" class="form-control" name="name" required>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <label>Parent Category</label>
                <select class="form-control" name="parent_id">
                  <option value="0">Select Parent Category</option>
                  @foreach ($partent_categoires_data as $parent_category)
                  <option value="{{ $parent_category->id }}">{{ $parent_category->name }}</option>
                  @endforeach
                </select>

              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <div class="form-group text-center">
                <input type="radio" id="category_type" name="category_type" value="1" checked><label style="padding-left: 5px;">Online</label>
                <input type="radio" id="category_type" name="category_type" value="2"><label style="padding-left: 5px;">Retail</label>
                <input type="radio" id="category_type" name="category_type" value="3"><label style="padding-left: 5px;">Both</label>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <label>Max. Discount %</label>
                <input type="number" class="form-control" step="any" name="max_discount" required>
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



<div class="modal fade" id="editCategoryFormModal">
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
  $(function() {
    loadCategories();

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


    $(document).on('submit', "#add_category_form", function(event) {
      var form = $(this);
      var formData = new FormData($("#add_category_form")[0]);
      //console.log(formData);
      $.ajax({
        type: "POST",
        url: form.attr("action"),
        data: formData,
        dataType: "json",
        encode: true,
        processData: false,
        contentType: false,
      }).done(function(data) {
        if (data.success == 'success') {
          Toast.fire({
            icon: 'success',
            title: data.message
          });
          $('.close-btn').click();
          form.trigger("reset");
          $('#addCategoryFormModal').modal('hide');
          loadCategories();
        } else {
          Toast.fire({
            icon: 'error',
            title: data.errors
          });
        }
      });

      event.preventDefault();
    });


    $(document).on('submit', "#edit_category_form", function(event) {
      var form = $(this);
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
      }).done(function(data) {
        if (data.success == 'success') {
          Toast.fire({
            icon: 'success',
            title: data.message
          });
          $('.close-btn').click();
          form.trigger("reset");
          $('#editCategoryFormModal').modal('hide');
          loadCategories();
        } else {
          Toast.fire({
            icon: 'error',
            title: data.errors
          });
        }
      });

      event.preventDefault();
    });



    $(document).on('click', '.deleteCategory', function() {
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
          $.get("{{URL::to('/admin/categories/delete')}}/" + id, function(data) {
            console.log(data);
            if (data == 'success') {
              Toast.fire({
                icon: 'success',
                title: 'Success! Category Successfully Deleted.'
              });
              loadCategories();
            } else {
              Toast.fire({
                icon: 'error',
                title: "Warning! This category has products listed."
              });
            }
          });
        }
      });
    });


    $(document).on('click', '.editCategory', function() {
      var id = $(this).data('id');
      $('#editCategoryFormModal .modal-content').html('<img src="{{URL::to(' / public / loader.gif ')}}" height="50px" style="margin:150px auto;">');
      $('#editCategoryFormModal').modal('show');
      $.get("{{URL::to('/admin/categories/edit')}}/" + id, function(data) {
        $('#editCategoryFormModal .modal-content').html(data);
      });
    });

  });




  function loadCategories() {
    var url = "{{route('admin.categories.load')}}";

    $('#categoryTableBody').html('<tr class="text-center"><td colspan="6"><img src="{{URL::to(' / public / loader.gif ')}}" height="30px"></td></tr>');
    $.get(url, function(data) {
      $('#categoryTableBody').html(data);
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