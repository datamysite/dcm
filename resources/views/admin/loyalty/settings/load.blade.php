@foreach($data as $key => $val)
<tr>
  <td>{{++$key}}</td>
  <td>
    @if($val->section_id == 1)
    About DCM
    @elseif($val->section_id == 2)
    POPULAR STORES
    @elseif($val->section_id == 3)
    POPULAR CATEGOIRES
    @else
    None
    @endif
  </td>
  <td>

    @if($val->retailer_id != 0 )
      {{$val->retailerName->name }}
      @elseif($val->category_id != 0)
      {{$val->categoiresName->name }}
      @elseif($val->page_name != '')
      {{ $val->page_name }}
    
    @endif

  </td>
  <td>{{$val->page_url}}</td>


  <td class="text-right">
    <a href="javascript:void(0)" class="btn btn-sm btn-info edit" title="Edit" data-id="{{base64_encode($val->id)}}"><i class="fas fa-edit"></i></a>
    <a href="javascript:void(0)" class="btn btn-sm btn-danger delete" title="Delete" data-id="{{base64_encode($val->id)}}"><i class="fas fa-trash"></i></a>
    <!-- <a href="javascript:void(0)" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></a> -->
  </td>
</tr>
@endforeach