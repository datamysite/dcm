@extends('admin.layout.main')
@section('title', 'Blogs | FAQ')
@section('content')

<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Blogs | FAQs</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{route('admin.blog')}}">Blogs</a></li>
            <li class="breadcrumb-item active">FAQs</li>
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
                <div class="col-md-8 mt-1">

                  <h4 class="text-center">
                    <input type="text" class="form-control"  value=" Blog Heading : {{  $data['faq']->heading }}" readonly="readonly">
                  </h4>
                </div>
                <div class="col-md-3 mt-1">
                  <!-- Permission goes here -->
                  <a href="javascript:void(0)" class="btn btn-primary" title="Add Blog" data-toggle="modal" data-target="#addBlogFormModal"><i class="fas fa-plus"></i> Add Blog FAQs</a>

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
                      <th width="40%">FAQ Heading</th>
                      <th width="25%">Country</th>
                      <th width="10%">Created At</th>
                      <th width="10%" class="text-right">Action</th>
                    </tr>
                  </thead>
                  <tbody id="faqsTableBody">
                  </tbody>
                  <tfoot>
                    <tr>
                      <th>#</th>
                      <th>FAQ Heading</th>
                      <th>Country</th>
                      <th>Created by</th>
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


<div class="modal fade" id="addBlogFormModal">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <form id="add_faq_blog_form" action="{{route('admin.blog.faq.create')}}">
        @csrf

        <input type="hidden" value="{{ $data['blog_id'] }}" name="blog_id">

        <div class="modal-header">
          <h4 class="modal-title">Add FAQ</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="row">
            <div class="col-md-8">
              <div class="form-group">
                <label>Heading</label>
                <input type="text" class="form-control" name="heading" required>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label>Country</label>
                <select class="form-control" name="country_id" required>
                  <option value="">Select</option>
                  @foreach ($data['countries'] as $country)
                  <option value="{{ $country->id }}">{{ $country->name }}</option>
                  @endforeach
                </select>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <label>Description</label>
                <textarea class="form-control" name="content" id="content" rows="10">
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



<div class="modal fade" id="editBlogFormModal">
  <div class="modal-dialog modal-xl">
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
</script>
<script>

loadFAQ();

  $(function() {
    make_editor("content");
    
 



    $(document).on('submit', "#add_faq_blog_form", function(event) {
      var form = $(this);
      var formData = new FormData($("#add_faq_blog_form")[0]);
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
          form.trigger("reset");
          $('#addBlogFormModal').modal('hide');
          loadFAQ();
        } else {
          Toast.fire({
            icon: 'error',
            title: data.errors
          });
        }
      });

      event.preventDefault();
    });


    $(document).on('click', '.deleteFAQ', function() {
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
          $.get("{{URL::to('/admin/panel/blogs/faq/delete')}}/" + id, function(data) {
            Toast.fire({
              icon: 'success',
              title: 'Success! Blog FAQ Successfully Deleted.'
            });
            loadFAQ();
          });
        }
      });
    });


    $(document).on('click', '.editFAQ', function() {
      var val = $(this).data('id');

    

      $('#editBlogFormModal .modal-content').html('<div class="text-center"><img src="{{URL::to(' / public / loader.gif ')}}" height="30px" style="margin-top:60px; margin-bottom:60px;"></div>');
      $('#editBlogFormModal').modal('show');

      $.get("{{URL::to('/admin/panel/blogs/faq/edit/')}}/" + val, function(data) {
        $('#editBlogFormModal .modal-content').html(data);
        make_editor("content2");
      });
    });

    $(document).on('submit', "#edit_faq_form", function(event) {
      var form = $(this);
      var formData = new FormData($("#edit_faq_form")[0]);
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
          form.trigger("reset");
          $('#editBlogFormModal').modal('hide');
          loadFAQ();
        } else {
          Toast.fire({
            icon: 'error',
            title: data.errors
          });
        }
      });

      event.preventDefault();
    });

  });


  function loadFAQ() {
    
    var url = "{{ route('admin.blog.faq.load', base64_encode($data['blog_id']) )  }}";

    $('#faqsTableBody').html('<tr class="text-center"><td colspan="6"><img src="{{URL::to(' / public / loader.gif ')}}" height="30px"></td></tr>');
    $.get(url, function(data) {
      $('#faqsTableBody').html(data);
      //$('#categoryTable').DataTable();
    });
  }

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