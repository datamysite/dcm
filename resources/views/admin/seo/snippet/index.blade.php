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
                  <div class="row">
                    <div class="col-md-10 searchbar">
                    </div>
                    <div class="col-md-2">
                      <a href="javascript:void(0)" class="btn btn-primary pull-right" title="Add Snippet" data-toggle="modal" data-target="#addSnippetFormModal"><i class="fa fa-plus"></i>&nbsp;Add Snippet</a>
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
                    <th width="20%">Name</th>
                    <th width="40%">Page Link</th>
                    <th width="20%">Position</th>
                    <th width="15%" class="text-right">Action</th>
                  </tr>
                  </thead>
                  <tbody id="blogsTableBody">
                    <tr>
                      <td>1</td>
                      <td>Google Analytics</td>
                      <td>All Pages</td>
                      <td>Header</td>
                      <td class="text-right">
                        <a href="javascript:void(0)" class="btn btn-sm btn-info" title="Edit Snippet" data-id=""><i class="fas fa-edit"></i></a>
                        <a href="javascript:void(0)" class="btn btn-sm btn-danger" title="Delete Snippet" data-id=""><i class="fas fa-trash"></i></a>
                        <!-- <a href="javascript:void(0)" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></a> -->
                      </td>
                    </tr>
                    <tr>
                      <td>1</td>
                      <td>Google Tag Manager</td>
                      <td>All Pages</td>
                      <td>Footer</td>
                      <td class="text-right">
                        <a href="javascript:void(0)" class="btn btn-sm btn-info" title="Edit Snippet" data-id=""><i class="fas fa-edit"></i></a>
                        <a href="javascript:void(0)" class="btn btn-sm btn-danger" title="Delete Snippet" data-id=""><i class="fas fa-trash"></i></a>
                        <!-- <a href="javascript:void(0)" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></a> -->
                      </td>
                    </tr>
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Page Link</th>
                    <th>Position</th>
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


<div class="modal fade" id="addSnippetFormModal">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <form id="add_retialer_form" action="">
        @csrf
        <div class="modal-header">
          <h4 class="modal-title">Add Snippet</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label>Snippet Name</label>
                <input type="text" class="form-control" name="name" required>
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group">
                <label>Position</label>
                <select class="form-control" name="position" required>
                  <option>Header</option>
                  <option selected>Footer</option>
                </select>
              </div>
            </div>
            <div class="col-md-3 stick-bottom">
              <div class="form-group form-radio-div">
                <div class="custom-control custom-radio">
                  <input class="custom-control-input" type="radio" id="radio1" name="page_link" checked>
                  <label for="radio1" class="custom-control-label">All Pages</label>
                </div>
                &nbsp;&nbsp;&nbsp;&nbsp;
                <div class="custom-control custom-radio">
                  <input class="custom-control-input" type="radio" id="radio2" name="page_link">
                  <label for="radio2" class="custom-control-label">Specific Page</label>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <label>Page URL</label>
                <input type="url" class="form-control" name="url" disabled>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <label>Snippet Code</label>
                <textarea class="form-control code-snippet" name="meta_description" placeholder="Paste code here..." required rows="30"></textarea>
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

@endsection
@section('addStyle')

@endsection
@section('addScript')


@endsection