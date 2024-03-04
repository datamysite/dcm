@extends('admin.layout.main')
@section('title', 'Retail Offers | Retailers')
@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Retail Offers | Retailers</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Home</a></li>
              <li class="breadcrumb-item"><a href="{{route('admin.retailer')}}">Retailers</a></li>
              <li class="breadcrumb-item active">Retail Offers</li>
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
                      <input type="text" placeholder="Search for Retailer..." class="form-control searchRetailer">
                      <i class="fas fa-search"></i>
                      <div class="searchbar-suggestion">
                      </div>
                    </div>
                    <div class="col-md-3">
                      <a href="javascript:void(0)" class="btn btn-primary pull-right" title="Add Offer" data-toggle="modal" data-target="#addOffersFormModal"><i class="fas fa-plus"></i> Add Offer</a>
                    </div>
                  </div>
                  <br>
                  <div class="row coupon-row">
                    <div class="col-md-5">
                      <div class="coupon-brand-image">
                        <img src="{{URL::to('/public/storage/retailers/'.$retailer->logo)}}">
                      </div>
                    </div>
                    <div class="col-md-3 coupon-brand-detail">
                      <label>Name:</label>
                      <p>{{$retailer->name}} <a href="{{empty($retailer->store_link) ? 'javascript:void(0)' : $retailer->store_link}}" target="_blank"><i class="fa fa-external-link"></i></a></p>

                      <label>Countries:</label>
                      <p>
                        @php
                          $countries = '';
                          foreach($retailer->countries as $cval){
                            $countries .= empty($countries) ? $cval->country->shortname : ', '.$cval->country->shortname;
                          }
                          echo $countries;
                        @endphp
                      </p>
                    </div>
                    <div class="col-md-3 coupon-brand-detail">
                      <label>No. of Coupons:</label>
                      <p>0 Coupons</p>

                      <label>Discount Upto %:</label>
                      <p>{{$retailer->discount_upto}} %</p>
                    </div>
                  </div>
              </div>
            </div>
            <div class="card">
              <!-- /.card-header -->
              <div class="card-body">
                <table id="couponsTable" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th width="5%">#</th>
                    <th width="25%">Title</th>
                    <th width="15%">Discount</th>
                    <th width="15%">Country</th>
                    <th width="20%">Category</th>
                    <th width="10%">Created By</th>
                    <th width="10%" class="text-right">Action</th>
                  </tr>
                  </thead>
                  <tbody id="couponsTableBody">
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>#</th>
                    <th>Title</th>
                    <th>Discount</th>
                    <th>Country</th>
                    <th>Category</th>
                    <th>Created By</th>
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


<div class="modal fade" id="addOffersFormModal">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <form id="add_retialer_offer_form" action="{{route('admin.retailer.offer.create')}}">
        @csrf
        <input type="hidden" name="retailer_id" value="{{base64_encode($retailer->id)}}">
        <div class="modal-header">
          <h4 class="modal-title">Add Offer</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="row">
            <div class="col-md-12">
              <div class="coupon-image-wrapper">
                <input type="file" name="coupon_image" accept="image/*"/>
                <div class="close-btn">×</div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-7">
              <div class="form-group">
                <label>Title</label>
                <input type="text" class="form-control" name="title" required>
              </div>

              <div class="form-group">
                <label>Discount %</label>
                <input type="number" class="form-control" min="1" max="100" name="discount" required>
              </div>

              <div class="form-group">
                <label>Country</label>
                <select class="form-control" name="country" required>
                  @foreach($country as $val)
                    <option value="{{$val->id}}">{{$val->shortname}}</option>
                  @endforeach
                </select>
              </div>
            </div>
            <div class="col-md-5">
              <div class="form-group retailerCategories">
                <label>Categories</label>
                <select class="form-control" name="categories[]" multiple required>
                  @foreach($categories as $val)
                    @if($val->category->parent_id == 0)
                      <option value="{{$val->category_id}}">{{@$val->category->name}}</option>
                    @else
                      <optgroup>
                        <option value="{{$val->category_id}}">-&nbsp;&nbsp;{{@$val->category->name}}</option>
                      </optgroup>
                    @endif
                  @endforeach
                </select>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <label>Description <small>(Optional)</small></label>
                <textarea class="form-control" name="description" rows="4"></textarea>
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



<div class="modal fade" id="editofferFormModal">
  <div class="modal-dialog modal-lg">
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
    loadOffers();    

    $(document).on('keyup', '.discountCalculate', function(){
      var discount = parseInt($('.discount').val());
      var cashback = parseInt($('.dcmCashback').val());
      $('.totalDiscount').val(discount+cashback);
    });

    $(document).on('keyup', '.searchRetailer', function(){
      $('.searchbar-suggestion').html('<img src="{{URL::to('/public/loader-gif.gif')}}" height="30px">');
      var val = $(this).val();
      if(val != ''){
        $.get("{{URL::to('/admin/panel/retailer/offers/search')}}/"+val, function(data){
          $('.searchbar-suggestion').html(data);
        });
      }else{
        $('.searchbar-suggestion').html('');
      }
    });


    $(document).on('focusout', '.searchRetailer', function(){
      var el = $(this);
      setTimeout(function(){
          el.val('');
          $('.searchbar-suggestion').html('');
        }, 200);
    });

    $('input[name="coupon_image"]').on('change', function(){
      readURL(this, $('.coupon-image-wrapper'));  //Change the image
    });

    $(document).on('change','input[name="edit_coupon_image"]', function(){
      readURL(this, $('.edit_coupon-image-wrapper'));  //Change the image
    });

    $(document).on('click','.close-btn', function(){ //Unset the image
       let file = $('input[name="coupon_image"]');
       $('.coupon-image-wrapper').css('background-image', 'unset');
       $('.coupon-image-wrapper').removeClass('file-set');
       file.replaceWith( file = file.clone( true ) );

       let file2 = $('input[name="edit_coupon_image"]');
       $('.edit_coupon-image-wrapper').css('background-image', 'unset');
       $('.edit_coupon-image-wrapper').removeClass('file-set');
       file2.replaceWith( file2 = file2.clone( true ) );
    });




    $(document).on('submit', "#add_retialer_offer_form", function (event) {
      var form=$(this);
      var formData = new FormData($("#add_retialer_offer_form")[0]);
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
          $('#addOffersFormModal').modal('hide');
          loadOffers();
        }else{
          Toast.fire({
            icon: 'error',
            title: data.errors
          });
        }
      });

      event.preventDefault();
    });


    $(document).on('click', '.deleteOffer', function(){
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
          $.get("{{URL::to('/admin/panel/retailer/offers/delete')}}/"+id, function(data){
            Toast.fire({
              icon: 'success',
              title: 'Success! Offer Successfully Deleted.'
            });
            loadOffers();
          });
        }
      });
    });



    $(document).on('click', '.editOffer', function(){
      var val = $(this).data('id');

      $('#editofferFormModal .modal-content').html('<div class="text-center"><img src="{{URL::to('/public/loader.gif')}}" height="30px" style="margin-top:60px; margin-bottom:60px;"></div>');
      $('#editofferFormModal').modal('show');

      $.get("{{URL::to('/admin/panel/retailer/offers/edit')}}/"+val, function(data){
        $('#editofferFormModal .modal-content').html(data);
      });
    });
    

    $(document).on('submit', "#edit_retialer_offer_form", function (event) {
      var form=$(this);
      var formData = new FormData($("#edit_retialer_offer_form")[0]);
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
          $('#editofferFormModal').modal('hide');
          loadOffers();
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


  function loadOffers(){
    var url = "{{route('admin.retailer.offer.load', base64_encode($retailer->id))}}";

    $('#couponsTableBody').html('<tr class="text-center"><td colspan="9"><img src="{{URL::to('/public/loader.gif')}}" height="30px"></td></tr>');
    $.get(url, function(data){

      $('#couponsTableBody').html(data);

      //$("#couponsTable").DataTable();
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