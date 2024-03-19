@extends('admin.layout.main')
@section('title', 'Contact Us')
@section('content')

<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">CMS / Contact Us</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Home</a></li>
            <li class="breadcrumb-item active">Contact Us</li>
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
                    <th width="10%">Name</th>
                    <th width="10%">Phone</th>
                    <th width="10%">Email</th>
                    <th width="10%">Subject</th>
                    <th width="5%" class="text-right">Action</th>
                  </tr>
                </thead>
                <tbody id="aboutTableBody">
                </tbody>
                <tfoot>
                  <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Phone</th>
                    <th>Email</th>
                    <th>Subject</th>
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

<div class="modal fade" id="editFormModal">
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
  $(function() {

    loadMsgs();

    $(document).on('submit', "#edit_form", function(event) {
      var form = $(this);
      var formData = new FormData($("#edit_form")[0]);
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
          $('#editFormModal').modal('hide');
          loadMsgs();
        } else {
          Toast.fire({
            icon: 'error',
            title: data.errors
          });
        }
      });

      event.preventDefault();
    });


    

    $(document).on('click', '.edit', function() {
      var id = $(this).data('id');
      $('#editFormModal .modal-content').html('<img src="{{URL::to(' / public / loader.gif ')}}" height="50px" style="margin:150px auto;">');
      $('#editFormModal').modal('show');
      $.get("{{URL::to('/admin/contact/edit')}}/" + id, function(data) {
        $('#editFormModal .modal-content').html(data);
        make_editor("content2");
      });
    });


    $(document).on('click', '.delete', function() {
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
          $.get("{{URL::to('/admin/contact/delete')}}/" + id, function(data) {
            console.log(data);
            if (data == 'success') {
              Toast.fire({
                icon: 'success',
                title: 'Success! Content Successfully Deleted.'
              });
              loadMsgs();
            } else {
              Toast.fire({
                icon: 'error',
                title: "Warning! Content Cannot be deleted !."
              });
            }
          });
        }
      });
    });
  });

  function loadMsgs() {
    var url = "{{route('admin.contact.load')}}";

    $('#aboutTableBody').html('<tr class="text-center"><td colspan="6"><img src="{{URL::to(' / public / loader.gif ')}}" height="30px"></td></tr>');
    $.get(url, function(data) {
      $('#aboutTableBody').html(data);
    });
  }


  $(document).ready(function() {
    $('#about-section-select').change(function() {
      var selectedSection = $(this).val();
      if (selectedSection === "1") {
        $('#about-image-row').show();
      } else {
        $('#about-image-row').hide();
      }
    });
  });

</script>

@endsection