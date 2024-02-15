@foreach($data as $key => $val)
  <tr>
    <td>{{++$key}}</td>
    <td>{{$val->title}}</td>
    <td>{{number_format($val->discount)}}%</td>
    <td>{{@$val->country->shortname}}</td>
    <td>
      @foreach($val->categories as $cval)
        <span class="badge badge-primary">{{@$cval->category->name}}</span>
      @endforeach
    </td>
    <td>{{@$val->user->username}}</td>
    <td class="text-right">
      <a href="javascript:void(0)" class="btn btn-sm btn-info editOffer" title="Edit Offer" data-id="{{base64_encode($val->id)}}"><i class="fas fa-edit"></i></a>
      <a href="javascript:void(0)" class="btn btn-sm btn-danger deleteOffer" title="Delete Offer" data-id="{{base64_encode($val->id)}}"><i class="fas fa-trash"></i></a>
    </td>
  </tr>
@endforeach
@if(count($data) == 0)
  <tr>
    <td colspan="9">No Offers Available.</td>
  </tr>
@endif