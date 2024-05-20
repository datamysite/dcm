@foreach($data as $key => $val)
<tr>
  <td>{{++$key}}</td>
  <td><img src="{{URL::to('/public/storage/slider/'.$val->img_name)}}" class="table-img"></td>
  <td>{{$val->img_url}}</td>
  <td>{{$val->img_order}}</td>
  <td>{{$val->counteryName ? $val->counteryName->name : "NONE"}}</td>
  <td>
   

    @if($val->lang == 'en')
    English
    @elseif($val->lang == 'ar')
    Arabic
    @else
    None
    @endif

  </td>
  <td class="text-right">
    <a href="javascript:void(0)" class="btn btn-sm btn-info editSlider" title="Edit Slider" data-id="{{base64_encode($val->id)}}"><i class="fas fa-edit"></i></a>
    <a href="javascript:void(0)" class="btn btn-sm btn-danger deleteSlider" title="Delete Slider" data-id="{{base64_encode($val->id)}}"><i class="fas fa-trash"></i></a>
    <!-- <a href="javascript:void(0)" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></a> -->
  </td>
</tr>
@endforeach