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
                <table id="usersTable" class="table table-bordered table-striped">
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
                  <tbody id="usersTableBody">
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
      <form id="add_users_form" action="{{route('admin.users.create')}}" enctype="multipart/form-data">
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
              <div class="profile-image-wrapper">
                <input type="file" name="profile_image" accept="image/*" />
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
                <label>Access Role</label>
                <select class="form-control" name="designation" required>
                  <option value="">Select</option>
                  <option value="admin">Administrator</option>
                  <option value="seo_support">SEO Support</option>
                </select>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label>Password</label>
                <input type="password" class="form-control" name="password" required>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label>Confirm Password</label>
                <input type="password" class="form-control" name="confirm_password" required>
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



<div class="modal fade" id="editUserFormModal">
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
  $(function () {
    loadUsers();

    $('input[name="profile_image"]').on('change', function(){
      readURL(this, $('.profile-image-wrapper'));  //Change the image
    });
    $(document).on('change','input[name="edit_profile_image"]', function(){
      readURL(this, $('.edit_profile-image-wrapper'));  //Change the image
    });

    $(document).on('click','.close-btn', function(){ //Unset the image
       let file = $('input[name="profile_image"]');
       $('.profile-image-wrapper').css('background-image', 'unset');
       $('.profile-image-wrapper').removeClass('file-set');
       file.replaceWith( file = file.clone( true ) );

       let file2 = $('input[name="edit_profile_image"]');
       $('.edit_profile-image-wrapper').css('background-image', 'unset');
       $('.edit_profile-image-wrapper').removeClass('file-set');
       file2.replaceWith( file2 = file2.clone( true ) );
    });


    $(document).on('submit', "#add_users_form", function (event) {
      var form=$(this);
      var formData = new FormData($("#add_users_form")[0]);
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
          $('#addUserFormModal').modal('hide');
          loadUsers();
        }else{
          Toast.fire({
            icon: 'error',
            title: data.errors
          });
        }
      });

      event.preventDefault();
    });


    $(document).on('change', '.changeStatus', function() {
      var id = $(this).data('id');
      var status = '0';
        if(this.checked) {
          status = '1';
        }else{
          status = '0';
        }   
        $.get("{{URL::to('/admin/panel/users/changeStatus')}}/"+id+"/"+status, function(data){
              if(data == 'success'){
                Toast.fire({
                  icon: 'success',
                  title: 'User`s status updated.'
                });
              }else{
                Toast.fire({
                  icon: 'error',
                  title: "Alert! Something went wrong."
                });
              }
          });     
    });


    $(document).on('click', '.deleteUser', function(){
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
          $.get("{{URL::to('/admin/panel/users/delete')}}/"+id, function(data){
              console.log(data);
              if(data == 'success'){
                Toast.fire({
                  icon: 'success',
                  title: 'Success! User Successfully Deleted.'
                });
                loadUsers();
              }else{
                Toast.fire({
                  icon: 'error',
                  title: "Alert! Something went wrong."
                });
              }
          });
        }
      });
    });


    $(document).on('click', '.editUser', function(){
      var id = $(this).data('id');
      $('#editUserFormModal .modal-content').html('<img src="{{URL::to('/public/loader.gif')}}" height="50px" style="margin:150px auto;">');
      $('#editUserFormModal').modal('show');
      $.get("{{URL::to('/admin/panel/users/edit')}}/"+id, function(data){
        $('#editUserFormModal .modal-content').html(data);
      });
    });



    $(document).on('submit', "#edit_users_form", function (event) {
      var form=$(this);
      var formData = new FormData($("#edit_users_form")[0]);
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
          $('#editUserFormModal').modal('hide');
          loadUsers();
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


  function loadUsers(){
    var url = "{{route('admin.users.load')}}";

    $('#usersTableBody').html('<tr class="text-center"><td colspan="8"><img src="{{URL::to('/public/loader.gif')}}" height="30px"></td></tr>');
    $.get(url, function(data){
      $('#usersTableBody').html(data);
      //$('#categoryTable').DataTable();
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