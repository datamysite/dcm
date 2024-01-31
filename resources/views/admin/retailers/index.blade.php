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
                <form id="filterInquiries">
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
                      <a href="javascript:void(0)" class="btn btn-primary mt-32 pull-right" title="Add Retailer" data-toggle="modal" data-target="#addInquiryFormModal"><i class="fas fa-plus"></i> Add Retailer</a>
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
                    <th width="25%">Name</th>
                    <th width="25%">Countries</th>
                    <th width="10%">Discount upto %</th>
                    <th width="10%">No. of Coupons</th>
                    <th width="15%" class="text-right">Action</th>
                  </tr>
                  </thead>
                  <tbody id="retailersTableBody">
                    <tr>
                      <td>1</td>
                      <td><img src="https://www.dealsandcouponsmena.com/slider_posters/Noon%20GCC.webp" class="table-img"></td>
                      <td>Noon</td>
                      <td>UAE, KSA, EGY</td>
                      <td>50%</td>
                      <td>25 Coupons</td>
                      <td class="text-right">
                        <a href="{{route('admin.retailer.coupon')}}" class="btn btn-sm btn-default" title="Coupons" data-id=""><i class="fas fa-tag"></i></a>
                        <a href="{{route('admin.retailer.blog')}}" class="btn btn-sm btn-default" title="Blogs" data-id=""><i class="fas fa-book"></i></a>
                        <a href="javascript:void(0)" class="btn btn-sm btn-info" title="Edit Retailer" data-id=""><i class="fas fa-edit"></i></a>
                        <a href="javascript:void(0)" class="btn btn-sm btn-danger" title="Delete Retailer" data-id=""><i class="fas fa-trash"></i></a>
                        <!-- <a href="javascript:void(0)" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></a> -->
                      </td>
                    </tr>
                    <tr>
                      <td>1</td>
                      <td><img src="https://www.dealsandcouponsmena.com/slider_posters/Lacoste.webp" class="table-img"></td>
                      <td>Lacoste</td>
                      <td>UAE, KSA</td>
                      <td>40%</td>
                      <td>5 Coupons</td>
                      <td class="text-right">
                        <a href="{{route('admin.retailer.coupon')}}" class="btn btn-sm btn-default" title="Coupons" data-id=""><i class="fas fa-tag"></i></a>
                        <a href="{{route('admin.retailer.blog')}}" class="btn btn-sm btn-default" title="Blogs" data-id=""><i class="fas fa-book"></i></a>
                        <a href="javascript:void(0)" class="btn btn-sm btn-info" title="Edit Retailer" data-id=""><i class="fas fa-edit"></i></a>
                        <a href="javascript:void(0)" class="btn btn-sm btn-danger" title="Delete Retailer" data-id=""><i class="fas fa-trash"></i></a>
                        <!-- <a href="javascript:void(0)" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></a> -->
                      </td>
                    </tr>
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>#</th>
                    <th>Logo</th>
                    <th>Name</th>
                    <th>Countries</th>
                    <th>Discount upto %</th>
                    <th>No. of Coupons</th>
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


<div class="modal fade" id="addInquiryFormModal">
  <div class="modal-dialog">
    <div class="modal-content">
      <form id="add_retialer_form" action="">
        @csrf
        <div class="modal-header">
          <h4 class="modal-title">Add Retailer</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="row">
            <div class="col-md-12">

              <div class="retailer-image-wrapper">
                <input type="file" name="retailer_image" accept="image/*" />
                <div class="close-btn">×</div>
              </div>
              <br>
              <div class="form-group">
                <label>Name</label>
                <input type="text" class="form-control" name="name" required>
              </div>
              <div class="form-group">
                <label>Online Store Link#</label>
                <input type="link" class="form-control" name="store_link" required>
              </div>
              <div class="form-group">
                <label>Discount Upto %</label>
                <input type="number" class="form-control" name="discount_upto" required>
              </div>
              <div class="form-group">
                <label>Discount Tags</label>
                <input type="text" class="form-control" name="discount_tags" required>
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
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      
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
    $('.select2').select2();
    //loadInquiries();


    $('input[name="retailer_image"]').on('change', function(){
      readURL(this, $('.retailer-image-wrapper'));  //Change the image
    });

    $('.close-btn').on('click', function(){ //Unset the image
       let file = $('input[name="retailer_image"]');
       $('.retailer-image-wrapper').css('background-image', 'unset');
       $('.retailer-image-wrapper').removeClass('file-set');
       file.replaceWith( file = file.clone( true ) );
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
      var url = "";
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
    var url = "";

    $('#inquiriesTableBody').html('<tr class="text-center"><td colspan="7"><img src="{{URL::to('/public/loader.gif')}}" height="30px"></td></tr>');
    $.get(url, function(data){

      $('#inquiriesTableBody').html(data);

      $("#inquiriesTable").DataTable();
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