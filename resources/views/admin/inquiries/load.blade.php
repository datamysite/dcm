@foreach($data as $val)
<tr>
  <td>{{sprintf("%'.05d\n", $val->id)}}</td>
  <td>{{date('d-M-Y', strtotime($val->created_at))}}</td>
  <td>{{$val->customer->name}}</td>
  <td>{{$val->customer->zone->name}}</td>
  <td>{{$val->salesman->name}}</td>
  <td>{{count($val->products)}}</td>
  <td class="text-right">
    <a href="javascript:void(0)" class="btn btn-sm btn-default viewInquiry" data-id="{{$val->id}}"><i class="fas fa-eye"></i></a>
    <a href="javascript:void(0)" class="btn btn-sm btn-info editInquiry" data-id="{{$val->id}}"><i class="fas fa-edit"></i></a>
    <!-- <a href="javascript:void(0)" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></a> -->
  </td>
</tr>
@endforeach
@if(count($data) == 0)
  <tr>
    <td colspan="7">No Result Found.</td>
  </tr>
@endif