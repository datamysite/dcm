
   <div class="container np-container">

      <div class="row">

         <div class="col-12 newsletter">

            <div class="d-flex justify-content-center">
               <a class="navbar-brand" href="#">
                  <amp-img src="{{URL::to('/public')}}/web_assets/images/logo/dcm-logo-r.png" alt="Logo" layout="fixed" width="150px" height="150px"></amp-img>
               </a>
            </div>
            <br>

            <p>{{ __('translation.footer_section_4_text01') }}</p>
            <h6 class="mb-4">{{ __('translation.footer_section_4_text02') }}</h6>
            <ul class="nav flex-column">
               <li class="nav-item mb-2">
                  <form class="ms-auto d-flex align-items-center">
                        <input type="text" placeholder="{{ __('translation.email_place_holder') }} " required>
                        
                        <button class="btn " type="submit">
                           <i class="fa fa-paper-plane"></i>
                        </button>
                  </form>
               </li>
            </ul>
         </div>
      </div>


      <div class="accordion">
        <div class="accordion-item">
            <button aria-expanded="false">
                <span class="accordion-title"> {{ __('translation.footer_section_1_text01') }}</span>
                <span class="icon" aria-hidden="true"></span>
            </button>
            <div class="accordion-content">
                <ul class="nav flex-column">
                  @foreach($footAbout as $val)
                     @if(app()->getLocale() == 'ar' && $val->page_name != 'Blogs')
                        <li class="nav-item mb-2"><a href="{{$val->page_url}}" class="nav-link">{{ __('translation.'.$val->page_name) }}</a></li>
                     @elseif(app()->getLocale() == 'en')
                        <li class="nav-item mb-2"><a href="{{$val->page_url}}" class="nav-link">{{ __('translation.'.$val->page_name) }}</a></li>
                     @endif
                  @endforeach
               </ul>
            </div>
        </div>


        <div class="accordion-item">
            <button aria-expanded="false">
                <span class="accordion-title">{{ __('translation.footer_section_2_text01') }}</span>
                <span class="icon" aria-hidden="true"></span>
            </button>
            <div class="accordion-content">
                <ul class="nav flex-column">
                  @foreach($footBrand as $val)
                     <li class="nav-item mb-2"><a href="{{route('brand', [$region, $val->retailer->slug])}}" class="nav-link">{{app()->getLocale() == 'ar' ? $val->retailer->name_ar : $val->retailer->name}}</a></li>
                  @endforeach
               </ul>
            </div>
        </div>


        <div class="accordion-item">
            <button aria-expanded="false">
                <span class="accordion-title">{{ __('translation.footer_section_3_text01') }}</span>
                <span class="icon" aria-hidden="true"></span>
            </button>
            <div class="accordion-content">
                <ul class="nav flex-column">
                  <!-- list -->
                  @foreach($footCat as $val)
                     @php
                        $string = strtolower(trim($val->category->name));
                         $string = str_replace('&', 'and', $string);
                         $string = str_replace(' ', '-', $string);
                         $slug = preg_replace('/[^a-z0-9-]/', '', $string);
                     @endphp
                     <li class="nav-item mb-2"><a href="{{route('category', [$region, $slug])}}" class="nav-link">{{app()->getLocale() == 'ar' ? $val->category->name_ar : $val->category->name}}</a></li>
                  @endforeach
               </ul>
            </div>
        </div>
      </div>
   </div>


   <div class="footer-bottom">
      <div class="container np-container">
         <div class="row align-items-center">
            <div class="col-md-6">
               <span class="small text-muted" style="color: black;">
                  © {{date('Y')}} <a href="https://www.dealsandcouponsmena.com/">DCM</a>. {{ __('translation.footer_text01') }} <a href="#">Dar Alafkar Marketing L.L.C</a>
               </span>
            </div>

            <div class="col-md-6">
               <ul class="list-inline {{app()->getLocale() == 'ar' ? 'text-md-start' : 'text-md-end'}} mb-0 small mt-3 mt-md-0 social-media">

                  <li class="list-inline-item first">
                     <a href="https://www.facebook.com/profile.php?id=100091291623092" target="_blank" class="btn btn-xs" aria-label="Facebook">
                        <amp-img src="{{URL::to('/public/web_assets/images/icons/fb.svg')}}" layout="fixed" width="16px" height="16px" alt="facebook icon"></amp-img>
                     </a>
                  </li>
                  <li class="list-inline-item">|</li>
                  <li class="list-inline-item">
                     <a href="https://ae.linkedin.com/company/dealsandcouponsmena-com?trk=public_post_feed-actor-name" target="_blank" class="btn btn-xs" aria-label="Linkedin">
                        <amp-img src="{{URL::to('/public/web_assets/images/icons/link.svg')}}" layout="fixed" width="16px" height="16px" alt="linkdin icon"></amp-img>
                     </a>
                  </li>
                  <li class="list-inline-item">|</li>
                  <li class="list-inline-item">
                     <a href="https://www.instagram.com/dealsandcouponsmena/" target="_blank" class="btn btn-xs"  aria-label="Instagram">
                        <amp-img src="{{URL::to('/public/web_assets/images/icons/insta.svg')}}" layout="fixed" width="16px" height="16px" alt="instagram icon"></amp-img>
                     </a>
                  </li>
                  <li class="list-inline-item">|</li>
                  <li class="list-inline-item">
                     <a href="https://www.tiktok.com/@dealsandcouponsmena" class="btn btn-xs"  aria-label="TikTok">
                        <amp-img src="{{URL::to('/public/web_assets/images/icons/tiktok.svg')}}" layout="fixed" width="16px" height="16px" alt="tiktok"></amp-img>
                     </a>
                  </li>

               </ul>
            </div>

         </div>
      </div>
   </div>