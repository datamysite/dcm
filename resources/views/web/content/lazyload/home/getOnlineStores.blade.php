
@foreach($onlinestores as $val)
   <!-- item -->
   <div class="item">
      <div class="custom_col">
         <div class="flip-container">
            <div class="flipper">
               <div class="front">
                  <img class="img-fluid w-100" src="{{URL::to('/public/storage/retailers/')}}/{{app()->getLocale() == 'ar' ? 'ar/'.$val->ar_logo : $val->logo}}" alt="Yalla Toys Store" style="border-radius: 20px;" />
                  <a href="javascript:void(0)" class="img-pop-up">
                     <div class="custom_arrow-button2">
                        <i class="bi bi-arrow-right-circle"></i>
                     </div>
                  </a>
               </div>
               <div class="back">
                  <a href="{{route('brand',[$region, $val->slug])}}" class="img-pop-up">
                     <img class="img-fluid w-100" src="{{URL::to('/public/storage/retailers/')}}/{{app()->getLocale() == 'ar' ? 'ar/'.$val->ar_logo : $val->logo}}" alt="Yalla Toys Store" style="border-radius: 20px;" />
                  </a>
               </div>
            </div>
         </div>
      </div>
   </div>
@endforeach