@foreach($categories as $val)
@php 
   $string = strtolower(trim($val->name));
   $string = str_replace('&', 'and', $string);
   $string = str_replace(' ', '-', $string);
   $slug = preg_replace('/[^a-z0-9-]/', '', $string);
@endphp
<div class="item">
   <a href="{{route('category', [$region, $slug])}}/?type={{$val->type == '3' ? '1' : '2'}}" class="text-decoration-none text-inherit">
      <img src="{{config('app.storage').'categories/'.$val->image}}" alt="Image - {{$val->name}}" width="100px" height="100px" class="img-fluid" />
      <div class="text-truncate">{{app()->getLocale() == 'ar' ? $val->name_ar : $val->name}}</div>
   </a>
</div>
@endforeach