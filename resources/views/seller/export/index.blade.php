@extends('seller.layout.main')
@section('title', 'Export')
@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Export</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('seller.dashboard')}}">Home</a></li>
              <li class="breadcrumb-item active">Export</li>
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
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
          <!-- /.col -->
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
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


  });
</script>
@endsection