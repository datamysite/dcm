
      @php $s = 1; $i=1; @endphp
      <div class="brand-item">
         @foreach($retailstores as $val)
            <a href="{{route('brand', [$region, $val->retailer->slug])}}" class="img-pop-up" aria-label="Online Store - {{$val->retailer->name}}">
               <amp-img class="img-fluid w-100" src="{{URL::to('/public/storage/retailers/')}}/{{app()->getLocale() == 'ar' ? 'ar/'.$val->retailer->ar_logo : $val->retailer->logo}}" layout="responsive" width="185px" height="230px" alt="Store - {{$val->retailer->name}}" style="border-radius: 20px;"></amp-img>
                     
            </a>
            @php $s++; if($s==3){ echo '</div>'; $i++;} if($s==3 && $i==2){ echo '<div class="brand-item">';$s=1;} @endphp
         @endforeach
      </div>
      @if(count($retailstores) < 2)
         <div class="brand-item">
            @for($i=0; $i<(5-count($retailstores)); $i++)
            <a href="#" class="img-pop-up" aria-label="Online Store - {{$val->retailer->name}}">
               <amp-img class="img-fluid w-100" src="{{URL::to('/public')}}/{{app()->getLocale() == 'ar' ? 'ar-coming-soon.png' : 'coming-soon.png'}}" layout="responsive" width="185px" height="230px" alt="Store Coming Soon" style="border-radius: 20px;"></amp-img>
                     
            </a>
            @endfor
         </div>
      @endif