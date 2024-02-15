@foreach($data as $key => $val)
  <tr>
    <td>{{++$key}}</td>
    <td><img src="{{URL::to('/public/storage/retailers/coupons/'.$val->banner)}}" class="table-img"></td>
    <td><strong>{{$val->code}}</strong></td>
    <td>{{@$val->country->shortname}}</td>
    <td>{{$val->heading}}</td>
    <td>{{@$val->category->name}}</td>
    <td>{{number_format($val->discount)}}%</td>
    <td>{{number_format($val->dcm_cashback)}}%</td>
    <td>{{@$val->user->username}}</td>
    <td class="text-right">
      <a href="javascript:void(0)" class="btn btn-sm btn-info editCoupon" title="Edit Coupon" data-id="{{base64_encode($val->id)}}"><i class="fas fa-edit"></i></a>
      <a href="javascript:void(0)" class="btn btn-sm btn-danger deleteCoupon" title="Delete Coupon" data-id="{{base64_encode($val->id)}}"><i class="fas fa-trash"></i></a>
    </td>
  </tr>
@endforeach
@if(count($data) == 0)
  <tr>
    <td colspan="9">No Coupons Available.</td>
  </tr>
@endif