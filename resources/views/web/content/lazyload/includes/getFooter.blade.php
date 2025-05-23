
   <div class="container np-container">

         <div class="row">

            <div class="col-6 col-sm-6 col-md-3">
               <h6 class="mb-4"><strong>{{ __('translation.footer_section_1_text01') }}</strong></h6>
               <!-- list -->
               <ul class="nav flex-column">
                  @foreach($footAbout as $val)
                     @if(app()->getLocale() == 'ar')
                        <li class="nav-item mb-2"><a href="{{$val->page_url}}" class="nav-link">{{ __('translation.'.$val->page_name) }}</a></li>
                     @elseif(app()->getLocale() == 'en')
                        <li class="nav-item mb-2"><a href="{{$val->page_url}}" class="nav-link">{{ __('translation.'.$val->page_name) }}</a></li>
                     @endif
                  @endforeach
               </ul>
            </div>

            <div class="col-6 col-sm-6 col-md-3">
               <h6 class="mb-4"><strong>{{ __('translation.footer_section_2_text01') }}</strong></h6>
               <ul class="nav flex-column">
                  @foreach($footBrand as $val)
                     <li class="nav-item mb-2"><a href="{{URL::to('/'.app()->getLocale().'/'.$val->retailer->slug)}}" class="nav-link">{{app()->getLocale() == 'ar' ? $val->retailer->name_ar : $val->retailer->name}}</a></li>
                  @endforeach

                  <li class="nav-item mb-2"><a href="{{URL::to('/'.app()->getLocale().'/stores')}}" class="nav-link" style="text-decoration: underline; font-weight: bold;">{{ __('translation.view_more_btn_txt') }}</a></li>
               </ul>
            </div>

            <div class="col-6 col-sm-6 col-md-3">
               <h6 class="mb-4"><strong>{{ __('translation.footer_section_3_text01') }}</strong></h6>
               <ul class="nav flex-column">
                  <!-- list -->
                  @foreach($footCat as $val)
                     @php
                        $string = strtolower(trim($val->category->name));
                         $string = str_replace('&', 'and', $string);
                         $string = str_replace(' ', '-', $string);
                         $slug = preg_replace('/[^a-z0-9-]/', '', $string);
                     @endphp
                     <li class="nav-item mb-2"><a href="{{URL::to('/'.app()->getLocale().'/'.$slug)}}" class="nav-link">{{app()->getLocale() == 'ar' ? $val->category->name_ar : $val->category->name}}</a></li>
                  @endforeach
               </ul>
            </div>

            <div class="col-6 col-sm-6 col-md-3 newsletter">
               <p>{{ __('translation.footer_section_4_text01') }}</p>
               <h6 class="mb-4">{{ __('translation.footer_section_4_text02') }}</h6>
               <ul class="nav flex-column">
                  <!-- list -->
                  <li class="nav-item mb-2">
                     <form class="ms-auto d-flex align-items-center" id="newsletterForm" action="{{route('newsletter.subscribe')}}">
                        @csrf
                        <input type="email" name="email" placeholder="{{ __('translation.email_place_holder') }} " required>
                        
                        <button class="btn " type="submit">
                           <i class="fa fa-paper-plane"></i>
                        </button>
                     </form>
                     <div class="newsletter-loader">
                        <img src="{{URL::to('/public/loader-gif.gif')}}" width="50px">
                    </div>
                     <span class="errors newsletter_error"></span>
                  </li>
                  <li class="nav-item mb-2">
                     <div class="d-flex align-items-center">
                        <a class="navbar-brand" href="#">
                           <img src="{{URL::to('/public')}}/web_assets/images/logo/dcm-logo-r.png" alt="Logo" width="150px" height="150px">
                        </a>
                     </div>
                  </li>
               </ul>
            </div>
         </div>
   </div>


   <div class="footer-bottom">
      <div class="container np-container">
         <div class="row align-items-center">
            <div class="col-md-6">
               <span class="small text-muted" style="color: black;">
                  © {{date('Y')}} <a href="https://www.dealsandcouponsmena.com/">DCM</a>. {{ __('translation.footer_text01') }} <a href="https://daralafkarmarketing.ae/" target="_blank">Dar Alafkar Marketing L.L.C</a>
               </span>
            </div>

            <div class="col-md-6">
               <ul class="list-inline {{app()->getLocale() == 'ar' ? 'text-md-start' : 'text-md-end'}} mb-0 small mt-3 mt-md-0 social-media">

                  <li class="list-inline-item first">
                     <a href="https://www.facebook.com/profile.php?id=100091291623092" target="_blank" class="btn btn-xs" aria-label="Facebook">
                        <i class="fa fa-facebook-square"></i>
                     </a>
                  </li>
                  <li class="list-inline-item">|</li>
                  <li class="list-inline-item">
                     <a href="https://ae.linkedin.com/company/dealsandcouponsmena-com?trk=public_post_feed-actor-name" target="_blank" class="btn btn-xs" aria-label="Linkedin">
                        <i class="fa fa-linkedin-square"></i>
                     </a>
                  </li>
                  <li class="list-inline-item">|</li>
                  <li class="list-inline-item">
                     <a href="https://www.instagram.com/dealsandcouponsmena/" target="_blank" class="btn btn-xs"  aria-label="Instagram">
                        <i class="fa fa-instagram"></i>
                     </a>
                  </li>
                 <!--  <li class="list-inline-item">|</li>
                  <li class="list-inline-item">
                     <a href="#!" class="btn btn-xs">
                        <i class="  fa fa-twitter-square"></i>
                     </a>
                  </li>
                  <li class="list-inline-item">|</li>
                  <li class="list-inline-item">
                     <a href="#!" class="btn btn-xs">
                        <i class="fa fa-pinterest-square"></i>
                     </a>
                  </li> -->
                  <li class="list-inline-item">|</li>
                  <li class="list-inline-item">
                     <a href="https://www.tiktok.com/@dcm_uae?_t=8ld3djl4gC8&_r=1" class="btn btn-xs"  aria-label="TikTok">
                        <i class="fa fa-tiktok"></i>
                     </a>
                  </li>

               </ul>
            </div>

         </div>
      </div>
   </div>