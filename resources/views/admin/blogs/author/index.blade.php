@extends('admin.layout.main')
@section('title', 'Blogs | Author')
@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Blogs | Author</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{route('admin.blog')}}">Blogs</a></li>
                        <li class="breadcrumb-item active">Author</li>
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
                                    <a href="javascript:void(0)" class="btn btn-primary pull-right" title="Add Author" data-toggle="modal" data-target="#addBlogFormModal"><i class="fas fa-plus"></i> Add Author</a>
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
                                        <th width="10%">Profile</th>
                                        <th width="15%">Name</th>
                                        <th width="15%">Slug</th>
                                        <th width="15%">LinkedIn</th>
                                        <th width="15%">X</th>
                                        <th width="15%">Facebook</th>
                                        <th width="10%" class="text-right">Action</th>
                                    </tr>
                                </thead>
                                <tbody id="authorsTableBody">
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>#</th>
                                        <th>Profile</th>
                                        <th>Name</th>
                                        <th>Slug</th>
                                        <th>LinkedIn</th>
                                        <th>X</th>
                                        <th>Facebook</th>
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
            <form id="add_author_form" action="{{route('admin.author.create')}}" enctype="multipart/form-data">
                @csrf

                <div class="modal-header">
                    <h4 class="modal-title">Add Author</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="category-image-wrapper" style="margin-bottom:5px;">
                                <input type="file" name="author_image" accept="image/*" required />
                                <div class="close-btn">×</div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Author Full Name</label>
                                <input type="text" class="form-control authorName" name="name" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Slug</label>
                                <input type="text" class="form-control authorSlug"  name="slug" required readonly="readonly">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>About Author</label>
                                <textarea class="form-control" name="about" id="content" rows="10">
                </textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>LinkedIn URL</label>
                                <input type="text" class="form-control" name="linkedin_url" value="">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>X (Twitter) URL</label>
                                <input type="text" class="form-control" name="x_url" value="">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Facebook URL</label>
                                <input type="text" class="form-control" name="facebook_url" value="">
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
    loadAuthors();

    $(document).on('keyup', '.authorName', function() {
      var a = $(this).val();

      var b = a.toLowerCase().replace(/ /g, '-')
        .replace(/[^\w-]+/g, '');
      $('.authorSlug').val(b);
    });

    $(document).on('keyup', '.eauthorName', function() {
      var a = $(this).val();

      var b = a.toLowerCase().replace(/ /g, '-')
        .replace(/[^\w-]+/g, '');
      $('.eauthorSlug').val(b);
    });

    $(function() {

        $('input[name="author_image"]').on('change', function() {
            readURL(this, $('.category-image-wrapper')); //Change the image
        });
        $(document).on('change', 'input[name="edit_author_image"]', function() {
            readURL(this, $('.edit_category-image-wrapper')); //Change the image
        });

        $(document).on('click', '.close-btn', function() { //Unset the image
            let file = $('input[name="author_image"]');
            $('.category-image-wrapper').css('background-image', 'unset');
            $('.category-image-wrapper').removeClass('file-set');
            file.replaceWith(file = file.clone(true));

            let file2 = $('input[name="edit_author_image"]');
            $('.edit_category-image-wrapper').css('background-image', 'unset');
            $('.edit_category-image-wrapper').removeClass('file-set');
            file2.replaceWith(file2 = file2.clone(true));
        });



        make_editor("content");


        $(document).on('submit', "#add_author_form", function(event) {
            var form = $(this);
            var formData = new FormData($("#add_author_form")[0]);
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
                    loadAuthors();
                } else {
                    Toast.fire({
                        icon: 'error',
                        title: data.errors
                    });
                }
            });

            event.preventDefault();
        });


        $(document).on('click', '.deleteAuthor', function() {
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
                    $.get("{{URL::to('/admin/panel/author/delete')}}/" + id, function(data) {
                        Toast.fire({
                            icon: 'success',
                            title: 'Success! Author Successfully Deleted.'
                        });
                        loadAuthors();
                    });
                }
            });
        });


        $(document).on('click', '.editAuthor', function() {
            var val = $(this).data('id');

            $('#editBlogFormModal .modal-content').html('<div class="text-center"><img src="{{URL::to(' / public / loader.gif ')}}" height="30px" style="margin-top:60px; margin-bottom:60px;"></div>');
            $('#editBlogFormModal').modal('show');

            $.get("{{URL::to('/admin/panel/author/edit/')}}/" + val, function(data) {
                $('#editBlogFormModal .modal-content').html(data);
                make_editor("content2");
            });
        });

        $(document).on('submit', "#edit_author_form", function(event) {
            var form = $(this);
            var formData = new FormData($("#edit_author_form")[0]);
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
                    loadAuthors();
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


    function loadAuthors() {

        var url = "{{route('admin.author.load')}}";

        $('#authorsTableBody').html('<tr class="text-center"><td colspan="6"><img src="{{URL::to(' / public / loader.gif ')}}" height="30px"></td></tr>');
        $.get(url, function(data) {
            $('#authorsTableBody').html(data);
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
</script>
@endsection