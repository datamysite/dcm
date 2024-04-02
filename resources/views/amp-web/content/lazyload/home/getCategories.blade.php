@foreach($categories as $val)
@php 
   $string = strtolower(trim($val->name));
   $string = str_replace('&', 'and', $string);
   $string = str_replace(' ', '-', $string);
   $slug = preg_replace('/[^a-z0-9-]/', '', $string);
@endphp
<div class="item">
   <a href="{{route('category', [$region, $slug])}}/?type={{$val->type == '3' ? '1' : '2'}}" class="text-decoration-none text-inherit">
      <amp-img src="{{URL::to('/public/storage/categories/'.$val->image)}}" width="65px" height="65px" alt="Image - {{$val->name}}"></amp-img>
      <div class="text-truncate">{{app()->getLocale() == 'ar' ? $val->name_ar : $val->name}}</div>
   </a>
</div>
@endforeach