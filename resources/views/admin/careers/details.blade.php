@extends('admin.layout.main')
@section('title', 'Applied Job')
@section('content')

<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Applications</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{route('admin.careers')}}">Careers</a></li>
            <li class="breadcrumb-item active">Applicants</li>
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

            @if($data['count'] != 0)
            <!-- /.card-header -->
            <div class="card-body">

              <table id="categoryTable" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th width="20%">Job Title</th>
                    <th width="10%">Salary Bracket</th>
                    <th width="10%">Closing Date</th>
                    <th width="10%">Status</th>
                    <th width="5%">Applicants</th>
                  </tr>
                </thead>
                <tbody>
                  <td>
                    <h5>{{$data['vacancies']->title}}</h5>
                  </td>
                  <td>
                    <h5>{{number_format($data['vacancies']->salary_from).' AED   -   '.number_format($data['vacancies']->salary_to).' AED'}}</h5>
                  </td>
                  <td>
                    <h5>{{$data['vacancies']->end_date}}</h5>
                  </td>
                  <td>
                    <h5>
                      @if($data['vacancies']->status == 1)
                      <span style="color:#50C878;">Active</span>
                      @elseif($data['vacancies']->type == 2)
                      <span style="color:#FF7074;">Not Active</span>
                      @else
                      Unknown
                      @endif
                    </h5>
                  </td>
                  <td>
                    <h5>{{$data['count']}}</h5>
                  </td>
                </tbody>
              </table>
            </div>

            <div class="card-body">
              <table id="categoryTable" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th width="5%">#</th>
                    <th width="20%">Applicant Name</th>
                    <th width="20%">Email</th>
                    <th width="10%">Phone</th>
                    <th width="5%">Resume</th>
                    <th width="5%">Delete</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($data['applied_vacancies'] as $key => $val)
                  <tr>
                    <td>{{++$key}}</td>
                    <td>{{$val->userDetails->name}}</td>
                    <td>{{$val->userDetails->email}}</td>
                    <td>{{$val->userDetails->phone}}</td>
                    <td><a href="{{URL::to('/public/storage/resume/'.$val->resume_file)}}" target="_blank">View</a></td>
                    <td class="text-center">
                      <a href="javascript:void(0)" class="btn btn-sm btn-danger deleteJob" title="Delete Job" data-id="{{base64_encode($val->id)}}"><i class="fas fa-trash"></i></a>
                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
            @else
            <hr>
            <div class="row text-center" style="justify-content: center;">
              <div class="col-lg-6" style="padding: 20px;border-radius:20px;background-color:#FF7074;">
                <span style="font-size: 17px;color:#fff;">NO Applicents for the current job !</span>
              </div>
            </div>
            <hr>
            @endif
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

@endsection
@section('addScript')

<script>
  $(function() {

    $(document).on('click', '.deleteJob', function() {
      var id = $(this).data('id');

      Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this !",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
      }).then((result) => {
        if (result.isConfirmed) {
          $.get("{{URL::to('/admin/careers/deleteAplicant')}}/" + id, function(data) {

            if (data == 'success') {
              Toast.fire({
                icon: 'success',
                title: 'Success! Applied Job Successfully Deleted.'
              });
              // Wait for 1 second1 and then redirect
              setTimeout(function() {
                window.location.href = "{{URL::to('/admin/careers/applied')}}";
              }, 1000); // 1000 milliseconds = 1 second
            } else {
              Toast.fire({
                icon: 'error',
                title: "Warning! Cannot deleted this job !"
              });
            }
          });
        }
      });
    });

  });
</script>

@endsection