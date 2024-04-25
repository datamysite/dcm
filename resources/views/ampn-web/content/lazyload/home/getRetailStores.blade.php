@foreach($retailstores as $val)
   <!-- item -->
   <div class="item">
      <div class="custom_col">
         <div class="flip-container">
            <a href="{{route('brand', [$region, $val->retailer->slug])}}" class="img-pop-up" aria-label="Retail Store - {{$val->retailer->image}}">
               <amp-img class="img-fluid w-100" src="{{URL::to('/public/storage/retailers/')}}/{{app()->getLocale() == 'ar' ? 'ar/'.$val->retailer->ar_logo : $val->retailer->logo}}" layout="responsive" width="185px" height="230.516px" alt="Store - {{$val->retailer->name}}" style="border-radius: 20px;"></amp-img>
            </a>
         </div>
      </div>
   </div>
   <!-- item -->
@endforeach

@if(count($retailstores) < 2)
   @for($i=0; $i<(5-count($retailstores)); $i++)
   <!-- item -->
   <div class="item">
      <div class="custom_col">
         <div class="flip-container">
            <div class="flipper">
               <div class="front">
                  <amp-img class="img-fluid w-100" src="{{URL::to('/public')}}/{{app()->getLocale() == 'ar' ? 'ar-coming-soon.png' : 'coming-soon.png'}}" layout="responsive" width="185px" height="230.516px" alt="Store Coming Soon" style="border-radius: 20px;"></amp-img>
                  <a href="#" class="img-pop-up" target="_blank" aria-label="Coming Soon - {{$i}}">
                     <div class="custom_arrow-button2">
                        <i class="bi bi-arrow-right-circle"></i>
                     </div>
                  </a>
               </div>
            </div>
         </div>
      </div>
   </div>
   <!-- item -->
   @endfor
@endif