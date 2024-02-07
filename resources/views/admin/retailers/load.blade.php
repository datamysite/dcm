@foreach($data as $key => $val)
@php
  $countries = '';
  foreach($val->countries as $cval){
    $countries .= empty($countries) ? $cval->country->shortname : ', '.$cval->country->shortname;
  }
@endphp
  <tr>
    <td>{{++$key}}</td>
    <td><img src="{{URL::to('/public/storage/retailers/'.$val->logo)}}" class="table-img"></td>
    <td>{{$val->name}}</td>
    <td>{{$countries}}</td>
    <td>{{$val->discount_upto}} %</td>
    <td>0 Coupons</td>
    <td class="text-right">
      <a href="{{route('admin.retailer.coupon')}}" class="btn btn-sm btn-default" title="Coupons" data-id=""><i class="fas fa-tag"></i></a>
      <a href="{{route('admin.retailer.blog')}}" class="btn btn-sm btn-default" title="Blogs" data-id=""><i class="fas fa-book"></i></a>
      <a href="javascript:void(0)" class="btn btn-sm btn-info editRetailer" title="Edit Retailer" data-id="{{base64_encode($val->id)}}"><i class="fas fa-edit"></i></a>
      <a href="javascript:void(0)" class="btn btn-sm btn-danger deleteRetailer" title="Delete Retailer" data-id="{{base64_encode($val->id)}}"><i class="fas fa-trash"></i></a>
    </td>
  </tr>
@endforeach
@if(count($data) == 0)
  <tr>
    <td colspan="7">No Result Found.</td>
  </tr>
@endif