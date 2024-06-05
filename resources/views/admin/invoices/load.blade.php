<div class="card">
  <!-- /.card-header -->
  <div class="card-body">
    <table id="categoryTable" class="table table-bordered table-striped">
      <thead>
        <tr>
          <th width="5%">#</th>
          <th width="20%">Name</th>
          <th width="15%">Email</th>
          <th width="10%">Verification</th>
          <th width="10%">Registration Date</th>
          <th width="10%">Number of Invoices</th>
          <th width="15%">Invoices</th>
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
          <td>{{$val->created_at}}</td>
          <td> {{count($val->cashbackRequests)}} </td>
          <td>
            @if( count($val->cashbackRequests) > 0)
            <a href="javascript:void(0)" class="btn btn-sm btn-info editCategory" title="Edit Category" data-id="{{base64_encode($val->id)}}">View Invoices</a>
            @else
            <label class="badge bagde-danger">No Invoices</label>
            @endif
          </td>
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
          <th>Registration Date</th>
          <th>Number of Invoices</th>
          <th>Invoices</th>
        </tr>
      </tfoot>
    </table>
  </div>
  <!-- /.card-body -->
</div>