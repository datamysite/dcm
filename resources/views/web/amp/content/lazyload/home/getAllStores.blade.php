<div class="row">
      <div class="col-md-6 col-xs-12 mb-3">
         <a href="{{route('brand', [$region, $allstores[0]->retailer->slug])}}" aria-label="All Store - {{$allstores[0]->retailer->name}}">
            <div class="single-deal v-tile">
               <div class="overlay"></div>
               <img class="img-fluid w-100" src="{{URL::to('/public/storage/retailers/')}}/{{app()->getLocale() == 'ar' ? 'ar/'.$allstores[0]->retailer->ar_logo : $allstores[0]->retailer->logo}}" alt="All Store - {{$allstores[0]->retailer->name}}" style="border-radius: 20px;" />
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
         <a href="{{route('brand', [$region, $allstores[1]->retailer->slug])}}" aria-label="All Store - {{$allstores[1]->retailer->name}}">
            <div class="single-deal">
               <div class="overlay"></div>
               <img class="img-fluid w-100" src="{{URL::to('/public/storage/retailers/')}}/{{app()->getLocale() == 'ar' ? 'ar/'.$allstores[1]->retailer->ar_logo : $allstores[1]->retailer->logo}}" alt="All Store - {{$allstores[1]->retailer->name}} For Less" style="border-radius: 20px;" />
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
               <img class="img-fluid w-100" src="{{URL::to('/public/storage/retailers/')}}/{{app()->getLocale() == 'ar' ? 'ar/'.$allstores[2]->retailer->ar_logo : $allstores[2]->retailer->logo}}" alt="All Store - {{$allstores[2]->retailer->name}} For Less" style="border-radius: 20px;" />
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

   <!-- <div class="divider"></div> -->

   <div class="row">

      <div class="col-6 col-xs-6 col-sm-6 col-md-3">
         <a href="{{route('brand', [$region, $allstores[3]->retailer->slug])}}" aria-label="All Store - {{$allstores[3]->retailer->name}}">
            <div class="single-deal">
               <div class="overlay"></div>
               <img class="img-fluid w-100" src="{{URL::to('/public/storage/retailers/')}}/{{app()->getLocale() == 'ar' ? 'ar/'.$allstores[3]->retailer->ar_logo : $allstores[3]->retailer->logo}}" alt="All Store - {{$allstores[3]->retailer->name}} For Less" style="border-radius: 20px;" />
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
         <a href="{{route('brand', [$region, $allstores[4]->retailer->slug])}}" aria-label="All Store - {{$allstores[4]->retailer->name}}">
            <div class="single-deal">
               <div class="overlay"></div>
               <img class="img-fluid w-100" src="{{URL::to('/public/storage/retailers/')}}/{{app()->getLocale() == 'ar' ? 'ar/'.$allstores[4]->retailer->ar_logo : $allstores[4]->retailer->logo}}" alt="All Store - {{$allstores[4]->retailer->name}} For Less" style="border-radius: 20px;" />
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
         <a href="{{route('brand', [$region, $allstores[5]->retailer->slug])}}" aria-label="All Store - {{$allstores[5]->retailer->name}}">
            <div class="single-deal v-tile">
               <div class="overlay"></div>
               <img class="img-fluid w-100" src="{{URL::to('/public/storage/retailers/')}}/{{app()->getLocale() == 'ar' ? 'ar/'.$allstores[5]->retailer->ar_logo : $allstores[5]->retailer->logo}}" alt="All Store - {{$allstores[5]->retailer->name}}" style="border-radius: 20px;" />
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