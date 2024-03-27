@foreach($data['vacancies'] as $key => $val)
<tr>
<td>{{++$key}}</td>
<td>{{$val->title }}</td>

<td class="text-center">
    <a href="{{URL::to('/admin/careers/details')}}/{{$val->id}}" class="btn btn-sm btn-info editCategory" title="View Details" data-id="{{base64_encode($val->id)}}"><i class="fas fa-arrow-circle-right"></i></a>
</td>

</tr>
@endforeach
@if(count($data) == 0)
<tr>
  <td colspan="8">No Jobs found.</td>
</tr>
@endif