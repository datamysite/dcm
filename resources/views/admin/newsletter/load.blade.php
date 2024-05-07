@foreach($data as $key => $val)
  <tr>
    <td>{{++$key}}</td>
    <td>
      <div  class="user-email">
        <span>{{$val->email}}</span>
      </div>
    </td>
    <td class="text-right">
      <span><small>{{date('d-M-Y | h:i A', strtotime($val->created_at))}}</small></span>
    </td>
  </tr>
@endforeach
@if(count($data) == 0)
  <tr>
    <td colspan="3">No Data Found.</td>
  </tr> 
@endif