@extends('admin.layout.main')
@section('title', 'Careers')
@section('content')

<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Careers</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Home</a></li>
            <li class="breadcrumb-item active">Careers</li>
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
                  <a href="javascript:void(0)" class="btn btn-primary pull-right" title="Add New Job" data-toggle="modal" data-target="#addCategoryFormModal"><i class="fas fa-plus"></i> Add New Job</a>
                </div>
              </div>
            </div>
          </div>
          <div class="card">
            <!-- /.card-header -->
            <div class="card-body">
              <table id="categoryTable" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th width="5%">#</th>
                    <th width="30%">Title</th>
                    <th width="15%">Salary Bracket</th>
                    <th width="15%">End Date</th>
                    <th width="10%">Status</th>
                    <th width="15%">Applications</th>
                    <th width="20%" class="text-right">Action</th>
                  </tr>
                </thead>
                <tbody id="categoryTableBody">
                </tbody>
                <tfoot>
                  <tr>
                    <th>#</th>
                    <th>Title</th>
                    <th>Salary Bracket</th>
                    <th>End Date</th>
                    <th>Status</th>
                    <th>Applications</th>
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

<div class="modal fade" id="addCategoryFormModal">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <form id="add_category_form" action="{{route('admin.careers.create')}}" enctype="multipart/form-data">
        @csrf
        <div class="modal-header">
          <h4 class="modal-title">Add New Job</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">

          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <label>Job Title</label>
                <input type="text" class="form-control" name="title" placeholder="Enter Job Title" required="required">
              </div>
            </div>
          </div>

           <div class="row">

            <div class="col-md-5">
              <div class="form-group">
                <label>Salary Bracket</label>
                <div class="input-group">
                  <input type="number" class="form-control" step="any" name="salary_from" placeholder="From" required="required">
                  <input type="number" class="form-control" step="any" name="salary_to" placeholder="To" required="required">
                </div>
              </div>
            </div>

            <div class="col-md-4">
              <div class="form-group">
                <label>Closing Date</label>
                <input type="date" class="form-control" step="any" name="end_date" value="{{date('Y-m-d', strtotime('+15 days'))}}" required="required">
              </div>
            </div>

            <div class="col-md-3">
              <div class="form-group">
                <label>Status</label>
                <select class="form-control" name="status" required="required">
                  <option value="">Select</option>
                  <option value="1">Active</option>
                  <option value="2">Not Active</option>
                </select>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <label>Job Description</label>
                <textarea class="form-control" name="job_desc" id="job_desc" placeholder="Enter Description" cols="10" rows="10" ></textarea>
              </div>
            </div>
          </div>

         
        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Add Job</button>
        </div>
      </form>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>

<div class="modal fade" id="editCategoryFormModal">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">

    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
@endsection
@section('addStyle')

<style type="text/css">

  .ck-editor__editable[role="textbox"] {
    /* editing area */
    min-height: 400px;
  }

  .ck-content .image {
    /* block images */
    max-width: 80%;
    margin: 20px auto;
  }

  .ck.ck-reset_all.ck-widget__type-around {
    display: none;
  }
</style>
@endsection
@section('addScript')

<script src="https://cdn.ckeditor.com/ckeditor5/35.1.0/super-build/ckeditor.js"></script>

<script>
  $(function() {

    loadCareers() ;
    
    $(document).on('submit', "#add_category_form", function(event) {
      var form = $(this);
      var formData = new FormData($("#add_category_form")[0]);
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
          $('#addCategoryFormModal').modal('hide');
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

    $(document).on('click', '.deleteCategory', function() {
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
          $.get("{{URL::to('/admin/careers/delete')}}/" + id, function(data) {
            console.log(data);
            if (data == 'success') {
              Toast.fire({
                icon: 'success',
                title: 'Success! Job Successfully Deleted.'
              });
              loadCareers();
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

    $(document).on('click', '.editCategory', function() {
    
      var id = $(this).data('id');
      $('#editCategoryFormModal .modal-content').html('<img src="{{URL::to('/public/loader.gif')}}" height="50px" style="margin:150px auto;">');
      $('#editCategoryFormModal').modal('show');
      $.get("{{URL::to('/admin/panel/careers/edit')}}/" + id, function(data) {
        $('#editCategoryFormModal .modal-content').html(data);
        make_editor("job_desc_edit");
      });

    });

  });

  function loadCareers() {
    var url = "{{route('admin.careers.load')}}";

    $('#categoryTableBody').html('<tr class="text-center"><td colspan="6"><img src="{{URL::to('/public/loader.gif')}}" height="30px"></td></tr>');
    $.get(url, function(data) {
      $('#categoryTableBody').html(data);
      //$('#categoryTable').DataTable();
    });
  }




  make_editor("job_desc");

  function make_editor(ele) {
    CKEDITOR.ClassicEditor.create(document.getElementById(ele), {
      toolbar: {
        items: [
          'exportPDF', 'exportWord', '|',
          'findAndReplace', 'selectAll', '|',
          'heading', '|',
          'bold', 'italic', 'strikethrough', 'underline', 'code', 'subscript', 'superscript', 'removeFormat', '|',
          'bulletedList', 'numberedList', 'todoList', '|',
          'outdent', 'indent', '|',
          'undo', 'redo',
          '-',
          'fontSize', 'fontFamily', 'fontColor', 'fontBackgroundColor', 'highlight', '|',
          'alignment', '|',
          'link', 'insertImage', 'blockQuote', 'insertTable', 'mediaEmbed', 'codeBlock', 'htmlEmbed', '|',
          'specialCharacters', 'horizontalLine', 'pageBreak', '|',
          'textPartLanguage', '|',
          'sourceEditing'
        ],
        shouldNotGroupWhenFull: true
      },
      list: {
        properties: {
          styles: true,
          startIndex: true,
          reversed: true
        }
      },
      heading: {
        options: [{
            model: 'paragraph',
            title: 'Paragraph',
            class: 'ck-heading_paragraph'
          },
          {
            model: 'heading1',
            view: 'h1',
            title: 'Heading 1',
            class: 'ck-heading_heading1'
          },
          {
            model: 'heading2',
            view: 'h2',
            title: 'Heading 2',
            class: 'ck-heading_heading2'
          },
          {
            model: 'heading3',
            view: 'h3',
            title: 'Heading 3',
            class: 'ck-heading_heading3'
          },
          {
            model: 'heading4',
            view: 'h4',
            title: 'Heading 4',
            class: 'ck-heading_heading4'
          },
          {
            model: 'heading5',
            view: 'h5',
            title: 'Heading 5',
            class: 'ck-heading_heading5'
          },
          {
            model: 'heading6',
            view: 'h6',
            title: 'Heading 6',
            class: 'ck-heading_heading6'
          }
        ]
      },
      placeholder: ' ',
      fontFamily: {
        options: [
          'default',
          'Arial, Helvetica, sans-serif',
          'Courier New, Courier, monospace',
          'Georgia, serif',
          'Lucida Sans Unicode, Lucida Grande, sans-serif',
          'Tahoma, Geneva, sans-serif',
          'Times New Roman, Times, serif',
          'Trebuchet MS, Helvetica, sans-serif',
          'Verdana, Geneva, sans-serif'
        ],
        supportAllValues: true
      },
      fontSize: {
        options: [10, 12, 14, 'default', 18, 20, 22, 24, 28, 30, 34, 38, 42],
        supportAllValues: true
      },
      htmlSupport: {
        allow: [{
          name: /.*/,
          attributes: true,
          classes: true,
          styles: true
        }]
      },
      htmlEmbed: {
        showPreviews: true
      },
      link: {
        decorators: {
          addTargetToExternalLinks: true,
          defaultProtocol: 'https://',
          toggleDownloadable: {
            mode: 'manual',
            label: 'Downloadable',
            attributes: {
              download: 'file'
            }
          }
        }
      },
      mention: {
        feeds: [{
          marker: '@',
          feed: [
            '@apple', '@bears', '@brownie', '@cake', '@cake', '@candy', '@canes', '@chocolate', '@cookie', '@cotton', '@cream',
            '@cupcake', '@danish', '@donut', '@dragée', '@fruitcake', '@gingerbread', '@gummi', '@ice', '@jelly-o',
            '@liquorice', '@macaroon', '@marzipan', '@oat', '@pie', '@plum', '@pudding', '@sesame', '@snaps', '@soufflé',
            '@sugar', '@sweet', '@topping', '@wafer'
          ],
          minimumCharacters: 1
        }]
      },
      removePlugins: [
        'RealTimeCollaborativeComments',
        'RealTimeCollaborativeTrackChanges',
        'RealTimeCollaborativeRevisionHistory',
        'PresenceList',
        'Comments',
        'TrackChanges',
        'TrackChangesData',
        'RevisionHistory',
        'Pagination',
        'WProofreader',
      ]
    });
  }
</script>

@endsection