@foreach($data as $key => $val)
  <tr>
    <td>{{++$key}}</td>
    <td>{{@$val->country->shortname}}</td>
    <td>{{$val->heading}}</td>
    <td class="text-right">
      <a href="javascript:void(0)" class="btn btn-sm btn-info editBlog" title="Edit Blog" data-id="{{base64_encode($val->id)}}"><i class="fas fa-edit"></i></a>
      <a href="javascript:void(0)" class="btn btn-sm btn-danger deleteBlog" title="Delete Blog" data-id="{{base64_encode($val->id)}}"><i class="fas fa-trash"></i></a>
    </td>
  </tr>
@endforeach
@if(count($data) == 0)
  <tr>
    <td colspan="4">No Blogs Available</td>
  </tr>
@endif