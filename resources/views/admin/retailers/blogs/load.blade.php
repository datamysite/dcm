@foreach($data as $key => $val)
  <tr>
    <td>{{++$key}}</td>
    <td>{{@$val->country->shortname}}</td>
    <td>{{$val->heading}}</td>
    <td>{{@$val->user->username}}</td>
    <td class="text-right">
      @if(auth('admin')->user()->can('Retailer blogs edit'))
        <a href="javascript:void(0)" class="btn btn-sm btn-info editBlog" title="Edit Blog" data-id="{{base64_encode($val->id)}}"><i class="fas fa-edit"></i></a>
      @endif
      @if(auth('admin')->user()->can('Retailer blogs delete'))
        <a href="javascript:void(0)" class="btn btn-sm btn-danger deleteBlog" title="Delete Blog" data-id="{{base64_encode($val->id)}}"><i class="fas fa-trash"></i></a>
      @endif
    </td>
  </tr>
@endforeach
@if(count($data) == 0)
  <tr>
    <td colspan="4">No Blogs Available</td>
  </tr>
@endif