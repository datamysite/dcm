@foreach($data as $key => $val)
<tr>

  <td>{{++$key}}</td>
  <td>{{$val->retailer ? $val->retailer->name : "NONE"}}</td>
  <td><img src="{{ URL::to('/public') }}/storage/retailers/{{ $val->retailer->logo }}" class="table-img"></td>
  <td>

    @if($val->retailer_type == 1)
      Online Stores
    @elseif($val->retailer_type == 2)
      Retiler Stores
    @elseif($val->retailer_type == 3)
      All Stores
    @else
    None
    @endif

  </td>
  <td>{{$val->retailer_order}}</td>
  <td>

    @if($val->status == 1)
    Active
    @elseif($val->status == 2)
    Not Active
    @else
    None
    @endif

  </td>


  <td>{{$val->retailer_title ? $val->retailer_title : "NONE"}}</td>
  <td>{{$val->retailer_desc ? $val->retailer_desc : "NONE"}}</td>


  <td class="text-right">
    <a href="javascript:void(0)" class="btn btn-sm btn-info edit" title="Edit" data-id="{{base64_encode($val->id)}}"><i class="fas fa-edit"></i></a>
    <a href="javascript:void(0)" class="btn btn-sm btn-danger delete" title="Delete" data-id="{{base64_encode($val->id)}}"><i class="fas fa-trash"></i></a>
    <!-- <a href="javascript:void(0)" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></a> -->
  </td>
</tr>

@endforeach