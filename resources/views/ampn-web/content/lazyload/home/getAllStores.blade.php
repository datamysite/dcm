<div class="row">

   <div class="col-6 col-xs-6 col-sm-6 col-md-3">
      <a href="{{route('brand', [$region, $allstores[1]->retailer->slug])}}" aria-label="All Store - {{$allstores[1]->retailer->name}}">
         <div class="single-deal">
            <div class="overlay"></div>
            <amp-img class="img-fluid w-100" src="{{URL::to('/public/storage/retailers/')}}/{{app()->getLocale() == 'ar' ? 'ar/'.$allstores[1]->retailer->ar_logo : $allstores[1]->retailer->logo}}" alt="All Store - {{$allstores[1]->retailer->name}}" layout="responsive" width="185px" height="230.516px"  style="border-radius: 20px;"></amp-img>
            <span class="img-pop-up">
               <div class="deal-details">
                  <!-- <h6 class="deal-title">Your Text Goes Here</h6> -->
                  <button class="blue-button px-5 py-1 mb-3 me-5">Browse</button>
               </div>
            </span>
         </div>
      </a>
   </div>

   <div class="col-6 col-xs-6 col-sm-6 col-md-3">
      <a href="{{route('brand', [$region, $allstores[2]->retailer->slug])}}" aria-label="All Store - {{$allstores[2]->retailer->name}}">
         <div class="single-deal">
            <div class="overlay"></div>
            <amp-img class="img-fluid w-100" src="{{URL::to('/public/storage/retailers/')}}/{{app()->getLocale() == 'ar' ? 'ar/'.$allstores[2]->retailer->ar_logo : $allstores[2]->retailer->logo}}" alt="All Store - {{$allstores[2]->retailer->name}}" layout="responsive" width="185px" height="230.516px"  style="border-radius: 20px;"></amp-img>
            <span class="img-pop-up">
               <div class="deal-details">
                  <!-- <h6 class="deal-title">Your Text Goes Here</h6> -->
                  <button class="blue-button px-5 py-1 mb-3 me-5">Browse</button>
               </div>
            </span>
         </div>
      </a>
   </div>
   
   <div class="col-md-6 col-xs-12 mb-3">
      <a href="{{route('brand', [$region, $allstores[0]->retailer->slug])}}" aria-label="All Store - {{$allstores[0]->retailer->name}}">
         <div class="single-deal v-tile">
            <div class="overlay"></div>
            <amp-img class="img-fluid w-100" src="{{URL::to('/public/storage/retailers/')}}/{{app()->getLocale() == 'ar' ? 'ar/'.$allstores[0]->retailer->ar_logo : $allstores[0]->retailer->logo}}" alt="All Store - {{$allstores[0]->retailer->name}}" layout="responsive" width="390px" height="240px"  style="border-radius: 20px;"></amp-img>
            <span class="img-pop-up">
               <div class="deal-details">
                  <!-- <h6 class="deal-title">Your Text Goes Here</h6> -->
                  <button class="blue-button px-5 py-1 mb-3 me-5">Browse</button>
               </div>
            </span>
         </div>
      </a>
   </div>

</div>
