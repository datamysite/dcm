@extends('admin.layout.main')
@section('title', 'Settings | Loyalty')
@section('content')

<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Loyalty <small><small>- Settings</small></small></h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Home</a></li>
            <li class="breadcrumb-item"><a href="javascript:void(0)">Loyalty</a></li>
            <li class="breadcrumb-item active">Settings</li>
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
                    <h4>Conversion Rate</h4>
                </div>
                <div class="col-md-4">
                  <a href="javascript:void(0)" class="btn btn-primary pull-right" title="Add Link" data-toggle="modal" data-target="#addAboutFormModal1"><i class="fas fa-plus"></i> Add New</a>
                </div>
              </div>
              <br>
              <div class="row">
                <div class="col-md-12">
                  <table class="table">
                    @foreach($ConversionRate as $val)
                      <tr>
                        <td style="width: 40%; padding-left: 0;">{{@$val->country->name}}</td>
                        <td style="width: 20%;">{{$val->coins}} Coins</td>
                        <td style="width: 20%;">{{number_format((float)$val->value, 1, '.', '')}} {{@$val->country->curr}}</td>
                        <td style="width: 20%; text-align: right; padding-right: 0;">
                          <a href="javascript:void(0)" class="btn btn-sm btn-primary editrate" data-id="{{base64_encode($val->id)}}"><i class="fa fa-edit"></i></a>
                          <a href="javascript:void(0)" class="btn btn-sm btn-danger deleterate" data-id="{{base64_encode($val->id)}}"><i class="fa fa-trash"></i></a>
                        </td>
                      </tr>
                    @endforeach
                  </table>
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
                    <h4>Eligibility Parameter</h4>
                </div>
                <div class="col-md-4">
                </div>
              </div>
              <br>
              <div class="row">
                <div class="col-md-12">
                  <table class="table">
                    @foreach($claimtype as $val)
                      <tr>
                        <td style="width: 60%; padding-left: 0;">{{$val->type}}</td>
                        <td style="width: 20%;">{{$val->eligibility}} Coins</td>
                        <td style="width: 20%; text-align: right; padding-right: 0;">
                          <a href="javascript:void(0)" class="btn btn-sm btn-primary editparameter" data-id="{{base64_encode($val->id)}}"><i class="fa fa-edit"></i></a>
                        </td>
                      </tr>
                    @endforeach
                  </table>
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
                </div>
              </div>
            </div>
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>

    </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>


<div class="modal fade" id="addAboutFormModal1">
  <div class="modal-dialog">
    <div class="modal-content">
      <form method="post" action="{{route('admin.loyalty.settings.conversionRate.add')}}">
        @csrf
        <div class="modal-header">
          <h4 class="modal-title">Add Conversion Rate</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">

          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <label>Country</label>
                <select class="form-control" name="country_id" required>
                  <option value="">Select</option>
                  @foreach($countries as $val)
                    <option value="{{$val->id}}">{{$val->name}}</option>
                  @endforeach
                </select>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label>Coins</label>
                <input type="number" class="form-control" name="coins"  value="5" required>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label>Value</label>
                <input type="number" class="form-control" name="value"  value="1.5" required>
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

<script type="text/javascript">
  $(document).on('click', '.deleterate', function() {
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
          $.get("{{URL::to('/admin/panel/loyalty/settings/conversionRate/delete')}}/" + id, function(data) {
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



    $(document).on('click', '.editrate', function() {
      var id = $(this).data('id');
      $('#editCategoryFormModal .modal-content').html('<img src="{{URL::to('/public/loader.gif')}}" height="50px" style="margin:150px auto;">');
      $('#editCategoryFormModal').modal('show');
      $.get("{{URL::to('/admin/panel/loyalty/settings/conversionRate/edit')}}/" + id, function(data) {
        $('#editCategoryFormModal .modal-content').html(data);
      });
    });


    $(document).on('click', '.editparameter', function() {
      var id = $(this).data('id');
      $('#editCategoryFormModal .modal-content').html('<img src="{{URL::to('/public/loader.gif')}}" height="50px" style="margin:150px auto;">');
      $('#editCategoryFormModal').modal('show');
      $.get("{{URL::to('/admin/panel/loyalty/settings/eligibility/edit')}}/" + id, function(data) {
        $('#editCategoryFormModal .modal-content').html(data);
      });
    });
</script>
@endsection