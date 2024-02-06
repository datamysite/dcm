@foreach($data as $key => $val)
  <tr>
    <td>{{++$key}}</td>
    <td><img src="{{URL::to('/public/user-placeholder.jpg')}}" class="table-img"></td>
    <td>{{$val->fullname}}</td>
    <td>{{$val->username}}</td>
    <td>{{$val->designation}}</td>
    <td>{{@$val->createdBy->username}}</td>
    <td>
      @if($val->id != '1')
        <div class="form-group">
          <div class="custom-control custom-switch">
            <input type="checkbox" class="custom-control-input changeStatus" data-id="{{base64_encode($val->id)}}" id="status-{{$val->id}}" {{$val->is_active == '1' ? 'checked' : ''}}>
            <label class="custom-control-label" for="status-{{$val->id}}"></label>
          </div>
        </div>
      @endif
    </td>
    <td class="text-right">
      <a href="javascript:void(0)" class="btn btn-sm btn-info" title="Edit User" data-id=""><i class="fas fa-edit"></i></a>
      <a href="javascript:void(0)" class="btn btn-sm btn-danger" title="Delete User" data-id=""><i class="fas fa-trash"></i></a>
      <!-- <a href="javascript:void(0)" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></a> -->
    </td>
  </tr>
@endforeach