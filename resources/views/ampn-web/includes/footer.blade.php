<footer class="footer" id="footer">

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
                  <form action-xhr="{{URL::to('/en/newsletter/subscribe')}}" method="post" id="newsletter_form" class="ms-auto" custom-validation-reporting="show-first-on-submit">
                        @csrf
                        <div class=" d-flex align-items-center">
                           <input type="email" placeholder="{{ __('translation.email_place_holder') }} " name="email" id="n-email" required>
                           
                           <button class="btn " type="submit">
                              <strong>></strong>
                           </button>
                        </div>
                        <span visible-when-invalid="valueMissing" validation-for="n-email"></span>
                        <span visible-when-invalid="typeMismatch" validation-for="n-email"></span>
                        
                        <div submitting>
                              <template type="amp-mustache">
                                 <amp-img src="{{URL::to('/public/loader-gif.gif')}}" layout='fixed' width='100px' height='25px'></amp-img>
                              </template>
                        </div>
                        <div submit-success>
                           <template type="amp-mustache">
                              Success! You are successfully Subscribed. For Home Please <a href="{{route('home', [$region])}}">click here</a>
                           </template>
                        </div>
                        <div submit-error>
                           <template type="amp-mustache">
                              Warning! You are already subscribed.
                           </template>
                        </div>
                  </form>
               </li>
            </ul>
         </div>
      </div>
      	<br>


      				<amp-accordion layout="container" disable-session-states class="dropdown">
                        <section>
                            <header>{{ __('translation.footer_section_1_text01') }}</header>
                            <ul class="dropdown-items">
                            	@foreach($footAbout as $val)
	                		 		@if(app()->getLocale() == 'ar' && $val->page_name != 'Blogs')
	                    				<li class="dropdown-item">
                                    		<a href="{{$val->page_url}}">{{ __('translation.'.$val->page_name) }}</a>
                                		</li>
	                 				@elseif(app()->getLocale() == 'en')
	                    				<li class="dropdown-item">
                                    		<a href="{{$val->page_url}}">{{ __('translation.'.$val->page_name) }}</a>
                                		</li>
	                 				@endif
	              				@endforeach
                            </ul>
                        </section>
                    </amp-accordion>

                    <amp-accordion layout="container" disable-session-states class="dropdown">
                        <section>
                            <header>{{ __('translation.footer_section_2_text01') }}</header>
                            <ul class="dropdown-items">
                            	@foreach($footBrand as $val)
	                    				<li class="dropdown-item">
                                    		<a href="{{route('brand', [$region, $val->retailer->slug])}}">{{app()->getLocale() == 'ar' ? $val->retailer->name_ar : $val->retailer->name}}</a>
                                		</li>
                  				@endforeach
                            </ul>
                        </section>
                    </amp-accordion>

                    <amp-accordion layout="container" disable-session-states class="dropdown">
                        <section>
                            <header>{{ __('translation.footer_section_3_text01') }}</header>
                            <ul class="dropdown-items">
                            	@foreach($footCat as $val)
                     				@php
                        				$string = strtolower(trim($val->category->name));
                         				$string = str_replace('&', 'and', $string);
                         				$string = str_replace(' ', '-', $string);
                         				$slug = preg_replace('/[^a-z0-9-]/', '', $string);
                     				@endphp
	                    				<li class="dropdown-item">
                                    		<a href="{{route('category', [$region, $slug])}}">{{app()->getLocale() == 'ar' ? $val->category->name_ar : $val->category->name}}</a>
                                		</li>
                  				@endforeach
                            </ul>
                        </section>
                    </amp-accordion>

      <div class="accordion">


      </div>
   </div>


   <div class="footer-bottom">
      <div class="container np-container">
         <div class="row align-items-center">
            <div class="col-12 text-center">
               <span class="small" style="color: black;">
                  © {{date('Y')}} <a href="https://www.dealsandcouponsmena.com/">DCM</a>. {{ __('translation.footer_text01') }} <a href="#">Dar Alafkar Marketing L.L.C</a>
               </span>
            </div>

            <div class="col-12">
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
                     <a href="https://www.tiktok.com/@dcm_uae?_t=8ld3djl4gC8&_r=1" class="btn btn-xs"  aria-label="TikTok">
                        <amp-img src="{{URL::to('/public/web_assets/images/icons/tiktok.svg')}}" layout="fixed" width="16px" height="16px" alt="tiktok"></amp-img>
                     </a>
                  </li>

               </ul>
            </div>

         </div>
      </div>
   </div>
</footer>