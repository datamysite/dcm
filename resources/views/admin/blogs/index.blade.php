@extends('admin.layout.main')
@section('title', 'Blogs')
@section('content')

<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Blogs</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Home</a></li>
            <li class="breadcrumb-item active">Blogs</li>
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
                  <input type="text" name="retailer" placeholder="Search for Blogs..." class="form-control searchBlog">
                  <i class="fas fa-search"></i>
                </div>
                <div class="col-md-3">
                  @if(auth('admin')->user()->can('Blogs add'))
                  <a href="javascript:void(0)" class="btn btn-primary pull-right" title="Add Blog" data-toggle="modal" data-target="#addBlogFormModal"><i class="fas fa-plus"></i> Add Blog</a>
                  @endif
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
                    <th width="10%">Country</th>
                    <th width="10%">Lang</th>
                    <th width="20%">Slug</th>
                    <th width="20%">Blog Heading</th>
                    <th width="10%">Category</th>
                    <th width="10%">Author</th>
                    <th width="5%">ReadTime</th>
                    <th width="10%" class="text-right">Created at</th>
                    <!-- <th width="10%" class="text-right">Action</th> -->
                    <th class="text-right">Action</th>
                  </tr>
                </thead>
                <tbody id="blogsTableBody">
                </tbody>
                <tfoot>
                  <tr>
                    <th>#</th>
                    <th>Country</th>
                    <th>Lang</th>
                    <th>Slug</th>
                    <th>Blog Heading</th>
                    <th>Category</th>
                    <th>Author</th>
                    <th>ReadTime</th>
                    <th class="text-right">Created at</th>
                    <!-- <th class="text-right">Action</th> -->
                    <th width="20%" class="text-right">Action</th>
                  </tr>
                </tfoot>
              </table>

              <div class="row ">
                <div class="col-lg-12 text-right">
                  <br>
                  {{ $data['data']->links() }}
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


<div class="modal fade" id="addBlogFormModal">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <form id="add_blog_form" action="{{route('admin.blog.create')}}">
        @csrf
        <div class="modal-header">
          <h4 class="modal-title">Add Blog</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="row">
            <div class="col-md-8">
              <div class="coupon-image-wrapper">
                <input type="file" name="coupon_image" accept="image/*" required />
                <div class="close-btn">×</div>
              </div>
            </div>
            <div class="col-md-4 blog-img-alt">
              <div class="form-group">
                <label>Image alt:</label>
                <input type="text" class="form-control" name="banner_alt" required>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-4">
              <div class="form-group">
                <label>Blog Category</label>
                <select class="form-control" name="category_id" required>
                  <option value="">Select Blog Category</option>
                  @foreach($data['categories'] as $category)
                  <option value="{{ $category->id }}">{{ $category->name }}</option>
                  @endforeach
                </select>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label>Blog Author</label>
                <select class="form-control" name="author_id" required>
                  <option value="">Select Blog Author</option>
                  @foreach ($data['authors'] as $author)
                  <option value="{{ $author->id }}">{{ $author->name }}</option>
                  @endforeach
                </select>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label>Reading Time</label>
                <input type="number" class="form-control" name="read_time" placeholder="Enter reading time in minutes" required>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label>Heading</label>
                <input type="text" class="form-control blogHeading" name="heading" required>
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group">
                <label>Country</label>
                <select class="form-control" name="country_id" required>
                  <option value="2">Saudi Arabia</option>
                  <option value="1">United Arab Emirates</option>
                </select>
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group">
                <label>Lang</label>
                <select class="form-control" name="lang" required>
                  <option value="en">English</option>
                  <option value="ar">Arabic</option>
                </select>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-12">
              <div class="form-group slug-field">
                <label>Slug</label>
                <div class="form-control">
                  <span>{{env('APP_DOMAIN')}}blogs/</span>
                  <input type="text" class="blogSlug" name="slug" required>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <label>Short Description</label>
                <textarea class="form-control" name="short_description" rows="3"></textarea>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <label>Description</label>
                <textarea class="form-control" name="description" id="content" rows="10"></textarea>
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
  $(function() {
    loadBlogs();

    make_editor("content");

    $(document).on('keyup', '.searchBlog', function() {
      var val = $(this).val();
      if (val == '') {
        val = '--empty--';
      }
      var url = "{{URL::to('/admin/panel/blogs/search')}}/" + val;

      $('#blogsTableBody').html('<tr class="text-center"><td colspan="4"><img src="{{URL::to('/public/loader.gif')}}" height="30px"></td></tr>');
      $.get(url, function(data) {
        $('#blogsTableBody').html(data);
        //$('#categoryTable').DataTable();
      });
    });

    $('input[name="coupon_image"]').on('change', function() {
      readURL(this, $('.coupon-image-wrapper')); //Change the image
    });

    $(document).on('change', 'input[name="edit_mblog_image"]', function() {
      readURL(this, $('.edit-mblog-image-wrapper')); //Change the image
    });

    $(document).on('click', '.close-btn', function() { //Unset the image
      let file = $('input[name="coupon_image"]');
      $('.coupon-image-wrapper').css('background-image', 'unset');
      $('.coupon-image-wrapper').removeClass('file-set');
      file.replaceWith(file = file.clone(true));

      let file2 = $('input[name="edit_mblog_image"]');
      $('.edit-mblog-image-wrapper').css('background-image', 'unset');
      $('.edit-mblog-image-wrapper').removeClass('file-set');
      file2.replaceWith(file2 = file2.clone(true));
    });

    $(document).on('keyup', '.blogHeading', function() {
      var a = $(this).val();

      var b = a.toLowerCase().replace(/ /g, '-')
        .replace(/[^\w-]+/g, '');
      $('.blogSlug').val(b);
    });

    $(document).on('keyup', '.eblogHeading', function() {
      var a = $(this).val();

      var b = a.toLowerCase().replace(/ /g, '-')
        .replace(/[^\w-]+/g, '');
      $('.eblogSlug').val(b);
    });


    $(document).on('submit', "#add_blog_form", function(event) {
      var form = $(this);
      var formData = new FormData($("#add_blog_form")[0]);
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
          $(".ck-blurred p").html("");
          $('#addBlogFormModal').modal('hide');
          loadBlogs();
        } else {
          Toast.fire({
            icon: 'error',
            title: data.errors
          });
        }
      });

      event.preventDefault();
    });


    $(document).on('submit', "#edit_blog_form", function(event) {
      var form = $(this);
      var formData = new FormData($("#edit_blog_form")[0]);
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
          $(".ck-blurred p").html("");
          $('#editBlogFormModal').modal('hide');
          loadBlogs();
        } else {
          Toast.fire({
            icon: 'error',
            title: data.errors
          });
        }
      });

      event.preventDefault();
    });



    $(document).on('click', '.deleteBlog', function() {
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
          $.get("{{URL::to('/admin/panel/blogs/delete')}}/" + id, function(data) {
            Toast.fire({
              icon: 'success',
              title: 'Success! Blog Successfully Deleted.'
            });
            loadBlogs();
          });
        }
      });
    });


    $(document).on('click', '.editBlog', function() {
      var id = $(this).data('id');
      $('#editBlogFormModal .modal-content').html('<img src="{{URL::to('/public/loader.gif')}}" height="50px" style="margin:150px auto;">');
      $('#editBlogFormModal').modal('show');
      $.get("{{URL::to('/admin/panel/blogs/edit')}}/" + id, function(data) {
        $('#editBlogFormModal .modal-content').html(data);
        make_editor("content2");
      });
    });


  });




  function loadBlogs() {
    @php $pu = !empty($_GET['page']) ? $_GET['page'] : 0;
    $pu = ($pu == 0 ? '' : '?page='.$pu);
    @endphp
    var url = "{{route('admin.blog.load').$pu}}";

    $('#blogsTableBody').html('<tr class="text-center"><td colspan="4"><img src="{{URL::to('/public/loader.gif')}}" height="30px"></td></tr>');
    $.get(url, function(data) {
      $('#blogsTableBody').html(data);
      //$('#categoryTable').DataTable();
    });
  }

  //FILE
  function readURL(input, obj) {
    if (input.files && input.files[0]) {
      var reader = new FileReader();
      reader.onload = function(e) {
        obj.css('background-image', 'url(' + e.target.result + ')');
        obj.addClass('file-set');
      }
      reader.readAsDataURL(input.files[0]);
    }
  };

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