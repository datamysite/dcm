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
  <td>
    @if($val->type == '1')
    {{count($val->coupons)}} Coupons
    @else
    {{count($val->offers)}} Offers
    @endif
  </td>
  <td>{{@$val->user->username}}</td>
  <td>
    @if($val->status == '1')
    <span class="badge badge-sucess">Active</span>
    @elseif($val->status == '0')
    <span class="badge badge-danger">In Active</span>
    @endif
  </td>
  <td class="text-center text-success">
    @if(!empty($val->sellerPanel->id))
    <i class="fa fa-check"></i>
    @endif
  </td>
  <td class="text-right">
    <div class="btn-group">
      <button type="button" class="btn btn-info btn-sm">Action</button>
      <button type="button" class="btn btn-info btn-sm dropdown-toggle dropdown-icon" data-toggle="dropdown" aria-expanded="false">
        <span class="sr-only">Action</span>
      </button>
      <div class="dropdown-menu dropdown-menu-right table-dropdown" role="menu" style="">
        @if($val->type == '2' || $val->type == '3')
        @if(auth('admin')->user()->can('Retailer offer view'))
        <a class="dropdown-item" href="{{route('admin.retailer.offer', base64_encode($val->id))}}" title="Retail offers"><i class="fas fa-hand-holding-usd"></i> Retail Offers</a>
        @endif
        @endif
        @if($val->type == '1' || $val->type == '3')
        @if(auth('admin')->user()->can('Retailer coupon view'))
        <a class="dropdown-item" href="{{route('admin.retailer.coupon', base64_encode($val->id))}}" title="Online Coupons"><i class="fas fa-tag"></i> Online Coupons</a>
        @endif
        @endif

        @if(auth('admin')->user()->can('Retailer blogs view'))
        <a class="dropdown-item" href="{{route('admin.retailer.faq', base64_encode($val->id))}}" title="FAQs"><i class="fas fa-book-open"></i> FAQs</a>
        <a class="dropdown-item" href="{{route('admin.retailer.blog', base64_encode($val->id))}}" title="Blogs"><i class="fas fa-book"></i> Blogs</a>
        @endif
        @if(auth('admin')->user()->can('Retailer edit'))
        <a class="dropdown-item editRetailer" href="javascript:void(0)" title="Edit Retailer" data-id="{{base64_encode($val->id)}}"><i class="fas fa-edit"></i> Edit</a>
        @endif
        @if(auth('admin')->user()->can('Retailer edit'))
        @if(empty($val->sellerPanel->id))
        <div class="dropdown-divider"></div>
        <a class="dropdown-item sellerPanel" href="javascript:void(0)" title="Create Seller Panel" data-id="{{base64_encode($val->id)}}" data-name="{{$val->name}}"><i class="fas fa-tachometer-alt"></i> Seller panel</a>
        @endif
        @endif
        @if(auth('admin')->user()->can('Retailer delete'))
        <div class="dropdown-divider"></div>
        <a class="dropdown-item text-danger deleteRetailer" href="javascript:void(0)" title="Delete Retailer" data-id="{{base64_encode($val->id)}}"><i class="fas fa-trash"></i> Delete</a>
        @endif
      </div>
    </div>
  </td>
</tr>
@endforeach
@if(count($data) == 0)
<tr>
  <td colspan="8">No Result Found.</td>
</tr>
@endif