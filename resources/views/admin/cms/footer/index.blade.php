@extends('admin.layout.main')
@section('title', 'Footer Content')
@section('content')

<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Footer <small><small>- CMS</small></small></h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Home</a></li>
            <li class="breadcrumb-item"><a href="javascript:void(0)">CMS</a></li>
            <li class="breadcrumb-item active">Footer</li>
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
        <div class="col-lg-4">
          <!-- /.card -->

          <div class="card">
            <div class="card-header">
              <div class="row">
                <div class="col-md-8">
                    <h4>About DCM</h4>
                </div>
                <div class="col-md-4">
                  <a href="javascript:void(0)" class="btn btn-primary pull-right" title="Add Link" data-toggle="modal" data-target="#addAboutFormModal1"><i class="fas fa-plus"></i> Add Link</a>
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-md-12">
                  @foreach($section1 as $val)
                    <div class="callout callout-info callout-footer">
                      <a href="{{$val->page_url}}" target="_blank"><h5>{{$val->page_name}}</h5></a>
                      <a href="javascript:void(0)" class="btn btn-sm btn-default deleteLink" data-id="{{base64_encode($val->id)}}"><i class="fa fa-trash"></i></a>
                    </div>
                  @endforeach
                </div>
              </div>
            </div>
          </div>
          <!-- /.card -->
        </div>


        <div class="col-lg-4">
          <!-- /.card -->

          <div class="card">
            <div class="card-header">
              <div class="row">
                <div class="col-md-8">
                    <h4>Popular Stores</h4>
                </div>
                <div class="col-md-4">
                  <a href="javascript:void(0)" class="btn btn-primary pull-right" title="Add Link" data-toggle="modal" data-target="#addAboutFormModal2"><i class="fas fa-plus"></i> Add Link</a>
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-md-12">
                  @foreach($section2 as $val)
                    <div class="callout callout-warning callout-footer">
                      <a href="{{route('brand', ['en', $val->retailer->states[0]->state->slug, $val->retailer->slug])}}" target="_blank"><h5>{{$val->retailer->name}}</h5></a>
                      <a href="javascript:void(0)" class="btn btn-sm btn-default deleteLink" data-id="{{base64_encode($val->id)}}"><i class="fa fa-trash"></i></a>
                    </div>
                  @endforeach
                </div>
              </div>
            </div>
          </div>
          <!-- /.card -->
        </div>


        <div class="col-lg-4">
          <!-- /.card -->

          <div class="card">
            <div class="card-header">
              <div class="row">
                <div class="col-md-8">
                    <h4>Popular Categories</h4>
                </div>
                <div class="col-md-4">
                  <a href="javascript:void(0)" class="btn btn-primary pull-right" title="Add Link" data-toggle="modal" data-target="#addAboutFormModal3"><i class="fas fa-plus"></i> Add Link</a>
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-md-12">
                  @foreach($section3 as $val)
                    @php
                        $string = strtolower(trim($val->category->name));
                         $string = str_replace('&', 'and', $string);
                         $string = str_replace(' ', '-', $string);
                         $slug = preg_replace('/[^a-z0-9-]/', '', $string);
                     @endphp
                    <div class="callout callout-danger callout-footer">
                      <a href="{{route('category', ['en', 'dubai', $slug])}}" target="_blank"><h5>{{$val->category->name}}</h5></a>
                      <a href="javascript:void(0)" class="btn btn-sm btn-default deleteLink" data-id="{{base64_encode($val->id)}}"><i class="fa fa-trash"></i></a>
                    </div>
                  @endforeach
                </div>
              </div>
            </div>
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>

      <div class="row">
        <div class="col-md-12">

          <div class="card">
            <div class="card-header copyright-card">
              <form id="copyrightForm" action="{{route('admin.footer.copyright.save')}}">
                @csrf
                <input type="hidden" name="footer_id" value="{{$section4->id}}">
                <input type="hidden" name="section_id" value="4">
                <p><strong>Copyright</strong></p>
                <input type="text" name="copyright" class="form-control" value="{{$section4->text}}" required>
                <button type="submit" class="btn btn-sm btn-primary">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Save&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</button>
              </form>
            </div>
          </div>

        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>


<div class="modal fade" id="addAboutFormModal1">
  <div class="modal-dialog">
    <div class="modal-content">
      <form method="post" action="{{route('admin.footer.create')}}" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="section_id" value="1">
        <div class="modal-header">
          <h4 class="modal-title">Add Link</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">

          <div class="row">
            <div class="col-md-8">
              <div class="form-group">
                <label>Name</label>
                <input type="text" class="form-control" id="page_name" name="page_name" required>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label>Order</label>
                <input type="number" class="form-control" name="order_number"  value="1" required>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <label>URL</label>
                <input type="url" class="form-control" name="page_url" required>
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

<div class="modal fade" id="addAboutFormModal2">
  <div class="modal-dialog">
    <div class="modal-content">
      <form method="post" action="{{route('admin.footer.create')}}" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="section_id" value="2">
        <div class="modal-header">
          <h4 class="modal-title">Add Link</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">

          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <label>Retailer/Store</label>
                <select class="form-control" name="retailer_id" required>
                  <option value="0">Select Retailer</option>
                  @foreach ($stores as $store)
                  <option value="{{ $store->id }}">{{ $store->name }}</option>
                  @endforeach
                </select>
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

<div class="modal fade" id="addAboutFormModal3">
  <div class="modal-dialog">
    <div class="modal-content">
      <form method="post" action="{{route('admin.footer.create')}}" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="section_id" value="3">
        <div class="modal-header">
          <h4 class="modal-title">Add Link</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">

          <div class="row" id="categoires_row">
            <div class="col-md-12">
              <div class="form-group">
                <label>Categoires</label>
                <select class="form-control" name="category_id" required>
                  <option value="0">Select Category</option>
                  @foreach ($categories as $category)
                  <option value="{{ $category->id }}">{{ $category->name }}</option>
                  @endforeach
                </select>
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

    loadFooterContent();


    $(document).on('submit', "#copyrightForm", function(event) {
      var form = $(this);
      var formData = new FormData($("#copyrightForm")[0]);
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
        } else {
          Toast.fire({
            icon: 'error',
            title: data.errors
          });
        }
      });

      event.preventDefault();
    });

    $(document).on('submit', "#edit_about_form", function(event) {
      var form = $(this);
      var formData = new FormData($("#edit_about_form")[0]);
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
          loadFooterContent();
        } else {
          Toast.fire({
            icon: 'error',
            title: data.errors
          });
        }
      });

      event.preventDefault();
    });


    $(document).on('click', '.deleteLink', function() {
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
          $.get("{{URL::to('/admin/panel/footer/delete')}}/" + id, function(data) {
            console.log(data);
            if (data == 'success') {
              Toast.fire({
                icon: 'success',
                title: 'Success! Link Successfully Deleted.'
              });
              setTimeout(function(){
                window.location.reload();
              }, 500);
            } else {
              Toast.fire({
                icon: 'error',
                title: "Warning! Link Cannot be deleted !."
              });
            }
          });
        }
      });
    });


    $(document).on('click', '.edit', function() {
      var id = $(this).data('id');
      $('#editCategoryFormModal .modal-content').html('<img src="{{URL::to(' / public / loader.gif ')}}" height="50px" style="margin:150px auto;">');
      $('#editCategoryFormModal').modal('show');
      $.get("{{URL::to('/admin/footer/edit')}}/" + id, function(data) {
        $('#editCategoryFormModal .modal-content').html(data);
        make_editor("content2");
      });
    });

  });



  function loadFooterContent() {
    var url = "{{route('admin.footer.load')}}";

    $('#aboutTableBody').html('<tr class="text-center"><td colspan="6"><img src="{{URL::to(' / public / loader.gif ')}}" height="30px"></td></tr>');
    $.get(url, function(data) {
      $('#aboutTableBody').html(data);
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

<script>
  function resetFormFileds() {
    var sectionId = document.getElementById("section_id").value;

    var pageNameInput = document.getElementById("page_name");
    var retailerIdInput = document.getElementById("retailer_id");
    var categoryIdInput = document.getElementById("category_id");
    
    if (sectionId === "1") {
      retailerIdInput.value = "0";
      categoryIdInput.value = "0";
    }
    if (sectionId === "2") {
      pageNameInput.value = "";
      categoryIdInput.value = "0";
    }
    if (sectionId === "3") {
      pageNameInput.value = "";
      retailerIdInput.value = "0";
    }
  }

    $(document).ready(function() {
      $('#section_id').change(function() {
        var selectedSection = $(this).val();

        if (selectedSection === "1") {
          $('#retailer_row').hide();
          $('#categoires_row').hide();
          $('#page_row').show();
        }
        if (selectedSection === "2") {
          $('#retailer_row').show();
          $('#categoires_row').hide();
          $('#page_row').hide();
        }
        if (selectedSection === "3") {
          $('#categoires_row').show();
          $('#retailer_row').hide();
          $('#page_row').hide();
        }
      });
    });
</script>

@endsection