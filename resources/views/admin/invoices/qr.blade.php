@extends('admin.layout.main')
@section('title', 'DCM Contest')
@section('addStyle')
<style type="text/css">
    .page-loader {
        width: 100%;
        height: 300px;
        display: flex;
        justify-content: center;
        align-items: center;
    }
</style>
@endsection
@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Scanned QR</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Home</a></li>
                        <li class="breadcrumb-item active">Scanned QR</li>
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
                            <form id="filterStores">
                                @csrf
                                <div class="row">

                                    <div class="col-md-4">
                                        <label>Filter By Date</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                    <i class="far fa-calendar-alt"></i>
                                                </span>
                                            </div>
                                            <input type="text" placeholder="Select Date Range" class="form-control float-right" name="get_date" value="" id="filter_range" required>
                                        </div>
                                    </div>

                                    <div class="col-md-1" style="display: inline-flex;justify-content: space-between;">
                                        <button type="submit" class="btn btn-primary mt-32"><i class="fas fa-search"></i></button>
                                        <div class="reset_button">

                                        </div>
                                    </div>
                                    <div class="col-md-1">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                    <div id="filterBlock">

                    </div>
                    <div class="col-lg-12 text-center">
                        <br>
                        {{ $data['qr_data']->links() }}
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
    <div class="modal-dialog modal-lg">
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

        loadQr();

        $('#filter_range').daterangepicker({
            autoUpdateInput: false,
            locale: {
                format: 'DD/MMM/YYYY',
                cancelLabel: 'Clear'
            }
        });

        $('input[name="get_date"]').on('apply.daterangepicker', function(ev, picker) {
            $(this).val(picker.startDate.format('DD/MMM/YYYY') + ' - ' + picker.endDate.format('DD/MMM/YYYY'));
        });

        $('input[name="get_date"]').on('cancel.daterangepicker', function(ev, picker) {
            $(this).val('');
        });

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
                    $('#viewInvoiceModal').modal('hide');
                    loadQr();
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
                    loadQr();
                } else {
                    Toast.fire({
                        icon: 'error',
                        title: data.errors
                    });
                }
            });

            event.preventDefault();
        });


        $(document).on('click', '.deleteQR', function() {
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
                    $.get("{{URL::to('/admin/panel/invoices/delete_qr')}}/" + id, function(data) {
                        console.log(data);
                        if (data == 'success') {
                            Toast.fire({
                                icon: 'success',
                                title: 'Success! QR Code Successfully Deleted.'
                            });
                            loadQr();
                        } else {
                            Toast.fire({
                                icon: 'error',
                                title: "Warning! QR Code Not Deleted."
                            });
                        }
                    });
                }
            });
        });


        $(document).on('click', '.editCategory', function() {
            var id = $(this).data('id');
            $('#editCategoryFormModal .modal-content').html('<div class="page-loader"><img src="{{URL::to("/public/loader.gif")}}" height="50px" style="margin:150px auto;"></div>');
            $('#editCategoryFormModal').modal('show');
            $.get("{{URL::to('/admin/panel/invoices/view')}}/" + id, function(data) {
                $('#editCategoryFormModal .modal-content').html(data);
            });
        });

    });


    $("#filterStores").submit(function(event) {
        $('#filterBlock').html('<div class="page-loader"><img src="{{URL::to("/public/loader.gif")}}" height="30px"></div>');
        var url = "{{route('admin.invoices.qr_filter')}}";
        var form = $(this);
        $.ajax({
            type: "POST",
            url: url,
            data: form.serialize(),
            encode: true,
        }).done(function(data) {
            $('#filterBlock').html(data);
            $("#categoryTableBody").DataTable();
            $('.reset_button').html('<button type="button" class="btn btn-default mt-32 reset_filter" title="Reset Filter"><i class="fas fa-times"></i></button>')
        });

        event.preventDefault();
    });

    $(document).on('click', '.reset_filter', function() {
        loadRetailers();
        $("#filterStores").trigger('reset');
        $('.reset_button').html('');
    });

    function loadQr() {

        var url = "{{route('admin.invoices.load_qr')}}";
        $('#filterBlock').html('<div class="page-loader"><img src="{{URL::to("/public/loader.gif")}}" height="30px"></div>');
        $.get(url, function(data) {
            $('#filterBlock').html(data);
            //$('#categoryTable').DataTable();
        });
    }
</script>

@endsection