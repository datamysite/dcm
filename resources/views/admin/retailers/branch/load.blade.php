@foreach($data as $key => $val)
  <tr>
    <td>{{++$key}}</td>
    <td>{{$val->name}} &nbsp;&nbsp;&nbsp;<small>&nbsp;&nbsp;&nbsp;| &nbsp;&nbsp;<a href="https://dealsandcouponsmena.com/en/{{$val->retailer->slug}}/{{$val->name}}" target="_blank"> KSA <small><i class="fas fa-link"></i></small></a> &nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp; <a href="https://dealsandcouponsmena.ae/en/{{$val->retailer->slug}}/{{$val->name}}" target="_blank"> UAE <small><i class="fas fa-link"></i></small></a></small></td>
    <td>{{@$val->admin->fullname}}</td>
    <td class="text-right">
      <div class="btn-group">
      <button type="button" class="btn btn-info btn-sm">Action</button>
      <button type="button" class="btn btn-info btn-sm dropdown-toggle dropdown-icon" data-toggle="dropdown" aria-expanded="false">
        <span class="sr-only">Action</span>
      </button>
      <div class="dropdown-menu dropdown-menu-right table-dropdown" role="menu" style="">
        
        <a class="dropdown-item" href="{{route('admin.retailer.branch.faq', base64_encode($val->id))}}" title="FAQs"><i class="fas fa-book-open"></i> FAQs</a>
        <a class="dropdown-item" href="{{route('admin.retailer.branch.blog', base64_encode($val->id))}}" title="Blogs"><i class="fas fa-book"></i> Blogs</a>

        <a class="dropdown-item editRetailerBranch" href="javascript:void(0)" title="Edit Retailer Branch" data-id="{{base64_encode($val->id)}}"><i class="fas fa-edit"></i> Edit</a>

        <div class="dropdown-divider"></div>
        <a class="dropdown-item text-danger deleteRetailerBranch" href="javascript:void(0)" title="Delete Retailer Branch" data-id="{{base64_encode($val->id)}}"><i class="fas fa-trash"></i> Delete</a>

      </div>
    </div>
    </td>
  </tr>
@endforeach
@if(count($data) == 0)
  <tr>
    <td colspan="4">No Branches Available.</td>
  </tr>
@endif