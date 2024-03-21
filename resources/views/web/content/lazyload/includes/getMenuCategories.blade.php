@if($type == '1') 
   @foreach($navbarCategories as $val)
      @php
         $string = strtolower(trim($val->name));
          $string = str_replace('&', 'and', $string);
          $string = str_replace(' ', '-', $string);
          $slug = preg_replace('/[^a-z0-9-]/', '', $string);
      @endphp
      @if($val->type == 3)
         <li class="dropdown-submenu dropend">
            <a class="dropdown-item dropdown-toggle" href="javascript:void(0)" role="button" data-bs-toggle="dropdown" aria-expanded="false">{{app()->getLocale() == 'ar' ? $val->name_ar : $val->name}}</a>
            <ul class="dropdown-menu">

               <li><a class="dropdown-item" href="{{route('category.sub', [$region, $slug, 'online'])}}">{{ __('translation.Online') }}</a></li>
               <li><a class="dropdown-item" href="{{route('category.sub', [$region, $slug, 'retail'])}}">{{ __('translation.Retail') }}</a></li>

            </ul>
         </li>
      @else
         <li><a class="dropdown-item" href="{{route('category', [$region, $slug])}}">{{app()->getLocale() == 'ar' ? $val->name_ar : $val->name}}</a></li>
      @endif
   @endforeach
@elseif($type == '2')
   @foreach($navbarCategories as $val)
      @php
         $string = strtolower(trim($val->name));
          $string = str_replace('&', 'and', $string);
          $string = str_replace(' ', '-', $string);
          $slug = preg_replace('/[^a-z0-9-]/', '', $string);
      @endphp
      @if($val->type == 3)
         <li class="dropdown-submenu dropend mob-nav">
            <a class="dropdown-item dropdown-toggle nested-link" href="javascript:void(0)" data-link="{{$val->id}}" role="button" data-bs-toggle="dropdown">{{app()->getLocale() == 'ar' ? $val->name_ar : $val->name}}</a>
            <ul class="dropdown-menu cat_{{$val->id}}">

               <li><a class="dropdown-item" href="{{route('category.sub', [$region, $slug, 'online'])}}">{{ __('translation.Online') }}</a></li>
               <li><a class="dropdown-item" href="{{route('category.sub', [$region, $slug, 'retail'])}}">{{ __('translation.Retail') }}</a></li>

            </ul>
         </li>
      @else
         <li><a class="dropdown-item" href="{{route('category', [$region, $slug])}}">{{app()->getLocale() == 'ar' ? $val->name_ar : $val->name}}</a></li>
      @endif
   @endforeach
@endif
                           