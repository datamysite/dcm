@extends('layout.main')
@section('title', 'Inquires')
@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Inquiries</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Inquiries</li>
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
                <form id="filterInquiries">
                  @csrf
                  <div class="row">
                    <div class="col-md-2">
                      <label>From</label>
                      <input type="date" name="from_date" class="form-control">
                    </div>
                    <div class="col-md-2">
                      <label>To</label>
                      <input type="date" name="to_date" class="form-control">
                    </div>
                    <div class="col-md-3">
                      <label>Salesman</label>
                      <select class="form-control" name="salesman">
                        <option value="">All</option>
                        @foreach($salesmen as $val)
                          <option value="{{$val->id}}">{{$val->name}}</option>
                        @endforeach
                      </select>
                    </div>
                    <div class="col-md-1" style="display: inline-flex;justify-content: space-between;">
                      <button type="submit" class="btn btn-info mt-32"><i class="fas fa-search"></i></button>
                      <div class="reset_button">
                        
                      </div>
                    </div>
                    <div class="col-md-2">
                      
                    </div>
                    <div class="col-md-2">
                      <a href="javascript:void(0)" class="btn btn-primary mt-32 pull-right" title="Add Inquiry" data-toggle="modal" data-target="#addInquiryFormModal"><i class="fas fa-plus"></i> Add Inquiry</a>
                    </div>
                  </div>
                </form>
              </div>
            </div>
            <div class="card">
              <!-- /.card-header -->
              <div class="card-body">
                <table id="inquiriesTable" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Inq#</th>
                    <th>Date</th>
                    <th>Customer</th>
                    <th>Zone</th>
                    <th>Salesman</th>
                    <th>No. of Products</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody id="inquiriesTableBody">
                  
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>Inq#</th>
                    <th>Date</th>
                    <th>Customer</th>
                    <th>Zone</th>
                    <th>Salesman</th>
                    <th>No. of Products</th>
                    <th>Action</th>
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


<div class="modal fade" id="addInquiryFormModal">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <form id="add_inquiry_form" action="{{route('inquiries.create')}}">
        @csrf
        <div class="modal-header">
          <h4 class="modal-title">Add Inquiry</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="row">
            <div class="col-md-12">
              <p class="form-heading">Customer</p>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label>Name</label>
                <select class="form-control form-control-lg select2" id="add_customer_name_field" name="customer" style="width: 100%;">
                  <option disabled selected>Select</option>
                  @foreach($customers as $val)
                    <option value="{{$val->id}}">{{$val->name.'  ( '.$val->contact_person.' - '.$val->contact_person_mobile.' )'}}</option>
                  @endforeach
                </select>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label>Email</label>
                <input type="email" class="form-control" id="add_customer_email" disabled>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label>Phone</label>
                <input type="text" class="form-control" id="add_customer_phone" disabled>
              </div>
            </div>
            <div class="col-md-12">
              <div class="form-group">
                <label>Address</label>
                <input type="text" class="form-control" id="add_customer_address" disabled>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-12">
              <p class="form-heading">Products</p>
            </div>
            <div class="col-md-12" id="add_customer_product_tray">
              <div class="row">
                <div class="col-md-4">
                  <div class="form-group">
                    <label>Name</label>
                    <select class="form-control form-control-lg select2 add_customer_add_product_name" style="width: 100%;" name="product[]" required>
                      <option selected="selected" disabled>Select</option>
                      @foreach($products as $val)
                        <option value="{{$val->id}}">{{$val->name}}</option>
                      @endforeach
                    </select>
                  </div>
                </div>
                <div class="col-md-2">
                  <div class="form-group">
                    <label>Brand</label>
                    <input type="text" class="form-control add_customer_add_brand" disabled>
                  </div>
                </div>
                <div class="col-md-2">
                  <div class="form-group">
                    <label>Category</label>
                    <input type="text" class="form-control add_customer_add_category" disabled>
                  </div>
                </div>
                <div class="col-md-1">
                  <div class="form-group">
                    <label>Quantity</label>
                    <input type="number" class="form-control add_customer_add_qty" value="1" name="qty[]" required>
                  </div>
                </div>
                <div class="col-md-2">
                  <div class="form-group">
                    <label>Price</label>
                    <input type="text" class="form-control add_customer_add_price" name="price[]" readonly>
                  </div>
                </div>
                <div class="col-md-1">
                  <div class="form-group">
                    <button type="button" class="btn btn-primary mt-23 pull-right add_customer_add_product"><i class="fas fa-plus"></i></button>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-12">
              <p class="form-heading">Additional Information</p>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label>Description</label>
                <textarea class="form-control" name="description" rows="5"></textarea>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label>Special Remarks</label>
                <textarea class="form-control" name="special_remarks" rows="5"></textarea>
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



<div class="modal fade" id="editInquiryFormModal">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>

<div class="modal fade" id="viewInquiryFormModal">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Inquiry Details</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">

        </div>
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
  <!-- Select2 -->
  <link rel="stylesheet" href="{{URL::to('/public')}}/plugins/select2/css/select2.min.css">
  <link rel="stylesheet" href="{{URL::to('/public')}}/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
@endsection
@section('addScript')
<!-- DataTables  & Plugins -->
<script src="{{URL::to('/public')}}/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="{{URL::to('/public')}}/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="{{URL::to('/public')}}/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="{{URL::to('/public')}}/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>

<!-- Select2 -->
<script src="{{URL::to('/public')}}/plugins/select2/js/select2.full.min.js"></script>

<script>
  $(function () {
    $('.select2').select2();
    loadInquiries();

    var Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 5000
    });

    $(document).on('change', '#add_customer_name_field', function(){
      var val = $(this).val();

      $.getJSON("{{URL::to('/inquiries/get_customer/')}}/"+val, function(data){
        if(data.success == 'success'){
          $('#add_customer_email').val(data.data.email);
          $('#add_customer_phone').val(data.data.phone);
          $('#add_customer_address').val(data.data.address);
          
        }
      });

      //alert(val);
    });

    $(document).on('click', '.add_customer_add_product', function(){
      $('#add_customer_product_tray').append('<div class="row"> <div class="col-md-4"> <div class="form-group"> <select class="form-control form-control-lg select2 add_customer_add_product_name" style="width: 100%;" name="product[]" required> <option selected="selected" disabled>Select</option> @foreach($products as $val) <option value="{{$val->id}}">{{$val->name}}</option> @endforeach </select> </div> </div> <div class="col-md-2"> <div class="form-group"> <input type="text" class="form-control add_customer_add_brand" disabled> </div> </div> <div class="col-md-2"> <div class="form-group"> <input type="text" class="form-control add_customer_add_category" disabled> </div> </div> <div class="col-md-1"> <div class="form-group"> <input type="number" class="form-control add_customer_add_qty" name="qty[]" value="1" required> </div> </div> <div class="col-md-2"> <div class="form-group"> <input type="text" class="form-control add_customer_add_price" name="price[]" readonly> </div> </div> <div class="col-md-1"> <div class="form-group"> <button type="button" class="btn btn-danger pull-right add_customer_remove_product"><i class="fas fa-minus"></i></button> </div> </div> </div>');

      $('.select2').select2();
    });

    $(document).on('click', '.add_customer_remove_product', function(){
      $(this).parent().parent().parent().remove();
    });

    $(document).on('change', '.add_customer_add_product_name', function(){
      var ele = $(this).parent().parent().parent();
      var val = $(this).val();

      $.getJSON("{{URL::to('/inquiries/get_product/')}}/"+val, function(data){
        if(data.success == 'success'){

          $(ele).find('.add_customer_add_brand').val(data.data.brand);
          $(ele).find('.add_customer_add_category').val(data.data.category);
          $(ele).find('.add_customer_add_price').val( data.data.price);
          
        }
      });
    });

    $("#add_inquiry_form").submit(function (event) {
      var form=$(this);
      $.ajax({
        type: "POST",
        url: form.attr("action"),
        data: form.serialize(),
        dataType: "json",
        encode: true,
      }).done(function (data) {
        //console.log(data);
        if(data.success == 'success'){
          Toast.fire({
            icon: 'success',
            title: data.message
          });
          setTimeout(function(){
            window.location.href = window.location.href;
          }, 500);
        }else{
          Toast.fire({
            icon: 'error',
            title: data.errors
          });
        }
      });

      event.preventDefault();
    });

    $(document).on('click', '.viewInquiry', function(){
      var val = $(this).data('id');

      $('#viewInquiryFormModal .modal-body').html('<div class="text-center"><img src="{{URL::to('/public/loader.gif')}}" height="30px" style="margin-top:60px; margin-bottom:60px;"></div>');
      $('#viewInquiryFormModal').modal('show');

      $.get("{{URL::to('/inquiries/view')}}/"+val, function(data){
        $('#viewInquiryFormModal .modal-body').html(data);
      });
    });



    $(document).on('click', '.editInquiry', function(){
      var val = $(this).data('id');

      $('#editInquiryFormModal .modal-content').html('<div class="text-center"><img src="{{URL::to('/public/loader.gif')}}" height="30px" style="margin-top:60px; margin-bottom:60px;"></div>');
      $('#editInquiryFormModal').modal('show');

      $.get("{{URL::to('/inquiries/edit')}}/"+val, function(data){
        $('#editInquiryFormModal .modal-content').html(data);
        $('.select2').select2();
      });
    });

    $(document).on('change', '#edit_customer_name_field', function(){
      var val = $(this).val();

      $.getJSON("{{URL::to('/inquiries/get_customer/')}}/"+val, function(data){
        if(data.success == 'success'){
          $('#edit_customer_email').val(data.data.email);
          $('#edit_customer_phone').val(data.data.phone);
          $('#edit_customer_address').val(data.data.address);
          
        }
      });

      //alert(val);
    });


    $(document).on('click', '.edit_customer_add_product', function(){
      $('#edit_customer_product_tray').append('<div class="row"> <div class="col-md-4"> <div class="form-group"> <select class="form-control form-control-lg select2 add_customer_add_product_name" style="width: 100%;" name="product[]" required> <option selected="selected" disabled>Select</option> @foreach($products as $val) <option value="{{$val->id}}">{{$val->name}}</option> @endforeach </select> </div> </div> <div class="col-md-2"> <div class="form-group"> <input type="text" class="form-control edit_customer_add_brand" disabled> </div> </div> <div class="col-md-2"> <div class="form-group"> <input type="text" class="form-control add_customer_add_category" disabled> </div> </div> <div class="col-md-1"> <div class="form-group"> <input type="number" class="form-control edit_customer_add_qty" name="qty[]" value="1" required> </div> </div> <div class="col-md-2"> <div class="form-group"> <input type="text" class="form-control edit_customer_add_price" name="price[]" readonly> </div> </div> <div class="col-md-1"> <div class="form-group"> <button type="button" class="btn btn-danger pull-right edit_customer_remove_product"><i class="fas fa-minus"></i></button> </div> </div> </div>');

      $('.select2').select2();
    });

    $(document).on('change', '.edit_customer_add_product_name', function(){
      var ele = $(this).parent().parent().parent();
      var val = $(this).val();

      $.getJSON("{{URL::to('/inquiries/get_product/')}}/"+val, function(data){
        if(data.success == 'success'){

          $(ele).find('.edit_customer_add_brand').val(data.data.brand);
          $(ele).find('.edit_customer_add_category').val(data.data.category);
          $(ele).find('.edit_customer_add_price').val( data.data.price);
          
        }
      });
    });

    $(document).on('click', '.edit_customer_remove_product', function(){
      $(this).parent().parent().parent().remove();
    });



    $(document).on("submit", "#edit_inquiry_form", function (event) {
      var form=$(this);
      $.ajax({
        type: "POST",
        url: form.attr("action"),
        data: form.serialize(),
        dataType: "json",
        encode: true,
      }).done(function (data) {
        //console.log(data);
        if(data.success == 'success'){
          Toast.fire({
            icon: 'success',
            title: data.message
          });
          $('#editInquiryFormModal').modal('hide');
        }else{
          Toast.fire({
            icon: 'error',
            title: data.errors
          });
        }
      });

      event.preventDefault();
    });

    $("#filterInquiries").submit(function (event) {
      $('#inquiriesTableBody').html('<tr class="text-center"><td colspan="9"><img src="{{URL::to('/public/loader.gif')}}" height="30px"></td></tr>');
      var url = "{{route('inquiries.filter')}}";
      var form=$(this);
      $.ajax({
        type: "POST",
        url: url,
        data: form.serialize(),
        encode: true,
      }).done(function (data) {
        $('#inquiriesTableBody').html(data);
        $("#inquiriesTable").DataTable();
        $('.reset_button').html('<button type="button" class="btn btn-default mt-32 reset_filter" title="Reset Filter"><i class="fas fa-times"></i></button>')
      });

      event.preventDefault();
    }); 


    $(document).on('click', '.reset_filter', function(){
      loadInquiries();
      $("#filterInquiries").trigger('reset');
      $('.reset_button').html('');
    });
  });


  function loadInquiries(){
    var url = "{{route('inquiries.load')}}";

    $('#inquiriesTableBody').html('<tr class="text-center"><td colspan="7"><img src="{{URL::to('/public/loader.gif')}}" height="30px"></td></tr>');
    $.get(url, function(data){

      $('#inquiriesTableBody').html(data);

      $("#inquiriesTable").DataTable();
    });
  }
</script>
@endsection