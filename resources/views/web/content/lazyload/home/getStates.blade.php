@if($type == 1)
   @foreach($allstates as $val)
      <a href="{{route('setRegion', $val->slug)}}" class="selectEmirates {{$val->slug == $region ? 'active' : ''}}" data-id="{{base64_encode($val->id)}}">
         <div class="header_card">
            <img src="{{config('app.storage').'states/'.$val->image}}" alt="{{$val->name}}" />
            {{$val->shortname}}
         </div>
      </a>
   @endforeach
@elseif($type == 2)
   <div class="emirates-section-nav">
      @foreach($allstates as $val)
         <a href="{{route('setRegion', $val->slug)}}" class="selectEmirates {{$val->slug == $region ? 'active' : ''}}" data-id="{{base64_encode($val->id)}}" aria-label="{{app()->getLocale() == 'ar'  ? $val->name_ar : $val->name}}">
            <div class="header_card">
               <img src="{{config('app.storage').'states/'.$val->image}}" alt="Image - {{$val->name}}" />
               {{app()->getLocale() == 'ar'  ? $val->name_ar : $val->name}}
            </div>
         </a>
      @endforeach
   </div>
@endif