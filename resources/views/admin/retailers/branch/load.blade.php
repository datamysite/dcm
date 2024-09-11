@foreach($data as $key => $val)
  <tr>
    <td>{{++$key}}</td>
    <td>{{$val->name}}</td>
    <td>{{@$val->admin->fullname}}</td>
    <td class="text-right">
      <div class="btn-group">
      <button type="button" class="btn btn-info btn-sm">Action</button>
      <button type="button" class="btn btn-info btn-sm dropdown-toggle dropdown-icon" data-toggle="dropdown" aria-expanded="false">
        <span class="sr-only">Action</span>
      </button>
      <div class="dropdown-menu dropdown-menu-right table-dropdown" role="menu" style="">
        
        <a class="dropdown-item" href="{{route('admin.retailer.faq', base64_encode($val->id))}}" title="FAQs"><i class="fas fa-book-open"></i> FAQs</a>
        <a class="dropdown-item" href="{{route('admin.retailer.blog', base64_encode($val->id))}}" title="Blogs"><i class="fas fa-book"></i> Blogs</a>

        <a class="dropdown-item editRetailer" href="javascript:void(0)" title="Edit Retailer" data-id="{{base64_encode($val->id)}}"><i class="fas fa-edit"></i> Edit</a>

        <div class="dropdown-divider"></div>
        <a class="dropdown-item text-danger deleteRetailer" href="javascript:void(0)" title="Delete Retailer" data-id="{{base64_encode($val->id)}}"><i class="fas fa-trash"></i> Delete</a>
        
      </div>
    </div>
    </td>
  </tr>
@endforeach
@if(count($data) == 0)
  <tr>
    <td colspan="4">No Coupons Available.</td>
  </tr>
@endif