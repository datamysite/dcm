@extends('admin.layout.main')
@section('title', 'Applied Job')
@section('content')

<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Careers / Applied Jobs</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Home</a></li>
            <li class="breadcrumb-item active">Applied Jobs</li>
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
            <!-- /.card-header -->
            <div class="card-body">
              <table id="categoryTable" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th width="5%">#</th>
                    <th width="25%">Job Title</th>
                    <th width="5%">View Applicants</th>
                  
                  </tr>
                </thead>
                <tbody id="categoryTableBody">
                </tbody>
                <tfoot>
                  <tr>
                    <th>#</th>
                    <th>Job Title</th>
                    <th>View Applicants</th>
                   
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

<div class="modal fade" id="editCategoryFormModal">
  <div class="modal-dialog">
    <div class="modal-content">
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
@endsection
@section('addScript')

<script>


  $(function() {

    loadJobs() ;

    $(document).on('submit', "#edit_job_form", function(event) {
      var form = $(this);
      var formData = new FormData($("#edit_job_form")[0]);
      //console.log(formData);
      $.ajax({
        type: "POST",
        url: form.attr("action"),
        data: formData,
        dataType: "json",
        encode: true,
        processData: false,
        contentType: false,
      }).done(function(data) {
        if (data.success == 'success') {
          Toast.fire({
            icon: 'success',
            title: data.message
          });
          $('.close-btn').click();
          form.trigger("reset");
          $('#editCategoryFormModal').modal('hide');
          loadCareers();
        } else {
          Toast.fire({
            icon: 'error',
            title: data.errors
          });
        }
      });

      event.preventDefault();
    });



    $(document).on('click', '.editCategory', function() {
    
    var id = $(this).data('id');

    var url = "{{ route('admin.careers.details', ':id') }}";

  });

  });



 

  function loadJobs() {
    var url = "{{route('admin.careers.load_jobs')}}";

    $('#categoryTableBody').html('<tr class="text-center"><td colspan="6"><img src="{{URL::to(' / public / loader.gif ')}}" height="30px"></td></tr>');
    $.get(url, function(data) {
      $('#categoryTableBody').html(data);
      //$('#categoryTable').DataTable();
    });
  }


</script>

@endsection