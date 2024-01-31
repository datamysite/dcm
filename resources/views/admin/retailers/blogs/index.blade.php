@extends('admin.layout.main')
@section('title', 'Blogs | Retailers')
@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Blogs | Retailers</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Home</a></li>
              <li class="breadcrumb-item"><a href="{{route('admin.retailer')}}">Retailers</a></li>
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
                      <input type="text" name="retailer" placeholder="Search for Retailer..." class="form-control">
                      <i class="fas fa-search"></i>
                    </div>
                    <div class="col-md-3">
                      <a href="javascript:void(0)" class="btn btn-primary pull-right" title="Add Blog" data-toggle="modal" data-target="#addCouponFormModal"><i class="fas fa-plus"></i> Add Blog</a>
                    </div>
                  </div>
                  <br>
                  <div class="row coupon-row">
                    <div class="col-md-5">
                      <div class="coupon-brand-image">
                        <img src="https://www.dealsandcouponsmena.com/slider_posters/Noon%20GCC.webp">
                      </div>
                    </div>
                    <div class="col-md-3 coupon-brand-detail">
                      <label>Name:</label>
                      <p>Noon <a href=""><i class="fa fa-external-link"></i></a></p>

                      <label>Countries:</label>
                      <p>UAE, KSA, EGY</p>
                    </div>
                    <div class="col-md-3 coupon-brand-detail">
                      <label>No. of Coupons:</label>
                      <p>25 Coupons</p>

                      <label>Discount Upto %:</label>
                      <p>50%</p>
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
                    <th width="70%">Blog Heading</th>
                    <th width="15%" class="text-right">Action</th>
                  </tr>
                  </thead>
                  <tbody id="blogsTableBody">
                    <tr>
                      <td>1</td>
                      <td>UAE</td>
                      <td>Flat 10% Off on your App Order in UAE</td>
                      <td class="text-right">
                        <a href="javascript:void(0)" class="btn btn-sm btn-info" title="Edit log" data-id=""><i class="fas fa-edit"></i></a>
                        <a href="javascript:void(0)" class="btn btn-sm btn-danger" title="Delete log" data-id=""><i class="fas fa-trash"></i></a>
                        <!-- <a href="javascript:void(0)" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></a> -->
                      </td>
                    </tr>
                    <tr>
                      <td>1</td>
                      <td>UAE</td>
                      <td>Flat 10% Off on your App Order in UAE</td>
                      <td class="text-right">
                        <a href="javascript:void(0)" class="btn btn-sm btn-info" title="Edit log" data-id=""><i class="fas fa-edit"></i></a>
                        <a href="javascript:void(0)" class="btn btn-sm btn-danger" title="Delete log" data-id=""><i class="fas fa-trash"></i></a>
                        <!-- <a href="javascript:void(0)" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></a> -->
                      </td>
                    </tr>
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>#</th>
                    <th>Country</th>
                    <th>Blog Heading</th>
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


<div class="modal fade" id="addCouponFormModal">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <form id="add_retialer_form" action="">
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
              <div class="form-group">
                <label>Heading</label>
                <input type="text" class="form-control" name="heading" required>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label>Country</label>
                <select class="form-control" name="country" required>
                  <option>Select</option>
                </select>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <label>Description</label>
                <textarea class="form-control" name="Description" id="content" rows="10">
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

    .ck.ck-reset_all.ck-widget__type-around{
    display: none;
    }
  </style>
@endsection
@section('addScript')
<script src="https://cdn.ckeditor.com/ckeditor5/35.1.0/super-build/ckeditor.js"></script>

<script>
    CKEDITOR.ClassicEditor.create(document.getElementById("content"), {
        toolbar: {
            items: [
                'exportPDF','exportWord', '|',
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
            options: [
                { model: 'paragraph', title: 'Paragraph', class: 'ck-heading_paragraph' },
                { model: 'heading1', view: 'h1', title: 'Heading 1', class: 'ck-heading_heading1' },
                { model: 'heading2', view: 'h2', title: 'Heading 2', class: 'ck-heading_heading2' },
                { model: 'heading3', view: 'h3', title: 'Heading 3', class: 'ck-heading_heading3' },
                { model: 'heading4', view: 'h4', title: 'Heading 4', class: 'ck-heading_heading4' },
                { model: 'heading5', view: 'h5', title: 'Heading 5', class: 'ck-heading_heading5' },
                { model: 'heading6', view: 'h6', title: 'Heading 6', class: 'ck-heading_heading6' }
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
            options: [ 10, 12, 14, 'default', 18, 20, 22, 24, 28, 30, 34, 38, 42 ],
            supportAllValues: true
        },
        htmlSupport: {
            allow: [
                {
                    name: /.*/,
                    attributes: true,
                    classes: true,
                    styles: true
                }
            ]
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
            feeds: [
                {
                    marker: '@',
                    feed: [
                        '@apple', '@bears', '@brownie', '@cake', '@cake', '@candy', '@canes', '@chocolate', '@cookie', '@cotton', '@cream',
                        '@cupcake', '@danish', '@donut', '@dragée', '@fruitcake', '@gingerbread', '@gummi', '@ice', '@jelly-o',
                        '@liquorice', '@macaroon', '@marzipan', '@oat', '@pie', '@plum', '@pudding', '@sesame', '@snaps', '@soufflé',
                        '@sugar', '@sweet', '@topping', '@wafer'
                    ],
                    minimumCharacters: 1
                }
            ]
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
</script>
<script>
  $(function () {
    

    $('input[name="coupon_image"]').on('change', function(){
      readURL(this, $('.coupon-image-wrapper'));  //Change the image
    });

    $('.close-btn').on('click', function(){ //Unset the image
       let file = $('input[name="coupon_image"]');
       $('.coupon-image-wrapper').css('background-image', 'unset');
       $('.coupon-image-wrapper').removeClass('file-set');
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