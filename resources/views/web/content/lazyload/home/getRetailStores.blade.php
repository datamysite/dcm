@foreach($retailstores as $val)
   <!-- item -->
   <div class="item">
      <div class="custom_col">
         <div class="flip-container">
            <div class="flipper">
               <div class="front">
                  <img class="img-fluid w-100" src="{{config('app.storage').'retailers/'}}/{{app()->getLocale() == 'ar' ? 'ar/'.$val->retailer->ar_logo : $val->retailer->logo}}" alt="@if(app()->getLocale() == 'ar') {{empty($val->alt_tag_ar) ? $val->name_ar : $val->alt_tag_ar}} @else {{empty($val->alt_tag) ? $val->name : $val->alt_tag}} @endif" style="border-radius: 20px;" />
                  <a href="{{URL::to('/'.app()->getLocale().'/'.$val->retailer->slug)}}" class="img-pop-up" target="_blank" aria-label="Retail Store - {{$val->retailer->image}}">
                     <div class="custom_arrow-button2">
                        <i class="bi bi-arrow-right-circle"></i>
                     </div>
                  </a>
               </div>
               <div class="back">
                  <a href="{{URL::to('/'.app()->getLocale().'/'.$val->retailer->slug)}}" class="img-pop-up" aria-label="Retail Store - {{$val->retailer->image}}">
                     <img class="img-fluid w-100" src="{{config('app.storage').'retailers/'}}/{{app()->getLocale() == 'ar' ? 'ar/'.$val->retailer->ar_logo : $val->retailer->logo}}" alt="@if(app()->getLocale() == 'ar') {{empty($val->alt_tag_ar) ? $val->name_ar : $val->alt_tag_ar}} @else {{empty($val->alt_tag) ? $val->name : $val->alt_tag}} @endif" style="border-radius: 20px;" />
                  </a>
               </div>
            </div>
         </div>
      </div>
   </div>
   <!-- item -->
@endforeach

@if(count($retailstores) < 5)
   @for($i=0; $i<(5-count($retailstores)); $i++)
   <!-- item -->
   <div class="item">
      <div class="custom_col">
         <div class="flip-container">
            <div class="flipper">
               <div class="front">
                  <img class="img-fluid w-100" src="{{URL::to('/public')}}/{{app()->getLocale() == 'ar' ? 'ar-coming-soon.png' : 'coming-soon.png'}}" alt="Coming Soon" style="border-radius: 20px;" />
                  <a href="javascript:void(0)" class="img-pop-up" target="_blank" aria-label="Coming Soon - {{$i}}">
                     <div class="custom_arrow-button2">
                        <i class="bi bi-arrow-right-circle"></i>
                     </div>
                  </a>
               </div>
               <div class="back">
                  <a href="javascript:void(0)" class="img-pop-up" aria-label="Coming Soon - {{$i}}">
                     <img class="img-fluid w-100" src="{{URL::to('/public')}}/{{app()->getLocale() == 'ar' ? 'ar-coming-soon.png' : 'coming-soon.png'}}" alt="Coming Soon" style="border-radius: 20px;" />
                  </a>
               </div>
            </div>
         </div>
      </div>
   </div>
   <!-- item -->
   @endfor
@endif