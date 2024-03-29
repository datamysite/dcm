@extends('web.includes.master')

@section('content')

<div class="mt-110">
   <div class="container np-container">
      <!-- row -->
      <div class="row">
         <!-- col -->
         <div class="col-12">
            <!-- breadcrumb -->
            <nav aria-label="breadcrumb">
               <ol class="breadcrumb mb-0">
                  <li class="breadcrumb-item"><a href="{{route('home', [$region])}}" style="color: #000;"><strong>{{ __('translation.Home') }}</strong></a></li>
                  <li class="breadcrumb-item active"><a href="javascript:void(0)" style="color: #000;"><strong>{{app()->getLocale() == 'ar' ? $category->name_ar : $category->name}}</strong></a></li>
               </ol>
            </nav>
         </div>
      </div>
   </div>
</div>

     <!-- Category Section Start-->
   <section class="">
      <div class="container">
         <div class="row">
            <div class="col-12 mb-6 text-center">
               <h3 class="mb-0 page-title">{{app()->getLocale() == 'ar' ? $category->name_ar : $category->name}}</h3>
            </div>
         </div>
         <div class="ccategory-slider category-slider">
            @foreach($categories as $val)
               @php
                  $string = strtolower(trim($val->name));
                   $string = str_replace('&', 'and', $string);
                   $string = str_replace(' ', '-', $string);
                   $slug = preg_replace('/[^a-z0-9-]/', '', $string);
               @endphp
               <div class="item {{$val->id == $category->id ? 'active' : ''}}">
                  <a href="{{route('category', [$region, $slug])}}" class="text-decoration-none text-inherit">
                     <img src="{{URL::to('/public/storage/categories/'.$val->image)}}" alt="Mart" class="img-fluid" />
                     <div class="text-truncate">{{app()->getLocale() == 'ar' ? $val->name_ar : $val->name}}</div>
                  </a>
               </div>
            @endforeach
         </div>

      </div>
   </section>


   <!-- categoires section start-->
   <div class="mt-4 mb-lg-14 mb-8">
      <!-- container -->
      <div class="container np-container">
         <div class="row col-lg-3 col-md-4 mb-6 mb-md-0" style="border-radius:10px;">
            <h5 class="mb-1">{{ __('translation.FILTERS') }}</h5>
         </div>
         <!-- row -->
         <div class="row gx-10">
            <!-- col -->
            <aside class="col-lg-3 col-md-4 p-4 mb-6 mb-md-0" style="background-color:#f0f3f2;padding-top:0px; border-radius:10px;">
               <form method="get">
                  <div class="offcanvas offcanvas-start offcanvas-collapse w-md-50" tabindex="-1" id="offcanvasCategory" aria-labelledby="offcanvasCategoryLabel">

                     <div class="offcanvas-header d-lg-none">
                        <h5 class="offcanvas-title" id="offcanvasCategoryLabel">{{ __('translation.FILTERS') }}</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                     </div>

                     <div class="offcanvas-body ps-lg-2 pt-lg-0 mb-6 mb-md-0">

                        @if(empty($type) || $type == 'online' || $type == 'retail')
                           <div class="mb-8">
                              <!-- title -->
                              <h5 class="mb-3">{{ __('translation.Store') }}</h5>
                              <!-- nav -->
                              <ul class="nav nav-category" id="">



                                 <li class="nav-item border-bottom w-100">
                                    <div class="form-check mb-2">
                                       <!-- input -->
                                       <input class="form-check-input" type="radio" value="1" id="type1" name="type" {{!empty($_GET['type']) && $_GET['type'] == '1' ? 'checked' : ''}} {{$category->type == '2' ? 'disabled' : ''}}/>
                                       <label class="form-check-label" for="type1">{{ __('translation.Online') }}</label>
                                    </div>
                                    <!-- accordion collapse -->
                                 </li>

                                 <li class="nav-item border-bottom w-100">
                                    <div class="form-check mb-2">
                                       <!-- input -->
                                       <input class="form-check-input" type="radio" value="2" id="type2" name="type" {{!empty($_GET['type']) && $_GET['type'] == '2' ? 'checked' : ''}}  {{$category->type == '2' ? 'checked' : ''}}/>
                                       <label class="form-check-label" for="type2">{{ __('translation.Retail') }}</label>
                                    </div>
                                    <!-- accordion collapse -->
                                 </li>

                              </ul>
                           </div>
                        @endif
                        
                        @if((empty($type) || $type == 'online') && ((!empty($_GET['type']) && $_GET['type'] == '1') || empty($_GET['type'])))
                           <div class="mb-8">
                              <!-- title -->
                              <h5 class="mb-3">{{ __('translation.Categories') }}</h5>
                              <!-- nav -->
                              <ul class="nav nav-category" id="categoryCollapseMenu">
                                 @foreach($categories_f as $val)
                                    @php
                                       $string = strtolower(trim($val->name));
                                        $string = str_replace('&', 'and', $string);
                                        $string = str_replace(' ', '-', $string);
                                        $slug = preg_replace('/[^a-z0-9-]/', '', $string);

                                        $url = empty($type) ? route('category', [$region, $slug]) : route('category.sub', [$region, $slug, $type]);
                                        if(empty($type) && !empty($val->parentCategory->id)){
                                          $url = route('category.sub', [$region, $slug, 'online']);
                                        }
                                    @endphp
                                    @if(!empty($_GET['type']) && $_GET['type'] == '1')
                                       @if($val->type == '3')
                                          <li class="nav-item border-bottom w-100">
                                             <a href="{{$url}}" class="nav-link collapsed">
                                                {{ app()->getLocale() == 'ar' ? $val->name_ar : $val->name}}
                                                <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24">
                                                   <path fill="currentColor" fill-rule="evenodd" d="M12 16a4 4 0 1 0 0-8a4 4 0 0 0 0 8m0 6C6.477 22 2 17.523 2 12S6.477 2 12 2s10 4.477 10 10s-4.477 10-10 10m0-18h2v2h-2zm6 5h2v2h-2zM5 14a1 1 0 1 0 0-2a1 1 0 0 0 0 2m4-7a1 1 0 1 0 0-2a1 1 0 0 0 0 2m8 1a1 1 0 1 0 0-2a1 1 0 0 0 0 2m2 7a1 1 0 1 0 0-2a1 1 0 0 0 0 2m-4 2h2v2h-2zm-4 3a1 1 0 1 0 0-2a1 1 0 0 0 0 2m-5-4h2v2H6zM5 8h2v2H5z" />
                                                </svg>
                                             </a>
                                          </li>
                                       @endif
                                    @endif
                                 @endforeach
                              </ul>
                           </div>
                        @endif

                        @if((!empty($type) && $type == 'retail' && $category->parent_id == '0') || (!empty($_GET['type']) && $_GET['type'] == '2'))
                           <div class="mb-8">
                              <!-- title -->
                              <h5 class="mb-3">{{ __('translation.Sub_Categories') }}</h5>
                              <!-- nav -->
                              <ul class="nav nav-category" id="categoryCollapseMenu">
                                 @foreach($subcategories_f as $val)
                                    @php
                                       $string = strtolower(trim($val->name));
                                        $string = str_replace('&', 'and', $string);
                                        $string = str_replace(' ', '-', $string);
                                        $slug = preg_replace('/[^a-z0-9-]/', '', $string);

                                        $url = empty($type) ? route('category', [$region, $slug]) : route('category.sub', [$region, $slug, $type]);
                                    @endphp
                                    <li class="nav-item border-bottom w-100">
                                       <a href="{{$url}}" class="nav-link">
                                          {{ app()->getLocale() == 'ar' ? $val->name_ar : $val->name}}
                                          <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24">
                                             <path fill="currentColor" fill-rule="evenodd" d="M12 16a4 4 0 1 0 0-8a4 4 0 0 0 0 8m0 6C6.477 22 2 17.523 2 12S6.477 2 12 2s10 4.477 10 10s-4.477 10-10 10m0-18h2v2h-2zm6 5h2v2h-2zM5 14a1 1 0 1 0 0-2a1 1 0 0 0 0 2m4-7a1 1 0 1 0 0-2a1 1 0 0 0 0 2m8 1a1 1 0 1 0 0-2a1 1 0 0 0 0 2m2 7a1 1 0 1 0 0-2a1 1 0 0 0 0 2m-4 2h2v2h-2zm-4 3a1 1 0 1 0 0-2a1 1 0 0 0 0 2m-5-4h2v2H6zM5 8h2v2H5z" />
                                          </svg>
                                       </a>
                                    </li>
                                 @endforeach
                              </ul>
                           </div>
                        @endif

                        @if(empty($type) || $type == 'online' || $type == 'retail')
                           <div class="mb-8">
                              <!-- title -->
                              <h5 class="mb-3">{{ __('translation.Discount') }}</h5>
                              <!-- nav -->
                              <ul class="nav nav-category" id="">

                                 <li class="nav-item border-bottom w-100">
                                    <div class="form-check mb-2">
                                       <!-- input -->
                                       <input class="form-check-input" type="radio" value="10" name="discount" id="discount1" {{!empty($_GET['discount']) && $_GET['discount'] == '10' ? 'checked' : ''}}/>
                                       <label class="form-check-label" for="discount1">{{ __('translation.Up_to_10') }}</label>
                                    </div>
                                    <!-- accordion collapse -->
                                 </li>

                                 <li class="nav-item border-bottom w-100">
                                    <div class="form-check mb-2">
                                       <!-- input -->
                                       <input class="form-check-input" type="radio" value="15" name="discount" id="discount2" {{!empty($_GET['discount']) && $_GET['discount'] == '15' ? 'checked' : ''}} />
                                       <label class="form-check-label" for="discount2">{{ __('translation.Up_to_15') }}</label>
                                    </div>
                                    <!-- accordion collapse -->
                                 </li>
                              </ul>
                           </div>
                        @endif

                        @if(!empty($type) && $type == 'retail')
                           @if($category->id == '2' || $category->id == '3' || $category->id == '10')
                              <div class="mb-8">
                                 <!-- title -->
                                 <h5 class="mb-3">{{ __('translation.Gender') }}</h5>
                                 <!-- nav -->
                                 <ul class="nav nav-category" id="">

                                    <li class="nav-item border-bottom w-100">
                                       <div class="form-check mb-2">
                                          <!-- input -->
                                          <input class="form-check-input" type="radio" value="male" name="g" id="gender1" {{!empty($_GET['g']) && $_GET['g'] == 'male' ? 'checked' : ''}}/>
                                          <label class="form-check-label" for="gender1">{{ __('translation.Male') }}</label>
                                       </div>
                                       <!-- accordion collapse -->
                                    </li>

                                    <li class="nav-item border-bottom w-100">
                                       <div class="form-check mb-2">
                                          <!-- input -->
                                          <input class="form-check-input" type="radio" value="female" name="g" id="gender1" {{!empty($_GET['g']) && $_GET['g'] == 'female' ? 'checked' : ''}}/>
                                          <label class="form-check-label" for="gender1">{{ __('translation.Female') }}</label>
                                       </div>
                                       <!-- accordion collapse -->
                                    </li>

                                 </ul>
                              </div>
                           @endif
                        @endif


                        @if((!empty($type) && $type == 'online') || ((!empty($_GET['type']) && $_GET['type'] == '1') || (empty($type) && empty($_GET['type']))))
                        <div class="mb-8">
                           <!-- title -->
                           <h5 class="mb-3">{{ __('translation.Location') }}</h5>
                           <!-- nav -->
                           <ul class="nav nav-category" id="">
                              @foreach($countries_f as $val)
                                 <li class="nav-item border-bottom w-100">
                                    <div class="form-check mb-2">
                                       <!-- input -->
                                       <input class="form-check-input" type="radio" name="country" value="{{$val->id}}" id="countries{{$val->id}}" {{!empty($_GET['country']) && $_GET['country'] == $val->id ? 'checked' : ''}} {{empty($_GET['country']) && $val->id == '1' ? 'checked' : ''}}/>
                                       <label class="form-check-label" for="countries{{$val->id}}">{{app()->getLocale() == 'ar' ? $val->name_ar : $val->name}}</label>
                                    </div>
                                    <!-- accordion collapse -->
                                 </li>
                              @endforeach

                           </ul>
                        </div>
                        @endif

                        @if((!empty($type) && $type == 'retail') || (!empty($_GET['type']) && $_GET['type'] == '2'))
                        <div class="mb-8">
                           <!-- title -->
                           <h5 class="mb-3">{{ __('translation.Location') }}</h5>
                           <!-- nav -->
                           <ul class="nav nav-category" id="">
                              @foreach($states_f as $val)
                                 <li class="nav-item border-bottom w-100">
                                    <div class="form-check mb-2">
                                       <!-- input -->
                                       <input class="form-check-input" type="radio" name="state" value="{{$val->id}}" id="states{{$val->id}}" {{!empty($_GET['state']) && $_GET['state'] == $val->id ? 'checked' : ''}}/>
                                       <label class="form-check-label" for="states{{$val->id}}">{{app()->getLocale() == 'ar' ? $val->name_ar : $val->name}}</label>
                                    </div>
                                    <!-- accordion collapse -->
                                 </li>
                              @endforeach

                           </ul>
                        </div>
                        @endif


                        <div class="text-center">
                           <button type="submit" class="btn btn-white btn-sm">{{ __('translation.Apply_Changes') }}</button>
                        </div>

                     </div>
                  </div>
               </form>
            </aside>

            <section class="col-lg-9 col-md-12">
               <!-- card -->

               @if(count($retailers) != 0)
                  <!-- list icon -->

                  <div class="d-lg-flex justify-content-end align-items-center">

                     {{ $retailers->links('vendor.pagination.label') }}
                     
                     <!-- icon -->
                     <div class="d-md-flex justify-content-between align-items-center">

                        <div class="d-flex align-items-center justify-content-between">

                           <div class="ms-2 d-lg-none">
                              <a class="btn btn-outline-gray-400 text-muted" data-bs-toggle="offcanvas" href="#offcanvasCategory" role="button" aria-controls="offcanvasCategory">
                                 <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-filter me-2">
                                    <polygon points="22 3 2 3 10 12.46 10 19 14 21 14 12.46 22 3"></polygon>
                                 </svg>
                                 {{ __('translation.FILTERS') }}
                              </a>
                           </div>
                        </div>

                        <div class="d-flex mt-2 mt-lg-0">
                           <!-- <div class="me-2 flex-grow-1">

                              <select class="form-control form-control-sm">
                                 <option selected>Show: 50</option>
                                 <option value="10">10</option>
                                 <option value="20">20</option>
                                 <option value="30">30</option>
                              </select>
                           </div>
                           <div>

                              <select class="form-control form-control-sm">
                                 <option selected>Sort by: Featured</option>
                                 <option value="Low to High">Price: Low to High</option>
                                 <option value="High to Low">Price: High to Low</option>
                                 <option value="Release Date">Release Date</option>
                                 <option value="Avg. Rating">Avg. Rating</option>
                              </select>
                           </div> -->
                        </div>

                     </div>

                  </div>
                  <!-- row -->
                  <div class="row mt-1">

                     @foreach($retailers as $val)
                        <!-- col -->
                        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6 col-6">
                           <!-- card -->
                           <div class="card card-product">
                              <div class="card-body">
                                 <!-- badge -->
                                 <div class="text-center position-relative py-1 mb-3 box">
                                    <div class="ribbon-2"><span>{{ __('translation.discount_to') }}</span> {{$val->discount_upto}}%</div>
                                    <a href="{{route('category.brand', [$region, $category_slug, $val->slug])}}">
                                       <!-- img -->
                                       <img src="{{URL::to('/public/storage/retailers/')}}/{{app()->getLocale() == 'ar' ? 'ar/'.$val->ar_logo : $val->logo}}" alt="" class="mb-5 img-fluid" />
                                    </a>
                                 </div>
                              </div>
                           </div>
                        </div>
                     @endforeach

                  </div>
                  <!-- row -->

                  <div class="row mt-8 text-center">
                     <div class="col">
                        <!-- nav -->
                        {{ $retailers->links() }}
                     </div>
                  </div>
               @else
                  <div class="row">
                     <div class="col-lg-12 brand-coming">
                        <img src="{{URL::to('/public/coming-soon.gif')}}">
                     </div>
                  </div>
               @endif
            </section>

         </div>
      </div>
   </div>
   <!-- categoires section end-->


<!--Ads Section 1 Start Here-->
   <section class="my-lg-12 my-8">
      <div class="container ad-container np-container">
         <div class="row">
            <div class="col-12">

               <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-3180751570116638"
                       crossorigin="anonymous"></script>
                  <!-- DCM Responsive -->
                  <ins class="adsbygoogle"
                       style="display:block"
                       data-ad-client="ca-pub-3180751570116638"
                       data-ad-slot="1784464113"
                       data-ad-format="auto"
                       data-full-width-responsive="true"></ins>
                  <script>
                       (adsbygoogle = window.adsbygoogle || []).push({});
                  </script>
            </div>
         </div>
      </div>
   </section>
   <!--Ads Section 1 End Here-->


@endsection
