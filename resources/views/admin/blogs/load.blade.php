@foreach($data as $key => $val)
  <tr>
    <td>{{++$key}}</td>
    <td>{{$val->slug}}</td>
    <td>{{$val->heading}}</td>
    <td class="text-right"><small>{{date('d-M-Y | h:i A', strtotime($val->created_at))}}</small></td>
    <td class="text-right">
      @if(auth('admin')->user()->can('Blogs edit'))
        <a href="javascript:void(0)" class="btn btn-sm btn-info editBlog" title="Edit Blog" data-id="{{base64_encode($val->id)}}"><i class="fas fa-edit"></i></a>
      @endif
      @if(auth('admin')->user()->can('Blogs delete'))
        <a href="javascript:void(0)" class="btn btn-sm btn-danger deleteBlog" title="Delete Blog" data-id="{{base64_encode($val->id)}}"><i class="fas fa-trash"></i></a>
      @endif
      <!-- <a href="javascript:void(0)" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></a> -->
    </td>
  </tr>
@endforeach