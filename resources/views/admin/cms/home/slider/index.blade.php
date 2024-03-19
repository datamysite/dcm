@extends('admin.layout.main')
@section('title', 'Slider | Home')
@section('content')

<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Manage Slider <small><small>- CMS</small></small></h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Home</a></li>
            <li class="breadcrumb-item"><a href="javascript:void(0)">CMS</a></li>
            <li class="breadcrumb-item active">Manage Slider</li>
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
                  <a href="javascript:void(0)" class="btn btn-primary pull-right" title="Add Slider" data-toggle="modal" data-target="#addCategoryFormModal"><i class="fas fa-plus"></i> Add Slider</a>
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
                    <th width="10%">Image</th>
                    <th width="35%">URL</th>
                    <th width="10%">Order On Slider</th>
                    <th width="20%">Country</th>
                    <th width="10%">Language</th>
                    <th width="10%" class="text-right">Action</th>
                  </tr>
                </thead>
                <tbody id="categoryTableBody">
                </tbody>
                <tfoot>
                  <tr>
                    <th>#</th>
                    <th>Image</th>
                    <th>URL</th>
                    <th>Order On Slider</th>
                    <th>Country</th>
                    <th>Language</th>
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
      <form id="add_slider_form" action="{{route('admin.home.slider.create')}}" enctype="multipart/form-data">
        @csrf

        <div class="modal-header">
          <h4 class="modal-title">Add Slider</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>

        <div class="modal-body">

          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <label>Select Language</label>
                <select class="form-control" name="lang_id" required="required">
                  <option value="">Select Language</option>

                  <option value="1">English</option>
                  <option value="2">Arabic</option>


                </select>

              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <label>Image URL</label>
                <input type="text" class="form-control" name="img_url" placeholder="Enter URL" required>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <label>Order On Slider</label>
                <input type="number" class="form-control" name="img_order" placeholder="Enter Image Order On Slider" required>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <label>Country</label>
                <select class="form-control" name="country_id" required multiple>
                  @foreach ($countries as $country)
                  <option value="{{ $country->id }}">{{ $country->name }}</option>
                  @endforeach
                </select>

              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-12">
              <div class="category-image-wrapper">
                <input type="file" name="slider_image" accept="image/*" required />
                <div class="close-btn">×</div>
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Add Slider</button>
        </div>
      </form>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>


<div class="modal fade" id="editSliderFormModal">
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
  
    loadSliders();

    $('input[name="slider_image"]').on('change', function() {
      readURL(this, $('.category-image-wrapper')); //Change the image
    });
    $(document).on('change', 'input[name="edit_slider_image"]', function() {
      readURL(this, $('.edit_category-image-wrapper')); //Change the image
    });

    $(document).on('click', '.close-btn', function() { //Unset the image
      let file = $('input[name="slider_image"]');
      $('.category-image-wrapper').css('background-image', 'unset');
      $('.category-image-wrapper').removeClass('file-set');
      file.replaceWith(file = file.clone(true));

      let file2 = $('input[name="edit_slider_image"]');
      $('.edit_category-image-wrapper').css('background-image', 'unset');
      $('.edit_category-image-wrapper').removeClass('file-set');
      file2.replaceWith(file2 = file2.clone(true));
    });


    $(document).on('submit', "#add_slider_form", function(event) {
      var form = $(this);
      var formData = new FormData($("#add_slider_form")[0]);
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
          $('#add_slider_form').modal('hide');
          loadSliders();
        } else {
          Toast.fire({
            icon: 'error',
            title: data.errors
          });
        }
      });
      event.preventDefault();
    });

    $(document).on('submit', "#edit_slider_form", function(event) {
      var form = $(this);
      var formData = new FormData($("#edit_slider_form")[0]);
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
          $('#editSliderFormModal').modal('hide');
          loadSliders();
        } else {
          Toast.fire({
            icon: 'error',
            title: data.errors
          });
        }
      });

      event.preventDefault();
    });


    $(document).on('click', '.deleteSlider', function() {
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
          $.get("{{URL::to('/admin/panel/home/slider/delete')}}/" + id, function(data) {
            console.log(data);
            if (data == 'success') {
              Toast.fire({
                icon: 'success',
                title: 'Success, Slider Successfully Deleted.'
              });
              loadSliders();
            } else {
              Toast.fire({
                icon: 'error',
                title: "Error, while Deleteing the Slider."
              });
            }
          });
        }
      });
    });


    $(document).on('click', '.editSlider', function() {
      var id = $(this).data('id');
      $('#editSliderFormModal .modal-content').html('<img src="{{URL::to('/public/loader.gif')}}" height="50px" style="margin:150px auto;">');
      $('#editSliderFormModal').modal('show');
      $.get("{{URL::to('/admin/panel/home/slider/edit')}}/" + id, function(data) {
        $('#editSliderFormModal .modal-content').html(data);
      });
    });

  });




  function loadSliders() {
    var url = "{{route('admin.home.slider.load')}}";

    $('#categoryTableBody').html('<tr class="text-center"><td colspan="6"><img src="{{URL::to('/public/loader.gif')}}" height="30px"></td></tr>');
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