@extends('admin.layout.main')
@section('title', 'Invoices | Users')
@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Invoices <small><small> - Users </small></small></h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Home</a></li>
              <li class="breadcrumb-item"><a href="{{route('admin.webUsers')}}">Users</a></li>
              <li class="breadcrumb-item active">Invoices</li>
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
                  <form method="get">
                  @csrf
                  <div class="row">
                    <div class="col-md-3">
                      <label>Filter Date</label>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text">
                            <i class="far fa-calendar-alt"></i>
                          </span>
                        </div>
                        <input type="text" class="form-control float-right" name="date_range" value="{{@$req['date_range']}}" id="filter_range">
                      </div>
                    </div>
                    <div class="col-md-2">
                      <label>Status</label>
                      <select class="form-control" name="status">
                        <option value="">All</option>
                        <option value="1" {{!empty($req['status']) && $req['status'] == '1' ? 'selected' : ''}}>Pending</option>
                        <option value="2" {{!empty($req['status']) && $req['status'] == '2' ? 'selected' : ''}}>Accepted</option>
                        <option value="4" {{!empty($req['status']) && $req['status'] == '3' ? 'selected' : ''}}>Rejected</option>
                      </select>
                    </div>
                    <div class="col-md-1" style="display: inline-flex;justify-content: space-between;align-items: flex-end;">
                      <button type="submit" class="btn btn-primary mt-32"><i class="fas fa-search"></i></button>
                      @if(!empty($req))
                        <a href="{{route('admin.users.invoices')}}" class="btn btn-default">Clear</a>
                      @endif
                    </div>
                    <div class="col-md-4">
                      
                    </div>
                  </div>
                </form>
              </div>
            </div>
            <div class="card">
              <!-- /.card-header -->
              <div class="card-body">
                <table id="usersTable" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th width="5%">#</th>
                    <th width="5%">Request#</th>
                    <th width="30%">Users</th>
                    <th width="20%">Invoice</th>
                    <th width="10%">Status</th>
                    <th width="10%">Request at</th>
                    <th width="10%" class="text-right">Action</th>
                  </tr>
                  </thead>
                  <tbody>
                    @foreach($requests as $key => $val)
                      <tr>
                        <td>{{++$key}}</td>
                        <td>{{sprintf("%05d", $val->id)}}</td>
                        <td>
                          <div class="user-profile-block">
                            <p>
                              <label>{{@$val->userDetails->name}}</label>
                              <span>{{@$val->userDetails->email}}</span>
                            </p>
                            <span>Curr Wallet: <strong>{{number_format(@$val->userDetails->wallet)}} <small><small>Coins</small></small></strong></span>
                          </div>
                        </td>
                        <td>
                          <a href="{{URL::to('/public/storage/users/invoices/'.$val->invoice_file)}}" target="_blank">{{$val->invoice_file}}</a>
                        </td>
                        <td>
                          @switch($val->status)
                            @case('1')
                              <span class="badge badge-warning">Pending</span>
                              @break

                            @case('2')
                              <span class="badge badge-success">Accepted</span>
                              @break

                            @case('3')
                              <span class="badge badge-danger">Rejected</span>
                              @break

                          @endswitch
                        </td>
                        <td><small>{{date('d-M-Y | H:i:a', strtotime($val->created_at))}}</small></td>
                        <td class="text-right">
                          @if($val->status == '1')
                            <a href="javascript:void(0)" class="btn btn-sm btn-info approveRequest" title="Aprrove" data-id="{{base64_encode($val->id)}}"><i class="fas fa-check"></i></a>
                            <a href="javascript:void(0)" class="btn btn-sm btn-danger rejectRequest" title="Reject" data-id="{{base64_encode($val->id)}}"><i class="fas fa-ban"></i></a>
                          @endif
                        </td>
                      </tr>
                    @endforeach
                    @if(count($requests) == 0)
                      <tr>
                        <td colspan="8">No Requests Found.</td>
                      </tr>
                    @endif
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>#</th>
                    <th>Request#</th>
                    <th>Users</th>
                    <th>Invoice</th>
                    <th>Status</th>
                    <th>Request at</th>
                    <th class="text-right">Action</th>
                  </tr>
                  </tfoot>
                </table>

                <div class="row mt-8 text-center">
                   <div class="col">
                      <!-- nav -->
                      {{ $requests->links() }}
                   </div>
                </div>
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
                <label>Designation</label>
                <input type="text" class="form-control" name="designation" required>
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



<div class="modal fade" id="rejectRequestFormModal">
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
    $('#filter_range').daterangepicker({
        autoUpdateInput: false,
        locale: {
            format: 'DD/MMM/YYYY',
            cancelLabel: 'Clear'
        }
    });
    $('input[name="date_range"]').on('apply.daterangepicker', function(ev, picker) {
        $(this).val(picker.startDate.format('DD/MMM/YYYY') + ' - ' + picker.endDate.format('DD/MMM/YYYY'));
    });

    $('input[name="date_range"]').on('cancel.daterangepicker', function(ev, picker) {
        $(this).val('');
    });

    $(document).on('click', '.approveRequest', function() {
      var id = $(this).data('id');

      Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, Approve it!'
      }).then((result) => {
        if (result.isConfirmed) {
          $.get("{{URL::to('/admin/panel/web/users/invoices/approve')}}/" + id, function(data) {
            console.log(data);
            if (data == 'success') {
              Toast.fire({
                icon: 'success',
                title: 'Success! Request Successfully Approved.'
              });
              setTimeout(function(){
                window.location.reload();
              }, 500);
            } else {
              Toast.fire({
                icon: 'error',
                title: "Warning! Something went wrong!."
              });
            }
          });
        }
      });
    });

    $(document).on('click', '.rejectRequest', function() {
      var id = $(this).data('id');

      Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, Reject it!'
      }).then((result) => {
        if (result.isConfirmed) {
          $.get("{{URL::to('/admin/panel/web/users/invoices/reject')}}/" + id, function(data) {
            console.log(data);
            if (data == 'success') {
              Toast.fire({
                icon: 'success',
                title: 'Success! Request Successfully Rejected.'
              });
              setTimeout(function(){
                window.location.reload();
              }, 500);
            } else {
              Toast.fire({
                icon: 'error',
                title: "Warning! Something went wrong!."
              });
            }
          });
        }
      });
    });
  </script>
@endsection