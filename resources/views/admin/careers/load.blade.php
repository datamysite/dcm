@foreach($data as $key => $val)
<tr>
  <td>{{++$key}}</td>

  <td>{{$val->title}}</td>
  <td>{{number_format($val->salary_from).' AED  -  '.number_format($val->salary_to).' AED'}}</td>
  <td>{{date('d-M-Y', strtotime($val->end_date))}}</td>

  <td>
    @if($val->status == 1)
    <label class="badge badge-success">Active</label>
    @elseif($val->status == 2)
    <label class="badge badge-warning">Not Active</label>
    @else
    Unknown
    @endif
  </td>
  <td>
    <a href="{{route('admin.careers.details', [base64_encode($val->id)])}}" class="btn btn-sm btn-info" title="View Applications">( {{count($val->applications)}} ) Applicants</a>
  </td>
  <td class="text-right">
    <a href="javascript:void(0)" class="btn btn-sm btn-info editCategory" title="Edit Job" data-id="{{base64_encode($val->id)}}"><i class="fas fa-edit"></i></a>
    <a href="javascript:void(0)" class="btn btn-sm btn-danger deleteCategory" title="Delete Job" data-id="{{base64_encode($val->id)}}"><i class="fas fa-trash"></i></a>
  </td>
  
</tr>
@endforeach
@if(count($data) == 0)
<tr>
  <td colspan="8">No Jobs found.</td>
</tr>
@endif