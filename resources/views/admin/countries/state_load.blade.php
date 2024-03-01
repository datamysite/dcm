@foreach($data as $key => $val)
    <tr>
      <td>{{++$key}}</td>
      <td><img src="{{URL::to('/public/storage/states/'.$val->image)}}" class="table-img"></td>
      <td>{{$val->name}}</td>
      <td>{{$val->shortname}}</td>
      <td>{{@$val->country->name}}</td>
      <td class="text-right">
        <a href="javascript:void(0)" class="btn btn-sm btn-info editState" title="Edit States" data-id="{{base64_encode($val->id)}}"><i class="fas fa-edit"></i></a>
        <a href="javascript:void(0)" class="btn btn-sm btn-danger deleteState" title="Delete States" data-id="{{base64_encode($val->id)}}"><i class="fas fa-trash"></i></a>
        <!-- <a href="javascript:void(0)" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></a> -->
      </td>
    </tr>
@endforeach