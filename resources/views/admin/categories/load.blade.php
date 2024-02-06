@foreach($data as $key => $val)
    <tr>
      <td>{{++$key}}</td>
      <td><img src="{{URL::to('/public/storage/categories/'.$val->image)}}" class="table-img"></td>
      <td>{{$val->name}}</td>
      <td>{{$val->max_discount}} %</td>
      <td>0</td>
      <td class="text-right">
        <a href="javascript:void(0)" class="btn btn-sm btn-info editCategory" title="Edit Category" data-id="{{base64_encode($val->id)}}"><i class="fas fa-edit"></i></a>
        <a href="javascript:void(0)" class="btn btn-sm btn-danger deleteCategory" title="Delete Category" data-id="{{base64_encode($val->id)}}"><i class="fas fa-trash"></i></a>
        <!-- <a href="javascript:void(0)" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></a> -->
      </td>
    </tr>
@endforeach