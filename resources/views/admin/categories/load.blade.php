@foreach($data as $key => $val)
<tr>
  <td>{{++$key}}</td>
  <td><img src="{{URL::to('/public/storage/categories/'.$val->image)}}" class="table-img"></td>
  <td>{{$val->name}}</td>
  <td>{{$val->parentCategory ? $val->parentCategory->name : ""}}</td>
  <td> @if($val->type == 1)
    Online
    @elseif($val->type == 2)
    Retail
    @elseif($val->type == 3)
    Both
    @else
    Unknown
    @endif</td>
  <td>{{$val->max_discount}} %</td>
  <td>{{$val->order}}</td>
  <td>0</td>
  <td class="text-right">
    <a href="javascript:void(0)" class="btn btn-sm btn-info editCategory" title="Edit Category" data-id="{{base64_encode($val->id)}}"><i class="fas fa-edit"></i></a>
    <a href="javascript:void(0)" class="btn btn-sm btn-danger deleteCategory" title="Delete Category" data-id="{{base64_encode($val->id)}}"><i class="fas fa-trash"></i></a>
    <!-- <a href="javascript:void(0)" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></a> -->
  </td>
</tr>
@endforeach
@if(count($data) == 0)
<tr>
  <td colspan="8">No Categories found.</td>
</tr>
@endif