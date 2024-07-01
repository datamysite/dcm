@foreach($data as $key => $val)
  <tr>
    <td>{{++$key}}</td>
    <td>
      {{$val->name}}
      @if($val->is_contested == '1')
        &nbsp;&nbsp;|&nbsp;&nbsp;<span class="badge badge-info">Contest</span>
      @endif
    </td>
    <td>
      <div  class="user-email">
        <span>{{$val->email}}</span>
        @if($val->email_verified == '1')
          <label class="badge bagde-primary">Verified</label>
        @else
          <label class="badge bagde-danger">Non Verified</label>
        @endif
      </div>
    </td>
    <td>
      <table class="table ana-table">
        <tr>
          <td width="25%">{{number_format($val->wallet)}}</td>
          <td width="25%">{{number_format(count($val->WithdrawRequests))}}</td>
          <td width="25%">{{number_format(count($val->GenieWishRequests))}}</td>
          <td width="25%">{{number_format(count($val->TransactionHistory))}}</td>
        <tr>
      </table>
    </td>
    <td class="text-right">
      <span><small>{{date('d-M-Y | h:i A', strtotime($val->created_at))}}</small></span>
    </td>
  </tr>
@endforeach
@if(count($data) == 0)
  <tr>
    <td colspan="7">No Data Found.</td>
  </tr> 
@endif