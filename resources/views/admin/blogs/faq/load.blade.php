@foreach($data['faq'] as $key => $val)
<tr>
  <td>{{++$key}}</td>
  <td>{{$val->heading}}</td>
  <td>{{ $val->country->name }} </td>
  <td class="text-right"><small>{{date('d-M-Y | h:i A', strtotime($val->created_at))}}</small></td>
  <td class="text-right">
      @if(auth('admin')->user()->can('Blogs edit'))
        <a href="javascript:void(0)" class="btn btn-sm btn-info editFAQ" title="Edit FAQ" data-id="{{base64_encode($val->id)}}"><i class="fas fa-edit"></i></a>
      @endif
      @if(auth('admin')->user()->can('Blogs delete'))
        <a href="javascript:void(0)" class="btn btn-sm btn-danger deleteFAQ" title="Delete FAQ" data-id="{{base64_encode($val->id)}}"><i class="fas fa-trash"></i></a>
      @endif
    </td>

</tr>
@endforeach