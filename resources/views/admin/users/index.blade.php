@extends('admin.layout.main')
@section('title', 'Users')
@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Users</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Home</a></li>
              <li class="breadcrumb-item active">Users</li>
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
                      <a href="javascript:void(0)" class="btn btn-primary pull-right" title="Add Category" data-toggle="modal" data-target="#addUserFormModal"><i class="fas fa-plus"></i> Add User</a>
                    </div>
                  </div>
              </div>
            </div>
            <div class="card">
              <!-- /.card-header -->
              <div class="card-body">
                <table id="blogsTable" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th width="5%">#</th>
                    <th width="10%">Image</th>
                    <th width="20%">Full Name</th>
                    <th width="15%">Username</th>
                    <th width="15%">Designation</th>
                    <th width="15%">Created By</th>
                    <th width="10%">Status</th>
                    <th width="10%" class="text-right">Action</th>
                  </tr>
                  </thead>
                  <tbody id="blogsTableBody">
                    <tr>
                      <td>1</td>
                      <td><img src="{{URL::to('/public/user-placeholder.jpg')}}" class="table-img"></td>
                      <td>Administrator</td>
                      <td>admin</td>
                      <td>Super Admin</td>
                      <td> - </td>
                      <td> </td>
                      <td class="text-right">
                      </td>
                    </tr>
                    <tr>
                      <td>1</td>
                      <td><img src="{{URL::to('/public/user-placeholder.jpg')}}" class="table-img"></td>
                      <td>Muhammad Waseem</td>
                      <td>captainwasi</td>
                      <td>Developer</td>
                      <td>admin</td>
                      <td>
                        <div class="form-group">
                          <div class="custom-control custom-switch">
                            <input type="checkbox" class="custom-control-input" id="customSwitch1" checked>
                            <label class="custom-control-label" for="customSwitch1"></label>
                          </div>
                        </div>
                      </td>
                      <td class="text-right">
                        <a href="javascript:void(0)" class="btn btn-sm btn-info" title="Edit User" data-id=""><i class="fas fa-edit"></i></a>
                        <a href="javascript:void(0)" class="btn btn-sm btn-danger" title="Delete User" data-id=""><i class="fas fa-trash"></i></a>
                        <!-- <a href="javascript:void(0)" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></a> -->
                      </td>
                    </tr>
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>#</th>
                    <th>Image</th>
                    <th>Full Name</th>
                    <th>Username</th>
                    <th>Designation</th>
                    <th>Created By</th>
                    <th>Status</th>
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


<div class="modal fade" id="addUserFormModal">
  <div class="modal-dialog">
    <div class="modal-content">
      <form id="add_retialer_form" action="">
        @csrf
        <div class="modal-header">
          <h4 class="modal-title">Add User</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="row">
            <div class="col-md-12">
              <div class="category-image-wrapper">
                <input type="file" name="category_image" accept="image/*" />
                <div class="close-btn">×</div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label>Name</label>
                <input type="text" class="form-control" name="name" required>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label>Username</label>
                <input type="text" class="form-control" name="username" required>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <label>Designation</label>
                <input type="text" class="form-control" name="designation" required>
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

@endsection
@section('addScript')

<script>
  $(function () {
    

    $('input[name="category_image"]').on('change', function(){
      readURL(this, $('.category-image-wrapper'));  //Change the image
    });

    $('.close-btn').on('click', function(){ //Unset the image
       let file = $('input[name="category_image"]');
       $('.category-image-wrapper').css('background-image', 'unset');
       $('.category-image-wrapper').removeClass('file-set');
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