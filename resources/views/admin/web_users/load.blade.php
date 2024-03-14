@foreach($data as $key => $val)
  <tr>
    <td>{{++$key}}</td>
    <td><img src="{{URL::to('/public/user-placeholder.jpg')}}" class="table-img"></td>
    <td>{{$val->name}}</td>
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
    <td>{{$val->phone}}</td>
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