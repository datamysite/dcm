<div class="mb-3 mb-lg-0">
    <p class="mb-0">
       <strong>{{ $paginator->firstItem() }} </strong> - <strong>{{ $paginator->lastItem() }}</strong>  {{ __('translation.out_of') }} <strong>{{ $paginator->total() }}</strong>
       {{ __('translation.items_showing') }}
    </p>
 </div>
