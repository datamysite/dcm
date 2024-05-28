<div class="card country-card">
   <div class="d-flex justify-content-between align-items-start card-head">
      <div>
         <h5 class="text-center text-white">{{ __('translation.country_change_para_1') }}</h5>
      </div>
      <button type="button" class="btn-close text-white" data-bs-dismiss="modal" aria-label="Close"></button>
   </div>
   <div style="padding:15px">
      <div class="d-flex flex-column card-body" style="min-height:240px">
         <p class="head-1">{{ __('translation.country_change_para_2_'.$c1) }}</p>
         <p class="head-2">{{ __('translation.country_change_para_3') }}</p>


         <a href="javascript:void(0)" class="loc-link loc-1 stayLocationBtn" data-location="{{$c1}}">
            <span>{{ __('translation.country_change_para_4_'.$c1) }}</span>
            <img src="{{URL::to('/public/web_assets/images/countries/'.$ci1.'.png')}}" width="25px" height="17.844px">
         </a>

         <a href="{{$cl2}}" class="loc-link loc-2">
            <span>{{ __('translation.country_change_para_5_'.$c2) }}</span>
            <img src="{{URL::to('/public/web_assets/images/countries/'.$ci2.'.png')}}" width="25px" height="17.844px">
         </a>
      </div>
   </div>
</div>