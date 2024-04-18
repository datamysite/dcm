@extends('admin.layout.main')
@section('title', 'Retailers')
@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Retailers</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Retailers</li>
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
                <form id="filterRetailers">
                  @csrf
                  <div class="row">
                    <div class="col-md-3">
                      <label>Retailer Name</label>
                      <input type="text" name="name" class="form-control">
                    </div>
                    <div class="col-md-3">
                      <label>Country</label>
                      <select class="form-control" name="country">
                        <option value="">All</option>
                        @foreach($countries as $val)
                          <option value="{{$val->id}}">{{$val->shortname}}</option>
                        @endforeach
                      </select>
                    </div>
                    <div class="col-md-2">
                      <label>Discount upto %</label>
                      <input type="number" min="1" max="100" name="discount_upto" class="form-control">
                    </div>
                    <div class="col-md-1" style="display: inline-flex;justify-content: space-between;">
                      <button type="submit" class="btn btn-primary mt-32"><i class="fas fa-search"></i></button>
                      <div class="reset_button">
                        
                      </div>
                    </div>
                    <div class="col-md-1">
                      
                    </div>
                    <div class="col-md-2">
                      <a href="javascript:void(0)" class="btn btn-primary mt-32 pull-right" title="Add Retailer" data-toggle="modal" data-target="#addRetailerFormModal"><i class="fas fa-plus"></i> Add Retailer</a>
                    </div>
                  </div>
                </form>
              </div>
            </div>
            <div class="card">
              <!-- /.card-header -->
              <div class="card-body">
                <table id="retialersTable" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th width="5%">#</th>
                    <th width="10%">Logo</th>
                    <th width="20%">Name</th>
                    <th width="15%">Countries</th>
                    <th width="10%">Discount upto %</th>
                    <th width="10%">No. of Coupons</th>
                    <th width="10%">Created by</th>
                    <th width="10%">Seller Panel</th>
                    <th width="10%" class="text-right">Action</th>
                  </tr>
                  </thead>
                  <tbody id="retailersTableBody">
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>#</th>
                    <th>Logo</th>
                    <th>Name</th>
                    <th>Countries</th>
                    <th>Discount upto %</th>
                    <th>No. of Coupons</th>
                    <th>Created by</th>
                    <th>Seller Panel</th>
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


<div class="modal fade" id="addRetailerFormModal">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <form id="add_retialer_form" action="{{route('admin.retailer.create')}}" enctype="multipart/form-data">
        @csrf
        <div class="modal-header">
          <h4 class="modal-title">Add Retailer</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="row">
            <div class="col-md-6">
              <div class="retailer-image-wrapper">
                <input type="file" name="retailer_image" accept="image/*" required/>
                <div class="close-btn">×</div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="ar-retailer-image-wrapper">
                <input type="file" name="ar-retailer_image" accept="image/*" required/>
                <div class="ar-close-btn">×</div>
              </div>
            </div>
            <div class="col-md-7">
              <div class="form-group">
                <label>Name</label>
                <input type="text" class="form-control retailerName" name="name" required>
              </div>
              <div class="form-group">
                <label>Slug <span>{{env('APP_DOMAIN')}}<strong>"slug-here"</strong></span></label>
                <input type="text" class="form-control retailerSlug" name="slug" required>
              </div>
              <div class="form-group form-control type-radio">
                <div class="custom-radio">
                  <input class="custom-control-input" type="radio" id="type1" name="type" value="1" checked="">
                  <label for="type1" class="custom-control-label">Online</label>
                </div>
                <div class="custom-radio">
                  <input class="custom-control-input" type="radio" id="type2" name="type" value="2">
                  <label for="type2" class="custom-control-label">Retail</label>
                </div>
                <div class="custom-radio">
                  <input class="custom-control-input" type="radio" id="type3" name="type" value="3">
                  <label for="type3" class="custom-control-label">Both</label>
                </div>
              </div>
              <div class="form-group">
                <label>Operational Countries</label>
                <select class="form-control" name="country[]" multiple required>
                  @foreach($countries as $val)
                    <option value="{{$val->id}}" {{$val->shortname == 'UAE' ? 'selected' : ''}}>{{$val->shortname}}</option>
                  @endforeach
                </select>
              </div>
              <div class="form-group">
                <label>Operational States</label>
                <select class="form-control" name="states[]" multiple required>
                  @foreach($states as $val)
                    <option value="{{$val->id}}" {{$val->shortname == 'DXB' ? 'selected' : ''}}>{{$val->name}}</option>
                  @endforeach
                </select>
              </div>
            </div>
            <div class="col-md-5">
              <div class="form-group retailerCategories">
                <label>Categories</label>
                <select class="form-control" name="categories[]" multiple required>
                  @foreach($categories as $val)
                    <option value="{{$val->id}}">{{$val->name}}</option>
                    @if(count($val->subCategories) != 0)
                      <optgroup>
                        @foreach($val->subCategories as $sval)
                          <option value="{{$sval->id}}">-&nbsp;&nbsp;{{$sval->name}}</option>
                        @endforeach
                      </optgroup>
                    @endif
                  @endforeach
                </select>
              </div>
            </div>
            <div class="col-md-9">
              <div class="form-group">
                <label>Link# <small>(Optional)</small></label>
                <input type="url" class="form-control" name="store_link">
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group">
                <label>Link Type </label>
                <select class="form-control" name="link_type">
                  <option>Whatsapp</option>
                  <option>Website</option>
                </select>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label>Discount Upto %</label>
                <input type="number" class="form-control" name="discount_upto" required>
              </div>
            </div>
            <div class="col-md-8">
              <div class="form-group">
                <label>Discount Tags <small>(Optional)</small></label>
                <input type="text" class="form-control" name="discount_tags">
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



<div class="modal fade" id="editRetailerFormModal">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>


<div class="modal fade" id="createSellerPanelFormModal">
  <div class="modal-dialog">
    <div class="modal-content">
      <form id="add_sellerPanel_form" action="{{route('admin.retailer.sellerpanel.create')}}" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="retailer_id" class="sp-retailerId">
        <div class="modal-header">
          <h4 class="modal-title">Create Seller Panel</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <label>Retailer Name</label>
                <input type="text" class="form-control sp-retailerName" disabled>
              </div>
              <div class="form-group">
                <label>Username</label>
                <input type="text" class="form-control sp-userName" name="username" required>
              </div>
              <div class="form-group">
                <label>Password</label>
                <input type="text" class="form-control" name="password" required>
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
@endsection
@section('addStyle')
<!-- DataTables -->
  <link rel="stylesheet" href="{{URL::to('/public')}}/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="{{URL::to('/public')}}/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
@endsection
@section('addScript')
<!-- DataTables  & Plugins -->
<script src="{{URL::to('/public')}}/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="{{URL::to('/public')}}/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="{{URL::to('/public')}}/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="{{URL::to('/public')}}/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>


<script>
  $(function () {
    loadRetailers();


    $(document).on('keyup', '.retailerName', function(){
      var a = $(this).val();
 
      var b = a.toLowerCase().replace(/ /g, '-')
        .replace(/[^\w-]+/g, '');
      $('.retailerSlug').val(b);
    });


    $(document).on('keyup', '.editRetailerName', function(){
      var a = $(this).val();
 
      var b = a.toLowerCase().replace(/ /g, '-')
        .replace(/[^\w-]+/g, '');
      $('.editRetailerSlug').val(b);
    });

    $('input[name="retailer_image"]').on('change', function(){
      readURL(this, $('.retailer-image-wrapper'));  //Change the image
    });

    $(document).on('change','input[name="edit_retailer_image"]', function(){
      readURL(this, $('.edit_retailer-image-wrapper'));  //Change the image
    });


    $('input[name="ar-retailer_image"]').on('change', function(){
      readURL(this, $('.ar-retailer-image-wrapper'));  //Change the image
    });

    $(document).on('change','input[name="ar-edit_retailer_image"]', function(){
      readURL(this, $('.ar-edit_retailer-image-wrapper'));  //Change the image
    });

    $(document).on('click','.close-btn', function(){ //Unset the image
       let file = $('input[name="retailer_image"]');
       $('.retailer-image-wrapper').css('background-image', 'unset');
       $('.retailer-image-wrapper').removeClass('file-set');
       file.replaceWith( file = file.clone( true ) );

       let file2 = $('input[name="edit_retailer_image"]');
       $('.edit_retailer-image-wrapper').css('background-image', 'unset');
       $('.edit_retailer-image-wrapper').removeClass('file-set');
       file2.replaceWith( file2 = file2.clone( true ) );
    });


    $(document).on('click','.ar-close-btn', function(){ //Unset the image
       let file = $('input[name="ar-retailer_image"]');
       $('.ar-retailer-image-wrapper').css('background-image', 'unset');
       $('.ar-retailer-image-wrapper').removeClass('file-set');
       file.replaceWith( file = file.clone( true ) );

       let file2 = $('input[name="ar-edit_retailer_image"]');
       $('.ar-edit_retailer-image-wrapper').css('background-image', 'unset');
       $('.ar-edit_retailer-image-wrapper').removeClass('file-set');
       file2.replaceWith( file2 = file2.clone( true ) );
    });


    $(document).on('submit', "#add_retialer_form", function (event) {
      var form=$(this);
      var formData = new FormData($("#add_retialer_form")[0]);
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
          $('.ar-close-btn').click();
          form.trigger("reset");
          $('#addRetailerFormModal').modal('hide');
          loadRetailers();
        }else{
          Toast.fire({
            icon: 'error',
            title: data.errors
          });
        }
      });

      event.preventDefault();
    });


    $(document).on('click', '.deleteRetailer', function(){
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
          $.get("{{URL::to('/admin/panel/retailer/delete')}}/"+id, function(data){
              if(data == 'success'){
                Toast.fire({
                  icon: 'success',
                  title: 'Success! Retailer Successfully Deleted.'
                });
                loadRetailers();
              }else{
                Toast.fire({
                  icon: 'error',
                  title: "Warning! This Retailer has coupons listed."
                });
              }
          });
        }
      });
    });


    $(document).on('click', '.editRetailer', function(){
      var val = $(this).data('id');

      $('#editRetailerFormModal .modal-content').html('<div class="text-center"><img src="{{URL::to('/public/loader.gif')}}" height="30px" style="margin-top:60px; margin-bottom:60px;"></div>');
      $('#editRetailerFormModal').modal('show');

      $.get("{{URL::to('/admin/panel/retailer/edit')}}/"+val, function(data){
        $('#editRetailerFormModal .modal-content').html(data);
        $('.select2').select2();
      });
    });


    $(document).on('submit', "#edit_retialer_form", function (event) {
      var form=$(this);
      var formData = new FormData($("#edit_retialer_form")[0]);
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
          $('#editRetailerFormModal').modal('hide');
          loadRetailers();
        }else{
          Toast.fire({
            icon: 'error',
            title: data.errors
          });
        }
      });

      event.preventDefault();
    });


    $(document).on('click', '.sellerPanel', function(){
      var val_id = $(this).data('id');
      var val_name = $(this).data('name');
      $('.sp-retailerId').val(val_id);
      $('.sp-retailerName').val(val_name);

      $('#createSellerPanelFormModal').modal('show');

    });


    $(document).on('submit', "#add_sellerPanel_form", function (event) {
      var form=$(this);
      var formData = new FormData($("#add_sellerPanel_form")[0]);
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
          $('#createSellerPanelFormModal').modal('hide');
          Swal.fire({
            title: "Credentials",
            icon: "success",
            html: '<textarea class="form-control" readonly rows="4">'+data.data+'</textarea><br><p>Please copy these credentials and share with Retailer.</p>',
            showCloseButton: false,
            showCancelButton: false,
            focusConfirm: false,
            confirmButtonText: `
              <i class="fa fa-thumbs-up"></i> Done!
            `,
          });
          loadRetailers();
        }else{
          Toast.fire({
            icon: 'error',
            title: data.errors
          });
        }
      });

      event.preventDefault();
    });

    $("#filterRetailers").submit(function (event) {
      $('#retailersTableBody').html('<tr class="text-center"><td colspan="9"><img src="{{URL::to('/public/loader.gif')}}" height="30px"></td></tr>');
      var url = "{{route('admin.retailer.filter')}}";
      var form=$(this);
      $.ajax({
        type: "POST",
        url: url,
        data: form.serialize(),
        encode: true,
      }).done(function (data) {
        $('#retailersTableBody').html(data);
        $("#retailersTable").DataTable();
        $('.reset_button').html('<button type="button" class="btn btn-default mt-32 reset_filter" title="Reset Filter"><i class="fas fa-times"></i></button>')
      });

      event.preventDefault();
    }); 


    $(document).on('click', '.reset_filter', function(){
      loadRetailers();
      $("#filterRetailers").trigger('reset');
      $('.reset_button').html('');
    });
  });


  function loadRetailers(){
    var url = "{{route('admin.retailer.load')}}";

    $('#retailersTableBody').html('<tr class="text-center"><td colspan="9"><img src="{{URL::to('/public/loader.gif')}}" height="30px"></td></tr>');
    $.get(url, function(data){

      $('#retailersTableBody').html(data);

      $("#retailersTable").DataTable();
    });
  }

  //FILE
  function readURL(input, obj){
    if(input.files && input.files[0]){
      var reader = new FileReader();
      reader.onload = function(e){
        obj.css('background-image', 'url('+e.target.result+')');
        obj.addClass('file-set');
      }
      reader.readAsDataURL(input.files[0]);
    }
  };
</script>
@endsection