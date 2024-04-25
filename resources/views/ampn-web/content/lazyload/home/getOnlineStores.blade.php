
@foreach($onlinestores as $val)
   <!-- item -->
   <div class="item">
      <div class="custom_col">
         <div class="flip-container">
            <a href="?b={{$val->retailer->slug}}" class="img-pop-up" aria-label="Online Store - {{$val->retailer->name}}">
               <div class="front">
                  <amp-img class="img-fluid w-100" src="{{URL::to('/public/storage/retailers/')}}/{{app()->getLocale() == 'ar' ? 'ar/'.$val->retailer->ar_logo : $val->retailer->logo}}" layout="responsive" width="185px" height="230.516px" alt="Store - {{$val->retailer->name}}" style="border-radius: 20px;"></amp-img>
               </div>
            </a>
         </div>
      </div>
   </div>
@endforeach