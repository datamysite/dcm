<div class="card">
  <!-- /.card-header -->
  <div class="card-body">
    <table id="categoryTable" class="table table-bordered table-striped">
      <thead>
        <tr>
          <th width="5%">#</th>
          <th width="15%">Name</th>
          <th width="10%">Email</th>
          <th width="10%">Verification</th>
          <th width="10%">Number of Invoices</th>
          <th width="10%">Referral By</th>
          <th width="10%">Invoices</th>
          <th width="10%">Registration Date</th>
        </tr>
      </thead>
      <tbody id="categoryTableBody">
        @foreach($data as $key => $val)
        <tr>
          <td>{{++$key}}</td>
          <td>{{$val->name}}</td>
          <td>{{$val->email}}</td>
          <td> @if($val->email_verified == '1')
            <label class="badge bagde-primary">Verified</label>
            @else
            <label class="badge bagde-danger">Non Verified</label>
            @endif
          </td>
          <td> {{count($val->cashbackRequests)}} @if(count($val->cashbackRequests) >= 4) <span class="badge badge-sucess">Eligible</span> @endif </td>
          <td>
            @if($val->by_referral != '')
            {{$val->by_referral}}
            @else
            Direct Link
            @endif
          </td>
          <td>
            @if( count($val->cashbackRequests) > 0)
            <a href="javascript:void(0)" class="btn btn-sm btn-info editCategory" title="Edit Category" data-id="{{base64_encode($val->id)}}">View Invoices</a>
            @else
            <label class="badge bagde-danger">No Invoices</label>
            @endif
          </td>
          <td>{{date('d-M-Y | h:i A', strtotime($val->created_at))}}</td>
        </tr>
        @endforeach

        @if(count($data) == 0)
        <tr>
          <td colspan="8">No Invoices found.</td>
        </tr>
        @endif
      </tbody>
      <tfoot>
        <tr>
          <th>#</th>
          <th>Name</th>
          <th>Email</th>
          <th>Verification</th>
          <th>Number of Invoices</th>
          <th>Referral By</th>
          <th>Invoices</th>
          <th>Registration Date</th>
        </tr>
      </tfoot>
    </table>
  </div>
  <!-- /.card-body -->
</div>