@foreach($data as $key => $val)
<tr>
  <td>{{++$key}}</td>
  <td>
    @if($val->country_id == '1')
      UAE
    @elseif($val->country_id == '2')
      KSA
    @endif
  </td>
  <td>
    @if($val->lang == 'en')
      English
    @elseif($val->lang == 'ar')
      Arabic
    @endif
  </td>
  <td>{{$val->slug}}</td>
  <td>{{$val->heading}}</td>
  <td>{{$val->category ? $val->category->name : ""}}</td>
  <td>{{$val->author ? $val->author->name : ""}}</td>
  <td>{{$val->read_time ? $val->read_time : "0"}} Mins</td>
  <td class="text-right"><small>{{date('d-M-Y | h:i A', strtotime($val->created_at))}}</small></td>

  <td class="text-right">
    <div class="btn-group">
      <button type="button" class="btn btn-info btn-sm">Action</button>
      <button type="button" class="btn btn-info btn-sm dropdown-toggle dropdown-icon" data-toggle="dropdown" aria-expanded="false">
        <span class="sr-only">Action</span>
      </button>
      <div class="dropdown-menu dropdown-menu-right table-dropdown" role="menu">

        <!-- Permission goes here if needed -->
        <a class="dropdown-item" href="{{route('admin.blog.faq', base64_encode($val->id))}}" title="Blog Faqs"><i class="fas fa-book"></i>Add FAQ</a>

        @if(auth('admin')->user()->can('Blogs edit'))
        <a class="dropdown-item editBlog" href="javascript:void(0)" title="Edit Blog" data-id="{{base64_encode($val->id)}}"><i class="fas fa-edit"></i>Edit</a>
        @endif

        @if(auth('admin')->user()->can('Blogs delete'))
        <div class="dropdown-divider"></div>
        <a class="dropdown-item text-danger deleteBlog" href="javascript:void(0)" title="Delete Blog" data-id="{{base64_encode($val->id)}}"><i class="fas fa-trash"></i>Delete</a>
        @endif


      </div>
    </div>
  </td>
</tr>
@endforeach