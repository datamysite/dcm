<div class="card">
            @if($data['count'] != 0)
            <!-- /.card-header -->
            <div class="card-body">
              <table id="categoryTable" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th width="10%">Name</th>
                    <th width="10%">Email</th>
                    <th width="10%">Phone</th>
                  </tr>
                </thead>
                <tbody>
                  <td>
                    <h5>{{$data['user']->name}}</h5>
                  </td>
                  <td>
                    <h5>{{$data['user']->email}}</h5>
                  </td>
                  <td>
                    <h5>{{$data['user']->phone}}</h5>
                  </td>
                </tbody>
              </table>
            </div>
            <div class="card-body">
              <table id="categoryTable" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th width="5%">#</th>
                    <th width="20%">Invoice File</th>
                    <th width="20%">Date</th>
                    <th width="20%">Current Status</th>
                    <th width="20%">Update Status</th>
                    <th class="text-center">Delete</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($data['invoices'] as $key => $val)
                  <tr>
                    <td>{{++$key}}</td>
                    <td><a href="{{URL::to('/contest/dcm-extravaganza/public/storage/invoices/'.$val->invoice_file)}}" target="_blank">{{$val->invoice_file}}</a></td>
                    <td>{{$val->date}}</td>
                    <td>
                      @switch($val->status)
                      @case('1')
                      <span class="badge bg-warning">Processing</span>
                      @break
                      @case('2')
                      <span class="badge bg-success">Accepted</span>
                      @break
                      @case('3')
                      <span class="badge bg-danger">Rejected</span>
                      @break
                      @endswitch
                    </td>
                    <td>
                      @if($val->status == 1 || $val->status == 3)
                      <a href="{{URL::to('/admin/panel/invoices/update')}}/{{base64_encode($val->id)}}/2"><b style="color:green;">Accept</b></a>
                      @elseif($val->status == 2)
                      <a href="{{URL::to('/admin/panel/invoices/update')}}/{{base64_encode($val->id)}}/3"><b style="color:red;">Reject</b></a>
                      @endif
                    </td>
                    <td class="text-center">
                      <a href="{{URL::to('/admin/panel/invoices/deleteSingle')}}/{{base64_encode($val->id)}}" class="btn btn-sm btn-danger deleteFile" title="Delete Invoice" data-id="{{base64_encode($val->id)}}"><i class="fas fa-trash"></i></a>
                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
            @else
            <hr>
            <div class="row text-center" style="justify-content: center;">
              <div class="col-lg-6" style="padding: 20px;border-radius:20px;background-color:#FF7074;">
                <span style="font-size: 17px;color:#fff;">NO Invoices for the current user !</span>
              </div>
            </div>
            <hr>
            @endif
            <!-- /.card-body -->
          </div>