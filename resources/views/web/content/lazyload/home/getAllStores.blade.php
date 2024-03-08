<div class="row">
      <div class="col-md-6 col-xs-12 mb-3">
         <a href="{{route('brand', [$region, $allstores[0]->slug])}}">
            <div class="single-deal v-tile">
               <div class="overlay"></div>
               <img class="img-fluid w-100" src="{{URL::to('/public/storage/retailers/')}}/{{app()->getLocale() == 'ar' ? 'ar/'.$allstores[0]->ar_logo : $allstores[0]->logo}}" alt="" style="border-radius: 20px;" />
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
         <a href="{{route('brand', [$region, $allstores[1]->slug])}}">
            <div class="single-deal">
               <div class="overlay"></div>
               <img class="img-fluid w-100" src="{{URL::to('/public/storage/retailers/')}}/{{app()->getLocale() == 'ar' ? 'ar/'.$allstores[1]->ar_logo : $allstores[1]->logo}}" alt="Brand For Less" style="border-radius: 20px;" />
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
         <a href="{{route('brand', [$region, $allstores[2]->slug])}}">
            <div class="single-deal">
               <div class="overlay"></div>
               <img class="img-fluid w-100" src="{{URL::to('/public/storage/retailers/')}}/{{app()->getLocale() == 'ar' ? 'ar/'.$allstores[2]->ar_logo : $allstores[2]->logo}}" alt="Brand For Less" style="border-radius: 20px;" />
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
         <a href="{{route('brand', [$region, $allstores[3]->slug])}}">
            <div class="single-deal">
               <div class="overlay"></div>
               <img class="img-fluid w-100" src="{{URL::to('/public/storage/retailers/')}}/{{app()->getLocale() == 'ar' ? 'ar/'.$allstores[3]->ar_logo : $allstores[3]->logo}}" alt="Brand For Less" style="border-radius: 20px;" />
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
         <a href="{{route('brand', [$region, $allstores[4]->slug])}}">
            <div class="single-deal">
               <div class="overlay"></div>
               <img class="img-fluid w-100" src="{{URL::to('/public/storage/retailers/')}}/{{app()->getLocale() == 'ar' ? 'ar/'.$allstores[4]->ar_logo : $allstores[4]->logo}}" alt="Brand For Less" style="border-radius: 20px;" />
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
         <a href="{{route('brand', [$region, $allstores[5]->slug])}}">
            <div class="single-deal v-tile">
               <div class="overlay"></div>
               <img class="img-fluid w-100" src="{{URL::to('/public/storage/retailers/')}}/{{app()->getLocale() == 'ar' ? 'ar/'.$allstores[5]->ar_logo : $allstores[5]->logo}}" alt="" style="border-radius: 20px;" />
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