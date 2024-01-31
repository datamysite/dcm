@extends('admin.layout.main')
@section('title', 'Snippet Code | SEO Tools')
@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Snippet Code | SEO Tools</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Home</a></li>
              <li class="breadcrumb-item active">SEO Tools</li>
              <li class="breadcrumb-item active">Snippet Code</li>
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
                  <div class="row row-heading">
                    <div class="col-md-10 searchbar">
                      <input type="text" name="url" placeholder="Paste url here..." class="form-control">
                    </div>
                    <div class="col-md-2">
                      <a href="javascript:void(0)" class="btn btn-primary pull-right" title="Add Blog" data-toggle="modal" data-target="#addCouponFormModal"><i class="fa fa-paper-plane"></i>&nbsp;&nbsp;Check</a>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Page Name</label>
                        <input type="text" class="form-control" name="page_name" required>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Meta Title</label>
                        <input type="text" class="form-control" name="meta_title" required>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Meta Keywords</label>
                        <input type="text" class="form-control" name="meta_keywords" required>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Meta Desciption</label>
                        <textarea class="form-control" name="meta_description" required rows="5"></textarea>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <button class="btn btn-primary pull-right">Update <i class="fa fa-thumbs-up"></i></button>
                      </div>
                    </div>
                  </div>
              </div>
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
@section('addStyle')

@endsection
@section('addScript')


@endsection