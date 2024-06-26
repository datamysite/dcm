<div class="card country-card">
   <div class="d-flex justify-content-between align-items-start card-head">
      <div>
         <h5 class="text-center text-white">Country Preferences ! </h5>
      </div>
      <button type="button" class="btn-close text-white" data-bs-dismiss="modal" aria-label="Close"></button>
   </div>
   <div style="padding:15px">
      <div class="d-flex flex-column card-body" style="min-height:240px">
         <p class="head-1">You are about to navigate to <strong>KSA's</strong> website.</p>
         <p class="head-2">Would you like to:</p>

         @foreach($countries as $val)
            <a href="javascript:void(0)" class="loc-link loc-1 proceedLocationBtn" data-location="{{$val->shortname}}" data-loclink="{{$val->website}}">
               <span>Proceed to {{$val->shortname}}`s Website</span>
               <img src="{{URL::to('/public/web_assets/images/countries/'.$val->id.'.png')}}" width="25px" height="17.844px">
            </a>
         @endforeach

      </div>
   </div>
</div>