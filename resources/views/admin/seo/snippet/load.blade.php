@foreach($data as $key => $val)
  <tr>
    <td>{{++$key}}</td>
    <td>{{$val->name}}</td>
    <td>{{empty($val->page_url) ? 'All Pages' : $val->page_url}}</td>
    <td>{{$val->position}}</td>
    <td>{{@$val->country->shortname}}</td>
    <td class="text-right">
      <a href="javascript:void(0)" class="btn btn-sm btn-info editSnippet" title="Edit Snippet" data-id="{{base64_encode($val->id)}}"><i class="fas fa-edit"></i></a>
      <a href="javascript:void(0)" class="btn btn-sm btn-danger deleteSnippet" title="Delete Snippet" data-id="{{base64_encode($val->id)}}"><i class="fas fa-trash"></i></a>
    </td>
  </tr>
@endforeach
@if(count($data) == 0)
  <tr>
    <td colspan="6">No Snippet code available.</td>
  </tr>
@endif