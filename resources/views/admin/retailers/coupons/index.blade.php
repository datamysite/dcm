@extends('admin.layout.main')
@section('title', 'Coupons | Retailers')
@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Coupons | Retailers</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Home</a></li>
              <li class="breadcrumb-item"><a href="{{route('admin.retailer')}}">Retailers</a></li>
              <li class="breadcrumb-item active">Coupons</li>
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
                      <a href="javascript:void(0)" class="btn btn-primary pull-right" title="Add Coupon" data-toggle="modal" data-target="#addCouponFormModal"><i class="fas fa-plus"></i> Add Coupon</a>
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
                    <th>Image</th>
                    <th>Coupon Code</th>
                    <th>Country</th>
                    <th>Heading</th>
                    <th>Category</th>
                    <th>Discount</th>
                    <th>DCM Cashback</th>
                    <th class="text-right">Action</th>
                  </tr>
                  </thead>
                  <tbody id="couponsTableBody">
                    <tr>
                      <td>1</td>
                      <td><img src="https://dealsandcouponsmena.com/slider_posters/Noon%20GCC-AAB87.webp" class="table-img"></td>
                      <td><strong>DCM10</strong></td>
                      <td>UAE</td>
                      <td>Flat 10% Off on your App Order in UAE</td>
                      <td>Fashion and Lifestyle</td>
                      <td>10%</td>
                      <td>2%</td>
                      <td class="text-right">
                        <a href="javascript:void(0)" class="btn btn-sm btn-info" title="Edit Coupon" data-id=""><i class="fas fa-edit"></i></a>
                        <a href="javascript:void(0)" class="btn btn-sm btn-danger" title="Delete Coupon" data-id=""><i class="fas fa-trash"></i></a>
                        <!-- <a href="javascript:void(0)" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></a> -->
                      </td>
                    </tr>
                    <tr>
                      <td>1</td>
                      <td><img src="https://dealsandcouponsmena.com/slider_posters/Noon%20GCC-AAB87.webp" class="table-img"></td>
                      <td><strong>DCM10</strong></td>
                      <td>UAE</td>
                      <td>Flat 10% Off on your App Order in UAE</td>
                      <td>Fashion and Lifestyle</td>
                      <td>10%</td>
                      <td>2%</td>
                      <td class="text-right">
                        <a href="javascript:void(0)" class="btn btn-sm btn-info" title="Edit Coupon" data-id=""><i class="fas fa-edit"></i></a>
                        <a href="javascript:void(0)" class="btn btn-sm btn-danger" title="Delete Coupon" data-id=""><i class="fas fa-trash"></i></a>
                        <!-- <a href="javascript:void(0)" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></a> -->
                      </td>
                    </tr>
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>#</th>
                    <th>Image</th>
                    <th>Coupon Code</th>
                    <th>Country</th>
                    <th>Heading</th>
                    <th>Category</th>
                    <th>Discount</th>
                    <th>DCM Cashback</th>
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


<div class="modal fade" id="addCouponFormModal">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <form id="add_retialer_form" action="">
        @csrf
        <div class="modal-header">
          <h4 class="modal-title">Add Coupon</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="row">
            <div class="col-md-12">
              <div class="coupon-image-wrapper">
                <input type="file" name="coupon_image" accept="image/*" />
                <div class="close-btn">×</div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-4">
              <div class="form-group">
                <label>Coupon Code</label>
                <input type="text" class="form-control" name="code" required>
              </div>
            </div>
            <div class="col-md-8">
              <div class="form-group">
                <label>Heading</label>
                <input type="text" class="form-control" name="heading" required>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-7">
              <div class="form-group">
                <label>Link#</label>
                <input type="link" class="form-control" name="link" required>
              </div>
            </div>
            <div class="col-md-5">
              <div class="form-group">
                <label>Category</label>
                <select class="form-control" name="category" required>
                  <option>Select</option>
                </select>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-3">
              <div class="form-group">
                <label>Discount</label>
                <input type="number" class="form-control" min="1" max="100" name="discount" required>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label>Discount Tags</label>
                <input type="text" class="form-control" name="discount_tags" required>
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group">
                <label>DCM Cashback</label>
                <input type="number" class="form-control" min="1" max="100" name="dcm_cashback" required>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-3">
              <div class="form-group">
                <label>Total Discount</label>
                <input type="number" class="form-control" min="1" max="100" name="total_discount" readonly>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label>People Used</label>
                <input type="number" class="form-control" name="people_used" required>
              </div>
            </div>
            <div class="col-md-5">
              <div class="form-group">
                <label>Country</label>
                <select class="form-control" name="country" required>
                  <option>Select</option>
                </select>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <label>Description</label>
                <textarea class="form-control" name="Description" rows="4">
                </textarea>
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
    

    $(document).on('keyup', '.searchRetailer', function(){
      $('.searchbar-suggestion').html('<img src="{{URL::to('/public/loader-gif.gif')}}" height="30px">');
      var val = $(this).val();
      if(val != ''){
        $.get("{{URL::to('/admin/retailer/coupon/search')}}/"+val, function(data){
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

    $('.close-btn').on('click', function(){ //Unset the image
       let file = $('input[name="coupon_image"]');
       $('.coupon-image-wrapper').css('background-image', 'unset');
       $('.coupon-image-wrapper').removeClass('file-set');
       file.replaceWith( file = file.clone( true ) );
    });



  });



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