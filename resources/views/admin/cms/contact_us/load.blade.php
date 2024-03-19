@foreach($data as $key => $val)
<tr>
  <td>{{++$key}}</td>
  <td>{{$val->name}}</td>
  <td>{{$val->phone}}</td>
  <td>{{$val->email}}</td>
  <td>{{$val->subject}}</td>
  <td class="text-right">
    <a href="javascript:void(0)" class="btn btn-sm btn-info edit" title="Edit" data-id="{{base64_encode($val->id)}}"><i class="fas fa-eye"></i></a>
    <a href="javascript:void(0)" class="btn btn-sm btn-danger delete" title="Delete" data-id="{{base64_encode($val->id)}}"><i class="fas fa-trash"></i></a>
    <!-- <a href="javascript:void(0)" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></a> -->
  </td>
</tr>
@endforeach 