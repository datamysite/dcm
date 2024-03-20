@foreach($data as $key => $val)
<tr>
  <td>{{++$key}}</td>
  <td>
    @if($val->section_number == 1)
    1st Section
    @elseif($val->section_number == 2)
    2nd Section
    @else
    Unknown
    @endif
  </td>
  <td>{{$val->title}}</td>
  <!-- <td>
  {{substr($val->desc, 0, 100)}}
  </td> -->
  <td>
    @if($val->section_number == 1)
    <img src="{{URL::to('/public/storage/about/'.$val->img)}}" class="table-img">
    @elseif($val->section_number == 2)
    None
    @endif
  </td>

  <td class="text-right">
    <a href="javascript:void(0)" class="btn btn-sm btn-info edit" title="Edit" data-id="{{base64_encode($val->id)}}"><i class="fas fa-edit"></i></a>
  </td>
</tr>
@endforeach 