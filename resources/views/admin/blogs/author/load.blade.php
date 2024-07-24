@foreach($data['author'] as $key => $val)
<tr>
  <td>{{++$key}}</td>
  <td><img src="{{URL::to('/public/storage/authors/'.$val->image)}}" class="table-img"></td>
  <td>{{$val->name}}</td>
  <td>{{$val->slug}}</td>
  <td><a href="{{ $val->linkedin_url }}" target="_blank">{{ $val->linkedin_url }}</a></td>
  <td><a href="{{ $val->x_url }}" target="_blank">{{ $val->x_url }}</a></td>
  <td><a href="{{ $val->facebook_url }}" target="_blank">{{ $val->facebook_url }}</a></td>
  <td class="text-right">
        <a href="javascript:void(0)" class="btn btn-sm btn-info editAuthor" title="Edit Author" data-id="{{base64_encode($val->id)}}"><i class="fas fa-edit"></i></a>
        <a href="javascript:void(0)" class="btn btn-sm btn-danger deleteAuthor" title="Delete Author" data-id="{{base64_encode($val->id)}}"><i class="fas fa-trash"></i></a>
    </td>
</tr>
@endforeach