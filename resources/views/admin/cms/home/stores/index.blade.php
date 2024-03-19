@extends('admin.layout.main')
@section('title', 'Stores | Home')
@section('content')

<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Manage Stores <small><small>- CMS</small></small></h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Home</a></li>
            <li class="breadcrumb-item"><a href="javascript:void(0)">CMS</a></li>
            <li class="breadcrumb-item active">Manage Stores</li>
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

              <form id="filterStores">
                @csrf
                <div class="row">
                  <div class="col-md-3">
                    <label>Store Name</label>
                    <input type="text" name="name" class="form-control">
                  </div>
                  <div class="col-md-3">
                    <label>Type</label>
                    <select class="form-control" name="retailer_type">
                      <option value="">Select Type</option>
                      <option value="1">Online Stores</option>
                      <option value="2">Retiler Stores</option>
                      <option value="3">All Stores</option>

                    </select>
                  </div>
                  <div class="col-md-2">
                    <label>Status</label>
                    <select class="form-control" name="status">
                      <option value="">Select Status</option>
                      <option value="1">Active</option>
                      <option value="2">Not Active</option>

                    </select>
                  </div>
                  <div class="col-md-1" style="display: inline-flex;justify-content: space-between;">
                    <button type="submit" class="btn btn-primary mt-32"><i class="fas fa-search"></i></button>
                    <div class="reset_button">

                    </div>
                  </div>
                  <div class="col-md-1">

                  </div>
                  <div class="col-md-2">
                    <a href="javascript:void(0)" class="btn btn-primary mt-32 pull-right" title="Add Stores" data-toggle="modal" data-target="#addStoretoHomeFormModal"><i class="fas fa-plus"></i> Add Store</a>
                  </div>
                </div>
              </form>

            </div>
          </div>
          <div class="card">
            <!-- /.card-header -->
            <div class="card-body">
              <table id="storesTable" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th width="1%">#</th>
                    <th width="5%">Store/Retailer</th>
                    <th width="1%">Logo</th>
                    <th width="5%">Type</th>
                    <th width="5%">Order</th>
                    <th width="5%">Status</th>
                    <th width="5%">Title</th>
                    <th width="15%">Description</th>
                    <th width="5%" class="text-right">Action</th>
                  </tr>
                </thead>
                <tbody id="storeTableBody">
                </tbody>
                <tfoot>
                  <tr>
                    <th>#</th>
                    <th>Store/Retailer</th>
                    <th>Logo</th>
                    <th>Type</th>
                    <th>Order</th>
                    <th>Status</th>
                    <th>Title</th>
                    <th>Description</th>
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

<div class="modal fade" id="addStoretoHomeFormModal">
  <div class="modal-dialog">
    <div class="modal-content">
      <form id="add_form" action="{{route('admin.home.stores.create')}}" enctype="multipart/form-data">
        @csrf

        <div class="modal-header">
          <h4 class="modal-title">Add Store To Home Page</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>

        <div class="modal-body">

          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <label>Type</label>
                <select class="form-control" name="retailer_type" required="required" id="retailer_type" onchange="get_retailers(this.value);">
                  <option>Select Type</option>
                  <option value="1">Online Stores</option>
                  <option value="2">Retiler Stores</option>
                  <option value="3">All Stores</option>
                </select>
              </div>
            </div>
          </div>

          <div class="row" style="display: none;" id="retailers_div">
            <div class="col-md-12">
              <div class="form-group">
                <label>Store/Retailer</label>
                <select class="form-control" name="retailer_id" required id="retailers">
                </select>
              </div>
            </div>
          </div>


          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <label>Status</label>
                <select class="form-control" name="status" required="required">
                  <option value="">Select Status</option>
                  <option value="1">Active</option>
                  <option value="2">Not Active</option>
                </select>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <label>Order</label>
                <input type="number" class="form-control" name="retailer_order" placeholder="Enter Store Order On Home Page" required>
              </div>
            </div>
          </div>

          <div class="row" style="display: block;" id="retailer_title">
            <div class="col-md-12">
              <div class="form-group">
                <label>Title</label>
                <input type="text" class="form-control" name="retailer_title" id="retailer_title" placeholder="Enter Title">
              </div>
            </div>
          </div>

          <div class="row" style="display: block;" id="retailer_title_ar">
            <div class="col-md-12">
              <div class="form-group">
                <label>AR Title</label>
                <input type="text" class="form-control" name="retailer_title_ar" id="retailer_title_ar_value" placeholder="Enter Arabic Title">
              </div>
            </div>
          </div>

          <div class="row" style="display: block;" id="retailer_desc">
            <div class="col-md-12">
              <div class="form-group">
                <label>Description</label>
                <textarea class="form-control" name="retailer_desc" id="retailer_desc" onKeyDown="charLimit(this.form.retailer_desc,this.form.countdown,125);" placeholder="Enter Description, 125 Char is max string limit !" id="retailer_desc" cols="10" rows="10"></textarea>
              </div>
            </div>
          </div>

          <div class="row" style="display: block;" id="retailer_desc_ar">
            <div class="col-md-12">
              <div class="form-group">
                <label>AR Description</label>
                <textarea class="form-control" name="retailer_desc_ar" id="retailer_desc_ar_value" onKeyDown="charLimit(this.form.retailer_desc,this.form.countdown,125);" placeholder="Enter Arabic Description, 125 Char is max string limit !" id="retailer_desc" cols="10" rows="10"></textarea>
              </div>
            </div>
          </div>

        </div>

        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Add To Home Page</button>
        </div>

      </form>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>

<div class="modal fade" id="editFormModal">
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
  function get_retailers(retailer_type) {


    $.ajax({
      type: 'GET',
      url: "{{ route('admin.home.stores.get-retailers') }}",
      data: {
        'retailer_type': retailer_type
      },
      success: function(data) {
        //console.log(data);

        var retailers_dropdown = $('#retailers');
        retailers_dropdown.empty();
        $("#retailers_div").show();
        $.each(data, function(key, value) {
          retailers_dropdown.append($('<option></option>').attr('value', value.id).text(value.name));
        });

      }
    });

  }

  // AR Title Translation//
  $(document).ready(function() {

    $("#retailer_title").keyup(function() {

      var retailer_title = $(this).find('#retailer_title').val();
      if(retailer_title != ''){
        $.ajax({
          url: "{{route('translate')}}",
          cache: false,
          type: 'POST',
          data: {
            "_token": "{{ csrf_token() }}",
            text: $(this).find('#retailer_title').val(),
          },
          success: function(response) {
            $('#retailer_title_ar_value').val(response);
          }
        });
      }else{
        $('#retailer_title_ar_value').val('');
      }
    });


    $("#retailer_desc").keyup(function() {

      var retailer_desc = $(this).find('#retailer_desc').val();
      if(retailer_desc != ''){
        $.ajax({
          url: "{{route('translate')}}",
          cache: false,
          type: 'POST',
          data: {
            "_token": "{{ csrf_token() }}",
            text: $(this).find('#retailer_desc').val(),
          },
          success: function(response) {
            $('#retailer_desc_ar_value').val(response);
          }
        });
      }else{
        $('#retailer_desc_ar_value').val('');
      }
    });

  });


  $(function() {

    loadStores();

    $(document).on('submit', "#add_form", function(event) {
      var form = $(this);
      var formData = new FormData($("#add_form")[0]);
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
          $('#addStoretoHomeFormModal').modal('hide');
          loadStores();
        } else {
          Toast.fire({
            icon: 'error',
            title: data.errors
          });
        }
      });
      event.preventDefault();
    });

    $(document).on('submit', "#edit_form", function(event) {
      var form = $(this);
      var formData = new FormData($("#edit_form")[0]);
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
          $('#editFormModal').modal('hide');
          loadStores();
        } else {
          Toast.fire({
            icon: 'error',
            title: data.errors
          });
        }
      });

      event.preventDefault();
    });


    $(document).on('click', '.delete', function() {
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
          $.get("{{URL::to('/admin/panel/home/stores/delete')}}/" + id, function(data) {
            console.log(data);
            if (data == 'success') {
              Toast.fire({
                icon: 'success',
                title: 'Success, Store Successfully Deleted From Home Page.'
              });
              loadStores();
            } else {
              Toast.fire({
                icon: 'error',
                title: "Error, while Deleteing the Store."
              });
            }
          });
        }
      });
    });


    $(document).on('click', '.edit', function() {
      var id = $(this).data('id');
      $('#editFormModal .modal-content').html('<img src="{{URL::to('/public/loader.gif')}}" height="50px" style="margin:150px auto;">');
      $('#editFormModal').modal('show');
      $.get("{{URL::to('/admin/panel/home/stores/edit')}}/" + id, function(data) {
        $('#editFormModal .modal-content').html(data);
      });
    });

  });

  $("#filterStores").submit(function(event) {
    $('#storeTableBody').html('<tr class="text-center"><td colspan="9"><img src="{{URL::to('/public/loader.gif')}}" height="30px"></td></tr>');
    var url = "{{route('admin.home.stores.filter')}}";
    var form = $(this);
    $.ajax({
      type: "POST",
      url: url,
      data: form.serialize(),
      encode: true,
    }).done(function(data) {
      $('#storeTableBody').html(data);
      $("#storeTableBody").DataTable();
      $('.reset_button').html('<button type="button" class="btn btn-default mt-32 reset_filter" title="Reset Filter"><i class="fas fa-times"></i></button>')
    });

    event.preventDefault();
  });


  $(document).on('click', '.reset_filter', function() {
    loadRetailers();
    $("#filterStores").trigger('reset');
    $('.reset_button').html('');
  });

  function loadStores() {

    var url = "{{route('admin.home.stores.load')}}";

    $('#storeTableBody').html('<tr class="text-center"><td colspan="6"><img src="{{URL::to('/public/loader.gif')}}" height="30px"></td></tr>');
    $.get(url, function(data) {
      $('#storeTableBody').html(data);
      //$('#storesTable').DataTable();
    });
  }




  function charLimit(limitField, limitCount, limitNum) {
    if (limitField.value.length > limitNum) {
      limitField.value = limitField.value.substring(0, limitNum);
    } else {
      limitCount.value = limitNum - limitField.value.length;
    }
  }

  //--Show-Hide Title-Description--//

  $(document).ready(function() {
    $('#retailer_type').change(function() {
      var selectedSection = $(this).val();

      if (selectedSection === "3") {
        $('#retailer_title').hide();
        $('#retailer_desc').hide();
        $('#retailer_title_ar').hide();
        $('#retailer_desc_ar').hide();

      } else if (selectedSection === "1" || selectedSection === "2") {
        $('#retailer_title').show();
        $('#retailer_desc').show();
        $('#retailer_title_ar').show();
        $('#retailer_desc_ar').show();
      }
    });
  });
</script>

@endsection