@foreach($data as $key => $val)
    <tr>
      <td>{{++$key}}</td>
      <td>{{$val->name}}</td>
      <td>{{$val->shortname}}</td>
      <td class="text-right">
        <a href="javascript:void(0)" class="btn btn-sm btn-info editCountry" title="Edit Country" data-id="{{base64_encode($val->id)}}"><i class="fas fa-edit"></i></a>
        <a href="javascript:void(0)" class="btn btn-sm btn-danger deleteCountry" title="Delete Country" data-id="{{base64_encode($val->id)}}"><i class="fas fa-trash"></i></a>
        <!-- <a href="javascript:void(0)" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></a> -->
      </td>
    </tr>
@endforeach